<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
              
            <div class="modal-body">
        <?php  $estado = ['Acre','Alagoas','Amapá','Amazonas','Bahia','Ceará','Distrito Federal','Espírito Santo','Goiás','Maranhão','Mato Grosso','Mato Grosso do Sul','Minas Gerais','Pará','Paraíba','Paraná','Pernambuco','Piauí','Rio de Janeiro','Rio Grande do Norte','Rio Grande do Sul','Rondônia','Roraima','Santa Catarina','São Paulo','Sergipe','Tocantins'];
        ?>
                <div class="card-body">
                    <center><h2 style="color: #636363">CADASTRO</h2></center><br>  
                        <form method="post" action="../Controllers/addUser.php" class="form-adc" enctype="multipart/form-data">
                            <div class="form-label-group">
                                <input id="nome" class="form-control " type="text" name="nome" placeholder="Nome" value="" required>
                                <label for="nome" class="text-center">Nome Completo * </label>
                            </div>
                            <div class="row">
                                <div class="form-label-group col-md-6">
                                    <input id="cpf_cnpj" class="form-control user_cpf" type="text" name="cpf_cnpj" value="" required placeholder="CPF/CNPJ" id="cpf_cnpj">
                                    <label id="cpf" class="text-center" for="cpf_cnpj">CPF/CNPJ *</label>
                                </div>
                                <div class="form-label-group col-md-6">
                                    <input class="form-control" type="text" name="telefone" id="telefone" placeholder="Telefone" value="" maxlength="15" >
                                    <label for="telefone" class="text-center">Telefone </label>
                                </div>
                            </div>
                            <div class="row">
                               <div class="form-label-group col-md-5">
                                    <input id="cidade" class="form-control" type="text" name="cidade" required placeholder="cidade">
                                    <label class="text-center" for="cidade"> Cidade *</label>
                                </div>
                                <div class="form-label-group col-md-7">
                                    <select  style="border-radius: 100px;" name="estado" class="form-control">
                                        <option  disabled  selected> Estados *</option>
                                        <option value="" disabled="" hidden selected="">Escolha o Estado *</option>
                                        <option value="" disabled="">---</option>
                                        <?php foreach ($estado as  $value):?>
                                                <option value="<?=$value?>"><?=$value?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>  
                            </div>
                            <div class="form-label-group">
                                <input id="email" class="form-control" type="text" name="email" placeholder="Email" value="" required>
                                <label for="email" class="text-center">Email *</label>
                            </div>
                            <div class="form-label-group">
                                <select  style="border-radius: 100px;" name="tipo" class="form-control">
                                    <option  disabled  selected> Tipo de Cliente *</option>
                                    <option value="" disabled="" hidden selected="">Escolha o Tipo de Cliente *</option>
                                    <option value="" disabled="">---</option>
                                            <option value="fisico">Físico</option>
                                            <option value="juridico">Jurídico</option>
                                </select>
                            </div>

                            <div class="form-label-group">
                                <textarea class="form-control" id="informacoes" name="informacoes" rows="2" cols="33"></textarea>
                                <label class="text-center" for="informacoes">Informações do Cliente</label>
                            </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" id="enviar" type="submit">
                                Cadastrar
                            </button>                   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>        
</div>