@extends('layouts.app')

@section('content')
<section class="dashboard">
	@if(in_array('invoices', Auth::user()->permissions))
	<div class="container">
		<div class="d-flex justify-content-between align-items-center title-button-wrapper">
			<h2 class="title mb-0">{{ __('messages.Balance') }}</h2>
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
										<h3>{{ __('messages.Main_balance') }}</h3>
									</div>
								</div>
								<div class="balance">
									@if(Auth::user()->currency_code == 'USD')
									$<span class="creditTag">{{ $latest_user_data['credit'] }}</span>
									@elseif(Auth::user()->currency_code == 'EUR')
									€<span class="creditTag">{{ $latest_user_data['credit'] }}</span>
									@else
									<span class="creditTag">{{ $latest_user_data['credit'] }}</span> {{ $latest_user_data['currency_code'] }}
									@endif
								</div>
							</div>
							<div class="balance-card-footer d-flex justify-content-end">
								<button class="btn-dark add-funds hover-dark-light" id="addFunds">{{ __('messages.Add_Funds') }}</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center ">
				<div class="row mb-3 mb-lg-5 pe-0">
					<h3 class="col-md-3 sub-title pt-2">{{ __('messages.My_Invoices') }}</h3>
					<div class="col-md-9 d-flex justify-content-end pe-0 flex-wrap list-flex-nav">

						<div class="sort-servers order-2 order-md-1">
							<div id="toggleButton" class="sort-item-active btn-chevron chevron-dark">
								<span>{{ __('messages.Sort_by') }} &nbsp;&nbsp;</span>
							</div>
							<div class="sorting-items" style="display: none;">
								<ul>
									<li class="touch-item" onclick="sortByInvoice('date', 'desc')">{{ __('messages.Date-latest') }}</li>
									<li class="touch-item" onclick="sortByInvoice('date', 'asc')">{{ __('messages.Date-oldest') }}</li>
									<li class="touch-item" onclick="sortByInvoice('total', 'desc')">{{ __('messages.Price-highest') }}</li>
									<li class="touch-item" onclick="sortByInvoice('total', 'asc')">{{ __('messages.Price-lowest') }}</li>
								</ul>
							</div>
						</div>

						<ul class="nav nav-pills three-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0 flex-nowrap" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('messages.All') }}</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-paid-tab" data-bs-toggle="pill" data-bs-target="#pills-paid" type="button" role="tab" aria-controls="pills-paid" aria-selected="false">{{ __('messages.Paid') }}</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-unpaid-tab" data-bs-toggle="pill" data-bs-target="#pills-unpaid" type="button" role="tab" aria-controls="pills-unpaid" aria-selected="false">{{ __('messages.Unpaid') }}</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-cancelled-tab" data-bs-toggle="pill" data-bs-target="#pills-cancelled" type="button" role="tab" aria-controls="pills-cancelled" aria-selected="false">{{ __('messages.Cancelled') }}</button>
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
					<h2>{{ __('messages.Deposit') }}</h2>
					<h3>{{ __('messages.Deposit_cryptocurrency') }}</h3>
				</div>
			</div>
			<div class="modal-main">
				<div class="main-title">
					<p>{{ __('messages.Available_Payment_method') }}</p>
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
					<div class="amount-footer">
						<span>{{ __('messages.Amount_of_one_deposit') }}</span>
						<span>€10,00 - €1.000,00</span>
					</div>
				</div>
				<button class="btn-dark d-block" onclick="openAddFundsWindow()">{{ __('messages.Continue') }}</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>


function openAddFundsWindow(){
	// windowClose();
	$('#loading-bg').css('display', 'flex');
	$.ajax({
		url: "{{ route('add_funds_sso') }}",
		method: "POST",
		data: { 
			"_token": "{{ csrf_token() }}" 
		},
		success: function(response) {
			if(response.result == "success"){
				window.open(
				response.redirect_url,
					"_blank");
				$('.modal-balance').addClass('hidden');
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

  $("#addFunds").click(function(){
	$(".modal-balance").removeClass('hidden');
  });

  $(".close-dark").click(function(){
	$(".modal-balance").addClass('hidden');
  });

  $(".close-light").click(function(){
	$(".modal-balance").addClass('hidden');
  });
});


// function that Closes the open Window

</script>
@endsection