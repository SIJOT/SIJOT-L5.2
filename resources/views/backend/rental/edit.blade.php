@extends('layouts.backend')

@section('content')
    {{-- =============================================== --}}

    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <section class="content-header">
            <h1>
                Verhuur
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
                <li><a href="#">Verhuur</a></li>
                <li class="active">Wijzig</li>
            </ol>
        </section>

        {{-- Main content --}}
        <section class="content">

            {{-- Default box --}}
            <div class="box">
                <div class="box-body">

                    @foreach($query as $inf)
                    <form action="{{ route('rental.backend.update', ['id' => $inf->id]) }}" method="POST">
                        {{-- csrf_field() --}}
                        {{ csrf_field() }}

                            {{-- Group form group --}}
                            <div class="form-group {{ $errors->has('Group') ? 'has-feedback has-error' : '' }}">
                                <label> Groep: <span class="text-danger">*</span></label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <input type="text" value="{{ $inf->Group }}" name="Group" style="width:20%;" placeholder="Groep" class="form-control">
                                </div>
                            </div>
                            {{-- /.group form group --}}

                            {{-- telephone number group --}}
                            <div class="form-group">
                                <label> Tel. nummer: </label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" value="{{ $inf->telephone }}" name="telephone" style="width:20%;" placeholder="Tel. nummer" class="form-control">
                                </div>
                            </div>
                            {{-- /. telephone number group--}}

                            {{-- email form group --}}
                            <div class="form-group {{ $errors->has('Email') ? 'has-feedback has-error' : '' }}">
                                <label> Email:  <span class="text-danger">*</span></label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="text" name="Email" value="{{ $inf->Email }}" style="width:20%;" placeholder="Email adres" class="form-control">
                                </div>
                            </div>
                            {{-- /.email gorm group--}}

                            {{-- Start date input group --}}
                            <div data-provide="datepicker" class="date form-group {{ $errors->has('Start_date') ? 'has-feedback has-error' : '' }}">
                                <label>Start datum: <span class="text-danger">*</span></label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="Start_date" value="{{ $inf->Start_date }}" style="width: 20%;" placeholder="dd/mm/yyyy" class="form-control">
                                </div>
                            </div>
                            {{-- /.start date input group --}}

                            {{-- End date input group  --}}
                            <div data-provide="datepicker" class="date form-group {{ $errors->has('End_date') ? 'has-feedback has-error' : '' }}">
                                <label>Eind datum: <span class="text-danger">*</span></label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ $inf->End_date  }}" name="End_date" style="width: 20%;" placeholder="dd/mm/yyyy" class="form-control">
                                </div>
                            </div>
                            {{-- /.end date input group --}}

                        {{-- Form buttons --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Wijzig</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                        {{-- /. form buttons--}}
                    </form>
                    @endforeach
                </div>
                {{-- /.box-body --}}
            </div>
            {{-- /.box --}}

        </section>
        {{-- /.content --}}
    </div>
    {{-- /.content-wrapper --}}
@endsection
