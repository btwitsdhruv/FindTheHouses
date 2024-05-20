<div class="row featured portfolio-items">
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

                    <div class="item col-lg-4 col-md-12 col-xs-12 landscapes sale pr- pb-2" data-aos="fade-up" width='3000' height='3000'>
                        <div class="project-single mb-44 bb-0">
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <!-- homes img -->
                                    <a href="single-property-2.php?proid=<?php echo $row['ID'];?>" class="homes-img">
                                        <div class="homes-tag button alt featured"><?php echo $row['Type'];?></div>
                                        <div class="homes-tag button alt sale"><?php echo $row['Status'];?></div>
                                        <div class="homes-price"><?php echo $row['RentorsalePrice'];?></div>
                                        <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>" class="img-responsive">
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
                    </div><?php }
					
					
					
					
					
					
					
					
					
					
					
					<div class="row featured portfolio-items">
						 <?php
                      
$query=mysqli_query($con,"select * from tblproperty order by rand() limit 1");
while($row=mysqli_fetch_array($query))
{
?>
                            <div class="item col-lg-5 col-md-12 col-xs-12 landscapes sale pr-0 pb-0">
                                <div class="project-single mb-0 bb-0" data-aos="fade-up">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">View Property</a><span class="category">Real Estate</span></h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale"><?php echo $row['Status'];?></div>
                                                <div class="homes-price"><?php echo $row['RentorsalePrice'];?></div>
                                                
                                            </a>
											<img src="propertyimg/<?php echo $row['FeaturedImage'];?>" width="380" height="300">
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-4.php" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                </div>
</div>
                            <!-- homes content -->
                            <div class="col-lg-7 col-md-12 homes-content pb-0 mb-44" data-aos="fade-up">
                                <!-- homes address -->
                                <h3><a href="single-property-2.php?proid=<?php echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?></a></h3>
                                <p class="homes-address mb-3">
                                    <a href="single-property-2.php">
                                        <i class="fa fa-map-marker"></i><span><?php echo $row['Address'];?></span>
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
                                    
                                </ul>
                                <!-- Price -->
                                <div class="price-properties">
                                    <h3 class="title mt-3">
                                <a href="single-property-2.php"><?php echo $row['RentorsalePrice'];?></a>
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
                            </div>
							<?php }?>