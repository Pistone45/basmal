<?php
include_once("functions/functions.php");
    $getSecretariat = new Secretariat();
    $secretariats = $getSecretariat->getSecretariat();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>About basketball Association of Malawi</title>
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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <!--::header part start::-->
   <?php include_once("header.html"); ?>
    <!-- Header part end-->


    <!-- about us start-->
    <section class=" " style="padding-top:50px;">
        <div class="container fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12" style="padding-top:20px;">
                    <div class="about_part_text text-justify">
                        <h3>Brief Background</h3>
                        <p>Basketball Association of Malawi is the only body mandated to run run basketball in Malawi. Basmal is affiiated to FIBA. 
						The Southern Zone Basketball League, The Central Zone Basketball League and the Nothern Zone Basketball League are all affiiated to Basmal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<br><br>
<div class="row container-fluid">
    <?php
        if(isset($secretariats) && count($secretariats)>0){
        foreach($secretariats as $secretariat){ ?>
    <div class="col-md-6">
    <div class="card border-secondary">
      <div class="card-body text-secondary">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo $secretariat['image_url']?>" alt="" class="img-fluid">
                        <hr>
                        <h4><?php echo $secretariat['fullname']?></h4>
                    </div>
                    <div class="col-md-8">
                        <h4><?php echo $secretariat['position']?></h4>
                        <p><?php echo substr($secretariat['description'],0, 200)?>.......</p>
                        <br>
                        <a href="secretariat-details?id=<?php echo $secretariat['id']?>"><button class="btn btn-info">View Profile</button></a>
                    </div>
                </div>
      </div>
      </div>
      <br>
    </div>
            <?php
            
            }
        }
    ?>


</div>

   <br>
   

    <!-- footer part start-->
    <?php include_once("footer.html"); ?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
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