$(document).ready(function(){
    montar_tabela('tabela-funcionarios');
});

$(document).on('change', '#alterar-senha', function(){
    alterar_senha();
});

function editFuncionario(idFuncionario){
    $.ajax({
        url: base_url + "funcionarios/get_by_id/"+idFuncionario,
        type: 'GET',
        dataType: 'JSON',
        success:function (data) {
            popular_form('form-funcionario', data[0]);
        }, complete: function(){
            obrigatoriedadeSenha();
            alterar_senha();
        }
    });
}

function deleteFuncionario(idFuncionario){
    $.ajax({
        url: base_url + "funcionarios/get_by_id/"+idFuncionario,
        type: 'GET',
        dataType: 'JSON',
        success:function (data) {
			Swal.fire({
		        title: 'Atenção',
		        text: 'Deseja excluir o funcionario '+data[0]['nm_funcionario']+'?',
		        type: 'warning',
		        showCancelButton: true,
		        confirmButtonColor: '#3085d6',
		        cancelButtonColor: '#d33',
		        confirmButtonText: 'Sim!',
		        cancelButtonText: 'Cancelar',
		    }).then((result) => {
		        if (result.value) {
		            window.location.href = base_url + 'funcionarios/delete/' + idFuncionario;
		        }
		    });
        }
    });	
}

function obrigatoriedadeSenha(){
    if($('input[name=id_funcionario]').val() != ""){
        $('input[name=senha]').removeAttr('required');
        $('#alterar-senha').parent().show();
    } else { 
        $('input[name=senha]').attr('required', 'required');
        $('#alterar-senha').parent().hide();
    }
}

function alterar_senha(){
    if($('#alterar-senha').is(":checked")){
        $('input[name=senha]').removeAttr('disabled');
    } else {
        $('input[name=senha]').attr('disabled', 'disabled');
    }
}

 