@extends('Layouts.main')
@section('main_content')

<div class="hold-transition">
	<div class="content-wrapper">
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Fill up student details</h3>
						</div>
						<form action="{{route('inbound.store')}}" method="POST">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="inputName">Full Name <span class="text-danger">*</span></label>
											<input type="text" id="inputName" name="name" class="form-control" placeholder="Full Name" value="{{ $info->name}}">
											<span class="text-danger">@error('name'){{$message}} @enderror</span>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="phone">Phone <span class="text-danger">*</span></label>
											<input type="text" readonly id="phone" name="phone" class="form-control" value="{{ $info->phone}}">
											<span class="text-danger">@error('phone'){{$message}} @enderror</span>
										</div>
									</div>
									<input type="hidden" name="outbound" value="Outbound">	
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="email">Email <span class="text-danger">*</span></label>
											<input type="text" id="inputName" name="email" class="form-control" placeholder="Full Name" value="{{ $info->email}}">
											<span class="text-danger">@error('email'){{$message}} @enderror</span>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="program">Program <span class="text-danger">*</span></label>
											<input type="text" readonly id="program" name="program" class="form-control" value="{{ $info->Program}}">
											<span class="text-danger">@error('program'){{$message}} @enderror</span>
										</div>
									</div>
									<input type="hidden" name="outbound" value="Outbound">	
								</div>
								<div class="form-group">
									<label for="inputDescription">Remarks</label>
									<textarea id="inputDescription" name="remarks" class="form-control" rows="3">{{$info->remark}}</textarea>
								</div><hr>
								<div class="col-12">
									<button type="submit" class="btn btn-success float-right"> Save</button>
								</div>
							</div>
							<!-- /.card-body -->
						</form>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</section>
	</div>
</div>

@endsection