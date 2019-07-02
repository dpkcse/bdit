<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Web_controller extends MY_Controller {

    private $login;
    public $dashboard;
    public $logout_url;

    function __construct() {
        parent::__construct();
        
        $this->login = 'welcome/login';
        $this->dashboard = 'dashboard';
        $this->logout_url = 'welcome/login/logout';
        
        $this->is_logged_in();
        
    }

    protected function is_logged_in() {

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/admin_login/login');
        }
    }

    protected function title($title) {
        $this->data['title'] = trim($title);
    }

}
