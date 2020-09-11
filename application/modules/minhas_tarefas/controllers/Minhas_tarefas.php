<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');} 

class Minhas_tarefas extends MY_Controller {

	public function index()
	{
        $this->data['carregar']['interna'] = 'minhas_tarefas';
        $this->templates->padrao($this->data);
	}
}
