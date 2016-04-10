@extends('layouts.front-end')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{!! url('/')!!}"><span class="fa fa-home"></span></a></li>
        <li class="active">Takken</li>
    </ol>
@endsection

@section('sidenav')
    <div class="panel panel-default border">
        <div class="panel-heading">Takken</div>

        <div class="list-group">
            @foreach($all as $tak)
                <a class="list-group-item" href="{{ url('tak/'. $tak->Uri) }}">
                    {!! $tak->title !!}
                </a>
            @endforeach
        </div>
    </div>
@endsection

@section('content')
        <div class="panel panel-default border">
            <div class="panel-body">

                <div style="margin-top: -20px;" class="page-header">
                    <h2 style="margin-bottom: -5px;">Takken:</h2>
                </div>

                @foreach($kapoenen as $kapoen)
                    <div class="media">
                        <a class="pull-left" href="{!! $kapoen->Uri !!}">
                            <style> .img-kapoen { width: 75px; height: 75px; fill: #dcef07; } </style>
                            <img class="img-kapoen img-responsive img-rounded media-object" src="{!! asset('img/kapoenen.svg') !!}" alt="De kapoenen">
                        </a>
                        <div class="media-body">
                            <h4 class="font-title media-heading">
                                {!! $kapoen->title !!} <small> {!! $kapoen->sub_title !!} </small>
                            </h4>

                            {!! substr($kapoen->description, 0, 205) !!}
                        </div>
                    </div>
                @endforeach

                @foreach($welpen as $welp)
                    <div class="media">
                        <a class="pull-left" href="{!! $welp->Uri !!}">
                            <style> .img-kapoen { width: 75px; height: 75px; fill: #dcef07; } </style>
                            <img class="img-kapoen img-responsive img-rounded media-object" src="{!! asset('img/welpen.svg') !!}" alt="De kapoenen">
                        </a>
                        <div class="media-body">
                            <h4 class="font-title media-heading">
                                {!! $welp->title !!} <small> {!! $welp->sub_title !!} </small>
                            </h4>

                            {!! substr($welp->description, 0, 205) !!}
                        </div>
                    </div>
                @endforeach

                @foreach($jongGivers as $jongGiver)
                    <div class="media">
                        <a class="pull-left" href="{!! $jongGiver->Uri !!}">
                            <style> .img-kapoen { width: 75px; height: 75px; fill: #dcef07; } </style>
                            <img class="img-kapoen img-responsive img-rounded media-object" src="{!! asset('img/jongGivers.svg') !!}" alt="De kapoenen">
                        </a>
                        <div class="media-body">
                            <h4 class="font-title media-heading">
                                {!! $jongGiver->title !!} <small> {!! $jongGiver->sub_title !!} </small>
                            </h4>

                            {!! substr($jongGiver->description, 0, 205) !!}
                        </div>
                    </div>
                @endforeach

                @foreach($givers as $giver)
                    <div class="media">
                        <a class="pull-left" href="{!! $giver->Uri !!}">
                            <style> .img-kapoen { width: 75px; height: 75px; fill: #dcef07; } </style>
                            <img class="img-kapoen img-responsive img-rounded media-object" src="{!! asset('img/givers.svg') !!}" alt="De kapoenen">
                        </a>
                        <div class="media-body">
                            <h4 class="font-title media-heading">
                                {!! $giver->title !!} <small> {!! $giver->sub_title !!} </small>
                            </h4>

                            {!! substr($giver->description, 0, 205) !!}
                        </div>
                    </div>
                @endforeach

                @foreach($jins as $jin)
                    <div class="media">
                        <a class="pull-left" href="{!! $jin->Uri !!}">
                            <style> .img-kapoen { width: 75px; height: 75px; fill: #dcef07; } </style>
                            <img class="img-kapoen img-responsive img-rounded media-object" src="{!! asset('img/jins.svg') !!}" alt="De kapoenen">
                        </a>
                        <div class="media-body">
                            <h4 class="font-title media-heading">
                                {!! $jin->title !!} <small> {!! $jin->sub_title !!} </small>
                            </h4>

                            {!! substr($jin->description, 0, 205) !!}
                        </div>
                    </div>
                @endforeach

                @foreach($leiding as $leider)
                    <div class="media">
                        <a class="pull-left" href="{!! $leider->Uri !!}">
                            <style> .img-kapoen { width: 75px; height: 75px; fill: #dcef07; } </style>
                            <img class="img-kapoen img-responsive img-rounded media-object" src="{!! asset('img/leiding.svg') !!}" alt="De kapoenen">
                        </a>
                        <div class="media-body">
                            <h4 class="font-title media-heading">
                                {!! $leider->title !!} <small> {!! $leider->sub_title !!} </small>
                            </h4>

                            {!! substr($leider->description, 0, 205) !!}
                        </div>
                    </div>
                @endforeach

        </div>
    </div>
@endsection
