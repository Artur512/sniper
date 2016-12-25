<?php
	class AllegroApi {
		
		protected $client;
		protected $session;
		
		function __construct() {
			$this->client = new SoapClient(WDSL);
		}
		//logowanko
		function LoginEnc(){
			$sys_params = array('sysvar' => SYSVAR, 'countryId' => COUNTRY, 'webapiKey' => KEY);
			$sys = (array)($this->client->doQuerySysStatus($sys_params));
			
			//padametry niezbędne do logowania, pierwsze cztery ze stałych zdefiniowanych w includes/settings.php
			$session_params = array(
				'userLogin' => LOGIN, 
				'userHashPassword' => PASS_ENC, 
				'countryCode' => COUNTRY, 
				'webapiKey' => KEY, 
				'localVersion' => $sys['verKey']);
			
			// przypisanie rezultatu funkcji doLoginEnc() do zmiennej globalnej $session
			$this->session = $this->client->doLoginEnc($session_params);
			echo 'działa logowanie!!!';
		}
		//sprawdzenie stanu konta
		function MyBilling(){
			//przygotowanie danych do funkcji doMyBilling() w formie tablicy (przyjmuje tylko pole o podanej nazwie - sessionHandle)
			$request = array(
							'sessionHandle' => $this->session->sessionHandlePart
						);
			return $this->client->doMyBilling($request);
		}
		//sprawdzenie loginu zalogowanego użytkownika
		function GetUserLogin(){
			//przygotowanie danych do funkcji doGetUserLogin() w formie tablicy
			$request = array(
						'countryId' => COUNTRY,
						'userId' => $this->session->userId,
						'webapiKey' => KEY
					);
			return $this->client->doGetUserLogin($request);
		}
		function DoBidItem(){
			$equest = array(
			'sessionHandle' => '22eb99326c6be29aa16d07d622bcfbcbee94ad54846f2f4e03_1',
			'bidItId' => 1086438628,
			'bidUserPrice' => 15.00,
			'bidQuantity' => 1,
			'bidBuyNow' => 0
		
			);
		return $this->client->doBidItem($request); 
		}
		function getItemInfo(){
		$request = array(
				'sessionHandle' => $this->session->sessionHandlePart,
				'itemsIdArray' => array(6658212638)
			);
		return $this->client->doGetItemsInfo($request);
		}
		function getBidUsersInfo(){
			$request = array(
				'sessionHandle' => $this->session->sessionHandlePart,
				'itemId' =>6658212638
			);
		
		return $this->client->doGetBidItem2($request);
		}
			
	}
?>