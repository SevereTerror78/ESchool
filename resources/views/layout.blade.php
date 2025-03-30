<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autók</title>
 
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/cars.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script> 

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Quicksand&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
 
<body>
    <header>
        <div>
        </div>
        <div class="row">
            <nav>
                <ul>
                    <li><a href="{{ route('SchoolClass.index') }}">year</a></li>
                    <li><a href="{{ route('subject.index') }}">Subject</a></li>
                    <li><a href="{{ route('student.index') }}">Student</a></li>
                    <li><a href="{{ route('mark.index') }}">Mark</a></li>
                    <!--<li><a href="{{ route('dashboard') }}">Dashboard</a></li>-->
                    @if (auth()->check())
                    <li>
                        <form action="{{ route('logout') }}"method="post">
                            @csrf
                            <button type="submit">Logout {{ auth()->user()->name }}</button>
                        </form>
                        
                    </li>
                    @else  
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endif
                    
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Barna Levente.</p>
    </footer>
    <div class="auth-buttons">
        @guest
            <a href="{{ route('login') }}">
                <button>Bejelentkezés</button>
            </a>
            <a href="{{ route('register') }}">
                <button>Regisztráció</button>
            </a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Kijelentkezés</button>
            </form>
        @endauth
    </div>
 
</body>
 
</html>
