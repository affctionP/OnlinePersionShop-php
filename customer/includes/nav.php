	
    <!--nav--->	
    <div id="top-bar" class="container">
	<div>
	<?php
	if(isset($_GET['add_cart'])){
	  if($_GET['add_cart']!== null){
		cart();
		echo "<br><b>  محصول مورد نظر شما به سبد خرید اضافه شد.  <b/><br/> ";
	  }
	}
	  
	?>
	</div>
			<div class="row">
				<div class="span4">
				<form method="get" class="search_form" action="result.php">
					<input type="submit" value="جستجو" name="submit" class="btn-search">
						<input type="text"name="user_query" class="input-search" Placeholder="جستجو محصول" id="keyword">
						
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="../index.php">خانه</a></li>
							<?php
							if(isset($_SESSION['customer_email'])){
								echo "<li><a href='../customer/my_account.php'>حساب من</a></li>";
							}
							?>
							
							<li><a href="../all_products.php">محصولات</a></li>	
						
                            <li><a href="../cart.php">سبد خرید
							<span style="background-color: red; text-color:black; width:8px;">
							<?php totalItems();?>
							</span></a></li>
                            <li><a href="register.html">تماس</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="themes/images/logoo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="../all_products.php">برند ها</a>					
								<ul>
								   <?php getBrand()?>
								</ul>
							</li>
							

						    <?php getCat()?>
								
						</ul>
					</nav>
				</div>
			</section><!---end--nav-->