@extends('layouts.app')

@section('content')
<section class="overview" style="position: relative;">


	<div class="container">
		@if(isset($message) && $message=='success')
		<div class="badge reset-success">
			<img src="assets/img/reset-success.svg" alt=""> {{ __('messages.success_invite') }}
		</div>
		@endif

		@if(isset($message) && $message=='success_update_permission')
		<div class="badge reset-success">
			<img src="assets/img/reset-success.svg" alt=""> {{ __('messages.success_permission_update') }} 
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
									<button class="nav-link" id="pills-analytics-tab" data-bs-toggle="pill" data-bs-target="#pills-analytics" type="button" role="tab" aria-controls="pills-analytics" aria-selected="false">{{ __('messages.Change_Password') }}</button>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="{{ url('/settings_userManage') }}">
									<button class="nav-link active" id="pills-userManagement-tab" data-bs-toggle="pill" data-bs-target="#pills-userManagement" type="button" role="tab" aria-controls="pills-userManagement" aria-selected="false">{{ __('messages.User_Management') }}</button>
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
					<!-- userManagement tab -->
					<div class="tab-pane fade show active" id="pills-userManagement" role="tabpanel" aria-labelledby="pills-userManagement-tab">
						
						@if(Auth::user()->originUserData['email'] == Auth::user()->email)
						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">{{ __('messages.User_Management') }} ({{ count($users_list) }} {{ count($users_list) == 1 ? __('messages.User') : __('messages.Users') }} {{ __('messages.found') }})</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">
								<div class="w-100 mb-5 support-table">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">{{ __('messages.email_lastlogin') }}</th>
												<th scope="col">{{ __('messages.Actions') }}</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($users_list as $item)
											@if($item['is_owner'])
											<tr>
												<td>
													{{ $item['email'] }}
													<span class="badge bg-info">{{ __('messages.Owner') }}</span>
													<br>
												</td>
												<td>
													<button class="btn btn-dark btn-sm btn-manage-permissions managePermissionBtn" disabled="disabled">
														{{ __('messages.Manage_Permissions') }}
													</button>

													<button href="#" class="btn btn-danger btn-sm btn-remove-user" data-id="{{ $item['id'] }}" disabled="disabled">
														{{ __('messages.Remove_Access') }}
													</button>
												</td>
											</tr>
											@else
											<!-- new user -->
											<tr>
												<td>
													{{ $item['email'] }}
													<br>
												</td>
												<td>
													<a href="{{ url('/manageUser-detail/' . $item['id'].'/'.$item['email']) }}" class="btn btn-dark btn-sm btn-manage-permissions managePermissionBtn" disabled="disabled">
														{{ __('messages.Manage_Permissions') }}
													</a>
													<button href="#" class="btn btn-danger btn-sm btn-remove-user" data-id="{{ $item['id'] }}">
														{{ __('messages.Remove_Access') }}
													</button>
												</td>
											</tr>
											@endif
											@endforeach


										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<h3 class="title mb-4">{{ __('messages.Invite_New_User') }}</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">
								<p>
									{{ __('messages.invite_caption1') }}
								</p>
								<div class="mb-4">
									<form method="POST" action="{{ route('invite_user') }}">
										@csrf
										<div>
											<input type="email" id="invite_email" name="invite_email" placeholder="{{ __('messages.invite_placeholder') }}" required class="form-control">
										</div>
										<div class="form-group selectBoxes mt-4">
											<label class="radio-inline" style="padding-right: 20px;">
												<input type="radio" name="permissions" value="all" checked="checked">
												{{ __('messages.All_Permissions') }}
											</label>
											<label class="radio-inline">
												<input type="radio" name="permissions" value="choose">
												{{ __('messages.Choose_Permissions') }}
											</label>
											<div class="well" id="invitePermissions" style="display: none;">
												<label class="checkbox-inline">
													<input type="checkbox" name="profile" value="1">
													Modify Master Account Profile
													-
													Access and modify the client profile information
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="contacts" value="1">
													View &amp; Manage Contacts
													-
													Access and manage contacts
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="products" value="1">
													View Products &amp; Services
													-
													View access to products, services and addons
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="manageproducts" value="1">
													View &amp; Modify Product Passwords
													-
													Allow password resets and other actions
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="productsso" value="1">
													Perform Single Sign-On
													-
													Allow single sign-on into services
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="domains" value="1">
													View Domains
													-
													View access to domain registrations
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="managedomains" value="1">
													Manage Domain Settings
													-
													Allow domain management eg. nameservers/whois/transfers
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="invoices" value="1">
													View &amp; Pay Invoices
													-
													View and payment access to invoices
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="quotes" value="1">
													View &amp; Accept Quotes
													-
													View and acceptance permissions for quotes
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="tickets" value="1">
													View &amp; Open Support Tickets
													-
													Access to open, respond and manage support tickets
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="affiliates" value="1">
													View &amp; Manage Affiliate Account
													-
													Access to view and request withdrawals
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="emails" value="1">
													View Emails
													-
													Access to view account email history
												</label>
												<br>
												<label class="checkbox-inline">
													<input type="checkbox" name="orders" value="1">
													Place New Orders/Upgrades/Cancellations
													-
													Allow placing of new orders
												</label>
												<br>
											</div>
										</div>
										<button type="submit" class="btn btn-dark mt-4">
											Send Invite
										</button>
									</form>

									<form id="remove-user-form" method="POST" action="{{ route('remove_access') }}">
										@csrf
										<input type="hidden" id="remove-user-id" name="user_id" value="">
									</form>
								</div>


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
</section>
<script>
	$(document).ready(function() {
		$('input:radio[name=permissions]').change(function() {
			if (this.value === 'choose') {
				$('#invitePermissions').hide().removeClass('hidden').slideDown();
			} else {
				$('#invitePermissions').slideUp();
			}
		});

		$('.btn-remove-user').click(function() {
			var userId = $(this).data('id');
			$('#remove-user-id').val(userId);
			$('#remove-user-form').submit();
		});
	});
</script>
@endsection