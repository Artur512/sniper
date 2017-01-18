<?php
	require_once('../includes/settings.php');
	require_once('../includes/class-allegro.php');
	require_once('../includes/class-db.php');
	require_once('../includes/class-snajp.php');
	
		
	try{
		$snajp->doBid($_GET['id']);
	} catch(SoapFault $error) {
		  echo 'error <br/>', $error->faultstring;
	} 
	
	
?>