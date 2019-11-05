<?php 
	//Importando classe

require_once 'Classes/usuarios.php';
$u = new Usuario;
?>


<!DOCTYPE html>
<html lang="pt">
<title>SISTEMA DE LOGIN ORIENTADO A OBJETO</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/index.css">
<body>



	<div id="corpo">
		<h1>CADASTRA-SE</h1>
		<form  method="POST" >
			<input type="email" name="email" class="placeholder" placeholder="Preencha seu E-mail">
			<input type="text" name="nome" class="placeholder" placeholder="Preencha seu Primeiro Nome">
			<input type="password" name="senha" id="senha" class="placeholder" placeholder="Preencha sua Senha">
			<input type="password" id="confirmarSenha" class="placeholder" placeholder="Confirmar senha">
			<input type="submit" value="CADASTRAR">
			<a href="index.php" >Já tem uma conta? <b> Clica aqui para acessar!</b> </a>
		</form> 
	</div>

	<?php 
if(isset($_POST['email'])){//Verifica se o botão foi acionado;
	$email = addcslashes($_POST['email']);
	$nome = addcslashes($_POST['nome']);
	$senha = addcslashes($_POST['senha']);
	$telefone = addcslashes($_POST['telefone']);
}
if(!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone) && !empty($confirmarSenha)){
	$u->conexao("sistema_login","localhost", "root", "");
	if ($u->msgErro == '') {
		if($u->cadastrar($nome,$telefone,$email,$senha)){
			echo "Cadastrado com sucesso";
		}else{
			echo "Email já cadastrado";
		}
	}else{
			//Com erro
		echo "Erro: ".$u->msgErro;
	}
}else{
	echo "Preencha todos os campos";
	}





?>

</body>
</html>