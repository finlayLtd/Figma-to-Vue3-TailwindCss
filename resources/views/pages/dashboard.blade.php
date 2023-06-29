@extends('layouts.app')

@section('content')
<section class="dashboard">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center title-button-wrapper position-relative">
			<h2 class="title mb-0">{{ __('messages.Dashboard') }}</h2>
			<button type="submit" class="btn btn-dark btn-chevron chevron-dark hover-dark-light options-toggle">{{ __('messages.Create_Server') }}</button>

			<div class="options-toggle-dropdown create-server">
				<ul>
					<li><a href="{{ url('/create-vps-server') }}">{{ __('messages.Create_VPS') }}</a></li>
				</ul>
			</div>
		</div>

		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center ">
				<div class="col-md-12">
					<div class="w-100 mb-2 mb-lg-5">
						<h3 class="sub-title">{{ __('messages.Support_Ticket') }}</h3>
					</div>

					<div class="support-ticket-table">
						@include('tables.tickettable')
					</div>

					<div class="w-100 server-list-pagination">
						<nav aria-label="...">
							<ul class="pagination" id="ticket-pagination-container" total-ticket-num="{{$total_tickets}}">

							</ul>
						</nav>
					</div>
					
				</div>
			</div>
		</div>

		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center my-services">
				@include('tables.services')
			</div>
		</div>
		
	</div>

</section>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		initPageNation_ticket(1, false);
	});

	function initPageNation_ticket(selectPage, flag, orderby, order) {

		

		cnt = $("#ticket-pagination-container").attr("total-ticket-num");
		btn_number = Math.ceil(cnt / 10);
		if (selectPage <= 0) return;
		if (selectPage > btn_number) return;
		$("#ticket-pagination-container").empty();
		btn_str = "<li class='ticket-page page-item first' page-number='0'><span class='page-link' style='cursor:pointer;'>{{ __('messages.Previous') }}</span></li>";
		$("#ticket-pagination-container").append(btn_str);
		if (btn_number > 6) {
			switch (selectPage) {
				case 1:
					var btn_str = "<li id='page-1' class='ticket-page page-item active active-pageNow' page-number='1'><span class='page-link' style='cursor:pointer;'>1</span></li>";
					btn_str += "<li id='page-2' class='ticket-page page-item' page-number='2'><span class='page-link' style='cursor:pointer;'>2</span></li>";
					btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
					btn_str += "<li id='page-" + (btn_number - 1) + "' class='ticket-page page-item' page-number='" + (btn_number - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 1) + "</span></li>";
					btn_str += "<li id='page-" + (btn_number) + "' class='ticket-page page-item' page-number='" + (btn_number) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number) + "</span></li>";
					$("#ticket-pagination-container").append(btn_str);
					break;
				case 2:
					var btn_str = "<li id='page-1' class='ticket-page page-item' page-number='1'><span class='page-link' style='cursor:pointer;'>1</span></li>";
					btn_str += "<li id='page-2' class='ticket-page page-item active active-pageNow' page-number='2'><span class='page-link' style='cursor:pointer;'>2</span></li>";
					btn_str += "<li id='page-3' class='ticket-page page-item' page-number='3'><span class='page-link' style='cursor:pointer;'>3</span></li>";
					btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
					btn_str += "<li id='page-" + (btn_number - 1) + "' class='ticket-page page-item' page-number='" + (btn_number - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 1) + "</span></li>";
					btn_str += "<li id='page-" + (btn_number) + "' class='ticket-page page-item' page-number='" + (btn_number) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number) + "</span></li>";
					$("#ticket-pagination-container").append(btn_str);
					break;
				case (btn_number - 1):
					var btn_str = "<li id='page-1' class='ticket-page page-item' page-number='1'><span class='page-link' style='cursor:pointer;'>1</span></li>";
					btn_str += "<li id='page-2' class='ticket-page page-item' page-number='2'><span class='page-link' style='cursor:pointer;'>2</span></li>";
					btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
					btn_str += "<li id='page-" + (btn_number - 2) + "' class='ticket-page page-item page-number='" + (btn_number - 2) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 2) + "</span></li>";
					btn_str += "<li id='page-" + (btn_number - 1) + "' class='ticket-page page-item  active active-pageNow' page-number='" + (btn_number - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 1) + "</span></li>";
					btn_str += "<li id='page-" + (btn_number) + "' class='ticket-page page-item' page-number='" + (btn_number) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number) + "</span></li>";
					$("#ticket-pagination-container").append(btn_str);
					break;
				case btn_number:
					var btn_str = "<li id='page-1' class='ticket-page page-item' page-number='1'><span class='page-link' style='cursor:pointer;'>1</span></li>";
					btn_str += "<li id='page-2' class='ticket-page page-item' page-number='2'><span class='page-link' style='cursor:pointer;'>2</span></li>";
					btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
					btn_str += "<li id='page-" + (btn_number - 1) + "' class='ticket-page page-item' page-number='" + (btn_number - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 1) + "</span></li>";
					btn_str += "<li id='page-" + (btn_number) + "' class='ticket-page page-item active active-pageNow' page-number='" + (btn_number) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number) + "</span></li>";
					$("#ticket-pagination-container").append(btn_str);
					break;

				default:
					var btn_str = "<li id='page-1' class='ticket-page page-item' page-number='1'><span class='page-link' style='cursor:pointer;'>1</span></li>";
					btn_str += "<li id='page-2' class='ticket-page page-item' page-number='2'><span class='page-link' style='cursor:pointer;'>2</span></li>";
					if (selectPage != 3) {
						if (selectPage != (btn_number - 2)) {
							if ((selectPage - 2) > 2) btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
							btn_str += "<li id='page-" + (selectPage - 1) + "' class='ticket-page page-item' page-number='" + (selectPage - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (selectPage - 1) + "</span></li>";
							btn_str += "<li id='page-" + (selectPage) + "' class='ticket-page page-item active active-pageNow' page-number='" + (selectPage) + "'><span class='page-link' style='cursor:pointer;'>" + (selectPage) + "</span></li>";
							btn_str += "<li id='page-" + (selectPage + 1) + "' class='ticket-page page-item' page-number='" + (selectPage + 1) + "'><span class='page-link' style='cursor:pointer;'>" + (selectPage + 1) + "</span></li>";
							if ((selectPage + 2) < (btn_number - 1)) btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
						} else {
							btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
							btn_str += "<li id='page-" + (btn_number - 2) + "' class='ticket-page page-item active active-pageNow' page-number='" + (btn_number - 2) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 2) + "</span></li>";
						}
					} else {
						btn_str += "<li id='page-3' class='ticket-page page-item active active-pageNow' page-number='3'><span class='page-link' style='cursor:pointer;'>3</span></li>";
						btn_str += "<li id='page-4' class='ticket-page page-item' page-number='4'><span class='page-link' style='cursor:pointer;'>4</span></li>";
						btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
					}
					btn_str += "<li id='page-" + (btn_number - 1) + "' class='ticket-page page-item' page-number='" + (btn_number - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 1) + "</span></li>";
					btn_str += "<li id='page-" + (btn_number) + "' class='ticket-page page-item' page-number='" + (btn_number) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number) + "</span></li>";
					$("#ticket-pagination-container").append(btn_str);
					break;
			}
		} else {
			for (var loop = 1; loop <= btn_number; loop++) {
				if (loop == selectPage) var btn_str = "<li id='page-" + loop + "' class='ticket-page page-item active active-pageNow' page-number='" + loop + "'><span class='page-link' style='cursor:pointer;'>" + loop + "</span></li>";
				else var btn_str = "<li id='page-" + loop + "' class='ticket-page page-item' page-number='" + loop + "'><span class='page-link' style='cursor:pointer;'>" + loop + "</span></li>";
				$("#ticket-pagination-container").append(btn_str);
			}
		}
		var btn_str = "<li class='ticket-page page-item last' page-number='-2'><span class='page-link' style='cursor:pointer;'>{{ __('messages.Next') }}</span></li>";
		$("#ticket-pagination-container").append(btn_str);

		$('.ticket-page').on('click', function(event) {
			var selectedButtonValue = $(this).attr("page-number") * 1;
			var CurrentSelectedPage = $(".active-pageNow").attr("page-number") * 1;
			if (selectedButtonValue > 0) {
				initPageNation_ticket(selectedButtonValue, flag);
			} else {
				switch (selectedButtonValue) {
					case -1:
						initPageNation_ticket(1, flag);
						break;
					case 0:
						initPageNation_ticket(CurrentSelectedPage - 1, flag);
						break;
					case -2:
						initPageNation_ticket(CurrentSelectedPage + 1, flag);
						break;
					case -3:
						initPageNation_ticket(btn_number, flag);
						break;
				}
			}
			UserCards(flag, orderby, order);
		});
	}

	function UserCards(flag, orderby, order) {
		var selectedPage = $('.active-pageNow').attr("page-number") * 1;

		$('#loading-bg').css('display', 'flex');
		if(flag == true){
			$.ajax({
				url: "{{ URL::to('/dashboard/ticketlist') }}",
				method: "GET",
				data: {
					'offset': selectedPage,
					'orderby': orderby,
					'order': order,
				},
				success: function(data) {
					$('#loading-bg').css('display', 'none');
					$('.support-ticket-table').empty();
					$('.support-ticket-table').html(data);
					if(flag == true) toggleSortingItems();
				},
				error: function(xhr, status, error) {
					// Handle the error here
					console.log(error);
					$('#loading-bg').css('display', 'none');
					if(flag == true) toggleSortingItems();
				},
			});
		} else{
			$.ajax({
				url: "{{ URL::to('/dashboard/ticketlist') }}",
				method: "GET",
				data: {
					'offset': selectedPage
				},
				success: function(data) {
					$('#loading-bg').css('display', 'none');
					$('.support-ticket-table').empty();
					$('.support-ticket-table').html(data);
					if(flag == true)  toggleSortingItems();
				},
				error: function(xhr, status, error) {
					// Handle the error here
					console.log(error);
					$('#loading-bg').css('display', 'none');
					if(flag == true) toggleSortingItems();
				},
			});
		}

		
	}

	function sortByTicket_dashboard(orderby, order) {
		initPageNation_ticket(1, true, orderby, order);
		UserCards(true, orderby, order);
	}

	function updateServices(orderby){
		$('#loading-bg').css('display', 'flex');
		$.ajax({
			url: "{{ URL::to('/dashboard/orderservice') }}",
			method: "GET",
			data: {
				'orderby': orderby
			},
			success: function(data) {
				$('.my-services').html('');
				$('#loading-bg').css('display', 'none');
				$('.my-services').html(data);
				$(".options-toggle").click(function() {
					$(this).siblings(".options-toggle-dropdown").toggle();
				})
				initPageNation_ticket(1, false);
			},
			error: function(xhr, status, error) {
				// Handle the error here
				console.log(error);
				$('#loading-bg').css('display', 'none');
			},
		});
	}
</script>
@endsection