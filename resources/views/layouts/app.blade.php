<!doctype html>
<html lang="en" data-theme="light">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dark-theme.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-href.png') }}">

    <!-- Add Bootstrap CSS -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    
    <!--  Select2 CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/8de0481deb.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    <title>CrazyRDP</title>
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
    <div id="app">
        
        @auth
        <header class="border-bottom sticky-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container d-flex flex-wrap align-items-center justify-content-between  py-3">

                    <a href="/home" class="logo-wrapper d-flex align-items-center col-md-2 text-dark text-decoration-none order-lg-1">
                        <img class="logo-dark" src="{{asset('assets/img/crazy-rdp-logo.svg')}}" alt="">
                        <img class="logo-light" src="{{asset('assets/img/logo-light.svg')}}" alt="">

                    </a>

                    <div class="col-md-4 d-flex align-items-center justify-content-end order-lg-3">



                        <!-- Dark Mode/Light Mode Switcher-->
                        <div class="form-check form-switch d-inline">
                            <input class="form-check-input" type="checkbox" id="modeSwitch">
                        </div>


                        <!--Nav Action Buttons-->
                        <a class="btn-balance btn-login d-lg-block hover-light-dark" href="{{ url('/balance') }}">
                            @if(Auth::user()->currency_code == 'USD')
                            ${{ Auth::user()->credit }}
                            @elseif(Auth::user()->currency_code == 'EUR')
                            €{{ Auth::user()->credit }}
                            @else
                            {{ Auth::user()->credit }} {{ Auth::user()->currency_code }}
                            @endif
                            <div class="add-balance"><img src="{{asset('assets/img/plus-d.svg')}}" alt=""></div>
                        </a>

                        <div class="profile-area position-relative">
                            <img class="profile-img  options-toggle" src="{{asset('assets/img/profile.png')}}" alt="">

                            <div class="options-toggle-dropdown">
                                <ul>
                                    <li class="dropdown-profile-item"><img style="width:28px;height:28px" src="{{asset('assets/img/profile.png')}}" alt="">
                                        {{ Auth::user()->originUserData['firstname'] }}
                                    </li>

                                    <li style="border-bottom:unset !important"><a href="{{ url('/settings') }}"><img style="filter: brightness(2.5);" src="{{asset('assets/img/settings.svg')}}" alt="">Settings</a></li>
                                    @if(Auth::user()->originUserData['clients'] && count( Auth::user()->originUserData['clients']) > 1)
                                        <li><a href="{{ url('/switch-account') }}"><img style="filter: brightness(2.5); width: 18px; " src="{{asset('assets/img/switch_account.png')}}" alt="">Switch Account</a></li>
                                    @endif
                                    <li><a href="{{ url('/support-ticket') }}"><img style="filter: brightness(2.5);" src="{{asset('assets/img/messages.svg')}}" alt="">Support Tickets</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><img src="{{asset('assets/img/signout.svg')}}" style="margin-right: 15px !important;margin-left: 3px;" alt="">
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
                            <li class="nav-item"><a href="{{ url('/servers') }}" class="nav-link">Servers</a></li>
                            <li class="nav-item"><a href="{{ url('/balance') }}" class="nav-link">Invoices</a></li>
                        </ul>
                    </div>
            </nav>
        </header>
        @endauth

        <main class="py-4">
            <div aria-live="polite" aria-atomic="true" style="position: fixed;bottom:0; right:0;">
                <div class="toast-container" style="position: fixed; bottom: 30px; right: 30px;">
                    <!-- Toasts will be added here -->
                </div>
            </div>
            @yield('content')
            @yield('script')
        </main>
    </div>


    <!-- SELECT2 JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

    <!-- Add jQuery and Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script>
        let Window;// this window is the window where all components can access

        function windowClose() {
            if (Window && !Window.closed) {
                Window.close();
            }
        }

        function showToast(title, message, type = 'info') {
            let toast = $(`
                <div class="toast toast-${type}" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                    <div class="toast-header">
                        <strong class="mr-auto">${title}</strong>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            `);

            $('.toast-container').append(toast);
            toast.toast('show');
        }


        $(document).ready(function() {
            // display loading icon when fetch data from backend
            $('form').submit(function() {
                $('#loading-bg').css('display', 'flex');
            });

            $("#more-products-btn").click(function() {
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
                element.css("text-decoration", "underline");
                setTimeout(function() {
                    $(element).css("text-decoration", "none");
                }, 1000)

            });

            $(".icon-password").click(function() {

                let input = $(this).closest("tr").find("input");

                if (input.attr("type") == "password") {

                    input.attr("type", "text");

                    $("img.eye-closed").hide();
                    $("img.eye-open").show();

                } else {

                    $("img.eye-closed").show();
                    $("img.eye-open").hide();
                    input.attr("type", "password");
                }

            })

            $(".options-toggle").click(function() {
                $(this).siblings(".options-toggle-dropdown").toggle();
            })

            $(document).on('click', function(e) {
                if (!(($(e.target).closest(".options-toggle").length > 0) || ($(e.target).closest(".options-toggle-dropdown").length > 0))) {
                    $(".options-toggle-dropdown").hide();
                }
            });

            $(".toggle-more-detail").click(function() {
                $(this).siblings(".more-details-content").slideToggle();
            })

            $(".display-distributions").click(function() {
                let dist = $(this).attr("data-dist");
                $(".dist-tab[data-dist=" + dist + "]").show();
                $(".dist-tab:not([data-dist=" + dist + "])").hide();
            })


            $(".settings-password-img").click(function() {
                let input = $(this).siblings("input");
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                    $("img.eye-closed").hide();
                    $("img.eye-open").show();
                } else {
                    $("img.eye-closed").show();
                    $("img.eye-open").hide();
                    input.attr("type", "password");
                }
            })

        });
    </script>
</body>

</html>