<?php
ob_start();
require 'connect.php';
?>
<!DOCTYPE html lang="hr">
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Evidencija</title>
	<link href="css/reset.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="login">
			<!--<img src="images/login.jpg" alt="login">-->

	<div class="naslov"><h2>Evidencija odrađenih zadataka</h2></div>

<?php




if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!empty($username) && !empty($password)) {
		
		$upit = "SELECT * FROM `korisnici` WHERE `username`='$username' AND `password`='$password'";

		if ($q=mysql_query($upit)) {
			$query_num_rows = mysql_num_rows($q);
			if ($query_num_rows==0) {
				echo '<p>Pogrešno korisničko ime ili lozinka.</p>';
			}else if ($query_num_rows==1) {
				$user_id = mysql_result($q, 0, 'id');
				$user_username = mysql_result($q, 0, 'username');
				$user_ime = mysql_result($q, 0, 'ime');
				$user_prezime = mysql_result($q, 0, 'prezime');
				$_SESSION['user_id'] = $user_id;
				$_SESSION['user_username'] = $user_username;
				$_SESSION['user_ime'] = $user_ime;
				$_SESSION['user_prezime'] = $user_prezime;
				header('Location: index.php');
				//echo $_SESSION['korisnici_id'];
				//echo $korisnici_username = mysql_result($q, 0, 'username');
			}

			}
	}else{
		echo '<p>Unesite korisničko ime i lozinku.</p>';
	}

}



?>

<form action="<?php echo $current_file; ?>" method="POST">
	<i class="fas fa-user fa-1x cust"></i>
	<input class="loginform" type="text" name="username" placeholder="Korisničko ime"><br>
	<i class="fas fa-lock fa-1x cust"></i>
	<input class="loginform" type="password" name="password" placeholder="Lozinka"><br><br>
	<button type="submit">Prijava</button>

</form>
</div>
</div>
</body>
<footer>
	<p class="footer">Copyright &copy Alojzije Mirković</p>
	<p class="footer"> Sva prava pridržana</p>
</footer>
</html>