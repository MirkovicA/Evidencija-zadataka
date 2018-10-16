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
</head>
<body>
	<div class="omotac">

		<?php

			$brojKartice = $_POST[broj_kartice];
			$datum = $_POST[datum];
			$zadatak = $_POST[zadatak];
			$tipZadatka = $_POST[tip_zadatka];
			$korisnik = $_POST[korisnik];
			$brojTelefona = $_POST[broj_telefona];
			$asset = $_POST[asset];
			$adresa = $_POST[adresa];
			$kontakt = $_POST[kontakt];
			$zabiljeska = $_POST[zabiljeska];
			$upisParice = $_POST[upis_parice];
			$upisPorta = $_POST[upis_porta];
			$promjenaOprema = $_POST[promjena_oprema];
			$promjenaParice = $_POST[promjena_parice];
			$promjenaPorta = $_POST[promjena_porta];
			$upisOprema = $_POST[unos_opreme];
			$user = $_SESSION['user_username'];

			// funkcija za pretvaranje datuma iz DD.MM.GGGG. u oblik GGGG-MM-DD jer baza ima takav oblik
			function pretvaranjeDatuma($datumZaUpis){
				$nizDatum = explode(".", $datumZaUpis);
				$datumZaUpis = $nizDatum[2]."-".$nizDatum[1]."-".$nizDatum[0];
				return $datumZaUpis;
			}

			//pozivanje funkcije za pretvaranje datuma
			$datumBaza = pretvaranjeDatuma($datum);

			$upis = mysql_query("INSERT INTO `zadaci` (`broj_kartice`, `datum`, `zadatak`, `tip_zadatka`, `korisnik`, `broj_telefona`, `asset`, `kontakt`, `adresa`, `zabiljeska`, `upis_parice`, `upis_porta`, `promjena_oprema`, `promjena_parice`, `promjena_porta`, `upis_opreme`, `user`) VALUES ('$brojKartice','$datumBaza','$zadatak','$tipZadatka','$korisnik','$brojTelefona','$asset','$kontakt','$adresa','$zabiljeska','$upisParice','$upisPorta','$promjenaOprema', '$promjenaParice', '$promjenaPorta', '$upisOprema', '$user')");

			//ako je promjena opreme, upis parice i upis porta = "da"
			if ($promjenaOprema == da && $upisParice == da && $upisPorta == da) {
				echo "<meta http-equiv=\"refresh\" content=\"0; oprema-parica-port-upis.php\"/>";
			}// kraj ako je promjena opreme, upis parice i upis porta = "da"
			// ako je promjena opreme, upis parice i promjena porta = "da"
			if ($promjenaOprema == da && $upisParice == da && $promjenaPorta == da) {
				echo "<meta http-equiv=\"refresh\" content=\"0; promjena-oprema-port-upis-parica.php\"/>";
			}// kraj ako je promjena opreme, upis parice i promjena porta = "da", a upis porta i promjena parice ="ne"
			// ako su promjene opreme, parice i porta = "da"
			if ($promjenaOprema == da && $promjenaPorta == da && $promjenaParice == da) {
				echo "<meta http-equiv=\"refresh\" content=\"0; promjena-oprema-parica-port.php\"/>";
			}// kraj ako su promjene opreme, parice i porta = "da", a upisi parice i porta "ne"
			// ako su promjena opreme, promjena parice = "da"
			if ($promjenaOprema == da && $promjenaParice == da && $upisPorta == ne && $promjenaPorta == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; promjena-oprema-parica.php\"/>";
			}// kraj ako su promjena opreme, upis parice = "da", a upis porta, promjena parice i promjena porta = "ne"
			// ako su promjena opreme i promjena porta = "da", a upis parice
			if ($promjenaOprema == da && $promjenaPorta == da && $promjenaParice == ne && $upisParice == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; promjena-oprema-port.php\"/>";
			}// kraj ako su promjena opreme i promjena porta = "da", a upis parice, promjena parice i upis porta = "ne"
			// ako je samo promjena opreme = "da"
			if ($promjenaOprema == da && $promjenaParice == ne && $promjenaPorta == ne && $upisParice == ne && $upisPorta == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; oprema.php\"/>";
			}// kraj ako je samo promjena opreme = "da"
			// ako je promjena porta i promjena parice = "da"
			if ($promjenaParice == da && $promjenaPorta == da && $promjenaOprema == ne && $upisOprema == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; promjena-port-parica.php\"/>";
			}// kraj ako je promjena porta i promjena parice = "da"
			// ako je samo promjena porta = "da"
			if ($promjenaPorta == da && $promjenaOprema == ne && $promjenaParice == ne && $upisParice == ne && $upisOprema == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; promjena-port.php\"/>";
			}// kraj ako je samo promjena porta = "da"
			// ako je samo promjena parice = "da"
			if ($promjenaParice == da && $promjenaOprema == ne && $promjenaPorta == ne && $upisPorta == ne && $upisOprema == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; promjena-parica.php\"/>";
			}// kraj ako je samo promjena parice = "da"
			// ako su promjena opreme i upis parice ="da"
			if ($promjenaOprema == da && $upisParice == da && $upisPorta == ne && $promjenaPorta == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; promjena-oprema-upis-parica.php\"/>";
			}// kraj ako su promjena opreme i upis parice ="da"
			// ako su promjena opreme i upis porta ="da"
			if ($promjenaOprema == da && $upisPorta == da && $upisParice == ne && $promjenaParice == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; promjena-oprema-upis-port.php\"/>";
			}// kraj ako su promjena opreme i upis porta ="da"
			// ako su upis porta i upis parice = "da"
			if ($upisPorta == da && $upisParice == da && $promjenaOprema == ne && $upisOprema == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; upis-port-parica.php\"/>";
			}// kraj ako su upis porta i upis parice = "da"
			// ako su upis porta i promjena parice ="da"
			if ($upisPorta == da && $promjenaParice == da && $promjenaOprema == ne && $upisOprema == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; upis-port-promjena-parica.php\"/>";
			}// kraj ako su upis porta i promjena parice ="da"
			// ako je samo upis porta "da"
			if ($upisPorta == da && $upisParice == ne && $promjenaParice == ne && $promjenaOprema == ne && $upisOprema == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; upis-port.php\"/>";
			}// kraj ako je samo upis porta "da"
			// ako je samo upis parice ="da"
			if ($upisParice == da && $upisPorta == ne  && $promjenaPorta == ne && $promjenaOprema == ne && $upisOprema == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; upis-parica.php\"/>";
			}// ako je samo upis parice ="da"
			// ako je sve "ne"
			if ($upisPorta == ne && $upisParice == ne && $promjenaOprema == ne && $promjenaPorta == ne && $promjenaParice == ne && $upisOprema == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; index.php\"/>";
			}// ako je sve "ne"
			//upis oprema, upis port, upis parica
			if ($upisOprema == da && $upisPorta == da && $upisParice == da) {
				echo "<meta http-equiv=\"refresh\" content=\"0; ukljucenje-oprema-unos-parica-port.php\"/>";
			}
			// upis oprema, upis port
			if ($upisOprema == da && $upisPorta == da && $upisParice == ne && $promjenaParice == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; ukljucenje-oprema-unos-port.php\"/>";
			}
			// upis oprema, upis parica
			if ($upisOprema == da && $upisPorta == ne && $upisParice == da && $promjenaPorta == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; ukljucenje-oprema-unos-parica.php\"/>";
			}
			// samo upis opreme
			if ($upisOprema == da && $upisPorta == ne && $upisParice == ne && $promjenaPorta == ne && $promjenaParice == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; ukljucenje-oprema.php\"/>";
			}
			// promjena parica, upis port, promjena oprema
			if ($promjenaParice == da && $upisPorta == da && $promjenaOprema == da) {
				echo "<meta http-equiv=\"refresh\" content=\"0; unos-port-promjena-parica-oprema.php\"/>";
			}
			// upis parica, promjena port
			if ($upisParice == da && $promjenaPorta == da && $promjenaOprema == ne && $upisOprema == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; upis-parica-promjena-port.php\"/>";
			}
			// upis oprema, promjena parica
			if ($upisOprema == da && $promjenaParice == da && $promjenaPorta == ne && $upisPorta == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; upis-oprema-promjena-parica.php\"/>";
			}
			// upis oprema, promjena port
			if ($upisOprema == da && $promjenaPorta == da && $upisParice == ne && $promjenaParice == ne) {
				echo "<meta http-equiv=\"refresh\" content=\"0; upis-oprema-promjena-port.php\"/>";
			}
			// upis oprema, promjena parica i promjena port
			if ($upisOprema == da && $promjenaPorta == da && $promjenaParice == da) {
				echo "<meta http-equiv=\"refresh\" content=\"0; upis-oprema-promjena-port-parica.php\"/>";
			}
		?>
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