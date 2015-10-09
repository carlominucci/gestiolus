<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title>
		<style>
		<?php include 'style.css'; ?>
		</style>
		
	</head>
<body>
	<div class="titolo">
		Gestione Interventi
		<?php include("menu.php"); ?>
	</div>

	<?php include("note.php"); ?>
	
</body>
</html>
