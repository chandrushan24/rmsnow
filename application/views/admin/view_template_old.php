<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link href="assets/images/favicon/icon.png" rel="icon">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/custom_css_view.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/media_quey_css_view.css">
    <style>
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

.travel-txt:before {
	content: "";
	background-image: url('<?= base_url() ?>assets/img/view_list/light-grey.svg');
	width: 100%;
	height: 100%;
	position: absolute;
	background-repeat: no-repeat;
	background-size: cover;
	top: 20px;
	z-index: 1;
}
    .travel-txt-bg {
	color:white;
	text-align: center;
	font-family: Inter;
	font-size: 40px;
	font-style: normal;
	font-weight: 300;
	line-height: 40px;
	letter-spacing: 10px;
	background: url('<?= base_url() ?>assets/img/view_list/txt-bg.svg');
	background-repeat: no-repeat;
	width: 100%;
	background-size: cover;
	padding: 30px 0;
	top: 10px;
	position: relative;
	z-index: 2;
   }
    </style>
</head>
<body>


	<!--Invoice wrap start here -->
	<div class="invoice_wrap travel-invoice">
		<div class="invoice-container">
			<div class="invoice-content-wrap" id="download_section">
				<!--Header start here -->
				<header class="bg-black" id="invo_header">
					<div class="travel-contact-sec ">
						<div class="invoice-header-contact">
							<div class="invo-cont-wrap invo-contact-wrap">
								<div class="invo-social-icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_6_94)"><path d="M5 4H9L11 9L8.5 10.5C9.57096 12.6715 11.3285 14.429 13.5 15.5L15 13L20 15V19C20 19.5304 19.7893 20.0391 19.4142 20.4142C19.0391 20.7893 18.5304 21 18 21C14.0993 20.763 10.4202 19.1065 7.65683 16.3432C4.8935 13.5798 3.23705 9.90074 3 6C3 5.46957 3.21071 4.96086 3.58579 4.58579C3.96086 4.21071 4.46957 4 5 4" stroke="#84CC16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15 7C15.5304 7 16.0391 7.21071 16.4142 7.58579C16.7893 7.96086 17 8.46957 17 9" stroke="#84CC16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15 3C16.5913 3 18.1174 3.63214 19.2426 4.75736C20.3679 5.88258 21 7.4087 21 9" stroke="#84CC16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><clipPath id="clip0_6_94"><rect width="24" height="24" fill="#84CC16"></rect></clipPath></defs></svg>
								</div>
								<div class="invo-social-name">
									<a href="tel:<?=(isset($company) ? $company['contact1'] : '') ?>" class="font-18">+91 <?=(isset($company) ? $company['contact1'] : '') ?></a>
								</div>
							</div>
							<div class="invo-cont-wrap">
								<div class="invo-social-icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_6_108)"><path d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z" stroke="#84CC16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 7L12 13L21 7" stroke="#84CC16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><clipPath id="clip0_6_108"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg>
								</div>
								<div class="invo-social-name">
									<a href="mailto:<?=(isset($company) ? $company['email'] : '') ?>" class="font-18"><?=(isset($company) ? $company['email'] : '') ?></a>
								</div>
							</div>
						</div>
					</div>	
					<div class="travel-logo-sec">
						<div class="travel-logo-sec-wrap">
							<div class="travel-logo">
								<a href="travel_invoice.html"><img src="<?= base_url() ?>assets/img/view_list/logo.png" alt="logo"></a>
							</div>
							<div class="travel-txt">
								<h3 class="travel-txt-bg"><?= (isset($title) ? $title: '') ?></h3>
							</div>
						</div>
					</div>	
				</header>
				<!--Header end here -->

	<?php if($title == 'Nagar Profile'): ?>

				<!--Invoice content start here -->
				<section class="agency-service-content ecommerce-invoice-content" id="travel_invoice">
					<div class="travel-bottom-sec-img">
						<img src="<?= base_url() ?>assets/img/view_list/green-bg.svg" alt="background-img">
					</div>	
					<div class="container">
						<!--Header invoice details start here -->
						<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel ">
							<div class="bus-invo-num bus-invo-num-travel ">
								<div class="font-md color-light-black">Nagar/Garden Name :</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['property_name'] : '') ?></div>
							</div>
							<div class="bus-invo-date bus-invo-num-travel">
								<div class="font-md color-light-black">Created Date:</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? date('d/m/Y',strtotime($get_prop['created_at'])) : '') ?></div>
							</div>
						</div>
						<!--Header invoice details end here -->
						<!--Invoice owner name start here -->
						<div class="invoice-owner-conte-wrap pt-40">
							<div class="invo-to-wrap">
								<div class="invoice-to-content">
									<p class="font-md color-light-black">Nagar/Garden Place :</p>
									<h2 class="travel-color font-md pt-10 "><?= (isset($get_prop) ? $get_prop['village_town'] : '') ?></h2>
									<p class="font-md-grey color-grey pt-10">Taluk: <?= (isset($get_prop) ? $get_prop['taluk_name'] : '') ?> <br> District: <?= (isset($get_prop) ? $get_prop['district'] : '') ?></p>
								</div>
							</div>
							<!-- <div class="invo-pay-to-wrap">
								<div class="invoice-pay-content">
									<p class="font-md color-light-black">Agency Info:</p>
									<h2 class="travel-color font-lg pt-10 ">Digital Invoico Stadium</h2>
									<p class="font-md-grey color-grey pt-10">4510 E Dolphine St, IN 3526<br> Hills Road, New York, USA</p>
								</div>
							</div> -->
						</div>
						<!--Invoice owner name end here -->
						<!--Travel detail start here -->
                        <br>
						<div class="font-md color-light-black">Nagar/Garder Details :</div>
						<div class="bus-detail-wrap travel-detail-wrap">
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Patta / Chitta No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['patta_chitta'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">T.S.No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['t_s_no'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Ward/Block</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['ward_block'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Land Mark</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['land_mark'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">DTCP No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['dctp_no'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">RERA No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['rero_no'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Nagar/Garden Total Extension in Sqft/Sqmt</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['total_entension'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Nagar/Garden Total No of Plots</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['total_no_plots'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Nagar/Garden Sale Extension in Sqft/Sqmt</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['sales_extention'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Park Extension in Sqft/Sqmt</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['park_extension'] : '') ?></div>
							</div>
							<div class="bus-detail-col  border-bottom travel">
								<div class="font-md color-light-black bus-type">Road Extension in Sqft/Sqmt</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['road_extension'] : '') ?></div>
							</div>
							<div class="bus-detail-col  border-bottom travel">
								<div class="font-md color-light-black bus-type">Eb Line</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? (($get_prop['eb_line'] == '1') ? 'Yes' : 'No') : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Tree Saplings</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? (($get_prop['tree_sapling'] == '1') ? 'Yes' : 'No') : '') ?></div>
							</div>
                            <div class="bus-detail-col  border-bottom travel">
								<div class="font-md color-light-black bus-type">Water Tank</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? (($get_prop['water_tank'] == '1') ? 'Yes' : 'No') : '') ?></div>
							</div>
                            <div class="bus-detail-col seat-col">
								<div class="font-md color-light-black bus-type">Land Purchased RS.No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['land_purchased_no'] : '') ?></div>
							</div>
                            <div class="bus-detail-col seat-col">
								<div class="font-md color-light-black bus-type">Land UnPurchased RS.No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['land_unpurchased_no'] : '') ?></div>
							</div>
                            
						</div>
						<!--Travel detail end here -->
						<!--Travel table data start here -->
                       
						<div class="table-wrapper pt-40 ">
							<table class="invoice-table travel-table  travel-detail-wrap2">
								<thead>
                                    <th colspan="4" style="color:black;font-weight:bold;text-align:center;padding:10px;">REGISTRATION OFFICE DETAILS</th>
                                </thead>
								<tbody class="invo-tb-body">
									<tr class="invo-tb-row table-bg">
										<td class="font-sm">Registration District</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>
										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_district'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row">
										<td class="font-sm">Registration Sub - District</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>
										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_sub_district'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row table-bg">
										<td class="font-sm">Town/Village</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>

										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_town_village'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row">
										<td class="font-sm">Revenue Taluk</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>

										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_revenue_taluk'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row table-bg">
										<td class="font-sm">Sub Registrar</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>

										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['sub_reg'] : '') ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!--Travel table data end here -->


                        <!--Travel table data start here -->
                        <br>
						<div class="font-md color-light-black">Plot Details :</div>
						<div class="table-wrapper pt-40">
							<table class="invoice-table travel-table">
								<thead>
									<tr class="invo-tb-header">
										<th class="font-md color-light-black">Plot No</th>
										<th class="font-md color-light-black fit-price">Plot Extension</th>
										<th class="font-md color-light-black flight-re-price-wid">North</th>
										<th class="font-md color-light-black fit-price">East</th>
                                        <th class="font-md color-light-black flight-re-price-wid">West</th>
                                        <th class="font-md color-light-black fit-price">South</th>
										<th class="font-md color-light-black flight-re-price-wid">Status</th>
									</tr>
								</thead>
								<tbody class="invo-tb-body">
                                    <?php if(!empty($get_plot_details)){
                                     foreach($get_plot_details as $val){
                                        echo'
                                        <tr style="text-align:center;" class="invo-tb-row">
										<td class="font-sm">'.$val["plot_no"].'</td>
										<td class="font-sm">'.$val["plot_extension"].'</td>
										<td class="font-sm">'.$val["north"].'</td>
										<td class="font-sm">'.$val["east"].'</td>
										<td class="font-sm">'.$val["west"].'</td>
										<td class="font-sm">'.$val["south"].'</td>
										<td class="font-sm">'.$val["status"].'</td>
									</tr>';
                                     }
                                }else{
                                    echo'
                                    <tr class="invo-tb-row table-bg">
                                    <td class="font-sm"></td>
                                    <td class="font-sm"></td>
                                    <td class="font-sm"></td>
                                    <td class="font-sm"></td>
                                </tr>';
                                }?>

								</tbody>
							</table>
						</div>

                       <?php endif;?>

<!-- -----------------------------------------------------------------------
                    Regiter Plot
---------------------------------------------------------------------- -->
                       <?php if($title == 'Register Plot'):?>

<!--Invoice content start here -->
				<section class="agency-service-content ecommerce-invoice-content" id="travel_invoice">
					<div class="travel-bottom-sec-img">
						<img src="<?= base_url() ?>assets/img/view_list/green-bg.svg" alt="background-img">
					</div>	
					<div class="container">
						<!--Header invoice details start here -->
						<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel ">
							<div class="bus-invo-num bus-invo-num-travel ">
								<div class="font-md color-light-black">Nagar/Garden Name :</div>
								<div class="font-md-grey color-grey"><?= (isset($property_name) ? $property_name['property_name'] : '') ?></div>
							</div>
							<div class="bus-invo-date bus-invo-num-travel">
								<div class="font-md color-light-black">Created Date:</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? date('d/m/Y',strtotime($get_prop['created_date'])) : '') ?></div>
							</div>
						</div>
						<!--Header invoice details end here -->
						<!--Invoice owner name start here -->
						<div class="invoice-owner-conte-wrap pt-40">
							<div class="invo-to-wrap">
								<div class="invoice-to-content">
									<p class="font-md color-light-black">S.No : <div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['s_no'] : '') ?></div></p>
								</div>
							</div>
							<!-- <div class="invo-pay-to-wrap">
								<div class="invoice-pay-content">
									<p class="font-md color-light-black">Agency Info:</p>
									<h2 class="travel-color font-lg pt-10 ">Digital Invoico Stadium</h2>
									<p class="font-md-grey color-grey pt-10">4510 E Dolphine St, IN 3526<br> Hills Road, New York, USA</p>
								</div>
							</div> -->
						</div>
						<!--Invoice owner name end here -->
						<!--Travel detail start here -->
                        <br>
						<div class="font-md color-light-black">Register Plot Details :</div>
						<div class="bus-detail-wrap travel-detail-wrap">
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Total Plot Extension in Sqft/Sqmt</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['total_plo_extension'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Plot Registration Document Number</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['plot_reg_doc_num'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Plot registration Date</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['plot_reg_date'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Patta / Chitta No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['patta_chitta'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">T.S.No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['t_s_no'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Ward/Block</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['ward_block'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Plot Rate /Sqft</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['plot_rate'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Name Refered By</div>
								<div class="font-md-grey color-grey"> : <?= (isset($refer_by) ? $refer_by['employee_name'] : '') ?></div>
							</div>
							<div class="bus-detail-col">
								<div class="font-md color-light-black bus-type">Alternative Phone Number</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['alt_phone_number'] : '') ?></div>
							</div>
                            
                            
						</div>
						<!--Travel detail end here -->
						<!--Travel table data start here -->
                       
						<div class="table-wrapper pt-40 ">
							<table class="invoice-table travel-table  travel-detail-wrap2">
								<thead>
                                    <th colspan="4" style="color:black;font-weight:bold;text-align:center;padding:10px;">REGISTRATION OFFICE DETAILS</th>
                                </thead>
								<tbody class="invo-tb-body">
									<tr class="invo-tb-row table-bg">
										<td class="font-sm">Registration District</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>
										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_district'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row">
										<td class="font-sm">Registration Sub - District</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>
										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_sub_district'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row table-bg">
										<td class="font-sm">Town/Village</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>

										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_town_village'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row">
										<td class="font-sm">Revenue Taluk</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>

										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['reg_revenue_taluk'] : '') ?></td>
									</tr>
									<tr class="invo-tb-row table-bg">
										<td class="font-sm">Sub Registrar</td>
										<td class="font-sm"></td>
										<td class="font-sm"></td>

										<td class="font-sm"><?= (isset($get_prop) ? $get_prop['sub_reg'] : '') ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!--Travel table data end here -->


                        <!--Travel table data start here -->
                        <br>
						<div class="font-md color-light-black">Plot Details :</div>
						<div class="table-wrapper pt-40">
							<table class="invoice-table travel-table">
								<thead>
									<tr class="invo-tb-header">
										<th class="font-md color-light-black">Plot No</th>
										<th class="font-md color-light-black fit-price">Plot Extension</th>
										<th class="font-md color-light-black flight-re-price-wid">North</th>
										<th class="font-md color-light-black fit-price">East</th>
                                        <th class="font-md color-light-black flight-re-price-wid">West</th>
                                        <th class="font-md color-light-black fit-price">South</th>
										<th class="font-md color-light-black flight-re-price-wid">Status</th>
									</tr>
								</thead>
								<tbody class="invo-tb-body">
                                    <?php if(!empty($get_plot_details)){
                                     foreach($get_plot_details as $val){
                                        echo'
                                        <tr style="text-align:center;" class="invo-tb-row">
										<td class="font-sm">'.$val["plot_no"].'</td>
										<td class="font-sm">'.$val["plot_extension"].'</td>
										<td class="font-sm">'.$val["north"].'</td>
										<td class="font-sm">'.$val["east"].'</td>
										<td class="font-sm">'.$val["west"].'</td>
										<td class="font-sm">'.$val["south"].'</td>
										<td class="font-sm">'.$val["status"].'</td>
									</tr>';
                                     }
                                }else{
                                    echo'
                                    <tr class="invo-tb-row table-bg">
                                    <td class="font-sm"></td>
                                    <td class="font-sm"></td>
                                    <td class="font-sm"></td>
                                    <td class="font-sm"></td>
                                </tr>';
                                }?>

								</tbody>
							</table>
						</div>
							<!--Travel detail start here -->
							<br>
							<div class="font-md color-light-black">Payment Details :</div>
							<br>

							<!--Header invoice details start here -->
						<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel " style="border:1px solid grey;padding:10px;">
							<div class="bus-invo-num bus-invo-num-travel ">
								<div class="font-md color-light-black">Payment Mode:</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['mode_payment'] : '') ?></div>
							</div>
							<div class="bus-invo-date bus-invo-num-travel">
								<div class="font-md color-light-black">Payment Mode No:</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['mode_payment_value'] : '') ?></div>
							</div>
						</div>
						<!--Header invoice details end here -->
                         <br>
						<div class="font-md color-light-black">Customer Details :</div>
						<div class="bus-detail-wrap travel-detail-wrap">
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Buyer Name</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_gender'] : '') ?>. <?= (isset($get_prop) ? $get_prop['buyer_name'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Buyer Father Name</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['father_rel'] : '') ?>. <?= (isset($get_prop) ? $get_prop['father_name'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">District</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_district'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Pincode</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_pincode'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Taluk Name</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_taluk_name'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Village/Town Name</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_village_town'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Street Address</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_address'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Phone Number 1</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['phone_number'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Phone Number 2</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_phone_number_2'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Id Proof</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['id_proof_select'] : '') ?></div>
							</div>
							<div class="bus-detail-col">
								<div class="font-md color-light-black bus-type">Proof No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['id_proof'] : '') ?></div>
							</div>
                            
						</div>
						<!--Travel detail end here -->
						<?php endif;?>

					<!-- -----------------------------------------------------------------------
					Booked Plot
					---------------------------------------------------------------------- -->
				<?php if($title == 'Booked Plot'):?>

				<!--Invoice content start here -->
				<section class="agency-service-content ecommerce-invoice-content" id="travel_invoice">
					<div class="travel-bottom-sec-img">
						<img src="<?= base_url() ?>assets/img/view_list/green-bg.svg" alt="background-img">
					</div>	
					<div class="container">
						<!--Header invoice details start here -->
						<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel ">
							<div class="bus-invo-num bus-invo-num-travel ">
								<div class="font-md color-light-black">Nagar/Garden Name :</div>
								<div class="font-md-grey color-grey"><?= (isset($property_name) ? $property_name['property_name'] : '') ?></div>
							</div>
							<div class="bus-invo-date bus-invo-num-travel">
								<div class="font-md color-light-black">Created Date:</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? date('d/m/Y',strtotime($get_prop['created_date'])) : '') ?></div>
							</div>
						</div>
						<!--Header invoice details end here -->
						<!--Invoice owner name start here -->
						<div class="invoice-owner-conte-wrap pt-40">
							<div class="invo-to-wrap">
								<div class="invoice-to-content">
									<p class="font-md color-light-black">S.No : <div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['s_no'] : '') ?></div></p>
								</div>
							</div>
							<!-- <div class="invo-pay-to-wrap">
								<div class="invoice-pay-content">
									<p class="font-md color-light-black">Agency Info:</p>
									<h2 class="travel-color font-lg pt-10 ">Digital Invoico Stadium</h2>
									<p class="font-md-grey color-grey pt-10">4510 E Dolphine St, IN 3526<br> Hills Road, New York, USA</p>
								</div>
							</div> -->
						</div>
						<!--Invoice owner name end here -->
						<!--Travel detail start here -->
                        <br>
						<div class="font-md color-light-black">Booked Plot Details :</div>
						<div class="bus-detail-wrap travel-detail-wrap">
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Tentative Registration Date</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['tentative_reg_date'] : '') ?></div>
							</div>
							
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Name Refered By</div>
								<div class="font-md-grey color-grey"> : <?= (isset($refer_by) ? $refer_by['employee_name'] : '') ?></div>
							</div>
							<div class="bus-detail-col">
								<div class="font-md color-light-black bus-type">Alternative Phone Number</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['alt_phone_number'] : '') ?></div>
							</div>
                            
                            
						</div>
						<!--Travel detail end here -->
						
                        <!--Travel table data start here -->
                        <br>
						<div class="font-md color-light-black">Plot Details :</div>
						<div class="table-wrapper pt-40">
							<table class="invoice-table travel-table">
								<thead>
									<tr class="invo-tb-header">
										<th class="font-md color-light-black">Plot No</th>
										<th class="font-md color-light-black fit-price">Plot Extension</th>
										<th class="font-md color-light-black flight-re-price-wid">North</th>
										<th class="font-md color-light-black fit-price">East</th>
                                        <th class="font-md color-light-black flight-re-price-wid">West</th>
                                        <th class="font-md color-light-black fit-price">South</th>
										<th class="font-md color-light-black flight-re-price-wid">Status</th>
									</tr>
								</thead>
								<tbody class="invo-tb-body">
                                    <?php if(!empty($get_plot_details)){
                                     foreach($get_plot_details as $val){
                                        echo'
                                        <tr style="text-align:center;" class="invo-tb-row">
										<td class="font-sm">'.$val["plot_no"].'</td>
										<td class="font-sm">'.$val["plot_extension"].'</td>
										<td class="font-sm">'.$val["north"].'</td>
										<td class="font-sm">'.$val["east"].'</td>
										<td class="font-sm">'.$val["west"].'</td>
										<td class="font-sm">'.$val["south"].'</td>
										<td class="font-sm">'.$val["status"].'</td>
									</tr>';
                                     }
                                }else{
                                    echo'
                                    <tr class="invo-tb-row table-bg">
                                    <td class="font-sm"></td>
                                    <td class="font-sm"></td>
                                    <td class="font-sm"></td>
                                    <td class="font-sm"></td>
                                </tr>';
                                }?>

								</tbody>
							</table>
						</div>
							<!--Travel detail start here -->
							
						<!--Header invoice details end here -->
						<br>
						<div class="font-md color-light-black">Customer Details :</div>
						<div class="bus-detail-wrap travel-detail-wrap">
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Buyer Name</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_gender'] : '') ?>. <?= (isset($get_prop) ? $get_prop['buyer_name'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Buyer Father Name</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['father_rel'] : '') ?>. <?= (isset($get_prop) ? $get_prop['father_name'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">District</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_district'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Pincode</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_pincode'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Taluk Name</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_taluk_name'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Village/Town Name</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_village_town'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Street Address</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_address'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Phone Number 1</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['phone_number'] : '') ?></div>
							</div>
							<div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Phone Number 2</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['buyer_phone_number_2'] : '') ?></div>
							</div>
                            <div class="bus-detail-col border-bottom travel">
								<div class="font-md color-light-black bus-type">Id Proof</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['id_proof_select'] : '') ?></div>
							</div>
							<div class="bus-detail-col">
								<div class="font-md color-light-black bus-type">Proof No</div>
								<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['id_proof'] : '') ?></div>
							</div>
                            
						</div>
						<!--Travel detail end here -->
								
						<br>
							<div class="font-md color-light-black">Payment Details :</div>
							<br>

							<!--Header invoice details start here -->
						<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel " style="border:1px solid grey;padding:10px;">
							<div class="bus-invo-num bus-invo-num-travel ">
								<div class="font-md color-light-black">Payment Mode:</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['mode_payment'] : '') ?></div>
							</div>
							<div class="bus-invo-date bus-invo-num-travel">
								<div class="font-md color-light-black">Payment Mode No:</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['mode_payment_value'] : '') ?></div>
							</div>
						</div>

							<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel " style="border:1px solid grey;padding:10px;">

							<div class="bus-invo-num bus-invo-num-travel ">
								<div class="font-md color-light-black">Advance Amount for Plot:</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['adv_amount_plot'] : '') ?></div>
							</div>
							<div class="bus-invo-date bus-invo-num-travel">
								<div class="font-md color-light-black">Balance Amount for Plot:</div>
								<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['bal_amount_for_plot'] : '') ?></div>
							</div>
							</div>

						<!--Header invoice details end here -->
						<?php endif;?>


	<!-- -----------------------------------------------------------------------
					Staff Info
		---------------------------------------------------------------------- -->
	<?php if($title == 'Staff Info'):?>

<!--Invoice content start here -->
<section class="agency-service-content ecommerce-invoice-content" id="travel_invoice">
	<div class="travel-bottom-sec-img">
		<img src="<?= base_url() ?>assets/img/view_list/green-bg.svg" alt="background-img">
	</div>	

	

	<div class="container">
	<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel ">
	<div class="travel-bottom-sec-img">
		<?php
		if(isset($customer_image)  && !empty($customer_image)){ ?>
		<img src="<?= base_url() .$customer_image[0]['tbl_file_path']  ?>" alt="Profile-Img" width="150" height="150">
		<?php } else{?>
			<img src="<?= base_url() ?>assets/img/avatars/1.png" alt="Profile-Img" width="150" height="150">
		<?php }?>
	</div>
	</div>

		<!--Header invoice details start here -->
		<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel ">
			<div class="bus-invo-num bus-invo-num-travel ">
				<div class="font-md color-light-black">Employee Name :</div>
				<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['employee_name'] : '') ?></div>
			</div>
			<div class="bus-invo-date bus-invo-num-travel">
				<div class="font-md color-light-black">Employee Id:</div>
				<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['employee_id'] : '') ?></div>
			</div>
		</div>
		
		<!--Header invoice details start here -->
		<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel ">
			<div class="bus-invo-num bus-invo-num-travel ">
				<div class="font-md color-light-black">Role :</div>
				<div class="font-md-grey color-grey"><?= (isset($role_name) ? $role_name['role_name'] : '') ?></div>
			</div>
			<div class="bus-invo-date bus-invo-num-travel">
				<div class="font-md color-light-black">Head Officer :</div>
				<div class="font-md-grey color-grey"><?= (isset($head_off) ? $head_off['employee_name'] : '') ?></div>
			</div> 
		</div>
		
		<!--Travel detail start here -->
		<!--Travel detail start here -->
		<br>
		<div class="font-md color-light-black">Staff Details :</div>
		<div class="bus-detail-wrap travel-detail-wrap">
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Father Name</div>
				<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['father_name'] : '') ?></div>
			</div>
			
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">District</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['district']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Pincode</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['pincode']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Taluk Name</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['taluk_name']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Village / Town</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['village_town']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Street Address</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['street_address']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Total Plot Sold</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['total_plot_sold']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Phone Number 2</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['phone_number_1']  : '') ?></div>
			</div>

			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Phone Number 1</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['phone_number_2']  : '') ?></div>
			</div>
				<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Id Proof</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['id_proof_select'] : '') ?></div>
				</div>
				<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Proof No</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ? $get_prop['id_proof'] : '') ?></div>
				</div>
				<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Date Of Birth</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['date_of_birth']  : '') ?></div>
			</div>

				<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Branch Name</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['branch_name']  : '') ?></div>
			</div>

			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Pan Card</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['pan_card']  : '') ?></div>
			</div>

			<div class="bus-detail-col">
				<div class="font-md color-light-black bus-type">Nominee</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['nominee']  : '') ?></div>
			</div>
			
			<div class="bus-detail-col">
				<div class="font-md color-light-black bus-type">Nominee Relationship</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['nominee_relationship']  : '') ?></div>
			</div>
		</div>
		<!--Travel detail end here -->
		
		<br>
			<div class="font-md color-light-black">Bank Details :</div>
			<br>

			<!--Header invoice details start here -->
		<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel " style="border:1px solid grey;padding:10px;">
			<div class="bus-invo-num bus-invo-num-travel ">
				<div class="font-md color-light-black">Bank Account No : </div>
				<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['bank_ac_no'] : '') ?></div>
			</div>
			<div class="bus-invo-date bus-invo-num-travel">
				<div class="font-md color-light-black">IFSC Code : </div>
				<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['IFSC_code'] : '') ?></div>
			</div>
		</div>

		<!--Header invoice details end here -->

		<!--Travel table data start here -->
		<br>
		<div class="font-md color-light-black">User Detail :</div>
		<div class="table-wrapper pt-20">
			<table class="invoice-table travel-table">
				<thead>
					<tr class="invo-tb-header">
						<th class="font-md color-light-black">User Name</th>
						<th class="font-md color-light-black fit-price">Password</th>
						<th class="font-md color-light-black flight-re-price-wid">Type</th>
					</tr>
				</thead>
				<tbody class="invo-tb-body">
				
					<tr class="invo-tb-row table-bg">
					<td class="font-sm"><?= (isset($header_det) ? $header_det['username'] : '') ?></td>
					<td class="font-sm"><?= (isset($header_det) ? $header_det['password'] : '') ?></td>
					<td class="font-sm"><?= (isset($header_det) ? $header_det['type'] : '') ?></td>
				</tr>

				</tbody>
			</table>
		</div>
			<!--Travel detail start here -->
				
		<br>
			<div class="font-md color-light-black">Flow Chart :</div>
			<br>

			<!--Header invoice details start here -->
		<!-- <div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel " style="border:1px solid grey;padding:10px;"> -->
		<div class="flowchart-container">
        <?php if (!empty($flow_chart)) : ?>
            <?php foreach ($flow_chart as $index => $item) : ?>
                <div class="flowchart-item <?= $index === $last_index ? 'last-item' : '' ?>"><?= $item ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
		<!-- </div> -->
			<!--Header invoice details start here -->

		<?php endif;?>

		<?php if($title == 'Billing Receipt'):?>

<!--Invoice content start here -->
<section class="agency-service-content ecommerce-invoice-content" id="travel_invoice">
	<div class="travel-bottom-sec-img">
		<img src="<?= base_url() ?>assets/img/view_list/green-bg.svg" alt="background-img">
	</div>	

	

	<div class="container">
		<!--Header invoice details start here -->
		<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel ">
			<div class="bus-invo-num bus-invo-num-travel ">
				<div class="font-md color-light-black">Nagar Garden / Name :</div>
				<div class="font-md-grey color-grey"><?= (isset($property_name) ? $property_name['property_name'] : '') ?></div>
			</div>
			<div class="bus-invo-date bus-invo-num-travel">
				<div class="font-md color-light-black">Bill Id:</div>
				<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['bill_id'] : '') ?></div>
			</div>
		</div>
		
		<!--Header invoice details start here -->
		<div class="bus-invo-no-date-wrap bus-invo-no-date-wrap-travel ">
			<div class="bus-invo-num bus-invo-num-travel ">
				<div class="font-md color-light-black">Customer Name :</div>
				<div class="font-md-grey color-grey"><?= (isset($customer_name) ? $customer_name['buyer_name'] : '') ?></div>
			</div>
			<div class="bus-invo-date bus-invo-num-travel">
				<div class="font-md color-light-black">Date And Time :</div>
				<div class="font-md-grey color-grey"><?= (isset($get_prop) ? date('d/m/Y',strtotime($get_prop['date_time'])) : '') ?></div>
			</div> 
		</div>
		
		<!--Travel detail start here -->
		<!--Travel detail start here -->
		<br>
		<div class="font-md color-light-black">Billing Details :</div>
		<div class="bus-detail-wrap travel-detail-wrap">
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Father Name</div>
				<div class="font-md-grey color-grey"><?= (isset($get_prop) ? $get_prop['father_rel'] : '') ?> . <?= (isset($get_prop) ? $get_prop['father_name'] : '') ?></div>
			</div>
			
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Plot No</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['plot_no']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Plot Extension Sqft/Sqmt</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['plot_extension']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Advance Amount</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['adv_amount_plot']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Mode Of Payment</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['mode_payment']  : '') ?></div>
			</div>
				
			<div class="bus-detail-col border-bottom travel">
				<div class="font-md color-light-black bus-type">Payment Mode No</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['mode_payment_value']  : '') ?></div>
			</div>
	
			<div class="bus-detail-col">
				<div class="font-md color-light-black bus-type">Phone Number</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['phone_number']  : '') ?></div>
			</div>

			<div class="bus-detail-col">
				<div class="font-md color-light-black bus-type">Address</div>
				<div class="font-md-grey color-grey"> : <?= (isset($get_prop) ?  $get_prop['address']  : '') ?></div>
			</div>

		</div>
		<!--Travel detail end here -->

		<?php endif;?>



						<!-- <div class="invo-addition-wrap pt-40  ">
							<div class="">
								<h3 class="font-18-700 color-light-black">Additional Notes:</h3>
								<p class="font-sm pt-10">Porta vel eu viverra tellus fames amet laoreet ultrices. Felis et id nulla nisl aliquam sit at. Nulla risus lorem ridiculus tellus pellentesque. Luctus urna tempor enim integer pellentesque sed auctor. Consequat cras bibendum diam tincidunt. Sed neque nisl a praesent. Massa integer felis cursus odio ut non suscipit lectus.</p>
							</div>
						</div> -->
						
						<!--Travel additional info end here -->
					</div>
					<div class="travel-bottom-sec pt-20">
						<div class="travel-bottom-sec-wrap">
							<div class="footer-img1"><img src="<?= base_url() ?>assets/img/view_list/footer-img1.svg" alt="background-img"></div>
							<div class="footer-img2"><img src="<?= base_url() ?>assets/img/view_list/footer-img2.svg" alt="background-img"></div>
						</div>
					</div>
				</section>
				<!--Invoice content end here -->
			</div>
			<!--Bottom content start here -->
			<section class="agency-bottom-content agency-bottom-content-travel d-print-none" id="agency_bottom">
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
				<!--Print-download content end here -->
				<!--Note content start here -->
				<div class="invo-note-wrap">
					<div class="note-title">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_8_240)"><path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M17 21H7C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H14L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21Z" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 7H10" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 13H15" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13 17H15" stroke="#12151C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_8_240"><rect width="24" height="24" fill="white"/>
						</clipPath></defs></svg>
						<span class="font-md color-light-black">Note:</span>
					</div>
					<h3 class="font-md-grey color-grey note-desc">This is computer generated receipt and does not require physical signature.</h3>
				</div>
				<!--Note content End here -->
			</section> 
			<!--bottom content end here -->
		</div>
	</div>



	<!--Invoice Wrap End here -->
    <script src="<?php echo base_url(); ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jspdf.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/html2canvas.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom_view_js.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.js"></script>
</body>

<!-- Mirrored from up2client.com/envato/digital-invoica/main-file/travel_invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Aug 2024 07:07:46 GMT -->
</html>	