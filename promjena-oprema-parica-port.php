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
		if ((document.getElementById('broj_kartice').value == "") || (document.getElementById('tip_postavljene').value == "") || (document.getElementById('model_postavljene').value == "") || (document.getElementById('serijski_postavljene').value == "") || (document.getElementById('tip_preuzete').value == "") || (document.getElementById('model_preuzete').value == "") || (document.getElementById('serijski_preuzete').value == "") || (document.getElementById('nova_pp').value == "") || (document.getElementById('nova_pp_pozicija').value == "") || (document.getElementById('stara_pp').value == "") || (document.getElementById('stara_pp_pozicija'). value == "") || (document.getElementById('stari_dslam').value == "") || ((document.getElementById('stari_port').value == "") && (document.getElementById('stari_mr').value == "")) || (document.getElementById('novi_dslam').value == "") || ((document.getElementById('novi_port').value == "") && (document.getElementById('novi_mr').value == ""))) {
		
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
				$serijskiPostavljene = $_POST["serijski_postavljene"];
				$dodatnaOprema = $_POST["dodatna_oprema"];
				$tipPreuzete = $_POST["tip_preuzete"];
				$modelPreuzete = $_POST["model_preuzete"];
				$kompanijaPreuzete = $_POST["kompanija_preuzete"];
				$serijskiPreuzete = $_POST["serijski_preuzete"];
				$tipPostavljene = $_POST["tip_postavljene"];
				$modelPostavljene = $_POST["model_postavljene"];
				$kompanijaPostavljene = $_POST["kompanija_postavljene"];
				$serijskiPostavljene = $_POST["serijski_postavljene"];
				//parica
				$staraPP = $_POST["stara_pp"];
				$staraPPpozicija = $_POST["stara_pp_pozicija"];
				$novaPP = $_POST["nova_pp"];
				$novaPPpozicija = $_POST["nova_pp_pozicija"];
				// DSLAM
				$noviDsalm = $_POST["novi_dslam"];
				$noviPort = $_POST["novi_port"];
				$noviMr = $_POST["novi_mr"];
				$novaPozicija = $_POST["nova_pozicija"];
				$stariDslam = $_POST["stari_dslam"];
				$stariPort = $_POST["stari_port"];
				$stariMr = $_POST["stari_mr"];
				$staraPozicija = $_POST["stara_pozicija"];

				$upisOpremeQuery = "INSERT INTO `oprema` (`broj_kartice`, `tip_preuzete`, `model_preuzete`, `serijski_preuzete`, `kompanija_preuzete`, `tip_postavljene`, `model_postavljene`, `kompanija_postavljene`, `serijski_postavljene`, `dodatna_oprema`, `user`) VALUES ('$brojKartice','$tipPreuzete', '$modelPreuzete', '$serijskiPreuzete','$kompanijaPreuzete', '$tipPostavljene', '$modelPostavljene', '$kompanijaPostavljene', '$serijskiPostavljene', '$dodatnaOprema', '$user')";
				$upisOpreme = mysql_query($upisOpremeQuery) or die(mysql_error());
				$upisDslamQuery = "INSERT INTO `dslam` (`broj_kartice`, `novi_dslam`, `novi_port`, `novi_mr`, `nova_pozicija`, `stari_dslam`, `stari_port`, `stari_mr`, `stara_pozicija`, `user`) VALUES ('$brojKartice', '$noviDsalm', '$noviPort', '$noviMr', '$novaPozicija', '$stariDslam', '$stariPort', '$stariMr', '$staraPozicija', '$user')";
				$upisDslam = mysql_query($upisDslamQuery) or die(mysql_error());
				$upisPariceQuery = "INSERT INTO `parica` (`broj_kartice`, `stara_pp`, `stara_pp_pozicija`, `nova_pp`, `nova_pp_pozicija`, `user`) VALUES ('$brojKartice', '$staraPP', '$staraPPpozicija', '$novaPP', '$novaPPpozicija', '$user')";
				$upisParice = mysql_query($upisPariceQuery) or die(mysql_error());
				if ($upisOpreme && $upisDslam && $upisParice) {
					if ($dodatnaOprema == da) {
						/* Redirect browser */
						echo "<meta http-equiv=\"refresh\" content=\"0; dodatna_oprema.php\"/>";
						/* Make sure that code below does not get executed when we redirect. */
						exit;
					}else{
						/* Redirect browser */
						echo "<meta http-equiv=\"refresh\" content=\"0; index.php\"/>";
						/* Make sure that code below does not get executed when we redirect. */
						exit;
					}
				} // provjera da li je izvrsen Query
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
		</div><!--div class="head"-->
		<div class="index">
			<form action="promjena-oprema-parica-port.php" method="post" onsubmit="return checkforblank();">
				<p>Broj kartice: <input class = "input_text" type="text" value="<?php echo $zadnjaKartica; ?>" name="broj_kartice" id="broj_kartice"></p><br />
				<p>Vrsta preuzete opreme: <input class = "input_text" type="text" name="tip_preuzete" id="tip_preuzete"></p>
				<p>Model: <input class = "input_text" type="text" name="model_preuzete" id="model_preuzete"></p>
				<p>Kompanija: 
					<select name="kompanija_preuzete">
						<option value="HT">HT</option>
						<option value="OT">OT</option>
						<option value="IS">IS</option>
					</select></p>
				<p>Serijski broj preuzete opreme: <input class = "input_text" type="text" name="serijski_preuzete" id="serijski_preuzete"></p><br />
				<p>Vrsta postavljene opreme: <input class = "input_text" type="text" name="tip_postavljene" id="tip_postavljene"></p>
				<p>Model: <input class = "input_text" type="text" name="model_postavljene" id="model_postavljene"></p>
				<p>Kompanija: 
					<select name="kompanija_postavljene">
						<option value="HT">HT</option>
						<option value="OT">OT</option>
						<option value="IS">IS</option>
					</select></p>
				<p>Serijski broj postavljene opreme: <input class = "input_text" type="text" name="serijski_postavljene" id="serijski_postavljene"></p><br />
				<p>Dodavanje još opreme: 
					<select name="dodatna_oprema">
						<option value="ne">NE</option>
						<option value="da">DA</option>
					</select></p><br />
				<p>Stara parica:<input class = "input_text" type="text" name="stara_pp" id="stara_pp"></p>
				<p>Centrala:<input class = "input_text" type="text" name="stara_pp_pozicija" id="stara_pp_pozicija"></p>
				<p>Nova parica:<input class = "input_text" type="text" name="nova_pp" id="nova_pp"></p>
				<p>Centrala:<input class = "input_text" type="text" name="nova_pp_pozicija" id="nova_pp_pozicija"></p><br />
				<p>Stari DSLAM port:<input class = "input_text" type="text" name="stari_dslam" id="stari_dslam"></p>
				<p>Stari port:<input class = "input_text" type="text" name="stari_port" id="stari_port"></p>
				<p>Stari MR:<input class = "input_text" type="text" name="stari_mr" id="stari_mr"></p>
				<p>Stara pozicija:<input class = "input_text" type="text" name="stara_pozicija" id="stara_pozicija"></p><br />
				<p>Novi DSLAM port:<input class = "input_text" type="text" name="novi_dslam" id="novi_dslam"></p>
				<p>Novi port:<input class = "input_text" type="text" name="novi_port" id="novi_port"></p>
				<p>Novi MR:<input class = "input_text" type="text" name="novi_mr" id="novi_mr"></p>
				<p>Nova pozicija:<input class = "input_text" type="text" name="nova_pozicija"></p>
				<button type="submit" name="spremi">Spremi</button>
			</form>
		</div><!-- div class="index"-->
	</div><!-- div class="omotac"-->
</body>
<footer>
	<p class="footer">Copyright &copy Alojzije Mirković</p>
	<p class="footer"> Sva prava pridržana</p>
</footer>
</html>
	<?php
	// if(loggedin())
		}else{
			include 'login.php';
		}
	?>