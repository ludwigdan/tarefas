
                <div class="widget widget-21 has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center ">
                        <h2>Funcionários</h2>
                    </div>
                    <div class="widget-body m--padding-top-20  m--padding-bottom-0">
                        <div class="form-group">
                        	<button type="button" class="btn btn-shadow btn-novo mr-1 mb-2 m--margin-right-30 btn-incluir" onClick="obrigatoriedadeSenha();" data-toggle="modal" data-target="#modal-funcionario">Incluir</button>
                        </div>
						<div class="col-lg-12  col-lg-mobile  m--padding-bottom-15">

							<div class="table-responsive">
								<table name="tabela-funcionarios" class="table mb-0">
									<thead>
										<tr>
											<th>Código</th>
											<th>Descrição</th>
                                            <th>CPF</th>
                                            <th>Nascimento</th>
                                            <th>Usuário</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($dados as $d){ ?>
										<tr>
											<td style="width: 10%;"><?php echo $d['id_funcionario'];?></td>
											<td><?php echo $d['nm_funcionario'];?></td>
                                            <td><?php echo $d['cpf'];?></td>
                                            <td><?php echo $d['dt_nascimento'];?></td>
                                            <td><?php echo $d['login'];?></td>
											<td style="width: 5%; text-align: center;" onClick="editFuncionario(<?php echo $d['id_funcionario']; ?>); " class="td-actions"><a href="#"  data-toggle="modal" data-target="#modal-funcionario"><i class="la la-edit edit"></i></a></td>
											<td style="width: 5%; text-align: center;" onClick="deleteFuncionario(<?php echo $d['id_funcionario']; ?>); "class="td-actions"><a href="#"><i class="la la-close delete"></i></a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
                    </div>
                </div>


<div id="modal-funcionario" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Funcionário</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <form class="form-horizontal align-items-center" id="form-funcionario" method="post" action="<?php echo base_url('funcionarios/save')?>">
                <input type="hidden" name="id_funcionario">
                <div class="modal-body">
                    <div class="form-group row d-flex align-items-center ">
                        <div class="col-md-8 m--margin-bottom-20">
                            <label class="form-control-label">Nome Completo</label>
                            <input type="text" class="form-control" name="nm_funcionario" maxlength="50" required>
                        </div>
                        <div class="col-md-4 m--margin-bottom-20">
                            <label class="form-control-label">Data de Nascimento</label>
                            <input type="text" class="form-control datepicker" name="dt_nascimento" id="dt_nascimento">
                        </div>
                        <div class="col-md-3 m--margin-bottom-20">
                            <label class="form-control-label">CPF</label>
                            <input type="text" class="form-control mascara-cpf" name="cpf" maxlength="15">
                        </div>
                        <div class="col-md-3 m--margin-bottom-20">
                            <label class="form-control-label">E-mail</label>
                            <input type="text" class="form-control" name="email" maxlength="50">
                        </div>
                        <div class="col-md-3 m--margin-bottom-20">
                            <label class="form-control-label">Login</label>
                            <input type="text" class="form-control" name="login" maxlength="50" required>
                        </div>
                        <div class="col-md-3 m--margin-bottom-20">
                            <label class="form-control-label">Senha</label>
                            <input type="password" class="form-control" name="senha">
                        </div>
                        <div style="width:100%;">
                            <div class="styled-checkbox" style="float:right; margin-right: 15px; margin-top: -15px;">
                                <input type="checkbox" id="alterar-senha">
                                <label for="alterar-senha">Alterar senha</label>
                            </div>
                        </div>
                        <div class="col-md-12 m--margin-bottom-20">
                            <label class="form-control-label">Grupos</label>
                            <select id="grupos" name="grupos[]" class="form-control selectpicker" multiple="multiple">
                                <?php foreach($grupos as $g){ ?>
                                    <option value="<?php echo $g['id_grupo'] ?>"><?php echo $g['ds_grupo'] ?></option>
                                <?php } ?>
                            </select>
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