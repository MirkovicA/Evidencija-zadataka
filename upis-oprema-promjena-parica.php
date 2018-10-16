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
			if ((document.getElementById('broj_kartice').value == "") || (document.getElementById('tip_postavljene').value == "") || (document.getElementById('model_postavljene').value == "") || (document.getElementById('serijski_postavljene').value == "") || (document.getElementById('nova_pp').value == "") || (document.getElementById('nova_pp_pozicija').value == "") || (document.getElementById('stara_pp').value == "") || (document.getElementById('stara_pp_pozicija'). value == "")) {
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

			
			$brojKartice = $_POST["broj_kartice"];
			$user = $_SESSION['user_username'];

			// oprema
			$dodatnaOprema = $_POST["dodatna_oprema"];
			$tipPostavljene = $_POST["tip_postavljene"];
			$modelPostavljene = $_POST["model_postavljene"];
			$kompanijaPostavljene = $_POST["kompanija_postavljene"];
			$serijskiPostavljene = $_POST["serijski_postavljene"];
				

			//parica
			$staraPP = $_POST["stara_pp"];
			$staraPPpozicija = $_POST["stara_pp_pozicija"];
			$novaPP = $_POST["nova_pp"];
			$novaPPpozicija = $_POST["nova_pp_pozicija"];

			

			

			
			/*if (!empty($tipPreuzete) || !empty($modelPreuzete) || !empty($serijskiPreuzete) || !empty($tipPostavljene) || !empty($modelPostavljene) || !empty($serijskiPostavljene) || !empty($aktivnaPP)  || !empty($aktivniDslam) || !empty($aktivniPort) || !empty($aktivniMr) || !empty($aktivnaPozicija))) {*/
				
			//	if ($dodatnaOprema == ne) {
					
				

					$upisOpremeQuery = "INSERT INTO `ukljucenje` (`kartica`, `tip`, `model`, `kompanija`, `serijski`, `dodatna`, `user`) VALUES ('$brojKartice', '$tipPostavljene', '$modelPostavljene', '$kompanijaPostavljene', '$serijskiPostavljene','$dodatnaOprema', '$user')";
					$upisOpreme = mysql_query($upisOpremeQuery) or die(mysql_error());		

					

					$upisPariceQuery = "INSERT INTO `parica` (`broj_kartice`, `stara_pp`, `stara_pp_pozicija`, `nova_pp`, `nova_pp_pozicija`, `user`) VALUES ('$brojKartice', '$staraPP', '$staraPPpozicija', '$novaPP', '$novaPPpozicija', '$user')";

					$upisParice = mysql_query($upisPariceQuery) or die(mysql_error());

					
						if ($upisOpreme && $upisParice) {
							if ($dodatnaOprema == da) {
										/* Redirect browser */
								echo "<meta http-equiv=\"refresh\" content=\"0; dodatna_oprema_ukljucenje.php\"/>";
								/* Make sure that code below does not get executed when we redirect. */
								exit;
							}else{
								/* Redirect browser */
								echo "<meta http-equiv=\"refresh\" content=\"0; index.php\"/>";
								/* Make sure that code below does not get executed when we redirect. */
								exit;
							}
							
						}
				/*}elseif ($dodatnaOprema == da) {
					$upisOpremeQuery = "INSERT INTO `ukljucenje` (`kartica`, `tip`, `model`, `kompanija`, `serijski`, `dodatna`) VALUES ('$brojKartice', '$tipPostavljene', '$modelPostavljene', '$kompanijaPostavljene', '$serijskiPostavljene','$dodatnaOprema')";
					$upisOpreme = mysql_query($upisOpremeQuery) or die(mysql_error());	

					$upisPariceQuery = "INSERT INTO `parica` (`broj_kartice`, `stara_pp`, `stara_pp_pozicija`, `nova_pp`, `nova_pp_pozicija`) VALUES ('$brojKartice', '$staraPP', '$staraPPpozicija', '$novaPP', '$novaPPpozicija')";

					$upisParice = mysql_query($upisPariceQuery) or die(mysql_error());
					
					if ($upisOpreme && $upisParice){
						/* Redirect browser */
		//				echo "<meta http-equiv=\"refresh\" content=\"0; dodatna_oprema_ukljucenje.php\"/>";
						/* Make sure that code below does not get executed when we redirect. */
		//				exit;
		//			}
		//		}*/
						
					 // provjera da li je izvrsen Query


				


			/*}// if(!empty) 
			else
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
	
	<form action="upi-oprema-promjena-parica.php" method="post">
			<p>Broj kartice: <input class = "input_text" type="text" value="<?php echo $zadnjaKartica; ?>" name="broj_kartice" id="broj_kartice"></p><br />
			<p>Vrsta opreme: <input class = "input_text" type="text" name="tip_postavljene" id="tip_postavljene"></p>
			<p>Model: <input class = "input_text" type="text" name="model_postavljene" id="model_postavljene"></p>
			<p>Kompanija: 
				<select name="kompanija_postavljene">
					<option value="HT">HT</option>
					<option value="OT">OT</option>
					<option value="IS">IS</option>
				</select></p>
			<p>Serijski broj opreme: <input class = "input_text" type="text" name="serijski_postavljene" id="serijski_postavljene"></p><br />
			
			<p>Dodavanje još opreme: 
				<select name="dodatna_oprema">
					<option value="ne">NE</option>
					<option value="da">DA</option>
				</select></p><br />
			
			<p>Stara parica:<input class = "input_text" type="text" name="stara_pp" id="stara_pp"></p>
			<p>Centrala:<input class = "input_text" type="text" name="stara_pp_pozicija" id="stara_pp_pozicija"></p>
			<p>Nova parica:<input class = "input_text" type="text" name="nova_pp" id="nova_pp"></p>
			<p>Centrala:<input class = "input_text" type="text" name="nova_pp_pozicija" id="nova_pp_pozicija"></p>
			
			

			
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