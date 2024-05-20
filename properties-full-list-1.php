
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


<!-- Mirrored from code-theme.com/html/findhouses/properties-full-list-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:05 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>List View</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/aos2.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
	<style>
	.img-card img{
		width:230px;
		height:300px;
	}
	.card{
		height:500px;
		margin-left:10px;
		padding-top:10px;
		
	}
	</style>
</head>

<body class="inner-pages homepage-4 agents list hp-6 full hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <?php 
include('header2.php');?>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="properties-list full featured portfolio blog">
            <div class="container">
                <section class="headings-2 pt-0 pb-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p><a href="index.html">Home </a> &nbsp;/&nbsp; <span>Listings</span></p>
                                </div>
                                <h3>List View</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Search Form -->
                <div class="col-12 px-0 parallax-searchs">
                    <div class="banner-search-wrap">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs_1">
                                <div class="rld-main-search">
                                    <div class="row">
                                       
                                        <div class="rld-single-select ml-22">
										<form class="mb-0" method="post" name="search" action="properties-full-list-1.php">
                                            <select class="select single-select"  name="type" id="type" >
                                                <option value="1">Property Type</option>
                                                 <?php $query1=mysqli_query($con,"select * from tblpropertytype");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>      
                  <option value="<?php echo $row1['PropertType'];?>"><?php echo $row1['PropertType'];?></option>
                  <?php } ?>
                                            </select>
                                        </div>
                                        <div class="rld-single-select">
                                            <select class="select single-select mr-0" name="city" id="city">
                                                <option value="1">City</option>
                                               <?php
$query=mysqli_query($con,"select distinct City from  tblproperty");
while($row=mysqli_fetch_array($query))
{
?>
                  <option value="<?php echo $row['City'];?>"><?php echo $row['City'];?></option>
                  <?php } ?>
                                            </select>
                                        </div>
										<div class="col-xs-10 col-sm-2 col-md-2">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    
                                                           
                                                    <select name="status" id="status" required="true"class="nice-select form-control wide" tabindex="0">
                                        <option value=""><span><i class="fa fa-bed" aria-hidden="true"></i>Select Status</span></option>
                                        <?php
$query2=mysqli_query($con,"select distinct Status from  tblproperty");
while($row2=mysqli_fetch_array($query2))
{
?>
                                        <option value="<?php echo $row2['Status'];?>"><?php echo $row2['Status'];?></option>
                                        <?php } ?>
                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                                                               <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                          
															<input type="submit" value="Search" name="search" class="btn btn-yellow">
                                                        </div>
														</form>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Search Form -->
                <section class="headings-2 pt-0">
				
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left"><?php 
					$State=$_POST['State'];
				$city=$_POST['city'];
$type=$_POST['type'];
$status=$_POST['status'];

				$sql="select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where(tblproperty.City='$city' and tblproperty.Type='$type' and tblproperty.Status='$status' and tblproperty.State='$State')";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
   printf("Search results %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }
?>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
								             
 <!-- Block heading end -->
	
                <div class="row featured portfolio-items">
							<?php
							
$city=$_POST['city'];
$type=$_POST['type'];
$status=$_POST['status'];

$query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where( tblproperty.City='$city' and tblproperty.Type='$type' and tblproperty.Status='$status')");

$num=mysqli_num_rows($query);
if($num>0){
while($row=mysqli_fetch_array($query))
{
?>

                    <div class="item col-lg-4 col-md-12 col-xs-12 landscapes sale pr- pb-2" data-aos="fade-up" width='3000' height='3000'>
                        <div class="project-single mb-44 bb-0">
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <!-- homes img -->
                                    <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="homes-img">
                                        <div class="homes-tag button alt featured"><?php echo $row['Type'];?></div>
                                        <div class="homes-tag button alt sale"><?php echo $row['Status'];?></div>
                                        <div class="homes-price"><?php echo $row['RentorsalePrice'];?></div>
										<div class="img-card">
                                        <img src="propertyimg/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>" class="img-responsive">
										</div>
                                    </a>
                                </div>
                                <div class="button-effect">
                                    <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                    <a href="https://www.youtube.com/watch?v=14semTlwyUY" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                    <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- homes content -->
                    <div class="col-lg-8 col-md-12 homes-content pb-5 mb-1" data-aos="fade-up">
                        <!-- homes address -->
                        <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>"><?php echo $row['PropertyTitle'];?></a></h3>
                        <p class="homes-address mb-3">
                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
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
                                        <span><?php echo $row['Bedrooms'];?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-bath" aria-hidden="true"></i>
                                        <span><?php echo $row['Bathrooms'];?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-object-group" aria-hidden="true"></i>
                                        <span><?php echo $row['Area'];?></span>
                                    </li>
                                    <li>
                                        <i class="fas fa-warehouse" aria-hidden="true"></i>
                                        <span><?php echo $row['Garages'];?></span>
                                    </li>
                                </ul>
                        <div class="footer">
						
                            <a href="agent-details.html">
			

                                
                            </a>
                            <span>
                                <i class="fa fa-calendar"></i> <?php echo $row['ListingDate'];?>
                            </span>

                        </div>
                    </div><?php }} else{ ?>

           <h2 align="center" style="color:red">No Record found</h2>
					
           <?php }?> 
               
					
                    
                <nav aria-label="..." class="pt-0">
                    <ul class="pagination lis-view">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->

        <!-- START FOOTER -->
        <footer class="first-footer">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="netabout">
                                <a href="index.html" class="logo">
                                    <img src="images/logo-footer.svg" alt="netcom">
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
                            </div>
                            <div class="contactus">
                                <ul>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <p class="in-p">95 South Park Avenue, USA</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <p class="in-p">+456 875 369 208</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <p class="in-p ti">support@findhouses.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="navigation">
                                <h3>Navigation</h3>
                                <div class="nav-footer">
                                    <ul>
                                        <li><a href="index.html">Home One</a></li>
                                        <li><a href="properties-right-sidebar.html">Properties Right</a></li>
                                        <li><a href="properties-full-list.html">Properties List</a></li>
                                        <li><a href="properties-details.html">Property Details</a></li>
                                        <li class="no-mgb"><a href="agents-listing-grid.html">Agents Listing</a></li>
                                    </ul>
                                    <ul class="nav-right">
                                        <li><a href="agent-details.html">Agents Details</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog.html">Blog Default</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li class="no-mgb"><a href="contact-us.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget">
                                <h3>Twitter Feeds</h3>
                                <div class="twitter-widget contuct">
                                    <div class="twitter-area">
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="newsletters">
                                <h3>Newsletters</h3>
                                <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
                            </div>
                            <form class="bloq-email mailchimp form-inline" method="post">
                                <label for="subscribeEmail" class="error"></label>
                                <div class="email">
                                    <input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                                    <input type="submit" value="Subscribe">
                                    <p class="subscription-success"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-footer">
                <div class="container">
                    <p>2021 © Copyright - All Rights Reserved.</p>
                    <ul class="netsocials">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
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
                                                          <label>Email Address  *</label>
                                                                <input type="email" class="form-control" name="email" id="email" required="true" placeholder="Email Address">
                                                           
                                                            <label>Mobile Number  *</label>
                                                                <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" maxlength="10" required="true" placeholder="Mobile Number" pattern="[0-9]{10}">
                                                          
                                                        <label>Password *</label>
                                                                <input type="password" class="form-control" name="password" id="password" required="true" placeholder="Password" pattern="[A-Za-z0-9_!@#$%^&*()?]{6,30}">
                                                            
                                                             <div class="form-group">
                                                             <label>User Type *</label>  
                                                                <input type="radio" name="usertype" value="1" checked="true">Broker &nbsp; &nbsp;<input type="radio" name="usertype" value="2" >Owner &nbsp; &nbsp; <input type="radio" name="usertype" value="3">User
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
        <script src="js/rangeSlider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos2.js"></script>
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

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });

        </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/properties-full-list-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:05 GMT -->
</html>
