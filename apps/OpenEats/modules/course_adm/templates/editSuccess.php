<?php use_helper('Form', 'Object', 'Validation')?>

<?php echo form_tag('course_adm/update', array('name'=>'update', 'id'=>'update')) ?>
<?php echo object_input_hidden_tag($course, 'getCourseId')?>
<?php echo object_input_hidden_tag($course, 'getCourseNm')?>
<fieldset id="recipe_info">
	<?php echo form_error('course') ?>
	<label for="course">Course Name</label>
	<?php echo input_tag('course', $course->getCourseNm())?>
<fieldset>
	<?php echo submit_tag('Save')?> <?php echo link_to('Cancel', 'course_adm/list')?>
</form>
