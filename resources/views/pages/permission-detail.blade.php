@extends('layouts.app')

@section('content')
<section class="dashboard">
	<div class="container">
		<div class="title-button-wrapper ticket-detail">
			<a href="{{url('/settings_userManage')}}"><img class="status-arrow" src="{{asset('assets/img/status-arrow.svg')}}" alt=""></a>
			<h3 class="ticket-status-title color-in-work">Manage Permissions</h3>
			<h2 class="title mb-0 mt-2">{{ $email }}</h2>
		</div>
		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center ">
				<div class="row mb-5 pe-0">

					<div class="col-12">
						<form method="POST" action="{{ route('edit_user_permissions') }}">
							@csrf
							<div class="card-item p-4 mb-4 support-item flex-column ">
								<h3>Permissions</h3>
								<br>
								<input type="hidden" name="user_id" value="{{ $user_id }}">
								<div class="well" id="invitePermissions">
									<label class="checkbox-inline">
										<input type="checkbox" name="profile" value="1" {{$permissions && in_array('profile', $permissions) ? 'checked' : ''}}>
										Modify Master Account Profile - Access and modify the client profile information
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="contacts" value="1" {{$permissions && in_array('contacts', $permissions) ? 'checked' : ''}}>
										View &amp; Manage Contacts - Access and manage contacts
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="products" value="1" {{$permissions && in_array('products', $permissions) ? 'checked' : ''}}>
										View Products &amp; Services - View access to products, services and addons
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="manageproducts" value="1" {{$permissions && in_array('manageproducts', $permissions) ? 'checked' : ''}}>
										View &amp; Modify Product Passwords - Allow password resets and other actions
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="productsso" value="1" {{$permissions && in_array('productsso', $permissions) ? 'checked' : ''}}>
										Perform Single Sign-On - Allow single sign-on into services
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="domains" value="1" {{$permissions && in_array('domains', $permissions) ? 'checked' : ''}}>
										View Domains - View access to domain registrations
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="managedomains" value="1" {{$permissions && in_array('managedomains', $permissions) ? 'checked' : ''}}>
										Manage Domain Settings - Allow domain management eg. nameservers/whois/transfers
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="invoices" value="1" {{$permissions && in_array('invoices', $permissions) ? 'checked' : ''}}>
										View &amp; Pay Invoices - View and payment access to invoices
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="quotes" value="1" {{$permissions && in_array('quotes', $permissions) ? 'checked' : ''}}>
										View &amp; Accept Quotes - View and acceptance permissions for quotes
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="tickets" value="1" {{$permissions && in_array('tickets', $permissions) ? 'checked' : ''}}>
										View &amp; Open Support Tickets - Access to open, respond and manage support tickets
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="affiliates" value="1" {{$permissions && in_array('affiliates', $permissions) ? 'checked' : ''}}>
										View &amp; Manage Affiliate Account - Access to view and request withdrawals
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="emails" value="1" {{$permissions && in_array('emails', $permissions) ? 'checked' : ''}}>
										View Emails - Access to view account email history
									</label>
									<br>
									<label class="checkbox-inline">
										<input type="checkbox" name="orders" value="1" {{$permissions && in_array('orders', $permissions) ? 'checked' : ''}}>
										Place New Orders/Upgrades/Cancellations - Allow placing of new orders
									</label>
									<br>
								</div>
								<button type="submit" class="btn btn-dark mt-4">
									Save Changes
								</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection