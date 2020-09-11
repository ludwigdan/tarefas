function montar_botoes(nmTabela) {
	(function ($) {

		'use strict';

		// ------------------------------------------------------- //
		// Auto Hide
		// ------------------------------------------------------ //	

		$(function () {
			$('#sorting-table').DataTable({
				"lengthMenu": [
					[10, 15, 20, -1],
					[10, 15, 20, "All"]
				],
				"order": [
					[3, "desc"]
				]
			});
		});

		$(function () {
			var i = 0;

			if(nmTabela == 'tabela-padrao'){
				var btns =  [{extend:"excel", text: 'Exportar excel', className: 'h--f-1 excel'}];
			}else{
				var btns = [];
			}
			
			var qtd = $(".container-fluid .table[name='"+nmTabela+"'] thead th").length;
			if (qtd == 0) {
				return ;
			}

			var mostrar_btns = true;
			if($(".table[name='"+nmTabela+"']").data("sem-botoes") === true){
				mostrar_btns = false;
			}

			if(mostrar_btns){
				while (i < qtd) {
					// verifica se é para mostrar o botão
					if($(".table[name='"+nmTabela+"'] thead tr th:nth-child("+(i+1)+")").data("esconde") !== true){

						var classe = " ";

						// verifica se é para esconder a coluna do botão
						if($(".table[name='"+nmTabela+"'] thead tr th:nth-child("+(i+1)+")").data("esconde-coluna") === true){
							classe += "esconde-coluna ";
						}
						// verifica se é para esconder a coluna do botão quando mobile (até 768px)
						if($(".table[name='"+nmTabela+"'] thead tr th:nth-child("+(i+1)+")").data("esconde-coluna-mobile") === true){
							classe += "esconde-coluna-mobile ";
						}

						var arr = [{extend: 'columnToggle', columns: i, className: classe }];
						btns.push(arr);
					}
					i++;
				}
			}

			var table = $("table[name='"+nmTabela+"']").DataTable({
				responsive: true,
	            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
				"dom": 'Bfrtip',
				buttons: btns,
				"searching": false,
	            oLanguage: {
					"sEmptyTable": "Nenhum registro encontrado",
					"lengthMenu": "Mostrando _MENU_ registros por página",
					"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					"sInfoFiltered": "(Filtrados de _MAX_ registros)",
					"sInfoPostFix": "",
					"sInfoThousands": ".",
					"sLengthMenu": "_MENU_ resultados por página",
					"sLoadingRecords": "Carregando...",
					"sProcessing": "Processando...",
					"sZeroRecords": "Nenhum registro encontrado",
					"sSearch": "Pesquisar",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"oAria": {
						"sSortAscending": ": Ordenar colunas de forma ascendente",
						"sSortDescending": ": Ordenar colunas de forma descendente"
					}
        		}, 
        		initComplete: function(){
        			$("table[name='"+nmTabela+"']").prev('.dt-buttons').removeClass('btn-group');
        			//$("table[name='"+nmTabela+"']").prev('.dt-buttons').prepend('<p>Selecione as informações que deseja visualizar:</p>');
        		}
			});

			 $('a.toggle-vis').on( 'click', function (e) {
		        e.preventDefault();
		 
		        // Get the column API object
				var column = table.column( $(this).attr('data-column') );
		 
		        // Toggle the visibility
		        column.visible( ! column.visible() );
			} );
			
			$("table[name='"+nmTabela+"']").prev('.dt-buttons').removeClass('btn-group');

			if(mostrar_btns){
				$("table[name='"+nmTabela+"']").prev('.dt-buttons').prepend('<p>Selecione as informações que deseja visualizar:</p>');
			}

			$("table[name='"+nmTabela+"']").parent('#tabela-padrao_wrapper').find('.esconde-coluna').click();

			if($("body").width() < 769){
				$("table[name='"+nmTabela+"']").parent('#tabela-padrao_wrapper').find('.esconde-coluna-mobile').click();
				$('html,body').stop().animate({scrollTop: $(".table[name='"+nmTabela+"']").offset().top - 80 }, 500);
			}

			tamanho_fonte_tabela();
		});

	})(jQuery);
}

var table;

function montar_tabela_ajax(nmTabela, urlAjax){
	$("#listagem").html( '<div class="col-lg-12  col-lg-mobile  m--padding-bottom-15 m--padding-top-15"><div class="table-responsive"><p>Selecione as informações que deseja visualizar:</p><table id="tabela-padrao" name="tabela-padrao" class="table mb-0"><thead><tr><th>Matricula</th><th>Nome</th><th data-esconde-coluna-mobile="true">Status</th><th data-esconde-coluna-mobile="true">CPF/CNPJ</th><th data-esconde="true"></th><th data-esconde="true"></th></tr></thead><tbody></tbody></table></div></div>');
    if (table) {
        $("table[name='"+nmTabela+"']").DataTable().destroy();
    }

	var i = 0;


	if(nmTabela == 'tabela-padrao'){
		var btns =  [{extend:"excel", text: 'Exportar excel', className: 'h--f-1 excel'}];
	}else{
		var btns = [];
	}
			
	var qtd = $(".container-fluid .table[name='"+nmTabela+"'] thead th").length;
	if (qtd == 0) {
		return ;
	}

	while (i < qtd) {
			var mostrar_btns = true;
			if($(".table[name='"+nmTabela+"']").data("sem-botoes") === true){
				mostrar_btns = false;
			}

			if(mostrar_btns){
				while (i < qtd) {
					// verifica se é para mostrar o botão
					if($(".table[name='"+nmTabela+"'] thead tr th:nth-child("+(i+1)+")").data("esconde") !== true){

						var classe = " ";

						// verifica se é para esconder a coluna do botão
						if($(".table[name='"+nmTabela+"'] thead tr th:nth-child("+(i+1)+")").data("esconde-coluna") === true){
							classe += "esconde-coluna ";
						}
						// verifica se é para esconder a coluna do botão quando mobile (até 768px)
						if($(".table[name='"+nmTabela+"'] thead tr th:nth-child("+(i+1)+")").data("esconde-coluna-mobile") === true){
							classe += "esconde-coluna-mobile ";
						}

						var arr = [{extend: 'columnToggle', columns: i, className: classe }];
						btns.push(arr);
					}
					i++;
				}
			}
	}



	table = $("table[name='"+nmTabela+"']").DataTable({
        searching: false,
        serverSide: true,
        responsive: true,

        
        // Dados em ajax
        ajax: {
            url: urlAjax,
            type: "POST",
            data: {
            	paramMatricula: $('#matricula').val(),
            	paramRazaoSocial: $('#razao_social').val(),
            	paramStatus: $('#status').val(),
            	paramCnpjCpf: $('#cnpj_cpf').val(),
        	},
        	beforeSend: function() {
            	before_send_padrao();
        	},
        	complete:function() {
        		monta_tabela_verifica_permissao();
            	$("table[name='"+nmTabela+"']").prev('.dt-buttons').removeClass('btn-group');
            	$("#corpo").unblock();
				
				$("table[name='"+nmTabela+"']").parent('#tabela-padrao_wrapper').find('.esconde-coluna').click();

				if($("body").width() < 769){
					$("table[name='"+nmTabela+"']").parent('#tabela-padrao_wrapper').find('.esconde-coluna-mobile').click();
					$('html,body').stop().animate({scrollTop: $(".table[name='"+nmTabela+"']").offset().top - 80 }, 500);
				}

        	},

        },
        autoWidth: false,
        columns: [{
                data: "NR_MATRIC",
            }, {
                data: "NM_RAZAO_SOCIAL",
            }, {
                data: "STATUS",
            }, {
                data: "CNPJ_CPF",
            },{
                data: null,
                orderable: false,
                "render": function ( data, type, row, meta ) {
                    return '<div class="c-icon icone" ><a href="'+base_url+'administracao_usuarios/editar/'+data.NR_MATRIC+'"><img src="'+base_url+'assets/img/edit-icon.png" style="width: 40px;" /></a></div>';
                },
            },{
                data: null,
                orderable: false,
                "render": function ( data, type, row, meta ) {
                    return '<div class="c-icon icone" ><a href="'+base_url+'administracao_usuarios/gerar_nova_senha/'+data.NR_MATRIC+'"><img src="'+base_url+'assets/img/pass-icon.png" style="width: 40px;" /></a></div>';
                },
            },
        ],
        language: {
        	url: base_url + 'assets/js/components/tables/language_pt-br.js'
        }, 
        pageLength: 10,    
        order: [],
        dom: 'Bfrtip',
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
		buttons: btns,
	});

}

function monta_tabela_verifica_permissao(){
	$.ajax({
    	url: base_url + "administracao_usuarios/perfil_usuario_ajax",
        type: 'POST',
        success:function (data) {
            if(data != "A"){
				$( '.permissao-adm' ).each(function( index ) {
  					$(this).remove();
				});
            }
        }
    });
}