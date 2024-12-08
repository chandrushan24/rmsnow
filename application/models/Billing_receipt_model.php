<?php

defined('BASEPATH') OR exit('No direct script access allowed');


 class Billing_receipt_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();      
 	}
 function get_billling_details($id){
	$retur_value = array();
	if($id != ''){
		$check_reg = $this->common_model->getall_record_info_with_deletedCheck_with_id_array('tbl_reg_plot','s_no',$id);
		$check_booked = $this->common_model->getall_record_info_with_deletedCheck_with_id_array('tbl_booked_plot','s_no',$id);
		if(!empty($check_reg[0])){
			$this->db->select('*, trpd.plot_no AS plot_no_,
			trpd.plot_extension AS plot_extension_,
			trpd.north AS north_,
			trpd.east AS east_,
			trpd.west AS west_,
			trpd.south AS south_,
			tpc.plot_values AS plot_amount,
			tp.property_name as property_name_')
			->from('tbl_reg_plot trp')
			->join('tbl_reg_plot_details trpd', 'trp.reg_plot_id = trpd.reg_plot_header_id','left')
			->join('tbl_property tp', 'trp.property_name = tp.property_id', 'left')
			->join('tbl_offer_incentives tpc', 'tpc.property_name = trp.property_name', 'left')
			->where('trp.deleted', '0')
			->where('trpd.deleted', '0')
			->where('trp.reg_plot_id', $check_reg[0]['reg_plot_id']);
			$retur_value = $this->db->get()->result_array();
		}

		if(!empty($check_booked[0])){
			$this->db->select('*, tbpd.plot_no AS plot_no_,
			tbpd.plot_extension AS plot_extension_,
			tbpd.north AS north_,
			tbpd.east AS east_,
			tbpd.west AS west_,
			tbpd.south AS south_,
			tpc.plot_values AS plot_amount,
			tp.property_name as property_name_')
			->from('tbl_booked_plot tbp')
			->join('tbl_booked_plot_details tbpd', 'tbp.booked_plot_id = tbpd.booked_plot_header_id','left')
			->join('tbl_property tp', 'tbp.property_name = tp.property_id', 'left')
			->join('tbl_offer_incentives tpc', 'tpc.property_name = tbp.property_name', 'left')
			->where('tbp.deleted', '0')
			->where('tbpd.deleted', '0')
			->where('tbp.booked_plot_id', $check_booked[0]['booked_plot_id']);
			$retur_value = $this->db->get()->result_array();
		}

	}
	// echo '<pre>';print_r($retur_value);die();
	return $retur_value;
 }

}
	