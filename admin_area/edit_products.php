<?php 
	//start (condition enter admin)
	if(isset($_SESSION['admin_email'])){
?>
<form action="" method="post"  enctype="multipart/form-data">
<?php 
if(isset($_GET['edit_pro'])){
    $pro_id=$_GET['edit_pro'];
    $get_pro="SELECT * FROM products WHERE product_id='$pro_id'";
    $run_pro=mysqli_query($con,$get_pro);
    $row=mysqli_fetch_array($run_pro);
    $product_title=$row['product_title'];
    $product_price=$row['product_price'];
    $product_img=$row['product_image'];
    $product_status=$row['p_status'];
    global $product_img;
    //global $product_image;
    $product_desc=$row['product_desc'];
    $product_key=$row['product_keywords'];
    //get category
    $pro_cat_id=$row['product_cat'];
    $get_cat="SELECT * FROM categories WHERE cat_id='$pro_cat_id'";
    $run_cat=mysqli_query($con,$get_cat);
    $row_cat=mysqli_fetch_array($run_cat);
    $product_cat=$row_cat['cat_title'];
    //get brand
    $pro_brand_id=$row['product_brand'];
    $get_brand="SELECT * FROM brands WHERE brand_id='$pro_brand_id'";
    $run_brand=mysqli_query($con,$get_brand);
    $row_brand=mysqli_fetch_array($run_brand);
    $product_brand=$row_brand['brand_title'];

}

?>
    <table>
        <caption>فرم ویرایش محصولات</caption>
        <tr>
            <th><b> ویژگی محصول</b></th>
            <th><b>مقادیر هر ویژگی را وارد کنید</b></th>
        </tr>
        <tr>
            <td><b>نام محصول</b></td>
            <td><input type="text" name="product_title" value="<?php echo $product_title;?>"></td>

        </tr>
        <tr>
            <td><b>دسته بندی محصول</b></td>
            <td>
                <select name="product_category"  >
                <option value='<?php echo $pro_cat_id; ?>'><?php echo $product_cat; ?></option>
                    <?php
                      
                        
                        $get_cat="select * from categories";
                        //for farsi
                        $run_cat=@mysqli_query($con,"SET NAME utf8");
                        $run_cat=@mysqli_query($con,"SET CHARACTER SET utf8");
                    
                        $run_cat=@mysqli_query($con,$get_cat);
                        while($row_cat=@mysqli_fetch_array($run_cat)){
                            $cat_id=$row_cat['cat_id'];
                            $cat_title=$row_cat['cat_title'];
                            echo "<option value='$cat_id'>$cat_title </option>";
                    
                        }
                    
                      
                    ?>
                
                </select>
            </td>
        </tr>
        <tr>
            <td><b>مارک محصول</b></td>
            <td>
                <select name="product_brand" >
                <option value='<?php echo $pro_brand_id; ?>'><?php echo $product_brand?></option>
                    <?php
                     
                     $get_brand="select * from brands";
                     $run_brand=@mysqli_query($con,"SET NAME utf8");
                     $run_brand=@mysqli_query($con,"SET CHARACTER SET utf8");
                     $run_brand=@mysqli_query($con,$get_brand);
                     while($row_brand=@mysqli_fetch_array($run_brand)){
                     $brand_id=$row_brand['brand_id'];
                     $brand_title=$row_brand['brand_title'];
                     echo "<option value='$brand_id'>$brand_title</option>";

                  }?>

                </select>
            </td>
        </tr>
        <tr>
            <td><b>قیمت محصول</b></td>
            <td><input type="text" name="product_price"  value="<?php echo $product_price;?>" ></td>
        </tr>
        <tr>
            <td><b>توصیف محصول</b></td>
            <td><textarea name="product_desc"  cols="30" rows="10"  ><?php echo $product_desc;?></textarea></td>
        </tr>
        <tr>
            <td><b>کلمات کلیدی</b></td>
            <td><input type="text" name="product_keys" required value="<?php echo $product_key;?>"/></td>
        </tr>
        <tr>
            <td><b>تصویر محصول</b></td>
            <td><img src="<?php echo $product_img; ?>" height="45" width="60"/><br/><br/>
            <input type="file" name="product_image" ></td>
        </tr>
        <tr>
            <td><b>وضعیت محصول</b></td>
            <td>
                <select name="status" >
                    <option value="<?php echo $product_status;?>"><?php echo $product_status;?></option>
                    <option value="موجودی دارد"> موجودی دارد</option>
                    <option value="در انبار موجود نیست">در انبار موجود نیست</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="بروز رسانی" class="btn btn-primary"></td>
            <td><input type="reset"  name="reset" value="ریست کردن" class=" btn btn-info"></td>
        </tr>

    </table>
    
</form>
<?php
if(isset($_POST['submit'])){
    $id_pro=$_GET['edit_pro'];
    $product_title		=$_POST['product_title'];
    $product_cat		=$_POST['product_category'];
    $product_brand		=$_POST['product_brand'];
    $product_price		=$_POST['product_price'];
    $product_desc		=$_POST['product_desc'];
    $product_keywordS 	=$_POST['product_keys'];
    $product_status     =$_POST['status'];
    if(is_uploaded_file($_FILES['product_image']['tmp_name'])){
        $pro_image_name=$_FILES['product_image']['name'];
        $tmp_image=$_FILES['product_image']['tmp_name'];
        $address_image="products_images/".$pro_image_name;
        move_uploaded_file($tmp_image,$address_image);


    }else{
        $address_image=$product_img;

    }
    $update_pro="UPDATE products SET product_title='$product_title',product_cat=$product_cat
    ,product_brand=$product_brand,product_price=$product_price,
    product_desc='$product_desc',product_keywords='$product_keywordS',
    product_image='$address_image',p_status='$product_status'
    WHERE product_id='$id_pro'";
    $run_up=mysqli_query($con,$update_pro);
    		//display message to user		
		if($run_up)
		{
			echo"<script>alert('اطلاعات جدید جایگزین اطلاعات قبلی شد.')</script>";
			echo"<script>window.open('index.php?view_pro','_self')</script>";
		}
}
?>
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