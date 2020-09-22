$(document).ready(function(){
    montar_tabela('tabela-setores');
});

function editSetor(idSetor){
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
 