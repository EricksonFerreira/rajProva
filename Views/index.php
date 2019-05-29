<?php require_once('../Controllers/conexao.php');?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="../Estilos/a.css">
<div class="container"><br>
<a href="cadastro.php" class="btn btn-success float-left">Adicionar</a>
	<div class="row">
<?php Include('navbar.php') ?>
		<?php 	$sql = 'SELECT * FROM usuario';
				$queryOne = $conn->prepare($sql);
				$queryOne->execute(); 
				$stmt = $queryOne->fetchAll();?>
		<?php 	foreach ($stmt as $value):?>
		<div class="col-md-4">
			<figure class="card card-product">
				<div class="img-wrap">
				<?php if ($value['tipo'] == 'fisico'): ?>
					<img src="../fisica.png">
				<?php else: ?>
					<img src="../screen-11.png">
				<?php endif ?>
				</div>
				<figcaption class="info-wrap">
						<h4 class="title"><?= $value['nome'];?></h4>
						<p class="desc"><?= $value['informacoes'];?></p>
						<div class="rating-wrap">
							<div class="label-rating"><strong>Cidade:</strong> <?= $value['cidade'];?></div><br>	
							<div class="label-rating"><strong>Estado:</strong> <?= $value['estado'];?></div><br>	
							<div class="label-rating"><strong>Email:</strong> <?= $value['email'];?></div><br>	
							<div class="label-rating"><strong>Telefone:</strong> <?= $value['telefone'];?></div><br>	
							<div class="label-rating"><strong>CPF/CNPJ:</strong> <?= $value['cpf_cnpj'];?></div>
						</div> <!-- rating-wrap.// -->
				</figcaption>
				<div class="bottom-wrap">
					<a href="editar.php?id=<?=$value['cpf_cnpj']?>" class="btn btn-sm btn-warning float-left">Editar</a>	
					<a href="../Controllers/rmUser.php?id=<?=$value['cpf_cnpj']?>" class="btn btn-sm btn-danger float-left" style="margin-left: 1em" id="deletar">Deletar</a>	
				</div> <!-- bottom-wrap.// -->
			</figure>
		<br><br>
		</div> <!-- col // -->
	<?php endforeach ?>
	</div> <!-- row.// -->
</div> 
<!--container.//-->
<script>

            $(document).ready(function () { 
	          $('.rating-wrap').show("slow")
	          $('.col-md-4').hover(function(){
	          	event.preventDefault();
	           		$('.bottom-wrap').show("fast");
	          });

	          // $('.col-md-4').hover( function(event){
	          //  		$('.rating-wrap').show("slow");
	          // });      
	          $('#deletar').click( function(){
	          	event.preventDefault();
	          	alert('oi')
	          });      
           });
        </script>