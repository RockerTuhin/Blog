@extends('admin/app')

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
              <h3 class="box-title">Edit Permission</h3>
            </div>

            @include('includes.messages')

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('permission.update',$permission->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="box-body">
                	
            		<div class="form-group">
            			<label for="name">Permission Title</label>
            			<input type="text" class="form-control" id="name" placeholder="Permission title" name="name" value="{{ $permission->name }}">
            		</div>

                <div class="form-group">
                  <label for="for">Permission For</label>
                  <select class="form-control" name="for" id="for">
                    <option selected="" disabled="">Select Permission For</option>
                    <option value="User">User</option>
                    <option value="Post">Post</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
          		
              	<div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                	<a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
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