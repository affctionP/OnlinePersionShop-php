<?php
include('includes/master.php');
include('includes/nav.php');
?>
		
			
			<section class="header_text sub" >
			<img class="pageBanner" src="themes/images/banner.png" alt="New products" >
				<h4><span>سبد خرید</span></h4>
			</section>
			<section class="main-content" dir="rtl">				
				<div class="row">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>لیست</strong> خرید شما</span></h4>
                     <form  action="cart.php" method="post" enctype="multipart/form-data">
						<table class="table table-striped">
							<thead>
								<tr>
                                    <th>تصویر محصول</th>
                                    <th>نام محصول</th>
                                    <th>قیمت واحد</th>
									
									<th>تعداد</th>
									<th>قیمت کل</th>
                                    <th>حذف</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                            cartProducts();
							
                            ?>
							

		  
							</tbody>
						</table>
                        
						
						<hr>

			
						<p class="buttons center">				
							<input type="submit" name="update_cart" value="بروزسانی" class="btn btn-primary">
							<input type="submit" name="continue" value="ادامه خرید" class="btn btn-warning">
							<input type="submit" id="checkout" name="cheekout" value="تسویه" class="btn btn-success">
						</p>					
					</div>
                    </form>
                <?php include ('includes/right_bar.php') ?>
				</div>
			</section>			
			<?php  include ('includes/footer.php')?>
				
		</div>
		<script src="themes/js/common.js"></script>
