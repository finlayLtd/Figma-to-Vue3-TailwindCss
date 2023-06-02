@extends('layouts.app')

@section('content')
<section class="dashboard">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center title-button-wrapper">
			<h2 class="title mb-0">Balance</h2>
		</div>

		<div class="sub-section server-list-tab">
        <div class="row justify-content-between align-items-center ">
        	<div class="row pe-0">
						<div class="col-md-8 mb-4 mb-md-0">
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
						<div class="col-md-4">
							<div class="card-item">
								<div class="balance-card-header credit-balance-header">
									<div class="main-balance-wrapper">
										<div class="balance-icon">
											<img src="assets/img/empty-wallet.svg" alt="">
										</div>
										<div class="balance-title">
											<h3>Credit balance</h3>
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
							</div>						
						</div>							
	   			</div>  		   
        </div>
		</div>

		<div class="sub-section server-list-tab">
      <div class="row justify-content-between align-items-center ">
      	<div class="row mb-3 mb-lg-5 pe-0">
						<h3 class="col-md-3 sub-title pt-2">Transaction History</h3>

            <div class="col-md-9 d-flex justify-content-end pe-0 flex-wrap list-flex-nav">

            	<div class="sort-servers order-2 order-md-1">
            		<div id="toggleButton" class="sort-item-active btn-chevron chevron-dark">
            			<span>Sort by name</span>
            		</div>
            		<div class="sorting-items" style="display: none;">
            			<ul>
            				<li>Sort by price</li>
            				<li>Sort by ...</li>
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

        <div class="tab-content" id="pills-tabContent">

          	<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<div class="w-100 mb-5 support-table">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">Invoice</th>
							<th scope="col">Amount</th>
							<th scope="col">Invoice Date</th>
							<th scope="col">Due Date</th>
							<th scope="col">Status</th>
						<th scope="col" class="text-center">View Invoice</th>

						</tr>
						</thead>
						<tbody>
						@foreach($invoices as $invoice)
							<tr>
								<td>INV-{{ $invoice['id'] }}</td>
								<td>{{ $invoice['currencyprefix'] }}{{ $invoice['total'] }}</td>
								<td class="date-cell">{{ $invoice['date'] }}</td>
								<td class="date-cell">{{ $invoice['duedate'] }}</td>
								@if($invoice['status'] == 'Paid')
									<td class="successful-cell">
										<span>
											{{ $invoice['status'] }}
										</span>
									</td>
								@elseif($invoice['status'] == 'In-progress')
									<td class="in-progress-cell">
										<span>
											{{ $invoice['status'] }}
										</span>
									</td>
								@else
								<td class="cancelled-cell">
									<span>
										{{ $invoice['status'] }}
									</span>
								</td>
								@endif
								<td class="text-center"><a href="#"><img src="assets/img/eye-open.svg" class="icon-password view-invoice"></a></td>
							</tr>
						@endforeach			    					    					   
						</tbody>
					</table>
				</div>		
	            <!-- <div class="w-100 server-list-pagination">
								<nav aria-label="...">
								  <ul class="pagination">
								    <li class="page-item disabled first">
								      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
								    </li>
								    <li class="page-item"><a class="page-link" href="#">1</a></li>
								    <li class="page-item active" aria-current="page">
								      <a class="page-link" href="#">2</a>
								    </li>
								    <li class="page-item"><a class="page-link" href="#">3</a></li>
								    <li class="page-item"><a class="page-link" href="#">4</a></li>
								    <li class="page-item"><a class="page-link" href="#">5</a></li>
								    <li class="page-item"><a class="page-link" href="#">...</a></li>
								    <li class="page-item"><a class="page-link" href="#">124</a></li>

								    <li class="page-item last">
								      <a class="page-link" href="#">Next</a>
								    </li>
								  </ul>
								</nav>                	
	            </div> -->
          	</div>

			  <div class="tab-pane fade" id="pills-paid" role="tabpanel" aria-labelledby="pills-paid-tab">
		 		 <div class="w-100 mb-5 support-table">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">Invoice</th>
							<th scope="col">Amount</th>
							<th scope="col">Invoice Date</th>
							<th scope="col">Due Date</th>
							<th scope="col">Status</th>
						<th scope="col" class="text-center">View Invoice</th>

						</tr>
						</thead>
						<tbody>
						@foreach($invoices as $invoice)
							@if($invoice['status'] == 'Paid')
							<tr>
								<td>INV-{{ $invoice['id'] }}</td>
								<td>{{ $invoice['currencyprefix'] }}{{ $invoice['total'] }}</td>
								<td class="date-cell">{{ $invoice['date'] }}</td>
								<td class="date-cell">{{ $invoice['duedate'] }}</td>
								@if($invoice['status'] == 'Paid')
									<td class="successful-cell">
										<span>
											{{ $invoice['status'] }}
										</span>
									</td>
								@elseif($invoice['status'] == 'In-progress')
									<td class="in-progress-cell">
										<span>
											{{ $invoice['status'] }}
										</span>
									</td>
								@else
								<td class="cancelled-cell">
									<span>
										{{ $invoice['status'] }}
									</span>
								</td>
								@endif
								<td class="text-center"><a href="#"><img src="assets/img/eye-open.svg" class="icon-password view-invoice"></a></td>
							</tr>
							@endif
						@endforeach			    					    					   
						</tbody>
					</table>
				</div>		
			</div>

          	<div class="tab-pane fade" id="pills-unpaid" role="tabpanel" aria-labelledby="pills-unpaid-tab">
		 		 <div class="w-100 mb-5 support-table">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">Invoice</th>
							<th scope="col">Amount</th>
							<th scope="col">Invoice Date</th>
							<th scope="col">Due Date</th>
							<th scope="col">Status</th>
						<th scope="col" class="text-center">View Invoice</th>

						</tr>
						</thead>
						<tbody>
						@foreach($invoices as $invoice)
							@if($invoice['status'] == 'Unpaid')
							<tr>
								<td>INV-{{ $invoice['id'] }}</td>
								<td>{{ $invoice['currencyprefix'] }}{{ $invoice['total'] }}</td>
								<td class="date-cell">{{ $invoice['date'] }}</td>
								<td class="date-cell">{{ $invoice['duedate'] }}</td>
								@if($invoice['status'] == 'Paid')
									<td class="successful-cell">
										<span>
											{{ $invoice['status'] }}
										</span>
									</td>
								@elseif($invoice['status'] == 'In-progress')
									<td class="in-progress-cell">
										<span>
											{{ $invoice['status'] }}
										</span>
									</td>
								@else
								<td class="cancelled-cell">
									<span>
										{{ $invoice['status'] }}
									</span>
								</td>
								@endif
								<td class="text-center"><a href="#"><img src="assets/img/eye-open.svg" class="icon-password view-invoice"></a></td>
							</tr>
							@endif
						@endforeach			    					    					   
						</tbody>
					</table>
				</div>		
			</div>

			<div class="tab-pane fade" id="pills-cancelled" role="tabpanel" aria-labelledby="pills-cancelled-tab">
		 		 <div class="w-100 mb-5 support-table">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">Invoice</th>
							<th scope="col">Amount</th>
							<th scope="col">Invoice Date</th>
							<th scope="col">Due Date</th>
							<th scope="col">Status</th>
						<th scope="col" class="text-center">View Invoice</th>

						</tr>
						</thead>
						<tbody>
						@foreach($invoices as $invoice)
							@if($invoice['status'] == 'Cancelled')
							<tr>
								<td>INV-{{ $invoice['id'] }}</td>
								<td>{{ $invoice['currencyprefix'] }}{{ $invoice['total'] }}</td>
								<td class="date-cell">{{ $invoice['date'] }}</td>
								<td class="date-cell">{{ $invoice['duedate'] }}</td>
								@if($invoice['status'] == 'Paid')
									<td class="successful-cell">
										<span>
											{{ $invoice['status'] }}
										</span>
									</td>
								@elseif($invoice['status'] == 'In-progress')
									<td class="in-progress-cell">
										<span>
											{{ $invoice['status'] }}
										</span>
									</td>
								@else
								<td class="cancelled-cell">
									<span>
										{{ $invoice['status'] }}
									</span>
								</td>
								@endif
								<td class="text-center"><a href="#"><img src="assets/img/eye-open.svg" class="icon-password view-invoice"></a></td>
							</tr>
							@endif
						@endforeach			    					    					   
						</tbody>
					</table>
				</div>		
			</div>
      </div>
		</div>
	</div>
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
					<p>Choose Payment method</p>
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
					<h4>Amounts</h4>
					<input type="text" value="321" placeholder="">
					<div class="amount-footer">
						<span>Amount of one deposit</span>
						<span>€10,00 - €1.000,00</span>

					</div>
				</div>
				<button class="btn-dark d-block">Continue</button>
			</div>
		</div>
	</div>
</div>	
@endsection
