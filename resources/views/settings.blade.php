@extends('layouts.app')

@section('content')

    @auth


    <center>
    <p style="font-size: 20px">Upload account photo</p>
    </center>
<div class="container" style="width: 800px; height: 120px; border: 1px solid black;">

    <img src="/storage/images/accounts/{{ Auth::user()->account_photo }}" style="width: 100px; height: 100px; position: relative; float: left; top: 8%;">
    <form name="update" action="/account-photo" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
                <input type="file" name="file" style="position: relative; top: 8%;">
        <input type="hidden" value="{{ Auth::user()->id }}" name="id">
        <button name="submit" class="btn btn-primary">upload</button>
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
