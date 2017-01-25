<?php 
	
	$time = $auctionInfo->itEndingTime - time();


?>

	<h3 class="head3"> <span class="text-danger"> <?php echo $auctionInfo->itName; ?></span></h3>
	<hr>
	
	<p>
		
		<label class="s-label-inline">Aktualna cena: </label> <span class="text-danger"><?php echo $auctionInfo->itPrice; ?> zł. </span><br>
		<label class="s-label-inline">Sprzedający: </label> <span class="text-danger"> <?php echo $auctionInfo->itSellerLogin; ?>  </span><br>
		<label class="s-label-inline">Lokalizacja: </label> <span class="text-danger"> <?php echo $auctionInfo->itLocation; ?>  </span><br>
		<label class="s-label-inline">Dostępna ilość: </label> <span class="text-danger"> <?php echo $auctionInfo->itQuantity; ?>  </span><br>
		<label class="s-label-inline">Najwyższa oferta od: </label> <span class="text-danger"> <?php echo $auctionInfo->itHighBidderLogin; ?>  </span><br>
		<label class="s-label-inline">Czas do końca aukcji: </label> <span id="timer" class="text-danger"></span><br>
		
	</p>
	
	<br>
	<br>
	
	<script type="text/javascript">
	var count = <?php echo $time ?>;

	var counter=setInterval(timer, 1000); //1000 = 1 sekunda

	function timer()
	{
	  count=count-1;

		document.getElementById("timer").innerHTML=count + " sek."; // wyświetlanie odliczania
	}
</script>
	
	
	
	
	<h3 class="head3">Ustawienia strzału: Krok 2</h3>
	<hr>

	<form class="form-horizontal" action="" method="post">
	  <div class="form-group">
		<label class="" for="input2">Numer aukcji</label>
		<div class="col-sm-10">
		  <input name="step2[auctionId]" type="text" class="form-control" id="input2" value="<?php echo $_POST['step2']['auctionId']; ?>" readonly>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="" for="input3">Maksymalna oferta</label>
		<div class="col-sm-10">
		  <input name="step2[maxPrice]" type="number" class="form-control" id="input3" min="<?php echo $auctionInfo->itPrice ?>" placeholder="zł." required>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="" for="input4">Ilość</label>
		<div class="col-sm-10">
		  <input name="step2[quantity]" type="number" class="form-control" id="input4" min="1" max="<?php echo $auctionInfo->itQuantity ?>" value="1" placeholder="szt./kpl." required>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="" for="input5">Sekund wcześniej (zalecane min. 3 sek.)</label>
		<div class="col-sm-10">
		  <input name="step2[secBefore]" type="text" class="form-control" id="input5" placeholder="sek." required>
		</div>
	  </div>

	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-info">Dalej ></button>
		</div>
	  </div>
	</form>