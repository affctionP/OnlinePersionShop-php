<table>
<tr>
<th><b>ردیف</b></th>
<th><b>نام محصول</b></th>
<th><b>تصویر</b></th>
<th><b>قیمت</b></th>
<th><b> ویرایش</b></th>
<th><b>حذف</b></th>
</tr>
<?php
  $get_pro="SELECT * FROM products";
  $run_pro=mysqli_query($con,$get_pro);
  $i=0;
  while($row_pro=mysqli_fetch_array($run_pro)){
      $product_id=$row_pro['product_id'];
      $product_title=$row_pro['product_title'];
      $product_price=$row_pro['product_price'];
      $product_image=$row_pro['product_image'];
      $i++;

  
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo "$product_title"; ?></td>
<td align="center"><img width="50" height="45" src="<?php echo $product_image ?>"/></td>
<td align="center"><?php echo "$product_price"; ?></td>
<td align="center"><a href="index.php?edit_pro=<?php echo $product_id; ?>">ویرایش</a></td>
<td align="center"><a style="color:red;" href="index.php?delete_pro=<?php echo $product_id?>">حذف</a></td>
</tr>
<?php }?>
</table>