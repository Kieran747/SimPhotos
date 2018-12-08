@extends('layouts.app')

@section('content')

    <div class="container">
        <?php
        if($user->id == Auth::user()->id ) {
            echo '<a href="/account/settings"><button class="btn btn-primary" name="edit" href="/account/settings" style=" position: relative; float: right;">Edit Account</button></a>';
            echo  '<a href="/photos/"></a><button class="btn btn-primary" style=" position: relative; float: right; margin-right: 5px">Photos</button>';
        } else {
            echo '';
        }
        ?>
        <div class="profile-info">
            <img src="/storage/images/accounts/{{ $user->account_photo }}" style="width: 220px; height: 210px; border: 5px solid black; position: relative; float: left">
            <h2 style="float: left; position: relative; top: 180px">{{ $user->name }}</h2>
        </div>

        <div style="position: absolute; top: 295px; width: 70%; left: 400px">
            <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px; width: 79.2%">Users Screenshots</h2>
            @foreach($photos as $photo)
                <a href="/photo/{{$photo->id}}">
                    <div class="user-page-screenshot">
                        <img style="position: relative; width: 100%; height: 75%;" src="/storage/images/{{ $photo->link }}" >
                        <p style="position: relative;top: 2.5%; left: 2%">{{ $photo->users_name }}</p>
                        <p style="position: relative; left: 85%; bottom: 5%">{{ $photo->aircraft }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
