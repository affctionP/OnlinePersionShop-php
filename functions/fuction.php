<?php
$con=mysqli_connect("localhost","root","","Hosseini");

if(mysqli_connect_errno())
{
    echo "ارتباط با پایگاه داده برقرار نیست . شماره خطا :".mysqli_connect_errno();
}

//get_categories_from_db
function getCat(){
    global $con;
    $get_cat="select * from categories";
    //for farsi

    $run_cat=@mysqli_query($con,$get_cat);
    while($row_cat=@mysqli_fetch_array($run_cat)){
        $cat_id=$row_cat['cat_id'];
        $cat_title=$row_cat['cat_title'];
        echo "<li><a href='all_products.php?cat_id=$cat_id'>$cat_title</a></li>";

    }

}
//get brand 
function getBrand(){
   global $con;
   $get_brand="select * from brands";
   

   $run_brand=@mysqli_query($con,$get_brand);
   while($row_brand=mysqli_fetch_array($run_brand)){
        $brand_id=$row_brand['brand_id'];
        $brand_title=$row_brand['brand_title'];
        echo "<li ><a href='all_products.php?brand_id=$brand_id'>$brand_title</a></li>";
       
   }


}
//get products
function getProducts(){

    global $con;
    if(!isset($_GET['brand_id'])&&!isset($_GET['cat_id'])){
        $get_featured_products="select * from products order by RAND() LIMIT 0,1";
        $run_products=@mysqli_query($con,$get_featured_products);
        $row_products=mysqli_fetch_array($run_products);
            
            $product_title=$row_products['product_title'];
            $product_id=$row_products['product_id'];
            $product_price=$row_products['product_price'];
            $product_cat=$row_products['product_cat'];
            $product_image=$row_products['product_image'];
            echo"<li class='span3'>
            <div class='product-box'>
                <span class='sale_tag'></span>
                <p><a href='product_detail.php?product_id=$product_id'><img src='admin_area/$product_image'/></a></p>
                <a href='product_detail.php?product_id=$product_id' class='title'>$product_title</a><br/>
                
                <p class='price' dir='rtl'>$product_price تومان</p>
            </div>
        </li>";
    }    

    }
function get_all_product(){
    global $con;
    if((!isset($_GET['cat_id']))&&(!isset($_GET['brand_id']))){
    $getallpro="select * from products";
    $run_pro=@mysqli_query($con,"SET NAMES utf8");
	$run_pro=@mysqli_query($con,"SET CHARACTER SET utf8");
    $run_pro=@mysqli_query($con,$getallpro);
    echo "<h4 style='text-align:center;'> <span>محصولات</span></h4>";
    while($row=mysqli_fetch_array($run_pro)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_cat=$row['product_cat'];
        $product_price=$row['product_price'];
        $product_image=$row['product_image'];
        echo 
         "<li class='span3'>
        <div class='product-box'>												
            <a href='product_detail.php?product_id=$product_id'><img  src='admin_area/$product_image'></a><br/>
            <a href='product_detail.php?product_id=$product_id' class='title'>$product_title</a><br/>
            <a href='#' class='category'>$product_cat</a>
            <p class='price'>$product_price</p>
        </div>
    </li>";


    }
}
}
//get prodcut_by category
function getCatpro(){
    global $con;
    if(isset($_GET['cat_id'])){
        $catid_product=$_GET['cat_id'];
        $get_products_cat="select * from products where product_cat ='$catid_product'";
        $get_cat_name="select cat_title from categories where cat_id='$catid_product' ";
        
        $run_pro=mysqli_query($con,$get_products_cat);
        $run_cat=mysqli_query($con,$get_cat_name);
        while($row_cat=mysqli_fetch_array($run_cat)){
            $category_title=$row_cat['cat_title'];
            echo "<h4 style='text-align:center;'> <span>$category_title</span></h4>";

        }
        $num_pro=mysqli_num_rows($run_pro);
        if($num_pro ==0){
            echo "<h3 style='text-align:center'>کالایی در این دسته وجود ندارد</h3>";

        }
        while($row_products=mysqli_fetch_array($run_pro))
        {
            $product_id=$row_products['product_id'];
            $product_title=$row_products['product_title'];
            $product_cat=$row_products['product_cat'];
            $product_price=$row_products['product_price'];
            $product_image=$row_products['product_image'];
            echo 
             "<li class='span3'>
            <div class='product-box'>												
                <a href='product_detail.php?product_id=$product_id'><img  src='admin_area/$product_image'></a><br/>
                <a href='product_detail.php?product_id=$product_id' class='title'>$product_title</a><br/>
                <a href='#' class='category'>$product_cat</a>
                <p class='price'>$product_price</p>
            </div>
        </li>";

        }

    }


}
//get prodcut_by brand
function getbrandpro(){
    global $con;
    if(isset($_GET['brand_id'])){
        $brandid_product=$_GET['brand_id'];
        $get_products_brand="select * from products where product_brand ='$brandid_product'";
        $get_brand_name="select brand_title from brands where brand_id='$brandid_product' ";
        
        $run_pro=mysqli_query($con,$get_products_brand);
        $run_brand=mysqli_query($con,$get_brand_name);
        while($row_brand=mysqli_fetch_array($run_brand)){
            $brand_title=$row_brand['brand_title'];
            echo "<h4 style='text-align:center;'> <span>$brand_title</span></h4>";

        }
        $num_pro=mysqli_num_rows($run_pro);
        if($num_pro ==0){
            echo "<h3 style='text-align:center'>کالایی در این دسته وجود ندارد</h3>";

        }
        while($row_products=mysqli_fetch_array($run_pro))
        {
            $product_id=$row_products['product_id'];
            $product_title=$row_products['product_title'];
            $product_cat=$row_products['product_cat'];
            $product_price=$row_products['product_price'];
            $product_image=$row_products['product_image'];
            echo 
             "<li class='span3'>
            <div class='product-box'>												
                <a href='product_detail.php?product_id=$product_id'><img  src='admin_area/$product_image'></a><br/>
                <a href='product_detail.php?product_id=$product_id' class='title'>$product_title</a><br/>
                <a href='#' class='category'>$product_cat</a>
                <p class='price'>$product_price</p>
            </div>
        </li>";

        }

    }


}

//get_product_detail
function get_product_detail(){
    global $con;
    if(isset($_GET['product_id'])){
      $product_id=$_GET['product_id'];
      $get_pro="select * from products where product_id='$product_id'";
      $run_pro=@mysqli_query($con,"SET NAMES utf8");
      $run_pro=@mysqli_query($con,"SET CHARACTER SET utf8");
      $run_pro=@mysqli_query($con,$get_pro);
      while($row=mysqli_fetch_assoc($run_pro)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_cat=$row['product_cat'];
          $product_price=$row['product_price'];
          $product_image=$row['product_image'];
          $product_brand=$row['product_brand'];
          $product_desc=$row['product_desc'];
          $product_ketwords=$row['product_ketwords'];




    }


}
}
//search function 
function search(){
    global $con;
    if(isset($_GET['submit'])){
        $query=$_GET['user_query'];
        $get_pro="select * from products where product_keywords like N'%$query%'";
        $run_pro=mysqli_query($con,$get_pro);
        if(mysqli_num_rows($run_pro)==0){
            echo"<h1>nothin</h1>";
        }
        while($row_products=mysqli_fetch_array($run_pro)){
            $product_id=$row_products['product_id'];
            $product_title=$row_products['product_title'];
            $product_cat=$row_products['product_cat'];
            $product_price=$row_products['product_price'];
            $product_image=$row_products['product_image'];
            echo 
             "<li class='span3'>
            <div class='product-box'>												
                <a href='product_detail.php?product_id=$product_id'><img  src='admin_area/$product_image'></a><br/>
                <a href='product_detail.php?product_id=$product_id' class='title'>$product_title</a><br/>
                <a href='#' class='category'>$product_cat</a>
                <p class='price'>$product_price</p>
            </div>
        </li>";

        }
    }
}
function getIp(){
    $ip=$_SERVER['REMOTE_ADDR'];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip=$_SERVER['HTTP_CLIENT_IP'];


    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];

    }
    return $ip;
}
function cart(){
    global $con;
    if(isset($_GET['add_cart'])){
        
        $product_id=$_GET['add_cart'];
        if(isset($_COOKIE["ipUserEcommerce"])){
            $ip=$_COOKIE["ipUserEcommerce"];
        }else{
            $ip=getIp();
            setcookie("ipUserEcommerce",$ip,time()+1206900);
        }
        $cheek_pro="SELECT * FROM cart where p_id=$product_id AND ip_add='$ip'";
        $run=mysqli_query($con,$cheek_pro);
        if(mysqli_num_rows($run)==0){
            $insert_p="INSERT INTO  cart (p_id,ip_add,qty)values ($product_id,'$ip',1)";
            $run_insert=mysqli_query($con,$insert_p);
            
        }

    }
}
//get all choses item
function totalItems(){
    global $con;
    if(isset($_GET['add_cart']))
		{	
			//creating or using cookie 
			if(isset($_COOKIE["ipUserEcommerce"]))
			{
				$ip	= $_COOKIE["ipUserEcommerce"];
			}else{
				$ip=getIp();
				setcookie('ipUserEcommerce',$ip,time()+1206900);
			}
			$get_items = "select * from cart where ip_add='$ip'";
			$run_items=@mysqli_query($con,$get_items);
			$count_items=@mysqli_num_rows($run_items);
		
		}else
		{	
			//creating or using cookie 
			if(isset($_COOKIE['ipUserEcommerce']))
			{
				$ip	= $_COOKIE['ipUserEcommerce'];
			}else{
				$ip=getIp();
				setcookie('ipUserEcommerce',$ip,time()+1206900);
			}
		
			$get_items = "select * from cart where ip_add='$ip'";
			$run_items =@mysqli_query($con,$get_items);
			$count_items =@mysqli_num_rows($run_items);
		}
		
		echo $count_items;
	
    }
//get total price
function getTotalprice(){
    global $con;
    $total=0;
    if(isset($_COOKIE['ipUserEcommerce'])){
        $ip=$_COOKIE['ipUserEcommerce'];
    }else{
        $ip=getIp();
        setcookie('ipUserEcommerce',$ip,time()+1206900);
    }
    $get_customer="select * from cart where ip_add='$ip'";
    $run=mysqli_query($con,$get_customer);
    while($row_cu=mysqli_fetch_array($run)){
        $pro_id=$row_cu['p_id'];
        $quantity=$row_cu['quantity'];
        $get_pro="select * from products where product_id='$pro_id'";
        $run_pro=mysqli_query($con,$get_pro);
        while($row_pr=mysqli_fetch_array($run_pro)){
            $pro_price=$row_pr['product_price'];
            $value=array($pro_price*$quantity);
            $total+=array_sum($value);


        }
    }
    echo $total."تومان";

}
//get product in cart
function cartProducts(){
    global $con;
    $total=0;
    $sum=0;
    if(isset($_COOKIE['ipUserEcommerce'])){
        $ip=$_COOKIE['ipUserEcommerce'];
    }
    else{
        $ip=getIp();
        setcookie('ipUserEcommerce',$ip,time()+1206900);
    }
    $str_ip=str_replace(".","","$ip");
    if(isset($_POST['update_cart'])){
        
        
        if(isset($_POST['remove']))
        {
            foreach($_POST['remove']as $remove_id){
                $delete_product = "delete from cart where ip_add='$ip' AND p_id='$remove_id'";
				$run_delet =@mysqli_query($con,$delete_product);
					
					if ($run_delet){
						
						echo "<script>window.open('cart.php','_self')</script>";	}						
            }
        }

    }
  //continue utton  
	if(isset($_POST['continue']))
		
		{
		
			echo "<script>window.open('all_products.php','_self')</script>";
		
		}	
    // cheeckout button
    if(isset($_POST['cheekout']))
		
    {
        if(isset($_COOKIE['ipUserEcommerce'])){
           $ip=$_COOKIE['ipUserEcommerce'];
        }else{
           $ip=getIp();
           setcookie('ipUserEcommerce',$ip,time()+1206900);
        }
        $total_price=$_SESSION['price_total'];
        $get_total="SELECT * FROM total WHERE ip LIKE '%{$ip}%'";
        $run_total=mysqli_query($con,$get_total);
        while($row=mysqli_fetch_array($run_total)){
            $ip_search=$row['ip'];
        }
        if($ip==$ip_search){
            mysqli_query($con,"UPDATE total SET total_price_purchase='$total_price' ");
            
        }else{
            $query="INSERT INTO total (ip,total_price_purchase)
            VALUES('$ip','$total_price')";
            mysqli_query($con,$query);

        }
    
        echo "<script>window.open('cheekout.php','_self')</script>";
    
    }

    $sel_price	="select * from cart where ip_add='$ip'";		
	//$run_price	=	@mysqli_query($con,"SET NAMES SET utf8");		
	//$run_price	=	@mysqli_query($con,"SET CHARACTER SET utf8");	
	$run_price	=	@mysqli_query($con,$sel_price);
	while($p_price 	=	@mysqli_fetch_array($run_price))
				
	{
		$quantity=$p_price['qty'];		
		$pro_id	=	$p_price['p_id'];
		$pro_price	=	"select * from products where product_id='$pro_id'";
		$run_pro_price	=	@mysqli_query($con,$pro_price);		
	    while($pp_price=@mysqli_fetch_array($run_pro_price))
					
			{
				$product_price	=	array($pp_price['product_price']); 
				$product_title	=	$pp_price['product_title'];
                $product_id	=	$pp_price['product_id'];
				$product_image	=	$pp_price['product_image'];
				$single_price	=	$pp_price['product_price'];
			
				
                
                echo "<tr>
                <td><a href='product_detail.php?product_id=$product_id'><img class='cart-image' src='admin_area/$product_image'></a></td>
                   <td>$product_title</td>
                   <td>$single_price</td>
                   
                   ";
        if(isset($_POST['update_cart']))
	
	          {
	
		$str_ip = str_replace(".", "", "$ip");
		$qty = $_POST["$str_ip$product_id"];
		$update_qty = "update cart set qty='$qty' where p_id='$product_id' ";
		$run_qty=@mysqli_query($con,$update_qty);
		$_SESSION["$str_ip"]["$product_id"]=$qty;
	
	}	
		$str_ip = str_replace(".", "", "$ip");
		if(isset($_SESSION["$str_ip"]["$product_id"]))

		{

			echo "<td><input type='text' class='input-mini' size='4' name='$str_ip$product_id' value='". $_SESSION["$str_ip"]["$product_id"]."'></td>";
			
			$quantity = $_SESSION["$str_ip"]["$product_id"];
			$total =($single_price*(int)$quantity);
            $sum+=($single_price*(int)$quantity);
			
			
		
		}else
		{
		
			echo "<td><input  class='qty' type='number' name='$str_ip$product_id' value='$quantity'></td>";
			$total=($single_price*(int)$quantity);
            $sum+=($single_price*(int)$quantity);
		
		}

                   
                   echo"
                   <td> $total</td>
                   <td><input type='checkbox' value='$product_id' name='remove[]'></td>
               </tr>";
            }
            
    }
    echo "					<tr>
    <td style='text-size:20px'>قیمت کل خرید ها </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><strong> $sum</strong></td>
        </tr>";

        $_SESSION['price_total']=$sum;

}
function getposts(){
    
    $get="SELECT * FROM posts ORDER BY RAND() LIMIT 0,1";
    global $con;
    
    $runP=mysqli_query($con,$get);
    $row=mysqli_fetch_array($runP);
    $id=$row['post_id'];
    $title_post=$row['post_title'];
    $image_post=$row['post_image'];
    echo "
    <li class='span6'>
    <div class='post-box'>
        <p><a href='post_detail.php?post_id=$id'><img class='post-pic' src='admin_area/$image_post'  /></a></p>
        <a href='post_detail.php?post_id=$id' class='title'> $title_post</a><br/>   
    </div>
</li>";

}

function get_all_posts(){
    global $con;
    $get="SELECT * FROM posts";
    $runP=mysqli_query($con,$get);
    $row=mysqli_fetch_array($runP);
    $id=$row['post_id'];
    $title_post=$row['post_title'];
    $image_post=$row['post_image'];
    echo "
    <li class='span6'>
    <div class='post-box'>
        <p><a href='post_detail.php?post_id=$id'><img class='post-pic' src='admin_area/$image_post'  /></a></p>
        <a href='post_detail.php?post_id=$id' class='title'> $title_post</a><br/>   
    </div>
</li>";
}
function invert_brand($id){
    global $con;
    $sel="SELECT * FROM brands WHERE brand_id=$id";
    $run=mysqli_query($con,$sel);
    $row=mysqli_fetch_array($run);
    return $row['brand_title'];
}
//auto send post
function get_post_auto($amount){
    if(!isset($amount)){
        $get="SELECT * FROM posts ORDER BY RAND()LIMIT 1";
    }else{
        $amount;

        $get="SELECT * FROM posts ORDER BY RAND() LIMIT $amount";
    }
    global $con;
    
    $runP=mysqli_query($con,$get);
    return $runP;



}



?>