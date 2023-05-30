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

    <title>Register</title>
  </head>
  <body>

  <section class="home-hero login">

    <div class="login-wrapper pb-0 w-100">
      <div class="bg-dots bg-dots-left"></div>
      <div class="bg-dots bg-dots-right"></div>

      <div class="mt-5 text-center login-card-wrapper">

          <div class="card-item login-card">
              <div style="margin-top: -20px;" class="d-flex justify-content-center mb-3">
                <img class="logo-dark" src="assets/img/crazy-rdp-logo.svg" alt="">
                <img class="logo-light" src="assets/img/logo-light.svg" alt="">
              </div> 
              <h2 class="login-title">Register Account</h2>

              <form action="" method="POST">

                <div class="login-input-wrapper mb-3">
                  <label for="#email">Email Address</label>
                  <input type="email" id="email" name="email" required placeholder="email@address.com">                
                </div>

                <div class="login-input-wrapper mb-3">
                  <label for="#password">Password</label>
                  <input type="password" id="password" name="password" required placeholder="Minimum 8 character">                
                </div>

                <div class="checkbox-item-wrapper mb-4">
                  <input class="form-check-input" checked="" type="checkbox" id="inStockCheckbox">
                  <label class="form-check-label checked" for="inStockCheckbox">I agree to the User Agreement, and I have read the Privacy Policy.</label>
                </div>


                <button type="submit" class="btn-dark w-100 mb-2">Register account</button>


                <div class="text-center">
                    <p class="mb-0 mt-3 fs-14">Already have an account? <a href="#">Log in</a></p>
                </div>

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
