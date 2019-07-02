<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends Web_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('m_project');
        $this->load->helper('date');
    }

    public function index()
    {
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->data['title'] = 'Service';
            $this->data['message'] = 'Service';
            $this->data['services'] = $this->db->get('services')->result_array();
            $this->load->view('service/v_service_view', $this->data);
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function saveService(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');

            if (!is_dir("./uploads/")) {
                mkdir('./uploads/', 0777, TRUE);
            }

            $attachment = $_FILES["fileinput"]["tmp_name"];
            $attachment_path = time() . $_FILES["fileinput"]["name"];

            if (is_uploaded_file($attachment)) {
                if (move_uploaded_file($attachment, './uploads/' . $attachment_path)) {
                    $inputInsertData= array(
                        'title' => $this->input->post('heading'),
                        'slug' => $this->input->post('slug'),
                        'menu_name' => $this->input->post('menuName'),
                        'description' => $this->input->post('detail'),
                        'image ' => $attachment_path,
                        'createdby ' => $sessionData['user_id']
                    );
                    $insertedid = $this->m_project->insertData('services',$inputInsertData);
                    $this->session->set_flashdata('success', 'Data Upload Successfully');
                    redirect(base_url() . 'service', 'refresh');
                }else{
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect(base_url() . 'service', 'refresh');
                }
            }
        
        
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function bannerAction($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $currrentDate = date('Y-m-d H:i:s');
            
            if ($param1 == 'delete') {
                $this->db->where('id', $param2);
                $this->db->delete($param3);
                $this->session->set_flashdata('success', 'Data Delete Successfully');
                redirect(base_url() . 'service', 'refresh');
            }

            if ($param1 == 'do_update') {

                $attachment = $_FILES["fileinput"]["tmp_name"];
                $attachment_path = time() . $_FILES["fileinput"]["name"];

                if($attachment != ''){
                    if (is_uploaded_file($attachment)) {
                        if (move_uploaded_file($attachment, './uploads/' . $attachment_path)) {
                            $inputInsertData= array(
                                'title' => $this->input->post('heading'),
                                'slug' => $this->input->post('slug'),
                                'menu_name' => $this->input->post('menuName'),
                                'description' => $this->input->post('detail'),
                                'image ' => $attachment_path
                            );

                            $this->db->where('id', $param2);
                            $this->db->update('services', $inputInsertData);
                            $this->session->set_flashdata('msg', 'Data Update Successfully');
                            redirect(base_url() . 'service', 'refresh');
                            
                        }else{
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect(base_url() . 'service', 'refresh');
                        }
                    }
                }else{
                    $inputInsertData= array(
                        'title' => $this->input->post('heading'),
                        'slug' => $this->input->post('slug'),
                        'menu_name' => $this->input->post('menuName'),
                        'description' => $this->input->post('detail')
                    );
                    $this->db->where('id', $param2);
                    $this->db->update('services', $inputInsertData);
                    $this->session->set_flashdata('msg', 'Data Update Successfully');
                    redirect(base_url() . 'service', 'refresh');
                }
                
            }

        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    
}
