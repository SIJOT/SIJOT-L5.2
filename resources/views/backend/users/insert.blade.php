@extends('layouts.backend')

@section('content')
        <!-- =============================================== -->

{{-- Content Wrapper. Contains page content --}}
<div class="content-wrapper">
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>
            Nieuwe gebruiker
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="#">Gebruikers</a></li>
            <li class="active">Nieuw</li>
        </ol>
    </section>

    {{-- Main content --}}
    <section class="content">

        {{-- Default box --}}
        <div class="box">
            <div class="box-body">
                <div class="alert alert-info" role="alert">
                    U kunt hier een nieuwe gebruiker invoegen. Deze gebruiker heeft op dat moment nog geen rechten.
                    Rechten kunnen gegeven worden door het gebruikers overzicht.
                </div>

                <form action="{!! route('backend.users.store') !!}" method="POST">
                    {{-- csrf_field() --}}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                            <div class="form-group">
                                <label>Naam: <span class="text-danger">*</span></label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" name="name" value="" placeholder="Jhon Doe" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>
                                    Gsm nummer:
                                    <span class="text-danger"></span>
                                </label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>

                                    <input type="text" name="gsm" value="" placeholder="xxxx/xx.xx.xx" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email adres: <span class="text-danger">*</span></label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="text" name="email" value="" placeholder="name@domain.be" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Toevoegen</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
            {{-- /.box-body --}}
        </div>
        {{-- /.box --}}

    </section>
    {{-- /.content --}}
</div>
{{-- /.content-wrapper --}}
@endsection
