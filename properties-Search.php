
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


<!-- Mirrored from code-theme.com/html/findhouses/properties-grid-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:02 GMT -->
<head>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Properties Full Grid</title>
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
</head>
	
</head>

<body class="inner-pages listing homepage-4 agents hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <?php 
include('header2.php');?>

        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION PROPERTIES LISTING -->
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
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <section class="headings-2 pt-0">
                            <div class="pro-wrapper">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <div class="text-heading text-left">
                                            <p class="font-weight-bold mb-0 mt-3">8 Search results</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center grid">
                                    <div class="input-group border rounded input-group-lg w-auto mr-4">
                                        <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
                                        <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                                            <option selected>Top Selling</option>
                                            <option value="1">Most Viewed</option>
                                            <option value="2">Price(low to high)</option>
                                            <option value="3">Price(high to low)</option>
                                        </select>
                                    </div>
                                    <div class="sorting-options">
                                        <a href="properties-list-2.php" class="change-view-btn lde"><i class="fa fa-th-list"></i></a>
                                        <a href="properties-grid.php " class="change-view-btn active-view-btn"><i class="fa fa-th-large"></i></a>
                                    </div>
                                </div>
                            </div>
                        </section>
						 	<?php
$city=$_POST['city'];
$type=$_POST['type'];
$status=$_POST['status'];
$query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where(tblproperty.City='$city' and tblproperty.Type='$type' and tblproperty.Status='$status')");
$num=mysqli_num_rows($query);
if($num>0){
while($row=mysqli_fetch_array($query))
{
?>
                <div class="row featured portfolio-items">
                    <div class="item col-lg-6 col-md-4 col-xs-24 landscapes sale">
                        <div class="project-single" data-aos="fade-up">
                            <div class="project-inner project-head">
                                <div class="project-bottom">
                                    <h4><a href="single-property-detail.php?proid=<?php echo $row['ID'];?>">View Property</a><span class="category">click here</span></h4>
                                </div>
                                <div class="homes">
                                    <!-- homes img -->
                                    <a href="single-property-1.html" class="homes-img">
                                        <div class="homes-tag button alt featured">Featured</div>
                                        <div class="homes-tag button alt sale"><?php echo $row['Status'];?></div>
                                        <div class="homes-price"><?php echo $row['Type'];?></div>
                                        <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>" class="img-responsive">
                                    </a>
                                </div>
                                <div class="button-effect">
                                    <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                    <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                    <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                </div>
                            </div>
                            <!-- homes content -->
                            <div class="homes-content">
                                <!-- homes address -->
                                <h3><a href="single-property-detail.php?proid=<?php echo $row['ID'];?>"> <?php echo $row['PropertyTitle'];?></a></h3>
                                <p class="homes-address mb-3">
                                    <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>">
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
                                <!-- Price -->
                                <div class="price-properties">
                                    <h3 class="title mt-3">
                                <a href="single-property-1.html"><?php echo $row['RentorsalePrice'];?></a>
                                </h3>
                                    <div class="compare">
                                        <a href="#" title="Compare">
                                            <i class="fas fa-exchange-alt"></i>
                                        </a>
                                        <a href="#" title="Share">
                                            <i class="fas fa-share-alt"></i>
                                        </a>
                                        <a href="#" title="Favorites">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="footer">
                                    <a href="agent-details.html">
                                        <i class="fa fa-user"></i> Jhon Doe
                                    </a>
                                    <span>
                                <i class="fa fa-calendar"></i> 2 months ago
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
					 </div>
					<?php }} else{ ?>

           <h2 align="center" style="color:red">No Record found</h2>

           <?php }?> 
		  	






                        </div>
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="widget">
                            <!-- Search Fields -->
                            <div class="widget-boxed main-search-field">
                                <div class="widget-boxed-header">
                                    <h4>Find Your House</h4>
                                </div>
                                <!-- Search Form -->
                                <div class="trip-search">
                                    <form class="form">
                                        <!-- Form Lookin for -->
                                        <div class="form-group looking">
                                            <div class="first-select wide">
                                                <div class="main-search-input-item">
                                                    <input type="text" placeholder="Enter Keyword..." value="" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ End Form Lookin for -->
                                        <!-- Form Location -->
                                        <div class="form-group location">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-map-marker"></i>Location</span>
                                                <ul class="list">
												 <?php
$query3=mysqli_query($con,"select distinct Type from  tblproperty");
while($row3=mysqli_fetch_array($query3))
{
?>
                                                    <li class="option selected "><a href="protypewis-property-detail.php?protypeid=<?php echo $row3['Type'];?>"><?php echo $row3['Type'];?></a></li>
                                                   <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Form Location -->
                                        <!-- Form Categories -->
                                        <div class="form-group categories">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home" aria-hidden="true"></i>Property Type</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option selected ">House</li>
                                                    <li data-value="2" class="option">Apartment</li>
                                                    <li data-value="3" class="option">Condo</li>
                                                    <li data-value="3" class="option">Land</li>
                                                    <li data-value="3" class="option">Bungalow</li>
                                                    <li data-value="3" class="option">Single Family</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Form Categories -->
                                        <!-- Form Property Status -->
                                        <div class="form-group categories">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home"></i>Property Status</span
											                  <?php
$query4=mysqli_query($con,"select distinct Status from  tblproperty");
while($row4=mysqli_fetch_array($query4))
{
?>
                                                <ul class="list">
                                                    <li data-value="1" class="option"><?php echo $row4['Status'];?></a></li>
<li data-value="2" class="option"><?php echo $row4['Status'];?></a></li>	
                                                </ul>
												<?php }?>
                                            </div>
                                        </div>
                                        <!--/ End Form Property Status -->
                                        <!-- Form Bedrooms -->
                                        <div class="form-group beds">
	
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bed" aria-hidden="true"></i> Bedrooms</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option selected">1</li>
                                                    <li data-value="2" class="option">2</li>
                                                    <li data-value="3" class="option">3</li>
                                                    <li data-value="3" class="option">4</li>
                                                    <li data-value="3" class="option">5</li>
                                                    <li data-value="3" class="option">6</li>
                                                    <li data-value="3" class="option">7</li>
                                                    <li data-value="3" class="option">8</li>
                                                    <li data-value="3" class="option">9</li>
                                                    <li data-value="3" class="option">10</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Form Bedrooms -->
                                        <!-- Form Bathrooms -->
                                        <div class="form-group bath">
                                            <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bath" aria-hidden="true"></i> Bathrooms</span>
                                                <ul class="list">
                                                    <li data-value="1" class="option selected">1</li>
                                                    <li data-value="2" class="option">2</li>
                                                    <li data-value="3" class="option">3</li>
                                                    <li data-value="3" class="option">4</li>
                                                    <li data-value="3" class="option">5</li>
                                                    <li data-value="3" class="option">6</li>
                                                    <li data-value="3" class="option">7</li>
                                                    <li data-value="3" class="option">8</li>
                                                    <li data-value="3" class="option">9</li>
                                                    <li data-value="3" class="option">10</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--/ End Form Bathrooms -->
                                    </form>
                                </div>
                                <!--/ End Search Form -->
                                <!-- Price Fields -->
                                <div class="main-search-field-2">
                                    <!-- Area Range -->
                                    <div class="range-slider">
                                        <label>Area Size</label>
                                        <div id="area-range" data-min="0" data-max="1300" data-unit="sq ft"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <br>
                                    <!-- Price Range -->
                                    <div class="range-slider">
                                        <label>Price Range</label>
                                        <div id="price-range" data-min="0" data-max="600000" data-unit="$"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!-- More Search Options -->
                                <a href="#" class="more-search-options-trigger margin-bottom-10 margin-top-30" data-open-title="Advanced Features" data-close-title="Advanced Features"></a>

                                <div class="more-search-options relative">
                                    <!-- Checkboxes -->
                                    <div class="checkboxes one-in-row margin-bottom-10">
                                        <input id="check-2" type="checkbox" name="check">
                                        <label for="check-2">Air Conditioning</label>
                                        <input id="check-3" type="checkbox" name="check">
                                        <label for="check-3">Swimming Pool</label>
                                        <input id="check-4" type="checkbox" name="check">
                                        <label for="check-4">Central Heating</label>
                                        <input id="check-5" type="checkbox" name="check">
                                        <label for="check-5">Laundry Room</label>
                                        <input id="check-6" type="checkbox" name="check">
                                        <label for="check-6">Gym</label>
                                        <input id="check-7" type="checkbox" name="check">
                                        <label for="check-7">Alarm</label>
                                        <input id="check-8" type="checkbox" name="check">
                                        <label for="check-8">Window Covering</label>
                                        <input id="check-9" type="checkbox" name="check">
                                        <label for="check-9">WiFi</label>
                                        <input id="check-10" type="checkbox" name="check">
                                        <label for="check-10">TV Cable</label>
                                        <input id="check-11" type="checkbox" name="check">
                                        <label for="check-11">Dryer</label>
                                        <input id="check-12" type="checkbox" name="check">
                                        <label for="check-12">Microwave</label>
                                        <input id="check-13" type="checkbox" name="check">
                                        <label for="check-13">Washer</label>
                                        <input id="check-14" type="checkbox" name="check">
                                        <label for="check-14">Refrigerator</label>
                                        <input id="check-15" type="checkbox" name="check">
                                        <label for="check-15">Outdoor Shower</label>
                                    </div>
                                    <!-- Checkboxes / End -->
                                </div>
                                <!-- More Search Options / End -->
                                <div class="col-lg-12 no-pds">
                                    <div class="at-col-default-mar">
                                        <button class="btn btn-default hvr-bounce-to-right" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-boxed mt-5">
                                <div class="widget-boxed-header mb-5">
                                    <h4>Feature Properties</h4>
                                </div>
                                <div class="widget-boxed-body">
                                    <div class="slick-lancers">
                                        <div class="agents-grid mr-0">
                                            <div class="listing-item compact">
																		                                 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                               <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>" class="listing-img-container">
												
                                                    <div class="listing-badges">
													
                                                        <span class="featured"><?php echo $row['RentorsalePrice'];?></span>
                                                        <span><?php echo $row['Status'];?></span>
                                                    </div>
                                                    <div class="listing-img-content">
                                                        <span class="listing-compact-title"><?php echo $row['PropertyTitle'];?></span>
                                                        <ul class="listing-hidden-content">
                                                            <li>Area <span><?php echo $row['Area'];?></span></li>
                                                          
                                                            <li>Beds 
                                                <span><?php echo $row['Bedrooms'];?></span>
                                            </li>
                                                            <li>Baths <span><?php echo $row['Bathrooms'];?></span></li>
                                                        </ul>
                                                    </div>
                                                    <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>"  width='380' height='300'>
                                                </a>
<?php }?>
                                            </div>
                                        </div>
                                        <div class="agents-grid mr-0">
                                            <div class="listing-item compact">
                                                <a href="properties-details.html" class="listing-img-container">
                                                    <div class="listing-badges">
                                                        <span class="featured">$ 6,500</span>
                                                        <span class="rent">For Rent</span>
                                                    </div>
                                                    <div class="listing-img-content">
                                                        <span class="listing-compact-title">House Luxury <i>Los Angles</i></span>
                                                        <ul class="listing-hidden-content">
                                                            <li>Area <span>720 sq ft</span></li>
                                                            <li>Rooms <span>6</span></li>
                                                            <li>Beds <span>2</span></li>
                                                            <li>Baths <span>3</span></li>
                                                        </ul>
                                                    </div>
                                                    <img src="images/feature-properties/fp-2.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="agents-grid mr-0">
                                            <div class="listing-item compact">
                                                					                                 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                               <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>" class="listing-img-container">
												
                                                    <div class="listing-badges">
													
                                                        <span class="featured"><?php echo $row['RentorsalePrice'];?></span>
                                                        <span><?php echo $row['Status'];?></span>
                                                    </div>
                                                    <div class="listing-img-content">
                                                        <span class="listing-compact-title"><?php echo $row['PropertyTitle'];?></span>
                                                        <ul class="listing-hidden-content">
                                                            <li>Area <span><?php echo $row['Area'];?></span></li>
                                                          
                                                            <li>Beds 
                                                <span><?php echo $row['Bedrooms'];?></span>
                                            </li>
                                                            <li>Baths <span><?php echo $row['Bathrooms'];?></span></li>
                                                        </ul>
                                                    </div>
                                                    <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>"  width='380' height='300'>
                                                </a>
<?php }?>
                                            </div>
                                        </div>
                                        <div class="agents-grid mr-0">
                                            <div class="listing-item compact">
                                                					                                 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                               <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>" class="listing-img-container">
												
                                                    <div class="listing-badges">
													
                                                        <span class="featured"><?php echo $row['RentorsalePrice'];?></span>
                                                        <span><?php echo $row['Status'];?></span>
                                                    </div>
                                                    <div class="listing-img-content">
                                                        <span class="listing-compact-title"><?php echo $row['PropertyTitle'];?></span>
                                                        <ul class="listing-hidden-content">
                                                            <li>Area <span><?php echo $row['Area'];?></span></li>
                                                          
                                                            <li>Beds 
                                                <span><?php echo $row['Bedrooms'];?></span>
                                            </li>
                                                            <li>Baths <span><?php echo $row['Bathrooms'];?></span></li>
                                                        </ul>
                                                    </div>
                                                    <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>"  width='380' height='300'>
                                                </a>
<?php }?>
                                            </div>
                                        </div>
                                        <div class="agents-grid mr-0">
                                            <div class="listing-item compact">
                                               					                                 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                               <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>" class="listing-img-container">
												
                                                    <div class="listing-badges">
													
                                                        <span class="featured"><?php echo $row['RentorsalePrice'];?></span>
                                                        <span><?php echo $row['Status'];?></span>
                                                    </div>
                                                    <div class="listing-img-content">
                                                        <span class="listing-compact-title"><?php echo $row['PropertyTitle'];?></span>
                                                        <ul class="listing-hidden-content">
                                                            <li>Area <span><?php echo $row['Area'];?></span></li>
                                                          
                                                            <li>Beds 
                                                <span><?php echo $row['Bedrooms'];?></span>
                                            </li>
                                                            <li>Baths <span><?php echo $row['Bathrooms'];?></span></li>
                                                        </ul>
                                                    </div>
                                                    <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>"  width='380' height='300'>
                                                </a>
<?php }?>
                                            </div>
                                        </div>
                                        <div class="agents-grid mr-0">
                                            <div class="listing-item compact">
                                               					                                 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                               <a href="single-property-detail.php?proid=<?php echo $row['ID'];?>" class="listing-img-container">
												
                                                    <div class="listing-badges">
													
                                                        <span class="featured"><?php echo $row['RentorsalePrice'];?></span>
                                                        <span><?php echo $row['Status'];?></span>
                                                    </div>
                                                    <div class="listing-img-content">
                                                        <span class="listing-compact-title"><?php echo $row['PropertyTitle'];?></span>
                                                        <ul class="listing-hidden-content">
                                                            <li>Area <span><?php echo $row['Area'];?></span></li>
                                                          
                                                            <li>Beds 
                                                <span><?php echo $row['Bedrooms'];?></span>
                                            </li>
                                                            <li>Baths <span><?php echo $row['Bathrooms'];?></span></li>
                                                        </ul>
                                                    </div>
                                                    <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>"  width='380' height='300'>
                                                </a>
<?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-boxed mt-5">
                                <div class="widget-boxed-header">
                                    <h4>Recent Properties</h4>
                                </div>
                                <div class="widget-boxed-body">
                                    <div class="recent-post">
														                                 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>


                                              

									
									
                                        <div class="recent-main">
                                            <div class="recent-img">
                                                <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>"  width='380' height='300'>
                                            </div>
                                            <div class="info-img">
                                                <a href="blog-details.html"><h6><?php echo $row['PropertyTitle'];?></h6></a>
                                                <p><?php echo $row['RentorsalePrice'];?></p>
                                            </div>
                                        </div>
<?php }?>
                                        <div class="recent-main my-4">
                                            <div class="recent-img">
																									                                 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                                <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>"  width='380' height='300'>
                                            </div>
                                            <div class="info-img">
                                                <a href="blog-details.html"><h6><?php echo $row['PropertyTitle'];?></h6></a>
                                                <p><?php echo $row['RentorsalePrice'];?></p>
                                            </div>
<?php }?>
                                        </div>
                                        <div class="recent-main">
																								                                 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                            <div class="recent-img">
                                               <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>"  width='380' height='300'>
                                            </div>
                                            <div class="info-img">
                                                <a href="blog-details.html"><h6><?php echo $row['PropertyTitle'];?></h6></a>
                                                <p><?php echo $row['RentorsalePrice'];?></p>
                                            </div>
											<?php }?>
                                        </div>
                                    </div>
                                </div>
								
                            </div>
                            <div class="widget-boxed popular mt-5 mb-0">
                                <div class="widget-boxed-header">
                                    <h4>Popular Tags</h4>
                                </div>
                                <div class="widget-boxed-body">
                                    <div class="recent-post">
                                        <div class="tags">
                                            <span><a href="#" class="btn btn-outline-primary">Houses</a></span>
                                            <span><a href="#" class="btn btn-outline-primary">Real Home</a></span>
                                        </div>
                                        <div class="tags">
                                            <span><a href="#" class="btn btn-outline-primary">Baths</a></span>
                                            <span><a href="#" class="btn btn-outline-primary">Beds</a></span>
                                        </div>
                                        <div class="tags">
                                            <span><a href="#" class="btn btn-outline-primary">Garages</a></span>
                                            <span><a href="#" class="btn btn-outline-primary">Family</a></span>
                                        </div>
                                        <div class="tags">
                                            <span><a href="#" class="btn btn-outline-primary">Real Estates</a></span>
                                            <span><a href="#" class="btn btn-outline-primary">Properties</a></span>
                                        </div>
                                        <div class="tags no-mb">
                                            <span><a href="#" class="btn btn-outline-primary">Location</a></span>
                                            <span><a href="#" class="btn btn-outline-primary">Price</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
 
				
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
					
					<?php }?>
					

					
					
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


<!-- Mirrored from code-theme.com/html/findhouses/properties-grid-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:02:03 GMT -->
</html>
