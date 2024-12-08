<?php

class List_model extends CI_Model
{
   public function total_property($search_value,$table,$uniq_id,$user_id =''){

            $this->db->select("COUNT(DISTINCT ".$uniq_id.") AS total_rows");
            $this->db->from($table);
            $this->db->where('deleted', '0');

			if (!empty($user_id)) {
				if (is_array($user_id)) {
					$this->db->where_in('user_id', $user_id);
				} else {
					$this->db->where('user_id', $user_id);
				}
			}

            $query = $this->db->get();
            $result = $query->row();
            return ($result) ? $result->total_rows : 0;
   }
   public function get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns,$filter_nagar='',$filter_date_range =''){
                $this->db->select('*');
                $this->db->from($table);
                if (!empty($search_value)) {
                $this->db->group_start();
                foreach($search_columns as $index => $val){
                if ($index == 0) {
                    $this->db->like($val, $search_value, 'both');
                } else {
                    $this->db->or_like($val, $search_value, 'both');
                }
                }
                $this->db->group_end();
                }
                if($filter_nagar != '' && $table !='tbl_employee_salary'  && $table !='tbl_expense_details'){
                    $this->db->where('property_name', $filter_nagar);
                }

                
                if($filter_date_range !=''){

                    $daterange = explode("-", $filter_date_range);
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
          
                    $this->db->where('DATE(created_date) >=', $from_date);
                    $this->db->where('DATE(created_date) <=', $to_date);
                }
                

               //employee salary filter
                if($filter_nagar != '' && $table =='tbl_employee_salary'){
                    $data_filter = explode(',',$filter_nagar);
                    if($data_filter[0] != ''){
                        $this->db->where('employee_name', $data_filter[0]);
                    }

                    if($data_filter[1] != ''){
                    $daterange = explode("-", $data_filter[1]);
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
          
                    $this->db->where('DATE(created_date) >=', $from_date);
                    $this->db->where('DATE(created_date) <=', $to_date);
                    }
                }
                //expense filter
                if($filter_nagar != '' && $table =='tbl_expense_details'){
                    $data_filter = explode(',',$filter_nagar);
                    if($data_filter[0] != ''){
                        $this->db->where('property_name', $data_filter[0]);
                    }
                    
                    if($data_filter[1] != ''){
                        $daterange = explode("-", $data_filter[1]);
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
              
                        $this->db->where('DATE(created_date) >=', $from_date);
                        $this->db->where('DATE(created_date) <=', $to_date);
                        
                    }
                }
                
                $this->db->where('deleted', '0');


				if (!empty($user_id)) {
					if (is_array($user_id)) {
						$this->db->where_in('user_id', $user_id);
					} else {
						$this->db->where('user_id', $user_id);
					}
				}

				$this->db->where('deleted', '0');

                $this->db->order_by($uniq_id, 'DESC');
                $this->db->limit($length, $start);
                $this->db->group_by($uniq_id);
                $query = $this->db->get();
                return $query;
           
   }

   public function total_property_details($search_value,$table,$uniq_id,$status){

    $this->db->select("COUNT(DISTINCT ".$uniq_id.") AS total_rows");
    $this->db->from($table);
    $this->db->where('deleted', '0');
    $this->db->where_in('status', $status);
    $query = $this->db->get();
    $result = $query->row();
    return ($result) ? $result->total_rows : 0;
   }
   public function get_property_details($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns,$status,$filter_nagar=''){
        $this->db->select('*');
        $this->db->from($table);
        if (!empty($search_value)) {
        $this->db->group_start();
        foreach($search_columns as $index => $val){
        if ($index == 0) {
            $this->db->like($val, $search_value, 'both');
        } else {
            $this->db->or_like($val, $search_value, 'both');
        }
        }
        $this->db->group_end();
        }
        if($filter_nagar != ''){
            $this->db->where('property_id', $filter_nagar);
        }

        $this->db->where_in('status', $status);
        $this->db->where('deleted', '0');
        $this->db->order_by($uniq_id, 'DESC');
        
        if($length != '' && $start !=''){
        $this->db->limit($length, $start);
        }
        
        $this->db->group_by($uniq_id);
        $query = $this->db->get();
        return $query;
    }

    public function total_property_for_reg($search_value, $table, $uniq_id, $filter_nagar = '', $filter_date_range = '')
{
    $user_role = $this->session->userdata('role');    
    $user_ids = $this->session->userdata('userid');
    $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);

    // Select the count of rows
    $this->db->select('COUNT(*) AS total_rows')
        ->from('tbl_reg_plot trp')
        ->join('tbl_reg_plot_details trpd', 'trp.reg_plot_id = trpd.reg_plot_header_id')
        ->join('tbl_property tp', 'trp.property_name = tp.property_id', 'left')
        ->where('trp.deleted', '0')
        ->where('trpd.deleted', '0');

        if ($user_role !='superadmin' && $user_role !='accounts') {
             if (!empty($user_id) ) {
            $user_id = $filter_user_id['0'];
           
            $user_id = explode(',', $user_id);
            
                $merged_user_ids = array_merge($user_id, (array)$user_ids);
                $merged_user_ids = array_filter($merged_user_ids); 
                $this->db->where_in('trp.name_ref_by', $merged_user_ids);
            } 
        } 

    // Apply filter for property_name
    if ($filter_nagar != '') {
        $this->db->where('trp.property_name', $filter_nagar);
    }

    // Apply filter for date range
    if ($filter_date_range != '') {
        $daterange = explode("-", $filter_date_range);
        $from_date = $daterange[0];
        $to_date = $daterange[1];

        // Format the date range into Y-m-d format
        $from_date = join("-", array_reverse(explode("/", $from_date)));
        $to_date = join("-", array_reverse(explode("/", $to_date)));

        $this->db->where('DATE(trp.created_date) >=', $from_date);
        $this->db->where('DATE(trp.created_date) <=', $to_date);
    }

    // Execute the query
    $query = $this->db->get();
    $result = $query->row();

    // Return the total count
    return ($result) ? $result->total_rows : 0;
}


    public function get_property_for_reg($start, $length, $sort, $search_value, $table, $uniq_id, $search_columns, $filter_nagar, $filter_date_range)
    {

        $user_role = $this->session->userdata('role');    
        $user_ids = $this->session->userdata('userid');
        $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);

        $this->db->select('*, trpd.plot_no AS plot_wise_no')
        ->from('tbl_reg_plot trp')
        ->join('tbl_reg_plot_details trpd', 'trp.reg_plot_id = trpd.reg_plot_header_id')
        ->join('tbl_property tp', 'trp.property_name = tp.property_id', 'left')
        ->where('trp.deleted', '0')
        ->where('trpd.deleted', '0');
        if ($user_role != 'superadmin' && $user_role != 'accounts') {
              if (!empty($user_id)  && is_array($user_id)) {
            $user_id = $filter_user_id['0'];
            $user_id = explode(',', $user_id);
                $merged_user_ids = array_merge($user_id, (array)$user_ids);
                $merged_user_ids = array_filter($merged_user_ids); 
                $this->db->where_in('trp.name_ref_by', $merged_user_ids);
            } 
        } 
        if ($filter_nagar != '') {
            $this->db->where('trp.property_name', $filter_nagar);
        }

        if ($filter_date_range != '') {
            $daterange = explode("-", $filter_date_range);
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

            $this->db->where('DATE(trp.created_date) >=', $from_date);
            $this->db->where('DATE(trp.created_date) <=', $to_date);
        }




        $this->db->order_by('reg_plot_id', 'DESC');
        
        if($length != NULL && $start != NULL){
        $this->db->limit($length, $start);
        }
        // $this->db->group_by('reg_plot_id');

        $query = $this->db->get();
        return $query;
    }
    public function total_property_booked($search_value, $table, $uniq_id, $filter_nagar = '', $filter_date_range = '')
    {
        $user_role = $this->session->userdata('role');    
        $user_ids = $this->session->userdata('userid');
        $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);
    
        // Select the count of rows
        $this->db->select('COUNT(*) AS total_rows')
            ->from('tbl_booked_plot tbp')
            ->join('tbl_booked_plot_details tbpd', 'tbp.booked_plot_id = tbpd.booked_plot_header_id')
            ->join('tbl_property tp', 'tbp.property_name = tp.property_id', 'left')
            ->where('tbp.deleted', '0')
            ->where('tbpd.deleted', '0');
    
            if ($user_role !='superadmin' && $user_role !='accounts' ) {
                 if($filter_user_id){
                $user_id = $filter_user_id['0'];
                $user_id = explode(',', $user_id);
                if (!empty($user_id)) {
                    $merged_user_ids = array_merge($user_id, (array)$user_ids);
                    $merged_user_ids = array_filter($merged_user_ids); 
                    $this->db->where_in('tbp.name_ref_by', $merged_user_ids);
                } 
            } 
        }
    
        // Apply filter for property_name
        if ($filter_nagar != '') {
            $this->db->where('tbp.property_name', $filter_nagar);
        }
    
        // Apply filter for date range
        if ($filter_date_range != '') {
            $daterange = explode("-", $filter_date_range);
            $from_date = $daterange[0];
            $to_date = $daterange[1];
    
            // Format the date range into Y-m-d format
            $from_date = join("-", array_reverse(explode("/", $from_date)));
            $to_date = join("-", array_reverse(explode("/", $to_date)));
    
            $this->db->where('DATE(tbp.created_date) >=', $from_date);
            $this->db->where('DATE(tbp.created_date) <=', $to_date);
        }
    
        // Execute the query
        $query = $this->db->get();
        $result = $query->row();
    
        // Return the total count
        return ($result) ? $result->total_rows : 0;
    }
    
    
    public function get_property_booked($start, $length, $sort, $search_value, $table, $uniq_id, $search_columns, $filter_nagar, $filter_date_range)
        {
    
            $user_role = $this->session->userdata('role');    
            $user_ids = $this->session->userdata('userid');
            $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);
    
            $this->db->select('*, tbpd.plot_no AS plot_wise_no')
                ->from('tbl_booked_plot tbp')
                ->join('tbl_booked_plot_details tbpd', 'tbp.booked_plot_id = tbpd.booked_plot_header_id')
                ->join('tbl_property tp', 'tbp.property_name = tp.property_id', 'left')
                ->where('tbp.deleted', '0')
                ->where('tbpd.deleted', '0');

        if ($user_role !='superadmin' && $user_role !='accounts') {
             if($filter_user_id){
            $user_id = $filter_user_id['0'];
            $user_id = explode(',', $user_id);
            if (!empty($user_id)) {
                $merged_user_ids = array_merge($user_id, (array)$user_ids);
                $merged_user_ids = array_filter($merged_user_ids); 
                $this->db->where_in('tbp.name_ref_by', $merged_user_ids);
            } 
        } 
    }
        if ($filter_nagar != '') {
            $this->db->where('tbp.property_name', $filter_nagar);
        }

        if ($filter_date_range != '') {
            $daterange = explode("-", $filter_date_range);
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

            $this->db->where('DATE(tbp.created_date) >=', $from_date);
            $this->db->where('DATE(tbp.created_date) <=', $to_date);
        }




        $this->db->order_by('tbp.booked_plot_id', 'DESC');
        $this->db->limit($length, $start);
        // $this->db->group_by('reg_plot_id');

        $query = $this->db->get();
        return $query;
    }



    //For Dashboard
    public function get_property_booked_dashboard($start, $length, $sort, $search_value, $table, $uniq_id, $search_columns, $filter_nagar, $filter_date_range)
    {

        $user_role = $this->session->userdata('role');    
        $user_ids = $this->session->userdata('userid');
        $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);

        $this->db->select('*')
            ->from('tbl_booked_plot tbp')
            ->where('tbp.deleted', '0');

    if ($user_role !='superadmin' && $user_role !='accounts') {
        if($filter_user_id){
        $user_id = $filter_user_id['0'];
        $user_id = explode(',', $user_id);
        if (!empty($user_id)) {
            $merged_user_ids = array_merge($user_id, (array)$user_ids);
            $merged_user_ids = array_filter($merged_user_ids); 
            $this->db->where_in('tbp.name_ref_by', $merged_user_ids);
        } 
    } 
}
    if ($filter_nagar != '') {
        $this->db->where('tbp.property_name', $filter_nagar);
    }

    if ($filter_date_range != '') {
        $daterange = explode("-", $filter_date_range);
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

        $this->db->where('DATE(tbp.created_date) >=', $from_date);
        $this->db->where('DATE(tbp.created_date) <=', $to_date);
    }




    $this->db->order_by('tbp.booked_plot_id', 'DESC');
    $this->db->limit($length, $start);
    // $this->db->group_by('reg_plot_id');

    $query = $this->db->get();
    return $query;
}


public function get_property_for_reg_dashboard($start, $length, $sort, $search_value, $table, $uniq_id, $search_columns, $filter_nagar, $filter_date_range)
{

    $user_role = $this->session->userdata('role');    
    $user_ids = $this->session->userdata('userid');
    $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);

    $this->db->select('*')
    ->from('tbl_reg_plot trp')
    ->where('trp.deleted', '0');

    if ($user_role != 'superadmin' && $user_role != 'accounts') {
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
    if ($filter_nagar != '') {
        $this->db->where('trp.property_name', $filter_nagar);
    }

    if ($filter_date_range != '') {
        $daterange = explode("-", $filter_date_range);
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

        $this->db->where('DATE(trp.created_date) >=', $from_date);
        $this->db->where('DATE(trp.created_date) <=', $to_date);
    }




    $this->db->order_by('reg_plot_id', 'DESC');
    
    if($length != NULL && $start != NULL){
    $this->db->limit($length, $start);
    }
    // $this->db->group_by('reg_plot_id');

    $query = $this->db->get();
    return $query;
}

public function total_property_booked_dashboard($search_value, $table, $uniq_id, $filter_nagar = '', $filter_date_range = '')
{
    $user_role = $this->session->userdata('role');    
    $user_ids = $this->session->userdata('userid');
    $filter_user_id = $this->common_model->get_staff_hierarchy_ids($user_ids);

    // Select the count of rows
    $this->db->select('COUNT(*) AS total_rows')
        ->from('tbl_booked_plot tbp')
        ->join('tbl_booked_plot_details tbpd', 'tbp.booked_plot_id = tbpd.booked_plot_header_id')
        ->join('tbl_property tp', 'tbp.property_name = tp.property_id', 'left')
        ->where('tbp.deleted', '0')
        ->where('tbpd.deleted', '0');

        if($filter_user_id){
        if ($user_role !='superadmin' && $user_role !='accounts' ) {
            $user_id = $filter_user_id['0'];
            $user_id = explode(',', $user_id);
            if (!empty($user_id)) {
                $merged_user_ids = array_merge($user_id, (array)$user_ids);
                $merged_user_ids = array_filter($merged_user_ids); 
                $this->db->where_in('tbp.name_ref_by', $merged_user_ids);
            } 
        } 
    }

    // Apply filter for property_name
    if ($filter_nagar != '') {
        $this->db->where('tbp.property_name', $filter_nagar);
    }

    // Apply filter for date range
    if ($filter_date_range != '') {
        $daterange = explode("-", $filter_date_range);
        $from_date = $daterange[0];
        $to_date = $daterange[1];

        // Format the date range into Y-m-d format
        $from_date = join("-", array_reverse(explode("/", $from_date)));
        $to_date = join("-", array_reverse(explode("/", $to_date)));

        $this->db->where('DATE(tbp.created_date) >=', $from_date);
        $this->db->where('DATE(tbp.created_date) <=', $to_date);
    }
    $this->db->group_by('tbpd.plot_no');
    // Execute the query
    $query = $this->db->get();
    $result = $query->row();

    // Return the total count
    return ($result) ? $result->total_rows : 0;
}
}
