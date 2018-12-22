@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="front">
            @foreach($front as $fron)
                <center>
            <img src="/storage/images/{{ $fron->link }}" style="width: 900px">
                </center>
                @endforeach
        </div>

        <div class="todays-photos">

        </div>
        <div class="random-photos">
            <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px">Random Screenshots</h2>
            @foreach($randoms as $random)
                <a href="/photo/{{$random->id}}">
                    <div class="front-page-screenshot">
                        <img style="position: relative; width: 100%; height: 75%" src="/storage/images/{{ $random->link }}" >
                        <p style="position: relative;top: 2.5%; left: 2%">{{ $random->users_name }}</p>
                        <p style="position: relative; left: 85%; bottom: 5%">{{ $random->aircraft }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
