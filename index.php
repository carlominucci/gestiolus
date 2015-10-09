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
	<!-- <div class="menu">
		<p class="icone">
			<abbr title="Lista guasti">
				<a href="guasti.php">
					<img src="img/view.png" alt="Lista guasti" />
				</a><br />
				Lista Guasti
			</abbr>
		</p>
		<p class="icone">
			<abbr title="Segnala guasto">
				<a href="segnala.php">
					<img src="img/new.png" alt="Segnala guasto" />
				</a><br />
				Segnala<br />guasto
			</abbr>
		</p>
		<p class="icone">
			<abbr title="Impostazioni">
				<a href="admin.php" >
					<img src="img/setting.png" alt="Impostazioni" />
				</a><br />
				Impostazioni
			</abbr>
		</p>
		<p class="icone">
			<abbr title="Ricerca guasti">
				<a href="search.php" >
					<img src="img/search.png" alt="Ricerca Guasti" />
				</a><br />
				Ricerca<br />Guasti
			</abbr>
		</p>
		<p class="icone">
			<abbr title="Report Interventi">
				<a href="report.php" >
					<img src="img/stat.png" alt="Report Interventi" />
				</a><br />
				Report<br />Interventi
			</abbr>
		</p>
	</div> -->

	<?php include("note.php"); ?>
	
	<p class="version">
	<?php include("version.php"); ?>
	</p>
</body>
</html>
