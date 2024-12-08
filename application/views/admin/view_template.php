
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
          #notices {
            padding-left: 6px;
            border-left: 6px solid #bd9653;
          }
          #notices .notice {
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
          .flowchart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            font-family: Arial, sans-serif;
        }
        .flowchart-item {
            padding: 5px 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            margin: 0 10px;
            border-radius: 5px;
            position: relative;
        }
        .flowchart-item:not(:last-child)::after {
            content: "➔";
            position: absolute;
            right: -22px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: #333;
        }

	.last-item {
		background-color: red;
		color: white;
	}
        </style>
  </head>
  <body>
    <div id="download_section">
    <div id="watermark"></div> 
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
    <main>

<!-- NagarGarden  Profile -->
    
    <?php if($title == 'Nagar Profile'): ?>

      <div id="details" class="clearfix">
        <table class="table_custom">
        <tr>
        <td class="left_align_text">
        <div id="client">
          <h1><?=(isset($title) ? $title: '') ?></h1>
        </div>
        </td>
        <td class="right_align_text">
        <div id="invoice">
          <h4><b>Nagar/Garden Name : </b><i><?= (isset($get_prop) ? $get_prop['property_name'] : '') ?></i></h4>
          <div class="date"><b>Date of Created: <?= (isset($get_prop) ? date('d/m/Y',strtotime($get_prop['created_at'])) : '') ?></b></div>
          <div class="date"><b>District:</b> <?= (isset($get_prop) ? $get_prop['district'] : '') ?></div>
          <div class="date"><b>Taluk:</b> <?= (isset($get_prop) ? $get_prop['taluk_name'] : '') ?></div>
          <div class="date"><b>Village / Town:</b> <?= (isset($get_prop) ? $get_prop['village_town'] : '') ?></div>
        </div>
      </div>
      </td>
      </tr>

      </table>

      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">Plot No</th>
            <th class="desc">Plot Extension</th>
            <th class="unit">East</th>
            <th class="unit">West</th>
            <th class="unit">North</th>
            <th class="unit">South</th>
            <th class="unit">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php if(!empty($get_plot_details)){
                                     foreach($get_plot_details as $val){
                                        echo'
                                        <tr style="text-align:center;" class="invo-tb-row">
										<td class="no">'.$val["plot_no"].'</td>
										<td class="desc">'.$val["plot_extension"].'</td>
										<td class="unit">'.$val["north"].'</td>
										<td class="unit">'.$val["east"].'</td>
										<td class="unit">'.$val["west"].'</td>
										<td class="unit">'.$val["south"].'</td>
										<td class="unit">'.$val["status"].'</td>
									</tr>';
                                     }
                                }else{
                                    echo'
                                    <tr class="invo-tb-row table-bg">
                                    <td class="unit"></td>
                                    <td class="unit"></td>
                                    <td class="unit"></td>
                                    <td class="unit"></td>
                                </tr>';
                                }?>

        </tbody>
      </table>
 <br>
 <br>
				         <table>
                  <tr>
                    <td class="total">Patta / Chitta No </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['patta_chitta'] : '') ?></td>
                    <td class="unit">T.S.No </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['t_s_no'] : '') ?></td>
                  </tr>
                  <tr>
                    <td class="total">Ward/Block </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['ward_block'] : '') ?></td>
                    <td class="unit">Land Mark </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['land_mark'] : '') ?></td>
                  </tr>
                  <tr>
                    <td class="total">DTCP No </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['dctp_no'] : '') ?></td>
                    <td class="unit">RERA No </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['rero_no'] : '') ?></td>
                  </tr>
                  <tr>
                    <td class="total">Nagar/Garden Total Extension in Sqft/Sqmt </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['total_entension'] : '') ?></td>
                    <td class="unit">Nagar/Garden Total No of Plots </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['total_no_plots'] : '') ?></td>
                  </tr>
                  <tr>
                    <td class="total">Nagar/Garden Sale Extension in Sqft/Sqmt </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['sales_extention'] : '') ?></td>
                    <td class="unit">Park Extension in Sqft/Sqmt </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['park_extension'] : '') ?></td>
                  </tr>
                  <tr>
                    <td class="total">Road Extension in Sqft/Sqmt </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['road_extension'] : '') ?></td>
                    <td class="unit">Eb Line </td> <td> :  </td><td> <?= (isset($get_prop) ? (($get_prop['eb_line'] == '1') ? 'Yes' : 'No') : '') ?></td>
                  </tr>
                  <tr>
                    <td class="total">Tree Saplings </td> <td> :  </td><td> <?= (isset($get_prop) ? (($get_prop['tree_sapling'] == '1') ? 'Yes' : 'No') : '') ?></td>
                    <td class="unit">Water Tank </td> <td> :  </td><td> <?= (isset($get_prop) ? (($get_prop['water_tank'] == '1') ? 'Yes' : 'No') : '') ?></td>
                  </tr>
                  <tr>
                    <td class="total">Land Purchased RS.No </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['land_purchased_no'] : '') ?></td>
                    <td class="unit">Land UnPurchased RS.No </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['land_unpurchased_no'] : '') ?></td>
                  </tr>
                 </table>
                 <br>
                 <br>
                       
							<table class="">
								<thead>
                                    <th colspan="4" class="total">REGISTRATION OFFICE DETAILS</th>
                                </thead>
								<tbody>
									<tr class="invo-tb-row table-bg">
										<td class="font-sm unit">Registration District</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>
										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_district'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row">
										<td class="font-sm unit">Registration Sub - District</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>
										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_sub_district'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row table-bg">
										<td class="font-sm unit">Town/Village</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>

										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_town_village'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row">
										<td class="font-sm unit">Revenue Taluk</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>

										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_revenue_taluk'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row table-bg">
										<td class="font-sm unit">Sub Registrar</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>
										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['sub_reg'] : '') ?></td>
									</tr>
								</tbody>
							</table>
                        <br>
                 <br>

    
      <?php endif;?>


      <!-- Register plot  -->

      <?php if($title == 'Register Plot'): ?>

<div id="details" class="clearfix">
  <table class="table_custom">
  <tr>
  <td class="left_align_text">
  <div id="client">
    <h1><?=(isset($title) ? $title: '') ?></h1>
  </div>
  </td>
  <td class="right_align_text">
  <div id="invoice">
    <h4><b>Nagar/Garden Name : </b><i><?= (isset($property_name) ? $property_name['property_name'] : '') ?></i></h4>
    <div class="date"><b>Date of Created : <?= (isset($get_prop) ? date('d/m/Y',strtotime($get_prop['created_date'])) : '') ?></b></div>
    <div class="date"><b>S.No : </b> <?= (isset($get_prop) ? $get_prop['s_no'] : '') ?></div>
    <h5><b>Payment Mode : </b> <?= (isset($get_prop) ? $get_prop['mode_payment'] : '') ?></h5>
    <h5><b> <?= (isset($get_prop) && $get_prop['mode_payment'] == 'Cash' ? 'Amount' : 'Payment No') ?> : </b> <?= (isset($get_prop)  ? $get_prop['mode_payment_value'] : '') ?></h5>
  </div>
</div>
</td>
</tr>

</table>

<br>
<br>
<table>
<th colspan="6" class="total">BUYER DETAILS</th>
            <tr>
              <td class="total">Buyer Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_gender'] : '') ?>. <?= (isset($get_prop) ? $get_prop['buyer_name'] : '') ?></td>
              <td class="unit">Buyer Father Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['father_rel'] : '') ?>. <?= (isset($get_prop) ? $get_prop['father_name'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">District </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_district'] : '') ?></td>
              <td class="unit">Pincode </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_pincode'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Taluk Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_taluk_name'] : '') ?></td>
              <td class="unit">Village/Town Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_village_town'] : '') ?></td>
           
            </tr>
            <tr>
              <td class="total">Street Address </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_address'] : '') ?></td>
              <td class="unit">Phone Number 1 </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['phone_number'] : '') ?></td>
            
            </tr>
            <tr>
              <td class="total">Phone Number 2 </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_phone_number_2'] : '') ?></td>
              <td class="unit">Id Proof </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['id_proof_select'] : '') ?></td>
           
            </tr>  <tr>
              <td class="total">Proof No</td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['id_proof'] : '') ?></td>
            <td class="unit"></td><td></td><td></td>
            </tr>
    </table>
<br>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th class="no">Plot No</th>
      <th class="desc">Plot Extension</th>
      <th class="unit">East</th>
      <th class="unit">West</th>
      <th class="unit">North</th>
      <th class="unit">South</th>
      <th class="unit">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php if(!empty($get_plot_details)){
                               foreach($get_plot_details as $val){
                                  echo'
                                  <tr style="text-align:center;" class="invo-tb-row">
              <td class="no">'.$val["plot_no"].'</td>
              <td class="desc">'.$val["plot_extension"].'</td>
              <td class="unit">'.$val["north"].'</td>
              <td class="unit">'.$val["east"].'</td>
              <td class="unit">'.$val["west"].'</td>
              <td class="unit">'.$val["south"].'</td>
              <td class="unit">'.$val["status"].'</td>
            </tr>';
                               }
                          }else{
                              echo'
                              <tr class="invo-tb-row table-bg">
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                          </tr>';
                          }?>

  </tbody>
</table>
<br>
<br>
           <table>
            <tr>
              <td class="total">Total Plot Extension in Sqft/Sqmt </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['total_plo_extension'] : '') ?></td>
              <td class="unit">Plot Registration Document Number </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['plot_reg_doc_num'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Plot registration Date </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['plot_reg_date'] : '') ?></td>
              <td class="unit">Patta / Chitta No </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['patta_chitta'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">T.S.No </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['t_s_no'] : '') ?></td>
              <td class="unit">Ward/Block </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['ward_block'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Plot Rate /Sqft </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['plot_rate'] : '') ?></td>
              <td class="unit">Name Refered By </td> <td> :  </td><td> <?= (isset($refer_by) ? $refer_by['employee_name'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Alternative Phone Number </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['alt_phone_number'] : '') ?></td>
              <td class="unit"> </td> <td>  </td><td> </td>
            </tr>
           </table>
           <br>
           <br>
                 
        <table class="">
          <thead>
                              <th colspan="4" class="total">REGISTRATION OFFICE DETAILS</th>
                          </thead>
          <tbody>
            <tr class="invo-tb-row table-bg">
              <td class="font-sm unit">Registration District</td>
              <td class="font-sm"></td>
              <td class="font-sm"></td>
              <td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_district'] : '') ?></td>
            </tr>
            <tr class="invo-tb-row">
              <td class="font-sm unit">Registration Sub - District</td>
              <td class="font-sm"></td>
              <td class="font-sm"></td>
              <td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_sub_district'] : '') ?></td>
            </tr>
            <tr class="invo-tb-row table-bg">
              <td class="font-sm unit">Town/Village</td>
              <td class="font-sm"></td>
              <td class="font-sm"></td>

              <td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_town_village'] : '') ?></td>
            </tr>
            <tr class="invo-tb-row">
              <td class="font-sm unit">Revenue Taluk</td>
              <td class="font-sm"></td>
              <td class="font-sm"></td>

              <td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_revenue_taluk'] : '') ?></td>
            </tr>
            <tr class="invo-tb-row table-bg">
              <td class="font-sm unit">Sub Registrar</td>
              <td class="font-sm"></td>
              <td class="font-sm"></td>
              <td class="font-sm"><?= (isset($get_prop) ? $get_prop['sub_reg'] : '') ?></td>
            </tr>
          </tbody>
        </table>
                  <br>
           <br>


<?php endif;?> 
 
<!-- Booked Plot -->


   <?php if($title == 'Booked Plot'): ?>

<div id="details" class="clearfix">
  <table class="table_custom">
  <tr>
  <td class="left_align_text">
  <div id="client">
    <h1><?=(isset($title) ? $title: '') ?></h1>
  </div>
  </td>
  <td class="right_align_text">
  <div id="invoice">
    <h4><b>Nagar/Garden Name : </b><i><?= (isset($property_name) ? $property_name['property_name'] : '') ?></i></h4>
    <div class="date"><b>Date of Created : <?= (isset($get_prop) ? date('d/m/Y',strtotime($get_prop['created_date'])) : '') ?></b></div>
    <div class="date"><b>S.No : </b> <?= (isset($get_prop) ? $get_prop['s_no'] : '') ?></div>
  </div>
</div>
</td>
</tr>

</table>

<br>
<br>
<table>
<th colspan="6" class="total">BUYER DETAILS</th>
            <tr>
              <td class="total">Buyer Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_gender'] : '') ?>. <?= (isset($get_prop) ? $get_prop['buyer_name'] : '') ?></td>
              <td class="unit">Buyer Father Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['father_rel'] : '') ?>. <?= (isset($get_prop) ? $get_prop['father_name'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">District </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_district'] : '') ?></td>
              <td class="unit">Pincode </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_pincode'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Taluk Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_taluk_name'] : '') ?></td>
              <td class="unit">Village/Town Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_village_town'] : '') ?></td>
           
            </tr>
            <tr>
              <td class="total">Street Address </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_address'] : '') ?></td>
              <td class="unit">Phone Number 1 </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['phone_number'] : '') ?></td>
            
            </tr>
            <tr>
              <td class="total">Phone Number 2 </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['buyer_phone_number_2'] : '') ?></td>
              <td class="unit">Id Proof </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['id_proof_select'] : '') ?></td>
           
            </tr>  <tr>
              <td class="total">Proof No</td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['id_proof'] : '') ?></td>
            <td class="unit"></td><td></td><td></td>
            </tr>
    </table>
<br>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th class="no">Plot No</th>
      <th class="desc">Plot Extension</th>
      <th class="unit">East</th>
      <th class="unit">West</th>
      <th class="unit">North</th>
      <th class="unit">South</th>
      <th class="unit">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php if(!empty($get_plot_details)){
                               foreach($get_plot_details as $val){
                                  echo'
                                  <tr style="text-align:center;" class="invo-tb-row">
              <td class="no">'.$val["plot_no"].'</td>
              <td class="desc">'.$val["plot_extension"].'</td>
              <td class="unit">'.$val["north"].'</td>
              <td class="unit">'.$val["east"].'</td>
              <td class="unit">'.$val["west"].'</td>
              <td class="unit">'.$val["south"].'</td>
              <td class="unit">'.$val["status"].'</td>
            </tr>';
                               }
                          }else{
                              echo'
                              <tr class="invo-tb-row table-bg">
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                          </tr>';
                          }?>

  </tbody>
</table>
<br>
<br>
           <table>
            <tr>
              <td class="total">Tentative Registration Date </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['tentative_reg_date'] : '') ?></td>
              <td class="unit">Name Refered By </td> <td> :  </td><td> <?= (isset($refer_by) ? $refer_by['employee_name'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Alternative Phone Number </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['alt_phone_number'] : '') ?></td>
              <td class="unit"> </td> <td>  </td><td> </td>
            </tr>
           </table>
           <br>
           <br>
                 
        <table class="">
          <thead>
                              <th colspan="4" class="total">PAYMENT DETAILS</th>
                          </thead>
          <tbody>
            <tr class="invo-tb-row table-bg">
              <td class="font-sm unit">Payment Mode</td>
              <td class="font-sm"></td>
              <td class="font-sm"></td>
              <td class="font-sm"><?= (isset($get_prop) ? $get_prop['mode_payment'] : '') ?></td>
            </tr>
            <tr class="invo-tb-row">
              <td class="font-sm unit">Payment Mode No</td>
              <td class="font-sm"></td>
              <td class="font-sm"></td>
              <td class="font-sm"><?= (isset($get_prop) ? $get_prop['mode_payment_value'] : '') ?></td>
            </tr>
            <tr class="invo-tb-row table-bg">
              <td class="font-sm unit">Advance Amount for Plot</td>
              <td class="font-sm"></td>
              <td class="font-sm"></td>

              <td class="font-sm"><?= (isset($get_prop) ? $get_prop['adv_amount_plot'] : '') ?></td>
            </tr>
            <tr class="invo-tb-row">
              <td class="font-sm unit">Balance Amount for Plot</td>
              <td class="font-sm"></td>
              <td class="font-sm"></td>

              <td class="font-sm"><?= (isset($get_prop) ? $get_prop['bal_amount_for_plot'] : '') ?></td>
            </tr>
        
          </tbody>
        </table>
                  <br>
           <br>

<?php endif;?> 
 
   <!-- Billing Receipt -->


   <?php if($title == 'Billing Receipt'): ?>

<div id="details" class="clearfix">
  <table class="table_custom">
  <tr>
  <td class="left_align_text">
  <div id="client">
  
    <h4><b>Customer Name : </b><?= (isset($customer_name) ? $customer_name['buyer_name'] : '') ?></h4>
    <div class="date"><b>Address : </b></b> <?= (isset($customer_name) ? $customer_name['father_rel'] : '') ?> . <?= (isset($customer_name) ? $customer_name['father_name'] : '') ?><br> <?= (isset($get_prop) ? $get_prop['address'] : '') ?></div>
    <div class="date"><b>Mobile: </b><?= (isset($get_prop) ? $get_prop['phone_number'] : '') ?> </div>
  </div>
  </td>
  <td class="right_align_text">
  <div id="invoice">
    <h4><b>Bill ID : </b><i><?= (isset($get_prop) ? $get_prop['bill_id'] : '') ?></i></h4>
    <div class="date"><b>Nagar/Garden Name : </b> <?= (isset($property_name) ? $property_name['property_name'] : '') ?></div>
    <div class="date"><b>Date of Billing : <?= (isset($get_prop) ? date('d/m/Y',strtotime($get_prop['date_time'])) : '') ?></b></div>
    <div class="date"><b>Person Incharge : <?= (isset($head_off) ? $head_off['employee_name'] : '') ?></b></div>
    <div class="date"><b>Phone : <?= (isset($head_off) ? $head_off['phone_number_1'] : '') ?></b></div>
  </div>
</div>
</td>
</tr>

</table>

<br>
<br>
<table border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th class="no">Plot No</th>
      <th class="desc">Plot Extension</th>
      <th class="unit">East</th>
      <th class="unit">West</th>
      <th class="unit">North</th>
      <th class="unit">South</th>
      <th class="unit">Plot Amount</th>
    </tr>
  </thead>
  <tbody>

  <?php 

  $sub_total = 0;
  if(!empty($get_plot_details)){
                               foreach($get_plot_details as $val){
                                  echo'
                            <tr style="text-align:center;" class="invo-tb-row">
                            <td class="no">'.$val["plot_no_"].'</td>
                            <td class="desc">'.$val["plot_extension_"].'</td>
                            <td class="unit">'.$val["north_"].'</td>
                            <td class="unit">'.$val["east_"].'</td>
                            <td class="unit">'.$val["west_"].'</td>
                            <td class="unit">'.$val["south_"].'</td>
                            <td class="unit">₹'.$val["plot_amount"].'</td>
                          </tr>';
                          $sub_total +=$val["plot_amount"];
                               }
                          }else{
                              echo'
                              <tr class="invo-tb-row table-bg">
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                              <td class="unit"></td>
                          </tr>';
                          }?>

  </tbody>
  <tfoot>
          <tr>
            <td colspan="3"></td>
            <td colspan="3">SUBTOTAL</td>
            <td>₹<?= $sub_total ?></td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="3">Paid Amount</td>
            <td>₹<?= (isset($get_prop) ? $get_prop['mode_payment_value'] : '') ?> </td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="3">Advance Amount</td>
            <td>₹<?= (isset($get_prop)  && $get_prop['adv_amount_plot'] != '' ? $get_prop['adv_amount_plot']  : 0) ?> </td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="3">Balance Amount</td>
            <td>₹<?= (isset($get_prop) ? $get_prop['bal_amount_plot'] : '') ?> </td>
          </tr>
          <!-- <tr>
            <td colspan="3"></td>
            <td colspan="3">GRAND TOTAL</td>
            <td>₹<?php echo  (isset($get_prop) ? $get_prop['phone_number'] : ''); ?> </td>
          </tr> -->
        </tfoot>
</table>
<br>
<br>
       
<?php endif;?> 

<!-- Staff Info -->


<?php if($title == 'Staff Info'): ?>

<div id="details" class="clearfix">
  <table class="table_custom">
  <tr>
  <td class="left_align_text">
  <div id="client">
    <h1><?=(isset($title) ? $title: '') ?></h1>
  <div style="margin:10px;">
  <?php
		if(isset($customer_image)  && !empty($customer_image)){ ?>
		<img src="<?= base_url() .$customer_image[0]['tbl_file_path']  ?>" alt="Profile-Img" width="100" height="100">
		<?php } else{?>
			<img src="<?= base_url() ?>assets/img/avatars/1.png" alt="Profile-Img" width="100" height="100">
		<?php }?>
  </div>
  </div>

  </td>
  <td class="right_align_text">
  <div id="invoice">
    <h4><b>Employee Id : </b><i><?= (isset($get_prop) ? $get_prop['employee_id'] : '') ?></i></h4>
    <div class="date"><b>Employee Name  : </b> <?= (isset($get_prop) ? $get_prop['employee_name'] : '') ?></div>
    <div class="date"><b>Head Officer : </b> <?= (isset($head_off) ? $head_off['employee_name'] : '') ?></div>
  </div>
</div>
</td>
</tr>

</table>

<br>
<br>
<br>
<br>
<br>
<table>
<th colspan="6" class="total">EMPLOYEE DETAILS</th>
            <tr>
              <td class="total">Father Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['father_name'] : '') ?></td>
              <td class="unit">District </td> <td> :  </td><td><?= (isset($get_prop) ? $get_prop['district'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Taluk Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['taluk_name'] : '') ?></td>
              <td class="unit">Pincode </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['pincode'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Street Address </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['street_address'] : '') ?></td>
              <td class="unit">Village/Town Name </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['village_town'] : '') ?></td>
           
            </tr>
            <tr>
              <td class="total">Total Plot Sold </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['total_plot_sold'] : '') ?></td>
              <td class="unit">Phone Number 1 </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['phone_number_1'] : '') ?></td>
            
            </tr>
            <tr>
              <td class="total">Phone Number 2 </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['phone_number_2'] : '') ?></td>
              <td class="unit">Id Proof </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['id_proof_select'] : '') ?></td>
           
            </tr> 
             <tr>
              <td class="total">Proof No</td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['id_proof'] : '') ?></td>
              <td class="unit">Date Of Birth</td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['date_of_birth'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Branch Name</td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['pan_card'] : '') ?></td>
              <td class="unit">Pan Card</td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['pan_card'] : '') ?></td>
            </tr>
            <tr>
              <td class="total">Nominee</td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['nominee'] : '') ?></td>
              <td class="unit">Nominee Relationship</td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['nominee_relationship'] : '') ?></td>
            </tr>
            <tr ><td colspan="6" class=""></td></tr>
            <tr ><td colspan="6" class="total">BANK DETAILS</td></tr>
            <tr>
              <td class="total">Bank Account No </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['bank_ac_no'] : '') ?></td>
              <td class="unit">IFSC Code </td> <td> :  </td><td> <?= (isset($get_prop) ? $get_prop['IFSC_code'] : '') ?></td>
            </tr>
    </table>
<br>
<br>

<div class="flowchart-container">
        <?php if (!empty($flow_chart)) : ?>
            <?php foreach ($flow_chart as $index => $item) : ?>
                <div class="flowchart-item <?= $index === $last_index ? 'last-item' : '' ?>"><?= $item ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <br>
<br>

<table border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th class="no">User Name</th>
      <th class="desc">Password</th>
      <th class="unit">Type</th>
    </tr>
  </thead>
  <tbody>
    <tr>
					<td class="no"><?= (isset($header_det) ? $header_det['username'] : '') ?></td>
					<td class="desc"><?= (isset($header_det) ? $header_det['password'] : '') ?></td>
					<td class="unit"><?= (isset($header_det) ? $header_det['type'] : '') ?></td>
				</tr>
  </tbody>
</table>
<br>
<br>

<?php endif;?> 




    </main>
    </div>
      <footer>
      This page was created on a computer and is valid without the signature and seal.
    </footer>
    </div>

      <form id="Download_Print_Form" action="" method="post">
      <input type="hidden" id="html_data" name="html_data" value="" />
      <input type="hidden" id="type_PDF_PRINT" name="type" value="" />
      
			<section class="agency-bottom-content agency-bottom-content-travel d-print-none" id="agency_bottom">
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
      </form>

  </body>
</html>


    <script src="<?php echo base_url(); ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jspdf.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/html2canvas.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.js"></script>
    <script>

      $(document).ready(function () {

    $('#generatePDF').on('click', function () {
      var downloadSection = $('.Print_Content').html();
      $('#html_data').val(downloadSection);
      $('#type_PDF_PRINT').val('pdf');
      var url = '<?= base_url() ?>download_pdf';
      $('#Download_Print_Form').attr('action', url);
       $('#Download_Print_Form').submit();
    });

  $('#printPDF').on('click', function () {
      var downloadSection = $('.Print_Content').html();
      $('#html_data').val(downloadSection);
      $('#type_PDF_PRINT').val('print');
      var url = '<?= base_url() ?>download_pdf';
      $('#Download_Print_Form').attr('action', url);
       $('#Download_Print_Form').submit();
    });
  });

    </script>
