@extends('layout')
@section('title', 'Admin Page')
@section('content')
    <div>
        <form action="{{ route('adminPost') }}" method="POST" class="admin-form" id="loginForm">
            @csrf
            <div class="admin-form-group">
                <label for="name" class="admin-form-label">Username</label>
                <input type="name" class="admin-form-control" name="name" id="name">
            </div>
            <div class="admin-form-group">
                <label for="password" class="admin-form-label">Password</label>
                <input type="password" class="admin-form-control" name="password" id="password">
            </div>
            <button type="submit" class="admin-btn-submit">Submit</button>
        </form>
    </div>
@endsection
