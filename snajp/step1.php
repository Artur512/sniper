
	<h3 class="head3">Ustawienia strzału: Krok 1</h3>
	<hr>
<!--
	<form action="" method="post" class="s-form">
		<label>Wprowadź numer aukcji:</label>
		<input type="text" name="step1[auctionId]" required></input>
		<input type="submit" value="Ok" class="btn btn-warning btn-sm"></input>
		
	</form>
-->

	<form class="form-horizontal" action="" method="post">
	  <div class="form-group">
		<label class="" for="input1">Wprowadź numer aukcji</label>
		<div class="col-sm-10">
		  <input name="step1[auctionId]" type="text" class="form-control" id="input1" placeholder="Nr aukcji" required>
		</div>
	  </div>
	  
	  <br><br>
	  <div class="form-group">
		<label class="" for="input6">Login allegro</label>
		<div class="col-sm-10">
		  <input name="step1[login]" type="text" class="form-control" id="input6" placeholder="login" required>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="" for="input7">Hasło allegro</label>
		<div class="col-sm-10">
		  <input name="step1[pass]" type="password" class="form-control" id="input7" placeholder="haslo" required>
		</div>
	  </div>

	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-info">Dalej ></button>
		</div>
	  </div>
	</form>