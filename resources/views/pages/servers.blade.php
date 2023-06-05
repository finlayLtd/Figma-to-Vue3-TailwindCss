@extends('layouts.app')

@section('content')
<section class="dashboard">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center title-button-wrapper">
			<h2 class="title mb-0">Servers </h2>
			<button type="submit" class="btn btn-dark btn-chevron chevron-dark hover-dark-light">Create Server</button>
		</div>

		<div class="sub-section server-list-tab">
			<div class="d-flex justify-content-between align-items-center title-button-wrapper">
			</div>
			<div class="row justify-content-between align-items-center ">


				<div class="row mb-5 pe-0">
					<h3 class="col-md-3 sub-title">VPS List</h3>

					<div class="col-md-9 d-flex justify-content-end pe-0 flex-wrap">

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

						<ul class="nav nav-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Consumed</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Suspended</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Attracted</button>
							</li>
						</ul>

					</div>
				</div>
				<style>


				</style>
				<div class="tab-content" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

						<div class="row mb-5">
							<div class="col-12 col-lg-4 col-md-6 col-sm-12">
								<div class="card-item p-4 mb-4">
									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/windows-logo.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													UdodovVPS
												</h2>
												<h3 class="detail">
													Windows RDP 2019
												</h3>
											</div>
											<div class="server-list-options">
												<div class="options-toggle"></div>
												<div class="options-toggle-dropdown">
													<ul>
														<li><a href="#">Launch Control Panel</a></li>
														<li><a href="#">View Invoices</a></li>
													</ul>
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
													192.178.12.14
												</h2>
												<h3 class="detail">
													Created at 2023-13-03
												</h3>
											</div>

											<div class="server-list-options">
												<button class="active-badge"><span class="active-dot"></span>Active</button>
											</div>

										</div>
									</div>

									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/flag-nl.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													Netherlands
												</h2>
												<h3 class="detail">
													1x Intel E5-2697v3 (14C, 28T)
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4 col-md-6 col-sm-12">
								<div class="card-item p-4 mb-4">
									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/windows-logo.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													UdodovVPS
												</h2>
												<h3 class="detail">
													Windows RDP 2019
												</h3>
											</div>
											<div class="server-list-options">
												<div class="options-toggle"></div>
												<div class="options-toggle-dropdown">
													<ul>
														<li><a href="#">Launch Control Panel</a></li>
														<li><a href="#">View Invoices</a></li>
													</ul>
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
													192.178.12.14
												</h2>
												<h3 class="detail">
													Created at 2023-13-03
												</h3>
											</div>

											<div class="server-list-options">
												<button class="active-badge"><span class="active-dot"></span>Active</button>
											</div>

										</div>
									</div>

									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/flag-nl.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													Netherlands
												</h2>
												<h3 class="detail">
													1x Intel E5-2697v3 (14C, 28T)
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4 col-md-6 col-sm-12">
								<div class="card-item p-4 mb-4">
									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/windows-logo.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													UdodovVPS
												</h2>
												<h3 class="detail">
													Windows RDP 2019
												</h3>
											</div>
											<div class="server-list-options">
												<div class="options-toggle"></div>
												<div class="options-toggle-dropdown">
													<ul>
														<li><a href="#">Launch Control Panel</a></li>
														<li><a href="#">View Invoices</a></li>
													</ul>
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
													192.178.12.14
												</h2>
												<h3 class="detail">
													Created at 2023-13-03
												</h3>
											</div>

											<div class="server-list-options">
												<button class="active-badge"><span class="active-dot"></span>Active</button>
											</div>

										</div>
									</div>

									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/flag-nl.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													Netherlands
												</h2>
												<h3 class="detail">
													1x Intel E5-2697v3 (14C, 28T)
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="row server-list-pagination">
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
									<li class="page-item last">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</nav>
						</div>


					</div>

					<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

						<div class="row mb-5">

							<div class="col-12 col-lg-4 col-md-6 col-sm-12">
								<div class="card-item p-4 mb-4">
									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/windows-logo.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													UdodovVPS
												</h2>
												<h3 class="detail">
													Windows RDP 2019
												</h3>
											</div>
											<div class="server-list-options">
												<div class="options-toggle"></div>
												<div class="options-toggle-dropdown">
													<ul>
														<li><a href="#">Launch Control Panel</a></li>
														<li><a href="#">View Invoices</a></li>
													</ul>
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
													192.178.12.14
												</h2>
												<h3 class="detail">
													Created at 2023-13-03
												</h3>
											</div>

											<div class="server-list-options">
												<button class="active-badge"><span class="active-dot"></span>Active</button>
											</div>

										</div>
									</div>

									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/flag-nl.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													Netherlands
												</h2>
												<h3 class="detail">
													1x Intel E5-2697v3 (14C, 28T)
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>


					</div>

				</div>

			</div>
		</div>

		<div class="sub-section server-list-tab">
			<div class="d-flex justify-content-between align-items-center title-button-wrapper">
			</div>
			<div class="row justify-content-between align-items-center ">


				<div class="row mb-5 pe-0">
					<h3 class="col-md-3 sub-title">Dedicated Server List</h3>

					<div class="col-md-9 d-flex justify-content-end pe-0 flex-wrap">

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

						<ul class="nav nav-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Consumed</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Suspended</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Attracted</button>
							</li>
						</ul>

					</div>
				</div>

				<div class="tab-content" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

						<div class="row mb-5">

							<div class="col-md-4">
								<div class="card-item p-4">
									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/windows-logo.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													UdodovVPS
												</h2>
												<h3 class="detail">
													Windows RDP 2019
												</h3>
											</div>
											<div class="server-list-options">
												<div class="options-toggle"></div>
												<div class="options-toggle-dropdown">
													<ul>
														<li><a href="#">Launch Control Panel</a></li>
														<li><a href="#">View Invoices</a></li>
													</ul>
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
													192.178.12.14
												</h2>
												<h3 class="detail">
													Created at 2023-13-03
												</h3>
											</div>

											<div class="server-list-options">
												<button class="active-badge"><span class="active-dot"></span>Active</button>
											</div>

										</div>
									</div>

									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/flag-nl.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													Netherlands
												</h2>
												<h3 class="detail">
													1x Intel E5-2697v3 (14C, 28T)
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-item p-4">
									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/windows-logo.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													UdodovVPS
												</h2>
												<h3 class="detail">
													Windows RDP 2019
												</h3>
											</div>
											<div class="server-list-options">
												<div class="options-toggle"></div>
												<div class="options-toggle-dropdown">
													<ul>
														<li><a href="#">Launch Control Panel</a></li>
														<li><a href="#">View Invoices</a></li>
													</ul>
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
													192.178.12.14
												</h2>
												<h3 class="detail">
													Created at 2023-13-03
												</h3>
											</div>

											<div class="server-list-options">
												<button class="active-badge"><span class="active-dot"></span>Active</button>
											</div>

										</div>
									</div>

									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/flag-nl.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													Netherlands
												</h2>
												<h3 class="detail">
													1x Intel E5-2697v3 (14C, 28T)
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-item p-4">
									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/windows-logo.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													UdodovVPS
												</h2>
												<h3 class="detail">
													Windows RDP 2019
												</h3>
											</div>
											<div class="server-list-options">
												<div class="options-toggle"></div>
												<div class="options-toggle-dropdown">
													<ul>
														<li><a href="#">Launch Control Panel</a></li>
														<li><a href="#">View Invoices</a></li>
													</ul>
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
													192.178.12.14
												</h2>
												<h3 class="detail">
													Created at 2023-13-03
												</h3>
											</div>

											<div class="server-list-options">
												<button class="active-badge"><span class="active-dot"></span>Active</button>
											</div>

										</div>
									</div>

									<div class="server-list-item">
										<div class="server-list-item-wrapper">
											<div class="image-wrapper">
												<img src="assets/img/flag-nl.png" alt="">
											</div>
											<div class="list-item-detail">
												<h2 class="list-name">
													Netherlands
												</h2>
												<h3 class="detail">
													1x Intel E5-2697v3 (14C, 28T)
												</h3>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>


						<div class="row server-list-pagination">
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
									<li class="page-item last">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</nav>
						</div>


					</div>

					<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

						<div class="row mb-5">

							<div class="col-md-4">
								<div class="card-item p-4 popular">
									<div class="server-location">
										<img src="assets/img/flag-nl.png" alt="">
										Crazy
									</div>
									<div class="server-price mb-4">
										<span class="price">From €12.50<span class="month">/ month</span></span>

									</div>
									<a class="btn-dark d-inline-block pricing-order-btn hover-dark-dark">Order</a>

									<div class="pricing-list-bottom">
										<ul class="server-features">
											<li><img src="assets/img/cpu.png" alt="">2 vCores</li>
											<li><img src="assets/img/ram.png" alt="">6 GB RAM</li>
											<li><img src="assets/img/hard-disk.png" alt="">40 GB SSD</li>
											<li><img src="assets/img/speedometer.png" alt="">Unlimited traffic</li>
											<li><img src="assets/img/cable.png" alt="">1 Dedicated IPv4 Extra IPv4: €2.50 each</li>
										</ul>
									</div>

								</div>
							</div>



						</div>


					</div>

				</div>

			</div>
		</div>

	</div>

</section>
@endsection