<?php

/**
 * Created by Dipok.
 * Date: 27-Dec-16
 * Time: 2.45 PM
 */
class M_project extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function selectWhere($table, $q){
		$query =  $this->db->get_where($table, $q);
		if($query -> num_rows())
			return $query->result();
		else
			return false;
	}

	function selectDistinct($table){
		$query =  $this->db->get($table);
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

	

	function count($table,$select){
		$this->db->select($select);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->num_rows();
	}
} 