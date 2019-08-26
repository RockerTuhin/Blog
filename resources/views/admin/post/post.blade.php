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
              <h3 class="box-title">Titles</h3>
            </div>

            @include('includes.messages')

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" @if(isset($post)) action="{{ route('post.update',$post->id) }}" @else action="{{ route('post.store') }}" @endif method="post" enctype="multipart/form-data">
              @csrf
              @if(isset($post)) @method('PUT') @endif
              <div class="box-body">
              	<div class="col-md-6 col-lg-6 col-sm-6">
              		<div class="form-group">
              			<label for="title">Post Title</label>
              			<input type="text" class="form-control" id="title" placeholder="Enter title" name="title" @if(isset($post)) value="{{ $post->title }}" @endif >
              		</div>
              		<div class="form-group">
              			<label for="subtitle" style="margin-top: 5px">Post Sub Title</label>
              			<input type="text" class="form-control" id="subtitle" placeholder="Enter subtitle" name="subtitle" @if(isset($post)) value="{{ $post->subtitle }}" @endif >
              		</div>
              		<div class="form-group" style="margin-top: 20px">
              			<label for="slug">Post Slug</label>
              			<input type="text" class="form-control" id="slug" placeholder="Enter slug" name="slug" @if(isset($post)) value="{{ $post->slug }}" @endif >
              		</div>
              	</div>
              	<div class="col-md-6 col-lg-6 col-sm-6">
                  <div class="form-group">
                    <label>Select Tags</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Tags" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                      @foreach($tags as $tag)
                      <option value="{{ $tag->id }}"
                          @if(isset($post))
                            @foreach($post->tags as $postTag)
                              @if($postTag->id == $tag->id)
                                selected=""
                              @endif 
                            @endforeach
                          @endif
                        >{{ $tag->name }}</option>
                      @endforeach
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Category" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}"
                        @if(isset($post))
                          @foreach($post->categories as $postCategory)
                            @if($postCategory->id == $category->id)
                              selected=""
                            @endif 
                          @endforeach
                        @endif
                        >{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <style type="text/css">
                        .select2-container--default .select2-selection--multiple .select2-selection__choice {
                              background-color: #3c8dbc !important;
                        }
                  </style>
              		<div class="form-group">
                    <br>
                    <div class="pull-left">
                      <label for="image">Post Image</label>
                      <input type="file" id="image"  name="image">
                    </div>
                    <div class="checkbox pull-right" style="margin-top: 20px">
                      <label>
                        <input type="checkbox" name="status" value="1" @if(isset($post)) @if($post->status == 1) checked="" @endif @endif > Publish
                      </label>
                    </div>
              		</div>
              		
              	</div>
              </div>
              
              <!-- /.box-body -->
              <div class="box">
              	<div class="box-header">
              		<h3 class="box-title">Write Post Body Here
              			<small>Simple and fast</small>
              		</h3>
              		<!-- tools box -->
              		<div class="pull-right box-tools">
              			<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              				<i class="fa fa-minus"></i></button>
              			</div>
              			<!-- /. tools -->
              		</div>
              		<!-- /.box-header -->
              		<div class="box-body pad">
              				<textarea id="editor1" name="body" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@if(isset($post)) {{ $post->body }} @endif</textarea>
              		</div>
              	</div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
          
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
<script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<script>
  $(document).ready(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>

@endsection