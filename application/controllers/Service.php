<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('bdit');
        $this->load->helper('date');
	}
	
	public function service($slug,$id){
        $this->data['url'] = 'course';
        $this->data['clients'] = $this->db->get_where('clients',array('status =' => '0'))->result_array();
       	$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->data['singleServices'] = $this->db->get_where('services',array('id =' => $id))->result_array();
        $this->load->view('service',$this->data);
    }
}
