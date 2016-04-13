@extends('layouts.backend')

@section('content')<!-- Content Wrapper. Contains page content -->
<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mailing
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="#">Mailing</a></li>
            <li class="active">Groepsmailing</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">



            {{-- box body --}}
            <div class="box-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label class="groep">Mailing groep:</label>
                        <select id="groep" style="width: 30%;" class="form-control" name="group">
                            <option value="test">Test</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="onderwerp">Onderwerp:</label>
                        <input id="onderwerp" style="width: 30%;" type="text" class="form-control" name="subject" placeholder="Onderwerp" />
                    </div>

                    <div class="form-group">
                        <label for="files">Bestanden:</label>
                        <input id="files" name="files[]" type="file" multiple="multiple" />
                    </div>

                    <div class="form-group">
                        <label for="bericht">Bericht:</label>
                        <textarea id="bericht" name="message">
                            uw bericht
                        </textarea>
                        <script> CKEDITOR.replace('message'); </script>
                    </div>

                    <div class="form-group">
                        <button id="submit" class="btn btn-success">Verzenden</button>
                        <button id="reset" class="btn btn-danger">Reset</button>
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