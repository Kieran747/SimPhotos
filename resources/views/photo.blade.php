@extends('layouts.app')
<style>
    .head {
        position: relative; float: left;
        margin-right: 5px;
        margin-bottom: 1px;
        font-size: 20px;
    }
    .head h2 {
        position: relative; float: left;
        margin-right: 5px;
        font-size: 20px;
    }
</style>
@section('content')

    <div class="container">
        <div>
        <img src="/storage/images/{{ $photo->link }}" style="width: 100%">
        <h4 style="position: relative; top: 5px; color: grey; font-size: 17px">Registration</h4>
            <h5>{{ $photo->registration }}</h5>
            <h4 style="position: relative; top: 5px; color: grey; font-size: 17px">Uploaded at </h4>
            <h5 style="color: black">{{ $photo->date }}</h5>
            <div class="remarks" style="width: 70%; float: right; position: absolute; top: 702px; left: 550px">
                <h4 style="position: relative; top: 5px; color: grey; font-size: 17px">Remarks:</h4>

                <p style="color: black;">{{ $photo->remarks }}</p>
            </div>
    </div>

        <div class="photo-details" style="position: relative; ">
            <div class="photo-details-aircraft" style="width: 20%; float: left;">
            <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px; width: 100%">Aircraft</h2>
                <p style="margin-bottom: 0px">Reg: <em style="color: #1d68a7; font-weight: bold; "> <a href="/registration/{{ $photo->registration }}">{{ $photo->registration }}</a> </em> </p>
                <p style="margin-bottom: 0px">Aircraft: <em style="color: #1d68a7; font-weight: bold; "> <a href="/aircraft/{{ $photo->aircraft }}">{{ $photo->aircraft }}</a> </em> </p>
                <p style="margin-bottom: 0px">Airline: <em style="color: #1d68a7; font-weight: bold; "> <a href="/Airline/{{ $photo->airline }}">{{ $photo->airline }}</a> </em> </p>
            </div>

            <div class="photo-details" style="width: 20%; float: left; margin-left: 20px">
                <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px; width: 100%">Photo Location</h2>


                <?php
                 $status = $photo->status;
                if( $status == 'airborn') {
                    $country = $photo->country;
                    print '<center><p>Airborn overhead:</p></center>' . '<center><p style="color: #1d68a7;">' .  $country . '</p></center>' ;
                } elseif ( $status == 'ground') {
                    $airport = $photo->airport;
                    print $airport;
                }
                ?>
            </div>

            <div class="photo-details-aircraft" style="width: 20%; float: left; margin-left: 20px">
                <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px; width: 100%">Simmer</h2>
                <a href="/user/{{ $photo->user }}"><p>{{ $photo->users_name }}</p></a>
            </div>
        </div>

    </div>
@endsection


