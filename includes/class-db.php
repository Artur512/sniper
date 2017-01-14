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
		function getShot(){
			
			return true;
		}
		function setShot(){
		
			return true;
		}
		function removeShot(){
		
			return true;
		}
		
	}
	
?>