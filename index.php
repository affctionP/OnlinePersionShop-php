

	<?php
	
	include('includes/master.php');
	include('includes/nav.php');
	
	
	?>	
	 
	<!--nav--->		 
	<!---end--nav-->
	<!--header-->
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="themes/images/carousel/ban1.jpg" alt="" />
						</li>
						<li>
							<img src="themes/images/carousel/ban2.jpg" alt="" />
							<div class="intro">
								<h1>قارچ حسینی</h1>
								
								<p><span>قارچ درجه یک و ارگانیک</span></p>
							</div>
						</li>
					</ul>
				</div>			
			</section>
			<section class="header_text">
			تولید قارچ / فلفل دلمه /سبزی خوردن /خیار  
				<br/>تازه و ارگانیک
			</section><!--header-->
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title" dir=>
									<span class="pull-right"><span class="text"><span class="line" > <strong>محصولات</strong></span></span></span>
									<span class="pull-left">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">	
											<?php
											for($i=0;$i<4;$i++){
											getProducts();}
											?>											


			
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails">
                                        <?php
											for($i=0;$i<4;$i++){
											getProducts();}
											?>											

																																
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-right"><span class="text"><span class="line"> <strong>مقالات</strong></span></span></span>
									<span class="pull-left">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-2" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">	
												<?php 
												for ($i=0;$i<2;$i++){
													getposts();}
												?>									
												
											
												
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails">
											<?php 
												for ($i=0;$i<2;$i++){
													getposts();}
												?>									
																																								
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
		
					</div>				
				</div>
			</section>
			<script src="themes/js/jquery.flexslider-min.js"></script>
	<script src="themes/js/common.js"></script>	

		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>

			<!--footer-->
			<?php include('includes/footer.php')?>
			<!--end---footer-->

		</div>
		
		
		
