<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('bdit');
        $this->load->helper('date');
	}
	
	public function index()
	{	
        $catArray = array();
        $this->data['url'] = 'portfolio';
        $this->data['works'] = $this->db->get_where('work',array('status =' => '0'))->result_array();
        $this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        
        foreach($this->data['works'] as $row){
            if(!in_array($row['cat'], $catArray)){
                array_push($catArray,$row['cat']);
            }
        }

        $this->data['cats'] = $catArray;

        $this->load->view('portfolio',$this->data);
    }
}
