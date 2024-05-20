<?php
session_start();
error_reporting(0);
include('dbconnection.php');
$sid=$_POST['$stateid'];

 $query=mysqli_query($con,"select * from tblcity where StateID='$sid'"); ?>
<option value="">Select City</option>
 <?php
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['CityName'];?>"><?php echo $rw['CityName'];?></option>
                  

<?php }?>