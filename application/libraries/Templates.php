<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Templates {
        
        private $ci;
        
        public function __construct() {
            $this->ci =& get_instance();
        }

        public function padrao($data) {
            $this->ci->load->view('template/cabecalho', $data['cabecalho']);
            $this->ci->load->view('template/menu', $data['menu']);
            $this->ci->load->view($data['carregar']['modulo'] . '/' . $data['carregar']['interna'], $data['interna']);
            $this->ci->load->view('template/rodape', $data['rodape']);
        }

        public function login() {
            $this->ci->load->view('template/login');
        }

    }