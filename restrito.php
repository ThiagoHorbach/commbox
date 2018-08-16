<?php 
	if(empty($_SESSION['login']) || empty($_SESSION['nome'])){
		echo("<script>document.location.href='index.php';</script>");
		exit();	
	}
?>
