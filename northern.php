<?php
include_once("functions/functions.php");

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
                        <h1>NORTHERN REGION ZONE</h1>
                             
                    </div>
                </div>
                
            </div>
        </div>
 
    <!-- about part end-->


    <!--================Blog Area =================-->
    <section class="blog_area" style="padding-top:40px;">
        <div class="container-fluid">
            <div class="row">
			 <div class="col-lg-6 col-sm-12">
						<!-- Nav tabs -->
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#home"><h4>Secretariat</h4></a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#menu1"><h4>Fixture</h4></a>
				  </li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane container active" id="home">
				  	<br>
				  	<p>View Secretariats</p>
				  	<div class="row">
				  		<div class="col-md-12 col-xs-12">
					    <div class="card border-secondary">
					      <div class="card-body text-secondary">
							<div class="row container-fluid">
							<div class="col-md-4">
							<img style="max-height: 180px; max-width: 200;" src="images/placeholder.png" alt="" class="img-fluid">
							<hr>
							<h4>Full Name Full Name</h4>
							</div>
							<div class="col-md-8">
							<h4>Position Position Position Position</h4>
							<p>Description Description Description Description Description Description Description Description Description Description Description Description Description Description  .......</p>
							<br>
							<a href="secretariat-details?id="><button class="btn btn-info">View Profile</button></a>
							</div>
							</div>
					      </div>
					      </div>
					      <br>
				  		</div>
				  	</div>

					<div class="row">
				  		<div class="col-md-12 col-xs-12">
					    <div class="card border-secondary">
					      <div class="card-body text-secondary">
							<div class="row container-fluid">
							<div class="col-md-4">
							<img style="max-height: 180px; max-width: 200;" src="images/placeholder.png" alt="" class="img-fluid">
							<hr>
							<h4>Full Name Full Name</h4>
							</div>
							<div class="col-md-8">
							<h4>Position Position Position Position</h4>
							<p>Description Description Description Description Description Description Description Description Description Description Description Description Description Description  .......</p>
							<br>
							<a href="secretariat-details?id="><button class="btn btn-info">View Profile</button></a>
							</div>
							</div>
					      </div>
					      </div>
					      <br>
				  		</div>
				  	</div>
				  	
				  </div>
				  <div class="tab-pane container fade" id="menu1">
				  	<br>
				  	<p>View Fixtures</p>
				  	<div class="row">
				  		<div class="col-md-12 col-xs-12">
				  			<div class="card border-secondary">
							<div class="card-body text-secondary">
				  			<div class="row">
				  				<div class="col-md-3"><img width="40" title="Chanco" height="40" src="images/unima.jpg"></div>
				  				<div class="col-md-3"><img width="30" height="30" src="images/versus2.png"></div>
				  				<div class="col-md-3"><img width="40" title="Bunda" height="40" src="images/unima.jpg"></div>
				  				<div class="col-md-3"><h5>15 May, 2020</h5></div>
				  			</div>
		  				</div>
						</div>
<br>
						<div class="card border-secondary">
							<div class="card-body text-secondary">
				  			<div class="row">
				  				<div class="col-md-3"><img width="40" title="Magu" height="40" src="images/unima.jpg"></div>
				  				<div class="col-md-3"><img width="30" height="30" src="images/versus2.png"></div>
				  				<div class="col-md-3"><img width="40" title="Poly" height="40" src="images/unima.jpg"></div>
				  				<div class="col-md-3"><h5>20 June, 2020</h5></div>
				  			</div>
		  				</div>
						</div>


				  		</div>
				  	</div>
				  	<br>
				  </div>
				</div>	
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