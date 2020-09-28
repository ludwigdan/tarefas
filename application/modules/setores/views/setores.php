
                <div class="widget widget-21 has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center ">
                        <h2>Setores</h2>
                    </div>
                    <div class="widget-body m--padding-top-20  m--padding-bottom-0">
                        <div class="form-group">
                        	<button type="button" class="btn btn-shadow btn-novo mr-1 mb-2 m--margin-right-30 btn-incluir" data-toggle="modal" data-target="#modal-setor" onClick="resetar_form('form-setor'); addTipoTarefa(); ">Incluir</button>
                        </div>
						<div class="col-lg-12  col-lg-mobile  m--padding-bottom-15">

							<div class="table-responsive">
								<table name="tabela-setores" class="table mb-0">
									<thead>
										<tr>
											<th style="width: 10%;">Código</th>
											<th>Descrição</th>
											<th style="width: 5%; text-align: center;" ></th>
											<th style="width: 5%; text-align: center;"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($dados as $d){ ?>
										<tr>
											<td><?php echo $d['id_setor'];?></td>
											<td><?php echo $d['ds_setor'];?></td>
											<td onClick="editSetor(<?php echo $d['id_setor']; ?>); " class="td-actions"><a href="#"  data-toggle="modal" data-target="#modal-setor"><i class="la la-edit edit"></i></a></td>
											<td onClick="deleteSetor(<?php echo $d['id_setor']; ?>); "class="td-actions"><a href="#"><i class="la la-close delete"></i></a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
                    </div>
                </div>


<div id="modal-setor" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Setor</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <form class="form-horizontal align-items-center" id="form-setor" method="post" action="<?php echo base_url('setores/save')?>">
                <input type="hidden" name="id_setor">
                <div class="modal-body">
                    <div class="form-group row d-flex align-items-center ">
                        <div class="col-md-12 m--margin-bottom-10">
                            <label class="form-control-label">Descrição</label>
                            <input type="text" class="form-control" name="ds_setor" maxlength="30" required>
                        </div>
                    </div>
                    <div class="row">
                        <h4 style="width: 50%; padding-left: 15px;">Tipos de Tarefas</h4>
                        <span style="width: 50%; padding-right: 15px; margin-bottom: .5rem;"><i class="la la-plus btn-action" style="float: right;" title="Adicionar" onClick="addTipoTarefa();"></i></span>    
                        <div class="col-12" >
                            <div id="accordion-icon-left" class="accordion-icon icon-01">
                                <div class="widget has-shadow" id="lista-tipo-tarefa">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-shadow btn-cancelar" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>