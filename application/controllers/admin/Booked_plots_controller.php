<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booked_plots_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // $this->load->model('Property_model','property');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        
        $data['title'] = 'Booked Plots';
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
            $data['get_prop'] = $this->common_model->get_single_date('tbl_booked_plot','booked_plot_id',$id);
            $data['get_plot_details'] = $this->common_model->general_where_select_result_with_two_cond('tbl_booked_plot_details','booked_plot_header_id',$data['get_prop']['booked_plot_id'],'deleted',0);
			$status = ' UnSold,Booked';
			$data['plot_details']  = $this->common_model->getall_record_info_with_detail_with_two_id_array('tbl_plot_details','property_id',$data['get_prop']['property_name'],'status',$status);
		}
        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
        $data['all_employees'] = $this->common_model->get_refer_by_employees();
		$data['district_list'] = $this->common_model->getall_record_info_array('district_master');

		$this->render_page('admin/property/booked_plots',$data); 
	}

    public function index_1($id = NULL)
	{
        $data                 = array();
        
        $data['title'] = 'Booked Plots';
        // if(empty($id)){
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
        if($id){
            $data['get_prop_'] = $this->db->select('A.*, B.plot_detail_id,B.plot_no as plot_nos, B.plot_extension as plot_extensions, B.north as norths, B.east as easts, B.west as wests, B.south as souths')
            ->from('tbl_property as A')
            ->join('tbl_plot_details B', 'B.property_id = A.property_id', 'left')
            ->where('B.deleted', 0)
            ->where('A.deleted', 0)
            ->where('B.plot_detail_id', $id)
            ->get()
            ->row_array();
        }
        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
        $data['all_employees'] = $this->common_model->get_refer_by_employees();

		$this->render_page('admin/property/booked_plots',$data); 
	}


    public function save_booked_plot()
    {
        $data                         = array();
        $booked_plot_id  = $this->input->post('booked_plot_id');
        $data['s_no'] =$this->input->post('s_no_input');
        $seqno  = $this->input->post('seqno');
        $data['property_name'] =$this->input->post('property_name_input');
        $data['plot_no'] =$this->input->post('plots_no_input');

        $data['total_plot_extension'] =$this->input->post('total_plot_extension_input');
        $data['buyer_name'] =$this->input->post('buyer_name_input');
        $data['buyer_gender'] =$this->input->post('buyer_gender_input');
        $data['father_rel'] =$this->input->post('father_rel_input');
        $data['father_name'] =$this->input->post('father_name_input');

		$data['phone_number'] =$this->input->post('phone_number_1_input');
        $data['buyer_address'] =$this->input->post('street_address_input'); //street_address - buyer_address
        $data['buyer_district'] =$this->input->post('district_input');
        $data['buyer_pincode'] =$this->input->post('district_pincode');
        $data['buyer_taluk_name'] =$this->input->post('taluk_name_input');
        $data['buyer_village_town'] =$this->input->post('village_town_input');
        $data['buyer_phone_number_2'] =$this->input->post('phone_number_2_input');


        // $data['east'] =$this->input->post('east_input');
        // $data['west'] =$this->input->post('west_input');
        // $data['north'] =$this->input->post('north_input');
        // $data['south'] =$this->input->post('south_input');

        $data['id_proof_select'] =$this->input->post('id_proof_select_input');
        $data['id_proof'] =$this->input->post('id_proof_input');

        $data['adv_amount_plot'] =$this->input->post('adv_amount_plot_input');
        $data['bal_amount_for_plot'] =$this->input->post('bal_amount_for_plot_input');
        $data['tentative_reg_date'] =$this->input->post('tentative_reg_date_input');
       
        $data['mode_payment'] =$this->input->post('mode_payment_input');
        $data['mode_payment_value'] =$this->input->post('mode_payment_value_input');
        // $data['name_ref_by'] =$this->input->post('name_ref_by_input');
        // $implode_value = !empty($this->input->post('name_ref_by_input')) ? implode(',',$this->input->post('name_ref_by_input')) : '';
        $data['name_ref_by'] = $this->input->post('name_ref_by_input');
        $data['alt_phone_number'] =$this->input->post('alt_phone_number_input');
        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');
        $data['customer_id'] =$this->input->post('customer_id');

		if (is_array($data['plot_no'])) {
            $data['plot_no'] = implode(',', $data['plot_no']);
        } else {
            $data['plot_no'] = $data['plot_no']; 
        }
        
          
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
				'phone_number_2' => $data['buyer_phone_number_2'],
            ];

            $this->db->where('customer_info_id',$data['customer_id']);
            $this->db->update('tbl_customer_info',$update);
         }
         if(!empty($data['plot_no'])){
            $data1['status'] = "Booked";
			$plot_numbers = explode(',', $data['plot_no']);
			foreach($plot_numbers as $key) {
				$this->common_model->update_info('tbl_plot_details', $data1, 'plot_detail_id', $key);
			}
         }
         
        if($booked_plot_id == ''){

            $booked_plot_id = $this->common_model->save('tbl_booked_plot',$data);
            $this->common_model->update_info('autonumber',array('seqno' => $seqno),'process','Booked Plots');
            $status = 'Inserted';
        }else{
			$this->common_model->update_info('tbl_booked_plot',$data,'booked_plot_id',$booked_plot_id);
            $status = 'Updated';
        }

		$data_ = array();
		$plot_details = json_decode($this->input->post('plotData'), true);
		if (!empty($plot_details)) {
			$update =['deleted' => '1'];
			$this->db->where('booked_plot_header_id',$booked_plot_id)->update('tbl_booked_plot_details',$update);
			foreach($plot_details as $key=>$val){
			 $data_['booked_plot_header_id'] = $booked_plot_id; 
			 $data_['plot_no'] = $val['plot_no'];
			 $data_['plot_extension'] = $val['plot_extension'];
			 $data_['north'] = $val['north'];
			 $data_['east'] = $val['east'];
			 $data_['west'] = $val['west'];
			 $data_['south'] = $val['south'];
			 $data_['status'] = $val['status'];
			 $data_['user_id'] =$this->session->userdata('userid');
			 $data_['company_id'] = $this->session->userdata('comp_id');
			 $this->common_model->save('tbl_booked_plot_details',$data_);
			}
		}

        if ($booked_plot_id) {

        $page_name = "Booked Plot";

        
        $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');
    
        } else {
            $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
        }
    
        echo json_encode($response);
        return;

    }

}
        