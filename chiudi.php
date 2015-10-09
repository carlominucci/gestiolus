<?php
include "config.php";
if (!$link) {
   	die('Could not connect: ' . mysql_error());
}else{
	if ( ! get_magic_quotes_gpc() ) {
  		$_POST['soluzione'] = addslashes(strip_tags($_POST['soluzione']));
  		$_POST['tecnico'] = addslashes(strip_tags($_POST['tecnico']));
  		$_POST['id'] = addslashes(strip_tags($_POST['id']));
  	}
	$query = "UPDATE guasti SET stato = '1', data_chiusura = CURRENT_DATE, soluzione = '" . $_POST['soluzione'] . "', risolutore = '" . $_POST['tecnico'] . "' WHERE id = '" . $_POST[id] . "';";
	$result = mysql_query($query);
	if (!$result) {
    		die('Invalid query: ' . mysql_error());
	}
}
?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<meta HTTP-EQUIV="Refresh" content="0; url=guasti.php">
		<title><?php echo $title; ?></title>
	</head>
</html>

