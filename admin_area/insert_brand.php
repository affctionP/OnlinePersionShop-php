<form method="post">
    <table>
        <caption>درج برند </caption>
        <tr>
            <td><label for="name_b">عنوان برند</label></td>
            <td><input type="text" name="name_b" ></td>
        </tr>
        <tr>
            <td><input type="submit" name="add_brand" value="اضافه کن"></td>

        </tr>
    </table>

</form>
<?php 
if(isset($_POST['add_brand'])){
    $title=$_POST["name_b"];
    $in="INSERT INTO brands (brand_title) VALUES ('$title')";
    $run=mysqli_query($con,$in);
    if($run){
        echo "<script>alert('برند به موفقیت اضافه شد')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}
?>