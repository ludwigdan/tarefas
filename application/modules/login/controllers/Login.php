<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
		$this->load->view('login');
	}	

	public function autenticar()
	{
		$p = $this->input->post();
		$login = $this->model->autenticar($p);
		
		if($login !== false){
	        $sessao = array('tarefas' => $login);
	        $this->session->set_userdata($sessao);
			redirect(base_url(''));
		} else {
    		$flashdata = array(
				'mensagem' => 'Combinação de usuário e senha não encontrados',
				'titulo' => 'Atenção!',
				'tipo' => 'error',
				'tempo' => 0
            );
            $this->session->set_flashdata('mensagem_swal', $flashdata);
            $this->session->set_flashdata('login', $p['login']);
            redirect(base_url('login'));
		}
	}

    public function sair() {
        $this->session->set_userdata('tarefas', []);
        $this->session->unset_userdata('tarefas');
        redirect(base_url('login'));
    }
}
