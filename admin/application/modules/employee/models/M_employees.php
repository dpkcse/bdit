<?php

/**
 * Created by Dipok.
 * Date: 27-Dec-16
 * Time: 2.45 PM
 */
class M_employees extends CI_Model
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
} 