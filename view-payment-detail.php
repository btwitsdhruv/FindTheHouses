<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status='Answer';
   $query=mysqli_query($con, "update  tblenquiry set Remark='$remark',Status='$status' where ID='$cid'");
    if ($query) {
    $msg="All remarks has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
} 

?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/my-listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:55 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Find Houses - HTML5 Template</title>
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
	.mytd{
		background:whitesmoke;
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
          <section class="user-page section-padding pt-5 ">
            <div class="container-fluid">
                <div class="row">
                                   <?php

include('includes/sidebar.php');
?>
                                    <div class="my-properties">
									<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                 <?php
 $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from payment where user_id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>     
                            <table class="table-responsive">
                                
                                    <tr style="background-color:lightblue;">
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>MobileNumber</th>
                                <th>Order Number</th>
                                <th>Property Title</th>
                                <th>Payment you have done</th>
                                <th>Owner Name</th>
                                <th>Owner Mobile</th>
                                <th>Owner Email</th>

                                    </tr>
                                
                                
                                <tr style="color:black;">
    <td class="mytd"><?php  echo $row['user_name'];?></td>
                              
                                   <td class="mytd"><?php  echo $row['user_email'];?></td>
                                   
                                 
                               
                                   <td class="mytd"><?php  echo $row['user_phone'];?></td>
                                 
                                   
                                  
                                      <td class="mytd"><?php  echo $row['booking_id'];?></td>
                                
                                   <td class="mytd"><?php  echo $row['property_name'];?></td>
                                    
                                     
                                        <td class="mytd"><?php  echo $row['property_price'];?></td>
                                    
                                    <?php 
                                    $owner_id = $row['owner_id'];
                                       $sqlq = mysqli_query($con, "select * from tbluser where ID='$owner_id'");
                                       while ($ret = mysqli_fetch_array($sqlq)) {
                                           $fname = $ret['FullName'];
                                           $uemail = $ret['Email'];
                                           $mnumebr = $ret['MobileNumber'];
                                       }
                                    ?>
                                

                                   
                                        <td class="mytd"><?php echo $fname; ?></td>
                                 
                                        <td class="mytd"><?php echo $mnumebr; ?></td>
                                    
                                        <td class="mytd"><?php echo $uemail; ?></td>
                                   
                                  
										
										
										
										
										
										
										
			
                                        
                                    </tr>
                                </thead>


    
</table>

                                    </div>
   
                                </div>
               <table class="table mb-0">



  

  

<?php } ?>

                           
                           
                       
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
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


<!-- Mirrored from code-theme.com/html/findhouses/my-listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:55 GMT -->
</html>
 <?php } ?>