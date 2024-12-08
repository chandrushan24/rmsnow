<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_details_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        
        $data['title'] = 'Customer Details';
        if($id){
            $data['get_prop'] = $this->common_model->get_single_date('tbl_customer_info','customer_info_id',$id);
        }
        $data['district_list'] = $this->common_model->getall_record_info_array('district_master');
        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');

		$this->render_page('admin/property/customer_details',$data); 
	}

    public function save_customer_details()
    {
        $data                         = array();
        $customer_info_id  = $this->input->post('customer_info_id');
        $data['property_name'] =$this->input->post('property_name_input');
        $data['buyer_name'] =$this->input->post('buyer_name_input');
        $data['district'] =$this->input->post('district_input');
        $data['pincode'] =$this->input->post('district_pincode');
        $data['taluk_name'] =$this->input->post('taluk_name_input');
        $data['village_town'] =$this->input->post('village_town_input');
        $data['street_address'] =$this->input->post('street_address_input');
        $data['total_plot_buyed'] =$this->input->post('total_plot_buyed_input');
        $data['phone_number_1'] =$this->input->post('phone_number_1_input');
        $data['phone_number_2'] =$this->input->post('phone_number_2_input');
        $data['id_proof_select'] =$this->input->post('id_proof_select_input');
        $data['id_proof'] =$this->input->post('id_proof_input');
        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');
        $data['buyer_gender'] =$this->input->post('buyer_gender_input');
        $data['father_rel'] =$this->input->post('father_rel_input');
        $data['father_name'] =$this->input->post('father_name_input');

        if($customer_info_id == ''){
            $customer_info_id = $this->common_model->save('tbl_customer_info',$data);
            $status = 'Inserted';
        }else{
            $this->common_model->update_info('tbl_customer_info',$data,'customer_info_id',$customer_info_id);
            $status = 'Updated';
        }

        if ($customer_info_id) {

        $page_name = "Customer Detail";

        $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');
    
    } else {
        $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
    }
    
    echo json_encode($response);
    return;

    }


}