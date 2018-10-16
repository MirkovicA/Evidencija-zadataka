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
			if ((document.getElementById('broj_kartice').value == "") || (document.getElementById('aktivna_pp').value == "") || (document.getElementById('aktivna_pp_pozicija'). value == "") || (document.getElementById('aktivni_dslam').value == "") || ((document.getElementById('aktivni_port').value == "") && (document.getElementById('aktivni_mr').value == ""))) {
		
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
				//parica
				$aktivnaPP = $_POST["aktivna_pp"];
				$aktivnaPPpozicija = $_POST["aktivna_pp_pozicija"];
				// DSLAM
				$aktivniDslam = $_POST["aktivni_dslam"];
				$aktivniPort = $_POST["aktivni_port"];
				$aktivniMr = $_POST["aktivni_mr"];
				$aktivnaPozicija = $_POST["aktivna_pozicija"];

				$upisDslamQuery = "INSERT INTO `dslam_aktivni` (`broj_kartice`, `aktivni_dslam`, `aktivni_port`, `aktivni_mr`, `aktivna_pozicija`, `user`) VALUES ('$brojKartice', '$aktivniDslam', '$aktivniPort', '$aktivniMr', '$aktivnaPozicija', '$user')";
				$upisDslam = mysql_query($upisDslamQuery) or die(mysql_error());
				$upisPariceQuery = "INSERT INTO `parica_aktivna` (`broj_kartice`, `aktivna_pp`, `aktivna_pp_pozicija`, `user`) VALUES ('$brojKartice', '$aktivnaPP', '$aktivnaPPpozicija', '$user')";
				$upisParice = mysql_query($upisPariceQuery) or die(mysql_error());
				if ($upisDslam && $upisParice) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; index.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
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
		</div><!-- div class="head"-->
		<div class="index">
			<form action="upis-port-parica.php" method="post">
				<p>Broj kartice: <input class = "input_text" type="text" value="<?php echo $zadnjaKartica; ?>" name="broj_kartice" id="broj_kartice"></p><br>
				<p>Aktivna parica:<input class = "input_text" type="text" name="aktivna_pp" id="aktivna_pp"></p>
				<p>Centrala:<input class = "input_text" type="text" name="aktivna_pp_pozicija" id="aktivna_pp_pozicija"></p>
				<p>Aktivni DSLAM:<input class = "input_text" type="text" name="aktivni_dslam" id="aktivni_dslam"></p>
				<p>Aktivna port:<input class = "input_text" type="text" name="aktivi_port" id="aktivni_port"></p>
				<p>Aktivna MR:<input class = "input_text" type="text" name="aktivni_mr" id="aktivni_mr"></p>
				<p>Aktivna pozicija:<input class = "input_text" type="text" name="aktivna_pozicija" id="aktivna_pozicija"></p><br />
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
	// if (loggedin())
		}else{
			include 'login.php';
		}
	?>