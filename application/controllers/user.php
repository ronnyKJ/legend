<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller{ 

    function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user');
        // $this->config->load('article_type');
        $this->load_params();
    }

	public function index(){
        session_start();
		$result = array(
            'uid' => $_SESSION['uid'],
            'username' => $_SESSION['username'],
            'portrait' => $_SESSION['portrait']
        );
		$this->load->view('user', $result);
	}

}

?>