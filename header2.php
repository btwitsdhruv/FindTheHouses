<?php
session_start();
error_reporting(0);
include('dbconnection.php');

if (isset($_POST['signup'])) {
    $fname = $_POST['fullname'];
    $mobno = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype'];
    $password = md5($_POST['password']);

    $ret = mysqli_query($con, "select Email from tbluser where Email='$email'");
    $result = mysqli_fetch_array($ret);
    if ($result > 0) {
        echo "<script>alert('This email already associated with another account');</script>";
    } else {
        $query = mysqli_query($con, "insert into tbluser(FullName, Email, MobileNumber, Password,UserType) value('$fname', '$email','$mobno', '$password','$usertype' )");
        if ($query) {
            echo "<script>alert('You have successfully registered');</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    }
}

//code for login
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select ID,UserType,Email from tbluser where  Email='$email' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['ut'] = $ret['UserType'];
        $_SESSION['remsuid'] = $ret['ID'];
        $_SESSION['uemail'] = $ret['Email'];

        header('location:index.php');
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>
<!--register form -->
<div class="login-and-register-form modal">
    <div class="main-overlay"></div>
    <div class="main-register-holder">
        <div class="main-register fl-wrap">
            <div class="close-reg"><i class="fa fa-times"></i></div>
            <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>


            <div id="tabs-container">
                <ul class="tabs-menu">
                    <li class="current"><a href="#tab-1">Login</a></li>
                    <li><a href="#tab-2">Register</a></li>
                </ul>
                <div class="tab">
                    <div id="tab-1" class="tab-contents">
                        <div class="custom-form">
                            <form method="post" name="registerform">
                                <label>Username or Email Address * </label>
                                <input type="email" class="form-control" name="email" id="email" required="true" placeholder="Email Address">
                                <label>Password * </label>
                                <input type="password" class="form-control" name="password" id="password" required="true" placeholder="Password">

                                <button type="submit" name="signin" class="log-submit-btn" value="Sign In"><span>Log In</span></button>
                                <div class="clearfix"></div>
                                <div class="filter-tags">
                                    <input id="check-a" type="checkbox" name="check">
                                    <label for="check-a">Remember me</label>
                                </div>
                            </form>
                            <div class="lost_password">
                                <a href="change-password.php">Lost Your Password?</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab">

                        <div id="tab-2" class="tab-contents" id="signup">
                            <div class="custom-form">
                                <form class="main-register-form" method="post" name="signup">

                                    <label>First Name * </label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">

                                    <!-- .form-group end -->
                                    <label>Email Address *</label>
                                    <input type="email" class="form-control" name="email" id="email" required="true" placeholder="Email Address">

                                    <label>Mobile Number *</label>
                                    <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" maxlength="10" required="true" placeholder="Mobile Number" pattern="[0-9]{10}">

                                    <label>Password *</label>
                                    <input type="password" class="form-control" name="password" id="password" required="true" placeholder="Password" pattern="[A-Za-z0-9_!@#$%^&*()?]{6,30}">

                                    <div class="form-group">
                                        <label>User Type *</label>
<!--                                        
                                        <input type="radio" name="usertype" value="1" checked="true">Broker &nbsp; &nbsp; -->
                                        <input type="radio" name="usertype" value="2">Owner &nbsp; &nbsp; 
                                        <input type="radio" name="usertype" value="3">User
                                    </div>
                                    <!-- .form-group end -->

                                    <input type="submit" class="log-submit-btn" name="signup" value="Register">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<header id="header-container">
            <!-- Header -->
            <div id="header">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="index.php"><img src="images/logo-red.svg" alt=""></a>
                        </div>
                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">
                                <li>
                                <a href="index.php">home</a>
                               
                            </li>
                            <!-- li end -->

                             <li><a href="about.php">about</a></li>

                        
                            <li><a href="properties-grid.php">properties</a></li>

                            <li><a href="contact.php">contact</a></li>
                              
                               <?php if (strlen($_SESSION['remsuid']==0)) {?>
                            <li>
                                <a href="admin/login.php">admin</a>
                               
                            </li>
                        <?php } ?>
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                     
                        
                    
                    </div>
				

                  
            <?php if ($_SESSION['ut'] == 1 || $_SESSION['ut'] == 2) { ?>
    <div class="right-side d-none d-none d-lg-none d-xl-flex">
        <div class="module module-property pull-left">
            <a href="add-property.php" class="btn" style="background-color: red;color:aliceblue;"><i class="fa fa-plus"></i> add property</a>
        </div>
    </div>
<?php } ?>


                    <!-- Right Side Content / End -->
                   
					 <?php if (strlen($_SESSION['remsuid']!=0)) {?>
                        
						
                  
 
 			<?php
  $uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");


while ($row=mysqli_fetch_array($ret)) {

?>
                        
                               <div class="header-user-menu user-menu">
                            <div class="header-user-name">
							<?php
$sql = "SELECT * FROM tbluserimage WHERE email='".$_SESSION['remsuid']."'ORDER BY Email DESC";
$check = mysqli_query($con, $sql);
if($check) {
	while($row10=mysqli_fetch_array($check)){
		?>
 <span>	<img src="userpic/<?php echo $row10['image']; ?>"  > </span>
	<?php }?>
		<?php
}
else {
	
	?>
    <span><img src="images\avatar.png" alt=""></span>
	<?php 
} 
?>
                                  Hi,<?php  echo $row['FullName'];?>
                                <?php if (strlen($_SESSION['remsuid']!=0)) {?>
                                
                                <ul>
                                    <li><a href="user-profile.php">user profile</a></li>
                                    <li><a href="change-password.php">change password</a></li>
                                   <li><a href="logout.php">Logout</a></li>
                                </ul>
                                <?php } ?>
                            </div>
                            
                        </div>
                            
                       
<?php }?>
                        
                         <?php } ?>
						
                    
                    <!-- Right Side Content / End -->

                      <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                        <!-- Header Widget -->
						<?php if (strlen($_SESSION['remsuid']==0)) {?>
                           
                       
                        <div class="header-widget sign-in">
                            <div class="show-reg-form modal-open"><a href="#">Sign In</a></div>

                        </div>
						 <?php } ?>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- lang-wrap-->
                    
                    <!-- lang-wrap end-->

                </div>
            </div>
            <!-- Header / End -->

        </header>