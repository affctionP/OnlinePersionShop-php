<html>
<?php

include('includes/master.php');
include('includes/nav.php');
?>
			<section class="header_text sub">
			<img class="pageBanner" src="../themes/images/banner.png" alt="New products" >
				<h4><span>حساب کاربری</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
						

							<div class="span5" dir="rtl">

							</div>							
						</div>
						<div class="row">
					
							<div class="span9" >
								
							<?php
							if(!isset($_GET['my_order'])){
								if(!isset($_GET['edit_account'])){
									if(!isset($_GET['pass_change'])){
										if(!isset($_GET['delete_account'])){
											$name=$_SESSION['name'];
											echo "<h5 align='center'>$name سلام  خوش اومدی <h5>";

										}
									}
								}
							}
							//when press edit
							if(isset($_GET['edit_account'])){
								include('edit_account.php');
							}
							//when press change pass
							if(isset($_GET['pass_change'])){
								include('change_password.php');
							}
							//when delete account
							if(isset($_GET['delete_account'])){
								include('delete_account.php');
							}

							   ?>
							
					
								
								<div id="myCarousel-1" class="carousel slide">
									<div class="carousel-inner">


										<!--right-->
										<div class="item">
											<ul class="thumbnails listing-products">
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/1.jpg"></a><br/>
														<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
														<a href="#" class="category">Phasellus consequat</a>
														<p class="price">$341</p>
													</div>
												</li>       
												<li class="span3">
													<div class="product-box">												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/2.jpg"></a><br/>
														<a href="product_detail.html">Praesent tempor sem</a><br/>
														<a href="#" class="category">Erat gravida</a>
														<p class="price">$28</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/3.jpg"></a><br/>
														<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
														<a href="#" class="category">Suspendisse aliquet</a>
														<p class="price">$341</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <?php
                    include('includes/right_bar.php');
                    ?>

				</div>
			</section>	
</html>
