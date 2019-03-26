<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Web_Controller
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
        // $this->data['title'] = 'Project Detail';
        // $this->data['message'] = 'Projects';
        // $this->data['projects'] = $this->db->get('projects')->result_array();
        // $this->load->view('projects/v_project', $this->data);
        $this->load->view('auth/v_admin_login');
    }

    public function drawing(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->load->view('v_report_drawing');
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function production(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->load->view('v_report_production');
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function delivery(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $this->load->view('v_report_delivery');
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function searchDrawing(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $jsonData = array();
            $jsonData['Actual']= array();
            $jsonData['IFA']= array();
            $this->setOutputMode(NORMAL);

            $sessionData = $this->session->userdata('admin_logged_in');
            
            $proID = $this->input->post('projectID');
            $level = $this->input->post('LevelID');
            
            $jsonData['ProjectNumber'] =  $this->m_project->get_type_name_by_id('projects',$proID);
            
            $jsonData['Level'] =  $level;

            $jsonData['drawing'] = $this ->db
                                         ->group_by('panel_type') 
                                         ->get_where('getdrawinhinfo', array('pro_id'=>$proID,'level'=>$level))
                                         ->result_array();
            

            foreach ($jsonData['drawing'] as $key => $value) {
                array_push($jsonData['Actual'], $this->m_project->TotalDrawing($level,$value['panel_type']));
                array_push($jsonData['IFA'], $this->m_project->TotalApproveDrawing($level,$value['panel_type']));
                
            } 
            
            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($jsonData);
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function planForProduction(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $jsonData = array();
            
            $this->setOutputMode(NORMAL);

            $sessionData = $this->session->userdata('admin_logged_in');
            
            $level = $this->input->post('LevelID');
            $type = $this->input->post('type');
            
            $jsonData['level'] =  $level;
            $jsonData['type'] =  $type;

            $jsonData['totalPlan'] = $this->m_project->TotalPlan($level,$type);
            $jsonData['totalProducePlan'] = $this->m_project->totalProducePlan($level,$type,'1');

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($jsonData);
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function ForDeliverReport(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $jsonData = array();
            $this->setOutputMode(NORMAL);

            $sessionData = $this->session->userdata('admin_logged_in');
            
            $level = $this->input->post('LevelID');
            $type = $this->input->post('typePanel');
            
            $jsonData['level'] =  $level;
            $jsonData['type'] =  $type;
            $jsonData['totalPlan'] = $this->m_project->TotalPlan($level,$type);
            $jsonData['totalProducePlan'] = $this->m_project->totalProducePlan($level,$type,'1');
            $jsonData['totaldelivered'] = $this->m_project->totalProducePlan($level,$type,'2');

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($jsonData);
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function saveProject(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $this->setOutputMode(NORMAL);
            $sessionData = $this->session->userdata('admin_logged_in');
            
            // $data['user_name'] = $sessionData['user_name'];
            // $data['user_id'] = $sessionData['user_id'];
            // $data['user_email'] = $sessionData['user_email'];

            $currrentDate = date('Y-m-d H:i:s');
            
            $inputInsertData= array(
                            'pro_number' => $this->input->post('ProjectNumber'),
                            'pro_name' => $this->input->post('ProjectName'),
                            'client' => $this->input->post('Client'),
                            'contact' => $this->input->post('Contact'),
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id']
                        );
            $insertID = $this->m_project->insertData('projects',$inputInsertData);
            
            $jsonData = array(
                'data' => $insertID
            );
            

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($jsonData);
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function saveProjectType(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $this->setOutputMode(NORMAL);
            $sessionData = $this->session->userdata('admin_logged_in');
            
            // $data['user_name'] = $sessionData['user_name'];
            // $data['user_id'] = $sessionData['user_id'];
            // $data['user_email'] = $sessionData['user_email'];

            $currrentDate = date('Y-m-d H:i:s');
            
            $inputInsertData= array(
                            'pro_id' => $this->input->post('ProID'),
                            'type' => $this->input->post('Type'),
                            'thickness' => $this->input->post('Thickness'),
                            'qty' => $this->input->post('Number'),
                            'area' => $this->input->post('Area'),
                            'cost_effiency_rate' => $this->input->post('CER')
                        );
            $insertID = $this->m_project->insertData('project_summary',$inputInsertData);
            
            $jsonData = array(
                'data' => $insertID
            );
            

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($jsonData);
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function upload_file(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $qstring = array();

            $this->setOutputMode(NORMAL);
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
            
            if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    
                    //open uploaded csv file with read only mode
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    
                    // skip first line
                    // if your csv file have no heading, just comment the next line
                    fgetcsv($csvFile);
                    
                    //parse data from csv file line by line
                    while(($line = fgetcsv($csvFile)) !== FALSE){
                        $inputdata[] = array(
                            'pro_id' => $this->input->post('ProID'),
                            'type' => $line[0],
                            'thickness' => $line[1],
                            'qty' => $line[2],
                            'area' => $line[3],
                            'cost_effiency_rate' => $line[4]
                        );
                        
                    }

                    if($this->m_project->insertbatchinto("project_summary", $inputdata)) {
                        $qstring['msg'] = "Done";        
                    }else{
                        $qstring['msg'] = "Fail"; 
                    }
                    
                    //close opened csv file
                    fclose($csvFile);
                    $qstring["status"] = 'Success';
                }else{
                    $qstring["status"] = 'Error';
                }
            }else{
                $qstring["status"] = 'Invalid file';
            }
            
            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($qstring);

        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function projectAction($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $currrentDate = date('Y-m-d H:i:s');
            
            if ($param1 == 'do_update') {
                $inputInsertData= array(
                            'pro_number' => $this->input->post('ProjectNumber'),
                            'pro_name' => $this->input->post('ProjectName'),
                            'client' => $this->input->post('Client'),
                            'contact' => $this->input->post('Contact'),
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id']
                        );
                
                $this->db->where('pro_id', $param2);
                $this->db->update('projects', $inputInsertData);
                $this->session->set_flashdata('msg', 'Data Update Successfully');
                redirect(base_url() . 'projects', 'refresh');
            }
            if ($param1 == 'delete') {
                $this->db->where('pro_id', $param2);
                $this->db->delete('projects');
                $this->session->set_flashdata('msg', 'Data Delete Successfully');
                redirect(base_url() . 'projects', 'refresh');
            }
        }else{
            $this->load->view('auth/v_admin_login');
        }
        
        
    }
    public function ProjectPanel(){
        $this->data['title'] = 'Project Panel';
        $this->data['message'] = 'Project Panel';
        $this->data['projects'] = $this->db->get('project_drawings')->result_array();
        $this->load->view('projects/v_project_panel', $this->data);
    }

    public function saveProjectDrawing(){
        $this->setOutputMode(NORMAL);
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            
            // $data['user_name'] = $sessionData['user_name'];
            // $data['user_id'] = $sessionData['user_id'];
            // $data['user_email'] = $sessionData['user_email'];

            $currrentDate = date('Y-m-d H:i:s');
            $inputInsertData= array(
                            'pro_id' => $this->input->post('ProjectName'),
                            'pro_number' => $this->m_project->get_type_name_by_id('projects',$this->input->post('ProjectName')),
                            'level' => $this->input->post('Level'),
                            'panel_type ' => $this->input->post('Type'),
                            'panel_number' => $this->input->post('Number'),
                            'panel_length' => $this->input->post('Length'),
                            'panel_width' => $this->input->post('Width'),
                            'panel_net_area' => $this->input->post('NetArea'),
                            'panel_gross_area' => $this->input->post('GrossArea'),
                            'panel_volume' => $this->input->post('Volume'),
                            'panel_weight' => $this->input->post('Weight'),
                            'panel_thickness' => $this->input->post('Thikness'),
                            'panel_revision' => $this->input->post('Revision'),
                            'status' => '1',
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id']
                        );
            $insertID = $this->m_project->insertData('project_drawings',$inputInsertData);
            
            $jsonData = array(
                'data' => $insertID
            );
            

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($jsonData);
            
        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    function DrawingAction($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_logged_in')) {
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $currrentDate = date('Y-m-d H:i:s');
            
            if ($param1 == 'do_update') {
                
                $inputInsertData= array(
                            'pro_id' => $this->input->post('ProjectName'),
                            'pro_number' => $this->m_project->get_type_name_by_id('projects',$this->input->post('ProjectName')),
                            'level' => $this->input->post('Level'),
                            'panel_type ' => $this->input->post('Type'),
                            'panel_number' => $this->input->post('Number'),
                            'panel_length' => $this->input->post('Length'),
                            'panel_width' => $this->input->post('Width'),
                            'panel_net_area' => $this->input->post('NetArea'),
                            'panel_gross_area' => $this->input->post('GrossArea'),
                            'panel_volume' => $this->input->post('Volume'),
                            'panel_weight' => $this->input->post('Weight'),
                            'panel_thickness' => $this->input->post('Thikness'),
                            'panel_revision' => $this->input->post('Revision'),
                            'status' => '1',
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id']
                        );
                
                $this->db->where('drw_id', $param2);
                $this->db->update('project_drawings', $inputInsertData);
                $this->session->set_flashdata('msg', 'Data Update Successfully');
                redirect(base_url() . 'projects/ProjectPanel', 'refresh');
            }
            if ($param1 == 'delete') {
                $this->db->where('drw_id', $param2);
                $this->db->delete('project_drawings');
                $this->session->set_flashdata('msg', 'Data Delete Successfully');
                redirect(base_url() . 'projects/ProjectPanel', 'refresh');
            }
        }else{
            $this->load->view('auth/v_admin_login');
        }
        
        
    }

    public function importPanel(){

        $this->setOutputMode(NORMAL);
        $sessionData = $this->session->userdata('admin_logged_in');
        $currrentDate = date('Y-m-d H:i:s');
        $qstring = array();
        $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
        
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                
                //open uploaded csv file with read only mode
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                
                // skip first line
                // if your csv file have no heading, just comment the next line
                fgetcsv($csvFile);
                
                //parse data from csv file line by line
                while(($line = fgetcsv($csvFile)) !== FALSE){
                    //check whether member already exists in database with same email
                   $result = $this->db->get_where("project_drawings", array("panel_number"=>$line[1]))->result();
                    if(count($result) > 0){
                        //update member data
                        //insert member data into database
                        $inputpanel= array(
                            'pro_id' => $this->input->post('pro_id'),
                            'pro_number' => $this->m_project->get_type_name_by_id('projects',$this->input->post('pro_id')),
                            'level' => $this->input->post('Level'),
                            'panel_type ' => $line[0],
                            'panel_number' => $line[1],
                            'panel_length' => $line[2],
                            'panel_width' => $line[3],
                            'panel_net_area' => $line[4],
                            'panel_gross_area' => $line[5],
                            'panel_volume' => $line[6],
                            'panel_weight' => $line[7],
                            'panel_thickness' => $line[8],
                            'panel_revision' => 'A',
                            'status' => '0',
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id']
                        );
            
                        $this->db->update("project_drawings", $inputpanel, array("panel_number"=>$line[1]));

                        
                        
                    }else{
                        //insert member data into database
                        $inputpanel= array(
                            'pro_id' => $this->input->post('pro_id'),
                            'pro_number' => $this->m_project->get_type_name_by_id('projects',$this->input->post('pro_id')),
                            'level' => $this->input->post('Level'),
                            'panel_type ' => $line[0],
                            'panel_number' => $line[1],
                            'panel_length' => $line[2],
                            'panel_width' => $line[3],
                            'panel_net_area' => $line[4],
                            'panel_gross_area' => $line[5],
                            'panel_volume' => $line[6],
                            'panel_weight' => $line[7],
                            'panel_thickness' => $line[8],
                            'panel_revision' => 'A',
                            'status' => '0',
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id']
                        );
            
                        $this->m_project->insertData('project_drawings',$inputpanel);
                    }

                 array_push($qstring,$line[0]);  
                }
                
                //close opened csv file
                fclose($csvFile);
                $qstring["status"] = 'Success';
            }else{
                $qstring["status"] = 'Error';
            }
        }else{
            $qstring["status"] = 'Invalid file';
        }

        header("Content-Type: application/json; charset=utf-8", true);
        echo json_encode($qstring);
    }

    public function drawingApprove(){
        $this->setOutputMode(NORMAL);
        
        $jsonData = array();
        $drwlist = $this->input->post('listArr');
        $countList = count($drwlist);
        $iniCount = 0;
        foreach ($drwlist as $value) {
            $this->db->update("project_drawings", array("status"=>'1'), array("drw_id"=>$value));
            $iniCount++;
        }

        if($iniCount === $countList){
            $jsonData['msg'] = "Done";
        }else{
            $jsonData['msg'] = "Fail";
        }
        
        
        header("Content-Type: application/json");
        echo json_encode($jsonData);
    }

    public function PlanProduction(){
        $table = array();

        $this->data['title'] = 'Project Planning';
        $this->data['message'] = 'Project Planning';
        
        $this->data['production'] = $this->db->get('project_plannings')->result_array();
        $this->data['productionDate'] = $this->m_project->getThreeDaysDrawing();
        
        $this->load->view('projects/v_project_production', $this->data);
    }

    public function PlanDelivery(){
        $table = array();

        $this->data['title'] = 'Project Planning';
        $this->data['message'] = 'Project Planning';
        
        $this->data['productionDate'] = $this->m_project->getThreeDaysPlanning();
        
        $this->load->view('projects/v_project_delivery', $this->data);
    }

    public function getDrawing(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $this->setOutputMode(NORMAL);
            $jsonData = array();
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $currrentDate = date('Y-m-d H:i:s');

            $proID = $this->input->post('projectid');
            $jsonData['drawings'] = $this->db->get_where('project_drawings', array('status' => '1','pro_id'=>$proID))->result_array();

            header("Content-Type: application/json");
            echo json_encode($jsonData);
        }
    }

    public function getDrawingforDeliver(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $this->setOutputMode(NORMAL);
            $jsonData = array();
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $currrentDate = date('Y-m-d H:i:s');

            $value = $this->input->post('value');
            
            $jsonData['drawings'] = $this->db->get_where('project_drawings', array('status' => '1','level'=>$value))->result_array();

            header("Content-Type: application/json");
            echo json_encode($jsonData);
        }
    }

    public function getLevel(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $this->setOutputMode(NORMAL);
            $jsonData = array();
            
            $sessionData = $this->session->userdata('admin_logged_in');
            $currrentDate = date('Y-m-d H:i:s');

            $proID = $this->input->post('projectid');
            $jsonData['levels'] = $this->db
                           ->group_by('level')
                           ->get_where('project_drawings', array('status' => '1','pro_id'=>$proID))
                           ->result_array();
            

            header("Content-Type: application/json");
            echo json_encode($jsonData);
        }
    }

    public function saveProduction(){
       if ($this->session->userdata('admin_logged_in')) {
            
            $this->setOutputMode(NORMAL);
            $jsonData = array();
            
            $sessionData = $this->session->userdata('admin_logged_in');
            
            $currrentDate = date('Y-m-d H:i:s');

            $projectID = $this->input->post('projectID');
            $drawingID = $this->input->post('drawingID');
            $tbl_number = $this->input->post('tbl_number');
            $completion_percent = $this->input->post('completion_percent');
            $expected_produce_date = $this->input->post('expected_produce_date');
            $actual_produce_date = $this->input->post('actual_produce_date');
            $expected_delivery_date = $this->input->post('expected_delivery_date');
            $actual_delivery_date = $this->input->post('actual_delivery_date');

            $inputpanel= array(
                            'pro_id' => $projectID,
                            'pro_number' => $this->m_project->get_type_name_by_id('projects',$this->input->post('projectID')),
                            'panel_number' => $drawingID,
                            'table_number' => $tbl_number,
                            'expected_produce_date' => $expected_produce_date,
                            'actual_produce_date' => $actual_produce_date,
                            'expected_delivery_date' => $expected_delivery_date,
                            'actual_delivery_date' => $actual_delivery_date,
                            'completion_percent' => $completion_percent,
                            'status' => '0',
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id']
                        );
            
            $where = '(panel_number="'.$drawingID.'" OR ( table_number = "'.$tbl_number.'" AND actual_produce_date = "'.$actual_produce_date.'" ))';
            
            $result = $this->db ->where($where)
                                ->get("project_plannings")->result();

            if(count($result) > 0){
                $jsonData['msg'] = -1;
            }else{
                if($insertId = $this->m_project->insertData('project_plannings',$inputpanel) > 0){
                    $jsonData['msg'] = $insertId;
                }
            }

            header("Content-Type: application/json");
            echo json_encode($jsonData);
        } 
    }

    public function saveDelivery(){
        if ($this->session->userdata('admin_logged_in')) {
            
            $this->setOutputMode(NORMAL);
            $jsonData = array();
            
            $sessionData = $this->session->userdata('admin_logged_in');
            
            $currrentDate = date('Y-m-d H:i:s');

            $inputInsertData= array(
                            'actual_delivery_date' => $this->input->post('Delivery_date'),
                            'load_number' => $this->input->post('Loadnumber'),
                            'trailer_type' => $this->input->post('Trailer'),
                            'frame_type' => $this->input->post('Frame'),
                            'initial_sequence' => $this->input->post('Installtion'),
                            'status' => '1',
                            'cre_or_up_date' => $currrentDate,
                            'cre_or_up_by' => $sessionData['user_id']
                        );
                
            $jsonData['msg'] = $this->db
                                    ->where('panel_number', $this->input->post('drawingID'))
                                    ->update('project_plannings', $inputInsertData);
            

            header("Content-Type: application/json");
            echo json_encode($jsonData);
        } 
    }

    //param1 for table name, param2 for target and param 3 for target value
    public function getDetail($param1 = FALSE,$param2 = FALSE,$param3 = FALSE){
        if ($this->session->userdata('admin_logged_in')) {
            
            $this->setOutputMode(NORMAL);
            $jsonData = array();

            $result = $this->db->get_where($param1, array($param2=>$param3))->result();

            if(count($result) > 0){
                $jsonData['result'] = $result;
            }else{
                $jsonData['result'] = 'None';
            }

            header("Content-Type: application/json");
            echo json_encode($jsonData);

        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    //param1: tbl name;param2 : target coloum;param3: coloum value; param4: status
    public function Approve($param1 = FALSE, $param2 = FALSE, $param3 = FALSE, $param4 = FALSE){
        
        $this->setOutputMode(NORMAL);
        
        $jsonData = array();
        
        if($this->db->update($param1, array("status"=>$param4), array($param2=>$param3))){
            $jsonData['msg'] = "Done";
        }else{
            $jsonData['msg'] = "Fail";
        }
        
        header("Content-Type: application/json");
        echo json_encode($jsonData);
    }
}
