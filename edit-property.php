<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
$protitle=$_POST['propertytitle'];
$prodec=$_POST['propertydescription'];
$type=$_POST['selecttype'];
$status=$_POST['status'];
$location=$_POST['location'];
$bedrooms=$_POST['bedrooms'];
$bathrooms=$_POST['bathrooms'];
$floors=$_POST['floors'];
$garages=$_POST['garages'];
$area=$_POST['area'];
$size=$_POST['size'];
$srprice=$_POST['salerentprice'];
$beforepricelabel=$_POST['beforepricelabel'];
$afterpricelabel=$_POST['afterpricelabel'];
$ccolling=$_POST['centercolling'];
$balcony=$_POST['balcony'];
$petfrndly=$_POST['petfrndly'];
$barbeque=$_POST['barbeque'];
$firealarm=$_POST['firealarm'];
$modkitchen=$_POST['modkitchen'];
$storage=$_POST['storage'];
$dryer=$_POST['dryer'];
$heating=$_POST['heating'];
$pool=$_POST['pool'];
$laundry=$_POST['laundry'];
$sauna=$_POST['sauna'];
$gym=$_POST['gym'];
$elevator=$_POST['elevator'];
$dishwasher=$_POST['dishwasher'];
$eexit=$_POST['eexit'];

$proaddress=$_POST['address'];
$procountry=$_POST['country'];
$procity=$_POST['city'];
$prostate=$_POST['state'];
$prozipcode=$_POST['zipcode'];
$neighborhood=$_POST['neighborhood'];


    $query=mysqli_query($con,"update tblproperty set PropertyTitle='$protitle',PropertDescription='$prodec',Type='$type',Status='$status',Location='$location',Bedrooms='$bedrooms',Bathrooms='$bathrooms',Floors='$floors',Garages='$garages',Area='$area',Size='$size',RentorsalePrice='$srprice',BeforePricelabel='$beforepricelabel',AfterPricelabel='$afterpricelabel',CenterCooling='$ccolling',Balcony='$balcony',PetFriendly='$petfrndly',Barbeque='$barbeque',FireAlarm='$firealarm',ModernKitchen='$modkitchen',Storage='$storage',Dryer='$dryer',Heating='$heating',Pool='$pool',Laundry='$laundry',Sauna='$sauna',Gym='$gym',Elevator='$elevator',DishWasher='$dishwasher',EmergencyExit='$eexit',Address='$proaddress',Country='$procountry',City='$procity',State='$prostate',ZipCode='$prozipcode',Neighborhood='$neighborhood' where ID='$eid'");
   if ($query) {
    echo '<script>alert("Property detail has been updated.")</script>';
echo "<script>window.location.href ='edit-property.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}





?>
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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
      
                        <div class="single-add-property">
                            <h3>Property description and price <?php if($msg){
    echo $msg;
  }  ?> </p>
                 <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblcountry.ID as cis,tblstate.StateName,tblstate.id as sid from tblproperty join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where tblproperty.ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>       </h3>
                            <div class="property-form-group">
                                <form class="mb-0" method="post"  enctype="multipart/form-data" action="uploadp.php">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="title">Property Title</label>
                                                <input type="text" name="propertytitle" id="propertytitle"  value="<?php  echo $row['PropertyTitle'];?>">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="description">Property Description</label>
                                                <textarea name="propertydescription" id="propertydescription" readonly="true"><?php  echo $row['PropertDescription'];?></textarea>
                                            </p>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
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
                                            <label for="address">Featured Image</label>
                                            <img src="propertyimg/<?php echo $row['FeaturedImage'];?>" width="200" height="150" value="<?php  echo $row['FeaturedImage'];?>"><a href="changeimage.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image1</label>
                                            <img src="propertyimg/<?php echo $row['GalleryImage1'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage1'];?>"><a href="changeimage1.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image2</label>
                                            <img src="propertyimg/<?php echo $row['GalleryImage2'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage2'];?>"><a href="changeimage2.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image3</label>
                                            <img src="propertyimg/<?php echo $row['GalleryImage3'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage3'];?>"><a href="changeimage3.php?editid=<?php echo $row['ID'];?>">&nbsp; Edit Image</a> 
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                          <label for="address">Gallery Image4</label>
                                            <img src="propertyimg/<?php echo $row['GalleryImage4'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage4'];?>"><a href="changeimage4.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>   
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image5</label>
                                           <img src="propertyimg/<?php echo $row['GalleryImage5'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage5'];?>"><a href="changeimage5.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->

                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-add-property">
                            <h3>property Information</h3>
                            <div class="property-form-group">
                                
                               
                                <div class="row">
								<div class="col-lg-4 col-md-12 dropdown faq-drop">
                                         <div class="form-group categories">
                                           
                                          
                                               
										 <select id="selecttype" name="selecttype" required="true" class="nice-select form-control wide">
                                            <option value="<?php  echo $row['Type'];?>"><?php  echo $row['Type'];?></option>
              <?php $query1=mysqli_query($con,"select * from tblpropertytype");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>      
                  <option value="<?php echo $row1['PropertType'];?>"><?php echo $row1['PropertType'];?></option>
                  <?php } ?>
                                        </select>
                                            </div>
                                        
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            
                                           
                                               
                                                <select id="status" name="status"class="nice-select form-control wide" tabindex="0">
												<option value="<?php  echo $row['Status'];?>"><?php  echo $row['Status'];?></option>
                                           
                                            <option>Sale</option>
                                            <option>Rent</option>
                                        </select>
                                            
                                        </div>
                                    </div>
									 <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location" value="<?php  echo $row['Location'];?>">
                                        </div>
                                    </div>
									
									
									 <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Bedrooms">Bedrooms</label>
                                            <input type="text" class="form-control" name="bedrooms" id="bedrooms"  value="<?php  echo $row['Bedrooms'];?>">
                                        </div>
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Bathrooms">Bathrooms</label>
                                            <input type="text" class="form-control" name="bathrooms" id="bathrooms" value="<?php  echo $row['Bathrooms'];?>">
                                        </div>
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Floors">Floors</label>
                                            <input type="text" class="form-control" name="floors" id="floors" value="<?php  echo $row['Floors'];?>">
                                        </div>
                                    </div><div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Garages">Garages</label>
                                            <input type="text" class="form-control" name="garages" id="garages"  value="<?php  echo $row['Garages'];?>">
                                        </div>
                                    </div>
									 <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Area</label>
                                                
												<input type="text"  name="area" id="area" value="<?php  echo $row['Area'];?>" >
                                            </p>
                                        </div>
										
										 <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Size">Size</label>
                                            <input type="text" class="form-control" name="size" id="size" required="true" value="<?php  echo $row['Size'];?>">
                                        </div>
                                    </div>
									 <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Sell or Rent price</label>
                                                
												 <input type="text" name="salerentprice" id="salerentprice" required="true" value="<?php  echo $row['RentorsalePrice'];?>">
                                            </p>
                                        </div>
										 <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Before Price Label</label>
                                                <input type="text" name="beforepricelabel" id="beforepricelabel" required="true" value="<?php  echo $row['BeforePricelabel'];?>">
												
                                            </p>
                                        </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb first">
                                            <label for="latitude">Google Maps latitude</label>
                                            
											 <input type="text"  name="afterpricelabel" id="afterpricelabel" required="true" value="<?php  echo $row['AfterPricelabel'];?>">
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb last">
                                            <label for="longitude">Google Maps longitude</label>
                                            <input type="text"  name="propertylink" id="propertylink" placeholder="https://www.google.com/map...!2Sin">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-add-property">
                            <h3>Property Location</h3>
                            <div class="property-form-group">
                                <div class="row">
                                    
                                    <div class="col-lg-6 col-md-12">
                                        <p>
                                            <label for="address">Address</label>
                                            
											<input type="text"  name="propertylink" id="propertylink" required="true" value="<?php  echo $row['Address'];?>">
                                        </p>
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-country">Country</label>
                                            <div class="select--box">
                                                
                                     <select type="text" name="country" id="country" required="true" onChange="getsate(this.value)" class="form-control">
<option value="<?php  echo $row['cid'];?>"><?php  echo $row['CountryName'];?></option>
<?php $query=mysqli_query($con,"select * from tblcountry");
while($row1=mysqli_fetch_array($query))
{
              ?>      
<option value="<?php echo $row1['ID'];?>"><?php echo $row1['CountryName'];?></option>
                  <?php } ?>
                                         </select>
                                            </div>
                                        </div>
                                    </div>
									
									
            <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                             <div class="select--box">
                                               
                                            <select type="text" class="form-control" name="state" id="state" onChange="getcity(this.value)" >
<option value="<?php  echo $row['sid'];?>"><?php  echo $row['StateName'];?></option>
        
</select>
           
                                        </div>
                                    </div>
                                    </div>


                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <div class="select--box">
                                               
                                            <select class="form-control" name="city" id="city">
<option value="<?php  echo $row['City'];?>"><?php  echo $row['City'];?></option>
</select>
                                        </div>
                                        </div>
                                    </div><div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Zip/Postal-code">Zip/Postal Code</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode" required="true" value="<?php  echo $row['ZipCode'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="neighborhood">Land Mark or Neighborhood</label>
                                            <input type="text" class="form-control" name="neighborhood" id="neighborhood" required="true" value="<?php  echo $row['Neighborhood'];?>">
                                        </div>
                                    </div>
                                
                                   
									
									
                                </div>
                            </div>
                        </div>
                        <div class="single-add-property">
                            <h3>Property Features</h3>
                            <div class="property-form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="pro-feature-add pl-0">
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
													 <?php  if($row['CenterCooling']=="1"){ ?>
                                                        <input id="centercolling"type="checkbox"name="centercolling"value="1">
														<?php } else { ?>
                                                        <label for="centercolling">Center Cooling</label>
														<?php } ?>
                                                    </div>
</div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                               
                                                    <div class="filter-tags-wrap">
<div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Balcony</span>
                                        <?php  if($row['Balcony']=="1"){ ?>
                                        <input type="checkbox" name="balcony" id="balcony" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="balcony" id="balcony">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                                    </div>
                                               
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input type="checkbox" name="petfrndly" id="petfrndly" value="1">
                                                        <label for="petfrndly">Pet Friendly</label>
														<input type="checkbox" name="petfrndly" id="petfrndly">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                       <input type="checkbox" name="barbeque" id="barbeque" value="1">
                                                        <label for="barbeque">Barbeque</label>
														<input type="checkbox" name="barbeque" id="barbeque">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input type="checkbox" name="firealarm" id="firealarm" value="1">
                                                        <label for="firealarm">Firealarm</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input type="checkbox" name="modkitchen" id="modkitchen" value="1">
                                                        <label for="modkitchen">Modkitchen</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                         <input type="checkbox" name="storage" id="storage" value="1">
                                                        <label for="storage">Storage</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                       <input type="checkbox" name="dryer" id="dryer" value="1">
                                                        <label for="dryer">dryer</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input type="checkbox" name="heating" id="heating" value="1">
                                                        <label for="heating">Heating</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input type="checkbox" name="pool" id="pool" value="1">
                                                        <label for="pool">Pool</label>
                                                    </div>
                                                </div>
                                            </li>
											
											<li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                         <input type="checkbox" name="laundry" id="laundry" value="1">
                                                        <label for="laundry">Laundry</label>
                                                    </div>
                                                </div>
                                            </li><li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                       <input type="checkbox" name="sauna" id="sauna" value="1">
                                                        <label for="sauna">Sauna</label>
                                                    </div>
                                                </div>
                                            </li>
											<li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                      <input type="checkbox" name="gym" id="gym" value="1">
                                                        <label for="gym">Gym</label>
                                                    </div>
                                                </div>
                                            </li>
											
											<li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                      <input type="checkbox" name="elevator" id="elevator" value="1">
                                                        <label for="elevator">Elevator</label>
                                                    </div>
                                                </div>
                                            </li>
											<li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                      <input type="checkbox" name="dishwasher" id="dishwasher" value="1">
                                                        <label for="dishwasher">Dishwasher</label>
                                                    </div>
                                                </div>
                                            </li>
											
											<li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                      <input type="checkbox" name="eexit" id="eexit" value="1">
                                                        <label for="eexit">Eexit</label>
                                                    </div>
                                                </div>
                                            </li>
											
											
											
                                        </ul>
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