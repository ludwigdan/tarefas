$(document).ready(function(){
    montar_tabela('tabela-setores');
});

$(document).on('change', '.ds_tipo_tarefa', function(){
    seq = $(this).attr('data-seq-tipo-tarefa');
    ds_tipo_tarefa = $(this).val();
    $('#tipo-tarefa-header-'+seq+' .card-title').text(ds_tipo_tarefa)
})
function addTipoTarefa(idTipoTarefa = false){
    seq_tipo_tarefa = ($('.tipo-tarefa-card').length) + 1;
    $.ajax({
        url: base_url + "setores/get_vw_tipo_tarefa",
        type: 'POST',
        dataType: 'HTML',
        async: false,
        data: {
            seq_tipo_tarefa: seq_tipo_tarefa,
            id_tipo_tarefa: idTipoTarefa
        },
        success:function (data) {
            $('div[id^=tipoTarefaCollapse]').removeClass('show');
            $('a[id^=tipo-tarefa-header]').addClass('collapsed');
            $('a[id^=tipo-tarefa-header]').attr('aria-expanded', 'false');
            $('#lista-tipo-tarefa').prepend(data);
        },
        complete: function() {
            selectpicker();
            // se for update, trás todos fechados
            if(idTipoTarefa === false){
                $('#tipoTarefaCollapse-'+seq_tipo_tarefa).addClass('show');
                $('#tipo-tarefa-header-'+seq_tipo_tarefa).removeClass('collapsed');
                $('#tipo-tarefa-header-'+seq_tipo_tarefa).attr('aria-expanded', 'true');
            }
            $('.ds_tipo_tarefa').trigger('change');
        }
    });  
}

function deleteTipoTarefa(seq){
    Swal.fire({
        title: 'Atenção',
        text: 'Deseja excluir a tarefa?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            operacao = $('#operacao_tipo_tarefa-'+seq).val();
            if(operacao == 'I'){
                $('#tipo-tarefa-header-'+seq).remove();
                $('#tipoTarefaCollapse-'+seq).remove();
            } else if(operacao == 'U'){
                $('#tipo-tarefa-header-'+seq).removeClass('d-flex');
                $('#tipo-tarefa-header-'+seq).addClass('hide'); 
                $('#tipoTarefaCollapse-'+seq).removeClass('show');
                $('#operacao_tipo_tarefa-'+seq).val('D');          
            }
        }
    });
}

function editSetor(idSetor){
    resetar_form('form-setor');
    $.ajax({
        url: base_url + "setores/get_by_id/"+idSetor,
        type: 'GET',
        dataType: 'JSON',
        success:function (data) {
            popular_form('form-setor', data[0]);
        }
    });
}

function deleteSetor(idSetor){
    $.ajax({
        url: base_url + "setores/get_by_id/"+idSetor,
        type: 'GET',
        dataType: 'JSON',
        success:function (data) {
			Swal.fire({
		        title: 'Atenção',
		        text: 'Deseja excluir o setor '+data[0]['ds_setor']+'?',
		        type: 'warning',
		        showCancelButton: true,
		        confirmButtonColor: '#3085d6',
		        cancelButtonColor: '#d33',
		        confirmButtonText: 'Sim!',
		        cancelButtonText: 'Cancelar',
		    }).then((result) => {
		        if (result.value) {
		            window.location.href = base_url + 'setores/delete/' + idSetor;
		        }
		    });
        }
    });	
}