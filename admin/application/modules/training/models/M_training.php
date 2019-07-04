<?php

/**
 * Created by Dipok.
 * Date: 27-Dec-16
 * Time: 2.45 PM
 */
class M_training extends CI_Model
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

    function get_type_name_by_id($type,$type_id='',$field='')
    {
        return  $this->db->get_where($type,array('id'=>$type_id))->row()->$field;    
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