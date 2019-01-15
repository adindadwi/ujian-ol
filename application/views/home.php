<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<?php $this->load->view('template/header'); ?>
</head>
<body>
	<!-- header -->
	
	<!-- //header -->
	<!-- banner -->
	<section class="banner">
		<div class="container">
			<div class="slider-info bg1">
				<div class="banner-text container">
					<h4 class="movetxt text-center mb-3 agile-title text-capitalize">Ujian Online SMP</h4>	
				</div>
			</div>
		</div>
	</section>
	<!-- //banner -->
	<!-- banner bottom -->
		<section class="services">
			<div class="container py-md-4 mt-md-3"> 
				<div class="banner-bottom-main bg-white">
					<h2 class="heading-agileinfo">Mata <span> Pelajaran</span></h2>
					<span class="w3-line black"></span>	
					<div class="row inner_w3l_agile_grids-1 mt-md-5 pt-4">
				<div class="col-lg-4 w3layouts_news_left_grid1 text-center">
					<div class="new_top">
						<!-- <i class="fa fa-graduation-cap"></i>		 -->
						<h3 class="mb-3 mt-3">Matematika</h3>
						<p> adik-adik dapat melakukan ujian ini setelah melakukan login </p>
					</div>
				</div>
				<div class="col-lg-4 w3layouts_news_left_grid2 text-center">
					<div class="new_top">
						<!-- <i class="fas fa-book"></i> -->
						<h3 class="mb-3 mt-3">Ilmu Pengetahuan Alam</h3>
						<p> adik-adik dapat melakukan ujian ini setelah melakukan login </p>
					</div>
				</div>
				<div class="col-lg-4 w3layouts_news_left_grid3 text-center">
					<div class="new_top">
						<!-- <i class="fas fa-globe"></i> -->
						<h3 class="mb-3 mt-3">Bahasa Inggris</h3>
						<p> adik-adik dapat melakukan ujian ini setelah melakukan login </p>
					</div>
				</div>
			</div>	
				</div>
			</div>
		</section>
		<!-- //banner bottom -->
	<!-- stats -->

<!-- more -->
	<section class="about-w3ls py-5">
		<div class="container pt-xl-5 pb-lg-3">
		<h2 class="heading-agileinfo">Tentang <span>Website Ujian Online</span></h2>
			<div class="row mt-md-5 pt-4">
				<div class="col-lg-6 section-4">
					<div class="agil_mor">
						Website ini digunakan hanya untuk melakukan ujian online SMP
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- //more -->
<!--footer-->
	<footer>
		<?php $this->load->view('template/footer'); ?>
	</footer>
	<!-- //footer-->
	<div class="copyright py-3">
		<div class="container">
			
			<div class="copyrightbottom" >
				<p>© 2018 Website Ujian Online SMP. All Rights Reserved | Design by
					<a href="http://w3layouts.com/">W3layouts</a>
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- Modal -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Opsimathy</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		 <div class="agileits-w3layouts-info">
			<img src="images/g6.jpg" class="img-fluid" alt="" />
			<p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. </p>
		</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
<!-- //Modal -->
<!-- js-->
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-2.2.3.min.js"></script>
<!-- js-->
<!-- clients -->
	<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 2,
							animationSpeed: 1000,
							autoPlay:false,
							autoPlaySpeed: 2500,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:1
								},
								tablet: { 
									changePoint:768,
									visibleItems: 1
								}
							}
						});
						
					});
			</script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.flexisel.js"></script>
	<!-- //clients -->
<!-- stats -->
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
	
	<!-- Bootstrap Core JavaScript -->
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js" type="text/javascript">
	</script>

	<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript">
	</script>
	<!-- //Bootstrap Core JavaScript -->
</body>
</html>
