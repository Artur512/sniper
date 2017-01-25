<?php	
	session_start();
	
	require_once('includes/settings.php');
	require_once('includes/class-allegro.php');
	require_once('includes/class-db.php');
	require_once('includes/class-snajp.php');
	
?>
	
	<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./css/bootstrap.css" />
        <link rel="stylesheet" href="./css/stajle.css" />
        <title>Snajper</title>
    </head>
    <body class="s-bg">
			<header class="row s-bg2">
				<div class="col-xs-1 col-md-3">
				</div>
				
				<div class="col-xs-10 col-md-6">
					<a href="./">
						<h1><img src="./img/logo.png" alt="" width="80px">&nbsp&nbsp Snajper aukcji allegro</h1>
						<p class="s-logo-below">
							Automat składania ofert w licytacjach
						<p/>
					</a>
				</div>
				
				<div class="col-xs-1 col-md-3">
				</div>
			</header>

			<section class="s-container">
				<div class="row">
					<div class="col-xs-1 col-md-4">
					</div>
					
					<div class="col-xs-10 col-md-4 s-content">
						<?php 
						$login = "";
							//wszystko wrzucone w traya żeby skrypt się nie rozkraczył jak coś z api albo z instrukcjami będzie nie tak
							
							try {
								
								$page['id'] = empty($_GET['id']) ? 'index' : $_GET['id'];
								
								if(isset($page['id'])){
									switch ($page['id']){
										case 'dzialanie':
												include('./snajp/dzialanie.php');
										break;
										case 'info':
												include('./snajp/info.php');
										break;
										case 'index':
										default:
				
										//kroki ustawień strzału
											if(!empty($_POST['step0'])){
												include('./snajp/step1.php');
												
											} elseif(!empty($_POST['step1'])){
												//wprowadzony numer aukcji. login, hasło
												if($auctionInfo = $snajp->getInfo($_POST['step1'])){	
													$_POST['step2']['auctionId'] = $_POST['step1']['auctionId'];
													$_SESSION['l'] = $_POST['step1']['login'];
													$_SESSION['p'] = $_POST['step1']['pass'];
													include('./snajp/step2.php');
												} 
												
												
											} elseif (!empty($_POST['step2'])){
												//wprowadzone dane do strzału
												if($snajp->set($_POST['step2'])){
												
													//zapisanie strzału do bazy
													$lastId = $snajp->set($_POST['step2']);
													
													//uruchomienie strzału								
													include('./snajp/step3.php');
												}
												
											} else {
												include('./snajp/step0.php');
											}
									}
								}
								
								
								
							} catch(SoapFault $error) {
								  echo 'error <br/>', $error->faultstring;
							} 
			 
						?>
					</div>
					
					<div class="col-xs-1 col-md-4">
					</div>
				</div>
			</section>
		
			<footer class=" s-bg2">
				<div class="row">
					<div class="col-xs-1 col-md-4">
					</div>
					
					<div class="col-xs-10 col-md-4">
						<span class="s-bold">Odnośniki</span>
						<ul class="s-list-footer">
							<li><a href="./">Snajper</a></li>
							<li><a href="?id=dzialanie">Zasada działania snajpera</a></li>
							<li><a href="?id=info">Info o projekcie</a></li>
						</ul>
					</div>
					
					<div class="col-xs-1 col-md-4">
					</div>
				</div>
			</footer>
    </body>
</html>
