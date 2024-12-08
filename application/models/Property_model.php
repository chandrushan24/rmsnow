<?php

defined('BASEPATH') OR exit('No direct script access allowed');


 class Property_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();      
 	}

	public function get_all_district() {
        $this->db->where('deleted',0);
        $query = $this->db->get('district_master');
        return $query->result_array();
      }
     
}