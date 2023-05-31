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

    <title>Login</title>
  </head>
  <body>

  <section class="home-hero login">

    <div class="badge reset-success d-none">
      <img src="assets/img/reset-success.svg" alt=""> Send reset instructions was succesful.
    </div>

    <div class="login-wrapper pb-0 w-100">
      <div class="bg-dots bg-dots-left"></div>
      <div class="bg-dots bg-dots-right"></div>

      <div class="mt-5 text-center login-card-wrapper">

          <div class="card-item login-card">
              <div style="margin-top: -20px;" class="d-flex justify-content-center mb-3">
                <img class="logo-dark" src="assets/img/crazy-rdp-logo.svg" alt="">
                <img class="logo-light" src="assets/img/logo-light.svg" alt="">
              </div>  


              <h2 class="login-title">Login Account</h2>

              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-input-wrapper mb-3">
                  <label for="#email">Email Address</label>
                  <!-- <input type="email" id="email" name="email" required placeholder="email@address.com">  -->
                  <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email@address.com">               
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="login-input-wrapper mb-4">
                  <label for="#password">Password</label>
                  <!-- <input type="password" id="password" name="password" required placeholder="••••••••••">          -->
                  <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••••">       
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <input style='display: none;' class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <button class="btn-dark w-100 mb-2" type="submit">Login</button>

                <button class="btn-light w-100 mb-3"><a href="{{url('/register')}}" style="color: black;">Register account</a></button>

                @if (Route::has('password.request'))
                  <div class="text-center">
                      <a class="fs-14" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                    </div>
                @endif
                <!-- <div class="text-center">
                    <a class="fs-14" href="#">Forgot password?</a>
                </div> -->

              </form>




          </div>
      </div>       
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  </body>
</html>
