@extends('layout')
@section('title', 'Admin Page')
@section('content')
    <div>
        <form action="{{ route('adminPost') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px"
            id="loginForm">
            @csrf
            <div class="mb-3">
                <label for="form-label">Username</label>
                <input type="name" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <!-- Submit button for the form -->
            <button type="submit" class="btn btn-primary" onclick="validateForm()">Submit</button>
        </form>
    </div>
@endsection
