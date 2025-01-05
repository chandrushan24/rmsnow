<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= (isset($title) ? $title: '') ?></title>
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/custom_css_view.css">
    <div class="Print_Content">
        <style>
          @font-face {
            font-family: SourceSansPro;
            src: url("<?= base_url() ?>SourceSansPro-Regular.ttf");
          }
 
          .clearfix:after {
            content: "";
            display: table;
            clear: both;
          }
          a {
            color: #bd9653;
            text-decoration: none;
          }
          #download_section {
            position: relative;
            width: 100%;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
            padding: 20px;
          }
          header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
          }
          #logo {
            float: left;
            margin-top: 8px;
          }
          
          #company {
            float: right;
            text-align: right;
          }
          #details {
            margin-bottom: 50px;
          }
          #client {
            padding-left: 6px;
            border-left: 6px solid #bd9653;
            height:80px;
            float: left;
			font-family: Arial, sans-serif;
            font-family: SourceSansPro;
          }
          #client .to {
            color: #777777;
          }
          h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
          }
          #invoice {
            float: right;
            text-align: right;
          }
          #invoice h1 {
            color: #bd9653;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
          }
          #invoice .date {
            font-size: 1.1em;
            color: #777777;
          }
          table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 5px;
          }
          table th,
          table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
          }

          .table_custom td {
            padding: 20px;
            background: white;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
          }
          .table_custom .right_align_text{
            text-align:right;
          }

          .table_custom .left_align_text{
            text-align:left;
          }

          table th {
            white-space: nowrap;
            font-weight: normal;
          }
          /* table td {
            text-align: right;
          } */
          table td h3 {
            color: #bd9653;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
          }
          table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #bd9653;
          }
          
            .travel-detail-wrap {
            margin-top: 40px;
            border: 2px solid #bd9653;
            background: #eeeeee;
            }
          table .desc {
            text-align: left;
          }
          table .unit {
            background: #DDDDDD;
          }

          table .table_white {
            background: white;
          }

          table .total {
            background: #bd9653;
            color: #FFFFFF;
          }
          table td.unit,
          table td.total {
            font-size: 1.2em;
          }
          table tbody tr:last-child td {
            border: none;
          }
          table tfoot td {
            padding: 10px 20px;
            background: #ffffff00;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
          }
          table tfoot tr:first-child td {
            border-top: none;
          }
          table tfoot tr:last-child td {
            color: #bd9653;
            font-size: 1.4em;
            border-top: 1px solid #bd9653;
          }
          table tfoot tr td:first-child {
            border: none;
          }
          #thanks {
            font-size: 2em;
            margin-bottom: 50px;
          }
          .notices {
            padding-left: 6px;
            border-left: 6px solid #bd9653;
          }
          .notices .notice {
            font-size: 1.2em;
          }
          footer {
            color: #777777;
            width: 100%;
            height: 30px;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
          }
        </style>
  </head>
  <body>
    <div id="download_section">
    <div id="watermark"></div> <!-- Watermark added -->
    <header class="clearfix">
      <table class="table_custom">
        <tr>
          <td class="left_align_text">
      <div id="logo">
        <img  width="80" height="70" src="<?php echo base_url().'assets/img/avatars/logo.png' ?>">
      </div>
      </td>
      <td class="right_align_text">
      <div id="company">
        <h2 class="name"><?=(isset($company) ? $company['name'] : '') ?></h2>
        <div><?=(isset($company) ? $company['add1'] .','.$company['add2'] .','.$company['add3'] .','.$company['add4'] : '') ?></div>
        <div>
        <a href="tel:<?=(isset($company) ? $company['contact1'] : '') ?>" >+91 <?=(isset($company) ? $company['contact1'] : '') ?></a>
        </div>
        <div><a href="mailto:<?=(isset($company) ? $company['email'] : '') ?>" ><?=(isset($company) ? $company['email'] : '') ?></a></div>
      </div>
      </td>
      </tr>
        </table>
    </header>

	<table class="table_custom">
  <tr>
  <td class="left_align_text">
  <div class="notices">
    <!-- <div class="to">Nagar/Garden Name:</div> -->
    <h1><?=(isset($title) ? $title: '') ?></h1>
  </div>
		</td>
		</tr>
		</table>
    <main>
<body>

	            <?php if($title == 'Nagar Profile'): ?>
                        <br>
					
	<table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">S.No</th>
            <th class="desc">Nagar Garden Name</th>
            <th class="unit">District</th>
            <th class="unit">Taluk</th>
            <th class="unit">Village/Town Name</th>
            <th class="unit">Total Plots</th>
          </tr>
        </thead>
        <tbody>
           <?php if(!empty($details)){
                                        $i=1;
                                     foreach($details as $key=>$val){
                                        $count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val['property_id'],'deleted','0');
                                        echo'
                                        <tr>
										<td class="no">'.$i.'</td>
										<td class="desc">'.$val["property_name"].'</td>
										<td class="unit">'.$val["district"].'</td>
										<td class="unit">'.$val["taluk_name"].'</td>
										<td class="unit">'.$val["village_town"].'</td>
										<td class="unit">'.(count($count_total) ? count($count_total) : 0).'</td>
									</tr>';
									$i++;
									 }
                                }else{
                                    echo'
                                    <tr >
                                    <td class="unit"></td>
                                    <td class="unit"></td>
                                    <td class="unit"></td>
                                    <td class="unit"></td>
                                </tr>';
                                }?>

        </tbody>
      </table>
                       <?php endif;?>

<!--Header end here -->

<?php if($title == 'Registered Plots'): ?>
	<table border="0" cellspacing="0" cellpadding="0">
        <thead>
		<?php if(!empty($details)){ ?>
          <tr>
            <th class="no">S.No</th>
            <th class="desc">Nagar Garden Name</th>
            <th class="unit">Date Of Registered</th>
            <th class="unit">Plot No</th>
            <th class="unit">Buyer Name</th>
          </tr>
		  <?php } ?>

		  <?php if(empty($details) && $filter== '0'){ ?>
					<tr>
						<th class="no">S.No</th>     
						<th class="desc">Nagar Name</th>
						<th class="unit">Village Town</th>
						<th class="unit">Total Plots</th>
						<th class="unit">Registered Plots</th>
					</tr>
		<?php } ?>

       </thead>
		
					<?php if(!empty($details)){
						$i=1;
					 foreach($details as $key=>$val){
						$query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val['property_name']));
						$property = $query->row_array();
						$reg_plot_id = $val["reg_plot_id"];
						$query = $this->db->query("SELECT plot_no FROM tbl_reg_plot_details WHERE deleted = 0 AND reg_plot_header_id = ?", [$reg_plot_id]);
						  $plot_nos = $query->result_array();
						if(!empty($plot_nos)){
						 foreach($plot_nos as $val_){
						echo'
						<tr>
						<td class="no">'.$i.'</td>
						<td class="desc">'.$property["property_name"].'</td>
						<td class="unit">'.date('d/m/Y',strtotime($val['created_date'])).'</td>
						<td class="unit">'.$val_["plot_no"].'</td>
						<td class="unit">'.$val["buyer_name"].'</td>
					 </tr>';
					$i++;
						 }

						}
					 }
				}else if(empty($details) && $filter== '0'){
					$i=1;
					$data1 = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
					foreach ($data1 as $val) {
			
					$count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val['property_id'],'deleted','0');
					$count_reg = $this->common_model->get_regiter_plot_count($val['property_id']);
					// $count_book = $this->common_model->get_Booked_plot_count($val['property_id']);
					// $count_unreg = $this->common_model->get_Unreg_plot_count($val['property_id']);
					echo'
					<tr>
					<td class="no">'.$i.'</td>
					<td class="desc">'.$val["property_name"].'</td>
					<td class="unit">'.$val["village_town"].'</td>
					<td class="unit">'.(!empty($count_total) ? count($count_total) : 0).'</td>
					<td class="unit">'.(!empty($count_reg) ? count($count_reg) : 0).'</td>
				 </tr>';
				  $i++;

			}
		  }else{
					echo'
					<tr>
					<td class="no"></td>
					<td class="desc"></td>
					<td class="unit"></td>
					<td class="unit"></td>
				</tr>';
				}?>
			</table>

	   <?php endif;?>

	   <!--Header end here -->

<?php if($title == 'Unregister Plots'): ?>

	<table border="0" cellspacing="0" cellpadding="0">
				<thead>
				<?php if(!empty($details)){ ?>

					<tr>
						<th class="no">S.No</th>     
						<th class="desc">Nagar Garden Name</th>
						<th class="unit">Plot No</th>
						<th class="unit">Total Plot Extension</th>
					</tr>
				<?php } ?>

					<?php if(empty($details) && $filter== '0'){ ?>
					<tr>
						<th class="no">S.No</th>     
						<th class="desc">Nagar Garden Name</th>
						<th class="unit">Village Town</th>
						<th class="unit">Total Plots</th>
						<th class="unit">Unregister Plots</th>
					</tr>
				<?php } ?>

				</thead>
					<?php if(!empty($details)){
						$i=1;
						
					 foreach($details as $key=>$val){
						$query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val['property_id']));
						$property = $query->row_array();
						
						echo'
						<tr >
						<td class="no">'.$i.'</td>
						<td class="desc">'.$property["property_name"].'</td>
						<td class="unit">'.$val["plot_no"].'</td>
						<td class="unit">'.$val["plot_extension"].'</td>
					 </tr>';
					$i++;
					 }
				}else if(empty($details) && $filter== '0'){
					$i=1;
					$data1 = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
					foreach ($data1 as $val) {
					$count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val['property_id'],'deleted','0');
					$count_unreg = $this->common_model->get_Unreg_plot_count($val['property_id']);
					echo'
					<tr >
					<td class="no">'.$i.'</td>
					<td class="desc">'.$val["property_name"].'</td>
					<td class="unit">'.$val["village_town"].'</td>
					<td class="unit">'.(!empty($count_total) ? count($count_total) : 0).'</td>
					<td class="unit">'.(!empty($count_unreg) ? count($count_unreg) : 0).'</td>
				 </tr>';
				  $i++;
				}
			}else{
					echo'
					<tr>
					<td class="no"></td>
					<td class="desc"></td>
					<td class="unit"></td>
					<td class="unit"></td>
				</tr>';
			}
			?>

			</table>
	   <?php endif;?>

<?php if($title == 'Booked Plots'): ?>

	<table border="0" cellspacing="0" cellpadding="0">
				<thead>
				<?php if(!empty($details)){ ?>
					<tr>
						<th class="no">S.No</th>     
						<th class="desc">Nagar Garden Name</th>
						<th class="unit">Date Of Booking</th>
						<th class="unit">Plot No</th>
						<th class="unit">Buyer Name</th>
					</tr>
					<?php } ?>
				<?php if(empty($details) && $filter== '0'){ ?>
					<tr>
						<th class="no">S.No</th>     
						<th class="desc">Nagar Name</th>
						<th class="unit">Village Town</th>
						<th class="unit">Total Plots</th>
						<th class="unit">Booked Plots</th>
					</tr>
				<?php } ?>
				</thead>
				<tbody class="invo-tb-body">
					<?php if(!empty($details)){
						$i=1;
						
					 foreach($details as $key=>$val){
						$query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val['property_name']));
						$property = $query->row_array();
						$book_plot_id = $val["booked_plot_id"];
						$query = $this->db->query("SELECT plot_no FROM tbl_booked_plot_details WHERE deleted = 0 AND booked_plot_header_id = ?", [$book_plot_id]);
						  $plot_nos = $query->result_array();
						if(!empty($plot_nos)){
						 foreach($plot_nos as $val_){
						echo'
						<tr>
						<td class="no">'.$i.'</td>
						<td class="desc">'.$property["property_name"].'</td>
						<td class="unit">'.date('d/m/Y',strtotime($val['created_date'])).'</td>
						<td class="unit">'.$val_["plot_no"].'</td>
						<td class="unit">'.$val["buyer_name"].'</td>
					 </tr>';
					$i++;
						 }

						}
					}
					 }else if(empty($details) && $filter== '0'){
						$i=1;
						$data1 = $this->common_model->getall_record_info_with_deletedCheck_array('tbl_property');
						foreach ($data1 as $val) {
						$count_total = $this->common_model->general_where_select_result_with_two_cond('tbl_plot_details','property_id', $val['property_id'],'deleted','0');
						$count_book = $this->common_model->get_Booked_plot_count($val['property_id']);
						echo'
						<tr>
						<td class="no">'.$i.'</td>
						<td class="desc">'.$val["property_name"].'</td>
						<td class="unit">'.$val["village_town"].'</td>
						<td class="unit">'.(!empty($count_total) ? count($count_total) : 0).'</td>
						<td class="unit">'.(!empty($count_book) ? count($count_book) : 0).'</td>
					 </tr>';
					  $i++;
	
				}
			}
				else{
					echo'
					<tr>
					<td class="no"></td>
					<td class="desc"></td>
					<td class="unit"></td>
					<td class="unit"></td>
				</tr>';
				}?>

			</table>
	   <?php endif;?>

	   <?php if($title == 'Staff Info'): ?>
			<table border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th class="no">S.No</th>     
						<th class="desc">Employee Name</th>
						<th class="unit">Father Name</th>
						<th class="unit">Role</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($details)){
						$i=1;
						
					 foreach($details as $key=>$val){
						$query = $this->db->query("SELECT role_name FROM tbl_role WHERE role_id = ?", array($val["role"]));
						$roles = $query->row_array();
						echo'
						<tr>
						<td class="no">'.$i.'</td>
						<td class="desc">'.$val["employee_name"].'</td>
						<td class="unit">'.$val["father_name"].'</td>
						<td class="unit">'.$roles["role_name"].'</td>
					 </tr>';
					$i++;
						 }
				}else{
					echo'
					<tr >
					<td class="no"></td>
					<td class="desc"></td>
					<td class="unit"></td>
					<td class="unit"></td>
				</tr>';
				}?>
				</tbody>
			</table>

	   <?php endif;?>

	   
	   <?php if($title == 'Customer Details'): ?>

			<table border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th class="no">S.No</th>  
						<th class="desc">Buyer Name</th>
						<th class="unit">Address</th>
						<th class="unit">Mobile</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($details)){
						$i=1;
						
					 foreach($details as $key=>$val){
						$address = '';

         if($val['street_address'] !=''){
         $address .= $val['street_address'] .',<br>';
         }

         if($val['village_town'] !=''){
            $address .= $val['village_town'] .',<br>';
            }

            if($val['taluk_name'] !=''){
                $address .= $val['taluk_name'] .',<br>';
                }

                if($val['district'] !=''){
                    $address .= $val['district'].',<br>';
                    }

                    if($val['district'] !=''){
                        $address .= $val['pincode'];
                    }
						echo'
						<tr>
						<td class="no">'.$i.'</td>
						<td class="desc">'. $val["buyer_name"].'</td>
						<td class="unit">'.$address.'</td>
						<td class="unit">'.$val["phone_number_1"].'</td>
					 </tr>';
					$i++;
						 }
				}else{
					echo'
					<tr >
					<td class="no"></td>
					<td class="desc"></td>
					<td class="unit"></td>
					<td class="unit"></td>
					<td class="unit"></td>
				</tr>';
				}?>

				</tbody>
			</table>
	   <?php endif;?>


	   <?php if($title == 'Staff Salary Info'): ?>

<table border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th class="no">S.No</th>  
			<th class="desc">Salary Date</th>
			<th class="unit">Employee Name</th>
			<th class="unit">Advance Amount</th>
			<th class="unit">Salary Amount</th>
			<th class="unit">Offer Won</th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($details)){
		    $total = 0;
			$i=1;
		 foreach($details as $key=>$val){
			$query = $this->db->query("SELECT employee_name FROM tbl_staff_info WHERE staff_info_id = ?", array($val["employee_name"]));
			$emloyee_name = $query->row_array();
			echo'
			<tr>
			<td class="no">'.$i.'</td>
			<td class="desc">'. date('d/m/Y',strtotime($val["created_date"])).'</td>
			<td class="unit">'.$emloyee_name["employee_name"].'</td>
			<td class="unit">'.number_format($val["advance_amount"],2).'</td>
			<td class="unit">'.number_format($val["balance_amount"],2).'</td>
			<td class="unit">'.$val["offer_won"].'</td>
		 </tr>';
		$i++;
		$total += is_numeric($val["balance_amount"]) ? $val["balance_amount"] :0 ;
			 }
	}else{
		echo'
		<tr >
		<td class="no"></td>
		<td class="desc"></td>
		<td class="unit"></td>
		<td class="unit"></td>
		<td class="unit"></td>
		<td class="unit"></td>
	</tr>';
	$total = 0.00 ;
	}?>
	</tbody>
	<tfoot>
					<tr>
					<th colspan="4" class="text-end">TOTAL : </th>
					<th>₹ <?= number_format($total,2) ?></th>
					<th></th>
					</tr>
				</tfoot>
</table>
<?php endif;?>


	   <?php if($title == 'Customer Receipt'): ?>

			<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<th class="no">S.No</th>     
						<th class="desc">Receipt Date</th>     
						<th class="unit">Nagar/Garden Name</th>
						<th class="unit">Company Name</th>
						<th class="unit">Buyer Name</th>
						<th class="unit">Paid Amount</th>
					</tr>
				</thead>
				<tbody class="invo-tb-body">
					<?php if(!empty($details)){
						$i=1;
						$total = 0;
					 foreach($details as $key=>$val){
						$query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val['property_name']));
						$property = $query->row();
			
						$query1 = $this->db->query("SELECT buyer_name FROM tbl_customer_info WHERE customer_info_id = ?", array($val['customer_name']));
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
						echo'
						<tr>
						<td class="no">'.$i.'</td>,
						<td class="desc">'.date('d/m/Y',strtotime($val['created_date'])).'</td>
						<td class="unit">'.$property_name.'</td>
						<td class="unit">'.$val["company_name"].'</td>
						<td class="unit">'.$customer_name.'</td>
						<td class="unit">'.$val['mode_payment_value'].'</td>
					 </tr>';
					$i++;
					$total += is_numeric($val['mode_payment_value']) ? $val['mode_payment_value'] : 0;
						 }
				}else{
					echo'
					<tr >
					<td class="no"></td>
					<td class="desc"></td>
					<td class="unit"></td>
					<td class="unit"></td>
					<td class="unit"></td>
				</tr>';
				$total = 0.00 ;
				}?>

				</tbody>
				<tfoot>
					<tr>
					<th colspan="5" class="text-end">TOTAL : </th>
					<th>₹ <?= $total ?></th>
					</tr>
				</tfoot>
			</table>
		</div>

	   <?php endif;?>

	   <?php if($title == 'Expense Details'): ?>

		<table border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th class="no">S.No</th>     
						<th class="desc">Expense Date</th>     
						<th class="unit">Nagar/Garden Name</th>
						<th class="unit">Expense Name</th>
						<th class="unit">Amount</th>
					</tr>
				</thead>
				<tbody >
					<?php if(!empty($details)){
						$i=1;
						$total =0 ;
					 foreach($details as $key=>$val){
						$query = $this->db->query("SELECT property_name FROM tbl_property WHERE property_id = ?", array($val['property_name']));
						$property = $query->row();
			
						$query1 = $this->db->query("SELECT expen_name FROM tbl_expenses WHERE expen_id = ?", array($val['expense_type']));
						$expense = $query1->row();
						if ($expense) {
							$expen_name_name = $expense->expen_name;
						} else {
							$expen_name_name = '';
						}
						// Check if the property was found
						if ($property) {
							$property_name = $property->property_name;
						} else {
							$property_name = 'Unknown Property';
						}
						echo'
						<tr>
						<td class="no">'.$i.'</td> 
						<td class="desc">'.date('d/m/Y',strtotime($val['created_date'])).'</td>
						<td class="unit">'.$property_name.'</td>
						<td class="unit">'.$expen_name_name.'</td>
						<td class="unit">'.$val["expense_value"].'</td>
					 </tr>';
					$i++;
					 $expense_value = is_numeric($val["expense_value"]) ? $val["expense_value"] : 0;
					 $total +=$expense_value;
						 }
				}else{
					echo'
					<tr >
					<td class="no"></td>
					<td class="desc"></td>
					<td class="unit"></td>
					<td class="unit"></td>
					<td class="unit"></td>
				</tr>';
				}?>
				<tfoot>
					<tr>
					<th colspan="4" class="text-end">TOTAL : </th>
					<th>₹ <?= $total ?></th>
					</tr>
				</tfoot>
				</tbody>
			</table>
		</div>

	   <?php endif;?>


	   <?php if($title == 'Salary Advance Details'): ?>

<table border="0" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th class="no">S.No</th>     
				<th class="desc">Advance Date</th>     
				<th class="unit">Employee Name</th>
				<th class="unit">Employee ID</th>
				<th class="unit">Advance Amount</th>
			</tr>
		</thead>
		<tbody >
			<?php if(!empty($details)){
				$i=1;
				$total =0 ;
			 foreach($details as $key=>$val){
				$query = $this->db->query("SELECT employee_name FROM tbl_staff_info WHERE staff_info_id = ?", array($val["employee_name"]));
			    $emloyee_name = $query->row_array();
				echo'
				<tr>
				<td class="no">'.$i.'</td> 
				<td class="desc">'.date('d/m/Y',strtotime($val['adv_date'])).'</td>
				<td class="unit">'.$emloyee_name['employee_name'].'</td>
				<td class="unit">'.$val["employee_id"].'</td>
				<td class="unit">'.$val["advance_amount"].'</td>
			 </tr>';
			$i++;
			 $advance_value = is_numeric($val["advance_amount"]) ? $val["advance_amount"] : 0;
			 $total +=$advance_value;
				 }
		}else{
			echo'
			<tr >
			<td class="no"></td>
			<td class="desc"></td>
			<td class="unit"></td>
			<td class="unit"></td>
			<td class="unit"></td>
		</tr>';
		$total = 0.00 ;
		}?>
		<tfoot>
			<tr>
			<th colspan="4" class="text-end">TOTAL : </th>
			<th>₹ <?= $total ?></th>
			</tr>
		</tfoot>
		</tbody>
	</table>
</div>

<?php endif;?>

	   <br>
</div>

<!--Bottom content start here -->
<form id="Download_Print_Form" action="" method="post">
<input type="hidden" id="html_data" name="html_data" value="" />
<input type="hidden" id="type_PDF_PRINT" name="type" value="" />

	  <section class="agency-bottom-content agency-bottom-content-travel d-print-none" id="agency_bottom" style="display:none;">
		  <!--Print-download content start here -->
		  <div class="invo-buttons-wrap">
			  <div class="invo-print-btn invo-btns">
				  <a href="javascript:(0)" class="print-btn" id="printPDF">
					  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						  <g clip-path="url(#clip0_10_61)">
							  <path d="M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V11C21 10.4696 20.7893 9.96086 20.4142 9.58579C20.0391 9.21071 19.5304 9 19 9H5C4.46957 9 3.96086 9.21071 3.58579 9.58579C3.21071 9.96086 3 10.4696 3 11V15C3 15.5304 3.21071 16.0391 3.58579 16.4142C3.96086 16.7893 4.46957 17 5 17H7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							  <path d="M17 9V5C17 4.46957 16.7893 3.96086 16.4142 3.58579C16.0391 3.21071 15.5304 3 15 3H9C8.46957 3 7.96086 3.21071 7.58579 3.58579C7.21071 3.96086 7 4.46957 7 5V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							  <path d="M7 15C7 14.4696 7.21071 13.9609 7.58579 13.5858C7.96086 13.2107 8.46957 13 9 13H15C15.5304 13 16.0391 13.2107 16.4142 13.5858C16.7893 13.9609 17 14.4696 17 15V19C17 19.5304 16.7893 20.0391 16.4142 20.4142C16.0391 20.7893 15.5304 21 15 21H9C8.46957 21 7.96086 20.7893 7.58579 20.4142C7.21071 20.0391 7 19.5304 7 19V15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						  </g>
						  <defs>
							  <clipPath id="clip0_10_61">
								  <rect width="24" height="24" fill="white"/>
							  </clipPath>
						  </defs>
					  </svg>
					  <span class="inter-700 medium-font">Print</span>
				  </a>
			  </div>
			  <div class="invo-down-btn invo-btns">
				  <a class="download-btn" id="generatePDF">
					  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_5_246)">
						  <path d="M4 17V19C4 19.5304 4.21071 20.0391 4.58579 20.4142C4.96086 20.7893 5.46957 21 6 21H18C18.5304 21 19.0391 20.7893 19.4142 20.4142C19.7893 20.0391 20 19.5304 20 19V17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 11L12 16L17 11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 4V16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_5_246"><rect width="24" height="24" fill="white"/></clipPath></defs>
					  </svg>
					  <span class="inter-700 medium-font">Download</span>
				  </a>
			  </div>
		  </div>
	</section>
		  <!--Print-download content end here -->
</form>

</body>
</html>


<!--Invoice Wrap End here -->
<script src="<?php echo base_url(); ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jspdf.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/html2canvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.js"></script>
<script>

$(document).ready(function () {

    var pdf = ('<?= isset($type)  && $type == 'pdf' ?>' ? 'true' : 'false');
    var print = ('<?= isset($type)  && $type == 'print' ?>' ? 'true' : 'false');
    if(pdf == 'true'){
		var downloadSection = $('.Print_Content').html();
		$('#html_data').val(downloadSection);
		$('#type_PDF_PRINT').val('pdf');
		var url = '<?= base_url() ?>download_pdf';
		$('#Download_Print_Form').attr('action', url);
		$('#Download_Print_Form').submit();
    }
    if(print == 'true'){
      var downloadSection = $('.Print_Content').html();
      $('#html_data').val(downloadSection);
      $('#type_PDF_PRINT').val('print');
      var url = '<?= base_url() ?>download_pdf';
      $('#Download_Print_Form').attr('action', url);
       $('#Download_Print_Form').submit();
	}

});
</script>	