@extends('layouts.app')

@section('content')
<section class="dashboard">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center title-button-wrapper position-relative">
			<h2 class="title mb-0">{{ __('messages.Servers') }} </h2>
			<button type="submit" class="btn btn-dark btn-chevron chevron-dark hover-dark-light options-toggle">{{ __('messages.Create_Server') }}</button>

			<div class="options-toggle-dropdown create-server">
				<ul>
					<!-- <li><a href="{{ url('/create-dedicated-server') }}">{{ __('messages.Create_dedicated') }}</a></li> -->
					<li><a href="{{ url('/create-vps-server') }}">{{ __('messages.Create_VPS') }}</a></li>
				</ul>
			</div>
		</div>

		<div class="sub-section server-list-tab">
			<div class="d-flex justify-content-between align-items-center title-button-wrapper">
			</div>
			<div class="row justify-content-between align-items-center ">
				@include('tables.services')
			</div>
		</div>

	

	</div>

</section>
@endsection