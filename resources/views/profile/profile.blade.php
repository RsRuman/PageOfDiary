<style type="text/css">
    .container
    { 
        background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(img/cover.jpg.jpg);
    }
    .xp
    {
        margin-left: 19%;
        color: maroon;

    }
    .panel-heading
    {
        margin-left: 36.5%;
        margin-top: 220px;
        color: white;
        font-family:tahoma;
    }
    .cover
    {
        background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('images/profile.jpg');
        height:100vh;
        background-position:center;
        background-size:cover;
        position: fixed;
        width: 100%;
    }
    .row
    {
        margin-top: 18px;
    }
  </style>
@extends('layouts.app')

@section('content')
<div class="cover">
<div class="panel-heading"><h3><b>Add Profile Information</b></h3></div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
             @if(count($errors) > 0)
             @foreach($errors->all() as $error)
             <div class="alert alert-danger">
                {{$error}}
             </div>
             @endforeach
             @endif
   
            <div class="panel panel-default">
                <div class="panel-body" style="margin-left: 300px;">
                    
                    <form class="form-horizontal" method="POST" action="{{ url('/addProfile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-8 col-md-offset-2">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name..">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-md-offset-2">
                                <input id="designation" type="text" class="form-control" name="designation" value="{{ old('designation') }}" required autofocus placeholder="Where are you work now?">

                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('itro') ? ' has-error' : '' }}">
                           <div class="col-md-8 col-md-offset-2">
                                <input class="form-control" id="itro" name="itro" rows="3" value="{{ old('itro') }}" required autofocus placeholder="Your designation...">
                                
                                @if ($errors->has('itro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('itro') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('profile_pic') ? ' has-error' : '' }}">
                            <div class="col-md-8 col-md-offset-2">
                                <input id="profile_pic" type="file" class="form-control" name="profile_pic" value="{{ old('profile_pic') }}" required autofocus placeholder="Enter your profile picture...">

                                @if ($errors->has('profile_pic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile_pic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-block" style="background-color: maroon; color: white; margin-top: 20px;">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection