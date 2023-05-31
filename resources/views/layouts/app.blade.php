<!doctype html>
<html lang="en" data-theme="light">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dark-theme.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">

    <title>WHMCS-VPS</title>
  </head>
  <body>
    <div id="app">
        @auth
        <header class="border-bottom sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container d-flex flex-wrap align-items-center justify-content-between  py-3">

                <a href="/" class="logo-wrapper d-flex align-items-center col-md-2 text-dark text-decoration-none order-lg-1">
                    <img class="logo-dark" src="assets/img/crazy-rdp-logo.svg" alt="">
                    <img class="logo-light" src="assets/img/logo-light.svg" alt="">

                </a>

                <div class="col-md-4 d-flex align-items-center justify-content-end order-lg-3">



                    <!-- Dark Mode/Light Mode Switcher-->
                    <div class="form-check form-switch d-inline">
                    <input class="form-check-input" type="checkbox" id="modeSwitch">
                    </div>


                    <!--Nav Action Buttons-->
                    <a class="btn-balance btn-login d-lg-block hover-light-dark" href="#">€10.30 <div class="add-balance"><img src="assets/img/plus-d.svg" alt=""></div></a>

                    <div class="profile-area position-relative">
                    <img class="profile-img  options-toggle" src="assets/img/profile.png" alt="">

                    <div class="options-toggle-dropdown">
                        <ul>
                            <li class="dropdown-profile-item"><img style="width:28px;height:28px" src="assets/img/profile.png" alt="">
                                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                            </li>

                            <li style="border-bottom:unset !important"><a href="{{ url('/settings') }}"><img  style="filter: brightness(2.5);" src="assets/img/settings.svg" alt="">Settings</a></li>
                            <li><a href="{{ url('/support-ticket') }}"><img style="filter: brightness(2.5);" src="assets/img/messages.svg" alt="">Support Tickets</a></li>
                            <li>
                                <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><img src="assets/img/signout.svg" style="margin-right: 15px !important;margin-left: 3px;" alt="">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                    

                    </div>

                </div>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse col-12 col-md-6 col-sm-5 justify-content-center order-lg-2" id="navbarNav">
                    <ul class="navbar-nav justify-content-center mb-md-0">
                        <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="{{ url('/support-ticket') }}" class="nav-link">Tickets</a></li>
                        <li class="nav-item"><a href="{{ url('/servers') }}" class="nav-link active">Servers</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Invoices</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- footer -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

    <script>
        $( document ).ready(function() {
            $("#more-products-btn").click(function(){
                $("#more-products").slideToggle();
            })

            $('.icon-clipboard').click(function() {
                var element = $(this).closest("tr").find(".clipboard-input");
                var text = element.attr("data-copy");
                var tempInput = $('<input>');
                $('body').append(tempInput);
                    tempInput.val(text).select();
                    document.execCommand('copy');
                    tempInput.remove();
                    element.css("text-decoration","underline");
                    setTimeout(function(){
                        $(element).css("text-decoration","none");
                    }, 1000)

            });

            $(".icon-password").click(function(){

                let input = $(this).closest("tr").find("input");

                if(input.attr("type")=="password") {

                    input.attr("type","text");

                    $("img.eye-closed").hide();
                    $("img.eye-open").show();

                } else {

                    $("img.eye-closed").show();
                    $("img.eye-open").hide();
                    input.attr("type","password");
                }

            })

            $(".options-toggle").click(function(){
                $(this).siblings(".options-toggle-dropdown").toggle();
            })

            $(document).on('click',function(e){
                if(!(($(e.target).closest(".options-toggle").length > 0 ) || ($(e.target).closest(".options-toggle-dropdown").length > 0))){
                    $(".options-toggle-dropdown").hide();
                }
            });

            $(".toggle-more-detail").click(function(){
                $(this).siblings(".more-details-content").slideToggle();
            })

            $(".display-distributions").click(function(){
                let dist = $(this).attr("data-dist");
                $(".dist-tab[data-dist="+dist+"]").show();
                $(".dist-tab:not([data-dist="+dist+"])").hide();
            })


            $(".settings-password-img").click(function(){
                let input = $(this).siblings("input");
                if(input.attr("type")=="password") {
                    input.attr("type","text");
                    $("img.eye-closed").hide();
                    $("img.eye-open").show();
                } else {
                    $("img.eye-closed").show();
                    $("img.eye-open").hide();
                    input.attr("type","password");
                }
            })

            $("#create-ticket").click(function(){
                $(".modal").removeClass("hidden");
            })

            $(".modal-close").click(function(){
                $(".modal").addClass("hidden");
            })
        });  
    </script>   
</body>
</html>