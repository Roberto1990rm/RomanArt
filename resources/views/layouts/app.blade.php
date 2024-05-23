<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    
    
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <span style="font-size: 60px;" class="brand-word-1">J.Román</span>
                    <span style="font-size: 35px;" class="brand-word-2">Art</span>
                </a>
                
                <button class="custom-toggler" type="button" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="custom-toggler-icon"></div>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-1" href="/">Home</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link nav-link-2" href="{{ route('artworks.index') }}">Gallery</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link nav-link-3" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-4" href="{{ route('contact') }}">Contact</a>
                            
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item d-lg-block" style="margin-right: 20px;"> <!-- Solo visible en pantallas grandes -->
                            <a style="color: black; font-size: 10px; background-color: azure;" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                                        {{ __('Logout') }}
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
        
    </header>
    <div class="circle" style="left: 20%;"></div>
    <div class="circle" style="left: 50%; animation-delay: 1s;"></div>
    <div class="circle" style="left: 80%; animation-delay: 2s;"></div>
    <main>
       
        @yield('content')
        
    </main>

    <footer>
        <div class="footer-container">
            <p>&copy; {{ date('Y') }} José Román Ramírez. Todos los derechos reservados.</p>
            <p style="margin-right: 10px;"><a href="/contact">Contáctanos</a></p>
        </div>
    </footer>
    

    <script src="{{ asset('js/app.js') }}"></script>
   <script>
  document.querySelector('.custom-toggler').addEventListener('click', function() {
    this.classList.toggle('active'); // Añade o elimina la clase 'active' en cada clic
    var expanded = this.getAttribute('aria-expanded') === 'true' || false;
    this.setAttribute('aria-expanded', !expanded);
    document.getElementById('navbarNav').classList.toggle('show'); // Asegúrate de que tu menú tiene esta clase para mostrar/ocultar
});
   </script>
</body>
</html>
