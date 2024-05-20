<div class="col-lg-4 col-md-6 py-1 pr-30 pl-0 ">
                                                                    <!-- Form Bedrooms -->
                                                                    <div class="form-group beds">
                                                                       
																		
                                                                            
																			<select  name="status" id="status" required="true">
																			<span class="current"><i class="fa fa-bed" aria-hidden="true">
																		</i> </span>
                                        <option value=""class="option selected">BEDROOMS</option>
                                        <?php
$query2=mysqli_query($con,"select distinct Bedrooms from  tblproperty");
while($row=mysqli_fetch_array($query2))
{
?>
                                        <option value="<?php echo $row['Bedrooms'];?>" ><?php echo $row['Bedrooms'];?></option>
                                        <?php } ?>
                                    </select>
                                                                      
                                                                    </div>
                                                                    <!--/ End Form Bedrooms -->
                                                                </div>