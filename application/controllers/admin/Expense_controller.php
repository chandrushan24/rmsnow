<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        
        $data['title'] = 'Expense Details';
        if($id){
            $data['get_prop'] = $this->common_model->get_single_date('tbl_expense_details','expense_id',$id);
        }

        $data['expense_master'] = $this->common_model->getall_record_info_array('tbl_expenses');

        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');

		$this->render_page('admin/billing/expenses',$data); 
	}

    public function save_expense_details()
    {
        $data                         = array();
        $expense_id  = $this->input->post('expense_id');
        $data['property_name'] =$this->input->post('property_name_input');
        $data['expense_type'] =$this->input->post('expense_type_input');
        $data['expense_value'] =$this->input->post('expense_value_input');
        $data['description'] =$this->input->post('description_input');
        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');
       

        if($expense_id == ''){
            $expense_id = $this->common_model->save('tbl_expense_details',$data);
            $status = 'Inserted';
        }else{
            $this->common_model->update_info('tbl_expense_details',$data,'expense_id',$expense_id);
            $status = 'Updated';
        }

        if ($expense_id) {

        $page_name = "Expense Details";

        $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');
    
    } else {
        $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
    }
    
    echo json_encode($response);
    return;

    }


}