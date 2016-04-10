@extends('layouts.backend')

@section('content')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
        <!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Takken </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="#">Takken</a></li>
            <li class="active">Wijzig</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

                @if(Auth::user()->is('kapoenen'))
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Kapoenen</a></li>
                @endif

                @if(Auth::user()->is('welpen'))
                    <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Welpen</a></li>
                @endif

                @if(Auth::user()->is('jong-givers'))
                    <li><a href="#tab_3" data-toggle="tab" aria-expanded="false">Jong-givers</a></li>
                @endif

                @if(Auth::user()->is('givers'))
                    <li><a href="#tab_4" data-toggle="tab" aria-expanded="false">Givers</a></li>
                @endif

                @if(Auth::user()->is('jins'))
                    <li><a href="#tab_5" data-toggle="tab" aria-expanded="false">Jins</a></li>
                @endif

                @if(Auth::user()->is('leiding'))
                    <li><a href="#tab_6" data-toggle="tab" aria-expanded="false">Leiding</a></li>
                @endif

            </ul>

            <div class="tab-content">

                @if(Auth::user()->is('kapoenen'))
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        @foreach($kapoenen as $info1)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="{!! $info1->title !!}" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="{!! $info1->sub_title !!}" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">
                                        {!! $info1->description !!}
                                    </textarea>
                                </div>

                                <div class="col-sm-12 col-lg-12">
                                    <div style="margin-top: 15px;" class="form-group">
                                        <button type="submit" class="btn btn-success">Wijzigen</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                @endif

                    @if(Auth::user()->is('welpen'))
                    <div class="tab-pane" id="tab_2">
                    <div class="row">
                        @foreach($welpen as $info2)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="{!! $info2->title !!}" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="{!! $info2->sub_title !!}" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">
                                        {!! $info2->description !!}
                                    </textarea>
                                </div>

                                <div class="col-sm-12 col-lg-12">
                                    <div style="margin-top: 15px;" class="form-group">
                                        <button type="submit" class="btn btn-success">Wijzigen</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                    @endif

                    @if(Auth::user()->is('jong-givers'))
                    <div class="tab-pane" id="tab_3">
                    <div class="row">
                        @foreach($jonggivers as $info3)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="{!! $info3->title !!}" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="{!! $info3->sub_title !!}" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">
                                        {!! $info3->description !!}
                                    </textarea>
                                </div>

                                <div class="col-sm-12 col-lg-12">
                                    <div style="margin-top: 15px;" class="form-group">
                                        <button type="submit" class="btn btn-success">Wijzigen</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                    @endif

                    @if(Auth::user()->is('givers'))
                    <div class="tab-pane" id="tab_4">
                    <div class="row">
                        @foreach($givers as $info4)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="{!! $info4->title !!}" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="{!! $info4->sub_title !!}" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">
                                        {!! $info4->description !!}
                                    </textarea>
                                </div>

                                <div class="col-sm-12 col-lg-12">
                                    <div style="margin-top: 15px;" class="form-group">
                                        <button type="submit" class="btn btn-success">Wijzigen</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                    @endif

                    @if(Auth::user()->is('jins'))
                    <div class="tab-pane" id="tab_5">
                    <div class="row">
                        @foreach($jins as $info5)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="{!! $info5->title !!}" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="{!! $info5->sub_title !!}" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">
                                        {!! $info5->description !!}
                                    </textarea>
                                </div>

                                <div class="col-sm-12 col-lg-12">
                                    <div style="margin-top: 15px;" class="form-group">
                                        <button type="submit" class="btn btn-success">Wijzigen</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                    @endif

                    @if(Auth::user()->is('leiding'))
                    <div class="tab-pane" id="tab_6">
                    <div class="row">
                        @foreach($leiding as $info6)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="{!! $info6->title !!}" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="{!! $info6->sub_title !!}" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">
                                        {!! $info6->description !!}
                                    </textarea>
                                </div>

                                <div class="col-sm-12 col-lg-12">
                                    <div style="margin-top: 15px;" class="form-group">
                                        <button type="submit" class="btn btn-success">Wijzigen</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>

            </div>
            @endif
            <!-- /.tab-content -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
