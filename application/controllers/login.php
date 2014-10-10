<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{ 

    function __construct(){
        parent::__construct();
        // $this->load->model('User_model', 'user');
        // $this->config->load('article_type');
        $this->load_params();
    }

	public function index(){
		$this->load->view('login');
	}

    public function check(){
        session_start();
        
        $result = array();

        $_SESSION['uid'] = $_GET['id'];
        $_SESSION['username'] = $_GET['username'];
        $_SESSION['portrait'] = $_GET['headurl'];

        $this->load->view('check', $result);
    }

}

?>