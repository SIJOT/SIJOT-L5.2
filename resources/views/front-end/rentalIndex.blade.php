@extends('layouts.front-end')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! url('/') !!}"><span class="fa fa-home"></a></li>
        <li class="active">Verhuur</li>
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
                <h2 style="margin-bottom: -5px;">Verhuur info</h2>
            </div>

            <p>
                Onze Lokalen zijn het hele jaar te huur voor verenigingen.<br>
                Of je een kampplaats in een mooie, avontuurlijke omgeving met speelterrein voor kinderen;<br>
                een overnachtings plaats zoekt, of ...! We zijn rustig gelegen nabij het stadspark van Turnhout.
            </p>

            {{-- Photo's --}}
            <div class="row">
                <div class="col-md-6">
                    <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="/img/1.jpg" alt="">
                </div>

                <div class="col-md-6">
                    <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="/img/2.jpg" alt="">
                </div>
            </div>
            {{-- /// --}}

            <p style="margin-top: 7px;">
                Onze lokalen Bestaan uit 2 Blokken. Waarin 1 grote zaal en 5 lokalen en sanitaire blok gevestigd zijn. De grote zaal is<br>
                Polyvalente. Verder is er ook nog een keuken. Deze keuken is voorzien 2 gasfornuizen, friet ketel ,keuken eilend, enz...
            </p>

            {{-- Photo's --}}
            <div class="row">
                <div class="col-md-6">
                    <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="/img/3.jpg" alt="">
                </div>

                <div class="col-md-6">
                    <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="/img/4.jpg" alt="">
                </div>
            </div>
            {{-- /// --}}

            <p style="margin-top: 7px;">
                In alle gebouwen is er verwarming aanwezig. Aan de gebouwen grenst er zich een groot grasveld, bos, vuurplaats<br>
                + u bevindt zich op wandel afstand van het stadspark. U hoeft ook echter 2 km te rijden voor zich u aan een<br>
                supermarkt bevind.
            </p>
        </div>
    </div>
@endsection
