<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PPOB') }}</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{URL::asset('images')}}/icon1.png" />

    <!-- Scripts -->
    <script src="{{ URL::asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

    @stack('css')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b>{{ config('app.name', 'Laravel') }}</b>
                </a>
                
                {{-- @auth
                    <a class="navbar-brand" href="{{ route('home') }}">Home</a>
                    <a class="navbar-brand" href="#">DataPembelian</a>
                    <a class="navbar-brand" href="{{ route('admin.product.index') }}">DataProduk</a>
                    <a class="navbar-brand" href="{{ route('admin.model.index') }}">DataModel</a>
                    
                    @if (auth()->user()->role == 'admin')
                    <a class="navbar-brand" href="{{ route('admin.pegawai') }}">Data Pegawai</a>
                    <a class="navbar-brand" href="{{ route('admin.outlet') }}">Data Outlet</a>
                    @endif
                @endauth --}}

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
                                    <b>{{ Auth::user()->name }}</b>
                                    @if(Auth::user()->avatar != NULL)
                                    <img class="image rounded-circle" src="{{ URL::asset('images/avatar/'.Auth::user()->avatar) }}" alt="profile_image" style="width: 65px;height: 65px; padding: 10px; margin: 0px; ">
                                    @else
                                    <img class="image rounded-circle" src="{{ URL::asset('/images/outlet.jpg') }}" alt="profile_image" style="width: 65px;height: 65px; padding: 10px; margin: 0px; ">
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    @if (auth()->user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                                    <a class="dropdown-item" href="{{ route('admin.pegawai') }}">{{ __('Data Pegawai') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.outlet') }}">{{ __('Data Outlet') }}</a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('admin.data-pulsa') }}">{{ __('Data Pulsa') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.data-paket') }}">{{ __('Data Paket') }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.data-pln') }}">{{ __('Data PLN') }}</a>
                                    @endif

                                    @if (auth()->user()->role == 'operator')
                                    <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('operator.saldo') }}">{{ __('Data Riwayat Outlet') }}</a>
                                    <a class="dropdown-item" href="{{ route('operator.riwayat') }}">{{ __('Data Riwayat Transaksi') }}</a>
                                    <a class="dropdown-item" href="{{ route('operator.request-saldo.index') }}">{{ __('Data Pengajuan Saldo') }}</a>
                                    @endif

                                    @if (auth()->user()->role == 'outlet')
                                    <a class="dropdown-item" href="{{ route('request-saldo.index') }}">Request Saldo</a>
                                    @endif

                                    <hr>

                                    <a href="{{ route('profile.edit') }}" class="dropdown-item">{{ __('Edit Profile') }}</a>
                                    @if (auth()->user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.add.pegawai') }}">Tambah Pegawai</a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('admin.setting-website') }}">{{ __('Setting Website') }}</a>
                                    @endif
                                    
                                    <hr>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }}
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

        <main class="py-4">
            <div class="row ml-2">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    @include('_components.alert')
                </div>
            </div>
            @yield('content')
        </main>
    </div>
    
    @stack('js')

</body>
</html>
