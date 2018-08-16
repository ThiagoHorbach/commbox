<?php 
	session_name('commbox_sistemas');
	session_start();
	session_destroy();
	
	echo("<script>document.location.href='index.php';</script>");
	
?>
