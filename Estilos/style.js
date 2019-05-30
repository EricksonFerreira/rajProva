$(document).ready(function () { 
    // Codigo que é passado do back-end como segunda camada de proteção
    var code  ="{{Request::query('cpf1')}}";
    $("#cpf_cnpj").keydown(function(){
        try {
            $("#cpf_cnpj").unmask();
        } catch (e) {}
        
        var size = $("#cpf_cnpj").val().length;
        
        if(size < 11){
            $("#cpf_cnpj").mask("999.999.999-99");
        } else if(size >= 11){
            $("#cpf_cnpj").mask("99.999.999/9999-99");
        }
        
        // Ajustando o Foco
        var elem = this;
        setTimeout(function(){
            // Muda a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // Reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });
    
    //Chama a função se por acaso o codigo retornado do back for code0
    if(code == 'code1'){
        Fail();      
    }
    
    // Funções que mudam a cor caso dê tudo Certo ou Errado
    function Ok(){
        document.getElementById('cpf_cnpj').style.borderColor = "green";
        $('#enviar').show();
    }
    function Fail(){
        document.getElementById('cpf_cnpj').style.borderColor = "red";
       $('#enviar').hide();
    }

    // Verifica o CPF e caso der um Erro chama a função do erro
    $("#cpf_cnpj").keypress(function(e) {
        var Mensal = $("#cpf_cnpj");
        Mensal.focusout( function(){
            var cpf = Mensal.val();
            var cpf_limp = cpf.replace(/\.|\-/g,'');

            var size = $("#cpf_cnpj").val().length;
            if(size < 15){
                TestaCPF(cpf_limp);
            } else {
                validarCNPJ(cpf);
            }
        });
    });

    // Função que valida o CNPJ
   function validarCNPJ(cnpj) {
        cnpj = cnpj.replace(/[^\d]+/g, '');
        
        if (cnpj == '') return Fail();
        
        if (cnpj.length != 14){
        }
        
        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return Fail();
        
        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
              pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return Fail();
        
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
              pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return Fail();
        
        return Ok();
    }

    // Função que testa se o CPF é válido
    function TestaCPF(strCPF){
        var Soma;
        var Resto;
        Soma = 0;   
        if (strCPF == "00000000000" || strCPF == "11111111111"|| strCPF == "22222222222" || strCPF == "3333333333" || strCPF == "44444444444" || strCPF == "55555555555" || strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "9999999999") return Fail();
         
          for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
          Resto = (Soma * 10) % 11;
           
            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)) ) return Fail();
           
          Soma = 0;
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;
           
            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11) ) ) return Fail();
             return Ok();
    }

    // Telefone               
    $('#telefone').mask("(00) 0000-00009")
    $('#telefone').blur(function(event){
        if($(this).val().length == 15){
            $("#telefone").mask("(00) 00000-0009")
        }else{
            $("#telefone").mask("(00) 0000-00009")
        }
    })

    // Movimenta os cards               
    $('.rating-wrap').show("slow");


    // Deleta usuario via Ajax               
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
