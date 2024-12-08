<?php

defined('BASEPATH') OR exit('No direct script access allowed');


 class Settings_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();      
 	}
	public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('userrights_header');
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if ($password == $user->password) {
                return $user;
            }
        }
        return false;
    }
    public function company($comid) {
        $this->db->where('comid', $comid);
        $query = $this->db->get('company');
        if ($query->num_rows() == 1) {
            $company = $query->row();
                return $company;
        }
        return false;
    }
    public function get_all_companies() {
        $comp_id = $this->session->userdata('comp_id');
        $this->db->where('comid', $comp_id);
        $this->db->limit(1);
        $query = $this->db->get('company'); // Assuming you have a 'company' table
        return $query->result_array();
    }
    public function get_all_expense() {
        $comp_id = $this->session->userdata('comp_id');
        $this->db->where('comp_id', $comp_id);
        $this->db->where('dead_id', '0');
        $query = $this->db->get('tbl_expenses'); // Assuming you have a 'company' table
        return $query->result_array();
    }
    public function get_all_roles() {
        $comp_id = $this->session->userdata('comp_id');
        $this->db->where('comp_id', $comp_id);
        $this->db->where('deleted', '0');
        $query = $this->db->get('tbl_role'); // Assuming you have a 'company' table
        return $query->result_array();
    }
    public function get_all_seq() {
        $comp_id = $this->session->userdata('comp_id');
        $this->db->where('comp_id', $comp_id);
        $query = $this->db->get('autonumber'); // Assuming you have a 'company' table
        return $query->result_array();
    }
}