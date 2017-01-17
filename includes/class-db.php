<?php
	class DB{
	
		function __construct(){
				$connect = new mysqli('localhost','root','','snajp');
				
				if($connect->connect_errno){
					print_r("Connection failed %s\n", $connect->connect-error);
					exit();
				} else {
					print_r("połączony z bazą");
				}
				
				$this->connection =  $connect;
				
			return true;
		}
		function insertShot($idAuction, $maxPrice, $quantity, $runTime, $login, $passEnc){
			$connect = $this->connection;
			
			$table = 'shots';
			$query = "
					INSERT INTO $table (id_auction, max_price, quantity, run_time, login, password)
					VALUES ('$idAuction', '$maxPrice', '$quantity', '$runTime', '$login', '$passEnc')
			;";
			
			$result = $connect->query($query);
			
			return $connect->insert_id;
		}
		function selectShot($snajpId){
			$connect = $this->connection;
			
			$table = 'shots';
			
			$query = "
					SELECT * 
					FROM $table
					WHERE id = '$snajpId'
			;";
			
			$result = $connect->query($query);

			return $result->fetch_assoc();
		}
		function removeShot(){
		
			return true;
		}
		
	}
	
	$db = new DB;
?>