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
        default:
        	break;
    }
}