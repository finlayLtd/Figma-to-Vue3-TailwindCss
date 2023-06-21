@extends('layouts.app')

@section('content')
@if(in_array('tickets', Auth::user()->permissions))
<section class="dashboard">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center title-button-wrapper">
			<h2 class="title mb-0">{{ __('messages.Support_Ticket') }}</h2>
		</div>
		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center ">

				<div class="row mb-5 pe-0">

					<div class="col-md-9 d-flex pe-0 flex-wrap">

						<div class="sort-servers order-2 order-md-1" >
							<div id="toggleButton" class="sort-item-active btn-chevron chevron-dark" style="width: 160px;">
								<span>{{ __('messages.Sort_by') }}...</span>
							</div>
							<div class="sorting-items" style="display: none;">
								<ul>
									<li class="touch-item" onclick="sortByTicket('date', 'desc')">{{ __('messages.Opened-latest') }}</li>
									<li class="touch-item" onclick="sortByTicket('date', 'asc')">{{ __('messages.Opened-oldest') }}</li>
									<li class="touch-item" onclick="sortByTicket('lastreply', 'desc')">{{ __('messages.Last-Reply-latest') }}</li>
									<li class="touch-item" onclick="sortByTicket('lastreply', 'asc')">{{ __('messages.Last-Reply-oldest') }}</li>
								</ul>
							</div>
						</div>

						<ul class="nav nav-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
							</li>
							@foreach ($status as $statu)
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-{{implode('-',explode(' ',$statu['title']))}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{implode('-',explode(' ',$statu['title']))}}" type="button" role="tab" aria-controls="pills-in-work" aria-selected="false">{{$statu['title']}}</button>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="col-md-3 text-end">
						<button type="submit" class="btn btn-dark hover-dark-light d-inline" id="create-ticket">{{ __('messages.Create_Ticket') }}</button>
					</div>

				</div>

				<div class="w-100 support-table mb-4">
					@include('tables.supporttable')
				</div>
				
			</div>
		</div>
</section>
@else
	@include('component.no-permission-go-back')
@endif
<div class="modal modal-ticket hidden">
	<div class="modal-inner">
		<div class="modal-close">
			<img class="close-dark" src="assets/img/close.svg" alt="">
			<img class="close-light" src="assets/img/close-light.svg" alt="">

		</div>
		<div class="modal-content">

			<div class="modal-header">
				<div class="modal-title">
					<h2>{{ __('messages.New_ticket') }}</h2>
					<h3>{{ __('messages.create_ticket_now') }}.</h3>
				</div>
			</div>
			<div class="modal-main">
				<div class="amounts">
					<form id="openTicket" enctype="multipart/form-data" method="POST" action="{{route('ticket.open')}}">
						@csrf
						<h4>{{ __('messages.Subject') }}</h4>
						<input class="mb-3" name="subject" type="text" placeholder="{{ __('messages.Write_subject') }}">

						<h4>{{ __('messages.Describe_the_problem') }}</h4>
						<textarea class="mb-3" name="message" id="" cols="30" rows="8"></textarea>

						<h4>{{ __('messages.Department') }}*</h4>
						<select name="department" id="department">
							@foreach ($departments as $department)
							<option value="{{$department['id']}}">{{$department['name']}}</option>
							@endforeach
						</select>

						@if(sizeof($orders) > 0)
						<h4>{{ __('messages.Service_related') }}</h4>
						<select name="service" id="service">
							<option value="0">- {{ __('messages.None') }} -</option>
							@foreach ($orders as $order_info)
							@foreach($order_info['lineitems']['lineitem'] as $order_value)
							<option value="{{$order_value['relid']}}">{{$order_value['product']}} - {{ $order_value['status'] }}</option>
							@endforeach
							@endforeach
						</select>
						@endif
						<button class="btn-dark d-block w-100 mt-5" id="open-ticket">{{ __('messages.Create_Ticket') }}</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	function sortByTicket(orderby, order) {
		$('#loading-bg').css('display', 'flex');
		$.ajax({
			url: "{{ URL::to('/support-ticket/supportlist') }}",
			method: "GET",
			data: {
				'orderby': orderby,
				'order': order,
			},
			success: function(data) {
				$('#loading-bg').css('display', 'none');
				$('.support-table').empty();
				$('.support-table').html(data);
				toggleSortingItems();
			},
			error: function(xhr, status, error) {
				// Handle the error here
				console.log(error);
				$('#loading-bg').css('display', 'none');
				toggleSortingItems();
			}
		});
	}

	$(document).ready(function() {
		$("#create-ticket").click(function() {
			$(".modal").removeClass("hidden");
		})

		$(".modal-close").click(function() {
			$(".modal").addClass("hidden");
		})
	});
</script>
@endsection


