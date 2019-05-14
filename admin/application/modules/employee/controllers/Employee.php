<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends Web_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('m_employees');
        $this->load->model('projects/m_project');
        $this->load->helper('date');
    }

    public function index()
    {
        $this->data['title'] = 'Project Detail';
        $this->data['message'] = 'Projects';
        $this->data['employees'] = $this->db->get('employees')->result_array();
        $this->load->view('employee/v_employee', $this->data);
    }

    
    public function employeePanel()
    {
        $this->data['title'] = 'Employee Workforce';
        $this->data['message'] = 'Employee Workforce';
        $this->data['employees'] = $this->db->get('employee_workforce')->result_array();
        $this->load->view('employee/v_employee_workforce', $this->data);
    }


    public function saveEmployee(){
        
        $this->setOutputMode(NORMAL);
        if ($this->session->userdata('admin_logged_in')) {
            
            $jsonData = array();
            $sessionData = $this->session->userdata('admin_logged_in');
            
            // $data['user_name'] = $sessionData['user_name'];
            // $data['user_id'] = $sessionData['user_id'];
            // $data['user_email'] = $sessionData['user_email'];

            $currrentDate = date('Y-m-d H:i:s');
            
            $inputInsertData= array(
                            'emp_number' => $this->input->post('EmployeeNumber'),
                            'emp_name' => $this->input->post('EmployeeName'),
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id'],
                            'is_available' => '1',
                        );
            
            $jsonData['insertID'] = $this->m_employees->insertData('employees',$inputInsertData);

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($jsonData);
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function saveTime(){
        
        $this->setOutputMode(NORMAL);
        if ($this->session->userdata('admin_logged_in')) {
            
            $jsonData = array();
            $sessionData = $this->session->userdata('admin_logged_in');
            
            // $data['user_name'] = $sessionData['user_name'];
            // $data['user_id'] = $sessionData['user_id'];
            // $data['user_email'] = $sessionData['user_email'];

            $currrentDate = date('Y-m-d H:i:s');
            
            $inputInsertData= array(
                            'emp_id' => $this->input->post('EmployeeName'),
                            'pro_id' => $this->input->post('ProjectName'),
                            'work_date' => $this->input->post('workdate'),
                            'start_time' => $this->input->post('startdate'),
                            'end_time' => $this->input->post('enddate'),
                            'is_approve' => '1'
                        );
            
            $jsonData['insertID'] = $this->m_employees->insertData('employee_workforce',$inputInsertData);

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($jsonData);
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    function employeeAction($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $currrentDate = date('Y-m-d H:i:s');
            
            if ($param1 == 'do_update') {
                
                $inputInsertData= array(
                            'emp_number' => $this->input->post('EmployeeNumber'),
                            'emp_name' => $this->input->post('EmployeeName'),
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id'],
                            'is_available' => '1',
                        );
            
                
                $this->db->where('emp_id', $param2);
                $this->db->update('employees', $inputInsertData);
                $this->session->set_flashdata('msg', 'Data Update Successfully');
                redirect(base_url() . 'employee', 'refresh');
            }
            if ($param1 == 'delete') {
                $this->db->where('emp_id', $param2);
                $this->db->delete('employees');
                $this->session->set_flashdata('msg', 'Data Delete Successfully');
                redirect(base_url() . 'employee', 'refresh');
            }
        }else{
            $this->load->view('auth/v_admin_login');
        }
        
        
    }


}
