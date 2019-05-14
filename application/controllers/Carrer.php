<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrer extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('bdit');
        $this->load->helper('date');
	}
	
	public function index()
	{	
        $this->data['url'] = 'carrer';
		$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->data['joblist'] = $this->db->get_where('job',array('status =' => 'Published'))->result_array();
        $this->load->view('carrer',$this->data);
    }

    public function apply($id = null){
        
        $value['job_id'] = $id;
		$value['name'] = $_POST['name'];
		$value['email'] = $_POST['email'];
		$value['number'] = $_POST['phone'];
		
		
		if($_FILES["myfile1"]["name"] != ""){
			
			$path = "./admin/uploads/" ;
			
			$uploaded_lecture =$_FILES["myfile1"]["tmp_name"];
			$uploaded_lecture_path = $_FILES["myfile1"]["name"];
			
			$uploaded_lecture_ext = pathinfo($uploaded_lecture_path, PATHINFO_EXTENSION);
			$uploaded_lecture_new =(time().'.'.$uploaded_lecture_ext);
			
			if(is_uploaded_file($uploaded_lecture)){
				if(move_uploaded_file($uploaded_lecture,$path.$uploaded_lecture_new)){
					$value['file'] = $uploaded_lecture_new;
                    $this->db->insert('apply',$value);
                    $this->session->set_flashdata('success', 'Applied successfuly done.');
                    redirect('Carrer', 'refresh');
				} else{
                    $this->session->set_flashdata('error', 'Failed to applied');
				}
			}
			else{
                $this->session->set_flashdata('error', 'Failed to applied');
			}
		}else{
            $this->session->set_flashdata('error', 'Attached yuor CV');
		}

        
    }
}
