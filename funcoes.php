<?php


function verifica_login($login_post, $senha_post){
	$arquivo = fopen ('txts/admin.txt', 'r');
	$usuario_encontrado = false;
	$senha_md5 = md5($senha_post);
	while(!feof($arquivo))
	{
		$linha = fgets($arquivo, 1024);
		$dados = explode('|',$linha);
		$nome = $dados[0];
		$login = $dados[1];
		$senha = $dados[2];
		//echo "Nome: $nome, Login: $login, Senha: ".md5($senha)."<br />";
		
		if ($login == $login_post && $senha == $senha_md5) {
        	$usuario_encontrado = true;
			break;
    	}
	}
	fclose($arquivo);
	
	if(!$usuario_encontrado){
		$erro =  "Nenhum Usuário com estes dados";
	}else{
		$erro = "tudo certo";	
	}
	echo "teste". $erro;
}

?>
