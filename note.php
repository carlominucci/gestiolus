<?php
include "config.php";
$query_stato_blocconote="SELECT stato FROM settings WHERE nome = \"blocconote\"";
$stato=mysql_fetch_row(mysql_query($query_stato_blocconote));
if($stato[0] == 1){
if(isset($_POST['note'])){
	if ( ! get_magic_quotes_gpc() ) {
  		$_POST['note'] = addslashes(strip_tags($_POST['note']));
		$_POST['name'] = addslashes(strip_tags($_POST['name']));
  	}
	$query="INSERT INTO notepad VALUES('', '". $_POST['note'] . "', '" . $_POST['name'] . "')";
	echo $query;
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		$result = mysql_query($query);
		if (!$result) {
    			die('Invalid query: ' . mysql_error());
		}
	}
	mysql_close($link);
	header('Location: index.php');
}elseif(isset($_GET['delid'])){
	if ( ! get_magic_quotes_gpc() ) {
  		$_GET['delid'] = addslashes(strip_tags($_GET['delid']));
  	}
	$query="DELETE FROM notepad WHERE id=" . $_GET[delid];
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		$result = mysql_query($query);
		if (!$result) {
    			die('Invalid query: ' . mysql_error());
		}
	}
	mysql_close($link);
	header('Location: index.php');
}else{	
?>
<div class="notepad">
<form action="note.php" method="post">

	<input type="text" name="note" class="inputnote" value="Inserisci la nota..." onClick="javascript:this.value=''" size="45%" />
	<input type="text" name="name" class="inputnote" value="Nome..." onClick="javascript:this.value=''" size="13%" />
	<input type="submit" value=" annota " class="submitnote" />
</form>

<?php
$query="SELECT * FROM notepad ORDER BY id DESC";
$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	while ($row = mysql_fetch_array($result, MYSQL_NUM)){
		echo "<p class=\"inputnote\">" . $row[1] . " <i class=\"delnote\">annotato da<b>: " . $row[2] . "</b><a href=\"note.php?delid=" . $row[0] . "\"><img src=\"img/del.png\" alt=\"cancella\" /></a></i> </p>\n";
	}
}
?>
</div>
<?php
}
?>
