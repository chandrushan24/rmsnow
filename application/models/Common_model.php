<?php

class Common_Model extends CI_Model
{

    public function save($table,$data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    
    public function getall_record_info($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $info = $this->db->get();
        return $info->result();
    }

    public function getall_record_info_array($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $info = $this->db->get();
        return $info->result_array();
    }
    
    public function getall_record_info_with_deletedCheck_array($table)
    {
        $user_role = $this->session->userdata('role');    
        $user_ids = $this->session->userdata('userid');
        $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);
       // print_r($filter_user_id);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('deleted',0);
        if ($user_role!='superadmin' && $user_role !='accounts') {
            if($table != 'tbl_plot_details' && $table != 'tbl_billing_receipt' && $table != 'tbl_property' && $table != 'tbl_reg_plot_details' && $table != 'tbl_booked_plot_details' && $table != 'tbl_staff_info' &&  $table != 'tbl_role' && $table != 'tbl_expense_details' && $table != 'tbl_employee_salary' && $table!= 'tbl_customer_info' && $table !='tbl_salary_advance'){
                if(!empty($user_id)){

                $user_id = $filter_user_id['0'];
                $user_id = explode(',', $user_id);
                if (!empty($user_id)) {
                    $merged_user_ids = array_merge($user_id, (array)$user_ids);
                    $merged_user_ids = array_filter($merged_user_ids); 
                    $this->db->where_in('name_ref_by', $merged_user_ids);
                }
            }
                 
            }
            if($table != 'tbl_plot_details' && $table != 'tbl_property' && $table != 'tbl_role' && $table != 'tbl_expense_details'){
                 if (!empty($user_id)) {
                $user_id = $filter_user_id['0'];
                $user_id = explode(',', $user_id);
               
                    $merged_user_ids = array_merge($user_id, (array)$user_ids);
                    $merged_user_ids = array_filter($merged_user_ids); 
                    $this->db->where_in('user_id', $merged_user_ids);
                }
                 
            }

        } 
        if($table == 'tbl_role'){
        $this->db->order_by('role_order');
        }
        $info = $this->db->get();
        return $info->result_array();       
    }   

    public function getall_record_info_with_deletedCheck_with_id_array($table,$column,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $id);
        $this->db->where('deleted',0);
        $info = $this->db->get();
        return $info->result_array();
    }

    public function getall_record_info_with_detail_with_two_id_array($table,$column,$id,$column1,$id1)
    {
            // Convert the comma-separated string to an array
    $id1 = explode(',', $id1);

    // Trim quotes from each status value
    $id1 = array_map(function($value) {
        return trim($value, '"\'');
    }, $id1);
    
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $id);
        $this->db->where_in($column1, $id1);
        $this->db->where('deleted',0);
        $info = $this->db->get();
        // echo $this->db->last_query(); die;
        return $info->result_array();
    }

    public function get_single_date($table,$column,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $id);
        $info = $this->db->get();
        return $info->row_array();
    }

    public function get_multiple_date($table,$column,$id)
    {
    // Convert the comma-separated string to an array
    $id = explode(',', $id);

    // Trim quotes from each status value
    $id = array_map(function($value) {
        return trim($value, '"\'');
    }, $id);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where_in($column, $id);
        $info = $this->db->get();
        // echo $this->db->last_query(); die;
        return $info->result_array();
    }

    public function update_info($table,$data,$column ,$id)
    {
        $this->db->where($column, $id);
        return $this->db->update($table, $data);
    }
    public function update_info_multiple($table,$data,$column ,$id)
    {
        $this->db->where_in($column, $id);
        return $this->db->update($table, $data);
    }

   
    function get_media_img($tbl_media_type = '',$tbl_module_id ='', $isfeature='', $status = ''){
        $this->db->select('*');
        if($tbl_media_type != ''){
            $this->db->where('tbl_media_type', $tbl_media_type);
        }
        if($tbl_module_id != ''){
            $this->db->where('tbl_module_id', $tbl_module_id);
        }
        if($isfeature != ''){
            $this->db->where('tbl_featured_img',$isfeature );
        }
        if($status != ''){
            $this->db->where('publication_status',$status );
        }
        
        if($tbl_media_type == 'passport_size_photo'){
            $this->db->order_by('media_id', 'DESC');
        }
        else{
            $this->db->order_by('order_', 'ASC');
            $this->db->limit(1);
        }

        $this->db->from('tbl_media');
        $info = $this->db->get();
        return $info->result_array();
    }

    function get_media_img_row($tbl_media_type = '',$tbl_module_id ='', $isfeature='', $status = ''){
        $this->db->select('*');
        if($tbl_media_type != ''){
            $this->db->where('tbl_media_type', $tbl_media_type);
        }
        if($tbl_module_id != ''){
            $this->db->where('tbl_module_id', $tbl_module_id);
        }
        if($isfeature != ''){
            $this->db->where('tbl_featured_img',$isfeature );
        }
        if($status != ''){
            $this->db->where('publication_status',$status );
        }


        $this->db->order_by('order_', 'ASC');

        $this->db->from('tbl_media');
        $info = $this->db->get();
        return $info->row_array();
    }


    function save_upload_img($module_type,$module_id,$path,$media){
        if(empty($media['next_order'])){
            $media['next_order'] = 1;
        }
        $data = array();
        $data['tbl_media_type'] = $module_type;
        $data['tbl_module_id'] = $module_id;
        $data['tbl_orig_name'] = $media['orig_name'];
        $data['tbl_client_name'] = $media['client_name'];
        $data['tbl_file_path'] = $path.$media['orig_name'];
        $data['tbl_file_ext'] = $media['file_ext'];
        $data['order_'] = $media['next_order'];
        // print_r($data); die;
        $this->db->insert('tbl_media', $data);
    }

    
    public function delete_info($table,$column,$id)
    {
        $this->db->where($column, $id);
        return $this->db->delete($table);
    }


    public function search_customers($term) {
        if(!empty($term)){
        $this->db->like('buyer_name',  $term);
        $this->db->where('deleted',0);
        $query = $this->db->get('tbl_customer_info');
        $results = $query->result_array();

        $data = [];
        foreach ($results as $row) {
            $data[] = [
                'id' => $row['customer_info_id'],
                'value' => $row['buyer_name'],
                'street_address' => $row['street_address'],
                'id_proof_select' => $row['id_proof_select'],
                'id_proof' => $row['id_proof'],
                'phone_number_1' => $row['phone_number_1'],
                'id_proof' => $row['id_proof'],
                'father_name' => $row['father_name'],
                'father_rel' => $row['father_rel'],
                'buyer_gender' => $row['buyer_gender'],
				'district' => $row['district'],
                'pincode' => $row['pincode'],
                'taluk_name' => $row['taluk_name'],
                'village_town' => $row['village_town'],
                'phone_number_2' => $row['phone_number_2'],
				'total_plot_buyed' => $row['total_plot_buyed'],

            ];
        }

        return $data;
    }
}

    public function add_or_get_customer_id($customerName) {
        if(!empty($customerName)){
        $this->db->where('buyer_name', $customerName);
        $this->db->where('deleted', 0);
        $query = $this->db->get('tbl_customer_info');
        
            if ($query->num_rows() > 0) {
                return $query->row()->customer_info_id;
            } else {
                $data = ['buyer_name' => $customerName];
                $this->db->insert('tbl_customer_info', $data);
                return $this->db->insert_id();
            }
        }
    }

	function general_where_select_result_with_two_cond($table, $col, $id, $col2, $id2)
    {
		if (is_array($id)) {
			$this->db->where_in($col, $id);
		} else {
			$this->db->where($col, $id);
		}
        if($id2 !=''){
		if (is_array($id2)) {
			$this->db->where_in($col2, $id2);
		} else {
			$this->db->where($col2, $id2);
		}
    }
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function general_where_select_result_with_three_cond_export($table, $col, $id, $col2, $id2 ,$col3 ,$date) {
		
        if($id !=''){
        if (is_array($id)) {
			$this->db->where_in($col, $id);
		} else {
			$this->db->where($col, $id);
		}
    }
        
        if($id2 !=''){
		if (is_array($id2)) {
			$this->db->where_in($col2, $id2);
		} else {
			$this->db->where($col2, $id2);
		}
       }

        if($date !=''){

            $daterange = explode("-", $date);
            $from_date = $daterange[0];
            $to_date = $daterange[1];

            $from_date = $from_date;
            $from_date = explode("/", $from_date);
            $from_date = array_reverse($from_date);
            $from_date = join("-", $from_date);

            $to_date = $to_date;
            $to_date = explode("/", $to_date);
            $to_date = array_reverse($to_date);
            $to_date = join("-", $to_date);
  
            $this->db->where('DATE('.$col3.') >=', $from_date);
            $this->db->where('DATE('.$col3.') <=', $to_date);
        }

        $query = $this->db->get($table);
        return $query->result_array();
    }
    
    function general_where_select_result_with_four_cond_export($table, $col, $id, $col2, $id2 ,$col3 ,$date,$col4,$id4) {
		if (is_array($id)) {
			$this->db->where_in($col, $id);
		} else {
			$this->db->where($col, $id);
		}
        
        if($id2 !=''){
		if (is_array($id2)) {
			$this->db->where_in($col2, $id2);
		} else {
			$this->db->where($col2, $id2);
		}
       }

       if($id4 !=''){
		if (is_array($id4)) {
			$this->db->where_in($col4, $id4);
		} else {
			$this->db->where($col4, $id4);
		}
       }

        if($date !=''){

            $daterange = explode("-", $date);
            $from_date = $daterange[0];
            $to_date = $daterange[1];

            $from_date = $from_date;
            $from_date = explode("/", $from_date);
            $from_date = array_reverse($from_date);
            $from_date = join("-", $from_date);

            $to_date = $to_date;
            $to_date = explode("/", $to_date);
            $to_date = array_reverse($to_date);
            $to_date = join("-", $to_date);
  
            $this->db->where('DATE('.$col3.') >=', $from_date);
            $this->db->where('DATE('.$col3.') <=', $to_date);
        }

        $query = $this->db->get($table);
        return $query->result_array();
    }
    
    function general_where_select_result_with_three_cond($table, $col, $id, $col2, $id2, $col3, $id3)
    {
		if (is_array($id)) {
			$this->db->where_in($col, $id);
		} else {
			$this->db->where($col, $id);
		}
		if (is_array($id2)) {
			$this->db->where_in($col2, $id2);
		} else {
			$this->db->where($col2, $id2);
		}
		if (is_array($id3)) {
			$this->db->where_in($col3, $id3);
		} else {
			$this->db->where($col3, $id3);
		}
        $query = $this->db->get($table);
        return $query->result_array();
    }

public function get_head_officer_id_least($order) {

    $this->db->select('*');
    $this->db->from('tbl_role');
    $this->db->where('role_order <', $order);
    $this->db->where('deleted', 0);
    $this->db->order_by('role_order', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->row_array();
    return $result;
}

public function get_head_officer_list_staff_info($role) {

    $this->db->select('*');
    $this->db->from('tbl_staff_info');
    $this->db->where('role', $role);
    $this->db->where('deleted', 0);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

public function check_is_exit($check,$value,$id) {

    $this->db->select('*');
    $this->db->from('tbl_staff_info');
    $this->db->where($check, $value);
    $this->db->where('deleted', 0);
    if($id != ''){
    $this->db->where('staff_info_id !=', $id);
    }
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

public function get_refer_by_employees() {
    $this->db->select('*');        
    $this->db->from('tbl_role'); 
    $this->db->order_by('role_order', 'DESC'); 
    $this->db->limit(1);           
    $query = $this->db->get(); 
    $role = $query->row_array();
    if(!empty($role)){
        $role_id = $role['role_id'];
    }else{
        $role_id = '';
    }
    $user_ids = $this->session->userdata('userid');
    $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);
    if(empty($filter_user_id))
    {
        return false;
    }
    $user_id = $filter_user_id['0'];
    $user_id = explode(',', $user_id);
    $this->db->select('tsi.*,tr.role_name');
    $this->db->from('tbl_staff_info as tsi');
    $this->db->join('tbl_role as tr','tr.role_id = tsi.role','left');
    $this->db->where('tsi.role', $role_id);
    $this->db->where_in('tsi.staff_info_id', $user_id);
    $this->db->where('tsi.deleted', 0);
    
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

public function get_regiter_plot_count($id,$user_id ='') {

    $user_role = $this->session->userdata('role');    
    $user_ids = $this->session->userdata('userid');
    $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);

    $this->db->select('trp.*,trpd.deleted');
    $this->db->from('tbl_reg_plot as trp'); 
    $this->db->join('tbl_reg_plot_details as trpd','trpd.reg_plot_header_id = trp.reg_plot_id','left');
    $this->db->where('trp.property_name', $id);
    $this->db->where('trp.deleted', 0);
    $this->db->where('trpd.deleted', 0);
	if (!empty($user_id)) {
		if (is_array($user_id)) {
			$this->db->where_in('trp.user_id', $user_id);
		} else {
			$this->db->where('trp.user_id', $user_id);
		}
	}

    if ($user_role !='superadmin' && $user_role !='accounts' ) {
        if (!empty($user_id)) {
        $user_id = $filter_user_id['0'];
        $user_id = explode(',', $user_id);
            $merged_user_ids = array_merge($user_id, (array)$user_ids);
            $merged_user_ids = array_filter($merged_user_ids); 
            $this->db->where_in('trp.name_ref_by', $merged_user_ids);
        }
         
    }

    $this->db->group_by('trpd.reg_plot_detail_id');
    $query = $this->db->get();
    $result = $query->result_array();
    // echo '<pre>';print_r($result);die();
    return $result;
}

public function get_Booked_plot_count($id) {
    $user_role = $this->session->userdata('role');    
    $user_ids = $this->session->userdata('userid');
    $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);

    $this->db->select('trp.*,trpd.deleted');
    $this->db->from('tbl_booked_plot as trp'); 
    $this->db->join('tbl_booked_plot_details as trpd','trp.booked_plot_id  = trpd.booked_plot_header_id ','left');
    $this->db->where('trp.property_name', $id);
    $this->db->where('trp.deleted', 0);
    $this->db->where('trpd.deleted', 0);
    if ($user_role !='superadmin' && $user_role !='accounts') {
         if($filter_user_id){
            $user_id = $filter_user_id['0'];
            $user_id = explode(',', $user_id);
            if (!empty($user_id)) {
                $merged_user_ids = array_merge($user_id, (array)$user_ids);
                $merged_user_ids = array_filter($merged_user_ids); 
                $this->db->where_in('trp.name_ref_by', $merged_user_ids);
            }
        }
        }
    $this->db->group_by('trpd.plot_no');
    // $this->db->group_by('trpd.booked_plot_detail_id');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

public function get_Unreg_plot_count($id) {
    $this->db->select('trp.*');
    $this->db->from('tbl_plot_details as trp'); 
    if($id !='' && $id != null){
    $this->db->where('trp.property_id', $id);
    }

//     if($date_filter !='' && $date_filter != null){
//         $daterange = explode("-", $date_filter);
//         $from_date = $daterange[0];
//         $to_date = $daterange[1];

//         $from_date = $from_date;
//         $from_date = explode("/", $from_date);
//         $from_date = array_reverse($from_date);
//         $from_date = join("-", $from_date);

//         $to_date = $to_date;
//         $to_date = explode("/", $to_date);
//         $to_date = array_reverse($to_date);
//         $to_date = join("-", $to_date);

//         $this->db->where('DATE(trp.created_date) >=', $from_date);
//         $this->db->where('DATE(trp.created_date) <=', $to_date);
//     }
    
    $this->db->where('trp.deleted', 0);
    $this->db->where('trp.status', 'UnSold');
    $this->db->group_by('trp.plot_detail_id');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;  
}


public function get_all_reg_plots_count() {
    $data_s=array();
    $data1 = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
    foreach ($data1 as $val) {
    $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val['property_id'],'deleted','0');
    $count_reg = $this->common_model->get_regiter_plot_count($val['property_id']);
    $data_s[] = array(
        'Nager_Garden_Name' => $val["property_name"],
        'Village_Town_Name' => $val["village_town"],
         'Total_Plots'  =>(!empty($count_total) ? count($count_total) : 0),
         'Total_Registered_Plots'  =>(!empty($count_reg) ? count($count_reg) : 0),
    );
    }
    return $data_s;  
}

public function get_all_booked_plots_count() {
    $data_s=array();
    $data1 = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
    foreach ($data1 as $val) {
    $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val['property_id'],'deleted','0');
    $count_book = $this->common_model->get_Booked_plot_count($val['property_id']);
    $data_s[] = array(
        'Nager_Garden_Name' => $val["property_name"],
        'Village_Town_Name' => $val["village_town"],
         'Total_Plots'  =>(!empty($count_total) ? count($count_total) : 0),
         'Total_Booked_Plots'  =>(!empty($count_book) ? count($count_book) : 0),
    );
    }
    return $data_s;  
}

public function get_all_plots_count() {
    $data_s=array();
    $data1 = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
    foreach ($data1 as $val) {
    $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val['property_id'],'deleted','0');
    $count_reg = $this->common_model->get_regiter_plot_count($val['property_id']);
    $count_book = $this->common_model->get_Booked_plot_count($val['property_id']);
    $count_unreg = $this->common_model->get_Unreg_plot_count($val['property_id']);
    $data_s[] = array(
        'Nager_Garden_Name' => $val["property_name"],
        'Village_Town_Name' => $val["village_town"],
         'Total_Plots'  =>(!empty($count_total) ? count($count_total) : 0),
         'Total_Registered_Plots'  =>(!empty($count_reg) ? count($count_reg) : 0),
         'Total_Unregister_Plots'  =>(!empty($count_unreg) ? count($count_unreg) : 0),
         'Total_Booked_Plots'  =>(!empty($count_book) ? count($count_book) : 0),
    );
    }
    return $data_s;  
}

public function get_only_unregister_excel_plots() {
    $data_s=array();
    $data1 = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
    foreach ($data1 as $val) {
    $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val['property_id'],'deleted','0');
    $count_unreg = $this->common_model->get_Unreg_plot_count($val['property_id']);
    $data_s[] = array(
        'Nager_Garden_Name' => $val["property_name"],
        'Village_Town_Name' => $val["village_town"],
         'Total_Plots'  =>(!empty($count_total) ? count($count_total) : 0),
         'Total_Unregister_Plots'  =>(!empty($count_unreg) ? count($count_unreg) : 0),
    );
    }
    return $data_s;  
}

public function get_registered_booked_customer(){
    $this->db->select('A.*');
    $this->db->from('tbl_customer_info as A'); 
    $this->db->join('tbl_booked_plot as B','B.customer_id  = A.customer_info_id  AND B.deleted = 0','left');
    $this->db->join('tbl_reg_plot as C','C.customer_id  = A.customer_info_id  AND C.deleted = 0','left');
    $this->db->where('A.deleted', 0);
    $this->db->group_by('B.customer_id,C.customer_id');
    $query = $this->db->get();
    $result = $query->result_array();
    // echo '<pre>';print_r($result);die();
    return $result;   
}

public function get_nagar_garden_based_on_customer($id){
    $this->db->select('A.*');
    $this->db->from('tbl_property as A'); 
    $this->db->join('tbl_booked_plot as B','B.property_name  = A.property_id  AND B.deleted = 0 AND B.customer_id = '.$id.'' ,'left');
    $this->db->join('tbl_reg_plot as C','C.property_name  = A.property_id  AND C.deleted = 0 AND C.customer_id = '.$id.'','left');
    $this->db->where('A.deleted', 0);
    $this->db->group_by('B.property_name,C.property_name');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;  
}

public function get_booked_plot_details($id) {
 
    $this->db->select('trp.*,trpd.deleted,trpd.plot_no,SUM(trp.mode_payment_value) as advance_amount,trp.plot_no as plots');
    $this->db->from('tbl_booked_plot as trp'); 
    $this->db->join('tbl_booked_plot_details as trpd','trp.booked_plot_id  = trpd.booked_plot_header_id ','left');
    $this->db->where('trpd.plot_no', $id);
    $this->db->where('trpd.deleted', 0);
    $this->db->where('trp.deleted', 0);
    $this->db->group_by('trp.customer_id,trp.booked_plot_id');
    $this->db->order_by('trp.booked_plot_id','asc');
    $query = $this->db->get();
    $result = $query->result_array();
    // if(!empty($result)){
    //     $this->db->select('trp.*, trpd.deleted, trpd.plot_no, SUM(trp.mode_payment_value) as advance_amount, GROUP_CONCAT(trpd.plot_no) as plots');
    //     $this->db->from('tbl_booked_plot as trp'); 
    //     $this->db->join('tbl_booked_plot_details as trpd', 'trp.booked_plot_id = trpd.booked_plot_header_id', 'left');
    //     $this->db->where('trp.booked_plot_id', $result[0]['booked_plot_id']);
    //     $this->db->where('trpd.deleted', 0);
    //     $this->db->where('trp.deleted', 0);
    //     $this->db->group_by('trp.customer_id');
    //     $query = $this->db->get();
    //     $result = $query->result_array();
    // }

    return $result;
}
public function get_registered_booked_details() {
   $data = array();
    $data_booked = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_booked_plot');
    $data_reg  = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_reg_plot');
    if(!empty($data_reg)){
     foreach($data_reg as $val){
       $data[] = array(
        'id'   =>  $val['reg_plot_id'],
        's_no'   => $val['s_no'],
        'status'   => 'Registered',
        'buyer'   => $val['buyer_name'],
       );
     }
    }

    if(!empty($data_booked)){
        foreach($data_booked as $val){
          $data[] = array(
           'id'   => $val['booked_plot_id'],
           's_no'   => $val['s_no'],
           'status'   => 'Booked',
           'buyer'   => $val['buyer_name'],
          );
        }
       }

    return $data;
}

    public function get_staff_hierarchy_ids(){
        $user_id = $this->session->userdata('userid');
        $query = " WITH RECURSIVE team_hierarchy AS (
            SELECT 
            staff_info_id AS team_member_id, 
            head_officer_id
            FROM 
            tbl_staff_info
            WHERE 
            head_officer_id = ?

            UNION ALL
            SELECT 
            t.staff_info_id, 
            t.head_officer_id
            FROM 
            tbl_staff_info t
            INNER JOIN 
            team_hierarchy th 
            ON 
            t.head_officer_id = th.team_member_id
            )
            SELECT * FROM(SELECT 
            GROUP_CONCAT(team_member_id SEPARATOR ',') AS staff_info_id
            FROM 
            team_hierarchy)O WHERE O.staff_info_id IS NOT NULL";


        $result = $this->db->query($query, array($user_id));
        $ids = [];
            if ($result->num_rows() > 0) {
                foreach ($result->result_array() as $row) {
                    $ids[] = $row['staff_info_id'];
                }
            }

        return $ids;
    }

    public function sum_adv_amount_plot_exact($table, $customer_id, $plot_no, $deleted = 0)
    {
        // Normalize the input plot_no
        $input_plot_no_array = explode(',', $plot_no);
        sort($input_plot_no_array); // Sort the array
        $normalized_input_plot_no = implode(',', $input_plot_no_array); // Join back into a string
    
        // Fetch all records for the given customer_id and deleted flag
        $this->db->select('adv_amount_plot, plot_no');
        $this->db->from($table);
        $this->db->where('customer_id', $customer_id);
        $this->db->where('deleted', $deleted);
    
        $query = $this->db->get();
        $rows = $query->result_array();
    
        $total_adv = 0;
        if(!empty($rows)){
        // Loop through rows and normalize `plot_no` for comparison
        foreach ($rows as $row) {
            $db_plot_no_array = explode(',', $row['plot_no']);
            sort($db_plot_no_array); // Sort the array
            $normalized_db_plot_no = implode(',', $db_plot_no_array); // Join back into a string
    
            // Compare normalized plot_no values
            if ($normalized_db_plot_no === $normalized_input_plot_no) {
                $total_adv += is_numeric($row['adv_amount_plot']) ? $row['adv_amount_plot'] : 0;
            }
        }
    }
    
        // Return the total sum
        return $total_adv;
    }

    // public function get_balance_registerted_amount($table,$property_id,$deleted_value, $cus_id)
    // {
    //     $this->db->select('IFNULL(SUM(mode_payment_value),0) AS total_payment_received, customer_name');
    //     $this->db->from($table);
    //     $this->db->where('customer_name', $cus_id);
    //     $this->db->where('property_name', $property_id);
    //     $this->db->where('deleted', $deleted_value);
    //     $this->db->group_by('customer_name');
    //     $query = $this->db->get();
    //     return $result = $query->result_array();
    // }
}
