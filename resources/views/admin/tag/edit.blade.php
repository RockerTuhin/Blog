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
            <form role="form" action="{{ route('tag.update',$tag->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="box-body">
              	
          		<div class="form-group">
          			<label for="name">Tag Title</label>
          			<input type="text" class="form-control" id="name" placeholder="Tag title" name="name" value="{{ $tag->name }}">
          		</div>
          		
          		<div class="form-group">
          			<label for="slug">Tag Slug</label>
          			<input type="text" class="form-control" id="slug" placeholder="Tag slug" name="slug" value="{{ $tag->slug }}">
          		</div>
              	<div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                	<a href="{{ route('tag.index') }}" class="btn btn-warning">Back</a>
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