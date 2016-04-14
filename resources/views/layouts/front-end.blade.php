<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="fb:app_id" content="472828642867079">

        {{-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --}}
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}

        <title>SIJOT</title>

        <link href="{!! asset('css/app.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/frontend.css') !!}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="http://fonts.googleapis.com/css?family=Allan:700" rel="stylesheet" type="text/css">

        @if(Request::is('verhuur/aanvraag'))
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css">
        @endif

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body style="padding-top: 70px;" class="background">

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand font-heading" href="{!! url('/') !!}">Sint-Joris</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="Icon-color fa fa-leaf"></span>
                                Takken
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{!! route('takken.specific', ['id' => 'kapoenen']) !!}">
                                        <span class="fa fa-chevron-right"></span> De Kapoenen
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! route('takken.specific', ['id' => 'welpen']) !!}">
                                        <span class="fa fa-chevron-right"></span>
                                        De Welpen
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! route('takken.specific', ['id' => 'jonggivers']) !!}">
                                        <span class="fa fa-chevron-right"></span> De Jong-Givers
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! route('takken.specific', ['id' => 'givers']) !!}">
                                        <span class="fa fa-chevron-right"></span> De Givers
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! route('takken.specific', ['id' => 'jins']) !!}">
                                        <span class="fa fa-chevron-right"></span> De Jins
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! route('takken.specific', ['id' => 'leiding']) !!}">
                                        <span class="fa fa-chevron-right"></span> De Leiding
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{!! route('rental.index') !!}">
                                <span class="Icon-color fa fa-home"></span>
                                Verhuur
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="Icon-color fa fa-camera-retro"></span>
                                Foto's
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="Icon-color fa fa-file-text-o"></span>
                                Planning
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">
                                <span class="fa fa-info-circle Icon-color"></span> Info
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://groepsadmin.scoutsengidsenvlaanderen.be/groepsadmin/lidworden?groep=A4102G">
                                        Lid worden
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <span class="Icon-color fa fa-envelope"></span>
                                Contact
                            </a>
                        </li>
                    </ul>

                    @if(Auth::check())
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{!! route('backend.home') !!}">
                                    <span class="Icon-color fa fa-cogs"></span>
                                    Backend
                                </a>
                            </li>
                            <li>
                                <a href="{!! url('logout') !!}">
                                    <span class="Icon-color fa fa-sign-out"></span>
                                    Uitloggen
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>{{--/.nav-collapse --}}
            </div>
        </nav>

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @yield('breadcrumb')
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    @yield('sidenav')
                </div>

                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    @yield('content')
                </div>
            </div>

        </div>{{-- /.container --}}

        {{-- Footer --}}
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                        <p class="footer-heading"><strong> Over ons: </strong></p>

                        <ul class="list-unstyled">
                            <li><a href="http://www.st-joris-turnhout.be/verhuur"><span class="fa fa-btn fa-home"></span> Verhuur</a></li>
                            <li><a href="https://www.facebook.com/groups/199692210159738/"><span class="fa fa-btn fa-facebook-official"></span> Facebook </a></li>
                            <li><a href="mailto:contact@st-jors-turnhout.be"><span class="fa fa-btn-contact fa-envelope"></span> Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                        <p class="footer-heading"><strong> Nuttige Links: </strong></p>

                        <ul class="list-unstyled">
                            <li><a href="https://www.scoutsengidsenvlaanderen.be">Het verbond</a></li>
                            <li><a href="https://www.hopper.be">Den Hopper</a></li>
                            <li><a href="http://wwww.st-joris-turnhout.be/backend">Inloggen</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-8">
                        <p class="footer-heading"><strong>Wanneer?</strong></p>

                        <p class="info-text-footer">
                            Wij hebben elke zondag van de maand vergadering vanaf September tot Juni. Deze vergadering gaan door tussen, <br>
                            2u en 5u. Buiten de laatste zondag van de maand.  Dan gaan de vergaderingen door vanaf 9u tot 5u.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <hr class="divider">

                        <div class="margin-fix">
                            <div class="pull-left">
						<span class="info-text-footer">
							© Scouts en Gidsen - Sint-Joris, Turnhout.
						</span>
                            </div>

                            <div class="pull-right">
                                <a href="" class="hyperlink-footer">NL</a>
                                <span class="devider">|</span>
                                <a href="" class="hyperlink-footer">EN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        {{-- Bootstrap core JavaScript --}}
        {{-- ================================================== --}}
        {{-- Placed at the end of the document so the pages load faster --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>

        @if(Request::is('verhuur/aanvraag'))
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/locales/bootstrap-datepicker.nl-BE.min.js" charset="UTF-8"></script>

            <script>
                $(document).ready(function() {
                    $('#datepicker1').datepicker({language: 'nl-BE', clearBtn: true});
                    $('#datepicker2').datepicker({language: 'nl-BE', clearBtn: true});

                });
            </script>
        @endif
    </body>
</html>
