<?php
if(count($errors)>0):?>
 <div class='error'>
 <?php foreach($errors as $e):?>
  <div><?php echo "$e"?></div>
 <?php endforeach ?>
</div>
<?php endif?>

