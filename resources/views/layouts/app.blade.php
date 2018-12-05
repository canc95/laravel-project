<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ESCORTMODEL.XXX') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/customize.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('/image/title-icon.ico')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('escort.index') }}">
                    <img src="{{asset('/image/nav-brand-logo.png')}}" alt="Brand">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                      @guest

                        @else
                          @hasanyrole ('amministratore')
                          <li class="nav-item dropdown">
                              <a rel="nofollow" class="nav-link dropdown-toggle" href="#" id="dropdown_dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pannello Amministrativo
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @can ('index-plan')
                                  <a rel="nofollow" href="{{route('dashboard.plan.index')}}" class="dropdown-item text-center text-uppercase">Piani</a>
                                @endcan
                                @can ('index-escort')
                                  <a rel="nofollow" href="{{route('dashboard.escort.dashboard')}}" class="dropdown-item text-center text-uppercase">Scorta</a>
                                @endcan
                                @can ('index-country')
                                  <a rel="nofollow" href="{{route('dashboard.country.index')}}" class="dropdown-item text-center text-uppercase">Paesi</a>
                                @endcan
                                @can ('index-state')
                                  <a rel="nofollow" href="{{route('dashboard.state.index')}}" class="dropdown-item text-center text-uppercase">Stati</a>
                                @endcan
                                @can ('index-advertising')
                                  <a rel="nofollow" href="{{route('advertising.index')}}" class="dropdown-item text-center text-uppercase">Pubblicità</a>
                                @endcan
                                <div class="dropdown-divider"></div>
                                @can ('index-user')
                                  <a rel="nofollow" href="{{route('user.index')}}" class="dropdown-item text-center text-uppercase">Utenti</a>
                                @endcan
                              </div>
                            </li>
                          @endhasanyrole
                          @hasanyrole ('ospite')
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.plan.pickplan')}}">Inserisci annuncio.</a>
                          </li>
                          @endhasanyrole
                      @endguest

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Accesso') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrare') }}</a>
                            </li>
                        @else
                          @hasanyrole('escorta')
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('my.escorts', Auth::user()->id)}}"> My Escorts</a>
                          </li>
                          @endhasanyrole
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Disconnettersi') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
