<?php
	
	//załadowanie neizbędnych plików, pierwszy - zdefiniowane stałe (login, hasło, klucz api itp.), drugi - klasa AllegroApi
	require_once('includes/settings.php');
	require_once('includes/class-allegro.php');

	//wszystko wrzucone w traya żeby skrypt się nie rozkraczył jak coś z api albo z instrukcjami będzie nie tak
    try {
		//tworzenie obiektu allegro (klasa, funkcje są w pliku includes/class-allegro.php)
		$allegro = new AllegroApi();
		
		//logowanie do allegro 
		$allegro->LoginEnc();
		
		//wyświetlenie stanu konta na allegro 
		var_dump($allegro->MyBilling()); //var_dump wyświetla zwracane dane z funkcji w każdej strukturze - tutaj obiekt
	
		//wyświetlenie nazwy zalogowanego użytkownika
		var_dump($allegro->GetUserLogin());
		
		echo 'oferty:';
		print_r($allegro->GetItemsInfo());
		echo '<br><br><br>oferty:';
		var_dump($allegro->GetItemsInfo()->arrayItemListInfo->item->itemInfo->itPrice);
    }
    catch(SoapFault $error) {
          echo 'error <br/>', $error->faultstring;
    }
     
    ?>