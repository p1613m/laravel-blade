@extends('layout')

@section('content')
<h1>Auth</h1>
<form action="{{ route('auth-send') }}" method="post">
    @csrf
    <label>Email: <input type="email" name="email"></label> @error('email') {{ $message }} @enderror<br>
    <label>Password: <input type="password" name="password"></label> @error('password') {{ $message }} @enderror<br>
    <input type="submit" value="Auth">
</form>
@endsection
