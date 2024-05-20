<?php
session_start();
error_reporting(0);
include('dbconnection.php');

$cid=$_POST['$countryid'];

  $query=mysqli_query($con,"select * from tblstate where CountryID='$cid'"); ?>
<option value="">Select State</option>
  <?php
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['ID'];?>"><?php echo $rw['StateName'];?></option>
                  

<?php }?>