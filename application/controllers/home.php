<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'user');
        // $this->config->load('article_type');
        $this->load_params();
    }

	public function index(){
		$data = $this->user->data();
		$result = array(
            'data' => $data
        );
		$this->load->view('home', $result);
	}

}

?>