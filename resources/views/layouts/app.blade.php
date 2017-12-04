<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- VENDOR CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/linearicons/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/chartist/css/chartist-custom.css') }}" rel="stylesheet">
    <!-- MAIN CSS -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- GOOGLE FONTS -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700') }}"
          rel="stylesheet">

    <!-- This is the localization file of the grid controlling messages, labels, etc.
<!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
    {{--<link rel="stylesheet" type="text/css" media="screen" href="jqGrid/css/ui.jqgrid.css"/>--}}
    <link rel="stylesheet" type="text/css" media="screen" href="jqGrid/css/ui.jqgrid-bootstrap-ui.css"/>
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>

    <!-- The link to the CSS that the grid needs -->
    <link rel="stylesheet" type="text/css" media="screen" href="jqGrid/js/trirand/ui.jqgrid.css"/>

    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
    <link rel="stylesheet" type="text/css" media="screen" href="jqGrid/css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.datepicker.css" />
</head>
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="/"><img src="" alt="ABZ-Agency-test" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false" aria-haspopup="true">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endguest
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i>
                            <span>Employees list</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                <li><a href="/" class="">Hierarchy</a></li>
                                <li><a href="/main" class="">Detailed info</a></li>
                                <li><a href="/detailed-with-hierarchy" class="">Detailed info with hierarchy</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
@yield('content')
<!-- END MAIN -->
    {{--<div class="clearfix"></div>--}}
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All
                Rights Reserved.</p>
        </div>
    </footer>
</div>

<!-- Javascript -->
<!-- 1.-->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>

<!-- 2. Подключить скрипт moment-with-locales.min.js для работы с датами -->
<script type="text/javascript" src="js/moment-with-locales.min.js"></script>

<!-- 4. Подключить скрипт виджета "Bootstrap datetimepicker" -->
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

<!-- We support more than 40 localizations -->
<script type="text/ecmascript" src="jqGrid/js/i18n/grid.locale-en.js"></script>
<!-- This is the Javascript file of jqGrid -->
<script type="text/ecmascript" src="jqGrid/js/jquery.jqGrid.min.js"></script>
<script type="text/javascript" src="jqGrid/js/grid.common.js"></script>
<script src="../js/detailed-with-hierarchy.js"></script>
<script src="../js/employees.js"></script>
<script src="../js/employees-info.js"></script>

<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>


</body>
</html>