<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_salary_adv_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        
        $data['title'] = 'Salary Advance';
        if($id){
            $data['get_prop'] = $this->common_model->get_single_date('tbl_salary_advance','adv_id',$id);
        }
        $data['employee_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_staff_info');
            
		$this->render_page('admin/billing/employee_salary_adv',$data); 
	}

    public function save_employee_salary_details()
    {
        $data                         = array();
        $adv_id   = $this->input->post('adv_id');
        $data['company_id'] = $this->session->userdata('comp_id');
        $data['employee_name'] =$this->input->post('employee_name_input');
        $data['employee_id'] =$this->input->post('employee_id_input');
        $data['advance_amount'] =$this->input->post('advance_amount_input');
        $data['user_id'] =$this->session->userdata('userid');

        if($adv_id == ''){
            $adv_id = $this->common_model->save('tbl_salary_advance',$data);
            $status = 'Inserted';
        }else{
            $this->common_model->update_info('tbl_salary_advance',$data,'adv_id',$adv_id);
            $status = 'Updated';
        }
        $page_name = "Salary Advance";
        if ($adv_id) {

            $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');

            } else {
                $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
            }
            
            echo json_encode($response);
            return;

    }


}