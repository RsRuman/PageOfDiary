<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Events\ChatEvent;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Home;
use App\User;





class ChatController extends Controller
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
        return view('chat');
    }
    public function chat()
    {
    	$user_id = Auth::user()->id;
        $profile = DB::table('users')->join('profiles', 'users.id', '=', 'profiles.user_id')->select('users.*', 'profiles.*')->where(['profiles.user_id' => $user_id])->first();
        $homes = Home::all();
        $users = User::all();
        return view('chat', ['profile' => $profile, 'users' => $users,'homes'=> $homes]);
    }
    public function send(request $request)
    {
    	
    	$user = User::find(Auth::id());
    	event(new ChatEvent($request->message,$user));
    }
    // public function chat()
    // {
    //     $users = User::all();
    //     return view('chat.chat', ['users' => $users]);
    // }




    // public function send()
    // {
    // 	$message = 'Hello';
    // 	$user = User::find(Auth::id());
    // 	event(new ChatEvent($message,$user));
    // }
}
