@extends('layouts.app')

@section('content')
<section class="overview" style="position: relative;">


	<div class="container">
		@if(isset($message) && $message=='success')
		<div class="badge reset-success">
			<img src="assets/img/reset-success.svg" alt=""> Successfully changed profile.
		</div>
		@endif

		@if(isset($message) && $message=='failed')
		<div class="badge reset-success" style="background: crimson;">
			<img src="assets/img/reset-success.svg" alt=""> Cannot access to server.
		</div>
		@endif
		<div class="d-flex flex-column justify-content-start align-items-start title-button-wrapper">
			<div class="overview-header">
				<h2 class="title mb-0">Settings</h2>
			</div>
		</div>



		<div class="sub-section overview-tab">
			<div class="row justify-content-between align-items-center ">


				<div class="row mb-2 mb-lg-5 pe-0">

					<div class="col-md-12 d-flex justify-content-start pe-0 flex-wrap">

						<ul style="overflow-x:unset ;" class="nav nav-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0 flex-nowrap" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" aria-selected="true">Profile</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-analytics-tab" data-bs-toggle="pill" data-bs-target="#pills-analytics" type="button" role="tab" aria-controls="pills-analytics" aria-selected="false">Security</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-emails-tab" data-bs-toggle="pill" data-bs-target="#pills-emails" type="button" role="tab" aria-controls="pills-emails" aria-selected="false">Email History</button>
							</li>
						</ul>

					</div>
				</div>

				<div class="tab-content settings-tab-content" id="pills-tabContent">
					<!--overview-->
					<div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">

						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">Profile</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">

								<div class="col-12 col-lg-6 tab-inner py-0 p-mb-0">

									<h3 class="fs-15 mb-4">Change Profile</h3>
									<form method="POST" action="{{ route('change_name') }}">
										@csrf
										<p class="fs-13-5">First Name</p>
										<div class="overview-input mb-4">
											<div class="d-inline current-nickname">
												<input type="text" id="firstname" name="firstname" placeholder="First Name" required value="{{ Auth::user()->firstname }}">
											</div>
										</div>

										<p class="fs-13-5">Last Name</p>
										<div class="overview-input mb-4">
											<input type="text" id="lastname" name="lastname" placeholder="Last Name" required value="{{ Auth::user()->lastname }}">
										</div>
										<div class="overview-button-wrapper pt-0 ">
											<button type="submit" class="btn-dark px-4 me-2 hover-dark-light">Change nickname</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>

					<!--analytics-->
					<div class="tab-pane fade" id="pills-analytics" role="tabpanel" aria-labelledby="pills-analytics-tab">


						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">Security</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">

								<div class="col-12 col-lg-6 tab-inner py-0 p-mb-0 settings-tab-border">

									<h3 class="fs-15 mb-4">Change Password</h3>

									<p class="fs-13-5">Current password</p>

									<div class="overview-input mb-4">
										<div class="d-inline current-password">
											<input type="password" class="settings-password" value="12345678">

											<img src="assets/img/eye.svg" class="settings-password-img icon-password eye-closed">
											<img src="assets/img/eye-open.svg" class="settings-password-img icon-password eye-open" style="display:none">
										</div>
									</div>

									<p class="fs-13-5">New password</p>

									<div class="overview-input mb-4">
										<div class="d-inline current-password">
											<input type="password" class="settings-password" placeholder="Write new password">
											<img src="assets/img/eye.svg" class="settings-password-img icon-password eye-closed">
											<img src="assets/img/eye-open.svg" class="settings-password-img icon-password eye-open" style="display:none">
										</div>
									</div>

									<p class="fs-13-5">Confirm new password</p>

									<div class="overview-input mb-4">
										<div class="d-inline current-password">
											<input type="password" class="settings-password" placeholder="Write new password">
											<img src="assets/img/eye.svg" class="settings-password-img icon-password eye-closed">
											<img src="assets/img/eye-open.svg" class="settings-password-img icon-password eye-open" style="display:none">
										</div>
									</div>
									<div class="overview-button-wrapper pt-0 ">
										<button class="btn-dark px-4 me-2 hover-dark-light">Change Password</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--email history-->
					<div class="tab-pane fade" id="pills-emails" role="tabpanel" aria-labelledby="pills-emails-tab">


						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">Email History</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">
								<div class="w-100 mb-5 support-table">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">ID</th>
												<th scope="col">Date Sent</th>
												<th scope="col">Message Subject</th>
											</tr>
										</thead>
										<tbody>
											@foreach($emails as $email)
											<tr>
												<td>#{{ $email['id'] }}</td>
												<td>{{ $email['date'] }}</td>
												<td class="date-cell">{{ $email['subject'] }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
@endsection