<?php
	require_once('includes/settings.php');
	require_once('includes/class-allegro.php');
	var_dump($_POST);
	if(isset($_POST["login"])&& isset($_POST["pass"])){
		try{
					$allegro = new AllegroApi();
		
	
		if($allegro->LoginEnc() == true){
			  header("Location: main.php");
				exit;
		
		}
		}catch(SoapFault $error) {
          echo 'error <br/>', $error->faultstring;
    }
		
	}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Allegro Sniper</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
 <div class="login-page">
  <div class="form">
    <form class="login-form" action="" method="post">
      <input name="login" type="text" placeholder="username" required/>
      <input name="pass" type="password" placeholder="password" required/>
      <input type="submit" value="login"/>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
