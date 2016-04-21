<?php 

if (!$stored)
{
    echo "Recipe Unstored!";
	
} 
else 
{
	include_partial('user/stored_recipes', array('stored' => $stored));
	
}

?>