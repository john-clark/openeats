<?php
/*Partial called in the editSuccess.php and ing_removeSuccess.php
This is used to display and allow the removal of a picutre while a recipe
is being edited. $pic is passed by both templates to the partial*/
?>

<?php if (!$pic):?>
   <?php echo input_file_tag('pic')?>
    <div id="pic-H" class="field-hint">Optional- Upload a picutre of the recipe, only jpeg, gif, and png no larger          
       then 512kb
    </div>
   <?php else:?>
     <?php echo image_tag($pic, array('size' => '60x60', ))?>
     <?php echo link_to_remote('Delete', array('url'=>'recipe/RemovePic?id='.$id, 'update' => 'picture'))?>
  <?php endif;?>