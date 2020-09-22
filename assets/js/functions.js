$(document).ready(function(){
    mascaras();
    datepicker();
    selectpicker()
});

$(document).on('click', '.btn-cancelar', function(){
	idForm = $(this).closest('form').attr('id');
	resetar_form(idForm);
});


function resetar_form(form){
    // form => id do formulário
    
    $('#'+form)[0].reset();
    $('#'+form+' input').val("");
    $('#'+form+' select').val("");
    $("#"+form+" input[type=checkbox]").each(function() { 
        $(this).prop('checked',false); 
    });

    $('.selectpicker').select2("destroy");
    $.each($('.selectpicker option'), function(){
        $(this).removeAttr('selected');
    });
    $('.selectpicker').select2();

    // para casos específicos, criar funções a parte
    switch(form){
        default:
        	break;
    }
}

function popular_form(form, dados){
	// form => id do formulário
	// dados => json com os dados e os nomes dos campos	
    $.each(dados, function(key, value) { 
        var ctrl = $('#'+form+' [name='+key+']'); 
        //console.log('campo => '+key+' | valor = '+value);
        switch(ctrl.prop("type")) { 
            case "radio": case "checkbox":   
                ctrl.each(function() {
                    if($(this).attr('value') == value) $(this).prop('checked', true); 
                });   
                break;  
            default:
                ctrl.val(value); 
        }  
    });  
    
    // para casos específicos, criar funções a parte
    switch(form){
        case 'form-funcionario':
            popular_form_funcionario(dados)
            break;
        default:
        	break;
    }
}

function popular_form_funcionario(dados){
    $('.selectpicker').select2("destroy");
    dados.grupos.forEach(function(grupo){
        $('select[name="grupos[]"] option[value="'+grupo.id_grupo+'"]').attr("selected", true); 
    });
    $('.selectpicker').select2();
}

function mascaras(){
    //cpf
    $('.mascara-cpf').inputmask('999.999.999-99',{ showMaskOnHover: false });

    $('.datepicker').inputmask('99/99/9999',{ showMaskOnHover: false });
}

function datepicker(){
    $('.datepicker').daterangepicker({
        singleDatePicker: true,
        locale: {
            format: 'DD/MM/YYYY',
            applyLabel: 'OK',
            cancelLabel: 'Cancelar',
            daysOfWeek: ['Do', 'Se', 'Te', 'Qu', 'Qu', 'Se', 'Sa'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        },
    });
    $('.datepicker').val('');
}

function selectpicker(){
    $('.selectpicker').select2();
}