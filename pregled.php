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
		<?php
			$hidden = $_POST["hidden"];
			$da = da;
			$ne = ne;

		// ------------------------------------------ UPDATE ---------------------------------------------//

			// update zadaci, parica, oprema,dslam
			if (isset($_POST["update1"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParica = mysql_query("UPDATE `parica` SET `broj_kartice`='$_POST[broj_kartice]', `stara_pp`='$_POST[stara_pp]', `stara_pp_pozicija`='$_POST[stara_pp_pozicija]', `nova_pp`='$_POST[nova_pp]', `nova_pp_pozicija`='$_POST[nova_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslam = mysql_query("UPDATE dslam SET `broj_kartice`='$_POST[broj_kartice]', `novi_dslam`='$_POST[novi_dslam]', `novi_port`='$_POST[novi_port]', `novi_mr`='$_POST[novi_mr]', `nova_pozicija`='$_POST[nova_pozicija]', `stari_dslam`='$_POST[stari_dslam]', `stari_port`='$_POST[stari_port]', `stari_mr`='$_POST[stari_mr]', `stara_pozicija`='$_POST[stara_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateOprema = mysql_query("UPDATE oprema SET `broj_kartice`='$_POST[broj_kartice]', `tip_preuzete`='$_POST[tip_preuzete]', `model_preuzete`='$_POST[model_preuzete]' `serijski_preuzete`='$_POST[serijski_preuzete]', `kompanija_preuzete`='$_POST[kompanija_preuzete]', `tip_postavljene`='$_POST[tip_postavljene]', `model_postavljene`='$_POST[model_postavljene]', `serijski_postavljene`='$_POST[serijski_postavljene]', `kompanija_postavljene`='$_POST[kompanija_postavljene]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());

				if ($updateZadaci && $updateParica && $updateDslam && $updateOprema) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj update zadaci, parica, oprema,dslam

			// UPDATE zadaci, parica, oprema
			if (isset($_POST["update2"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParica = mysql_query("UPDATE `parica` SET `broj_kartice`='$_POST[broj_kartice]', `stara_pp`='$_POST[stara_pp]', `stara_pp_pozicija`='$_POST[stara_pp_pozicija]', `nova_pp`='$_POST[nova_pp]', `nova_pp_pozicija`='$_POST[nova_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateOprema = mysql_query("UPDATE oprema SET `broj_kartice`='$_POST[broj_kartice]', `tip_preuzete`='$_POST[tip_preuzete]', `model_preuzete`='$_POST[model_preuzete]' `serijski_preuzete`='$_POST[serijski_preuzete]', `kompanija_preuzete`='$_POST[kompanija_preuzete]', `tip_postavljene`='$_POST[tip_postavljene]', `model_postavljene`='$_POST[model_postavljene]', `serijski_postavljene`='$_POST[serijski_postavljene]', `kompanija_postavljene`='$_POST[kompanija_postavljene]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				
				if ($updateZadaci && $updateParica && $updateOprema) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica, oprema

			// UPDATE zadaci, oprema, dslam
			if (isset($_POST["update3"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateOprema = mysql_query("UPDATE oprema SET `broj_kartice`='$_POST[broj_kartice]', `tip_preuzete`='$_POST[tip_preuzete]', `model_preuzete`='$_POST[model_preuzete]' `serijski_preuzete`='$_POST[serijski_preuzete]', `kompanija_preuzete`='$_POST[kompanija_preuzete]', `tip_postavljene`='$_POST[tip_postavljene]', `model_postavljene`='$_POST[model_postavljene]', `serijski_postavljene`='$_POST[serijski_postavljene]', `kompanija_postavljene`='$_POST[kompanija_postavljene]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslam = mysql_query("UPDATE dslam SET `broj_kartice`='$_POST[broj_kartice]', `novi_dslam`='$_POST[novi_dslam]', `novi_port`='$_POST[novi_port]', `novi_mr`='$_POST[novi_mr]', `nova_pozicija`='$_POST[nova_pozicija]', `stari_dslam`='$_POST[stari_dslam]', `stari_port`='$_POST[stari_port]', `stari_mr`='$_POST[stari_mr]', `stara_pozicija`='$_POST[stara_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateDslam && $updateOprema) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, oprema, dslam

			// UPDATE zadaci, oprema

			if (isset($_POST["update4"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateOprema = mysql_query("UPDATE oprema SET `broj_kartice`='$_POST[broj_kartice]', `tip_preuzete`='$_POST[tip_preuzete]', `model_preuzete`='$_POST[model_preuzete]' `serijski_preuzete`='$_POST[serijski_preuzete]', `kompanija_preuzete`='$_POST[kompanija_preuzete]', `tip_postavljene`='$_POST[tip_postavljene]', `model_postavljene`='$_POST[model_postavljene]', `serijski_postavljene`='$_POST[serijski_postavljene]', `kompanija_postavljene`='$_POST[kompanija_postavljene]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());

				if ($updateZadaci && $updateOprema) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, oprema

			// UPDATAE zadaci, parica, dslam

			if (isset($_POST["update5"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParica = mysql_query("UPDATE `parica` SET `broj_kartice`='$_POST[broj_kartice]', `stara_pp`='$_POST[stara_pp]', `stara_pp_pozicija`='$_POST[stara_pp_pozicija]', `nova_pp`='$_POST[nova_pp]', `nova_pp_pozicija`='$_POST[nova_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslam = mysql_query("UPDATE dslam SET `broj_kartice`='$_POST[broj_kartice]', `novi_dslam`='$_POST[novi_dslam]', `novi_port`='$_POST[novi_port]', `novi_mr`='$_POST[novi_mr]', `nova_pozicija`='$_POST[nova_pozicija]', `stari_dslam`='$_POST[stari_dslam]', `stari_port`='$_POST[stari_port]', `stari_mr`='$_POST[stari_mr]', `stara_pozicija`='$_POST[stara_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());

				if ($updateZadaci && $updateParica && $updateDslam) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATAE zadaci, parica,dslam

			// UPDATE zadaci, parica
			if (isset($_POST["update6"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParica = mysql_query("UPDATE `parica` SET `broj_kartice`='$_POST[broj_kartice]', `stara_pp`='$_POST[stara_pp]', `stara_pp_pozicija`='$_POST[stara_pp_pozicija]', `nova_pp`='$_POST[nova_pp]', `nova_pp_pozicija`='$_POST[nova_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());

				if ($updateZadaci && $updateParica) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica

			// UPDATE zadaci, dslam
			if (isset($_POST["update7"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslam = mysql_query("UPDATE dslam SET `broj_kartice`='$_POST[broj_kartice]', `novi_dslam`='$_POST[novi_dslam]', `novi_port`='$_POST[novi_port]', `novi_mr`='$_POST[novi_mr]', `nova_pozicija`='$_POST[nova_pozicija]', `stari_dslam`='$_POST[stari_dslam]', `stari_port`='$_POST[stari_port]', `stari_mr`='$_POST[stari_mr]', `stara_pozicija`='$_POST[stara_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				
				if ($updateZadaci && $updateDslam) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, dslam

			// UPDATE zadaci
			if (isset($_POST["update8"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$update=mysql_query($updateQuery) or die(mysql_error());
				
				if ($updateZadaci) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci

			// UPDATE zadaci, parica_aktivna
			if (isset($_POST["update9"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParicaAktivna = mysql_query("UPDATE `parica_aktivna` SET `broj_kartice`='$_POST[broj_kartice]', `aktivna_pp`='$_POST[aktivna_pp]', `aktivna_pp_pozicija`='$_POST[aktivna_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateParicaAktivna) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica_aktivna

			// UPDATE zadaci, dslam_aktivni
			if (isset($_POST["update10"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslamAktivni = mysql_query("UPDATE `dslam_aktivni` SET `broj_kartice`='$_POST[broj_kartice]', `aktivni_dslam`='$_POST[aktivni_dslam]', `aktivni_port`='$_POST[aktivni_port]', `aktivni_mr`='$_POST[aktivni_mr]', `aktivna_pozicija`='$_POST[aktivna_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateDslamAktivni && $updateZadaci) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, dslam_aktivni

			// UPDATE zadaci, dslam_aktivni, parica
			if (isset($_POST["update11"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslamAktivni = mysql_query("UPDATE `dslam_aktivni` SET `broj_kartice`='$_POST[broj_kartice]', `aktivni_dslam`='$_POST[aktivni_dslam]', `aktivni_port`='$_POST[aktivni_port]', `aktivni_mr`='$_POST[aktivni_mr]', `aktivna_pozicija`='$_POST[aktivna_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParica = mysql_query("UPDATE `parica` SET `broj_kartice`='$_POST[broj_kartice]', `stara_pp`='$_POST[stara_pp]', `stara_pp_pozicija`='$_POST[stara_pp_pozicija]', `nova_pp`='$_POST[nova_pp]', `nova_pp_pozicija`='$_POST[nova_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateDslamAktivni && $updateZadaci && $updateParica) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, dslam_aktivni, parica

			// UPDATE zadaci, parica_aktivna, dslam_aktivni
			if (isset($_POST["update12"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslamAktivni = mysql_query("UPDATE `dslam_aktivni` SET `broj_kartice`='$_POST[broj_kartice]', `aktivni_dslam`='$_POST[aktivni_dslam]', `aktivni_port`='$_POST[aktivni_port]', `aktivni_mr`='$_POST[aktivni_mr]', `aktivna_pozicija`='$_POST[aktivna_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParicaAktivna = mysql_query("UPDATE `parica_aktivna` SET `broj_kartice`='$_POST[broj_kartice]', `aktivna_pp`='$_POST[aktivna_pp]', `aktivna_pp_pozicija`='$_POST[aktivna_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateDslamAktivni && $updateZadaci && $updateParicaAktivna) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica_aktivna, dslam_aktivni

			// UPDATE zadaci, parica_aktivna, dslam
			if (isset($_POST["update13"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParicaAktivna = mysql_query("UPDATE `parica_aktivna` SET `broj_kartice`='$_POST[broj_kartice]', `aktivna_pp`='$_POST[aktivna_pp]', `aktivna_pp_pozicija`='$_POST[aktivna_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslam = mysql_query("UPDATE dslam SET `broj_kartice`='$_POST[broj_kartice]', `novi_dslam`='$_POST[novi_dslam]', `novi_port`='$_POST[novi_port]', `novi_mr`='$_POST[novi_mr]', `nova_pozicija`='$_POST[nova_pozicija]', `stari_dslam`='$_POST[stari_dslam]', `stari_port`='$_POST[stari_port]', `stari_mr`='$_POST[stari_mr]', `stara_pozicija`='$_POST[stara_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateDslam && $updateZadaci && $updateParicaAktivna) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica_aktivna, dslam

			// UPDATE zadaci, parica_aktivna, dslam, oprema
			if (isset($_POST["update14"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParicaAktivna = mysql_query("UPDATE `parica_aktivna` SET `broj_kartice`='$_POST[broj_kartice]', `aktivna_pp`='$_POST[aktivna_pp]', `aktivna_pp_pozicija`='$_POST[aktivna_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslam = mysql_query("UPDATE dslam SET `broj_kartice`='$_POST[broj_kartice]', `novi_dslam`='$_POST[novi_dslam]', `novi_port`='$_POST[novi_port]', `novi_mr`='$_POST[novi_mr]', `nova_pozicija`='$_POST[nova_pozicija]', `stari_dslam`='$_POST[stari_dslam]', `stari_port`='$_POST[stari_port]', `stari_mr`='$_POST[stari_mr]', `stara_pozicija`='$_POST[stara_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateOprema = mysql_query("UPDATE oprema SET `broj_kartice`='$_POST[broj_kartice]', `tip_preuzete`='$_POST[tip_preuzete]', `model_preuzete`='$_POST[model_preuzete]' `serijski_preuzete`='$_POST[serijski_preuzete]', `kompanija_preuzete`='$_POST[kompanija_preuzete]', `tip_postavljene`='$_POST[tip_postavljene]', `model_postavljene`='$_POST[model_postavljene]', `serijski_postavljene`='$_POST[serijski_postavljene]', `kompanija_postavljene`='$_POST[kompanija_postavljene]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateDslam && $updateZadaci && $updateParicaAktivna && $updateOprema) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica_aktivna, dslam, oprema

			// UPDATE zadaci, parica, dslam_aktivni, oprema
			if (isset($_POST["update15"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslamAktivni = mysql_query("UPDATE `dslam_aktivni` SET `broj_kartice`='$_POST[broj_kartice]', `aktivni_dslam`='$_POST[aktivni_dslam]', `aktivni_port`='$_POST[aktivni_port]', `aktivni_mr`='$_POST[aktivni_mr]', `aktivna_pozicija`='$_POST[aktivna_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParica = mysql_query("UPDATE `parica` SET `broj_kartice`='$_POST[broj_kartice]', `stara_pp`='$_POST[stara_pp]', `stara_pp_pozicija`='$_POST[stara_pp_pozicija]', `nova_pp`='$_POST[nova_pp]', `nova_pp_pozicija`='$_POST[nova_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateOprema = mysql_query("UPDATE oprema SET `broj_kartice`='$_POST[broj_kartice]', `tip_preuzete`='$_POST[tip_preuzete]', `model_preuzete`='$_POST[model_preuzete]' `serijski_preuzete`='$_POST[serijski_preuzete]', `kompanija_preuzete`='$_POST[kompanija_preuzete]', `tip_postavljene`='$_POST[tip_postavljene]', `model_postavljene`='$_POST[model_postavljene]', `serijski_postavljene`='$_POST[serijski_postavljene]', `kompanija_postavljene`='$_POST[kompanija_postavljene]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateDslamAktivni && $updateZadaci && $updateParica && $updateOprema) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica, dslam_aktivni, oprema

			// UPDATE zadaci, parica_aktivna, oprema
			if (isset($_POST["update16"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateOprema = mysql_query("UPDATE oprema SET `broj_kartice`='$_POST[broj_kartice]', `tip_preuzete`='$_POST[tip_preuzete]', `model_preuzete`='$_POST[model_preuzete]' `serijski_preuzete`='$_POST[serijski_preuzete]', `kompanija_preuzete`='$_POST[kompanija_preuzete]', `tip_postavljene`='$_POST[tip_postavljene]', `model_postavljene`='$_POST[model_postavljene]', `serijski_postavljene`='$_POST[serijski_postavljene]', `kompanija_postavljene`='$_POST[kompanija_postavljene]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParicaAktivna = mysql_query("UPDATE `parica_aktivna` SET `broj_kartice`='$_POST[broj_kartice]', `aktivna_pp`='$_POST[aktivna_pp]', `aktivna_pp_pozicija`='$_POST[aktivna_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateParicaAktivna && $updateOprema) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica_aktivna, oprema

			// UPDATE zadaci, dslam_aktivni, oprema
			if (isset($_POST["update17"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateOprema = mysql_query("UPDATE oprema SET `broj_kartice`='$_POST[broj_kartice]', `tip_preuzete`='$_POST[tip_preuzete]', `model_preuzete`='$_POST[model_preuzete]' `serijski_preuzete`='$_POST[serijski_preuzete]', `kompanija_preuzete`='$_POST[kompanija_preuzete]', `tip_postavljene`='$_POST[tip_postavljene]', `model_postavljene`='$_POST[model_postavljene]', `serijski_postavljene`='$_POST[serijski_postavljene]', `kompanija_postavljene`='$_POST[kompanija_postavljene]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslamAktivni = mysql_query("UPDATE `dslam_aktivni` SET `broj_kartice`='$_POST[broj_kartice]', `aktivni_dslam`='$_POST[aktivni_dslam]', `aktivni_port`='$_POST[aktivni_port]', `aktivni_mr`='$_POST[aktivni_mr]', `aktivna_pozicija`='$_POST[aktivna_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateDslamAktivni && $updateOprema) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, dslam_aktivni, oprema

			// UPDATE zadaci, parica_aktivna, dslam_aktivni, ukljucenje
			if (isset($_POST["update18"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslamAktivni = mysql_query("UPDATE `dslam_aktivni` SET `broj_kartice`='$_POST[broj_kartice]', `aktivni_dslam`='$_POST[aktivni_dslam]', `aktivni_port`='$_POST[aktivni_port]', `aktivni_mr`='$_POST[aktivni_mr]', `aktivna_pozicija`='$_POST[aktivna_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParicaAktivna = mysql_query("UPDATE `parica_aktivna` SET `broj_kartice`='$_POST[broj_kartice]', `aktivna_pp`='$_POST[aktivna_pp]', `aktivna_pp_pozicija`='$_POST[aktivna_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateUkljucenje = mysql_query("UPDATE `ukljucenje` SET `kartica`='$_POST[broj_kartice]', `tip`='$_POST[tip_postavljene]', `model`='$_POST[model_postavljene]', `serijski`='$_POST[serijski_postavljene]', `kompanija`='$_POST[kompanija_postavljene]' WHERE `kartica`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateDslamAktivni && $updateParicaAktivna && $updateUkljucenje) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica_aktivna, dslam_aktivni, ukljucenje

			// UPDATE zadaci, parica_aktivna, dslam_aktivni, oprema
			if (isset($_POST["update19"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateDslamAktivni = mysql_query("UPDATE `dslam_aktivni` SET `broj_kartice`='$_POST[broj_kartice]', `aktivni_dslam`='$_POST[aktivni_dslam]', `aktivni_port`='$_POST[aktivni_port]', `aktivni_mr`='$_POST[aktivni_mr]', `aktivna_pozicija`='$_POST[aktivna_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParicaAktivna = mysql_query("UPDATE `parica_aktivna` SET `broj_kartice`='$_POST[broj_kartice]', `aktivna_pp`='$_POST[aktivna_pp]', `aktivna_pp_pozicija`='$_POST[aktivna_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateOprema = mysql_query("UPDATE oprema SET `broj_kartice`='$_POST[broj_kartice]', `tip_preuzete`='$_POST[tip_preuzete]', `model_preuzete`='$_POST[model_preuzete]' `serijski_preuzete`='$_POST[serijski_preuzete]', `kompanija_preuzete`='$_POST[kompanija_preuzete]', `tip_postavljene`='$_POST[tip_postavljene]', `model_postavljene`='$_POST[model_postavljene]', `serijski_postavljene`='$_POST[serijski_postavljene]', `kompanija_postavljene`='$_POST[kompanija_postavljene]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateDslamAktivni && $updateParicaAktivna && $updateOprema) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica_aktivna, dslam_aktivni, oprema

			// UPDATE zadaci, ukljucenje
			if (isset($_POST["update20"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateUkljucenje = mysql_query("UPDATE `ukljucenje` SET `kartica`='$_POST[broj_kartice]', `tip`='$_POST[tip_postavljene]', `model`='$_POST[model_postavljene]', `serijski`='$_POST[serijski_postavljene]', `kompanija`='$_POST[kompanija_postavljene]' WHERE `kartica`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateUkljucenje) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, ukljucenje

			// UPDATE zadaci, parica_aktivna, ukljucenje
			if (isset($_POST["update21"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParicaAktivna = mysql_query("UPDATE `parica_aktivna` SET `broj_kartice`='$_POST[broj_kartice]', `aktivna_pp`='$_POST[aktivna_pp]', `aktivna_pp_pozicija`='$_POST[aktivna_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateUkljucenje = mysql_query("UPDATE `ukljucenje` SET `kartica`='$_POST[broj_kartice]', `tip`='$_POST[tip_postavljene]', `model`='$_POST[model_postavljene]', `serijski`='$_POST[serijski_postavljene]', `kompanija`='$_POST[kompanija_postavljene]' WHERE `kartica`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateUkljucenje && $updateParicaAktivna) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica_aktivna, ukljucenje

			// UPDATE zadaci, parica, ukljucenje
			if (isset($_POST["update22"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateUkljucenje = mysql_query("UPDATE `ukljucenje` SET `kartica`='$_POST[broj_kartice]', `tip`='$_POST[tip_postavljene]', `model`='$_POST[model_postavljene]', `serijski`='$_POST[serijski_postavljene]', `kompanija`='$_POST[kompanija_postavljene]' WHERE `kartica`='$_POST[hidden]'") or die(mysql_error());
				$updateParica = mysql_query("UPDATE `parica` SET `broj_kartice`='$_POST[broj_kartice]', `stara_pp`='$_POST[stara_pp]', `stara_pp_pozicija`='$_POST[stara_pp_pozicija]', `nova_pp`='$_POST[nova_pp]', `nova_pp_pozicija`='$_POST[nova_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateUkljucenje && $updateParica) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, parica, ukljucenje

			// UPDATE zadaci, ukljucenje, dslam
			if (isset($_POST["update23"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateUkljucenje = mysql_query("UPDATE `ukljucenje` SET `kartica`='$_POST[broj_kartice]', `tip`='$_POST[tip_postavljene]', `model`='$_POST[model_postavljene]', `serijski`='$_POST[serijski_postavljene]', `kompanija`='$_POST[kompanija_postavljene]' WHERE `kartica`='$_POST[hidden]'") or die(mysql_error());
				$updateDslam = mysql_query("UPDATE dslam SET `broj_kartice`='$_POST[broj_kartice]', `novi_dslam`='$_POST[novi_dslam]', `novi_port`='$_POST[novi_port]', `novi_mr`='$_POST[novi_mr]', `nova_pozicija`='$_POST[nova_pozicija]', `stari_dslam`='$_POST[stari_dslam]', `stari_port`='$_POST[stari_port]', `stari_mr`='$_POST[stari_mr]', `stara_pozicija`='$_POST[stara_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateUkljucenje && $updateDslam) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, ukljucenje, dslam

			// UPDATE zadaci, ukljucenje, dslam_aktivni
			if (isset($_POST["update24"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateUkljucenje = mysql_query("UPDATE `ukljucenje` SET `kartica`='$_POST[broj_kartice]', `tip`='$_POST[tip_postavljene]', `model`='$_POST[model_postavljene]', `serijski`='$_POST[serijski_postavljene]', `kompanija`='$_POST[kompanija_postavljene]' WHERE `kartica`='$_POST[hidden]'") or die(mysql_error());
				$updateDslamAktivni = mysql_query("UPDATE `dslam_aktivni` SET `broj_kartice`='$_POST[broj_kartice]', `aktivni_dslam`='$_POST[aktivni_dslam]', `aktivni_port`='$_POST[aktivni_port]', `aktivni_mr`='$_POST[aktivni_mr]', `aktivna_pozicija`='$_POST[aktivna_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateUkljucenje && $updateDslamAktivni) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, ukljucenje, dslam_aktivni

			// UPDATE zadaci, ukljucenje, parica, dslam
			if (isset($_POST["update25"])) {
				$updateZadaci = mysql_query("UPDATE `zadaci` SET `broj_kartice`='$_POST[broj_kartice]', `korisnik`='$_POST[korisnik]', `kontakt`='$_POST[kontakt]', `zadatak`='$_POST[zadatak]', `tip_zadatka`='$_POST[tip_zadatka]', `broj_telefona`='$_POST[broj_telefona]', `asset`='$_POST[asset]', `adresa`='$_POST[adresa]', `zabiljeska`='$_POST[zabiljeska]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateUkljucenje = mysql_query("UPDATE `ukljucenje` SET `kartica`='$_POST[broj_kartice]', `tip`='$_POST[tip_postavljene]', `model`='$_POST[model_postavljene]', `serijski`='$_POST[serijski_postavljene]', `kompanija`='$_POST[kompanija_postavljene]' WHERE `kartica`='$_POST[hidden]'") or die(mysql_error());
				$updateDslam = mysql_query("UPDATE dslam SET `broj_kartice`='$_POST[broj_kartice]', `novi_dslam`='$_POST[novi_dslam]', `novi_port`='$_POST[novi_port]', `novi_mr`='$_POST[novi_mr]', `nova_pozicija`='$_POST[nova_pozicija]', `stari_dslam`='$_POST[stari_dslam]', `stari_port`='$_POST[stari_port]', `stari_mr`='$_POST[stari_mr]', `stara_pozicija`='$_POST[stara_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				$updateParica = mysql_query("UPDATE `parica` SET `broj_kartice`='$_POST[broj_kartice]', `stara_pp`='$_POST[stara_pp]', `stara_pp_pozicija`='$_POST[stara_pp_pozicija]', `nova_pp`='$_POST[nova_pp]', `nova_pp_pozicija`='$_POST[nova_pp_pozicija]' WHERE `broj_kartice`='$_POST[hidden]'") or die(mysql_error());
				if ($updateZadaci && $updateUkljucenje && $updateDslam && $updateParica) {
					/* Redirect browser */
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					/* Make sure that code below does not get executed when we redirect. */
					exit;
				}
			}// kraj UPDATE zadaci, ukljucenje, parica, dslam



		/* ------------------------------------------ BRISANJE -------------------------------------------------*/
			// brisanje zadaci, parica, oprema, dslam
			if (isset($_POST["delete1"])) {
					
					// radi samo u odvojenim upitima
					$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
					$deleteZadaci = mysql_query($deleteZadaciQuery);
					$deleteOpremaQuery = "DELETE FROM oprema WHERE broj_kartice='$_POST[hidden]'";
					$deleteOprema = mysql_query($deleteOpremaQuery) or die(mysql_error());
					$deleteParicaQuery = "DELETE FROM parica WHERE broj_kartice = '$_POST[hidden]'";
					$deleteParica = mysql_query($deleteParicaQuery) or die(mysql_error());
					$deleteDslamQuery = "DELETE FROM dslam WHERE broj_kartice = '$_POST[hidden]'";
					$deleteDslam = mysql_query($deleteDslamQuery) or die(mysql_error());
			
					if ($deleteZadaci && $deleteOprema && $deleteDslam && $deleteParica) {
						echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
						exit;
					}
			}// kraj brisanje zadaci, parica, oprema, dslam

			//brisanje zadaci, parica, oprema
			if (isset($_POST["delete2"])) {
					$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
					$deleteZadaci = mysql_query($deleteZadaciQuery) or die(mysql_error());
					$deleteParicaQuery = "DELETE FROM parica WHERE broj_kartice = '$_POST[hidden]'";
					$deleteParica = mysql_query($deleteParicaQuery) or die(mysql_error());
					$deleteOpremaQuery = "DELETE FROM oprema WHERE broj_kartice = '$_POST[hidden]'";
					$deleteOprema = mysql_query($deleteOpremaQuery) or die(mysql_error());
			
					if ($deleteZadaci && $deleteParica && $deleteOprema) {
						echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
						exit;
					}
			}// kraj brisanja zadaci, parica, oprema

			// brisanje zadaci, oprema, dslam
			if (isset($_POST["delete3"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamQuery = "DELETE FROM dslam WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslam = mysql_query($deleteDslamQuery) or die(mysql_error());
				$deleteOpremaQuery = "DELETE FROM oprema WHERE broj_kartice = '$_POST[hidden]'";
				$deleteOprema = mysql_query($deleteOpremaQuery) or die(mysql_error());
			
				if ($deleteZadaci && $deleteDslam && $deleteOprema) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj brisanje zadaci, oprema, dslam

			// brisanje oprema i zadaci
			if (isset($_POST["delete4"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteOpremaQuery = "DELETE FROM oprema WHERE broj_kartice = '$_POST[hidden]'";
				$deleteOprema = mysql_query($deleteOpremaQuery) or die(mysql_error());
			
				if ($deleteZadaci && $deleteOprema) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj brisanje oprema i zadaci

			// brisanje dslam, parica i zadaci
			if (isset($_POST["delete5"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteParicaQuery = "DELETE FROM parica WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParica = mysql_query($deleteParicaQuery) or die(mysql_error());
				$deleteDslamQuery = "DELETE FROM dslam WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslam = mysql_query($deleteDslamQuery) or die(mysql_error());
			
				if ($deleteZadaci && $deleteParica && $deleteDslam) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj brisanje dslam, parica i zadaci

			// brisanje zadaci, parica
			if (isset($_POST["delete6"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteParicaQuery = "DELETE FROM parica WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParica = mysql_query($deleteParicaQuery) or die(mysql_error());
			
				if ($deleteZadaci && $deleteParica) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj brisanje zadaci, parica

			// brisanje zadaci, dslam
			if (isset($_POST["delete7"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamQuery = "DELETE FROM dslam WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslam = mysql_query($deleteDslamQuery) or die(mysql_error());
			
				if ($deleteZadaci && $deleteDslam) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj brisanje zadaci, dslam

			// delete zadaci
			if (isset($_POST["delete8"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[broj_kartice]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
						
				if ($deleteZadaci) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj brisanje zadaci

			// delete zadaci, parica_aktivna
			if (isset($_POST["delete9"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteParicaAktivnaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParicaAktivna = mysql_query($deleteParicaAktivnaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteParicaAktivna) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}//kraj // delete zadaci, parica_aktivna

			// delete zadaci, dslam_aktivni
			if (isset($_POST["delete10"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamAktivniQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslamAktivni = mysql_query($deleteDslamAktivniQuery) or die(mysql_error());
				if ($deleteZadaci && $deleteDslamAktivni) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, dslam_aktivni

			// delete zadaci, dslam_aktivni,parica
			if (isset($_POST["delete11"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamAktivniQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslamAktivni = mysql_query($deleteDslamAktivniQuery) or die(mysql_error());
				$deleteParicaQuery = "DELETE FROM parica WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParica = mysql_query($deleteParicaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslamAktivni && $deleteParica) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj zadaci, dslam_aktivni,parica

			// delete zadaci, dslam_aktivni, parica_aktivna
			if (isset($_POST["delete12"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamAktivniQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslamAktivni = mysql_query($deleteDslamAktivniQuery) or die(mysql_error());
				$deleteParicaAktivnaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParicaAktivna = mysql_query($deleteParicaAktivnaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslamAktivni && $deleteParicaAktivna) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}//kraj delete zadaci, dslam_aktivni, parica_aktivna

			//delete zadaci, parica_aktivna, dslam
			if (isset($_POST["delete13"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamQuery = "DELETE FROM dslam WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslam = mysql_query($deleteDslamQuery) or die(mysql_error());
				$deleteParicaAktivnaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParicaAktivna = mysql_query($deleteParicaAktivnaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslam && $deleteParicaAktivna) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, parica_aktivna, dslam

			// delete zadaci, parica_aktivna, dslam, oprema
			if (isset($_POST["delete14"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamQuery = "DELETE FROM dslam WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslam = mysql_query($deleteDslamQuery) or die(mysql_error());
				$deleteParicaAktivnaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParicaAktivna = mysql_query($deleteParicaAktivnaQuery) or die(mysql_error());
				$deleteOpremaQuery = "DELETE FROM oprema WHERE broj_kartice = '$_POST[hidden]'";
				$deleteOprema = mysql_query($deleteOpremaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslam && $deleteParicaAktivna && $deleteOprema) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, parica_aktivna, dslam, oprema

			// delete zadaci, parica, dslam_aktivni, oprema
			if (isset($_POST["delete15"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamAktivniQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslamAktivni = mysql_query($deleteDslamAktivniQuery) or die(mysql_error());
				$deleteParicaQuery = "DELETE FROM paricaWHERE broj_kartice = '$_POST[hidden]'";
				$deleteParica = mysql_query($deleteParicaQuery) or die(mysql_error());
				$deleteOpremaQuery = "DELETE FROM oprema WHERE broj_kartice = '$_POST[hidden]'";
				$deleteOprema = mysql_query($deleteOpremaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslamAktivni && $deleteParica && $deleteOprema) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, parica, dslam_aktivni, oprema

			// delete zadaci, parica_aktivna,oprema
			if (isset($_POST["delete16"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteParicaAktivnaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParicaAktivna = mysql_query($deleteParicaAktivnaQuery) or die(mysql_error());
				$deleteOpremaQuery = "DELETE FROM oprema WHERE broj_kartice = '$_POST[hidden]'";
				$deleteOprema = mysql_query($deleteOpremaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteParicaAktivna && $deleteOprema) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, parica_aktivna,oprema

			// delete zadaci, dslam_aktivni, oprema
			if (isset($_POST["delete17"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamAktivniQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslamAktivni = mysql_query($deleteDslamAktivniQuery) or die(mysql_error());
				$deleteOpremaQuery = "DELETE FROM oprema WHERE broj_kartice = '$_POST[hidden]'";
				$deleteOprema = mysql_query($deleteOpremaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslamAktivni && $deleteOprema) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, dslam_aktivni, oprema

			// delete zadaci, parica_aktivna, dslam_aktivni, ukljucenje
			if (isset($_POST["delete18"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamAktivniQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslamAktivni = mysql_query($deleteDslamAktivniQuery) or die(mysql_error());
				$deleteParicaAktivnaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParicaAktivna = mysql_query($deleteParicaAktivnaQuery) or die(mysql_error());
				$deleteUkljucenjeQuery = "DELETE FROM ukljucenje WHERE kartica = '$_POST[hidden]'";
				$deleteUkljucenje = mysql_query($deleteUkljucenjeQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslamAktivni && $deleteParicaAktivna && $deleteUkljucenje) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, parica_aktivna, dslam_aktivni, ukljucenje

			// delete zadaci, parica_aktivna, dslam_aktivni, oprema
			if (isset($_POST["delete19"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamAktivniQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslamAktivni = mysql_query($deleteDslamAktivniQuery) or die(mysql_error());
				$deleteParicaAktivnaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParicaAktivna = mysql_query($deleteParicaAktivnaQuery) or die(mysql_error());
				$deleteOpremaQuery = "DELETE FROM oprema WHERE broj_kartice = '$_POST[hidden]'";
				$deleteOprema = mysql_query($deleteOpremaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslamAktivni && $deleteParicaAktivna && $deleteOprema) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, parica_aktivna, dslam_aktivni, oprema

			// delete zadaci, ukljucenje
			if (isset($_POST["delete20"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteUkljucenjeQuery = "DELETE FROM ukljucenje WHERE kartica = '$_POST[hidden]'";
				$deleteUkljucenje = mysql_query($deleteUkljucenjeQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteUkljucenje) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, ukljucenje

			// delete zadaci, parica_aktivna, ukljucenje
			if (isset($_POST["delete21"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteParicaAktivnaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParicaAktivna = mysql_query($deleteParicaAktivnaQuery) or die(mysql_error());
				$deleteUkljucenjeQuery = "DELETE FROM ukljucenje WHERE kartica = '$_POST[hidden]'";
				$deleteUkljucenje = mysql_query($deleteUkljucenjeQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteParicaAktivna && $deleteUkljucenje) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, parica_aktivna, ukljucenje

			// delete zadaci, parica, ukljucenje
			if (isset($_POST["delete22"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteParicaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParica = mysql_query($deleteParicaQuery) or die(mysql_error());
				$deleteUkljucenjeQuery = "DELETE FROM ukljucenje WHERE kartica = '$_POST[hidden]'";
				$deleteUkljucenje = mysql_query($deleteUkljucenjeQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteParica && $deleteUkljucenje) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, parica, ukljucenje

			// delete zadaci, dslam, ukljucenje
			if (isset($_POST["delete23"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslam = mysql_query($deleteDslamQuery) or die(mysql_error());
				$deleteUkljucenjeQuery = "DELETE FROM ukljucenje WHERE kartica = '$_POST[hidden]'";
				$deleteUkljucenje = mysql_query($deleteUkljucenjeQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslam && $deleteUkljucenje) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, dslam, ukljucenje

			// delete zadaci, ukljucenje, dslam_aktivni
			if (isset($_POST["delete24"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteDslamAktivniQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslamAktivni = mysql_query($deleteDslamAktivniQuery) or die(mysql_error());
				$deleteUkljucenjeQuery = "DELETE FROM ukljucenje WHERE kartica = '$_POST[hidden]'";
				$deleteUkljucenje = mysql_query($deleteUkljucenjeQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslamAktivni && $deleteUkljucenje) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, ukljucenje, dslam_aktivni

			// delete zadaci, ukljucenje, parica, dslam
			if (isset($_POST["delete23"])) {
				$deleteZadaciQuery = "DELETE FROM zadaci WHERE broj_kartice='$_POST[hidden]'";
				$deleteZadaci = mysql_query($deleteZadaciQuery);
				$deleteUkljucenjeQuery = "DELETE FROM ukljucenje WHERE kartica = '$_POST[hidden]'";
				$deleteUkljucenje = mysql_query($deleteUkljucenjeQuery) or die(mysql_error());
				$deleteDslamQuery = "DELETE FROM dslam_aktivni WHERE broj_kartice = '$_POST[hidden]'";
				$deleteDslam = mysql_query($deleteDslamQuery) or die(mysql_error());
				$deleteParicaQuery = "DELETE FROM parica_aktivna WHERE broj_kartice = '$_POST[hidden]'";
				$deleteParica = mysql_query($deleteParicaQuery) or die(mysql_error());

				if ($deleteZadaci && $deleteDslam && $deleteUkljucenje && $deleteParica) {
					echo "<meta http-equiv=\"refresh\" content=\"0; pretraga.php\"/>";
					exit;
				}
			}// kraj delete zadaci, ukljucenje, parica, dslam


		// --------------------------PRETRAGA----------------------
			// click na gumb "Pregled"
			if (isset($_POST['pregled'])) {
			
				$queryPregled = mysql_query("SELECT * FROM `zadaci` WHERE broj_kartice = '$hidden' ");

				while ($pregled = mysql_fetch_array($queryPregled)) {
				
					if ($pregled["promjena_oprema"] == da && $pregled["promjena_parice"] == da && $pregled["promjena_porta"] == da) {// ako su oprema, promjena parice i promjena porta "da" ispis iz tablica zadaci, parica,dslam, oprema
					
						// ako su oprema, promjena parice i promjena porta "da" ispis iz tablica zadaci, parica,dslam, oprema  DELETE 1 UPDAT 1
						$pregledQueryAll = "SELECT * FROM `zadaci`, `oprema`, `dslam`, `parica` WHERE zadaci.broj_kartice = '$hidden' && oprema.broj_kartice = '$hidden' && parica.broj_kartice='$hidden' && dslam.broj_kartice = '$hidden'";
						$pregledAll = mysql_query($pregledQueryAll) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregledAll)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stara parica: '.'<input class = "input_text" type="text" name="stara_pp" value="'.$pregledPodaci["stara_pp"].'"></p>';
							echo '<p>Stara pozicija parice: '.'<input class = "input_text" type="text" name="stara_pp_pozicija" value="'.$pregledPodaci["stara_pp_pozicija"].'"></p>';
							echo '<p>Nova parica: '.'<input class = "input_text" type="text" name="nova_pp" value="'.$pregledPodaci["nova_pp"].'"></p>';
							echo '<p>Nova pozicija parice: '.'<input class = "input_text" type="text" name="nova_pp_pozicija" value="'.$pregledPodaci["nova_pp_pozicija"].'"></p>';
							echo '<p>Stari DSLAM: '.'<input class = "input_text" type="text" name="stari_dslam" value="'.$pregledPodaci["stari_dslam"].'"></p>';
							echo '<p>Stari port: '.'<input class = "input_text" type="text" name="stari_port" value="'.$pregledPodaci["stari_port"].'"></p>';
							echo '<p>Stari MR: '.'<input class = "input_text" type="text" name="stari_mr" value="'.$pregledPodaci["stari_mr"].'"></p>';
							echo '<p>Stara pozicija: '.'<input class = "input_text" type="text" name="stara_pozicija" value="'.$pregledPodaci["stara_pozicija"].'"></p>';
							echo '<p>Novi DSLAM: '.'<input class = "input_text" type="text" name="novi_dslam" value="'.$pregledPodaci["novi_dslam"].'"></p>';
							echo '<p>Novi port: '.'<input class = "input_text" type="text" name="novi_port" value="'.$pregledPodaci["novi_port"].'"></p>';
							echo '<p>Novi MR: '.'<input class = "input_text" type="text" name="novi_mr" value="'.$pregledPodaci["novi_mr"].'"></p>';
							echo '<p>Nova pozicija: '.'<input class = "input_text" type="text" name="nova_pozicija" value="'.$pregledPodaci["nova_pozicija"].'"></p>';
							echo '<p>Tip preuzete opreme: '.'<input class = "input_text" type="text" name="tip_preuzete" value="'.$pregledPodaci["tip_preuzete"].'"></p>';
							echo '<p>Model preuzete opreme: '.'<input class = "input_text" type="text" name="model_preuzete" value="'.$pregledPodaci["model_preuzete"].'"></p>';
							echo '<p>Serijski broj preuzete opreme: '.'<input class = "input_text" type="text" name="serijski_preuzete" value="'.$pregledPodaci["serijski_preuzete"].'"></p>';
							echo '<p>Kompanija preuzete opreme: '.'<input class = "input_text" type="text" name="kompanija_preuzete" value="'.$pregledPodaci["kompanija_preuzete"].'"></p>';
							echo '<p>Tip postavljene opreme: '.'<input class = "input_text" type="text" name="tip_postavljene" value="'.$pregledPodaci["tip_postavljene"].'"></p>';
							echo '<p>Model postavljene opreme: '.'<input class = "input_text" type="text" name="model_postavljene" value="'.$pregledPodaci["model_postavljene"].'"></p>';
							echo '<p>Serijski broj postavljene opreme: '.'<input class = "input_text" type="text" name="serijski_postavljene" value="'.$pregledPodaci["serijski_postavljene"].'"></p>';
							echo '<p>Kompanija postavljene opreme: '.'<input class = "input_text" type="text" name="kompanija_postavljene" value="'.$pregledPodaci["kompanija_postavljene"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}// kraj while petlje ako su oprema, promjena parice i promjena porta "da" ispis iz tablica zadaci, parica,dslam, oprema
						echo '<p><button type="submit" name="update1">Update</button>';
						echo '<button type="submit" name="delete1">Obriši</button>';
						echo '</form>';
					}// kraj ako su oprema, promjena parice i promjena porta "da" ispis iz tablica zadaci, parica,dslam, oprema

					// ako su promjena parice i oprema "da", te ispis iz zadaci, parica, oprema DELETE 2 UPDATE 2
					if ($pregled["promjena_parice"] == da && $pregled["promjena_oprema"] == da) {
					
						$pregledQuery = "SELECT * FROM `zadaci`, `oprema`, `parica` WHERE zadaci.broj_kartice = '$hidden' && oprema.broj_kartice = '$hidden' && parica.broj_kartice='$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stara parica: '.'<input class = "input_text" type="text" name="stara_pp" value="'.$pregledPodaci["stara_pp"].'"></p>';
							echo '<p>Stara pozicija parice: '.'<input class = "input_text" type="text" name="stara_pp_pozicija" value="'.$pregledPodaci["stara_pp_pozicija"].'"></p>';
							echo '<p>Nova parica: '.'<input class = "input_text" type="text" name="nova_pp" value="'.$pregledPodaci["nova_pp"].'"></p>';
							echo '<p>Nova pozicija parice: '.'<input class = "input_text" type="text" name="nova_pp_pozicija" value="'.$pregledPodaci["nova_pp_pozicija"].'"></p>';
							echo '<p>Tip preuzete opreme: '.'<input class = "input_text" type="text" name="tip_preuzete" value="'.$pregledPodaci["tip_preuzete"].'"></p>';
							echo '<p>Model preuzete opreme: '.'<input class = "input_text" type="text" name="model_preuzete" value="'.$pregledPodaci["model_preuzete"].'"></p>';
							echo '<p>Serijski broj preuzete opreme: '.'<input class = "input_text" type="text" name="serijski_preuzete" value="'.$pregledPodaci["serijski_preuzete"].'"></p>';
							echo '<p>Kompanija preuzete opreme: '.'<input class = "input_text" type="text" name="kompanija_preuzete" value="'.$pregledPodaci["kompanija_preuzete"].'"></p>';
							echo '<p>Tip postavljene opreme: '.'<input class = "input_text" type="text" name="tip_postavljene" value="'.$pregledPodaci["tip_postavljene"].'"></p>';
							echo '<p>Model postavljene opreme: '.'<input class = "input_text" type="text" name="model_postavljene" value="'.$pregledPodaci["model_postavljene"].'"></p>';
							echo '<p>Serijski broj postavljene opreme: '.'<input class = "input_text" type="text" name="serijski_postavljene" value="'.$pregledPodaci["serijski_postavljene"].'"></p>';
							echo '<p>Kompanija postavljene opreme: '.'<input class = "input_text" type="text" name="kompanija_postavljene" value="'.$pregledPodaci["kompanija_postavljene"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}// kraj while petlje ako su promjena parice i oprema "da", te ispis iz zadaci, parica, oprema
						echo '<p><button type="submit" name="update2">Update</button>';
						echo '<button type="submit" name="delete2">Obriši</button>';
						echo '</form>';
					}// kraj ako su promjena parice i oprema "da", te ispis iz zadaci, parica, oprema

					// ako su promjena dslam i oprema "da", te ispis iz zadaci, oprema, dslam DELETE 3 UPDATE 3
					if ($pregled["promjena_porta"] == da && $pregled["promjena_oprema"] == da) {
						
						$pregledQuery = "SELECT * FROM `zadaci`, `oprema`, `dslam` WHERE zadaci.broj_kartice = '$hidden' && oprema.broj_kartice = '$hidden' && dslam.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stari DSLAM: '.'<input class = "input_text" type="text" name="stari_dslam" value="'.$pregledPodaci["stari_dslam"].'"></p>';
							echo '<p>Stari port: '.'<input class = "input_text" type="text" name="stari_port" value="'.$pregledPodaci["stari_port"].'"></p>';
							echo '<p>Stari MR: '.'<input class = "input_text" type="text" name="stari_mr" value="'.$pregledPodaci["stari_mr"].'"></p>';
							echo '<p>Stara pozicija: '.'<input class = "input_text" type="text" name="stara_pozicija" value="'.$pregledPodaci["stara_pozicija"].'"></p>';
							echo '<p>Novi DSLAM: '.'<input class = "input_text" type="text" name="novi_dslam" value="'.$pregledPodaci["novi_dslam"].'"></p>';
							echo '<p>Novi port: '.'<input class = "input_text" type="text" name="novi_port" value="'.$pregledPodaci["novi_port"].'"></p>';
							echo '<p>Novi MR: '.'<input class = "input_text" type="text" name="novi_mr" value="'.$pregledPodaci["novi_mr"].'"></p>';
							echo '<p>Nova pozicija: '.'<input class = "input_text" type="text" name="nova_pozicija" value="'.$pregledPodaci["nova_pozicija"].'"></p>';
							echo '<p>Tip preuzete opreme: '.'<input class = "input_text" type="text" name="tip_preuzete" value="'.$pregledPodaci["tip_preuzete"].'"></p>';
							echo '<p>Model preuzete opreme: '.'<input class = "input_text" type="text" name="model_preuzete" value="'.$pregledPodaci["model_preuzete"].'"></p>';
							echo '<p>Serijski broj preuzete opreme: '.'<input class = "input_text" type="text" name="serijski_preuzete" value="'.$pregledPodaci["serijski_preuzete"].'"></p>';
							echo '<p>Kompanija preuzete opreme: '.'<input class = "input_text" type="text" name="kompanija_preuzete" value="'.$pregledPodaci["kompanija_preuzete"].'"></p>';
							echo '<p>Tip postavljene opreme: '.'<input class = "input_text" type="text" name="tip_postavljene" value="'.$pregledPodaci["tip_postavljene"].'"></p>';
							echo '<p>Model postavljene opreme: '.'<input class = "input_text" type="text" name="model_postavljene" value="'.$pregledPodaci["model_postavljene"].'"></p>';
							echo '<p>Serijski broj postavljene opreme: '.'<input class = "input_text" type="text" name="serijski_postavljene" value="'.$pregledPodaci["serijski_postavljene"].'"></p>';
							echo '<p>Kompanija postavljene opreme: '.'<input class = "input_text" type="text" name="kompanija_postavljene" value="'.$pregledPodaci["kompanija_postavljene"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}// kraj while petlje ako su promjena dslam i oprema "da", te ispis iz zadaci, oprema, dslam
						echo '<p><button type="submit" name="update3">Update</button>';
						echo '<button type="submit" name="delete3">Obriši</button>';
						echo '</form>';
					}// kraj ako su promjena dslam i oprema "da", te ispis iz zadaci, oprema, dslam

					// ako je samo oprema "da" ispis iz zadaci, oprema  DELETE 4 UPDATE 4
					if ($pregled["promjena_oprema"] == da) {
						
						$pregledQuery = "SELECT * FROM `zadaci`, `oprema` WHERE zadaci.broj_kartice='$hidden' && oprema.broj_kartice='$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
						
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Tip preuzete opreme: '.'<input class = "input_text" type="text" name="tip_preuzete" value="'.$pregledPodaci["tip_preuzete"].'"></p>';
							echo '<p>Model preuzete opreme: '.'<input class = "input_text" type="text" name="model_preuzete" value="'.$pregledPodaci["model_preuzete"].'"></p>';
							echo '<p>Serijski broj preuzete opreme: '.'<input class = "input_text" type="text" name="serijski_preuzete" value="'.$pregledPodaci["serijski_preuzete"].'"></p>';
							echo '<p>Kompanija preuzete opreme: '.'<input class = "input_text" type="text" name="kompanija_preuzete" value="'.$pregledPodaci["kompanija_preuzete"].'"></p>';
							echo '<p>Tip postavljene opreme: '.'<input class = "input_text" type="text" name="tip_postavljene" value="'.$pregledPodaci["tip_postavljene"].'"></p>';
							echo '<p>Model postavljene opreme: '.'<input class = "input_text" type="text" name="model_postavljene" value="'.$pregledPodaci["model_postavljene"].'"></p>';
							echo '<p>Serijski broj postavljene opreme: '.'<input class = "input_text" type="text" name="serijski_postavljene" value="'.$pregledPodaci["serijski_postavljene"].'"></p>';
							echo '<p>Kompanija postavljene opreme: '.'<input class = "input_text" type="kompanija_postavljene" value="'.$pregledPodaci["kompanija_postavljene"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}// kraj while petlje ako je samo oprema "da" ispis iz zadaci, oprema
						echo '<p><button type="submit" name="update4">Update</button>';
						echo '<button type="submit" name="delete4">Obriši</button>';
						echo '</form>';
					}// kraj ako je samo oprema "da" ispis iz zadaci, oprema

					// ako su parica i DSLAM "da" ispis zadaci, parica, DSLAM DELETE 5 UPDATE 5
					if ($pregled["promjena_parice"] == da && $pregled["promjena_porta"] == da) {
						
						$pregledQuery = "SELECT * FROM `zadaci`, `parica`, `dslam` WHERE zadaci.broj_kartice='$hidden' && parica.broj_kartice='$hidden' && dslam.broj_kartice='$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stara parica: '.'<input class = "input_text" type="text" name="stara_pp" value="'.$pregledPodaci["stara_pp"].'"></p>';
							echo '<p>Stara pozicija parice: '.'<input class = "input_text" type="text" name="stara_pp_pozicija" value="'.$pregledPodaci["stara_pp_pozicija"].'"></p>';
							echo '<p>Nova parica: '.'<input class = "input_text" type="text" name="nova_pp" value="'.$pregledPodaci["nova_pp"].'"></p>';
							echo '<p>Nova pozicija parice: '.'<input class = "input_text" type="text" name="nova_pp_pozicija" value="'.$pregledPodaci["nova_pp_pozicija"].'"></p>';
							echo '<p>Stari DSLAM: '.'<input class = "input_text" type="text" name="stari_dslam" value="'.$pregledPodaci["stari_dslam"].'"></p>';
							echo '<p>Stari port: '.'<input class = "input_text" type="text" name="stari_port" value="'.$pregledPodaci["stari_port"].'"></p>';
							echo '<p>Stari MR: '.'<input class = "input_text" type="text" name="stari_mr" value="'.$pregledPodaci["stari_mr"].'"></p>';
							echo '<p>Stara pozicija: '.'<input class = "input_text" type="text" name="stara_pozicija" value="'.$pregledPodaci["stara_pozicija"].'"></p>';
							echo '<p>Novi DSLAM: '.'<input class = "input_text" type="text" name="novi_dslam" value="'.$pregledPodaci["novi_dslam"].'"></p>';
							echo '<p>Novi port: '.'<input class = "input_text" type="text" name="novi_port" value="'.$pregledPodaci["novi_port"].'"></p>';
							echo '<p>Novi MR: '.'<input class = "input_text" type="text" name="novi_mr" value="'.$pregledPodaci["novi_mr"].'"></p>';
							echo '<p>Nova pozicija: '.'<input class = "input_text" type="text" name="nova_pozicija" value="'.$pregledPodaci["nova_pozicija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}// kraj while petlje ako su parica i DSLAM "da" ispis zadaci, parica, DSLAM
						echo '<p><button type="submit" name="update5">Update</button>';
						echo '<button type="submit" name="delete5">Obriši</button>';
						echo '</form>';
					}// kraj ako su parica i DSLAM "da" ispis zadaci, parica, DSLAM

					// ako je samo parica "da" ispis zadaci, parica DELETE 6 UPDATE 6
					if ($pregled["promjena_parice"] == da) {
						
						$pregledQuery = "SELECT * FROM `zadaci`, `parica` WHERE zadaci.broj_kartice='$hidden' && parica.broj_kartice='$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stara parica: '.'<input class = "input_text" type="text" name="stara_pp" value="'.$pregledPodaci["stara_pp"].'"></p>';
							echo '<p>Stara pozicija parice: '.'<input class = "input_text" type="text" name="stara_pp_pozicija" value="'.$pregledPodaci["stara_pp_pozicija"].'"></p>';
							echo '<p>Nova parica: '.'<input class = "input_text" type="text" name="nova_pp" value="'.$pregledPodaci["nova_pp"].'"></p>';
							echo '<p>Nova pozicija parice: '.'<input class = "input_text" type="text" name="nova_pp_pozicija" value="'.$pregledPodaci["nova_pp_pozicija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}// kraj while petlje // ako je samo parica "da" ispis zadaci, parica
						echo '<p><button type="submit" name="update6">Update</button>';
						echo '<button type="submit" name="delete6">Obriši</button>';
						echo '</form>';
					}// kraj // ako je samo parica "da" ispis zadaci, parica

					// ako je samo promjena dslam "da" ispis zadaci, dslam DELETE 7 UPDATE 7
					if ($pregled["promjena_porta"] == da) {
						
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam` WHERE zadaci.broj_kartice='$hidden' && dslam.broj_kartice='$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stari DSLAM: '.'<input class = "input_text" type="text" name="stari_dslam" value="'.$pregledPodaci["stari_dslam"].'"></p>';
							echo '<p>Stari port: '.'<input class = "input_text" type="text" name="stari_port" value="'.$pregledPodaci["stari_port"].'"></p>';
							echo '<p>Stari MR: '.'<input class = "input_text" type="text" name="stari_mr" value="'.$pregledPodaci["stari_mr"].'"></p>';
							echo '<p>Stara pozicija: '.'<input class = "input_text" type="text" name="stara_pozicija" value="'.$pregledPodaci["stara_pozicija"].'"></p>';
							echo '<p>Novi DSLAM: '.'<input class = "input_text" type="text" name="novi_dslam" value="'.$pregledPodaci["novi_dslam"].'"></p>';
							echo '<p>Novi port: '.'<input class = "input_text" type="text" name="novi_port" value="'.$pregledPodaci["novi_port"].'"></p>';
							echo '<p>Novi MR: '.'<input class = "input_text" type="text" name="novi_mr" value="'.$pregledPodaci["novi_mr"].'">';
							echo '<p>Nova pozicija: '.'<input class = "input_text" type="text" name="nova_pozicija" value="'.$pregledPodaci["nova_pozicija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}// kraj while petlje ako je samo promjena dslam "da" ispis zadaci, dslam
						echo '<p><button type="submit" name="update7">Update</button>';
						echo '<button type="submit" name="delete7">Obriši</button>';
						echo '</form>';
					}// kraj ako je samo promjena dslam "da" ispis zadaci, dslam
			
					// ako je sve "ne" ispis zadaci DELETE 8 UPDATE 8
					if ($pregled["promjena_porta"] == ne && $pregled["promjena_parice"] == ne && $pregled["promjena_oprema"] == ne && $pregled["upis_parice"] == ne && $pregled['upis_porta'] == ne) {

						$queryPregled = mysql_query("SELECT * FROM `zadaci` WHERE broj_kartice = '$hidden' ");

						while ($pregled = mysql_fetch_array($queryPregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregled["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregled["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregled["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregled["zadatak"].'"></p>';
							echo '<p>Tip zadatka; '.'<input class = "input_text" type="text" name="tip_zadatak" value="'.$pregled["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregled["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregled["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregled["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregled["zabiljeska"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['br_kartice'].'">';
						}// kraj while petlje ako je sve "ne" ispis zadaci
						echo '<p><button type="submit" name="update8">Update</button>';
						echo '<button type="submit" name="delete8">Obriši</button>';
						echo '</form>';
					}// kraj ako je sve "ne" ispis zadaci

					//ako je samo upis parice "da" ispis zadaci, parica_aktivna DELETE 9 UPDATE 9
					if ($pregled["upis_parice"] == da && $pregled["upis_porta"] == ne && $pregled["promjena_porta"] == ne && $pregled["promjena_oprema"] == ne) {
						$pregledQuery = "SELECT * FROM `zadaci`, `parica_aktivna` WHERE zadaci.broj_kartice = '$hidden' && parica_aktivna.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivna parica: '.'<input class = "input_text" type="text" name="aktivna_pp" value="'.$pregledPodaci["aktivna_pp"].'"></p>';
							echo '<p>Pozicija aktivne parice: '.'<input class = "input_text" type="text" name="aktivna_pp_pozicija" value="'.$pregledPodaci["aktivna_pp_pozicija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}// kraj while petlje ako je samo upis parice ispis zadaci, parica_aktivna
						echo '<p><button type="submit" name="update9">Update</button>';
						echo '<button type="submit" name="delete9">Obriši</button>';
						echo '</form>';
					}// kraj ako je samo upis parice ispis zadaci, parica_aktivna

					// ako je samo upis porta "da", ispis zadaci, dslam_aktivni DELETE 10 UPDATE 10
					if ($pregled["upis_porta"] == da && $pregled["upis_parice"] == ne && $pregled["promjena_oprema"] == ne && $pregled["promjena_parice"] == ne) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam_aktivni` WHERE zadaci.broj_kartice = '$hidden' && dslam_aktivni.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivna DSLAM: '.'<input class = "input_text" type="text" name="aktivni_dslam" value="'.$pregledPodaci["aktivni_dslam"].'"></p>';
							echo '<p>Aktivni port: '.'<input class = "input_text" type="text" name="aktivni_port" value="'.$pregledPodaci["aktivni_port"].'"></p>';
							echo '<p>Aktivni MR: '.'<input class = "input_text" type="text" name="aktivni_mr" value="'.$pregledPodaci["aktivni_mr"].'"></p>';
							echo '<p>Aktivna pozicija: '.'<input class = "input_text" type="text" name="aktivna_pozicija" value="'.$pregledPodaci["aktivna_pozicija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}// kraj while petlje ako je samo upis porta "da", ispis zadaci, dslam_aktivni
						echo '<p><button type="submit" name="update10">Update</button>';
						echo '<button type="submit" name="delete10">Obriši</button>';
						echo '</form>';
					}// kraj ako je samo upis porta "da", ispis zadaci, dslam_aktivni

					//ako su upis porta i promjena parice "da" ispis zadaci, dslam_aktivni, parica DELETE 11 UPDATE 11
					if ($pregled["upis_porta"] == da && $pregled["promjena_parice"] == da && $pregled["upis_parice"] == ne && $pregled["promjena_oprema"] == ne) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam_aktivni`, `parica` WHERE zadaci.broj_kartice = '$hidden' && dslam_aktivni.broj_kartice = '$hidden' && parica.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivna DSLAM: '.'<input class = "input_text" type="text" name="aktivni_dslam" value="'.$pregledPodaci["aktivni_dslam"].'"></p>';
							echo '<p>Aktivni port: '.'<input class = "input_text" type="text" name="aktivni_port" value="'.$pregledPodaci["aktivni_port"].'"></p>';
							echo '<p>Aktivni MR: '.'<input class = "input_text" type="text" name="aktivni_mr" value="'.$pregledPodaci["aktivni_mr"].'"></p>';
							echo '<p>Aktivna pozicija: '.'<input class = "input_text" type="text" name="aktivna_pozicija" value="'.$pregledPodaci["aktivna_pozicija"].'"></p>';
							echo '<p>Stara parica: '.'<input class = "input_text" type="text" name="stara_pp" value="'.$pregledPodaci["stara_pp"].'"></p>';
							echo '<p>Pozicija stare parice: '.'<input class = "input_text" type="text" name="stara_pp_pozicija" value="'.$pregledPodaci["stara_pp_pozicija"].'"></p>';
							echo '<p>Nova parica: '.'<input class = "input_text" type="text" name="nova_pp" value="'.$pregledPodaci["nova_pp"].'"></p>';
							echo '<p>Pozicija nove parice '.'<input class = "input_text" type="text" name="nova_pp_pozicija" value="'.$pregledPodaci["nova_pp_pozicija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako su upis porta i promjena parice "da" ispis zadaci, dslam_aktivni, parica
						echo '<p><button type="submit" name="update11">Update</button>';
						echo '<button type="submit" name="delete11">Obriši</button>';
						echo '</form>';
					}// kraj ako su upis porta i promjena parice "da" ispis zadaci, dslam_aktivni, parica

					//ako je upis parice i upis porta "da" ispis zadaci, parica_aktivna, dslam_aktivni DELETE 12 UPDATE 12
					if ($pregled["upis_parice"] == da && $pregled["upis_porta"] == da && $pregled["promjena_oprema"] == ne) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam_aktivni`, `parica_aktivna` WHERE zadaci.broj_kartice = '$hidden' && dslam_aktivni.broj_kartice = '$hidden' && parica_aktivna.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivna DSLAM: '.'<input class = "input_text" type="text" name="aktivni_dslam" value="'.$pregledPodaci["aktivni_dslam"].'"></p>';
							echo '<p>Aktivni port: '.'<input class = "input_text" type="text" name="aktivni_port" value="'.$pregledPodaci["aktivni_port"].'"></p>';
							echo '<p>Aktivni MR: '.'<input class = "input_text" type="text" name="aktivni_mr" value="'.$pregledPodaci["aktivni_mr"].'"></p>';
							echo '<p>Aktivna pozicija: '.'<input class = "input_text" type="text" name="aktivna_pozicija" value="'.$pregledPodaci["aktivna_pozicija"].'"></p>';
							echo '<p>Aktivna parica: '.'<input class = "input_text" type="text" name="aktivna_pp" value="'.$pregledPodaci["aktivna_pp"].'"></p>';
							echo '<p>Pozicija aktivne parice: '.'<input class = "input_text" type="text" name="aktivna_pp_pozicija" value="'.$pregledPodaci["aktivna_pp_pozicija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis parice i upis porta "da" ispis zadaci, parica_aktivna, dslam_aktivni
						echo '<p><button type="submit" name="update12">Update</button>';
						echo '<button type="submit" name="delete12">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis parice i upis porta "da" ispis zadaci, parica_aktivna, dslam_aktivni

					// ako je upis parice i promjena porta "da" ispis zadaci, parica_aktivna, dslam DELETE 13 UPDATE 13
					if ($pregled["upis_parice"] == da && $pregled["promjena_porta"] == da && $pregled["promjena_oprema"] == ne) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam`, `parica_aktivna` WHERE zadaci.broj_kartice = '$hidden' && dslam.broj_kartice = '$hidden' && parica_aktivna.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stari DSLAM: '.'<input class = "input_text" type="text" name="stari_dslam" value="'.$pregledPodaci["stari_dslam"].'"></p>';
							echo '<p>Stari port: '.'<input class = "input_text" type="text" name="stari_port" value="'.$pregledPodaci["stari_port"].'"></p>';
							echo '<p>Stari MR: '.'<input class = "input_text" type="text" name="stari_mr" value="'.$pregledPodaci["stari_mr"].'"></p>';
							echo '<p>Stara pozicija: '.'<input class = "input_text" type="text" name="stara_pozicija" value="'.$pregledPodaci["stara_pozicija"].'"></p>';
							echo '<p>Novi DSLAM: '.'<input class = "input_text" type="text" name="novi_dslam" value="'.$pregledPodaci["novi_dslam"].'"></p>';
							echo '<p>Novi port: '.'<input class = "input_text" type="text" name="novi_port" value="'.$pregledPodaci["novi_port"].'"></p>';
							echo '<p>Novi MR: '.'<input class = "input_text" type="text" name="novi_mr" value="'.$pregledPodaci["novi_mr"].'"></p>';
							echo '<p>Nova pozicija: '.'<input class = "input_text" type="text" name="nova_pozicija" value="'.$pregledPodaci["nova_pozicija"].'"></p>';
							echo '<p>Aktivna parica: '.'<input class = "input_text" type="text" name="aktivna_pp" value="'.$pregledPodaci["aktivna_pp"].'"></p>';
							echo '<p>Pozicija aktivne parice: '.'<input class = "input_text" type="text" name="aktivna_pp_pozicija" value="'.$pregledPodaci["aktivna_pp_pozicija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis parice i promjena porta "da" ispis zadaci, parica_aktivna, dslam
						echo '<p><button type="submit" name="update13">Update</button>';
						echo '<button type="submit" name="delete13">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis parice i promjena porta "da" ispis zadaci, parica_aktivna, dslam

					// ako je upis parice, promjena porta i promjena oprema "da" ispis zadaci, parica_aktivna, dslam, oprema DELETE 14 UPDATE 14
					if ($pregled["upis_parice"] == da && $pregled["promjena_porta"] == da && $pregled["promjena_oprema"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam`, `parica_aktivna`, `oprema` WHERE zadaci.broj_kartice = '$hidden' && dslam.broj_kartice = '$hidden' && parica_aktivna.broj_kartice = '$hidden' && oprema.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivna parica: '.'<input class = "input_text" type="text" name="aktivna_pp" value="'.$pregledPodaci["aktivna_pp"].'"></p>';
							echo '<p>Pozicija aktivne parice: '.'<input class = "input_text" type="text" name="aktivna_pp_pozicija" value="'.$pregledPodaci["aktivna_pp_pozicija"].'"></p>';
							echo '<p>Stari DSLAM: '.'<input class = "input_text" type="text" name="stari_dslam" value="'.$pregledPodaci["stari_dslam"].'"></p>';
							echo '<p>Stari port: '.'<input class = "input_text" type="text" name="stari_port" value="'.$pregledPodaci["stari_port"].'"></p>';
							echo '<p>Stari MR: '.'<input class = "input_text" type="text" name="stari_mr" value="'.$pregledPodaci["stari_mr"].'"></p>';
							echo '<p>Stara pozicija: '.'<input class = "input_text" type="text" name="stara_pozicija" value="'.$pregledPodaci["stara_pozicija"].'"></p>';
							echo '<p>Novi DSLAM: '.'<input class = "input_text" type="text" name="novi_dslam" value="'.$pregledPodaci["novi_dslam"].'"></p>';
							echo '<p>Novi port: '.'<inputclass = "input_text"  type="text" name="novi_port" value="'.$pregledPodaci["novi_port"].'"></p>';
							echo '<p>Novi MR: '.'<input class = "input_text" type="text" name="novi_mr" value="'.$pregledPodaci["novi_mr"].'"></p>';
							echo '<p>Nova pozicija: '.'<input class = "input_text" type="text" name="nova_pozicija" value="'.$pregledPodaci["nova_pozicija"].'"></p>';
							echo '<p>Tip preuzete opreme: '.'<input class = "input_text" type="text" name="tip_preuzete" value="'.$pregledPodaci["tip_preuzete"].'"></p>';
							echo '<p>Model preuzete opreme: '.'<input class = "input_text" type="text" name="model_preuzete" value="'.$pregledPodaci["model_preuzete"].'"></p>';
							echo '<p>Serijski broj preuzete opreme: '.'<input class = "input_text" type="text" name="serijski_preuzete" value="'.$pregledPodaci["serijski_preuzete"].'"></p>';
							echo '<p>Kompanija preuzete opreme: '.'<input class = "input_text" type="text" name="kompanija_preuzete" value="'.$pregledPodaci["kompanija_preuzete"].'"></p>';
							echo '<p>Tip postavljene opreme: '.'<input class = "input_text" type="text" name="tip_postavljene" value="'.$pregledPodaci["tip_postavljene"].'"></p>';
							echo '<p>Model postavljene opreme: '.'<input class = "input_text" type="text" name="model_postavljene" value="'.$pregledPodaci["model_postavljene"].'"></p>';
							echo '<p>Serijski broj postavljene opreme: '.'<input class = "input_text" type="text" name="serijski_postavljene" value="'.$pregledPodaci["serijski_postavljene"].'"></p>';
							echo '<p>Kompanija postavljene opreme: '.'<input class = "input_text" type="kompanija_postavljene" value="'.$pregledPodaci["kompanija_postavljene"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis parice, promjena porta i promjena oprema "da" ispis zadaci, parica_aktivna, dslam, oprema
						echo '<p><button type="submit" name="update14">Update</button>';
						echo '<button type="submit" name="delete14>Obriši</button>';
						echo '</form>';
					}// kraj ako je upis parice, promjena porta i promjena oprema "da" ispis zadaci, parica_aktivna, dslam, oprema

					// ako je promjena parice, upis porta i promjena oprema "da" ispis zadaci, parica, dslam_aktivni, oprema DELETE 15 UPDATE 15
					if ($pregled["promjena_parice"] == da && $pregled["upis_porta"] == da && $pregled["promjena_oprema"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam_aktivni`, `parica`, `oprema` WHERE zadaci.broj_kartice = '$hidden' && dslam_aktivni.broj_kartice = '$hidden' && parica.broj_kartice = '$hidden' && oprema.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stara parica: '.'<input class = "input_text" type="text" name="stara_pp" value="'.$pregledPodaci["stara_pp"].'"></p>';
							echo '<p>Pozicija stare parice: '.'<input class = "input_text" type="text" name="stara_pp_pozicija" value="'.$pregledPodaci["stara_pp_pozicija"].'"></p>';
							echo '<p>Nova parica: '.'<input class = "input_text" type="text" name="nova_pp value="'.$pregledPodaci["nova_pp"].'"></p>';
							echo '<p>Pozicija nove parice: '.'<input class = "input_text" type="text" name="nova_pp_pozicija" value="'.$pregledPodaci["nova_pp_pozicija"].'"></p>';
							echo '<p>Aktivni DSLAM: '.'<input class = "input_text" type="text" name="aktivni_dslam" value="'.$pregledPodaci["aktivni_dslam"].'"></p>';
							echo '<p>Aktivni port: '.'<input class = "input_text" type="text" name="aktivni_port" value="'.$pregledPodaci["aktivni_port"].'"></p>';
							echo '<p>Aktivni MR: '.'<input class = "input_text" ype="text" name="aktivni_mr" value="'.$pregledPodaci["aktivni_mr"].'"></p>';
							echo '<p>Aktivna pozicija: '.'<input class = "input_text" type="text" name="aktivna_pozicija" value="'.$pregledPodaci["aktivna_pozicija"].'"></p>';
							echo '<p>Tip preuzete opreme: '.'<input class = "input_text" type="text" name="tip_preuzete" value="'.$pregledPodaci["tip_preuzete"].'"></p>';
							echo '<p>Model preuzete opreme: '.'<input class = "input_text" type="text" name="model_preuzete" value="'.$pregledPodaci["model_preuzete"].'"></p>';
							echo '<p>Serijski broj preuzete opreme: '.'<input class = "input_text" type="text" name="serijski_preuzete" value="'.$pregledPodaci["serijski_preuzete"].'"></p>';
							echo '<p>Kompanija preuzete opreme: '.'<input class = "input_text" type="text" name="kompanija_preuzete" value="'.$pregledPodaci["kompanija_preuzete"].'"></p>';
							echo '<p>Tip postavljene opreme: '.'<input class = "input_text" type="text" name="tip_postavljene" value="'.$pregledPodaci["tip_postavljene"].'"></p>';
							echo '<p>Model postavljene opreme: '.'<input class = "input_text" type="text" name="model_postavljene" value="'.$pregledPodaci["model_postavljene"].'"></p>';
							echo '<p>Serijski broj postavljene opreme: '.'<input class = "input_text" type="text" name="serijski_postavljene" value="'.$pregledPodaci["serijski_postavljene"].'"></p>';
							echo '<p>Kompanija postavljene opreme: '.'<input class = "input_text" type="kompanija_postavljene" value="'.$pregledPodaci["kompanija_postavljene"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je promjena parice, upis porta i promjena oprema "da" ispis zadaci, parica, dslam_aktivni, oprema
						echo '<p><button type="submit" name="update15">Update</button>';
						echo '<button type="submit" name="delete15">Obriši</button>';
						echo '</form>';
					}// kraj ako je promjena parice, upis porta i promjena oprema "da" ispis zadaci, parica, dslam_aktivni, oprema

					// ako je upis parice, promjena oprema "da" ispis zadaci, parica_aktivna, oprema DELETE 16 UPADATE 16
					if ($pregled["upis_parice"] == da && $pregled["promjena_oprema"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `parica_aktivna`, `oprema` WHERE zadaci.broj_kartice = '$hidden'  && parica_aktivna.broj_kartice = '$hidden' && oprema.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivna parica: '.'<input class = "input_text" type="text" name="aktivna_pp" value="'.$pregledPodaci["aktivna_pp"].'"></p>';
							echo '<p>Pozicija aktivne parice: '.'<input class = "input_text" type="text" name="aktivna_pp_pozicija" value="'.$pregledPodaci["aktivna_pp_pozicija"].'"></p>';
							echo '<p>Tip preuzete opreme: '.'<input class = "input_text" type="text" name="tip_preuzete" value="'.$pregledPodaci["tip_preuzete"].'"></p>';
							echo '<p>Model preuzete opreme: '.'<input class = "input_text" type="text" name="model_preuzete" value="'.$pregledPodaci["model_preuzete"].'"></p>';
							echo '<p>Serijski broj preuzete opreme: '.'<input class = "input_text" type="text" name="serijski_preuzete" value="'.$pregledPodaci["serijski_preuzete"].'"></p>';
							echo '<p>Kompanija preuzete opreme: '.'<input class = "input_text" type="text" name="kompanija_preuzete" value="'.$pregledPodaci["kompanija_preuzete"].'"></p>';
							echo '<p>Tip postavljene opreme: '.'<input class = "input_text" type="text" name="tip_postavljene" value="'.$pregledPodaci["tip_postavljene"].'"></p>';
							echo '<p>Model postavljene opreme: '.'<input class = "input_text" type="text" name="model_postavljene" value="'.$pregledPodaci["model_postavljene"].'"></p>';
							echo '<p>Serijski broj postavljene opreme: '.'<input class = "input_text" type="text" name="serijski_postavljene" value="'.$pregledPodaci["serijski_postavljene"].'"></p>';
							echo '<p>Kompanija postavljene opreme: '.'<input class = "input_text" type="kompanija_postavljene" value="'.$pregledPodaci["kompanija_postavljene"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis parice, promjena opreme "da" ispis zadaci, parica_aktivna, oprema
						echo '<p><button type="submit" name="update16">Update</button>';
						echo '<button type="submit" name="delete16">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis parice, promjena oprema "da" ispis zadaci, parica_aktivna, oprema

					// ako je upis porta, promjena oprema "da" ispis zadaci, dslam_aktivni, oprema DELETE 17 UPDATE 17
					if ($pregled["upis_porta"] == da && $pregled["promjena_oprema"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam_aktivni`, `oprema` WHERE zadaci.broj_kartice = '$hidden'  && dslam_aktivni.broj_kartice = '$hidden' && oprema.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivni DSLAM: '.'<input class = "input_text" type="text" name="aktivni_dslam" value="'.$pregledPodaci["aktivni_dslam"].'"></p>';
							echo '<p>Aktivni port: '.'<input class = "input_text" type="text" name="aktivni_port" value="'.$pregledPodaci["aktivni_port"].'"></p>';
							echo '<p>Aktivni MR: '.'<input class = "input_text" type="text" name="aktivni_mr" value="'.$pregledPodaci["aktivni_mr"].'"></p>';
							echo '<p>Aktivna pozicija: '.'<input class = "input_text" type="text" name="aktivna_pozicija" value="'.$pregledPodaci["aktivna_pozicija"].'"></p>';
							echo '<p>Tip preuzete opreme: '.'<input class = "input_text" type="text" name="tip_preuzete" value="'.$pregledPodaci["tip_preuzete"].'"></p>';
							echo '<p>Model preuzete opreme: '.'<input class = "input_text" type="text" name="model_preuzete" value="'.$pregledPodaci["model_preuzete"].'"></p>';
							echo '<p>Serijski broj preuzete opreme: '.'<input class = "input_text" type="text" name="serijski_preuzete" value="'.$pregledPodaci["serijski_preuzete"].'"></p>';
							echo '<p>Kompanija preuzete opreme: '.'<input class = "input_text" type="text" name="kompanija_preuzete" value="'.$pregledPodaci["kompanija_preuzete"].'"></p>';
							echo '<p>Tip postavljene opreme: '.'<input class = "input_text" type="text" name="tip_postavljene" value="'.$pregledPodaci["tip_postavljene"].'"></p>';
							echo '<p>Model postavljene opreme: '.'<input class = "input_text" type="text" name="model_postavljene" value="'.$pregledPodaci["model_postavljene"].'"></p>';
							echo '<p>Serijski broj postavljene opreme: '.'<input class = "input_text" type="text" name="serijski_postavljene" value="'.$pregledPodaci["serijski_postavljene"].'"></p>';
							echo '<p>Kompanija postavljene opreme: '.'<input class = "input_text" type="kompanija_postavljene" value="'.$pregledPodaci["kompanija_postavljene"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis porta, promjena oprema "da" ispis zadaci, dslam_aktivni, oprema
						echo '<p><button type="submit" name="update17">Update</button>';
						echo '<button type="submit" name="delete17">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis porta, promjena oprema "da" ispis zadaci, dslam_aktivni, oprema

					// ako je upis parica, upis port, upis oprema "da" ispis zadaci, parica_aktivna, dslam_aktivni, ukljucenje DELETE 18 UPDATE 18
					if ($pregled["upis_parice"] == da && $pregled["upis_porta"] == da && $pregled["upis_opreme"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam_aktivni`, `ukljucenje`, `parica_aktivna` WHERE zadaci.broj_kartice = '$hidden'  && dslam_aktivni.broj_kartice = '$hidden' && ukljucenje.kartica = '$hidden' && parica_aktivna.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivna parica: '.'<input class = "input_text" type="text" name="aktivna_pp" value"'.$pregledPodaci["aktivna_pp"].'"></p>';
							echo '<p>Pozicija aktivne parice: '.'<input class = "input_text" type="text" name="aktivna_pp_pozicija" name="aktivna_pp_pozicija" value="'.$pregledPodaci["aktivna_pp_pozicija"].'"></p>';
							echo '<p>Aktivni DSLAM: '.'<input class = "input_text" type="text" name="aktivni_dslam" value="'.$pregledPodaci["aktivni_dslam"].'"></p>';
							echo '<p>Aktivni port: '.'<input class = "input_text" type="text" name="aktivni_port" value="'.$pregledPodaci["aktivni_port"].'"></p>';
							echo '<p>Aktivni MR: '.'<input class = "input_text" type="text" name="aktivni_mr" value="'.$pregledPodaci["aktivni_mr"].'"></p>';
							echo '<p>Aktivna pozicija: '.'<input class = "input_text" type="text" name="aktivna_pozicija" value="'.$pregledPodaci["aktivna_pozicija"].'"></p>';
							echo '<p>Tip opreme: '.'<input class = "input_text" type="text" name="tip" value="'.$pregledPodaci["tip"].'"></p>';
							echo '<p>Model opreme: '.'<input class = "input_text" type="text" name="model" value="'.$pregledPodaci["model"].'"></p>';
							echo '<p>Serijski broj opreme: '.'<input class = "input_text" type="text" name="serijski" value="'.$pregledPodaci["serijski"].'"></p>';
							echo '<p>Kompanija opreme: '.'<input type="kompanija" value="'.$pregledPodaci["kompanija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis parica, upis port, upis oprema "da" ispis zadaci, parica_aktivna, dslam_aktivni, ukljucenje
						echo '<p><button type="submit" name="update18">Update</button>';
						echo '<button type="submit" name="delete18">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis parica, upis port, upis oprema "da" ispis zadaci, parica_aktivna, dslam_aktivni, ukljucenje

					// ako je upis parice, upis port, promjena oprema "da" ispis zadaci, parica_aktivna, dslam_aktivni, oprema DELETE 19 UPDATE 19
					if ($pregled["upis_parice"] == da && $pregled["upis_porta"] == da && $pregled["promjena_oprema"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam_aktivni`, `oprema`, `parica_aktivna` WHERE zadaci.broj_kartice = '$hidden'  && dslam_aktivni.broj_kartice = '$hidden' && oprema.broj_kartice = '$hidden' && parica_aktivna.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivna parica: '.'<input class = "input_text" type="text" name="aktivna_pp" value"'.$pregledPodaci["aktivna_pp"].'"></p>';
							echo '<p>Pozicija aktivne parice: '.'<input class = "input_text" type="text" name="aktivna_pp_pozicija" name="aktivna_pp_pozicija" value="'.$pregledPodaci["aktivna_pp_pozicija"].'"></p>';
							echo '<p>Aktivni DSLAM: '.'<input class = "input_text" type="text" name="aktivni_dslam" value="'.$pregledPodaci["aktivni_dslam"].'"></p>';
							echo '<p>Aktivni port: '.'<input class = "input_text" type="text" name="aktivni_port" value="'.$pregledPodaci["aktivni_port"].'"></p>';
							echo '<p>Aktivni MR: '.'<input class = "input_text" type="text" name="aktivni_mr" value="'.$pregledPodaci["aktivni_mr"].'"></p>';
							echo '<p>Aktivna pozicija: '.'<input class = "input_text" type="text" name="aktivna_pozicija" value="'.$pregledPodaci["aktivna_pozicija"].'"></p>';
							echo '<p>Tip preuzete opreme: '.'<input class = "input_text" type="text" name="tip_preuzete" value="'.$pregledPodaci["tip_preuzete"].'"></p>';
							echo '<p>Model preuzete opreme: '.'<input class = "input_text" type="text" name="model_preuzete" value="'.$pregledPodaci["model_preuzete"].'"></p>';
							echo '<p>Tip postavljene opreme: '.'<input class = "input_text" type="text" name="tip_postavljene" value="'.$pregledPodaci["tip_postavljene"].'"></p>';
							echo '<p>Model postavljene opreme: '.'<input class = "input_text" type="text" name="model_postavljene" value="'.$pregledPodaci["model_postavljene"].'"></p>';
							echo '<p>Serijski broj postavljene opreme: '.'<input class = "input_text" type="text" name="serijski_postavljene" value="'.$pregledPodaci["serijski_postavljene"].'"></p>';
							echo '<p>Kompanija postavljene opreme: '.'<input class = "input_text" type="kompanija_postavljene" value="'.$pregledPodaci["kompanija_postavljene"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis parice, upis port, promjena oprema "da" ispis zadaci, parica_aktivna, dslam_aktivni, oprema
						echo '<p><button type="submit" name="update19">Update</button>';
						echo '<button type="submit" name="delete19">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis parice, upis port, promjena oprema "da" ispis zadaci, parica_aktivna, dslam_aktivni, oprema

					// ako je upis oprema "da" ispis zadaci, ukljucenje DELETE 20 UPDATE 20
					if ($pregled["upis_opreme"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `ukljucenje` WHERE zadaci.broj_kartice = '$hidden' && ukljucenje.kartica = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';

							/*echo $pregledPodaci["tip"];
							echo $pregledPodaci["korisnik"];*/

							echo '<p>Tip opreme: '.'<input class = "input_text" type="text" name="tip" value="'.$pregledPodaci["tip"].'"></p>';
							echo '<p>Model opreme: '.'<input class = "input_text" type="text" name="model" value="'.$pregledPodaci["model"].'"></p>';
							echo '<p>Serijski broj opreme: '.'<input class = "input_text" type="text" name="serijski" value="'.$pregledPodaci["serijski"].'"></p>';
							echo '<p>Kompanija opreme: '.'<input class = "input_text" type="kompanija" value="'.$pregledPodaci["kompanija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci["broj_kartice"].'">';
						}//kraj while petlje ako je upis oprema "da" ispis zadaci, ukljucenje
						echo '<p><button type="submit" name="update20">Update</button>';
						echo '<button type="submit" name="delete20">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis oprema "da" ispis zadaci, ukljucenje

					// ako je unos opreme i upis parice "da" ispis zadaci, parica_aktivna, ukljucenje DELETE 21 UPDATE 21
					if ($pregled["upis_opreme"] == da && $pregled["upis_parice"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `ukljucenje`, `parica_aktivna` WHERE zadaci.broj_kartice = '$hidden'  && ukljucenje.kartica = '$hidden' && parica_aktivna.broj_kartice = $hidden";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivna parica: '.'<input class = "input_text" type="text" name="aktivna_pp" value="'.$pregledPodaci["aktivna_pp"].'"></p>';
							echo '<p>Pozicija aktivne parice: '.'<input class = "input_text" type="text" name="aktivna_pp_pozicija" value="'.$pregledPodaci["aktivna_pp_pozicija"].'"></p>';
							echo '<p>Tip opreme: '.'<input class = "input_text" type="text" name="tip" value="'.$pregledPodaci["tip"].'"></p>';
							echo '<p>Model opreme: '.'<input class = "input_text" type="text" name="model" value="'.$pregledPodaci["model"].'"></p>';
							echo '<p>Serijski broj opreme: '.'<input class = "input_text" type="text" name="serijski" value="'.$pregledPodaci["serijski"].'"></p>';
							echo '<p>Kompanija opreme: '.'<input class = "input_text" type="kompanija" value="'.$pregledPodaci["kompanija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je unos opreme i upis parice "da" ispis zadaci, parica_aktivna, ukljucenje
						echo '<p><button type="submit" name="update21">Update</button>';
						echo '<button type="submit" name="delete21">Obriši</button>';
						echo '</form>';
					}// kraj ako je unos opreme i upis parice "da" ispis zadaci, parica_aktivna, ukljucenje

					// ako je upis opreme i promjena parice "da" ispis zadaci, parica, ukljucenje DELETE 22 UPDATE 22
					if ($pregled["upis_opreme"] == da && $pregled["promjena_parice"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `ukljucenje`, `parica` WHERE zadaci.broj_kartice = '$hidden'  && ukljucenje.kartica = '$hidden' && parica.broj_kartice = $hidden";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stara parica: '.'<input class = "input_text" type="text" name="stara_pp" value="'.$pregledPodaci["stara_pp"].'"></p>';
							echo '<p>Pozicija stare parice: '.'<input class = "input_text" type="text" name="stara_pp_pozicija" value="'.$pregledPodaci["stara_pp_pozicija"].'"></p>';
							echo '<p>Nova parica: '.'<input class = "input_text" type="text" name="nova_pp" value="'.$pregledPodaci["nova_pp"].'"></p>';
							echo '<p>Pozicija nove parice: '.'<input class = "input_text" type="text" name="nova_pp_pozicija" value="'.$pregledPodaci["nova_pp_pozicija"].'"></p>';
							echo '<p>Tip opreme: '.'<input class = "input_text" type="text" name="tip" value="'.$pregledPodaci["tip"].'"></p>';
							echo '<p>Model opreme: '.'<input class = "input_text" type="text" name="model" value="'.$pregledPodaci["model"].'"></p>';
							echo '<p>Serijski broj opreme: '.'<input class = "input_text" type="text" name="serijski" value="'.$pregledPodaci["serijski"].'"></p>';
							echo '<p>Kompanija opreme: '.'<input class = "input_text" type="kompanija" value="'.$pregledPodaci["kompanija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis opreme i promjena parice "da" ispis zadaci, parica, ukljucenje
						echo '<p><button type="submit" name="update22">Update</button>';
						echo '<button type="submit" name="delete22">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis opreme i promjena parice "da" ispis zadaci, parica, ukljucenje

					// ako je unos oprema i promjena port "da" ispis zadaci, ukljucenje, dslam DELETE 23 UPDATE 23
					if ($pregled["upis_opreme"] == da && $pregled["promjena_porta"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `ukljucenje`, `dslam` WHERE zadaci.broj_kartice = '$hidden'  && ukljucenje.kartica = '$hidden' && dslam.broj_kartice = $hidden";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stari DSLAM: '.'<input class = "input_text" type="text" name="stari_dslam" value="'.$pregledPodaci["stari_dslam"].'"></p>';
							echo '<p>Stari port: '.'<input class = "input_text" type="text" name="stari_port" value="'.$pregledPodaci["stari_port"].'"></p>';
							echo '<p>Stari MR: '.'<input class = "input_text" type="text" name="stari_mr" value="'.$pregledPodaci["stari_mr"].'"></p>';
							echo '<p>Stara pozicija: '.'<input class = "input_text" type="text" name="stara_pozicija" value="'.$pregledPodaci["stara_pozicija"].'"></p>';
							echo '<p>Novi DSLAM: '.'<input class = "input_text" type="text" name="novi_dslam" value="'.$pregledPodaci["novi_dslam"].'"></p>';
							echo '<p>Novi port: '.'<input class = "input_text" type="text" name="novi_port" value="'.$pregledPodaci["novi_port"].'"></p>';
							echo '<p>Novi MR: '.'<input class = "input_text" type="text" name="novi_mr" value="'.$pregledPodaci["novi_mr"].'"></p>';
							echo '<p>Nova pozicija: '.'<input class = "input_text" type="text" name="nova_pozicija" value="'.$pregledPodaci["nova_pozicija"].'"></p>';
							echo '<p>Tip opreme: '.'<input class = "input_text" type="text" name="tip" value="'.$pregledPodaci["tip"].'"></p>';
							echo '<p>Model opreme: '.'<input class = "input_text" type="text" name="model" value="'.$pregledPodaci["model"].'"></p>';
							echo '<p>Serijski broj opreme: '.'<input class = "input_text" type="text" name="serijski" value="'.$pregledPodaci["serijski"].'"></p>';
							echo '<p>Kompanija opreme: '.'<input class = "input_text" type="kompanija" value="'.$pregledPodaci["kompanija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je unos oprema i promjena port "da" ispis zadaci, ukljucenje, dslam
						echo '<p><button type="submit" name="update23">Update</button>';
						echo '<button type="submit" name="delete23">Obriši</button>';
						echo '</form>';
					}// kraj ako je unos oprema i promjena port "da" ispis zadaci, ukljucenje, dslam

					// ako je upis oprema i upis port "da" ispis zadaci, ukljucenje, dslam_aktivni DELETE 24 UPDATE 24
					if ($pregled["upis_opreme"] == da && $pregled["upis_porta"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam_aktivni`, `ukljucenje` WHERE zadaci.broj_kartice = '$hidden'  && dslam_aktivni.broj_kartice = '$hidden' && ukljucenje.kartica = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Aktivni DSLAM: '.'<input class = "input_text" type="text" name="aktivni_dslam" value="'.$pregledPodaci["aktivni_dslam"].'"></p>';
							echo '<p>Aktivni port: '.'<input class = "input_text" type="text" name="aktivni_port" value="'.$pregledPodaci["aktivni_port"].'"></p>';
							echo '<p>Aktivni MR: '.'<input class = "input_text" type="text" name="aktivni_mr" value="'.$pregledPodaci["aktivni_mr"].'"></p>';
							echo '<p>Aktivna pozicija: '.'<input class = "input_text" type="text" name="aktivna_pozicija" value="'.$pregledPodaci["aktivna_pozicija"].'"></p>';
							echo '<p>Tip opreme: '.'<input class = "input_text" type="text" name="tip" value="'.$pregledPodaci["tip"].'"></p>';
							echo '<p>Model opreme: '.'<input class = "input_text" type="text" name="model" value="'.$pregledPodaci["model"].'"></p>';
							echo '<p>Serijski broj opreme: '.'<input class = "input_text" type="text" name="serijski" value="'.$pregledPodaci["serijski"].'"></p>';
							echo '<p>Kompanija opreme: '.'<input class = "input_text" type="kompanija" value="'.$pregledPodaci["kompanija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis oprema i upis port "da" ispis zadaci, ukljucenje, dslam_aktivni
						echo '<p><button type="submit" name="update24">Update</button>';
						echo '<button type="submit" name="delete24">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis oprema i upis port "da" ispis zadaci, ukljucenje, dslam_aktivni

					//ako je upis oprema, promjena parica i promjena port "da" ispis zadaci, ukljucenje, parica, dslam DELETE 25 UPDATE 25
					if ($pregled["upis_opreme"] == da && $pregled["promjena_porta"] == da && $pregled["promjena_parice"] == da) {
						$pregledQuery = "SELECT * FROM `zadaci`, `dslam`, `ukljucenje`, `parica` WHERE zadaci.broj_kartice = '$hidden'  && dslam.broj_kartice = '$hidden' && ukljucenje.kartica = '$hidden' && parica.broj_kartice = '$hidden'";
						$pregled = mysql_query($pregledQuery) or die(mysql_error());

						while ($pregledPodaci = mysql_fetch_array($pregled)) {
							echo "<form action=pregled.php method=post>";
							echo '<p>Broj kartice: '.'<input class = "input_text" type="text" name="broj_kartice" value="'.$pregledPodaci["broj_kartice"].'"></p>';
							echo '<p>Korisnik: '.'<input class = "input_text" type="text" name="korisnik" value="'.$pregledPodaci["korisnik"].'"></p>';
							echo '<p>Kontakt broj: '.'<input class = "input_text" type="text" name="kontakt" value="'.$pregledPodaci["kontakt"].'"></p>';
							echo '<p>Naziv zadatka: '.'<input class = "input_text" type="text" name="zadatak" value="'.$pregledPodaci["zadatak"].'"></p>';
							echo '<p>Tip zadatka: '.'<input class = "input_text" type="text" name="tip_zadatka" value="'.$pregledPodaci["tip_zadatka"].'"></p>';
							echo '<p>Broj telefona: '.'<input class = "input_text" type="text" name="broj_telefona" value="'.$pregledPodaci["broj_telefona"].'"></p>';
							echo '<p>Asset: '.'<input class = "input_text" type="text" name="asset" value="'.$pregledPodaci["asset"].'"></p>';
							echo '<p>Adresa: '.'<input class = "input_text" type="text" name="adresa" value="'.$pregledPodaci["adresa"].'"></p>';
							echo '<p>Zabiljeska: '.'<input class = "input_text" type="text" name="zabiljeska" value="'.$pregledPodaci["zabiljeska"].'"></p>';
							echo '<p>Stara parica: '.'<input class = "input_text" type="text" name="stara_pp" value="'.$pregledPodaci["stara_pp"].'"></p>';
							echo '<p>Pozicija stare parice: '.'<input class = "input_text" type="text" name="stara_pp_pozicija" value="'.$pregledPodaci["stara_pp_pozicija"].'"></p>';
							echo '<p>Nova parica: '.'<input class = "input_text" type="text" name="nova_pp" value="'.$pregledPodaci["nova_pp"].'"></p>';
							echo '<p>Pozicija nove parice: '.'<input class = "input_text" type="text" name="nova_pp_pozicija" value="'.$pregledPodaci["nova_pp_pozicija"].'"></p>';
							echo '<p>Stari DSLAM: '.'<input class = "input_text" type="text" name="stari_dslam" value="'.$pregledPodaci["stari_dslam"].'"></p>';
							echo '<p>Stari port: '.'<input class = "input_text" type="text" name="stari_port" value="'.$pregledPodaci["stari_port"].'"></p>';
							echo '<p>Stari MR: '.'<input class = "input_text" type="text" name="stari_mr" value="'.$pregledPodaci["stari_mr"].'"></p>';
							echo '<p>Stara pozicija: '.'<input class = "input_text" type="text" name="stara_pozicija" value="'.$pregledPodaci["stara_pozicija"].'"></p>';
							echo '<p>Novi DSLAM: '.'<inputclass = "input_text"  type="text" name="novi_dslam" value="'.$pregledPodaci["novi_dslam"].'"></p>';
							echo '<p>Novi port: '.'<input class = "input_text" type="text" name="novi_port" value="'.$pregledPodaci["novi_port"].'"></p>';
							echo '<p>Novi MR: '.'<input class = "input_text" type="text" name="novi_mr" value="'.$pregledPodaci["novi_mr"].'"></p>';
							echo '<p>Nova pozicija: '.'<input class = "input_text" type="text" name="nova_pozicija" value="'.$pregledPodaci["nova_pozicija"].'"></p>';
							echo '<p>Tip opreme: '.'<input class = "input_text" type="text" name="tip" value="'.$pregledPodaci["tip"].'"></p>';
							echo '<p>Model opreme: '.'<input class = "input_text" type="text" name="model" value="'.$pregledPodaci["model"].'"></p>';
							echo '<p>Serijski broj opreme: '.'<input class = "input_text" type="text" name="serijski" value="'.$pregledPodaci["serijski"].'"></p>';
							echo '<p>Kompanija opreme: '.'<input class = "input_text" type="kompanija" value="'.$pregledPodaci["kompanija"].'"></p>';
							echo '<input type="hidden" name="hidden" value="'.$pregledPodaci['broj_kartice'].'">';
						}//kraj while petlje ako je upis oprema, promjena parica i promjena port "da" ispis zadaci, ukljucenje, parica, dslam
						echo '<p><button type="submit" name="update25">Update</button>';
						echo '<button type="submit" name="delete25">Obriši</button>';
						echo '</form>';
					}// kraj ako je upis oprema, promjena parica i promjena port "da" ispis zadaci, ukljucenje, parica, dslam
				}//kraj while petlje click na gumb "Pregled"
			}// kraj click na gumb "Pregled"
		?>
	</div><!-- div class="index"-->
	</div><!-- div class="omotac"-->
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