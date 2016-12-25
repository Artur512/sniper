<?php
	require_once('includes/settings.php');
	require_once('includes/class-allegro.php');
	$itemId = $_POST["itemId"];
	echo $itemId;
	try{
	
		var_dump($allegro-> GetItemsInfo($itemId));
		
		}catch(SoapFault $error) {
          echo 'error <br/>', $error->faultstring;
    }
		
	





?>
<html>
ewrwerwer
</html>