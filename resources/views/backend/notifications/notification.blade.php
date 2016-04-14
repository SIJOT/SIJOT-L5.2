@extends('layouts.backend')

@section('content')
        {{-- Content Wrapper. Contains page content --}}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Notificaties
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active">Notificaties</li>
        </ol>
    </section>

    {{-- Main content --}}
    <section class="content">
        <form action="{!! route('notification.update') !!}" method="POST">
            {{-- CSRF protection --}}
            {!! csrf_field() !!}

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                {{--
                <button type="button" id="checkAll" class="btn btn-default btn-sm checkbox-toggle">
                    <i class="fa fa-square-o"></i>
                </button>
                --}}

                    <button name="submit" value="delete" type="submit" class="btn btn-default btn-sm">
                        <span style="margin-right: 4px;" class="fa fa-trash-o"></span> Verwijderen
                    </button>

                    <a href="{!! route('notification') !!}" class="btn btn-default btn-sm">
                        <span style="margin-right: 4px;" class="fa fa-refresh"></span> Ververs
                    </a>

                    <button name="submit" value="read" type="submit" class="btn btn-default btn-sm">
                        <span style="margin-right: 3px;" class="fa fa-check"></span> Gelezen
                    </button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-8 col-md-7">

                        <table class="table table-hover table-condensed">
                            <tbody>
                            @foreach($notifications as $notification)
                                <tr>
                                    <td><input name="notifications[]" value="{!! $notification->id !!}" type="checkbox"></td>

                                    <td>
                                        @if($notification->body->name == 'rental.insert')
                                            <label class="label label-warning">Verhuur</label>
                                        @elseif($notification->body->name == 'rental.delete')
                                            <label class="label label-warning">Verhuur</label>
                                        @elseif($notification->body->name == 'rental.edit')
                                            <span class="label label-warning">Verhuur</span>
                                        @endif
                                    </td>
                                    <td> {!! $notification->text !!}</td>
                                    <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans() !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            {{-- /.box-body --}}
        </div>
        {{-- /.box --}}
        </form>
    </section>
    {{-- /.content --}}
</div>
{{-- /.content-wrapper --}}

@endsection
