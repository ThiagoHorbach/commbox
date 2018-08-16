<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teste Commbox</title>

<?php include"arquivos_externos.php"; ?>
</head>

<body>
<div class="col-xs-12">
<?
$erro = "&nbsp;";
	include "funcoes.php";
	if(!empty($_POST['login']) && !empty($_POST['senha'])){
		$arquivo = fopen ('txts/admin.txt', 'r');
		$usuario_encontrado = false;
		$senha_md5 = md5($_POST['senha']);
		
		while (($linha = fgets($arquivo, 4096)) !== false) {
			$dados = explode('|',$linha);
		
			$nome = $dados[1];
			$login = $dados[2];
			$senha = $dados[3];
			//echo "Nome: $nome, Login: $login, Senha: ".md5($senha)."<br />";
			
			if ($login == $_POST['login'] && $senha == $senha_md5) {
				$usuario_encontrado = true;
				break;
			}
		}
		fclose($arquivo);
		
		if(!$usuario_encontrado){
			$erro =  "Nenhum Usuário com estes dados";
		}else{
			//aqui vai redirecionar e criar sessao
			session_name('commbox_sistemas');
			session_start();
			$_SESSION['nome'] = $nome;
			$_SESSION['login'] = $login;
			echo("<script>document.location.href='painel.php';</script>");
		}
	}
?>
</div>

<div class="col-xs-4">&nbsp;</div>
<div class="col-xs-4 bloco_login">
	<form name="logar" method="POST" action="">
      <div class="input-group distancia">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="email" type="text" class="form-control" name="login" placeholder="Login">
      </div>
      <div class="input-group distancia">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="senha" placeholder="Senha">
      </div>
      <div class="col-xs-8 mensagem_erro">
      	<?php echo $erro;?>&nbsp;
      </div>
      <div class="col-xs-4 input-group posicionamento_botao distancia">
   	  	<button type="submit" class="btn btn-default">Acessar</button>  
      </div>
    </form>
</div>

</body>
</html>