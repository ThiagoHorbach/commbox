<div class="col-xs-12">
		<?
		//edita o cliente
		if(!empty($_POST['id'])){
		$clientes = new Clientes();
		$clientes->busca_dados_cliente($_POST['id']);
		$clientes->atualiza_cliente($_POST['id'],
									$_POST['nome'],
									$_POST['data_nascimento'],
									$_POST['cpf'],
									$_POST['mae'],
									$_POST['pai'],
									$_POST['cidade'],
									$_POST['senha'],
									$_POST['senha_antiga']);
		}
		
		//cadastra o cliente
		if(!empty($_POST['nome']) && empty($_POST['id'])){
			$clientes = new Clientes();
			$clientes->cadastra_cliente($_POST['nome'],
										$_POST['data_nascimento'],
										$_POST['cpf'],
										$_POST['mae'],
										$_POST['pai'],
										$_POST['cidade'],
										$_POST['senha']);	
						
		}
		
		
	
		
		//lista ou abre o arquivo de edicao
		if($_GET['a'] == 'listar'){
        	$clientes = new Clientes();
			
			if(!empty($_GET['excluir'])){
				$clientes->excluir_cliente($_GET['excluir']);
			}
		
			$clientes->lista_clientes();
		}else if($_GET['a'] == 'editar'  || $_GET['a'] == 'novo'){
			include('cliente_novo.php');
		}
		
		?>
    
</div>