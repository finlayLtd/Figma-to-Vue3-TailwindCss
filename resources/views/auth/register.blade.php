<!doctype html>
<html lang="en" data-theme="light">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/dark-theme.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Register</title>
</head>

<body>
  <div id="loading-bg" style="z-index: 9999 !important; display: none;">
    <div class="loading_new" style="margin:auto;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <section class="home-hero login">
    @if(isset($message))
    <div class="badge reset-success" style="background: crimson;">
      <img src="assets/img/reset-success.svg" alt=""> {{$message}}
    </div>
    @endif

    @error('firstname')
    <div class="badge reset-success" style="background: crimson;">
      <img src="assets/img/reset-success.svg" alt=""> {{ $message }}
    </div>
    @enderror

    @error('lastname')
    <div class="badge reset-success" style="background: crimson;">
      <img src="assets/img/reset-success.svg" alt=""> {{ $message }}
    </div>
    @enderror

    @error('email')
    <div class="badge reset-success" style="background: crimson;">
      <img src="assets/img/reset-success.svg" alt=""> {{ $message }}
    </div>
    @enderror

    @error('password')
    <div class="badge reset-success" style="background: crimson;">
      <img src="assets/img/reset-success.svg" alt=""> {{ $message }}
    </div>
    @enderror

    <div class="register-wrapper pb-0 w-100">
      <div class="bg-dots bg-dots-left"></div>
      <div class="bg-dots bg-dots-right"></div>

      <div class="mt-5 text-center login-card-wrapper">

        <div class="card-item login-card" style="max-width: 450px;">
          <div style="margin-top: -20px;" class="d-flex justify-content-center mb-3">
            <img class="logo-dark" src="assets/img/crazy-rdp-logo.svg" alt="">
            <img class="logo-light" src="assets/img/logo-light.svg" alt="">
          </div>
          <h2 class="login-title">Register Account</h2>

          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="login-input-wrapper mb-3">
              <label for="#firstname">{{ __('First Name') }}</label>

              <div class="col-md-6">
                <input id="firstname" type="text" class="@error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
              </div>
            </div>

            <div class="login-input-wrapper mb-3">
              <label for="#lastname">{{ __('Last Name') }}</label>

              <input id="lastname" type="text" class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
            </div>



            <div class="login-input-wrapper mb-3">
              <label for="#email">Email Address</label>
              <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email@address.com">
            </div>

            <div class="login-input-wrapper mb-3">
              <label for="#password">Password</label>
              <div class="col-md-6">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              </div>
            </div>

            <div class="progress" id="passwordStrengthBar">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                <span class="sr-only">Password Rating: 0%</span>
              </div>
            </div>

            <div class="alert alert-info" style="text-align: left;">
              <strong>Tips for a good password</strong><br>Use both upper and lowercase characters<br>Include at least one symbol (# $ ! % &amp; etc...)<br>Don't use dictionary words
            </div>

            <div class="checkbox-item-wrapper mb-4">
              <input class="form-check-input" checked="" type="checkbox" id="inStockCheckbox">
              <label class="form-check-label checked" for="inStockCheckbox">I agree to the User Agreement, and I have read the Privacy Policy.</label>
            </div>

            <button id="register-btn" type="submit" class="btn-dark w-100 mb-2" disabled>Register account</button>

            <div class="text-center">
              <p class="mb-0 mt-3 fs-14">Already have an account? <a href="{{url('/login')}}">Log in</a></p>
            </div>

          </form>

        </div>
      </div>
    </div>
  </section>

  <script src="assets/js/scripts.js"></script>
  <script>
    $(document).ready(function() {
      $('form').submit(function() {
        $('#loading-bg').css('display', 'flex');
      });
      
      // password robustness check
      jQuery("#password").keyup(function() {
        var pwStrengthErrorThreshold = 50;
        var pwStrengthWarningThreshold = 75;

        var pw = jQuery("#password").val();
        var pwlength = (pw.length);
        if (pwlength > 5) pwlength = 5;
        var numnumeric = pw.replace(/[0-9]/g, "");
        var numeric = (pw.length - numnumeric.length);
        if (numeric > 3) numeric = 3;
        var symbols = pw.replace(/\W/g, "");
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

        if (pwstrength < 85) {
          $('#register-btn').prop('disabled', true);
        } else {
          $('#register-btn').prop('disabled', false);
        }
      });
    });
  </script>
</body>

</html>