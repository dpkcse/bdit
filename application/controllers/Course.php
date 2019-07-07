<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('bdit');
        $this->load->helper('date');
	}

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
		$this->data['courses'] = $this->db->get_where('course',array('status =' => '0'))->result_array();
        $this->load->view('course_grid',$this->data);
	}
    
    public function single($course_id)
	{
		$this->data['url'] = 'course';
		$this->data['batch'] = $this->db->get_where('batch',array('course_id =' =>  $course_id))->result_array();
		$this->data['batches'] = $this->db->get_where('batch',array('status =' => '0'))->result_array();
		$this->data['course'] = $this->db->get_where('course',array('id =' => $course_id))->result_array();
		$this->data['courses'] = $this->db->get_where('course',array('status =' => '0'))->result_array();
		$this->data['course_outline'] = $this->db->get_where('course_outline',array('course_id =' => $course_id))->result_array();
		$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->load->view('single_course',$this->data);
	}
    
    public function instructor_s($id)
	{
		$this->data['url'] = 'course';
		$this->data['instructors'] = $this->db->get_where('instructor',array('status =' => '0'))->result_array();
		$this->data['instructor'] = $this->db->get_where('instructor',array('id =' =>$id,'status =' => '0'))->result_array();
       	$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->load->view('single_ins',$this->data);
	}
    
    public function Instructor()
	{
		$this->data['url'] = 'course';
		$this->data['instructors'] = $this->db->get_where('instructor',array('status =' => '0'))->result_array();
		$this->data['clients'] = $this->db->get_where('clients',array('status =' => '0'))->result_array();
		$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->load->view('instructor',$this->data);
	}
}
