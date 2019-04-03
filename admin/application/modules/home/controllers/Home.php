<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Web_Controller
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
            $this->data['title'] = 'Banner';
            $this->data['message'] = 'Banner';
            $this->data['banners'] = $this->db->get('banner')->result_array();
            $this->load->view('home/v_slider_view', $this->data);
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function news()
    {
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->data['title'] = 'News';
            $this->data['message'] = 'News';
            $this->data['news'] = $this->db->get('news')->result_array();
            $this->load->view('home/v_news', $this->data);
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function saveBanner(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');

            if (!is_dir("./uploads/")) {
                mkdir('./uploads/', 0777, TRUE);
            }

            $attachment_path = time() . $_FILES["fileinput"]["name"];
            
            $config['upload_path'] = "./uploads/";
            $config['allowed_types'] = 'JPEG|jpg|png|JPG|PNG|jpeg';
            $config['file_name'] = $attachment_path;
            $this->load->library('upload', $config);

            $this->load->library('upload', $config);
            

            if ($this->upload->do_upload("fileinput")) {
                $inputInsertData= array(
                    'heading' => $this->input->post('heading'),
                    'link' => $this->input->post('link'),
                    'image ' => $attachment_path,
                    'createdby ' => $sessionData['user_id'],
                );
                $insertedid = $this->m_project->insertData('banner',$inputInsertData);
                $this->session->set_flashdata('success', 'Data Upload Successfully');
                redirect(base_url() . 'home', 'refresh');
            } else {
                // echo $this->upload->display_errors();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(base_url() . 'home', 'refresh');
            }
        
        }else{
            $this->load->view('auth/v_admin_login');
        }

    }


    public function saveNews(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');

            if (!is_dir("./uploads/")) {
                mkdir('./uploads/', 0777, TRUE);
            }

            $attachment_path = time() . $_FILES["fileinput"]["name"];
            
            $config['upload_path'] = "./uploads/";
            $config['allowed_types'] = 'JPEG|jpg|png|JPG|PNG|jpeg';
            $config['file_name'] = $attachment_path;
            $this->load->library('upload', $config);

            $this->load->library('upload', $config);
            

            if ($this->upload->do_upload("fileinput")) {
                $inputInsertData= array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'link' => $this->input->post('link'),
                    'image ' => $attachment_path,
                    'createdby ' => $sessionData['user_id'],
                    'publish_date ' => $this->input->post('datepicker'),
                );
                $insertedid = $this->m_project->insertData('news',$inputInsertData);
                $this->session->set_flashdata('success', 'Data Upload Successfully');
                redirect(base_url() . 'News', 'refresh');
            } else {
                // echo $this->upload->display_errors();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(base_url() . 'News', 'refresh');
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


                if($param3 == 'banner')
                    redirect(base_url() . 'home', 'refresh');
                else if ($param3 == 'news')
                    redirect(base_url() . 'News', 'refresh');
            }
        }else{
            $this->load->view('auth/v_admin_login');
        }
        
        
    }

    public function statusUpdate(){
        $this->setOutputMode(NORMAL);
        if ($this->session->userdata('admin_logged_in')) {
            $inputInsertData= array(
                'status' => $this->input->post('valu'),
            );
    
            $this->db->where('id', $this->input->post('id'));
            $this->db->update($this->input->post('tbl'), $inputInsertData);

            $jsonData = array(
                'data' => true
            );
            
            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($jsonData);
        }
        
    }

}
