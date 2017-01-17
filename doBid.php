<?php
	require_once('includes/settings.php');
	require_once('includes/class-allegro.php');
	require_once('includes/class-db.php');
	require_once('includes/class-snajp.php');
	
	try {
		if($_GET){
			$shotId = $_GET['id'];
			
			$snajp->doBid($shotId);
		}
	} 
    catch(SoapFault $error) {
          echo 'error <br/>', $error->faultstring;
    }
?>