<table>
<tr>
<th><b>ردیف</b></th>
<th><b>نام دسته</b></th>
<th><b> ویرایش</b></th>
<th><b>حذف</b></th>
</tr>
<?php
  $get_cat="SELECT * FROM categories";
  $run_cat=mysqli_query($con,$get_cat);
  $i=0;
  while($row_cat=mysqli_fetch_array($run_cat)){
      $cat_id=$row_cat['cat_id'];
      $cat_title=$row_cat['cat_title'];

      $i++;

  
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo "$cat_title"; ?></td>

<td align="center"><a href="index.php?edit_cat=<?php echo $cat_id; ?>">ویرایش</a></td>
<td align="center"><a style="color:red;" href="index.php?delete_cat=<?php echo $cat_id?>">حذف</a></td>
</tr>
<?php }?>
</table>