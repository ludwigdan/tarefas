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
        $this->data['interna']['grupos'] = $this->grupos->get_all();
        $this->data['interna']['funcionarios'] = $this->funcionarios->get_all();
        $this->templates->padrao($this->data);
	}

    public function save(){
        $p = $this->input->post();
        $setor = array(
            'ds_setor' => $p['ds_setor']
        );
    
        if(isset($p['id_setor']) && $p['id_setor'] != ""){
            $id_setor = $p['id_setor'];

            $this->model->update($setor, $id_setor);
        } else {
            $this->model->insert($setor);
            $id_setor = $this->db->insert_id();
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
}
