@extends('layouts.app')

@section('content')


<section class="dashboard">
	<div class="container">
		<h2 class="title">{{ __('messages.Create_Server') }}</h2>

		<div class="sub-section">
			<h3 class="sub-title">{{ __('messages.Choose_a_OS') }}</h3>
			<div class="row server-item-wrapper">
				@foreach($oslist as $key=>$os)
					<div data-dist="{{ $key }}" class="server-item display-distributions">
						<img src="assets/img/{{ $key }}-logo.png">
						<span>{{ ucfirst($key) }}</span>
					</div>
				@endforeach
			</div>
		</div>

		<div class="sub-section">
			<h3 class="sub-title">{{ __('messages.os_version') }}</h3>
			@foreach($os_kind as $kind)
				<div data-dist="{{$kind}}" class="dist-tab {{$kind}}-tab">
					<div class="row server-item-wrapper os-version-wrapper flex-column align-items-start">
						@foreach($oslist[$kind] as $osid=>$os)
							<div class="datacenter-item system-item" osid="{{$osid}}" os-name-iso="{{$os['name']}}">
								<img src="assets/img/{{ $kind }}-logo.png">
								<span>{{ __('messages.'.$os['name']) }}</span>
							</div>
						@endforeach
					</div>
				</div>
			@endforeach
		</div>

		<div class="sub-section">
			@include('tables.servers')
		</div>

		<div class="sub-section">
			<h3 class="sub-title">{{ __('messages.Configure_Server') }}</h3>
			<div class="row">
				<div class="configure-server-form">
					<div class="mb-3">
						<label for="email" class="form-label">{{ __('messages.VPS_Hostname') }}</label>
						<input type="text" class="form-control" placeholder="{{ __('messages.hostname_placeholder') }}" id="hostname" name="email" >
					</div>
					<div class="mb-4">
						<label for="password" class="form-label">{{ __('messages.VPS_Password') }}</label>
						<input type="password" class="form-control mb-4" placeholder="••••••••••" id="password" name="password" required>
						<div class="progress" id="passwordStrengthBar">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
							<span class="rating">{{ __('messages.Password_Rating') }}: 0%</span>
						</div>
						</div>
						<div class="alert alert-info" style="text-align: left;">
							<strong>{{ __('messages.tips') }}</strong><br>{{ __('messages.tips_content1') }}<br>{{ __('messages.tips_content2') }}<br>{{ __('messages.tips_content3') }}
						</div>
					</div>
					<div class="mb-3 text-end">
						<button id="create-btn" type="submit" class="btn btn-dark hover-dark-light">{{ __('messages.Create_Server') }}</button>
					</div>
				</div>
			</div>
		</div>
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
					<h2>Review & Checkout</h2>
				</div>
			</div>
			<div class="modal-main">
				<div class="vps-info">
					<div class="vps-info-review card">
						<h6 class="sub-title">VPS info</h6>
						<hr/>
						<div class="vps-name"></div>
						<div class="vps-groupname"></div>
						<div class="vps-hostname"></div>
						<div class="vps-ipnum">
							Number of IPs: 1
						</div>
						<div class="vps-os"></div>
					</div>
				</div>

				<div class="user-info mt-2">
					<div class="user-info-review card">
						<h6 class="sub-title">User info</h6>
						<hr/>
						<div class="user-name">Name: {{$user['fullname']}}</div>
						<div class="user-email">Email: {{$user['email']}}</div>
						<div class="user-currency-code">Currency: {{$user['currency_code']}}</div>
					</div>
				</div>

				<div class="payment-info mt-2">
					<div class="payment-info-review card">
						<h6 class="sub-title">Payment Method</h6>
						<hr/>
						@foreach($payment_methods as $key=>$payment_method)
							<div class="form-check">
								@if($key==0) <input type="radio" class="form-check-input" name="paymentMethod" id="paymentMethod" value="{{ $payment_method['module'] }}" checked/>
								@else <input type="radio" class="form-check-input" name="paymentMethod" id="paymentMethod" value="{{ $payment_method['module'] }}"/>
								@endif
								<label class="form-check-label" for="paymentMethod">{{ $payment_method['displayname'] }}</label>
							</div>
						@endforeach
					</div>
				</div>

				<button class="btn-dark d-block w-100 mt-5" id="continue-order">CheckOut</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('form').submit(function() {
			('#loading-bg').css('display', 'flex');
		});

		// upgraded code
		jQuery("#password").keyup(function() {
			var pwStrengthErrorThreshold = 50;
			var pwStrengthWarningThreshold = 75;

			var pw = jQuery("#password").val();

			// Check if the password contains any disallowed special symbols
			if (/[^A-Za-z0-9!@]/.test(pw)) {
				alert("Invalid character detected. Only '!' and '@' are allowed as special symbols.");
				// Revert the password input to the previous value
				jQuery("#password").val(prevPassword);
				return;
			}

			// Update the previous password value
			prevPassword = pw;

			var pwlength = (pw.length);
			if (pwlength > 5) pwlength = 5;
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

			jQuery("#password").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-warning-sign glyphicon-ok');
			jQuery("#passwordStrengthBar .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").css("width", pwstrength + "%").attr('aria-valuenow', pwstrength);
			jQuery("#passwordStrengthBar .progress-bar .rating").html('Password Rating: ' + pwstrength + '%');
			if (pwstrength < pwStrengthErrorThreshold) {
				jQuery("#password").next('.form-control-feedback').addClass('glyphicon-remove');
				jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-danger");
			} else if (pwstrength < pwStrengthWarningThreshold) {
				jQuery("#password").next('.form-control-feedback').addClass('glyphicon-warning-sign');
				jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-warning");
			} else {
				jQuery("#password").next('.form-control-feedback').addClass('glyphicon-ok');
				jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-success");
			}
		});

		jQuery(".system-item").click(function(){
			$(".selected-os").removeClass("selected-os");
			$(this).addClass("selected-os");
		});

		jQuery(".plan-item").click(function(){
			$(".selected-plan").removeClass("selected-plan");
			$(this).addClass("selected-plan");
		});

		jQuery("#create-btn").click(function(){
			openSurmary();
		});

		$(".modal-close").click(function() {
			$(".modal").addClass("hidden");
		});

		$("#continue-order").click(function(){
			createNewOrder();
		});
	});

	function openSurmary(){
		var flag;
		if(!checkingSelectionStatus()) return false;
		if(!checkingPwdStrength())  return false;
		var host_name = $('#hostname').val();
		if(host_name==''){
			showToast('Warning', 'Please input hostname.', 'warning');
			return false;
		}
		settingModal();
		$(".modal").removeClass("hidden");
		
	}

	function checkingPwdStrength(){
		var pwdStrength = jQuery("#passwordStrengthBar .progress-bar .rating").html().split(" ");
		if(parseInt(pwdStrength[2]) != 100){
			showToast('warning', 'Password strength must be greater than 100', 'warning');
			return false;
		}
		return true;
	}

	function checkingSelectionStatus(){
		if($(".selected-os").length == 0){
			showToast('Warning', 'Please choose the OS you want to use on your VPS.', 'warning');
			return false;
		}

		if($(".selected-plan").length == 0){
			showToast('Warning', 'Please choose the VPS you want.', 'warning');
			return false;
		}
		return true;
	}

	function settingModal(){
		var vps_info_html = $(".selected-plan").clone(); // clone the element
		vps_info_html = vps_info_html.find("div:eq(0)"); // remove the third div
		$(".vps-name").html(vps_info_html);

		var group = $(".selected-plan").parent().parent();
		vps_group_html = group.find("div:eq(0)");
		$(".vps-groupname").html(vps_group_html);

		var host_name = $('#hostname').val();
		$(".vps-hostname").html('Host Name: ' + host_name);

		var os_html = $(".selected-os").clone();
		os_html = os_html.find("span");
		$(".vps-os").html('OS : ' + os_html.html());
		
	}

	function createNewOrder(){
		var os_id = $(".selected-os").attr("osid");
		var os_name = $(".selected-os").attr("os-name-iso");
		var product_id = $(".selected-plan").attr("product-id");
		var pwd = $("#password").val();
		var hostname = $('#hostname').val();
		var paymentMethod = $('input[name=paymentMethod]:checked').val();

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
					showToast('Warning', 'Inputed hostname already exist.', 'warning');
					return;
				}else{
					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url:"{{ route('create-vps') }}",
						method:'post',
						data: {
							hostname: hostname,
							os_id: os_id,
							os_name: os_name,
							pwd: pwd,
							paymentMethod: paymentMethod,
							product_id: product_id,
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

</script>
@endsection