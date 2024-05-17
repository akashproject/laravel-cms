@extends('administrator.layouts.admin')
@section('content')
	<div class="col-12">
		<div class="card">
			<form class="form-horizontal" method="post" action="{{ url('administrator/save-curriculum') }}" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<h3 class="card-title"> {{$course->name}} </h3>
					<h5 class="card-title"> Curriculum </h5>
					
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					@if(session()->has('message'))
						<div class="alert alert-success">
							{{ session()->get('message') }}
						</div>
					@endif
					<div class="row">
						<div class="col-md-8" >
							@foreach( $carriculam as $key => $value )
							<div class="form-group row">
								<label for="no_of_module" class="col-sm-3 text-right control-label col-form-label">Module {{$key + 1}}</label>
								<div class="col-sm-9 lecturelist" >
									<div class="form-group">
										<input type="text" class="form-control" name="curriculum[{{$value->id}}][name]" id="curriculum" placeholder="Enter Module Name" value="{{$value->name}}" >
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="curriculum[{{$value->id}}][duration]" id="curriculum" placeholder="Enter Duration" value="{{$value->duration}}" >
									</div>
									<div class="form-group">
										<textarea class="form-control editor" name="curriculum[{{$value->id}}][benefits]" id="benefits" placeholder="Enter Benefits" >
										{{$value->benefits}}
										</textarea>
									</div>
									@if(json_decode($value->lecture) !== null)
										@foreach(json_decode($value->lecture) as $key => $lecture)
										<div class="form-group row">
											<label for="no_of_module" class="col-sm-2 text-right control-label col-form-label">Lecture : </label>
											<div class="col-md-8" >
												<input type="text" class="form-control" name="curriculum[{{$value->id}}][lecture][]" id="lecture" placeholder="Enter Lecture" value="{{$lecture}}" >
											</div>
											<div class="col-md-2" >
												<a href="javascript:void(0)" class="addLecture" > 
													<i class="mdi mdi-plus-circle-outline"></i>
												</a>
												<a href="javascript:void(0)" class="removeLecture" > 
													<i class="mdi mdi-minus-circle-outline"></i> 
												</a>
											</div>
										</div>
										@endforeach   
									@else 
										<div class="form-group row">
											<label for="no_of_module" class="col-sm-2 text-right control-label col-form-label">Lecture : </label>
											<div class="col-md-8" >
												<input type="text" class="form-control" name="curriculum[{{$value->id}}][lecture][]" id="lecture" placeholder="Enter Lecture" value="" >
											</div>
											<div class="col-md-2" >
												<a href="javascript:void(0)" class="addLecture" > 
													<i class="mdi mdi-plus-circle-outline"></i>
												</a>
												<a href="javascript:void(0)" class="removeLecture" > 
													<i class="mdi mdi-minus-circle-outline"></i> 
												</a>
											</div>
										</div>
									@endif
								</div>
							</div>
							@endforeach
						</div>
						<div class="col-md-4">
							
						</div>
					</div>
				</div>

				<div class="border-top">
					<div class="card-body">
						<button type="submit" class="btn btn-primary">Submit</button>
						<input type="hidden" name="course_id" id="model_id" value="{{$id}}" >
					</div>

				</div>

			</form>
		</div>
	</div>              
@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection

