
$(document).ready(function(){

    if($('#InteressadoSituacaoId').val()!=3){
        $('#InteressadoNomeInstituidorPensao').attr('disabled','true');
        $('#InteressadoMatriculaInstituidorPensao').attr('disabled','true');
    }

    $('#InteressadoSituacaoId').change(function(){
        if($(this).val() ==3){
            $('#InteressadoNomeInstituidorPensao').removeAttr('disabled');
            $('#InteressadoMatriculaInstituidorPensao').removeAttr('disabled');
        }else{
            $('#InteressadoNomeInstituidorPensao').attr('disabled','true');
            $('#InteressadoMatriculaInstituidorPensao').attr('disabled','true');
        }
    
    })


    $('#InteressadoMatriculaInstituidorPensao').blur(function(){
    
        if($.trim($("#InteressadoMatriculaInstituidorPensao").val()) != "" && parseInt($("#InteressadoMatriculaInstituidorPensao").val()) > 0){
	
            $('#ajaxLoader').remove();
            $('label[for="InteressadoMatriculaInstituidorPensao"]').append('<img id="ajaxLoader" src="../../images/ajax-loader.gif" width="20px" height="20" />');
            $.ajax({
                url: "../findInstituidor/"+$("#InteressadoMatriculaInstituidorPensao").val(),
                dataType: "json",
                timeout:5000,
                error:function(){
                    alert('Não foi possível encontrar o Instituidor'); 
              
                    $('#ajaxLoader').remove();
                },
                success: function (interessado){
                         
                    if(interessado != false){
                        $('#InteressadoInteressadoId').val(interessado.Interessado.id);
                        $('#InteressadoNomeInstituidorPensao').val(interessado.Interessado.nome);
                        $('#ajaxLoader').remove();
                    }else{
                        alert('Não foi possível encontrar o instituidor, é possível que o mesmo ainda não tenha sido cadastrado.')
                        $('#ajaxLoader').remove();
                    }
                }


            });          
        }
    })

})