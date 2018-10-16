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
			if ((document.getElementById('broj_kartice').value == "")|| (document.getElementById('nova_pp').value == "") || (document.getElementById('nova_pp_pozicija').value == "") || (document.getElementById('stara_pp').value == "") || (document.getElementById('stara_pp_pozicija'). value == "") || (document.getElementById('stari_dslam').value == "") || ((document.getElementById('stari_port').value == "") && (document.getElementById('stari_mr').value == "")) || (document.getElementById('novi_dslam').value == "") || ((document.getElementById('novi_port').value == "") && (document.getElementById('stari_mr').value == ""))) {
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
			
			// DSLAM
			$brojKartice = $_POST["broj_kartice"];
			$user = $_SESSION['user_username'];

			$noviDsalm = $_POST["novi_dslam"];
			$noviPort = $_POST["novi_port"];
			$noviMr = $_POST["novi_mr"];
			$novaPozicija = $_POST["nova_pozicija"];

			$stariDslam = $_POST["stari_dslam"];
			$stariPort = $_POST["stari_port"];
			$stariMr = $_POST["stari_mr"];
			$staraPozicija = $_POST["stara_pozicija"];

			//parica

			

			$staraPP = $_POST["stara_pp"];
			$staraPPpozicija = $_POST["stara_pp_pozicija"];

			$novaPP = $_POST["nova_pp"];
			$novaPPpozicija = $_POST["nova_pp_pozicija"];

			/*if (!empty($noviDsalm) || !empty($noviPort) || !empty($noviMr) || !empty($novaPozicija) || !empty($stariDslam) || !empty($stariPort) || !empty($stariMr) || !empty($staraPozicija) || !empty($staraPP) || !empty($novaPP)) {*/
				
				$upisDslamQuery = "INSERT INTO `dslam` (`broj_kartice`, `novi_dslam`, `novi_port`, `novi_mr`, `nova_pozicija`, `stari_dslam`, `stari_port`, `stari_mr`, `stara_pozicija`, `user`) VALUES ('$brojKartice', '$noviDsalm', '$noviPort', '$noviMr', '$novaPozicija', '$stariDslam', '$stariPort', '$stariMr', '$staraPozicija', '$user')";

				$upisDslam = mysql_query($upisDslamQuery) or die(mysql_error());

				


				$upisPariceQuery = "INSERT INTO `parica` (`broj_kartice`, `stara_pp`, `stara_pp_pozicija`, `nova_pp`, `nova_pp_pozicija`, `user`) VALUES ('$brojKartice', '$staraPP', '$staraPPpozicija', '$novaPP', '$novaPPpozicija', '$user')";

				$upisParice = mysql_query($upisPariceQuery) or die(mysql_error());

				if ($upisParice && $upisDslam) {
					/* Redirect browser */
							echo "<meta http-equiv=\"refresh\" content=\"0; index.php\"/>";
							/* Make sure that code below does not get executed when we redirect. */
							exit;
				}



			/*}else
			echo '<p>Niste upisali podatke. Pokusajte ponovno.</p>';*/



		}





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

	<form action="promjena-port-parica.php" method="post">
			<p>Broj kartice: <input class = "input_text" type="text" value="<?php echo $zadnjaKartica; ?>" name="broj_kartice" id="broj_kartice"></p><br />
						
			
			<p>Stara parica:<input class = "input_text" type="text" name="stara_pp" id="stara_pp"></p>
			<p>Centrala:<input class = "input_text" type="text" name="stara_pp_pozicija" id="stara_pp_pozicija"></p>
			<p>Nova parica:<input class = "input_text" type="text" name="nova_pp" id="nova_pp"></p>
			<p>Centrala:<input class = "input_text" type="text" name="nova_pp_pozicija" id="nova_pp_pozicija"></p>
			
			

			<p>Stari DSLAM port:<input class = "input_text" type="text" name="stari_dslam" id="stari_dslam"></p>
			<p>Stari port:<input class = "input_text" type="text" name="stari_port" id="stari_port"></p>
			<p>Stari MR:<input class = "input_text" type="text" name="stari_mr" id="stari_mr"></p>
			<p>Stara pozicija:<input class = "input_text" type="text" name="stara_pozicija" id="stara_pozicija"></p><br />

			<p>Novi DSLAM port:<input class = "input_text" type="text" name="novi_dslam" id="novi_dslam"></p>
			<p>Novi port:<input class = "input_text" type="text" name="novi_port" id="novi_port"></p>
			<p>Novi MR:<input class = "input_text" type="text" name="novi_mr" id="novi_mr"></p>
			<p>Nova pozicija:<input class = "input_text" type="text" name="nova_pozicija" id="nova_pozicija"></p>

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