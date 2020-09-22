$(document).ready(function(){
    montar_tabela('tabela-grupos');
});

function editGrupo(idGrupo){
    $.ajax({
        url: base_url + "grupos/get_by_id/"+idGrupo,
        type: 'GET',
        dataType: 'JSON',
        success:function (data) {
            popular_form('form-grupo', data[0]);
        }
    });
}

function deleteGrupo(idGrupo){
    $.ajax({
        url: base_url + "grupos/get_by_id/"+idGrupo,
        type: 'GET',
        dataType: 'JSON',
        success:function (data) {
			Swal.fire({
		        title: 'Atenção',
		        text: 'Deseja excluir o grupo '+data[0]['ds_grupo']+'?',
		        type: 'warning',
		        showCancelButton: true,
		        confirmButtonColor: '#3085d6',
		        cancelButtonColor: '#d33',
		        confirmButtonText: 'Sim!',
		        cancelButtonText: 'Cancelar',
		    }).then((result) => {
		        if (result.value) {
		            window.location.href = base_url + 'grupos/delete/' + idGrupo;
		        }
		    });
        }
    });	
}