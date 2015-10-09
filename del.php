<?php
include "config.php";
if(isset($_GET['id'])){
	if ( ! get_magic_quotes_gpc() ) {
  		$_GET['id'] = addslashes(strip_tags($_GET['id']));
  	}
	$query="DELETE FROM guasti WHERE id=" . $_GET[id];
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		$result = mysql_query($query);
		if (!$result) {
    			die('Invalid query: ' . mysql_error());
		}
	}
	mysql_close($link);
}	
?>

<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<meta HTTP-EQUIV="Refresh" content="0; url=guasti.php">
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
	<section>
		<article>
			<p>
				<img src="img/loading.gif" alt="Attendere prego" />
				Attendere prego...
			</p>
		</article>
	</section>
</body>
</html>