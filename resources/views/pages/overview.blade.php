@extends('layouts.app')

@section('content')
<section class="overview">
	<div class="container">
		<div class="d-flex flex-column justify-content-start align-items-start title-button-wrapper">
			<div class="overview-header">
				<img class="not-filterable" src="{{asset('assets/img/'.$sys_logo.'-logo.png')}}" alt="">
				<h2 class="title mb-0">{{$order_product_info['name']}}</h2>
			</div>
			<div class="overview-info">
				@if($dayDiff > 0 ) <span>Created {{$dayDiff}} days ago</span>
				@else <span>Created today</span>
				@endif
				@if(!empty($invoiceInfo['status']) && $invoiceInfo['status'] == 'Unpaid')
					<div class="alert alert-warning mt-2" id="alertUnpaidInvoice">
						You have an unpaid invoice. Pay it now to avoid interruption in service.
						<a style="color: blue; cursor: pointer;" onclick="openInvoiceWindow({{ $invoiceInfo['invoiceid'] }})" target="_blank">Pay Invoice</a>
					</div>
				@endif
			</div>
		</div>
		@if($status == 'Active')
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
										<span>{{$order_product_info['regdate']}}</span>
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
											<td class="clipboard-input" data-copy="{{$order_product_info['dedicatedip']}}">{{$order_product_info['dedicatedip']}}</td>
											<td><img src="{{asset('assets/img/copy.svg')}}" class="icon-clipboard"></td>
										</tr>

										<tr>
											<td>Username</td>
											<td class="clipboard-input" data-copy="{{$order_product_info['username']}}">{{$order_product_info['username']}}</td>
											<td><img src="{{asset('assets/img/copy.svg')}}" class="icon-clipboard"></td>
										</tr>

										<tr>
											<td>Password</td>
											<td>
												<input class="clipboard-input" data-copy="{{$order_product_info['password']}}" disabled type="password" value="{{$order_product_info['password']}}">
											</td>
											<td>
												<img src="{{asset('assets/img/eye.svg')}}" class="icon-password eye-closed">
												<img src="{{asset('assets/img/eye-open.svg')}}" class="icon-password eye-open" style="display:none">
												<img src="{{asset('assets/img/copy.svg')}}" class="icon-clipboard">
											</td>
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
								@if($order_product_info['status'] == 'Active')
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
									<button class="nav-link" id="pills-dns-tab" data-bs-toggle="pill" data-bs-target="#pills-dns" type="button" role="tab" aria-controls="pills-dns" aria-selected="false">ReverseDNS</button>
								</li>

								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-billing-tab" data-bs-toggle="pill" data-bs-target="#pills-billing" type="button" role="tab" aria-controls="pills-billing" aria-selected="false">Billing</button>
								</li>

								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-settings-tab" data-bs-toggle="pill" data-bs-target="#pills-settings" type="button" role="tab" aria-controls="pills-settings" aria-selected="false">{{ __('messages.Settings') }}</button>
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
													<h4 class="title2">{{$order_product_info['groupname']}}</h4>
													<p class="description2">{{$order_product_info['domain']}}</p>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-4 col-md-12">
											<div class="col-content-wrapper sm-border-bottom">
												<div class="img-wrapper">
													<img class="not-filterable" src="{{asset('assets/img/'.$sys_logo.'-logo.png')}}" alt="">
												</div>
												<div class="info">
													<h4 class="title2">{{$order_product_info['name']}}</h4>
													<p class="description2">{{$system}}</p>
												</div>

												<!-- <div class="server-list-options me-3 me-lg-4">
													<div class="options-toggle"></div>
													<div class="options-toggle-dropdown">
														<ul>
															<li><a href="#">Launch Control Panel</a></li>
															<li><a href="#">View Invoices</a></li>
														</ul>
													</div>
												</div> -->
											</div>
										</div>
										<div class="col-12 col-lg-4 col-md-12">
											<div class="col-content-wrapper">
												<div class="img-wrapper">
													<img class="dark-img-filter" src="{{asset('assets/img/cloud-connection.png')}}" alt="">
												</div>
												<div class="info">
													<h4 class="title2">{{$order_product_info['dedicatedip']}}</h4>
													<p class="description2">Created at {{$order_product_info['regdate']}}</p>
												</div>
												@if($order_product_info['status'] == 'Active')
												<div class="server-list-options me-3 me-lg-4">
													<button class="active-badge"><span class="active-dot"></span>Active</button>
												</div>
												@endif
											</div>
										</div>
									</div>
									@if($order_product_info['status'] == 'Active')
									<div class="d-flex justify-content-end px-0 server-btn-options">
										<button class="btn img-btn me-0 me-lg-2" onclick="TurnOnVPS({{ $vpsid }})">
											<i class="fa fa-play" style="color:#3FBB27;"></i>&nbsp;&nbsp;Start
										</button>
										<button class="btn img-btn me-0 me-lg-2" onclick="TurnOffVPS({{ $vpsid }})">
											<img src="{{asset('assets/img/power.svg')}}" alt="">Shutdown
										</button>
										<!-- <button class="btn img-btn me-0 me-lg-2" onclick="RebootVPS({{ $vpsid }})">
											<img src="{{asset('assets/img/reboot.svg')}}" alt="">Reboot
										</button>
										<button class="btn img-btn mt-2 mt-lg-0" onclick="PowerOffVPS({{ $vpsid }})">
											<img class="dark-img-filter" src="{{asset('assets/img/power-off.svg')}}" alt="">Power Off
										</button> -->
									</div>
									@endif
								</div>
							</div>
							@if($order_product_info['status'] == 'Active')
							<div class="tab-inner">
								<div class="row">
									<h3 class="title fs-17">Resource Usage</h3>
								</div>
								<div class="row px-12 pt-3">
									<div class="general-info bg-white overview-col5 d-flex w-100 mb-4">

										<div class="col-md-4 col-sm-12">
											<div class="col-content-wrapper sm-border-bottom">
												<div class="img-wrapper">
													<img src="{{asset('assets/img/cpu.png')}}" alt="">
												</div>
												<div class="info">
													<h4 class="title2">CPU</h4>
													<p class="description2"><span>{{$cpu['percent']}}%</span> of {{$detail_info[0]}} CPU</p>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
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
										<div class="col-md-4 col-sm-12">
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
										<div class="col-md-4 col-sm-12">
											<div class="col-content-wrapper sm-border-bottom">
												<div class="img-wrapper">
													<img src="{{asset('assets/img/speedometer.png')}}" alt="">
												</div>
												<div class="info">
													<h4 class="title2">Network Speed</h4>
													<p class="description2"><span>{{$network_speed}}</span> Mbps</p>
												</div>
											</div>
										</div>
										<!-- <div class="col-md-3 col-sm-12">
											<div class="col-content-wrapper">
												<div class="img-wrapper">
													<img src="{{asset('assets/img/cable.png')}}" alt="">
												</div>
												<div class="info">
													<h4 class="title2">Bandwith</h4>
													<p class="description2"><span>1%</span> of 500 GB</p>
												</div>
											</div>
										</div> -->
									</div>
								</div>
							</div>
							@endif
						</div>
						@if($order_product_info['status'] == 'Active')
						<!--analytics-->
						<div class="tab-pane fade" id="pills-analytics" role="tabpanel" aria-labelledby="pills-analytics-tab">
							<div class="row">
								<div id="cpu-container" class="col-md-6 col-sm-12"></div>
								<div id="ram-container" class="col-md-6 col-sm-12"></div>
							</div>
							<div class="row mt-2">
								<div id="disk-container" class="col-md-6 col-sm-12"></div>
								<div id="inode-container" class="col-md-6 col-sm-12"></div>
							</div>
							<div class="row mt-2">
								<div id="io-read-container" class="col-md-6 col-sm-12"></div>
								<div id="io-write-container" class="col-md-6 col-sm-12"></div>
							</div>
							<div class="row mt-2">
								<div id="net-in-container" class="col-md-6 col-sm-12"></div>
								<div id="net-out-container"class="col-md-6 col-sm-12" ></div>
							</div>
							<div class="row mt-2">
								<div id="net-total-container" class="col-md-6 col-sm-12"></div>
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
										@if(strpos($system, "windows") !== true)
										<p class="fs-15">To connect to your Linux virtual machine using SSH, please use the following command.</p>

										<p class="fs-16">ssh root@<?php echo $order_product_info['dedicatedip']; ?></p>
										@else
										<p class="fs-15">To open Remote Desktop Connection app in Windows, please use the following command in cmd. And you can then enter the IP address or hostname of the remote computer in the Remote Desktop Connection client to establish a connection.</p>
										<p class="fs-15">mstsc</p>
										@endif
										<p class="fs-14 mb-0 sub-detail" style="max-width: 500px;">You will most likely be using cmd if you are connecting from Windows OS or Terminal if you are running macOS or Linux.</p>

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

										<p class="fs-13-5">Select an Operating System</p>
										<div class="form-group d-flex">
											<select name="oslist" id="Operating-system" class="form-control">
												@foreach($oslists as $os)
													<option value="{{$os['osid']}}" data-image="{{asset('assets/img/'.$os['group_name'].'-logo.png')}}">{{ __('messages.'.$os['name']) }}</option>
												@endforeach
											</select>

											<input id="format-disk" type="checkbox" class="format-disk" style="width:20px;height:20px;padding:0;margin-top:10px;margin-left:20px;">
											<label for="format-disk" style="line-height:40px;">&nbsp;Format Primary Disk Only</label>

										</div>

										<div id="newPassword1" class="form-group has-feedback has-success mt-3">
											<label for="inputNewPassword1-os" class="col-sm-4 control-label">New Password</label>
											<div class="col-sm-5" style="position: relative;">
												<input type="password" class="form-control" name="newpw" id="inputNewPassword1" autocomplete="off">
												<img src="{{asset('assets/img/eye.svg')}}" class="settings-password-img icon-password eye-closed">
												<img src="{{asset('assets/img/eye-open.svg')}}" class="settings-password-img icon-password eye-open" style="display:none">
												<br>

												<div class="progress" id="passwordStrengthBar">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
														<span class="rating">Password Rating: 0%</span>
													</div>
												</div>

												<div class="alert alert-info">
												<strong>Tips for a good password</strong><br>Use both upper and lowercase characters<br>Include at least one symbol (only ! and @)<br>Don't use dictionary words and special characters
												</div>
											</div>
										</div>
										<div id="newPassword2" class="form-group has-feedback has-success">
											<label for="inputNewPassword2" class="col-sm-4 control-label">Confirm New Password</label>
											<div class="col-sm-5" style="position: relative;">
												<input type="password" class="form-control" name="confirmpw" id="inputNewPassword2" autocomplete="off">
												<img src="{{asset('assets/img/eye.svg')}}" class="settings-password-img icon-password eye-closed">
												<img src="{{asset('assets/img/eye-open.svg')}}" class="settings-password-img icon-password eye-open" style="display:none">
												<div id="inputNewPassword2Msg"></div>
											</div>
										</div>
										<div class="overview-button-wrapper pt-0 mt-4">
											<div class="col-sm-5">
												<button id="submitButton" class="btn-dark px-4 me-2 hover-dark-light" onclick="rebuildOS({{ $vpsid }})">Reinstall</button>
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
																@foreach($ip_list['ips'] as $ip)
																	@if($ip['primary'] == 1)
																		<tr>
																			<td>{{$ip['ip']}}</td>
																			<td>Primary</td>
																			<td>Main Server IP (Sticky) - Cannot be removed</td>
																		</tr>
																	@else
																		<tr>
																			<td>{{$ip['ip']}}</td>
																			<td></td>
																			<td></td>
																		</tr>
																	@endif
																@endforeach
															</tbody>
														</table>
													</div>

													<div class="divider my-3"></div>


													<p class="fs-13-5">Choose Primary IP</p>

													<div class="overview-select d-inline-block mb-3">
														<select name="iplist" id="primary-ip">
															@foreach($ip_list['ips'] as $ip)
																@if($ip['primary'] != 1)
																	<option value="{{$ip['ipid']}}">{{$ip['ip']}}</option>
																@endif
															@endforeach
														</select>
													</div>

													<div class="overview-button-wrapper pt-0 d-flex ">
														<button class="btn-dark px-4 me-2 hover-dark-light" onclick="assignPrimaryIp({{$vpsid}})">Assign as Primary IP</button>
													</div>

													<p class="fs-14 mt-4 mb-2 inner-sub-title2">After assigning IP address, our system will perform a reboot on your server, please make sure any temporary files are saved before performing IP assignment. Note: Extra IP address will still remain to your account even after server termination unless you cancel the extra IP address subscription.</p>
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
												<!-- <button class="btn-dark px-4 hover-dark-light" onclick="openVNCconnect({{$vpsid}})">Connect VNC</button> -->
												<a class="btn-dark px-4 hover-dark-light" href="{{ url('/noVNC-connect/' . $vpsid) }}" target="_blank">Connect VNC</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--DNS-->
						<div class="tab-pane fade" id="pills-dns" role="tabpanel" aria-labelledby="pills-dns-tab">
							<div class="tab-inner mb-3">
								<div class="row">
									<h3 class="title mb-4">ReverseDNS Management</h3>
								</div>
								<div class="d-flex">
									<div class="overview-dns-select">
										<select name="iplist" id="rdns-ip">
											@foreach($ip_list['ips'] as $ip)
												<option value="{{$ip['ip']}}">{{$ip['ip']}}</option>
											@endforeach
										</select>
									</div>
									<input class="form-control" id="dns-content" type="text" style="width:auto;margin-left:10px;">
									<button class="btn-dark px-4 me-2 hover-dark-light" type="submit" style="padding: 0px 20px;margin-left:10px;" onclick="addRDNS()">Add Reverse DNS</button>
								</div>
								<div class="support-table">
									@include('tables.rdnstable')
								</div>
							</div>
						</div>
						@endif
						<!--billing-->
						@if($order_product_info['status'] != 'Active') <div class="tab-pane fade  show active" id="pills-billing" role="tabpanel" aria-labelledby="pills-billing-tab">
						@else <div class="tab-pane fade" id="pills-billing" role="tabpanel" aria-labelledby="pills-billing-tab">
						@endif
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
												<button class="nav-link" id="pills-renew-tab" data-bs-toggle="pill" data-bs-target="#pills-renew" type="button" role="tab" aria-controls="pills-renew" aria-selected="false">Renew Service</button>
											</li>

											<li class="nav-item mb-2" role="presentation">
												<button class="nav-link active" id="pills-invoices-tab" data-bs-toggle="pill" data-bs-target="#pills-invoices" type="button" role="tab" aria-controls="pills-invoices" aria-selected="false">Invoice</button>
											</li>

											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-refund-tab" data-bs-toggle="pill" data-bs-target="#pills-refund" type="button" role="tab" aria-controls="pills-refund" aria-selected="false">Refund</button>
											</li>


										</ul>

										<div class="tab-content w-100" id="pills-tabContent">

											<!--renew-->
											<div class="tab-pane fade " id="pills-renew" role="tabpanel" aria-labelledby="pills-renew-tab">

												<div class="tab-inner py-0 p-mb-0">
													<h3 class="fs-15 mb-1">Renew Service</h3>
													<div class="divider divider-inner" style="margin:20px 0"></div>

													<div class="tab-inner">
														<div class="row">
															<div class="text-center">
																<p class="fs-14 mb-0 ">Current Due Date</p>
																<p class="fs-15 mb-0" style="font-weight: 500;">{{$order_product_info['nextduedate']}}</p>

																<div class="overview-button-wrapper d-flex flex-column align-items-center justify-content-center">
																	<a href="{{ route('balance') }}" class="btn btn-primary">Renew Service</a>
																	<!-- <button class="btn-dark px-4 hover-dark-light" onclick="">
																		
																	</button> -->
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
											<div class="tab-pane fade active show" id="pills-invoices" role="tabpanel" aria-labelledby="pills-invoices-tab">
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
																	<th scope="col" class="text-center">View Invoice</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>{{$invoiceInfo['invoiceid']}}</td>
																	<td class="date-cell">{{$invoiceInfo['date']}}</td>
																	<td class="date-cell">{{$invoiceInfo['duedate']}}</td>
																	<td class="date-cell">{{$invoiceInfo['datepaid']}}</td>						      
																	<td class="remaining-cell"><span>€ {{$invoiceInfo['subtotal']}}</span></td>
																	@if($invoiceInfo['status'] == 'Paid')
																	<td class="successful-cell">
																		<span>
																			{{ $invoiceInfo['status'] }}
																		</span>
																	</td>
																	@elseif($invoiceInfo['status'] == 'Unpaid')
																	<td class="cancelled-cell">
																		<span>
																			{{ $invoiceInfo['status'] }}
																		</span>
																	</td>
																	@else
																	<td class="in-progress-cell">
																		<span>
																			{{ $invoiceInfo['status'] }}
																		</span>
																	</td>
																	@endif
																	<!-- <td class="text-center">
																		<a onclick="openInvoiceWindow({{ $invoiceInfo['invoiceid'] }})" target="_blank">
																			<img src="{{asset('assets/img/eye-open.svg')}}" class="icon-password view-invoice">
																		</a>
																	</td> -->
																	<td class="text-center"><a onclick="openInvoiceWindow({{ $invoiceInfo['invoiceid'] }})" target="_blank"><img src="{{asset('assets/img/eye-open.svg')}}" class="icon-password view-invoice"></a></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>

											<!--create ticket for refund-->
											<div class="tab-pane fade" id="pills-refund" role="tabpanel" aria-labelledby="pills-refund-tab">

												<div class="tab-inner py-0 p-mb-0">
													<h3 class="fs-15 mb-1">Refund Request</h3>
													<div class="divider divider-inner" style="margin:20px 0"></div>

													<div class="tab-inner">
														<div class="row">
															<div class="text-center">
																<p class="fs-14 mb-0 ">Please open a ticket to request a refund.</p>

																<div class="overview-button-wrapper d-flex flex-column align-items-center justify-content-center">
																	<button class="btn-dark px-4 hover-dark-light" id="open-ticket">Open Ticket</button>
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
						@if($order_product_info['status'] == 'Active')
						<!--settings-->
						<div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">
							<div class="row mb-5 pe-0">

								<div class="tab-inner settings mb-3">
									<div class="row">
										<h3 class="title mb-4">{{ __('messages.Settings') }}</h3>
										<p class="description mb-4">All other settings that do not belongs to other tabs.</p>

									</div>
									<div class="divider"></div>
									<div class="row px-0 pt-4">
										<div class="col-md-12 d-flex flex-column flex-lg-row align-items-start">


											<ul class="nav nav-pills mb-3 mb-md-0 mb-lg-0 d-flex flex-column inner-tab-pills" id="pills-tab" role="tablist">

												<li class="nav-item mb-2" role="presentation">
													<button class="nav-link active" id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password" type="button" role="tab" aria-controls="pills-password" aria-selected="false">{{ __('messages.Change_Password') }}</button>
												</li>
												<li class="nav-item" role="presentation">
													<button class="nav-link" id="pills-host-tab" data-bs-toggle="pill" data-bs-target="#pills-host" type="button" role="tab" aria-controls="pills-host" aria-selected="false">Change Hostname</button>
												</li>
											</ul>

											<div class="tab-content w-100" id="pills-tabContent">
												<!--password-->
												<div class="tab-pane fade  show active" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">

													<div class="tab-inner py-0 p-mb-0">
														<h3 class="fs-15 mb-1">{{ __('messages.Change_Password') }}</h3>
														<div class="divider" style="margin:20px 0"></div>
															<div id="newPassword1-os" class="form-group has-feedback has-success mt-3">
																<label for="inputNewPassword1-os" class="col-sm-4 control-label">New Server Password</label>
																<div class="col-sm-5" style="position: relative;">
																	<input type="password" class="form-control" name="newpw" id="inputNewPassword1-os" autocomplete="off">
																	<img src="{{asset('assets/img/eye.svg')}}" class="settings-password-img icon-password eye-closed">
																	<img src="{{asset('assets/img/eye-open.svg')}}" class="settings-password-img icon-password eye-open" style="display:none">
																	<br>

																	<div class="progress" id="passwordStrengthBar-os">
																		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
																			<span class="rating">Password Rating: 0%</span>
																		</div>
																	</div>

																	<div class="alert alert-info">
																	<strong>Tips for a good password</strong><br>Use both upper and lowercase characters<br>Include at least one symbol (only ! and @)<br>Don't use dictionary words and special characters
																	</div>
																</div>
															</div>
															<div id="newPassword2-os" class="form-group has-feedback has-success">
																<label for="inputNewPassword2-os" class="col-sm-4 control-label">Confirm New Password</label>
																<div class="col-sm-5" style="position: relative;">
																	<input type="password" class="form-control" name="confirmpw" id="inputNewPassword2-os" autocomplete="off">
																	<img src="{{asset('assets/img/eye.svg')}}" class="settings-password-img icon-password eye-closed">
																	<img src="{{asset('assets/img/eye-open.svg')}}" class="settings-password-img icon-password eye-open" style="display:none">
																	<div id="inputNewPassword2-os-Msg"></div>
																</div>
															</div>
															<div class="overview-button-wrapper pt-0 mt-4">
																<div class="col-sm-5">
																	<button id="submitButtonOS" class="btn-dark px-4 me-2 hover-dark-light" onclick="changePWD({{ $vpsid }})">{{ __('messages.Change_Password') }}</button>
																</div>
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
															<input type="text" placeholder="Write new hostname" id="hostname">
															<div id="inputHostNameMsg"></div>
														</div>

														<div class="overview-button-wrapper pt-0 mb-4">
															<button class="btn-dark px-4 me-2 hover-dark-light" onclick="changeHostName({{$vpsid}})">Change Hostname</button>
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
						@endif
					</div>
				</div>
			</div>
		@else
			<div class="alert alert-warning mt-2" id="alertUnpaidInvoice">
				This VPS has not been activated yet. Pay the invoice or wait for confirmation of payment in case you did pay already.
			</div>

			<div class="support-table">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Invoice ID</th>
							<th scope="col">Invoice Date</th>
							<th scope="col">Due Date</th>
							<th scope="col">Date Paid</th>
							<th scope="col">Amount</th>
							<th scope="col">Status</th>
							<th scope="col" class="text-center">View Invoice</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{$invoiceInfo['invoiceid']}}</td>
							<td class="date-cell">{{$invoiceInfo['date']}}</td>
							<td class="date-cell">{{$invoiceInfo['duedate']}}</td>
							<td class="date-cell">{{$invoiceInfo['datepaid']}}</td>						      
							<td class="remaining-cell"><span>€ {{$invoiceInfo['subtotal']}}</span></td>
							@if($invoiceInfo['status'] == 'Paid')
							<td class="successful-cell">
								<span>
									{{ $invoiceInfo['status'] }}
								</span>
							</td>
							@elseif($invoiceInfo['status'] == 'Unpaid')
							<td class="cancelled-cell">
								<span>
									{{ $invoiceInfo['status'] }}
								</span>
							</td>
							@else
							<td class="in-progress-cell">
								<span>
									{{ $invoiceInfo['status'] }}
								</span>
							</td>
							@endif
							<td class="text-center">
								<a onclick="openInvoiceWindow({{ $invoiceInfo['invoiceid'] }})" target="_blank">
									<img src="{{asset('assets/img/eye-open.svg')}}" class="icon-password view-invoice">
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		@endif
	</div>
</section>

<div class="modal modal-ticket hidden">
	<div class="modal-inner">
		<div class="modal-close">
			<img class="close-dark" src="{{asset('assets/img/close.svg')}}" alt="">
			<img class="close-light" src="{{asset('assets/img/close-light.svg')}}" alt="">

		</div>
		<div class="modal-content">

			<div class="modal-header">
				<div class="modal-title">
					<h2>New ticket</h2>
					<h3>Create new ticket now.</h3>
				</div>
			</div>
			<div class="modal-main">
				<div class="amounts">
					<form id="openTicket" enctype="multipart/form-data" method="POST" action="{{route('ticket.open')}}">
						@csrf
						<h4>Subject</h4>
						<input class="mb-3" name="subject" type="text" placeholder="Write subject">

						<h4>Describe the problem</h4>
						<textarea class="mb-3" name="message" id="" cols="30" rows="8"></textarea>

						<h4>Department*</h4>
						<select name="department" id="department">
							@foreach ($departments as $department)
							<option value="{{$department['id']}}">{{$department['name']}}</option>
							@endforeach
						</select>

						@if(sizeof($orders) > 0)
						<h4>Service related</h4>
						<select name="service" id="service">
							<option value="0">- None -</option>
							@foreach ($orders as $order_info)
							@foreach($order_info['lineitems']['lineitem'] as $order_value)
							<option value="{{$order_value['relid']}}">{{$order_value['product']}} - {{ $order_value['status'] }}</option>
							@endforeach
							@endforeach
						</select>
						@endif
						<button class="btn-dark d-block w-100 mt-5" id="create-ticket">Create Ticket</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		

		$('#Operating-system').select2({
			templateResult: function(data) {
				if (!data.id) { return data.text; }
				var $image = $('<img src="' + $(data.element).data('image') + '" class="img-flag" />');
				var $span = $('<span>' + data.text + '</span>');
				return $('<span>').append($image).append($span);
			},
			templateSelection: function(data) {
				if (!data.id) { return data.text; }
				var $image = $('<img src="' + $(data.element).data('image') + '" class="img-flag" />');
				var $span = $('<span>' + data.text + '</span>');
				return $('<span>').append($image).append($span);
			}
		});

		jQuery("#inputNewPassword1").keyup(function() {
			var pwStrengthErrorThreshold = 50;
			var pwStrengthWarningThreshold = 75;

			var pw = jQuery("#inputNewPassword1").val();

			// Check if the password contains any disallowed special symbols
			if (/[^A-Za-z0-9!@]/.test(pw)) {
				alert("Invalid character detected. Only '!' and '@' are allowed as special symbols.");
				// Revert the password input to the previous value
				jQuery("#inputNewPassword1").val(prevPassword);
				return;
			}

			// Update the previous password value
			prevPassword = pw;

			var pwlength = (pw.length);
			console.log(pwlength);
			if (pwlength > 7) pwlength = 5;
			else pwlength = 2;

			console.log(pwlength);

			var numnumeric = pw.replace(/[0-9]/g, "");
			var numeric = (pw.length - numnumeric.length);
			if (numeric > 3) numeric = 3;

			// Update the regular expression to only match "!" and "@"
			var symbols = pw.replace(/[!@]/g, "");
			var numsymbols = (pw.length - symbols.length);
			if (numsymbols > 3) numsymbols = 3;

			var numupper = pw.replace(/[A-Z]/g, "");
			var upper = (pw.length - numupper.length);
			if (upper > 3) upper = 3;
			var pwstrength = ((pwlength * 10) - 20) + (numeric * 10) + (numsymbols * 15) + (upper * 10);
			if (pwstrength < 0) pwstrength = 0;
			if (pwstrength > 100) pwstrength = 100;

			jQuery("#inputNewPassword1").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-warning-sign glyphicon-ok');
			jQuery("#passwordStrengthBar .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").css("width", pwstrength + "%").attr('aria-valuenow', pwstrength);
			jQuery("#passwordStrengthBar .progress-bar .rating").html('Password Rating: ' + pwstrength + '%');
			if (pwstrength < pwStrengthErrorThreshold) {
				jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-remove');
				jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-danger");
			} else if (pwstrength < pwStrengthWarningThreshold) {
				jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-warning-sign');
				jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-warning");
			} else {
				jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-ok');
				jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-success");
			}
		});

		jQuery("#inputNewPassword2").keyup(function() {
			validatePassword2();
		});

		jQuery("#inputNewPassword1-os").keyup(function() {
			var pwStrengthErrorThreshold = 50;
			var pwStrengthWarningThreshold = 75;

			var pw = jQuery("#inputNewPassword1-os").val();

			// Check if the password contains any disallowed special symbols
			if (/[^A-Za-z0-9!@]/.test(pw)) {
				alert("Invalid character detected. Only '!' and '@' are allowed as special symbols.");
				// Revert the password input to the previous value
				jQuery("#inputNewPassword1-os").val(prevPassword);
				return;
			}

			// Update the previous password value
			prevPassword = pw;

			var pwlength = (pw.length);
			console.log(pwlength);
			if (pwlength > 7) pwlength = 5;
			else pwlength = 2;

			console.log(pwlength);

			var numnumeric = pw.replace(/[0-9]/g, "");
			var numeric = (pw.length - numnumeric.length);
			if (numeric > 3) numeric = 3;

			// Update the regular expression to only match "!" and "@"
			var symbols = pw.replace(/[!@]/g, "");
			var numsymbols = (pw.length - symbols.length);
			if (numsymbols > 3) numsymbols = 3;

			var numupper = pw.replace(/[A-Z]/g, "");
			var upper = (pw.length - numupper.length);
			if (upper > 3) upper = 3;
			var pwstrength = ((pwlength * 10) - 20) + (numeric * 10) + (numsymbols * 15) + (upper * 10);
			if (pwstrength < 0) pwstrength = 0;
			if (pwstrength > 100) pwstrength = 100;

			jQuery("#inputNewPassword1-os").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-warning-sign glyphicon-ok');
			jQuery("#passwordStrengthBar-os .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").css("width", pwstrength + "%").attr('aria-valuenow', pwstrength);
			jQuery("#passwordStrengthBar-os .progress-bar .rating").html('Password Rating: ' + pwstrength + '%');
			if (pwstrength < pwStrengthErrorThreshold) {
				jQuery("#inputNewPassword1-os").next('.form-control-feedback').addClass('glyphicon-remove');
				jQuery("#passwordStrengthBar-os .progress-bar").addClass("progress-bar-danger");
			} else if (pwstrength < pwStrengthWarningThreshold) {
				jQuery("#inputNewPassword1-os").next('.form-control-feedback').addClass('glyphicon-warning-sign');
				jQuery("#passwordStrengthBar-os .progress-bar").addClass("progress-bar-warning");
			} else {
				jQuery("#inputNewPassword1-os").next('.form-control-feedback').addClass('glyphicon-ok');
				jQuery("#passwordStrengthBar-os .progress-bar").addClass("progress-bar-success");
			}
		});

		jQuery("#inputNewPassword2-os").keyup(function() {
			validatePassword2OS();
		});

		$("#open-ticket").click(function() {
			$(".modal").removeClass("hidden");
		})

		$(".modal-close").click(function() {
			$(".modal").addClass("hidden");
		});

		var chat_data = @json($analysis_data);
		if ($('#modeSwitch').prop('checked')) {
			// Checkbox is checked
			renderChat(chat_data, '#1C1C1E');
		} else {
			// Checkbox is not checked
			renderChat(chat_data, '#ffffff');
		}
		
		// change the theme
		toggleSwitch.addEventListener('change', switchColor_Graph, false);

		function switchColor_Graph(event) {
			if (event.target.checked) {
				renderChat(chat_data, '#1C1C1E');
			} else {
				renderChat(chat_data, '#ffffff');
			}
		}
	});

	function TurnOnVPS(vpsid){
		$('#loading-bg').css('display', 'flex');
        $.ajax({
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{ URL::to('/overview/turnon') }}",
            method:'post',
            data: {
                vpsid: vpsid
            },
            success:function(data){
				$('#loading-bg').css('display', 'none');
				showToast('Success', data, 'success');
            },
        });
	}

	function TurnOffVPS(vpsid){
		$('#loading-bg').css('display', 'flex');
        $.ajax({
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{ URL::to('/overview/turnoff') }}",
            method:'post',
            data: {
                vpsid: vpsid
            },
            success:function(data){
				$('#loading-bg').css('display', 'none');
				showToast('Success', data, 'success');
            },
        });
	}

	function RebootVPS(vpsid){
		$('#loading-bg').css('display', 'flex');
        $.ajax({
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{ URL::to('/overview/reboot') }}",
            method:'post',
            data: {
                vpsid: vpsid
            },
            success:function(data){
				$('#loading-bg').css('display', 'none');
				showToast('Success', data, 'success');
            },
        });
	}

	function PowerOffVPS(vpsid){
		$('#loading-bg').css('display', 'flex');
        $.ajax({
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{ URL::to('/overview/poweroff') }}",
            method:'post',
            data: {
                vpsid: vpsid
            },
            success:function(data){
				$('#loading-bg').css('display', 'none');
				showToast('Success', data, 'success');
            },
        });
	}

	function validatePassword2() {
		var password1 = jQuery("#inputNewPassword1").val();
		var password2 = jQuery("#inputNewPassword2").val();
		var $newPassword2 = jQuery("#newPassword2");

		if (password2 && password1 !== password2) {
			$newPassword2.removeClass('has-success').addClass('has-error');
			jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-ok').addClass('glyphicon-remove');
			jQuery("#inputNewPassword2Msg").html('<p class="help-block" id="nonMatchingPasswordResult">The passwords entered do not match</p>');
			jQuery('#submitButton').attr('disabled', 'disabled');
		} else {
			if (password2) {
				$newPassword2.removeClass('has-error').addClass('has-success');
				jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-remove').addClass('glyphicon-ok');
				jQuery('#submitButton').removeAttr('disabled');
			} else {
				$newPassword2.removeClass('has-error has-success');
				jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-ok');
			}
			jQuery("#inputNewPassword2Msg").html('');
		}
	}

	function validatePassword2OS() {
		var password1 = jQuery("#inputNewPassword1-os").val();
		var password2 = jQuery("#inputNewPassword2-os").val();
		var $newPassword2 = jQuery("#newPassword2-os");

		if (password2 && password1 !== password2) {
			$newPassword2.removeClass('has-success').addClass('has-error');
			jQuery("#inputNewPassword2-os").next('.form-control-feedback').removeClass('glyphicon-ok').addClass('glyphicon-remove');
			jQuery("#inputNewPassword2-os-Msg").html('<p class="help-block" id="nonMatchingPasswordResult">The passwords entered do not match</p>');
			jQuery('#submitButtonOS').attr('disabled', 'disabled');
		} else {
			if (password2) {
				$newPassword2.removeClass('has-error').addClass('has-success');
				jQuery("#inputNewPassword2-os").next('.form-control-feedback').removeClass('glyphicon-remove').addClass('glyphicon-ok');
				jQuery('#submitButtonOS').removeAttr('disabled');
			} else {
				$newPassword2.removeClass('has-error has-success');
				jQuery("#inputNewPassword2-os").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-ok');
			}
			jQuery("#inputNewPassword2-os-Msg").html('');
		}
	}

	function rebuildOS(vpsid){
		var validate = validateRebuildCondition();
		if(validate){
			if($("#format-disk").is(':checked')) var format_disk_flag = 1;
			else var format_disk_flag = 0;
			var selected_osid = $('#Operating-system').val();
			var root_pwd = $("#inputNewPassword2").val();

			$('#loading-bg').css('display', 'flex');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:"{{ URL::to('/overview/rebuild') }}",
				method:'post',
				data: {
					vpsid: vpsid,
					format_disk_flag: format_disk_flag,
					selected_osid: selected_osid,
					root_pwd: root_pwd
				},
				success:function(data){
					alert("VPS is being rebuilt, hence no actions are allowed to be performed on this VPS");
					window.location.reload();
					$('#loading-bg').css('display', 'none');
				},
			});
		}
	}

	function validateRebuildCondition(){
		var return_flag = true;
		if(jQuery("#inputNewPassword2").val() == ''){
			showToast('Error', 'You did not specify the new password.', 'danger');
			return_flag = false;
		}
		var pwdStrength = jQuery("#passwordStrengthBar .progress-bar .rating").html().split(" ");
		if(parseInt(pwdStrength[2]) != 100){
			showToast('warning', 'Password strength must be greater than 100', 'warning');
			return_flag = false;
		}
		if((jQuery("#inputNewPassword2Msg").html()!='')&&(jQuery("#inputNewPassword2").val()!='')){
			showToast('Warning', 'The confirmation password is missing.', 'warning');
			return_flag = false;
		}

		return return_flag;
	}

	function generateRandomString() {
		var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@';
		var length = 8;
		var result = '';
		var uppercaseCount = 0;
		var specialCharCount = 0;
		var numberCount = 0; // add a counter for numbers
		for (var i = 0; i < length; i++) {
			var randomIndex = Math.floor(Math.random() * chars.length);
			var randomChar = chars.charAt(randomIndex);
			if (/[A-Z]/.test(randomChar)) {
			uppercaseCount++;
			} else if (/[\!\@]/.test(randomChar)) {
			specialCharCount++;
			}else if (/[0-9]/.test(randomChar)) { // check if the character is a number
      		numberCount++;
    		}
			result += randomChar;
		}
		if (uppercaseCount < 3 || specialCharCount < 2 || numberCount < 2) {
			return generateRandomString();
		}
  		return result;
	}

	function validateChangePWDCondition(){
		var return_flag = true;
		if(jQuery("#inputNewPassword2-os").val() == ''){
			showToast('Error', 'You did not specify the new password.', 'danger');
			return_flag = false;
		}
		var pwdStrength = jQuery("#passwordStrengthBar-os .progress-bar .rating").html().split(" ");
		if(parseInt(pwdStrength[2]) != 100){
			showToast('warning', 'Password strength must be greater than 100', 'warning');
			return_flag = false;
		}
		if((jQuery("#inputNewPassword2-os-Msg").html()!='')&&(jQuery("#inputNewPassword2").val()!='')){
			showToast('Warning', 'The confirmation password is missing.', 'warning');
			return_flag = false;
		}

		return return_flag;
	}

	function changePWD(vpsid){
		var validate = validateChangePWDCondition();
		var root_pwd = $("#inputNewPassword2-os").val();
		if(validate){
			$('#loading-bg').css('display', 'flex');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:"{{ URL::to('/overview/changepwd') }}",
				method:'post',
				data: {
					vpsid: vpsid,
					root_pwd: root_pwd
				},
				success:function(data){
					$('#loading-bg').css('display', 'none');
					showToast('Success', data, 'success');
				},
			});
		}
	}

	function changeHostName(vpsid){
		var hostname = $("#hostname").val();
		var flag = false;
		$('#loading-bg').css('display', 'flex');
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url:"{{ URL::to('/overview/checkhostName') }}",
			method:'post',
			data: {
				hostname: hostname
			},
			success:function(data){
				if(data=='Already Exist.'){
					$('#loading-bg').css('display', 'none');
					showToast('Warning', 'Inputed New hostname already exist.', 'warning');
					return;
				}else{
					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url:"{{ URL::to('/overview/changehostName') }}",
						method:'post',
						data: {
							vpsid: vpsid,
							hostname: hostname
						},
						success:function(data){
							$('#loading-bg').css('display', 'none');
							showToast('Success', data, 'success');s
						},
					});
				}
			},
		});
	}

	function openConnectVNC(relid,vpsid){
		windowClose();
		var windowWidth = 1024;
		var windowHeight = 768;
		var leftPosition = (window.screen.width / 2) - (windowWidth / 2);
		var topPosition = (window.screen.height / 2) - (windowHeight / 2);
		$('#loading-bg').css('display', 'flex');
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{ route('vnc_connect_sso') }}",
			method: "POST",
			data: { 
				relid: relid,
				vpsid:vpsid
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

	function openVNCconnect(vpsid){
		var windowWidth = 1024;
		var windowHeight = 768;
		var leftPosition = (window.screen.width / 2) - (windowWidth / 2);
		var topPosition = (window.screen.height / 2) - (windowHeight / 2);
		$('#loading-bg').css('display', 'flex');
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{ URL::to('/overview/connectvnc') }}",
			method: "POST",
			data: { 
				vpsid:vpsid
			},
			success: function(response) {
				$('#loading-bg').css('display', 'none');
				var newWindow = window.open();
				newWindow.document.write(response);
				newWindow.document.close();
			},
			error: function(xhr, status, error) {
				// Handle the error here
				console.log(error);
				$('#loading-bg').css('display', 'none');
			}
		});
		$('.modal-balance').addClass('hidden');
		
	}

	function getAnalysisData(relid,vpsid){
		let original_url;
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{ route('vps_analysis_sso') }}",
			method: "POST",
			data: { 
				relid: relid,
				vpsid:vpsid
			},
			success: function(response) {
				$.ajax({
					url: response.redirect_url,
					method: "GET",
					success: function(result) {
						console.log(result);
					},
					error: function(xhr, status, error) {
						console.log(xhr);
						console.log(status);
						console.log(error);
					}
				});
			},
			error: function(xhr, status, error) {

			}
		});
		
		
	}

	function assignPrimaryIp(vpsid){
		var reorder_ips = [];
		var iplist = @json($ip_list['ips']);
		var ipid = $('#primary-ip').val();
		const index = iplist.findIndex(obj => obj.ipid === ipid);
		if (index > -1) {
			const obj = iplist.splice(index, 1)[0];
			iplist.unshift(obj);
		}
		
		iplist.forEach(function(element) {
			reorder_ips.push(element.ip);
		});
		$('#loading-bg').css('display', 'flex');
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url:"{{ URL::to('/overview/changeip') }}",
			method:'post',
			data: {
				vpsid: vpsid,
				reorder_ips: reorder_ips
			},
			success:function(data){
				$('#loading-bg').css('display', 'none');
				showToast('Success', 'Your IP settings have been saved.Your IP settings will be changed when the VPS is booted again' ,'success');
			},
		});
	}

	function renderChat(data, color){
		//For showing up the average download and upload speed
		var avg_download = 0;
		var avg_upload = 0;
		var avg_io_read = 0;
		var avg_io_write = 0;
		var count = 0;
		var cpu_data = new Array();
		var inode_data = new Array();
		var ram_data = new Array();
		var disk_data = new Array();
		var ntw_in_data = new Array();
		var ntw_out_data = new Array();
		var ntw_total_data = new Array();
		var io_read_data = new Array();
		var io_write_data = new Array();

		if(data){
			$.each(data, function(key, val){
				//Array is in format [vpsid, time, status, disk, inode, ram, cpu, net_in, net_out]
				cpu_data.push([val[1], val[6]*1]);

				inode_data.push([val[1], val[4]*1]);

				ram_data.push([val[1], val[5]*1]);

				disk_data.push([val[1], val[3]*1]);

				ntw_in_data.push([val[1], val[7]*1]);

				ntw_out_data.push([val[1], val[8]*1]);

				ntw_total_data.push([val[1], (parseInt(val[7])+parseInt(val[8]))]);

				io_read_data.push([val[1], val[9]*1]);

				io_write_data.push([val[1], val[10]*1]);
				// Display the average speed of available data
				avg_download += parseInt(val[7]);
				avg_upload += parseInt(val[8]);
				avg_io_read += parseInt(val[9]);
				avg_io_write += parseInt(val[10])
				count++;
			});
			// Calculating the average Downloading Speed per month
			avg_download = (avg_download/count/1024/1024).toFixed(5);

			// Calculating the average Uploading Speed per month
			avg_upload = (avg_upload/count/1024/1024).toFixed(5);

			// Calculating the average I/O read per month
			avg_io_read = (avg_io_read/count/1024/1024).toFixed(5);

			// Calculating the average I/O write per month
			avg_io_write = (avg_io_write/count/1024/1024).toFixed(5);

			renderCpuGraph(cpu_data, color);
			renderRamGraph(ram_data, color);
			renderDiskGraph(disk_data, color);
			renderInodeGraph(inode_data, color);
			renderDiskGraph(disk_data, color);
			// renderDiskreadGraph(io_read_data);
			// renderDiskwriteGraph(io_write_data);
			renderNetInGraph(ntw_in_data, color);
			renderNetOutGraph(ntw_out_data, color);
			renderNetTotalGraph(ntw_total_data, color);
		}
	}

	function revertColor(color) {
		// Convert the color to RGB format
		var r = parseInt(color.substring(1, 3), 16);
		var g = parseInt(color.substring(3, 5), 16);
		var b = parseInt(color.substring(5, 7), 16);

		// Calculate the inverted color
		var invertedR = 255 - r;
		var invertedG = 255 - g;
		var invertedB = 255 - b;

		// Convert the inverted color back to hex format
		var invertedColor = "#" + invertedR.toString(16).padStart(2, '0') + invertedG.toString(16).padStart(2, '0') + invertedB.toString(16).padStart(2, '0');

		return invertedColor;
	}

	function renderCpuGraph(data, color){
		Highcharts.chart('cpu-container', {
			chart: {
				type: 'area',
				backgroundColor: color,
            },
			title: {
				text: 'CPU Usage',
				align: 'left',
				style: {
					color: revertColor(color)
				},
			},
			// chart options
			tooltip: {
				formatter: function() {
					return 'Time: ' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
						'CPU Usage rate: '+this.y+'%';
				}
			},
			xAxis: {
				type: 'datetime',
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			yAxis: {
				title: {
					text: 'CPU Usage rate'
				},
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				name: 'CPU',
				data: data.map(([date, value]) => [new Date(date).getTime(), value]),
			}]
		});
	}

	function renderRamGraph(data, color){
		Highcharts.chart('ram-container', {
			chart: {
				type: 'area',
				backgroundColor: color,
            },
			title: {
				text: 'RAM Usage',
				align: 'left',
				style: {
					color: revertColor(color)
				},
			},
			// chart options
			tooltip: {
				formatter: function() {
					return 'Time: ' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
						'RAM Usage rate: '+this.y+'MB';
				}
			},
			xAxis: {
				type: 'datetime',
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			yAxis: {
				title: {
					text: 'RAM Usage rate'
				},
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				name: 'RAM',
				data: data.map(([date, value]) => [new Date(date).getTime(), value]),
			}]
		});
	}

	function renderDiskGraph(data, color){
		Highcharts.chart('disk-container', {
			chart: {
				type: 'area',
				backgroundColor: color,
            },
			title: {
				text: 'Disk Usage',
				align: 'left',
				style: {
					color: revertColor(color)
				},
			},
			// chart options
			tooltip: {
				formatter: function() {
					return 'Time: ' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
						'Disk Usage rate: '+this.y+'MB';
				}
			},
			xAxis: {
				type: 'datetime',
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			yAxis: {
				title: {
					text: 'Disk Usage rate'
				},
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				name: 'Disk',
				data: data.map(([date, value]) => [new Date(date).getTime(), value]),
			}]
		});
	}

	function renderInodeGraph(data, color){
		Highcharts.chart('inode-container', {
			chart: {
				type: 'area',
				backgroundColor: color,
            },
			title: {
				text: 'Inode Information',
				align: 'left',
				style: {
					color: revertColor(color)
				},
			},
			// chart options
			tooltip: {
				formatter: function() {
					return 'Time: ' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
						'Innode Usage rate: '+this.y+'Blocks';
				}
			},
			xAxis: {
				type: 'datetime',
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			yAxis: {
				title: {
					text: 'Inode Usage rate'
				},
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				name: 'Inode',
				data: data.map(([date, value]) => [new Date(date).getTime(), value]),
			}]
		});
	}

	function renderDiskreadGraph(data, color){
		Highcharts.chart('io-read-container', {
			chart: {
				type: 'area',
				backgroundColor: color,
            },
			title: {
				text: 'Disk Read Information',
				align: 'left',
				style: {
					color: revertColor(color)
				},
			},
			// chart options
			tooltip: {
				formatter: function() {
					return 'Time: ' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
						'Disk Read rate: '+this.y+'MB';
				}
			},
			xAxis: {
				type: 'datetime',
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			yAxis: {
				title: {
					text: 'Disk Read rate'
				},
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				name: 'Disk Read',
				data: data.map(([date, value]) => [new Date(date).getTime(), value]),
			}]
		});
	}

	function renderDiskwriteGraph(data, color){
		Highcharts.chart('io-write-container', {
			chart: {
				type: 'area',
				backgroundColor: color,
            },
			title: {
				text: 'Disk Write Information',
				align: 'left',
				style: {
					color: revertColor(color)
				},
			},
			// chart options
			tooltip: {
				formatter: function() {
					return 'Time: ' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
						'Disk Write rate: '+this.y+'MB';
				}
			},
			xAxis: {
				type: 'datetime',
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			yAxis: {
				title: {
					text: 'Disk Write rate'
				},
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				name: 'Disk Write',
				data: data.map(([date, value]) => [new Date(date).getTime(), value]),
			}]
		});
	}

	function renderNetInGraph(data, color){
		Highcharts.chart('net-in-container', {
			chart: {
				type: 'area',
				backgroundColor: color,
            },
			title: {
				text: 'Network Download Information',
				align: 'left',
				style: {
					color: revertColor(color)
				},
			},
			// chart options
			tooltip: {
				formatter: function() {
					return 'Time: ' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
						'Download rate: '+this.y+'MB';
				}
			},
			xAxis: {
				type: 'datetime',
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			yAxis: {
				title: {
					text: 'Network Download rate',
				},
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				name: 'Network Download',
				data: data.map(([date, value]) => [new Date(date).getTime(), value]),
			}]
		});
	}

	function renderNetOutGraph(data, color){
		Highcharts.chart('net-out-container', {
			chart: {
				type: 'area',
				backgroundColor: color,
            },
			title: {
				text: 'Network Upload Information',
				align: 'left',
				style: {
					color: revertColor(color)
				},
			},
			// chart options
			tooltip: {
				formatter: function() {
					return 'Time: ' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
						'Upload rate: '+this.y+'MB';
				}
			},
			xAxis: {
				type: 'datetime',
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			yAxis: {
				title: {
					text: 'Network Upload rate'
				},
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				name: 'Network Upload',
				data: data.map(([date, value]) => [new Date(date).getTime(), value]),
			}]
		});
	}

	function renderNetTotalGraph(data, color){
		Highcharts.chart('net-total-container', {
			chart: {
				type: 'area',
				backgroundColor: color,
            },
			title: {
				text: 'Network Information',
				align: 'left',
				style: {
					color: revertColor(color)
				},
			},
			// chart options
			tooltip: {
				formatter: function() {
					return 'Time: ' + Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
						'Network Usage rate: '+this.y+'MB';
				}
			},
			xAxis: {
				type: 'datetime',
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			yAxis: {
				title: {
					text: 'Network rate'
				},
				labels: {
					style: {
						color: revertColor(color)
					}
				}
			},
			legend: {
				enabled: false
			},
			plotOptions: {
				area: {
					fillColor: {
						linearGradient: {
							x1: 0,
							y1: 0,
							x2: 0,
							y2: 1
						},
						stops: [
							[0, Highcharts.getOptions().colors[0]],
							[1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
						]
					},
					marker: {
						radius: 2
					},
					lineWidth: 1,
					states: {
						hover: {
							lineWidth: 1
						}
					},
					threshold: null
				}
			},

			series: [{
				name: 'Network',
				data: data.map(([date, value]) => [new Date(date).getTime(), value]),
			}]
		});
	}

	function addRDNS(){
		var ip_addr = $("#rdns-ip").val();
		var domain_content = $('#dns-content').val();
	}
</script>
@endsection