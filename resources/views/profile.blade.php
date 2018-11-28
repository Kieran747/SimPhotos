@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profile-info">
            <h2>{{ $user->name }}</h2>
        </div>
    </div>
@endsection
