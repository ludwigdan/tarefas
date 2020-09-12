<?php
class Login_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function autenticar($p) {
		$this->db->select('*');
		$this->db->from("funcionario");
		$this->db->where("login", $p['login']);
		$get = $this->db->get()->row_array();

		if(isset($get['senha']) && $this->encryption->decrypt($get['senha']) == $p['senha']){
			return $get;
		} else {
			return false;
		}

	}

}