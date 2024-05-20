<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['remsuid'];
    $fullname=$_POST['fullname'];
	
  $mobno=$_POST['mobilenumber'];
  $emaiil=$_POST['email'];
  $aboutme=$_POST['aboutme'];
 
     $query=mysqli_query($con, "update tbluser set FullName ='$fullname', MobileNumber='$mobno',Aboutme ='$aboutme',Email ='$emaiil' where ID='$uid'");
    if ($query) {
    $msg="User profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }

?>
 
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:55 GMT -->
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
	<style>
	.header-user-name:before {
  font-family: "FontAwesome";
  content: "\f0d7";
  position: absolute;
  color: #666;
  bottom: 1px;
  font-size: 13px;
  right: -16px;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}
.user-profile-box .profile-img {
    border-radius: 10%;
    background-clip: padding-box;
    border: 5px solid blue;
    bottom: 5px;
    float: left;
    height: 100px;
    width: 100px;
    left: 59.5%;
    margin-left: -75px;
    position: absolute;
    -webkit-box-shadow: 0 0 0 0 rgb(0 0 0 / 10%), 0 3px 3px 0 rgb(0 0 0 / 10%);
    box-shadow: 0 0 0 0 rgb(0 0 0 / 10%), 0 3px 3px 0 rgb(0 0 0 / 10%);
}
</style>

</head>

<body class="maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
        <?php
include('includes/header-2.php');
?>
        </div>
        <section class="user-page section-padding pt-5">
            <div class="container-fluid">
                <div class="row">
                   
				   
                        <?php

include('includes/sidebar.php');
?>
                     
                    
                    <div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-33 mt-0 offset-lg-2 offset-md-3">
                       
                        <div class="widget-boxed-header">
                            <h4>Profile Details</h4>
                        </div>
						 
                        <div class="sidebar-widget author-widget2">
								<?php
								
  $uid=$_SESSION['remsuid'];
   
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");


while ($row=mysqli_fetch_array($ret)) {

?>
<div class="author-box clearfix">
							 
							
							
                               <Center> <h1 class="author__title"><?php  echo $row['FullName'];?></h1></center>
<p class="author__meta"><?php  }?>
								<?php
								$sql= "SELECT * FROM tbluser WHERE ID='$uid'";
								$check = mysqli_query($con,$sql);
								while($fetch = mysqli_fetch_array($check)) {
									if($fetch['UserType'] == 1) {
										echo "Broker";
									}
									elseif($fetch['UserType'] == 2) {
										echo "Owner";
									}
									else {
										echo "User";
									}
								}
								
								?></p>
                            </div>

      
                            
                            <ul class="author__contact">
                                <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>VADODARA INDIA</li>
								<?php $ret5=mysqli_query($con,"select * from tbluser where ID='$uid'");


while ($row5=mysqli_fetch_array($ret5)) { ?>
                                <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#"><?php  echo $row5['MobileNumber'];?></a></li>
<li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#"><?php  echo $row5['Email']; }?></a></li>
                            </ul>
                            <div class="agent-contact-form-sidebar">
                                
								
								
									
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								<form method="POST" action="upload.php"  enctype="multipart/form-data">
								<label for="full-name">User Image</label>
								 <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" >
								 
								 <input type="submit" name="submit" value="upload"class="multiple-send-message">
</form>
								
								
								<form class="mb-0" method="post">
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            
                            <div class="form-box">
                                <?php
  $uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");


while ($row=mysqli_fetch_array($ret)) {

?>
                                <h4 class="form--title">Personal Details</h4>
								
								
								
                                <div class="form-group">
                                    <label for="full-name">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" required="true" value="<?php  echo $row['FullName'];?>">
                                </div>
                              
                                <div class="form-group">
                                    <label for="email-address">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email"  value="<?php  echo $row['Email'];?>">
                                </div>
                                <!-- .form-group end -->
                                <div class="form-group">
                                    <label for="phone-number">Mobile Number</label>
                                    <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" required="true" value="<?php  echo $row['MobileNumber'];?>">
                                </div>
                                <!-- .form-group end -->
                                <div class="form-group">
                                    <label for="about-me">About Me</label>
                                    <textarea class="form-control" name="aboutme" id="aboutme" rows="2" required="true"><?php  echo $row['Aboutme'];?></textarea>
                                </div>
                                <!-- .form-group end -->
                            </div>
                            <?php }?>
                            
                            <input type="submit" value="Save Edits" name="submit" class="multiple-send-message">
                        </form>
								
								
								
								
								
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION USER PROFILE -->

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


<!-- Mirrored from code-theme.com/html/findhouses/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:55 GMT -->
</html>
<?php }  ?>