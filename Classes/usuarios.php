<?php 


Class Usuario{

	private $pdo; 
	public $msgErro = "";

		//Método para conexão com Banco de dados - PDO
	public function conexao($nome, $host, $usuario, $senha){

		global $pdo;
		try {
			$pdo = new PDO("mysql: dbname=".$nome.";host:".$host,$usuario,$senha);
		} catch (PDOException $e) {
		 global $msgErro = $e->getMessage();
		}	

	}


	public function cadastrar($nome,$telefone,$email,$senha){
		global $pdo;

		//Verificação de cadastro, verifica se já existe no banco.

		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");

		$sql->bindValue(":e",$email);
		$sql->execute();

		if($sql->rowCount() > 0){
			return false; //Já está cadastraddo
		}else {
			//Caso não esteja cadastrado
			$sql = $pd->prepare("INSERT INTO table usuarios (nome, telefone, email, senha) VALUES (:n,:t,:e,:s)");

			$sql->bindValue(":n", $nome);
			$sql->bindValue(":t", $telefone);
			$sql->bindValue(":e", $email);
			$sql->bindValeu(":s", $senha);
			$sql->execute();
			return true;
		}

	}


	public function efetuarLogin($email, $senha){
		global $pdo;
	}	

}




?>