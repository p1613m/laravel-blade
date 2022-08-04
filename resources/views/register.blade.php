@extends('layout')

@section('content')
<h1>Register</h1>
<form action="{{ route('register-send') }}" method="post">
    @csrf
    <label>Email: <input type="email" name="email" value="{{ old('email') }}"></label> @error('email') {{ $message }} @enderror <br>
    <label>Name: <input type="text" name="name" value="{{ old('name') }}"></label> @error('name') {{ $message }} @enderror <br>
    <label>Password: <input type="password" name="password"> @error('password') {{ $message }} @enderror </label><br>
    <label>Password Repeat: <input type="password" name="password_confirmation"></label><br>
    <input type="submit" value="Register">
</form>
@endsection
