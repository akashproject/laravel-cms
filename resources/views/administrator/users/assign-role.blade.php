@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
    <div class="card">
        <form class="form-horizontal" method="post" action="{{ route('assign-role.save') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title"> Change Role </h4>
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
                    <div class="col-md-7" >
                        <div class="form-group row  mb-3">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <span class="form-control"> {{ $user->name }} </span>
                            </div>
                        </div>
                        <div class="form-group row  mb-3">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <span class="form-control"> {{ $user->email }} </span>
                            </div>
                        </div>
                        <div class="form-group row  mb-3">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <span class="form-control"> {{ $user->mobile }} </span>
                            </div>
                        </div>                       
                        
                        <div class="form-group row  mb-3">
							<label for="roles" class="col-sm-3 text-right control-label col-form-label">Roles</label>
							<div class="col-sm-9">
                                <select name="roles[]" id="roles" class="select2 form-control custom-select" style="width: 100%; height:136px;" multiple>	
                                    <option value="">Select Roles</option>
                                    @foreach($roles as $role)
                                    <option value="{{  $role->name }}" {{ (in_array($role->name,  json_decode($user->getRoleNames())))?'selected' : '' }} >{{ $role->name }}</option>
                                    @endforeach
                                <select>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <div class="border-top">
				<div class="card-body">
					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" >
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