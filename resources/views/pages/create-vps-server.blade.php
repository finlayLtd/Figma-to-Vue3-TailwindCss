@extends('layouts.app')

@section('content')


<section class="dashboard">
	<div class="container">
		<h2 class="title">Create Dedicated Server</h2>

		<div class="sub-section">
			<h3 class="sub-title">Choose a OS</h3>
			<div class="row server-item-wrapper">

				<div data-dist="windows" class="server-item display-distributions">
					<img src="assets/img/windows-logo.png">
					<span>Windows</span>
				</div>

				<div data-dist="ubuntu" class="server-item display-distributions">
					<img src="assets/img/ubuntu-logo.png">
					<span>Ubuntu</span>
				</div>

				<div data-dist="debian" class="server-item display-distributions">
					<img src="assets/img/debian-logo.png">
					<span>Debian</span>
				</div>

				<div data-dist="almalinux" class="server-item display-distributions">
					<img src="assets/img/almalinux-logo.png">
					<span>AlmaLinux</span>
				</div>

				<div data-dist="fedora" class="server-item display-distributions">
					<img src="assets/img/fedora-logo.png">
					<span>Fedora</span>
				</div>

				<div data-dist="rocky" class="server-item display-distributions">
					<img src="assets/img/rocky-logo.png">
					<span>Rocky</span>
				</div>

				<div data-dist="centos" class="server-item display-distributions">
					<img src="assets/img/centos-logo.png">
					<span>Centos</span>
				</div>

			</div>
		</div>
		<style>

		</style>
		<div class="sub-section">
			<h3 class="sub-title">Choose a OS Version</h3>


			<div data-dist="windows" class="dist-tab windows-tab">
				<div class="row server-item-wrapper os-version-wrapper flex-column align-items-start">
					<div class="datacenter-item">
						<img src="assets/img/windows-logo.png">
						<span>Windows Server 2012 R2 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/windows-logo.png">
						<span>Windows Server 2019 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/windows-logo.png">
						<span>Windows Server 2022 RDP</span>
					</div>
				</div>
			</div>

			<div data-dist="ubuntu" class="dist-tab ubuntu-tab">
				<div class="row server-item-wrapper os-version-wrapper flex-column align-items-start">
					<div class="datacenter-item">
						<img src="assets/img/ubuntu-logo.png">
						<span>Ubuntu Server 2012 R2 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/ubuntu-logo.png">
						<span>Ubuntu Server 2019 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/ubuntu-logo.png">
						<span>Ubuntu Server 2022 RDP</span>
					</div>
				</div>
			</div>

			<div data-dist="debian" class="dist-tab debian-tab">
				<div class="row server-item-wrapper os-version-wrapper flex-column align-items-start">
					<div class="datacenter-item">
						<img src="assets/img/debian-logo.png">
						<span>Debian Server 2012 R2 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/debian-logo.png">
						<span>Debian Server 2019 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/debian-logo.png">
						<span>Debian Server 2022 RDP</span>
					</div>
				</div>
			</div>

			<div data-dist="almalinux" class="dist-tab almalinux-tab">
				<div class="row server-item-wrapper os-version-wrapper flex-column align-items-start">
					<div class="datacenter-item">
						<img src="assets/img/almalinux-logo.png">
						<span>Almalinux Server 2012 R2 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/almalinux-logo.png">
						<span>Almalinux Server 2019 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/almalinux-logo.png">
						<span>Almalinux Server 2022 RDP</span>
					</div>
				</div>
			</div>


			<div data-dist="fedora" class="dist-tab fedora-tab">
				<div class="row server-item-wrapper os-version-wrapper flex-column align-items-start">
					<div class="datacenter-item">
						<img src="assets/img/fedora-logo.png">
						<span>Fedora Server 2012 R2 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/fedora-logo.png">
						<span>Fedora Server 2019 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/fedora-logo.png">
						<span>Fedora Server 2022 RDP</span>
					</div>
				</div>
			</div>


			<div data-dist="rocky" class="dist-tab rocky-tab">
				<div class="row server-item-wrapper os-version-wrapper flex-column align-items-start">
					<div class="datacenter-item">
						<img src="assets/img/rocky-logo.png">
						<span>Rocky Server 2012 R2 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/rocky-logo.png">
						<span>Rocky Server 2019 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/rocky-logo.png">
						<span>Rocky Server 2022 RDP</span>
					</div>
				</div>
			</div>


			<div data-dist="centos" class="dist-tab centos-tab">
				<div class="row server-item-wrapper os-version-wrapper flex-column align-items-start">
					<div class="datacenter-item">
						<img src="assets/img/centos-logo.png">
						<span>Centos Server 2012 R2 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/centos-logo.png">
						<span>Centos Server 2019 RDP</span>
					</div>

					<div class="datacenter-item">
						<img src="assets/img/centos-logo.png">
						<span>Centos Server 2022 RDP</span>
					</div>
				</div>
			</div>
		</div>

		<div class="sub-section">
			<h3 class="sub-title">Choose a Datacenter region</h3>
			<div class="row server-item-wrapper">
				<div class="datacenter-item">
					<img src="assets/img/datacenter-flag-nl.png">
					<span>Netherlands</span>
				</div>
				<div class="datacenter-item">
					<img src="assets/img/datacenter-flag-en.png">
					<span>United States</span>
				</div>
			</div>
		</div>

		<div class="sub-section">
			<h3 class="sub-title">Choose a Datacenter region</h3>
			<div class="row">
				<div class="col-md-3">
					<div class="card-item data-region-card p-4 ">
						<div class="server-price mb-4">
							<span class="price">€50<span class="month">/ month</span></span>
						</div>
						<div class="">
							<ul class="server-features">
								<li><img src="assets/img/cpu.png" alt="">1x Intel E5-2697v3 (14C, 28T)</li>
								<li><img src="assets/img/ram.png" alt="">6 GB RAM</li>
								<li><img src="assets/img/hard-disk.png" alt="">40 GB SSD</li>
								<li><img src="assets/img/speedometer.png" alt="">Unlimited traffic</li>
								<li><img src="assets/img/cable.png" alt="">1 Dedicated IPv4</li>
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

				<div class="col-md-3">
					<div class="card-item data-region-card p-4">
						<div class="server-price mb-4">
							<span class="price">€100<span class="month">/ month</span></span>
						</div>
						<div class="">
							<ul class="server-features">
								<li><img src="assets/img/cpu.png" alt="">1x Intel E5-2697v3 (14C, 28T)</li>
								<li><img src="assets/img/ram.png" alt="">6 GB RAM</li>
								<li><img src="assets/img/hard-disk.png" alt="">40 GB SSD</li>
								<li><img src="assets/img/speedometer.png" alt="">Unlimited traffic</li>
								<li><img src="assets/img/cable.png" alt="">1 Dedicated IPv4</li>
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
				<div class="col-md-3">
					<div class="card-item data-region-card p-4">
						<div class="server-price mb-4">
							<span class="price">€120<span class="month">/ month</span></span>
						</div>
						<div class="">
							<ul class="server-features">
								<li><img src="assets/img/cpu.png" alt="">1x Intel E5-2697v3 (14C, 28T)</li>
								<li><img src="assets/img/ram.png" alt="">6 GB RAM</li>
								<li><img src="assets/img/hard-disk.png" alt="">40 GB SSD</li>
								<li><img src="assets/img/speedometer.png" alt="">Unlimited traffic</li>
								<li><img src="assets/img/cable.png" alt="">1 Dedicated IPv4</li>
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
				<div class="col-md-3">
					<div class="card-item data-region-card p-4">
						<div class="server-price mb-4">
							<span class="price">€150<span class="month">/ month</span></span>
						</div>
						<div class="">
							<ul class="server-features">
								<li><img src="assets/img/cpu.png" alt="">1x Intel E5-2697v3 (14C, 28T)</li>
								<li><img src="assets/img/ram.png" alt="">6 GB RAM</li>
								<li><img src="assets/img/hard-disk.png" alt="">40 GB SSD</li>
								<li><img src="assets/img/speedometer.png" alt="">Unlimited traffic</li>
								<li><img src="assets/img/cable.png" alt="">1 Dedicated IPv4</li>
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
			</div>
		</div>

		<div class="sub-section">
			<h3 class="sub-title">Configure Server</h3>
			<div class="row">
				<div class="configure-server-form">
					<form>
						<div class="mb-3">
							<label for="email" class="form-label">VPS Hostname</label>
							<input type="email" class="form-control" placeholder="Enter your VPS Hostname" id="email" name="email" aria-describedby="emailHelp" value="realTest.com">
						</div>
						<div class="mb-4">
							<label for="password" class="form-label">VPS Password</label>
							<input type="password" class="form-control mb-4" placeholder="••••••••••" id="password" name="password" required>
							<div class="progress" id="passwordStrengthBar">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
								<span class="sr-only">Password Rating: 0%</span>
							</div>
							</div>
							<div class="alert alert-info" style="text-align: left;">
								<strong>Tips for a good password</strong><br>Use both upper and lowercase characters<br>Include at least one symbol (only ! and @)<br>Don't use dictionary words and special characters
							</div>
						</div>
						<div class="mb-3 text-end">
							<button type="submit" class="btn btn-dark hover-dark-light">Create Server</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

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
			jQuery("#passwordStrengthBar .progress-bar .sr-only").html('Password Rating: ' + pwstrength + '%');
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
	});
</script>
@endsection