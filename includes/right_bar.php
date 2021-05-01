<div class="span3 col" >


						<div class="block">								
							<h4 class="title"><strong>مقالات</strong></h4>								
							<ul class="small-product">
								<?php 
								$r=get_post_auto(9);
								while($row=mysqli_fetch_array($r)){
									$id=$row['post_id'];
									$title_post=$row['post_title'];
									$image_post=$row['post_image'];
									echo "
									<li>
									<a href='' title=''>
										<img src='admin_area/$image_post'>
									</a>
									<a href='post_detail.php?post_id=$id'>$title_post</a>
								     </li>";
								
								?>
							
							
 
								<?php  }?>  
							</ul>
						</div>
					</div>