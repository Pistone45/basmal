<?php
include_once("functions/functions.php");

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mo626 | Basketball Association of Malawi</title>
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
 
                        	<div class="jumbotron"> <h2 class="text-center">MO626 BASKETBALL CHALLENGE SEASON 3 - GO, FIGHT, WIN!</h2></div>
 
        <div class="container">
            <div class="row text-center" style="padding-top:40px;">
                <div class="col-md-12 col-lg-12">
                    <div class="">
                        <h1>MO626 Fixture & Log Table</h1>

	
	
	
	
<div class="container">
            <div class="row blog">
                <div class="col-md-12">
                    <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                        

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row">
								<?php 
				if(isset($games) && count($games)>0){
					foreach($games as $game){ ?>
					<div class="col-md-6" style="padding-bottom:10px;">
						<div class="card">
						  <div class="card-body">
							<div class="row">
								<div class="col-lg-3 col-sm-5 col-xs-5">
								<center><img src="<?php echo substr($game['home_logo'],3); ?>" class="img-responsive" height="70" width="70" style="min-height:70px; min-width:70px;"/>  <br><?php echo $game['home_team']; ?></center>
								</div>
								<div class="col-lg-1 col-sm-1 col-xs-2">
									<center><h4>VS</h4></center>
								</div>
								
								<div class="col-lg-3 col-sm-5 col-xs-5">
								<center>	<img src="<?php echo substr($game['away_logo'],3); ?>" class="img-fluid" height="70" width="70"style="min-height:70px; min-width:70px;"/>  <br> <?php echo $game['away_team']; ?></center>
								</div>
								<div class="col-lg-5 col-sm-12 col-xs-12">
								<center>	<?php echo $game['venue']?></center>
									<hr>
									<center><?php echo $game['date_time']?></center>
								</div>
							</div>
							 
						  </div>
						</div>
						
					</div>
					<?php
						
					}
				}
			 ?>
                                    
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                         

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->

                </div>
            </div>
</div>

	
	
	
	
	

    <!-- about part start-->
    <section class="about_part  ">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="about_part_text">
                        <h2>Learn More About MO626 Digital Plus</h2>
                        <p>Mo626ice is a Mobile Phone Banking system through which you can access various banking 
						services from mobile phone handsets. Mo626ice can be accessed from any mobile phone network 
						in the world as long as the number you are using is registered on the system. You can access 
						the services by dialling *626# on your mobile and follow the prompt instructions. </p>
                        <div class="about_text_iner">
                            
                            <div class="about_iner_content">
                                <a href="https://natbank.co.mw/personal/electronic-banking/mo626ice" target="_blank"><h3>Read More</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="about_part_img">
                        <img src="images/mo_services.JPG" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->

                        
                    </div>
                </div>
                
            </div>
        </div>
 
    <!-- about part end-->


    <!--================Blog Area =================-->
    <section class="blog_area" style="padding-top:40px;">

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