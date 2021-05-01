<?php 
session_start();
	//start (condition enter admin)
	if(isset($_SESSION['admin_email'])){
?>
<?php include('includes/header.php');?>
<div class="row">						
	<div class="span9">	
        <?php
        			
			if(isset($_GET['MessageToAdmin']))
			{
				$message=$_GET['MessageToAdmin'];
				echo"<h1 style='width:500px;margin:150px auto;'>$message</h1>";
			}
        //insert pro
        if(isset($_GET['insert_pro'])){
            include('insert_product.php');
        }
        //view pro
        if(isset($_GET['view_pro'])){
            include('view_products.php');

        }
        //edit pro
        if(isset($_GET['edit_pro'])){
            include('edit_products.php');
        }
        if(isset($_GET['insert_cat']))
        {
            include('insert_cat.php');
        }
        if(isset($_GET['view_cats']))
        {
            include('view_cats.php');
        }
        if(isset($_GET['edit_cat']))
        {
            include('edit_cats.php');
        }
        if(isset($_GET['delete_cat']))
        {
            include('delete_cat.php');
        }
        if(isset($_GET['delete_pro'])){
            include('delete_pro.php');
        }
        //brand
        if(isset($_GET['view_brands']))
        {
            include('view_brands.php');
        }
        if(isset($_GET['insert_brand']))
        {
            include('insert_brand.php');
        }
        if(isset($_GET['edit_brand']))
        {
            include('edit_brand.php');
        }
        if(isset($_GET['delete_brand']))
        {
            include('delete_brand.php');
        }
        //customer
        if(isset($_GET['view_customers'])){
            include('view_customers.php');
        }
        if(isset($_GET['delete_customer']))
        {
            include('delete_customers.php');
        }
        //order
        if(isset($_GET['view_orders']))
        {
            include('view_orders.php');
        }
        if(isset($_GET['logout_admin']))
        {
            include('logout_admin.php');
        }
        if(isset($_GET['order_customer']))
        {
            include('order_customer.php');
        }
        //posts
        if(isset($_GET['insert_post']))
        {
            include('insert_post.php');
        }
        if(isset($_GET['view_posts']))
        {
            include('view_posts.php');
        }
        if(isset($_GET['edit_post']))
        {
            include('edit_posts.php');
        }
        if(isset($_GET['delete_post']))
        {
            include('delete_post.php');
        }
        //payment
        if(isset($_GET['view_payments']))
        {
            include('view_payments.php');
        }
        ?>
    
    </div>

<?php include('includes/right_bar.php');?>
</div>
<?php include('includes/footer.php')?>
<?php 
		//end( condition enter admin )
		
		}else{
		echo "
		<html lang='fa'  dir='rtl'>
		<head>
		<meta http-equiv='Content-Type' content='text/html'; charset='utf-8' />
		</head>";
		
		echo "<script>window.open('login.php?not_admin=شما از مدیران سایت نیستید','_self')</script>";
	}
?>