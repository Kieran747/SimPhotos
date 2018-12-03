@extends('layouts.app')

@section('content')

<div class="container" style="width: 800px; height: 400px; border: 1px solid black">
    <form name="update" action="/account-photo" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
                <input type="file" name="file">
        <input type="hidden" value="{{ Auth::user()->id }}" name="id">
        <button name="submit" class="btn btn-primary">upload</button>
    </form>
</div>

@endsection
