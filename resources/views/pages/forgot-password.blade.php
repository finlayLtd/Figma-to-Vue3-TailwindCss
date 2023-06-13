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
  <title>Forgot password</title>
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

    @if(isset($message) && $message=='success')
    <div class="badge reset-success">
      <img src="assets/img/reset-success.svg" alt=""> Reset Email successfully sent.
    </div>
    @endif

    @if(isset($message) && $message=='failed')
    <div class="badge reset-success" style="background: crimson;">
      <img src="assets/img/reset-success.svg" alt=""> Wrong email address or unregistered user.
    </div>
    @endif

    <div class="login-wrapper pb-0 w-100">
      <div class="bg-dots bg-dots-left"></div>
      <div class="bg-dots bg-dots-right"></div>

      <div class="mt-5 text-center login-card-wrapper">

        <div class="card-item login-card">
          <div style="margin-top: -20px;" class="d-flex justify-content-center mb-3">
            <img class="logo-dark" src="assets/img/crazy-rdp-logo.svg" alt="">
            <img class="logo-light" src="assets/img/logo-light.svg" alt="">
          </div>
          <h2 class="login-title">Forgot password</h2>

          <form method="POST" action="{{ route('send_forgot_email') }}">
            @csrf

            <div class="login-input-wrapper mb-3">
              <label for="#email">Email Address</label>
              <input type="email" id="email" name="email" required placeholder="email@address.com">
            </div>


            <button type="submit" class="btn-dark w-100 mb-2">Send Reset Email</button>

            <div class="text-center">
              <p class="mb-0 mt-3 fs-14"><a href="{{url('/login')}}">Back <img class="ms-1" src="assets/img/blue-back.svg" alt=""></a></p>
            </div>
          </form>

        </div>

        <div>
            <form action="/trans_history" method="post">
                @csrf
                <button type="submit" style="display: none;" id="trans_history_btn">
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
    });
  </script>
</body>

</html>