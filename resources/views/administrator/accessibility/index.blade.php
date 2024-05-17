@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($roles)
		<div class="card">
			<div class="card-body">
				<h5 class="card-title"> Datatable</h5>
				<div class="table-responsive">
					<table id="zero_config" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Name</th>
								<th>Permissions</th>
								<th>Options</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($roles as $role)
							<tr>
								<td>{{ $role->name }}</td>													
								<td>
                                    @foreach($role->permissions as $permission)
                                        <span> {{ ucfirst($permission->name) }}, </span>
                                    @endforeach
                                </td>													
								<td>
                                    <a href="{{ route('edit-accessibility',$role->id) }}" class="btn btn-primary btn-small">Edit</a>
									
                                </td>
							</tr>
							@endforeach							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	@endif
</div>  
@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection