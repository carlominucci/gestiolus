<?php include "config.php"; ?>
<?php include "function.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
			<div class="titolo">
				Lista guasti aperti
				<?php include "menu.php"; ?>
			</div>
<?php
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		$query="SELECT * FROM guasti WHERE stato = '0' ORDER BY priorita DESC, data_apertura";
		$result = mysql_query($query);
		if (!$result) {
    			die('Invalid query: ' . mysql_error());
		}
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0){
			echo "<h2>nessun intervento aperto...</h2><hr />";
		}else{
?>
                                <table class="tabella">
                                        <tr>
                                                <th>Descrizione / Nome</th>
                                                <th>Ubicazione</th>
                                                <th>Problema Riscontrato</th>
                                                <th>Data</th>
                                                <th>Soluzione</th>
                                                <th>Tecnico chiusura</th>
                                        </tr>

<?php
		}
		while ($row = mysql_fetch_array($result, MYSQL_NUM)){
    			echo "<tr>\n";
			echo "<td>$row[1]<p class=\"segnalatoda\">cod./inv.: <b>$row[10]</b></p></td>";
			echo "<td>$row[2]</td><td style=\"border-left: 5px solid";
			if($row[11] == "0"){
				echo " green";
			}elseif($row[11] == "1"){
				echo " yellow";
			}elseif($row[11] = "2"){
				echo " red";
			}
			echo ";\">";
			greppaurl(stripslashes($row[3]));
			echo "<br />";
			if($row[4] != ""){
				echo "<p class=\"segnalatoda\">segnalato da: <b>" . $row[4] . "</b></p>";
			}
			echo "</td><td><p class=\"data\">" .  str_replace("-", "/", $row[5]) . "</p></td>\n";
			?>
				<form action="chiudi.php" method="POST">
					<td><textarea name="soluzione" rows="3" cols="20"></textarea></td>
					<td>
						<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
						<select name="tecnico">
						<?php
						$querytecnici="SELECT * FROM tecnici WHERE punteggio = 1";
						$resulttecnici = mysql_query($querytecnici);
						while($rowtecnici = mysql_fetch_array($resulttecnici)){
								echo "<option value=\"" . $rowtecnici[0] . "\">" . $rowtecnici[1] . "</option>";
						}
						?>
						</select><br />
						<abbr title="Elimina: <?php echo $row[3]; ?>">
							<a href="del.php?id=<?php echo $row[0]; ?>"><img src="img/del.png" alt="cancella" /></a> 
						</abbr>						
						<abbr title="Modifica: <?php echo $row[3]; ?>">
                                                        <a href="edit.php?id=<?php echo $row[0]; ?>"><img src="img/edit.png" alt="modifica" /></a>            
                                                </abbr>
						<abbr title="Chiudi: <?php echo $row[3]; ?>">							
							<input type="image" src="img/done.png" alt="Ok" />
						</abbr>
					</td>
				</form>
			<?php
			echo "</tr>\n";
		}
	}
	mysql_close($link);

?>				</table>
<?php include("note.php"); ?>
</body>
</html>

