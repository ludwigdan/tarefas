<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');} 

class Funcionarios extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['rodape'] = [];
        $this->data['rodape']['js'][] = modulo_js('funcionarios.js');

        $this->load->model('grupos/grupos_model','grupos');
    }

	public function index(){
        $this->data['interna'] = [];
        $this->data['carregar']['interna'] = 'funcionarios';
        $this->data['interna']['dados'] = $this->model->get_all();
        $this->data['interna']['grupos'] = $this->grupos->get_all();
        $this->templates->padrao($this->data);
	}

    public function save(){
        $p = $this->input->post();
        $funcionario = $this->model->tratar_dados($p);
        $grupos = isset($p['grupos']) ? $p['grupos'] : [];

        if(isset($p['id_funcionario']) && $p['id_funcionario'] != ""){
            $id_funcionario = $p['id_funcionario'];

            $this->model->update($funcionario, $id_funcionario);
            $this->model->delete_funcionario_grupo($id_funcionario);
        } else {
            $this->model->insert($funcionario);
            $id_funcionario = $this->db->insert_id();
        }

        foreach($grupos as $id_grupo){
            $grupo = array(
                'id_funcionario' => $id_funcionario,
                'id_grupo' => $id_grupo
            );

            $this->model->insert_funcionario_grupo($grupo);
        }

        redirect(base_url('funcionarios'));
    }

    public function get_by_id($idGrupo){
        echo json_encode($this->model->get_by_id($idGrupo));
    }

    public function delete($idGrupo){
        $this->model->delete($idGrupo);
        redirect(base_url('funcionarios'));
    }
}
