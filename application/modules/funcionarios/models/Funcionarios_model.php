<?php
class Funcionarios_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		$this->db->select("id_funcionario, nm_funcionario, to_char(dt_nascimento, 'DD/MM/YYYY') dt_nascimento, cpf, email, login");
		$this->db->from("funcionario");
		$this->db->order_by("nm_funcionario");
		return $this->db->get()->result_array();
	}

	public function get_by_id($idFuncionario) {
		$this->db->select("id_funcionario, nm_funcionario, to_char(dt_nascimento, 'DD/MM/YYYY') dt_nascimento, cpf, email, login");
		$this->db->from("funcionario");
		$this->db->where('id_funcionario', $idFuncionario);
		$funcionario = $this->db->get()->result_array();

		$this->db->select('id_funcionario_grupo, id_grupo');
		$this->db->from("funcionario_grupo");
		$this->db->where('id_funcionario', $idFuncionario);
		$funcionario[0]['grupos'] = $this->db->get()->result_array();

		return $funcionario;
	}

	public function insert($dados){
		return $this->db->insert('funcionario',$dados);
	}

	public function update($dados, $idFuncionario){
		$dados['dt_atualizacao'] = date('Y-m-d H:i:s');
		return $this->db->where('id_funcionario', $idFuncionario)->update('funcionario',$dados);
	}

	public function delete($idFuncionario){
		return $this->db->where('id_funcionario', $idFuncionario)->delete('funcionario');
	}

	public function tratar_dados($dados){
		unset($dados['id_funcionario']);
		unset($dados['grupos']);

		$dados['cpf'] = isset($dados['cpf']) ? preg_replace('/\D/', '', $dados['cpf']) : '';

		if($dados['senha'] != ""){
			$dados['senha'] = $this->encryption->encrypt($dados['senha']);
		} else {
			unset($dados['senha']);
		}
		

		if($dados['dt_nascimento'] != ""){
            $dados['dt_nascimento'] = date_pt_bd($dados['dt_nascimento']);
        } else {
        	unset($dados['dt_nascimento']);
        }

        return $dados;
	}

	public function insert_funcionario_grupo($dados){
		return $this->db->insert('funcionario_grupo',$dados);
	}

	public function delete_funcionario_grupo($idFuncionario){
		return $this->db->where('id_funcionario', $idFuncionario)->delete('funcionario_grupo');
	}
}