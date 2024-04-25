@extends('layout')
@section('title', 'Events')
@section('content')

    <div class="card" style="width: 18rem;">
        <img src="https://pbs.twimg.com/media/GLVUbhcbEAA_Yay?format=jpg&name=large" class="card-img-top" alt="..." style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold; color: #333;">CSE</h5>
            <p class="card-text" style="color: #000000;">CSE event for * *, Click the link to register</p>
            <a href="{{ route('registrationPost') }}" class="btn btn-primary">Register now</a>
        </div>
    </div>

@endsection
