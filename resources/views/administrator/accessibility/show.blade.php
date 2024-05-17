@extends('administrator.layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Accessibility') }}</div>
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
                <div class="card-body">
                    <form method="POST" action="{{ route('save-accessibility') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Role Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required autocomplete="name"  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="permissions" class="col-md-4 col-form-label text-md-start">{{ __('Permission') }}</label>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    
                                    @foreach($permissions as $permission)
                                    <div class="col-md-6">
                                        <input id="permissions" type="checkbox" class="@error('permissions') is-invalid @enderror" name="permissions[]" value="{{$permission}}" autocomplete="permissions" {{ (in_array($permission,  $rolePermisson))?'checked' : '' }}> {{ucfirst($permission)}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @error('permissions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <input type="hidden" name="role_id" id="role_id" value="{{ $role->id }}" >
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Accessibility') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection