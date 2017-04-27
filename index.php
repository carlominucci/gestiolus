<?php 
if(file_exists("config.php")){
	include("config.php");
	header("Location: guasti.php");
}else{
	header("Location: install.php");
}
?>
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

	<?php //include("note.php"); ?>
	<?php //header("Location: guasti.php"); ?>
	
</body>
</html>
