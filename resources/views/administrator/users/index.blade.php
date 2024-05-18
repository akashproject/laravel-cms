@extends('administrator.layouts.admin')
@section('content')
<div class="col-12">
	@if($users)
			<!-- Striped Rows -->
			<div class="card">
                <h5 class="card-header"> {{ count($users) }} Records found</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
						@foreach ($users as $value)
						<tr>
							<td>{{ $value->name }}</td>													
							<td>{{ $value->email }}</td>													
							<td>{{ $value->mobile }}</td>
							<td>
								@switch($value->status)
								@case('0')
									<span class="badge bg-label-danger me-1">
									Deactive
								@break
								@case('1')
									<span class="badge bg-label-success me-1">
									Active
								@break
								@endswitch
								</span>
							</td>
							<td>
							<div class="dropdown">
								<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{ route('admin-user',$value->id) }}"
										><i class="bx bx-edit-alt me-1"></i> Edit</a
									>
									@can('delete')
									<a class="dropdown-item" href="{{ route('admin-delete-user',$value->id) }}"
										><i class="bx bx-trash me-1"></i> Deactive</a
									>
									@endcan
									@role('super-admin')
									<a class="dropdown-item" href="{{ route('assign-role.index',$value->id) }}"
										><i class="bx bx-lock-open me-1"></i> Role</a
									>
									@endcan
								</div>
							</div>
							</td>
						</tr>
					  	@endforeach		
                    </tbody>
                  </table>
                </div>
            </div>
            <!--/ Striped Rows -->

	@endif
</div>                   
@endsection
@section('script')
<!-- ============================================================== -->
<!-- CHARTS -->
@endsection