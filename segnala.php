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
				<td>Selezionare un'aula</td>
				<td>
					<acronym title="Inserisci l'bicazione del computer guasto">
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
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Nome computer</td>
				<td>
					<acronym title="Inserisci il nome del computer. E' scritto su un lato del computer">
						<input type="text" name="nomepc" size="45" />
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Cod. / Inv.</td>
				<td>
					<acronym title="Codice o numero di inventario.">
						<input type="text" name="codice" size="10" />
					</acronym>
				</td>
			</tr>
			<tr>
				<td>
					Descrizione dettagliata<br />del tipo di problema
				</td>
				<td>
					<acronym title="Inserisci la descrizione dettagliata del problema riscontrato">
						<textarea name="guasto" rows="6" cols="48"></textarea>
					<acronym>
				</td>
			</tr>
			<tr>
				<td>Segnalato da:</td>
				<td>
					<acronym title="Inserisci nome dell'insegnante che segnala il guasto">
						<input type="text" name="nome" size="45"/>
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
