<?php
include_once("functions/functions.php");

	$id = 1;
	$gender =2;
	//get Zome name
	$getSpecificZone = new Zone();
	$zone = $getSpecificZone->getSpecificZone($id);
	
	$getLogTable = new Game();
	$logtable = $getLogTable->getLogTable($id,$gender);
	
	$status =3; //3 means game has ended - will negate in getFixture
	$getFixture = new Game();
	$games = $getFixture->getFixture($status);

	//get news
	$getNews = new News();
	$news = $getNews->getNews();
	
	$getBanners = new Banner();
	$banners = $getBanners->getBanners();

	$getHomeNews = new News();
	$news = $getHomeNews->getHomeNews();

	$getMoreHomeNews = new News();
	$homenews = $getMoreHomeNews->getMoreHomeNews();



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Basketball Association of Malawi (BASMAL) is the governing body of all basketball activities in Malawi. it has 3 Zone affiliates, namely; SOZOBAL, CEZOBAl and NOZOBAL">
    <title>Basketball Association of Malawi | Basmal</title>
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
	<!-- swiper CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style>
		.blog .carousel-indicators {
			left: 0;
			top: auto;
			bottom: -40px;

		}

		/* The colour of the indicators */
		.blog .carousel-indicators li {
			background: #a3a3a3;
			border-radius: 50%;
			width: 8px;
			height: 8px;
		}

		.blog .carousel-indicators .active {
		background: #707070;
		}
	</style>
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0"></script>

    <!--::header part start::-->
	<?php include_once("header.html"); ?>
    <!-- Header part end-->

<div class="row container-fluid">
	<div class="col-md-8">
		    <!-- banner part start-->
    <section class="banner_part">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php
	if(isset($banners) && count($banners)>0){
		$count = 1; 
		foreach($banners as $banner){ ?>
			 <div class="carousel-item <?php if($count ==1){ echo "active"; }?>">
			  <img src="<?php echo $banner['image_path']; ?>" class="d-block w-100" alt="...">
			</div>
		<?php
		$count++;
		}
	}
  ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </section>
    <!-- banner part start-->
	</div>
	<div class="col-md-4">
		<?php
			if(isset($news) && count($news)>0){
		foreach($news as $new){ ?>
		<a style="" href="news-details.php?id=<?php echo $new['id']; ?>"><h3><?php echo $new['title']?></h3></a>
		<h5><?php echo substr($new['content'],0, 150);?>....</h5>
				<?php
			
		}
	}
?>	

		<br>
		<h5><i><strong>More News<strong></i></i></h5>

	<?php
		if(isset($homenews) && count($homenews)>0){
		foreach($homenews as $home){ ?>
		<div class="row">
			<div class="col-md-4">
				<img style="max-width: 100px; max-height: 50px;" src="<?php echo substr($home['news_image'],3);?>">
			</div>
			<div class="col-md-8">
				<a href="news-details.php?id=<?php echo $home['id']; ?>"><h5><?php echo $home['title']?></h5></a>
			</div>
		</div>
			<?php
			
		}
	}
?>	

	</div>
</div>


<br><br>
<h1 align="center">CONNECT WITH US</h1>
<br>
<div class="row container-fluid">
	<div class="col-md-4">
		<iframe width="400" height="400" src="https://www.youtube.com/embed/QHi7mKbIIt4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>

	<div class="col-md-4">
<div class="fb-post" data-href="https://www.facebook.com/photo/?fbid=1651521418344348&amp;set=pcb.1651523725010784&amp;__cft__[0]=AZVw9SpieKcCPhyGGP7FYQ81vRSju7gKWBRjqivhXOicc_gZQByJ2fZlxCovGLKfBI2Mx-x_Z_jABlT-n5SmR0LWNZz98y8XA3aveAnyW0rT2zFQPJNT8O22DDgfVXSVrBz_LEiY5YqjKB9XhkJUjEGorCq01UpzSQkGFIK_BV9mlA&amp;__tn__=*bH-R" data-show-text="true" data-width=""><blockquote cite="https://developers.facebook.com/BASKETBALLMALAWI/photos/a.440393119457190/1651521418344348/?type=3" class="fb-xfbml-parse-ignore">Posted by <a href="https://www.facebook.com/BASKETBALLMALAWI/">Basketball Association of Malawi-BASMAL</a> on&nbsp;<a href="https://developers.facebook.com/BASKETBALLMALAWI/photos/a.440393119457190/1651521418344348/?type=3">Thursday, 30 April 2020</a></blockquote></div>
	</div>

	<div class="col-md-4">
		<blockquote class="twitter-tweet"><p lang="en" dir="ltr">The Council’s sports development manager Ruth Mzengo said they can&#39;t entrust associations with funding in the absence of financial reports. Football Association of Malawi, Netball Association of Malawi &amp; Basketball Association of Malawi are among the non-compliant bodies</p>&mdash; NationOnline (@NationOnlineMw) <a href="https://twitter.com/NationOnlineMw/status/1178681866704097280?ref_src=twsrc%5Etfw">September 30, 2019</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>
</div>
<br>
<h1 align="center">VIDEOS</h1>   
<div class="row container-fluid">
	<div class="col-md-3">
		<iframe width="300" height="300" src="https://www.youtube.com/embed/5thLACHhvy0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>

	<div class="col-md-3">
		<iframe width="300" height="300" src="https://www.youtube.com/embed/wpqJlxd3o1I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>

	<div class="col-md-3">
		<iframe width="300" height="300" src="https://www.youtube.com/embed/R5ixMxQfxJ0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>

	<div class="col-md-3">
		<iframe width="300" height="300" src="https://www.youtube.com/embed/dulPWP7vDj8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
</div>


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
	
	<script>
// optional
		$('#blogCarousel').carousel({
				interval: 5000
		});
	</script>
	
	<script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var brand_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{brand_id:brand_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script> 
</body>

</html>