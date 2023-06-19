@extends('layouts.app')

@section('content')
<section class="overview" style="position: relative;">


	<div class="container">
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
									<button class="nav-link " id="pills-analytics-tab" data-bs-toggle="pill" data-bs-target="#pills-analytics" type="button" role="tab" aria-controls="pills-analytics" aria-selected="false">{{ __('messages.Change_Password') }}</button>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="{{ url('/settings_userManage') }}">
									<button class="nav-link " id="pills-userManagement-tab" data-bs-toggle="pill" data-bs-target="#pills-userManagement" type="button" role="tab" aria-controls="pills-userManagement" aria-selected="false">{{ __('messages.User_Management') }}</button>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a href="{{ url('/settings_emailHistory') }}">
									<button class="nav-link active" id="pills-emails-tab" data-bs-toggle="pill" data-bs-target="#pills-emails" type="button" role="tab" aria-controls="pills-emails" aria-selected="false">{{ __('messages.Email_History') }}</button>
								</a>
							</li>
						</ul>

					</div>
				</div>

				<div class="tab-content settings-tab-content" id="pills-tabContent">
					<!--email history-->
					<div class="tab-pane fade show active" id="pills-emails" role="tabpanel" aria-labelledby="pills-emails-tab">


						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">{{ __('messages.Email_History') }}</h3>
							</div>
							<div class="divider"></div>
    						@if(in_array('emails', Auth::user()->permissions))
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">
								<div class="w-100 mb-5 support-table">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">{{ __('messages.ID') }}</th>
												<th scope="col">{{ __('messages.Date_Sent') }}</th>
												<th scope="col">{{ __('messages.Message_Subject') }}</th>
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