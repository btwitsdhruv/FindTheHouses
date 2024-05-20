<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<php lang="zxx">


<!-- Mirrored from code-theme.com/php/findhouses/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:56 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>About Us</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages hd-white about">
    <!-- Wrapper -->
    <div id="wrapper">
        <?php include("includes/header.php")?>
        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>About Our Company</h1>
                    <h2><a href="index.php">Home </a> &nbsp;/&nbsp; About Us</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION ABOUT -->
        <section class="about-us fh">
            <div class="container">
                <div class="row">
				
                    <div class="col-lg-6 col-md-12 who-1">
					<?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div>
                            <h2 class="text-left mb-4">About <span>Find Houses</span></h2>
                        </div>
                        <div class="pftext">
                            <p><?php  echo $row['PageDescription'];?></p>

                           
                        </div>
                        <div class="box bg-2">
                            <a href="about.php" class="text-center button button--moema button--text-thick button--text-upper button--size-s">read More</a>
                           
                        </div>
						<?php }?>
                    </div>
                    

                </div>
            </div>
        </section>
        <!-- END SECTION ABOUT -->

        <!-- START SECTION WHY CHOOSE US -->
        <section class="how-it-works bg-white-2">
            <div class="container">
                <div class="sec-title">
                    <h2><span>Why </span>Choose Us</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row service-1">
                    <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                        <div class="serv-flex">
                            <div class="art-1 img-13">
                                <img src="images/icons/icon-4.svg" alt="">
                                <h3>Wide Renge Of Properties</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                        <div class="serv-flex">
                            <div class="art-1 img-14">
                                <img src="images/icons/icon-5.svg" alt="">
                                <h3>Trusted by thousands</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up">
                        <div class="serv-flex arrow">
                            <div class="art-1 img-15">
                                <img src="images/icons/icon-6.svg" alt="">
                                <h3>Financing made easy</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- END SECTION WHY CHOOSE US -->

        <!-- START SECTION COUNTER UP -->
        <section class="counterup">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="countr">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <div class="count-me">
                                <p class="counter text-left">300</p>
                                <h3>Sold Houses</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="countr">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <div class="count-me">
                                <p class="counter text-left">400</p>
                                <h3>Daily Listings</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="countr mb-0">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <div class="count-me">
                                <p class="counter text-left">250</p>
                                <h3>Expert Agents</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="countr mb-0 last">
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                            <div class="count-me">
                                <p class="counter text-left">200</p>
                                <h3>Won Awars</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION COUNTER UP -->

        <!-- START SECTION AGENTS -->
        <section class="team">
            <div class="container">
                <div class="sec-title">
                    <h2><span>Our </span>Team</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row team-all">
                    <div class="col-lg-3 col-md-6 team-pro">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="images/team/t-5.jpg" alt="" />
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3>Carls Jhons</h3>
                                    <p>Financial Advisor</p>
                                    <div class="team-socials">
                                        <ul>
                                            <li>
                                                <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <span><a href="team-details.php">View Profile</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 team-pro">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="images/team/t-6.jpg" alt="" />
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3>Arling Tracy</h3>
                                    <p>Acountant</p>
                                    <div class="team-socials">
                                        <ul>
                                            <li>
                                                <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <span><a href="team-details.php">View Profile</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 team-pro pb-none">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="images/team/t-7.jpg" alt="" />
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3>Mark Web</h3>
                                    <p>Founder &amp; CEO</p>
                                    <div class="team-socials">
                                        <ul>
                                            <li>
                                                <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <span><a href="team-details.php">View Profile</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 team-pro kat">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="images/team/t-8.jpg" alt="" />
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3>Katy Grace</h3>
                                    <p>Team Leader</p>
                                    <div class="team-socials">
                                        <ul>
                                            <li>
                                                <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <span><a href="team-details.php">View Profile</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION AGENTS -->

        <!-- START SECTION TESTIMONIALS -->
        <section class="testimonials home18 bg-white">
            <div class="container">
               <div class="sec-title">
                    <h2><span>Clients </span>Testimonials</h2>
                    <p>We collect reviews from our customers.</p>
                </div>
                <div class="owl-carousel style1">
                    <div class="test-1 pb-0 pt-0">
                        <img src="images/testimonials/ts-1.jpg" alt="">
                        <h3 class="mt-3 mb-0">Lisa Smith</h3>
                        <h6 class="mt-1">New York</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pb-0 pt-0">
                        <img src="images/testimonials/ts-2.jpg" alt="">
                        <h3 class="mt-3 mb-0">Jhon Morris</h3>
                        <h6 class="mt-1">Los Angeles</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-o"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pt-0">
                        <img src="images/testimonials/ts-3.jpg" alt="">
                        <h3 class="mt-3 mb-0">Mary Deshaw</h3>
                        <h6 class="mt-1">Chicago</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pt-0">
                        <img src="images/testimonials/ts-4.jpg" alt="">
                        <h3 class="mt-3 mb-0">Gary Steven</h3>
                        <h6 class="mt-1">Philadelphia</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-o"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pt-0">
                        <img src="images/testimonials/ts-5.jpg" alt="">
                        <h3 class="mt-3 mb-0">Cristy Mayer</h3>
                        <h6 class="mt-1">San Francisco</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pt-0">
                        <img src="images/testimonials/ts-6.jpg" alt="">
                        <h3 class="mt-3 mb-0">Ichiro Tasaka</h3>
                        <h6 class="mt-1">Houston</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-o"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION TESTIMONIALS -->

        <!-- STAR SECTION PARTNERS -->
        <div class="partners bg-white-2">
            <div class="container">
                <div class="sec-title">
                    <h2><span>Our </span>Partners</h2>
                    <p>The Companies That Represent Us.</p>
                </div>
                <div class="owl-carousel style2">
                    <div class="owl-item"><img src="images/partners/11.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/12.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/13.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/14.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/15.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/16.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/17.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/11.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/12.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/13.jpg" alt=""></div>
                </div>
            </div>
        </div>
        <!-- END SECTION PARTNERS -->

        <!-- START FOOTER -->
 
       <?php

include('includes/footer.php');
?>
        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->


        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/popup.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/counterup.js"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/inner.js"></script>

        <script>
            $('.style1').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: false,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 1
                    },
                    400: {
                        items: 1,
                        margin: 20
                    },
                    500: {
                        items: 1,
                        margin: 20
                    },
                    768: {
                        items: 1,
                        margin: 20
                    },
                    991: {
                        items: 1,
                        margin: 20
                    },
                    1000: {
                        items: 1,
                        margin: 20
                    }
                }
            });

        </script>
        <script>
            $('.style2').owlCarousel({
                loop: true,
                margin: 0,
                dots: false,
                autoWidth: false,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 2,
                        margin: 20
                    },
                    400: {
                        items: 2,
                        margin: 20
                    },
                    500: {
                        items: 3,
                        margin: 20
                    },
                    768: {
                        items: 4,
                        margin: 20
                    },
                    992: {
                        items: 5,
                        margin: 20
                    },
                    1000: {
                        items: 6,
                        margin: 20
                    }
                }
            });

        </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/php/findhouses/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:57 GMT -->
</php>
