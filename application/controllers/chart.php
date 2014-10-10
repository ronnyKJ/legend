<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends MY_Controller{ 

    function __construct(){
        parent::__construct();
        // $this->load->model('User_model', 'user');
        // $this->config->load('article_type');
        $this->load_params();
    }

	public function index(){
        session_start();
		$this->load->view('chart');
	}

}

?>