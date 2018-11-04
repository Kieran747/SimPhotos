@extends('layouts.app')

@section('content')
    @guest
    <div class="container">
        <center>
        <p style="font-size: 25px">Please Login/Signup to upload a screenshot</p> <a style="color: white" class="btn btn-primary" href="{{ route('register') }}">{{ __('Sign up') }}</a>
            <a class="btn btn-primary" href="{{ route('login') }}" style="background-color: #282828; border-color: #282828">Login</a>
        </center>
    </div>


    @else
    <div class="container">
        <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px">Upload a screenshot</h2>
    </div>


    @endguest
@endsection
