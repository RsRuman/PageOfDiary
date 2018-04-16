@extends('layouts.app')
<style type="text/css">
    
body{
    height: 1000px;
}
            .profilepicx
            {
                width:178px;
                height:178px;
                padding:5px;
                top:80px;
                left:210px;
                position:fixed;
                border-radius:5px;
                box-shadow: inset 0 0 0 7px rgba(255,255,255,.5);
            }
</style>

@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                     
                        <div class="profilepicx">
                            @if(!empty($profile))
                            <img src="{{$profile->profile_pic}}" height="168px" width="168px"/ style="border-radius: 50%;">
                            @else
                            <img src="{{url('images/userProfile.png')}}" height="168px" width="168px">
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div style=" margin-left: 180px; margin-top: 17rem; position: fixed;">
                                <h4 style="color: #2c3e50; margin-left: 55px;"><b>{{ $profile->name }}</b></h4>
                                <div style="height: 230px; width: 210px; border: 2px solid white;">
                                    <div style="height: 2.5rem; border: 1px solid white; background-color: #bdc3c7; text-align: center; padding-top: 6px; ">
                                        <h5><b>Information</b></h5>
                                    </div>
                                    <div style="margin-left: 10px;">
                                        @if(!empty($profile))
                                        <p><b>Work at: </b><br>{{ $profile->itro }}</p>
                                        @endif
                                        @if(!empty($profile))
                                        <p><b>Designation: </b><br>{{ $profile->designation }}</p>
                                        @endif
                                    
                                    <p><b>Birthday: </b><br>19-03-1994</p>
                                    </div>
                                </div>
                                <div style="">
                                    <button type="button" class="btn btn-success" style="width: 210px;">Favourite Quote</button>
                                    <div style="height: 2.5rem; border: 1px solid white; background-color: #bdc3c7; text-align: center; padding-top: 6px; width: 210px;"><p>Nothing is beatiful!</p></div>
                                    
                                  </div>  
                                </div>
                        </div>


                        <!--status write box  -->
                        <div class="col-sm-7" style="height: 368px; margin-top: 5rem; border-radius: 5px;">
                            <form class="form-horizontal" method="POST" action="{{ url('/addUserPost') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        
                        <div class="form-group{{ $errors->has('user_post') ? ' has-error' : '' }}">
                            

                            <div class="col-md-12 col-md-offset-0">
                                <textarea class="form-control" id="user_post" name="user_post" rows="10" value="{{ old('user_post') }}" placeholder="Share your things" required autofocus style="margin-top: 5px;" ></textarea>
                                @if ($errors->has('user_post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('user_post_pic') ? ' has-error' : '' }}">
                         

                            <div class="col-md-12 col-md-offset-0">
                                <input id="user_post_pic" type="file" class="form-control" name="user_post_pic" value="{{ old('user_post_pic') }}" required autofocus>

                                @if ($errors->has('user_post_pic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_post_pic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-0">
                                <button type="submit" class="btn btn-block" style="background-color: maroon; color: white; margin-top: 20px;">
                                    Add Post
                                </button>
                            </div>
                        </div>
                    </form>
                        </div>

                        </div>
                        
                    
        
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-top: 3rem;">
                    <div class="col-sm-8" style="margin-top: 15px;">
                        <div class="row">
                            <div class="col-sm-4">
                                 
                            
                            </div>
                        <div class="col-sm-1">
                            
                        </div>
                        <div class="col-sm-7" style=" height: 50px; z-index: -1;">
                            @if(count($homes)>0)
                            @foreach($homes->all() as $homes)
                            <div class="card" style="width: 42.8rem; margin-left: .8rem;">
                                <div class="card-body">
                                    
                                    <h5 class="card-title">{{ $homes->user_name}}</h5>

                                    <hr>
                                    <img src="{{$homes->user_post_pic}}" width="100%">
                                    <br><br>
                                    <p class="card-text">{{ $homes->user_post}}</p>
                                    <br><br>
                                    <a href="#" class="btn btn-primary">Comment</a>

                                </div>
                                </div>
                                <div style="height: 15px;"></div>
                            
                           @endforeach
                           @endif
                           
                           
                           
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

                





































                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->