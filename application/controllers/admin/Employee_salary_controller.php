<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_salary_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        
        $data['title'] = 'Employee Salary';
        if($id){
            $data['get_prop'] = $this->common_model->get_single_date('tbl_employee_salary','emp_salary_id',$id);
        }
        $data['employee_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_staff_info');
            
		$this->render_page('admin/billing/employee_salary',$data); 
	}

    public function save_employee_salary_details()
    {
        // echo '<pre>';print_r($_POST);die();
        $data                         = array();
        $emp_salary_id   = $this->input->post('emp_salary_id');
        $data['company_id'] = $this->session->userdata('comp_id');
        $data['employee_name'] =$this->input->post('employee_name_input');
        $data['employee_id'] =$this->input->post('employee_id_input');
        $data['net_salary_amount'] =$this->input->post('net_salary_amount_input');
        $data['advance_amount'] =$this->input->post('advance_amount_input');
        $data['balance_amount'] =$this->input->post('balance_amount_input');
        $data['offer_won'] =$this->input->post('offer_input');
        $data['user_id'] =$this->session->userdata('userid');
        $received_cal = $this->input->post('already_received_cal_id');
        
        if($received_cal != ''){
            $set_received_flag = array(
                "received_flag" => '1'
            );

            if(strpos($received_cal,',') !== false){
                $exploding  = explode(',',$received_cal);
                $this->db->where_in('emp_sal_cal_id',$exploding)->update('employee_salary_calculation',$set_received_flag);
            }else{
                $this->db->where('emp_sal_cal_id',$received_cal)->update('employee_salary_calculation',$set_received_flag);
            }
        }

        if($emp_salary_id == ''){
            $emp_salary_id = $this->common_model->save('tbl_employee_salary',$data);
            $status = 'Inserted';
        }else{
            $this->common_model->update_info('tbl_employee_salary',$data,'emp_salary_id',$emp_salary_id);
            $status = 'Updated';
        }

        $page_name = "Employee Salary";

        if ($emp_salary_id) {
            $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');

            } else {
                $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
            }
            
            echo json_encode($response);
            return;

    }
   public function get_sal_adv_data(){
        $emp_id = $this->input->get('emp_id');
        $start_date = date('Y-m-10');
        $end_date = date('Y-m-10', strtotime('first day of next month'));
        $this->db->select_sum('advance_amount');
        $this->db->from('tbl_salary_advance');
        $this->db->where('employee_name', $emp_id);
        $this->db->where('salary_id IS NULL', null, false);
        $this->db->where('deleted', '0');
        $this->db->where('adv_date >=', $start_date);
        $this->db->where('adv_date <=', $end_date);
        $query = $this->db->get();
       
        $data = $query->row()->advance_amount;
        echo json_encode($data);
        return;
    }

    public function get_sal_net_amount_data(){
        $emp_id = $this->input->get('emp_id');
        $current_day = date('d');
       
        // if ($current_day > 10) {
        //     $start_date = date('Y-m-10');
        //     $end_date = date('Y-m-10', strtotime('first day of next month'));
        // } else {
        //     $start_date = date('Y-m-10', strtotime('first day of last month'));
        //     $end_date = date('Y-m-10');
        // }

        $start_date = $this->input->get('salary_start_date');
        $end_date = $this->input->get('salary_end_date');
        
        $this->db->select('A.*');
        $this->db->from('tbl_employee_salary as A'); 
        $this->db->where('A.deleted', 0);
        $this->db->where('A.employee_name',$emp_id);
        $this->db->where('DATE(salary_duration_start) >=', $start_date);
        $this->db->where('DATE(salary_duration_end) <=', $end_date);
        $query_ = $this->db->get();
        $check_this_month_sal = $query_->result_array();
         
       if(!empty($check_this_month_sal)){
         $data =array(
            'status' => 0,
             'msg'   => 'Employee This Month Salary Already Received',
         );
         echo json_encode($data);
         return;
       }

        $this->db->select('SUM(amount) as amount, GROUP_CONCAT(emp_sal_cal_id) as emp_sal_cal_id');
        $this->db->from('employee_salary_calculation');
        $this->db->where('employee_id', $emp_id);
        $this->db->where('deleted', '0');
        $this->db->where('received_flag', '0');
        $this->db->where('created_at >=', $start_date);
        $this->db->where('created_at <=', $end_date);
        $query = $this->db->get();
     
        $data = $query->row()->amount;
        $data_selected_rows = $query->row()->emp_sal_cal_id;

        // $this->db->select('A.*');
        // $this->db->from('tbl_reg_plot as A'); 
        // $this->db->where('A.deleted', 0);
        // $this->db->where('A.customer_id',$emp_id);
        // $this->db->group_by('A.property_name');
        // $query = $this->db->get();
        // $data_reg = $query->result_array();

        $expense_calculated_value = 0;
    //     if(!empty($data_reg)){
    //     foreach($data_reg as $val){
    //         $this->db->select('SUM(expense_value) as expense_total');
    //         $this->db->from('tbl_expense_details');
    //         $this->db->where('property_name',$val['property_name']);
    //         $total = $this->db->get()->row_array();

    //     $expense_value = 0;
    //     $get_plot =$this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id',$val['property_name'],'deleted',0);
    //     $get_plot_count = (!empty($get_plot) ? count($get_plot) : 0);
    //     $get_staff =$this->common_model->getall_record_info_with_deletedCheck_array('tbl_staff_info');
    //     $get_staff_count = (!empty($get_staff) ? count($get_staff) : 0);
    //     if ($expense_value != 0) {
    //         $calculate = ($expense_value / $get_plot_count) + $get_staff_count;
    //         $expense_calculated_value += round($calculate);
    //     } else {
    //         $expense_calculated_value +=0;
    //     }
    //     }
    // }     

       $data_calculate = (($data !=NULL && $data !=0) ? $data : 0);
       $data_append = $data_calculate != 0 ? $data_calculate - $expense_calculated_value : $data;
       
       $data =array(
        'status' => 1,
         'amount'   => $data_append,
         'selected_rows'   => $data_selected_rows,
        );

        echo json_encode($data);
        return;
    }

    public function get_offer_reg(){
        $emp_id = $this->input->get('emp_id');
        // $start_date = date('Y-m-10');
        // $end_date = date('Y-m-10', strtotime('first day of next month'));

        $start_date = $this->input->get('salary_start_date');
        $end_date = $this->input->get('salary_end_date');

        $this->db->select('COUNT(B.reg_plot_detail_id) as total_count,A.property_name');
        $this->db->from('tbl_reg_plot as A');
        $this->db->join('tbl_reg_plot_details as B','B.reg_plot_header_id = A.reg_plot_id','left');
        $this->db->where('A.name_ref_by', $emp_id);
        $this->db->where('A.deleted', '0');
        $this->db->where('B.deleted', '0');
        $this->db->where('A.created_date >=', $start_date);
        $this->db->where('A.created_date <=', $end_date);
        $this->db->group_by('A.property_name');
        $query = $this->db->get();
        $data = $query->result_array();

      //  echo $this->db->last_query();

        $offer_string ='';
        if(!empty($data)){
        foreach($data as $datas){
			$offers = $this->common_model->getall_record_info_with_detail_with_two_id_array('tbl_add_offer','property_name',$datas['property_name'],'deleted',0);
           if(!empty($offers)){
            if($offers[0]['total_target'] <= $datas['total_count']){
              $offer_string = $offers[0]['offer'];
        }
    }
    }
    }
    $data_str = array(
       'offer'  => $offer_string
    );
        echo json_encode($data_str);
        return;
    }

}