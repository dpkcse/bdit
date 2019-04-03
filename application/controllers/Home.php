<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('bdit');
        $this->load->helper('date');
	}
	
	public function index()
	{	
		$this->data['banners'] = $this->db->get_where('banner',array('status =' => '0'))->result_array();
		$this->data['news'] = $this->db->get_where('news',array('status =' => '0'))->result_array();
        $this->load->view('home',$this->data);
    }
    
    public function getNews(){
        $data = $this->db->get_where('news',array('id =' => $this->input->post('id')))->result_array();
        $jsonData = array(
            'data' => $data[0]
        );
        
        header("Content-Type: application/json; charset=utf-8", true);
        echo json_encode($jsonData);
    }
}
