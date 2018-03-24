<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | @yield('title')</title>

    <!-- Styles -->
    <link href="{{ URL::asset('css/impact/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/pe-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/style.css') }}" rel="stylesheet">
    <!-- Styles -->

    <!-- Javascript -->
    <script src="{{ URL::asset('js/impact/jquery.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('js/impact/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('js/impact/respond.min.js') }}"></script>
    <![endif]
    <!-- Javascript -->
    <link rel="shortcut icon" href="{{ URL::asset('images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('images/ico/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('images/ico/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('images/ico/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" href="{{ URL::asset('images/ico/apple-touch-icon-57x57.png') }}">

    <!--
    <script type="text/javascript">
        jQuery(document).ready(function($){
            'use strict';
            jQuery('body').backstretch([
                "images/bg/bg1.jpg",
                "images/bg/bg2.jpg",
                "images/bg/bg3.jpg"
            ], {duration: 5000, fade: 500, centeredY: true });

            $("#mapwrapper").gMap({ controls: false,
                scrollwheel: false,
                markers: [{
                    latitude:40.7566,
                    longitude: -73.9863,
                    icon: { image: "images/marker.png",
                        iconsize: [44,44],
                        iconanchor: [12,46],
                        infowindowanchor: [12, 0] } }],
                icon: {
                    image: "images/marker.png",
                    iconsize: [26, 46],
                    iconanchor: [12, 46],
                    infowindowanchor: [12, 0] },
                latitude:40.7566,
                longitude: -73.9863,
                zoom: 14 });
        });
    </script>
    -->
</head>
<body>
@section('navbar')
    <header class="navbar navbar-inverse navbar-fixed-top " role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html"><h1><span class="pe-7s-gleam bounce-in"></span> IMPACT</h1></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact-us.html">Contact</a></li>
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="project-item.html">Project Single</a></li>
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li class="active"><a href="404.html">404</a></li>
                        </ul>
                    </li>
                    <li><span class="search-trigger"><i class="fa fa-search"></i></span></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->
@show

<div class="container">
    @yield('content')
</div>

@section('footer')
    <div id="footer-wrapper">
        <section id="bottom" class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 about-us-widget">
                        <h4>Global Coverage</h4>
                        <p>Was drawing natural fat respect husband. An as noisy an offer drawn blush place. These tried for way joy wrote witty. In mr began music weeks after at begin.</p>
                    </div><!--/.col-md-3-->

                    <div class="col-md-3 col-sm-6">
                        <h4>Company</h4>
                        <div>
                            <ul class="arrow">
                                <li><a href="#">Company Overview</a></li>
                                <li><a href="#">Meet The Team</a></li>
                                <li><a href="#">Our Awesome Partners</a></li>
                                <li><a href="#">Our Services</a></li>
                            </ul>
                        </div>
                    </div><!--/.col-md-3-->

                    <div class="col-md-3 col-sm-6">
                        <h4>Latest Articles</h4>
                        <div>
                            <div class="media">
                                <div class="pull-left">
                                    <img class="widget-img" src="images/portfolio/folio01.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <span class="media-heading"><a href="#">Blog Post A</a></span>
                                    <small class="muted">Posted 14 April 2014</small>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img class="widget-img" src="images/portfolio/folio02.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <span class="media-heading"><a href="#">Blog Post B</a></span>
                                    <small class="muted">Posted 14 April 2014</small>
                                </div>
                            </div>
                        </div>
                    </div><!--/.col-md-3-->

                    <div class="col-md-3 col-sm-6">
                        <h4>Come See Us</h4>
                        <address>
                            <strong>Ace Towers</strong><br>
                            New York Ave,<br>
                            New York, 215648<br>
                            <abbr title="Phone"><i class="fa fa-phone"></i></abbr> 546 840654 05
                        </address>
                    </div> <!--/.col-md-3-->
                </div>
            </div>
        </section><!--/#bottom-->

        <footer id="footer" class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; 2014 <a target="_blank" href="http://www.distinctivethemes.com" title="Premium Themes and Templates">Distinctive Themes</a>. All Rights Reserved.
                    </div>
                    <div class="col-sm-6">
                        <ul class="pull-right">
                            <li><a id="gototop" class="gototop" href="#"><i class="fa fa-chevron-up"></i></a></li><!--#gototop-->
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->
    </div>


    <script src="{{ URL::asset('js/impact/plugins.js') }}"></script>
    <script src="{{ URL::asset('js/impact/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/impact/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWDPCiH080dNCTYC-uprmLOn2mt2BMSUk&amp;sensor=true"></script>
    <script src="{{ URL::asset('js/impact/init.js') }}"></script>
@show

</body>
</html>