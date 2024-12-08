<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Settings_model','set');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
    }
    public function index()
	{
		$this->render_page('admin/list_page'); 
	}
    public function user_profile()
	{
		$this->render_page('admin/user'); 
	}
    public function settings()
	{
		$this->render_page('admin/setting'); 
	}
	public function company_details(){
		$data = $this->set->get_all_companies();
        echo json_encode($data);
	}
	public function set_company() {
		// Set validation rules
		$this->form_validation->set_rules('comp_name', 'Company Name', 'required');
		$this->form_validation->set_rules('contact1', 'Primary Contact', 'required|regex_match[/^[0-9]{10}$/]');
		
		if (empty($_FILES['file']['name'])) {
			$this->form_validation->set_rules('file', 'Logo', 'required');
		}
	
		if ($this->form_validation->run() == FALSE) {
			// Validation failed
			$response = array('status' => 'error', 'message' => validation_errors());
			echo json_encode($response);
			return;
		}
	
		$comp_id = $this->input->post('comp_id');
	
		// Prepare data array
		$data = array(
			'name' => $this->input->post('comp_name'),
			'add1' => $this->input->post('add1'),
			'add2' => $this->input->post('add2'),
			'add3' => $this->input->post('add3'),
			'add4' => $this->input->post('add4'),
			'contact1' => $this->input->post('contact1'),
			'contact2' => $this->input->post('contact2'),
			'email' => $this->input->post('email'),
			'website' => $this->input->post('website'),
			'pan' => $this->input->post('pan'),
			'gstin' => $this->input->post('gstin')
		);
	
		// Handle file upload and unlink old image if a new one is uploaded
		if (!empty($_FILES['file']['name'])) {
			// Get old image path from the database
			if (!empty($comp_id)) {
				$this->db->select('logopath');
				$this->db->from('company');
				$this->db->where('comid', $comp_id);
				$query = $this->db->get();
				$old_image = $query->row()->logopath;
	
				// Unlink (delete) old image
				if ($old_image && file_exists('./' . $old_image)) {
					unlink('./' . $old_image);
				}
			}
	
			$config['upload_path'] = './assets/img/company';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = time() . '_' . $_FILES['file']['name']; // Ensure unique file name
	
			$this->upload->initialize($config);
	
			if ($this->upload->do_upload('file')) {
				// File upload success
				$file_data = $this->upload->data();
				$data['logopath'] = 'assets/img/company/' . $file_data['file_name'];
			} else {
				// File upload failed
				$response = array('status' => 'error', 'message' => $this->upload->display_errors());
				echo json_encode($response);
				return;
			}
		}
	
		// Insert or update data in the database
		if (!empty($comp_id)) {
			$this->db->where('comid', $comp_id); 
			$this->db->update('company', $data); 
		} else {
			$this->db->insert('company', $data); 
		}
	   
		$response = array('status' => 'success', 'message' => 'Company data saved successfully');
		echo json_encode($response);
	}
	


	public function expense_details(){
		$data = $this->set->get_all_expense();
        echo json_encode(['data' => $data]);
	}

	public function set_expense(){
		$expen_id = $this->input->post('expen_id');

		$data = array(
			'expen_name' => $this->input->post('expen_name'),
			'expen_description' => $this->input->post('expen_description'),
			'comp_id' => $this->session->userdata('comp_id'),
			'dead_id' => '0',		   
		);  
		if(!empty($expen_id)){
			$this->db->where('expen_id',$expen_id); 
			$this->db->update('tbl_expenses',$data); 
		}else{
			$this->db->insert('tbl_expenses',$data); 
		}
	   
        $response = array('status' => 'success', 'message' => 'Expenses data saved successfully');
        echo json_encode($response);
	}

	public function role_details(){
		$data = $this->set->get_all_roles();
        echo json_encode(['data' => $data]);
	}

	public function set_roles(){
		$role_id = $this->input->post('role_id');

		$data = array(
			'role_id' => $this->input->post('role_id'),
			'role_name' => $this->input->post('role_name'),
			'role_order' => $this->input->post('role_order'),
			'com_in_percent' => $this->input->post('com_in_percent'),
			'comp_id' => $this->session->userdata('comp_id'),
			'deleted' => '0',		   
		);  	
		if(!empty($role_id)){
			$this->db->where('role_id',$role_id); 
			$this->db->update('tbl_role',$data); 
			$response = array('status' => 'success', 'message' => 'Role data updated successfully');
		}else{
			$this->db->insert('tbl_role',$data); 
			$response = array('status' => 'success', 'message' => 'Role data saved successfully');
		}
	   
        echo json_encode($response);
	}
	public function delete_role() {
		$role_id = $this->input->post('role_id');
		$this->db->where('role_id', $role_id);
		$this->db->delete('tbl_role');
		$response = array('status' => 'success', 'message' => 'Role deleted successfully');
		echo json_encode($response);
	}

	public function seq_details(){
		$data = $this->set->get_all_seq();
        echo json_encode(['data' => $data]);
	}

	public function set_seq(){
		$autoid = $this->input->post('autoid');
		$data = array(
			'process' => $this->input->post('process'),
			'prefix' => $this->input->post('prefix'),
			'seqno' => $this->input->post('seqno'),
			'suffix' => $this->input->post('suffix'),
			'no_of_digit' => $this->input->post('digit'),
			'comp_id' => $this->session->userdata('comp_id'),	   
		);  
		if(!empty($autoid)){
			$this->db->where('autoid',$autoid); 
			$this->db->update('autonumber',$data); 
		}else{
			$this->db->insert('autonumber',$data); 
		}
	   
        $response = array('status' => 'success', 'message' => 'Autonumber saved successfully');
        echo json_encode($response);
	}
	

}