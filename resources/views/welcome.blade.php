@extends('layouts.app')
<style type="text/css">
*
{
    margin:0;
    padding:0;
}

body
{
    font-family:tahoma;
}
.hero
{
    position:absolute;
    width:1140px;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    color: white;
}
header
{
    background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('images/welcome.jpg');
    height:100vh;
    background-position:center;
    background-size:cover;
}



.btn
{
    border:1px solid maroon;
    padding:10px 30px;
    color:white;
    text-decoration:none;
    border-radius:12px;
    font-weight:bold;
    margin-right:20px;
    
}
.button-awsm
{
    margin-top:30px;
}
.btn-half
{
    background-color:maroon;
    color:white;
    transition:0.5s ease-in;
}
.btn-full:hover
{
    background-color:maroon;
    color:white;
    transition:0.5s ease-in;
}

</style>

@section('content')
<header>

<div class="hero">
<h1>KEEP A DIARY<br>AND SOMEDAY IT WILL KEEP YOU</h1>
<div class="button-awsm">
    <a href="" class="btn btn-half" data-toggle="modal" data-target="#exampleModalCenter"><b>Click to Login</b> </a>
    <a href="" class="btn btn-full" data-toggle="modal" data-target="#exampleModalCenter1"><b>Click here to Register</b> </a>
</div>
</div>
</header>
@endsection
