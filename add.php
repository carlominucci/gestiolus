<?php include "config.php"; ?>
<?php
include "config.php";
if(isset($_POST['nomepc']) && isset($_POST['ubicazione']) && isset($_POST['guasto']) && isset($_POST['nome'])){
	$guasto=addslashes(strip_tags($_POST['guasto']));
	$nomepc=addslashes(strip_tags($_POST['nomepc']));
	$nome=addslashes(strip_tags($_POST['nome']));
	$ubicazione=addslashes(strip_tags($_POST['ubicazione']));	
	$codice=addslashes(strip_tags($_POST['codice']));	
	$priorita=addslashes(strip_tags($_POST['priorita']));
	$query="INSERT INTO guasti VALUES('', '$nomepc', '$ubicazione', '$guasto', '$nome', '" . date('Y-m-d') . "', '', '', '', '0', '$codice', '$priorita')";
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
		<meta HTTP-EQUIV="Refresh" content="<?php echo rand(1,5); ?>; url=guasti.php">
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
	<section>
		<article>
			<div class="titolo">
				<?php include("menu.php"); ?>
			</div>
		</article>
		<article>
			<p>
				<img src="img/ok.png" alt="Guasto segnalato" />
				Guasto segnalato correttamente. Uno dei tecnici interverrà al più presto.
			</p>
		</article>
	</section>
</body>
</html>
