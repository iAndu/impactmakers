<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>404 | Not found</title>

    <link href="{{ URL::asset('css/impact/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/pe-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/reset.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/shCore.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/impact/shThemeDefault.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('js/impact/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/impact/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('js/impact/jquery.localscroll-1.2.7-min.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="../../public/js/impact/html5shiv.js"></script>
    <script src="../../public/js/impact/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../../public/images/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="../../public/images/ico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../public/images/ico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../public/images/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" href="../../public/images/ico/apple-touch-icon-57x57.png">

    <script type="text/javascript">
        jQuery(document).ready(function($){
            'use strict';
            jQuery('body').backstretch([
                "images/bg/bg-robotics-404.jpg",
                "images/bg/bg-robotics-404.jpg",
                "images/bg/bg-robotics-404.jpg"
            ], {duration: 5000, fade: 500, centeredY: true });
        });
    </script>
</head><!--/head-->
<body>
<div id="preloader"></div>
<header class="navbar navbar-inverse navbar-fixed-top " role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}"><h1><span class="pe-7s-gleam bounce-in"></span> IMPACT Makers</h1></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="#about-us" class="smoothScroll">About Us</a></li>
                <li><a href="#mapView" class="smoothScroll">Map</a></li>
                <li><a href="#create" class="smoothScroll">Create</a></li>
                <li><a href="#contact-us" class="smoothScroll">Contact</a></li>
                <li><a href="#login" class="smoothScroll">Login</a></li>
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

<section id="main-slider" class="no-margin">
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content center centered">
                                <span class="home-icon pe-7s-gleam bounce-in"></span>
                                <h2 class="boxed animation animated-item-1 fade-down">UH OH, A 404 ERROR</h2>
                                <p class="boxed animation animated-item-2 fade-up">The Page you are looking for doesn't exist or an other error occurred. Head home to try again.</p>
                                <br>
                                <a class="btn btn-md animation bounce-in" href="{{ route('index') }}">Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
</section><!--/#main-slider-->

<script src="../../js/impact/bootstrap.min.js"></script>
<script src="../../js/impact/jquery.prettyPhoto.js"></script>
<script src="../../js/impact/plugins.js"></script>
<script src="../../js/impact/init.js"></script>
</body>
</html>