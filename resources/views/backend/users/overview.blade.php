@extends('layouts.backend')

@section('content')
        <!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gebruikers beheer
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="#">Gebruikers</a></li>
            <li class="active">Overzicht</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Status:</th>
                            <th>Naam:</th>
                            <th>Mail:</th>
                            <th>GSM:</th>
                            <th>Tak:</th>
                            <th></th> {{-- Functies --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><code>#{!! $user->id !!}</code></td>

                                <td>
                                    @if($user->is('active') === true)
                                        <span class="label label-success">Actief</span>
                                    @elseif($user->is('blocked') === true)
                                        <span class="label label-warning">Geblokkeerd</span>
                                    @endif
                                </td>

                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->gsm !!}</td>

                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-xs btn-danger" href="">
                                            <span class="fa fa-trash"></span>
                                        </a>

                                        <a class="btn btn-xs btn-danger" href="">
                                            <span class="fa fa-cogs"></span>
                                        </a>
                                    </div>

                                    <div class="btn-group">
                                        <a class="btn btn-xs @if($user->is('blocked')) disabled @endif btn-danger" href="{{ route('backend.users.block', ['id' => $user->id]) }}">
                                            <span class="fa fa-lock"></span>
                                        </a>
                                        <a class="btn btn-xs @if($user->is('active')) disabled @endif btn-danger" href="{{ route('backend.users.unblock', ['id' => $user->id]) }}">
                                            <span class="fa fa-unlock"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection