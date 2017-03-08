<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    {!! Html::style('assets/plugins/bower_components/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/plugins/bower_components/select2/dist/css/select2.min.css') !!}
    {!! Html::style('assets/plugins/bower_components/select2-bootstrap-theme/dist/select2-bootstrap.min.css') !!}
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Jualan Buku
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    @if (Auth::check())
                        <ul class="nav navbar-nav">
                            <li class="@yield('mhome')"><a href="{{ url('admin/home') }}">Home </a></li>
                            <li class="@yield('mpenjualan')"><a href="{{ url('admin/penjualan') }}">Penjualan</a></li>
                            @if (Auth::user()->akses=="admin")
                            <li class="@yield('muser')"><a href="{{ url('admin/user') }}">User</a></li>
                            <li class="@yield('mdistributor')"><a href="{{ url('admin/distributor') }}">Distributor</a></li>
                            <li class="@yield('mbuku')"><a href="{{ url('admin/buku') }}">Buku</a></li>
                            <li class="@yield('mpasok')"><a href="{{ url('admin/pasok') }}">Pasok</a></li>
                            <li class="@yield('mlaporan')"><a href="{{ url('admin/laporan') }}">Laporan</a></li>
                            {{-- <li class="@yield('mlaporan')"><a href="{{ url('admin/laporan') }}">Laporan</a></li> --}}
                            @endif
                            
                        </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    {!! Html::script('assets/plugins/bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::script('assets/plugins/bower_components/select2/dist/js/select2.min.js') !!}

    @yield('custom-scripts')

</body>
</html>
