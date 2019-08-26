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
              <h3 class="box-title">Titles</h3>
            </div>

           @include('includes.messages')

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('category.update',$category->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="box-body">
              	
          		<div class="form-group">
          			<label for="name">Category Title</label>
          			<input type="text" class="form-control" id="name" placeholder="Category title" name="name" value="{{ $category->name }}">
          		</div>
          		
          		<div class="form-group">
          			<label for="slug">Category Slug</label>
          			<input type="text" class="form-control" id="slug" placeholder="Category slug" name="slug" value="{{ $category->slug }}">
          		</div>
              	<div class="form-group">
                	<button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
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