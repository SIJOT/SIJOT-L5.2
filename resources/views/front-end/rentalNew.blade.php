@extends('layouts.front-end')

@section('breadcrumb')
    <ol class="breadcrumb border">
        <li><a href="{!! url('.') !!}"><span class="fa fa-home"></span></a></li>
        <li><a href="{!! route('rental.index') !!}">Verhuur</a></li>
        <li class="active">Aanvraag</li>
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
                <h2 style="margin-bottom: -5px;">Verhuur aanvraag</h2>
            </div>

            <p>
                <span class="label label-danger">INFO</span> Het laatste weekend van de maand verhuren we niet.
            </p>

            <form action="{{ route('rental.store') }}" method="POST">
                {{-- csrf_field() --}}
                {{ csrf_field() }}

                <!-- Start date input group -->
                <div class="form-group {{ $errors->has('Start_date') ? 'has-feedback has-error' : '' }}">
                    <label>Start datum: <span class="text-danger">*</span></label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="Start_date" value="{{ old('Start_date') }}" style="width: 20%;" placeholder="dd/mm/yyyy" class="form-control">
                    </div>
                </div>
                <!-- /.start date input group -->

                <!-- End date input group  -->
                <div class="form-group {{ $errors->has('End_date') ? 'has-feedback has-error' : '' }}">
                    <label>Eind datum: <span class="text-danger">*</span></label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" value="{{ old('End_date')  }}" name="End_date" style="width: 20%;" placeholder="dd/mm/yyyy" class="form-control">
                    </div>
                </div>
                <!-- /.end date input group -->

                <!-- Group form group -->
                <div class="form-group {{ $errors->has('Group') ? 'has-feedback has-error' : '' }}">
                    <label> Groep: <span class="text-danger">*</span></label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-users"></i>
                        </div>
                        <input type="text" value="{{ old('Group') }}" name="Group" style="width:20%;" placeholder="Groep" class="form-control">
                    </div>
                </div>
                <!-- /.group form group -->

                <!-- telephone number group -->
                <div class="form-group">
                    <label> Tel. nummer: </label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" value="{{ old('telephone') }}" name="telephone" style="width:20%;" placeholder="Tel. nummer" class="form-control">
                    </div>
                </div>
                <!-- /. telephone number group-->

                <!-- email form group -->
                <div class="form-group {{ $errors->has('Email') ? 'has-feedback has-error' : '' }}">
                    <label> Email:  <span class="text-danger">*</span></label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" name="Email" value="{{ old('Email') }}" style="width:20%;" placeholder="Email adres" class="form-control">
                    </div>
                </div>
                <!-- /.email gorm group-->

                <!-- Form buttons -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Toevoegen</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection