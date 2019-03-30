<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function index()
	{
		$this->load->view('course_grid');
    }
    
    public function ICT_Training()
	{
		$this->load->view('course_grid');
	}
    
    public function single()
	{
		$this->load->view('single_course');
	}
}
