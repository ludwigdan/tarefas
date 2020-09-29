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

		
		$this->db->select('id_tipo_tarefa, ds_tipo_tarefa');
		$this->db->from("tipo_tarefa");
		$this->db->where('id_setor', $idSetor);
		$setor[0]['tipos_tarefas'] = $this->db->get()->result_array();
		
		return $setor;
	}

	public function get_tipo_tarefa_by_id($idTipoTarefa){
		$this->db->select("ds_tipo_tarefa, id_tipo_tarefa");
		$this->db->from("tipo_tarefa");
		$this->db->where('id_tipo_tarefa', $idTipoTarefa);
		$tipo_tarefa = $this->db->get()->result_array();

		// grupos
		$this->db->select('id_grupo');
		$this->db->from("tipo_tarefa_grupo");
		$this->db->where('id_tipo_tarefa', $idTipoTarefa);
		$tipo_tarefa_grupo = $this->db->get()->result_array();
		foreach($tipo_tarefa_grupo as $i => $ttg){
			$tipo_tarefa[0]['tipo_tarefa_grupo'][] = $ttg['id_grupo'];
		}
		

		// funcionarios
		$this->db->select('id_funcionario');
		$this->db->from("tipo_tarefa_func");
		$this->db->where('id_tipo_tarefa', $idTipoTarefa);
		$tipo_tarefa_func = $this->db->get()->result_array();
		foreach($tipo_tarefa_func as $i => $ttf){
			$tipo_tarefa[0]['tipo_tarefa_func'][] = $ttf['id_funcionario'];
		}
		
		return $tipo_tarefa;
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

	public function insert_tipo_tarefa($dados){
		return $this->db->insert('tipo_tarefa',$dados);
	}

	public function update_tipo_tarefa($dados, $idTipoTarefa){
		$dados['dt_atualizacao'] = date('Y-m-d H:i:s');
		return $this->db->where('id_tipo_tarefa', $idTipoTarefa)->update('tipo_tarefa',$dados);
	}

	public function delete_tipo_tarefa($idTipoTarefa){
		return $this->db->where('id_tipo_tarefa', $idTipoTarefa)->delete('tipo_tarefa');
	}

	public function insert_tipo_tarefa_grupo($dados){
		return $this->db->insert('tipo_tarefa_grupo',$dados);
	}

	public function delete_tipo_tarefa_grupo($idTipoTarefa){
		return $this->db->where('id_tipo_tarefa', $idTipoTarefa)->delete('tipo_tarefa_grupo');
	}

	public function insert_tipo_tarefa_func($dados){
		return $this->db->insert('tipo_tarefa_func',$dados);
	}

	public function delete_tipo_tarefa_func($idTipoTarefa){
		return $this->db->where('id_tipo_tarefa', $idTipoTarefa)->delete('tipo_tarefa_func');
	}

	public function tratar_dados_tipo_tarefa($dados){
		$tipos_tarefas = [];
		foreach($dados['id_tipo_tarefa'] as $i => $tt){
			$tipo_tarefa = array(
				'id_tipo_tarefa'       => $dados['id_tipo_tarefa'][$i],
				'operacao_tipo_tarefa' => $dados['operacao_tipo_tarefa'][$i],
				'ds_tipo_tarefa'       => $dados['ds_tipo_tarefa'][$i]
			);

			if(isset($dados['tipo_tarefa_grupo'][$i])){
				foreach($dados['tipo_tarefa_grupo'][$i] as $i2 => $g){
					$tipo_tarefa['tipo_tarefa_grupo'][] = $g;
				}
			}

			if(isset($dados['tipo_tarefa_func'][$i])){
				foreach($dados['tipo_tarefa_func'][$i] as $i2 => $g){
					$tipo_tarefa['tipo_tarefa_func'][] = $g;
				}
			}
			$tipos_tarefas[] = $tipo_tarefa;
		}

		return $tipos_tarefas;
	}
}