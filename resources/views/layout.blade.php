<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Blog')</title>
</head>
<body>
<nav>
    <a href="{{ route('home') }}"><b>Blog</b></a> |
    @auth
        <a href="#">Create Post</a> |
        <a href="#">My Posts</a> |
        <a href="{{ route('logout') }}">Logout</a>
    @endauth
    @guest
        <a href="{{ route('register') }}">Register</a> |
        <a href="{{ route('auth') }}">Login</a>
    @endguest
</nav>

@yield('content')

<footer>
    &copy; My Blog 2022
</footer>
</body>
</html>
