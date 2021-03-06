<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Photoshoot Booking System|| Home Page
</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
	<!-- banner -->
	<div class="banner jarallax">
		<div class="agileinfo-dot">
			<?php include_once('includes/header.php');?>
			<div class="w3layouts-banner" style="height:400px;">
				<div class="container">
					<!-- <div class="w3-banner-info">
						<div class="w3l-banner-text" style="color:black">
							<h2>photo</h2>
							<h2>shoot</h2>
							<p>We create your special day</p>
						</div> -->
					</div>
				</div>
		</div>
	</div>
			<div class="w3ls-banner-info-bottom">
				<div class="container">
					<div class="banner-address">
						<div class="col-md-4 banner-address-left">
								<p><i class="fa fa-map-marker" aria-hidden="true"></i>Dallu, Kathmandu 
						</div>
						<div class="col-md-4 banner-address-left">
								<p><i class="fa fa-envelope" aria-hidden="true"></i> pranilshakya71@gmail.com</p>
						</div>
						<div class="col-md-4 banner-address-left">
								<p><i class="fa fa-phone" aria-hidden="true"></i> 9818148323</p>
						</div>
					</div>
				</div>
			</div>
			
	
	<div class="clearfix"> </div>
	<div class="banner-bottom">
		<div class="container">
			<div class="wthree-bottom-grids">
				<div class="col-md-6 wthree-bottom-grid">
					<div class="w3-agileits-bottom-left">
						<div class="w3-agileits-bottom-left-text">
							<h3>quality</h3>
							<p>with every single</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 wthree-bottom-grid">
					<div class="w3-agileits-bottom-left w3-agileits-bottom-right">
						<div class="w3-agileits-bottom-left-text">
							<h3>RETOUCH</h3>
							<p>Very Good Looking.</p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
<?php include('includes/footer.php');?>

					 				<?php
									$sql="SELECT * from tblbooking where UserID=".$_SESSION['obbsuid'];
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									$services=[];
									if($query->rowCount() > 0)
									{
									foreach($results as $row)
									{              
										
										?>


								<?php 
									array_push($services,($row->ServiceID)); ?>

									<?php }} ?>
									<?php  
										$c=[];
										$cluster=$services[0];
										$sql1="SELECT * from tblService where id=".$cluster;
										$query1 = $dbh -> prepare($sql1);
										$query1->execute();
										$results1=$query1->fetchAll(PDO::FETCH_OBJ);

										foreach($results1 as $r)
										{
										


									?>

						<?php 
							array_push($c,($r->c_id));?>
							
							</p>
						
						<?php }?>
				
	<!-- //banner -->
	<!-- banner-bottom -->
	<?php
	if(strlen($_SESSION['obbsuid']==0))
		{

		}
		else
		{
	?>
	<div class="recommendation">
		<h1>Recommended for you</h1>
		<div class="wthree-services-bottom-grids">
				<p class="wow fadeInUp animated" data-wow-delay=".5s">List of services which is provided by us.</p>
					<div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Package Name</th>
									<th>Description</th>
									<th>Price</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php
								$sql2="SELECT * from tblService where c_id=".$c[0];
								$query2 = $dbh -> prepare($sql2);
								$query2->execute();
								$results2=$query2->fetchAll(PDO::FETCH_OBJ);
								foreach($results2 as $re)
								{
									?>
									<tr>
										<td><?php echo htmlentities($cnt);?></td>
										<td><?php  echo htmlentities($re->ServiceName);?></td>
										<td><?php  echo htmlentities($re->SerDes);?></td>
										<td>Rs.<?php  echo htmlentities($re->ServicePrice);?></td>
										<?php if($_SESSION['obbsuid']==""){?>
										<td><a href="login.php" class="btn btn-default">Book Services</a></td>
										<?php } else {?>
										<td><a href="book-services.php?bookid=<?php echo $re->ID;?>" class="btn btn-default">Book Services</a></td><?php }?>
									</tr> <?php $cnt=$cnt+1; 
								} ?>
							</tbody>
						</table>
					</div>
					<?php }?>
		</div>
	</div>
					
					
	
	<!-- //banner-bottom -->

	
	<!-- jarallax -->
	<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	<!-- //jarallax -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/modernizr.custom.js"></script>

</body>	
</html>