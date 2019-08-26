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
              <h3 class="box-title">Roles</h3>
            </div>

            @include('includes.messages')

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('role.store') }}" method="post">
                @csrf
                <div class="box-body">
                	
            		<div class="form-group">
            			<label for="name">Role Title</label>
            			<input type="text" class="form-control" id="name" placeholder="Role title" name="name">
            		</div>


                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4">
    
                        <label>Posts Permissions</label>
    
                        @foreach($permissions as $permission)
    
                            @if($permission->for == 'Post')
    
                                <div class="checkbox">
                                  <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
    
                            @endif
    
                        @endforeach
                        
                    </div>
    
                    <div class="col-lg-4 col-md-4 col-sm-4">
    
                        <label>User Permissions</label>
    
                        @foreach($permissions as $permission)
    
                            @if($permission->for == 'User')
    
                                <div class="checkbox">
                                  <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
    
                            @endif
    
                        @endforeach
    
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4">
    
                        <label>Others Permissions</label>
    
                        @foreach($permissions as $permission)
    
                            @if($permission->for == 'Others')
    
                                <div class="checkbox">
                                  <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
    
                            @endif
    
                        @endforeach
    
                    </div>

                </div>

          		  <br>
              	<div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                	<a href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
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