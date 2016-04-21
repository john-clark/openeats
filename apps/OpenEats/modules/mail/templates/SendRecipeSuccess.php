<p><?php echo image_tag('oelogo.png', array('absolute' => 'true')) ?></p>

<p><?php echo $message ?> </p>
<br />
<p><b><?php echo $recipetitle ?></b></p>
<p><?php echo $recipedesc ?></p>
<p>You can find the recipe at <?php echo link_to('OpenEats', '@get_recipe?recipestripnm='.$recipestripnm, "absolute=true") ?></p>
