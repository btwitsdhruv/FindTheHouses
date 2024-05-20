<?php
session_start();
include('dbconnection.php');
error_reporting(0);
if (empty($_SESSION['remsuid'])) {
    header('location:logout.php');
} else {
    $orderid = "ORDS" . rand(10000, 99999999);
    if (isset($_GET['proid'])) {
        // Retrieve the proid from the URL
        $proid = $_GET['proid'];

        // Use $proid as needed in your code
        echo "The proid on this page is: $proid";
    } else {
        // Handle the case when proid is not set in the URL
        echo "proid is not set in the URL";
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Form submitted
    
        $user_id = $_POST['user'];
        $user_name = $_POST['user_name']; // Adjust this based on your actual form field names
        $user_email = $_POST['user_email']; // Adjust this based on your actual form field names
        $user_phone = $_POST['user_phone']; // Adjust this based on your actual form field names
        $booking_id = $_POST['booking_id']; // Adjust this based on your actual form field names
        $owner_id = $_POST['owner'];
        $property_name = $_POST['property_name']; // Adjust this based on your actual form field names
        $property_price = $_POST['property_price']; // Adjust this based on your actual form field names
    
        // Insert data into the booking_data table
        $sql = "INSERT INTO payment (user_id, user_name, user_email, user_phone, booking_id, owner_id, property_name, property_price) 
                VALUES ('$user_id', '$user_name', '$user_email', '$user_phone', '$booking_id', '$owner_id', '$property_name', '$property_price')";
    
    if (mysqli_query($con, $sql)) {
        // Payment successful
        echo "<script>
                alert('Payment successful!');
                window.location.href = 'Paymentsended.php'; // Replace with the actual page you want to redirect to
             </script>";
        exit; // Prevent further execution of the script
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
    
?>


    <!DOCTYPE html>
    <html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="html 5 template">
        <meta name="author" content="">
        <title>Find Houses</title>
        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- ARCHIVES CSS -->
        <link rel="stylesheet" href="css/search.css">
        <link rel="stylesheet" href="css/dashbord-mobile-menu.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/swiper.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/lightcase.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" id="color" href="css/default.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <style>
            .footer-clean {
                padding: 50px 0;
                background-color: #fff;
                color: #4b4c4d;
            }

            .footer-clean h3 {
                margin-top: 0;
                margin-bottom: 12px;
                font-weight: bold;
                font-size: 16px;
            }

            .footer-clean ul {
                padding: 0;
                list-style: none;
                line-height: 1.6;
                font-size: 14px;
                margin-bottom: 0;
            }

            .footer-clean ul a {
                color: inherit;
                text-decoration: none;
                opacity: 0.8;
            }

            .footer-clean ul a:hover {
                opacity: 1;
            }

            .footer-clean .item.social {
                text-align: right;
            }

            @media (max-width:767px) {
                .footer-clean .item {
                    text-align: center;
                    padding-bottom: 20px;
                }
            }

            @media (max-width: 768px) {
                .footer-clean .item.social {
                    text-align: center;
                }
            }

            .footer-clean .item.social>a {
                font-size: 24px;
                width: 40px;
                height: 40px;
                line-height: 40px;
                display: inline-block;
                text-align: center;
                border-radius: 50%;
                border: 1px solid #ccc;
                margin-left: 10px;
                margin-top: 22px;
                color: inherit;
                opacity: 0.75;
            }

            .footer-clean .item.social>a:hover {
                opacity: 0.9;
            }

            @media (max-width:991px) {
                .footer-clean .item.social>a {
                    margin-top: 40px;
                }
            }

            @media (max-width:767px) {
                .footer-clean .item.social>a {
                    margin-top: 10px;
                }
            }

            .footer-clean .copyright {
                margin-top: 14px;
                margin-bottom: 0;
                font-size: 13px;
                opacity: 0.6;
            }
        </style>
    </head>

    <body class="inner-pages maxw1600 m0a dashboard-bd">
        <!-- Wrapper -->
        <div id="wrapper" class="int_main_wraapper">
            <!-- START SECTION HEADINGS -->
            <!-- Header Container
        ================================================== -->
            <div class="dash-content-wrap">
                <header id="header-container" class="db-top-header">

                    <!-- Header -->
                    <div id="header">
                        <div class="container-fluid">
                            <!-- Left Side Content -->
                            <div class="left-side">
                                <!-- Logo -->
                                <div id="logo">
                                    <a href="index.html"><img src="images/logo.svg" alt=""></a>
                                </div>
                                <!-- Mobile Navigation -->
                                <div class="mmenu-trigger">
                                    <button class="hamburger hamburger--collapse" type="button">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                </div>
                                <!-- Main Navigation -->
                                <nav id="navigation" class="style-1">
                                    <ul id="responsive">
                                        <!-- Home Menu -->
                                        <li>
                                            <a href="index.php">home</a>

                                        </li>
                                        <!-- li end -->

                                        <li><a href="about.php">about</a></li>


                                        <li><a href="properties-grid.php">properties</a></li>

                                        <li><a href="contact.php">contact</a></li>
                                        <!-- Profile Menu-->
                                        <li>
                                            <?php if (strlen($_SESSION['remsuid'] != 0)) { ?>
                                                <a href="#" data-toggle="dropdown">My Account</a>
                                                <ul>
                                                    <li><a href="user-profile.php">user profile</a></li>
                                                    <li><a href="change-password.php">change password</a></li>
                                                    <li><a href="logout.php">Logout</a></li>
                                                </ul>
                                            <?php } ?>
                                        </li>

                                    </ul>
                                </nav>
                                <div class="clearfix"></div>
                                <!-- Main Navigation / End -->
                            </div>
                            <?php
                            $uid = $_SESSION['remsuid'];
                            $ret = mysqli_query($con, "select * from tbluser where ID='$uid'");


                            while ($row = mysqli_fetch_array($ret)) {

                            ?>
                                <div class="header-user-menu user-menu">
                                    <div class="header-user-name">
                                        Hi,<?php echo $row['FullName']; ?>
                                    </div>

                                </div>
                            <?php } ?>
                            <!-- Right Side Content / End -->
                        </div>
                    </div>
                    <!-- Header / End -->

                </header>
            </div>
            <div class="clearfix"></div>
            <!-- Header Container / End -->

            <!-- START SECTION USER PROFILE -->
            <section class="user-page section-padding pt-5">
                <div class="container-fluid">
                    <div class="row">
                        <?php

                        include('includes/sidebar.php');
                        ?>

                        <section class="payment-method notfound">
                            <div class="row">
                                <div class="col-md-12 col-lg-10">
                                    <div class="tr-single-box">
                                        <div class="tr-single-body">
                                            <div class="tr-single-header">
                                                <h4><i class="far fa-address-card pr-2"></i>Billing Information</h4>
                                            </div>
                                            <form method="post">
                                            <div class="row">
                                                <?php
                                                $uid = $_SESSION['remsuid'];
                                                $ret = mysqli_query($con, "select * from tbluser where ID='$uid'");
                                                while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                
                                                <input type="hidden" name="user" value="<?php echo $row['ID']; ?>">
                                                    <div class="col-sm-6">
                                                        <label>Name</label>
                                                        <input type="text"  name="user_name" class="form-control" value="<?php echo $row['FullName']; ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Email</label>
                                                        <input type="Email" name="user_email" class="form-control" value="<?php echo $row['Email']; ?>" readonly>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Phone</label>
                                                        <input type="text" name="user_phone" class="form-control" value="<?php echo $row['MobileNumber']; ?>" readonly>
                                                    </div>
                                                <?php } ?>
                                                <div class="col-sm-6">
                                                    <label>Booking id</label>
                                                    <h4><input name="booking_id" value="<?php echo $orderid;  ?>" required readonly></h4>
                                                </div>
                                                <?php

                                                $proid = $_GET['proid'];
                                                $ret = mysqli_query($con, "select * from tblproperty where ID='$proid'");


                                                while ($row = mysqli_fetch_array($ret)) {


                                                ?>
                                                    
                                                    <input type="hidden" name="owner" value="<?php echo $row['UserID']; ?>">
                                                    <div class="col-sm-6">
                                                        <label>Property Name</label>
                                                        <input type="text" name="property_name" class="form-control" value="<?php echo $row['PropertyTitle']; ?>" readonly>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Price</label>
                                                        <input type="text" name="property_price" class="form-control" value="<?php echo $row['RentorsalePrice']; ?>" readonly>
                                                    </div>

                                                    <input  name="submit" value="PAY" type="submit" class="btn" style="background-color: green;color:white;margin-left:450px;">

                                                <?php } ?>

                                            </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </section>
                        <!-- END SECTION PAYMENT-METHOD -->
                    </div>
                </div>
        </div>
        </section>
        <!-- END SECTION USER PROFILE -->
        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/swiper.min.js"></script>
        <script src="js/swiper.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick2.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/dashbord-mobile-menu.js"></script>
        <script src="js/forms-2.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/dropzone.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

        <!-- MAIN JS -->
        <script src="js/script.js"></script>

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

        </div>
        <!-- Wrapper / End -->
    </body>


    <!-- Mirrored from code-theme.com/html/findhouses/payment-method.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:56 GMT -->

    </html>
<?php } ?>