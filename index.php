<?php	
	
	require_once('includes/settings.php');
	require_once('includes/class-allegro.php');
	require_once('includes/class-db.php');
	require_once('includes/class-snajp.php');
	
?>
	
	<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./css/stajle.css" />
        <title>Snajper</title>
    </head>
    <body>

        <header class="content1">
            <h1>Snajper aukcji allegro</h1>
        </header>

            <section class="container">
				<div class="content2">
					<?php 
					
						//wszystko wrzucone w traya żeby skrypt się nie rozkraczył jak coś z api albo z instrukcjami będzie nie tak
						
						try {
							if(!empty($_POST['step1'])){
								//wprowadzony numer aukcji
								$_POST['step2']['auctionId'] = $_POST['step1']['auctionId'];
								include('./snajp/step2.php');
								
								
							} elseif (!empty($_POST['step2'])){
								//wprowadzone dane do strzału
								if($snajp->set($_POST['step2'])){
								
									//zapisanie strzału do bazy
									$lastId = $snajp->set($_POST['step2']);
									
									//uruchomienie strzału								
									include('./snajp/step3.php');
								}
								
							} else {
								include('./snajp/step1.php');
							}
						} catch(SoapFault $error) {
							  echo 'error <br/>', $error->faultstring;
						} 
		 
					?>
				</div>
            </section>

        <footer>
            <p>
                <p> </p>
            </p>
        </footer>
    </body>
</html>
