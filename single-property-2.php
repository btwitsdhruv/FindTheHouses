<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['signup'])) {
    $fname = $_POST['fullname'];
    $mobno = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype'];
    $password = md5($_POST['password']);

    $ret = mysqli_query($con, "select Email from tbluser where Email='$email'");
    $result = mysqli_fetch_array($ret);
    if ($result > 0) {
        echo "<script>alert('This email already associated with another account');</script>";
    } else {
        $query = mysqli_query($con, "insert into tbluser(FullName, Email, MobileNumber, Password,UserType) value('$fname', '$email','$mobno', '$password','$usertype' )");
        if ($query) {
            echo "<script>alert('You have successfully registered');</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    }
}

//code for login
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select ID,UserType,Email from tbluser where  Email='$email' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['ut'] = $ret['UserType'];
        $_SESSION['remsuid'] = $ret['ID'];
        $_SESSION['uemail'] = $ret['Email'];

        header('location:index.php');
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $uid = $_SESSION['remsuid'];
    $email = $_POST['email'];
    $owner = $_POST['owner'];
    $mobilenumber = $_POST['mobnum'];
    $message = $_POST['message'];
    $enquirynumber = mt_rand(100000000, 999999999);
    $proid = $_GET['proid'];
    $query1 = mysqli_query($con, "insert into  tblenquiry(PropertyID,UserId,Owner,FullName,Email,MobileNumber,Message,EnquiryNumber) value('$proid','$uid','$owner','$fullname','$email','$mobilenumber','$message','$enquirynumber')");
    if ($query1) {
        echo '<script>alert("Your enquiry successfully send. Your Enquiry number is "+"' . $enquirynumber . '")</script>';
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}


//Submit Feedback
if (isset($_POST['submitreview'])) {
    if (strlen($_SESSION['remsuid'] == 0)) {
        echo '<script>alert("Login required for publish review")</script>';
    } else {
        $review = $_POST['reviewcomment'];
        $uid = $_SESSION['remsuid'];
        $pid = $_GET['proid'];
        $query = mysqli_query($con, "insert into tblfeedback(UserId,PropertyId,UserRemark) value('$uid','$pid','$review')");
        echo '<script>alert("Your review successfully submited, after review it will publish")</script>';
        echo "<script>window.location.href='properties-grid.php'</script>";
    }
}


//Submit Feedback
if (isset($_POST['book'])) {
    if (strlen($_SESSION['remsuid'] == 0)) {
        echo '<script>alert("Login required for Book property ")</script>';
    } else {


        $uid = $_SESSION['remsuid'];
        $owner = $_POST['owner'];
        $pid = $_GET['proid'];
        $fromdate = $_POST['fromdate'];
        $todate = $_POST['todate'];
        $message = $_POST['message'];

        $booking = mt_rand(100000000, 999999999);
        $status = 0;
        $query = mysqli_query($con, "insert into tblbooking(BookingNumber,UserId,owner,PropertyId,FromDate,ToDate,message,Status) value('$booking','$uid','$owner','$pid','$fromdate','$todate','$message','$status')");
        echo '<script>alert("Booking successfull.")</script>';
    }
}




?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/single-property-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Property Details</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:500,600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="css/leaflet.css">
    <link rel="stylesheet" href="css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.default.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/timedropper.css">
    <link rel="stylesheet" href="css/datedropper.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
    <style>
        .img-card img {
            width: 500px;
            height: 400px;
        }

        .img-card2 img {
            width: 550px;
            height: 450px;
        }
    </style>
</head>

<body class="inner-pages hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <?php include('header2.php'); ?>
        <?php

        $proid = $_GET['proid'];
        $query = mysqli_query($con, "select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where tblproperty.ID='$proid'");
        $num = mysqli_num_rows($query);
        // Declare $proid outside the while loop
        $proid = null;
        while ($row = mysqli_fetch_array($query)) {
            $proid = $row['ID'];
        ?>

            <div class="swiper-container" style="height:550px;">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="propertyimg/<?php echo $row['FeaturedImage']; ?>" class="grid image-link">
                            <div class="img-card">
                                <img src="propertyimg/<?php echo $row['FeaturedImage']; ?>" width="600" height='100' alt="#">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="propertyimg/<?php echo $row['GalleryImage1']; ?>" class="grid image-link">
                            <div class="img-card">
                                <img src="propertyimg/<?php echo $row['GalleryImage1']; ?>" width="600" height="150" alt="#">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="propertyimg/<?php echo $row['GalleryImage2']; ?>" class="grid image-link">
                            <div class="img-card">
                                <img src="propertyimg/<?php echo $row['GalleryImage2']; ?>" width="600" height='100' alt="#">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="propertyimg/<?php echo $row['GalleryImage3']; ?>" class="grid image-link">
                            <div class="img-card">
                                <img src="propertyimg/<?php echo $row['GalleryImage3']; ?>" width="600" height='100' alt="#">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="propertyimg/<?php echo $row['GalleryImage4']; ?>" class="grid image-link">
                            <div class="img-card">
                                <img src="propertyimg/<?php echo $row['GalleryImage4']; ?>" width="600" height='100' alt="#">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="propertyimg/<?php echo $row['GalleryImage5']; ?>" class="grid image-link">
                            <div class="img-card">
                                <img src="propertyimg/<?php echo $row['GalleryImage5']; ?>" width="600" height='100' alt="#">
                            </div>
                        </a>
                    </div>
                </div>


                <div class="swiper-pagination swiper-pagination-white"></div>

                <div class="swiper-button-next swiper-button-white mr-3"></div>
                <div class="swiper-button-prev swiper-button-white ml-3"></div>
            </div>
            <!-- END SECTION HEADINGS -->

            <!-- START SECTION PROPERTIES LISTING -->
            <section class="single-proper blog details">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 blog-pots">
                            <div class="row">
                                <div class="col-md-12">
                                    <section class="headings-2 pt-0">
                                        <div class="pro-wrapper">
                                            <div class="detail-wrapper-body">

                                                <div class="listing-title-bar">
                                                    <h3><?php echo $row['PropertyTitle']; ?> <span class="mrg-l-5 category-tag"><?php echo $row['Status']; ?></span></h3>

                                                </div>
                                            </div>

                                            <div class="single detail-wrapper mr-2">
                                                <div class="detail-wrapper-body">
                                                    <div class="listing-title-bar" style="width: 100px;">
                                                        <h4><i class="fa fa-rupee" style="font-size:20px"></i><?php echo $row['RentorsalePrice']; ?></h4>
                                                        <div class="mt-0">
                                                            <a href="#listing-location" class="listing-address">
                                                                <p><i class="fa fa-map-marker" style="font-size:20px"></i><?php echo $row['Area']; ?> sq ft</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                    <!-- Star Description -->


                                    <div class="single homes-content details mb-30">
                                        <div class="row">

                                            <!-- .col-md-12 end -->
                                            <div class="col-xs-11 col-sm-11 col-md-11" style="color:red;font-size:16.5px;">
                                                <ul class="list-unstyled mb-20">
                                                    <li><span>Address:</span><?php echo $row['Address']; ?></li>
                                                    <li><span>City:</span><?php echo $row['City']; ?></li>
                                                    <li><span>Country:</span><?php echo $row['CountryName']; ?></li>
                                                    <li><span>State:</span><?php echo $row['StateName']; ?></li>
                                                    <li><span>Zip/Postal code:</span><?php echo $row['ZipCode']; ?></li>
                                                    <?php $firstname = $row['AfterPricelabel']; ?>
                                                    <?php $firstname2 = $row['propertylink']; ?></li>

                                                </ul>
                                            </div>
                                            <!-- .col-md-12 end -->

                                        </div>
                                        <!-- .row end -->
                                    </div>


                                    <!-- Star Property Details -->
                                    <div class="single homes-content details mb-30">
                                        <!-- title -->
                                        <h5 class="mb-4">Property Details</h5>
                                        <ul class="homes-list clearfix">
                                            <li>
                                                <span class="font-weight-bold mr-1">Property ID:</span>
                                                <span class="det"><?php echo $row['PropertyID']; ?></span>
                                            </li>
                                            <li>
                                                <span class="font-weight-bold mr-1">Property Type:</span>
                                                <span class="det"><?php echo $row['Type']; ?></span>
                                            </li>
                                            <li>
                                                <span class="font-weight-bold mr-1">Property status:</span>
                                                <span class="det"><?php echo $row['Status']; ?></span>
                                            </li>
                                            <li>
                                                <span class="font-weight-bold mr-1">Property Price:</span>
                                                <span class="det"><?php echo $row['RentorsalePrice']; ?></span>
                                            </li>

                                            <li>
                                                <span class="font-weight-bold mr-1">Bedrooms:</span>
                                                <span class="det"><?php echo $row['Bedrooms']; ?></span>
                                            </li>
                                            <li>
                                                <span class="font-weight-bold mr-1">Bath:</span>
                                                <span class="det"><?php echo $row['Bathrooms']; ?></span>
                                            </li>
                                            <li>
                                                <span class="font-weight-bold mr-1">Garages:</span>
                                                <span class="det"><?php echo $row['Garages']; ?></span>
                                            </li>

                                        </ul>
                                        <!-- title -->
                                        <h5 class="mt-5">Amenities</h5>
                                        <!-- cars List -->
                                        <ul class="homes-list clearfix">
                                            <li>

                                                <span><?php if ($row['CenterCooling'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                    <?php } ?> Center Cooling</span>
                                            </li>
                                            <li>

                                                <span><?php if ($row['Balcony'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Balcony</span>
                                            </li>
                                            <li>

                                                <span><?php if ($row['PetFriendly'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Pet Friendly</span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['Barbeque'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Barbeque</span>
                                            </li>
                                            <li>

                                                <span><?php if ($row['FireAlarm'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Fire Alarm</span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['ModernKitchen'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Modern Kitchen</span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['Storage'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Storage</span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['Dryer'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Dryer</span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['Heating'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Heating</span>
                                            </li>

                                            <li>

                                                <span> <?php if ($row['Pool'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Pool </span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['Laundry'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Laundry</span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['Gym'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Gym</span>
                                            </li>

                                            <li>

                                                <span> <?php if ($row['Sauna'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Sauna</span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['Elevator'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Elevator</span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['DishWasher'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>Dish Washer</span>
                                            </li>

                                            <li>

                                                <span> </span>
                                            </li>
                                            <li>

                                                <span> <?php if ($row['EmergencyExit'] == 1) { ?>
                                                        <img src="assets/images/check.png" width="12" height="12">
                                                    <?php } else { ?>
                                                        <img src="assets/images/close.png" width="12" height="12">
                                                        <?php } ?>EmergencyExit</span>
                                            </li>



                                        </ul>

                                    </div>

                                    <div class="blog-info details mb-30">
                                        <h5 class="mb-4">Description</h5>
                                        <div class="mt-0">
                                            Address: <a href="#listing-location" class="listing-address" style="text-decoration: none; color: red;font-size: 15px;">
                                                <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i><?php echo $row['Address']; ?>, <?php echo $row['CountryName']; ?>, <?php echo $row['StateName']; ?>,<?php echo $row['City']; ?>,<?php echo $row['ZipCode']; ?>
                                            </a>
                                        </div>
                                        <br>

                                        <p class="mb-3"><?php echo $row['PropertDescription']; ?></p>
                                    </div>
                                    <!-- End Description -->
                                </div>
                            </div>
                        <?php } ?>

                        <br>
                        <!-- <div class="property wprt-image-video w50 pro vid-si2">
                            <h5>Property Video</h5>
                            <img alt="image" src="images/slider/home-slider-4.jpg">
                            <a class="icon-wrap popup-video popup-youtube" href="https://www.youtube.com/watch?v=14semTlwyUY">
                                <i class="fa fa-play"></i>
                            </a>
                            <div class="iq-waves">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </div>
                        </div> -->
                        <div class="property-location map">
                            <h5>Location</h5>
                            <div class="divider-fade"></div>
                            <div id="gmap_canvas" class="gmap_canvas"><iframe width="700" height="500" id="gmap_canvas" src="<?php echo (isset($firstname2)) ? $firstname2 : ''; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/text-tools/"></a></div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 500px;
                                    width: 1270px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 500px;
                                    width: 1270px;
                                }
                            </style>
                        </div>

                        <style type="text/css">
                            .map-responsive {
                                overflow: hidden;
                                padding-bottom: 56.25%;
                                position: relative;
                                height: 0;
                            }

                            .map-responsive iframe {
                                left: 0;
                                top: 0;
                                height: 100%;
                                width: 100%;
                                position: absolute;
                            }
                        </style>

                        <!-- Star Reviews -->


                        <section class="reviews comments">

                            <?php $pid = intval($_GET['proid']);
                            $qry = mysqli_query($con, "select tblfeedback.UserRemark,tblfeedback.PostingDate,tbluser.FullName from tblfeedback join tbluser on tbluser.ID=tblfeedback.UserId where tblfeedback.PropertyId='$pid' and tblfeedback.Is_Publish='1'");
                            $countreview = mysqli_num_rows($qry);
                            ?>
                            <h3 class="mb-5"> <?php echo $countreview; ?> Reviews</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <ul class="property-review">


                                    <?php
                                    while ($rw = mysqli_fetch_array($qry)) {
                                    ?>


                                        <li class="review-comment">
                                            <div class="avatar"><?php echo ucfirst(substr($rw['FullName'], 1, 1)); ?></div>
                                            <div class="comment">
                                                <h6><?php echo $rw['FullName']; ?></h6>
                                                <div class="date"><?php echo $rw['PostingDate']; ?></div>
                                                <p><?php echo $rw['UserRemark']; ?></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <!-- .comments-list end -->
                            </div>


                        </section>
                        <!-- End Reviews -->
                        <!-- Star Add Review -->
                        <section class="single reviews leve-comments details">
                            <div id="add-review" class="add-review-box">
                                <!-- Add Review -->
                                <h3 class="listing-desc-headline margin-bottom-20 mb-4">Add Review</h3>
                                <span class="leave-rating-title">Your rating for this listing</span>

                                <div class="row">
                                    <div class="col-md-12 data">
                                        <form id="post-comment" class="mb-0" method="post">

                                            <div class="col-md-12 form-group">
                                                <textarea class="form-control" id="reviewcomment" name="reviewcomment" rows="2" required></textarea>
                                            </div>

                                            <button type="submit" name="submitreview" class="btn btn-primary btn-lg mt-2">Submit Review</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End Add Review -->
                        </div>
                        <aside class="col-lg-4 col-md-12 car">

                            <!-- End: Schedule a Tour -->
                            <!-- end author-verified-badge -->

                            <div class="sidebar">
                                <?php
                                $ret1 = mysqli_query($con, "select * from tbluser join tblproperty on tblproperty.UserID=tbluser.ID where tblproperty.ID=$proid");
                                $cnt = 1;
                                while ($row1 = mysqli_fetch_array($ret1)) {

                                ?>
                                    <div class="widget-boxed mt-33 mt-5">
                                        <div class="widget--title">
                                            <?php if ($row1['UserType'] == "1") { ?>
                                                <h5>Posted by Agent/Broker</h5>
                                            <?php } else { ?>
                                                <h5>Posted by Owner</h5>
                                            <?php } ?>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="sidebar-widget author-widget2">
                                                <div class="author-box clearfix">
                                                    <img src="propertyimg/images.png" alt="agent" class="img-responsive" height="100" width="100">
                                                    <h4 class="author__title"><?php echo $row1['FullName']; ?></h4>
                                                    <?php echo $row1['UserID']; ?>
                                                    <p class="author__meta">Agent of Property</p>
                                                </div>
                                                <ul class="author__contact">

                                                    <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#"><?php echo $row1['MobileNumber']; ?></a></li>
                                                    <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#"><?php echo $row1['Email']; ?></a></li>
                                                </ul>

                                            </div>
                                        </div>
                                        <?php if ($_SESSION['remsuid'] == 0) { ?>
                                            <div class="agent-contact-form-sidebar">
                                                <h4>Request Inquiry</h4>
                                                <form name="contact_form" method="post">

                                                    <input type="text" class="form-control" name="fullname" id="fullname" required="true" placeholder="Full Name">
                                                    <input type="email" class="form-control" name="email" id="email" required="true" placeholder="Email">
                                                    <input type="text" class="form-control" name="mobnum" id="mobnum" required="true" maxlength="10" pattern="[0-9]+" placeholder="Mobile Number">
                                                    <textarea class="form-control" name="message" id="message" rows="2" required="true" placeholder=""></textarea>
                                                    <input type="submit" value="Send Request" name="submit" class="multiple-send-message">

                                                </form>

                                            </div>
                                        <?php } else {
                                            //If user is logged in
                                            $uid = $_SESSION['remsuid'];
                                            $sqlq = mysqli_query($con, "select * from tbluser where ID='$uid'");
                                            while ($ret = mysqli_fetch_array($sqlq)) {
                                                $fname = $ret['FullName'];
                                                $uemail = $ret['Email'];
                                                $mnumebr = $ret['MobileNumber'];
                                            }
                                        ?>


                                            <div class="agent-contact-form-sidebar">
                                                <h4>Request Showing</h4>
                                                <form name="contact_form" method="post">

                                                    <input type="hidden" name="owner" value="<?php echo $row1['UserID']; ?>">
                                                    <input type="text" class="form-control" value="<?php echo $fname; ?>" name="fullname" id="fullname" placeholder="Full name" required="true" readonly="true">
                                                    <input type="email" class="form-control" value="<?php echo $uemail; ?>" name="email" id="email" placeholder="Contact email" required="true" readonly="true">
                                                    <input type="text" class="form-control" value="<?php echo $mnumebr; ?>" name="mobnum" id="mobnum" placeholder="Phone or mobile no" required="true" maxlength="10" pattern="[0-9]+" readonly="true">
                                                    <textarea class="form-control" name="message" id="message" rows="2" required="true" placeholder="Write Query"></textarea>

                                                    <input type="submit" value="Send Request" name="submit" class="multiple-send-message">
                                                </form>

                                            </div>
                                        <?php } ?>
                                        <center>
                                            <?php if ($proid !== null) {
                                                // Create a hyperlink with the proid parameter
                                                echo '<a href="payment-method.php?proid=' . $proid . '" class="btn reservation btn-radius theme-btn full-width mrg-top-" style="background-color:#FF385C;margin-top:10px;width:300px;color:white;">Payment</a>';
                                            } ?>

                                        </center>
                                    </div>



                                    <div class="single widget">
                                        <!-- Start: Schedule a Tour -->
                                        <div class="schedule widget-boxed mt-0">
                                            <div class="widget-boxed-header">
                                                <h4><i class="fa fa-calendar pr-3 padd-r-10"></i>Book property</h4>
                                            </div>
                                            <div class="widget-boxed-body">
                                                <form method="post">
                                                    <input type="hidden" name="owner" value="<?php echo $row1['UserID']; ?>">
                                                    <div class="form-group">
                                                        From Date
                                                        <input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
                                                    </div>
                                                    <div class="form-group">
                                                        To Date
                                                        <input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" class="btn reservation btn-radius theme-btn full-width mrg-top-10" name="book" value="Book Now">
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>


                                <?php } ?>
                            </div>
                        </aside>
                    </div>
                    <!-- START SIMILAR PROPERTIES -->
                    <section class="similar-property recently portfolio bshd p-0 bg-white-inner">
                        <div class="container">
                            <h5>Similar Properties</h5>
                            <div class="row portfolio-items">
                                <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                                    <div class="project-single h-100 p-4 mt-auto">
                                        <?php

                                        $query = mysqli_query($con, "select * from tblproperty order by rand() limit 1 ");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>




                                            <?php
                                            $ret1 = mysqli_query($con, "select * from tbluser join tblproperty on tblproperty.UserID=tbluser.ID where tblproperty.ID=$proid");
                                            $cnt = 1;
                                            while ($row1 = mysqli_fetch_array($ret1)) {

                                            ?>
                                                <div class="project-inner project-head" style="height: 200px;">
                                                    <div class="project-bottom">
                                                        <h4><a href="single-property-2.php?proid=<?php echo $row['ID']; ?>">View Property</a><span class="category">Real Estate</span></h4>
                                                    </div>
                                                    <div class="homes">
                                                        <!-- homes img -->
                                                        <a href="single-property-2.php?proid=<?php echo $row['ID']; ?>" class="homes-img">
                                                            <div class="homes-tag button alt featured">Featured</div>
                                                            <div class="homes-tag button alt sale"><?php echo $row['Status']; ?></div>
                                                            <div class="homes-price"><?php echo $row['Type']; ?></div>
                                                            <img src="propertyimg/<?php echo $row['FeaturedImage']; ?>" class="img-responsive" height="200px">
                                                        </a>

                                                    </div>
                                                  
                                                </div>
                                                <!-- homes content -->
                                                <div class="homes-content h-100">
                                                    <!-- homes address -->
                                                    <h3><a href="single-property-2.php?proid=<?php echo $row['ID']; ?>">
                                                            <?php echo $row['PropertyTitle']; ?></a></h3>
                                                    <p class="homes-address mb-3">
                                                        <a href="single-property-2.php?proid=<?php echo $row['ID']; ?>">
                                                            <i class="fa fa-map-marker"></i><span><?php echo $row['Address']; ?>
                                                                <?php echo $row['City']; ?>
                                                                <?php echo $row['State']; ?>
                                                                <?php echo $row['Country']; ?></span>
                                                        </a>
                                                    </p>
                                                    <!-- homes List -->
                                                    <ul class="homes-list clearfix">
                                                        <li>
                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                            <span><?php echo $row['Bedrooms']; ?></span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-bath" aria-hidden="true"></i>
                                                            <span><?php echo $row['Bathrooms']; ?></span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-object-group" aria-hidden="true"></i>
                                                            <span><?php echo $row['Area']; ?></span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                            <span><?php echo $row['Garages']; ?></span>
                                                        </li>
                                                    </ul>
                                                    <!-- Price -->
                                                    <div class="price-properties">
                                                        <h3 class="title mt-3">
                                                            <a href="single-property-2.php"><i class="fa fa-rupee" style="font-size:24px"></i><?php echo $row['RentorsalePrice']; ?></a>
                                                        </h3>
                                                       
                                                    </div>
                                                    <div class="footer">
                                                        <a href="agent-details.html">
                                                            <i class="fa fa-user"></i> <?php echo $row1['FullName']; ?>
                                                        </a>
                                                        <span>
                                                            <i class="fa fa-calendar"></i> 2 months ago
                                                        </span>
                                                    </div>
                                                </div>
                                    </div>
                                </div><?php } ?>
                            <div class="item col-lg-4 col-md-6 col-xs-12 people">
                                <div class="project-single h-100 p-4">
                                    <?php

                                            $query = mysqli_query($con, "select * from tblproperty order by rand() limit 1");
                                            while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <?php
                                                $ret1 = mysqli_query($con, "select * from tbluser join tblproperty on tblproperty.UserID=tbluser.ID where tblproperty.ID=$cnt");
                                                $cnt = 1;
                                                while ($row1 = mysqli_fetch_array($ret1)) {

                                        ?>
                                            <div class="project-inner project-head">
                                                <div class="project-bottom">
                                                    <h4><a href="single-property-2.php?proid=<?php echo $row['ID']; ?>">View Property</a><span class="category">Real Estate</span></h4>
                                                </div>
                                                <div class="homes">
                                                    <!-- homes img -->
                                                    <a href="single-property-2.php?proid=<?php echo $row['ID']; ?>" class="homes-img">
                                                        <div class="homes-tag button alt featured">Featured</div>
                                                        <div class="homes-tag button alt sale"><?php echo $row['Status']; ?></div>
                                                        <div class="homes-price"><?php echo $row['Type']; ?></div>
                                                        <img src="propertyimg/<?php echo $row['FeaturedImage']; ?>" class="img-responsive">
                                                    </a>

                                                </div>
                                              
                                            </div>
                                            <!-- homes content -->
                                            <div class="homes-content h-100">
                                                <!-- homes address -->
                                                <h3><a href="single-property-2.php?proid=<?php echo $row['ID']; ?>">
                                                        <?php echo $row['PropertyTitle']; ?></a></h3>
                                                <p class="homes-address mb-3">
                                                    <a href="single-property-2.php?proid=<?php echo $row['ID']; ?>">
                                                        <i class="fa fa-map-marker"></i><span><?php echo $row['Address']; ?>
                                                            <?php echo $row['City']; ?>
                                                            <?php echo $row['State']; ?>
                                                            <?php echo $row['Country']; ?></span>
                                                    </a>
                                                </p>
                                                <!-- homes List -->
                                                <ul class="homes-list clearfix">
                                                    <li>
                                                        <i class="fa fa-bed" aria-hidden="true"></i>
                                                        <span><?php echo $row['Bedrooms']; ?></span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-bath" aria-hidden="true"></i>
                                                        <span><?php echo $row['Bathrooms']; ?></span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-object-group" aria-hidden="true"></i>
                                                        <span><?php echo $row['Area']; ?></span>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                        <span><?php echo $row['Garages']; ?></span>
                                                    </li>
                                                </ul>
                                                <!-- Price -->
                                                <div class="price-properties">
                                                    <h3 class="title mt-3">
                                                        <i class="fa fa-rupee" style="font-size:24px"></i><?php echo $row['RentorsalePrice']; ?>
                                                    </h3>
                                                   
                                                </div>
                                                <div class="footer" style="">
                                                    <a href="agent-details.html">
                                                        <i class="fa fa-user"></i> <?php echo $row1['FullName']; ?>
                                                    </a>
                                                    <span>
                                                        <i class="fa fa-calendar"></i> 2 months ago
                                                    </span>
                                                </div>
                                            </div>
                                </div><?php } ?>
                            </div><?php } ?>
                        <div class="item col-lg-4 col-md-6 col-xs-12 people landscapes no-pb pbp-3">
                            <div class="project-single h-100 p-4">
                                <?php

                                            $query = mysqli_query($con, "select * from tblproperty order by rand() limit 1");
                                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <?php
                                                $ret1 = mysqli_query($con, "select * from tbluser join tblproperty on tblproperty.UserID=tbluser.ID where tblproperty.ID=$cnt");
                                                $cnt = 1;
                                                while ($row1 = mysqli_fetch_array($ret1)) {

                                    ?>
                                        <div class="project-inner project-head mt-auto">
                                            <div class="project-bottom">
                                                <h4><a href="single-property-2.php?proid=<?php echo $row['ID']; ?>">View Property</a><span class="category">Real Estate</span></h4>
                                            </div>
                                            <div class="homes">
                                                <!-- homes img -->
                                                <a href="single-property-2.php?proid=<?php echo $row['ID']; ?>" class="homes-img">
                                                    <div class="homes-tag button alt featured">Featured</div>
                                                    <div class="homes-tag button alt sale"><?php echo $row['Status']; ?></div>
                                                    <div class="homes-price"><?php echo $row['Type']; ?></div>
                                                    <img src="propertyimg/<?php echo $row['FeaturedImage']; ?>" class="img-responsive">
                                                </a>

                                            </div>
                                           
                                        </div>
                                        <!-- homes content -->
                                        <div class="homes-content h-100">
                                            <!-- homes address -->
                                            <h3><a href="single-property-2.php?proid=<?php echo $row['ID']; ?>">
                                                    <?php echo $row['PropertyTitle']; ?></a></h3>
                                            <p class="homes-address mb-3">
                                                <a href="single-property-2.php?proid=<?php echo $row['ID']; ?>">
                                                    <i class="fa fa-map-marker"></i><span><?php echo $row['Address']; ?>
                                                        <?php echo $row['City']; ?>
                                                        <?php echo $row['State']; ?>
                                                        <?php echo $row['Country']; ?></span>
                                                </a>
                                            </p>
                                            <!-- homes List -->
                                            <ul class="homes-list clearfix">
                                                <li>
                                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                                    <span><?php echo $row['Bedrooms']; ?></span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-bath" aria-hidden="true"></i>
                                                    <span><?php echo $row['Bathrooms']; ?></span>
                                                </li>
                                                <li>
                                                    <i class="fa fa-object-group" aria-hidden="true"></i>
                                                    <span><?php echo $row['Area']; ?></span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                    <span><?php echo $row['Garages']; ?></span>
                                                </li>
                                            </ul>
                                            <!-- Price -->
                                            <div class="price-properties">
                                                <h3 class="title mt-auto">
                                                <i class="fa fa-rupee" style="font-size:24px"></i><?php echo $row['RentorsalePrice']; ?>
                                                </h3>
                                               
                                            </div>
                                            <div class="footer mt-auto">
                                                <a href="agent-details.html " class="title mt-auto">
                                                    <i class="fa fa-user"></i> <?php echo $row1['FullName']; ?>
                                                </a>
                                                <span>
                                                    <i class="fa fa-calendar"></i> 2 months ago
                                                </span>
                                            </div>
                                        </div>
                            </div><?php } ?>
                        </div><?php } ?>
                    </section><?php } ?>
                <!-- END SIMILAR PROPERTIES -->
                </div>
            </section>
            <!-- END SECTION PROPERTIES LISTING -->

            <!-- START FOOTER -->


            <?php

            include('includes/footer.php');
            ?>
            <!-- END FOOTER -->

            <!--register form -->
            <div class="login-and-register-form modal">
                <div class="main-overlay"></div>
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg"><i class="fa fa-times"></i></div>
                        <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                        <div class="soc-log fl-wrap">
                            <p>Login</p>
                            <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                            <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                        </div>
                        <div class="log-separator fl-wrap"><span>Or</span></div>
                        <div id="tabs-container">
                            <ul class="tabs-menu">
                                <li class="current"><a href="#tab-1">Login</a></li>
                                <li><a href="#tab-2">Register</a></li>
                            </ul>
                            <div class="tab">
                                <div id="tab-1" class="tab-contents">
                                    <div class="custom-form">
                                        <form method="post" name="registerform">
                                            <label>Username or Email Address * </label>
                                            <input type="email" class="form-control" name="email" id="email" required="true" placeholder="Email Address">
                                            <label>Password * </label>
                                            <input type="password" class="form-control" name="password" id="password" required="true" placeholder="Password">

                                            <button type="submit" name="signin" class="log-submit-btn" value="Sign In"><span>Log In</span></button>
                                            <div class="clearfix"></div>
                                            <div class="filter-tags">
                                                <input id="check-a" type="checkbox" name="check">
                                                <label for="check-a">Remember me</label>
                                            </div>
                                        </form>
                                        <div class="lost_password">
                                            <a href="change-password.php">Lost Your Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div id="tab-2" class="tab-contents">
                                        <div class="custom-form">
                                            <form class="main-register-form" method="post" name="signup">

                                                <label>First Name * </label>
                                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">

                                                <!-- .form-group end -->
                                                <label>Email Address *</label>
                                                <input type="email" class="form-control" name="email" id="email" required="true" placeholder="Email Address">

                                                <label>Mobile Number *</label>
                                                <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" maxlength="10" required="true" placeholder="Mobile Number" pattern="[0-9]{10}">

                                                <label>Password *</label>
                                                <input type="password" class="form-control" name="password" id="password" required="true" placeholder="Password" pattern="[A-Za-z0-9_!@#$%^&*()?]{6,30}">

                                                <div class="form-group">
                                                    <label>User Type *</label>
                                                    <input type="radio" name="usertype" value="1" checked="true">Broker &nbsp; &nbsp;<input type="radio" name="usertype" value="2">Owner &nbsp; &nbsp; <input type="radio" name="usertype" value="3">User
                                                </div>
                                                <!-- .form-group end -->

                                                <input type="submit" class="log-submit-btn" name="signup" value="Register">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--register form end -->

            <!-- ARCHIVES JS -->
            <script src="js/jquery-3.5.1.min.js"></script>
            <script src="js/jquery-ui.js"></script>
            <script src="js/range-slider.js"></script>
            <script src="js/tether.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/mmenu.min.js"></script>
            <script src="js/mmenu.js"></script>
            <script src="js/slick.min.js"></script>
            <script src="js/slick4.js"></script>
            <script src="js/fitvids.js"></script>
            <script src="js/smooth-scroll.min.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/popup.js"></script>
            <script src="js/ajaxchimp.min.js"></script>
            <script src="js/newsletter.js"></script>
            <script src="js/timedropper.js"></script>
            <script src="js/datedropper.js"></script>
            <script src="js/leaflet.js"></script>
            <script src="js/leaflet-gesture-handling.min.js"></script>
            <script src="js/leaflet-providers.js"></script>
            <script src="js/leaflet.markercluster.js"></script>
            <script src="js/map-single.js"></script>
            <script src="js/color-switcher.js"></script>
            <script src="js/swiper.min.js"></script>
            <script src="js/inner.js"></script>
            <script src="assets/js/jquery-2.2.4.min.js"></script>
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/functions.js"></script>
            <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
            <script src="assets/js/plugins/jquery.gmap.min.js"></script>

            <script>
                var swiper = new Swiper('.swiper-container', {
                    slidesPerView: 3,
                    slidesPerGroup: 1,
                    loop: true,
                    loopFillGroupWithBlank: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 1,
                            spaceBetween: 40,
                        },
                        1024: {
                            slidesPerView: 5,
                            spaceBetween: 50,
                        },
                    }
                });
            </script>
            <script>
                $('#googleMap').gMap({
                    address: "121 King St,Melbourne, Australia",
                    zoom: 12,
                    maptype: 'ROADMAP',
                    markers: [{
                        address: "Melbourne, Australia",
                        maptype: 'ROADMAP',
                        icon: {
                            image: "assets/images/gmap/marker1.png",
                            iconsize: [52, 75],
                            iconanchor: [52, 75]
                        }
                    }]
                });
            </script>

            <!-- Date Dropper Script-->
            <script>
                $('#reservation-date').dateDropper();
            </script>
            <!-- Time Dropper Script-->
            <script>
                this.$('#reservation-time').timeDropper({
                    setCurrentTime: false,
                    meridians: true,
                    primaryColor: "#e8212a",
                    borderColor: "#e8212a",
                    minutesInterval: '15'
                });
            </script>

            <script>
                $(document).ready(function() {
                    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                        disableOn: 700,
                        type: 'iframe',
                        mainClass: 'mfp-fade',
                        removalDelay: 160,
                        preloader: false,
                        fixedContentPos: false
                    });
                });
            </script>

            <script>
                $('.slick-carousel').each(function() {
                    var slider = $(this);
                    $(this).slick({
                        infinite: true,
                        dots: false,
                        arrows: false,
                        centerMode: true,
                        centerPadding: '0'
                    });

                    $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                        slider.slick('slickPrev');
                    });
                    $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                        slider.slick('slickNext');
                    });
                });
            </script>

    </div>

    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/single-property-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:21 GMT -->

</html>