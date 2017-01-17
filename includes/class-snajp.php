<?php
	class SNAJP	{
		
		//zapisanie strzału do bazy i dodanie zadania do crona
		function set($idAuction, $maxPrice, $quantity, $secBefore, $login, $passEnc){
			global $allegro;
			global $db;
			
			//DB
				//logowanie do allegro 
				$allegro->LoginEnc($login, $passEnc);
				
				//pobranie informacji z aukcji
				$dataShot = $allegro->GetItemsInfo($idAuction)->arrayItemListInfo->item->itemInfo;
				
				$runTime = $dataShot->itEndingTime - $secBefore;
				
				$db->insertShot($dataShot->itId, $maxPrice, $quantity, $runTime, $login, $passEnc);
				//var_dump($dataShot->itId);
			//CRON
				
			
			return true;
		}
		function doBid($snajpId){
			global $allegro;
			global $db;
			
			$shotInfo = $db->selectShot($snajpId);
			
			$allegro->LoginEnc($shotInfo['login'], $shotInfo['password']);
			$allegro->BidItem((float)$shotInfo['id_auction'], $shotInfo['max_price'], $shotInfo['quantity']);
			
			
			return true;
		}
		
	}

	$snajp = new SNAJP;
?>