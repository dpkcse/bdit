<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyCustom404Ctrl extends CI_Controller  {
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->output->set_status_header('404');

        // Make sure you actually have some view file named 404.php
        $this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->load->view('404');
    }
}