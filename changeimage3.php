<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
$cid=$_GET['editid'];

//fetured Image
//Property  Image 1
$pic3=$_FILES["galleryimage3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));

// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension3,$allowed_extensions))
{
echo "<script>alert(' Property gallery image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}

else
{
//rename property images
$propic3=md5($pic3).time().$extension3;

     move_uploaded_file($_FILES["galleryimage3"]["tmp_name"],"propertyimg/".$propic3);
   

    $query=mysqli_query($con,"update tblproperty set GalleryImage3='$propic3' where ID='$cid'");
  
    if ($query) {
    $msg="Property Image has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  }
 }
  ?>
 
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:55 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Find Houses </title>
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
	 <script>
function getsate(val) {
  $.ajax({
type:"POST",
url:"get-sate.php",
data:'$countryid='+val,
success:function(data){
$("#state").html(data);
}

  });
}
</script>

<script>
function getcity(val1) {
  $.ajax({
type:"POST",
url:"get-sate.php",
data:'$stateid='+val1,
success:function(data){
$("#city").html(data);
}

  });
}
</script>
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
                                <?php if (strlen($_SESSION['remsuid']!=0)) {?>
                                <a href="#" data-toggle="dropdown" >My Account</a>
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
                        <!-- Left Side Content / End -->
                        <!-- Right Side Content / -->
                        <?php
  $uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");


while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="header-user-menu user-menu">
                            <div class="header-user-name">
                                Hi,<?php  echo $row['FullName'];?>
                            </div>
                            
                        </div>
<?php }?>
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
           <form class="mb-0" method="post"  enctype="multipart/form-data">
                        <div class="single-add-property">
                             <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblproperty where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>       
                            
                        <div class="single-add-property">
                            <h3>property Media</h3>
                            <div class="property-form-group">
                                <div class="row">
                                     <div class="form-box1">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 style="font-size:20px; color:white;" class="form--title">Property Gallery</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image3</label>
                                           <img src="propertyimg/<?php echo $row['GalleryImage3'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage3'];?>">                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
									 <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">New Gallery Image3</label>
                                            <input type="file" class="form-control" name="galleryimage3" required='true'>
                                        </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                        
                       
                            </div>
                        </div>
						 <?php } ?>
                        <div class="single-add-property">
                            
                            <center>
                            <div class="add-property-button pt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="prperty-submit-button">
										
                                            <button type="submit" value="Save Edits" name="submit" >Submit Property</button>
											
											
											 
                                        </div>
                                    </div>
                                </div>
                            </div></center>
                        </div>
                    </div>   
                                </form>
  </div>
            </div>
        </section>
        <!-- END SECTION USER PROFILE -->

        <!-- START FOOTER -->
        <footer class="first-footer">
            <div class="second-footer">
                <div class="container">
                    
                    <p> <i class="fa fa-heart" aria-hidden="true"></i>2021 © Copyright - All Rights Reserved.</p>
                </div>
            </div>
        </footer>

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
        <script src="js/popper.min.js"></script>
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

        <!-- MAIN JS -->
        <script src="js/script.js"></script>
        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
            });

        </script>
        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });

        </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:56 GMT -->
</html>
  <?php }?>