<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Web_Controller
{

    function __construct()
    {
        parent::__construct();
        
        $this->load->model('m_dashboard');
     //   $this->load->model('auth/admin_login_model');
        
    }

    public function index()
    {
        $this->data['title'] = 'Admin Dashboard';
        $this->data['message'] = 'This Admin Dashboard';
        $this->load->view('dashboard/v_dashboard', $this->data);
    }

    public function admin_profile()
    {
        $this->data['title'] = 'Admin Profile';
        $this->data['admin_profile'] = $this->m_dashboard->get_admin_profile();
        $this->load->view('dashboard/v_admin_profile', $this->data);
    }

}
