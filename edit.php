<?php include "config.php"; ?>
<?php
if(isset($_GET['id'])){
	$query="SELECT * FROM guasti WHERE id = '$_GET[id]'";
	$result = mysql_query($query);
	if (!$result) {
    		die('Invalid query: ' . mysql_error());
	}
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
 		$nomepc=$row["nomepc"];
		$ubicazione=$row["ubicazione"];
		$descrizione=$row["descrizione"];
		$nome=$row["nome"];
		$data_apertura=$row["data_apertura"];
		$codice=$row["codice"];
		$priorita=$row["priorita"];
	}	
}else if(isset($_POST['id'])){
	$query_update="UPDATE guasti SET 
	nomepc='" . addslashes(strip_tags($_POST[nomepc])) . "',
	ubicazione='" . addslashes(strip_tags($_POST[ubicazione])) . "',
	descrizione='" . addslashes(strip_tags($_POST[descrizione])) . "',
	nome='" . addslashes(strip_tags($_POST[nome])) . "',
	priorita='" . addslashes(strip_tags($_POST[priorita])) . "'
	WHERE id=$_POST[id]";
	echo $query_update;
	$result = mysql_query($query_update);
        if (!$result) {
                die('Invalid query: ' . mysql_error());
        }
	header("location: guasti.php");
}

?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
		<div class="titolo">
			Segnalazione guasti
			<?php include "menu.php"; ?>
		</div>
<form action="edit.php" method="post">
<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
	<p class="tabella">
		<table>
			<tr>
				<td>Unicazione</td>
				<td>
					<acronym title="Inserisci l'ubicazione del guasto">
						<select name="ubicazione">
<?php
$query="SELECT * FROM lab";
$result = mysql_query($query);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_array($result, MYSQL_NUM)){
	echo "<option value=\"" . $row[1] . "\"";
	if($row[1] == $ubicazione){ echo " selected"; }	
	echo ">" . $row[1] . "</option>\n";
}
?>
						</select>
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Descrizione / Nome</td>
				<td>
					<acronym title="Inserisci il nome del computer. E' scritto su un lato del computer">
						<input type="text" name="nomepc" size="45" value="<?php echo $nomepc; ?>"/>
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Cod. / Inv.</td>
				<td>
					<acronym title="Codice o numero di inventario.">
						<input type="text" name="codice" size="10" value="<?php echo $codice; ?>"/>
					</acronym>
				</td>
			</tr>
			<tr>
				<td>
					Descrizione dettagliata<br />del tipo di problema
				</td>
				<td>
					<acronym title="Inserisci la descrizione dettagliata del problema riscontrato">
						<textarea name="descrizione" rows="6" cols="48"><?php echo $descrizione; ?></textarea>
					<acronym>
				</td>
			</tr>
			<tr>
				<td>Segnalato da:</td>
				<td>
					<acronym title="Inserisci nome di chi segnala il guasto">
						<input type="text" name="nome" size="45" value="<?php echo $nome; ?>" />
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Priorità</td>
				<td>
					<acronym title="Dai una priorità">
						<select name="priorita">
							<option value="0" <?php if($priorita==0){ echo "selected"; } ?>>Bassa</option>
							<option value="1" <?php if($priorita==1){ echo "selected"; } ?>>Media</option>
							<option value="2" <?php if($priorita==2){ echo "selected"; } ?>>Alta</option>
						</select>
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Salva</td>
				<td>
					<acronym title="Clicka per inviare la segnalazione guasto">
						<input type="image" src="img/floppy.png" alt="Segnala Guasto">
					</acronym>
				</td>
			</tr>
	
		</table>
	</form>
</body>
</html>
