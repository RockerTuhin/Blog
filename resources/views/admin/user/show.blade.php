@extends('admin.app')

@section('headSection')

<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/plugins/datatables/dataTables.bootstrap.css') }}">

@endsection

@section('main-content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">

		@include('admin.layouts.pageHead')

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
				<h3 class="box-title">Users</h3>
				<a class="btn btn-success col-lg-offset-5 col-md-offset-5" href="{{ route('user.create') }}">Add New</a>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
				</div>
			</div>

			@include('includes.messages')

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
									<th>User Name</th>
									<th>Assigned Roles</th>
									<th>Status</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $user->name }}</td>
									<td>

										@foreach($user->roles as $user_role)

											{{ $user_role->name }}    

										@endforeach

									</td>
									<td>{{ $user->status? 'Active' : 'Not Active' }}</td>
									<td><a href="{{ route('user.edit',$user->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
									<form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" method="post" style="display: none;">

										@csrf
										@method('DELETE')
										
									</form>
									<td><a href="" onclick="if(confirm('Are you sure,you want to delete?')){ event.preventDefault();document.getElementById('delete-form-{{ $user->id }}').submit(); }else{event.preventDefault();}"><span class="glyphicon glyphicon-trash"></span></a></td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>S.No</th>
									<th>Assigned Roles</th>
									<th>Status</th>
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