<?php
include_once("functions/functions.php");

if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		$getPhotosPerAlbums= new Gallery();
		$photos = $getPhotosPerAlbums->getPhotosPerAlbums($id);
	}
		$id =1;
		$gender =1; //men log table
		$getLogTable = new Game();
		$logtable = $getLogTable->getLogTable($id,$gender);
		
		$status =3; //3 means game has ended - will negate in getFixture
		$getFixture = new Game();
		$games = $getFixture->getFixture($status);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fixture | Basketball Association of Malawi</title>
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
 
        <div class="container">
            <div class="row text-center" style="padding-top:40px;">
                <div class="col-md-12 col-lg-12">
                    <div class="">
                        <h1>MO626 Fixture & Log Table</h1>
                        
                        
                    </div>
                </div>
                
            </div>
        </div>
 
    <!-- about part end-->


    <!--================Blog Area =================-->
    <section class="blog_area" style="padding-top:40px;">
        <div class="container">
            <div class="row">
			 <div class="col-lg-6 col-sm-12">
			 <?php 
				if(isset($games) && count($games)>0){
					foreach($games as $game){ ?>
						<div class="card">
						  <div class="card-body">
							<div class="row">
								<div class="col-lg-3 col-sm-5 col-xs-5">
								<img src="<?php echo substr($game['home_logo'],3); ?>" class="img-responsive" height="70" width="70" style="min-height:70px; min-width:70px;"/>  <br><?php echo $game['home_team']; ?>
								</div>
								<div class="col-lg-1 col-sm-1 col-xs-2">
									<h4>VS</h4>
								</div>
								
								<div class="col-lg-3 col-sm-5 col-xs-5">
									<img src="<?php echo substr($game['away_logo'],3); ?>" class="img-fluid" height="70" width="70"style="min-height:70px; min-width:70px;"/>  <br> <?php echo $game['away_team']; ?>
								</div>
								<div class="col-lg-5 col-sm-12 col-xs-12">
									<?php echo $game['venue']?>
									<hr>
									<?php echo $game['date_time']?>
								</div>
							</div>
							 
						  </div>
						</div>
					<?php
						
					}
				}else{
					?>
					<div class="alert alert-secondary">
					<p>No fixture available. Come check later</p>
					</div>
					<?
				}
			 ?>
				
			 </div>
			 
			 <div class="col-lg-6 col-sm-12">
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