<?php
class MY_Controller extends MX_Controller
{	
	protected $data;
	public function __construct() {
		parent::__construct();

		// Inicializa variável com dados
		$this->data['cabecalho'] = '';
		$this->data['menu'] = '';
		$this->data['interna'] = '';
		$this->data['rodape'] = '';

        // Model padrão
        $model = $this->router->class . '_model';
        $this->load->model($model, 'model');

        // Módulo padrão a ser carregado
        $this->data['carregar']['modulo'] = $this->router->class;	
	}
}
