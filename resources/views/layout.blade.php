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
    <a href="#"><b>Blog</b></a> |
    <a href="#">Create Post</a> |
    <a href="#">My Posts</a> |
    <a href="#">Register</a> |
    <a href="#">Login</a> |
    <a href="#">Logout</a>
</nav>

@yield('content')

<footer>
    &copy; My Blog 2022
</footer>
</body>
</html>
