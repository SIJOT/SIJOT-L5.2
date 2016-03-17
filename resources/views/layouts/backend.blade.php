<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin-red.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{!! route('backend.home') !!}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>SIJOT</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="user user-menu">
                        <a href="#">
                            <img src="@if(! empty(Auth::user()->image)) {!! '/assets/img/profile/' . Auth::user()->image !!} @else http://placehold.it/160x160 @endif" class="user-image" alt="User Image">
                            <span class="hidden-xs"> {{ Auth::user()->name }} </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="@if(! empty(Auth::user()->image)) {!! '/assets/img/profile/' . Auth::user()->image !!} @else http://placehold.it/160x160 @endif" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name  }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">NAVIGATIE</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-home"></i>
                        <span>Verhuur</span>
                        <span class="label label-danger pull-right">{{ $rentalCount }}</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('backend.rental.overview', ['type' => 'all']) }}">
                                <i class="fa fa-circle-o"></i> Overzicht
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backend.rental.overview', ['type' => 'new']) }}">
                                <i class="fa fa-circle-o @if($rentalNew > 0) text-red @endif"></i> Nieuwe aanvragen
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backend.rental.overview', ['type' => 'option']) }}">
                                <i class="fa fa-circle-o @if($rentalOption > 0) text-red @endif"></i> Verhuring opties</a>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backend.rental.insert') }}">
                                <i class="fa fa-circle-o"></i> Verhuring toevoegen
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Gebruikers</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{!! route('backend.users.overview') !!}"><i class="fa fa-circle-o"></i> Gebruikers overzicht</a></li>
                        <li>
                            <a href="{!! route('backend.users.insert') !!}">
                                <i class="fa fa-circle-o"></i> Nieuwe gebruiker
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href=""> <i class="fa fa-cloud"></i> <span>De cloud</span></a>
                </li>
                <li>
                    <a href="{{ route('backend.groups.view') }}">
                        <i class="fa fa-leaf"></i> <span>Takken</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('profile.edit.view') !!}"><i class="fa fa-cogs"></i> <span>Wijzig profiel</span></a>
                </li>
                <li>
                    <a href="{!! url('/logout') !!}"><i class="fa fa-sign-out"></i> <span>Uitloggen</span></a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} Tim Joosten.</strong> All rights
        reserved.
    </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/fastclick.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>
</body>
</html>
