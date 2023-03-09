<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Sweet Alert -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
       <!-- Fonte do Google -->
       <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

       <!-- CSS Bootstrap -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

       <!-- CSS da aplicação -->
       <link rel="stylesheet" href="/css/style.css">
       <script src="/js/script.js"></script>
        <title>@yield('title')</title>

    </head>
    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                  <a href="/" class="navbar-brand">
                    <img src="/img/hdcevents_logo.svg" alt="HDC Events">
                  </a>
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="/" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-item">
                      <a href="/events/create" class="nav-link">Criar Eventos</a>
                    </li>
                    @auth
                    <li class="nav-item">
                      <a href="/dashboard" class="nav-link">Meus eventos</a>
                    </li>
                    <li class="nav-item">
                      <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout"
                          class="nav-link"
                          onclick="event.preventDefault();
                          this.closest('form').submit();">
                          Sair
                        </a>
                      </form>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link d-flex flex-column justify-content-center align-items-center" style="margin-left:3em;">
                        <ion-icon name="person-outline" style="scale: 1.5;margin-bottom:5px"></ion-icon>
                        {{ auth()->user()->name }}
                      </a>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                      <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                      <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    @endguest
                  </ul>
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
            <p>HDC Events &copy; 2023  by Tiago Pessoa</p>
        </footer>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    </body>
</html>

