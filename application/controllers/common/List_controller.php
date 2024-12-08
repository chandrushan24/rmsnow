<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// require_once APPPATH.'libraries/tcpdf/tcpdf.php';
use Mpdf\Mpdf;

class List_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('List_model','list');
        $this->load->model('Billing_receipt_model','billing');
        // $this->load->library('tcpdf');
        require_once FCPATH .'vendor/autoload.php';
        // $this->load->library('Pdf');
    }
    public function index()
	{
        $current_url = $_SERVER['REQUEST_URI'];
        $url_parts = parse_url($current_url);
        $path_segments = explode('/', trim($url_parts['path'], '/'));
        $last_segment = end($path_segments);
        $data = array();
        $title = $last_segment;
        // if($title == 'reg_plot'){
        //     $data['title'] = 'Register Plotss';
        //     $data['page_name'] = $title;
        //     $table_name ='tbl_regplotss';
        //     $order_by ='reg_plots_id';
        // }
       
            $data['title'] = $title;
            $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
            $data['employee_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_staff_info');
        // $data['next_order'] = $this->list->get_next_order($table_name , $data['title'],$order_by);
        // $data['record_list'] = $this->list->get_all_data($table_name , $data['title'],$order_by);
		$this->render_page('admin/list_page',$data); 
	}


    public function view_template()
	{
        
        $data = array();
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $data['company'] = $this->common_model->get_single_date('company','comid',$this->session->userdata('comp_id'));

        if($title == 'Property'){
            $data['title'] = 'Nagar Profile';
            $data['get_prop'] = $this->common_model->get_single_date('tbl_property','property_id',$id);
            $data['get_plot_details'] = $this->common_model->getall_record_info_with_deletedCheck_with_id_array('tbl_plot_details','property_id',$id);
        }
        
        if($title == 'reg_plot'){
            $data['title'] = 'Register Plot';
            $data['get_prop'] = $this->common_model->get_single_date('tbl_reg_plot','reg_plot_id',$id);
            $data['property_name'] = $this->common_model->get_single_date('tbl_property','property_id',$data['get_prop']['property_name']);
            $data['refer_by'] = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$data['get_prop']['name_ref_by']);
            $data['get_plot_details'] = $this->common_model->getall_record_info_with_deletedCheck_with_id_array('tbl_reg_plot_details','reg_plot_header_id',$id);
        }

        if($title == 'booked_plot'){
            $data['title'] = 'Booked Plot';
            $data['get_prop'] = $this->common_model->get_single_date('tbl_booked_plot','booked_plot_id',$id);
            $data['property_name'] = $this->common_model->get_single_date('tbl_property','property_id',$data['get_prop']['property_name']);
            $data['refer_by'] = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$data['get_prop']['name_ref_by']);
            $data['get_plot_details'] = $this->common_model->getall_record_info_with_deletedCheck_with_id_array('tbl_booked_plot_details','booked_plot_header_id',$id);

        }
        if($title == 'staff_info'){
            $data['title'] = 'Staff Info';
            $data['get_prop'] = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$id);
            $data['head_off'] = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$data['get_prop']['head_officer_id']);
            $data['header_det'] = $this->common_model->get_single_date('userrights_header','empid',$id);
            $data['role_name'] = $this->common_model->get_single_date('tbl_role','role_id',$data['get_prop']['role']);
            $data['customer_image']    = $this->common_model->get_media_img('passport_size_photo',$id,'','');
            // echo '<pre>';print_r($data['customer_image']);die();
            $data_arr =array();
            
            if(!empty($data['role_name']['role_order']) && $data['role_name']['role_order'] != '0'){
                $id_2 = $id;

               for($i=0 ; $i <= $data['role_name']['role_order'] ; $i++){

                $data_1 = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$id_2);
                if(!empty($data_1)){
                $id_2 = $data_1['head_officer_id'];
                $role_1 = $this->common_model->get_single_date('tbl_role','role_id',$data_1['role']);
                $role_name_1 = '';
                if(!empty($role_1)){
                    $role_name_1 = $role_1['role_name'];
                }
                $data_arr[] = $data_1['employee_name'] .' / '. $role_name_1;
            }
               
               }
            }

            $data['flow_chart'] = array_reverse($data_arr);
            $data['last_index'] = count($data['flow_chart'])  - 1; 
        }

        if($title == 'billing_receipt'){
            $data['title'] = 'Billing Receipt';
            $data['get_prop'] = $this->common_model->get_single_date('tbl_billing_receipt','billing_receipt_id',$id);
            $data['property_name'] = $this->common_model->get_single_date('tbl_property','property_id',$data['get_prop']['property_name']);
            $data['customer_name'] = $this->common_model->get_single_date('tbl_customer_info','customer_info_id',$data['get_prop']['customer_name']);
            $data['get_plot_details'] = $this->billing->get_billling_details($data['get_prop']['sno_customer_id']);
            if(!empty($data['get_plot_details'])){
            $data['head_off'] = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$data['get_plot_details'][0]['name_ref_by']);
            }
        }

        
		$results = $this->load->view('admin/view_template',$data); 
        echo json_encode($results);
	}

    function get_list_data(){
        $draw = $this->input->get('draw');
        $start = $this->input->get('start');
        $length = $this->input->get('length');
        $search_value = $this->input->get('search[value]');
        $col = 0;
        $sort = "";
        $page_title = $this->input->get('title');
        $filter_nagar = $this->input->get('nager');
        $filter_date_range = $this->input->get('daterange');
        $search_value = $this->input->get('search')['value']; 
        $table='';
        $uniq_id = '';
        $search_columns = array();

		$user_id = $this->session->userdata('userid');
		$user_role = $this->session->userdata('role');

        if(!empty($page_title) && $page_title == 'Property'){
        $table='tbl_property';
        $uniq_id = 'property_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();

        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id); 
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns);
        
        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $count = $this->common_model->general_where_select_result_with_two_cond(
                'tbl_plot_details',
                'property_id',
                $val->property_id,
                'deleted',
                '0'
            );
            $user_role = $this->session->userdata('role'); 
            $actions = '';
            if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') {
                $actions = 
                    '<a class="btn btn-success btn-sm" data-id="' . $val->property_id . '" href="' . base_url() . 'Edit_' . $page_title . '/' . $val->property_id . '">
                        <i class="ri-edit-box-fill"></i>
                    </a> ' .
                    '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record(' . $val->property_id . ')">
                        <i class="ri-delete-bin-fill"></i>
                    </button>';
            }
        
            $data[] = array(
                $no++,
                $val->property_id,
                $val->property_name,
                $val->district,
                $val->taluk_name,
                $val->village_town,
                (!empty($count) ? count($count) : 0),
                '<button type="button" class="btn btn-primary btn-sm confirm-color view_btn" onclick="view_record(\'' . $page_title . '\', ' . $val->property_id . ')" ><i class="ri-eye-line"></i></button>'.' '.$actions,
            '',
            );
        }
        

    }else if(!empty($page_title) && $page_title == 'reg_plot'){

        if($filter_nagar == '' &&  $filter_date_range == ''){

        $table='tbl_property';
        $uniq_id = 'property_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();

    

        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id, "", "", "");
        $data1 = $this->list->get_property($start, $length, $sort, $search_value, $table, $uniq_id, $search_columns, $filter_nagar, $filter_date_range, "", "", "");
        
        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
        $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val->property_id,'deleted','0');
        $count_reg = $this->common_model->get_regiter_plot_count($val->property_id);
        // $count_book = $this->common_model->get_Booked_plot_count($val->property_id);
        // $count_unreg = $this->common_model->get_Unreg_plot_count($val->property_id);


        $data[] = array(
            $no++,
            $val->property_id,
            $val->property_name,
            $val->village_town,
            (!empty($count_total) ? count($count_total) : 0),
            (!empty($count_reg) ? count($count_reg) : 0),
            // (!empty($count_book) ? count($count_book) : 0),
            // (!empty($count_unreg) ? count($count_unreg) : 0),
            '',
        );
        }
    }else{
        $table='tbl_reg_plot';
        $uniq_id = 'reg_plot_id';
        $status ='sold';
        $search_columns = $this->db->list_fields($table);
		$total_data1 = $this->list->total_property_for_reg($search_value,$table,$uniq_id,$filter_nagar,$filter_date_range);
        $data1 = $this->list->get_property_for_reg($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns,$filter_nagar,$filter_date_range);
        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
        $user_role = $this->session->userdata('role'); 
        $actions = '';
        if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') {
            $actions = 
                '<a class="btn btn-success btn-sm" data-id="' . $val->reg_plot_id . '" href="' . base_url() . 'Edit_' . $page_title . '/' . $val->reg_plot_id . '" >
                    <i class="ri-edit-box-fill"></i>
                </a> ' .
                '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record(' . $val->reg_plot_id . ')">
                    <i class="ri-delete-bin-fill"></i>
                </button>';
        }
        $data[] = array(
            $no++,
            $val->reg_plot_id,
            date('d/m/Y',strtotime($val->created_date)),
            $val->property_name,
            $val->plot_wise_no,
            $val->buyer_name, 
            '<button type="button" class="btn btn-primary btn-sm confirm-color view_btn" onclick="view_record(\'' . $page_title . '\', ' . $val->reg_plot_id . ')" ><i class="ri-eye-line"></i></button>'.' '.$actions,
            '',
            
        );
    }
    }

    }else if(!empty($page_title) && $page_title == 'unreg_plot'){

        if($filter_nagar == ''){

            $table='tbl_property';
            $uniq_id = 'property_id';
            $search_columns = $this->db->list_fields($table);
            // echo '<pre>';print_r($search_columns);die();
            $total_data1 = $this->list->total_property($search_value,$table,$uniq_id);
            $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns);
            
            $data = array();
            $no = 1; 
            foreach ($data1->result() as $val) {
            $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val->property_id,'deleted','0');
            
            $table2='tbl_plot_details';
            $uniq_id2 = 'plot_detail_id';
            $status2 = 'UnSold';
            $query = $this->list->get_property_details('', '',$sort,$search_value,$table2,$uniq_id2,$search_columns,$status2,$val->property_id);
            $count_unreg = $query->result_array();

            //  echo '<pre>'; print_r($count_unreg);die();
            $data[] = array(
                $no++,
                $val->property_id,
                $val->property_name,
                $val->village_town,
                (!empty($count_total) ? count($count_total) : 0),
                (!empty($count_unreg) ? count($count_unreg) : 0),
            );
            }
        }else{

        $table='tbl_plot_details';
        $uniq_id = 'plot_detail_id';
        $status = 'UnSold';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property_details($search_value,$table,$uniq_id,$status);
        $data1 = $this->list->get_property_details($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns,$status,$filter_nagar);
        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $query = $this->db->query("SELECT property_name FROM tbl_property WHERE deleted = 0 AND property_id = ?", array($val->property_id));
            $property = $query->row();
            
            // Check if the property was found
            if ($property) {
                $property_name = $property->property_name;
            } else {
                $property_name = 'Unknown Property';
            }
            $user_role = $this->session->userdata('role'); 
        $actions = '';
        if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') {
            $actions = 
                '<a class="btn btn-success btn-sm" data-id="'.$val->plot_detail_id .'" href="'.base_url().'Add_reg_plots/'.$val->plot_detail_id.'" style="border-radius: 25px;" >Register Plot</a>'.' '.
            '<a class="btn btn-danger btn-sm" data-id="'.$val->plot_detail_id .'" href="'.base_url().'Add_booked_plots/'.$val->plot_detail_id.'" style="border-radius: 25px;">Book Plot</a>';
        }
        $data[] = array(
            $no++,
            $val->plot_detail_id,
            $property_name,
            $val->plot_no, 
            $val->plot_extension,
            $actions
        );
        }
     }

    }else if(!empty($page_title) && $page_title == 'booked_plot'){

        if($filter_nagar == '' &&  $filter_date_range == ''){

            $table='tbl_property';
            $uniq_id = 'property_id';
            $search_columns = $this->db->list_fields($table);
            $total_data1 = $this->list->total_property($search_value,$table,$uniq_id,$filter_user_id ='');
            $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns,$filter_user_id ='');
            
            $data = array();
            $no = 1; 
            foreach ($data1->result() as $val) {
            $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val->property_id,'deleted','0');
            $count_book = $this->common_model->get_Booked_plot_count($val->property_id);
            $user_role = $this->session->userdata('role'); 
            $actions = '';
                
            $data[] = array(
                $no++,
                $val->property_id,
                $val->property_name,
                $val->village_town,
                (!empty($count_total) ? count($count_total) : 0),
                (!empty($count_book) ? count($count_book) : 0),
                '',
            );
            }
        }else{
            $table='tbl_booked_plot';
            $uniq_id = 'booked_plot_id';
            $status ='Booked';
            $search_columns = $this->db->list_fields($table);
            $total_data1 = $this->list->total_property_booked($search_value,$table,$uniq_id);
            $data1 = $this->list->get_property_booked($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns,$filter_nagar,$filter_date_range);
    
            $data = array();
            $no = 1; 
            foreach ($data1->result() as $val) {    
                $user_role = $this->session->userdata('role'); 
                $actions = '';
                if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') {
                $actions = 
               '<a class="btn btn-success btn-sm" data-id="'.$val->booked_plot_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->booked_plot_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
               '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->booked_plot_id.')"><i class="ri-delete-bin-fill"></i></button>';
                }  
                $data[] = array(
                    $no++,
                    $val->booked_plot_id,
                    date('d/m/Y',strtotime($val->created_date)),
                    $val->property_name,
                    $val->plot_wise_no,
                    $val->buyer_name,
                    '<button type="button" class="btn btn-primary btn-sm confirm-color view_btn" onclick="view_record(\'' . $page_title . '\', ' . $val->booked_plot_id . ')" ><i class="ri-eye-line"></i></button>'.' '.$actions,
                );
            }
        }

    }else if(!empty($page_title) && $page_title == 'customer_info'){
        $table='tbl_customer_info';
        $uniq_id = 'customer_info_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id);
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns);
        
        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
       
         $address = '';

         if($val->street_address !=''){
         $address .= $val->street_address .',<br>';
         }

         if($val->village_town !=''){
            $address .= $val->village_town .',<br>';
            }

            if($val->taluk_name !=''){
                $address .= $val->taluk_name .',<br>';
                }

                if($val->district !=''){
                    $address .= $val->district .',<br>';
                    }

                    if($val->district !=''){
                        $address .= $val->pincode;
                    }

        $data[] = array(
            $no++,
            $val->customer_info_id,
            $val->buyer_name,
            $address,
            $val->phone_number_1,
            '<a class="btn btn-success btn-sm" data-id="'.$val->customer_info_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->customer_info_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
            '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->customer_info_id.')"><i class="ri-delete-bin-fill"></i></button>',
        );
        }

    }else if(!empty($page_title) && $page_title == 'staff_info'){
        $table='tbl_staff_info';
        $uniq_id = 'staff_info_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id);
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns);

        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $query = $this->db->query("SELECT role_name FROM tbl_role WHERE role_id = ?", array($val->role));
            $roles = $query->row();
        $data[] = array(
            $no++,
            $val->staff_info_id,
            $val->employee_name,
            $val->father_name,
            $roles->role_name,
            '<a class="btn btn-success btn-sm" data-id="'.$val->staff_info_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->staff_info_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
            '<button type="button" class="btn btn-primary btn-sm confirm-color view_btn" onclick="view_record(\'' . $page_title . '\', ' . $val->staff_info_id . ')" ><i class="ri-eye-line"></i></button>'.' '.
            '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->staff_info_id.')"><i class="ri-delete-bin-fill"></i></button>',
        );
        }

    }else if(!empty($page_title) && $page_title == 'add_offer'){
        $table='tbl_add_offer';
        $uniq_id = 'add_offer_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id);
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns);

        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val->property_name));
            $property = $query->row();
            
            // Check if the property was found
            if ($property) {
                $property_name = $property->property_name;
            } else {
                $property_name = 'Unknown Property';
            }
            $user_role = $this->session->userdata('role'); 
        $actions = '';
        if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') {
            $actions = 
               '<a class="btn btn-success btn-sm" data-id="'.$val->add_offer_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->add_offer_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
               '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->add_offer_id.')"><i class="ri-delete-bin-fill"></i></button>';
        }
        $data[] = array(
            $no++,
            $val->add_offer_id,
            $property_name,
            $val->total_target,
            $val->offer,
            $actions
        );
        }

    }else if(!empty($page_title) && $page_title == 'offer_incentives'){
        $table='tbl_offer_incentives';
        $uniq_id = 'offer_incentives_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id);
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns);

        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val->property_name));
            $property = $query->row();
            
            // Check if the property was found
            if ($property) {
                $property_name = $property->property_name;
            } else {
                $property_name = 'Unknown Property';
            }
            $actions = '';
            if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') {
                $actions = 
               '<a class="btn btn-success btn-sm" data-id="'.$val->offer_incentives_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->offer_incentives_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
               '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->offer_incentives_id.')"><i class="ri-delete-bin-fill"></i></button>';
            }
        $data[] = array(
            $no++,
            $val->offer_incentives_id,
            $property_name,
            $val->total_values,
            $val->incentive,
            $actions
        );
        }

    }else if(!empty($page_title) && $page_title == 'salary_advance'){
        $table='tbl_salary_advance';
        $uniq_id = 'adv_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id);
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns);

        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $sql = $this->db->query("SELECT employee_name FROM tbl_staff_info WHERE staff_info_id = ?", array($val->employee_name));
            $employee_name = $sql->row();
            if ($employee_name) {
                $employee = $employee_name->employee_name;
            } else {
                $employee = 'Unknown Employee Nmae';
            }
            $date = new DateTime($val->adv_date);
            $adv_date = $date->format('d/m/Y');
        $data[] = array(
            $no++,
            $val->adv_id,
            $adv_date,
            $employee,
            $val->employee_id,
            $val->advance_amount,
            '<a class="btn btn-success btn-sm" data-id="'.$val->adv_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->adv_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
            '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->adv_id.')"><i class="ri-delete-bin-fill"></i></button>',
        );
        }

    }else if(!empty($page_title) && $page_title == 'employee_salary'){
        $filter_employee = $this->input->get('employee_name_filter');
        $filter_sal_date = $this->input->get('daterange');
        $filter_str = '';
        if($filter_employee !='' || $filter_sal_date !=''){
        $filter_str =$filter_employee.','.$filter_sal_date;
        }
        $table='tbl_employee_salary';
        $uniq_id = 'emp_salary_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id);
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns,$filter_str);

        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $sql = $this->db->query("SELECT employee_name FROM tbl_staff_info WHERE staff_info_id = ?", array($val->employee_name));
            $employee_name = $sql->row();
            if ($employee_name) {
                $employee = $employee_name->employee_name;
            } else {
                $employee = 'Unknown Employee Nmae';
            }

        $data[] = array(
            $no++,
            $val->emp_salary_id,
            date('d/m/Y',strtotime($val->created_date)),
            $employee,
            $val->advance_amount,
            $val->balance_amount,
            '<a class="btn btn-success btn-sm" data-id="'.$val->emp_salary_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->emp_salary_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
            '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->emp_salary_id.')"><i class="ri-delete-bin-fill"></i></button>',
        );
        }

    }else if(!empty($page_title) && $page_title == 'expense'){
        $filter_nager = $this->input->get('nager');
        $filter_date = $this->input->get('daterange');
        $filter_str = '';
        if($filter_nager !='' || $filter_date !=''){
        $filter_str =$filter_nager.','.$filter_date;
        }

        $table='tbl_expense_details';
        $uniq_id = 'expense_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id);
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns,$filter_str);

        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val->property_name));
            $property = $query->row();
            
            // Check if the property was found
            if ($property) {
                $property_name = $property->property_name;
            } else {
                $property_name = 'Unknown Property';
            }
            $sql = $this->db->query("SELECT expen_name FROM tbl_expenses WHERE expen_id = ?", array($val->expense_type));
            $expense = $sql->row();
            if ($expense) {
                $expense_type = $expense->expen_name;
            } else {
                $expense_type = 'Unknown Expense Type';
            }
        $data[] = array(
            $no++,
            $val->expense_id,
            date('d/m/Y',strtotime($val->created_date)),
            $property_name,
            $expense_type,
            $val->expense_value,
            '<a class="btn btn-success btn-sm" data-id="'.$val->expense_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->expense_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
            '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->expense_id.')"><i class="ri-delete-bin-fill"></i></button>',
        );
        }

    }
    else if(!empty($page_title) && $page_title == 'billing_receipt'){
      if($filter_nagar == '' &&  $filter_date_range == ''){
        $table='tbl_billing_receipt';
        $uniq_id = 'billing_receipt_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id); 
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns);

        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val->property_name));
            $property = $query->row();

            $query1 = $this->db->query("SELECT buyer_name FROM tbl_customer_info WHERE customer_info_id = ?", array($val->customer_name));
            $customer = $query1->row();
            if ($customer) {
                $customer_name = $customer->buyer_name;
            } else {
                $customer_name = '';
            }
            // Check if the property was found
            if ($property) {
                $property_name = $property->property_name;
            } else {
                $property_name = 'Unknown Property';
            }
        $data[] = array(
            $no++,
            $val->billing_receipt_id,
            date('d/m/Y',strtotime($val->created_date)),
            $property_name,
            $val->company_name,
            $customer_name,
            $val->mode_payment_value,
            '<a class="btn btn-success btn-sm" data-id="'.$val->billing_receipt_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->billing_receipt_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
            '<button type="button" class="btn btn-primary btn-sm confirm-color view_btn" onclick="view_record(\'' . $page_title . '\', ' . $val->billing_receipt_id . ')" ><i class="ri-eye-line"></i></button>'.' '.
            '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->billing_receipt_id.')"><i class="ri-delete-bin-fill"></i></button>',
        );
        }
    }else{
        $table='tbl_billing_receipt';
        $uniq_id = 'billing_receipt_id';
        $search_columns = $this->db->list_fields($table);
        // echo '<pre>';print_r($search_columns);die();
        $total_data1 = $this->list->total_property($search_value,$table,$uniq_id);
        $data1 = $this->list->get_property($start, $length,$sort,$search_value,$table,$uniq_id,$search_columns,$filter_nagar,$filter_date_range);
        $data = array();
        $no = 1; 
        foreach ($data1->result() as $val) {
            $query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val->property_name));
            $property = $query->row();

            $query1 = $this->db->query("SELECT buyer_name FROM tbl_customer_info WHERE customer_info_id = ?", array($val->customer_name));
            $customer = $query1->row();
            if ($customer) {
                $customer_name = $customer->buyer_name;
            } else {
                $customer_name = '';
            }
            // Check if the property was found
            if ($property) {
                $property_name = $property->property_name;
            } else {
                $property_name = 'Unknown Property';
            }
        $data[] = array(
            $no++,
            $val->billing_receipt_id,
            date('d/m/Y',strtotime($val->created_date)),
            $property_name,
            $val->company_name,
            $customer_name,
            $val->mode_payment_value,
            '<a class="btn btn-success btn-sm" data-id="'.$val->billing_receipt_id.'" href="'.base_url().'Edit_'.$page_title.'/'.$val->billing_receipt_id.'" ><i class="ri-edit-box-fill"></i></a>'.' '.
            '<button type="button" class="btn btn-primary btn-sm confirm-color view_btn" onclick="view_record(\'' . $page_title . '\', ' . $val->billing_receipt_id . ')" ><i class="ri-eye-line"></i></button>'.' '.
            '<button type="button" class="btn btn-danger btn-sm confirm-color" onclick="delete_record('.$val->billing_receipt_id.')"><i class="ri-delete-bin-fill"></i></button>',
        );
        }
    }

    }else{
       $total_data1 =''; 
       $data =''; 
    }
      

        $output = array(
        'draw' => $draw,
        'recordsTotal' => $total_data1,
        'recordsFiltered' => $total_data1, // Adjust this if you implement filtering logic
        'data' => $data
        );

        // Send JSON response to DataTables
        echo json_encode($output);
        exit();
    }
        
    public function delete_list_data() {
        $id = $this->input->post('id');
        $page_title = $this->input->post('title');

        // Debugging: Output received POST data
        log_message('debug', 'delete_list_data - ID: ' . $id . ' Title: ' . $page_title);

        $table = '';
        $uniq_id ='';
        
        if(!empty($page_title) && $page_title == 'Nager/Garden Profile'){
            $table='tbl_property';
            $uniq_id = 'property_id';
        }else if(!empty($page_title) && $page_title == 'Registered Plots'){
            // $table='tbl_reg_plot';
            // $uniq_id = 'reg_plot_id';

            // $this->db->select("reg_plot_id, property_name, plot_no, customer_id, s_no, total_plot_price, (LENGTH(plot_no) - LENGTH(REPLACE(plot_no, ',', '')) + 1) AS plot_count,name_ref_by");
            // $this->db->where($uniq_id, $id);
            // $this->db->from('tbl_reg_plot');
            // $query = $this->db->get();
            // $check_register = $query->row_array();

            $table = 'tbl_reg_plot';
$uniq_id = 'reg_plot_id';

$columns = [
    'reg_plot_id',
    'property_name',
    'plot_no',
    'customer_id',
    's_no',
    'total_plot_price',
    '(LENGTH(plot_no) - LENGTH(REPLACE(plot_no, ",", "")) + 1) AS plot_count',
    'name_ref_by'
];

// Build the query
$this->db->select(implode(', ', $columns))
         ->from($table)
         ->where($uniq_id, $id);

$query = $this->db->get();
$check_register = $query->row_array();


            if ($check_register) {

                    // check for billing_reciept by tbl_reg_plot->s_no
                    $this->db->select('bill_id, sno_customer_id');
                    $this->db->where(['sno_customer_id'=> $check_register['s_no'], 'deleted' =>0 ]);
                    $this->db->from('tbl_billing_receipt');
                    $receipt_query = $this->db->get();

                    if($receipt_query->num_rows() > 0)
                    {
                        $response = array('error' => "Already Billed.");
                        echo json_encode($response);
                        return false;
                    }

                $this->db->select('booked_plot_id, property_name, plot_no, customer_id');
                $this->db->where('property_name', $check_register['property_name']);
                $this->db->where('plot_no', $check_register['plot_no']);
                $this->db->where('customer_id', $check_register['customer_id']);
                $this->db->from('tbl_booked_plot');
                $query = $this->db->get();
                $result = $query->result_array();
            
                if ( $query->num_rows() > 0) {
                    $this->db->where('property_id', $result[0]['property_name']);
                    $this->db->where('plot_no', $result[0]['plot_no']);
                    $this->db->set('status', 'Booked');
                    $updated = $this->db->update('tbl_plot_details');
                } else {
                    // $this->db->where('property_id', $check_register['property_name']);
                    // $this->db->where('plot_detail_id', $check_register['plot_no']);
                    // $this->db->set('status', 'UnSold');
                    // $updated = $this->db->update('tbl_plot_details');

                    // Get the plot_no value from $check_register
                    $plot_no = $check_register['plot_no'];

                    // Check if it contains multiple values
                    if (strpos($plot_no, ',') !== false) {
                    // If it's a comma-separated string, convert it to an array
                    $plot_ids = explode(',', $plot_no);
                    } else {
                    // If it's a single value, make it an array with one element
                    $plot_ids = [$plot_no];
                    }

                    // Use where_in for dynamic handling of one or more plot_detail_id values
                    $this->db->where('property_id', $check_register['property_name']);
                    $this->db->where_in('plot_detail_id', $plot_ids);
                    $this->db->set('status', 'UnSold');
                    $updated = $this->db->update('tbl_plot_details');


                    //less the sold status to -minus after deleting

                    $plot_details_calculate_amount = $check_register['plot_count'] * $check_register['total_plot_price'];
                 //flow chart logic 
                 $get_old_refer_by = $this->common_model->get_single_date('tbl_reg_plot','reg_plot_id', $id);
                
                 $update_deleted = array('deleted' => '1');

                 $get_old_staff = $this->db->where_in('staff_info_id', $get_old_refer_by['name_ref_by'])->get('tbl_staff_info')->result_array();
                    
                 if(!empty($get_old_staff)){
                     foreach($get_old_staff as $old_datas){
                         $update_staff_info = array(
                            'total_plot_sold' => abs(abs($old_datas['total_plot_sold']) - $check_register['plot_count']),
                          );
                          
                          $this->db->where('staff_info_id', $old_datas['staff_info_id'])->update('tbl_staff_info',$update_staff_info);
                     }
                     
                 }
                 

                 $this->common_model->update_info('employee_salary_calculation',$update_deleted,'reg_plot_id', $id);

                 $data_get_prop = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$check_register['name_ref_by']);
                 if(!empty($data_get_prop)){
                 $data_head_off = $this->common_model->get_single_date('tbl_staff_info','staff_info_id',$data_get_prop['head_officer_id']);
                 $data_role_name = $this->common_model->get_single_date('tbl_role','role_id',$data_get_prop['role']);
                 $data_arr =array();
             
                 if(!empty($data_role_name['role_order']) && $data_role_name['role_order'] != '0'){
                     $id_2 = $check_register['name_ref_by'];
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
           
             }

                }
            
                log_message('debug', 'delete_list_data - Deleting property with ID: ' . $id);
                $this->db->where($uniq_id, $id);
                $deleted = $this->db->delete($table);

                $table='tbl_reg_plot_details';
                $uniq_id = 'reg_plot_header_id';
                $this->db->where($uniq_id, $id);
                $deleted = $this->db->delete($table);

                log_message('debug', 'delete_list_data - Deletion status for table ' . $table . ': ' . ($deleted ? 'Success' : 'Failure'));
            
                $response = array('success' => (bool)$deleted);
                echo json_encode($response);
            } else {
                log_message('error', 'delete_list_data - No matching registration record found for ID: ' . $id);
                $response = array('success' => false, 'message' => 'No matching record found.');
                echo json_encode($response);
            }

            // Registered Plots
        }else if(!empty($page_title) && $page_title == 'Unregistered Plots'){
            $table='tbl_unreg_plot';
            $uniq_id = 'unreg_plot_id';
        }else if(!empty($page_title) && $page_title == 'Booked Plots'){
            $table = 'tbl_booked_plot';
            $uniq_id = 'booked_plot_id';
            
            $this->db->select('booked_plot_id, property_name, plot_no, customer_id');
            $this->db->where($uniq_id, $id);
            $this->db->from($table);
            $query = $this->db->get();
            $check_book = $query->row_array();
            
            if ($check_book) {

                    $this->db->select('reg_plot_id, property_name, plot_no, customer_id, s_no');
                    $this->db->where(["plot_no" => $check_book['plot_no'], "property_name" => $check_book['property_name']]);
                    $this->db->from('tbl_reg_plot');
                    $booking_query = $this->db->get();
                    $booking_result = $query->row_array();

                    if($booking_query->num_rows() > 0)
                    {
                        $response = array('error' => "Already Plot Registered.");
                        echo json_encode($response);
                        return false;
                    }

                $this->db->select('booked_plot_id, property_name, plot_no, customer_id');
                $this->db->where('property_name', $check_book['property_name']);
                $this->db->where('plot_no', $check_book['plot_no']);
                $this->db->where('customer_id', $check_book['customer_id']);
                $this->db->from('tbl_booked_plot');
                $query = $this->db->get();
                $result = $query->result_array();
            
                if ( $query->num_rows() > 0) {
                    $this->db->where('property_id', $result[0]['property_name']);
                    $this->db->where('plot_no', $result[0]['plot_no']);
                    $this->db->set('status', 'UnSold');
                    $updated = $this->db->update('tbl_plot_details');
                } else {
              
                    // Get the plot_no value from $check_register
                    $plot_no = $check_book['plot_no'];

                    // Check if it contains multiple values
                    if (strpos($plot_no, ',') !== false) {
                    // If it's a comma-separated string, convert it to an array
                    $plot_ids = explode(',', $plot_no);
                    } else {
                    // If it's a single value, make it an array with one element
                    $plot_ids = [$plot_no];
                    }

                    // Use where_in for dynamic handling of one or more plot_detail_id values
                    $this->db->where('property_id', $check_book['property_name']);
                    $this->db->where_in('plot_detail_id', $plot_ids);
                    $this->db->set('status', 'UnSold');
                    $updated = $this->db->update('tbl_plot_details');
                }
            
                $this->db->where($uniq_id, $id);
                $deleted = $this->db->delete($table);

                $table='tbl_booked_plot_details';
                $uniq_id = 'booked_plot_header_id';
                $this->db->where($uniq_id, $id);
                $deleted = $this->db->delete($table);

                log_message('debug', 'delete_list_data - Deletion status for ID ' . $id . ': ' . ($deleted ? 'Success' : 'Failure'));
            
                $response = array('success' => (bool)$deleted);
            } else {
                log_message('error', 'delete_list_data - No matching booked plot record found for ID: ' . $id);
                $response = array('success' => false, 'message' => 'No matching record found.');
            }
            
            echo json_encode($response);

        }else if(!empty($page_title) && $page_title == 'Customer Details'){
            $table='tbl_customer_info';
            $uniq_id = 'customer_info_id';

            $this->delete_data($table, $uniq_id, $id);
         }else if(!empty($page_title) && $page_title == 'Staff Details'){
            $table='tbl_staff_info';
            $uniq_id = 'staff_info_id';

            $this->delete_data($table, $uniq_id, $id);
         }else if(!empty($page_title) && $page_title == 'Add Offer'){
            $table='tbl_add_offer';
            $uniq_id = 'add_offer_id';

            $this->delete_data($table, $uniq_id, $id);
         }else if(!empty($page_title) && $page_title == 'Offer Incentives'){
            $table='tbl_offer_incentives';
            $uniq_id = 'offer_incentives_id';

            $this->delete_data($table, $uniq_id, $id);
         }else if(!empty($page_title) && $page_title == 'Salary Advance'){
            $table='tbl_salary_advance';
            $uniq_id = 'adv_id';

            $this->delete_data($table, $uniq_id, $id);
         }else if(!empty($page_title) && $page_title == 'Employee Salary'){
            $table='tbl_employee_salary';
            $uniq_id = 'emp_salary_id';

            $this->delete_data($table, $uniq_id, $id);
         }else if(!empty($page_title) && $page_title == 'Expense Details'){
            $table='tbl_expense_details';
            $uniq_id = 'expense_id';

            $this->delete_data($table, $uniq_id, $id);
         }else if(!empty($page_title) && $page_title == 'Customer Receipt'){
            $table='tbl_billing_receipt';
            $uniq_id = 'billing_receipt_id';

            $this->delete_data($table, $uniq_id, $id);
         }

    }

    function delete_data($table, $uniq_id, $id)
    {

           if($table !='' && $uniq_id != ''){
            log_message('debug', 'delete_list_data - Deleting property with ID: ' . $id);
            $this->db->set('deleted', '1');
            $this->db->where($uniq_id, $id);
            $updated = $this->db->update($table);
            log_message('debug', 'delete_list_data - Update status: ' . $updated);
            $response = array('success' => (bool)$updated);
            echo json_encode($response);
        } else {
           
            log_message('debug', 'delete_list_data - Invalid title: ' . $page_title);

            $response = array('success' => false, 'message' => 'Invalid title');
            echo json_encode($response);
        }

    }



   //Export and Print

   public function export_list_pdf_print($title = NULL,$type=NULL,$filter=NULL) {
    $data = array();
    $data['type'] = $type;
    $filter_1 = '';
    if(strpos($filter,',') !== false){
    $exploding  = explode(',',$filter);
    $filter = $exploding[0];
    $data['filter'] = $filter;
    if($exploding[1] !=''){
        $filter_1 =str_replace(".", "/", $exploding[1]);
    }
    
    }else{
        $data['filter'] = $filter;
    }
    
    if (!empty($title) && $title == 'Property') {
        $title = 'Nagar Profile';
       $data['details'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
       $data['title'] = $title;
    }else  if (!empty($title) && $title == 'reg_plot') {
        $title = 'Registered Plots';
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0' || $filter_1 !=''){
            $data['details'] = $this->common_model->general_where_select_result_with_three_cond_export('tbl_reg_plot','deleted','0','property_name',$filter,'created_date',$filter_1);
        }else{
       $data['details'] = '';

        }
       $data['title'] = $title;
    }else  if (!empty($title) && $title == 'unreg_plot') {
        $title = 'Unregister Plots';
        $table='tbl_plot_details';
        $uniq_id = 'plot_detail_id';
        $status = 'UnSold';
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'){
        $data_1 = $this->list->get_property_details(NULL,NULL,NULL,NULL,$table,$uniq_id,NULL,$status,$filter);
        $data['details'] = $data_1->result_array();
        }else{
        $data['details']='';
        }
    // print_r($data['details']);die();
       $data['title'] = $title;
    }else  if (!empty($title) && $title == 'booked_plot') {
        $title = 'Booked Plots';
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'  || $filter_1 !=''){
       $data['details'] = $this->common_model->general_where_select_result_with_three_cond_export('tbl_booked_plot','deleted','0','property_name',$filter,'created_date',$filter_1);

        }else{
        $data['details']='';
        }

       $data['title'] = $title;
    
    }else  if (!empty($title) && $title == 'employee_salary') {
        $title = 'Staff Salary Info';
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0' || $filter_1 !=''){
            $data['details'] = $this->common_model->general_where_select_result_with_three_cond_export('tbl_employee_salary','deleted','0','employee_name',$filter,'created_date',$filter_1);
        }else{
            $data['details'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_employee_salary');
        }
       $data['title'] = $title;
    
    }else  if (!empty($title) && $title == 'staff_info') {
        $title = 'Staff Info';
       $data['details'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_staff_info');
       $data['title'] = $title;
    
    }else  if (!empty($title) && $title == 'billing_receipt') {
        $title = 'Customer Receipt';
       $data['title'] = $title;
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'  || $filter_1 !=''){
            $data['details'] = $this->common_model->general_where_select_result_with_three_cond_export('tbl_billing_receipt','deleted','0','property_name',$filter,'created_date',$filter_1);
             }else{
                $data['details'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_billing_receipt');
             }     
    }else  if (!empty($title) && $title == 'expense') {
        $title = 'Expense Details';
       $data['title'] = $title;
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'  || $filter_1 !=''){
            $data['details'] = $this->common_model->general_where_select_result_with_three_cond_export('tbl_expense_details','deleted','0','property_name',$filter,'created_date',$filter_1);
             }else{
                $data['details'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_expense_details');
             }     
    }else  if (!empty($title) && $title == 'customer_info') {
        $title = 'Customer Details';
       $data['title'] = $title;
                $data['details'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_customer_info');
    }
    else  if (!empty($title) && $title == 'salary_advance') {
        $title = 'Salary Advance Details';
       $data['title'] = $title;
                $data['details'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_salary_advance');
    }

   

    if ($type === 'excel') {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        if (!empty($title) && $title == 'Nagar Profile') {
        $this->db->select('
        tbl_property.property_name AS Nager_Garden_Name,
        tbl_property.district AS District,
        tbl_property.taluk_name AS Taluk_Name,
        tbl_property.village_town AS Village_Town,
        COUNT(tbl_plot_details.plot_detail_id) AS Total_Plots
     ');
        $this->db->from('tbl_property');
        $this->db->join('tbl_plot_details', 'tbl_property.property_id = tbl_plot_details.property_id', 'left');
        $this->db->where('tbl_property.deleted', 0);
        $this->db->where('tbl_plot_details.deleted', 0);
        $this->db->group_by('tbl_property.property_id'); 
        $query = $this->db->get();
        $data = $query->result_array();

     }else if (!empty($title) && $title == 'Registered Plots') {
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'  || $filter_1 !=''){
        $this->db->select('
        C.property_name AS Nager_Garden_Name,
        B.plot_no AS Plot_No,
        A.buyer_name AS Buyer_Name,
     ');
        $this->db->from('tbl_reg_plot as A');
        $this->db->join('tbl_reg_plot_details as B', 'A.reg_plot_id = B.reg_plot_header_id', 'left');
        $this->db->join('tbl_property as C', 'C.property_id = A.property_name', 'left');
        $this->db->where('C.deleted', 0);
        $this->db->where('A.deleted', 0);
        $this->db->where('B.deleted', 0);
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'){
        $this->db->where('A.property_name', $filter);
        }

        if($filter_1 !=''){
            $daterange = explode("-", $filter_1);
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
  
            $this->db->where('DATE(A.created_date) >=', $from_date);
            $this->db->where('DATE(A.created_date) <=', $to_date);
        }

        $this->db->group_by('B.reg_plot_detail_id'); 
        $query = $this->db->get();
        $data = $query->result_array();
        }else{
       $data= $this->common_model->get_all_reg_plots_count();
        }
    //    echo '<pre>'; print_r($data);die();
     }else if (!empty($title) && $title == 'Unregister Plots') {
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'){
        $this->db->select('
        C.property_name AS Nager_Garden_Name,
        A.plot_no AS Plot_No,
        A.plot_extension AS Plot_Extension,
     ');
        $this->db->from('tbl_plot_details as A');
        $this->db->join('tbl_property as C', 'C.property_id = A.property_id', 'left');
        $this->db->where('C.deleted', 0);
        $this->db->where('A.deleted', 0);
        $this->db->where('A.status', 'UnSold');
        $this->db->where('A.property_id', $filter);
        $this->db->group_by('A.plot_detail_id'); 
        $query = $this->db->get();
        $data = $query->result_array();
        }else{
        $data= $this->common_model->get_only_unregister_excel_plots();
        }
     }else if (!empty($title) && $title == 'Booked Plots') {
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0' || $filter_1 !=''){
        $this->db->select('
        C.property_name AS Nager_Garden_Name,
        B.plot_no AS Plot_No,
        A.buyer_name AS Buyer_Name,
     ');
        $this->db->from('tbl_booked_plot as A');
        $this->db->join('tbl_booked_plot_details as B', 'A.booked_plot_id = B.booked_plot_header_id', 'left');
        $this->db->join('tbl_property as C', 'C.property_id = A.property_name', 'left');
        $this->db->where('C.deleted', 0);
        $this->db->where('A.deleted', 0);
        $this->db->where('B.deleted', 0);
        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'){
        $this->db->where('A.property_name', $filter);
        }

        if($filter_1 !=''){
            $daterange = explode("-", $filter_1);
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
  
            $this->db->where('DATE(A.created_date) >=', $from_date);
            $this->db->where('DATE(A.created_date) <=', $to_date);
        }

        $this->db->group_by('B.booked_plot_detail_id'); 
        $query = $this->db->get();
        $data = $query->result_array();
        }else{
       $data= $this->common_model->get_all_booked_plots_count();

        }
      }else if (!empty($title) && $title == 'Staff Salary Info') {

            $this->db->select('
            DATE_FORMAT(A.created_date,"%d/%m/%Y") AS Salary_Date,
            B.employee_name AS Employee_Name,
            A.advance_amount AS Advance_Amount,
            A.balance_amount AS Salary_Amount,
         ');
            $this->db->from('tbl_employee_salary as A');
            $this->db->join('tbl_staff_info as B', 'A.employee_name = B.staff_info_id', 'left');
            $this->db->where('A.deleted', 0);
            $this->db->where('B.deleted', 0);
            
            if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0' || $filter_1 !=''){
                if($filter != ''){
                    $this->db->where('A.employee_name', $filter);
                }
                
                if($filter_1 !=''){
                    $daterange = explode("-", $filter_1);
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
          
                    $this->db->where('DATE(A.created_date) >=', $from_date);
                    $this->db->where('DATE(A.created_date) <=', $to_date);
                }
            }

            $this->db->group_by('A.emp_salary_id '); 
            $query = $this->db->get();
            $data = $query->result_array();

     }else if (!empty($title) && $title == 'Staff Info') {
        $this->db->select('
        A.employee_name AS Employee_name,
        A.father_name AS Father_Name,
        B.role_name AS Role,
     ');
        $this->db->from('tbl_staff_info as A');
        $this->db->join('tbl_role as B', 'A.role = B.role_id', 'left');
        $this->db->where('A.deleted', 0);
        $this->db->where('B.deleted', 0);
        $this->db->group_by('A.staff_info_id'); 
        $query = $this->db->get();
        $data = $query->result_array();
     }else if (!empty($title) && $title == 'Customer Receipt') {
        $this->db->select('
        DATE_FORMAT(A.created_date,"%d/%m/%Y") AS Receipt_Date,
        A.company_name AS Company_Name,
        B.property_name AS Nager_Garden_Name,
        C.buyer_name AS Customer_Name,
        A.mode_payment_value AS Paid_Amount,
     ');

        $this->db->from('tbl_billing_receipt as A');
        $this->db->join('tbl_property as B', 'B.property_id = A.property_name', 'left');
        $this->db->join('tbl_customer_info as C', 'C.customer_info_id = A.customer_name', 'left');
        $this->db->where('A.deleted', 0);
        $this->db->where('B.deleted', 0);

        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'){
            $this->db->where('A.property_name', $filter);
            }
    
            if($filter_1 !=''){
                $daterange = explode("-", $filter_1);
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
      
                $this->db->where('DATE(A.created_date) >=', $from_date);
                $this->db->where('DATE(A.created_date) <=', $to_date);
            }

        $this->db->group_by('A.billing_receipt_id'); 
        $query = $this->db->get();
        $data = $query->result_array();

}else if (!empty($title) && $title == 'Customer Details') {
 $details = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_customer_info');
 $customerData = [];

 foreach($details as $key=>$val){
 $address = '';
if($val['street_address'] !=''){
$address .= $val['street_address'] .',';
}

if($val['village_town'] !=''){
$address .= $val['village_town'] .',';
}

if($val['taluk_name'] !=''){
    $address .= $val['taluk_name'] .',';
    }

    if($val['district'] !=''){
        $address .= $val['district'].',';
        }

        if($val['district'] !=''){
            $address .= $val['pincode'];
        }

        $customerData['Customer_Name'] = $val["buyer_name"];
        $customerData['Address'] = $address;
        $customerData['Mobile'] = $val["phone_number_1"];
        if(!empty($customerData)){
            $data[] = $customerData;
        }
             }
    
     }else if (!empty($title) && $title == 'Expense Details') {
        $this->db->select('
        DATE_FORMAT(A.created_date,"%d/%m/%Y") AS Expense_Date,
        B.property_name AS Nager_Garden_Name,
        C.expen_name AS Expense_Name,
        A.expense_value AS Amount,
     ');

        $this->db->from('tbl_expense_details as A');
        $this->db->join('tbl_property as B', 'B.property_id = A.property_name', 'left');
        $this->db->join('tbl_expenses as C', 'C.expen_id = A.expense_type', 'left');
        $this->db->where('A.deleted', 0);
        $this->db->where('B.deleted', 0);

        if($filter != '' && $filter != NULL && !empty($filter) && $filter != '0'){
            $this->db->where('A.property_name', $filter);
            }
    
            if($filter_1 !=''){
                $daterange = explode("-", $filter_1);
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
      
                $this->db->where('DATE(A.created_date) >=', $from_date);
                $this->db->where('DATE(A.created_date) <=', $to_date);
            }

        $this->db->group_by('A.expense_id'); 
        $query = $this->db->get();
        $data = $query->result_array();

  }else if (!empty($title) && $title == 'Salary Advance Details') {
    $this->db->select('
    DATE_FORMAT(A.adv_date,"%d/%m/%Y") AS Advance_Date,
    B.employee_name AS Employee_Name,
    A.employee_id AS Employee_ID,
    A.advance_amount AS Advance_Amount,
 ');

    $this->db->from('tbl_salary_advance as A');
    $this->db->join('tbl_staff_info as B', 'B.staff_info_id = A.employee_name', 'left');
    $this->db->where('A.deleted', 0);
    $this->db->where('B.deleted', 0);

    $this->db->group_by('A.adv_id'); 
    $query = $this->db->get();
    $data = $query->result_array();
}

        $headers = array_keys($data[0]);
        $columnIndex = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($columnIndex . '1', $header);
            $columnIndex++;
        }

        // Style the header row
        $headerStyle = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'] // Optional: White text color
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => '000000'] // Optional: Black background color
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        ];

        $sheet->getStyle('A1:' . $columnIndex . '1')->applyFromArray($headerStyle);

        // Populate rows with data and add spacing
        $rowIndex = 2; // Start from row 2 because row 1 contains headers
        foreach ($data as $row) {
            $columnIndex = 'A';
            foreach ($headers as $header) {
                $cellValue = isset($row[$header]) ? $row[$header] : '';
                $sheet->setCellValue($columnIndex . $rowIndex, $cellValue);
                // Add padding by adjusting the cell style
                $sheet->getStyle($columnIndex . $rowIndex)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                $sheet->getStyle($columnIndex . $rowIndex)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $columnIndex++;
            }
            $rowIndex++;
        }

        if(!empty($title) && $title == 'Expense Details' || $title == 'Customer Receipt' || $title == 'Salary Advance Details' || $title == 'Staff Salary Info'){
       if($title == 'Expense Details'){
        $total = 0;
        foreach ($data as $row) {
        if (isset($row['Amount'])) {
        $total += $row['Amount'];
        }
        }

         $totalFormatted = '₹ ' . number_format($total, 2);
        
        $sheet->setCellValue('C' . $rowIndex, 'TOTAL:');
        $sheet->setCellValue('D' . $rowIndex, $totalFormatted);
        // Style the total row (optional)
        $sheet->getStyle('C' . $rowIndex . ':D' . $rowIndex)->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => '000000']
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => 'D9EAD3'] // Optional: Light green background for the total row
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        ]);

      }

      if($title == 'Salary Advance Details'){
        $total = 0;
        foreach ($data as $row) {
        if (isset($row['Advance_Amount'])) {
        $total += $row['Advance_Amount'];
        }
        }

         $totalFormatted = '₹ ' . number_format($total, 2);
        
        $sheet->setCellValue('C' . $rowIndex, 'TOTAL:');
        $sheet->setCellValue('D' . $rowIndex, $totalFormatted);
        // Style the total row (optional)
        $sheet->getStyle('C' . $rowIndex . ':D' . $rowIndex)->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => '000000']
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => 'D9EAD3'] // Optional: Light green background for the total row
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        ]);

      }

      if($title == 'Staff Salary Info'){
        $total = 0;
        foreach ($data as $row) {
        if (isset($row['Salary_Amount'])) {
        $total += $row['Salary_Amount'];
        }
        }

         $totalFormatted = '₹ ' . number_format($total, 2);
        
        $sheet->setCellValue('C' . $rowIndex, 'TOTAL:');
        $sheet->setCellValue('D' . $rowIndex, $totalFormatted);
        // Style the total row (optional)
        $sheet->getStyle('C' . $rowIndex . ':D' . $rowIndex)->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => '000000']
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => 'D9EAD3'] // Optional: Light green background for the total row
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        ]);

      }


      if($title == 'Customer Receipt'){
        $total = 0;
        foreach ($data as $row) {
        if (isset($row['Paid_Amount'])) {
        $total += $row['Paid_Amount'];
        }
        }

        $totalFormatted = '₹ ' . number_format($total, 2);
        
        $sheet->setCellValue('D' . $rowIndex, 'TOTAL:');
        $sheet->setCellValue('E' . $rowIndex, $totalFormatted);

          // Style the total row (optional)
          $sheet->getStyle('D' . $rowIndex . ':E' . $rowIndex)->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => '000000']
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['rgb' => 'D9EAD3'] // Optional: Light green background for the total row
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]
        ]);

      }
      
        }
        
        // Set column widths for better readability (optional)
        foreach (range('A', $columnIndex) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Create writer and save the file
        $writer = new Xlsx($spreadsheet);
        $filename = 'export_' . date('YmdHis') . '.xlsx';
        $filepath = FCPATH . 'downloads/' . $filename;

        // Ensure the directory exists
        if (!is_dir(FCPATH . 'downloads')) {
            mkdir(FCPATH . 'downloads', 0777, true);
        }

        try {
            $writer->save($filepath);
            $this->load->helper('download');
            force_download($filepath, NULL);
        } catch (Exception $e) {
            show_error('Error saving file: ' . $e->getMessage());
        }
    }else{
    $data['company'] = $this->common_model->get_single_date('company','comid',$this->session->userdata('comp_id'));
     $this->load->view('admin/export_all_template',$data); 
    }
}

function download_pdf_ajax(){
    
    $html =$this->input->post('html_data');
    $type =$this->input->post('type');
    error_reporting(0);
    ini_set('display_errors', 0);
    
    ini_set('pcre.backtrack_limit', '10000000');
    ini_set('pcre.recursion_limit', '1000000');
    ini_set('memory_limit', '512M');
    ini_set('max_execution_time', 300);
    
    try {
        $mpdf = new Mpdf();
        $watermarkImagePath = base_url() . 'assets/img/avatars/logo.png';
        $mpdf->SetWatermarkImage($watermarkImagePath, 0.1, 'C', array(70, 120));
        $mpdf->showWatermarkImage = true; 
        
        $mpdf->WriteHTML($html);
        $mpdf->SetJS('this.print();');
        if($type == 'pdf'){
            $mpdf->Output('document.pdf', 'D'); // 'D' for download, 'I' to view in browser
        }else{
            $mpdf->Output('document.pdf', 'I'); // 'D' for download, 'I' to view in browser
        }
    } catch (\Mpdf\MpdfException $e) {
        echo $e->getMessage();
    }
}

}
