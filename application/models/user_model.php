<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function data(){
        $sql = 'select * from `user`';
        return $this->db->query($sql)->result_array();
    }

}