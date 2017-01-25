<?php	
	
	class SNAJP	{
		//pobranie informacji o aukcji
		function getInfo($data){
			global $allegro;
			global $db;
			
			//DB
				//logowanie do allegro 
				$allegro->LoginEnc($data['login'], $this->passEnc($data['pass']));
				
				//pobranie informacji z aukcji
				$dataShot = $allegro->GetItemsInfo((double)$data['auctionId'])->arrayItemListInfo->item->itemInfo;
				
				$auctionEnd = $dataShot->itEndingTime;
			return $dataShot;
		}
		//zapisanie strzału do bazy i dodanie zadania do crona
		function set($setData){
		
			global $allegro;
			global $db;
			
			//DB
				$l = $_SESSION['l'];
				$p = $_SESSION['p'];
				//logowanie do allegro 
				$allegro->LoginEnc($l, $this->passEnc($p));
				
				//pobranie informacji z aukcji
				$dataShot = $allegro->GetItemsInfo((double)$setData['auctionId'])->arrayItemListInfo->item->itemInfo;
				
				$runTime = $dataShot->itEndingTime - $setData['secBefore'];
				
				$lastId = $db->insertShot($dataShot->itId, $setData['maxPrice'], $setData['quantity'], $runTime, $l, $this->passEnc($p));
			
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