<?php
	class AllegroApi {
		
		protected $client;
		protected $session;
		
		function __construct() {
			$this->client = new SoapClient(WDSL);
		}
		//logowanko
		function LoginEnc($login, $passEnc){
			$sys_params = array('sysvar' => SYSVAR, 'countryId' => COUNTRY, 'webapiKey' => KEY);
			$sys = (array)($this->client->doQuerySysStatus($sys_params));
			
			//padametry niezbędne do logowania, pierwsze cztery ze stałych zdefiniowanych w includes/settings.php
			$session_params = array(
				'userLogin' => $login, 
				'userHashPassword' => $passEnc, 
				'countryCode' => COUNTRY, 
				'webapiKey' => KEY, 
				'localVersion' => $sys['verKey']);
			
			// przypisanie rezultatu funkcji doLoginEnc() do zmiennej globalnej $session
			$this->session = $this->client->doLoginEnc($session_params);
			return true;
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
		//pobranie informacji o aukcji
		function GetItemsInfo($idAukcji){
			$request = array(
					   'sessionHandle' => $this->session->sessionHandlePart,
					   'itemsIdArray' => array($idAukcji),
					   'getDesc' => 0, 
					   'getImageUrl' => 0, 
					   'getAttribs' => 0, 
					   'getPostageOptions' => 0, 
					   'getCompanyInfo' => 0, 
					   'getProductInfo' => 0 //parametr zdeaktualizowany
					);
			return $this->client->doGetItemsInfo($request);
		}
		//składanie oferty
		function BidItem($idAukcji, $kwota, $ilosc){
			$request = array(
						'sessionHandle' => $this->session->sessionHandlePart,
						'bidItId' => $idAukcji,
						'bidUserPrice' => $kwota,
						'bidQuantity' => $ilosc,
						'bidBuyNow' => 0,
					);
			return $this->client->doBidItem($request);
		}
		
	}
	$allegro = new AllegroApi();
?>