@extends('layouts.front-end')

@section('breadcrumb')
    <ol class="breadcrumb border">
        <li><a href="{!! url('.') !!}"><span class="fa fa-home"></span></a></li>
        <li><a href="{!! route('rental.index') !!}">Verhuur</a></li>
        <li class="active">Kalender</li>
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
                <h2 style="margin-bottom: -5px;">Verhuur kalender</h2>
            </div>

            <p>
                Hier vind u wanner onze lokalen al reeds verhuurd zijn.
                Vind u hier de datum niet dat u onze lokalen wilt huren leg dan snel je datum vast.
                Dat doe je door dit <a href="{!! route('rental.request') !!}">formulier</a> in te vullen..
            </p>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    @if(count($rentals) == 0)
                        <div class="alert alert-danger">
                            Er zijn geen verhuringen.
                        </div>
                    @else
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>Start datum</th>
                                <th>Eind datum</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rentals as $rental)
                                <tr>
                                    <td>{!! $rental->Start_date !!}</td>
                                    <td>{!! $rental->End_date !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
