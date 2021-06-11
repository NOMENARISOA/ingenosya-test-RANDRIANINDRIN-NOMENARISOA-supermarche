<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Supermacher</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--notification js -->
    <link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}"/>
    <script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
    <script src="{{asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
    <script src="{{asset('assets/plugins/notifications/js/notification-custom-script.js')}}"></script>
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.js"></script>

    <style>
        @font-face {
            font-family: segouil;
            src: url('{{ asset('assets/font/segoeuil.ttf') }}');
        }
        body{
            font-family: segouil;
            font-weight: 100;
        }
        .side-list{
            list-style-type: none;
            padding: 0;
            width: 100%
        }
        .side-list-item{
            width: 100% ;
            background-color: #FFF;
            padding: 2%
        }
    </style>
</head>
<body>
    @if(session()->has('error'))
        <script>
            $(document).ready(function() {
                Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    icon: 'fa fa-exclamation-triangle',
                    continueDelayOnInactiveTab: false,
                    position: 'center top',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    width: 600,
                    msg:'{{session()->get('error')}}'
                });
            });
        </script>
    @endif
    @if(session()->has('success'))
        <script>
            $(document).ready(function() {
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    icon: 'fa fa-check-circle-o',
                    continueDelayOnInactiveTab: false,
                    position: 'center top',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    width: 600,
                    msg:'{{session()->get('success')}}'
                });

            });
        </script>
    @endif
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color:#0000f0 !important;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: #FFF; font-weight: bold">
                    Supermarcher
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ strtoupper (Auth::user()->name)  }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        <div class="row">
            <div class="col-md-2" style="padding-top: 2%;background-color: #0000f0;padding-right: 0px;">

                <ul class="side-list" style="">
                    @if(Auth::user()->role == 1)
                        <li class="side-list-item">BACKOFFICE</li>
                        <li  class="side-list-item">
                            <a  class="btn" href="{{ route('backoffice.index') }}"> <i class="bi-speedometer2"></i> &nbsp; DashBoard</a>
                        </li>
                    @endif

                    @if(Auth::user()->role == 3)
                        <li class="side-list-item">VENTE</li>
                        <li  class="side-list-item">
                            <a  class="btn" href="{{ route('vente.index') }}"> <i class="bi-list-check"></i> &nbsp; Liste produit</a>
                        </li>
                    @endif
                    @if(Auth::user()->role == 1 || Auth::user()->role == 2 )
                        <li class="side-list-item">STOCK</li>
                        <li class="side-list-item">
                            <a class="btn" href="{{ route('stock.gestion') }}"> <i class="bi-view-list"></i> &nbsp; Gestion Stock</a>
                        </li>
                        <li class="side-list-item">
                            <a class="btn" href="{{ route('stock.produit') }}"> <i class="bi-view-list"></i> &nbsp; Liste Produit </a>
                        </li>
                        <li class="side-list-item">PARAMETRE</li>

                        <li class="side-list-item">
                            <a class="btn" href="{{ route('settings.shop.index') }}"> <i class="bi-view-list"></i> &nbsp; Liste Shop </a>
                        </li>
                        <li class="side-list-item">
                            <a class="btn" href="{{ route('settings.user.index') }}"> <i class="bi-view-list"></i> &nbsp; Liste Utilisateur </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-10" style="padding: 2%">
                @yield('content')
            </div>

        </div>
    </div>
</body>
</html>
