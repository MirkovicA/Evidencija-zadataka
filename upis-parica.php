<?php
	ob_start();
	require 'session.php';
	require 'connect.php';
	if (loggedin()) {
?>
<!DOCTYPE html lang="hr">
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Evidencija</title>
	<link href="css/reset.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
	<script type="text/javascript">
		
		function checkforblank(){
			var praznaForma = "";
			if ((document.getElementById('broj_kartice').value == "") || (document.getElementById('aktivna_pp').value == "") || (document.getElementById('aktivna_pp_pozicija'). value == "")) {
					praznaForma += "Nisu uneseni svi podaci. \n";
			}
			if (praznaForma != "") {
				alert(praznaForma);
				return false;
			}
		}// function checkforblank

	</script>
</head>
<body>
<div class="omotac">

	<?php

	
			

		$oprema = mysql_query("SELECT broj_kartice FROM `zadaci` ORDER BY id DESC LIMIT 1");
		$opremaZadnjiRed = mysql_fetch_array($oprema);
		$zadnjaKartica = $opremaZadnjiRed["broj_kartice"];


		if (isset($_POST["spremi"])) {

			// oprema
			
			$brojKartice = $_POST["broj_kartice"];
			$user = $_SESSION['user_username'];

			//parica
			$aktivnaPP = $_POST["aktivna_pp"];
			$aktivnaPPpozicija = $_POST["aktivna_pp_pozicija"];

			


			/*if (!empty($aktivnaPP)) {*/
				

				

					

				$upisPariceQuery = "INSERT INTO `parica_aktivna` (`broj_kartice`, `aktivna_pp`, `aktivna_pp_pozicija`, `user`) VALUES ('$brojKartice', '$aktivnaPP', '$aktivnaPPpozicija', '$user')";

				$upisParice = mysql_query($upisPariceQuery) or die(mysql_error());

				if ($upisParice) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; index.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
						
					

				


			/*}// if(!empty) 
			/*else
			echo '<p>Niste upisali podatke. Pokusajte ponovno.</p>';*/


		} // end if(isset)

	?>

<div class="head">
			<nav>
				
				<ul>
					<li><a href="index.php">Početna</a></li>
					<li><a href="izvjestaj_pretraga.php">Dnevni izvještaj</a></li>
					<li><a href="pretraga.php">Pretraga</a></li>
					<li><a href="logout.php">Odjava <?php echo $_SESSION['user_username']; ?></a></li>
				</ul>

			</nav>
		</div>
		
<div class="index">
	
	<form action="upis-parica.php" method="post">
			<p>Broj kartice: <input class = "input_text" type="text" value="<?php echo $zadnjaKartica; ?>" name="broj_kartice" id="broj_kartice"></p><br />
			
			
			<p>Aktivna parica:<input class = "input_text" type="text" name="aktivna_pp" id="aktivna_pp"></p>
			<p>Centrala:<input class = "input_text" type="text" name="aktivna_pp_pozicija" id="aktivna_pp_pozicija"></p>
			

			<button type="submit" name="spremi">Spremi</button>
	</form>
</div>
</div>
</body>
<footer>
	<p class="footer">Copyright &copy Alojzije Mirković</p>
	<p class="footer"> Sva prava pridržana</p>
</footer>
</html>
<?php
}else{
	include 'login.php';
}
?>