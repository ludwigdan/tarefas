<?php
class Setores_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		$this->db->select("*");
		$this->db->from("setor");
		$this->db->order_by("ds_setor");
		return $this->db->get()->result_array();
	}

	public function get_by_id($idSetor){
		$this->db->select("*");
		$this->db->from("setor");
		$this->db->where('id_setor', $idSetor);
		$setor = $this->db->get()->result_array();

		/*
		$this->db->select('id_funcionario_grupo, id_grupo');
		$this->db->from("funcionario_grupo");
		$this->db->where('id_funcionario', $idFuncionario);
		$funcionario[0]['grupos'] = $this->db->get()->result_array();
		*/

		return $setor;
	}

	public function insert($dados){
		return $this->db->insert('setor',$dados);
	}

	public function update($dados, $idSetor){
		$dados['dt_atualizacao'] = date('Y-m-d H:i:s');
		return $this->db->where('id_setor', $idSetor)->update('setor',$dados);
	}

	public function delete($idSetor){
		return $this->db->where('id_setor', $idSetor)->delete('setor');
	}

	public function tratar_dados($dados){
		/*
		unset($dados['id_setor']);
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
        */
	}

	public function insert_funcionario_grupo($dados){
		return $this->db->insert('funcionario_grupo',$dados);
	}

	public function delete_funcionario_grupo($idFuncionario){
		return $this->db->where('id_funcionario', $idFuncionario)->delete('funcionario_grupo');
	}
}