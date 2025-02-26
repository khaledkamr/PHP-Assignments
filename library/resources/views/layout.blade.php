<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield("css")
</head>
<body>
    <nav>
        <ul>
            @guest
                
                <li><a href="{{route('registerForm')}}">Register</a></li>
                <li><a href="{{route('loginForm')}}">login</a></li>
            @endguest
            @auth
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
    @yield("content")
    @yield("js")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>