@extends('layouts.front-end')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <a href="{!! url('/') !!}">
                <span class="fa fa-home"></span>
            </a>
        </li>

        <li class="active">Het ontbijt</li>
    </ol>
@endsection

@section('sidenav')
    <div class="panel panel-default border">
        <div class="panel-heading">Het ontbijt:</div>
        <div class="list-group">
            <a class="list-group-item" href="{!! route('breakfast.index') !!}">
                 Ontbijt op het groen
            </a>
            <a class="list-group-item" href=" {!! route('breakfast.index') !!}">
                Inschrijven
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel panel-default border">
        <div class="panel-body">

            <div style="margin-top: -20px;" class="page-header">
                <h2 style="margin-bottom: -5px;">
                    Ontbijt op het groen
                    <small>elke laatste zondag van de maand.</small>
                </h2>
            </div>

            <p class="lead">Beste scouts en gidsen vrienden.</p>

            <p>
                Op elke laatste zondag organiseren we ons maandelijks ontbijt op het groen. Allen welkom!
                Wij beginnen om 9 uur. Liest inschrijven voor vrijdag. Betreffende de week waar de laatste
                zondag inzit. Het betalen voor het ontbijt doet u terplaatse. Gelieve aan de toog te betalen bij het binnenkomen.
                Wij hopen dat u met zijn allen aanwezig zult zijn, zodat we elkaar beter leren kennen.
            </p>

            <p>
                Het ontbijt bestaat uit maar liefst 1 pistolet met kaas en 1 met hesp + 1 koffiekoek, en de koffie en of chocomelk
                krijgt u er uiteraard ook nog bij
            </p>

            <p>
                Heerlijk smullen en smakelijk. En dit alles aan de prijs van 3 euro per persoon. Indien u wilt komen ontbijten. <br />
                Kunt u zich <a href="">Hier inschrijven</a>
            </p>
        </div>
    </div>
@endsection