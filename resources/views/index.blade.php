<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Impact By Distinctive Themes</title>
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

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #mapwrapper {
          height: 700px;
      }

      #map {
        height: 100%;
      }
    </style>

    <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

    <script type="text/javascript">
        jQuery(document).ready(function($){
            'use strict';
            jQuery('body').backstretch([
                "images/bg/bg-robotics-1.jpg",
                "images/bg/bg-robotics-2.jpg",
                "images/bg/bg-robotics-3.jpg"
            ], {duration: 5000, fade: 500, centeredY: true });

        });
    </script>
    <script>
      var map;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng(44.430575, 26.100955),
          mapTypeId: 'roadmap'
        });

        var open_infowindow;

        //Create markers
        @foreach($institutions as $institution)
            var marker = new google.maps.Marker({
            position: new google.maps.LatLng({{ $institution->lat }} , {{ $institution->lng }}),
            
            icon: '{{ $institution->type->icon->path }}',
            map: map
          });

            google.maps.event.addListener(marker, 'mouseover', function() {
                    //var aux = Object.assign({}, marker);  
              
              let contentString = '<div class="row"><div class="col-xs-3"> <img src=' + '{{ $institution->photos->first()->path }}' + ' height="60" width="60"> </div>';

              contentString += '<div class="col-xs-9"> <b>' + '{{ $institution->name }}' + '</b>';

              short_des = '{{ $institution->short_description }}';
              
              short_des += new Array(30 - short_des.length).join(' ');
              contentString += '<p>' + short_des;
              /*if('{{ $institution->email }}' != '')
                contentString += '<p> {{ $institution->email }}';
              if('{{ $institution->fb_page }}' != '')
                contentString += '<p> {{ $institution->fb_page }}';
              if('{{ $institution->twitter_page }}' != '')
                contentString += '<p> {{ $institution->twitter_page }}';
              if('{{ $institution->ig_page }}' != '')
                contentString += '<p> {{ $institution->ig_page }}';
              if('{{ $institution->description }}' != '')
                contentString += '<p> {{ $institution->description }}';
              if('{{ $institution->ratio }}' != '')
                contentString += '<p> {{ $institution->ratio }}';
              if('{{ $institution->website }}' != '')
                contentString += '<p> {{ $institution->website }}';*/

                contentString += '</div></div>';

              let infowindow = new google.maps.InfoWindow({
                content: contentString
              });

              if(open_infowindow)
                open_infowindow.close();

              infowindow.open(map, this);

              open_infowindow = infowindow;
            });

            google.maps.event.addListener(marker, 'click', function() {
                $("#myModal").modal();
            });

            google.maps.event.addListener(marker, 'mouseout', function() {
                open_infowindow.close();
            });

          
        @endforeach
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI2EpvQc_HdFPc12TQTigdfE61gdjkEM8  &callback=initMap">
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
            <a class="navbar-brand" href="index.html"><h1><span class="pe-7s-gleam bounce-in"></span> IMPACT</h1></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="smoothScroll gototop">Home</a></li>
                <li><a href="#about-us" class="smoothScroll">About Us</a></li>
                <li><a href="#map" class="smoothScroll">Map</a></li>
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
                                <h2 class="boxed animation animated-item-1 fade-down">Robots connecting the world</h2>
                                <div class="clearifx"></div>
                                <p class="boxed animation animated-item-2 fade-up">Diversity. Equality. Spread the knowledge. Grow.</p>
                                <br>
                                <a class="btn btn-md animation bounce-in" href="#services">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
</section><!--/#main-slider-->

<div id="content-wrapper">
    <section id="services" class="white">
        <div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="center gap fade-down section-heading">
                        <h2 class="main-title">Things You Can Do</h2>
                        <hr>
                        <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="service-block">
                        <div class="pull-left bounce-in">
                            <i class="fa fa-globe fa fa-md"></i>
                        </div>
                        <div class="media-body fade-up">
                            <h3 class="media-heading">Map</h3>
                            <p>Check the map to see the registered robotics-related entities.</p>
                        </div>
                    </div>
                </div><!--/.col-md-6-->
                <div class="col-md-6 col-sm-6">
                    <div class="service-block">
                        <div class="pull-left bounce-in">
                            <i class="fa fa-plus-square fa fa-md"></i>
                        </div>
                        <div class="media-body fade-up">
                            <h3 class="media-heading">Create</h3>
                            <p>Register an institution through a quick form.</p>
                        </div>
                    </div>
                </div><!--/.col-md-6-->
            </div><!--/.row-->
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="service-block">
                        <div class="pull-left bounce-in">
                            <i class="fa fa-calendar fa fa-md"></i>
                        </div>
                        <div class="media-body fade-up">
                            <h3 class="media-heading">Events</h3>
                            <p>See upcoming robotics-related events & sign up for them.</p>
                        </div>
                    </div>
                </div><!--/.col-md-6-->
                <div class="col-md-6 col-sm-6">
                    <div class="service-block">
                        <div class="pull-left bounce-in">
                            <i class="fa fa-star fa fa-md"></i>
                        </div>
                        <div class="media-body fade-up">
                            <h3 class="media-heading">Feedback</h3>
                            <p>Offer feedbacks</p>
                        </div>
                    </div>
                </div><!--/.col-md-6-->
            </div><!--/.row-->
        </div>
        <div class="gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="center gap fade-down section-heading">
                        <h2 class="main-title">Our Skills</h2>
                        <hr>
                        <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="tile-progress tile-red bounce-in">
                        <div class="tile-header">
                            <h3>Video Editing</h3>
                            <span>Our cutting room floor is messy.</span>
                        </div>
                        <div class="tile-progressbar">
                            <span data-fill="65.5%" style="width: 65.5%;"></span>
                        </div>
                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter counter">65.5</span>%
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tile-progress tile-cyan bounce-in">
                        <div class="tile-header">
                            <h3>Marketing</h3>
                            <span>How well we can sell you and your brand.</span>
                        </div>
                        <div class="tile-progressbar">
                            <span data-fill="98.5%" style="width: 98.5%;"></span>
                        </div>
                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter counter">98.5</span>%
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tile-progress tile-primary bounce-in">
                        <div class="tile-header">
                            <h3>Web Development</h3>
                            <span>We love servers and stuff.</span>
                        </div>
                        <div class="tile-progressbar">
                            <span data-fill="90%" style="width: 90%;"></span>
                        </div>
                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter counter">90</span>%
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tile-progress tile-pink bounce-in">
                        <div class="tile-header">
                            <h3>Coffee</h3>
                            <span>We done make good joe, though.</span>
                        </div>
                        <div class="tile-progressbar">
                            <span data-fill="10%" style="width: 10%;"></span>
                        </div>
                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter counter">10</span>%
                            </h4>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
            <div class="gap"></div>
        </div>
    </section>

    <section id="mapView" class="white">
        <div id="mapwrapper">
            <div id="map"></div>
        </div>
    </section>

    <section id="single-quote" class="divider-section">
        <div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class='col-md-offset-2 col-md-8 fade-up'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-responsive" src="images/quote/isaac-asimov.jpg" style="width: 100px;height:100px;">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>The Three Laws of Robotics:</p>
                                            <div>
                                                1: A robot may not injure a human being or, through inaction, allow a human being to come to harm;
                                            </div>
                                            <div>
                                                2: A robot must obey the orders given it by human beings except where such orders would conflict with the First Law;
                                            </div>
                                            <div>
                                                3: A robot must protect its own existence as long as such protection does not conflict with the First or Second Law;
                                            </div>
                                            <div>
                                                The Zeroth Law: A robot may not harm humanity, or, by inaction, allow humanity to come to harm.
                                            </div>
                                            <small>Isaac Asimov, I, Robot</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>
    </section>

    <section id="about-us" class="white">
        <div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="center gap fade-down section-heading">
                        <h2 class="main-title">A Little About Us</h2>
                        <hr>
                        <p><strong>E-Civis</strong> : <a href="http://e-civis.eu/" target="_blank">our website</a></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 fade-up">
                    <p class="text-center">We're a NGO called E-Civis, based in Romania. Our mission is to promote democratic values
                    at a global level.</p>
                </div>
                <div class="col-md-4 fade-up">

                </div>
            </div>
            <div class="gap"></div>
            <div class="gap"></div>
            <div class="center gap fade-down section-heading">
                <h2 class="main-title">Meet The Team</h2>
                <hr>
                <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
            </div>
            <div class="gap"></div>

            <div id="meet-the-team" class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="center team-member">
                        <div class="team-image">
                            <img class="img-responsive img-thumbnail bounce-in" src="images/team/team01.jpg" alt="">
                            <div class="overlay">
                                <a class="preview btn btn-outlined btn-primary" href="images/team/team01.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="team-content fade-up">
                            <h5>Daniel Jones<small class="role muted">Web Design</small></h5>
                            <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                            <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="fa fa-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="fa fa-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="center team-member">
                        <div class="team-image">
                            <img class="img-responsive img-thumbnail bounce-in" src="images/team/team02.jpg" alt="">
                            <div class="overlay">
                                <a class="preview btn btn-outlined btn-primary" href="images/team/team02.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="team-content fade-up">
                            <h5>John Smith<small class="role muted">Marketing Director</small></h5>
                            <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                            <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="fa fa-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="fa fa-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center team-member">
                        <div class="team-image">
                            <img class="img-responsive img-thumbnail bounce-in" src="images/team/team03.jpg" alt="">
                            <div class="overlay">
                                <a class="preview btn btn-outlined btn-primary" href="images/team/team03.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="team-content fade-up">
                            <h5>Dave Gorman<small class="role muted">Web Design</small></h5>
                            <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                            <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="fa fa-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="fa fa-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center team-member">
                        <div class="team-image">
                            <img class="img-responsive img-thumbnail bounce-in" src="images/team/team04.jpg" alt="">
                            <div class="overlay">
                                <a class="preview btn btn-outlined btn-primary" href="images/team/team04.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="team-content fade-up">
                            <h5>Steve Smith<small class="role muted">Sales Assistant</small></h5>
                            <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                            <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="fa fa-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="fa fa-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--/#meet-the-team-->
            <div class="gap"></div>
            <div class="gap"></div>
        </div>
    </section>

    <section id="stats" class="divider-section">
        <div class="gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="center bounce-in">
                        <span class="stat-icon"><span class="pe-7s-timer bounce-in"></span></span>
                        <h1><span class="counter">246000</span></h1>
                        <h3>HOURS SAVED</h3>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center bounce-in">
                        <span class="stat-icon"><span class="pe-7s-light bounce-in"></span></span>
                        <h1><span class="counter">16875</span></h1>
                        <h3>FRESH IDEAS</h3>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center bounce-in">
                        <span class="stat-icon"><span class="pe-7s-graph1 bounce-in"></span></span>
                        <h1><span class="counter">99999999</span></h1>
                        <h3>HUGE PROFIT</h3>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="center bounce-in">
                        <span class="stat-icon"><span class="pe-7s-box2 bounce-in"></span></span>
                        <h1><span class="counter">54875</span></h1>
                        <h3>THINGS IN BOXES</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="gap"></div>
    </section>

    <section id="portfolio" class="white">
        <div class="container">
            <div class="gap"></div>
            <div class="center gap fade-down section-heading">
                <h2 class="main-title">Examples Of Excellence</h2>
                <hr>
                <p>She evil face fine calm have now. Separate screened he outweigh of distance landlord.</p>
            </div>
            <ul class="portfolio-filter fade-down center">
                <li><a class="btn btn-outlined btn-primary active" href="#" data-filter="*">All</a></li>
                <li><a class="btn btn-outlined btn-primary" href="#" data-filter=".apps">Apps</a></li>
                <li><a class="btn btn-outlined btn-primary" href="#" data-filter=".nature">Nature</a></li>
                <li><a class="btn btn-outlined btn-primary" href="#" data-filter=".design">Design</a></li>
            </ul><!--/#portfolio-filter-->

            <ul class="portfolio-items col-3 isotope fade-up">
                <li class="portfolio-item apps isotope-item">
                    <div class="item-inner">
                        <img src="images/portfolio/folio01.jpg" alt="">
                        <h5>Portfolio Project</h5>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="images/portfolio/folio01.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </li><!--/.portfolio-item-->
                <li class="portfolio-item joomla nature isotope-item">
                    <div class="item-inner">
                        <img src="images/portfolio/folio02.jpg" alt="">
                        <h5>Portfolio Project</h5>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="images/portfolio/folio02.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </li><!--/.portfolio-item-->
                <li class="portfolio-item bootstrap design isotope-item">
                    <div class="item-inner">
                        <img src="images/portfolio/folio03.jpg" alt="">
                        <h5>Portfolio Project</h5>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="images/portfolio/folio03.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </li><!--/.portfolio-item-->
                <li class="portfolio-item joomla design apps isotope-item">
                    <div class="item-inner">
                        <img src="images/portfolio/folio04.jpg" alt="">
                        <h5>Portfolio Project</h5>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="images/portfolio/folio04.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </li><!--/.portfolio-item-->
                <li class="portfolio-item joomla apps isotope-item">
                    <div class="item-inner">
                        <img src="images/portfolio/folio05.jpg" alt="">
                        <h5>Portfolio Project</h5>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="images/portfolio/folio05.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </li><!--/.portfolio-item-->
                <li class="portfolio-item wordpress nature isotope-item">
                    <div class="item-inner">
                        <img src="images/portfolio/folio06.jpg" alt="">
                        <h5>Portfolio Project</h5>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="images/portfolio/folio06.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </li><!--/.portfolio-item-->
                <li class="portfolio-item joomla design apps isotope-item">
                    <div class="item-inner">
                        <img src="images/portfolio/folio07.jpg" alt="">
                        <h5>Portfolio Project</h5>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="images/portfolio/folio07.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </li><!--/.portfolio-item-->
                <li class="portfolio-item joomla nature isotope-item">
                    <div class="item-inner">
                        <img src="images/portfolio/folio08.jpg" alt="">
                        <h5>Portfolio Project</h5>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="images/portfolio/folio08.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </li><!--/.portfolio-item-->
                <li class="portfolio-item wordpress design isotope-item">
                    <div class="item-inner">
                        <img src="images/portfolio/folio09.jpg" alt="">
                        <h5>Portfolio Project</h5>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="images/portfolio/folio09.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </li><!--/.portfolio-item-->
            </ul>
        </div>
    </section>

    <section id="testimonial-carousel" class="divider-section">
        <div class="gap"></div>
        <div class="container">
            <div class="row">
                <div class="center gap fade-down section-heading">
                    <h2 class="main-title">What They Have Been Saying</h2>
                    <hr>
                    <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
                    <div class="gap"></div>
                </div>
                <div class='col-md-offset-2 col-md-8 fade-up'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel" data-slide-to="1"></li>
                            <li data-target="#quote-carousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">
                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-responsive" src="images/team/team01.jpg" style="width: 100px;height:100px;">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-responsive" src="images/team/team02.jpg" style="width: 100px;height:100px;">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-responsive" src="images/team/team03.jpg" style="width: 100px;height:100px;">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>
    </section>

    <section id="pricing" class="white">
        <div class="container">
            <div class="center gap fade-down section-heading">
                <h2 class="main-title">So, How Much?</h2>
                <hr>
                <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
            </div>
            <div class="gap"></div>
            <div id="pricing-table" class="row">
                <div class="col-md-3 col-xs-6 flip-in">
                    <ul class="plan plan1">
                        <li class="plan-name">
                            <h3>Basic</h3>
                        </li>
                        <li class="plan-price">
                            <div>
                                <span class="price"><sup>$</sup>10</span>
                                <small>month</small>
                            </div>
                        </li>
                        <li>
                            <strong>5GB</strong> Storage
                        </li>
                        <li>
                            <strong>1GB</strong> RAM
                        </li>
                        <li>
                            <strong>400GB</strong> Bandwidth
                        </li>
                        <li>
                            <strong>10</strong> Email Address
                        </li>
                        <li>
                            <strong>Forum</strong> Support
                        </li>
                        <li class="plan-action">
                            <a href="#" class="btn btn-outlined btn-primary btn-md btn-white">Signup</a>
                        </li>
                    </ul>
                </div><!--/.col-md-3-->
                <div class="col-md-3 col-xs-6 flip-in">
                    <ul class="plan plan2 featured">
                        <li class="plan-name">
                            <h3>Standard</h3>
                        </li>
                        <li class="plan-price">
                            <div>
                                <span class="price"><sup>$</sup>20</span>
                                <small>month</small>
                            </div>
                        </li>
                        <li>
                            <strong>5GB</strong> Storage
                        </li>
                        <li>
                            <strong>1GB</strong> RAM
                        </li>
                        <li>
                            <strong>400GB</strong> Bandwidth
                        </li>
                        <li>
                            <strong>10</strong> Email Address
                        </li>
                        <li>
                            <strong>Forum</strong> Support
                        </li>
                        <li class="plan-action">
                            <a href="#" class="btn btn-outlined btn-primary btn-md">Signup</a>
                        </li>
                    </ul>
                </div><!--/.col-md-3-->
                <div class="col-md-3 col-xs-6 flip-in">
                    <ul class="plan plan3">
                        <li class="plan-name">
                            <h3>Advanced</h3>
                        </li>
                        <li class="plan-price">
                            <div>
                                <span class="price"><sup>$</sup>40</span>
                                <small>month</small>
                            </div>
                        </li>
                        <li>
                            <strong>50GB</strong> Storage
                        </li>
                        <li>
                            <strong>8GB</strong> RAM
                        </li>
                        <li>
                            <strong>1024GB</strong> Bandwidth
                        </li>
                        <li>
                            <strong>Unlimited</strong> Email Address
                        </li>
                        <li>
                            <strong>Forum</strong> Support
                        </li>
                        <li class="plan-action">
                            <a href="#" class="btn btn-outlined btn-primary btn-md btn-white">Signup</a>
                        </li>
                    </ul>
                </div><!--/.col-md-3-->
                <div class="col-md-3 col-xs-6 flip-in">
                    <ul class="plan plan4">
                        <li class="plan-name">
                            <h3>Mighty</h3>
                        </li>
                        <li class="plan-price">
                            <div>
                                <span class="price"><sup>$</sup>100</span>
                                <small>month</small>
                            </div>
                        </li>
                        <li>
                            <strong>50GB</strong> Storage
                        </li>
                        <li>
                            <strong>8GB</strong> RAM
                        </li>
                        <li>
                            <strong>1024GB</strong> Bandwidth
                        </li>
                        <li>
                            <strong>Unlimited</strong> Email Address
                        </li>
                        <li>
                            <strong>Forum</strong> Support
                        </li>
                        <li class="plan-action">
                            <a href="#" class="btn btn-outlined btn-primary btn-md btn-white">Signup</a>
                        </li>
                    </ul>
                </div><!--/.col-md-3-->
            </div>
            <div class="gap"></div>
        </div>
    </section>

    <section id="contact-us" class="white">
        <div class="container">
            <div class="gap"></div>
            <div class="center gap fade-down section-heading">
                <h2 class="main-title">Get In Touch</h2>
                <hr>
                <p>Of an or game gate west face shed. ﻿no great but music too old found arose.</p>
            </div>
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-4 fade-up">
                    <h3>Contact Information</h3>
                    <p>
                        <span>E-Civis</span>
                        <span class="icon icon-home"></span>Mitropolit Grigore nr. 31, sector 4, Bucuresti<br/>
                        <span class="icon icon-phone"></span>+40721 678 764<br/>
                        <span class="icon icon-envelop"></span> <a href="#">office@e-civis.eu</a> <br/>
                        <span class="icon icon-twitter"></span> <a href="#">@infinityteam.com</a> <br/>
                    </p>
                    <div class="fade-up">
                        <a class="btn btn-social btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
                    </div>
                </div><!-- col -->

                <div class="col-md-8 fade-up">
                    <h3>Drop Us A Message</h3>
                    <br>
                    <br>
                    <div id="message"></div>
                    <form method="post" action="sendemail.php" id="contactform">
                        <input type="text" name="name" id="name" placeholder="Name" />
                        <input type="text" name="email" id="email" placeholder="Email" />
                        <input type="text" name="website" id="website" placeholder="Website" />
                        <textarea name="comments" id="comments" placeholder="Comments"></textarea>
                        <input class="btn btn-outlined btn-primary" type="submit" name="submit" value="Submit" />
                    </form>
                </div><!-- col -->
            </div><!-- row -->
            <div class="gap"></div>
        </div>
    </section>
</div>

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


<script src="../../js/impact/plugins.js"></script>
<script src="../../js/impact/bootstrap.min.js"></script>
<script src="../../js/impact/jquery.prettyPhoto.js"></script>
<script src="../../js/impact/init.js"></script>
</body>
</html>