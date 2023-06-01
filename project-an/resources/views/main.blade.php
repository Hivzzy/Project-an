<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') Project AN</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/items.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" type="text/css">
</head>

<body>

    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" style="background-color: #F5B52D; color:#0B0702">CIHAMPELAS HOTEL GROUP</a>
                <a class="navbar-brand hidden" href="">M</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse" style="background-color: #F5B52D">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="{{ url('/data') }}"> <i class="menu-icon fa fa-group"></i>Data Karyawan </a>
                    </li>
                    @if (Auth::user()->role_id != 2)
                        <li>
                            <a href="{{ url('/akun') }}"> <i class="menu-icon ti ti-user"></i>Kelola Akun </a>
                        </li>
                    @endif


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <form action="/user/logout" method="POST">
                            @csrf
                            <button class="menu-icon rounded-left rounded-right btn btn-danger btn-xs">
                                <i class="fa fa-sign-out">&nbsp;</i>
                                Keluar</button>
                        </form>
                    </div>

                </div>
            </div>
            

        </header><!-- /header -->
        @yield('alert')
        
        @yield('breadcrumbs')

        @yield('content')

    </div>
</body>

</html>
