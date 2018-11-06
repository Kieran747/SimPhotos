@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
        <img src="/storage/images/{{ $photo->link }}" style="width: 100%">
        <h4 style="position: relative; top: 5px; color: grey">Registration</h4>
            <h5 style="color: black; font-weight: bold">{{ $photo->registration }}</h5>
            <h4 style="position: relative; top: 5px; color: grey">Uploaded at </h4>
            <h5 style="color: black; font-weight: bold">{{ $photo->date }}</h5>
            <div class="remarks" style="width: 70%; float: right; position: absolute; top: 702px; left: 550px">
                <h4 style="position: relative; top: 5px; color: grey">Remarks:</h4>

                <p style="color: black; font-weight: bold">{{ $photo->remarks }}</p>
            </div>
    </div>
    </div>
@endsection


