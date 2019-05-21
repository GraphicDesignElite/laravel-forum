<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>PageName | {{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png"> 
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
        <link rel="manifest" href="/img/favicons/site.webmanifest">
        <link rel="mask-icon" href="/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/img/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="/img/favicons/browserconfig.xml">
        <meta name="google-site-verification" content="c-am3HNN1LeLeLyvm00_ZbnQ0HFSk7kf2qk8BeWkdhw" />
        <meta name="msvalidate.01" content="D217ECA34453376753F21846ECCD21B0" />
        <meta name="theme-color" content="#ffffff">

        <meta property="og:title" content="">
        <meta property="og:description" content="">
        <meta property="og:image" content="">
        <meta property="og:url" content="">
        <meta name="twitter:card" content="summary_large_image">
        <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">
        <meta name="twitter:image:alt" content="{{ config('app.name', 'Laravel') }}">

        <link rel="canonical" href="https://capitaldistricttherapy.com" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Open+Sans:400,700" rel="stylesheet">
        <meta name="robots" content="noindex">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        @include('partials.server-error-message')
        <div class="wrapper">
            <aside id="sidebar">
                sidebar
            </aside>
            <main id="page-content">
                <nav class="navbar navbar-expand-md navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
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
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->username }} <span class="caret"></span>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            @if (Auth::user()->isAdmin())      
                                                <a class="dropdown-item" href="/topics/create">Create a Topic</a>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
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
                @yield('content')
            </main>
        </div>
    </div>

    <script src="/js/app.js"></script> 
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height:200,
                linkTargetBlank: false,
                
            });

        });
    </script>
</body>
</html>
