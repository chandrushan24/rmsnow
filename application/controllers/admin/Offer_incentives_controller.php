<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer_incentives_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        
        $data['title'] = 'Offer Incentives';
        if($id){
            $data['get_prop'] = $this->common_model->get_single_date('tbl_offer_incentives','offer_incentives_id',$id);
        }
        
        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');

		$this->render_page('admin/offer_desk/offer_incentives',$data); 
	}

    public function save_offer_incentives()
    {
        $data                         = array();
        $offer_incentives_id  = $this->input->post('offer_incentives_id');
        $data['property_name'] =$this->input->post('property_name_input');
        $data['total_values'] =$this->input->post('total_values_input');
        $data['expense_values'] =$this->input->post('expense_values_input');
        $data['plot_values'] =$this->input->post('plot_values_input');
        $data['incentive'] =$this->input->post('incentive_input');
        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');
        
        if($offer_incentives_id == ''){
            $offer_incentives_id = $this->common_model->save('tbl_offer_incentives',$data);
            $status = 'Inserted';
        }else{
            $this->common_model->update_info('tbl_offer_incentives',$data,'offer_incentives_id',$offer_incentives_id);
            $status = 'Updated';
        }

        $page_name = "Offer Incentives";
        
        if ($offer_incentives_id) {
         
         $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');
    
        } else {
            $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
        }
        
        echo json_encode($response);
        return;

    }

    public function get_expense_value_based_on_nagar_garden(){
     $property_id = $this->input->post('property_id');
    $this->db->select('SUM(expense_value) as expense_total');
    $this->db->from('tbl_expense_details');
    $this->db->where('property_name',$property_id);
    $total = $this->db->get()->row_array();
    $expense_value = (!empty($total) && is_numeric($total['expense_total']) ? $total['expense_total'] : 0);
    $get_plot =$this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id',$property_id,'deleted',0);
    $get_plot_count = (!empty($get_plot) ? count($get_plot) : 0);
    $get_staff =$this->common_model->getall_record_info_with_deletedCheck_array('tbl_staff_info');
    $get_staff_count = (!empty($get_staff) ? count($get_staff) : 0);
    $response = array('expense_total' => $expense_value,'count_plot' => $get_plot_count,'count_staff' =>$get_staff_count);
    echo json_encode($response);
    return;
    }

}