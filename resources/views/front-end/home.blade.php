<!DOCTYPE html>
<html><head>
    <title>Index</title>

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css">
    <link href="http://fonts.googleapis.com/css?family=Allan:700" rel="stylesheet" type="text/css">

    <style type="text/css">
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }

        .marketing .col-lg-4 {
            margin-bottom: 20px;
            text-align: center;
        }

        .marketing h2 {
            font-weight: normal;
        }

        .marketing .col-lg-4 p {
            margin-right: 10px;
            margin-left: 10px;
        }

        .Icon-color,
        .Title-color {
            color: #bdd732;
        }

        .font-heading {
            font-family: Allan, helvetica, arial, sans-serif;
            font-size: 22px;
        }
    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand font-heading" href="{!! route('home') !!}">Sint-Joris</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{!! route('takken.index') !!}">
                        <span class="fa fa-leaf Icon-color"></span> Takken
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{!! route('takken.specific', ['id' => 'kapoenen']) !!}"><span class="fa fa-chevron-right"></span> De Kapoenen</a></li>
                        <li><a href="{!! route('takken.specific', ['id' => 'welpen']) !!}"><span class="fa fa-chevron-right"></span> De Welpen</a></li>
                        <li><a href="{!! route('takken.specific', ['id' => 'jonggivers']) !!}"><span class="fa fa-chevron-right"></span> De Jong-givers</a></li>
                        <li><a href="{!! route('takken.specific', ['id' => 'givers']) !!}"><span class="fa fa-chevron-right"></span> De Givers</a></li>
                        <li><a href="{!! route('takken.specific', ['id' => 'jins']) !!}"><span class="fa fa-chevron-right"></span> De Jins</a></li>
                        <li><a href="{!! route('takken.specific', ['id' => 'leiding']) !!}"><span class="fa fa-chevron-right"></span> De Leiding</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{!! route('rental.index') !!}">
                        <span class="fa fa-home Icon-color"></span> Verhuur
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="fa fa-camera-retro Icon-color"></span> Foto's
                    </a>
                </li>

                <li>
                    <a href="/assets/files/Planning.pdf">
                        <span class="fa fa-file-text-o Icon-color"></span> Planning
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
                    <a href="mailto:">
                        <span class="fa fa-envelope Icon-color"></span> Contact
                    </a>
                </li>
            </ul>

        </div>{{--/.navbar-collapse --}}
    </div>
</div>
<img style="margin-bottom: 60px; width: 100%; height: 400px;" src="/assets/img/front.jpg">

<div class="container marketing">
    <div class="row">
        <div class="col-lg-4">
            <img class="img-thumbnail img-circle" src="/assets/img/front-2.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h2 class="font-heading">Ontbijt!</h2>
            <p>Elke laatste zondag  van de maand! Doe onze scouts een ontbijt. Een ontbijt waar u als u wilt aanwezig kunt zijn met uw kinderen. Dit vind plaats op de scouts gronden U zicht enkel in te schrijven. Hier voor kunt u voorlopig terecht bij Leo Willems.  </p>
            <p><a class="btn btn-default" href="{!! route('breakfast.index') !!}">Inschrijven »</a></p>
        </div>
        <div class="col-lg-4">
            <img class="img-thumbnail img-circle" src="/assets/img/front-1.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h2 class="font-heading">Takken</h2>
            <p>Benieuwd in welke tak je zit? Of wil je gewoon je tak-pagina bezoeken? Wel u kunt hem in een paar klikken bezoeken. Want elke tak heeft zijn eigen pagina. Das straf he! Nee helemaal niet! U vind hier ook alle beschrijvingen van takken. </p>
            <p><a class="btn btn-default" href="{!! route('takken.index') !!}">Lees meer »</a></p>
        </div>
        <div class="col-lg-4">
            <img class="img-thumbnail img-circle" src="/assets/img/front-3.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
            <h2 class="font-heading">Verhuur</h2>
            <p>Bent u jeugdbeweging of organisatie die een kamplaats of overnachtingsplaats zoekt? Dan bent u hier aan het juiste adres wij stellen namelijk onze lokalen te huur aan jullie. Indien u geintresseerd bent kunt hier op onze verhuur pagina meer vinden. </p>
            <p><a class="btn btn-default" href="{!! route('rental.index') !!}">Lees meer »</a></p>
        </div>
    </div>
    <hr>
    <footer>
        <p>© 2016 - Sint-Joris Turnhout</p>
    </footer>
</div>

{{-- Javascript in the bottom of the file. --}}
{{-- So the page loads faster --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body></html>
