<?php
	require_once('includes/settings.php');
	require_once('includes/class-allegro.php');
	//if(isset($_POST["itemId"])){
	//	 header("Location: productDetails.php");
	//			exit;
//	}
	
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Allegro Sniper</title>
      <link rel="stylesheet" href="css/style.css">

</head>

<body>
 <div class="bid-page">
  <div class="form">
    <form class="login-form" action="productDetails.php" method="post">
      <input name="itemId" type="text" placeholder="id" required/>
      <input type="text" placeholder="price" />
     <input type="submit" value="Sprawdź produkt"/>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
