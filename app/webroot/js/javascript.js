function show_hide(bt){
    
    $target = $(bt).attr('target');
    
    $(bt).toggle(function(){
        
        $($target).show()
        $(bt).html('-');
    },function(){
        $($target).hide()
        $(bt).html('+');
    })
    
    
}

$().ready(function(){

    $('.back_bt').click(function(){
        
        history.go(-1);
        return false;
    })

    show_hide('.bt_show_hide')
     
    //função auto preenchimento endereço pelo cep
    
    $('#InteressadoCep').blur(function(){
    
        if($.trim($("#InteressadoCep").val()) != "" && parseInt($("#InteressadoCep").val()) > 0){
	
            $('#ajaxLoader').remove();
            $('label[for="InteressadoCep"]').append('<img id="ajaxLoader" src="../images/ajax-loader.gif" width="20px" height="20" />');
            $.ajax({
                url: "http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#InteressadoCep").val(),
                dataType: "script",
                timeout:5000,
                error:function(){
                    alert('Não foi possível recuperar o CEP'); 
              
                    $('#ajaxLoader').remove();
                },
                success:   function (){
                    if (resultadoCEP["resultado"] == 1) {
                        if (resultadoCEP["resultado"]) {
                            // troca o valor dos elementos
                            $("#InteressadoEndereco").val(unescape(resultadoCEP["tipo_logradouro"]+' '+resultadoCEP["logradouro"] ));
                            $("#InteressadoBairro").val(unescape(resultadoCEP["bairro"]));
                            $("#InteressadoCidade").val(unescape(resultadoCEP["cidade"]));
                            $("#InteressadoUf").val(unescape(resultadoCEP["uf"]));
                            $("#InteressadoNum").focus();
                        
                            $('#ajaxLoader').remove();
                        }
                    }else{
                        alert('Erro ao recuperar o CEP');
                        $("#InteressadoEndereco").val(unescape(resultadoCEP["tipo_logradouro"]+' '+resultadoCEP["logradouro"] ));
                        $("#InteressadoBairro").val(unescape(resultadoCEP["bairro"]));
                        $("#InteressadoCidade").val(unescape(resultadoCEP["cidade"]));
                        $("#InteressadoUf").val(unescape(resultadoCEP["uf"]));
                        $('#ajaxLoader').remove();
                    
                    }
                }
            });          
        }
    })

    $('#PeriodoInicioMonth option,#PeriodoFimMonth option').each(function(){
        $(this).html($(this).val())
    })

    $(".moeda").maskMoney({
        showSymbol:true, 
        symbol:"R$", 
        decimal:".", 
        thousands:""
    });
    
    $('.moeda').val(0);
    
    $('.moeda').on("blur",function(){
            
        calcularPeriodo();
        
    })

    $('body').keydown(function(event) {
        if (event.which == 13) {
            return false
        }
        
    });


    $('form').submit(function(){
        
        $('.moeda').each(function(){
            $(this).val(float2moeda($(this).val()))
        })
        
        return true;
    })
    
    $('.data').bind('change',function(){
   
       periodoMeses()
        
    })
    
    
    $('#PeriodoInicioDay,#PeriodoFimDay').hide();
    
    
    $('#PeriodoAddForm').submit(function(){
        //serialize form data
        var formData = $(this).serialize();
        //get form action
        var formUrl = $(this).attr('action');
            
        $.ajax({
            type: 'POST',
            url: formUrl,
            data: formData,
            success: function(data,textStatus,xhr){
                
            },
            error: function(xhr,textStatus,error){
                alert(textStatus);
            }
        }); 
                
        return false;
    });
    
    

    
})


function float2moeda(num) {

    x = 0;

    if(num<0) {
        num = Math.abs(num);
        x = 1;
    }
    if(isNaN(num)) num = "0";
    cents = Math.floor((num*100+0.5)%100);

    num = Math.floor((num*100+0.5)/100).toString();

    if(cents < 10) cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
        num = num.substring(0,num.length-(4*i+3))+'.'
        +num.substring(num.length-(4*i+3));
    ret = num + ',' + cents;
    if (x == 1) ret = ' - ' + ret;
    return ret;

}


function calcularPeriodo(){
    
    $('.moeda').each(function(){
        if($(this).val()==''){
            $(this).val(0);
        }
    })
        
    //var valor_bruto = parseFloat($('#PeriodoPago').val()).toFixed(2) * 5;
        
    var desconto = parseFloat($('#PeriodoGesst').val()) + parseFloat($('#PeriodoGdasst').val()) + parseFloat($('#PeriodoGdpst').val())+ parseFloat($('#PeriodoOutros').val())
        
    desconto = (desconto * 0.2).toFixed(2);
        
    var valor_pago = parseFloat($('#PeriodoArt-184').val()).toFixed(2)
        
    //var diferenca_bruto = bruto_total - valor_bruto;
        
    /* var dedutiveis = ( 
            parseFloat($('#PeriodoGesst').val()) + 
            parseFloat($('#PeriodoGdasst').val()) +
            parseFloat($('#PeriodoGdpst').val())+ 
            parseFloat($('#PeriodoOutros').val()));
        */
    //dedutiveis = parseFloat(dedutiveis).toFixed(2);
    //alert(bruto_total +'-'+valor_bruto);
                
          
    //var valor_bruto_184 = valor_bruto - (dedutiveis);
        
    var devido = valor_pago - desconto;
    var diferenca = valor_pago - devido;
    var restituicao = parseInt($('#PeriodoMeses').val()) * diferenca.toFixed(2); 
        
    //$('#PeriodoTotal').val(bruto_total);        
    $('#PeriodoDevido').val(devido.toFixed(2));
    $('#PeriodoDiferenca').val(diferenca.toFixed(2));
    $('#PeriodoRestituicao').val(restituicao.toFixed(2));
///$('#diferenca').empty().html(float2moeda(diferenca_bruto)+'<br/>'+float2moeda(valor_bruto)+'<br/>'+float2moeda(valor_bruto - (dedutiveis + valor_pago)))
        
    
}

function periodoMeses(){
    var mes_inicial = parseInt($('#PeriodoInicioMonth').val(),10);
    var mes_final = parseInt($('#PeriodoFimMonth').val(),10);
                
    if($('#PeriodoFimYear').val() > $('#PeriodoInicioYear').val()){
            
        var multiplicador = $('#PeriodoFimYear').val() - $('#PeriodoInicioYear').val()
            
        mes_final =   mes_final + (12 * multiplicador);
                        
    }
                
    numero_meses = (mes_final +1) - mes_inicial;
        
    $('#PeriodoMeses').val(numero_meses)
}

periodoMeses()