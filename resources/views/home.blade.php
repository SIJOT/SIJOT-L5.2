@extends('layouts.backend')

@section('content')
        {{-- =============================================== --}}

{{-- Content Wrapper. Contains page content --}}
<div class="content-wrapper">
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>Info</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active">Overzicht</li>
        </ol>
    </section>

    {{-- Main content --}}
    <section class="content">

        <div class="row">
            <div class="col-lg-4 col-xs-8">
                {{-- small box --}}
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3> {!! $rentalCount !!} </h3>

                        <p>Verhuringen</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <i class="fa fa-arrow-circle-right"></i> info
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-8">
                {{-- small box --}}
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>Wijzig</h3>
                        <p>Profiel</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <a href="{!! route('profile.edit.view') !!}" class="small-box-footer">
                        <i class="fa fa-arrow-circle-right"></i> info
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-8">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3> {!! $users !!} </h3>
                        <p>Gebruikers</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="{!! route('backend.users.overview') !!}" class="small-box-footer">
                        <i class="fa fa-arrow-circle-right"></i> info
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-8">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>7</h3>
                        <p>Items</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cloud"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <i class="fa fa-arrow-circle-right"></i> info
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-8">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>Uitloggen</h3>
                        <p>Bye :(</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-out"></i>
                    </div>
                    <a href="{!! url('/logout') !!}" class="small-box-footer">
                        <i class="fa fa-arrow-circle-right"></i> info
                    </a>
                </div>
            </div>

        </div>

    </section>
    {{-- /.content --}}
</div>
{{-- /.content-wrapper --}}
@endsection
