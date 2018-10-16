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
	</div>

	<div class="index">

<?php

	
	//require 'functions.php';

	$izvjestajDatum = $_POST["izvjestaj_datum"];
	$user = $_SESSION['user_username'];


	// funkcija za pretvaranje datuma iz oblika DD.MM.GGGG. u oblik GGGG-MM-DD
	function pretvoriDatum($datumUbazi){

		$niz = explode(".", $datumUbazi);
		$datumUbazi = $niz[2]."-".$niz[1]."-".$niz[0];
		return $datumUbazi;
		
	}

	
	// pozivanje funkcije za pretvaranje datuma u oblik GGGG-MM-DD kao sto je u bazi
	$datumIspis = pretvoriDatum($izvjestajDatum);


	echo '<h2>'.$izvjestajDatum.'</h2>';
	
	// pretraga broja smetnji za odredjeni datum
	$smetnje = mysql_query("SELECT `tip_zadatka`, `datum` FROM `zadaci` WHERE `datum` = '$datumIspis' && `tip_zadatka` = 'smetnja' && `user` = '$user'");
	$brojSmetnji = mysql_num_rows($smetnje);
	echo '<p>Smetnje: '.$brojSmetnji.'</p>';

	//pretraga broja ukljucenja za odredjeni datum
	$ukljucenja = mysql_query("SELECT `tip_zadatka`, `datum` FROM `zadaci` WHERE `datum` = '$datumIspis' && `tip_zadatka` = 'ukljucenje' && `user` = '$user'");
	$brojUkljucenja = mysql_num_rows($ukljucenja);
	echo '<p>Uključenja: '.$brojUkljucenja.'</p>';


	//pretraga broja ostalih za odredjeni datum
	$ostalo = mysql_query("SELECT `tip_zadatka`, `datum` FROM `zadaci` WHERE `datum` = '$datumIspis' && `tip_zadatka` = 'ostalo' && `user` = '$user'");
	$brojOstalo = mysql_num_rows($ostalo);
	echo '<p>Ostalo: '.$brojOstalo.'</p>';

	

?>
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