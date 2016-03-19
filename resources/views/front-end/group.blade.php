@extends('layouts.front-end')

@section('breadcrumb')

    <ol class="breadcrumb">
        <li><a href="{!! url('/')!!}"><span class="fa fa-home"></span></a></li>
        <li><a href="{!! url('takken') !!}">Takken</a></li>
        <li class="active">
            @foreach($group as $info1)
                {!! $info1->title !!}
            @endforeach
        </li>
    </ol>
@endsection

@section('sidenav')
    <div class="panel panel-default border">
        <div class="panel-heading">Activiteiten</div>
    </div>
@endsection

@section('content')
    <div class="panel panel-default border">
        <div class="panel-body">

            @foreach($group as $info2)
                <div style="margin-top: -20px;" class="page-header">
                    <h2 style="margin-bottom: -5px;"> {!! $info2->title !!}:  <small>{!! $info2->sub_title !!}</small></h2>
                </div>

                {!! $info2->description !!}
            @endforeach


        </div>
    </div>
@endsection
