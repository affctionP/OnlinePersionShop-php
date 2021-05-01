<?php
include('includes/master.php');
include('includes/nav.php');

?>
	<script src="themes/js/common.js"></script>	

			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/banner.png" alt="New products" >
				
			</section>
	<section class="main-content">
				
				<div class="row">						
					<div class="span12">	
												
						<ul class="thumbnails listing-products">
							
						
						<!--pro-->
                        <?php
                        get_all_product();
						getCatpro();
						   getbrandpro();
                        ?>
						
			

						</ul>								
						<hr>
						<div class="pagination pagination-small pagination-centered">
							<ul>
								<li><a href="#">Prev</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">Next</a></li>
							</ul>
						</div>
					</div>
					

					
				</div>
				<?php include('includes/footer.php') ?>
			</section>
			
	