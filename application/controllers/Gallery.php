<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
        $this->data['url'] = 'Gallery';
        $this->data['gallery'] = $this->db->get_where('gallery',array('status =' => '0'))->result_array();
        $this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        
        foreach($this->data['gallery'] as $row){
            if(!in_array($row['cat'], $catArray)){
                array_push($catArray,$row['cat']);
            }
        }

        $this->data['cats'] = $catArray;

        $this->load->view('gallery',$this->data);
    }
}
