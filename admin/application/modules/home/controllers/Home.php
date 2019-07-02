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

            $attachment = $_FILES["fileinput"]["tmp_name"];
            $attachment_path = time() . $_FILES["fileinput"]["name"];

            if (is_uploaded_file($attachment)) {
                if (move_uploaded_file($attachment, './uploads/' . $attachment_path)) {
                    $inputInsertData= array(
                        'heading' => $this->input->post('heading'),
                        'link' => $this->input->post('link'),
                        'image ' => $attachment_path,
                        'createdby ' => $sessionData['user_id'],
                    );
                    $insertedid = $this->m_project->insertData('banner',$inputInsertData);
                    $this->session->set_flashdata('success', 'Data Upload Successfully');
                    redirect(base_url() . 'home', 'refresh');
                }else{
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect(base_url() . 'home', 'refresh');
                }
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

            $attachment = $_FILES["fileinput"]["tmp_name"];
            $attachment_path = time() . $_FILES["fileinput"]["name"];

            if (is_uploaded_file($attachment)) {
                if (move_uploaded_file($attachment, './uploads/' . $attachment_path)) {
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
                }else{
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(base_url() . 'News', 'refresh');
                }
            }
            
        
        }else{
            $this->load->view('auth/v_admin_login');
        }

    }

    public function LatestWork()
    {
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->data['title'] = 'News';
            $this->data['message'] = 'News';
            $this->data['works'] = $this->db->get('work')->result_array();
            $this->load->view('home/v_LatestWork', $this->data);
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    
    public function saveWork(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');

            if($this->input->post('type') == 'img'){
                if (!is_dir("./uploads/")) {
                    mkdir('./uploads/', 0777, TRUE);
                }
    
                $attachment = $_FILES["fileinput"]["tmp_name"];
                $attachment_path = time() . $_FILES["fileinput"]["name"];
    
                if (is_uploaded_file($attachment)) {
                    if (move_uploaded_file($attachment, './uploads/' . $attachment_path)) {
                        $inputInsertData= array(
                            'title' => $this->input->post('title'),
                            'description' => $this->input->post('description'),
                            'cat' => $this->input->post('category'),
                            'type' => $this->input->post('type'),
                            'link' => '',
                            'image ' => $attachment_path,
                            'createdby ' => $sessionData['user_id']
                        );
                        $insertedid = $this->m_project->insertData('work',$inputInsertData);
                        $this->session->set_flashdata('success', 'Data Upload Successfully');
                        redirect(base_url() . 'LatestWork', 'refresh');
                    }else{
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect(base_url() . 'LatestWork', 'refresh');
                    }
                }
            }else if($this->input->post('type') == 'vdo'){
                $inputInsertData= array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'cat' => $this->input->post('category'),
                    'type' => $this->input->post('type'),
                    'link' => $this->input->post('link'),
                    'image ' => '',
                    'createdby ' => $sessionData['user_id']
                );
                $insertedid = $this->m_project->insertData('work',$inputInsertData);
                $this->session->set_flashdata('success', 'Data Upload Successfully');
                redirect(base_url() . 'LatestWork', 'refresh');
            }
            
        }else{
            $this->load->view('auth/v_admin_login');
        }

    }
    
    public function Gallery()
    {
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->data['title'] = 'News';
            $this->data['message'] = 'News';
            $this->data['gallery'] = $this->db->get('gallery')->result_array();
            $this->load->view('home/v_gallery', $this->data);
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function saveGallery(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');

            if($this->input->post('type') == 'img'){
                if (!is_dir("./uploads/")) {
                    mkdir('./uploads/', 0777, TRUE);
                }
    
                $attachment = $_FILES["fileinput"]["tmp_name"];
                $attachment_path = time() . $_FILES["fileinput"]["name"];
    
                if (is_uploaded_file($attachment)) {
                    if (move_uploaded_file($attachment, './uploads/' . $attachment_path)) {
                        $inputInsertData= array(
                            'title' => $this->input->post('title'),
                            'description' => $this->input->post('description'),
                            'cat' => $this->input->post('category'),
                            'type' => $this->input->post('type'),
                            'link' => '',
                            'image ' => $attachment_path,
                            'createdby ' => $sessionData['user_id']
                        );
                        $insertedid = $this->m_project->insertData('gallery',$inputInsertData);
                        $this->session->set_flashdata('success', 'Data Upload Successfully');
                        redirect(base_url() . 'Gallery', 'refresh');
                    }else{
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect(base_url() . 'Gallery', 'refresh');
                    }
                }
            }else if($this->input->post('type') == 'vdo'){
                $inputInsertData= array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'cat' => $this->input->post('category'),
                    'type' => $this->input->post('type'),
                    'link' => $this->input->post('link'),
                    'image ' => '',
                    'createdby ' => $sessionData['user_id']
                );
                $insertedid = $this->m_project->insertData('gallery',$inputInsertData);
                $this->session->set_flashdata('success', 'Data Upload Successfully');
                redirect(base_url() . 'Gallery', 'refresh');
            }
            
        }else{
            $this->load->view('auth/v_admin_login');
        }

    }

    public function Client()
    {
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->data['title'] = 'Client';
            $this->data['message'] = 'Client';
            $this->data['clients'] = $this->db->get('clients')->result_array();
            $this->load->view('home/v_Client', $this->data);
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function saveClient(){
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
                        'image ' => $attachment_path,
                        'createdby ' => $sessionData['user_id'],
                    );
                    $insertedid = $this->m_project->insertData('clients',$inputInsertData);
                    $this->session->set_flashdata('success', 'Data Upload Successfully');
                    redirect(base_url() . 'Client', 'refresh');
                }else{
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect(base_url() . 'Client', 'refresh');
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


                if($param3 == 'banner')
                    redirect(base_url() . 'home', 'refresh');
                else if ($param3 == 'news')
                    redirect(base_url() . 'News', 'refresh');
                else if ($param3 == 'gallery')
                    redirect(base_url() . 'Gallery', 'refresh');
            }

            if ($param1 == 'do_update') {

                if($param3 == 'banner'){
                    $attachment = $_FILES["fileinput"]["tmp_name"];
                    $attachment_path = time() . $_FILES["fileinput"]["name"];

                    if($attachment != ''){
                        if (is_uploaded_file($attachment)) {
                            if (move_uploaded_file($attachment, './uploads/' . $attachment_path)) {
                                $inputInsertData= array(
                                    'heading' => $this->input->post('heading'),
                                    'link' => $this->input->post('link'),
                                    'image ' => $attachment_path,
                                );
                                $this->db->where('id', $param2);
                                $this->db->update('banner', $inputInsertData);
                                $this->session->set_flashdata('msg', 'Data Update Successfully');
                                redirect(base_url() . 'home', 'refresh');
                            }else{
                                $this->session->set_flashdata('error', $this->upload->display_errors());
                                redirect(base_url() . 'home', 'refresh');
                            }
                        }
                    }else{
                        $inputInsertData= array(
                            'heading' => $this->input->post('heading'),
                            'link' => $this->input->post('link')
                        );
                        $this->db->where('id', $param2);
                        $this->db->update('banner', $inputInsertData);
                        $this->session->set_flashdata('msg', 'Data Update Successfully');
                        redirect(base_url() . 'home', 'refresh');
                    }
                }else if($param3 == 'news'){
                    $attachment = $_FILES["fileinput"]["tmp_name"];
                    $attachment_path = time() . $_FILES["fileinput"]["name"];

                    if($attachment != ''){
                        if (is_uploaded_file($attachment)) {
                            if (move_uploaded_file($attachment, './uploads/' . $attachment_path)) {
                                $inputInsertData= array(
                                    'title' => $this->input->post('title'),
                                    'description' => $this->input->post('description'),
                                    'link' => $this->input->post('link'),
                                    'image ' => $attachment_path,
                                );

                                $this->db->where('id', $param2);
                                $this->db->update('news', $inputInsertData);
                                $this->session->set_flashdata('msg', 'Data Update Successfully');
                                redirect(base_url() . 'News', 'refresh');
                            }else{
                                $this->session->set_flashdata('error', $this->upload->display_errors());
                                redirect(base_url() . 'News', 'refresh');
                            }
                        }
                    }else{
                        $inputInsertData= array(
                            'title' => $this->input->post('title'),
                            'description' => $this->input->post('description'),
                            'link' => $this->input->post('link')
                        );
                        $this->db->where('id', $param2);
                        $this->db->update('news', $inputInsertData);
                        $this->session->set_flashdata('msg', 'Data Update Successfully');
                        redirect(base_url() . 'News', 'refresh');
                    }
                }
                
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

    public function featureUpdate(){
        $this->setOutputMode(NORMAL);
        if ($this->session->userdata('admin_logged_in')) {
            $inputInsertData= array(
                'featured' => $this->input->post('valu'),
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
