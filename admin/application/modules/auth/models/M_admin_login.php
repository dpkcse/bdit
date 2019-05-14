<?php

class M_admin_login extends CI_Model {

    public $table = 'admin';
    public $user_name = 'username';
    public $email = 'user_email';
    public $pass = 'user_password';

    function __construct() {
        parent::__construct();
        $this->load->library("Db_lib");
    }

    function get_admin($user_email, $pass) {

        $query =  $this->db->select('*')
            ->from($this->table)
            ->where($this->email, $user_email)
            ->where($this->pass,  md5($pass))
            ->get();
        $result = $query->result_array();
        return $result;

    }
    function get_admin_profile()
    {

        $query = $this->db->select('*')
            ->from('admin')
            ->get();
        $result = $query->result_array();
        return $result;

    }

}
