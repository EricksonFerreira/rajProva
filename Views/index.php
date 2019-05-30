<html>    
    <head>
        <link rel="icon" type="image/ico" href="../raj.png"/>
    <?php require_once('../Controllers/conexao.php');?>
        <title>Index</title>
        <meta charset="UTF-8">
        <!-- CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

        <!-- LINKS -->
        <link rel="stylesheet" href="../Estilos/style.css">
        <script type="text/javascript" src="../Estilos/style.js"></script>    
    </head>
    <body>
        <div class="container"><br>
        <!-- Botão para acionar modal -->
        <button type="button" class="btn btn-Success" data-toggle="modal" data-target="#modalExemplo" style="height: 4em;width: 6em;margin-left: -7em;margin-top: 1em;display: inline-flex;">
                Adicionar
        </button>
            <div class="row">
        <?php Include('modal.php') ?>
        <?php Include('card.php') ?>
            </div> <!-- row.// -->
        </div> <!--container.//-->
    </body>
</html>