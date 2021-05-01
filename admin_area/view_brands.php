<table>
<tr>
<th><b>ردیف</b></th>
<th><b>نام برند</b></th>
<th><b> ویرایش</b></th>
<th><b>حذف</b></th>
</tr>
<?php
  $get_brand="SELECT * FROM brands";
  $run_brand=mysqli_query($con,$get_brand);
  $i=0;
  while($row_brand=mysqli_fetch_array($run_brand)){
      $brand_id=$row_brand['brand_id'];
      $brand_title=$row_brand['brand_title'];

      $i++;

  
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo "$brand_title"; ?></td>

<td align="center"><a href="index.php?edit_brand=<?php echo $brand_id; ?>">ویرایش</a></td>
<td align="center"><a style="color:red;" href="index.php?delete_brand=<?php echo $brand_id?>">حذف</a></td>
</tr>
<?php }?>
</table>