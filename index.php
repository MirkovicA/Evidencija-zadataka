<?php
	ob_start();
	require 'connect.php';
	require 'session.php';
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
			var errorProvjera = "";
			if ((document.getElementById('broj_kartice').value == "") || (document.getElementById('datum').value == "") || (document.getElementById('zadatak').value == "") || (document.getElementById('korisnik').value == "") || (document.getElementById('broj_telefona').value == "") || (document.getElementById('asset').value == "") || (document.getElementById('adresa').value == "") || (document.getElementById('kontakt').value == "") || (document.getElementById('zabiljeska').value == "")) {
					praznaForma += "Nisu uneseni svi podaci. \n";
			}
			if (praznaForma != "") {
				alert(praznaForma);
				return false;
			}
			if ((document.getElementById('upis_parice').value == "da" && document.getElementById('promjena_parice').value == "da") || (document.getElementById('upis_porta').value == "da" && document.getElementById('promjena_porta').value == "da") || (document.getElementById('promjena_oprema').value == "da" && document.getElementById('unos_opreme').value == "da")) {
					errorProvjera += "U istom trenutku nije moguća i promjena i upis parice, porta ili opreme. \n";
			}
			if (errorProvjera != "") {
				alert(errorProvjera);
				return false;
			}
		}// function checkforblank
	</script>
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
			<form method="post" onsubmit="return checkforblank();">
				<p>Broj kartice: <input class = "input_text" type="text" id="broj_kartice" name="broj_kartice"></p>
				<p>Datum: <input class = "input_text" type="text" id="datum" name="datum"></p>
				<p>Zadatak: <input class = "input_text" type="text" id="zadatak" name="zadatak"></p>
				<p>Tip zadatka:
					<select class = "input_text" name="tip_zadatka">
						<option value="smetnja">Smetnja</option>
						<option value="ukljucenje">Uključenje</option>
						<option value="ostalo">Ostalo</option>
					</select></p>
				<p>Korisnik: <input class = "input_text" type="text" id="korisnik" name="korisnik"></p>
				<p>Broj telefona: <input class = "input_text" type="text" id="broj_telefona" name="broj_telefona"></p>
				<p>Asset ID: <input class = "input_text" type="text" id="asset" name="asset"></p>
				<p>Adresa: <input class = "input_text" type="text" id="adresa" name="adresa"></p>
				<p>Kontakt: <input class = "input_text" type="text" id="kontakt" name="kontakt"></p>
				<p>Zabilješka: <input class = "input_text"  type="text" id="zabiljeska" name="zabiljeska"></p>
				<p>Upis aktivne parice:
					<select class = "input_text" name="upis_parice" id="upis_parice">
						<option value="ne">NE</option>
						<option value="da">DA</option>
					</select></p>
				<p>Promjena parice:
					<select class = "input_text" name="promjena_parice" id="promjena_parice">
						<option value="ne">NE</option>
						<option value="da">DA</option>
					</select>
				</p>
				<p>Unos aktivnog DSLAM porta:
					<select class = "input_text" name="upis_porta" id="upis_porta">
						<option value="ne">NE</option>
						<option value="da">DA</option>
					</select></p>
				<p>Promjena DSLAM porta:
					<select class = "input_text" name="promjena_porta" id="promjena_porta">
						<option value="ne">NE</option>
						<option value="da">DA</option>
					</select>
				</p>
				<p>Promjena na opremi: 
					<select class = "input_text" name="promjena_oprema" id="promjena_oprema">
						<option value="ne">NE</option>
						<option value="da">DA</option>
					</select></p>
				<p>Unos opreme:
					<select class = "input_text" name="unos_opreme" id="unos_opreme">
						<option value="ne">NE</option>
						<option value="da">DA</option>
					</select></p>
				<button type="submit" name="unos" formaction="upis.php" >Spremi</button>
			</form>
		</div><!-- div class="index"-->
	</div><!-- div class="omotac"-->
</body>
<footer>
	<p class="footer"><b>Copyright &copy Alojzije Mirković</p>
	<p class="footer">Sva prava pridržana<b></p>
</footer>
</html>
<?php
	// if (loggedin())
	}else{
		include 'login.php';
	}
?>