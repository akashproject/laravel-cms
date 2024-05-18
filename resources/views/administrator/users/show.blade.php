@extends('administrator.layouts.admin')
@section('content')
<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic with Icons -->
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
        <div class="alert alert-success" role="alert">{{ session()->get('message') }}</div>
    @endif
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update User information</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin-save-user') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                    <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                        ></span>
                        <input
                        type="text"
                        name="name"
                        value="{{ $user->name }}"
                        class="form-control"
                        id="basic-icon-default-fullname"
                        placeholder="John Doe"
                        aria-label="John Doe"
                        aria-describedby="basic-icon-default-fullname2"
                        />
                    </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                    <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                        <input
                        type="text"
                        name="email"
                        value="{{ $user->email }}"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="john.doe"
                        aria-label="john.doe"
                        aria-describedby="basic-icon-default-email2"
                        />
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
                    <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="bx bx-phone"></i
                        ></span>
                        <input
                        type="text"
                        name="mobile"
                        value="{{ $user->mobile }}"
                        id="basic-icon-default-phone"
                        class="form-control phone-mask"
                        placeholder="658 799 8941"
                        aria-label="658 799 8941"
                        aria-describedby="basic-icon-default-phone2"
                        />
                    </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Status</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="status">
                            <option selected>Select Status</option>
                            <option value="1" {{($user->status == 1)? 'selected':'' }}>Enable</option>
                            <option value="0" {{($user->status == 0)? 'selected':'' }}>Disable</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" >
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection