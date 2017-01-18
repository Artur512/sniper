	<h3 class="head3">Krok 2</h3>
<form action="" method="post">

	<label>Nr aukcji:</label>			<input type="text" name="step2[auctionId]" value="<?php echo $_POST['step2']['auctionId']; ?>" readonly></input>
	<label>Maksymalna oferta:</label>	<input type="text" name="step2[maxPrice]" required></input>
	<label>Ilość: </label>				<input type="text" name="step2[quantity]" required></input>
	<label>Sekund wcześniej (min 3 sek.): </label>	<input type="text" name="step2[secBefore]" required></input>
	<br>
	<label>Login allegro: </label>		<input type="text" name="step2[login]" required></input>
	<label>Hasło allegro: </label>		<input type="password" name="step2[pass]" required></input>
	<br>
	<input type="submit" value="Wprowadź"></input>

</form>