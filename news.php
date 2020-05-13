<?php
include_once("functions/functions.php");
	//get news
	$getNews = new News();
	$news = $getNews->getNews();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>News | Basketball Association of Malawi</title>
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
 <h1 align="center">News</h1>
 <p align="center">Read the news below or click <a href="register.php"><button class="btn btn-outline-success">here</button></a> to register as a Reporter/Journalist</p>
 <br>

<div class="row container-fluid">
<?php
	if(isset($news) && count($news)>0){
		foreach($news as $new){ ?>
	<div style="padding-top: 20px; width: 100%;" class="col-md-3">
	<div class="card border-secondary">
	  <div class="card-body text-secondary">
	  	<img src="<?php echo substr($new['news_image'],3);?>" class="card-img-top" style="max-height:200px;" alt="blog">
	  	<br><br>
	  	<h5 class="card-title"><?php echo $new['title']; ?></h5>
	  	<p><?php echo substr($new['content'],0, 100); ?>.....</p>
	  	<a href="news-details.php?id=<?php echo $new['id']; ?>" class="btn_3">read more</a>

	  </div>
	 </div>
	</div>
		<?php
			
		}
	}
?>

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