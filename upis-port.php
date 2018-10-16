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
			if ((document.getElementById('broj_kartice').value == "") || (document.getElementById('aktivni_dslam').value == "") || ((document.getElementById('aktivni_port').value == "") && (document.getElementById('aktivni_novi').value == ""))) {
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

			// DSLAM
			$aktivniDslam = $_POST["aktivni_dslam"];
			$aktivniPort = $_POST["aktivni_port"];
			$aktivniMr = $_POST["aktivni_mr"];
			$aktivnaPozicija = $_POST["aktivna_pozicija"];

			


			/*if (!empty($aktivniDslam) || !empty($aktivniPort) || !empty($aktivniMr) || !empty($aktivnaPozicija)) {*/
				

				
			
			/*echo 'Aktivni Dslam je: '.$aktivniDslam;
			echo 'Aktivni port je: '.$aktivniPort;
			echo 'Aktivni MR je: '.$aktivniMr;
			echo 'Aktivna pozicija je: '.$aktivnaPozicija;*/

					

					$upisDslamQuery = "INSERT INTO `dslam_aktivni` (`broj_kartice`, `aktivni_dslam`, `aktivni_port`, `aktivni_mr`, `aktivna_pozicija`, `user`) VALUES ('$brojKartice', '$aktivniDslam', '$aktivniPort', '$aktivniMr', '$aktivnaPozicija', '$user')";

					$upisDslam = mysql_query($upisDslamQuery) or die(mysql_error());

					

					
						if ($upisDslam) {
							
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
	
	<form action="upis-port.php" method="post">
			<p>Broj kartice: <input class = "input_text" type="text" value="<?php echo $zadnjaKartica; ?>" name="broj_kartice" id="broj_kartice"></p><br />
			
			

			<p>Aktivni DSLAM:<input class = "input_text" type="text" name="aktivni_dslam" id="aktivni_dslam"></p>
			<p>Aktivna port:<input class = "input_text" type="text" name="aktivni_port" id="aktivni_port"></p>
			<p>Aktivna MR:<input class = "input_text" type="text" name="aktivni_mr" id="aktivni_mr"></p>
			<p>Aktivna pozicija:<input class = "input_text" type="text" name="aktivna_pozicija" id="aktivna_pozicija"></p><br />

			

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