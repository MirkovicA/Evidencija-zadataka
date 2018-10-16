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
			if ((document.getElementById('broj_kartice').value == "") || (document.getElementById('tip_postavljene').value == "") || (document.getElementById('model_postavljene').value == "") || (document.getElementById('serijski_postavljene').value == "") || (document.getElementById('stari_dslam').value == "") || ((document.getElementById('star_port').value == "") && (document.getElementById('stari_mr').value == "")) || (document.getElementById('novi_dslam').value == "") || ((document.getElementById('novi_port').value == "") && (document.getElementById('novi_mr').value == ""))) {
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
				
			// DSLAM
			$noviDsalm = $_POST["novi_dslam"];
			$noviPort = $_POST["novi_port"];
			$noviMr = $_POST["novi_mr"];
			$novaPozicija = $_POST["nova_pozicija"];

			$stariDslam = $_POST["stari_dslam"];
			$stariPort = $_POST["stari_port"];
			$stariMr = $_POST["stari_mr"];
			$staraPozicija = $_POST["stara_pozicija"];

			

			

			
			/*if (!empty($tipPreuzete) || !empty($modelPreuzete) || !empty($serijskiPreuzete) || !empty($tipPostavljene) || !empty($modelPostavljene) || !empty($serijskiPostavljene) || !empty($aktivnaPP)  || !empty($aktivniDslam) || !empty($aktivniPort) || !empty($aktivniMr) || !empty($aktivnaPozicija))) {*/
				
			//	if ($dodatnaOprema == ne) {
					
				

					$upisOpremeQuery = "INSERT INTO `ukljucenje` (`kartica`, `tip`, `model`, `kompanija`, `serijski`, `dodatna`, `user`) VALUES ('$brojKartice', '$tipPostavljene', '$modelPostavljene', '$kompanijaPostavljene', '$serijskiPostavljene','$dodatnaOprema', '$user')";
					$upisOpreme = mysql_query($upisOpremeQuery) or die(mysql_error());			

					

					$upisPortQuery = "INSERT INTO `dslam` (`broj_kartice`, `stari_dslam`, `stari_port`, `stari_mr`, `stara_pozicija`, `novi_dslam`, `novi_port`, `novi_mr`, `nova_pozicija`, `user`) VALUES ('$brojKartice', '$stariDslam', '$stariPort', '$stariMr', '$staraPozicija', '$noviDsalm', '$noviPort', '$noviMr', '$novaPozicija', '$user')";

					$upisPort = mysql_query($upisPortQuery) or die(mysql_error());

					
						if ($upisOpreme && $upisPort) {
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

					$upisPortQuery = "INSERT INTO `dslam` (`broj_kartice`, `stari_dslam`, `stari_port`, `stari_mr`, `stara_pozicija`, `novi_dslam`, `novi_port`, `novi_mr`, `nova_pozicija`) VALUES ('$brojKartice', '$stariDslam', '$stariPort', '$stariMr', '$staraPozicija', '$noviDsalm', '$noviPort', '$noviMr', '$novaPozicija')";

					$upisPort = mysql_query($upisPortQuery) or die(mysql_error());
					
					if ($upisOpreme && $upisPort){
						/* Redirect browser */
			//			echo "<meta http-equiv=\"refresh\" content=\"0; dodatna_oprema_ukljucenje.php\"/>";
						/* Make sure that code below does not get executed when we redirect. */
			//			exit;
			//		}
			//	}*/
						
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
	<form action="oprema-parica-port-upis.php" method="post">
			<p>Broj kartice: <input class = "input_text" type="text" value="<?php echo $zadnjaKartica; ?>" name="broj_kartice" id="broj_kartice"></p><br />
			<p>Vrsta: <input class = "input_text" type="text" name="tip_postavljene" id="tip_postavljene"></p>
			<p>Model: <input class = "input_text" type="text" name="model_postavljene" id="model_postavljene"></p>
			<p>Kompanija: 
				<select name="kompanija_postavljene">
					<option value="HT">HT</option>
					<option value="OT">OT</option>
					<option value="IS">IS</option>
				</select></p>
			<p>Serijski broj: <input class = "input_text" type="text" name="serijski_postavljene" id="serijski_postavljene"></p><br />
			
			
			<p>Stari DSLAM:<input class = "input_text" type="text" name="stari_dslam" id="stari_dslam"></p>
			<p>Stari port:<input class = "input_text" type="text" name="stari_port" id="stari_port"></p>
			<p>Stari MR:<input class = "input_text" type="text" name="stari_mr" id="stari_mr"></p>
			<p>Stara pozicija:<input class = "input_text" type="text" name="stara_pozicija" id="stara_pozicija"></p><br />
			<p>Novi DSLAM:<input class = "input_text" type="text" name="novi_dslam" id="novi_dslam"></p>
			<p>Novi port:<input class = "input_text" type="text" name="novi_port" id="novi_port"></p>
			<p>Novi MR:<input class = "input_text" type="text" name="novi_mr" id="novi_mr"></p>
			<p>Nova pozicija:<input class = "input_text" type="text" name="nova_pozicija" id="nova_pozicija"></p><br />

			
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