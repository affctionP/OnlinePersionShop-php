<table>
    <caption>مقالات سایت</caption>
    <th><b>ردیف</b></th>
    <th><b>عنوان مقاله</b></th>
    <th><b>تصویر مقاله</b></th>
    <th><b>ویرایش</b></th>
    <th><b>حذف</b></th>
    <?php 
      $get_posts="SELECT * FROM posts ";
      $run_posts=mysqli_query($con,$get_posts);
      $i=0;
      while($row_p=mysqli_fetch_array($run_posts)){
         $id=$row_p['post_id']; 
         $title=$row_p['post_title'];
         $image=$row_p['post_image'];
         
         $i++;

    ?>
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $title; ?></td>
        <td><img src="<?php echo $image;?>" width="50px" height="50px"></td>
        <td><a href="index.php?edit_post=<?php echo $id;?>">ویرایش</a></td>
        <td ><a style="color:red;" href="index.php?delete_post=<?php echo $id;?>">حذف </a></td>




    </tr>
    <?php } ?>
</table>