<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="utf-8">
    <meta http-quiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index">
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel="apple-touch-icon" sizes="48x48" href="{{ route('index') }}/storage/assets/default/icon.png">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ route('index') }}/storage/assets/default/icon.png">
    <link rel="manifest" href="{{ route('index') }}/storage/assets/default/manifest.json">
    <link rel="shortcut-icon" href="{{ route('index') }}/storage/assets/default/comp-icon.png" type="image/jpg">
    <meta name="msapplication-TileColor" content="#202021">
    <meta name="msapplication-TileImage" content="/storage/assets/default/browserconfig.xml">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <meta name="theme-color" content="#cf0000"> -->
    <meta name="theme-color" content="#202021">
    <link href="{{ route('index') }}/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="{{ route('index') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <script src="{{ route('index') }}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ route('index') }}/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="{{ route('index') }}/js/bootstrap.js"></script>
    <script async="async" data-cfasync="false" src="//pl15966731.toprevenuecpmnetwork.com/6e8b26b3c0f4ef449a31fdbe848db62f/invoke.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom Theme files -->
    @yield('title')
   
</head>

<body style="word-wrap:break-word">
    
    @yield('heading')
    <!--  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0" nonce="QK0A0Zmz"></script> -->
    <!-- header-section-starts -->
    <div class="container">
        <div class="news-paper">
            <div class="header">
                <div class="header-left">
                    <div class="logo">
                        <a href="{{ route('index') }}" class="logo-link" style="display: flex;align-items: center;"
                            title="">
                            <img style="width: 70px;margin-right:1rem" class="img-responsive"
                                src="{{ route('index') }}/storage/assets/default/icon.png" alt="Newstractor Logo">
                            <h1>News<span>tractor</span></h1>
                        </a>
                    </div>
                </div>
                <div class="social-icons">
                    <li><a href="#" title=""><i class="twitter"></i></a></li>
                    <li><a href="#" title=""><i class="facebook"></i></a></li>
                    <li><a href="#" title=""><i class="rss"></i></a></li>
                    <li>
                        <div class="facebook">
                            <div id="fb-root"></div>

                            <div id="fb-root"></div>
                        </div>
                    </li>
                    <br>
                    <br>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>

                    <div class="fb-like" data-href="https://facebook.com/solutionsacademy2020" data-layout="button_count"
                        data-action="like" data-show-faces="true" data-share="false"></div>
                        
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="header-right">
                    <div class="top-menu">
                        <ul>
                            {{-- <li><a href="{{ route('index') }}" title="">Home</a></li> | --}}
                            <li><a href="{{ route('about') }}" title="">About Us</a></li> |
                            <li><a href="{{ route('contact') }}" title="">Contact Us</a></li> |

                            @auth
                            @if(\App\Custom::checkNotification())
<script type="text/javascript">setTimeout(function(){alert('You have an unread notification!')}, 10000)</script>
@endif
                            @if(auth()->user()->admin())
                            <li><a href="{{ route('index') }}/post/new" title="">Add Post</a></li> |
                            @endif
                            <li><a href="{{ route('notification') }}" title="">Notification</a></li> |
                            <li><a href="{{ route('index') }}/profile/{{ Auth::user()->username ?? auth()->user()->id}}"
                                    title="">Profile</a></li>|
                            @else
                            <li><a id="modal_trigger" href="#modal" class="btn1" title="">{{ __('Login/SignUp') }}</a></li>|
                            @endauth
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>


                            <div id="modal" class="popupContainer" style="display:none;">
                                <header class="popupHeader">
                                    <span class="header_title">Login</span>
                                    <span class="modal_close">&times;</i></span>
                                </header>

                                <section class="popupBody">
                                    <!-- Social Login -->
                                    <div class="social_login">
                                        <div class="">
                                            <a href="#" class="social_box fb" title="">
                                                <span class="icon"><i class="fa fa-facebook"></i></span>
                                                <span class="icon_title">Connect with Facebook</span>

                                            </a>
                                            <!-- <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true" data-width=""></div> -->

                                            <a href="#" class="social_box google" title="">
                                                <span class="icon"><i class="fa fa-google-plus"></i></span>
                                                <span class="icon_title">Connect with Google</span>
                                            </a>
                                        </div>

                                        <div class="centeredText">
                                            <span>Or use your Email address</span>
                                        </div>

                                        <div class="action_btns">
                                            <div class="one_half"><a href="#" id="login_form" class="btn">Login</a>
                                            </div>
                                            <div class="one_half last"><a href="#" id="register_form" class="btn"
                                                    title="">Sign
                                                    up</a></div>
                                        </div>
                                    </div>




                                    <!-- Username & Password Login form -->
                                    <div class="user_login">
                                        <form id="login-form" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <label>Email Address</label>
                                            <input type="email" class="@error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" autocomplete="on" />
                                            <span id="login-email" class="has-error text-center"></span>
                                            @error('email')
                                            <span class="erra has-error text-center">{{ $message }}</span>
                                            @enderror
                                            <br />

                                            <label>Password</label>
                                            <input type="password" class="@error('password') is-invalid @enderror"
                                                name="password" value="{{ old('password') }}" autocomplete="on" />
                                            <span id="login-password" class="has-error text-center"></span>
                                            @error('password')
                                            <span class="errb has-error text-center">{{ $message }}</span>
                                            @enderror
                                            <br />

                                            <div>
                                                <input type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>

                                                <label for="remember"
                                                    style="user-select: none; font-weight: lighter;">Remember me on this
                                                    browser</label>

                                                <input type="submit" style="width: 0px; height:0px; opacity:0;">
                                            </div>

                                            <div class="action_btns">
                                                <div class="one_half"><a href="#" class="btn back_btn"><i
                                                            class="fa fa-angle-double-left"></i> Back</a></div>
                                                <div class="one_half last"><a id="login-btn" href="#"
                                                        class="btn btn_red" title="">Login</a>
                                                </div>
                                            </div>
                                            <script>
                                                $('#login-btn').click(function (e) {
                                                    e.preventDefault();
                                                    $('#login-form').submit();
                                                });
                                            </script>
                                        </form>
                                        <a class="forgot_password" href="{{ route('index') }}/password/email" title="">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                    <!-- // Username & Password Login form -->





                                    <!-- Register Form -->
                                    <div class="user_register">
                                        <form id="register-form" method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <label>Full Name</label>
                                            <input id="name-reg" type="text" class="@error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" autocomplete="on" />
                                            <span id="reg-name" class="has-error text-center"></span>
                                            @error('name')
                                            <span class="err2a has-error text-center">{{ $message }}</span>
                                            @enderror
                                            <br />

                                            <label>Email Address</label>
                                            <input id="email-reg" type="email"
                                                class="@error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" autocomplete="on" />
                                            <span id="reg-email" class="has-error text-center"></span>
                                            @error('email')
                                            <span class="err2b has-error text-center">{{ $message }}</span>
                                            @enderror
                                            <br />

                                            <label>Password</label>
                                            <input id="password-reg" type="password"
                                                class="@error('password') is-invalid @enderror" name="password"
                                                value="{{ old('password') }}" autocomplete="on" />
                                            <span id="reg-password" class="has-error text-center"></span>
                                            @error('password')
                                            <span class="err2c has-error text-center">{{ $message }}</span>
                                            @enderror
                                            <br />

                                            <div class="checkbox">
                                                <!--<input id="send_updates" type="checkbox" />
                                                    <label for="send_updates">Send me occasional email updates</label>-->
                                            </div>
                                            <input type="submit" style="width: 0px; height:0px; opacity:0;">
                                            <div class="action_btns">
                                                <div class="one_half"><a href="#" class="btn back_btn" title=""><i
                                                            class="fa fa-angle-double-left"></i> Back</a></div>
                                                <div class="one_half last"><a id="reg-btn" href="#" class="btn btn_red"
                                                        title="">Register</a></div>
                                                <script>
                                                    $('#reg-btn').click(function (e) {
                                                        e.preventDefault();
                                                        $('#register-form').submit();
                                                    });
                                                </script>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- // Register form -->
                                </section>
                            </div>

                            <script type="text/javascript">
                                $("#modal_trigger").leanModal({ top: 200, overlay: 0.6, closeButton: ".modal_close" });

                                $(function () {
                                    // Calling Login Form
                                    $("#login_form").click(function () {
                                        $(".social_login").hide();
                                        $(".user_login").show();
                                        return false;
                                    });

                                    // Calling Register Form
                                    $("#register_form").click(function () {
                                        $(".social_login").hide();
                                        $(".user_register").show();
                                        $(".header_title").text('Register');
                                        return false;
                                    });

                                    // Going back to Social Forms
                                    $(".back_btn").click(function () {
                                        $(".user_login").hide();
                                        $(".user_register").hide();
                                        $(".social_login").show();
                                        $(".header_title").text('Login');
                                        return false;
                                    });

                                })
                            </script>
                            <!-- </li> | -->
                            <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog1" title="">Subscribe</a>
                            </li>
                        </ul>
                    </div>
                    <!---pop-up-box---->
                    <link href="{{ route('index') }}/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
                    <script src="{{ route('index') }}/js/jquery.magnific-popup.js" type="text/javascript"></script>
                    <!---//pop-up-box---->
                    
                        <div id="small-dialog1" class="mfp-hide">
                            <div class="signup">
                                <h3>Subscribe</h3>
                                <h4>Enter Your Valid E-mail</h4>
                                <form action="{{ route('index') }}/subscribe" method="GET">
                                    <input type="text" required name="email" disabled="true"/>
                                    <div class="clearfix"></div>
                                    <input type="submit" value="Subscribe Now" disabled="true"/>
                                </form>
                            </div>
                        </div>
                    

                    <script>
                        $(document).ready(function () {
                            $('.popup-with-zoom-anim').magnificPopup({
                                type: 'inline',
                                fixedContentPos: false,
                                fixedBgPos: true,
                                overflowY: 'auto',
                                closeBtnInside: true,
                                preloader: false,
                                midClick: true,
                                removalDelay: 300,
                                mainClass: 'my-mfp-zoom-in'
                            });

                        });
                    </script>
                    <div class="search">
                        <form action="/search" method="GET" autocomplete="off">
                            <input name="q" type="text" value="Search" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'Search';}" />
                            <input type="submit" value="">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <span class="menu"></span>
            <div class="menu-strip">
                <ul style="text-align: center">
                    <li><a href="{{ route('index') }}" title="">Popular</a></li>
                    <li><a href="{{ route('sports') }}" title="">sports</a></li>
                    <li><a href="{{ route('tech') }}" title="">Sci/Tech</a></li>
                    <li><a href="{{ route('business') }}" title="">business</a></li>
                    <li><a href="{{ route('gist') }}" title="">Gist/Gossip</a></li>
                    <li><a href="{{ route('entertainment') }}" title="">entertainment</a></li>
                    <li><a href="{{ route('campus') }}" title="">CampusNews</a></li>
                    <li><a href="{{ route('politics') }}" title="">Politics</a></li>
                    <li><a href="{{ route('blogs') }}" title="">blogs</a></li>
                </ul>

            </div>
            <!-- script for menu -->
            <script>
                $("span.menu").click(function () {
                    $(".menu-strip").slideToggle("slow", function () {
                        // Animation complete.
                    });
                });
            </script>
            <!-- script for menu -->
            <div class="clearfix"></div>



            @yield('content')

            <h3 style="border:1px dotted black" class="text-center">Ads</h3>
            <div id="container-6e8b26b3c0f4ef449a31fdbe848db62f"></div>
            <div class="footer text-center">
                <div class="text-center" style="padding: 2rem;">
                    <center>
                        <img style="width: 70px;" src="{{ route('index') }}/storage/assets/default/logo.png" alt="Newstractor Logo"
                            class="img-responsive">
                    </center>
                </div>
                <div class="bottom-menu">
                    <ul>
                        <li><a href="{{ route('index') }}" title="">Popular</a></li>|
                        <li><a href="{{ route('sports') }}" title="">Sports</a></li>|
                        <li><a href="{{ route('tech') }}" title="">Sci/Tech</a></li>|
                        <li><a href="{{ route('business') }}" title="">Business</a></li>|
                        <li><a href="{{ route('gist') }}" title="">Gist/Gossip</a></li>|
                        <li><a href="{{ route('entertainment') }}" title="">Entertainment</a></li>|
                        <li><a href="{{ route('campus') }}" title="">Campus News</a></li>|
                        <li><a href="{{ route('politics') }}" title="">Politics</a></li>|
                        <li><a href="{{ route('blogs') }}" title="">Blogs</a></li>|
                        @auth
                        <li><a title="" id="logout" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a></li>|
                        @endauth
                    </ul>
                </div>
                <div class="copyright text-center">
                    <p>Newstractor &copy; 2020 -
                        <script>document.write(new Date().getFullYear())</script> All rights reserved </p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#login-form').submit(function (e) {
            e.preventDefault();
            var docUrl, uri;
            docUrl = document.URL;
            uri = docUrl.split('#');
            uri = uri[0];
            $('#login-btn').attr('disabled', 'true');
            xhr = new XMLHttpRequest();
            xhr.open('POST', "{{ route('login') }}", true);
            xhr.onload = function () {
                if (this.status == 200) {

                    if (this.responseURL == uri) {
                        var text, parser, doc, r1, r2;
                        text = this.responseText;
                        parser = new DOMParser();
                        doc = parser.parseFromString(text, 'text/html');
                        r1 = doc.getElementsByClassName('erra')[0];
                        r2 = doc.getElementsByClassName('errb')[0];

                        if (r1 != undefined) {
                            $('#login-email').html(r1.innerHTML);
                        }
                        if (r2 != undefined) {
                            $('#login-password').html(r2.innerHTML);
                        }

                    } else {
                        window.location.href = (document.URL).split('#')[0];
                    }

                }
            }
            xhr.onloadend = function () {
                $('#login-btn').removeAttr('disabled');
            }
            xhr.send(new FormData(this));

        });

         $('#register-form').submit(function (e) {
            e.preventDefault();
            $('#reg-btn').attr('disabled', 'true');
            var input1 = document.getElementById('name-reg').value;
            var input2 = document.getElementById('email-reg').value;
            var input3 = document.getElementById('password-reg').value;
            var params = 'name=' + input1 + '&email=' + input2 + '&password=' + input3;
            var docUrl, url;
            docUrl = document.URL;
            url = docUrl.split('#');
            url = url[0];
            xhr = new XMLHttpRequest();
            xhr.open('POST', "{{ route('register') }}", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            xhr.onload = function () {
                if (this.status == 200) {
                    if (this.responseURL == url) {
                        var text, parser, doc, r1, r2, r3;
                        text = this.responseText;
                        parser = new DOMParser();
                        doc = parser.parseFromString(text, 'text/html');
                        r1 = doc.getElementsByClassName('err2a')[0];
                        r2 = doc.getElementsByClassName('err2b')[0];
                        r3 = doc.getElementsByClassName('err2c')[0];

                        if (r1 != undefined) {
                            $('#reg-name').html(r1.innerHTML);
                        }
                        if (r2 != undefined) {
                            $('#reg-email').html(r2.innerHTML);
                        }
                        if (r3 != undefined) {
                            $('#reg-password').html(r3.innerHTML);
                        }
                    } else {
                        window.location.href = (document.URL).split('#')[0];
                    }
                }

            }
            xhr.onloadend = function () {
                $('#reg-btn').removeAttr('disabled');
            }
            xhr.send(params);
        }); 
    </script>
    <script>
        $('img').contextmenu(function () {
            return false;
        })
    </script>
    
</body>

</html>