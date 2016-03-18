@extends('layouts.backend')

@section('content')
        <!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Verhuur
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="#">Verhuur</a></li>
            <li class="active">Overzicht</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if(count($rentals) === 0)
            <div class="callout callout-danger lead">
                <h4>Oh snapp :(</h4>
                <p> Er zijn geen verhuringen onder deze categorie. </p>
            </div>
        @else
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Datum:</th>
                                <th>Status:</th>
                                <th>Groep:</th>
                                <th>Mail:</th>
                                <th></th> {{-- Functies --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rentals as $rental)
                                <tr>
                                    <td><code>#{!! $rental->id !!}</code></td>
                                    <td>{!! $rental->Start_date !!} - {!! $rental->End_date !!}

                                    <td>
                                        @if($rental->Status === 0)
                                            <span class="label label-warning">Nieuwe aanvraag</span>
                                        @elseif($rental->Status === 1)
                                            <span class="label label-info">Optie</span>
                                        @elseif($rental->Status === 2)
                                            <span class="label label-success">Bevestigd</span>
                                        @endif
                                    </td>

                                    <td>{!! $rental->Group !!}</td>
                                    <td>{!! $rental->Email !!}</td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('backend.rental.destroy', ['id' => $rental->id])  }}" class="btn btn-xs btn-danger">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                            <a href="mailto:{!! $rental->Email !!}" class="btn btn-xs btn-danger">
                                                <span class="fa fa-envelope"></span>
                                            </a>
                                        </div>

                                        <div class="btn-group">
                                            <a href="{{ route('backend.rental.option', ['id' => $rental->id]) }}" class="btn btn-xs btn-danger">
                                                <span class="fa fa-minus"></span>
                                            </a>
                                            <a href="{{ route('backend.rental.confirm', ['id' => $rental->id]) }}" class="btn btn-xs btn-danger">
                                                <span class="fa fa-check"></span>
                                            </a>
                                        </div>
                                    <td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                @if($rentalCount > 15)
                    <div class="box-footer">
                        {{ $rentals->render() }}
                    </div>
                @endif
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection