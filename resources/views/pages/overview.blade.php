@extends('layouts.app')

@section('content')
<section class="overview">
	<div class="container">
		<div class="d-flex flex-column justify-content-start align-items-start title-button-wrapper">
			<div class="overview-header">
				<img src="{{asset('assets/img/ubuntu-overview.png')}}" alt="">
				<h2 class="title mb-0">{{$order_info['name']}}</h2>
			</div>
			<div class="overview-info">
				@if($dayDiff > 0 ) <span>Created {{$dayDiff}} days ago</span>
				@else <span>Created today</span>
				@endif
			</div>
		</div>

		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center ">
				<div class="row mb-5 pe-0 overview-cols">

					<div class="col-xl-4 col-lg-6 col-md-6 mb-4 mb-md-0">
						<div class="card-item vm-actions">
							<div class="due-date">
								<div class="date-image-wrapper">
									<img src="{{asset('assets/img/calendar.svg')}}" alt="">
								</div>
								<div class="due-date-info">
									<h2 class="due-date-title">Due Date</h2>
									<span>{{$order_info['regdate']}}</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-6 col-md-6 mb-4 mb-md-0">
						<div class="card-item info-table">

							<table>
								<tbody>

									<tr>
										<td>Public IPv4</td>
										<td class="clipboard-input" data-copy="{{$order_info['dedicatedip']}}">{{$order_info['dedicatedip']}}</td>
										<td><img src="{{asset('assets/img/copy.svg')}}" class="icon-clipboard"></td>
									</tr>

									<tr>
										<td>Username</td>
										<td class="clipboard-input" data-copy="root">root</td>
										<td><img src="{{asset('assets/img/copy.svg')}}" class="icon-clipboard"></td>
									</tr>

									<tr>
										<td>Password</td>
										<td>
											<input class="clipboard-input" data-copy="12345678" disabled type="password" value="12345678">
										</td>
										<td><img src="{{asset('assets/img/eye.svg')}}" class="icon-password eye-closed"><img src="{{asset('assets/img/eye-open.svg')}}" class="icon-password eye-open" style="display:none"><img src="{{asset('assets/img/copy.svg')}}" class="icon-clipboard"></td>
									</tr>

								</tbody>
							</table>

						</div>
					</div>

					<div class="col-xl-4 col-lg-6 col-md-6 mb-4 mb-md-0">
						<div class="card-item info-table">

							<table>
								<tbody>

									<tr>
										<td><img src="{{asset('assets/img/cpu.png')}}" alt="">CPU</td>
										<td>{{ $detail_info[0] }}</td>
										<td></td>
									</tr>

									<tr>
										<td><img src="{{asset('assets/img/ram.png')}}" alt="">Ram</td>
										<td>{{ $detail_info[1] }}</td>
										<td></td>
									</tr>

									<tr>
										<td><img src="{{asset('assets/img/hard-disk.png')}}" alt="">Storage</td>
										<td>{{ $detail_info[2] }}</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="sub-section overview-tab">
			<div class="row justify-content-between align-items-center ">


				<div class="row mb-2 mb-lg-5 pe-0">

					<div class="col-md-12 d-flex justify-content-start pe-0 flex-wrap">

						<ul class="nav nav-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0 flex-nowrap" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" aria-selected="true">Overview</button>
							</li>
							@if($order_info['status'] == 'Active')
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-analytics-tab" data-bs-toggle="pill" data-bs-target="#pills-analytics" type="button" role="tab" aria-controls="pills-analytics" aria-selected="false">Analytics</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-connect-tab" data-bs-toggle="pill" data-bs-target="#pills-connect" type="button" role="tab" aria-controls="pills-connect" aria-selected="false">Connect</button>
							</li>

							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-reinstall-tab" data-bs-toggle="pill" data-bs-target="#pills-reinstall" type="button" role="tab" aria-controls="pills-reinstall" aria-selected="false">Reinstall</button>
							</li>

					
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-management-tab" data-bs-toggle="pill" data-bs-target="#pills-management" type="button" role="tab" aria-controls="pills-management" aria-selected="false">IP Address Management</button>
							</li>
							
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-vnc-tab" data-bs-toggle="pill" data-bs-target="#pills-vnc" type="button" role="tab" aria-controls="pills-vnc" aria-selected="false">VNC</button>
							</li>

							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-billing-tab" data-bs-toggle="pill" data-bs-target="#pills-billing" type="button" role="tab" aria-controls="pills-billing" aria-selected="false">Billing</button>
							</li>

							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-settings-tab" data-bs-toggle="pill" data-bs-target="#pills-settings" type="button" role="tab" aria-controls="pills-settings" aria-selected="false">Settings</button>
							</li>
							@endif
						</ul>

					</div>
				</div>

				<div class="tab-content" id="pills-tabContent">
					<!--overview-->
					<div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">

						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title">Overview</h3>
								<p class="description mb-4">Information on virtual machine usage</p>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">
								<div class="general-info d-flex w-100 mb-3">
									<div class="col-12 col-lg-4 col-md-12">

										<div class="col-content-wrapper sm-border-bottom">
											<div class="img-wrapper">
												<img class="not-filterable" src="{{asset('assets/img/'.$flag.'.png')}}" alt="">
											</div>
											<div class="info">
												<h4 class="title2">{{$order_info['groupname']}}</h4>
												<p class="description2">{{$order_info['domain']}}</p>
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-4 col-md-12">
										<div class="col-content-wrapper sm-border-bottom">
											<div class="img-wrapper">
												<img class="not-filterable" src="{{asset('assets/img/'.$sys_logo.'-logo.png')}}" alt="">
											</div>
											<div class="info">
												<h4 class="title2">{{$order_info['name']}}</h4>
												<p class="description2">{{$system}}</p>
											</div>

											<div class="server-list-options me-3 me-lg-4">
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
									<div class="col-12 col-lg-4 col-md-12">
										<div class="col-content-wrapper">
											<div class="img-wrapper">
												<img class="dark-img-filter" src="{{asset('assets/img/cloud-connection.png')}}" alt="">
											</div>
											<div class="info">
												<h4 class="title2">{{$order_info['dedicatedip']}}</h4>
												<p class="description2">Created at {{$order_info['regdate']}}</p>
											</div>
											@if($order_info['status'] == 'Active')
											<div class="server-list-options me-3 me-lg-4">
												<button class="active-badge"><span class="active-dot"></span>Active</button>
											</div>
											@endif
										</div>
									</div>
								</div>
								@if($order_info['status'] == 'Active')
								<div class="d-flex justify-content-end px-0 server-btn-options">
									<button class="btn img-btn me-0 me-lg-2">
										<img src="{{asset('assets/img/power.svg')}}" alt="">Shutdown
									</button>
									<button class="btn img-btn me-0 me-lg-2">
										<img src="{{asset('assets/img/reboot.svg')}}" alt="">Reboot
									</button>
									<button class="btn img-btn mt-2 mt-lg-0">
										<img class="dark-img-filter" src="{{asset('assets/img/power-off.svg')}}" alt="">Power Off
									</button>
								</div>
								@endif
							</div>
						</div>
						@if($order_info['status'] == 'Active')
						<div class="tab-inner">
							<div class="row">
								<h3 class="title fs-17">Resource Usage</h3>
							</div>
							<div class="row px-12 pt-3">
								<div class="general-info bg-white overview-col5 d-flex w-100 mb-4">

									<div class="col-md-3 col-sm-12">
										<div class="col-content-wrapper sm-border-bottom">
											<div class="img-wrapper">
												<img src="{{asset('assets/img/cpu.png')}}" alt="">
											</div>
											<div class="info">
												<h4 class="title2">CPU</h4>
												<p class="description2"><span>{{$vps_info['pie_data']['server_cpu']['percent']}}%</span> of {{$vps_info['vps_data'][$vpsid]['cores']}} CPU</p>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="col-content-wrapper sm-border-bottom">
											<div class="img-wrapper">
												<img src="{{asset('assets/img/ram.png')}}" alt="">
											</div>
											<div class="info">
												<h4 class="title2">RAM</h4>
												<p class="description2"><span>{{number_format(($vps_info['vps_data'][$vpsid]['used_ram']/$vps_info['vps_data'][$vpsid]['ram'])*100, 2)}}%</span> of {{$detail_info[1]}}</p>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="col-content-wrapper sm-border-bottom">
											<div class="img-wrapper">
												<img src="{{asset('assets/img/hard-disk.png')}}" alt="">
											</div>
											<div class="info">
												<h4 class="title2">Storage</h4>
												<p class="description2"><span>{{number_format($vps_info['vps_data'][$vpsid]['used_disk'], 2)}} %</span> of {{$vps_info['vps_data'][$vpsid]['disk']}} GB</p>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="col-content-wrapper sm-border-bottom">
											<div class="img-wrapper">
												<img src="{{asset('assets/img/speedometer.png')}}" alt="">
											</div>
											<div class="info">
												<h4 class="title2">Network Speed</h4>
												<p class="description2"><span>0.1</span> Mbps of 1 Gbps</p>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-12">
										<div class="col-content-wrapper">
											<div class="img-wrapper">
												<img src="{{asset('assets/img/cable.png')}}" alt="">
											</div>
											<div class="info">
												<h4 class="title2">Bandwith</h4>
												<p class="description2"><span>1%</span> of 500 GB</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
					</div>

					<!--analytics-->
					<div class="tab-pane fade" id="pills-analytics" role="tabpanel" aria-labelledby="pills-analytics-tab">


						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title">Analytics</h3>
								<p class="description mb-4">Detailed analytic charts on virtual machine usage</p>
							</div>
							<div class="divider"></div>
							<div class="row px-0 pt-4">
								<div class="col-md-6">

									<div class="col-content-wrapper">

										<img class="dark-img-filter" src="{{asset('assets/img/cart1.png')}}" alt="">

									</div>
								</div>
								<div class="col-md-6">
									<div class="col-content-wrapper">

										<img class="dark-img-filter" src="{{asset('assets/img/cart2.png')}}" alt="">


									</div>
								</div>


							</div>
						</div>




					</div>

					<!--connect-->
					<div class="tab-pane fade" id="pills-connect" role="tabpanel" aria-labelledby="pills-connect-tab">
						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title">Connect</h3>
								<p class="description mb-4">Connecting to your virtual machine.</p>
							</div>
							<div class="divider"></div>
							<div class="row px-0 px-lg-4 pt-4">
								<div class="col-md-12 d-flex flex-column align-items-center text-center">

									<p class="fs-15">To connect to your Linux virtual machine using SSH, please use the following command.</p>

									<p class="fs-16">ssh root@147.189.161.205</p>

									<p class="fs-14 mb-0 sub-detail" style="max-width: 500px;">You will most likely be using cmd if you are connecting from Windows OS or Terminal if you are running macOS or Linux For more information, please visit this guide.</p>

								</div>
							</div>
						</div>
					</div>

					<!--reinstall-->
					<div class="tab-pane fade" id="pills-reinstall" role="tabpanel" aria-labelledby="pills-reinstall-tab">
						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title">Reinstall</h3>
								<p class="description mb-4">Reinstall your Virtual Machine.</p>
							</div>
							<div class="divider"></div>
							<div class="row px-0 pt-4">
								<div class="col-md-12 d-flex flex-column align-items-start">

									<p class="fs-13-5">Select an Operating System / Application to reinstall</p>

									<div class="overview-select">
										<select name="" id="">
											<option value="">Debian 11</option>
											<option value="">Debian 12</option>
											<option value="">Debian 13</option>
										</select>
									</div>


									<div class="overview-button-wrapper">
										<button class="btn-dark px-4 hover-dark-light">Reinstall</button>
									</div>



								</div>
							</div>
						</div>
					</div>

					<!--management-->
					<div class="tab-pane fade" id="pills-management" role="tabpanel" aria-labelledby="pills-management-tab">
						<div class="tab-inner management mb-3">
							<div class="row">
								<h3 class="title mb-4">IP Address Management</h3>
								<p class="description mb-4">Virtual Machines IP Address Management.</p>

							</div>
							<div class="divider"></div>
							<div class="row px-0 pt-4">
								<div class="col-md-12 d-flex flex-column flex-lg-row align-items-start">


									<ul class="nav nav-pills mb-3 mb-md-0 mb-lg-0 d-flex flex-column inner-tab-pills" id="pills-tab" role="tablist">

										<li class="nav-item mb-2" role="presentation">
											<button class="nav-link active" id="pills-ipv4m-tab" data-bs-toggle="pill" data-bs-target="#pills-ipv4m" type="button" role="tab" aria-controls="pills-ipv4m" aria-selected="false">Assign IPv4</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="pills-ipv6m-tab" data-bs-toggle="pill" data-bs-target="#pills-ipv6m" type="button" role="tab" aria-controls="pills-ipv6m" aria-selected="false">Swap IPv4</button>
										</li>
									</ul>

									<div class="tab-content w-100" id="pills-tabContent">
										<!--ipv4m-->
										<div class="tab-pane fade  show active" id="pills-ipv4m" role="tabpanel" aria-labelledby="pills-ipv4m-tab">

											<div class="tab-inner py-0">
												<h3 class="fs-15 mb-1">IP Address Assignment</h3>
												<p class="fs-13 mb-0 inner-sub-title">Assign floating IP address to VM</p>
												<div class="divider my-3"></div>
												<p class="fs-12 inner-sub-title2">Assigned IP Address List</p>
												<div class="inner-table p-3">
													<table class="w-100 table-flex-col">
														<tbody>
															<tr>
																<td>147.189.161.205</td>
																<td>Primary</td>
																<td>Main Server IP (Sticky) - Cannot be removed</td>
															</tr>
														</tbody>
													</table>
												</div>

												<div class="divider my-3"></div>


												<p class="fs-13-5">Assign IP to server</p>

												<div class="overview-select d-inline-block mb-3">
													<select name="" id="">
														<option value="">papa-efyu-01.evoxt.com</option>
														<option value="">papa-efyu-01.evoxt.com</option>
														<option value="">papa-efyu-01.evoxt.com</option>
													</select>
												</div>

												<div class="overview-button-wrapper pt-0 d-flex ">
													<button class="btn-dark px-4 me-2 hover-dark-light">Assign</button>
													<button class="btn-light bg-gray hover-light-dark">Assign as Primary IP</button>
												</div>

												<p class="fs-14 mt-4 mb-2 inner-sub-title2">After assigning IP address, our system will perform a reboot on your server, please make sure any temporary files are saved before performing IP assignment. Note: Extra IP address will still remain to your account even after server termination unless you cancel the extra IP address subscription.</p>
												<a style="color:#0078D4;" class="fs-14" href="#">Click here to purchase Extra IP Address</a>

											</div>
										</div>
										<!--ipv6m-->
										<div class="tab-pane fade" id="pills-ipv6m" role="tabpanel" aria-labelledby="pills-ipv6m-tab">

											<div class="tab-inner py-0">
												<h3 class="fs-15 mb-1">Swap IP</h3>
												<p class="fs-13 mb-0">Swap the IP addresses of two virtual machines with each other</p>
												<div class="divider my-3"></div>

												<p class="fs-13-5">Server 1</p>
												<p class="fs-15">papa-efyu-01.evoxt.com</p>

												<p class="fs-13-5">Server 2</p>

												<div class="overview-select d-inline-block mb-3">
													<select name="" id="">
														<option value="">Server 2</option>
														<option value="">Server 2</option>
														<option value="">Server 2</option>
													</select>
												</div>

												<div class="overview-button-wrapper pt-0 ">
													<button class="btn-dark px-4 hover-dark-light">Swap IP</button>
												</div>

												<p class="fs-14 mt-4 mb-2">After Swapping IP address, our system will perform a reboot on your server, please make sure any temporary files are saved before performing IP assignment. This process will take around 3 minutes, please do not refresh this page.</p>


											</div>
										</div>



									</div>







								</div>
							</div>
						</div>
					</div>

					<!--vnc-->
					<div class="tab-pane fade" id="pills-vnc" role="tabpanel" aria-labelledby="pills-vnc-tab">
						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">VNC</h3>
								<p class="description mb-4">Remote access your virtual machines through host VNC.</p>
							</div>
							<div class="divider"></div>
							<div class="row px-0 pt-4">
								<div class="col-md-12 d-flex justify-content-center">


									<div class="overview-button-wrapper pt-0">
										<button class="btn-dark px-4 hover-dark-light">Connect VNC</button>
									</div>






								</div>
							</div>
						</div>
					</div>

					<!--billing-->
					<div class="tab-pane fade" id="pills-billing" role="tabpanel" aria-labelledby="pills-billing-tab">
						<div class="tab-inner billing mb-3">
							<div class="row">
								<h3 class="title mb-4">Billing</h3>
								<p class="description mb-4">Billing management for this service.</p>

							</div>
							<div class="divider"></div>
							<div class="row px-0 pt-4">
								<div class="col-md-12 d-flex flex-column flex-lg-row align-items-start">


									<ul class="nav nav-pills mb-3 mb-md-0 mb-lg-0 d-flex flex-column inner-tab-pills flex-nowrap sc-mobile no-border-mobile" id="pills-tab" role="tablist">

										<li class="nav-item mb-2" role="presentation">
											<button class="nav-link active" id="pills-renew-tab" data-bs-toggle="pill" data-bs-target="#pills-renew" type="button" role="tab" aria-controls="pills-renew" aria-selected="false">Renew Service</button>
										</li>

										<li class="nav-item mb-2" role="presentation">
											<button class="nav-link" id="pills-invoices-tab" data-bs-toggle="pill" data-bs-target="#pills-invoices" type="button" role="tab" aria-controls="pills-invoices" aria-selected="false">Invoices</button>
										</li>

										<li class="nav-item mb-2" role="presentation">
											<button class="nav-link" id="pills-cancellation-tab" data-bs-toggle="pill" data-bs-target="#pills-cancellation" type="button" role="tab" aria-controls="pills-cancellation" aria-selected="false">Cancellation</button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="pills-refund-tab" data-bs-toggle="pill" data-bs-target="#pills-refund" type="button" role="tab" aria-controls="pills-refund" aria-selected="false">Refund</button>
										</li>


									</ul>

									<div class="tab-content w-100" id="pills-tabContent">

										<!--renew-->
										<div class="tab-pane fade  show active" id="pills-renew" role="tabpanel" aria-labelledby="pills-renew-tab">

											<div class="tab-inner py-0 p-mb-0">
												<h3 class="fs-15 mb-1">Renew Service</h3>
												<div class="divider divider-inner" style="margin:20px 0"></div>

												<div class="tab-inner">
													<div class="row">
														<div class="text-center">
															<p class="fs-14 mb-0 ">Current Due Date</p>
															<p class="fs-15 mb-0" style="font-weight: 500;">17/05/2023</p>

															<div class="overview-button-wrapper d-flex flex-column align-items-center justify-content-center">
																<button class="btn-dark px-4 hover-dark-light">Renew Service</button>
															</div>
														</div>
													</div>
												</div>

												<p class="fs-13 mt-2 inner-sub-title" style="max-width:474px;text-align: center;margin: 0 auto; color: rgba(23, 30, 38, 0.75);">
													An invoice will be generated 7 days before the service's due date. Click Renew Service to manually renew your service before invoice generation.
												</p>


											</div>
										</div>

										<!--invoices-->
										<div class="tab-pane fade" id="pills-invoices" role="tabpanel" aria-labelledby="pills-invoices-tab">
											<div class="tab-inner py-0 p-mb-0">
												<div class="support-table p-0">

													<table class="table">
														<thead>
															<tr>
																<th scope="col">Invoice ID</th>
																<th scope="col">Invoice Date</th>
																<th scope="col">Due Date</th>
																<th scope="col">Date Paid</th>
																<th scope="col">Amount</th>
																<th scope="col">Status</th>

															</tr>
														</thead>
														<tbody>
															<tr>
																<td>58775</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03 06:00:03</td>
																<td class="remaining-cell"><span>€50.50</span></td>
																<td class="successful-cell"><span>Successful</span></td>
															</tr>
															<tr>
																<td>58775</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03 06:00:03</td>
																<td class="remaining-cell"><span>€50.50</span></td>
																<td class="cancelled-cell"><span>Cancelled</span></td>
															</tr>
															<tr>
																<td>58775</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03 06:00:03</td>
																<td class="remaining-cell"><span>€50.50</span></td>
																<td class="cancelled-cell"><span>Cancelled</span></td>
															</tr>
															<tr>
																<td>58775</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03 06:00:03</td>
																<td class="remaining-cell"><span>€50.50</span></td>
																<td class="cancelled-cell"><span>Cancelled</span></td>
															</tr>
															<tr>
																<td>58775</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03</td>
																<td class="date-cell">2023-13-03 06:00:03</td>
																<td class="remaining-cell"><span>€50.50</span></td>
																<td class="cancelled-cell"><span>Cancelled</span></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>


										<div class="tab-pane fade" id="pills-cancellation" role="tabpanel" aria-labelledby="pills-cancellation-tab">

											<div class="tab-inner py-0 p-mb-0">
												<h3 class="fs-15 mb-1">Cancellation</h3>
												<div class="divider divider-inner" style="margin:20px 0"></div>

												<div class="tab-inner">
													<div class="row">
														<div class="text-center">
															<p class="fs-14 mb-0 ">Please click the button below to request for a service cancellation.</p>

															<div class="overview-button-wrapper d-flex flex-column align-items-center justify-content-center">
																<button class="btn-dark px-4 hover-dark-light">Cancel Service</button>
															</div>
														</div>
													</div>
												</div>

												<p class="fs-13 mt-2 inner-sub-title" style="max-width:474px;text-align: center;margin: 0 auto; color: rgba(23, 30, 38, 0.75);">
													We will not process any refund request submitted through cancellation request. Please do not file for a cancellation if you wish to request for a refund, open a ticket to request for a refund.
												</p>
											</div>
										</div>


										<div class="tab-pane fade" id="pills-refund" role="tabpanel" aria-labelledby="pills-refund-tab">

											<div class="tab-inner py-0 p-mb-0">
												<h3 class="fs-15 mb-1">Refund Request</h3>
												<div class="divider divider-inner" style="margin:20px 0"></div>

												<div class="tab-inner">
													<div class="row">
														<div class="text-center">
															<p class="fs-14 mb-0 ">Please open a ticket to request a refund.</p>

															<div class="overview-button-wrapper d-flex flex-column align-items-center justify-content-center">
																<button class="btn-dark px-4 hover-dark-light">Open Ticket</button>
															</div>
														</div>
													</div>
												</div>

												<p class="fs-13 mt-2 inner-sub-title" style="max-width:474px;text-align: center; margin: 0 auto; color: rgba(23, 30, 38, 0.75);">
													This is subject to approval according to our Terms of Service.
												</p>
											</div>
										</div>



									</div>
								</div>
							</div>
						</div>
					</div>

					<!--settings-->
					<div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">
						<div class="row mb-5 pe-0">

							<div class="tab-inner settings mb-3">
								<div class="row">
									<h3 class="title mb-4">Settings</h3>
									<p class="description mb-4">All other settings that do not belongs to other tabs.</p>

								</div>
								<div class="divider"></div>
								<div class="row px-0 pt-4">
									<div class="col-md-12 d-flex flex-column flex-lg-row align-items-start">


										<ul class="nav nav-pills mb-3 mb-md-0 mb-lg-0 d-flex flex-column inner-tab-pills" id="pills-tab" role="tablist">

											<li class="nav-item mb-2" role="presentation">
												<button class="nav-link active" id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password" type="button" role="tab" aria-controls="pills-password" aria-selected="false">Change Password</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-host-tab" data-bs-toggle="pill" data-bs-target="#pills-host" type="button" role="tab" aria-controls="pills-host" aria-selected="false">Change Hostname</button>
											</li>
										</ul>

										<div class="tab-content w-100" id="pills-tabContent">
											<!--password-->
											<div class="tab-pane fade  show active" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">

												<div class="tab-inner py-0 p-mb-0">
													<h3 class="fs-15 mb-1">Change Password</h3>

													<div class="divider" style="margin:20px 0"></div>

													<p class="fs-13-5">New server password</p>

													<div class="overview-input mb-4">
														<input type="text" placeholder="Write new password">
													</div>


													<p class="fs-13-5">Confirm new server password</p>

													<div class="overview-input mb-4">
														<input type="text" placeholder="Minimum 8 character">
													</div>

													<div class="overview-button-wrapper pt-0 ">
														<button class="btn-dark px-4 me-2 hover-dark-light">Change Password</button>
													</div>


												</div>
											</div>

											<!--host-->
											<div class="tab-pane fade" id="pills-host" role="tabpanel" aria-labelledby="pills-host-tab">

												<div class="tab-inner py-0 p-mb-0">
													<h3 class="fs-15 mb-1">Change Hostname</h3>

													<div class="divider" style="margin:20px 0"></div>

													<p class="fs-13-5">New hostname</p>

													<div class="overview-input mb-4">
														<input type="text" placeholder="Write new hostname">
													</div>

													<div class="overview-button-wrapper pt-0 mb-4">
														<button class="btn-dark px-4 me-2 hover-dark-light">Change Hostname</button>
													</div>
													<p class="fs-13-5 mb-0 inner-sub-title">
														Note: A power cycle is required after changing hostname in order for the new hostname to be applied.
													</p>

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
		</div>
	</div>
</section>
@endsection