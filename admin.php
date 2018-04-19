<?php include "config.php"; ?>
<?php
if ( ! get_magic_quotes_gpc() ) {
  $_POST['add'] = addslashes(strip_tags($_POST['add']));
  $_POST['nomelab'] = addslashes(strip_tags($_POST['nomelab']));
  $_POST['nometecnico'] = addslashes(strip_tags($_POST['nometecnico']));
  $_GET['dellab'] = addslashes(strip_tags($_GET['dellab']));
  $_GET['deltecnico'] = addslashes(strip_tags($_GET['deltecnico']));
  $_GET['enable'] = addslashes(strip_tags($_GET['enable']));
  $_GET['disable'] = addslashes(strip_tags($_GET['disable']));
  $_GET['blocconote'] = addslashes(strip_tags($_GET['blocconote']));
}

if($_GET[blocconote] == "0"){
	$query_disabilita_blocconote="UPDATE settings SET stato = 0 WHERE nome = \"blocconote\"";
	mysql_query($query_disabilita_blocconote);
}elseif($_GET[blocconote] == "1"){
	$query_abilita_blocconote="UPDATE settings SET stato = 1 WHERE nome = \"blocconote\"";
	mysql_query($query_abilita_blocconote);
}

if ($_POST[add] == "addlab"){
	if($_POST[nomelab] == ""){
		$error = "<p class=\"error\">Non puoi lasciare vuoto il campo del nome...</p>";
	}else{
		$query="INSERT INTO lab VALUES('', '" . $_POST[nomelab] . "')";
		$result = mysql_query($query);
	}
}elseif($_POST[add] == "addtecnico"){
	if($_POST[nometecnico] == ""){
		$error = "<p class=\"error\">Non puoi lasciare vuoto il campo del nome...</p>";
	}else{
		$query="INSERT INTO tecnici VALUES('', '" . $_POST[nometecnico] . "', '0')";
		$result = mysql_query($query);
	}
}
if($_GET[dellab]){
	$query="DELETE FROM lab WHERE id =" . $_GET[dellab];
	$result = mysql_query($query);
}/*elseif($_GET[deltecnico]){
	$query="DELETE FROM tecnici WHERE id =" . $_GET[deltecnico];
	$result = mysql_query($query);
}*/

if($_GET[enable]){
	$query="UPDATE tecnici SET punteggio = 1 WHERE id =" . $_GET[enable];
	$result = mysql_query($query);
}elseif($_GET[disable]){
	$query="UPDATE tecnici SET punteggio = 0 WHERE id =" . $_GET[disable];
	$result = mysql_query($query);
}
?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
			<div class="titolo">
				Pannello di Ammistrazione
				<?php include "menu.php"; ?>
			</div>
<?php
if($error != ""){
echo $error;
}
?>
<table class="tabella">
	<tr>
		<th>Gestione Laboratori</th>
		<th>Gestione Nominativi</th>
		<th>Altro</th>
	</tr>
	<tr><td>
						<table class="tabella">


<?php
$query="SELECT * FROM lab";
$result = mysql_query($query);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_array($result, MYSQL_NUM)){
	echo "<tr><td>" . $row[1] . "</td><td><abbr title=\"Elimina\"><a href=\"admin.php?dellab=" . $row[0] . "\"><img src=\"img/del.png\" alt=\"cancella\" /></a></abbr></td></tr>\n";
}
?>
							<tr>
								<td>
									<form action="admin.php" method="post">
										<input type="text" name="nomelab" />
								</td>
								<td>
										<abbr title="Aggiungi"><input type="image" name="add" value="addlab" src="img/add.png" alt="add" /></abbr>
									</form>
								</td>
							</tr>
						</table>
</td><td>
						<table class="tabella">
<?php
$querytecnici="SELECT * FROM tecnici";
$resulttecnici = mysql_query($querytecnici);
while($rowtecnici = mysql_fetch_array($resulttecnici)){
	echo "<tr><td>" . $rowtecnici[1] . "</td>";
	if($rowtecnici[2] == 1){
		echo "<td><abbr title=\"Utente abilitato. Clicka per disabilitarlo\"><a href=\"admin.php?disable=" . $rowtecnici[0] . "\"><img src=\"img/enable.png\" alt=\"Disabilita\" /></a></abbr></td></tr>";
	}elseif($rowtecnici[2] == 0){
		echo "<td><abbr title=\"Utente disabilitato. Clicka per abilitarlo\"><a href=\"admin.php?enable=" . $rowtecnici[0] . "\"><img src=\"img/disable.png\" alt=\"Abilita\" /></a></abbr></td></tr>";
	}
	//echo "<td><a href=\"admin.php?deltecnico=" . $rowtecnici[0] . "\"><img src=\"img/del.png\" alt=\"cancella\" /></a></td></tr>";
}
?>
							<tr>
								<td>
									<form action="admin.php" method="post">
										<input type="text" name="nometecnico" />
								</td>
								<td>
										<abbr title="Aggiungi"><input type="image" name="add" value="addtecnico" src="img/add.png" alt="add" /></abbr>
									</form>
								</td>
							</tr>
						</table>
</td><td>
				<table class="tabella">
<?php
$query_settings_blocconote="SELECT stato FROM settings WHERE nome = \"blocconote\"";
$result_settings_blocconote=mysql_query($query_settings_blocconote);
$stato=mysql_fetch_row($result_settings_blocconote);
?>
					<tr>
						<td>Blocco note.</td>
<?php
if($stato[0] == 0){ echo "<td><a href=\"admin.php?blocconote=1\"><img src=\"img/disable.png\" /></a></td>\n"; }
elseif($stato[0] == 1){ echo "<td><a href=\"admin.php?blocconote=0\"><img src=\"img/enable.png\" /></a></td>\n"; }
?>
					</tr>
				</table>
			<p>
				Legenda:<br />
				<img src="img/enable.png" alt="Enable" /> Abilitato. Clicka per disabilitarlo.<br />
				<img src="img/disable.png" alt="Disable" /> Disabilitato. Clicka per abilitarlo.<br />
				<img src="img/del.png" alt="Cancella" /> Elimina definitivamente.<br />
				<img src="img/add.png" alt="Aggiungi" /> Aggiungi campo.
			</p>
</td></tr></table>
</body>
</html>
