<?php
// persolizza i tuoi parametri
$title = "Gestiolus";			// il titolo che comparirà sulla barra del browser
$hostname = "localhost";		// l'host del tuo database
$username = "root";		// il nome utente per accedere al database
$password = "cf81003";	// la password per accedere al database
$database = "gestiolus";	// il nome del tuo database
$checkupdate = "y"; 		// controllo aggiornamenti: y = abilitato, n = disabilitato

// non toccare niente qua sotto

$link = mysql_connect($hostname, $username, $password);
mysql_select_db($database);
?>
