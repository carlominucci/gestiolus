<?php
header("Content-Type: text/plain");
include "config.php";
if (!$link) {
	die('Could not connect: ' . mysql_error());
}else{
	if(!isset($_GET['filtro'])){
		$query="SELECT * FROM guasti WHERE stato='1' ORDER BY data_chiusura DESC";
	}elseif(isset($_GET['filtro'])){
		$query="SELECT * FROM guasti WHERE stato='1' AND risolutore = '" . $_GET['filtro'] . "' ORDER BY data_chiusura DESC";
	}
	//echo $query;
        $result = mysql_query($query);
	if (!$result) {
        	die('Invalid query: ' . mysql_error());
        }
        while ($row = mysql_fetch_array($result, MYSQL_NUM)){
        	$querytecnico="SELECT nome FROM tecnici WHERE id=" . $row[7];
                $resulttecnico=mysql_query($querytecnico);
                $risolutore=mysql_fetch_array($resulttecnico);
                echo "\"$row[0]\",\"$row[1]\",\"$row[10]\",\"$row[2]\",\"" . str_replace("\"", "'", $row[3]) . "\",\"" . str_replace("\"", "'", $row[6]) . "\",\"" . str_replace("-", "/", $row[5]) . "\",\"" . str_replace("-", "/", $row[8]) . "\",\"" . $risolutore[0] ."\"\n";
        }
}
?>		
