<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');} 

class Grupos extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data['rodape'] = [];
        $this->data['rodape']['js'][] = modulo_js('grupos.js');
    }

	public function index(){
        $this->data['interna'] = [];
        $this->data['carregar']['interna'] = 'grupos';
        $this->data['interna']['dados'] = $this->model->get_all();
        $this->templates->padrao($this->data);
	}

    public function save(){
        $p = $this->input->post();
        $dados['ds_grupo'] = $p['ds_grupo'];
        if(isset($p['id_grupo']) && $p['id_grupo'] != ""){
            $this->model->update($dados, $p['id_grupo']);
        } else {
            $this->model->insert($dados);
        }
        redirect(base_url('grupos'));
    }

    public function get_by_id($idGrupo){
        echo json_encode($this->model->get_by_id($idGrupo));
    }

    public function delete($idGrupo){
        $this->model->delete($idGrupo);
        redirect(base_url('grupos'));
    }
}
