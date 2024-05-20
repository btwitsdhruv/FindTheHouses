<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
$uid=$_SESSION['remsuid'];
$qry="insert into tbllike(UserID)value('$uid')";
if ($query) {
    echo '<script>alert("Property has been liked.")</script>';
echo "<script>window.location.href ='properties-grid.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>