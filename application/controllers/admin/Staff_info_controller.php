<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_info_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        
        $data['title'] = 'Staff Details';
        if(empty($id)){
            $data['get_seq'] = $this->common_model->get_single_date('autonumber','process',$data['title']);
            $current_seqno = $data['get_seq']['seqno'];
            $no_of_digit = $data['get_seq']['no_of_digit'];
            $prefix = $data['get_seq']['prefix'];
            $suffix = $data['get_seq']['suffix'];
            $new_seqno = $current_seqno + 1;
            $formatted_seqno = str_pad($new_seqno, $no_of_digit, '0', STR_PAD_LEFT);
            $data['seq_no'] = $formatted_seqno;
            $data['get_seq_no'] = $prefix . $formatted_seqno . $suffix;
        }
        if($id){
         $data['get_prop'] = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$id);
         $data['get_prop2'] = $this->common_model->get_single_date('userrights_header','empid',$id);
         $data['passport_size_photo']    = $this->common_model->get_media_img('passport_size_photo',$id,'','');
        }

        $data['district_list'] = $this->common_model->getall_record_info_array('district_master');
        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
        $data['role_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_role');
 
		$this->render_page('admin/property/staff_info',$data); 
	}

    public function save_staff_info()
    {
        $data                         = array();
        $data2                         = array();
        $user_header = $this->input->post('headerid');     
        $staff_info_id  = $this->input->post('staff_info_id');
        $seqno  = $this->input->post('seqno');
        $data['employee_name'] =$this->input->post('employee_name_input');
        $data['father_name'] =$this->input->post('father_name_input');
        $data['role'] =$this->input->post('role_input');
        $data['employee_id'] =$this->input->post('employee_id_input');
        $data['date_of_birth'] =$this->input->post('date_of_birth_input');
        $data['bank_ac_no'] =$this->input->post('bank_ac_no_input');
        $data['IFSC_code'] =$this->input->post('IFSC_code_input');
        $data['branch_name'] =$this->input->post('branch_name_input');
        $data['pan_card'] =$this->input->post('pan_card_input');
        $data['nominee'] =$this->input->post('nominee_input');
        $data['nominee_relationship'] =$this->input->post('nominee_relationship_input');
        $data['property_name'] =$this->input->post('property_name_input');
        $data['buyer_name'] =$this->input->post('buyer_name_input');
        $data['district'] =$this->input->post('district_input');
        $data['pincode'] =$this->input->post('district_pincode');
        $data['taluk_name'] =$this->input->post('taluk_name_input');
        $data['village_town'] =$this->input->post('village_town_input');
        $data['street_address'] =$this->input->post('street_address_input');
        $data['total_plot_sold'] =$this->input->post('total_plot_sold_input');
        $data['phone_number_1'] =$this->input->post('phone_number_1_input');
        $data['phone_number_2'] =$this->input->post('phone_number_2_input');
        $data['id_proof_select'] =$this->input->post('id_proof_select_input');
        $data['id_proof'] =$this->input->post('id_proof_input');
        $data['head_officer_id'] =$this->input->post('role_head_off');
        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');
        
        $data2['username'] = $this->input->post('uname_input');
        $data2['password'] = $this->input->post('password_input');
        $data2['type'] = $this->input->post('type_input');
        $data2['comid'] = $this->session->userdata('comp_id');

        if($staff_info_id == ''){
        //validation
        $check_proof = $this->common_model->check_is_exit('id_proof',$data['id_proof'],'');
        $check_bank_ac = $this->common_model->check_is_exit('bank_ac_no',$data['bank_ac_no'],'');
        $check_pan = $this->common_model->check_is_exit('pan_card',$data['pan_card'],'');
        $check_phone1 = $this->common_model->check_is_exit('phone_number_1',$data['phone_number_1'],'');
        $check_phone2 = $this->common_model->check_is_exit('phone_number_2',$data['phone_number_2'],'');
        
        }else{
        //validation
        $check_proof = $this->common_model->check_is_exit('id_proof',$data['id_proof'],$staff_info_id);
        $check_bank_ac = $this->common_model->check_is_exit('bank_ac_no',$data['bank_ac_no'],$staff_info_id);
        $check_pan = $this->common_model->check_is_exit('pan_card',$data['pan_card'],$staff_info_id);
        $check_phone1 = $this->common_model->check_is_exit('phone_number_1',$data['phone_number_1'],$staff_info_id);
        $check_phone2 = $this->common_model->check_is_exit('phone_number_2',$data['phone_number_2'],$staff_info_id);

        }

        $is_valide = '0';
        if(!empty($check_proof) && $data['id_proof'] != ''){
            $is_valide = '1';
            $response = array('status' => 'error', 'message' => 'Proof Number Already Exists!');
        }else if(!empty($check_bank_ac)  && $data['bank_ac_no'] != ''){
            $is_valide = '1';
            $response = array('status' => 'error', 'message' => 'Bank Account Number Already Exists!');
        }else if(!empty($check_pan)  && $data['pan_card'] != ''){
            $is_valide = '1';
            $response = array('status' => 'error', 'message' => 'Pan Card Number Already Exists!');
        } else if(!empty($check_phone1)  && $data['phone_number_1'] != ''){
            $is_valide = '1';
            $response = array('status' => 'error', 'message' => 'Phone Number 1 Already Exists!');
        } else if(!empty($check_phone2)  && $data['phone_number_2'] != ''){
            $is_valide = '1';
            $response = array('status' => 'error', 'message' => 'Phone Number 2 Already Exists!');
        } 

      if($is_valide == '0'){

        if($staff_info_id == ''){
            $staff_info_id = $this->common_model->save('tbl_staff_info',$data);
            if($user_header == ''){

            if($this->input->post('role_input') == 13  && ($this->input->post('type_input') == "superAdmin" ||  $this->input->post('type_input') == "accounts"))
                {
                    $data2['empid'] = '1';
                }else{
                    $data2['empid'] = $staff_info_id;
                }
             
            $user_header = $this->common_model->save('userrights_header',$data2);
            }
            $this->common_model->update_info('autonumber',array('seqno' => $seqno),'process','Staff Details');
            $status = 'Inserted';
        }else{
            if($user_header != ''){
            $data2['empid'] = $staff_info_id;
            $this->common_model->update_info('userrights_header',$data2,'headerid',$user_header);
            }
            $this->common_model->update_info('tbl_staff_info',$data,'staff_info_id',$staff_info_id);
            $status = 'Updated';
        }

        if ($staff_info_id) {

         if (!empty($_FILES['passport_size_photo_file_input']['name'][0])) {
                common_file_upload('uploads/staff_info/passport_size_photo/','*','passport_size_photo_file_input','passport_size_photo',$staff_info_id,'staff_info');
        }

        $page_name = "Staff Detail";

        
        $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');
    
    } else {
        $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
    }
    
}
    
    echo json_encode($response);
    return;

    }

}