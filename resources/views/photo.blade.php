@extends('layouts.app')
<title>{{ $photo->aircraft }} - {{ $photo->registration }} - {{ $photo->airline }} </title>

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
            @auth()
            <?php
            if($photo->user == Auth::user()->id ) {
                echo '<a href="/delete"><button class="btn btn-primary" name="edit" style=" position: relative; float: right; border-color: red; background-color: red;">Delete</button></a>';
            } else {
                echo '';
            }
            ?>
            @endauth
        <h4 style="position: relative; top: 5px; color: grey; font-size: 17px">Registration</h4>
            <h5>{{ $photo->registration }}</h5>
            <h4 style="position: relative; top: 5px; color: grey; font-size: 17px">Uploaded at </h4>
            <h5 style="color: black">{{ $photo->date }}</h5>
            <div class="remarks" style="width: 70%; position: relative; float: left; margin-left: 110px; margin-top: -113px;">

                <h4 style="position: relative; top: 5px; color: grey; font-size: 17px">Remarks:</h4>
                <p style="color: black;">{{ $photo->remarks }}</p>
            </div>

    </div>

        <div class="photo-details" style="position: relative; ">
            <div class="photo-details-aircraft" style="width: 20%; float: left;">
            <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px; width: 100%">Aircraft</h2>
                <p style="margin-bottom: 0px">Reg: <em style="color: #1d68a7; font-weight: bold; "> <a href="/registration/{{ $photo->registration }}">{{ $photo->registration }}</a> </em> </p>
                <p style="margin-bottom: 0px">Aircraft: <em style="color: #1d68a7; font-weight: bold; "> <a href="/aircraft/{{ $photo->aircraft }}">{{ $photo->aircraft }}</a> </em> </p>
                <p style="margin-bottom: 0px">Airline: <em style="color: #1d68a7; font-weight: bold; "> <a href="/airline/{{ $photo->airline }}">{{ $photo->airline }}</a> </em> </p>
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

        <div class="comments" style="width: 370px; height: 500px; float: right; position: absolute; top: 710px; right: 395px;">
            <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px; width: 79.2%">Comments</h2>
            @auth
            <form name="comment" action="/comment" method="POST">

                {{ csrf_field() }}
                <input hidden value="{{ Auth::user()->id }}" name="user_id">
                <input hidden value="{{ Auth::user()->name }}" name="user_name">
                <input hidden value="{{ Auth::user()->account_photo }}" name="account_photo">
                <input type="text" placeholder="comment" name="value" style="width: 200px; height: 40px; position: relative; margin-left: 5px; margin-top: 5px;" maxlength="60">
                <input hidden value="{{ $photo->id }}" name="photo_id">
                <button class="btn btn-primary">submit</button>
            </form>
            @endauth
                @guest
                <input type="text" name="country" value="Login to comment" style="width: 200px; height: 40px; position: relative; margin-left: 5px; margin-top: 5px;" readonly>
                    <button class="btn btn-primary" readonly >submit</button>
            @endguest

            @foreach($comments as $comment)
            <div class="comment-section" style="position: relative; margin-top: 5px; width: 300px">

                <?php
                $conn = new mysqli('localhost', 'root', '', 'simphotos');

                $sql = "SELECT id, name, account_photo FROM users WHERE id = $comment->user_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                         $name = $row["name"];
                         $comment_id = $row["id"];
                         $account_photo = $row['account_photo'];
                    }
                    }
                    $conn->close();
                ?>

                <img src="/storage/images/accounts/{{ $account_photo }}" style="width: 50px; height: 50px; float: left">
                <a href="/user/{{ $comment_id }}"><p style="color: #3490dc; font-weight: bold; margin-left: 5px; position: relative; left: 3px; bottom: 5px">{{ $name }}</p></a>
                <p style="position: relative; bottom: 23px; left: 3px; overflow: hidden;">{{ $comment->value }}</p>

                    @auth
                <?php if( $comment->user_id == Auth::user()->id ){
                    echo '<form action="/comment-delete" method="POST">';

                    } else {
                    echo '';
                    }

                    ?>
                    {{ csrf_field() }}
                    <?php if( $comment->user_id == Auth::user()->id ){
                    echo '<button  name="submit" style="width: 45px; height: 20px; background-color: red; color: white; font-size: 11px;border: 0px; float:right; position: relative; bottom: 60px;">Delete</button>';
                    echo '</form>';
                    } else
                        echo '';
                ?>
                        @endauth


            </div>
            @endforeach
            <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px; width: 79.2%; margin-top: 5px"></h2>

        </div>

    </div>

@endsection


