<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Carrer extends Web_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_project'); // load Module model
		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index() {
		if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->data['title'] = 'Carrer';
            $this->data['message'] = 'Carrer';
			$data['joblist'] = $this-> m_project ->selectallrow("job");
			$this->load->view('carrer/v_carrer_view', $data);
        }else{
            $this->load->view('auth/v_admin_login');
		}
		
	}

	public function download($fileInfo){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //file path
            $file = './uploads/'.$fileInfo;
            
            //download file from directory
            force_download($file, NULL);
        }
    }

	public function applicant() {
		if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->data['title'] = 'Applicant';
            $this->data['message'] = 'Applicant';
			$data['apply_list'] = $this-> m_project ->selectallrow("apply");
			$this->load->view('carrer/v_apply_view', $data);
        }else{
            $this->load->view('auth/v_admin_login');
		}
		
	}

	public function jodedit($target = false,$id = false){
		if($this->session -> userdata('admin_logged_in')){
			if($target == 'title'){
				$inputInsertData= array(
					'title' => $this->input->post('title')
				);
				$this->db->where('job_id', $id);
				$this->db->update('job', $inputInsertData);
				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'nov'){
				$inputInsertData= array(
					'vacancies' => $this->input->post('nov')
				);
				$this->db->where('job_id', $id);
				$this->db->update('job', $inputInsertData);
				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'category'){
				$inputInsertData= array(
					'category' => $this->input->post('category')
				);
				$this->db->where('job_id', $id);
				$this->db->update('job', $inputInsertData);
				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'jobna'){
				$inputInsertData= array(
					'job_nature' => $this->input->post('jobna')
				);
				$this->db->where('job_id', $id);
				$this->db->update('job', $inputInsertData);
				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'jobloc'){
				$inputInsertData= array(
					'job_location' => $this->input->post('jobloc')
				);
				$this->db->where('job_id', $id);
				$this->db->update('job', $inputInsertData);
				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'salrang'){
				$inputInsertData= array(
					'salary' => $this->input->post('salrang')
				);
				$this->db->where('job_id', $id);
				$this->db->update('job', $inputInsertData);
				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'exp_date'){
				$inputInsertData= array(
					'exp_date' => $this->input->post('exp_date')
				);
				$this->db->where('job_id', $id);
				$this->db->update('job', $inputInsertData);
				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'jobrespon'){

				$this->m_project->deletefrom("job_desc", array('job_id'=>$id));

				$jobrespon = $this->input->post('jobrespon');
				if ($jobrespon != "") {
					foreach ($jobrespon as $key => $value) {
						$desc['description'] = $value;
						$desc['job_id'] = $id;
	            		$this->m_project->insertinto("job_desc", $desc);
					}
				}

				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'jobedureq'){

				$this->m_project->deletefrom("edu_req", array('job_id'=>$id));

				$jobedureq = $this->input->post('jobedureq');
				if ($jobedureq != "") {
					foreach ($jobedureq as $key => $value) {
						$edu_req['requ'] = $value;
						$edu_req['job_id'] = $id;
						$this->m_project->insertinto("edu_req", $edu_req);
					}
				}

				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'jobexpreq'){

				$this->m_project->deletefrom("ex_req", array('job_id'=>$id));

				$jobexpreq = $this->input->post('jobexpreq');
				if ($jobexpreq != "") {
					foreach ($jobexpreq as $key => $value) {
						$ex_req['experience'] = $value;
						$ex_req['job_id'] = $id;
						$this->m_project->insertinto("ex_req", $ex_req);
					}
				}

				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'jobaddreq'){

				$this->m_project->deletefrom("additional_req", array('job_id'=>$id));

				$jobaddreq = $this->input->post('jobaddreq');
				if ($jobaddreq != "") {
					foreach ($jobaddreq as $key => $value) {
						$additional_req['requirement'] = $value;
						$additional_req['job_id'] = $id;
	            		$this->m_project->insertinto("additional_req", $additional_req);
					}
				}

				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}elseif($target == 'jobothreq'){

				$this->m_project->deletefrom("benefit", array('job_id'=>$id));

				$jobothreq = $this->input->post('jobothreq');
				if ($jobothreq != "") {
					foreach ($jobothreq as $key => $value) {
						$benefit['benefit'] = $value;
						$benefit['job_id'] = $id;
						$this->m_project->insertinto("benefit", $benefit);
					}
				}

				$this->session->set_flashdata('msg', 'Data Update Successfully');
				redirect(base_url() . 'carrer/edit/'.$id, 'refresh');

			}
		}else{
			$this->load->view('auth/v_admin_login');
		}
	}


	public function sjob(){
		if($this->session -> userdata('admin_logged_in')){
			
			$this->form_validation->set_rules('title', 'Job Title', 'required|trim|xss_clean');
			$this->form_validation->set_rules('nov', 'No. of Vacancies', 'required|xss_clean|trim');
			$sessionData = $this->session->userdata('admin_logged_in');
			
			if($this->form_validation->run() == FALSE){
				//Field validation failed
				redirect('carrer', 'refresh');
			}else{
				$vlu['title'] = $_POST["title"];
	            $vlu['vacancies'] = $_POST["nov"];
	            $vlu['job_nature'] = $_POST["jobna"];
	            $vlu['job_location'] = $_POST["jobloc"];
	            $vlu['salary'] = $_POST["salrang"];
	            $vlu['exp_date'] = $_POST["exp_date"];
	            $vlu['post_date'] = $_POST["post_date"];

	            $vlu['create'] = $sessionData['user_id'];
	            $vlu['status'] = $_POST["status"];
				$vlu['category'] = $_POST["category"];
				
	            $data["flderID"] = $this->m_project->insertinto("job", $vlu);
	            
	            $jobrespon = $_POST["jobrespon"];
	            $jobedureq = $_POST["jobedureq"];
	            $jobexpreq = $_POST["jobexpreq"];
	            $jobaddreq = $_POST["jobaddreq"];
	            $jobothreq = $_POST["jobothreq"];
	            
	            $desc['job_id'] = $data["flderID"];
	            $additional_req['job_id'] = $data["flderID"];
	            $benefit['job_id'] = $data["flderID"];
	            $edu_req['job_id'] = $data["flderID"];
	            $ex_req['job_id'] = $data["flderID"];
				
				if ($data["flderID"] > 0) {
	                
	                if ($jobrespon != "") {
	                	foreach ($jobrespon as $key => $value) {
		                	$desc['description'] = $value;
		                	$this->m_project->insertinto("job_desc", $desc);
		                }
	                }
	                
	                if ($jobedureq != "") {
	                	foreach ($jobedureq as $key => $value) {
		                	$edu_req['requ'] = $value;
		                	$this->m_project->insertinto("edu_req", $edu_req);
		                }
	                }

	                if ($jobexpreq != "") {
	                	foreach ($jobexpreq as $key => $value) {
		                	$ex_req['experience'] = $value;
		                	$this->m_project->insertinto("ex_req", $ex_req);
		                }
	                }

	                if ($jobaddreq != "") {
	                	foreach ($jobaddreq as $key => $value) {
		                	$additional_req['requirement'] = $value;
		                	$this->m_project->insertinto("additional_req", $additional_req);
		                }
	                }

	                if ($jobothreq != "") {
	                	foreach ($jobothreq as $key => $value) {
		                	$benefit['benefit'] = $value;
		                	$this->m_project->insertinto("benefit", $benefit);
		                }
	                }
	                
	                redirect('carrer', 'refresh');
	            }

			}
		}else{
			$this->load->view('auth/v_admin_login');
		}
	}

	public function picUpload(){
		if ($this->session->userdata('admin_logged_in')) {
			
			$json = array();
			$path = "./uploads/";
			$postMsg = "";
			
			foreach($_FILES["fileinput"]["tmp_name"] as $key=>$tmp_name){
				$path = "./req/upload/";
				$attachment =$_FILES["fileinput"]["tmp_name"][$key];
				$attachment_path = $_FILES["fileinput"]["name"][$key];
				$attachment_ext = pathinfo($attachment_path, PATHINFO_EXTENSION);
				$attachment_new =(time().$key.'.'.$attachment_ext);
				if(is_uploaded_file($attachment)){
					if(move_uploaded_file($attachment,$path.$attachment_new)){
						$data_array = array('name' => $attachment_new, 'isPub' => '0');

						if(! empty($data_array)){ // if message empty, do nothing
							$this->m_project->insertinto("picture", $data_array);
						}
					}
				}
			}

			redirect('carrer', 'refresh');

		}
	}

	public function edit($id = false){
		if ($this->session->userdata('admin_logged_in')) {
			if(isset($id)){
				$data['job_detail'] = $this-> m_project ->selectWhere('job',array('job_id'=>$id));
				$data['job_desc'] = $this-> m_project ->selectWhere('job_desc',array('job_id'=>$id));
				$data['additional_req'] = $this-> m_project ->selectWhere('additional_req',array('job_id'=>$id));
				$data['edu_req'] = $this-> m_project ->selectWhere('edu_req',array('job_id'=>$id));
				$data['ex_req'] = $this-> m_project ->selectWhere('ex_req',array('job_id'=>$id));
				$data['benefit'] = $this-> m_project ->selectWhere('benefit',array('job_id'=>$id));

				$this->data['title'] = 'Carrer';
				$this->data['message'] = 'Carrer';
				$this->load->view('carrer/v_job_edit', $data);
			}
		}else{
			$this->load->view('auth/v_admin_login');
		}
		
	}

	public function pubCheck($picID=false,$isVal = false){
		if(isset($picID)){
			if($isVal==0){
				$inputdata = array(
	                "isPub" => '1'
	            );
			}elseif($isVal==1){
				$inputdata = array(
	                "isPub" => '0'
	            );
			}
			$this->m_project->updatefor("picture", $inputdata, array('id'=>$picID));
			redirect('carrer', 'refresh');
		}
	}

	public function pubCheckJob($jobID=false,$isVal = false){
		if(isset($jobID)){
			if($isVal=='Unpublished'){
				$inputdata = array(
	                "status" => 'Published'
	            );
			}elseif($isVal=='Published'){
				$inputdata = array(
	                "status" => 'Unpublished'
	            );
			}
			$this->m_project->updatefor("job", $inputdata, array('job_id'=>$jobID));
			redirect('carrer', 'refresh');
		}
	}
	
	public function delete_applicant($fileName = false,$apply_id=false){
		
		$this->m_project->deletefrom("apply", array('apply_id'=>$apply_id));
		if(!$fileName ){
			$path = "./uploads/";
			unlink($pat.$fileName);
		}
		redirect('Applicant', 'refresh');
	}

	public function deletePic($picID=false){
		$this->m_project->deletefrom("picture", array('id'=>$picID));
		redirect('carrer', 'refresh');
	}

	public function deleteJob($jobID=false){
		$this->m_project->deletefrom("job", array('job_id'=>$jobID));
		redirect('carrer', 'refresh');
	}

}
