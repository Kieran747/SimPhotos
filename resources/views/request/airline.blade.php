@extends('layouts.app')

@section('content')

    @guest
        <div class="container">
            <center>
                <p style="font-size: 25px">Please Login/Signup</p> <a style="color: white" class="btn btn-primary" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                <a class="btn btn-primary" href="{{ route('login') }}" style="background-color: #282828; border-color: #282828">Login</a>
            </center>
        </div>
    @else



        <div class="container">

            <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px">Request airline</h2>
            <div style="height: 100%; width: 600px; position: absolute">
                <p>Request an airline to be added. We try our very best to add ever airline however we might miss a few.</p>
                <h4>How this works</h4>
                <p>After you press submit your request will be reviewed by an admin, they will then either approve or disprove it. If your request is approved it will go
                    go live on the site, giving people the ability to use it in their screenshots</p>
                <h4>What we do</h4>
                <p>Once we approve the airline, we will add key information such as logos</p>
            </div>
            <div style="float: right;">
                <form action="/airline-request" method="POST" name="airline-request">
                    {{ csrf_field() }}
                    <p>Enter name of airline</p>
                    <input type="text" name="name" style="width: 500px; margin-bottom: 10px;" placeholder="Name"> <br>
                    <p>Airline Category</p>
                    <select style="width: 500px; margin-bottom: 10px;" name="category">
                        <option value="Airline">Airline</option>
                        <option value="Military">Military</option>
                        <option value="GeneralAviation">General Aviation</option>
                        <option value="Manufacturer">Manufacturer</option>
                    </select> <br>
                    <p>Is this airline a Virtual airline?</p>
                    <input  type="radio" name="virtual" value="1"> <label for="ground">Yes</label>
                    <input  type="radio" name="virtual" value="0"><label  for="airborn">No</label> <br>
                    <button class="btn btn-primary" type="submit" name="submit" style="width: 500px">Submit</button>
                </form>
            </div>
        </div>
    @endguest

@endsection
