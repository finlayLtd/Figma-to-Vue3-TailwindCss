@extends('layouts.app')

@section('content')
<section class="overview" style="position: relative;">


	<div class="container">
		@if(isset($message) && $message=='success')
		<div class="badge reset-success">
			<img src="assets/img/reset-success.svg" alt=""> {{ __('messages.Successfully_changed_password') }}.
		</div>
		@endif

		@if(isset($message) && $message=='failed')
		<div class="badge reset-success" style="background: crimson;">
			<img src="assets/img/reset-success.svg" alt=""> {{ __('messages.Cannot_access_to_server') }}.
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
									<button class="nav-link " id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" aria-selected="true">{{ __('messages.Your_Profile') }}</button>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="{{ url('/settings_password') }}">
									<button class="nav-link active" id="pills-analytics-tab" data-bs-toggle="pill" data-bs-target="#pills-analytics" type="button" role="tab" aria-controls="pills-analytics" aria-selected="false">{{ __('messages.Change_Password') }}</button>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="{{ url('/settings_userManage') }}">
									<button class="nav-link " id="pills-userManagement-tab" data-bs-toggle="pill" data-bs-target="#pills-userManagement" type="button" role="tab" aria-controls="pills-userManagement" aria-selected="false">{{ __('messages.User_Management') }}</button>
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
					<!--{{ __('messages.Change_Password') }}-->
					<div class="tab-pane fade show active" id="pills-analytics" role="tabpanel" aria-labelledby="pills-analytics-tab">
						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">{{ __('messages.Change_Password') }}</h3>
							</div>
							<div class="divider"></div>
							@if(in_array('profile', Auth::user()->permissions))
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">
								<form class="form-horizontal using-password-strength" method="POST" action="{{ route('change_password') }}">
									@csrf
									<div id="currentpwBox" class="form-group">
										<label for="currentpw" class="col-sm-4 control-label">{{ __('messages.Current_password') }}</label>
										<div class="col-sm-5" style="position: relative;">
											<input type="password" class="form-control" name="currentpw" id="currentpw" autocomplete="off">
											<img src="assets/img/eye.svg" class="settings-password-img icon-password eye-closed">
											<img src="assets/img/eye-open.svg" class="settings-password-img icon-password eye-open" style="display:none">
											<br>
										</div>
									</div>
									<div id="newPassword1" class="form-group has-feedback has-success">
										<label for="inputNewPassword1" class="col-sm-4 control-label">{{ __('messages.New_Password') }}</label>
										<div class="col-sm-5" style="position: relative;">
											<input type="password" class="form-control" name="newpw" id="inputNewPassword1" autocomplete="off">
											<img src="assets/img/eye.svg" class="settings-password-img icon-password eye-closed">
											<img src="assets/img/eye-open.svg" class="settings-password-img icon-password eye-open" style="display:none">
											<br>

											<div class="progress" id="passwordStrengthBar">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
													<span class="sr-only">{{ __('messages.Password_Rating') }}: 0%</span>
												</div>
											</div>

											<div class="alert alert-info">
												<strong>{{ __('messages.tips') }}</strong><br>{{ __('messages.tips_content1') }}<br>{{ __('messages.tips_content4') }}<br>{{ __('messages.tips_content3') }}
											</div>
										</div>
									</div>
									<div id="newPassword2" class="form-group has-feedback has-success">
										<label for="inputNewPassword2" class="col-sm-4 control-label">{{ __('messages.Confirm_New_Password') }}</label>
										<div class="col-sm-5" style="position: relative;">
											<input type="password" class="form-control" name="confirmpw" id="inputNewPassword2" autocomplete="off">
											<img src="assets/img/eye.svg" class="settings-password-img icon-password eye-closed">
											<img src="assets/img/eye-open.svg" class="settings-password-img icon-password eye-open" style="display:none">
											<div id="inputNewPassword2Msg"></div>
										</div>
									</div>
									<div class="overview-button-wrapper pt-0 mt-4">
										<div class="col-sm-5">
											<button id="submitButton" class="btn-dark px-4 me-2 hover-dark-light" disabled="disabled">{{ __('messages.Save_changes') }}</button>
										</div>
									</div>
								</form>

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

<script type="text/javascript">
	jQuery("#inputNewPassword1").keyup(function() {
		var pwStrengthErrorThreshold = 50;
		var pwStrengthWarningThreshold = 75;

		var $newPassword1 = jQuery("#newPassword1");
		var pw = jQuery("#inputNewPassword1").val();
		var pwlength = (pw.length);
		if (pwlength > 5) pwlength = 5;
		var numnumeric = pw.replace(/[0-9]/g, "");
		var numeric = (pw.length - numnumeric.length);
		if (numeric > 3) numeric = 3;
		var symbols = pw.replace(/\W/g, "");
		var numsymbols = (pw.length - symbols.length);
		if (numsymbols > 3) numsymbols = 3;
		var numupper = pw.replace(/[A-Z]/g, "");
		var upper = (pw.length - numupper.length);
		if (upper > 3) upper = 3;
		var pwstrength = ((pwlength * 10) - 20) + (numeric * 10) + (numsymbols * 15) + (upper * 10);
		if (pwstrength < 0) pwstrength = 0;
		if (pwstrength > 100) pwstrength = 100;

		$newPassword1.removeClass('has-error has-warning has-success');
		jQuery("#inputNewPassword1").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-warning-sign glyphicon-ok');
		jQuery("#passwordStrengthBar .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").css("width", pwstrength + "%").attr('aria-valuenow', pwstrength);
		jQuery("#passwordStrengthBar .progress-bar .sr-only").html('New Password Rating: ' + pwstrength + '%');
		if (pwstrength < pwStrengthErrorThreshold) {
			$newPassword1.addClass('has-error');
			jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-remove');
			jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-danger");
		} else if (pwstrength < pwStrengthWarningThreshold) {
			$newPassword1.addClass('has-warning');
			jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-warning-sign');
			jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-warning");
		} else {
			$newPassword1.addClass('has-success');
			jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-ok');
			jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-success");
		}
		validatePassword2();
	});

	function validatePassword2() {
		var password1 = jQuery("#inputNewPassword1").val();
		var password2 = jQuery("#inputNewPassword2").val();
		var $newPassword2 = jQuery("#newPassword2");

		if (password2 && password1 !== password2) {
			$newPassword2.removeClass('has-success')
				.addClass('has-error');
			jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-ok').addClass('glyphicon-remove');
			jQuery("#inputNewPassword2Msg").html('<p class="help-block" id="nonMatchingPasswordResult">{{ __('messages.not_match') }}</p>');
			jQuery('#submitButton').attr('disabled', 'disabled');
		} else {
			if (password2) {
				$newPassword2.removeClass('has-error')
					.addClass('has-success');
				jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-remove').addClass('glyphicon-ok');
				jQuery('#submitButton').removeAttr('disabled');
			} else {
				$newPassword2.removeClass('has-error has-success');
				jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-ok');
			}
			jQuery("#inputNewPassword2Msg").html('');
		}
	}

	jQuery(document).ready(function() {
		jQuery('.using-password-strength input[type="submit"]').attr('disabled', 'disabled');
		jQuery("#inputNewPassword2").keyup(function() {
			validatePassword2();
		});
	});
</script>

@endsection