@extends('admin.app')

@section('headSection')

<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/plugins/datatables/dataTables.bootstrap.css') }}">

@endsection

@section('main-content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Blank page
			<small>it all starts here</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Examples</a></li>
			<li class="active">Blank page</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Roles</h3>
				<a class="btn btn-success col-lg-offset-5 col-md-offset-5" href="{{ route('role.create') }}">Add New</a>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Table With Full Features</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Role Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								@foreach($roles as $role)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $role->name }}</td>
									<td><a href="{{ route('role.edit',$role->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
									<form id="delete-form-{{ $role->id }}" action="{{ route('role.destroy',$role->id) }}" method="post" style="display: none;">

										@csrf
										@method('DELETE')
										
									</form>
									<td><a href="" onclick="if(confirm('Are you sure,you want to delete?')){ event.preventDefault();document.getElementById('delete-form-{{ $role->id }}').submit(); }else{event.preventDefault();}"><span class="glyphicon glyphicon-trash"></span></a></td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>S.No</th>
									<th>Role Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				Footer
			</div>
			<!-- /.box-footer-->
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>

@endsection

@section('footeScriptSection')

<script type="text/javascript" src="{{asset('public/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript" src="{{asset('public/admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@endsection