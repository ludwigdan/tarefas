
                <div class="widget widget-21 has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center ">
                        <h2>Setores</h2>
                    </div>
                    <div class="widget-body m--padding-top-20  m--padding-bottom-0">
                        <div class="form-group">
                        	<button type="button" class="btn btn-shadow btn-novo mr-1 mb-2 m--margin-right-30 btn-incluir" data-toggle="modal" data-target="#modal-setor">Incluir</button>
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
                        <span style="width: 50%; padding-right: 15px; margin-bottom: .5rem;"><i class="la la-plus btn-action" style="float: right;" title="Adicionar"></i></span>    
                        <div class="col-12">
                            <div id="accordion-icon-left" class="accordion-icon icon-01">
                                <div class="widget has-shadow">
                                    <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconLeftCollapseOne">
                                        <div class="card-title" style="width: 50%;">Criação de Sistemas</div>
                                        <span style="width: 50%;"><i class="la la-close btn-action" style="float: right;" title="Excluir"></i></span>
                                    </a>
                                    <div id="IconLeftCollapseOne" class="card-body collapse pt-0" data-parent="#accordion-icon-left">
                                        <div class="form-group row d-flex align-items-center ">
                                            <div class="col-md-12 m--margin-bottom-5">
                                                <label class="form-control-label">Descrição</label>
                                                <input type="text" class="form-control" name="ds_setor" maxlength="30" required>
                                            </div>
                                        </div>
                                        <h3 class="m--margin-bottom-20">Implementação</h3>
                                        <div class="form-group row d-flex align-items-center ">
                                            <div class="col-md-6 m--margin-bottom-20">
                                                <label class="form-control-label">Grupos</label>
                                                <select id="grupos" name="grupos[]" class="form-control selectpicker" multiple="multiple">
                                                    <?php foreach($grupos as $g){ ?>
                                                        <option value="<?php echo $g['id_grupo'] ?>"><?php echo $g['ds_grupo'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 m--margin-bottom-20">
                                                <label class="form-control-label">Funcionários</label>
                                                <select id="funcionarios" name="grupos[]" class="form-control selectpicker" multiple="multiple">
                                                    <?php foreach($funcionarios as $f){ ?>
                                                        <option value="<?php echo $f['id_funcionario'] ?>"><?php echo $f['nm_funcionario'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <h3 style="width: 50%;  padding-left: 15px;"class="m--margin-bottom-20">Aprovações</h3>
                                        <span style="width: 50%; padding-right: 15px; margin-bottom: .5rem;"><i class="la la-plus btn-action" style="float: right;" title="Adicionar"></i></span>    
                                        </div>
                                        <div class="form-group row d-flex align-items-center card-master-detail">
                                            <div class="col-md-12 m--margin-bottom-5">
                                                <label class="form-control-label">Descrição</label>
                                                <i class="la la-close btn-action" style="float: right; margin-top: -5px;" title="Excluir"></i>
                                                <input type="text" class="form-control" name="ds_setor" maxlength="30" required>
                                            </div>
                                            <div class="col-md-6 m--margin-bottom-20">
                                                <label class="form-control-label">Grupos</label>
                                                <select id="grupos-aprov" name="grupos[]" class="form-control selectpicker" multiple="multiple">
                                                    <?php foreach($grupos as $g){ ?>
                                                        <option value="<?php echo $g['id_grupo'] ?>"><?php echo $g['ds_grupo'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 m--margin-bottom-20">
                                                <label class="form-control-label">Funcionários</label>
                                                <select id="funcionarios-aprov" name="grupos[]" class="form-control selectpicker" multiple="multiple">
                                                    <?php foreach($funcionarios as $f){ ?>
                                                        <option value="<?php echo $f['id_funcionario'] ?>"><?php echo $f['nm_funcionario'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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