@extends('layouts.app')

@section('title-block')Registration @endsection

@section('content')
<h1>Registration</h1>

<form action="{{ route('user.registration') }}" method="post">
    @csrf

    <div class="form-group mt-3">
        <label for="name">Full name</label>
        <input type="text" name="name" placeholder="Full name" id="name" class="form-control" pattern="[а-яА-ЯЁё- ]*">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="login">Login</label>
        <input type="text" name="login" placeholder="Login" id="login" class="form-control" pattern="[a-zA-Z]*">
        @error('login')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" id="email" class="form-control">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" class="form-control">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="confirm_password">Confirm password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm password" id="confirm_password" class="form-control">
        @error('password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="personal_data" class="form-check-label">Сonsent to the processing of personal data</label>
        <input type="checkbox" name="personal_data" id="personal_data" class="form-check-label" checked>
        @error('personal_data')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success mt-3">Register</button>
</form>
@endsection