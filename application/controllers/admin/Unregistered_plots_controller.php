<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unregistered_plots_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // $this->load->model('Property_model','property');
    }
    public function index($id = NULL)
	{
        $data                 = array();
    
        $data['title'] = 'Unregistered Plot';
            
        if($id){
            $data['get_prop'] = $this->common_model->get_single_date('tbl_unreg_plot','unreg_plot_id',$id);
        }

        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');

		$this->render_page('admin/property/unregistered_plots',$data); 
	}

    public function save_unregistered_plot()
    {
        $data                         = array();
        $unreg_plot_id  = $this->input->post('unreg_plot_id');
        $data['s_no'] =$this->input->post('s_no_input');
        $data['property_name'] =$this->input->post('property_name_input');
        $data['plot_no'] =$this->input->post('plot_no_input');
        $data['total_plot_extension'] =$this->input->post('total_plot_extension_input');
        $data['east'] =$this->input->post('east_input');
        $data['west'] =$this->input->post('west_input');
        $data['north'] =$this->input->post('north_input');
        $data['south'] =$this->input->post('south_input');
        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');
        
        if($unreg_plot_id == ''){
            $unreg_plot_id = $this->common_model->save('tbl_unreg_plot',$data);
            $status = 'Inserted';
        }else{
            $this->common_model->update_info('tbl_unreg_plot',$data,'unreg_plot_id',$unreg_plot_id);
            $status = 'Updated';
        }

      if ($unreg_plot_id) {

        $page_name = "Unregistered Plot";
        
        $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');
    
    } else {
        $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
    }
    
    echo json_encode($response);
    return;

    }


    public function get_plot_details() 
    {
    $property_id = $this->input->get('property_id');
    $status = $this->input->get('status');
    // $customer_id =$this->input->get('customer_id');
    // if(isset($customer_id) && $customer_id != '' && $customer_id !='null' && $customer_id !='undefined'){
    //     $id1 = explode(',', $status);
    //     // Trim quotes from each status value
    //     $id1 = array_map(function($value) {
    //         return trim($value, '"\'');
    //     }, $id1);

    //     $this->db->select('A.*');
    //     $this->db->from('tbl_reg_plot_details as A'); 
    //     $this->db->join('tbl_reg_plot as C','C.reg_plot_id   = A.reg_plot_detail_id AND C.property_name ="'.$property_id.'" AND  C.customer_id="'.$customer_id.'" AND C.deleted = 0','left');
    //     $this->db->join('tbl_booked_plot as B','B.property_name  = C.property_name AND B.property_name ="'.$property_id.'" AND  B.customer_id="'.$customer_id.'" AND B.deleted = 0','left');
    //     $this->db->join('tbl_booked_plot_details as C','C.booked_plot_header_id  = B.booked_plot_id AND C.deleted = 0','left');
    //     $this->db->where('A.deleted', 0);
    //     $this->db->group_by('C.property_name,B.property_name');
    //     $query = $this->db->get();
    //     $data = $query->result_array();
    //     // echo '<pre>';print_r($result);die();
    // }else{
        $data = $this->common_model->getall_record_info_with_detail_with_two_id_array('tbl_plot_details','property_id',$property_id,'status',$status);
     //   echo $this->db->last_query();
    // }
    
    echo json_encode($data);
    return;
    }

    public function get_property_details()
    {
    $property_id = $this->input->get('property_id');
    $data = $this->common_model->get_single_date('tbl_property','property_id',$property_id);
    echo json_encode($data);
    return;
    }
    public function get_single_plot_details()
    {
    $detail_id = $this->input->get('detail_id');
    $data = $this->common_model->get_single_date('tbl_plot_details','plot_detail_id',$detail_id);
    echo json_encode($data);
    return;
    }
    public function get_multiple_details()
    {
    $detail_id = $this->input->get('detail_id');
    $data = $this->common_model->get_multiple_date('tbl_plot_details','plot_detail_id',$detail_id);
    echo json_encode($data);
    return;
    }
    
    public function get_property_files()
    {
    $property_id = $this->input->get('property_id');
    $module_type = $this->input->get('module_type');
    $data = $this->common_model->get_media_img($module_type,$property_id,'','');
    echo json_encode($data);
    return;
    }
    public function get_plot_booked_plot_details()
    {
    $id = $this->input->get('id');
    $data = $this->common_model->get_booked_plot_details($id);
    echo json_encode($data);
    return;
    }

    
    public function get_employee_details()
    {
    $emp_id = $this->input->get('emp_id');
    $data = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$emp_id);
    echo json_encode($data);
    return;
    }

    public function autocomplete() {
        $term = $this->input->get('term');
        $results = $this->common_model->search_customers($term);
        echo json_encode($results);
    }

    public function add_customer() {
        $customerName = $this->input->post('customerName');
        $customerId = $this->common_model->add_or_get_customer_id($customerName);
        echo json_encode(['id' => $customerId]);
    }

    public function get_head_officer_id() {
        $order_id = $this->input->get('order');
        $results = $this->common_model->get_head_officer_id_least($order_id);
        echo json_encode($results);

    }

    public function get_head_officer_list() {
        $role_id = $this->input->get('role_id');
        $results = $this->common_model->get_head_officer_list_staff_info($role_id);
        echo json_encode($results);

    }

    public function get_offer_incentive() {
        $property_id = $this->input->get('property_id');
        $results = $this->common_model->general_where_select_result_with_two_cond('tbl_offer_incentives','property_name',$property_id,'deleted',0);
        echo json_encode($results);
    }

    public function get_plot_register_booked_plot_details() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $data = array();
        $implode = ''; 
		$tot_adv =0;
        // echo $status;
        if($status == 'Booked'){
            // echo 1;
            $data      = $this->common_model->general_where_select_result_with_two_cond('tbl_booked_plot','booked_plot_id',$id,'deleted',0);
			$tot_adv   = $this->common_model->sum_adv_amount_plot_exact('tbl_booked_plot',$data[0]['customer_id'], $data[0]['plot_no'], 0);
			$data_book = $this->common_model->general_where_select_result_with_two_cond('tbl_booked_plot_details','booked_plot_header_id',$id,'deleted',0);
            if(!empty($data_book)){
             foreach($data_book as $val){
              $implode .= $val['plot_no'].',';
             }
            }else{
             $implode ='';
            }
        }

        if($status =='Registered'){
            // echo 2;
            $data     = $this->common_model->general_where_select_result_with_two_cond('tbl_reg_plot','reg_plot_id',$id,'deleted',0);
			$tot_adv  = $this->common_model->sum_adv_amount_plot_exact('tbl_booked_plot',$data[0]['customer_id'], $data[0]['plot_no'], 0);
            $data_reg = $this->common_model->general_where_select_result_with_two_cond('tbl_reg_plot_details','reg_plot_header_id',$id,'deleted',0);
            if(!empty($data_reg)){
             foreach($data_reg as $val){
              $implode .= $val['plot_no'].',';
             }
            }else{
             $implode ='';
            }

        }
      $data['data'] = $data;
      $data['imploaded_plot'] = $implode;
	  $data['total_adv_amount_paid'] = $tot_adv;
        echo json_encode($data);

    }

}
