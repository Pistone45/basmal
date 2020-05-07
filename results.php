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
		
		$season ="2019/2020";
		$status =0; //game not started or no scores
		$getScores = new Game();
		$results = $getScores->getScores($season,$status);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gallery | Basketball Association of Malawi</title>
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

    <div class="container">
            <div class="row text-center" style="padding-top:40px;">
                <div class="col-md-12 col-lg-12">
                    <div class="">
                        <h1>MO626 Results & Log Table</h1>
                        
                        
                    </div>
                </div>
                
            </div>
        </div>

    <!--================Blog Area =================-->
    <section class="blog_area section_padding" style="padding-top:40px;">
        <div class="container">
            <div class="row">
			 <div class="col-lg-6 col-sm-12">
			 <?php 
				if(isset($results) && count($results)>0){
					foreach($results as $result){ ?>
						<div class="card">
						  <div class="card-body">
							<div class="row">
								<div class="col-lg-4 col-sm-5 col-xs-5">
								<img src="<?php echo substr($result['home_logo'],3); ?>" class="img-responsive" height="70" width="70" style="min-height:70px; min-width:70px;"/>  
								<br><?php echo $result['home_team']; ?> <b><?php echo $result['home_team_score']; ?></b>
								</div>
								<div class="col-lg-1 col-sm-1 col-xs-2">
									<h4>VS</h4>
								</div>
								
								<div class="col-lg-4 col-sm-5 col-xs-5">
									<img src="<?php echo substr($result['away_logo'],3); ?>" class="img-fluid" height="70" width="70"style="min-height:70px; min-width:70px;"/> 
									<br> <?php echo $result['away_team']; ?> <b><?php echo $result['away_team_score']; ?></b>
								</div>
								<div class="col-lg-3 col-sm-12 col-xs-12">
									<?php echo $result['game_status']?>
									<hr>
									
								</div>
							</div>
							 
						  </div>
						</div>
					<?php
						
					}
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