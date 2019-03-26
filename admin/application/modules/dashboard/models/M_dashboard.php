<?php

/**
 * Created by PhpStorm.
 * User: ite
 * Date: 15-Dec-16
 * Time: 1:41 PM
 */
class M_dashboard extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_admin_profile()
    {

        $query = $this->db->select('*')
            ->from('admin')
            ->get();
        $result = $query->result_array();
        return $result;

    }
} 