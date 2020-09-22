
                <div class="widget widget-21 has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center ">
                        <h2>Grupos</h2>
                    </div>
                    <div class="widget-body m--padding-top-20  m--padding-bottom-0">
                        <div class="form-group">
                        	<button type="button" class="btn btn-shadow btn-novo mr-1 mb-2   m--margin-right-30" data-toggle="modal" data-target="#modal-grupo">Incluir</button>
                        </div>

						<div class="col-lg-12  col-lg-mobile  m--padding-bottom-15">
							<div class="table-responsive">
								<table name="tabela-grupos" class="table mb-0">
									<thead>
										<tr>
											<th>Código</th>
											<th>Descrição</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($dados as $d){ ?>
										<tr>
											<td style="width: 10%;"><?php echo $d['id_grupo'];?></td>
											<td><?php echo $d['ds_grupo'];?></td>
											<td style="width: 5%; text-align: center;" onClick="editGrupo(<?php echo $d['id_grupo']; ?>)" class="td-actions"><a href="#"  data-toggle="modal" data-target="#modal-grupo"><i class="la la-edit edit"></i></a></td>
											<td style="width: 5%; text-align: center;" onClick="deleteGrupo(<?php echo $d['id_grupo']; ?>)"class="td-actions"><a href="#"><i class="la la-close delete"></i></a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
                    </div>
                </div>


<div id="modal-grupo" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Grupo</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <form class="form-horizontal align-items-center" id="form-grupo" method="post" action="<?php echo base_url('grupos/save')?>">
                <input type="hidden" name="id_grupo">
                <div class="modal-body">
                    <div class="form-group row d-flex align-items-center ">
                        <div class="col-md-12 m--margin-bottom-20">
                            <label class="form-control-label">Descrição</label>
                            <input type="text" class="form-control" name="ds_grupo" maxlength="30" required>
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