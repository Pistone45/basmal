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
</head>

<body>


    <!--::header part start::-->
	<?php include_once("header.html"); ?>
    <!-- Header part end-->


    <!-- about part start-->
    <section class="">
        <div class="container">
            <div class="row justify-content-between" style="padding-top:30px;">
                <div class="col-md-6 col-lg-6">
				<form role="form">
					<p>Select a zone below to see more</p>
					<div class="input-group-icon ">
								<div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select"">
								<select onChange="window.location.href=this.value">
								    <option value="southern.php">Southern</option>
								    <option value="central.php">Central</option>
								    <option value="northern.php">Northern</option>
								    <option value="eastern.php">Eastern</option>
								</select>
								
							</div>
					</div>
				</form>
				
				 <div class="row" id="show_product">  
                          <?php //echo fill_product($connect);?>  
                     </div>
                    <br>
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