<!-- Consulta todos os usuários -->
<?php 	$sql = 'SELECT * FROM usuario';
		$queryOne = $conn->prepare($sql);
		$queryOne->execute(); 
		$stmt = $queryOne->fetchAll();
		foreach ($stmt as $value):?>
			
		<div class="col-md-3" style="margin-top: -4em;">
			<figure class="card card-product" >
				<div class="img-wrap" style="height: 50%;">
				<?php if ($value['tipo'] == 'fisico'): ?>
					<img src="../fisica.png">
				<?php else: ?>
					<img src="../juridica.png">
				<?php endif ?>
				</div><!-- img-wrap.// -->
				<figcaption class="info-wrap">
						<h4 class="title"><?= $value['nome'];?></h4>
						<p class="desc"><?= $value['informacoes'];?></p>
						<div class="rating-wrap">
							<div class="label-rating">
								<strong>Cidade:</strong> <?= $value['cidade'];?>
							</div><br>	
							<div class="label-rating">
								<strong>Estado:</strong> <?= $value['estado'];?>
							</div><br>	
							<div class="label-rating">
								<strong>Email:</strong> <br>
								<?= $value['email'];?>
							</div><br>	
							<div class="label-rating">
								<strong>Telefone:</strong> <?= $value['telefone'];?>
							</div><br>	
							<div class="label-rating">
								<strong>CPF/CNPJ:</strong> <?= $value['cpf_cnpj'];?>
							</div>
						</div> <!-- rating-wrap.// -->
				</figcaption>
				<div class="bottom-wrap">
					<a href="editar.php?id=<?=$value['cpf_cnpj']?>" class="btn btn-sm btn-warning float-left">Editar</a>
					<a href="../Controllers/rmUser.php?id=<?=$value['cpf_cnpj']?>" class="btn btn-sm btn-danger float-left deletar" style="margin-left: 1em" >Deletar</a>	
				</div> <!-- bottom-wrap.// -->
			</figure>
			<br><br><br>
		</div> <!-- col // -->
	<?php endforeach ?>
