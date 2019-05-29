<?php 
require_once('conexao.php');
$cpf_cnpj = $_GET['id'];

$sql = 'DELETE FROM usuario WHERE cpf_cnpj=?';
$queryOne = $conn->prepare($sql);
$queryOne->bindParam(1, $cpf_cnpj);
$queryOne->execute();
header('location: ../Views/index.php');

 ?>