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
				<h2 class="title mb-0">{{ __('messages.Settings') }}</h2>
			</div>
		</div>
		

		<div class="sub-section overview-tab">
			<div class="row justify-content-between align-items-center ">


				<div class="row mb-2 mb-lg-5 pe-0">

					<div class="col-md-12 d-flex justify-content-start pe-0 flex-wrap">

						<ul style="overflow-x:unset ;" class="nav nav-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0 flex-nowrap" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<a href="{{ url('/settings') }}">
									<button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" aria-selected="true">{{ __('messages.Your_Profile') }}</button>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="{{ url('/settings_password') }}">
									<button class="nav-link" id="pills-analytics-tab" data-bs-toggle="pill" data-bs-target="#pills-analytics" type="button" role="tab" aria-controls="pills-analytics" aria-selected="false">{{ __('messages.Change_Password') }}</button>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="{{ url('/settings_userManage') }}">
									<button class="nav-link" id="pills-userManagement-tab" data-bs-toggle="pill" data-bs-target="#pills-userManagement" type="button" role="tab" aria-controls="pills-userManagement" aria-selected="false">{{ __('messages.User_Management') }}</button>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="{{ url('/settings_emailHistory') }}">
									<button class="nav-link" id="pills-emails-tab" data-bs-toggle="pill" data-bs-target="#pills-emails" type="button" role="tab" aria-controls="pills-emails" aria-selected="false">{{ __('messages.Email_History') }}</button>
								</a>
							</li>
						</ul>

					</div>
				</div>

				<div class="tab-content settings-tab-content" id="pills-tabContent">
					<!--overview-->
					<div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">

						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">{{ __('messages.Your_Profile') }}</h3>
							</div>
							<div class="divider"></div>
							@if(in_array('profile', Auth::user()->permissions))
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">

								<div class="col-12 col-lg-6 tab-inner py-0 p-mb-0">
									<form method="POST" action="{{ route('change_name') }}">
										@csrf
										<p class="fs-13-5">{{ __('messages.Email') }}</p>
										<div class="overview-input mb-4">
											<div class="d-inline current-nickname">
												<input type="text" id="disabled_email" name="disabled_email" placeholder="First Name" disabled value="{{ Auth::user()->email }}">
											</div>
										</div>
										<p class="fs-13-5">{{ __('messages.First_Name') }}</p>
										<div class="overview-input mb-4">
											<div class="d-inline current-nickname">
												<input type="text" id="firstname" name="firstname" placeholder="{{ __('messages.First_Name') }}" required value="{{ Auth::user()->firstname }}">
											</div>
										</div>

										<p class="fs-13-5">{{ __('messages.Last_Name') }}</p>
										<div class="overview-input mb-4">
											<input type="text" id="lastname" name="lastname" placeholder="{{ __('messages.Last_Name') }}" required value="{{ Auth::user()->lastname }}">
										</div>
										<div class="overview-button-wrapper pt-0 ">
											<button type="submit" class="btn-dark px-4 me-2 hover-dark-light">{{ __('messages.Change_name') }}</button>
										</div>
									</form>
								</div>
							</div>
							@else
								@include('component.no-permission-go-back')
							@endif
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</section>
@endsection

