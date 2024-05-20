<?php
session_start();
error_reporting(0);
include('dbconnection.php');



  
 
 $deid=$_GET['deleteid'];
 
$query = "delete from  tblproperty WHERE ID=$deid" ;
$data=mysqli_query($con,$query);
   if ($data) {
    echo '<script>alert("Property  has been deleted.")</script>';
echo "<script>window.location.href ='my-listings.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  
  
?> 

 