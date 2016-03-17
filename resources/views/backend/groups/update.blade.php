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
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Kapoenen</a></li>
                <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Welpen</a></li>
                <li><a href="#tab_3" data-toggle="tab" aria-expanded="false">Jong-givers</a></li>
                <li><a href="#tab_4" data-toggle="tab" aria-expanded="false">Givers</a></li>
                <li><a href="#tab_5" data-toggle="tab" aria-expanded="false">Jins</a></li>
                <li><a href="#tab_6" data-toggle="tab" aria-expanded="false">Leiding</a></li>
            </ul>

            <div class="tab-content">

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

                                            <input type="text" name="title" value="" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">Easy! You should check out MoxieManager!</textarea>
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

                <div class="tab-pane" id="tab_2">
                    <div class="row">
                        @foreach($kapoenen as $info2)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">Easy! You should check out MoxieManager!</textarea>
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

                <div class="tab-pane" id="tab_3">
                    <div class="row">
                        @foreach($kapoenen as $info3)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">Easy! You should check out MoxieManager!</textarea>
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

                <div class="tab-pane" id="tab_4">
                    <div class="row">
                        @foreach($kapoenen as $info4)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">Easy! You should check out MoxieManager!</textarea>
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

                <div class="tab-pane" id="tab_5">
                    <div class="row">
                        @foreach($kapoenen as $info5)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">Easy! You should check out MoxieManager!</textarea>
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

                <div class="tab-pane" id="tab_6">
                    <div class="row">
                        @foreach($kapoenen as $info6)
                            <form action="" method="POST">

                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="title" value="" placeholder="titel" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-asterisk"></i>
                                            </div>

                                            <input type="text" name="sub_title" value="" placeholder="sub titel" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-lg-9">
                                    <textarea name="description" class="form-control">Easy! You should check out MoxieManager!</textarea>
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
            <!-- /.tab-content -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection