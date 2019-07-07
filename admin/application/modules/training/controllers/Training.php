<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends Web_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('m_training');
        $this->load->helper('date');
    }

    public function index()
    {
        $this->data['title'] = 'Training';
        $this->data['message'] = 'Training';
        $this->data['instructor'] = $this->db->get('instructor')->result_array();
        $this->load->view('training/v_instructor', $this->data);
    }

    public function instructor()
    {
        $this->data['title'] = 'Instructor';
        $this->data['message'] = 'Instructor';
        $this->data['instructor'] = $this->db->get('instructor')->result_array();
        $this->load->view('training/v_instructor', $this->data);
    }

    public function student()
    {
        $this->data['title'] = 'Student';
        $this->data['message'] = 'Student';
        $this->data['student'] = $this->db->get('student')->result_array();
        $this->load->view('training/v_student', $this->data);
    }

    public function course()
    {
        $this->data['title'] = 'Course';
        $this->data['message'] = 'Course';
        $this->data['course'] = $this->db->get('course')->result_array();
        $this->load->view('training/v_course', $this->data);
    }

    public function batch()
    {
        $this->data['title'] = 'Batch';
        $this->data['message'] = 'Batch';
        $this->data['batch'] = $this->db->get('batch')->result_array();
        $this->load->view('training/v_batch', $this->data);
    }

    public function save($type = null){
        if ($this->session->userdata('admin_logged_in')) {
            $this->setOutputMode(NORMAL);
            /* Load form helper */ 
            $this->load->helper(array('form'));
                    
            /* Load form validation library */ 
            $this->load->library('form_validation');
            $sessionData = $this->session->userdata('admin_logged_in');
            if($type == 'instructor'){
                if (!is_dir("./uploads/instructor/")) {
                    mkdir('./uploads/instructor/', 0777, TRUE);
                }
    
                $attachment = $_FILES["fileinput"]["tmp_name"];
                $attachment_path = time() . $_FILES["fileinput"]["name"];
                /* Set validation rule for name field in the form */ 
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('phone', 'Phone', 'required');
                
                $currrentDate = date('Y-m-d H:i:s');
                if ($this->form_validation->run() == FALSE) { 
                    $this->session->set_flashdata('success', 'Required feild(s) data missing');
                    redirect(base_url() . 'Instructor', 'refresh');
                } else { 
                    if (is_uploaded_file($attachment)) {
                        if (move_uploaded_file($attachment, './uploads/instructor/' . $attachment_path)) {
                            $inputInsertData= array(
                                'name' => $this->input->post('name'),
                                'email' => $this->input->post('email'),
                                'mobile' => $this->input->post('phone'),
                                'created_by' => $sessionData['user_id'],
                                'detail' => $this->input->post('detail'),
                                'img ' => $attachment_path,
                            );
                
                            $this->m_training->insertData('instructor',$inputInsertData);
                            $this->session->set_flashdata('success', 'Data Saved Successfully');
                            redirect(base_url() . 'Instructor', 'refresh');

                        }else{
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect(base_url() . 'Course', 'refresh');
                        }
                    }
                }
            }else if($type == 'course'){
                if (!is_dir("./uploads/course/")) {
                    mkdir('./uploads/course/', 0777, TRUE);
                }
    
                $attachment = $_FILES["fileinput"]["tmp_name"];
                $attachment_path = time() . $_FILES["fileinput"]["name"];
    
                if (is_uploaded_file($attachment)) {
                    if (move_uploaded_file($attachment, './uploads/course/' . $attachment_path)) {
                        $inputInsertData= array(
                            'title' => $this->input->post('coursetitle'),
                            'category' => $this->input->post('cat'),
                            'detail' => $this->input->post('courseintro'),
                            'img ' => $attachment_path,
                            'createdby ' => $sessionData['user_id']
                        );
                        $insertedid = $this->m_training->insertData('course',$inputInsertData);
                        $this->session->set_flashdata('success', 'Data Save Successfully');
                        redirect(base_url() . 'Course', 'refresh');
                    }else{
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url() . 'Course', 'refresh');
                    }
                }
            }else if($type == 'outline'){
                /* Set validation rule for name field in the form */ 
                $this->form_validation->set_rules('course_id', 'Course ID', 'required');
                $courseOutline = $this->input->post('courseOutline');
                
                $currrentDate = date('Y-m-d H:i:s');
                if ($this->form_validation->run() == FALSE) { 
                    $this->session->set_flashdata('success', 'Required feild(s) data missing');
                    redirect(base_url() . 'Course', 'refresh');
                } else { 
                    $this->m_training->deletefrom("course_outline", array('course_id'=>$this->input->post('course_id')));
                    if ($courseOutline != "") {
	                	foreach ($courseOutline as $key => $value) {
		                	$inputInsertData= array(
                                'course_id' => $this->input->post('course_id'),
                                'detail' =>  $value
                            );
                            $this->m_training->insertData('course_outline',$inputInsertData);
		                }
                    }
                    
                    $this->session->set_flashdata('success', 'Data Saved Successfully');
                    redirect(base_url() . 'Course', 'refresh');
                }
            }else if($type == 'batch'){
                /* Set validation rule for name field in the form */ 
                $this->form_validation->set_rules('course_title', 'Course Title', 'required');
                $this->form_validation->set_rules('instructor', 'Instructor', 'required');
                $this->form_validation->set_rules('duration', 'Duration', 'required');
                $this->form_validation->set_rules('start_date', 'Start Date', 'required');
                $this->form_validation->set_rules('end_date', 'End Date', 'required');
                $this->form_validation->set_rules('session', 'Session', 'required');
                $this->form_validation->set_rules('total_seat', 'Total Seat', 'required');
                
                $currrentDate = date('Y-m-d H:i:s');
                
                if ($this->form_validation->run() == FALSE) { 
                    $this->session->set_flashdata('success', 'Required feild(s) data missing');
                    redirect(base_url() . 'Batch', 'refresh');
                } else { 
                    $batchtitle = 'BITI-'.date('Y').'-'.$this->input->post('course_title').'-'.rand(10,199);
                    $inputInsertData= array(
                        'title' => $batchtitle,
                        'course_id' => $this->input->post('course_title'),
                        'total_seat' => $this->input->post('total_seat'),
                        'duration' => $this->input->post('duration'),
                        'session' => $this->input->post('session'),
                        'start_at' => $this->input->post('start_date'),
                        'end_at' => $this->input->post('end_date'),
                        'instructor' => $this->input->post('instructor'),
                        'created_by' => $sessionData['user_id']
                    );
        
                    $this->m_training->insertData('batch',$inputInsertData);
                    $this->session->set_flashdata('success', 'Data Saved Successfully');
                    redirect(base_url() . 'Batch', 'refresh');
                }
            }else if($type == 'student'){

                /* Set validation rule for name field in the form */ 
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('phone', 'Phone', 'required');
                
                $currrentDate = date('Y-m-d H:i:s');
                if ($this->form_validation->run() == FALSE) { 
                    $this->session->set_flashdata('success', 'Required feild(s) data missing');
                    redirect(base_url() . 'Student', 'refresh');
                } else { 
                    $inputInsertData= array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'mobile' => $this->input->post('phone'),
                        'created_by' => $sessionData['user_id']
                    );
        
                    $this->m_training->insertData('student',$inputInsertData);
                    $this->session->set_flashdata('success', 'Data Saved Successfully');
                    redirect(base_url() . 'Student', 'refresh');
                }
            }
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function action($type = '', $action = '', $targetid = ''){
        if ($this->session->userdata('admin_logged_in')) {
            if($action == 'do_update'){
                /* Load form helper */ 
                $this->load->helper(array('form'));
                                    
                /* Load form validation library */ 
                $this->load->library('form_validation');
                if($type == 'instructor'){
                    /* Set validation rule for name field in the form */ 
                    $this->form_validation->set_rules('name', 'Name', 'required');
                    $this->form_validation->set_rules('email', 'Email', 'required');
                    $this->form_validation->set_rules('phone', 'Phone', 'required');
                    
                    $currrentDate = date('Y-m-d H:i:s');
                    if ($this->form_validation->run() == FALSE) { 
                        $this->session->set_flashdata('success', 'Required feild(s) data missing');
                        redirect(base_url() . 'Instructor', 'refresh');
                    } 
                    else { 
                        $attachment = $_FILES["fileinput"]["tmp_name"];
                        $attachment_path = time() . $_FILES["fileinput"]["name"];

                        if($attachment != ''){
                            if (is_uploaded_file($attachment)) {
                                if (move_uploaded_file($attachment, './uploads/instructor/' . $attachment_path)) {
                                    $inputInsertData= array(
                                        'name' => $this->input->post('name'),
                                        'email' => $this->input->post('email'),
                                        'mobile' => $this->input->post('phone'),
                                        'detail' => $this->input->post('detail'),
                                        'img ' => $attachment_path
                                    );
    
                                    $this->db->where('id', $targetid);
                                    $this->db->update('instructor', $inputInsertData);
                                    $this->session->set_flashdata('msg', 'Data Update Successfully');
                                    redirect(base_url() . 'Instructor', 'refresh');
                                    
                                }else{
                                    $this->session->set_flashdata('error', $this->upload->display_errors());
                                    redirect(base_url() . 'Instructor', 'refresh');
                                }
                            }
                        }else{
                            $inputInsertData= array(
                                'name' => $this->input->post('name'),
                                'email' => $this->input->post('email'),
                                'mobile' => $this->input->post('phone'),
                                'detail' => $this->input->post('detail')
                            );
                            $this->db->where('id', $targetid);
                            $this->db->update('instructor', $inputInsertData);
                            $this->session->set_flashdata('msg', 'Data Update Successfully');
                            redirect(base_url() . 'Instructor', 'refresh');
                        }
                    }

                }else if($type == 'course' ){
                    $attachment = $_FILES["fileinput"]["tmp_name"];
                    $attachment_path = time() . $_FILES["fileinput"]["name"];

                    if($attachment != ''){
                        if (is_uploaded_file($attachment)) {
                            if (move_uploaded_file($attachment, './uploads/course/' . $attachment_path)) {
                                $inputInsertData= array(
                                    'title' => $this->input->post('title'),
                                    'category' => $this->input->post('cat'),
                                    'detail' => $this->input->post('detail'),
                                    'img ' => $attachment_path
                                );

                                $this->db->where('id', $targetid);
                                $this->db->update('course', $inputInsertData);
                                $this->session->set_flashdata('msg', 'Data Update Successfully');
                                redirect(base_url() . 'Course', 'refresh');
                                
                            }else{
                                $this->session->set_flashdata('error', $this->upload->display_errors());
                                redirect(base_url() . 'Course', 'refresh');
                            }
                        }
                    }else{
                        $inputInsertData= array(
                            'title' => $this->input->post('title'),
                            'category' => $this->input->post('cat'),
                            'detail' => $this->input->post('detail')
                        );
                        $this->db->where('id', $targetid);
                        $this->db->update('course', $inputInsertData);
                        $this->session->set_flashdata('msg', 'Data Update Successfully');
                        redirect(base_url() . 'Course', 'refresh');
                    }
                }else if($type == 'student'){
                    /* Set validation rule for name field in the form */ 
                    $this->form_validation->set_rules('name', 'Name', 'required');
                    $this->form_validation->set_rules('email', 'Email', 'required');
                    $this->form_validation->set_rules('phone', 'Phone', 'required');
                    
                    $currrentDate = date('Y-m-d H:i:s');
                    if ($this->form_validation->run() == FALSE) { 
                        $this->session->set_flashdata('success', 'Required feild(s) data missing');
                        redirect(base_url() . 'Student', 'refresh');
                    } 
                    else { 
                        $inputInsertData= array(
                            'name' => $this->input->post('name'),
                            'email' => $this->input->post('email'),
                            'mobile' => $this->input->post('phone')
                        );
                        $this->db->where('id', $targetid);
                        $this->db->update('student', $inputInsertData);
                        $this->session->set_flashdata('msg', 'Data Update Successfully');
                        redirect(base_url() . 'Student', 'refresh');
                    }
                }else if($type == 'batch'){
                     /* Set validation rule for name field in the form */ 
                    $this->form_validation->set_rules('course_title', 'Course Title', 'required');
                    $this->form_validation->set_rules('instructor', 'Instructor', 'required');
                    $this->form_validation->set_rules('duration', 'Duration', 'required');
                    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
                    $this->form_validation->set_rules('end_date', 'End Date', 'required');
                    $this->form_validation->set_rules('session', 'Session', 'required');
                    $this->form_validation->set_rules('total_seat', 'Total Seat', 'required');
                    
                    $currrentDate = date('Y-m-d H:i:s');
                    
                    if ($this->form_validation->run() == FALSE) { 
                        $this->session->set_flashdata('success', 'Required feild(s) data missing');
                        redirect(base_url() . 'Batch', 'refresh');
                    } else { 
                        $inputInsertData= array(
                            'title' => $batchtitle,
                            'course_id' => $this->input->post('course_title'),
                            'total_seat' => $this->input->post('total_seat'),
                            'duration' => $this->input->post('duration'),
                            'session' => $this->input->post('session'),
                            'start_at' => $this->input->post('start_date'),
                            'end_at' => $this->input->post('end_date'),
                            'instructor' => $this->input->post('instructor')
                        );

                        $this->db->where('id', $targetid);
                        $this->db->update('batch', $inputInsertData);
                        $this->session->set_flashdata('msg', 'Data Update Successfully');
                        redirect(base_url() . 'Batch', 'refresh');
                    }
                }
            }else if($action == 'do_delete'){
                if($type == 'instructor'){
                    $this->db->where('id', $targetid);
                    $this->db->delete('instructor');
                    $this->session->set_flashdata('msg', 'Data Delete Successfully');
                    redirect(base_url() . 'Instructor', 'refresh');
                }else if($type == 'course'){
                    $this->db->where('id', $targetid);
                    $this->db->delete('course');
                    $this->session->set_flashdata('msg', 'Data Delete Successfully');
                    redirect(base_url() . 'Course', 'refresh');
                }else if($type == 'student'){
                    $this->db->where('id', $targetid);
                    $this->db->delete('student');
                    $this->session->set_flashdata('msg', 'Data Delete Successfully');
                    redirect(base_url() . 'Student', 'refresh');
                }else if($type == 'batch'){
                    $this->db->where('id', $targetid);
                    $this->db->delete('batch');
                    $this->session->set_flashdata('msg', 'Data Delete Successfully');
                    redirect(base_url() . 'Batch', 'refresh');
                }
            }
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }
    
}
