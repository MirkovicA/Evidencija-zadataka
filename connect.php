<?php

	
		
		
		$mysql_host = 'localhost';
		$mysql_user = 'boleroko_ht';
		$mysql_pass = 'nesta1glupo';
		$mysql_db = 'boleroko_evidencija';

		if (!mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !mysql_select_db($mysql_db)) {
			echo 'Greska u povezivanju s bazom';
			die();
		}

	
	
?>