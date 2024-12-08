<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_plots_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // $this->load->model('Property_model','property');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        
        if(empty($id)){
            $data['title'] = 'Register Plot';
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
            $data['title'] = 'Registered Plot';
            $data['get_prop'] = $this->common_model->get_single_date('tbl_reg_plot','reg_plot_id',$id);
            $data['get_plot_details'] = $this->common_model->general_where_select_result_with_two_cond('tbl_reg_plot_details','reg_plot_header_id',$data['get_prop']['reg_plot_id'],'deleted',0);
            $data['reg_plot_reg_title_deed']    = $this->common_model->get_media_img('reg_plot_reg_title_deed',$id,'','');
            $data['plot_sketch']    = $this->common_model->get_media_img('plot_sketch',$id,'','');
			$status = ' UnSold,Booked,Registered';
			$data['plot_details']  = $this->common_model->getall_record_info_with_detail_with_two_id_array('tbl_plot_details','property_id',$data['get_prop']['property_name'],'status',$status);
        }
		$data['district_list'] = $this->common_model->getall_record_info_array('district_master');
        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
        $data['all_employees'] = $this->common_model->get_refer_by_employees();
        
		$this->render_page('admin/property/registered_plot',$data); 
	}

    public function index_1($id)
	{
        $data                 = array();
        
        if($id){
            $data['title'] = 'Register Plot';
            $data['get_prop_'] = $this->db->select('A.*, B.plot_detail_id,B.plot_no as plot_nos, B.plot_extension as plot_extensions, B.north as norths, B.east as easts, B.west as wests, B.south as souths')
            ->from('tbl_property as A')
            ->join('tbl_plot_details B', 'B.property_id = A.property_id', 'left')
            ->where('B.deleted', 0)
            ->where('A.deleted', 0)
            ->where('B.plot_detail_id', $id)
            ->get()
            ->row_array();

            // echo '<pre>';
            // print_r($data['get_prop_']);
            // die();
        }else{
            $data['title'] = 'Register Plot';
        }
        
            //  if(empty($id)){
            $data['get_seq'] = $this->common_model->get_single_date('autonumber','process',$data['title']);
            $current_seqno = $data['get_seq']['seqno'];
            $no_of_digit = $data['get_seq']['no_of_digit'];
            $prefix = $data['get_seq']['prefix'];
            $suffix = $data['get_seq']['suffix'];
            $new_seqno = $current_seqno + 1;
            $formatted_seqno = str_pad($new_seqno, $no_of_digit, '0', STR_PAD_LEFT);
            $data['seq_no'] = $formatted_seqno;
            $data['get_seq_no'] = $prefix . $formatted_seqno . $suffix;
        // }
       
        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
        $data['all_employees'] = $this->common_model->get_refer_by_employees();


		$this->render_page('admin/property/registered_plot',$data); 
	}

    public function save_register_plot(){  
       
        $data                         = array();
        $reg_plot_id  = $this->input->post('reg_plot_id');
        $data['s_no'] =$this->input->post('s_no_input');
        $seqno  = $this->input->post('seqno');
        $data['property_name'] =$this->input->post('property_name_input');
        $data['plot_no'] =$this->input->post('plots_no_input');
        $data['total_plo_extension'] =$this->input->post('total_plo_extension_input');
        $data['buyer_name'] =$this->input->post('buyer_name_input');
        $data['buyer_gender'] =$this->input->post('buyer_gender_input');
        $data['father_rel'] =$this->input->post('father_rel_input');
        $data['phone_number'] =$this->input->post('phone_number_1_input');
        $data['buyer_address'] =$this->input->post('street_address_input'); //street_address - buyer_address
        $data['father_name'] =$this->input->post('father_name_input');
        $data['buyer_district'] =$this->input->post('district_input');
        $data['buyer_pincode'] =$this->input->post('district_pincode');
        $data['buyer_taluk_name'] =$this->input->post('taluk_name_input');
        $data['buyer_village_town'] =$this->input->post('village_town_input');
        // $data['total_plot_buyed'] =$this->input->post('total_plot_buyed_input');
        $data['buyer_phone_number_2'] =$this->input->post('phone_number_2_input');

        // $data['east'] =$this->input->post('east_input');
        // $data['west'] =$this->input->post('west_input');
        // $data['north'] =$this->input->post('north_input');
        // $data['south'] =$this->input->post('south_input');

        $data['id_proof_select'] =$this->input->post('id_proof_select_input');
        $data['id_proof'] =$this->input->post('id_proof_input');
        $data['plot_reg_doc_num'] =$this->input->post('plot_reg_doc_num');
        $data['plot_reg_date'] =$this->input->post('plot_reg_date_input');
      
        $data['patta_chitta'] =$this->input->post('patta_chitta_input');
        $data['t_s_no'] =$this->input->post('t_s_no_input');
        $data['ward_block'] =$this->input->post('ward_block_input');
       
        $data['plot_rate'] =$this->input->post('plot_rate_input');
        $data['mode_payment'] =$this->input->post('mode_payment_input');
        $data['mode_payment_value'] =$this->input->post('mode_payment_value_input');
        // $implode_value = !empty($this->input->post('name_ref_by_input')) ? implode(',',$this->input->post('name_ref_by_input')) : '';
        $data['name_ref_by'] =$this->input->post('name_ref_by_input');
        // $data['name_ref_by'] =$this->input->post('name_ref_by_input');
        $data['alt_phone_number'] =$this->input->post('alt_phone_number_input');

        $data['reg_district'] =$this->input->post('reg_district_input');
        $data['reg_town_village'] =$this->input->post('reg_town_village_input');
        $data['reg_sub_district'] =$this->input->post('reg_sub_district_input');
        $data['reg_revenue_taluk'] =$this->input->post('reg_revenue_taluk_input');
        $data['sub_reg'] =$this->input->post('sub_reg_input');
        $data['customer_id'] =$this->input->post('customer_id');
        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');

        // print_r($data['plot_no']); die;
         if(!empty($data['customer_id'])){
            $update=[
                // 'id' => $row['customer_info_id'],
                'buyer_name' => $data['buyer_name'],
                'street_address' => $data['buyer_address'],
                'id_proof_select' => $data['id_proof_select'],
                'id_proof' => $data['id_proof'],
                'phone_number_1' => $data['phone_number'],
                'id_proof' => $data['id_proof'],
                'father_rel' => $data['father_rel'],
                'father_name' => $data['father_name'],
                'buyer_gender' => $data['buyer_gender'],
				'district' => $data['buyer_district'],
				'pincode' => $data['buyer_pincode'],
				'taluk_name' => $data['buyer_taluk_name'],
				'village_town' => $data['buyer_village_town'],
				// 'total_plot_buyed' => $data['total_plot_buyed'],
				'phone_number_2' => $data['buyer_phone_number_2'],
				
            ];

            $this->db->where('customer_info_id',$data['customer_id']);
            $this->db->update('tbl_customer_info',$update);
         }
         if(!empty($data['plot_no'])){
            $data1['status'] = "Registered";
            $this->common_model->update_info_multiple('tbl_plot_details',$data1,'plot_detail_id',$data['plot_no']);
         }
         if (is_array($data['plot_no'])) {
            $data['plot_no'] = implode(',', $data['plot_no']);
        } else {
            $data['plot_no'] = $data['plot_no']; // Handle the case if it is not an array
        }
        $plot_total_price = 0;
        $cal_emp_salary = 0;
        $plot_details_calculate_amount = json_decode($this->input->post('plotData'), true);
		if (!empty($plot_details_calculate_amount)) {
         $plot_price = $this->common_model->general_where_select_result_with_two_cond('tbl_offer_incentives','property_name',$data['property_name'],'deleted',0);
		if (!empty($plot_price)) {
         $plot_total_price = $plot_price[0]['total_values'] * count($plot_details_calculate_amount);
         $cal_emp_salary = ($plot_total_price * $plot_price[0]['incentive']) / 100 ;
        }
      }

        $data['total_plot_price'] = $plot_total_price;
        $data['emp_salary'] = $cal_emp_salary;
        
            if($reg_plot_id == ''){

                $reg_plot_id = $this->common_model->save('tbl_reg_plot',$data);
                $this->common_model->update_info('autonumber',array('seqno' => $seqno),'process','Register Plot');
                $status = 'Inserted';
              
                //flow chart logic 

                $data_get_prop = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$data['name_ref_by']);

                if(!empty($data_get_prop)){
                $data_head_off = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$data_get_prop['head_officer_id']);
                $data_role_name = $this->common_model->get_single_date('tbl_role','role_id',$data_get_prop['role']);
                
                $data_arr =array();
            
                if(!empty($data_role_name['role_order']) && $data_role_name['role_order'] != '0'){
                    $id_2 = $data['name_ref_by'];
                   for($i=0 ; $i <= $data_role_name['role_order'] ; $i++){
    
                    $data_1 = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$id_2);
                    if(!empty($data_1)){
                    $id_2 = $data_1['head_officer_id'];
                    $role_1 = $this->common_model->get_single_date('tbl_role','role_id',$data_1['role']);
                    $role_name_1 = '';
                    if(!empty($role_1)){
                        $role_name_1 = $role_1['role_name'];
                    }
                    $data_arr[] = $data_1['staff_info_id'];
                }
                   
                   }
                }
              
                
            if(!empty($data_arr)){
                $get_staff = $this->db->where_in('staff_info_id', $data_arr)->get('tbl_staff_info')->result_array();

                if(!empty($get_staff)){
                    foreach($get_staff as $datas){
                        $role = $this->common_model->get_single_date('tbl_role','role_id',$datas['role']);
                        $total_employee_salary= ($cal_emp_salary * $role['com_in_percent']) / 100 ;
                      
                        $insert_salary_detail=array(
                          'amount' => $total_employee_salary,
                          'reg_plot_id' => $reg_plot_id,
                          'employee_id' => $datas['staff_info_id'],
                        );

                        $update_staff_info = array(
                          'total_plot_sold' => abs(abs((int)$datas['total_plot_sold']) + count($plot_details_calculate_amount)),
                        );

                        //insert salary details
                        $this->common_model->save('employee_salary_calculation',$insert_salary_detail);
                        
                        //update staff plot count
                        $this->db->where('staff_info_id', $datas['staff_info_id'])->update('tbl_staff_info',$update_staff_info);
                    }
                    
                }
                
            }
          
            }

            }else{
  
                 //flow chart logic 
                 $get_old_refer_by = $this->common_model->get_single_date('tbl_reg_plot','reg_plot_id',$reg_plot_id);
                 
                 if($get_old_refer_by['name_ref_by']  != $data['name_ref_by']){
                
                 $update_deleted = array('deleted' => '1');

				 $get_old_staff = $this->db->where_in('staff_info_id', $get_old_refer_by['name_ref_by'])->get('tbl_staff_info')->result_array();
			   
                 if(!empty($get_old_staff)){
                     foreach($get_old_staff as $old_datas){
						 $update_staff_info = array(
							'total_plot_sold' => abs(abs((int)$old_datas['total_plot_sold']) - count($plot_details_calculate_amount)),
						  );
						  
						  $this->db->where('staff_info_id', $old_datas['staff_info_id'])->update('tbl_staff_info',$update_staff_info);
                     }
                     
                 }
                 

                 $this->common_model->update_info('employee_salary_calculation',$update_deleted,'reg_plot_id',$reg_plot_id);

                 $data_get_prop = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$data['name_ref_by']);
                 if(!empty($data_get_prop)){
                 $data_head_off = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$data_get_prop['head_officer_id']);
                 $data_role_name = $this->common_model->get_single_date('tbl_role','role_id',$data_get_prop['role']);
                 $data_arr =array();
             
                 if(!empty($data_role_name['role_order']) && $data_role_name['role_order'] != '0'){
                     $id_2 = $data['name_ref_by'];
                    for($i=0 ; $i <= $data_role_name['role_order'] ; $i++){
     
                     $data_1 = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$id_2);
                     if(!empty($data_1)){
                     $id_2 = $data_1['head_officer_id'];
                     $role_1 = $this->common_model->get_single_date('tbl_role','role_id',$data_1['role']);
                     $role_name_1 = '';
                     if(!empty($role_1)){
                         $role_name_1 = $role_1['role_name'];
                     }
                     $data_arr[] = $data_1['staff_info_id'];
                 }
                    
                    }
                 }
 
             if(!empty($data_arr)){
                 $get_staff = $this->db->where_in('staff_info_id', $data_arr)->get('tbl_staff_info')->result_array();
                 if(!empty($get_staff)){
                     foreach($get_staff as $datas){
                         $role = $this->common_model->get_single_date('tbl_role','role_id',$datas['role']);
                         $total_employee_salary= ($cal_emp_salary * $role['com_in_percent']) / 100 ;
                       
                         $insert_salary_detail=array(
                           'amount' => $total_employee_salary,
                           'reg_plot_id' => $reg_plot_id,
                           'employee_id' => $datas['staff_info_id'],
                         );
                         $this->common_model->save('employee_salary_calculation',$insert_salary_detail);

						 $update_staff_info = array(
							'total_plot_sold' => abs((int)$datas['total_plot_sold']) + count($plot_details_calculate_amount),
						  );

						  //update staff plot count
						  $this->db->where('staff_info_id', $datas['staff_info_id'])->update('tbl_staff_info',$update_staff_info);

                     }
                     
                 }
                 
             }
           
             }

            }

            $this->common_model->update_info('tbl_reg_plot',$data,'reg_plot_id',$reg_plot_id);
            $status = 'Updated';

    }

			$data_                        = array();
			$plot_details = json_decode($this->input->post('plotData'), true);
			if (!empty($plot_details)) {
				$update =['deleted' => '1'];
				$this->db->where('reg_plot_header_id',$reg_plot_id)->update('tbl_reg_plot_details',$update);
				foreach($plot_details as $key=>$val){
				 $data_['reg_plot_header_id'] = $reg_plot_id;
				 $data_['plot_no'] = $val['plot_no'];
				 $data_['plot_extension'] = $val['plot_extension'];
				 $data_['north'] = $val['north'];
				 $data_['east'] = $val['east'];
				 $data_['west'] = $val['west'];
				 $data_['south'] = $val['south'];
				 $data_['status'] = $val['status'];
				 $data_['user_id'] =$this->session->userdata('userid');
				 $data_['company_id'] = $this->session->userdata('comp_id');
				 $this->common_model->save('tbl_reg_plot_details',$data_);
				}
			}
            
            $page_name = "Register Plot";

            if ($reg_plot_id) {

            // echo  '<pre>';print_r($_FILES['reg_plot_reg_title_deed_doc_file_input']);die();
            if (!empty($_FILES['reg_plot_reg_title_deed_doc_file_input']['name'][0])) {
                common_file_upload('uploads/registered_plot/reg_plot_reg_title_deed_doc/','*','reg_plot_reg_title_deed_doc_file_input','reg_plot_reg_title_deed',$reg_plot_id,'reg_plot');
            }

            if (!empty($_FILES['plot_sketch_file_input']['name'][0])) {
                common_file_upload('uploads/registered_plot/plot_sketch/','*','plot_sketch_file_input','plot_sketch',$reg_plot_id,'reg_plot');
            }

                $page_name = "Register Plot";
    
                $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');
    
                } else {
                    $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
                }
                
                echo json_encode($response);
                return;
    
    
    }

}
