<?php
require_once('../Controllers/conexao.php');
$cpf_cnpj = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar</title>
    <meta charset="UTF-8">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>


<link rel="stylesheet" href="../Estilos/style.css">
<?php
 		$sql = 'SELECT * FROM usuario WHERE cpf_cnpj=:c';
	$queryOne = $conn->prepare($sql);
	$queryOne->bindParam(":c", $cpf_cnpj);
	$queryOne->execute();
	$stmt = $queryOne->fetch();

    $estado = ['Acre','Alagoas','Amapá','Amazonas','Bahia','Ceará','Distrito Federal','Espírito Santo','Goiás','Maranhão','Mato Grosso','Mato Grosso do Sul','Minas Gerais','Pará','Paraíba','Paraná','Pernambuco','Piauí','Rio de Janeiro','Rio Grande do Norte','Rio Grande do Sul','Rondônia','Roraima','Santa Catarina','São Paulo','Sergipe','Tocantins'];
?>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-12 col-lg-5 my-2  mx-auto" >
            <div class="card card-signin  " style="box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);">
                <div class="card-body">
                    <center><h2 style="color: #636363">EDITAR</h2></center><br>  
                        <form method="post" action="../Controllers/edtUser.php" class="" enctype="multipart/form-data">
                            <div class="form-label-group">
                                <input id="nome" class="form-control " type="text" name="nome" placeholder="Nome" value="<?=$stmt['nome']?>" required>
                                <label for="nome" class="text-center">Nome Completo * </label>
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6">
                                    <input id="cpf_cnpj" class="form-control user_cpf" type="text" name="cpf_cnpj" value="<?=$stmt['cpf_cnpj']?>" required placeholder="CPF/CNPJ" id="cpf_cnpj">
                                    <label id="cpf" class="text-center" for="cpf_cnpj" >CPF/CNPJ *</label>
                                </div>
                                <div class="form-label-group col-md-6">
                                    <input class="form-control" type="text" name="telefone" id="telefone" placeholder="Telefone" value="<?=$stmt['telefone']?>" maxlength="15" >
                                    <label for="telefone" class="text-center">Telefone </label>
                                </div>
                            </div>
                            <div class="row">
                               <div class="form-label-group col-md-5">
                                    <input id="cidade" class="form-control" type="text" name="cidade" required value="<?=$stmt['cidade']?>" placeholder="cidade">
                                    <label class="text-center" for="cidade"> Cidade *</label>
                                </div>
                                <div class="form-label-group col-md-7">
                                    <select  style="border-radius: 100px;" name="estado" class="form-control">
                                        <option  disabled  selected> Estados *</option>
                                        <option value="" disabled="" hidden selected="">Escolha o Estado *</option>
                                        <option value="" disabled="">---</option>
	                                        <?php foreach ($estado as  $value):?>
	                                                <option value="<?=$value?>"
	                                                	<?php if (	$stmt['estado'] == $value): ?>
					                                    	Selected
					                                    <?php endif ?>
	                                    ><?=$value?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>  
                            </div>
                            <div class="form-label-group">
                                <input id="email" class="form-control" type="text" name="email" placeholder="Email" value="<?=$stmt['email']?>" required>
                                <label for="email" class="text-center">Email *</label>
                            </div>
                            <div class="form-label-group">
                                <select  style="border-radius: 100px;" name="tipo" class="form-control">
                                    <option  disabled  selected> Tipo de Cliente *</option>
                                    <option value="" disabled="" hidden selected="">Escolha o Tipo de Cliente *</option>
                                    <option value="" disabled="">---</option>
                                    <option value="fisico"
	                                    <?php if (	$stmt['tipo'] == 'fisico'): ?>
	                                    	Selected
	                                    <?php endif ?>
	                                  >Físico</option>
                                    <option value="juridico"
                                        <?php if (	$stmt['tipo'] == 'juridico'): ?>
	                                    	Selected
	                                    <?php endif ?>
	                                >Jurídico</option>
                                </select>
                            </div>

                            <div class="form-label-group">
                                <textarea class="form-control" id="informacoes" name="informacoes" rows="2" cols="33"><?=$stmt['informacoes'];?></textarea>
                                <label class="text-center" for="informacoes">Informações do Cliente</label>
                            </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" id="enviar" type="submit">
                                Editar
                            </button>                   
                        </div>
                    </form>
                        <div class="custom-control custom-checkbox mb-3">
                           <a href="index.php" style="text-decoration: none;color: white;">
                                <button class="btn btn-lg btn-danger btn-block text-uppercase" id="enviar" type="submit">
                                    VOLTAR
                                </button>                   
                           </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
            var code  ="{{Request::query('cpf1')}}"; //codigo que é passado do back-end como segunda camada de proteção
            $("#cpf_cnpj").keydown(function(){
                try {
                    $("#cpf_cnpj").unmask();
                } catch (e) {}
                
                var tamanho = $("#cpf_cnpj").val().length;
                
                if(tamanho < 11){
                    $("#cpf_cnpj").mask("999.999.999-99");
                } else if(tamanho >= 11){
                    $("#cpf_cnpj").mask("99.999.999/9999-99");
                }
                
                // ajustando foco
                var elem = this;
                setTimeout(function(){
                    // mudo a posição do seletor
                    elem.selectionStart = elem.selectionEnd = 10000;
                }, 0);
                // reaplico o valor para mudar o foco
                var currentValue = $(this).val();
                $(this).val('');
                $(this).val(currentValue);
            });
            $(document).ready(function () { 
                var $CampoCpf = $("#cpf_cnpj");
                $CampoCpf.mask('000.000.000-00', {reverse: true});  //deu conflito aki mas ja ta deboa kk
// ==================================================================================================
            // Telefone               
            
               $('#telefone').mask("(00) 0000-00009")
               $('#telefone').blur(function(event){
                if($(this).val().length == 15){
                    $("#telefone").mask("(00) 00000-0009")
                }else{
                    $("#telefone").mask("(00) 0000-00009")
                }
               })
                      
           });
// ==================================================================================================

            if(code == 'code1'){
            mudar_falha();      //chama a função se por acaso o codigo retornado do back for code1
            }
            
            function mudar_ok(){
                   document.getElementById('cpf_cnpj').style.borderColor = "green";
                     $('#enviar').show();
                     ///utilizando doom pos é oque eu mas conheço posso retirar depois
                     //aqui nos estamos mudando o a cor e do botão e descrição para true porque o cpf é valido
            }
            function mudar_falha(){
                    document.getElementById('cpf_cnpj').style.borderColor = "red";
                   $('#enviar').hide();
                    //aqui nos fazemos basicamente o contrario 
            }
            $("#cpf_cnpj").keypress(function(e) { //faz a limpeza do cpf e chama a função responsavel por alertar os erros no cpf
                        var vendaMediaMensal = $("#cpf_cnpj");
                        vendaMediaMensal.focusout( function(){
                        var cpf = vendaMediaMensal.val();
                        var cpf_limp = cpf.replace(/\.|\-/g,'');
                        TestaCPF(cpf_limp);
                        });
            });
            function TestaCPF(strCPF){
                var Soma;
                var Resto;
                Soma = 0;       //testa se o cpf é valido no frontend
              if (strCPF == "00000000000" || strCPF == "11111111111"|| strCPF == "22222222222" || strCPF == "3333333333" || strCPF == "44444444444" || strCPF == "55555555555" || strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "9999999999") return mudar_falha();
                 
              for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
              Resto = (Soma * 10) % 11;
               
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(strCPF.substring(9, 10)) ) return mudar_falha();
               
              Soma = 0;
                for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
                Resto = (Soma * 10) % 11;
               
                if ((Resto == 10) || (Resto == 11))  Resto = 0;
                if (Resto != parseInt(strCPF.substring(10, 11) ) ) return mudar_falha();
                 return mudar_ok();
            }
        </script>
</body>
</html>