@extends('layouts.front-end')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <a href="{!! url('/') !!}">
                <span class="fa fa-home"></span>
            </a>
        </li>
        <li class="active">Foto's</li>
    </ol>
@endsection

@section('sidenav')
    <div class="panel panel-default border">
        <div class="panel-heading">
            Menu:
        </div>

        <div class="list-group">
            <a href="http://www.st-joris-turnhout.be/Fotos/Tak/2" class="list-group-item">Foto's kapoenen</a>
            <a href="http://www.st-joris-turnhout.be/Fotos/Tak/3" class="list-group-item">Foto's welpen</a>
            <a href="http://www.st-joris-turnhout.be/Fotos/Tak/4" class="list-group-item">Foto's
                Jong-Givers</a>
            <a href="http://www.st-joris-turnhout.be/Fotos/Tak/5" class="list-group-item">Foto's Givers</a>
            <a href="http://www.st-joris-turnhout.be/Fotos/Tak/6" class="list-group-item">Foto's Jins</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel panel-default border">
        <div class="panel-body">

            <div style="margin-top: -20px;" class="page-header">
                <h2 style="margin-bottom: -5px;"> Foto's </h2>
            </div>

            @if (count($photos) > 0)
                <div class="row">
                    @foreach($photos as $photo)
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h4>{!! $photo->name !!}</h4>

                                    <p><a href="{!! $photo->url !!}" class="label label-default">Bekijk</a>
                                    </p>
                                </div>
                                <img style="width: 300px; height:150px;" src="{!! $photo->path !!}">
                                     alt="{!! $photo->name !!}">
                            </div>
                        </div>
                    @endforeach
                <div>
                    @else
                        <div class="alert alert-danger">
                            <p>Er zijn geen foto albums geuploads.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
@endsection