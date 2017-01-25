<?php
	$time = $snajp->timeToShot($lastId);
	//ograniczenie czasowe, min 3 sec przez końcem
	if($time < 3 ){
		echo "Czas na licytowanie zakończył się <br>";
		echo $time;
		
		exit;
	}
?>

	
	<h3 class="head3">Odliczanie do złożenia oferty: Krok 3</h3>
	<hr>
	
	<p>
		<h4>Oferta zostanie złożona za:</h4> <span id="timer" class="s-timer"></span><br>
	</p>
	<p>
		Nie zamykaj okna przeglądarki.
	</p>


<script type="text/javascript">
	var count = <?php echo $time ?>;

	var counter=setInterval(timer, 1000); //1000 = 1 sekunda

	function timer()
	{
	  count=count-1;
	  if (count <= 0)
	  {
		 clearInterval(counter);
			document.getElementById("timer").innerHTML='<object type="text/html" data="./snajp/step4.php?id=<?php echo $lastId; ?>" ></object>';
		 return;
	  }

		document.getElementById("timer").innerHTML=count + " sek."; // wyświetlanie odliczania
	}
</script>