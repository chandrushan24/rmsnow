<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing_receipt_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        $data['title'] = 'Billing Receipt';
        
        if(empty($id)){
            $data['get_seq'] = $this->common_model->get_single_date('autonumber','process',$data['title']);
            if(!empty($data['get_seq'])){
                $current_seqno = $data['get_seq']['seqno'];
                $no_of_digit = $data['get_seq']['no_of_digit'];
                $prefix = $data['get_seq']['prefix'];
                $suffix = $data['get_seq']['suffix'];
                $new_seqno = $current_seqno + 1;
                $formatted_seqno = str_pad($new_seqno, $no_of_digit, '0', STR_PAD_LEFT);
                $data['seq_no'] = $formatted_seqno;
                $data['get_seq_no'] = $prefix . $formatted_seqno . $suffix;
            }else{
                $data['seq_no'] = '';
                $data['get_seq_no'] ='';
            }
            
        }

        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
        $data['customer_list'] = $this->common_model->get_registered_booked_customer();
        $data['reg_booked_list'] = $this->common_model->get_registered_booked_details();
        $company_id = $this->session->userdata('comp_id');
        $data['company_data'] = $this->common_model->get_single_date('company','comid',$company_id);

        if($id){
            $data['get_prop'] = $this->common_model->get_single_date('tbl_billing_receipt','billing_receipt_id',$id);
        }

		$this->render_page('admin/billing/billing_receipt',$data); 
	}

    // public function edit($id = NULL)
	// {
    //     $data                 = array();
        
    //     $data['title'] = 'Billing Receipt';
    //     if($id){
    //         $data['get_prop'] = $this->common_model->get_single_date('tbl_billing_receipt','billing_receipt_id',$id);
    //     }
    //     $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
    //     $data['customer_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_customer_info');

	// 	$this->render_page('admin/billing/edit_billing_receipt',$data); 
	// }


    public function save_billing_receipt()
    {
        // echo '<pre>';print_r($_POST);die();
        $data                         = array();
        $billing_receipt_id  = $this->input->post('billing_receipt_id');
        $data['property_name'] =$this->input->post('property_name_input');
        $data['company_name'] =$this->input->post('company_name_input');
        $data['bill_id'] =$this->input->post('bill_id_input');
        $seqno  = $this->input->post('seqno');
        $data['date_time'] =$this->input->post('date_time_input');
        $data['customer_name'] =$this->input->post('customer_name_input');
        $data['father_rel'] =$this->input->post('father_rel_input');
        $data['father_name'] =$this->input->post('father_name_input');
        $plot_no = $this->input->post('plot_no_input');
        $plot_imploade = '';
        if(is_array($plot_no)){
         $plot_imploade = implode(',',$plot_no);
        }else{
            $plot_imploade = $plot_no;
        }

        $data['sno_customer_id'] = $this->input->post('sno_customer_name_input');
        $data['plot_no'] =$plot_imploade;
        $data['plot_extension'] =$this->input->post('plot_extension_input');
        $data['adv_amount_plot'] =$this->input->post('adv_amount_plot_input');
        $data['total_register_price'] =$this->input->post('total_register_price');
        $data['mode_payment'] =$this->input->post('mode_payment_input');
        $data['mode_payment_value'] =$this->input->post('mode_payment_value_input');
        $data['total_payment_received'] =$this->input->post('total_payment_received');
		$data['bal_amount_plot'] =$this->input->post('bal_amount_plot_input');
        $data['phone_number'] =$this->input->post('phone_number_input');
        $data['address'] =$this->input->post('address_input');
        $data['comp_address'] =$this->input->post('comp_address_input');
        

        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');
        
        if($billing_receipt_id == ''){
            $billing_receipt_id = $this->common_model->save('tbl_billing_receipt',$data);
            $this->common_model->update_info('autonumber',array('seqno' => $seqno),'process','Billing Receipt'); 
            $status = 'Inserted';
        }else{
            $this->common_model->update_info('tbl_billing_receipt',$data,'billing_receipt_id',$billing_receipt_id);
            $status = 'Updated';
        }
        $page_name = "Billing Receipt";
        if ($billing_receipt_id) {
         
         
         $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');
    
        } else {
            $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
        }
        
        echo json_encode($response);
        return;
    }

    public function get_customer_details() {
        $cus_id = $this->input->get('cus_id');
        $results = $this->common_model->get_single_date('tbl_customer_info','customer_info_id',$cus_id);
        echo json_encode($results);
    }

    public function get_nagar_garden_based_on_customer() {
        $cus_id = $this->input->get('cus_id');
        $results = $this->common_model->get_nagar_garden_based_on_customer($cus_id);
        echo json_encode($results);
    }

    //  public function get_balance_registerted_amount() {
    //     $property_id = $this->input->get('property_id');
    //      $cus_id = $this->input->get('cus_id');
    //     $results = $this->common_model->get_balance_registerted_amount('tbl_billing_receipt',$property_id,0, $cus_id);

    //     echo json_encode($results);
    // }

}