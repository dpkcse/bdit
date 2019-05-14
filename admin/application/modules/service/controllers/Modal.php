<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
    }
	
	/*
	*	$page_name		=	The name of page
	*/
	
	function popup($page_name = '' , $param2 = '' , $param3 = '')
	{	
		
		//$account_type		=	$this->session->userdata('login_type');
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
		//$page_data['system_name']		=	"Manufacturing System";
		$this->load->view( 'service/'.$page_name.'.php' ,$page_data);
	}
}

