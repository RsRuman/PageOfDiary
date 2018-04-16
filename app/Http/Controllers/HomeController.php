<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Profile;
use App\Home;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = DB::table('users')->join('profiles', 'users.id', '=', 'profiles.user_id')->select('users.*', 'profiles.*')->where(['profiles.user_id' => $user_id])->first();
        $homes = Home::all();
        $users = User::all();
        
        
        return view('home.home', ['profile' => $profile, 'users' => $users,'homes'=> $homes]);
    }

    // adding user post here
     public function addUserPost(Request $request)
    {
        $this->validate($request, [
            'user_post' => 'required',
            'user_post_pic' => 'required',

        ]);
        $homes = new Home;
        $homes->user_post = $request->input('user_post');
        $homes->user_id = Auth::user()->id;
        $homes->user_name = Auth::user()->name;
        
        $homes->user_post_pic = $request->input('user_post_pic');
        if(Input::hasFile('user_post_pic'))
            {
                $file =Input::file('user_post_pic');
                $file->move(public_path(). '/uploads', $file->getClientOriginalName());
                $url = URL::to("/"). '/uploads/'. $file->getClientOriginalName();
            }
            $homes->user_post_pic = $url;
            $homes->save();
            return redirect('/home')->with('response', 'Post Added Successfully!');
    }
    public function game()
    {
        return view('game.game');
    }
    
}
