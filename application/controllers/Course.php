<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function index()
	{
		$this->data['url'] = 'course';
		$this->load->view('course_grid',$this->data);
    }
    
    public function ICT_Training()
	{
		$this->data['url'] = 'course';
		$this->load->view('course_grid',$this->data);
	}
    
    public function single()
	{
		$this->data['url'] = 'course';
		$this->load->view('single_course',$this->data);
	}
}
