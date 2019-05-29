<?php
session_start();
if(isset($_SESSION['id']) or isset($_SESSION['username'])):
	header('location: index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel=stylesheet href="../Estilos/style.css">
</head>
<body>
<!-- <center>		 -->
	<div class="f1">
		<h1>Cadastre-se</h1>
		<form id="register" method="post" action="../Controllers/addUser.php">
			<label>Nome:</label>
			<input type="text" name="nome" placeholder="Digite o seu nome"><br>
			<label>Telefone:</label>
			<input type="text" name="telefone" placeholder="Digite o seu telefone"><br>
			<label>Cidade:</label>
			<input type="cidade" name="cidade" placeholder="Digite a sua cidade"><br>
			<label>Estado:</label>
			<input type="estado" name="estado" placeholder="Digite o seu estado"><br>
			<label>Email:</label>
			<input type="text" name="email" placeholder="Digite o seu email"><br>
			<label>Informações Adicionais:</label>
			<input type="textarea" name="user" placeholder="Digite suas informações adicionais"><br>
			<label>Tipo de Cliente:</label>
			<select name="tipo">
				<option value="fisica">Física</option>
				<option value="juridica">Jurídica</option>
			</select>
			<label>CPF/CNPJ:</label>
			<input type="text" name="cpf_cnpj" placeholder="Digite seu cpf ou seu cnpj"><br>
			<input type="submit" value="Cadastrar-se">
		</form><br>
		Voltar ao menu <a href="cadastro.php">ENTRAR</a>
	</div>
<!-- </center> -->
</body>
</html>