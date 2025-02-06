<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color:rgb(10, 9, 9); 
            color: white;
        }
        .navbar {
            background-color: #1c1c1c;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.3rem;
        }
        .card {
            background-color:rgb(64, 64, 64);
            color: white;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.1);
        }
        .form-control {
            background-color:rgb(89, 89, 89);
            border: none;
            color: white;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .btn-primary {
            background-color:rgb(7, 7, 7);
            border: none;
        }
        .btn-danger {
            background-color:rgb(254, 0, 0);
        }
        .btn-primary:hover, .btn-danger:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark px-4">
        <a class="navbar-brand text-white" href="{{ route('posts.index') }}">
            NMU CSE Blog
        </a>

        <div class="ms-auto d-flex align-items-center">
            @auth
                <span class="text-white me-3">Welcome, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @else
                <a href="{{ route('login.form') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register.form') }}" class="btn btn-primary">Register</a>
            @endauth
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
