<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Property_model','property');
        
        
        
    }
    public function index($id = NULL)
	{
       
        $data                 = array();
        
        $data['title'] = 'Property';
            
		$this->render_page('admin/list_page',$data); 
	}

    public function add_edit_property($id = NULL)
	{
        $current_url = $_SERVER['REQUEST_URI'];
        $url_parts = parse_url($current_url);
        $path_segments = explode('/', $url_parts['path']);
        $data                 = array();
        
        $data['title'] = 'Nager/Garden Profile';
            if($id){
                $this->load->model('common_model');
                $data['get_prop'] = $this->common_model->get_single_date('tbl_property','property_id',$id);
                $data['get_plot_details'] = $this->common_model->getall_record_info_with_deletedCheck_with_id_array('tbl_plot_details','property_id',$id);
                $data['registered_title_deed']    = $this->common_model->get_media_img('registered_title_deed',$id,'','');
                $data['patta_chitta']    = $this->common_model->get_media_img('patta_chitta',$id,'','');
                $data['tslr_patta']    = $this->common_model->get_media_img('tslr_patta',$id,'','');
                $data['ec_doc']    = $this->common_model->get_media_img('ec_doc',$id,'','');
                $data['fmr_tslr_sketch']    = $this->common_model->get_media_img('fmr_tslr_sketch',$id,'','');
                $data['plot_layout_diagram']    = $this->common_model->get_media_img('plot_layout_diagram',$id,'','');
                $data['parent_doc']    = $this->common_model->get_media_img('parent_doc',$id,'','');
                // print_r($data); die;
               
            }

        $data['district_list'] = $this->property->get_all_district();
        // $data['all_employees'] = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_staff_info');
		$this->render_page('admin/property/property',$data); 
	}

    public function save_property()
	{
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $data                         = array();
        $data_                        = array();
        $property_id  = $this->input->post('property_id');
        // echo $this->input->post('property_name_input');die();
        $data['property_name'] =$this->input->post('property_name_input');
        $data['district'] =$this->input->post('district_input');
        $data['taluk_name'] =$this->input->post('taluk_name_input');
        $data['village_town'] =$this->input->post('village_town_input');
        $data['patta_chitta'] =$this->input->post('patta_chitta_input');
        $data['t_s_no'] =$this->input->post('t_s_no_input');
        $data['ward_block'] =$this->input->post('ward_block_input');
        $data['land_mark'] =$this->input->post('land_mark_input');
        $data['dctp_no'] =$this->input->post('dctp_no_input');
        $data['rero_no'] =$this->input->post('rero_no_input');
        $data['total_entension'] =$this->input->post('total_entension_input');
        $data['total_no_plots'] =$this->input->post('total_no_plots_input');
        $data['park_extension'] =$this->input->post('park_extension_input');
        $data['road_extension'] =$this->input->post('road_extension_input');
        $data['eb_line'] =$this->input->post('eb_line_input');
        $data['tree_sapling'] =$this->input->post('tree_sapling_input');
        $data['water_tank'] =$this->input->post('water_tank_input');
        $data['document_reg_no'] =$this->input->post('document_reg_no_input');
        $data['land_purchased_no'] =$this->input->post('land_purchased_no_input');
        $data['land_unpurchased_no'] =$this->input->post('land_unpurchased_no_input');
        $data['reg_district'] =$this->input->post('reg_district_input');
        $data['reg_town_village'] =$this->input->post('reg_town_village_input');
        $data['reg_sub_district'] =$this->input->post('reg_sub_district_input');
        $data['reg_revenue_taluk'] =$this->input->post('reg_revenue_taluk_input');
        $data['sub_reg'] =$this->input->post('sub_reg_input');
        $data['sales_extention'] =$this->input->post('sales_extention_input');
        $data['user_id'] =$this->session->userdata('userid');
        $data['company_id'] = $this->session->userdata('comp_id');
        $data['east'] =$this->input->post('east_input');
        $data['west'] =$this->input->post('west_input');
        $data['north'] =$this->input->post('north_input');
        $data['south'] =$this->input->post('south_input');
        // $data['status'] =$this->input->post('status');
        $data['plot_no'] =$this->input->post('plot_no_input');
        $plot_details = json_decode($this->input->post('plotData'), true);
    

            if($property_id == ''){
                $property_id = $this->common_model->save('tbl_property',$data);
                $status = 'Inserted';
            }else{
                $this->common_model->update_info('tbl_property',$data,'property_id',$property_id);
                $status = 'Updated';
            }

            $page_name = "Property";

            if ($property_id) {
             
            if (!empty($plot_details)) {
                // $update =['deleted' => '1'];
                // $this->db->where('property_id',$property_id)->update('tbl_plot_details',$update);
                $previous_plot_ids = array();
                $get_previous_plot = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id',$property_id,'deleted',0);
                
                if(!empty($get_previous_plot)){
                 foreach($get_previous_plot as $val){
                     array_push($previous_plot_ids,$val['plot_no']);
                 }
                }

                foreach($plot_details as $key=>$val){
                    $check_its_exit = $this->common_model->general_where_select_result_with_three_cond('tbl_plot_details','property_id',$property_id,'plot_no',$val['plot_no'],'deleted',0);
                    $data_['property_id'] = $property_id;
                    $data_['plot_no'] = $val['plot_no'];
                    $data_['plot_extension'] = $val['plot_extension'];
                    $data_['north'] = $val['north'];
                    $data_['east'] = $val['east'];
                    $data_['west'] = $val['west'];
                    $data_['south'] = $val['south'];
                    $data_['status'] = $val['status'];
                    $data_['user_id'] =$this->session->userdata('userid');
                    $data_['company_id'] = $this->session->userdata('comp_id');
                 if(empty($check_its_exit)){
                    $this->common_model->save('tbl_plot_details',$data_);
                 }else{
                    $this->db->where('property_id',$property_id)->where('plot_no',$val['plot_no'])->update('tbl_plot_details',$data_);
                 } 
                
                 if(!empty($previous_plot_ids)){
                 if(in_array($val['plot_no'], $previous_plot_ids)){
                    $previous_plot_ids = array_diff($previous_plot_ids, [$val['plot_no']]);
                    $previous_plot_ids = array_values($previous_plot_ids);
                 }

                }

                }

                if(!empty($previous_plot_ids)){
                    $update =['deleted' => '1'];
                    $this->db->where('property_id',$property_id)->where_in('plot_no',$previous_plot_ids)->update('tbl_plot_details',$update);
                }
              
            }

            // echo  '<pre>';print_r($_FILES['reg_title_deed_doc_file_input']);die();
            if (!empty($_FILES['reg_title_deed_doc_file_input']['name'][0])) {
                common_file_upload('uploads/property/registered_title_deed_document/','*','reg_title_deed_doc_file_input','registered_title_deed',$property_id,'Property');
            }

            if (!empty($_FILES['patta_chitta_file_input']['name'][0])) {
                common_file_upload('uploads/property/patta_chitta/','*','patta_chitta_file_input','patta_chitta',$property_id,'Property');
            }

            if (!empty($_FILES['tslr_patta_file_input']['name'][0])) {
                common_file_upload('uploads/property/tslr_patta/','*','tslr_patta_file_input','tslr_patta',$property_id,'Property');              
            }

            if (!empty($_FILES['ec_doc_file_input']['name'][0])) {
                common_file_upload('uploads/property/ec_doc/','*','ec_doc_file_input','ec_doc',$property_id,'Property');              
            }
      

            if (!empty($_FILES['fmr_tslr_sketch_file_input']['name'][0])) {
                common_file_upload('uploads/property/fmr_tslr_sketch/','*','fmr_tslr_sketch_file_input','fmr_tslr_sketch',$property_id,'Property');                            
            }
            

            if (!empty($_FILES['plot_layout_diagram_file_input']['name'][0])) {
                common_file_upload('uploads/property/plot_layout_diagram/','*','plot_layout_diagram_file_input','plot_layout_diagram',$property_id,'Property');                            
            }

            if (!empty($_FILES['parent_doc_file_input']['name'][0])) {
                common_file_upload('uploads/property/parent_doc/','*','parent_doc_file_input','parent_doc',$property_id,'Property');                                          
            }

            $page_name = "Property";

            $response = array('status' => 'success', 'message' => $page_name . ' '.$status.'  Successfully');

            } else {
                $response = array('status' => 'error', 'message' => $page_name . ' '.$status.'  Failed');
            }
            
            echo json_encode($response);
            return;
        
	}

    public function delete_img_ajax() {
        $id = $this->input->post('id');
        $module_id = $this->input->post('module_id');
        
        // Load the common model if not already loaded
        $this->load->model('common_model');
    
        $img_info = $this->common_model->get_single_date('tbl_media', 'media_id', $id);
    
        // Check if the image exists
        if ($img_info) {
            $deleted = $this->common_model->delete_info('tbl_media', 'media_id', $id);
    
            // If the image record is deleted from the database
            if ($deleted) {
                // Check if the file path exists and unlink the file
                if (!empty($img_info->tbl_file_path) && file_exists($img_info->tbl_file_path)) {
                    unlink($img_info->tbl_file_path);
                }
                // Return a JSON response indicating success
                echo json_encode(array('success' => true));
            } else {
                // Return a JSON response indicating failure to delete from database
                echo json_encode(array('success' => false, 'message' => 'Failed to delete image record from database.'));
            }
        } else {
            // Return a JSON response indicating the image was not found
            echo json_encode(array('success' => false, 'message' => 'Image not found.'));
        }
    }
    
}
