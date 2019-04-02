<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Web_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('m_project');
        $this->load->helper('date');
    }

    public function index()
    {
        $this->data['title'] = 'Project Detail';
        $this->data['message'] = 'Projects';
        $this->data['projects'] = $this->db->get('projects')->result_array();
        $this->load->view('home/v_slider_view', $this->data);
    }
}
