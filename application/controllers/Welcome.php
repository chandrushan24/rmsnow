<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Settings_model','set');
        $this->load->model('List_model','list');

    }
	public function index()
	{
		$this->load->view('login'); 
	}
	public function dashboard()
	{
        $data=array();
        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
        // $data['all_employees'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_staff_info');
		$this->render_page('welcome_message',$data); 
	}

    public function Get_all_Booked_list(){
        $id=$this->input->get('id');
        $date_filter=$this->input->get('date_filter');

    	$user_id = $this->session->userdata('userid');
	    $user_role = $this->session->userdata('role');
			
	    $filter_user_id ='';
	
      	if ($user_role !='superadmin' && $user_role !='accounts') {
	    	$filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_id);
	    }
      
        $booked_plots = $this->list->get_property_booked(NULL,NULL,NULL,NULL,'tbl_booked_plot','booked_plot_id','',$id,$date_filter);

        $html = '';
       // echo '<pre>';print_r($booked_plots);die();
        if(!empty($booked_plots->result_array())) { 
            $i=1;
            foreach($booked_plots->result_array() as $val) {
            $book_det = $this->common_model->get_single_date('tbl_booked_plot','booked_plot_id',$val['booked_plot_header_id']);
            $property = $this->common_model->get_single_date('tbl_property','property_id',$book_det['property_name']);
            $html .= '<tr>
            <td class="text-truncate">
              <div class="d-flex align-items-center">
                <i class="ri-vip-crown-line ri-22px text-primary me-2"></i>
                <span>'.(!empty($property) ? $property['property_name'] : '').'</span>
              </div>
            </td>
            <td><span class="badge bg-label-warning rounded-pill"></span>'.$val['plot_wise_no'].'</td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-4">
                  <img src="assets/img/avatars/'.$i.'.png" alt="Avatar" class="rounded-circle">
                </div>
                <div>
                  <h6 class="mb-0 text-truncate">'.(!empty($book_det) ? $book_det['buyer_name'] : '').'</h6>
                </div>
              </div>
            </td>
          </tr>';
        if($i == '5') {$i = 1;}else{$i++;} 
       }
     } 
     echo json_encode($html);
    }
    
    public function Get_all_Unregister_list(){
        $id=$this->input->get('id');
        $date_filter=$this->input->get('date_filter');
       if($id !='' && $id !=null){
          $unreg_plot =  $this->common_model->general_where_select_result_with_three_cond('tbl_plot_details','status', 'UnSold','deleted','0','property_id',$id);
        }else{
          $unreg_plot =$this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','status', 'UnSold','deleted','0');
        }

        $html = '';
        if(!empty($unreg_plot)) { 
        foreach($unreg_plot as $val) {
        $property = $this->common_model->get_single_date('tbl_property','property_id',$val['property_id']);
          $html .= ' <tr>
            <td class="text-truncate">
              <div class="d-flex align-items-center">
                <i class="ri-vip-crown-line ri-22px text-primary me-2"></i>
                <span>'.(!empty($property) ? $property['property_name'] : '').'</span>
              </div>
            </td>
            <td><span class="badge bg-label-warning rounded-pill"></span>'.$val['plot_no'].'</td>
          </tr>';
    } 
} 
        echo json_encode($html);
    }

    public function Get_all_Registered_list(){
        $id=$this->input->get('id');
        $date_filter=$this->input->get('date_filter');
		$user_id = $this->session->userdata('userid');
		$user_role = $this->session->userdata('role');

		$filter_user_id ='';
		if ($user_role !='superadmin' && $user_role !='accounts') {
	    	 $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_id);
		 }
        $register_plots = $this->list->get_property_for_reg(NULL,NULL,NULL,NULL,'tbl_reg_plot','reg_plot_id','',$id,$date_filter);
        $html = '';
         if(!empty($register_plots->result_array())) { 
            $i=1;
            // print_r($register_plots->result_array());die();
            foreach($register_plots->result_array() as $val) {
            $reg_det = $this->common_model->get_single_date('tbl_reg_plot','reg_plot_id',$val['reg_plot_header_id']);
            $property = $this->common_model->get_single_date('tbl_property','property_id',$reg_det['property_name']);
                       $html .= '<tr>
            <td class="text-truncate">
              <div class="d-flex align-items-center">
                <i class="ri-vip-crown-line ri-22px text-primary me-2"></i>
                <span>'.(!empty($property) ? $property['property_name'] : '').'</span>
              </div>
            </td>
            <td><span class="badge bg-label-warning rounded-pill"></span>'.$val['plot_wise_no'].'</td>
            <td>
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm me-4">
                  <img src="assets/img/avatars/'.$i.'.png" alt="Avatar" class="rounded-circle">
                </div>
                <div>
                  <h6 class="mb-0 text-truncate">'.(!empty($reg_det) ? $reg_det['buyer_name'] : '').'</h6>
                </div>
              </div>
            </td>
          </tr>';
         if($i == '5') {$i = 1;}else{$i++;} 
        }

        } 

        echo json_encode($html);

    }
    // For Dashboard

    public function Get_all_Plots_Category_Count(){
        $id=$this->input->get('id');
        $date_filter=$this->input->get('date_filter');

        if($id !='' && $id !=null || $date_filter !='' && $date_filter !=null){
          
          if($id !='' && $id !=null){
            $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $id,'deleted','0');
          }else{
            $count_total = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_plot_details');
         }
        $count_reg = $this->list->total_property_for_reg('','tbl_reg_plot','reg_plot_id',$id,$date_filter);
        $count_book = $this->list->total_property_booked_dashboard('','tbl_booked_plot','booked_plot_id',$id,$date_filter);
        $count_unreg = $this->common_model->get_Unreg_plot_count($id);
        $amount_reg = $this->list->get_property_for_reg_dashboard(NULL,NULL,NULL,NULL,'tbl_reg_plot','reg_plot_id','',$id,$date_filter);
        $amount_book = $this->list->get_property_booked_dashboard(NULL,NULL,NULL,NULL,'tbl_booked_plot','booked_plot_id','',$id,$date_filter);
        }else{
        $count_total = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_plot_details');
        $count_reg = $this->list->total_property_for_reg('','tbl_reg_plot','reg_plot_id','','');
        $count_book = $this->list->total_property_booked_dashboard('','tbl_booked_plot','booked_plot_id','','');
        $count_unreg = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','status', 'UnSold','deleted','0');
        $amount_reg = $this->list->get_property_for_reg_dashboard(NULL,NULL,NULL,NULL,'tbl_reg_plot','reg_plot_id','','','');
        $amount_book = $this->list->get_property_booked_dashboard(NULL,NULL,NULL,NULL,'tbl_booked_plot','booked_plot_id','','','');
        }

        $total_reg_amount = 0;
        $total_book_amount = 0;
        
        if(!empty($amount_reg->result_array())){
            foreach($amount_reg->result_array() as $val){
                $total_reg_amount = (is_numeric($total_reg_amount) ? $total_reg_amount : 0)  +  (is_numeric($val['mode_payment_value']) ? $val['mode_payment_value'] : 0);
            }
        }
        if(!empty($amount_book->result_array())){
            foreach($amount_book->result_array() as $val){
                $total_book_amount = (is_numeric($total_book_amount) ? $total_book_amount : 0)  +  (is_numeric($val['adv_amount_plot']) ? $val['adv_amount_plot'] : 0);
            }
        }
        
        $data = array(
            (!empty($count_total) ? count($count_total) : 0),
            (!empty($count_unreg) ? count($count_unreg) : 0),
            (!empty($count_reg) ? $count_reg : 0),
            (!empty($count_book) ? $count_book : 0),

        );
        $data2=array(
         $total_reg_amount,
         $total_book_amount,
        );

        echo json_encode(['data' => $data,'amount' => $data2]);
    }

    public function Get_all_Nager_garden_Count(){

        $id=$this->input->get('id');
        $date_filter=$this->input->get('date_filter');
        if($id !='' && $id !=null || $date_filter !='' && $date_filter !=null){
        $data1= $this->common_model->general_where_select_result_with_two_cond('tbl_property','property_id', $id,'deleted','0','created_at',$date_filter);
        }else{
        $data1= $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
        }
        $data = array();
        foreach ($data1 as $val) {
        $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val['property_id'],'deleted','0');
        $count_reg = $this->common_model->get_regiter_plot_count($val['property_id']);
        $count_book = $this->common_model->get_Booked_plot_count($val['property_id']);
        $count_unreg = $this->common_model->get_Unreg_plot_count($val['property_id']);

        $data[] = array(
            $val['property_name'],
            (!empty($count_total) ? count($count_total) : 0),
            (!empty($count_unreg) ? count($count_unreg) : 0),
            (!empty($count_reg) ? count($count_reg) : 0),
            (!empty($count_book) ? count($count_book) : 0),
        );
        }
        
        echo json_encode(['data' => $data]);
    }

    public function Get_all_Nager_garden_Amount(){

        $id= $this->input->get('id');
        $date_filter =  $this->input->get('date_filter');
        if($id !='' && $id !=null || $date_filter !='' && $date_filter !=null){
        $data1= $this->common_model->general_where_select_result_with_three_cond_export('tbl_property','property_id', $id,'deleted','0','created_date',$date_filter);
        }else{
        $data1= $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
        }
        $data = array();
        foreach ($data1 as $val) {
        $property_name = $val['property_name'];

        $amount_reg = $this->list->get_property_for_reg(NULL,NULL,NULL,NULL,'tbl_reg_plot','reg_plot_id','',$val['property_id'],'');
        $amount_book = $this->list->get_property_booked(NULL,NULL,NULL,NULL,'tbl_booked_plot','booked_plot_id','',$val['property_id'],'');
        $total_reg_amount = 0;
        $total_book_amount = 0;
        
        if(!empty($amount_reg->result_array())){
            foreach($amount_reg->result_array() as $val){
                $total_reg_amount = (is_numeric($total_reg_amount) ? $total_reg_amount : 0)  +  (is_numeric($val['mode_payment_value']) ? $val['mode_payment_value'] : 0);
            }
        }
        if(!empty($amount_book->result_array())){
            foreach($amount_book->result_array() as $val){
                $total_book_amount = (is_numeric($total_book_amount) ? $total_book_amount : 0)  +  (is_numeric($val['adv_amount_plot']) ? $val['adv_amount_plot'] : 0);
            }
        }
            $data[]=array(
             $property_name,
             $total_reg_amount + $total_book_amount,
            );
        }
    
            echo json_encode(['data' => $data]);
    }


	public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
       
        $user = $this->set->login($username, $password);
        if ($user) {
            $company = $this->set->company($user->comid);
            date_default_timezone_set('Asia/Kolkata');
            $currentDate = date('d/F');
            $sql = "SELECT DATE_FORMAT(date_of_birth, '%d/%M') FROM `tbl_staff_info` WHERE staff_info_id = $user->empid";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            $dob = $result[0]['DATE_FORMAT(date_of_birth, \'%d/%M\')'];
              if($currentDate == $dob){
                $message = '1';
              }else{
                $message = '';
              }
            $user_data = array(
				        'userid' => $user->empid,
                'username' => $user->username,
                'role' => $user->type,
                'comp_id' => $user->comid,
                'logo' => $company->logopath,
                'message' => $message,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($user_data);
            redirect('Dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
			redirect(base_url());
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
	
}
