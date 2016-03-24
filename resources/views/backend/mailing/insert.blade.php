@extends('layouts.backend')

@section('content')<!-- Content Wrapper. Contains page content -->
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

            {{-- box body --}}
            <div class="box-body">
                <form action="{!! route('mailing.insert') !!}" method="POST">
                    {{-- csrf_field() --}}
                    {{ csrf_field() }}

                            <!-- Start date input group -->
                    <div class="form-group {{ $errors->has('firstname') ? 'has-feedback has-error' : '' }}">
                        <label>Voornaam: <span class="text-danger">*</span></label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-asterisk"></i>
                            </div>
                            <input type="text" name="firstname" value="{{ old('firstname') }}" style="width: 20%;" placeholder="voornaam" class="form-control">
                        </div>
                    </div>
                    <!-- /.start date input group -->

                    {{-- lastname input group --}}
                    <div class="form-group {{ $errors->has('lastname') ? 'has-feedback has-error' : '' }}">
                        <label>Achternaam: <span class="text-danger">*</span></label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-asterisk"></i>
                            </div>
                            <input type="text" name="lastname" value="{{ old('lastname') }}" style="width: 20%;" placeholder="Achternaam" class="form-control">
                        </div>
                    </div>
                    {{-- /.lastname input group --}}

                    {{-- email input group --}}
                    <div class="form-group {{ $errors->has('email') ? 'has-feedback has-error' : '' }}">
                        <label>Email: <span class="text-danger">*</span></label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-asterisk"></i>
                            </div>
                            <input type="text" name="email" value="{{ old('email') }}" style="width: 20%;" placeholder="email adres" class="form-control">
                        </div>
                    </div>
                    {{-- /.email input group --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Toevoegen</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection