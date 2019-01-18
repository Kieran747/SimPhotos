@extends('layouts.app')

@section('content')

    <?php $result_number = '0' ?>

    <div class="container">
        @foreach($results as $result)

            <?php $result_number = $result_number + '1'?>

            @endforeach

        <p>Search results({{ $result_number }})</p>

        @foreach($results as $result)
        <div class="result" style="width: 100%; height: 180px;">

            <a href="/photo/{{ $result->id }}"><img style="position: relative; width: 295px; height: 166px; float: left" src="/storage/images/{{ $result->link }}" ></a>
            <div style="position: relative; float: left; margin-left: 5px">
                <p style="margin-bottom: 0px">Airline: <em style="color: #1d68a7; font-weight: bold; "> <a href="/airline/{{ $result->airline }}">{{ $result->airline }}</a> </em> </p>
                <p style="margin-bottom: 0px">Reg: <em style="color: #1d68a7; font-weight: bold; "> <a href="/registration/{{ $result->registration }}">{{ $result->registration }}</a> </em> </p>
                <p style="margin-bottom: 0px">SELCAL: <em style="color: #1d68a7; font-weight: bold; "> <a href="/SELCAL/{{ $result->SELCAL }}">{{ $result->SELCAL }}</a> </em> </p>

                <?php
                $status = $result->status;
                if( $status == 'airborn') {
                    $country = $result->country;
                    print ' <p style="margin-bottom: 0px">Overhead: <em style="color: #1d68a7; font-weight: bold; "> '. $result->country . '</em> </p>' ;
                } elseif ( $status == 'ground') {
                    $airport = $result->airport;
                    print '<p style="margin-bottom: 0px">Airport: <em style="color: #1d68a7; font-weight: bold; "> <a href="/airport/' . $result->airport . '">' . $result->airport . '</a> </em> </p>';
                }
                ?>



                <p style="margin-bottom: 0px">Uploaded: <em style="color: #1d68a7; font-weight: bold; ">{{ $result->created_at }} </em> </p>
                <div style="width: 300px; height: 180px; position: absolute; top: 0px; left: 200px;">

                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'simphotos');

                    $sql = "SELECT id, name, account_photo FROM users WHERE id = $result->user";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $name = $row["name"];
                            $comment_id = $row["id"];
                            $user_id = $row["id"];
                            $account_photo = $row['account_photo'];
                        }
                    }
                    $conn->close();
                    ?>

                    <p style="margin-bottom: 0px">By: <em style="color: #1d68a7; font-weight: bold; "> <a href="/user/{{ $user_id }}">{{ $name }}</a> </em> </p>
                </div>

            </div>
        </div>
            <h2 class="head" style="border-bottom: 1px solid #282828; font-size: 20px; backgroun-color: grey"></h2>

            @endforeach
    </div>

@endsection
