<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
<?php
if ( ! get_magic_quotes_gpc() ) {
  //$_GET['nome'] = addslashes(strip_tags($_GET['nome']));
  $_POST['id'] = addslashes(strip_tags($_POST['id']));
  $_POST['filtro'] = addslashes(strip_tags($_POST['filtro']));
  
}
?>
		<div class="titolo">
			Report interventi
			<?php include "menu.php"; ?>
		</div>
		<form action="report.php" method="post">
			Seleziona il nome: <select name="filtro">
			<option value="tutti">Tutti</option>
	<?php
	if (!$link) {
	  		die('Could not connect: ' . mysql_error());
	}else{
		$query="SELECT * FROM tecnici ORDER BY id DESC";
		$result = mysql_query($query);
		if (!$result) {
	  		die('Invalid query: ' . mysql_error());
		}
		while ($row = mysql_fetch_array($result, MYSQL_NUM)){
			//echo "<a class=\"nomi\" href=\"report.php?id=" . $row[0] . "&nome=" . $row[1] . "\">" . $row[1] . "</a>\n";
			echo "<option value=\"" . $row[0] . "\">" . $row[1] . "</option>\n";
		}
	}
	?>
		<!-- <a class="nomi" href="report.php?filtro=tutti">Tutti gli interventi</a> -->
				
			</select>
			<input type="submit" value="Filtra" />
		</form>
		<br /><a href="export2csv.php">Esporta tutto in formato CSV</a>
		
<?php
if($_POST['filtro'] == "" || $_POST['filtro'] == "tutti"){
?>
                        <p>
                                <table class="tabella">
                                        <tr>
						<th>Cod/Inv</th>
                                                <th>Computer</th>
                                                <th>Ubicazione</th>
                                                <th>Problema Riscontrato</th>
                                                <th>Soluzione</th>
                                                <th>Data Apertura</th>
                                                <th>Data Chiusura</th>
                                                <th>Tecnico</th>
                                        </tr>
        <?php
                if (!$link) {
                        die('Could not connect: ' . mysql_error());
                }else{
                        $query="SELECT * FROM guasti WHERE stato='1' ORDER BY data_chiusura DESC";
                        $result = mysql_query($query);
                        echo "<br /><hr />Numero totale di interventi <b>: " . mysql_affected_rows() . "</b><br /><br />\n";
			if (!$result) {
                                die('Invalid query: ' . mysql_error());
                        }
                        while ($row = mysql_fetch_array($result, MYSQL_NUM)){
                        	$querytecnico="SELECT nome FROM tecnici WHERE id=" . $row[7];
                        	$resulttecnico=mysql_query($querytecnico);
                        	$risolutore=mysql_fetch_array($resulttecnico);
                                echo "<tr>\n";
                                echo "<td>$row[10]</td><td>$row[1]<br />$row[10]</td><td>$row[2]</td><td>" . stripslashes($row[3]) . "</td><td>" . stripslashes($row[6]) . "</td><td>" . str_replace("-", "/", $row[5]) . "</td><td>" . str_replace("-", "/", $row[8]) . "</td><td>" . $risolutore[0] . "</td>\n";
                                ?>
                                <?php
                                echo "</tr>\n";
                        }
		}
}
elseif(isset($_POST['filtro'])){
?>
			<p>
				<table class="tabella">
					<tr>
						<th>Cod/Inv</th>
						<th>Computer</th>
						<th>Ubicazione</th>
						<th>Problema Riscontrato</th>
						<th>Soluzione</th>
						<th>Data Apertura</th>
						<th>Data Chiusura</th>
					</tr>
	<?php
		if (!$link) {
	   		die('Could not connect: ' . mysql_error());
		}else{
			$queryname="SELECT nome FROM tecnici WHERE id=" . $_POST['filtro'];
			$resultname=mysql_query($queryname);
			$nome = mysql_fetch_array($resultname);
			$query="SELECT * FROM guasti WHERE stato = '1' AND risolutore = '" . $_POST['filtro'] . "' ORDER BY data_chiusura DESC";
			$result = mysql_query($query);
			echo "<br /><hr />Numero totale di interventi effettuati da <b>". $nome[0] . "</b>:<b> " . mysql_affected_rows() . "</b><br />";
			echo "(<a href=\"export2csv.php?filtro=" . $_POST['filtro'] . "\">Esporta in formato CSV</a>)<br /><br />\n";
			if (!$result) {
	    			die('Invalid query: ' . mysql_error());
			}
			while ($row = mysql_fetch_array($result, MYSQL_NUM)){
	    			echo "<tr>\n";
				echo "<td>$row[10]</td><td>$row[1]</td><td>$row[2]</td><td>" . stripslashes($row[3]) . "</td><td>" . stripslashes($row[6]) . "</td><td>" . str_replace("-", "/", $row[5]) . "</td><td>" . str_replace("-", "/", $row[8]) . "</td>\n";
				?>
				<?php
				echo "</tr>\n";
			}
		}
		mysql_close($link);
}
//echo $query;
	?>		
	
				</table>
			</p>
</body>
</html>
