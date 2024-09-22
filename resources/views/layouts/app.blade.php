<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Aplikasi Generated Surat') }} - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Aplikasi Generated Surat') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
{{--                    <a class="nav-link" href="{{ route('templates.index') }}">Templates</a>--}}
                </li>
                <li class="nav-item">
{{--                    <a class="nav-link" href="{{ route('generated_letters.index') }}">Generated Letters</a>--}}
                </li>
                <li class="nav-item">
{{--                    <a class="nav-link" href="{{ route('users.index') }}">Users</a>--}}
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
{{--                        <a class="nav-link" href="{{ route('login') }}">Login</a>--}}
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
{{--                            <a class="nav-link" href="{{ route('register') }}">Register</a>--}}
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mt-4">
    @yield('content')
</div>

<!-- Footer -->
<footer class="text-center py-4">
    <p>&copy; {{ date('Y') }} {{ config('app.name', 'Aplikasi Generated Surat') }}. All rights reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
