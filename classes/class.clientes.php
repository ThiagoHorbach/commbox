<?php

class Clientes{
	public $id;
	public $nome;
	public $senha;
	public $cpf;
	public $mae;
	public $pai;
	public $data_nascimento;
	public $cidade;
	
	function getId(){
		return $this->id;	
	}
	function getNome(){
		return $this->nome;	
	}
	function getSenha(){
		return $this->senha;	
	}
	function getCpf(){
		return $this->cpf;	
	}
	function getMae(){
		return $this->mae;	
	}
	function getPai(){
		return $this->pai;	
	}
	function getData_nascimento(){
		return $this->data_nascimento;	
	}
	function getCidade(){
		return $this->cidade;	
	}

	function setId($id){
		$this->id = $id;
	}
	function setNome($nome){
		$this->nome = $nome;
	}
	function setSenha($senha){
		$this->senha = $senha;
	}
	function setCpf($cpf){
		$this->cpf = $cpf;
	}
	function setMae($mae){
		$this->mae = $mae;
	}
	function setPai($pai){
		$this->pai = $pai;
	}
	function setData_nascimento($data_nascimento){
		$this->data_nascimento = $data_nascimento;
	}
	function setCidade($cidade){
		$this->cidade = $cidade;
	}
	
	
	
	function busca_dados_cliente($id){
		$arquivo = fopen("txts/clientes.txt", "r");
		if ($arquivo) {
			while (($linha = fgets($arquivo, 4096)) !== false) {
				$dados = explode('|',$linha);
				if($dados[0] == $id){
					$this->setId($dados[0]);
					$this->setNome($dados[1]);
					$this->setSenha($dados[2]);
					$this->setData_nascimento($dados[3]);
					$this->setCidade($dados[4]);
					$this->setCpf($dados[5]);
					$this->setMae($dados[6]);
					$this->setPai($dados[7]);
				}
			}
		}
		fclose($arquivo);
	}
	
	function busca_ultimo_id(){
		$arquivo = fopen("txts/clientes.txt", "r");
		if ($arquivo) {
			while (($linha = fgets($arquivo, 4096)) !== false) {
				$dados = explode('|',$linha);
				$ultimo_id = $dados[0];
			}
		}
		fclose($arquivo);
		return $ultimo_id;	
	}
	
	
	function atualiza_cliente($c_id,$c_nome,$c_data_nasc,$c_cpf,$c_mae,$c_pai,$c_cidade,$c_senha){
		$linha_antiga = $this->getId()."|".
						$this->getNome()."|".
						$this->getSenha()."|".
						$this->getData_Nascimento()."|".
						$this->getCidade()."|".
						$this->getCpf()."|".
						$this->getMae()."|".
						$this->getPai()."|";
		if(!empty($c_senha)){
			$nova_senha = $this->getSenha();	
		}else{
			$nova_senha = md5($c_senha);
		}
		
		$nova_linha = $c_id."|".
					  $c_nome."|".
					  $nova_senha."|".
					  $c_data_nasc."|".
					  $c_cidade."|".
					  $c_cpf."|".
					  $c_mae."|".
					  $c_pai."|";	
		
		$arquivo = "txts/clientes.txt";
		$content=file_get_contents($arquivo);
    	$content_chunks=explode($linha_antiga, $content);
    	$content=implode($nova_linha, $content_chunks);
    	file_put_contents($arquivo, $content);
		
	}
	
	
	function cadastra_cliente($c_nome,$c_data_nasc,$c_cpf,$c_mae,$c_pai,$c_cidade,$c_senha){
		
		$nova_linha = "\r\n".($this->busca_ultimo_id()+1)."|".
					  $c_nome."|".
					  md5($c_senha)."|".
					  $c_data_nasc."|".
					  $c_cidade."|".
					  $c_cpf."|".
					  $c_mae."|".
					  $c_pai."|";	
		
		$arquivo = fopen("txts/clientes.txt", 'a');
		fwrite($arquivo, $nova_linha);
		fclose($arquivo);
		
	}
	
	
	function excluir_cliente($exc){
		$this->busca_dados_cliente($exc);
		$linha_antiga = $this->getId()."|".
						$this->getNome()."|".
						$this->getSenha()."|".
						$this->getData_Nascimento()."|".
						$this->getCidade()."|".
						$this->getCpf()."|".
						$this->getMae()."|".
						$this->getPai()."|\r\n";	
		$arquivo = "txts/clientes.txt";
		$content=file_get_contents($arquivo);
    	$content_chunks=explode($linha_antiga, $content);
    	$content=implode("", $content_chunks);
    	file_put_contents($arquivo, $content);
	}
	
	function lista_clientes(){
		$arquivo = fopen("txts/clientes.txt", "r");
		if ($arquivo) {
			$lista = "<table class='table table-striped'>
						<thead>
						  <tr>
								<th>Nome</th>
								<th>CPF</th>
								<th>Opções</th>
							  </tr>
						</thead>
						<tbody>";
			while (($linha = fgets($arquivo, 4096)) !== false) {
				$dados = explode('|',$linha);
				//id,nome,senha,data_nascimento,cidade,cpf,mae,pai
				//echo "Nome: $nome, Login: $login, Senha: ".md5($senha)."<br />";
				
				$lista.="
					<tr>
						<td>{$dados[1]}</td>
						<td>{$dados[5]}</td>
						<td>
							 <a href='painel.php?m=clientes&a=editar&id={$dados[0]}'>
								<span class='glyphicon glyphicon-pencil'></span>
							 </a> 
							 
							 <a href='painel.php?m=clientes&a=listar&excluir={$dados[0]}'>
								<span class='glyphicon glyphicon-remove'></span>
							 </a>
						</td>
					</tr>
				";
			}
			fclose($arquivo);
				$lista.="</tbody>
    				</table>";
			echo $lista;
		}
	}
	
	
		
}
?>
