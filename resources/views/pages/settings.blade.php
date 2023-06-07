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
								<button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" aria-selected="true">Your Profile</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-analytics-tab" data-bs-toggle="pill" data-bs-target="#pills-analytics" type="button" role="tab" aria-controls="pills-analytics" aria-selected="false">Change Password</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-userManagement-tab" data-bs-toggle="pill" data-bs-target="#pills-userManagement" type="button" role="tab" aria-controls="pills-userManagement" aria-selected="false">User Management</button>
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
								<h3 class="title mb-4">Your Profile</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">

								<div class="col-12 col-lg-6 tab-inner py-0 p-mb-0">
									<form method="POST" action="{{ route('change_name') }}">
										@csrf
										<p class="fs-13-5">Email</p>
										<div class="overview-input mb-4">
											<div class="d-inline current-nickname">
												<input type="text" id="disabled_email" name="disabled_email" placeholder="First Name" disabled value="{{ Auth::user()->email }}">
											</div>
										</div>
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
								<h3 class="title mb-4">Change Password</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">

								<div class="col-12 col-lg-6 tab-inner py-0 p-mb-0 settings-tab-border">
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
					<!-- userManagement tab -->
					<div class="tab-pane fade" id="pills-userManagement" role="tabpanel" aria-labelledby="pills-userManagement-tab">
						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">User Management( 2 Users found )</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">
								<div class="w-100 mb-5 support-table">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Email Address / Last Login</th>
												<th scope="col">Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													{{ Auth::user()->email }}
													<span class="badge bg-info">Owner</span>
													<br>
													<small>Last Login: 3 minutes ago</small>
												</td>
												<td>
													<button href="#" class="btn btn-dark btn-sm btn-manage-permissions managePermissionBtn" disabled="disabled">
														Manage Permissions
													</button>
													<button href="#" class="btn btn-danger btn-sm btn-remove-user" data-id="24998" disabled="disabled">
														Remove Access
													</button>
												</td>
											</tr>
											<!-- new user -->
											<tr>
												<td>
													sielivory007@gmail.com
													<br>
													<small>Last Login: 1 day ago</small>
												</td>
												<td>
													<button href="#" class="btn btn-dark btn-sm btn-manage-permissions managePermissionBtn">
														Manage Permissions
													</button>
													<button href="#" class="btn btn-danger btn-sm btn-remove-user" data-id="24998">
														Remove Access
													</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<h3 class="title mb-4">Invite New User</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">
								<p>Inviting a new user allows you to invite a new user to your account. If the invitee already has an existing user account, they will be able to access your account using their existing login credentials. If the user does not yet have a user account, they will be able to create one.</p>
								<div class="mb-4">
									<div>
										<input type="text" id="firstname" name="firstname" placeholder="First Name" required value="{{ Auth::user()->firstname }}" class="form-control">
									</div>
									<div class="form-group selectBoxes mt-4">
										<label class="radio-inline" style="padding-right: 20px;">
											<input type="radio" name="permissions" value="all" checked="checked">
											All Permissions
										</label>
										<label class="radio-inline">
											<input type="radio" name="permissions" value="choose">
											Choose Permissions
										</label>
										<div class="well" id="invitePermissions" style="display: none;">
											<label class="checkbox-inline">
												<input type="checkbox" name="perms[profile]" value="1">
												Modify Master Account Profile
												-
												Access and modify the client profile information
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[contacts]" value="1">
												View &amp; Manage Contacts
												-
												Access and manage contacts
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[products]" value="1">
												View Products &amp; Services
												-
												View access to products, services and addons
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[manageproducts]" value="1">
												View &amp; Modify Product Passwords
												-
												Allow password resets and other actions
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[productsso]" value="1">
												Perform Single Sign-On
												-
												Allow single sign-on into services
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[domains]" value="1">
												View Domains
												-
												View access to domain registrations
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[managedomains]" value="1">
												Manage Domain Settings
												-
												Allow domain management eg. nameservers/whois/transfers
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[invoices]" value="1">
												View &amp; Pay Invoices
												-
												View and payment access to invoices
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[quotes]" value="1">
												View &amp; Accept Quotes
												-
												View and acceptance permissions for quotes
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[tickets]" value="1">
												View &amp; Open Support Tickets
												-
												Access to open, respond and manage support tickets
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[affiliates]" value="1">
												View &amp; Manage Affiliate Account
												-
												Access to view and request withdrawals
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[emails]" value="1">
												View Emails
												-
												Access to view account email history
											</label>
											<br>
													<label class="checkbox-inline">
												<input type="checkbox" name="perms[orders]" value="1">
												Place New Orders/Upgrades/Cancellations
												-
												Allow placing of new orders
											</label>
											<br>
										</div>
									</div>
									<button href="#" class="btn btn-dark mt-4">
										Send Invite
									</button>
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
<script>
$(document).ready(function() {
		$('input:radio[name=permissions]').change(function () {
			if (this.value === 'choose') {
				$('#invitePermissions').hide().removeClass('hidden').slideDown();
			} else {
				$('#invitePermissions').slideUp();
			}
		});
	});
</script>
@endsection

