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

    // Telefone               

    $('#telefone').mask("(00) 0000-00009");
    $('#telefone').blur(function(event){
        if($(this).val().length == 15){
            $("#telefone").mask("(00) 00000-0009")
        }else{
            $("#telefone").mask("(00) 0000-00009")
        }
    });

    $('.rating-wrap').show("slow");
    $('.col-md-4').hover(function(){
        event.preventDefault();
        $('.bottom-wrap').show("slow");
    });

    $('.deletar').click( function(event){
        event.preventDefault();
        var that = $(this);
        url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
        })
        .done(function() {
            that.parent().parent().parent().remove();
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
      });         
});

 if(code == 'code1'){
 falhou();      //chama a função se por acaso o codigo retornado do back for code1
 }
 
 function tudo_OK(){
        document.getElementById('cpf_cnpj').style.borderColor = "green";
          $('#enviar').show();
          ///utilizando doom pos é oque eu mas conheço posso retirar depois
          //aqui nos estamos mudando o a cor e do botão e descrição para true porque o cpf é valido
 }
 function falhou(){
         document.getElementById('cpf_cnpj').style.borderColor = "red";
        $('#enviar').hide();
         //aqui nos fazemos basicamente o contrario 
 }
 $("#cpf_cnpj").keypress(function(e) { //faz a limpeza do cpf e chama a função responsavel por alertar os erros no cpf
             var vendaMediaMensal = $("#cpf_cnpj");
             vendaMediaMensal.focusout( function(){
             var cpf = vendaMediaMensal.val();
             var cpf_limp = cpf.replace(/\.|\-/g,'');
             VerificarCPF(cpf_limp);
             });
 });
 function VerificarCPF(valCPF){
     var Soma;
     var Resto;
     Soma = 0;       //testa se o cpf é valido no frontend
   if (valCPF == "00000000000" || valCPF == "11111111111"|| valCPF == "22222222222" || valCPF == "3333333333" || valCPF == "44444444444" || valCPF == "55555555555" || valCPF == "66666666666" || valCPF == "77777777777" || valCPF == "88888888888" || valCPF == "9999999999") return falhou();
      
   for (i=1; i<=9; i++) Soma = Soma + parseInt(valCPF.substring(i-1, i)) * (11 - i);
   Resto = (Soma * 10) % 11;
    
     if ((Resto == 10) || (Resto == 11))  Resto = 0;
     if (Resto != parseInt(valCPF.substring(9, 10)) ) return falhou();
    
   Soma = 0;
     for (i = 1; i <= 10; i++) Soma = Soma + parseInt(valCPF.substring(i-1, i)) * (12 - i);
     Resto = (Soma * 10) % 11;
    
     if ((Resto == 10) || (Resto == 11))  Resto = 0;
     if (Resto != parseInt(valCPF.substring(10, 11) ) ) return falhou();
      return tudo_OK();
 }
 