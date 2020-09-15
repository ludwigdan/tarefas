<?php
class Grupos_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_all() {
		$this->db->select('*');
		$this->db->from("grupo");
		$this->db->order_by("ds_grupo");
		return $this->db->get()->result_array();
	}

	public function get_by_id($idGrupo) {
		$this->db->select('*');
		$this->db->from("grupo");
		$this->db->where('id_grupo', $idGrupo);
		return $this->db->get()->result_array();
	}

	public function insert($dados){
		return $this->db->insert('grupo',$dados);
	}

	public function update($dados, $idGrupo){
		$dados['dt_atualizacao'] = date('Y-m-d H:i:s');
		return $this->db->where('id_grupo', $idGrupo)->update('grupo',$dados);
	}

	public function delete($idGrupo){
		return $this->db->where('id_grupo', $idGrupo)->delete('grupo');
	}
}