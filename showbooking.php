<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (empty($_SESSION['remsuid'])) {
    header('location:logout.php');
    exit();
} else {
    if (isset($_REQUEST['eid'])) {
        $eid = intval($_GET['eid']);
        $status = "2";
        $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();

        $msg = "Booking Successfully Cancelled";
    }


    if (isset($_REQUEST['aeid'])) {
        $aeid = intval($_GET['aeid']);
        $status = 1;

        $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
        $query->execute();

        $msg = "Booking Successfully Confirmed";
    }


?>

    <!DOCTYPE html>
    <html lang="zxx">


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

    <body class="maxw1600 m0a dashboard-bd">
        <!-- Wrapper -->
        <div id="wrapper" class="int_main_wraapper">
            
            <div class="dash-content-wrap">
            <?php
include('includes/header-2.php');
?>
            <section class="user-page section-padding pt-5">
                <div class="container-fluid">
                    <div class="row">
                        <?php

                        include('includes/sidebar.php');
                        ?>

                        <div class="my-properties">
                            <table class="table-responsive">
                                <thead>
                                    <tr>

                                        <th class="pl-2">userid</th>
                                        <th>property id</th>
                                        <th>Booking No</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Posting date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $uid = $_SESSION['remsuid'];
                                    $query = mysqli_query($con, "select * from tblbooking where UserId='$uid'");
                                    $num = mysqli_num_rows($query);
                                    if ($num > 0) {
                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                            <tr>


                                                <td><?php echo $row['UserId']; ?></td>
                                                <td><?php echo $row['PropertyId']; ?></td>
                                                <td><?php echo $row['BookingNumber']; ?></td>
                                                <td><?php echo $row['FromDate']; ?></td>
                                                <td><?php echo $row['ToDate']; ?></td>
                                                <td><?php echo $row['message']; ?></td>
                                                <td>
    <?php 
        if ($row['Status'] == 0) {
            echo 'Not Confirmed';
        } else {
            echo 'Confirmed';
        }
    ?>
</td>

                                                <td><?php echo $row['PostingDate']; ?></td>
                                               
                                            </tr>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    } ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
        </div>
        </section>

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

        <!-- MAIN JS -->
        <script src="js/script.js"></script>

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

        </div>
        <!-- Wrapper / End -->
    </body>

    </html>
<?php } ?>