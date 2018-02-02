<?php include "config.php"; ?>
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
<form action="add.php" method="post">
	<p class="tabella">
		<table>
			<tr>
				<td>Unicazione</td>
				<td>
					<abbr title="Inserisci l'ubicazione del guasto">
						<select name="ubicazione">
<?php
$query="SELECT * FROM lab";
$result = mysql_query($query);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_array($result, MYSQL_NUM)){
	echo "<option value=\"" . $row[1] . "\">" . $row[1] . "</option>\n";
}
?>
						</select>
					</abbr>
				</td>
			</tr>
			<tr>
				<td>Descrizione / Nome</td>
				<td>
					<abbr title="Inserisci il nome del computer. E' scritto su un lato del computer">
						<input type="text" name="nomepc" size="45" />
					</abbr>
				</td>
			</tr>
			<tr>
				<td>Cod. / Inv.</td>
				<td>
					<abbr title="Codice o numero di inventario.">
						<input type="text" name="codice" size="10" />
					</abbr>
				</td>
			</tr>
			<tr>
				<td>
					Descrizione dettagliata<br />del tipo di problema
				</td>
				<td>
					<abbr title="Inserisci la descrizione dettagliata del problema riscontrato">
						<textarea name="guasto" rows="6" cols="48"></textarea>
					</abbr>
				</td>
			</tr>
			<tr>
				<td>Segnalato da:</td>
				<td>
					<abbr title="Inserisci nome di chi segnala il guasto">
						<input type="text" name="nome" size="45"/>
					</abbr>
				</td>
			</tr>
			<tr>
				<td>Priorità</td>
				<td>
					<abbr title="Dai una priorità">
						<select name="priorita">
							<option value="0">Bassa</option>
							<option value="1">Media</option>
							<option value="2">Alta</option>
						</select>
					</abbr>
				</td>
			</tr>
			<tr>
				<td>Salva</td>
				<td>
					<abbr title="Clicka per inviare la segnalazione guasto">
						<input type="image" src="img/floppy.png" alt="Segnala Guasto">
					</abbr>
				</td>
			</tr>
	
		</table>
	</form>
</body>
</html>
