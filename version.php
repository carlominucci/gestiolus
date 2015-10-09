<?php
/*
include("config.php");
$filename = "VERSION";
$handle = fopen($filename, "r");
$localversion = fread($handle, filesize($filename));
fclose($handle);

echo "<a href=\"http://code.google.com/p/gestiolus/\">Gestiolus </a>";
echo "v. " . $localversion;
if($checkupdate == "y"){
	$file = fopen ("https://gestiolus.googlecode.com/git/VERSION", "r");
	if (!$file) {
		echo "<p>Unable to open remote file.\n";
		exit;
	}
	$onlineversion = fread($file, 1024);
	fclose($file);
	if(trim($localversion) < trim($onlineversion)){
		echo " (E' disponibile la versione <a href=\"http://code.google.com/p/gestiolus/downloads/list\">" .  $onlineversion . "</a>) ";
	}
}
*/
?>
