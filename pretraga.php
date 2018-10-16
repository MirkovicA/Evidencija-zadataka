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
				

				if ((document.getElementById('pretraga_broj_kartice').value == "") && (document.getElementById('pretraga_datum').value == "") && (document.getElementById('pretraga_korisnik').value == "") && (document.getElementById('pretraga_broj_telefona').value == "") && (document.getElementById('pretraga_asset').value == "") && (document.getElementById('pretraga_adresa').value == "") && (document.getElementById('pretraga_kontakt').value == "") && ((document.getElementById('pretraga_dslam').value == "") || ((document.getElementById('pretraga_port').value == "") && (document.getElementById('pretraga_mr').value ==""))) && (document.getElementById('pretraga_parica').value =="") && (document.getElementById('pretraga_serijski').value =="")) {

						praznaForma += "Nisu uneseni potrebni podaci za pretragu. \n";
				}

				if (praznaForma != "") {

					alert(praznaForma);
					return false;
				}

				i

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
				</div>
				<div class="index">
				<form name="pretraga" method="post" onsubmit="return checkforblank();">
					<p>Unesite broj kartice: <input class = "input_text" type="text" name="pretraga_broj_kartice" id="pretraga_broj_kartice"></p>
					<p>Unesite datum: <input class = "input_text" type="text" name="pretraga_datum" id="pretraga_datum"></p>
					<p>Unesite naziv korisnika: <input class = "input_text" type="text" name="pretraga_korisnik" id="pretraga_korisnik"></p>
					<p>Unesite broj telefona: <input class = "input_text" type="text" name="pretraga_broj_telefona" id="pretraga_broj_telefona"></p>
					<p>Unesite asset korisnika: <input class = "input_text" type="text" name="pretraga_asset" id="pretraga_asset"></p>
					<p>Unesite adresu korisnika: <input class = "input_text" type="text" name="pretraga_adresa" id="pretraga_adresa"></p>
					<p>Unesite kontakt broj korisnika: <input class = "input_text" type="text" name="pretraga_kontakt" id="pretraga_kontakt"></p>

					<p>Unesite DSLAM: <input class = "input_text" type="text" name="pretraga_dslam" id="pretraga_dslam"></p>
					<p>Unesite DSLAM port u obliku Slot/Port: <input class = "input_text" type="text" name="pretraga_port" id="pretraga_port"></p>
					<p>Unesite MR DSLAM porta: <input class = "input_text" type="text" name="pretraga_mr" id="pretraga_mr"></p>
					<p>Unesite paricu: <input class = "input_text" type="text" name="pretraga_parica" id="pretraga_parica"></p>
					<p>Centrala: <input class = "input_text" type="text" name="pretraga_pp_pozicija" id="pretraga_pp_pozicija"></p>
					<p>Unesite serijski broj opreme: <input class = "input_text" type="text" name="pretraga_serijski" id="pretraga_serijski"></p>
					
					
					<button type="submit" name="pretraga" formaction="ispis.php">Pretraga</button>
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




	