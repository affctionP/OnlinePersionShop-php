
<?php
include('includes/master.php');
include('includes/nav.php');
include('admin_area/db.php');
?>
	<script src="themes/js/common.js"></script>	
	<?php
                //get_product_detail
   
                    if(isset($_GET['product_id'])){
                      $product_id=$_GET['product_id'];
                      global $con;
                      $get_pro="select * from products where product_id='$product_id'";
                      $run_pro=@mysqli_query($con,"SET NAMES utf8");
                      $run_pro=@mysqli_query($con,"SET CHARACTER SET utf8");
                      $run_pro=@mysqli_query($con,$get_pro);
                      $row=mysqli_fetch_array($run_pro);
                          $product_id=$row['product_id'];
						  
                          $product_title=$row['product_title'];
                          
						  global $product_cat;
						  $product_cat=$row['product_cat'];
                          $product_price=$row['product_price'];
                          $product_image=$row['product_image'];
                          $product_brand=$row['product_brand'];
                          $product_desc=$row['product_desc'];
                          $product_keywords=$row['product_keywords'];
						  $product_status=$row['p_status'];
                
                
    ?>


		<section class="header_text sub">
			<img class="pageBanner" src="themes/images/banner.png" alt="New products" >
				<h4><span><?php echo $product_title;?></span></h4>
		</section>
			<section class="main-content">				
                <div class="row">
                <div class="span9">
               		
	            		<div class='row' dir='rtl'><!--product-row-->
                        
							<div class='span4'>
								<a href='' class='thumbnail' data-fancybox-group='group1' title='Description 1'><img  src='admin_area/<?php echo $product_image;?>'></a>												

							</div>
							<div class='span5'>
								<address>
									<strong>تولید کننده:</strong> <span>شرکت <strong><?php echo invert_brand($product_brand); ?></strong></span><br>
									<strong>کد محصول:</strong> <span><?php echo $product_id;?></span><br>
									
									<strong>وضعیت:</strong> <span><?php echo $product_status; ?></span><br>								
								</address>									
								<h4><strong>قیمت:<?php echo$product_price;?>تومان</strong></h4>
							</div>
							<div class='span5' >

									<p>&nbsp;</p>
									<div class='sel-btn'><b><a class ='sel-link'href='index.php?add_cart=<?php echo $product_id;?>'>خرید </a></b></div>
								
							</div>							
						</div>
						<div class='row'dir='rtl'>
						
							<div class='span9'>
								<ul >
									<li ><b>توضیحات</b></li>
								</ul>							 
								<div class='tab-content'>
									<div class='tab-pane active' id='home'><?php echo $product_desc; ?></div>
								</div>							
							</div><?php }?>
						</div>
						<div class="row"> 
				
						    <div class="span9" dir='rtl'>
						  <h4 class="title">
								<span class="text">دیدگاه کاربران</span>
						  </h4>
                              <?php include ('comment_form.php'); ?>
								
							    
								<br>
								
							
						  
						</div>
							<div class="span9" dir="rtl">
								<h4 class="title">
	                             <span class="text">شاید<strong> بپسندید</strong></span>

								</h4>
								<div id="myCarousel-1" class="carousel slide">
								<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails listing-products">
									<?php
									
									$category=$product_cat;
									$product_id=$_GET['product_id'];
									$search_same="SELECT * FROM products WHERE product_cat=$category AND product_id<>$product_id  LIMIT 3";
									$run_same=mysqli_query($con,$search_same);
									
									
									while($row_same=mysqli_fetch_array($run_same)){
										$product_same_id=$row_same['product_id'];
										$product_same_title=$row_same['product_title'];
										$product_same_cat=$row_same['product_cat'];
										$product_same_price=$row_same['product_price'];
										$product_same_image=$row_same['product_image'];

		
										
									
									
									?>
									<li class='span3'>
									    <div class='product-box'>												
											<a href='product_detail.php?product_id=<?php echo $product_same_id; ?>'><img  src='admin_area/<?php echo $product_same_image;?>'></a><br/>
											<a href='' class='title'><?php echo $product_same_title;?></a><br/>
										
											<p class='price'><?php echo $product_same_price;?>تومان</p>
										</div>
									</li>
									


							      <?php } ?>
	
																							
											</ul>
										</div>
									</div>
								</div>
								
					</div>
					
                <!--rigt_bar-->
				
				</div>
				<?php include('includes/right_bar.php'); ?>
			</section>
			</body>
</html>