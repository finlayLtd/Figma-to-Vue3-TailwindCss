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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

  <title>Login</title>
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
    <div class="badge reset-success">
      <img src="assets/img/reset-success.svg" alt=""> Account registration successfully done.
    </div>
    @endif

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

    <div class="login-wrapper pb-0 w-100">
      <div class="bg-dots bg-dots-left"></div>
      <div class="bg-dots bg-dots-right"></div>

      <div class="mt-5 text-center login-card-wrapper">
        <div class="card-item login-card">
          
          
          <div class="d-flex justify-content-center mb-3 mt-1">
            <img class="logo-dark" src="assets/img/crazy-rdp-logo.svg" alt="">
            <img class="logo-light" src="assets/img/logo-light.svg" alt="">
          </div>
          <h2 class="login-title">Login Account</h2>

          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-input-wrapper mb-3">
              <label for="#email">Email Address</label>
              <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email@address.com">

            </div>

            <div class="login-input-wrapper mb-4">
              <label for="#password">Password</label>
              <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••••">
            </div>

            <input style='display: none;' class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <button class="btn-dark w-100 mb-2" type="submit">Login</button>

          </form>

          <a href="{{url('/register')}}" style="color: black;">
            <button class="btn-light w-100 mb-3">
              Register account
            </button>
          </a>

          @if (Route::has('forgot_password'))
          <div class="text-center">
            <a class="fs-14" href="{{ route('forgot_password') }}">
              {{ __('Forgot Your Password?') }}
            </a>
          </div>
          @endif
          <!-- <select name="lang-list mt-2" id="lang-list" style="margin-top:15px;">
            <option value="us" data-image="https://flagcdn.com/32x24/us.png"> English </option>
            <option value="ru" data-image="https://flagcdn.com/32x24/ru.png"> русский </option>
            <option value="cn" data-image="https://flagcdn.com/32x24/cn.png"> 中文 </option>
          </select> -->
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
    });
  </script>
</body>

</html>