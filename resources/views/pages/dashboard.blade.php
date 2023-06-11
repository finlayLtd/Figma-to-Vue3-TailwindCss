@extends('layouts.app')

@section('content')
<section class="dashboard">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center title-button-wrapper position-relative">
			<h2 class="title mb-0">Dashboard</h2>
			<button type="submit" class="btn btn-dark btn-chevron chevron-dark hover-dark-light options-toggle">Create Server</button>

			<div class="options-toggle-dropdown create-server">
				<ul>
					<li><a href="{{ url('/create-dedicated-server') }}">Create Dedicated Server</a></li>
					<li><a href="{{ url('/create-vps-server') }}">Create VPS</a></li>
				</ul>
			</div>
		</div>

		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center ">
				<div class="col-md-12">
					<div class="w-100 mb-2 mb-lg-5">
						<h3 class="sub-title">Support Tickets</h3>
					</div>

					<div class="w-100 support-table support-ticket-table mb-4">
						@include('tables.dashboard-tickettable')
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
			<div class="row justify-content-between align-items-center ">
				<div class="row mb-3 mb-lg-5 pe-0">
					<h3 class="col-md-3 sub-title pt-2">My Products & Services</h3>
					<div class="col-md-9 d-flex justify-content-end pe-0 flex-wrap list-flex-nav">
						<ul class="nav nav-pills four-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0 flex-nowrap" id="pills-tab" role="tablist">
							@foreach($states as $state)
							<li class="nav-item" role="presentation">
								@if($state != 'Active') <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$state}}" type="button" role="tab" aria-controls="pills-{{$state}}" aria-selected="true">{{$state}}</button>
								@else <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$state}}" type="button" role="tab" aria-controls="pills-{{$state}}" aria-selected="true">{{$state}}</button>
								@endif
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="tab-content opt-padding" id="pills-tabContent">
					@foreach($states as $state)
						@if($state == 'Active') <div class="tab-pane fade show active" id="pills-{{$state}}" role="tabpanel" aria-labelledby="pills-{{$state}}-tab">
						@else <div class="tab-pane fade" id="pills-{{$state}}" role="tabpanel" aria-labelledby="pills-{{$state}}-tab">
						@endif
							<div class="row mb-5">
								@if(count($state_order))
								@foreach($state_order[$state] as $order)
									<div class="col-12 col-lg-4 col-md-6 col-sm-12">
										<div class="card-item p-4 mb-4">
											<div class="server-list-item">
												<div class="server-list-item-wrapper">
													<div class="image-wrapper">
														<img src="assets/img/{{ $order['sys_log'] }}-logo.png" alt=""> 
													</div>
													<div class="list-item-detail">
														<h2 class="list-name">
															{{$order['name']}}
														</h2>
														<h3 class="detail">
															{{$order['configoptions']['configoption'][1]['value']}}
														</h3>
														<div class="server-list-options">
															<div class="options-toggle">

															</div>
															<div class="options-toggle-dropdown">
																<ul>
																	<li><a href="{{ url('/overview') }}">Launch Control Panel</a></li>
																	<li><a href="#">View Invoices</a></li>
																</ul>
															</div>                    			
														</div>                    			
													</div>
												</div>
											</div>
											<div class="server-list-item">
												<div class="server-list-item-wrapper">
													<div class="image-wrapper">
														<img class="dark-img-filter" src="assets/img/cloud-connection.png" alt="">                    			
													</div>
													<div class="list-item-detail">
														<h2 class="list-name">
															{{$order['dedicatedip']}}
														</h2>
														<h3 class="detail">
															Created at {{$order['regdate']}}
														</h3>                    			
													</div>
													<div class="server-list-options">
														@if($state == 'Active')
															<button class="active-badge"><span class="active-dot"></span>Active</button>
														@endif
													</div>
												</div>
											</div>
											<div class="server-list-item">
												<div class="server-list-item-wrapper">
													<div class="image-wrapper">
														<img src="assets/img/{{$order['flag']}}.png" alt="">                    			
													</div>
													<div class="list-item-detail">
														<h2 class="list-name">
															{{$order['groupname']}}
														</h2>
														<h3 class="detail">
															Hostname: {{$order['domain']}}
														</h3>                    			
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach
								@else
									@if($state == 'Active')
									<h5 style="margin-top: 20px; text-align: center;">You don’t have an active product yet</h5>
									@endif
								@endif
							</div>
						</div>	
					@endforeach
				</div>
			</div>
		</div>

		<div class="sub-section server-list-tab">
			<h3 class="sub-title">Choose a Datacenter region</h3>
			@if(count($products))
				@foreach($product_group as $key=>$group)
					<div class="row">
						<div class="image-wrapper mb-2">
							@if($key == 2) <img src="assets/img/flag-nl.png" alt="" />  
							@else <img src="assets/img/flag-en.png" alt="" />  
							@endif
							{{$group}}
						</div>
						<hr/>
						@foreach($products as $prodcut)
							@if($prodcut['gid'] == $key)
								<div class="col-md-3 m-1 mb-4">
									<div class="card-item data-region-card ">
										<div class="server-name mb-4">
											<span class="name">{{$prodcut['name']}}</span>
										</div>

										<div class="server-price mb-4">
											<span class="price">€{{$prodcut['pricing']['EUR']['monthly']}}<span class="month">/ month</span></span>
										</div>

										<div class="">
										<ul class="server-features">
											<li><img src="assets/img/cpu.png" alt="">{{$prodcut['server_info'][0]}}</li>
											<li><img src="assets/img/ram.png" alt="">{{$prodcut['server_info'][1]}}</li>
											<li><img src="assets/img/hard-disk.png" alt="">{{$prodcut['server_info'][2]}}</li>
											<li><img src="assets/img/speedometer.png" alt="">{{$prodcut['server_info'][3]}}</li>
											<li><img src="assets/img/cable.png" alt="">{{$prodcut['server_info'][4]}}</li>
										</ul>                    
										</div>
										<div class="more-details-wrapper mt-3">
											<div class="more-details-content">
												<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ullam repellendus aspernatur placeat rem, molestiae veritatis porro, facilis quo, repudiandae odio quia debitis iste nemo assumenda omnis? Quo, dignissimos, ducimus!</p>
											</div>
											<a class="btn btn-light btn-chevron d-lg-block hover-light-dark toggle-more-detail">More Details</a>	
										</div>                   
									</div>
								</div>
							@endif
						@endforeach
					@endforeach
				</div>	
			@endif
		</div>
	</div>

</section>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		initPageNation_ticket(1);
	});

	function initPageNation_ticket(selectPage) {
		cnt = $("#ticket-pagination-container").attr("total-ticket-num");
		btn_number = Math.ceil(cnt / 10);
		if (selectPage <= 0) return;
		if (selectPage > btn_number) return;
		$("#ticket-pagination-container").empty();
		btn_str = "<li class='ticket-page page-item first' page-number='0'><span class='page-link' style='cursor:pointer;'>Previous</span></li>";
		$("#ticket-pagination-container").append(btn_str);
		if (btn_number > 6) {
			switch (selectPage) {
				case 1:
					var btn_str = "<li id='page-1' class='ticket-page page-item active' page-number='1'><span class='page-link' style='cursor:pointer;'>1</span></li>";
					btn_str += "<li id='page-2' class='ticket-page page-item' page-number='2'><span class='page-link' style='cursor:pointer;'>2</span></li>";
					btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
					btn_str += "<li id='page-" + (btn_number - 1) + "' class='ticket-page page-item' page-number='" + (btn_number - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 1) + "</span></li>";
					btn_str += "<li id='page-" + (btn_number) + "' class='ticket-page page-item' page-number='" + (btn_number) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number) + "</span></li>";
					$("#ticket-pagination-container").append(btn_str);
					break;
				case 2:
					var btn_str = "<li id='page-1' class='ticket-page page-item' page-number='1'><span class='page-link' style='cursor:pointer;'>1</span></li>";
					btn_str += "<li id='page-2' class='ticket-page page-item active' page-number='2'><span class='page-link' style='cursor:pointer;'>2</span></li>";
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
					btn_str += "<li id='page-" + (btn_number - 1) + "' class='ticket-page page-item  active' page-number='" + (btn_number - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 1) + "</span></li>";
					btn_str += "<li id='page-" + (btn_number) + "' class='ticket-page page-item' page-number='" + (btn_number) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number) + "</span></li>";
					$("#ticket-pagination-container").append(btn_str);
					break;
				case btn_number:
					var btn_str = "<li id='page-1' class='ticket-page page-item' page-number='1'><span class='page-link' style='cursor:pointer;'>1</span></li>";
					btn_str += "<li id='page-2' class='ticket-page page-item' page-number='2'><span class='page-link' style='cursor:pointer;'>2</span></li>";
					btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
					btn_str += "<li id='page-" + (btn_number - 1) + "' class='ticket-page page-item' page-number='" + (btn_number - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 1) + "</span></li>";
					btn_str += "<li id='page-" + (btn_number) + "' class='ticket-page page-item active' page-number='" + (btn_number) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number) + "</span></li>";
					$("#ticket-pagination-container").append(btn_str);
					break;

				default:
					var btn_str = "<li id='page-1' class='ticket-page page-item' page-number='1'><span class='page-link' style='cursor:pointer;'>1</span></li>";
					btn_str += "<li id='page-2' class='ticket-page page-item' page-number='2'><span class='page-link' style='cursor:pointer;'>2</span></li>";
					if (selectPage != 3) {
						if (selectPage != (btn_number - 2)) {
							if ((selectPage - 2) > 2) btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
							btn_str += "<li id='page-" + (selectPage - 1) + "' class='ticket-page page-item' page-number='" + (selectPage - 1) + "'><span class='page-link' style='cursor:pointer;'>" + (selectPage - 1) + "</span></li>";
							btn_str += "<li id='page-" + (selectPage) + "' class='ticket-page page-item active' page-number='" + (selectPage) + "'><span class='page-link' style='cursor:pointer;'>" + (selectPage) + "</span></li>";
							btn_str += "<li id='page-" + (selectPage + 1) + "' class='ticket-page page-item' page-number='" + (selectPage + 1) + "'><span class='page-link' style='cursor:pointer;'>" + (selectPage + 1) + "</span></li>";
							if ((selectPage + 2) < (btn_number - 1)) btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
						} else {
							btn_str += "<li id='page-ellipsis' class='ticket-page page-item' page-number='ellipsis'><span class='page-link' style='cursor:pointer;'><i class='fa fa-ellipsis page-link'></i></li>";
							btn_str += "<li id='page-" + (btn_number - 2) + "' class='ticket-page page-item active' page-number='" + (btn_number - 2) + "'><span class='page-link' style='cursor:pointer;'>" + (btn_number - 2) + "</span></li>";
						}
					} else {
						btn_str += "<li id='page-3' class='ticket-page page-item active' page-number='3'><span class='page-link' style='cursor:pointer;'>3</span></li>";
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
				if (loop == selectPage) var btn_str = "<li id='page-" + loop + "' class='ticket-page page-item active' page-number='" + loop + "'><span class='page-link' style='cursor:pointer;'>" + loop + "</span></li>";
				else var btn_str = "<li id='page-" + loop + "' class='ticket-page page-item' page-number='" + loop + "'><span class='page-link' style='cursor:pointer;'>" + loop + "</span></li>";
				$("#ticket-pagination-container").append(btn_str);
			}
		}
		var btn_str = "<li class='ticket-page page-item last' page-number='-2'><span class='page-link' style='cursor:pointer;'>Next</span></li>";
		$("#ticket-pagination-container").append(btn_str);

		$('.ticket-page').on('click', function(event) {
			var selectedButtonValue = $(this).attr("page-number") * 1;
			var CurrentSelectedPage = $(".active").attr("page-number") * 1;
			if (selectedButtonValue > 0) {
				initPageNation_ticket(selectedButtonValue);
			} else {
				switch (selectedButtonValue) {
					case -1:
						initPageNation_ticket(1);
						break;
					case 0:
						initPageNation_ticket(CurrentSelectedPage - 1);
						break;
					case -2:
						initPageNation_ticket(CurrentSelectedPage + 1);
						break;
					case -3:
						initPageNation_ticket(btn_number);
						break;
				}
			}
			UserCards();
		});
	}

	function UserCards() {
		var selectedPage = $('.active').attr("page-number") * 1;

		console.log(selectedPage);

		$.ajax({
			url: "{{ URL::to('/dashboard/ticketlist') }}",
			method: "GET",
			data: {
				'offset': selectedPage
			},
			success: function(data) {
				$('.support-ticket-table').empty();
				$('.support-ticket-table').html(data);
			},
		});
	}
</script>
@endsection