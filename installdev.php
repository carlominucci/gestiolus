<?php //include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title>Gestiolus Installer</title>
		<style>
		<?php include 'style.css'; ?>
		</style>
		
	</head>
<body>
		<div class="titolo">Installazione Gestiolus</div>
<?php
if(isset($_POST[createtable])){
	$config = "<?php\n";
	$config .= "\$title=\"" . $_POST['title'] . "\";\n";
	$config .= "\$hostname=\"" . $_POST['host'] . "\";\n";
	$config .= "\$username=\"" . $_POST['user'] . "\";\n";
	$config .= "\$password=\"" . $_POST['password'] . "\";\n";
	$config .= "\$database=\"" . $_POST['database'] . "\";\n";
	$config .= "\$checkupdate=\"" . $_POST['update'] . "\";\n";
	$config .= "?>\n";
	$filename = 'config.php';
	if (is_writable($filename)) {
		if (!$handle = fopen($filename, 'a')) {
			echo "Cannot open file ($filename)";
			exit;
		}
		if (fwrite($handle, $somecontent) === FALSE) {
			echo "Cannot write to file ($filename)";
			exit;
		}
		echo "Success, wrote ($somecontent) to file ($filename)";
		fclose($handle);
	} else {
		echo "The file $filename is not writable";
		echo "<p>" . nl2br(htmlentities($config)) . "</p>";
	}
	
	$link = mysql_connect($_POST[hostname], $_POST[user], $_POST[password]);
	if($_POST['db'] == "createdb")
	{
		echo $_POST['database'];
		$sql = 'CREATE DATABASE my_db';
		if (mysql_query($sql, $link)) {
			echo "Database " . $_POST['database'] . " creato con successo\n";
		} else {
			echo 'Error creating database: ' . mysql_error() . "\n";
		}
	}
	mysql_select_db($_POST['database']);

	
	$query1="CREATE TABLE IF NOT EXISTS `guasti` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nomepc` varchar(100) NOT NULL,
  `ubicazione` varchar(50) NOT NULL,
  `descrizione` text NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_apertura` date NOT NULL,
  `soluzione` text NOT NULL,
  `risolutore` varchar(50) NOT NULL,
  `data_chiusura` date NOT NULL,
  `stato` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;";
	$query2="CREATE TABLE IF NOT EXISTS `lab` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;";
	$query3="CREATE TABLE IF NOT EXISTS `tecnici` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `punteggio` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;";
	$query4="CREATE TABLE IF NOT EXISTS `notepad` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `note` text NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;";

	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		echo "<p class=\"install\">\n";
		echo "<ul>\n";
		$result = mysql_query($query1);
		if (!$result) {
    			die('<p class=\"error\">Invalid query: ' . mysql_error()) . '</p>';
		}else{
			echo "<li>Query 1: ok</li>";
		}
		$result = mysql_query($query2);
		if (!$result) {
    			die('<p class=\"error\">Invalid query:  ' . mysql_error()) . '</p>';
		}else{
			echo "<li>Query 2: ok</li>";
		}
		$result = mysql_query($query3);
		if (!$result) {
    			die('<p class=\"error\">Invalid query:  ' . mysql_error()) . '</p>';
		}else{
			echo "<li>Query 3: ok</li>";
		}
		$result = mysql_query($query4);
		if (!$result) {
    			die('<p class=\"error\">Invalid query:  ' . mysql_error()) . '</p>';
		}else{
			echo "<li>Query 4: ok</li>";
		}
		echo "<li>Installazione completata.</li>";
		echo "<li>Cancella il file <b>install.php</b> nella directory di Gestiolus del server web</li>";
		echo "<li>Comincia a <a href=\"admin.php\">configurare Gestiolus</a></li>";
		echo "</ul>\n";
		echo "</p>";
	}
	mysql_close($link);
}elseif(!isset($_POST[createtable])){
?>
		<p>
			Inserisci i dati che verranno poi salvati nel file <i>config.php</i><br />
			<form method="post" action="install.php">
				<input type="text" name="database" value="gestiolusdev" /> Nome del Database<br />
				<input type="checkbox" name="db" value="createdb" /> Crea il database<br />
				<input type="text" name="host" value="localhost" /> Hostname<br />
				<input type="text" name="user" /> Username<br />
				<input type="password" name="password" /> Password<br />
				<input type="text" name="title" value="Gestiolus" /> Titolo della Pagina<br />
				Controllo automatico degli aggiornamenti?
					<input checked="checked" type="radio" name="update" value="yes"/> Si
					<input type="radio" name="update" value="no"/> No<br />
				<input type="submit" value="Installa" name="createtable" />
			</form>
		</p>
<?php
}
?>
</body>
</html>
