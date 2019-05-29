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

	//Atualizar os dados no banco
	$sql = "UPDATE usuario SET  nome='$nome', telefone='$telefone', cidade='$cidade', estado='$estado', email='$email', informacoes='$informacoes', tipo='$tipo' WHERE cpf_cnpj = '$cpf_cnpj'";
	$queryOne = $conn->prepare($sql); 
	$queryOne->execute();
	header('location: ../Views/index.php');
