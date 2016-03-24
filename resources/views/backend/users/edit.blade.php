@extends('layouts.backend')

@section('content')
        <!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Wijzig profiel </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="#">Profiel</a></li>
            <li class="active">Wijzig</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Info</a></li>
                <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Permissies</a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="tab_1">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li> {!! $error !!} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{!! route('profile.edit.insert') !!}" method="POST" enctype="multipart/form-data">
                       {{-- CSRF field --}}
                       {{ csrf_field() }}

                        <div class="row">

                              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                               <div class="form-group">
                                       <label>Naam: <span class="text-danger">*</span></label>

                                       <div class="input-group">
                                           <div class="input-group-addon">
                                           <i class="fa fa-user"></i>
                                       </div>
                                       <input type="text" name="name" value="{!! Auth::user()->name !!}" disabled class="form-control">
                                   </div>
                               </div>

                               <div class="form-group">
                                   <label> Gsm nummer:  <span class="text-danger"></span></label>

                                   <div class="input-group">
                                       <div class="input-group-addon">
                                           <i class="fa fa-phone"></i>
                                       </div>

                                       <input type="text" name="gsm" value="{!! Auth::user()->gsm !!}" placeholder="xxxx/xx.xx.xx" class="form-control">
                                   </div>
                               </div>

                               <div class="form-group">
                                   <label>Email adres: <span class="text-danger">*</span></label>

                                   <div class="input-group">
                                       <div class="input-group-addon">
                                           <i class="fa fa-envelope"></i>
                                       </div>
                                       <input type="text" name="email" value="{!! Auth::user()->email !!}" placeholder="name@domain.be" class="form-control">
                                   </div>
                               </div>

                               <div class="form-group">
                                   <button type="submit" class="btn btn-success">Toevoegen</button>
                                   <button type="reset" class="btn btn-danger">Reset</button>
                               </div>
                           </div>

                           <div class="col-sm-4 col-md-4 col-lg-4 col-xs4">
                               <div class="form-group">
                                   <label>Wachtwoord:</label>

                                   <div class="input-group">
                                       <div class="input-group-addon">
                                           <i class="fa fa-asterisk"></i>
                                       </div>
                                       <input type="password" name="password" value="" placeholder="wachtwoord" class="form-control">
                                   </div>
                               </div>

                               <div class="form-group">
                                   <label>Wachtwoord bevestiging:</label>

                                   <div class="input-group">
                                       <div class="input-group-addon">
                                           <i class="fa fa-asterisk"></i>
                                       </div>
                                       <input type="text" name="password_confirmation" value="" placeholder="wachtwoord bevestiging" class="form-control">
                                   </div>
                               </div>

                               <div class="form-group">
                                   <label for="profileImg">Profiel foto:</label>
                                   <input type="file" name="image" id="profileImg">
                               </div>
                           </div>

                        </div>
                   </form>
                </div>

                <div class="tab-pane" id="tab_2">
                    <div class="alert alert-warning">
                        Mogelijke wijzigingen aan de gebruikers groepen kan meer of minder
                        rechten met zich meebrengen.
                    </div>

                    <form action="{!! route('profile.edit.perms', ['id' => $user->id]) !!}" method="POST">
                        {{-- csrf_field() --}}
                        {!! csrf_field() !!}

                        <div class="row">

                            <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    <h3>Roles</h3>

                                    <select class="form-control" name="roles[]" size="8" multiple>
                                        @foreach($roles as $role)
                                            <option value="{!! $role->name !!}" @if($user->is($role->name)) selected @endif>
                                                {!! $role->name !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Wijzigen</button>
                                    <button class="btn btn-danger" type="reset">Reset</button>
                                </div>
                            </div>

                        </div>
                    </form>

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
