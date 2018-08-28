<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icons/favicon.png" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/antonio-exotic/stylesheet.css')}}"> {{--
    <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <title>@yield('title')</title>
   

    <!-- Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/lightbox-plus-jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/instafeed.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/custom.js')}}" type="text/javascript"></script>
</head>

<body>
    <div id="page">
        <!---header top---->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <!-- Adresa top bar levo -->
                    <div class="col-md-6">
                        <a href="#"> </a>
                        <div class="info-block">
                            <i class="fa fa-map" style="padding:15px"></i>601 E 54th St, New York City, New York, 10000. Email: info@specterlitt.biz</div>
                    </div>
                    <!-- user menu -->
                    <div class="col-md-6">
                        <div class="social-grid">
                            <div class="row pull-right">
                                    <ul class="nav navbar-nav navbar-right">
                                            <li>
                                                <a href="{{ route('product.shoppingCart') }}">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                                                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                                </a>
                                            </li>
                                                    @if(Auth::check())
                                                        @if(Auth::user()->isAdmin())
                                                        <li><a href="/admin">Admin panel</a></li>
                                                        @else
                                                        <li><a href="{{ route('user.profile') }}">User Profile</a></li>
                                                        @endif
                                                        <li role="separator" class="divider"></li>
                                                        <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                                    @else
                                                        <li><a href="{{ route('user.signup') }}">Sign up</a></li>
                                                        <li><a href="{{ route('user.signin') }}">Sign in</a></li>
                                                    @endif
                                    </ul>
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header-->
        <header class="header-container">
            <div class="container">
                <div class="top-row">
                    <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <div id="logo">
                                <a href="/">
                                    <img src="{{url('/images/logo.jpg')}}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12 remove-padd">
                            <nav class="navbar navbar-default">
                                <div class="navbar-header page-scroll">
                                    <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                        <span class="sr-only">Otvori meni.</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>

                                </div>
                                <br>
                                <div class="collapse navigation navbar-collapse navbar-ex1-collapse remove-space">
                                    <ul class="list-unstyled nav1 cl-effect-10">
                                        <li>
                                            <a data-hover="Home" class="{{ Request::path() == '/' ? 'active' : '' }}" href="/">
                                                <span>Home</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-hover="About us" class="{{ Request::path() == 'about-us' ? 'active' : '' }}" href="/about-us">
                                                <span>About us</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-hover="Shop" class="{{ Request::path() == 'shop' ? 'active' : '' }}" href="/shop">
                                                <span>Shop</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-hover="News" class="{{ Request::path() == 'news' ? 'active' : '' }}" href="/news">
                                                <span>News</span>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a data-hover="Contact" class="{{ Request::path() == 'contact' ? 'active' : '' }}" href="/contact">
                                                <span>Contact</span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!--CONTENT -->
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
       


        <!---footer-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 width-set-60">
                        <div class="footer-details" style="width:100%">
                            <h4>Information</h4>
                            <ul class="list-unstyled footer-contact-list">
                                <li>
                                    <i class="fa fa-map-marker fa-lg"></i>
                                    <p>601 E 54th St, New York City, New York, 10000</p>
                                </li>
                                <li>
                                    <i class="fa fa-user"></i>
                                    <p><b>MANAGING PARTNERS:</b><br>
                                        Harvey Specter<br>
                                        Louis Litt<br>
                                        <b>SENIOR PARTNERS:</b><br>
                                        Mike Ross<br>
                                        Donna Paulsen
                                    </p>
                                </li>
                                
                                <li>
                                    <i class="fa fa-envelope-o fa-lg"></i>
                                    <p>
                                        <a href="mailto:info@specterlitt.biz"> info@specterlitt.biz</a>
                                    </p>
                                </li>
                            </ul>
                            <!--  IKONICE DRUSTVENE MREZE / trenutno nepotrebno -->
                            <div class="footer-social-icon">
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-twitter"></i></a>                           
                                                <a href="#"><i class="fa fa-instagram"></i></a>
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 width-50 width-set-50">
                        <div class="footer-details">
                            <h4>Menu</h4>
                            <ul class="list-unstyled footer-links">
                                <li class="{{ Request::path() == '/' ? 'active' : '' }}">
                                    <a href="/">Home</a>
                                </li>
                                <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}">
                                    <a href="/about-us">About us</a>
                                </li>
                                <li class="{{ Request::path() == 'shop' ? 'active' : '' }}">
                                    <a href="/shop">Shop</a>
                                </li>
                                <li class="{{ Request::path() == 'news' ? 'active' : '' }}">
                                    <a href="/news">News</a>
                                </li>
                                <li class="{{ Request::path() == 'contact' ? 'active' : '' }}">
                                    <a href="/contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="footer-details">
                            <h4>Our location</h4>
                            <div class="row">
                                    <div style="width: 100%"><iframe width="500px" height="300px" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=601%20E%2054th%20St%2C%20New%20York%20City%2C%20New%20York%2C%2010000+()&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Google map generator</a></iframe></div><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background-color: #00A859; height: 50px;" class="copyright">
                <br> Specter Litt ltd. &copy; 2018 All rights reserved. Developed by:
                <a href="mailto:andrej.kastratovic@gmail.com">AK.</a>
            </div>
        </footer>
        <!--back to top-->
        <a style="display: none;" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
            <span>
                <i aria-hidden="true" class="fa fa-angle-up fa-lg"></i>
            </span>
            <span>vrh</span>
        </a>

    </div>

</body>

</html>
