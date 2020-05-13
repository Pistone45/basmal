<?php
include_once("functions/functions.php");

//Registering a reporter/journalist
if(isset($_POST['submit'])){
    
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];    
    $phone = $_POST['phone'];
    $media_house = $_POST['media_house'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    
    $username = $email;
    $password = password_hash($password, PASSWORD_DEFAULT)."\n"; 
    $addReporter = new User();
    $addReporter->addReporter($username,$fname,$lname,$password,$phone,$media_house,$email);
    
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register | Basketball Association of Malawi</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <?php include_once("header.html"); ?>
    <!-- Header part end-->

    <!-- about part start-->
 <br>
 <h1 align="center">Register as a Reporter</h1>
 <br>

<div class="row container-fluid">
    <div class="col-md-3"></div>

    <div class="col-md-6">
                <!-- form start -->
            <form role="form" action="register.php" method="POST">
            <?php
                            if(isset($_SESSION["reporter-added"]) && $_SESSION["reporter-added"]==true)
                            {
                                echo "<div class='alert alert-success'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>*</button>";
                                echo "<strong>Success! </strong>"; echo "You have successfully Registered as a reporter";
                                unset($_SESSION["reporter-added"]);
                                echo "</div>";
                                 header('Refresh: 5; URL= admin/login.php');
                            }elseif(isset($_SESSION["user_found"]) && $_SESSION["user_found"]==true)
                            {
                                echo "<div class='alert alert-warning'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>*</button>";
                                echo "<strong>Warning! </strong>"; echo "The Reporter is already in the system";
                                unset($_SESSION["user_found"]);
                                echo "</div>";
                                 header('Refresh: 5; URL= register.php');
                            }
                            ?>
              <div class="box-body">
              
                <div class="form-group">
                  <label for="Firstname">Firstname</label>
                  <input type="text" class="form-control" id="fname" name="fname">
                </div> 
                    
                 <div class="form-group">
                  <label for="Lastname">Lastname</label>
                  <input type="text" class="form-control" id="lname" name="lname">
                </div>    
                
                <div class="form-group">
                  <label for="Lastname">Media House</label>
                  <input type="text" placeholder="e.g Zodiak" class="form-control" id="lname" name="media_house">
                </div>    
                
                
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>
                
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
              </div>
            </form>
    </div>

    <div class="col-md-3"></div>
</div>
 
    <!-- about part end-->


    <!--================Blog Area =================-->
    <section class="blog_area" style="padding-top:40px;">
        <div class="container">
            <div class="row">
			 <div class="col-lg-6 col-sm-12">

				
			 </div>
			 
			 <div class="col-lg-6 col-sm-12">

			 </div>
                
              
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!-- footer part start-->
     <?php include_once("footer.html"); ?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- isotope js -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>