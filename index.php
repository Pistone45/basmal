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
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=1814164448825308&autoLogAppEvents=1"></script>
    <!--::header part start::-->
	<?php include_once("header.html"); ?>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php
	if(isset($banners) && count($banners)>0){
		$count = 1; 
		foreach($banners as $banner){ ?>
			 <div class="carousel-item <?php if($count ==1){ echo "active"; }?>">
			  <img src="<?php echo substr($banner['image_path'],3); ?>" class="d-block w-100" alt="...">
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

    <!-- about part start-->
    <section class="">
        <div class="container">
            <div class="row justify-content-between" style="padding-top:30px;">
                <div class="col-md-6 col-lg-6">
				<form role="form">
					<div class="input-group-icon ">
								<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select"">
											<select name="brand" id="brand">
											
											<option value=" 1">Select Zone</option>
											<option value="1">Southern</option>
											<option value="1">Eastern</option>
											<option value="1">Central</option>
											<option value="1">Northern</option>
											</select>
								
							</div>
					</div>
				</form>
				
				 <div class="row" id="show_product">  
                          <?php //echo fill_product($connect);?>  
                     </div> 
                   <h4>Log Table</h4>
				   
				   <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Position</th>
                  <th>Team</th>
				  <th>Pts</th>
				  <th>P</th>
				  <th>GD</th>
				  <th>W</th>
				  <th>L</th>
				  <th>F</th>
				 
				  
                </tr>
                </thead>
                <tbody>
				<?php
				 if(isset($logtable) && count($logtable)>0){
					 $pos = 1;
					foreach($logtable as $log){ ?>
						<tr>					 
						  <td><?php  echo $pos;?></td>
						   <td><?php echo $log['team_id']; ?></td>
						   <td><?php echo $log['points'];?> </td>
						   <td><?php echo $log['played'];?> </td>
						   <td><?php echo $log['gd'];?> </td>
						   <td><?php if($log['won'] == null){ echo "0";}else{echo $log['won'];}?> </td>
						   <td><?php if($log['lost'] == null){ echo "0";}else{echo $log['lost'];}?> </td>
						   <td><?php if($log['forfeit'] == null){ echo "0";}else{echo $log['forfeit'];}?> </td>
						</tr>
					<?php
						$pos++;
					}
				 }
				?>
					
				
                </tbody>
               
              </table>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_part_text">
                        
                        <img src="images/elections.png" alt="BASMAL Elections" />
						<p>Do you have what it takes to be a member of SOZOBAL/CEZOBAL/NOZOBAL? <a href="docs/Zone Elections.pdf" target="_blank">Click here to download the forms</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->
	<div class="jumbotron"> <h2 class="text-center">MO626 BASKETBALL CHALLENGE SEASON 3 - GO, FIGHT, WIN!</h2></div>
	
	
	
	
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

	
	
	
	
	
    <!-- our_service start-->
    <section class="our_service padding_top" style="background-color:#d28745;">
        <div class="container">
          
            <div class="row">
                <div class="col-lg-8 col-sm-12 col-xl-8">
                     
			  
					<!-- news -->
				 <div class="row">
				 <?php
					if(isset($news) && count($news)>0){
						foreach($news as $new){ ?>
					<div class="col-sm-12 col-lg-4 col-xl-4" style="padding-bottom:20px;">
					
						 <div class="single-home-blog">
                        <div class="card">
                            <img src="<?php echo substr($new['news_image'],3);?>" class="card-img-top" style="max-height:100px;" alt="blog">
                            <div class="card-body">
                                
                                <a href="blog.html">
                                    <h5 class="card-title"><?php echo $new['title']; ?></h5>
                                </a>
                                <a href="news-details.php?id=<?php echo $new['id']; ?>" class="btn_3">read more</a>
                            </div>
                        </div>
                    </div>
				
                   
                </div>
                		<?php
							
						}
					}
				?>
                
				</div>
					<!--- end news -->
                </div>
                <div class="col-lg-4 col-sm-12 col-xl-4">
                    <div class="fb-page" data-href="https://www.facebook.com/BASKETBALLMALAWI" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/BASKETBALLMALAWI" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/BASKETBALLMALAWI">Basketball Association of Malawi-BASMAL</a></blockquote></div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- our_service part end-->

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