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

    public function save($type = null){
        if ($this->session->userdata('admin_logged_in')) {
            $this->setOutputMode(NORMAL);
            /* Load form helper */ 
            $this->load->helper(array('form'));
                    
            /* Load form validation library */ 
            $this->load->library('form_validation');

            if($type == 'instructor'){
                $sessionData = $this->session->userdata('admin_logged_in');
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
                    $inputInsertData= array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'mobile' => $this->input->post('phone'),
                        'created_by' => $sessionData['user_id']
                    );
        
                    $this->m_training->insertData('instructor',$inputInsertData);
                    $this->session->set_flashdata('success', 'Data Saved Successfully');
                    redirect(base_url() . 'Instructor', 'refresh');
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
                        $inputInsertData= array(
                            'name' => $this->input->post('name'),
                            'email' => $this->input->post('email'),
                            'mobile' => $this->input->post('phone')
                        );
                        $this->db->where('id', $targetid);
                        $this->db->update('instructor', $inputInsertData);
                        $this->session->set_flashdata('msg', 'Data Update Successfully');
                        redirect(base_url() . 'Instructor', 'refresh');
                    }
                }
            }else if($action == 'do_delete'){
                if($type == 'instructor'){
                    $this->db->where('id', $targetid);
                    $this->db->delete('instructor');
                    $this->session->set_flashdata('msg', 'Data Delete Successfully');
                    redirect(base_url() . 'Instructor', 'refresh');
                }
            }
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }
    
}
