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
</head>

<body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
           
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
  }  ?> </h3>
                            <div class="property-form-group">
                                <form class="mb-0" method="post"  enctype="multipart/form-data" action="uploadp.php">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="title">Property Title</label>
                                                <input type="text" name="propertytitle" id="propertytitle" placeholder="Enter your property title">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="description">Property Description</label>
                                                <textarea name="propertydescription" id="propertydescription" placeholder="Describe about your property"></textarea>
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
                                            <input type="file" class="form-control" name="featuredimage" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image1</label>
                                            <input type="file" class="form-control" name="galleryimage1" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image2</label>
                                            <input type="file" class="form-control" name="galleryimage2" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image3</label>
                                            <input type="file" class="form-control" name="galleryimage3" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image4</label>
                                            <input type="file" class="form-control" name="galleryimage4" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image5</label>
                                            <input type="file" class="form-control" name="galleryimage4" required>
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
                                           
                                          
                                               
                                                <select class="nice-select form-control wide" tabindex="0" id="selecttype" name="selecttype" required="true">
                                            <option value="">Select Property Type</option>
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
												<option>Select status	</option>
                                           
                                            <option>Sale</option>
                                            <option>Rent</option>
                                        </select>
                                            
                                        </div>
                                    </div>
									 <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location">
                                        </div>
                                    </div>
									
									
									 <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Bedrooms">Bedrooms</label>
                                            <input type="text" class="form-control" name="bedrooms" id="bedrooms">
                                        </div>
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Bathrooms">Bathrooms</label>
                                            <input type="text" class="form-control" name="bathrooms" id="bathrooms">
                                        </div>
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Floors">Floors</label>
                                            <input type="text" class="form-control" name="floors" id="floors">
                                        </div>
                                    </div><div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Garages">Garages</label>
                                            <input type="text" class="form-control" name="garages" id="garages">
                                        </div>
                                    </div>
									 <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Area</label>
                                                
												<input type="text"  name="area" id="area" placeholder="sqft">
                                            </p>
                                        </div>
										
										 <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Size">Size</label>
                                            <input type="text" class="form-control" name="size" id="size" placeholder="sq ft">
                                        </div>
                                    </div>
									 <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Sell or Rent price</label>
                                                
												 <input type="text" name="salerentprice" id="salerentprice" required>
                                            </p>
                                        </div>
										 <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Before Price Label</label>
                                                <input type="text" name="beforepricelabel" id="beforepricelabel" placeholder="ex: start from">
												
                                            </p>
                                        </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb first">
                                            <label for="latitude">Google Maps latitude</label>
                                            
											 <input type="text"  name="afterpricelabel" id="afterpricelabel" placeholder="ex: https://goo.gl/maps/PQztLDZuk7XjmbkHA">
                                        </p>
                                    </div<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
$uid=$_SESSION['remsuid'];
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
$propertylink=$_POST['propertylink'];
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

$proid=mt_rand(100000000, 999999999);
//fetured Image
$pic=$_FILES["featuredimage"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
//Property  Image 1
$pic1=$_FILES["galleryimage1"]["name"];
$extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));
//Property  Image 2
$pic2=$_FILES["galleryimage2"]["name"];
$extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));
//Property  Image 3
$pic3=$_FILES["galleryimage3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));
//Property  Image 4
$pic4=$_FILES["galleryimage4"]["name"];
$extension4 = substr($pic4,strlen($pic4)-4,strlen($pic4));
//Property  Image 5
$pic5=$_FILES["galleryimage5"]["name"];
$extension5 = substr($pic5,strlen($pic5)-4,strlen($pic5));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Property gallery image1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension2,$allowed_extensions))
{
echo "<script>alert('Property gallery image2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension3,$allowed_extensions))
{
echo "<script>alert('Property gallery image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension4,$allowed_extensions))
{
echo "<script>alert('Property gallery image4 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension5,$allowed_extensions))
{
echo "<script>alert('Property gallery image5 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename property images
$propic=md5($pic).time().$extension;
$propic1=md5($pic1).time().$extension1;
$propic2=md5($pic2).time().$extension2;
$propic3=md5($pic3).time().$extension3;
$propic4=md5($pic4).time().$extension4;
$propic5=md5($pic5).time().$extension5;
     move_uploaded_file($_FILES["featuredimage"]["tmp_name"],"propertyimages/".$propic);
     move_uploaded_file($_FILES["galleryimage1"]["tmp_name"],"propertyimages/".$propic1);
     move_uploaded_file($_FILES["galleryimage2"]["tmp_name"],"propertyimages/".$propic2);
     move_uploaded_file($_FILES["galleryimage3"]["tmp_name"],"propertyimages/".$propic3);
     move_uploaded_file($_FILES["galleryimage4"]["tmp_name"],"propertyimages/".$propic4);
     move_uploaded_file($_FILES["galleryimage5"]["tmp_name"],"propertyimages/".$propic5);

    $query=mysqli_query($con,"insert into tblproperty(UserID,PropertyTitle,PropertDescription,Type,Status,Location,Bedrooms,Bathrooms,Floors,Garages,Area,Size,RentorsalePrice,BeforePricelabel,AfterPricelabel,propertylink,PropertyID,CenterCooling,Balcony,PetFriendly,Barbeque,FireAlarm,ModernKitchen,Storage,Dryer,Heating,Pool,Laundry,Sauna,Gym,Elevator,DishWasher,EmergencyExit,FeaturedImage,GalleryImage1,GalleryImage2,GalleryImage3,GalleryImage4,GalleryImage5,Address,Country,City,State,ZipCode,Neighborhood)value('$uid','$protitle','$prodec','$type','$status','$location','$bedrooms','$bathrooms','$floors','$garages','$area','$size','$srprice','$beforepricelabel','$afterpricelabel','$propertylink','$proid','$ccolling','$balcony','$petfrndly','$barbeque','$firealarm','$modkitchen','$storage','$dryer','$heating','$pool','$laundry','$sauna','$gym','$elevator','$dishwasher','$eexit','$propic','$propic1','$propic2','$propic3','$propic4','$propic5','$proaddress','$procountry','$procity','$prostate','$prozipcode','$neighborhood')");
   if ($query) {
    echo '<script>alert("Property detail has been added.")</script>';
echo "<script>window.location.href ='add-property.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}



?>


 <!DOCTYPE html>
<html dir="ltr" lang="en-US">

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
</head>
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


<body>
    <!-- Document Wrapper
	============================================= -->
    <body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        
        <!-- Page Title #1
============================================ -->
<div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
        <?php   include('header3.php');?>
        </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        
        <!-- #page-title end -->

        <!-- #Add Property
============================================= -->
<section class="user-page section-padding pt-5">
            <div class="container-fluid">
                <div class="row">
                                   <?php

include('includes/sidebar.php');
?>
      
        <section id="add-property" class="add-property">
            
            <div class="container">

                <div class="row">

                    <div class="single-add-property">
					<h3>Property description and price  </h3>
                            <div class="property-form-group">
                        <form class="mb-0" method="post"  enctype="multipart/form-data" action="uploadp.php">
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="form-box1">
                               <div class="row">
                                        <div class="col-md-12">
                                        <h4 style="font-size:20px; color:white;" class="form--title">Property Description</h4>

                                    </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                  <div class="row">
                                        <div class="col-md-12">
                                            <label for="property-title">Property Title*</label>
                                            <input type="text" class="form-control" name="propertytitle" id="propertytitle" required>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="property-description">Property Description*</label>
                                            <textarea class="form-control" name="propertydescription" id="propertydescription" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="single-add-property">
                            <h3>property Information</h3>
                            <div class="property-form-group">
                                
                               
                                <div class="row">
								<div class="col-lg-4 col-md-12 dropdown faq-drop">
                                         <div class="form-group categories">
                                           
                                          
                                               
                                                <select class="nice-select form-control wide" tabindex="0" id="selecttype" name="selecttype" required="true">
                                            <option value="">Select Property Type</option>
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
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location">
                                        </div>
                                    </div>
									
									
									 <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Bedrooms">Bedrooms</label>
                                            <input type="text" class="form-control" name="bedrooms" id="bedrooms">
                                        </div>
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Bathrooms">Bathrooms</label>
                                            <input type="text" class="form-control" name="bathrooms" id="bathrooms">
                                        </div>
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Floors">Floors</label>
                                            <input type="text" class="form-control" name="floors" id="floors">
                                        </div>
                                    </div><div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Garages">Garages</label>
                                            <input type="text" class="form-control" name="garages" id="garages">
                                        </div>
                                    </div>
									 <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Area</label>
                                                
												<input type="text"  name="area" id="area" placeholder="sqft">
                                            </p>
                                        </div>
										
										 <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Size">Size</label>
                                            <input type="text" class="form-control" name="size" id="size" placeholder="sq ft">
                                        </div>
                                    </div>
									 <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Sell or Rent price</label>
                                                
												 <input type="text" name="salerentprice" id="salerentprice" required>
                                            </p>
                                        </div>
										 <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Before Price Label</label>
                                                <input type="text" name="beforepricelabel" id="beforepricelabel" placeholder="ex: start from">
												
                                            </p>
                                        </div>
                                    <div class="col-lg-6 col-md-12">
                                        <p class="no-mb first">
                                            <label for="latitude">Google Maps latitude</label>
                                            
											 <input type="text"  name="afterpricelabel" id="afterpricelabel" placeholder="ex: https://goo.gl/maps/PQztLDZuk7XjmbkHA">
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
                                    
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <div class="form-box1">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 style="font-size:20px; color:white;" class="form--title">Property Features</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Center Cooling</span>
                                        <input type="checkbox" name="centercolling" id="centercolling" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Balcony</span>
                                        <input type="checkbox" name="balcony" id="balcony" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Pet Friendly</span>
                                        <input type="checkbox" name="petfrndly" id="petfrndly" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Barbeque</span>
                                        <input type="checkbox" name="barbeque" id="barbeque" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Fire Alarm</span>
                                        <input type="checkbox" name="firealarm" id="firealarm" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Modern Kitchen</span>
                                        <input type="checkbox" name="modkitchen" id="modkitchen" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Storage</span>
                                        <input type="checkbox" name="storage" id="storage" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Dryer</span>
                                        <input type="checkbox" name="dryer" id="dryer" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Heating</span>
                                        <input type="checkbox" name="heating" id="heating" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Pool</span>
                                        <input type="checkbox" name="pool" id="pool" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Laundry</span>
                                        <input type="checkbox" name="laundry" id="laundry" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Sauna</span>
                                        <input type="checkbox" name="sauna" id="sauna" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Gym</span>
                                        <input type="checkbox" name="gym" id="gym" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Elevator</span>
                                        <input type="checkbox" name="elevator" id="elevator" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Dish Washer</span>
                                        <input type="checkbox" name="dishwasher" id="dishwasher" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Emergency Exit</span>
                                        <input type="checkbox" name="eexit" id="eexit" value="1">
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

                            <div class="form-box1">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 style="font-size:20px; color:white;" class="form--title">Property Gallery</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Featured Image</label>
                                            <input type="file" class="form-control" name="featuredimage" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image1</label>
                                            <input type="file" class="form-control" name="galleryimage1" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image2</label>
                                            <input type="file" class="form-control" name="galleryimage2" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image3</label>
                                            <input type="file" class="form-control" name="galleryimage3" required>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image4</label>
                                            <input type="file" class="form-control" name="galleryimage4" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image5</label>
                                            <input type="file" class="form-control" name="galleryimage5" required>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->

                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

                            <div class="form-box1">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 style="font-size:20px; color:white;" class="form--title">Property Location</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address*</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter your property address" required>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-country">Country</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                     <select type="text" name="country" id="country" required="true" onChange="getsate(this.value)" class="form-control">
                                             <option value="">Select Country</option>
              <?php $query=mysqli_query($con,"select * from tblcountry");
              while($row=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row['ID'];?>"><?php echo $row['CountryName'];?></option>
                  <?php } ?>
                                         </select>
                                            </div>
                                        </div>
                                    </div>


            <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                             <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                            <select type="text" class="form-control" name="state" id="state" onChange="getcity(this.value)" >
                                            </select>
                                        </div>
                                    </div>
                                    </div>


                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                            <select class="form-control" name="city" id="city">
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                        
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Zip/Postal-code">Zip/Postal Code</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="neighborhood">Land Mark or Neighborhood</label>
                                            <input type="text" class="form-control" name="neighborhood" id="neighborhood">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                 
                                    <!-- .col-md-12 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <input type="submit" value="Submit" name="submit" class="btn btn--primary">
                        </form>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>
        
        

        <!-- Footer #1
============================================= -->
        <?php include_once('includes/footer.php');?>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>
  <?php  }?>operty-form-group">
                                <div class="row">
                                    
                                    <div class="col-lg-6 col-md-12">
                                        <p>
                                            <label for="address">Address</label>
                                            
											<input type="text"  name="propertylink" id="propertylink" placeholder="Enter your Address">
                                        </p>
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-country">Country</label>
                                            <div class="select--box">
                                                
                                     <select type="text" name="country" id="country" required="true"  class="form-control">
                                             <option value="">Select Country</option>
              <?php $query=mysqli_query($con,"select * from tblcountry");
              while($row=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row['ID'];?>"><?php echo $row['CountryName'];?></option>
                  <?php } ?>
                                         </select>
                                            </div>
                                        </div>
                                    </div>
									
									
            <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                             <div class="select--box">
                                               
                                            <select type="text" class="form-control" name="state" id="state"  >
											
											
											 <?php
 $cid=$_POST['$countryid'];

  $query=mysqli_query($con,"select * from tblstate "); ?>
<option value="">Select State</option>
  <?php
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['ID'];?>"><?php echo $rw['StateName'];?></option>
                  

<?php }?>
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
											<option value="">Select City</option>
											 <?php $query=mysqli_query($con,"select * from tblcity");
              while($row=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row['StateID'];?>"><?php echo $row['CityName'];?></option>
                  <?php } ?>
                                            </select>
                                        </div>
                                        </div>
                                    </div><div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Zip/Postal-code">Zip/Postal Code</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="neighborhood">Land Mark or Neighborhood</label>
                                            <input type="text" class="form-control" name="neighborhood" id="neighborhood">
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
                                                        <input id="centercolling"type="checkbox"name="centercolling"value="1">
														
                                                        <label for="centercolling">Center Cooling</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input type="checkbox" name="balcony" id="balcony" value="1">
                                                        <label for="balcony">Balcony</label>
														
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input type="checkbox" name="petfrndly" id="petfrndly" value="1">
                                                        <label for="petfrndly">Pet Friendly</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                       <input type="checkbox" name="barbeque" id="barbeque" value="1">
                                                        <label for="barbeque">Barbeque</label>
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
                        <div class="single-add-property">
                            
                            <center>
                            <div class="add-property-button pt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="prperty-submit-button">
										
                                            <button type="submit" value="Submit" name="submit" >Submit Property</button>
											
											 
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
