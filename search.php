<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
			<div class="titolo">
				Ricerca Guasti
				<?php include "menu.php"; ?>
			</div>
			<p>
			Inserisci le chiavi di ricerca<br />
			<form method="post" action="search.php">
				<input type="text" name="chiave" value="<?php echo $_POST["chiave"];  ?>" />
				<input type="submit" value="cerca" />
			</form>
<?php
	if ( ! get_magic_quotes_gpc() ) {
  		$_POST["chiave"] = addslashes($_POST["chiave"]);
  	}
	$chiave=$_POST["chiave"];
    if (isset($chiave) == false || $chiave == "")
    {
		?>
		<p>Specificare un criterio di ricerca.</p>
		<?php
    }else{
		$query_tecnici="SELECT id,nome FROM tecnici";
		$out_query_tecnici=mysql_query($query_tecnici, $link);
		$arr_tecnici=array();
		while($tec = mysql_fetch_array($out_query_tecnici)){
			$arr_tecnici[$tec[0]] = $tec[1];
		}
        $arr_txt = explode(" ", $chiave);
        $sql = "SELECT * FROM guasti WHERE ";
        for ($i=0; $i<count($arr_txt); $i++)
        {
            if ($i > 0)
            {
                $sql .= " AND ";
            }
            $sql .= "(descrizione LIKE '%" . $arr_txt[$i] . "%' OR codice LIKE '%" . $arr_txt[$i] . "%' OR nomepc LIKE '%" . $arr_txt[$i] . "%' OR soluzione LIKE '%" . $arr_txt[$i] . "%')";
        }
        //$sql .= " AND cat_id = art_categoria ORDER BY art_timestamp DESC";
		$sql .= " AND (stato ='1') ORDER BY data_chiusura DESC";
        $query = mysql_query($sql, $link);
		//echo $sql;
        $quanti = mysql_num_rows($query);
		//echo $quanti;
        if($quanti == 0){
			echo "<p>Nessun risultato!</p>";
        }elseif($quanti > 0){
			?>
			<table class="tabella">
				<tr>
					<th>Cod/Inv</th>
					<th>Computer</th>
					<th>Ubicazione</th>
					<th>Problema Riscontrato</th>
					<th>Data Chiusura</th>
					<th>Soluzione</th>
					<th>Tecnico chiusura</th>
				</tr>
			<?php
            for($x=0; $x<$quanti; $x++)
            {
                $rs = mysql_fetch_row($query);
				$id=$rs[7];
				echo "<tr><td>$rs[10]</td><td>$rs[1]</td><td>$rs[2]</td><td>$rs[3]";
				if($rs[4] != ""){
					echo "<p class=\"segnalatoda\">segnalato da: <b>" . $rs[4] . "</b></p>";
				}	
				echo "</td><td>$rs[8]</td><td>$rs[6]</td><td>$arr_tecnici[$id]</td></tr>";
            }
            echo "</table>";
        }
    }
?>

</body>
</html>
