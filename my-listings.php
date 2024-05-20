
<?php
session_start();
include('dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['remsuid']==0|| $_SESSION['ut']==3)) {
  header('location:logout.php');
  } else{?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/my-listings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:55 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Find Houses - </title>
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
</head>

<body class="maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <div class="dash-content-wrap">
        <?php
include('includes/header-2.php');
?>        </div>
        <section class="user-page section-padding pt-5">
            <div class="container-fluid">
                <div class="row">
                                   <?php

include('includes/sidebar.php');
?>
      
                        <div class="my-properties">
                            <table class="table-responsive">
							
                                <thead>
                                    <tr>
                                        <th class="pl-2">My Properties</th>
                                        <th class="p-0"></th>
                                        <th>Date Added</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
                      $uid=$_SESSION['remsuid'];
$query=mysqli_query($con,"select * from tblproperty where UserID='$uid'");
$num=mysqli_num_rows($query);
if($num>0){
while($row=mysqli_fetch_array($query))
{
?>
                                    <tr>
                                        <td class="image myelist">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>"><img alt="my-properties-3" src="propertyimg/<?php echo $row['FeaturedImage'];?>" class="img-fluid"></a>
                                        </td>
                                        <td>
                                            <div class="inner">
                                                <a href="single-property-2.php?proid=<?php echo $row['ID'];?>"><h2><?php echo $row['PropertyTitle'];?></h2></a>
                                                <figure><i class="lni-map-marker"></i> <?php echo $row['Address'];?>&nbsp;
<?php echo $row['City'];?>&nbsp;
<?php echo $row['State'];?>&nbsp;  
<?php echo $row['Country'];?></figure>
                                                
                                            </div>
                                        </td>
                                        <td><?php echo $row['ListingDate'];?></td>
                                        
                                        <td class="actions">
                                            <a href="edit-property.php?editid=<?php echo $row['ID'];?>" class="edit"><i class="fas fa-edit"></i>Edit</a>
                                            <a href="delete.php?deleteid=<?php echo $row['ID'];?>"><i class="far fa-trash-alt"></i>Delete</a>
                                        </td>
<?php } } else { ?>
   <h3 style="color:red" align="center"> No Properties added yet </h3>
        <?php } ?>               
                                           <tr>
                                        
                                </tbody>
                            </table>
                            
                        </div>
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