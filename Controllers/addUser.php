<?php 
require_once('conexao.php');
$cpf_cnpj = $_POST['cpf_cnpj'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$email = $_POST['email'];
$informacoes = $_POST['informacoes'];
$tipo = $_POST['tipo'];

//Verifica se existe um usuário com esse cpf/cnpj
	$sql = 'SELECT * FROM usuario WHERE cpf_cnpj=:c';
	$queryOne = $conn->prepare($sql);
	$queryOne->bindParam(":c", $cpf_cnpj);
	$queryOne->execute();
	$stmt = $queryOne->fetchAll();
	if ($queryOne->rowCount() < 1):
		//Adiciona os dados no banco
 			$sql2 = "INSERT INTO usuario(cpf_cnpj,nome,telefone,cidade,estado,email,informacoes,tipo) VALUES(:c,:n, :t, :a, :s, :e, :i, :z)";
 			$queryTwo = $conn->prepare($sql2); 
 			$queryTwo->bindParam(':c', $cpf_cnpj);
 			$queryTwo->bindParam(':n', $nome);
 			$queryTwo->bindParam(':t', $telefone);
 			$queryTwo->bindParam(':a', $cidade);
 			$queryTwo->bindParam(':s', $estado);
 			$queryTwo->bindParam(':e', $email);
 			$queryTwo->bindParam(':i', $informacoes);
 			$queryTwo->bindParam(':z', $tipo);
 			$queryTwo->execute();
		header('location: ../Views/index.php');
	else:
		echo "Cpf/Cnpj já existe!";
	endif;
