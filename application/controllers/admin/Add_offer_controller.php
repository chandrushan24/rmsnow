<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_offer_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index($id = NULL)
	{
        $data                 = array();
        
        $data['title'] = 'Offer';
        if($id){
            $data['get_prop'] = $this->common_model->get_single_date('tbl_add_offer','add_offer_id',$id);
        }
        $data['propert_list'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');

		$this->render_page('admin/offer_desk/add_offer',$data); 
	}

    public function save_add_offer()
    {
        $data                         = array();
        $add_offer_id  = $this->input->post('add_offer_id');
        $data['property_name'] =$this->input->post('property_name_input');
        $data['total_target'] =$this->input->post('total_target_input');
        $data['offer'] =$this->input->post('offer_input');
        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');
        
        if($add_offer_id == ''){
            $add_offer_id = $this->common_model->save('tbl_add_offer',$data);
            $status = 'Inserted';
        }else{
            $this->common_model->update_info('tbl_add_offer',$data,'add_offer_id',$add_offer_id);
            $status = 'Updated';
        }

        if ($add_offer_id) {
         $page_name = "Offer";
         
         $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');
    
        } else {
            $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
        }
        
        echo json_encode($response);
        return;
    }

}