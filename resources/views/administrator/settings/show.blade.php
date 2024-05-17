@extends('administrator.layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
	<h6 class="text-muted">Filled Pills</h6>
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
		<div class="nav-align-top mb-4">
			<ul class="nav nav-pills flex-column flex-md-row mb-3" role="tablist">
				<li class="nav-item">
				<button
					type="button"
					class="nav-link active"
					role="tab"
					data-bs-toggle="tab"
					data-bs-target="#navs-pills-justified-home"
					aria-controls="navs-pills-justified-home"
					aria-selected="true"
				>
					<i class="tf-icons bx bx-home"></i> General Settings
					<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">3</span>
				</button>
				</li>
				<li class="nav-item">
				<button
					type="button"
					class="nav-link"
					role="tab"
					data-bs-toggle="tab"
					data-bs-target="#navs-pills-justified-profile"
					aria-controls="navs-pills-justified-profile"
					aria-selected="false"
				>
					<i class="tf-icons bx bx-user"></i> Contact Settings
				</button>
				</li>
				<li class="nav-item">
				<button
					type="button"
					class="nav-link"
					role="tab"
					data-bs-toggle="tab"
					data-bs-target="#navs-pills-justified-messages"
					aria-controls="navs-pills-justified-messages"
					aria-selected="false"
				>
					<i class="tf-icons bx bx-message-square"></i> Social Settings
				</button>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
					<div class="card mb-4">
						<h5 class="card-header">General</h5>
						<!-- Account -->
						<div class="card-body">
							<div class="d-flex align-items-start align-items-sm-center gap-4">
							<img
								src="../assets/img/avatars/1.png"
								alt="user-avatar"
								class="d-block rounded"
								height="100"
								width="100"
								id="uploadedAvatar"
							/>
							<div class="button-wrapper">
								<label for="header_logo" class="btn btn-primary me-2 mb-4" tabindex="0">
								<span class="d-none d-sm-block">Upload Header Logo</span>
								<i class="bx bx-upload d-block d-sm-none"></i>
								<input
									type="file"
									id="header_logo"
									name="header_logo"
									class="account-file-input"
									hidden
									accept="image/png, image/jpeg"
								/>
								</label>
								<p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
							</div>
							</div>
						</div>
						<div class="card-body">
							<div class="d-flex align-items-start align-items-sm-center gap-4">
							<img
								src="../assets/img/avatars/1.png"
								alt="user-avatar"
								class="d-block rounded"
								height="100"
								width="100"
								id="uploadedAvatar"
							/>
							<div class="button-wrapper">
								<label for="footer_logo" class="btn btn-primary me-2 mb-4" tabindex="0">
								<span class="d-none d-sm-block">Upload Footer Logo</span>
								<i class="bx bx-upload d-block d-sm-none"></i>
								<input
									type="file"
									id="footer_logo"
									name="footer_logo"
									class="account-file-input"
									hidden
									accept="image/png, image/jpeg"
								/>
								</label>
								<p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
							</div>
							</div>
						</div>
						<hr class="my-0" />
						<div class="card-body">
							<form id="formAccountSettings" method="POST" action="{{ route('admin-save-settings') }}" enctype="multipart/form-data" >
								@csrf
								<div class="row">
									<div class="mb-3 col-md-6">
										<label for="enable_otp" class="form-label">Enable Otp</label>
										<select id="enable_otp" name="enable_otp" class="select2 form-select">
											<option value="">Enable Otp</option>
											<option value="1" {{ (isset($settings["enable_otp"]) && $settings["enable_otp"] == "1")?"selected":"" }}> Yes</option>
											<option value="0" {{ (isset($settings["enable_otp"]) && $settings["enable_otp"] == "0")?"selected":"" }}> No </option>
										</select>
									</div>
									<div class="mb-3 col-md-6">
										<label for="firstName" class="form-label">Razorpay Key</label>
										<input
											class="form-control"
											type="text"
											name="razorpay_key" 
											id="razorpay_key"
											value="{{ (isset($settings['razorpay_key']))?$settings['razorpay_key']:'' }}"
											autofocus
										/>
									</div>
									<div class="mb-3 col-md-6">
										<label for="firstName" class="form-label">Razorpay Secret</label>
										<input
											class="form-control"
											type="text"
											name="razorpay_secret"
											id="razorpay_secret" 
											value="{{ (isset($settings['razorpay_secret']))?$settings['razorpay_secret']:'' }}"
											autofocus
										/>
									</div>
									<div class="mb-3 col-md-6">
										<label for="footer_about" class="form-label">Footer About</label>
										<textarea
											class="form-control"
											name="footer_about"
											id="footer_about" 
											autofocus
										>{{ (isset($settings['footer_description']))?$settings['footer_about']:'' }}</textarea>
									</div>

									<div class="mb-3 col-md-6">
										<label for="footer_description" class="form-label">Footer Description</label>
										<textarea
											class="form-control editor"
											name="footer_description"
											id="footer_description" 
											autofocus
										>{{ (isset($settings['footer_description']))?$settings['footer_description']:'' }}</textarea>
									</div>
									
								</div>
								<div class="mt-2">
									<button type="submit" class="btn btn-primary me-2">Save changes</button>
									<button type="reset" class="btn btn-outline-secondary">Cancel</button>
								</div>
							</form>
						</div>
						<!-- /Account -->
					</div>
				</div>
				<div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
					<p>
						Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
						cupcake gummi bears cake chocolate.
					</p>
					<p class="mb-0">
						Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
						roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
						jelly-o tart brownie jelly.
					</p>
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