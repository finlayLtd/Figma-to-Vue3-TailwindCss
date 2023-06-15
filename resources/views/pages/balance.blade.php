@extends('layouts.app')

@section('content')
<section class="dashboard">
	@if(in_array('invoices', Auth::user()->permissions))
	<div class="container">
		<div class="d-flex justify-content-between align-items-center title-button-wrapper">
			<h2 class="title mb-0">Balance</h2>
		</div>

		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center ">
				<div class="row pe-0">
					<div class="col-md-4 mb-4 mb-md-0">
						<div class="card-item">

							<div class="balance-card-header main-balance-header">
								<div class="main-balance-wrapper">
									<div class="balance-icon">
										<img src="assets/img/wallet.svg" alt="">
									</div>
									<div class="balance-title">
										<h3>Main balance</h3>
									</div>
								</div>
								<div class="balance">
									@if(Auth::user()->currency_code == 'USD')
									${{ Auth::user()->credit }}
									@elseif(Auth::user()->currency_code == 'EUR')
									€{{ Auth::user()->credit }}
									@else
									{{ Auth::user()->credit }} {{ Auth::user()->currency_code }}
									@endif
								</div>
							</div>
							<div class="balance-card-footer d-flex justify-content-end">
								<button class="btn-dark add-funds hover-dark-light">Add Funds</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center ">
				<div class="row mb-3 mb-lg-5 pe-0">
					<h3 class="col-md-3 sub-title pt-2">My Invoices</h3>
					<div class="col-md-9 d-flex justify-content-end pe-0 flex-wrap list-flex-nav">

						<div class="sort-servers order-2 order-md-1">
							<div id="toggleButton" class="sort-item-active btn-chevron chevron-dark">
								<span>Sort by &nbsp;&nbsp;</span>
							</div>
							<div class="sorting-items" style="display: none;">
								<ul>
									<li class="touch-item" onclick="sortByInvoice('date', 'desc')">Date-latest</li>
									<li class="touch-item" onclick="sortByInvoice('date', 'asc')">Date-oldest</li>
									<li class="touch-item" onclick="sortByInvoice('total', 'desc')">Price-highest</li>
									<li class="touch-item" onclick="sortByInvoice('total', 'asc')">Price-lowest</li>
								</ul>
							</div>
						</div>

						<ul class="nav nav-pills three-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0 flex-nowrap" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-paid-tab" data-bs-toggle="pill" data-bs-target="#pills-paid" type="button" role="tab" aria-controls="pills-paid" aria-selected="false">Paid</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-unpaid-tab" data-bs-toggle="pill" data-bs-target="#pills-unpaid" type="button" role="tab" aria-controls="pills-unpaid" aria-selected="false">Unpaid</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-cancelled-tab" data-bs-toggle="pill" data-bs-target="#pills-cancelled" type="button" role="tab" aria-controls="pills-cancelled" aria-selected="false">Cancelled</button>
							</li>
						</ul>

					</div>
				</div>

				<div class="w-100 invoice-table mb-4">
					@include('tables.invoicetable')
				</div>
				
			</div>
		</div>
		@else
			@include('component.no-permission-go-back')
		@endif
	</section>

<div class="modal modal-balance hidden">
	<div class="modal-inner">
		<div class="modal-close">
			<img class="close-dark" src="assets/img/close.svg" alt="">
			<img class="close-light" src="assets/img/close-light.svg" alt="">

		</div>
		<div class="modal-content">

			<div class="modal-header">
				<div class="modal-title">
					<h2>Deposit</h2>
					<h3>Deposit cryptocurrency</h3>
				</div>
			</div>
			<div class="modal-main">
				<div class="main-title">
					<p>Available Payment method</p>
				</div>
				<div class="modal-buttons">
					<button class="modal-payment"><img src="assets/img/bitcoin.png" alt=""> Bitcoin</button>
					<button class="modal-payment"><img src="assets/img/litecoin.png" alt=""> LiteCoin</button>
					<button class="modal-payment"><img src="assets/img/ethereum.png" alt=""> Ethereum</button>
					<button class="modal-payment"><img src="assets/img/bitcoincash.png" alt=""> Bitcoincash</button>
					<button class="modal-payment"><img src="assets/img/tether.png" alt=""> Tether USDT</button>
					<button class="modal-payment"><img src="assets/img/zcash.png" alt=""> ZCash</button>
					<button class="modal-payment"><img src="assets/img/monero.png" alt=""> Monero</button>
					<button class="modal-payment"><img src="assets/img/bnb.png" alt=""> BinanceCoin</button>
					<button class="modal-payment"><img src="assets/img/perfectmoney.png" alt=""> Perfectmoney</button>

				</div>
				<div class="amounts">
					<!-- <h4>Amounts</h4> -->
					<!-- <input type="text" value="321" placeholder=""> -->
					<div class="amount-footer">
						<span>Amount of one deposit</span>
						<span>€10,00 - €1.000,00</span>
					</div>
				</div>
				<button class="btn-dark d-block" onclick="openAddFundsWindow()">Continue</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>


function openAddFundsWindow(){
	windowClose();
	var windowWidth = 1024;
	var windowHeight = 768;
	var leftPosition = (window.screen.width / 2) - (windowWidth / 2);
  	var topPosition = (window.screen.height / 2) - (windowHeight / 2);
	// Make AJAX request to Laravel backend route
	$('#loading-bg').css('display', 'flex');
	$.ajax({
		url: "{{ route('add_funds_sso') }}",
		method: "POST",
		data: { 
			"_token": "{{ csrf_token() }}" 
		},
		success: function(response) {
			if(response.result == "success"){
				Window = window.open(
				response.redirect_url,
					"_blank", "width=" + windowWidth + ", height=" + windowHeight + ", left=" + leftPosition + ", top=" + topPosition);
				$('.modal-balance').addClass('hidden');
				Window.focus();
			} else{
				console.log('access denied for sso!');
			}
			$('#loading-bg').css('display', 'none');
		},
		error: function(xhr, status, error) {
			// Handle the error here
			console.log(error);
			$('#loading-bg').css('display', 'none');
		}
	});
}

function sortByInvoice(orderby, order) {
	// var selectedPage = $('.active').attr("page-number") * 1;
	$('#loading-bg').css('display', 'flex');
	$.ajax({
		url: "{{ URL::to('/balance/invoicelist') }}",
		method: "GET",
		data: {
			'orderby': orderby,
			'order': order,
		},
		success: function(data) {
			$('#loading-bg').css('display', 'none');
			$('.invoice-table').empty();
			$('.invoice-table').html(data);
		},
		error: function(xhr, status, error) {
			// Handle the error here
			console.log(error);
			$('#loading-bg').css('display', 'none');
		}
	});
}

$(document).ready(function() {
  $('.touch-item').click(function() {
    $('.sorting-items').hide();
  });
});


// function that Closes the open Window

</script>
@endsection