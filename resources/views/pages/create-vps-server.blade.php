@extends('layouts.app')

@section('content')


<section class="dashboard">
	<div class="container">
		<h2 class="title">{{ __('messages.Create_Server') }}</h2>

		<div class="sub-section">
			<h3 class="sub-title">{{ __('messages.Choose_a_OS') }}</h3>
			<div class="row server-item-wrapper">
				@foreach($oslist as $key=>$os)
					@if(ucfirst($key) != 'others' && ucfirst($key) != 'Others')
					<div data-dist="{{ $key }}" class="server-item display-distributions">
						<img src="assets/img/{{ $key }}-logo.png">
						<span>{{ ucfirst($key) }}</span>
					</div>
					@endif
				@endforeach
			</div>
		</div>

		<div class="sub-section">
			<h3 class="sub-title">{{ __('messages.os_version') }}</h3>
			@foreach($os_kind as $kind)
				<div data-dist="{{$kind}}" class="dist-tab {{$kind}}-tab">
					<div class="row server-item-wrapper os-version-wrapper flex-column align-items-start">
						@foreach($oslist[$kind] as $osid=>$os)
							<div class="datacenter-item system-item" osid="{{$osid}}" os-name-iso="{{$os['name']}}" config-id="{{$os['config_id']}}">
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
						<div style="display: flex;">
							<input type="text" class="form-control" placeholder="{{ __('messages.hostname_placeholder') }}" id="hostname" name="email" >
							<button type="button" class="btn btn-link" style="padding: 10px;" id="randomizeButton">Random</button>
						</div>
					</div>
					<div class="mb-4">
						<label for="password" class="form-label">{{ __('messages.VPS_Password') }}</label>
						<div style="display: flex;" class="mb-4">
							<input type="text" class="form-control " placeholder="••••••••••" id="password" name="password" required disabled>
							<button type="button" class="btn btn-link" style="padding: 10px;" id="randomizeButton_password">Random</button>
						</div>
						<div class="progress" id="passwordStrengthBar">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
							<span class="rating">{{ __('messages.Password_Rating') }}: 0%</span>
						</div>
						</div>
						<div class="alert alert-info" style="text-align: left; position: inherit;">
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
				<div class="vps-info mb-2">
					<div class="vps-info-review card">
						<h6 class="sub-title">VPS info</h6>
						<hr/>
						<div class="vps-name"></div>
						<div class="vps-price"></div>
						<div class="vps-groupname"></div>
						<div class="vps-hostname"></div>
						<div class="vps-ipnum">
							Number of IPs: 1
						</div>
						<div class="vps-os"></div>
					</div>
				</div>

				<div class="user-info mt-2 mb-2">
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
								@if($key==0) <input type="radio" class="form-check-input paymentMethod" name="paymentMethod" id="paymentMethod" value="{{ $payment_method['module'] }}" checked/>
								@else <input type="radio" class="form-check-input paymentMethod" name="paymentMethod" id="paymentMethod" value="{{ $payment_method['module'] }}"/>
								@endif
								<label class="form-check-label" for="paymentMethod">{{ $payment_method['displayname'] }}</label>
							</div>
						@endforeach
						<!-- added newly to implement apply credit -->
						<div class="form-check">
							<input type="radio" class="form-check-input paymentMethod" name="paymentMethod" id="paymentMethod" value="credit"/>
							<label class="form-check-label" for="paymentMethod">Account Funds (available €{{ Auth::user()->credit }})</label>
						</div>
					</div>
				</div>

				<button class="btn-dark d-block w-100 mt-5" id="continue-order">CheckOut</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		// Add a click event listener to the "Randomize" button
		jQuery("#randomizeButton").click(function() {
			var randomHostname = generateRandomHostname();
			jQuery("#hostname").val(randomHostname);

			// Copy the generated hostname to the clipboard
			var copyTextarea = document.createElement('textarea');
			copyTextarea.value = randomHostname;
			document.body.appendChild(copyTextarea);
			copyTextarea.select();
			document.execCommand('copy');
			document.body.removeChild(copyTextarea);

			showToast('Success', 'Copied hostname to clipboard', 'success');

		});

		jQuery("#randomizeButton_password").click(function() {
			var randomPassword = generateRandomString();
			jQuery("#password").val(randomPassword);

			// Copy the generated hostname to the clipboard
			var copyTextarea = document.createElement('textarea');
			copyTextarea.value = randomPassword;
			document.body.appendChild(copyTextarea);
			copyTextarea.select();
			document.execCommand('copy');
			document.body.removeChild(copyTextarea);
			checkPassword();
			showToast('Success', 'Copied password to clipboard', 'success');

		});

		$('form').submit(function() {
			('#loading-bg').css('display', 'flex');
		});

		var prevPassword = "";
		var prevHostname = "";

		function generateRandomHostname() {
			var hostname = "";
			var possibleChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
			for (var i = 0; i < 12; i++) {
				hostname += possibleChars.charAt(Math.floor(Math.random() * possibleChars.length));
			}
			prevHostname = hostname;
			return hostname;
		}

		function generatePassword() {
			const symbols = ['!', '@'];
			const uppercaseLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			const lowercaseLetters = 'abcdefghijklmnopqrstuvwxyz';
			let password = '';

			// Add one symbol and one uppercase letter
			password += symbols[Math.floor(Math.random() * symbols.length)];
			password += uppercaseLetters[Math.floor(Math.random() * uppercaseLetters.length)];

			// Add remaining letters randomly
			for (let i = 2; i < 12; i++) {
				const randomIndex = Math.floor(Math.random() * lowercaseLetters.length);
				password += lowercaseLetters[randomIndex];
			}

			// Shuffle the password
			password = password.split('').sort(() => Math.random() - 0.5).join('');

			prevPassword = password;
			return password;
		}

		function generateRandomString() {
			var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@';
			var length = 12;
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
			prevPassword = result;
			return result;
		}

		jQuery("#hostname").keyup(function() {
			var hostname = jQuery("#hostname").val();
			if (hostname.length > 12) {
				alert("Hostname can be at most 12 characters long.");
				// Revert the hostname input to the previous value
				jQuery("#hostname").val(prevHostname);
				return;
			}
			if (/[^a-zA-Z0-9]/.test(hostname)) {
				alert("Hostname can only contain letters and numbers.");
				// Revert the hostname input to the previous value
				jQuery("#hostname").val(prevHostname);
				return;
			}
			// Update the previous hostname value
			prevHostname = hostname;
		});

		// upgraded code
		jQuery("#password").keyup(function() {
			checkPassword();
		});

		function checkPassword(){
			var pwStrengthErrorThreshold = 50;
			var pwStrengthWarningThreshold = 75;

			var pw = jQuery("#password").val();

			// Check if the password is empty
			if (pw.length === 0) {
				jQuery("#password").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-warning-sign glyphicon-ok');
				jQuery("#passwordStrengthBar .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").css("width", "0%").attr('aria-valuenow', 0);
				jQuery("#passwordStrengthBar .progress-bar .rating").html('Password Rating: 0%');
				return;
			}

			// Check if the password contains any disallowed special symbols
			if (/[^A-Za-z0-9!@]/.test(pw)) {
				alert("Invalid character detected. Only '!' and '@' are allowed as special symbols.");
				// Revert the password input to the previous value
				jQuery("#password").val(prevPassword);
				return;
			}

			// Update the previous password value
			prevPassword = pw;

			var pwlength = pw.length;
			var numupper = pw.replace(/[a-z!@]/g, "");
			var upper = (pw.length - numupper.length);
			var numsymbols = pw.replace(/[^!@]/g, "").length;
			var pwstrength = 0;

			if (pwlength > 8 && upper >= 1 && numsymbols >= 1) {
				pwstrength = 100;
			} else if (pwlength > 8 && (upper >= 1 || numsymbols >= 1)) {
				pwstrength = 80;
			} else if (pwlength >= 6 && (upper >= 1 || numsymbols >= 1)) {
				pwstrength = 60;
			} else {
				pwstrength = 20;
			}

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
		}

		jQuery(".system-item").click(function(){
			$(".selected-os").removeClass("selected-os");
			$(this).addClass("selected-os");
		});

		jQuery(".plan-item").click(function(){
			if($(this).find(".stockUnavailable").length == 0){
				$(".selected-plan").removeClass("selected-plan");
				$(this).addClass("selected-plan");
			} else{
				showToast('Unavailable', 'Out of Stock', 'danger');
			}
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
		vps_info_html = vps_info_html.find("div:eq(0)").html(); // remove the third div
		$(".vps-name").html(vps_info_html);

		var vps_price_html = $(".selected-plan").clone();
		vps_price_html = vps_price_html.find("div:eq(1)").html();
		$(".vps-price").html(vps_price_html);

		var group = $(".selected-plan").parent().parent();
		vps_group_html = group.find("div:eq(0)").html();
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
		var config_id = $(".selected-os").attr("config-id");

		var pwd = $("#password").val();
		var hostname = $('#hostname').val();
		var paymentMethod = $('input[name=paymentMethod]:checked').val();
		// check the balance
		if(paymentMethod == 'credit'){
			var	priceValue = document.querySelector('.vps-price .price-value').textContent;
			if(parseFloat(priceValue) > 0){
				showToast('Warning', 'Account funds are not enough.', 'warning');
				$(".modal").addClass("hidden");
				return;
			} 
		}

		$('#loading-bg').css('display', 'flex');
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url:"{{ URL::to('/overview/checkhostName') }}",
			method:'post',
			data: {
				hostname: hostname,
				config_id : config_id,
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
							config_id: config_id,
							pwd: pwd,
							paymentMethod: paymentMethod,
							product_id: product_id,
						},
						success:function(data){
							$('#loading-bg').css('display', 'none');		
							$(".modal").addClass("hidden");
							showToast('Success', 'Created vps successfully', 'success');
							console.log('response from the backend');
							console.log(data);
							window.location.href = data.redirect_url;
						},
					});
				}
			},
		});

		
	}

</script>
@endsection