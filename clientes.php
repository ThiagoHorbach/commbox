<div class="col-xs-12">
		<?
	if($_GET['a'] == 'listar'){
     ?>
        <form action="painel.php?m=clientes&a=listar" method="post">
            <div class="input-group">
                <input type="text" name="pesquisa" class="form-control" placeholder="Pesquise por nome" value="<?=!empty($_POST['pesquisa']) ? $_POST['pesquisa'] : NULL?>">
                <div class="input-group-btn">
                  <button class="btn btn-default tam_pesq" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
            </div>
        </form>
     <?   
	}
	
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
			
			if(!empty($_POST['pesquisa'])){
				$clientes->lista_clientes_pesquisa($_POST['pesquisa']);
			}else{
				$clientes->lista_clientes();
			}
			
		}else if($_GET['a'] == 'editar'  || $_GET['a'] == 'novo'){
			include('cliente_novo.php');
		}
		
		?>
    
</div>