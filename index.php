

<?php
session_start();
error_reporting(0);
include('findhouses/includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:01:00 GMT -->
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
    <link rel="stylesheet" href="font/flaticon.css">
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
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/maps.css">
    <link rel="stylesheet" id="color" href="css/colors/pink.css">
	
	<style>
	.img-card img{
		width:200px;
		height:200px;
	}
	.card{
		height:500px;
		margin-left:10px;
		padding-top:10px;
		
	}
	</style>	
</head>

<body class="homepage-9 hp-6 homepage-1">
	




  <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container" class="header head-tr">
            <!-- Header -->
			 <?php include_once('includes/header.php');?>
           
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- STAR HEADER SEARCH -->
      
        <!-- END HEADER SEARCH -->

        <!-- START SECTION FEATURED PROPERTIES -->
         <section id="hero-area" class="parallax-searchs home15 overlay thome-6 thome-1" data-stellar-background-ratio="0.5">
            <div class="hero-main">
                <div class="container" data-aos="zoom-in">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-inner">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <h1 class="h1">Find Your Dream
                                    <br class="d-md-none">
                                    <span class="typed border-bottom"></span>
                                </h1>
                                    <p class="mt-4">We Have Over Million Properties For You.</p>
                                </div>
                                <!--/ End Welcome Text -->
                                <!-- Search Form -->
                                <div class="col-12">
                                    <div class="banner-search-wrap">
                                        
										 <form class="mb-0" method="post" name="search" action="properties-full-list-1.php">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs_1">
                                                <div class="rld-main-search">
												
                                                    <div class="row">
													
                                                       
                                                        
														
														
														
                                                        <div class="rld-single-select">
                                                            <select class="select single-select mr-1" name="city" id="city">
                                                              
                                        <option value="">Select City</option>
                                        <?php
$query=mysqli_query($con,"select distinct City from  tblproperty");
while($row=mysqli_fetch_array($query))
{
?>
                  <option value="<?php echo $row['City'];?>"><?php echo $row['City'];?></option>
                  <?php } ?>
                                    </select>
                                                        </div>
														
														<div class="col-lg-3 col-md-12 dropdown faq-drop">
                                         <div class="form-group categories">
                                           
                                          
                                               
                                                <select class="nice-select form-control wide" tabindex="0" name="type" id="type" required="true">
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
														
																	
																
																
														 
                                                        <div class="dropdown-filter"><span>Advanced Search</span></div>
                                                        <div class="col-xl-4 col-lg-2 col-md-4 pl-0">
                                                            <input type="submit" value="Search" name="search" class="btn btn-yellow">
                                                        </div>
                                                        <div class="explore__form-checkbox-list full-filter">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6 col-md-3">
																<!-- Form Property Status -->
                                            <div class="form-group">
                                                <div class="select--box">
                                                    
                                                           
                                                    <select name="status" id="status" required="true"class="nice-select form-control wide" tabindex="0">
                                        <option value="" class="nice-select form-control wide"><span><i class="fa fa-bed" aria-hidden="true"></i>Select Status</span></option>
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
											 <!--/ End Form Property Status -->
                                        </div>
                                                                <div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                                                    <!-- Form Bedrooms -->
                                                                    <div class="form-group beds">
                                                                        <select name="Bedrooms" id="Bedrooms" required="true"class="nice-select form-control wide" tabindex="0">
                                        <option value=""><span><i class="fa fa-bed" aria-hidden="true"></i>Select Bedrooms</span></option>
                                        <?php
$query2=mysqli_query($con,"select distinct Bedrooms from  tblproperty");
while($row2=mysqli_fetch_array($query2))
{
?>
                                        <option value="<?php echo $row2['Bedrooms'];?>"><?php echo $row2['Bedrooms'];?></option>
                                        <?php } ?>
                                    </select>
                                                                    </div>
                                                                    <!--/ End Form Bedrooms -->
                                                                </div>
                                                                <div class="col-lg-4 col-md-6 py-1 pl-0 pr-0">
                                                                    <!-- Form Bathrooms -->
                                                                    <div class="form-group bath">
                                                                       
                                                                            <select name="Bathrooms" id="Bathrooms" required="true"class="nice-select form-control wide" tabindex="0">
                                        <option value=""><span><i class="fa fa-bed" aria-hidden="true"></i>Select Bathrooms</span></option>
                                        <?php
$query2=mysqli_query($con,"select distinct Bathrooms from  tblproperty");
while($row2=mysqli_fetch_array($query2))
{
?>
                                        <option value="<?php echo $row2['Bathrooms'];?>"><?php echo $row2['Bathrooms'];?></option>
                                        <?php } ?>
                                    </select>
                                                                       
                                                                    </div>
                                                                    <!--/ End Form Bathrooms -->
                                                                </div>
                                                                
                                                                <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30">
                                                                    <!-- Checkboxes -->
                                                                    <div class="checkboxes one-in-row margin-bottom-10 ch-1">
                                                                       <input type="checkbox" name="centercolling" id="centercolling" value="1">
                                                                        <label for="centercolling">centercolling</label>
                                                                        <input type="checkbox" name="balcony" id="balcony" value="1">
                                                                        <label for="balcony">Balcony</label>
                                                                       <input type="checkbox" name="petfrndly" id="petfrndly" value="1">
                                                                        <label for="petfrndly">petfrndly</label>
                                                                       <input type="checkbox" name="barbeque" id="barbeque" value="1">
                                                                        <label for="barbeque">barbeque</label>
                                                                        <input type="checkbox" name="firealarm" id="firealarm" value="1">
                                                                        <label for="firealarm">firealarm</label>
                                                                         <input type="checkbox" name="modkitchen" id="modkitchen" value="1">
                                                                        <label for="modkitchen">modkitchen</label>
                                                                         <input type="checkbox" name="storage" id="storage" value="1">
                                                                        <label for="storage">Storage</label>
																		<input type="checkbox" name="dryer" id="dryer" value="1">
                                                                        <label for="dryer">Dryer</label>
                                                                    </div>
                                                                    <!-- Checkboxes / End -->
                                                                </div>
                                                                <div class="col-lg-3 col-md-6 col-sm-12 py-1 pr-30">
                                                                    <!-- Checkboxes -->
                                                                    <div class="checkboxes one-in-row margin-bottom-10 ch-2">
                                                                         <input type="checkbox" name="heating" id="heating" value="1">
                                                                        <label for="heating">heating</label>
                                                                        <input type="checkbox" name="pool" id="pool" value="1">
                                                                        <label for="pool">Pool</label>
                                                                        <input type="checkbox" name="laundry" id="laundry" value="1">
                                                                        <label for="laundry">Laundry</label>
                                                                      <input type="checkbox" name="sauna" id="sauna" value="1">
                                                                        <label for="sauna">Sauna</label>
                                                                         <input type="checkbox" name="gym" id="gym" value="1">
                                                                        <label for="gym">Gym</label>
                                                                          <input type="checkbox" name="elevator" id="elevator" value="1">
                                                                        <label for="elevator">Elevator</label>
                                                                       <input type="checkbox" name="dishwasher" id="dishwasher" value="1">
                                                                        <label for="dishwasher">Dishwasher</label>
																		 <input type="checkbox" name="eexit" id="eexit" value="1">
                                                                        <label for="eexit">Eexit</label>
                                                                    </div>
                                                                    <!-- Checkboxes / End -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Search Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION FEATURED PROPERTIES -->

        <!-- START SECTION WHY CHOOSE US -->
        <section class="how-it-works bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Why </span>Choose Us</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row service-1">
                    <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up">
                        <div class="serv-flex">
                            <div class="art-1 img-13">
                                <img src="images/icons/icon-4.svg" alt="">
                                <h3>Wide Renge Of Properties</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up">
                        <div class="serv-flex">
                            <div class="art-1 img-14">
                                <img src="images/icons/icon-5.svg" alt="">
                                <h3>Trusted by thousands</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up">
                        <div class="serv-flex arrow">
                            <div class="art-1 img-15">
                                <img src="images/icons/icon-6.svg" alt="">
                                <h3>Financing made easy</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-3 col-md-6 col-xs-12 serv mb-0 pt its-2" data-aos="fade-up">
                        <div class="serv-flex">
                            <div class="art-1 img-14">
                                <img src="images/icons/icon-15.svg" alt="">
                                <h3>We are here near you</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- END SECTION WHY CHOOSE US -->

        <!-- START SECTION POPULAR PLACES -->
        <section class="feature-categories bg-white-3 rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Popular </span>city</h2>
                    <p>Properties In Most Popular City.</p>
                </div>
                <div class="row">
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-12 col-sm-12" data-aos="zoom-in">
                        <div class="small-category-2">
									                     <div class="small-category-2-thumb img-1">
														 <?php
$query5=mysqli_query($con,"select distinct City from  tblproperty where id ='1'");
while($row5=mysqli_fetch_array($query5))
{
?>
			
                                <a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>"><img src="admin/cityimg/vadodara.jpg" alt=""></a>
</div>

                            <div class="sc-2-detail">
							
                                <h4 class="sc-jb-title"><a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>	">Vadodara</a></h4>
                             <span>Properties</span>

                    </div>
					</div>
					</div><?php }?>
                    <!-- Single category -->
                   <div class="col-xl-3 col-lg-12 col-sm-12" data-aos="zoom-in">
                        <div class="small-category-2">
									                     <div class="small-category-2-thumb img-1">
														 <?php
$query5=mysqli_query($con,"select distinct City from  tblproperty where id ='2'");
while($row5=mysqli_fetch_array($query5))
{
?>
			
                                <a href="cityimg/<?php echo $row['cityimg'];?>"><img src="images/popular-places/13.jpg" alt=""></a>
</div>

                            <div class="sc-2-detail">
							
                                <h4 class="sc-jb-title"><a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>	">Anand</a></h4>
                             <span>Properties</span>

                    </div>
					</div>
					</div><?php }?>
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-12 col-sm-12" data-aos="zoom-in">
                        <div class="small-category-2">
									                     <div class="small-category-2-thumb img-1">
														 <?php
$query5=mysqli_query($con,"select distinct City from  tblproperty where id ='3'");
while($row5=mysqli_fetch_array($query5))
{
?>
			
                                <a href="cityimg/<?php echo $row['cityimg'];?>"><img src="images/popular-places/14.jpg" alt=""></a>
</div>

                            <div class="sc-2-detail">
							
                                <h4 class="sc-jb-title"><a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>	">Vidhayanagar</a></h4>
                             <span>Properties</span>

                    </div>
					</div>
					</div><?php }?>
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-12 col-sm-12" data-aos="zoom-in">
                        <div class="small-category-2">
									                     <div class="small-category-2-thumb img-1">
														 <?php
$query5=mysqli_query($con,"select distinct City from  tblproperty where id ='4'");
while($row5=mysqli_fetch_array($query5))
{
?>
			
                                <a href="cityimg/<?php echo $row['cityimg'];?>"><img src="images/popular-places/15.jpg" alt=""></a>
</div>

                            <div class="sc-2-detail">
							
                                <h4 class="sc-jb-title"><a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>	">Ahmdabad</a></h4>
                             <span>Properties</span>

                    </div>
					</div>
					</div><?php }?>
                    <!-- Single category -->
                   <div class="col-xl-3 col-lg-12 col-sm-12" data-aos="zoom-in">
                        <div class="small-category-2">
									                     <div class="small-category-2-thumb img-1">
														 <?php
$query5=mysqli_query($con,"select distinct City from  tblproperty where id ='5'");
while($row5=mysqli_fetch_array($query5))
{
?>
			
                                <a href="" alt=""><img src="images/popular-places/5.jpg" alt=""></a>
</div>

                            <div class="sc-2-detail">
							
                                <h4 class="sc-jb-title"><a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>	">Rajkot</a></h4>
                             <span>Properties</span>

                    </div>
					</div>
					</div><?php }?>
                    <!-- Single category -->
					
					<div class="col-xl-3 col-lg-12 col-sm-12" data-aos="zoom-in">
                        <div class="small-category-2">
									                     <div class="small-category-2-thumb img-1">
														 <?php
$query5=mysqli_query($con,"select distinct City from  tblproperty where id ='7'");
while($row5=mysqli_fetch_array($query5))
{
?>
			
                                <a href="cityimg/<?php echo $row['cityimg'];?>"><img src="images/popular-places/13.jpg" alt=""></a>
</div>

                            <div class="sc-2-detail">
							
                                <h4 class="sc-jb-title"><a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>	">Surat</a></h4>
                             <span>Properties</span>

                    </div>
					</div>
					</div><?php }?>
                  <div class="col-xl-3 col-lg-12 col-sm-12" data-aos="zoom-in">
                        <div class="small-category-2">
									                     <div class="small-category-2-thumb img-1">
														 <?php
$query5=mysqli_query($con,"select distinct City from  tblproperty where id ='14'");
while($row5=mysqli_fetch_array($query5))
{
?>
			
                                <a href="cityimg/<?php echo $row['cityimg'];?>"><img src="images/popular-places/13.jpg" alt=""></a>
</div>

                            <div class="sc-2-detail">
							
                                <h4 class="sc-jb-title"><a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>	">Vasad</a></h4>
                             <span>Properties</span>

                    </div>
					</div>
					</div><?php }?>
					
					<div class="col-xl-3 col-lg-12 col-sm-12" data-aos="zoom-in">
                        <div class="small-category-2">
									                     <div class="small-category-2-thumb img-1">
														 <?php
$query5=mysqli_query($con,"select distinct City from  tblproperty where id ='11'");
while($row5=mysqli_fetch_array($query5))
{
?>
			
                                <a href="cityimg/<?php echo $row['cityimg'];?>"><img src="images/popular-places/13.jpg" alt=""></a>
</div>

                            <div class="sc-2-detail">
							
                                <h4 class="sc-jb-title"><a href="citywise-property-detail.php?cityproid=<?php echo $row5['City'];?>	">Vaghodia</a></h4>
                             <span>Properties</span>

                    </div>
					</div>
					</div><?php }?>
                </div>
                <!-- /row -->
            </div>
        </section>
        <!-- END SECTION POPULAR PLACES -->

        <!-- START SECTION RECENTLY PROPERTIES -->
        <section class="featured portfolio rec-pro disc">
            <div class="container-fluid">
                <div class="sec-title discover">
                    <h2><span>Discover </span>Popular Properties</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="portfolio col-xl-12 h-500" style="height:500px;" >
				<div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                    <div class="slick-lancers">
					<div class="card">
                        <div class="agents-grid" data-aos="fade-up">
                            <div class="people landscapes no-pb pbp-3 h-400">
                                <div class="project-single no-mb last h-400">
								 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
											<div class="img-card">
                        <img src="propertyimg/<?php echo $row['FeaturedImage'];?>" >
						</div>
                        <span class="property--status"><?php echo $row['Status'];?></span>
                        </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="btn"><i class="fa fa-link"></i></a>
                                            
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                       <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo $row['Address'];?>
<?php echo $row['City'];?>
<?php echo $row['State'];?>  
<?php echo $row['Country'];?></span>
                                            </a>
                                        </p>
										
                                        <!-- homes List -->
										 
                                        <ul class="homes-list clearfix pb-0">
                                            <li class="the-icons"><i class="flaticon-bed mr-2" aria-hidden="true"></i><span>Beds:</span><span>
											<?php echo $row['Bedrooms'];?></span></li>
                                            <li class="the-icons"><i class="flaticon-bathtub mr-2" aria-hidden="true"></i><span>Baths:</span><span>
											<?php echo $row['Bathrooms'];?></span></li>
                                            <li class="the-icons"><i class="fa fa-map-marker" style="font-size:20px"></i><span>Area:</span><span>
											<?php echo $row['Area'];?></span></li>
                                        </ul>
                                    </div>
									<?php }?>
                                </div>

                            </div>
                        </div>
						</div>
						<div class="card">
                        <div class="agents-grid" data-aos="fade-up">
                            <div class="landscapes">
                                <div class="project-single">
                                    <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
											<div class="img-card">
                        <img src="propertyimg/<?php echo $row['FeaturedImage'];?>"  width='380' height='300'>
						</div>
                        <span class="property--status"><?php echo $row['Status'];?></span>
                        </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="btn"><i class="fa fa-link"></i></a>
                                            
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                       <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo $row['Address'];?>
<?php echo $row['City'];?>
<?php echo $row['State'];?>
<?php echo $row['Country'];?></span>
                                            </a>
                                        </p>
										
                                        <!-- homes List -->
										 
                                        <ul class="homes-list clearfix pb-0">
                                            <li class="the-icons"><i class="flaticon-bed mr-2" aria-hidden="true"></i><span>Beds:</span><span>
											<?php echo $row['Bedrooms'];?></span></li>
                                            <li class="the-icons"><i class="flaticon-bathtub mr-2" aria-hidden="true"></i><span>Baths:</span><span>
											<?php echo $row['Bathrooms'];?></span></li>
                                            <li class="the-icons"><i class="fa fa-map-marker" style="font-size:20px"></i><span>Area:</span><span>
											<?php echo $row['Area'];?></span></li>
                                        </ul>
                                    </div>
									<?php }?>
                                </div>

                                </div>
                            </div></div>
                       
						
						<div class="card">
						<div class="agents-grid" data-aos="fade-up">
                            <div class="landscapes">
                                <div class="project-single no-mb">
                                                                     <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
											<div class="img-card">
                        <img src="propertyimg/<?php echo $row['FeaturedImage'];?>" width='380' height='300'>
						</div>
                        <span class="property--status"><?php echo $row['Status'];?></span>
                        </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="btn"><i class="fa fa-link"></i></a>
                                            
                                            
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                       <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo $row['Address'];?>
<?php echo $row['City'];?>
<?php echo $row['State'];?> 
<?php echo $row['Country'];?></span>
                                            </a>
                                        </p>
										
                                        <!-- homes List -->
										 
                                        <ul class="homes-list clearfix pb-0">
                                            <li class="the-icons"><i class="flaticon-bed mr-2" aria-hidden="true"></i><span>Beds:</span><span>
											<?php echo $row['Bedrooms'];?></span></li>
                                            <li class="the-icons"><i class="flaticon-bathtub mr-2" aria-hidden="true"></i><span>Baths:</span><span>
											<?php echo $row['Bathrooms'];?></span></li>
                                            <li class="the-icons"><i class="fa fa-map-marker" style="font-size:20px"></i><span>Area:</span><span>
											<?php echo $row['Area'];?></span></li>
                                        </ul>
                                    </div>
									<?php }?>
                                </div>
                                </div>
                            </div>
							</div>
							
							<div class="card">
							<div class="agents-grid" data-aos="fade-up">
                            <div class="people">
                                <div class="project-single no-mb">
                                     <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
											<div class="img-card">
                        <img src="propertyimg/<?php echo $row['FeaturedImage'];?>"  width='380' height='300'>
						</div>
                        <span class="property--status"><?php echo $row['Status'];?></span>
                        </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="btn"><i class="fa fa-link"></i></a>
                                           
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                       <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo $row['Address'];?>
<?php echo $row['City'];?>
<?php echo $row['State'];?>  
<?php echo $row['Country'];?></span>
                                            </a>
                                        </p>
										
                                        <!-- homes List -->
										 
                                        <ul class="homes-list clearfix pb-0">
                                            <li class="the-icons"><i class="flaticon-bed mr-2" aria-hidden="true"></i><span>Beds:</span><span>
											<?php echo $row['Bedrooms'];?></span></li>
                                            <li class="the-icons"><i class="flaticon-bathtub mr-2" aria-hidden="true"></i><span>Baths:</span><span>
											<?php echo $row['Bathrooms'];?></span></li>
                                            <li class="the-icons"><i class="fa fa-map-marker" style="font-size:20px"></i><span>Area:</span><span>
											<?php echo $row['Area'];?></span></li>
                                        </ul>
                                    </div>
									<?php }?>
                                </div>
                            </div>
                        </div></div>
						<div class="card">
							
						<div class="agents-grid" data-aos="fade-up">
                            <div class="landscapes">
                                <div class="project-single no-mb">
                                      <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
											<div class="img-card">
                        <img src="propertyimg/<?php echo $row['FeaturedImage'];?>" width='380' height='300'>
						</div>
                        <span class="property--status"><?php echo $row['Status'];?></span>
                        </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="btn"><i class="fa fa-link"></i></a>
                                            
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                       <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo $row['Address'];?>
<?php echo $row['City'];?>
<?php echo $row['State'];?> 
<?php echo $row['Country'];?></span>
                                            </a>
                                        </p>
										
                                        <!-- homes List -->
										 
                                        <ul class="homes-list clearfix pb-0">
                                            <li class="the-icons"><i class="flaticon-bed mr-2" aria-hidden="true"></i><span>Beds:</span><span>
											<?php echo $row['Bedrooms'];?></span></li>
                                            <li class="the-icons"><i class="flaticon-bathtub mr-2" aria-hidden="true"></i><span>Baths:</span><span>
											<?php echo $row['Bathrooms'];?></span></li>
                                            <li class="the-icons"><i class="fa fa-map-marker" style="font-size:20px"></i><span>Area:</span><span>
											<?php echo $row['Area'];?></span></li>
                                        </ul>
                                    </div>
									<?php }?>
                                </div>
                            </div>
                        </div>	
							</div>
							
							
							
							
							
						<div class="card">	
							<div class="agents-grid" data-aos="fade-up">
                            <div class="people landscapes no-pb pbp-3">
                                <div class="project-single no-mb last">
								 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
											<div class="img-card">
                        <img src="propertyimg/<?php echo $row['FeaturedImage'];?>" width='380' height='300'>
						</div>
                        <span class="property--status"><?php echo $row['Status'];?></span>
                        </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="btn"><i class="fa fa-link"></i></a>
                                            
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                       <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo $row['Address'];?>
<?php echo $row['City'];?>
<?php echo $row['State'];?>
<?php echo $row['Country'];?></span>
                                            </a>
                                        </p>
										
                                        <!-- homes List -->
										 
                                        <ul class="homes-list clearfix pb-0">
                                            <li class="the-icons"><i class="flaticon-bed mr-2" aria-hidden="true"></i><span>Beds:</span><span>
											<?php echo $row['Bedrooms'];?></span></li>
                                            <li class="the-icons"><i class="flaticon-bathtub mr-2" aria-hidden="true"></i><span>Baths:</span><span>
											<?php echo $row['Bathrooms'];?></span></li>
                                            <li class="the-icons"><i class="fa fa-map-marker" style="font-size:20px"></i><span>Area:</span><span>
											<?php echo $row['Area'];?></span></li>
                                        </ul>
                                    </div>
									<?php }?>
                                </div>

                            </div>
                        </div></div>
							
							
						<div class="card">	
						<div class="agents-grid" data-aos="fade-up">
                            <div class="people landscapes no-pb pbp-3">
                                <div class="project-single no-mb last">
								 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
											<div class="img-card">
                        <img src="propertyimg/<?php echo $row['FeaturedImage'];?>" width='380' height='300'>
						</div>
                        <span class="property--status"><?php echo $row['Status'];?></span>
                        </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="btn"><i class="fa fa-link"></i></a>
                                            
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                       <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo $row['Address'];?>
<?php echo $row['City'];?>
<?php echo $row['State'];?> 
<?php echo $row['Country'];?></span>
                                            </a>
                                        </p>
										
                                        <!-- homes List -->
										 
                                        <ul class="homes-list clearfix pb-0">
                                            <li class="the-icons"><i class="flaticon-bed mr-2" aria-hidden="true"></i><span>Beds:</span><span>
											<?php echo $row['Bedrooms'];?></span></li>
                                            <li class="the-icons"><i class="flaticon-bathtub mr-2" aria-hidden="true"></i><span>Baths:</span><span>
											<?php echo $row['Bathrooms'];?></span></li>
                                            <li class="the-icons"><i class="fa fa-map-marker" style="font-size:20px"></i><span>Area:</span><span>
											<?php echo $row['Area'];?></span></li>
                                        </ul>
                                    </div>
									<?php }?>
                                </div>

                            </div>
                        </div>	</div>
							
                    </div>
                </div>
            </div>
        </section>
                <section class="testimonials bg-white-3 rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Clients </span>Testimonials</h2>
                    <p>We collect reviews from our customers.</p>
                </div>
                <div class="owl-carousel job_clientSlide">
                    <div class="singleJobClinet" data-aos="zoom-in">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="images/testimonials/ts-1.jpg" alt=""/></span>
                            <h5>Lisa Smith</h5>
                            <p>New York</p>
                        </div>
                    </div>
                    <div class="singleJobClinet" data-aos="zoom-in">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="images/testimonials/ts-2.jpg" alt=""/></span>
                            <h5>Jhon Morris</h5>
                            <p>Los Angeles</p>
                        </div>
                    </div>
                    <div class="singleJobClinet" data-aos="zoom-in">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="images/testimonials/ts-3.jpg" alt=""/></span>
                            <h5>Mary Deshaw</h5>
                            <p>Chicago</p>
                        </div>
                    </div>
                    <div class="singleJobClinet">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="images/testimonials/ts-4.jpg" alt=""/></span>
                            <h5>Gary Steven</h5>
                            <p>Philadelphia</p>
                        </div>
                    </div>
                    <div class="singleJobClinet">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="images/testimonials/ts-5.jpg" alt=""/></span>
                            <h5>Cristy Mayer</h5>
                            <p>San Francisco</p>
                        </div>
                    </div>
                    <div class="singleJobClinet">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="images/testimonials/ts-6.jpg" alt=""/></span>
                            <h5>Ichiro Tasaka</h5>
                            <p>Houston</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION TESTIMONIALS -->

        <!-- STAR SECTION PARTNERS -->
        <div class="partners bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Our </span>Partners</h2>
                    <p>The Companies That Represent Us.</p>
                </div>
                <div class="owl-carousel style2">
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/11.jpg" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/12.jpg" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/13.jpg" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/14.jpg" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/15.jpg" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/16.jpg" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/17.jpg" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/11.jpg" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/12.jpg" alt=""></div>
                    <div class="owl-item" data-aos="fade-up"><img src="images/partners/13.jpg" alt=""></div>
                </div>
            </div>
        </div>
        <!-- END SECTION PARTNERS -->

        <!-- START FOOTER -->
     <?php

include('includes/footer.php');
?>


        <!-- END FOOTER -->

        <!--register form -->
        
        <!--register form end -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/rangeSlider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos2.js"></script>
        <script src="js/animate.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/typed.min.js"></script>
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
        <script src="js/forms-2.js"></script>
        <script src="js/map-style2.js"></script>
        <script src="js/range.js"></script>
        <script src="js/color-switcher.js"></script>
        <script>
            $(window).on('scroll load', function() {
                $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
            });

        </script>

        <!-- Slider Revolution scripts -->
        <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

        <script>
            var typed = new Typed('.typed', {
                strings: ["House ^2000", "Apartment ^2000", "Plaza ^4000"],
                smartBackspace: false,
                loop: true,
                showCursor: true,
                cursorChar: "|",
                typeSpeed: 50,
                backSpeed: 30,
                startDelay: 800
            });

        </script>

        <script>
            $('.slick-lancers').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });

        </script>

        <script>
            $('.job_clientSlide').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                autoplay: false,
                nav: true,
                smartSpeed: 1000,
                slideSpeed: 1000,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    991: {
                        items: 3
                    }
                }
            });

        </script>

        <script>
            $('.style2').owlCarousel({
                loop: true,
                margin: 0,
                dots: false,
                autoWidth: false,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 2,
                        margin: 20
                    },
                    400: {
                        items: 2,
                        margin: 20
                    },
                    500: {
                        items: 3,
                        margin: 20
                    },
                    768: {
                        items: 4,
                        margin: 20
                    },
                    992: {
                        items: 5,
                        margin: 20
                    },
                    1000: {
                        items: 7,
                        margin: 20
                    }
                }
            });

        </script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });

        </script>

        <!-- MAIN JS -->
        <script src="js/script.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:01:10 GMT -->
</html>
