@extends('layouts.backend')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mailing
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active">Mailing</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-header with-border">
                <a href="" class="btn btn-default btn-xs">
                    <span style="margin-right: 3px;" class="fa fa-refresh"></span> Ververs
                </a>

                <a href="{!! route('mailing.insert') !!}" class="btn btn-default btn-xs">
                    <span style="margin-right: 3px;" class="fa fa-plus"></span> Nieuw adres
                </a>

                <a href="" class="btn btn-default btn-xs">
                    <span style="margin-right: 3px;" class="fa fa-envelope"></span> Groeps mailing
                </a>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Voornaam:</th>
                                    <th>Achternaam:</th>
                                    <th>Email:</th>
                                    <th></th> {{-- Functies --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($query as $info)
                                    <tr>
                                        <td>{!! $info->firstname !!}</td>
                                        <td>{!! $info->lastname !!}</td>
                                        <td>{!! $info->email !!}</td>

                                        <td>
                                            <a class="btn btn-xs btn-danger" href="">
                                                <span class="fa fa-envelope"></span>
                                            </a>

                                            <div class="btn-group">
                                                <a class="btn btn-xs btn-danger" href="{!! route('mailing.destroy', ['id' => $info->id]) !!}">
                                                    <span class="fa fa-trash"></span>
                                                </a>

                                                <a class="btn btn-xs btn-danger" href="">
                                                    <span class="fa fa-pencil"></span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection