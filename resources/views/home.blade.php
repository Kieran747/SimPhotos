@extends('layouts.app')

@section('content')
<div class="container">

<div class="todays-photos">
    <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px">Screenshots uploded today</h2>
    @foreach($todaysphotos as $todaysphoto)
        <a href="/photo/{{$todaysphoto->id}}">
        <div class="front-page-screenshot">
            <img style="position: relative; width: 100%; height: 75%" src="/storage/images/{{ $todaysphoto->link }}" >
            <p style="position: relative;top: 2.5%; left: 2%">{{ $todaysphoto->users_name }}</p>
            <p style="position: relative; left: 85%; bottom: 5%">{{ $todaysphoto->aircraft }}</p>
        </div>
        </a>
        @endforeach
</div>

</div>
@endsection
