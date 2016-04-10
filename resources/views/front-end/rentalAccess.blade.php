@extends('layouts.front-end')

@section('breadcrumb')
    <ol class="breadcrumb border">
        <li><a href="{!! url('.') !!}"><span class="fa fa-home"></span></a></li>
        <li><a href="{!! route('rental.index') !!}">Verhuur</a></li>
        <li class="active">Bereikbaarheid</li>
    </ol>
@endsection

@section('sidenav')
    <div class="panel panel-default border">
        <div class="panel-heading">Menu:</div>
        <div class="list-group">
            <a class="list-group-item" href="{!! route('rental.index') !!}">
                <span class="fa fa-info-circle"></span> Info
            </a>
            <a class="list-group-item" href="{!! route('rental.access') !!}">
                <span class="fa fa-asterisk"></span> Bereikbaarheid
            </a>
            <a class="list-group-item" href="{!! route('rental.calendar') !!}">
                <span class="fa fa-calendar"></span> Verhuur kalender
            </a>
            <a class="list-group-item" href="{!! route('rental.request') !!}">
                <span class="fa fa-plus"></span> Verhuring aanvragen
            </a>
            <a class="list-group-item" href="mailto:">
                <span class="fa fa-envelope"></span> Contact
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel panel-default border">
        <div class="panel-body">

            <div style="margin-top: -20px;" class="page-header">
                <h2 style="margin-bottom: -5px;">Bereikbaarheid</h2>
            </div>

            <h4>Openbaar vervoer:</h4>

            <p>
                U kunt de trein of bus naar turnhout nemen. En vervolgens kunt met de bus verder
                naar de scoutsdomeinen. (Sint-Jorislaan 11). De bus die u kunt nemen heeft de nr 2.
                vervolgens stapt u af aan in de rozenlaan. En vanaf daar is het nog slechts 500 meter wandelen.
            </p>

            <h4>Eigen vervoer:</h4>

            <p>
                - Neem de E34 afslag 24 Turnhout-centrum. <br>
                - Neem vervolgens de N19 richting Steenweg op Zevendonk.v <br>
                - Sla vervolgens Steenweg op Zevendonk in. <br>
                - Sla vervolgens de Sint-Jorislaan in <br>

            </p>
        </div>
    </div>
@endsection
