<?php 

function pr($data,$status)
{

	echo "<pre>";

	print_r($data);

	echo "</pre>";

	if($status  == 1)
	{
		die();
	}

}




