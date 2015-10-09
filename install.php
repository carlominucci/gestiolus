<?php
function stampa_errore(){
	echo "<p class=\"error\">\n";
	echo "Sembra che la directory del tuo server web non abbia i permessi di scrittura.<br />\n";
	echo "Cambia i permessi oppure configura a mano il file <i>config_example.php</i> e rinominalo in <i>config.php</i>.<br />\n";
	?>
	<form method="post" action="install.php">
		Crea le tabelle <input type="submit" value="Crea le tabelle" name="createtable" />
	</form>
	<?php
	echo "</p>\n";
}
function stampa_form(){
	?>
	Inserisci i dati che verranno poi salvati nel file <i>config.php</i><br />
	<form method="post" action="install.php">
		<!-- <input type="hidden" name="config" value="y" />
		<input type="text" name="database" value="gestiolusdev" /> Nome del Database<br />
		<input type="checkbox" name="db" value="createdb" /> Crea il database<br />
		<input type="text" name="host" value="localhost" /> Hostname<br />
		<input type="text" name="user" /> Username<br />
		<input type="password" name="password" /> Password<br />
		<input type="text" name="title" value="Gestiolus" /> Titolo della Pagina<br />
		Controllo automatico degli aggiornamenti?
			<input checked="checked" type="radio" name="update" value="yes"/> Si
			<input type="radio" name="update" value="no"/> No<br />-->
		<input type="submit" value="Installa" name="createtable" />
	</form>
	<?php
}
function installa(){
	echo $_POST['database'];
	if($_POST['db'] == "createdb"){
		$sql = 'CREATE DATABASE ' . $_POST['database'];
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
		echo "<article>\n<p class=\"install\">\n";
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
		echo "</p></article>";
	}
	mysql_close($link);
}
?>
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
$filename = 'config.php';
if(isset($_POST[createtable])){
	if($_POST['config'] == "y"){
		echo "ciao";
	}else{
	}
}elseif(!isset($_POST[createtable])){
	if (is_writable($filename)) {
		if (!$handle = fopen($filename, 'a')) {
			stampa_errore();
			exit;
		}
		if (fwrite($handle, $somecontent) === FALSE) {
			stampa_errore();
			exit;
		}
		stampa_form();
		fclose($handle);
	} else {
		stampa_errore();
		echo "</p>\n";
	}
}
?>
</body>
</html>
