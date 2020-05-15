<?php
include_once('functions/functions.php'); 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$getSpecificNews = new News();
	$news = $getSpecificNews->getSpecificNews($id);
	
}else{

    echo "No news found";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php if(isset($news)){ echo $news['title']; } ?>" >
    <title>News Details about Basketball in Malawi</title>
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


    <!-- about us start-->
    <section class=" " style="padding-top:50px;">
        <div class="container">
		<?php
			if(isset($news) && count($news)>0){ ?>
				<div class="row">
                <div class="col-md-6 col-lg-6" style="padding-top:20px;">
                    <div class="">
                        <img src="<?php echo substr($news['news_image'],3); ?>" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5" style="padding-top:20px;">
                    <div class="about_part_text text-justify">
                        <h3><?php echo $news['title']; ?></h3>
                        <p><?php echo nl2br($news['content']); ?></p>
                        <br>
                    </div>
                </div>
            </div>
			<?php
				
			}else {
                                    ?>
                    <div class="alert alert-secondary">
                    <p>No News available. Come check later</p>
                    </div>
                    <?
             }
		?>
            
        </div>
    </section>
   
   

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