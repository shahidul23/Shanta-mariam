@extends('Layouts.main')
@section('main_content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-3">
					<h1 class="m-0"> Shanta Mariam</h1>
				</div><!-- /.col -->
				<form action="{{route('search.report')}}" method="get">
					<div class="card-body">
						<div class="row">
							<div class="col-5">
								<input type="text" name="from_date" class="form-control" placeholder="From date">
							</div>
							<div class="col-5">
								<input type="text" name="to_date" class="form-control" placeholder="To date">
							</div>
							<div class="col-2">
								<button type="submit" class="btn btn-success">Search</button>
							</div>
						</div>
					</div>
				</form>

			</div><!-- /.row -->
		</div><!-- /.container-fluid --> 
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Students List</h3>
							@if(Session::has('success'))
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" style="color: red;">&nbsp&nbsp&nbsp&nbspX</button>
								{{Session::get('success')}}
							</div>
							@endif
							@if(Session::has('error'))
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" style="color: red;" >&nbsp&nbsp&nbsp&nbspX</button>
								{{Session::get('error')}}
							</div>
							@endif
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>#SL</th>
										<th>Date</th>
										<th>Full Name</th>
										<th>Phone Number</th>
										<th>Email</th>
										<th>Program</th>
										<th>Remarks</th>
									</tr>
								</thead>
								<tbody>
									@foreach($info as $key=>$row)
									<tr>
										<td>{{ $key + 1 }}</td>
										<td>{{ $row->date }}</td>
										<td>{{ $row->name }}</td>
										<td>{{ $row->phone }}</td>
										<td>{{ $row->email }}</td>
										<td>{{ $row->Program }}</td>
										<td>{{ $row->remark }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
</div>
@endsection