<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        {{-- Fonte do Google --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

        {{-- BootsTrap 5 --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        {{-- CSS da Aplicação --}}
        <link rel="stylesheet" href="/css/style.css">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="navbar">
                  <a class="navbar-brand" href="/">
                    <img src="/img/linux.png" alt="Linux">
                  </a>
                  <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav me-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Eventos</a>
                      </li>

                      @auth
                        <li class="nav-item">
                          <a class="nav-link" href="/events/create">Criar Evento</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link" href="/dashboard">Meus eventos</a>
                        </li>

                        <li class="nav-item">
                          <form action="/logout" method="POST">
                            @csrf
                              <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                          </form>
                        </li>
                      @endauth

                      @guest
                        <li class="nav-item">
                          <a class="nav-link" href="/login">Entrar</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link" href="/register">Cadastrar</a>
                        </li>
                      @endguest
                    </ul>
                  </div>
                </div>
              </nav>
        </header>

        <main>
          <div class="container-fluid">
            <div class="row">
              @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
              @endif

              @yield('content')
            </div>
          </div>
        </main>

        <footer>
            <p>PoktWeb &copy; 2024</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>
