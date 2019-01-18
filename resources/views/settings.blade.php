@extends('layouts.app')

@section('content')

    @auth


    <center>
    <p style="font-size: 20px">Upload account photo</p>
    </center>
<div class="upload-account-photo container" style="width: 800px; height: 120px; border: 1px solid black;">

    <img src="/storage/images/accounts/{{ Auth::user()->account_photo }}" style="width: 100px; height: 100px; position: relative; float: left; top: 8%;">
    <form name="update" action="/account-photo" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
                <input type="file" name="file" style="position: relative; top: 8%;">
        <input type="hidden" value="{{ Auth::user()->id }}" name="id">
        <button name="submit" class="btn btn-primary">upload</button>
    </form>
</div>
    <center>
        <p style="font-size: 20px">Upload general information</p>
    </center>
    <div class="General-information container" style="width: 800px; height: 400px; border: 1px solid black;">
        <form name="update-general" action="/account-update" method="POST">
            {{ csrf_field() }}
            <center>
            Name
            <input type="text" value="{{ Auth::user()->name }}" name="name" style="width: 200px">

            <input hidden value="{{ Auth::user()->id }}" name="id">

            Email
            <input type="text" value="{{ Auth::user()->email }}" name="email" style="width: 200px">
            </center>

            <center>
            <p style="position:relative;">Bio:</p>
            <textarea name="bio" style="width: 300px; height: 100px;" maxlength="90">{{ Auth::user()->bio }}</textarea>
            </center>
            <center>
            <button class="btn btn-primary" name="submit" style="width: 90%">
                submit
            </button>
            </center>
        </form>
    </div>



    @endauth

    @guest
        <div class="container">
            <center>
                <p style="font-size: 25px">Please Login/Signup to view settings</p> <a style="color: white" class="btn btn-primary" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                <a class="btn btn-primary" href="{{ route('login') }}" style="background-color: #282828; border-color: #282828">Login</a>
            </center>
        </div>
    @endguest
@endsection
