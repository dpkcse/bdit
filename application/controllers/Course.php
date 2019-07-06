<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function index()
	{
		$this->data['url'] = 'course';
		$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->load->view('course_grid',$this->data);
    }
    
    public function ICT_Training()
	{
		$this->data['url'] = 'course';
		$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->load->view('course_grid',$this->data);
	}
    
    public function single()
	{
		$this->data['url'] = 'course';
		$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->load->view('single_course',$this->data);
	}
    
    public function Instructor()
	{
		$this->data['url'] = 'course';
		$this->data['clients'] = $this->db->get_where('clients',array('status =' => '0'))->result_array();
		$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->load->view('instructor',$this->data);
	}
}
