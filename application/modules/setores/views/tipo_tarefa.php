
                                    <a id="tipo-tarefa-header-<?php echo $seq_tipo_tarefa; ?>"  class="tipo-tarefa-header card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#tipoTarefaCollapse-<?php echo $seq_tipo_tarefa; ?>">
                                        <div class="card-title" style="width: 97%;"></div>
                                        <span onClick="deleteTipoTarefa(<?php echo $seq_tipo_tarefa; ?>);" style="width: 3%;"><i class="la la-close btn-action" style="float: right;"  title="Excluir"></i></span>
                                    </a>
                                    <div id="tipoTarefaCollapse-<?php echo $seq_tipo_tarefa; ?>" class="tipoTarefaCollapse card-body collapse pt-0 tipo-tarefa-card" data-parent="#accordion-icon-left">
                                        <input type="hidden" name="id_tipo_tarefa[<?php echo $seq_tipo_tarefa; ?>]" value="<?php echo isset($tipo_tarefa[0]['id_tipo_tarefa']) ? $tipo_tarefa[0]['id_tipo_tarefa'] : '' ; ?>">
                                        <input type="hidden" name="operacao_tipo_tarefa[<?php echo $seq_tipo_tarefa; ?>]" id="operacao_tipo_tarefa-<?php echo $seq_tipo_tarefa; ?>" value="<?php echo isset($tipo_tarefa[0]['id_tipo_tarefa']) ? 'U' : 'I' ; ?>">
                                        <div class="form-group row d-flex align-items-center ">
                                            <div class="col-md-12 m--margin-bottom-5">
                                                <label class="form-control-label">Descrição</label>
                                                <input type="text" class="form-control ds_tipo_tarefa" data-seq-tipo-tarefa="<?php echo $seq_tipo_tarefa; ?>" name="ds_tipo_tarefa[<?php echo $seq_tipo_tarefa; ?>]" maxlength="30" required value="<?php echo isset($tipo_tarefa[0]['ds_tipo_tarefa']) ? $tipo_tarefa[0]['ds_tipo_tarefa'] : '' ; ?>">
                                            </div>
                                        </div>
                                        <h3 class="m--margin-bottom-20">Implementação</h3>
                                        <div class="form-group row d-flex align-items-center ">
                                            <div class="col-md-6 m--margin-bottom-20">
                                                <label class="form-control-label">Grupos</label>
                                                <select id="tipo_tarefa_grupo-<?php echo $seq_tipo_tarefa; ?>" name="tipo_tarefa_grupo[<?php echo $seq_tipo_tarefa; ?>][]" class="form-control selectpicker" multiple="multiple">
                                                    <?php foreach($grupos as $g){ ?>
                                                        <option <?php echo in_array($g['id_grupo'], $tipo_tarefa[0]['tipo_tarefa_grupo']) ? 'selected' : ''; ?> value="<?php echo $g['id_grupo'] ?>"><?php echo $g['ds_grupo'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 m--margin-bottom-20">
                                                <label class="form-control-label">Funcionários</label>
                                                <select id="tipo_tarefa_func-<?php echo $seq_tipo_tarefa; ?>" name="tipo_tarefa_func[<?php echo $seq_tipo_tarefa; ?>][]" class="form-control selectpicker" multiple="multiple">
                                                    <?php foreach($funcionarios as $f){ ?>
                                                        <option <?php echo in_array($f['id_funcionario'], $tipo_tarefa[0]['tipo_tarefa_func']) ? 'selected' : ''; ?> value="<?php echo $f['id_funcionario'] ?>"><?php echo $f['nm_funcionario'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!--
                                        <div class="row">
                                        <h3 style="width: 50%;  padding-left: 15px;"class="m--margin-bottom-20">Aprovações</h3>
                                        <span style="width: 50%; padding-right: 15px; margin-bottom: .5rem;"><i class="la la-plus btn-action" style="float: right;" title="Adicionar"></i></span>    
                                        </div>
                                        <div class="form-group row d-flex align-items-center card-master-detail">
                                            <div class="col-md-12 m--margin-bottom-5">
                                                <label class="form-control-label">Descrição</label>
                                                <i class="la la-close btn-action" style="float: right; margin-top: -5px;" title="Excluir"></i>
                                                <input type="text" class="form-control" name="ds_aprovacao[][]" maxlength="30" required>
                                            </div>
                                            <div class="col-md-6 m--margin-bottom-20">
                                                <label class="form-control-label">Grupos</label>
                                                <select id="aprovacao_grupo" name="aprovacao_grupo[][]" class="form-control selectpicker" multiple="multiple">
                                                    <?php foreach($grupos as $g){ ?>
                                                        <option value="<?php echo $g['id_grupo'] ?>"><?php echo $g['ds_grupo'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 m--margin-bottom-20">
                                                <label class="form-control-label">Funcionários</label>
                                                <select id="aprovacao_funcionario" name="aprovacao_funcionario[]" class="form-control selectpicker" multiple="multiple">
                                                    <?php foreach($funcionarios as $f){ ?>
                                                        <option value="<?php echo $f['id_funcionario'] ?>"><?php echo $f['nm_funcionario'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        -->
                                    </div>