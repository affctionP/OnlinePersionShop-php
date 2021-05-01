<html lang="fa"  dir="rtl">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<?php 	
			
			
			
			
				
				$delete_id_pro = $_GET['delete_pro'];
				
				$delete_pro = "delete from products where product_id='$delete_id_pro' ";
				
				$run_delete_pro = mysqli_query($con,$delete_pro);
				
				if($run_delete_pro)
				{
					
					echo "<script>alert('این محصول با موفقیت از لیست محصولات شما حذف شد!')</script>";
					echo "<script>window.open('index.php?view_pro','_self')</script>";
					
				}
			
		?>
	</body>
</html>