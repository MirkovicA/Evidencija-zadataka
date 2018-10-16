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
				

				if (document.getElementById('izvjestaj_datum').value == "") {

						praznaForma += "Nisu uneseni parametri pretrage. \n";
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
		<form name="dnevni_izvjestaj" method="post">
			<p>Unesite datum: <input class = "input_text" type="text" name="izvjestaj_datum" id="izvjestaj_datum"></p>
			<button type="submit" name="btn_izvjestaj" formaction="izvjestaj.php">Ispis</button>
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