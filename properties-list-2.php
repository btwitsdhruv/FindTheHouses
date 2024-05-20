<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['signup']))
  {
    $fname=$_POST['fullname'];
     $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $usertype=$_POST['usertype'];
       $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
 echo "<script>alert('This email already associated with another account');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, Email, MobileNumber, Password,UserType) value('$fname', '$email','$mobno', '$password','$usertype' )");
    if ($query) {
 echo "<script>alert('You have successfully registered');</script>";
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}

//code for login
if(isset($_POST['signin']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID,UserType,Email from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
$_SESSION['ut']=$ret['UserType'];
$_SESSION['remsuid']=$ret['ID'];
$_SESSION['uemail']=$ret['Email'];

     header('location:index.php');
    }
    else{
   echo "<script>alert('Invalid Details');</script>";
    }
  }

?><!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/properties-list-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:05 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Properties List Right Sidebar</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/aos2.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages listing st-1 agents hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <?php include('header2.php');?>

		<?php
//Getting default page number
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
// Formula for pagination
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;
// Getting total number of pages
        $total_pages_sql = "SELECT COUNT(*) FROM tblproperty";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State LIMIT $offset, $no_of_records_per_page");
while($row=mysqli_fetch_array($query))
{
?>
        <section class="properties-right list featured portfolio blog pt-5">
            <div class="container">
               <section class="headings-2 pt-0 pb-55">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p class="pb-2"><a href="index.html">Home </a> &nbsp;/&nbsp; <span>Listings</span></p>
                                </div>
                                <h3>Grid View</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-12 col-md-12 blog-pots">
                       <section class="headings-2 pt-0">
                            <div class="pro-wrapper">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <div class="text-heading text-left">
                                            <p class="font-weight-bold mb-0 mt-3"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center grid">
                                    
                                    <div class="sorting-options">
                                        <a href="properties-list-2.php" class="change-view-btn active-view-btn"><i class="fa fa-th-list"></i></a>
                                        <a href="properties-grid.php" class="change-view-btn lde"><i class="fa fa-th-large"></i></a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <center>

                            <div class="row featured portfolio-items">
                                
                                <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 20");
while($row=mysqli_fetch_array($query))
{
    ?>
                             <div class="item col-lg-4 col-md-12 col-xs-9 landscapes sale pr-1 pb-0" data-aos="fade-up" >
                                 <div class="project-single mb-44 bb-0">
                                     <div class="project-inner project-head">
                               
                                         <div class="project-bottom">
                                             <h4><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">View Property</a><span class="category">Real Estate</span></h4>
                                            </div>
                                            <div class="homes">
                                                <!-- homes img -->
                                                <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="homes-img">
                                                    <div class="homes-tag button alt featured"><?php echo $row['Type'];?></div>
                                                <div class="homes-tag button alt sale"><?php echo $row['Status'];?></div>
                                                <div class="homes-price"><?php echo $row['RentorsalePrice'];?></div>
                                                <img src="propertyimg/<?php echo $row['FeaturedImage'];?>" class="img-responsive">
                                            </a>
											
                                        </div>
										
                                        
										
										
                                        <div class="button-effect">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                </div>
</div>
                            <!-- homes content -->
                            <div class="col-lg-8 col-md-12 homes-content pb-5 mb-1" data-aos="fade-up">
                                <!-- homes address -->
                                <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
                                    <?php echo $row['PropertyTitle'];?></a></h3>
                                    <p class="homes-address mb-3">
                                        <a href="single-property-2.php">
                                            <i class="fa fa-map-marker"></i><span><?php echo $row['Address'];?>&nbsp;
                                            <?php echo $row['City'];?>&nbsp;
<?php echo $row['StateName'];?>&nbsp;  
<?php echo $row['CountryName'];?></span>
</a>



</p>
<!-- homes List -->
<ul class="homes-list clearfix">
    <li>
                                        <i class="fa fa-bed" aria-hidden="true"></i>
                                        <span><?php echo $row['Bedrooms'];?>-Bedrooms</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-bath" aria-hidden="true"></i>
                                        <span><?php echo $row['Bathrooms'];?>-Bathrooms</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-object-group" aria-hidden="true"></i>
                                        <span><?php echo $row['Area'];?>- Area</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-warehouse" aria-hidden="true"></i>
                                        <span><?php echo $row['Garages'];?></span>
                                    </li>
                                </ul>
                                <!-- Price -->
                                <div class="price-properties">
                                    <h3 class="title mt-3">
                                        <a href="single-property-2.php"><i class="fa fa-rupee" style="font-size:20px"></i>&nbsp;<?php echo $row['RentorsalePrice'];?></a>
                                    </h3>
                                  
                                    <span>
                                        <i class="fa fa-calendar"></i> <?php echo $row['ListingDate'];?>
                                    </span>
                                </div>
                            </div>
							<?php }?> 
                        </div>
                    </div>
                </div>
<?php }?>
</center>
                <nav aria-label="..." class="agents pt-55">
                    
                    
                    <ul class="pagination disabled">
                        <li  class="page-item active"><a class="page-link"  href="?pageno=1"><?php echo "".($pageno - 0);?><span class="sr-only">(current)</span></a></li>
                        
<li class="page-item">
            <a  href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"  tabindex="-1">Prev</a>
        </li>
        
        <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
					
					
					

					
					
                </nav>
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->

        <?php

include('includes/footer.php');
?>
        

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/rangeSlider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos2.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick4.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/light.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/popup.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/inner.js"></script>
        <script src="js/color-switcher.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/properties-list-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:05 GMT -->
</html>
