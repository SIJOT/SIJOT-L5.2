@extends('layouts.front-end')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <a href="{!! url('/') !!}">
                <span class="fa fa-home"></span>
            </a>
        </li>

        <li class="active">Het ontbijt inschrijving</li>
    </ol>
@endsection

@section('sidenav')
    <div class="panel panel-default border">
        <div class="panel-heading">Het ontbijt:</div>
        <div class="list-group">
            <a class="list-group-item" href="{!! route('breakfast.index') !!}">
                Ontbijt op het groen
            </a>
            <a class="list-group-item" href=" {!! route('breakfast.subscription') !!}">
                Inschrijven
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel panel-default border">
        <div class="panel-body">

            <div style="margin-top: -20px;" class="page-header">
                <h2 style="margin-bottom: -5px;">Inschrijving ontbijt</h2>
            </div>

            <form method="POST" action="">
                <label for="01">
                    Naam:
                    <span class="text-danger">*</span>
                </label>
                <input class="form-control" style="width: 35%;" placeholder="Achternaam" name="Naam" id="01">
                <br>

                <label for="02">
                    Voornaam:
                    <span class="text-danger">*</span>
                </label>
                <input class="form-control" style="width: 35%;" placeholder="Voornaam" name="Voornaam" id="02">
                <br>

                <label for="03">
                    E-mail adres:
                    <span class="text-danger">*</span>
                </label>
                <input class="form-control" style="width: 35%;" placeholder="Voorbeeld@domein.be" name="Email" id="03">
                <br>

                <label for="04"> Maand </label>
                <select style="width: 35%;" class="form-control" id="04" name="Maand">
                    <option value=""></option>
                </select>
                <br>

                <label for="05">
                    Personen:
                    <span class="text-danger">*</span>
                </label>
                <input class="form-control" style="width: 10%;" placeholder="Aantal personen" value="1" name="Personen" id="05">
                <br>

                <button type="submit" class="btn btn-success">Inschrijven</button>
                <button type="reset" class="btn btn-danger">Reset formulier</button>
            </form>
        </div>
    </div>
@endsection