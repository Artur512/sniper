<?php	
	
	class SNAJP	{
		
		//zapisanie strzału do bazy i dodanie zadania do crona
		function set($setData){
		
			global $allegro;
			global $db;
			
			//DB
				//logowanie do allegro 
				$allegro->LoginEnc($setData['login'], $this->passEnc($setData['pass']));
				
				//pobranie informacji z aukcji
				$dataShot = $allegro->GetItemsInfo((double)$setData['auctionId'])->arrayItemListInfo->item->itemInfo;
				
				$runTime = $dataShot->itEndingTime - $setData['secBefore'];
				
				$lastId = $db->insertShot($dataShot->itId, $setData['maxPrice'], $setData['quantity'], $runTime, $setData['login'], $this->passEnc($setData['pass']));
			
			//CRON
				//soon
						
			return $lastId;
		}
		function passEnc($pass){
		
			return base64_encode(hash('sha256', $pass, true));
		}
		function doBid($snajpId){
			global $allegro;
			global $db;
			
			$shotInfo = $db->selectShot($snajpId);
			
			$allegro->LoginEnc($shotInfo['login'], $shotInfo['password']);
			$allegro->BidItem((float)$shotInfo['id_auction'], $shotInfo['max_price'], $shotInfo['quantity']);
			echo '<br>zalicytowało!!!!<br>';
			
			
			return true;
		}
		function timeToShot($snajpId){
			global $db;
			
			$secs = $db->endTimeShot($snajpId)['run_time'];
			$time = time();
			
			return $secs - $time;
		}
		
	}

	$snajp = new SNAJP;
?>