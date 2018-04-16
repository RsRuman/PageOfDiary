@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
		body{
            height: 1400px;
            background-color: #ecf0f1;

        }
		
            .chat{
                width: 300px;
                position: fixed;
                bottom: 5px;
                right: 5px;
                background: #bdc3c7;
                
            }
            .chat-body
            {
                height: 820px;
                border-left: 1px solid white;
                border-radius: 10px;
            }
           
            .list-group-item
            {
                cursor: pointer;
            }
            .box
            {
                width: 300px;
                bottom: 5px;
                right: 320px;
                position: fixed;
            }
            .box-body
            {
                height: 200px;
                border-radius: 5px;
                background: white;
                overflow-y: scroll;
                 
            }
            .chatBoxHeader
            {
                float: left;
            }
            .crossBar
            {
                margin-left: 250px;
            }
            #inputText
            {
                height: 50px;
                width: 300px;
                border-radius: 5px;
            }
            

            .coverpadx
            {
                margin-left: 320px;
                position: fixed;
                -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
            }  

            .profilepicx
            {
                width:178px;
                height:178px;
                padding:5px;
                top:130px;
                left:360px;
                position:fixed;
                border-radius:5px;
                box-shadow: inset 0 0 0 7px rgba(255,255,255,.5);
            }
        </style>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        @section('content')

        <div class="container-fluid">
                <!--That is for user list-->
            <div class="chat">
                <ul class="list-group">
                    <div class="chat-head">
                        <li class="list-group-item active">User List</li>
                    </div>
                    <div class="chat-body">
                        @if(count($users)>0)
                        @foreach($users->all() as $users)
                        <div class="ruman">
                            <li class="list-group-item" id="{{'userId'.$users->id}}">{{$users->name}}</li>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </ul>
            </div>

            <!--That is for chat box-->
            <div class="row" id="app">
                <div class="box">
                    <ul class="list-group">
                        <div class="box-head">
                            <div class="cross">
                                <li class="list-group-item active">
                                    <div class="chatBoxHeader"></div>
                                    <div class="crossBar">x</div>
                                </li>
                            </div>
                        </div>
                        <div class="wrap-body">
                            <div class="box-body" v-chat-scroll>
                                <message 
                                v-for="value, index in chat.message" 
                                :key= value.index
                                :color= chat.color[index]
                                :user = chat.user[index]
                                >
                                @{{ value }}
                                </message>
                                <div class="badge badge-pill badge-primary">@{{ typing }}</div>
                            </div>
                            <input type="text" id="inputText" class="form-control" placeholder="type your message here..." v-model='message' @keyup.enter='send'>
                        </div>
                    </ul>
                </div>
            </div>
           </div> 
            
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    
                    <div class="coverpadx"><img src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" width="850px" height="230px" style="margin-left: 5px; margin-top: 55px;" />
                        
                        <div class="profilepicx">
                            @if(!empty($profile))
                            <img src="{{$profile->profile_pic}}" height="168px" width="168px"/>
                            @else
                            <img src="{{url('images/userProfile.png')}}" height="168px" width="168px">
                            @endif
                        </div>
                    </div>
        
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-top: 18rem;">
                    <div class="col-sm-8" style="margin-top: 15px;">
                        <div class="row">
                            <div class="col-sm-4">
                                 <div style=" margin-left: 320px; position: fixed;">
                                    @if(!empty($profile))
                                <h4 style="color: #2c3e50; margin-left: 55px;"><b>{{ $profile->name }}</b></h4> @endif

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
                                    <div style="height: 2.5rem; border: 1px solid white; background-color: #bdc3c7; text-align: center; padding-top: 6px; width: 210px;"><p>Nothing is beatiful!</p>
                                    </div>
                                    <div style="height: 2.5rem; border: 1px solid white; background-color: maroon; border-radius: 5px; text-align: center; padding-top: 6px; width: 210px;">
                                        <a href='{{url("/game")}}' style="text-decoration: none; color: white; cursor: pointer;"><b>Play Game</b></a>
                                    </div>
                                    
                                    </div>  
                                </div>
                            
                            </div>


                        <div class="col-sm-1">
                            
                        </div>

                        <div class="col-sm-7" style="z-index: -1; margin-top: 35px;">
                            @if(count($homes)>0)
                            @foreach($homes->all() as $homes)
                            <div class="card" style="width: 39.6rem; margin-left: .8rem;">
                                <div class="card-body">
                                    <div style="float: right;">
                                        <a href="" class="btn btn-primary">
                                            <span class="fa fa-pencil-square-o"> Edite</span>
                                        </a>
                                        <a href="" class="btn btn-primary">
                                            <span class="fa fa-trash"> Delete</span>
                                        </a>
                                        
                                    </div>
                                    
                                    <h5 class="card-title"><b>{{ $homes->user_name}}</b></h5>
                                    
                                    <hr>
                                    <img src="{{$homes->user_post_pic}}" width="60%" height="20%" style="margin-left: 7rem;">
                                    <br><br>
                                    <p class="card-text">{{ $homes->user_post}}</p>
                                    
                                    <a href="#" class="btn btn-primary"><i class="fa fa-comment"> Comment</i></a>

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

                





            


        


<!-- This is JavaScript -->
<script>
    $(document).ready(function(){
    // initially box is hidinig
    $('.box').hide();
    $('.wrap-body').hide();
    //For userList toggling
    $('.chat-head').click(function(){
        $('.chat-body').toggle();
    });
    //For chatBox toggling
    $('.box-head').click(function(){
        $('.wrap-body').toggle();
    });
    //For crossButton
    $('.crossBar').click(function(){
        $('.box').hide();
    });
    //Showing chatBox by click on userName
    $('.ruman').click(function(){ 
        $('.box').show();
        $('.wrap-body').show();
    });
    $('.ruman').click(function(){
        var str = $(this).text();
        $('.chatBoxHeader').html(str);
    });
})
</script>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@endsection

