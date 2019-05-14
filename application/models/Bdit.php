<?php

/**
 * Created by Dipok.
 * Date: 27-Dec-16
 * Time: 2.45 PM
 */
class Bdit extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function insertData($table = FALSE, $data = FALSE){
        
        $this->db->insert($table, $data);
        if($this->db->affected_rows() > 0){
           $insertID = $this->db->insert_id();
            return $insertID; 
        }else
            return false;
    }

    function getAll($table, $array = NULL, $ordercol = NULL) {
        if($ordercol != NULL){
            $this->db->order_by($ordercol, "asc");
        }
        
        $query = $this->db->get_where($table, $array);

        return $query->result();
    }

    

    function get_type_name_by_id($type,$type_id='',$field='pro_number')
    {
        return  $this->db->get_where($type,array('pro_id'=>$type_id))->row()->$field;    
    }


    function get_drawing_name_by_id($type,$type_id='',$field='panel_type')
    {
        return  $this->db->get_where($type,array('drw_id'=>$type_id))->row()->$field;    
    }

    function get_drawing_by_id($type,$type_id='',$field)
    {
        return  $this->db->get_where($type,array('drw_id'=>$type_id))->row()->$field;    
    }

    function get_area_by_id($type,$type_id='',$field='panel_gross_area')
    {
        return  $this->db->get_where($type,array('drw_id'=>$type_id))->row()->$field;    
    }

    // function get_cer_by_id($type,$type_id='',$field='panel_gross_area')
    // {
    //     return  $this->db->get_where($type,array('drw_id'=>$type_id))->row()->$field;    
    // }

    function getThreeDaysDrawing(){
        $query = $this ->db->query("SELECT * FROM project_plannings WHERE (status ='0' OR status ='1') AND actual_produce_date BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 3 DAY)");

        if ($query->num_rows())
              return $query->result();
          else
              return false;
    }

    function getThreeDaysPlanning(){
        $query = $this ->db->query("SELECT * FROM project_plannings WHERE load_number != '' AND (status ='2' OR status = '1') AND actual_delivery_date BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 10 DAY)");

        if ($query->num_rows())
              return $query->result();
          else
              return false;
    }

    function get_total_Load_by_load($loadNumber){
        $query = $this ->db->query("SELECT COUNT(panel_number) as total FROM project_plannings WHERE load_number ='".$loadNumber."'");

          if ($query->num_rows())
              return $query->result();
          else
              return false;
    }

    function selectWhere($table, $q){
		$query =  $this->db->get_where($table, $q);
		if($query -> num_rows())
			return $query->result();
		else
			return false;
	}

	

	function selectallrow($table){
		$query =  $this->db->get($table);
		if($query -> num_rows())
			return $query->result();
		else
			return false;
	}

	function selectDistinct($table){
		$query =  $this->db->query("SELECT DISTINCT category FROM `job`");
		if($query -> num_rows())
			return $query->result();
		else
			return false;
	}

	function selectWhereLike($q){
		$query =  $this->db->query("SELECT * FROM `job` WHERE category LIKE '%".$q."'");
		if($query -> num_rows())
			return $query->result();
		else
			return false;
	}

	function selectallLimit($table){
		$query =  $this->db->get($table);
		$this->db->limit(10);
		$this->db->order_by("DESC");
		if($query -> num_rows())
			return $query->result();
		else
			return false;
	}

	function insertinto($table, $data){
		$this->db->insert($table, $data);
		if($this->db->affected_rows() > 0){
			$insertid = $this->db->insert_id();
			return $insertid;
		}
		else{
			return false;
		}
	}
	function insertbatchinto($table, $data){
		$this->db->insert_batch($table, $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		else{
			return false;
		}
    }

	function updatefor($table, $data, $q){
		$this->db->trans_start();
		$this->db->where($q);
		$this->db->update($table, $data); 
		$this->db->trans_complete();
		// was there any update or error?
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			// any trans error?
			if ($this->db->trans_status() === FALSE) {
				return false;
			}
			return true;
		}
	}
	function deletefrom($table, $q){
		$this->db->delete($table, $q);
		if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
} 