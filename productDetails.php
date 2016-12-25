<?php
	require_once('includes/settings.php');
	require_once('includes/class-allegro.php');
	$itemId = $_POST["itemId"];
	echo $itemId;
	try{
		$allegro = new AllegroApi();
		var_dump($allegro-> GetItemsInfo());
		
		}catch(SoapFault $error) {
          echo 'error <br/>', $error->faultstring;
    }
		
	





?>