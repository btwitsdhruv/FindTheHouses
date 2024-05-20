

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {

    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // SQL query to insert data into tblcontactus
    $sql = "INSERT INTO tblcontactus (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Your message was sent successfully!");</script>';
        header("Location: ".$_SERVER['PHP_SELF']);
       
    } else {
        echo '<script>alert("Error: ' . $con->error . '");</script>';
    }

}
?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:03:00 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Contact Us</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="css/leaflet.css">
    <link rel="stylesheet" href="css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.default.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages hd-white">
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

        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>Contact Us</h1>
                    <h2><a href="index.php">Home </a> &nbsp;/&nbsp; Contact Us</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION CONTACT US -->
        <section class="contact-us">
            <div class="container">
                <?php      $uid = $_SESSION['remsuid'];
                                            $sqlq = mysqli_query($con, "select * from tbluser where ID='$uid'");
                                            while ($ret = mysqli_fetch_array($sqlq)) {
                                                $fname = $ret['FullName'];
                                                $uemail = $ret['Email'];
                                                $mnumebr = $ret['MobileNumber'];
                                            }
                                        ?>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <h3 class="mb-4">Contact Us</h3>
                        <form  method="POST" novalidate>
    <div id="success" class="successform">
        <p class="alert alert-success font-weight-bold" role="alert">Your message was sent successfully!</p>
    </div>
    <div id="error" class="errorform">
        <p>Something went wrong, try refreshing and submitting the form again.</p>
    </div>
    <div class="form-group">
        <input type="text" required class="form-control input-custom input-full" value="<?php echo $fname; ?>" name="name" placeholder="First Name">
    </div>  
    <div class="form-group">
        <input type="text" class="form-control input-custom input-full" value="<?php echo $uemail; ?>" name="email" placeholder="Email">
    </div>
    <div class="form-group">
        <textarea class="form-control textarea-custom input-full" id="ccomment" name="message" required rows="8" placeholder="Message"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
</form>

                    </div>
                    <div class="col-lg-4 col-md-12 bgc">
                        <div class="call-info">
						<?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                            <h3>Contact Details</h3>
                            <p class="mb-5">Please find below contact details and contact us today!</p>
                            <ul>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="in-p"><?php  echo $row['PageDescription'];?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="in-p">+<?php  echo $row['MobileNumber'];?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="in-p ti"><?php  echo $row['Email'];?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info cll">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <p class="in-p ti">8:00 a.m - 9:00 p.m</p>
                                    </div>
                                </li>
                            </ul>
							  <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php

include('includes/footer.php');
?>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!--register form -->
       
        <!--register form end -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/forms.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/leaflet.js"></script>
        <script src="js/leaflet-gesture-handling.min.js"></script>
        <script src="js/leaflet-providers.js"></script>
        <script src="js/leaflet.markercluster.js"></script>
        <script src="js/map-single.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/inner.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 11:03:01 GMT -->
</html>
