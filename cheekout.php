<?php
include('includes/master.php');
include('includes/nav.php');

?>
<body>
<section class="header_text sub" >
			<img class="pageBanner" src="themes/images/banner.png" alt="New products" >
				
			</section>	
			<section class="main-content">
				<div class="row">
					<div class="span12">
						<div class="accordion" id="accordion2">
							<div class="accordion-group" dir="rtl">
								<div class="accordion-heading" >
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">ورود</a>
								</div>
								<div id="collapseOne" class="accordion-body in collapse">
									<div class="accordion-inner">
										<div class="row-fluid">

											 <!--login-->
                                             <?php
											 if(isset($_GET['forget_pass'])){
												 include('forget_password.php');
											 }else{
                                               if(!isset($_SESSION['customer_email'])){
                                               include('customer_login.php');
                                               }
                                               else{
                                                include('payment.php');
                                               }
											}
                                             ?>
										</div>
									</div>
								</div>
							</div>

							<div class="accordion-group">
								<div class="accordion-heading" dir="rtl">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">اگر عضو نیستید ثبت نام کنید </a>
								</div>
                                <div id="collapseTwo" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
                                            <?php include('register.php')?>
                                        </div>
                                    </div>
                            </div>


						</div>				
					</div>
				</div>
			</section>
</body>			
