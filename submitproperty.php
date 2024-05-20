<?php
if (isset($_POST['submit'])) {
        $uid = $_SESSION['remsuid'];
        $protitle = $_POST['propertytitle'];
        $prodec = $_POST['propertydescription'];
        $type = $_POST['selecttype'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $bedrooms = $_POST['bedrooms'];
        $bathrooms = $_POST['bathrooms'];
        $floors = $_POST['floors'];
        $garages = $_POST['garages'];
        $area = $_POST['area'];
        $size = $_POST['size'];
        $srprice = $_POST['salerentprice'];
        $beforepricelabel = $_POST['beforepricelabel'];
        $afterpricelabel = $_POST['afterpricelabel'];
        $propertylink = $_POST['propertylink'];
        $ccolling = $_POST['centercolling'];
        $balcony = $_POST['balcony'];
        $petfrndly = $_POST['petfrndly'];
        $barbeque = $_POST['barbeque'];
        $firealarm = $_POST['firealarm'];
        $modkitchen = $_POST['modkitchen'];
        $storage = $_POST['storage'];
        $dryer = $_POST['dryer'];
        $heating = $_POST['heating'];
        $pool = $_POST['pool'];
        $laundry = $_POST['laundry'];
        $sauna = $_POST['sauna'];
        $gym = $_POST['gym'];
        $elevator = $_POST['elevator'];
        $dishwasher = $_POST['dishwasher'];
        $eexit = $_POST['eexit'];

        $proaddress = $_POST['address'];
        $procountry = $_POST['country'];
        $procity = $_POST['city'];
        $prostate = $_POST['state'];
        $prozipcode = $_POST['zipcode'];
        $neighborhood = $_POST['neighborhood'];

        $proid = mt_rand(100000000, 999999999);
        //fetured Image
        $pic = $_FILES["featuredimage"]["name"];
        $extension = substr($pic, strlen($pic) - 4, strlen($pic));
        //Property  Image 1
        $pic1 = $_FILES["galleryimage1"]["name"];
        $extension1 = substr($pic1, strlen($pic1) - 4, strlen($pic1));
        //Property  Image 2
        $pic2 = $_FILES["galleryimage2"]["name"];
        $extension2 = substr($pic2, strlen($pic2) - 4, strlen($pic2));
        //Property  Image 3
        $pic3 = $_FILES["galleryimage3"]["name"];
        $extension3 = substr($pic3, strlen($pic3) - 4, strlen($pic3));
        //Property  Image 4
        $pic4 = $_FILES["galleryimage4"]["name"];
        $extension4 = substr($pic4, strlen($pic4) - 4, strlen($pic4));
        //Property  Image 5
        $pic5 = $_FILES["galleryimage5"]["name"];
        $extension5 = substr($pic5, strlen($pic5) - 4, strlen($pic5));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        if (!in_array($extension1, $allowed_extensions)) {
            echo "<script>alert('Property gallery image1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        if (!in_array($extension2, $allowed_extensions)) {
            echo "<script>alert('Property gallery image2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        if (!in_array($extension3, $allowed_extensions)) {
            echo "<script>alert('Property gallery image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        if (!in_array($extension4, $allowed_extensions)) {
            echo "<script>alert('Property gallery image4 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        if (!in_array($extension5, $allowed_extensions)) {
            echo "<script>alert('Property gallery image5 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename property images
            $propic = md5($pic) . time() . $extension;
            $propic1 = md5($pic1) . time() . $extension1;
            $propic2 = md5($pic2) . time() . $extension2;
            $propic3 = md5($pic3) . time() . $extension3;
            $propic4 = md5($pic4) . time() . $extension4;
            $propic5 = md5($pic5) . time() . $extension5;
            move_uploaded_file($_FILES["featuredimage"]["tmp_name"], "propertyimg/" . $propic);
            move_uploaded_file($_FILES["galleryimage1"]["tmp_name"], "propertyimg/" . $propic1);
            move_uploaded_file($_FILES["galleryimage2"]["tmp_name"], "propertyimg/" . $propic2);
            move_uploaded_file($_FILES["galleryimage3"]["tmp_name"], "propertyimg/" . $propic3);
            move_uploaded_file($_FILES["galleryimage4"]["tmp_name"], "propertyimg/" . $propic4);
            move_uploaded_file($_FILES["galleryimage5"]["tmp_name"], "propertyimg/" . $propic5);

            $query = mysqli_query($con, "insert into tblproperty(UserID,PropertyTitle,PropertDescription,Type,Status,Location,Bedrooms,Bathrooms,Floors,Garages,Area,Size,RentorsalePrice,BeforePricelabel,AfterPricelabel,propertylink,PropertyID,CenterCooling,Balcony,PetFriendly,Barbeque,FireAlarm,ModernKitchen,Storage,Dryer,Heating,Pool,Laundry,Sauna,Gym,Elevator,DishWasher,EmergencyExit,FeaturedImage,GalleryImage1,GalleryImage2,GalleryImage3,GalleryImage4,GalleryImage5,Address,Country,City,State,ZipCode,Neighborhood)value('$uid','$protitle','$prodec','$type','$status','$location','$bedrooms','$bathrooms','$floors','$garages','$area','$size','$srprice','$beforepricelabel','$afterpricelabel','$propertylink','$proid','$ccolling','$balcony','$petfrndly','$barbeque','$firealarm','$modkitchen','$storage','$dryer','$heating','$pool','$laundry','$sauna','$gym','$elevator','$dishwasher','$eexit','$propic','$propic1','$propic2','$propic3','$propic4','$propic5','$proaddress','$procountry','$procity','$prostate','$prozipcode','$neighborhood')");
            if ($query) {
                echo '<script>alert("Property detail has been added.")</script>';
                echo "<script>window.location.href ='add-property.php'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
    }
?>