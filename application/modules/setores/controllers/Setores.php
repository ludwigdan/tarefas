<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');} 

class Setores extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['rodape'] = [];
        $this->data['rodape']['js'][] = modulo_js('setores.js');

        $this->load->model('grupos/grupos_model','grupos');
        $this->load->model('funcionarios/funcionarios_model','funcionarios');
    }

	public function index(){
        $this->data['interna'] = [];
        $this->data['carregar']['interna'] = 'setores';
        $this->data['interna']['dados'] = $this->model->get_all();
        $this->templates->padrao($this->data);
	}

    public function save(){
        $p = $this->input->post();

        $setor['ds_setor'] = $p['ds_setor'];
        $tipos_tarefas = $this->model->tratar_dados_tipo_tarefa($p);

        if(isset($p['id_setor']) && $p['id_setor'] != ""){
            $id_setor = $p['id_setor'];

            $this->model->update($setor, $id_setor);
        } else {
            $this->model->insert($setor);
            $id_setor = $this->db->insert_id();
        }

        foreach($tipos_tarefas as $i => $tt){
            if($tt['operacao_tipo_tarefa'] == 'I'){
                $tipo_tarefa = array(
                    'id_setor'       => $id_setor,
                    'ds_tipo_tarefa' => $tt['ds_tipo_tarefa']
                );
                $this->model->insert_tipo_tarefa($tipo_tarefa);
                $id_tipo_tarefa = $this->db->insert_id();
            }

            // grupos
            foreach($tt['tipo_tarefa_grupo'] as $i => $g){
                $tipo_tarefa_grupo = array(
                    'id_tipo_tarefa' => $id_tipo_tarefa,
                    'id_grupo'       => $g
                );
                $this->model->insert_tipo_tarefa_grupo($tipo_tarefa_grupo);
            }

            // funcionarios
            foreach($tt['tipo_tarefa_func'] as $i => $f){
                $tipo_tarefa_func = array(
                    'id_tipo_tarefa' => $id_tipo_tarefa,
                    'id_funcionario' => $f
                );
                $this->model->insert_tipo_tarefa_func($tipo_tarefa_func);
            }
        }

        redirect(base_url('setores'));
    }

    public function get_by_id($idSetor){
        echo json_encode($this->model->get_by_id($idSetor));
    }

    public function delete($idGrupo){
        $this->model->delete($idGrupo);
        redirect(base_url('setores'));
    }

    public function get_vw_tipo_tarefa(){
        $p = $this->input->post();
        if($p['id_tipo_tarefa'] !== 'false'){
            $data['tipo_tarefa'] = $this->model->get_tipo_tarefa_by_id($p['id_tipo_tarefa']);
        } else {
            $data['tipo_tarefa'][0]['tipo_tarefa_func'] = [];
            $data['tipo_tarefa'][0]['tipo_tarefa_grupo'] = [];
        }
        $data['seq_tipo_tarefa'] = $p['seq_tipo_tarefa'];
        $data['grupos'] = $this->grupos->get_all();
        $data['funcionarios'] = $this->funcionarios->get_all();
        echo $this->load->view('tipo_tarefa', $data, FALSE);
    }
}
