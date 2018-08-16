<?php
	if(!empty($_GET['id'])){
		$pagina = "painel.php?m=clientes&a=listar";	
		$clientes = new Clientes();
		$clientes->busca_dados_cliente($_GET['id']);
		
	}else{
		$pagina = "painel.php?m=clientes&a=listar";	
	}
	
	
?>

<div class="col-xs-12">
	<form class="form-horizontal" action="<?=$pagina?>" method="post">
      <input type="hidden" name="id" value="<?=!empty($_GET['id']) ? $clientes->getId() : NULL?>" />
      <input type="hidden" name="senha_antiga" id="senha_antiga" value="<?=!empty($_GET['id']) ? $clientes->getSenha() : NULL?>" />
       <div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome:</label>
        <div class="col-sm-10">
          <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do Cliente" value="<?=!empty($_GET['id']) ? $clientes->getNome() : NULL?>">
      	</div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2" for="data_nascimento">Data de Nascimento:</label>
        <div class="col-sm-10">
          <input type="text" name="data_nascimento" class="form-control date" id="data_nascimento" placeholder="Data Nascimento" value="<?=!empty($_GET['id']) ? $clientes->getData_nascimento() : NULL?>">
      	</div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2" for="cpf">CPF:</label>
        <div class="col-sm-10">
          <input type="text" name="cpf" class="form-control cpf" id="cpf" placeholder="CPF" value="<?=!empty($_GET['id']) ? $clientes->getCpf() : NULL?>">
      	</div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2" for="mae">Nome da Mãe:</label>
        <div class="col-sm-10">
          <input type="text" name="mae" class="form-control" id="mae" placeholder="Mãe" value="<?=!empty($_GET['id']) ? $clientes->getMae() : NULL?>">
      	</div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2" for="pai">Nome do Pai:</label>
        <div class="col-sm-10">
          <input type="text" name="pai" class="form-control" id="pai" placeholder="Pai" value="<?=!empty($_GET['id']) ? $clientes->getPai() : NULL?>">
      	</div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2" for="cidade">Cidade:</label>
        <div class="col-sm-10">
          <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" value="<?=!empty($_GET['id']) ? $clientes->getCidade() : NULL?>">
      	</div>
      </div>
       <div class="form-group">
        <label class="control-label col-sm-2" for="senha">Senha:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
      	</div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Cadastrar</button>
        </div>
      </div>
	</form>
</div>



<!--

1|Roberto da Silva|4088f79371d28c1b575f5d582a9c7be6|19/10/1990|Porto Alegre|012.111.211-22|Roberta da Silva|Rodrigo da Silva|
2|Roger Alberto Souza|4088f79371d28c1b575f5d582a9c7be6|19/10/1989|Porto Alegre|011.223.230-12|Raissa Maria Souza|Carlos João Souza|
3|Marcos Shultz|4088f79371d28c1b575f5d582a9c7be6|19/10/1976|Porto Alegre|033.113.312-22|Richelle Shultz|Marcio Shultz|


-->