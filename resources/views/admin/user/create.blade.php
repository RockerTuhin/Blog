@extends('admin/app')

@section('headSection')

<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/plugins/select2/select2.min.css') }}">

@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Admin</h3>
            </div>

            @include('includes.messages')

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('user.store') }}" method="post">
              @csrf
              <div class="box-body">
                
              <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="name" placeholder="User Name" name="name" value="{{ old('name') }}">
              </div>
              
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ old('phone') }}">
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
              </div>

              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="password_confirmation">
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <div class="checkbox">
                    <label><input type="checkbox" name="status" value="1" @if(old('status') == 1) checked="" @endif>Status</label>
                </div>
              </div>

              <div class="form-group">
                <label>Assign Role</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Assign Role" style="width: 100%;" tabindex="-1" aria-hidden="true" name="roles[]">
                  @foreach($roles as $role)
                  <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
              <style type="text/css">
                    .select2-container--default .select2-selection--multiple .select2-selection__choice {
                          background-color: #3c8dbc !important;
                    }
              </style>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
              </div>
                
              </div>
              
            </form>
          
          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footeScriptSection')

<script type="text/javascript" src="{{asset('public/admin/plugins/select2/select2.full.min.js')}}"></script>

<script>
  $(document).ready(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>

@endsection