<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');} 

class Teste extends MY_Controller {

	public function index()
	{
		$this->load->view('teste');
	}
}
