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



		<div class="head_ispis">
			<nav>
				
				<ul>
					<li><a href="index.php">Početna</a></li>
					<li><a href="izvjestaj_pretraga.php">Dnevni izvještaj</a></li>
					<li><a href="pretraga.php">Pretraga</a></li>
					<li><a href="logout.php">Odjava <?php echo $_SESSION['user_username']; ?></a></li>
				</ul>

			</nav>
		</div>
		<div class="ispis">
		<?php
		
		$pretragaBrojKartice = $_POST["pretraga_broj_kartice"];
		$user = $_SESSION['user_username'];
	$pretragaDatum = $_POST["pretraga_datum"];
	$pretragaKorisnik = $_POST["pretraga_korisnik"];
	$pretragaBrojTelefona = $_POST["pretraga_broj_telefona"];
	$pretragaAsset = $_POST["pretraga_asset"];
	$pretragaAdresa = $_POST["pretraga_adresa"];
	$pretragaKontakt = $_POST["pretraga_kontakt"];

	$pretragaDslam = $_POST["pretraga_dslam"];
	$pretragaPort = $_POST["pretraga_port"];
	$pretragaMr = $_POST["pretraga_mr"];

	$pretragaPP = $_POST["pretraga_parica"];
	$pretragaSerijski = $_POST["pretraga_serijski"];
	


	function pretvaranjeDatuma($datumZaUpis){
		$nizDatum = explode(".", $datumZaUpis);
		$datumZaUpis = $nizDatum[2]."-".$nizDatum[1]."-".$nizDatum[0];
		return $datumZaUpis;
	}

	//pozivanje funkcije za pretvaranje datuma iz forme u oblik kao u bazi
	$datumBaza = pretvaranjeDatuma($pretragaDatum);
	

	function datumZaIspis($datumZaIspis){
		$datum = explode("-", $datumZaIspis);
		$datumZaIspis = $datum[2].".".$datum[1].".".$datum[0];
		return $datumZaIspis;
	}

	

	/*if (!empty($pretragaBrojKartice) || !empty($pretragaDatum) || !empty($pretragaKorisnik) || !empty($pretragaBrojTelefona) || !empty($pretragaAsset) || !empty($pretragaAdresa) || !empty($pretragaKontakt) || !empty($pretragaDslam) || !empty($pretragaPort) || !empty($pretragaMr) || !empty($pretragaPP) || !empty($pretragaSerijski)) {*/
		

		if (!empty($pretragaBrojKartice) || !empty($pretragaDatum) || !empty($pretragaKorisnik) || !empty($pretragaBrojTelefona) || !empty($pretragaAsset) || !empty($pretragaAdresa) || !empty($pretragaKontakt)) {
			$pretragaZadaciQuery = "SELECT `broj_kartice`, `datum`, `zadatak`, `korisnik`, `broj_telefona`, `asset`, `adresa`, `kontakt`, `zabiljeska`, `user` FROM `zadaci` WHERE (`user` = '$user' && ((`broj_kartice` = '$pretragaBrojKartice') || (`datum` = '$datumBaza') || (`korisnik` = '$pretragaKorisnik') || (`broj_telefona` = '$pretragaBrojTelefona') || (`asset` = '$pretragaAsset') || (`adresa` = '$pretragaAdresa') || (`kontakt` = '$pretragaKontakt')))";
			$pretragaZadaci = mysql_query($pretragaZadaciQuery) or die(mysql_error());

			if ($pretragaZadaci) {
		
				echo '<table border="1" collapse="collapse" cellpadding="50" align="center">';
				echo '<td align="center"></td>';
				echo '<th>Broj kartice</th>';
				echo '<th>Datum</th>';
				echo '<th>Zadatak</th>';
				echo '<th>Korisnik</th>';
				echo '<th>Broj telefona</th>';
				echo '<th>Asset</th>';
				echo '<th>Adresa</th>';
				echo '<th>Kontakt</th>';
				echo '<th>Zabiljeska</th></tr>';
			}

			while ($podaci=mysql_fetch_array($pretragaZadaci)) {

				//datum
				$datumIspis = datumZaIspis($podaci["datum"]);

				echo "<form name=form method=post action=pregled.php>";
				echo "<tr><td>"."<input type=hidden name=hidden value=".$podaci['broj_kartice']." </td>";
				echo '<td class="podatak">'.$podaci["broj_kartice"].'</td>';
				echo '<td class="podatak">'.$datumIspis.'</td>';
				echo '<td class="podatak">'.$podaci["zadatak"].'</td>';
				echo '<td class="podatak">'.$podaci["korisnik"].'</td>';
				echo '<td class="podatak">'.$podaci["broj_telefona"].'</td>';
				echo '<td class="podatak">'.$podaci["asset"].'</td>';
				echo '<td class="podatak">'.$podaci["adresa"].'</td>';
				echo '<td class="podatak">'.$podaci["kontakt"].'</td>';
				echo '<td class="podatak">'.$podaci["zabiljeska"].'</td>';
				echo '<td align="center"><button type="submit" name="pregled" value="Pregled">Pregled</button></td></tr>';
				echo "</form>";
			

			}

	 		echo '</table>';


		}elseif (!empty($pretragaDslam) || !empty($pretragaPort) || !empty($pretragaMr)) {
			
			
			$pretragaDslamQuery = "SELECT aktivni_dslam, aktivni_port, aktivni_mr, aktivna_pozicija, user FROM dslam_aktivni WHERE (`user` = '$user' && (`aktivni_dslam` = '$pretragaDslam' && (`aktivni_port` = '$pretragaPort' || `aktivni_mr` = '$pretragaMr')))";
			$pretraga = mysql_query($pretragaDslamQuery) or die(mysql_error());

			$podaci = mysql_fetch_array($pretraga);
			$aktivniDslam = $podaci["aktivni_dslam"];
			$aktivniPort = $podaci["aktivni_port"];
			$aktivniMr = $podaci["aktivni_mr"];
			if ($aktivniDslam == $pretragaDslam && ($aktivniPort == $pretragaPort || $aktivniMr == $pretragaMr)) {
				
				$pretragaQuery = "SELECT * FROM `zadaci`, `dslam_aktivni` WHERE (zadaci.user = dslam_aktivni.user && (zadaci.broj_kartice = dslam_aktivni.broj_kartice && dslam_aktivni.aktivni_dslam = '$pretragaDslam' && (dslam_aktivni.aktivni_port = '$pretragaPort' || dslam_aktivni.aktivni_mr = '$pretragaMr')))";
				$pretraga = mysql_query($pretragaQuery) or die(mysql_error());


				echo '<table border="1" cellpadding="7" align="center">';
				echo '<tr><td align="center"></td>';
				echo '<th>Broj kartice</th>';
				echo '<th>Datum</th>';
				echo '<th>Zadatak</th>';
				echo '<th>Korisnik</th>';
				echo '<th>Broj telefona</th>';
				echo '<th>Asset</th>';
				echo '<th>Adresa</th>';
				echo '<th>Kontakt</th>';
				echo '<th>Zabilješka</th></tr>';

				while ($podaciNovo = mysql_fetch_array($pretraga)) {
					//datum
					$datumIspis = datumZaIspis($podaciNovo["datum"]);

					echo "<form name=form method=post action=pregled.php>";
					echo "<tr><td>"."<input type=hidden name=hidden value=".$podaciNovo["broj_kartice"]." </td>";
					echo '<td class="podatak">'.$podaciNovo["broj_kartice"].'</td>';
					echo '<td class="podatak">'.$datumIspis.'</td>';
					echo '<td class="podatak">'.$podaciNovo["zadatak"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["korisnik"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["broj_telefona"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["asset"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["adresa"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["kontakt"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["zabiljeska"].'</td>';
					echo '<td align="center"><button type="submit" name="pregled" value="Pregled">Pregled</button></td></tr>';
					echo "</form>";
				}// end while parica_aktivna

				echo '</table>';


			}// end if odabrana parica
			else {

				$pretragaDslamQuery = "SELECT stari_dslam, stari_port, stari_mr, novi_dslam, novi_port, novi_mr, user FROM `dslam` WHERE (`user` = '$user' && ((`stari_dslam` = '$pretragaDslam' && (`stari_port` = '$pretragaPort' || `stari_mr` = '$pretragaMr')) || ( `novi_dslam` = '$pretragaDslam' && (`novi_port` = '$pretragaPort' || `novi_mr` = '$pretragaMr'))))";
				$pretraga = mysql_query($pretragaDslamQuery) or die(mysql_error());

				$podaci = mysql_fetch_array($pretraga);
				$stariDslam = $podaci["stari_dslam"];
				$stariPort = $podaci["stari_port"];
				$stariMr = $podaci["stari_mr"];
				$noviDslam = $podaci["novi_dslam"];
				$noviPort = $podaci["novi_port"];
				$noviMr = $podaci["novi_mr"];

				if (($stariDslam = $pretragaDslam && $stariPort = $pretragaPort || $stariMr = $pretragaMr) || ( $noviDslam = $pretragaDslam && $noviPort = $pretragaPort || $noviMr = $pretragaMr)) {

					$pretragaQuery = "SELECT * FROM `zadaci`, `dslam` WHERE (zadaci.user = dslam.user && (zadaci.broj_kartice = dslam.broj_kartice && ((dslam.stari_dslam = '$pretragaDslam' && (dslam.stari_port = '$pretragaPort' || dslam.stari_mr = '$pretragaMr')) || ( dslam.novi_dslam = '$pretragaDslam' && (dslam.novi_port = '$pretragaPort' || dslam.novi_mr = '$pretragaMr')))))";
					$pretraga = mysql_query($pretragaQuery) or die(mysql_error());

					echo '<table border="1" cellpadding="7" align="center">';
					echo '<tr><td align="center"></td>';
					echo '<th>Broj kartice</th>';
					echo '<th>Datum</th>';
					echo '<th>Zadatak</th>';
					echo '<th>Korisnik</th>';
					echo '<th>Broj telefona</th>';
					echo '<th>Asset</th>';
					echo '<th>Adresa</th>';
					echo '<th>Kontakt</th>';
					echo '<th>Zabilješka</th></tr>';

				while ($podaciNovo = mysql_fetch_array($pretraga)) {
					//datum
					$datumIspis = datumZaIspis($podaciNovo["datum"]);

					echo "<form name=form method=post action=pregled.php>";
					echo "<tr><td>"."<input type=hidden name=hidden value=".$podaciNovo["broj_kartice"]." </td>";
					echo '<td class="podatak">'.$podaciNovo["broj_kartice"].'</td>';
					echo '<td class="podatak">'.$datumIspis.'</td>';
					echo '<td class="podatak">'.$podaciNovo["zadatak"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["korisnik"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["broj_telefona"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["asset"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["adresa"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["kontakt"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["zabiljeska"].'</td>';
					echo '<td align="center"><button type="submit" name="pregled" value="Pregled">Pregled</button></td></tr>';
					echo "</form>";
				}// end while stara/nova parica

				echo '</table>';

				}

			}//else

















			/*$pretragaDslamQuery = "SELECT broj_kartice, aktivni_dslam, aktivni_port, aktivni_mr, aktivna_pozicija, novi_dslam, novi_port, novi_mr, nova_pozcicija, stari_dslam, stari_port, stari_mr, stara_pozcija FROM `dslam`, `dslam_aktivni` WHERE (dslam_aktivni.aktivni_dslam = '$pretragaDslam' && (dslam_aktivni.aktivni_port = '$pretragaPort' || dslam_aktivni.aktivni_mr = '$pretragaMr')) || (dslam.stari_dslam = '$pretragaDslam' && (dslam.stari_port = '$pretragaPort' || dslam.stari_mr = '$pretragaMr')) || (dslam.novi_dslam = '$pretragaDslam' && (dslam.novi_port = '$pretragaPort' || dslam.novi_mr = '$pretragaMr'))";
			$pretragaDslamPozicija = mysql_query($pretragaDslamPozicija) or die(mysql_error());

			if ($pretragaDslamPozicija) {
				$pretragaDslamZadaciQuery = "SELECT broj_kartice, zadatak, korisnik, broj_telefona, asset, adresa, kontakt, zabiljeska FROM `zadaci`, `dslam`,`dslam_aktivni` WHERE zadaci.broj_kartice = dslam.broj_kartice || zadaci.broj_kartice = dslam_aktivni.broj_kartice";
				
				$pretragaDslamZadaci = mysql_query($pretragaDslamZadaciQuery) or die(mysql_error());

				echo '<table cellpadding ="7" border="1" align="center">';
				echo '<td align="center"></td>';
				echo '<td align="center">Broj kartice</td>';
				echo '<td align="center">Datum</td>';
				echo '<td align="center">Zadatak</td>';
				echo '<td align="center">Korisnik</td>';
				echo '<td align="center">Broj telefona</td>';
				echo '<td align="center">Asset</td>';
				echo '<td align="center">Adresa</td>';
				echo '<td align="center">Kontakt</td>';
				echo '<td align="center">Zabiljeska</td></tr>';

				while ($podaci=mysql_fetch_array($pretragaDslamZadaci)) {

					//datum
					$datumIspis = datumZaIspis($podaci["datum"]);

					echo "<form name=form method=post action=pregled.php>";
					echo "<tr><td>"."<input type=hidden name=hidden value=".$podaci['broj_kartice']." </td>";
					echo '<td align="center">'.$podaci["broj_kartice"].'</td>';
					echo '<td align="center">'.$datumIspis.'</td>';
					echo '<td align="center">'.$podaci["zadatak"].'</td>';
					echo '<td align="center">'.$podaci["korisnik"].'</td>';
					echo '<td align="center">'.$podaci["broj_telefona"].'</td>';
					echo '<td align="center">'.$podaci["asset"].'</td>';
					echo '<td align="center">'.$podaci["adresa"].'</td>';
					echo '<td align="center">'.$podaci["kontakt"].'</td>';
					echo '<td align="center">'.$podaci["zabiljeska"].'</td>';
					echo '<td align="center"><button type="submit" name="pregled" value="Pregled">Pregled</button></td></tr>';
					echo "</form>";
			

				}

	 			echo '</table>';

			}*/


		}elseif (!empty($pretragaPP) || !empty($pretragaPPpozicija)) {
			
			


			$pretragaParicaQuery = "SELECT aktivna_pp, aktivna_pp_pozicija, user FROM parica_aktivna WHERE (`user` = '$user' && (`aktivna_pp` = '$pretragaPP' && `aktivna_pp_pozicija` = '$pretragaPPpozicija'))";
			$pretragaParica = mysql_query($pretragaParicaQuery) or die(mysql_error());

			$podaci = mysql_fetch_array($pretragaParica);
			$aktivnaParica = $podaci["aktivna_pp"];
			if ($aktivnaParica == $pretragaPP) {
				
				$pretragaQuery = "SELECT * FROM `zadaci`, `parica_aktivna` WHERE (zadaci.user = parica_aktivna.user && (zadaci.broj_kartice = parica_aktivna.broj_kartice && parica_aktivna.aktivna_pp = '$pretragaPP' && parica_aktivna.aktivna_pp_pozicija = '$pretragaPPpozicija'))";
				$pretraga = mysql_query($pretragaQuery) or die(mysql_error());


				echo '<table border="1" cellpadding="7" align="center">';
				echo '<tr><td align="center"></td>';
				echo '<th>Broj kartice</th>';
				echo '<th>Datum</th>';
				echo '<th>Zadatak</th>';
				echo '<th>Korisnik</th>';
				echo '<th>Broj telefona</th>';
				echo '<th>Asset</th>';
				echo '<th>Adresa</th>';
				echo '<th>Kontakt</th>';
				echo '<th>Zabilješka</th></tr>';

				while ($podaciNovo = mysql_fetch_array($pretraga)) {
					//datum
					$datumIspis = datumZaIspis($podaciNovo["datum"]);

					echo "<form name=form method=post action=pregled.php>";
					echo "<tr><td>"."<input type=hidden name=hidden value=".$podaciNovo["broj_kartice"]." </td>";
					echo '<td class="podatak">'.$podaciNovo["broj_kartice"].'</td>';
					echo '<td class="podatak">'.$datumIspis.'</td>';
					echo '<td class="podatak">'.$podaciNovo["zadatak"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["korisnik"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["broj_telefona"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["asset"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["adresa"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["kontakt"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["zabiljeska"].'</td>';
					echo '<td align="center"><button type="submit" name="pregled" value="Pregled">Pregled</button></td></tr>';
					echo "</form>";
				}// end while parica_aktivna

				echo '</table>';


			}// end if odabrana parica
			else {

				$PPquery = "SELECT nova_pp, stara_pp, user, nova_pp_pozicija, stara_pp_pozicija FROM `parica` WHERE (`user` = '$user' && ((`nova_pp` = '$pretragaPP' && `nova_pp_pozicija` = '$pretragaPPpozicija') OR (`stara_pp` = '$pretragaPP' && `stara_pp_pozicija` = '$pretragaPPpozicija')))";
				$PP = mysql_query($PPquery) or die(mysql_error());

				$parica = mysql_fetch_array($PP);
				$staraParica = $parica["stara_pp"];
				$novaParica = $parica["nova_pp"];

				if ($pretragaPP == $staraParica || $pretragaPP == $novaParica) {
					$pretragaQuery = "SELECT * FROM `zadaci`, `parica` WHERE (parica.user = zadaci.user && (zadaci.broj_kartice = parica.broj_kartice && ((parica.stara_pp = '$pretragaPP' && parica.stara_pp_pozicija = '$pretragaPPpozicija') || (parica.nova_pp = '$pretragaPP' && parica.nova_pp_pozicija = '$pretragaPPpozicija'))))";
					$pretraga = mysql_query($pretragaQuery) or die(mysql_error());

					echo '<table border="1" cellpadding="7" align="center">';
					echo '<tr><td align="center"></td>';
					echo '<th>Broj kartice</th>';
					echo '<th>Datum</th>';
					echo '<th>Zadatak</th>';
					echo '<th>Korisnik</th>';
					echo '<th>Broj telefona</th>';
					echo '<th>Asset</th>';
					echo '<th>Adresa</th>';
					echo '<th>Kontakt</th>';
					echo '<th>Zabilješka</th></tr>';

				while ($podaciNovo = mysql_fetch_array($pretraga)) {
					//datum
					$datumIspis = datumZaIspis($podaciNovo["datum"]);

					echo "<form name=form method=post action=pregled.php>";
					echo "<tr><td>"."<input type=hidden name=hidden value=".$podaciNovo["broj_kartice"]." </td>";
					echo '<td class="podatak">'.$podaciNovo["broj_kartice"].'</td>';
					echo '<td class="podatak">'.$datumIspis.'</td>';
					echo '<td class="podatak">'.$podaciNovo["zadatak"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["korisnik"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["broj_telefona"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["asset"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["adresa"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["kontakt"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["zabiljeska"].'</td>';
					echo '<td align="center"><button type="submit" name="pregled" value="Pregled">Pregled</button></td></tr>';
					echo "</form>";
				}// end while stara/nova parica

				echo '</table>';

				}

			}//else
			

				

		}elseif (!empty($pretragaSerijski)) {

//echo $pretragaSerijski;
			$pretragaOpremaQuery = "SELECT serijski, user FROM ukljucenje WHERE `serijski` = '$pretragaSerijski' && `user` = '$user'";
			$pretragaOprema = mysql_query($pretragaOpremaQuery) or die(mysql_error());

			$podaci = mysql_fetch_array($pretragaOprema);
			$serijski = $podaci["serijski"];
			//echo $serijski;
			
			if ($serijski == $pretragaSerijski) {
				
				$pretragaQuery = "SELECT * FROM `zadaci`, `ukljucenje` WHERE (ukljucenje.user = zadaci.user && (zadaci.broj_kartice = ukljucenje.kartica && ukljucenje.serijski = '$pretragaSerijski'))";
				$pretraga = mysql_query($pretragaQuery) or die(mysql_error());


				echo '<table border="1" cellpadding="7" align="center">';
				echo '<tr><td align="center"></td>';
				echo '<th>Broj kartice</th>';
				echo '<th>Datum</th>';
				echo '<th>Zadatak</th>';
				echo '<th>Korisnik</th>';
				echo '<th>Broj telefona</th>';
				echo '<th>Asset</th>';
				echo '<th>Adresa</th>';
				echo '<th>Kontakt</th>';
				echo '<th>Zabilješka</th></tr>';
				

				while ($podaciNovo = mysql_fetch_array($pretraga)) {
					//datum
					$datumIspis = datumZaIspis($podaciNovo["datum"]);

					echo "<form name=form method=post action=pregled.php>";
					echo "<tr><td>"."<input type=hidden name=hidden value=".$podaciNovo["broj_kartice"]." </td>";
					echo '<td class="podatak">'.$podaciNovo["broj_kartice"].'</td>';
					echo '<td class="podatak">'.$datumIspis.'</td>';
					echo '<td class="podatak">'.$podaciNovo["zadatak"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["korisnik"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["broj_telefona"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["asset"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["adresa"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["kontakt"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["zabiljeska"].'</td>';
					echo '<td align="center"><button type="submit" name="pregled" value="Pregled">Pregled</button></td></tr>';
					echo "</form>";
				}// end while parica_aktivna

				echo '</table>';


			}// end if serijskiUpis
			else {

				$serijskiQuery = "SELECT `serijski_postavljene`, `serijski_preuzete`, `user` FROM `oprema` WHERE (`user` = '$user' && (`serijski_postavljene` = '$pretragaSerijski' || `serijski_preuzete` = '$pretragaSerijski'))";
				$serijski = mysql_query($serijskiQuery) or die(mysql_error());

				$SerijskiBroj = mysql_fetch_array($serijski);
				$serijskiPreuzete = $SerijskiBroj["serijski_preuzete"];
				$serijskiPostavljene = $SerijskiBroj["serijski_postavljene"];

				if ($pretragaSerijski == $serijskiPreuzete || $pretragaSerijski == $serijskiPostavljene) {
					$pretragaQuery = "SELECT * FROM `zadaci`, `oprema` WHERE (zadaci.user = oprema.user && (zadaci.broj_kartice = oprema.broj_kartice && (oprema.serijski_postavljene = '$pretragaSerijski' || oprema.serijski_preuzete = '$pretragaSerijski')))";
					$pretraga = mysql_query($pretragaQuery) or die(mysql_error());

					echo '<table border="1" cellpadding="7" align="center">';
					echo '<tr><td align="center"></td>';
					echo '<th>Broj kartice</th>';
					echo '<th>Datum</th>';
					echo '<th>Zadatak</th>';
					echo '<th>Korisnik</th>';
					echo '<th>Broj telefona</th>';
					echo '<th>Asset</th>';
					echo '<th>Adresa</th>';
					echo '<th>Kontakt</th>';
					echo '<th>Zabilješka</th></tr>';

				while ($podaciNovo = mysql_fetch_array($pretraga)) {
					//datum
					$datumIspis = datumZaIspis($podaciNovo["datum"]);

					echo "<form name=form method=post action=pregled.php>";
					echo "<tr><td>"."<input type=hidden name=hidden value=".$podaciNovo["broj_kartice"]." </td>";
					echo '<td class="podatak">'.$podaciNovo["broj_kartice"].'</td>';
					echo '<td class="podatak">'.$datumIspis.'</td>';
					echo '<td class="podatak">'.$podaciNovo["zadatak"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["korisnik"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["broj_telefona"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["asset"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["adresa"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["kontakt"].'</td>';
					echo '<td class="podatak">'.$podaciNovo["zabiljeska"].'</td>';
					echo '<td align="center"><button type="submit" name="pregled" value="Pregled">Pregled</button></td></tr>';
					echo "</form>";
				}/// end while stara/nova parica

				echo '</table>';

				}

			}//else
			






			
			

		}// kraj elseif();
	


		

	//}// kraj !empty veliki
	/*else
		echo '<h2>Nisu uneseni podaci za pretragu.</h2><br />';
		echo "<form method=post>";
		echo '<br /><button name="pocetna" formaction="index.php">Početna</button>';
		echo '<button name="nazad" formaction="pretraga.php">Nazad</button>';
		echo "</form>";*/

?>
</div>
</div>

</body>
<footer class="footer_ispis">
	<p class="footer">Copyright &copy Alojzije Mirković</p>
	<p class="footer"> Sva prava pridržana</p>
</footer>
</html>
<?php
}else{
	include 'login.php';
}
?>