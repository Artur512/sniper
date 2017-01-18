<?php
	$time = $snajp->timeToShot($lastId);
	//ograniczenie czasowe, min 3 sec przez końcem
	if($time < 3 ){
		echo "Czas na licytowanie zakończył się <br>";
		echo $time;
		
		exit;
	}
?>
	<h3 class="head3">Krok 3</h3>
<div id="timer"></div>


<script type="text/javascript">
	var count = <?php echo $time ?>;

	var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

	function timer()
	{
	  count=count-1;
	  if (count <= 0)
	  {
		 clearInterval(counter);
			//window.location = "refresh.php";
			//document.getElementById("timer").load("./sniper/step1.php");
			document.getElementById("timer").innerHTML='<object type="text/html" data="./snajp/step4.php?id=<?php echo $lastId; ?>" ></object>';
		 return;
	  }

		document.getElementById("timer").innerHTML=count + " sek."; // watch for spelling
	}
</script>