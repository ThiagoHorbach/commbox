<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teste Commbox</title>

<?php 
	session_name('commbox_sistemas');
	session_start();
	include"arquivos_externos.php"; 
	include"classes/class.clientes.php";
	include"restrito.php";
?>

</head>
<body>
<div class="col-xs-12 menu">
    
<nav class="navbar navbar-default" style="border-radius:0px">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="painel.php"><span class="glyphicon glyphicon-home"></span> Página Inicial</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Clientes 
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
                    	<li><a href="painel.php?m=clientes&a=novo"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>
                    	<li><a href="painel.php?m=clientes&a=listar"><span class="glyphicon glyphicon-user"></span> Listar</a></li>
                    	</ul>
      </li>
	</ul>
    <ul class="nav navbar-nav navbar-right">
    	<li><a style="cursor:text">Bem-vindo(a) <?=$_SESSION['nome']?>!</a></li>
    	<li><a href="sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
  </div>
</nav></div>
<div class="col-xs-12">
	<? 
		if(!empty($_GET['m']) && !empty($_GET['a'])){
			switch($_GET['m']){
				case 'clientes':
				if($_GET['a'] == 'listar'){
					include('clientes.php');
				}else if($_GET['a'] == 'novo' || $_GET['a'] == 'editar'){
					include('cliente_novo.php');
				}else{
					include("404.php");
				}
				break;
				default:
					include("404.php");
				
			}
		}
	?>
</div>

</body>
</html>