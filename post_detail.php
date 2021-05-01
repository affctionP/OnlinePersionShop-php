<!DOCTYPE html>
<html lang="en">
<?php
include('includes/master.php');
include('includes/nav.php');
include('admin_area/db.php');
?>
	<script src="themes/js/common.js"></script>	
	<?php
                //get_product_detail
   
                    if(isset($_GET['post_id'])){
                      $post_id=$_GET['post_id'];
                      global $con;
                      $get_p="select * from posts where post_id='$post_id'";
                      $run_p=@mysqli_query($con,"SET NAMES utf8");
                      $run_p=@mysqli_query($con,"SET CHARACTER SET utf8");
                      $run_p=@mysqli_query($con,$get_p);
                      $row=mysqli_fetch_array($run_p);
                          $post_id=$row['post_id'];
                          $post_title=$row['post_title'];
                          $post_time=$row['post_time'];
                          $post_body=$row['post_body'];
                          
                          $post_image=$row['post_image'];
                         
                
                ?>


		<section class="header_text sub">
			<img class="postbanner" src="admin_area/<?php echo $post_image; ?>" alt="New products" >
				<h4 class="post-title"><span ><?php echo $post_title;?></span></h4>
		</section>
			<section class="main-content">				
				
                <div class="row">
                <div class="span12" dir="rtl">
               		
					<?php echo $post_body; ?>
	            		
						
						
				</div>
                <!--rigt_bar-->
				</div>
                <?php } ?>
			</section>
</html>