<?php
	
	//załadowanie neizbędnych plików, pierwszy - zdefiniowane stałe (login, hasło, klucz api itp.), drugi - klasa AllegroApi
	require_once('includes/settings.php');
	require_once('includes/class-allegro.php');

	//wszystko wrzucone w traya żeby skrypt się nie rozkraczył jak coś z api albo z instrukcjami będzie nie tak
    try {
		//tworzenie obiektu allegro (klasa, funkcje są w pliku includes/class-allegro.php)
		$allegro = new AllegroApi();
		
		//logowanie do allegro 
		$allegro->LoginEnc('garage-smi', 'kxCu9kTSQv/kL+/EFv0cXokgBYXhv0Sa1qWnCENA1WU=');
		
		//wyświetlenie stanu konta na allegro 
		var_dump($allegro->MyBilling()); //var_dump wyświetla zwracane dane z funkcji w każdej strukturze - tutaj obiekt
	
		//wyświetlenie nazwy zalogowanego użytkownika
		var_dump($allegro->GetUserLogin());
		
		//pobranie informacji z aukcji (np. itPrice - cena)
		echo 'oferty:';
		var_dump($allegro->GetItemsInfo(6645067049)->arrayItemListInfo->item->itemInfo->itPrice);
		
		//złożenie oferty
		var_dump($allegro->BidItem(6645067049, 15, 1));
    }
    catch(SoapFault $error) {
          echo 'error <br/>', $error->faultstring;
    }
     
    ?>