
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css" />
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/%40form-validation/form-validation.css" />
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/bs-stepper/bs-stepper.css" />
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/%40form-validation/form-validation.css" />
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/animate-css/animate.css">

 <style>
/* General styles */
body.modal-open_ {
    overflow: hidden; /* Prevents background scrolling */
}

body.modal-open_ .content {
    filter: blur(5px); /* Blurs the background */
}

/* Modal styles */
.modal_ {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    overflow: hidden;
    z-index: 1000; /* Ensures it stays on top */
}

.modal-content-wrapper{
    position: relative;
    width: 50%; /* 50% of viewport width */
    height: 80%; /* 50% of viewport height */
    background: white;
    margin: auto;
    top: 50%;
    transform: translateY(-50%);
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.modal-content_ {
    width: 100%;
    height: calc(100% - 40px); /* Subtract padding for accurate height */
    border: none;
    flex-grow: 1;
}

.close_ {
    position: absolute;
    top: 10px;
    right: 20px;
    color: #333;
    font-size: 30px;
    font-weight: bold;
    cursor: pointer;
}

.close_:hover,
.close_:focus {
    color: #999;
    text-decoration: none;
}

#caption {
    margin-top: 10px;
    text-align: center;
    color: #333;
}

.scroll-table {
            max-height: 600px; /* Set your desired maximum height */
            overflow-y: auto; /* Enable vertical scrolling */
        }
.table>:not(caption)>*>* {
    padding: 0 !important;
}
.cmn{
  padding: calc(0.8555rem - 8px) calc(1rem - 7px) !important;
  border-color: #ffffff00 !important;
}
 </style>

 <!-- Content wrapper -->
 <div class="content-wrapper">

 <!-- Modal Structure -->
  <div id="fileModal" class="modal_">
        <div class="modal-content-wrapper">
            <span class="close_">&times;</span>
            <iframe class="modal-content_" id="modalFile" src=""></iframe>
            <div id="caption"></div>
        </div>
    </div>

<!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    
    <!-- Multi Column with Form Separator -->
     <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Property') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
                <li>&nbsp; &nbsp;&nbsp;&nbsp; <strong style="background:green;"><?php echo $this->session->flashdata('message');?></strong></li>
            </ol>
        </div>

<!-- Property Listing Wizard -->
<div class="card">
<div style="display:flex">
	<div>
	    <h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></h5>
	</div>
        <!-- <div class="pull-right" style="display:flex;margin: auto;margin-right: 67px;">
          <div style="padding: 5px;">
              <button id="downloadCsv" class="btn btn-md btn-danger waves-effect waves-light">Download Sample CSV</button>
          </div>
            <input type="file" id="csvFileInput" accept=".csv" style="display: none;">
          <div style="padding: 5px;">
              <button type="button" id="uploadCsv" class="btn btn-md btn-primary waves-effect waves-light">Upload CSV</button>
          </div>
        </div> -->
</div>
  <hr class="my-4" />
<div id="wizard-property-listing" class="bs-stepper vertical mt-2">
<div class="bs-stepper-header gap-lg-2 border-end">
<div class="step" data-target="#personal-details">
<button type="button" class="step-trigger">
<span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
<span class="bs-stepper-label">
  <span class="bs-stepper-number">01</span>
  <span class="d-flex flex-column ms-2">
    <span class="bs-stepper-title">Nagar/Garden Details</span>
    <span class="bs-stepper-subtitle"></span>
  </span>
</span>
</button>
</div>
<div class="line"></div>
<div class="step" data-target="#property-area">
<button type="button" class="step-trigger">
<span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
<span class="bs-stepper-label">
  <span class="bs-stepper-number">02</span>
  <span class="d-flex flex-column ms-2">
    <span class="bs-stepper-title">Plot Details</span>
    <span class="bs-stepper-subtitle"></span>
  </span>
</span>
</button>
</div>
<!-- <div class="line"></div>
<div class="step" data-target="#property-details">
<button type="button" class="step-trigger">
<span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
<span class="bs-stepper-label">
  <span class="bs-stepper-number">03</span>
  <span class="d-flex flex-column ms-2">
    <span class="bs-stepper-title">Registration Office Details</span>
    <span class="bs-stepper-subtitle"></span>
  </span>
</span>
</button>
</div> -->

<!-- <div class="line"></div>
<div class="step" data-target="#property-area">
<button type="button" class="step-trigger">
<span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
<span class="bs-stepper-label">
  <span class="bs-stepper-number">04</span>
  <span class="d-flex flex-column ms-2">
    <span class="bs-stepper-title">Property Area</span>
    <span class="bs-stepper-subtitle">Covered Area</span>
  </span>
</span>
</button>
</div> -->
<div class="line"></div>
<div class="step" data-target="#price-details">
<button type="button" class="step-trigger">
<span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
<span class="bs-stepper-label">
  <span class="bs-stepper-number">03</span>
  <span class="d-flex flex-column ms-2">
    <span class="bs-stepper-title">Upload Documents</span>
    <span class="bs-stepper-subtitle"></span>
  </span>
</span>
</button>
</div>
</div>
<div class="bs-stepper-content">
<form id="wizard-property-listing-form"  method="post" enctype="multipart/form-data" onSubmit="return false">

<!-- Personal Details -->
<div id="personal-details" class="content">
<div class="row g-6">
 <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <input type="text" id="multicol-property_name" class="form-control" name="property_name_input"  value="<?php if(isset($get_prop)){echo $get_prop['property_name'];}?>" placeholder="Enter Nagar/Garden Name" />
          <input type="hidden" class="form-control" name="property_id" value="<?php if(isset($get_prop)){echo $get_prop['property_id'];}?>" />
          <label for="multicol-property_name">Nagar/Garden Name</label>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <select id="multicol-state" class="select2 form-select" name="district_input" data-allow-clear="true">
            <option value="" selected disabled>Select District</option>
          <?php foreach($district_list as $val){
            $selected='';
            if(isset($get_prop)){
             if($val['district_name'] == $get_prop['district']){
             $selected='selected';
             }
            }
             ?>
            <option value="<?php echo $val['district_name'];?>"  <?php echo $selected;?> ><?php echo $val['district_name'];?></option>
            <?php  }?>
          </select>
          <label for="multicol-state">District</label>
        </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-Taluk_Name" class="form-control" name="taluk_name_input"  value="<?php if(isset($get_prop)){echo $get_prop['taluk_name'];}?>" placeholder="Enter Taluk Name"/>
              <label for="multicol-Taluk_Name">Taluk Name</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-v_t" class="form-control"  name="village_town_input" value="<?php if(isset($get_prop)){echo $get_prop['village_town'];}?>"  placeholder="Enter Village/Town Name"  />
              <label for="multicol-confirm-v_t">Village/Town Name</label>
            </div>
          </div>
      </div>

      <!-- <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-plot_no" class="form-control"  name="plot_no_input" value="<?php if(isset($get_prop)){echo $get_prop['plot_no'];}?>"  placeholder="Enter Plot No"  />
              <label for="multicol-confirm-plot_no">Plot No</label>
            </div>
          </div>
      </div> -->

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-p-c-n" class="form-control" name="patta_chitta_input" value="<?php if(isset($get_prop)){echo $get_prop['patta_chitta'];}?>" placeholder="Enter Patta / Chitta No"  />
              <label for="multicol-confirm-p-c-n">Patta / Chitta No</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-t_s_n" class="form-control" name="t_s_no_input" value="<?php if(isset($get_prop)){echo $get_prop['t_s_no'];}?>" placeholder="Enter T.S.No"  />
              <label for="multicol-confirm-t_s_n">T.S.No</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-w_b" class="form-control" name="ward_block_input" value="<?php if(isset($get_prop)){echo $get_prop['ward_block'];}?>" placeholder="Enter Ward/Block"  />
              <label for="multicol-confirm-w_b">Ward/Block</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-land" class="form-control" name="land_mark_input" value="<?php if(isset($get_prop)){echo $get_prop['land_mark'];}?>" placeholder="Enter Land Mark"  />
              <label for="multicol-confirm-land">Land Mark</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-dtcp" class="form-control" name="dctp_no_input" value="<?php if(isset($get_prop)){echo $get_prop['dctp_no'];}?>" placeholder="Enter DTCP No"  />
              <label for="multicol-confirm-dtcp">DTCP No</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-rera" class="form-control" name="rero_no_input" value="<?php if(isset($get_prop)){echo $get_prop['rero_no'];}?>" placeholder="Enter RERA No"  />
              <label for="multicol-confirm-rera">RERA No</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-n_t_n_s" class="form-control" name="total_entension_input" value="<?php if(isset($get_prop)){echo $get_prop['total_entension'];}?>"  placeholder="Enter Nagar/Garden Total Extension in Sqft/Sqmt"  />
              <label for="multicol-confirm-n_t_n_s">Nagar/Garden Total Extension in Sqft/Sqmt</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="number" id="multicol-t_n_o_p" class="form-control" name="total_no_plots_input" value="<?php if(isset($get_prop)){echo $get_prop['total_no_plots'];}?>" placeholder="Enter Nagar/Garden Total No of Plots"  />
              <label for="multicol-confirm-t_n_o_p">Nagar/Garden Total No of Plots</label>
            </div>
          </div>
      </div>
     
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-n_s_e_i_s_s" class="form-control" name="sales_extention_input" value="<?php if(isset($get_prop)){echo $get_prop['sales_extention'];}?>" placeholder="Enter Property Sale Extension in Sqft/Sqmt"  />
              <label for="multicol-confirm-n_s_e_i_s_s">Nagar/Garden Sale Extension in Sqft/Sqmt</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-e_i_s_s" class="form-control" name="park_extension_input" value="<?php if(isset($get_prop)){echo $get_prop['park_extension'];}?>" placeholder="Enter Park Extension in Sqft/Sqmt"  />
              <label for="multicol-confirm-e_i_s_s">Park Extension in Sqft/Sqmt</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-r_e_i_s_s" class="form-control" name="road_extension_input" value="<?php if(isset($get_prop)){echo $get_prop['road_extension'];}?>" placeholder="Enter Road Extension in Sqft/Sqmt"  />
              <label for="multicol-confirm-r_e_i_s_s">Road Extension in Sqft/Sqmt</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
        <div class="col mt-2">
        <label class="form-check-label">Choose Eb Line:&nbsp;&nbsp;</label>
        <?php 
        $checked='';
        // if(isset($get_prop)){
        //   echo $get_prop['road_extension'];
        // }
        ?>
            <div class="form-check form-check-inline">
            <input  class="form-check-input" name="eb_line_input" type="radio" value="1" id="collapsible-address-type-home" <?php if(isset($get_prop)){if($get_prop['eb_line'] == '1'){echo 'checked';}else{echo '';}}else{ echo 'checked';} ?> />
            <label class="form-check-label" for="collapsible-address-type-home">Yes</label>
            </div>
            <div class="form-check form-check-inline">
            <input  class="form-check-input" name="eb_line_input" type="radio" value="0" id="collapsible-address-type-office" <?php if(isset($get_prop)){if($get_prop['eb_line'] == '0'){echo 'checked';}else{echo '';}}else{ echo '';} ?>/>
            <label class="form-check-label" for="collapsible-address-type-office">No </label>
            </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="col mt-2">
        <label class="form-check-label">Choose Tree Saplings:&nbsp;&nbsp;</label>
            <div class="form-check form-check-inline">
            <input  class="form-check-input" type="radio" name="tree_sapling_input" value="1" id="collapsible-address-tree-home" <?php if(isset($get_prop)){if($get_prop['tree_sapling'] == '1'){echo 'checked';}else{echo '';}}else{ echo 'checked';} ?> />
            <label class="form-check-label" for="collapsible-address-tree-home">Yes</label>
            </div>
            <div class="form-check form-check-inline">
            <input  class="form-check-input" type="radio" name="tree_sapling_input" value="0" id="collapsible-address-tree-office" <?php if(isset($get_prop)){if($get_prop['tree_sapling'] == '0'){echo 'checked';}else{echo '';}}else{ echo '';} ?> />
            <label class="form-check-label" for="collapsible-address-tree-office">No </label>
            </div>
        </div>
        </div>

        <div class="col-md-4">
     
        <div class="col mt-2">
        <label class="form-check-label">Choose Water Tank:&nbsp;&nbsp;</label>
            <div class="form-check form-check-inline">
            <input  class="form-check-input" type="radio" name="water_tank_input" value="1" id="collapsible-address-tank-home" <?php if(isset($get_prop)){if($get_prop['water_tank'] == '1'){echo 'checked';}else{echo '';}}else{ echo 'checked';} ?> />
            <label class="form-check-label" for="collapsible-address-type-home">Yes</label>
            </div>
            <div class="form-check form-check-inline">
            <input  class="form-check-input" type="radio"  name="water_tank_input" value="0" id="collapsible-address-tank-office" <?php if(isset($get_prop)){if($get_prop['water_tank'] == '0'){echo 'checked';}else{echo '';}}else{ echo '';} ?> />
            <label class="form-check-label" for="collapsible-address-tank-office">No </label>
            </div>
        </div>
        </div>
        
        <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-l_r_no" class="form-control" name="land_purchased_no_input" value="<?php if(isset($get_prop)){echo $get_prop['land_purchased_no'];}?>" placeholder="Enter Land Purchased RS.No"  />
              <label for="multicol-confirm-l_r_no">Land Purchased RS.No</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-l_u_p_rs" class="form-control" name="land_unpurchased_no_input" value="<?php if(isset($get_prop)){echo $get_prop['land_unpurchased_no'];}?>" placeholder="Enter Land UnPurchased RS.No"  />
              <label for="multicol-confirm-l_u_p_rs">Land UnPurchased RS.No</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
        <!-- to maintain ui -->
      </div>
      <hr>
      <div class="col-md-12">
       <!-- plot details -->
       <input type="hidden" id="plotData" name="plotData">
              <!-- plot details -->
 
      <table class="table table-bordered">
        <tbody>
        <div class="col-md-12">
          <tr>
          <td colspan="2" class="text-center"><b>REGISTRATION OFFICE DETAILS</b></td>
          </tr>
          </div>
          
          <div class="col-md-12">
          <tr>
          <div class="col-md-6">
            <td>Registration District</td>
          </div>
          <div class="col-md-6">
            <td><input type="text" name="reg_district_input" class="form-control border-0" value="<?php if(isset($get_prop)){echo $get_prop['reg_district'];}?>"></td>
          </div>
          </tr>
          </div>
          <div class="col-md-12">
          <tr>
          <div class="col-md-6">
            <td>Registration Sub - District</td>
          </div>
          <div class="col-md-6">
            <td><input type="text" name="reg_sub_district_input" class="form-control border-0" value="<?php if(isset($get_prop)){echo $get_prop['reg_sub_district'];}?>"></td>
          </div>
          </tr>
          </div>

          <div class="col-md-12">
          <tr>
          <div class="col-md-6">
            <td>Town/Village</td>
          </div>
          <div class="col-md-6">
            <td><input type="text" name="reg_town_village_input" class="form-control border-0" value="<?php if(isset($get_prop)){echo $get_prop['reg_town_village'];}?>"></td>
          </div>
          </tr>
          </div>
          <div class="col-md-12">
          <tr>
          <div class="col-md-6">
            <td>Revenue Taluk</td>
          </div>
          <div class="col-md-6">
            <td><input type="text" name="reg_revenue_taluk_input" class="form-control border-0" value="<?php if(isset($get_prop)){echo $get_prop['reg_revenue_taluk'];}?>"></td>
          </div>
          </tr>
          </div>
          <div class="col-md-12">
          <tr>
          <div class="col-md-6">
            <td>Sub Registrar</td>
          </div>
          <div class="col-md-6">
            <td><input type="text" name="sub_reg_input" class="form-control border-0" value="<?php if(isset($get_prop)){echo $get_prop['sub_reg'];}?>"></td>
          </div>
          </tr>
          </div>
          
        </tbody>
      </table>
    </div>
    <hr>
    
  <div class="col-12 d-flex justify-content-between">
    <button class="btn btn-outline-secondary btn-prev" disabled> <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i>
      <span class="align-middle d-sm-inline-block d-none">Previous</span>
    </button>
    <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ri-arrow-right-line ri-16px"></i></button>
  </div>
</div>
</div>

<!-- Property Details -->
<div id="property-area" class="content">
        <div class="pull-left" style="display:flex;flex-direction: row-reverse;">
          <div style="padding: 5px;">
              <button id="downloadCsv" class="btn btn-md btn-danger waves-effect waves-light">Download Sample CSV</button>
          </div>
            <input type="file" id="csvFileInput" accept=".csv" style="display: none;">
          <div style="padding: 5px;">
              <button type="button" id="uploadCsv" class="btn btn-md btn-primary waves-effect waves-light">Upload CSV</button>
          </div>
        </div><br><br><br><br>
<div class="row g-6">
<div class="scroll-table">
<div class="table-responsive">
                  <table class="table" id="plotTable">
                    <thead style="text-align: center;">
                      <th width="18%"></th>
                      <th>Plot No</th>
                      <th>Plot Extension</th>
                      <th>North</th>
                      <th>East</th>
                      <th>West</th>
                      <th>South</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                    <?php if(isset($get_plot_details) && !empty($get_plot_details)){
                        $lastIndex = count($get_plot_details) - 1;
                      foreach($get_plot_details as $index => $val){ ?>
                      <tr>
                      <td><button type="button" class="btn btn-danger btn-sm btn-delete-row" style="border-radius: 42px;"><i class="ri-delete-bin-fill"></i></button>
                      <?php if ($index === $lastIndex) { ?>
                        <button type="button" class="btn btn-primary btn-sm btn-add-row" style="border-radius: 42px;"><i class="ri-add-circle-line"></i></button>
                    <?php } ?></td>
                        <td><input type="text" class="form-control cmn plot_no" value="<?php echo $val['plot_no'];?>" required ></td>
                        <td><input type="text" class="form-control cmn plot_extension" value="<?php echo $val['plot_extension'];?>" required></td>
                        <td><input type="text" class="form-control cmn north" value="<?php echo $val['north'];?>" required></td> 
                        <td><input type="text" class="form-control cmn east" value="<?php echo $val['east'];?>" required></td>
                        <td><input type="text" class="form-control cmn west" value="<?php echo $val['west'];?>" required></td>
                        <td><input type="text" class="form-control cmn south" value="<?php echo $val['south'];?>" required></td>
                        <td><input type="text" class="form-control cmn status" value="<?php echo $val['status'];?>" ></td>
                      </tr>
                      <?php } ?>

                      <?php }else{ ?>
                        <tr>
                       <td><?php ?><button type="button" class="btn btn-danger btn-sm btn-delete-row" style="border-radius: 42px;"><i class="ri-delete-bin-fill"></i></button>
                       <button type="button" class="btn btn-primary btn-sm btn-add-row" style="border-radius: 42px;"><i class="ri-add-circle-line"></i></button></td>
                        <td><input type="text" class="form-control cmn plot_no" required></td>
                        <td><input type="text" class="form-control cmn plot_extension" required></td>
                        <td><input type="text" class="form-control cmn north" required></td>
                        <td><input type="text" class="form-control cmn east" required></td>
                        <td><input type="text" class="form-control cmn west" required></td>
                        <td><input type="text" class="form-control cmn south" required></td>
                        <td><input type="text" class="form-control cmn status" value="UnSold"></td>
                       </tr>
                        <?php }?>
                     
                    </tbody>
                  </table>
                  </div>
                  </div>
                  <hr>
    <div class="col-12 d-flex justify-content-between">
    <button class="btn btn-outline-secondary btn-prev"> <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
    <button  class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ri-arrow-right-line ri-16px"></i></button>
  </div>
</div>
</div>

<!-- Property Details -->
<!-- <div id="property-details" class="content">
<div class="row g-6">
 <div class="col-lg-12">
   -->
          
  <!-- <div class="col-12 d-flex justify-content-between">
    <button class="btn btn-outline-secondary btn-prev"> <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
    <button  class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ri-arrow-right-line ri-16px"></i></button>
  </div>
</div>
</div> -->

<!-- Property Features -->
<!-- <div id="property-features" class="content" >

</div> -->

<!-- Property Area -->
<!-- <div id="property-area" class="content">
  <div class="col-12 d-flex justify-content-between">
    <button class="btn btn-outline-secondary btn-prev"> <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
    <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ri-arrow-right-line ri-16px"></i></button>
  </div>
</div> -->

<!-- Price Details -->
<div id="price-details" class="content">
<div class="row g-6">
 <div class="col-6">
      <h6 class="card-header">Upload Registered Title Deed Document</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-multi_7">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="reg_title_deed_doc_file_input[]" id="targetInput_7" style="display:none;">
          <div class="fallback">
            <input type="file"  name="reg_title_deed_doc_file_input[]"  />
          </div>

          <?php if(!empty($registered_title_deed)){foreach($registered_title_deed as $val){?>
            
          <div class="dz-preview dz-file-preview">
        <div class="dz-details">
          <div class="dz-thumbnail">
          <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
        </div>
        <div class="text-center my-3">
        <input type="button" class="btn-outline-danger delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="registered_title_deed" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);">
        </div>
        </div>
        </div>

        <?php }
        }?>

      </div>
      </div>
      </div>
       
      <div class="col-6">
      <h6 class="card-header">Patta / Chitta Documents Uploads</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-multi_1">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="patta_chitta_file_input[]" id="targetInput_1" style="display:none;">
          <div class="fallback">
            <input name="patta_chitta_file_input[]" type="file" id="file"/>
          </div>

          <?php if(!empty($patta_chitta)){foreach($patta_chitta as $val){?>
            
            <div class="dz-preview dz-file-preview">
          <div class="dz-details">
            <div class="dz-thumbnail">
            <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
          </div>
          <div class="text-center my-3">
          <input type="button" class="btn-outline-danger  delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="patta_chitta" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);">  
        </div>
          </div>
          </div>
  
          <?php }
          }?>

          </div>
      </div>
      </div>

      <div class="col-6">
      <h6 class="card-header">TSLR Patta Uploads</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-multi_2">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="tslr_patta_file_input[]" id="targetInput_2" style="display:none;">
          <div class="fallback">
            <input name="tslr_patta_file_input[]" type="file" />
          </div>

          <?php if(!empty($tslr_patta)){foreach($tslr_patta as $val){?>
            
            <div class="dz-preview dz-file-preview">
          <div class="dz-details">
            <div class="dz-thumbnail">
            <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
          </div>
          <div class="text-center my-3">
          <input type="button" class="btn-outline-danger delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="tslr_patta" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);" >  

          </div>
          </div>
          </div>
  
          <?php }
          }?>

      </div>
      </div>
      </div>

      <div class="col-6">
      <h6 class="card-header">Upload EC Document</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-multi_3">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="ec_doc_file_input[]" id="targetInput_3" style="display:none;">
          <div class="fallback">
            <input name="ec_doc_file_input[]" type="file" />
          </div>

          <?php if(!empty($ec_doc)){foreach($ec_doc as $val){?>
            
            <div class="dz-preview dz-file-preview">
          <div class="dz-details">
            <div class="dz-thumbnail">
            <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
          </div>
          <div class="text-center my-3">
          <input type="button" class="btn-outline-danger  delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="ec_doc" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);">
          </div>
          </div>
          </div>
  
          <?php }
          }?>

      </div>
      </div>
      </div>
      <div class="col-6">
      <h6 class="card-header">Upload FMB/TSLR Sketch</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-multi_4">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="fmr_tslr_sketch_file_input[]" id="targetInput_4" style="display:none;">
          <div class="fallback">
            <input name="fmr_tslr_sketch_file_input[]" type="file" />
          </div>

          <?php if(!empty($fmr_tslr_sketch)){foreach($fmr_tslr_sketch as $val){?>
            
            <div class="dz-preview dz-file-preview">
          <div class="dz-details">
            <div class="dz-thumbnail">
            <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
          </div>
          <div class="text-center my-3">
          <input type="button" class=" btn-outline-danger  delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="fmr_tslr_sketch" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);">

          </div>
          </div>
          </div>
  
          <?php }
          }?>


      </div>
      </div>
      </div>

      <div class="col-6">
      <h6 class="card-header">Upload Plot Layout Diagram</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-multi_5">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="plot_layout_diagram_file_input[]" id="targetInput_5" style="display:none;">
          <div class="fallback">
            <input name="plot_layout_diagram_file_input[]" type="file" />
          </div>

          <?php if(!empty($plot_layout_diagram)){foreach($plot_layout_diagram as $val){?>
            
            <div class="dz-preview dz-file-preview">
          <div class="dz-details">
            <div class="dz-thumbnail">
            <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
          </div>
          <div class="text-center my-3">
          <input type="button" class="btn-outline-danger delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="plot_layout_diagram" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);">

          </div>
          </div>
          </div>
  
          <?php }
          }?>

      </div>
      </div>
      </div>

      <div class="col-6">
      <h6 class="card-header">Upload Parent Document</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-multi_6">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="parent_doc_file_input[]" id="targetInput_6" style="display:none;">
          <div class="fallback">
            <input name="parent_doc_file_input" type="file" />
          </div>

          <?php if(!empty($parent_doc)){foreach($parent_doc as $val){?>
            
            <div class="dz-preview dz-file-preview">
          <div class="dz-details">
            <div class="dz-thumbnail">
            <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
          </div>
          <div class="text-center my-3">
          <input type="button" class="btn-outline-danger delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="parent_doc" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);">

          </div>
          </div>
          </div>
  
          <?php }
          }?>


      </div>
      </div>
      </div>
      <hr>
  <div class="col-12 d-flex justify-content-between">
    <button class="btn btn-outline-secondary btn-prev"> <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
    <button id="submitBtn" class="btn btn-success btn-submit"><span class="align-middle d-sm-inline-block d-none">Submit</span> <i class="ri-check-line ri-16px ms-0 ms-sm-2"></i></button>
  </div>
</div>
</div>
</form>
</div>
</div>



<!--/ Property Listing Wizard -->

</div>


  </div>
  <!-- / Content -->

        <!-- Modal -->
        <!-- <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Plot Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button id="save_plot_details" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div> -->
        <!-- Modal -->


 <!-- Page JS -->
 <script src="<?=base_url()?>/assets/vendor/libs/cleavejs/cleave.js"></script>
 <script src="<?=base_url()?>/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="<?=base_url()?>/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
<script src="<?=base_url()?>/assets/vendor/libs/%40form-validation/auto-focus.js"></script>
  <script src="<?=base_url()?>/assets/vendor/libs/dropzone/dropzone.js"></script>
  <script src="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
  <script src="<?=base_url()?>/assets/vendor/libs/tagify/tagify.js"></script>
  <script src="<?=base_url()?>/assets/vendor/libs/%40form-validation/popular.js"></script>
<script src="<?=base_url()?>/assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
<script src="<?=base_url()?>/assets/vendor/libs/%40form-validation/auto-focus.js"></script>
<script src="<?=base_url()?>/assets/js/extended-ui-sweetalert2.js"></script>
<script src="<?=base_url()?>/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="<?=base_url()?>/assets/js/ui-modals.js"></script>
<script>
  $(document).ready(function() {
         $(".prop").addClass("open");
         $(".prop_page").addClass("active");


         $('#plotTable').on('keydown', 'input', function(e) {
    if (e.key === 'Tab') {
      const $lastInput = $('#plotTable tbody tr:last-child td:nth-last-child(2) input');
        if ($(this).is($lastInput)) {
            e.preventDefault();
            addNewRow();
        }
    }
});

      $('#plotTable').on('click', '.btn-delete-row', function() {
          const rowCount = $('#plotTable tbody tr').length;
          if (rowCount > 1) {
              $(this).closest('tr').remove();
              ensureLastRowHasAddButton();
          } else {
              alert('Cannot delete the last row');
          }
      });

      $('#plotTable').on('click', '.btn-add-row', function() {
          addNewRow();
      });

      function addNewRow() {
          $('#plotTable .btn-add-row').last().remove();
          const newRow = `
              <tr>
                  <td>
                      <button type="button" class="btn btn-danger btn-sm btn-delete-row" style="border-radius: 42px;"><i class="ri-delete-bin-fill"></i></button>
                      <button type="button" class="btn btn-primary btn-sm btn-add-row" style="border-radius: 42px;"><i class="ri-add-circle-line"></i></button>
                  </td>
                  <td><input type="text" class="form-control cmn plot_no" required></td>
                  <td><input type="text" class="form-control cmn plot_extension" required></td>
                  <td><input type="text" class="form-control cmn north" required></td>
                  <td><input type="text" class="form-control cmn east" required></td>
                  <td><input type="text" class="form-control cmn west" required></td>
                  <td><input type="text" class="form-control cmn south" required></td>
                  <td><input type="text" class="form-control cmn status" value="UnSold"></td>
              </tr>`;
          $('#plotTable tbody').append(newRow);
          $('#plotTable tbody tr:last-child input:first').focus();
      }

      function ensureLastRowHasAddButton() {
          const rowCount = $('#plotTable tbody tr').length;
          if (rowCount > 0) {
              const lastRow = $('#plotTable tbody tr:last-child td:first-child');
              if (lastRow.find('.btn-add-row').length === 0) {
                  lastRow.append('<button type="button" class="btn btn-primary btn-sm btn-add-row"><i class="ri-add-circle-line"></i></button>');
              }
          }
      }

      // Ensure the initial state has the add button on the last row
      ensureLastRowHasAddButton();

        //     $('#save_plot_details').on('click', function(e) {

        //       $('#basicModal').modal('hide');

        //         const plotDataArray = [];
                
        //         $('#plotTable tbody tr').each(function() {
        //             const row = {
        //                 plot_no: $(this).find('.plot_no').val(),
        //                 plot_extension: $(this).find('.plot_extension').val(),
        //                 north: $(this).find('.north').val(),
        //                 east: $(this).find('.east').val(),
        //                 west: $(this).find('.west').val(),
        //                 south: $(this).find('.south').val()
        //             };
        //             plotDataArray.push(row);
        //         });

        //         const plotDataJSON = JSON.stringify(plotDataArray);
        //         $('#plotData').val(plotDataJSON);
        //         // Now submit the form or do any AJAX call as needed
        //         console.log(plotDataJSON); // For demonstration purposes
        //         // Uncomment the next line to actually submit the form
        //         // this.submit();
        //     Swal.fire({
        // title: 'Success',
        // html: 'Plot Details Saved Successfully',
        // icon: 'success',
       
        // }).then((result) => {
            
        // });
        // $(".swal2-deny").remove();
        // $(".swal2-cancel").remove();
        //     });

    });
</script>

  <script>

  "use strict";!function(){var e=`<div class="dz-preview dz-file-preview">
<div class="dz-details">
  <div class="dz-thumbnail">
    <img data-dz-thumbnail>
    <span class="dz-nopreview">No preview</span>
    <div class="dz-success-mark"></div>
    <div class="dz-error-mark"></div>
    <div class="dz-error-message"><span data-dz-errormessage></span></div>
    <div class="progress">
      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
    </div>
  </div>
  <div class="dz-filename" data-dz-name></div>
  <div class="dz-size" data-dz-size></div>
</div>
</div>`,a=document.querySelector("#dropzone-basic"),a=(a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:1,addRemoveLinks:!0,maxFiles:1}),
a=document.querySelector("#dropzone-multi_1"),a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:5,addRemoveLinks:!0}),
a=document.querySelector("#dropzone-multi_2"),a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:5,addRemoveLinks:!0}),
a=document.querySelector("#dropzone-multi_3"),a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:5,addRemoveLinks:!0}),
a=document.querySelector("#dropzone-multi_4"),a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:5,addRemoveLinks:!0}),
a=document.querySelector("#dropzone-multi_5"),a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:5,addRemoveLinks:!0}),
a=document.querySelector("#dropzone-multi_6"),a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:5,addRemoveLinks:!0}),
document.querySelector("#dropzone-multi_7"));a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:5,addRemoveLinks:!0})}();

  const form = document.getElementById('wizard-property-listing-form');
  const submitBtn = document.getElementById('submitBtn');

  submitBtn.addEventListener('click', function() {
  var myDropzone_arr = ['dropzone-multi_7','dropzone-multi_1','dropzone-multi_2','dropzone-multi_3','dropzone-multi_4','dropzone-multi_5','dropzone-multi_6'];
  myDropzone_arr.forEach(element => {
  var myDropzone = Dropzone.forElement("#"+element);
if (myDropzone !== undefined && myDropzone !== null) {
  var parts = element.split('_');
  var lastPart = parts[parts.length - 1];

    const targetInput = document.getElementById('targetInput_'+lastPart);
    const dataTransfer = new DataTransfer();

            Array.from(myDropzone.files).forEach(file => {
                dataTransfer.items.add(file);
            });

            targetInput.files = dataTransfer.files;

            Array.from(targetInput.files).forEach(file => {
            });
}
});

    const plotDataArray = [];
    let isValid = true;

    $('#plotTable tbody tr').each(function() {
        let firstEmptyInput = null;
        let row = {};

        $(this).find('td:not(:first) input').each(function() { 
            const field = $(this).attr('class').split(' ').find(cls => cls !== 'form-control' && cls !== 'cmn'); // Extract field name from class
            const value = $(this).val().trim();
            
            if (value === '') {
                if (!firstEmptyInput) {
                    firstEmptyInput = $(this); 
                }
                isValid = false;
            }

            row[field] = value; 
        });

        if (isValid) {
            plotDataArray.push(row); 
        }
    });

    if (!isValid) {
        firstEmptyInput.focus();
        alert('Please fill in all required fields.');
        return; 
    }

    const plotDataJSON = JSON.stringify(plotDataArray);
    $('#plotData').val(plotDataJSON);

    const form = document.querySelector('#wizard-property-listing-form');
    const formData = new FormData(form);

    $.ajax({
        url: '<?= base_url() ?>admin/property_controller/save_property',
        type: 'POST',
        data: formData,
        processData: false,  // Do not process data
        contentType: false,  // Do not set content type
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.status === 'success') {
                Swal.fire({
                    title: 'Success',
                    html: response.message,
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?= base_url('Property'); ?>";
                    }
                });
                $(".swal2-deny").remove();
                $(".swal2-cancel").remove();
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: ", status, error);
        }
    });
});



document.addEventListener('DOMContentLoaded', (event) => {
    var modal = document.getElementById("fileModal");

    var modalFile = document.getElementById("modalFile");
    var captionText = document.getElementById("caption");

    var span = document.getElementsByClassName("close_")[0];

    window.showFileModal = function(filePath) {
        document.body.classList.add('modal-open_');
        modal.style.display = "block";
        modalFile.src = filePath;
        captionText.innerHTML = filePath.split('/').pop(); // Display the file name as caption
    }

    span.onclick = function() {
        closeModal();
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }

    function closeModal() {
        modal.style.display = "none";
        modalFile.src = "";
        document.body.classList.remove('modal-open_');
    }
});

$(document).ready(function() {


  // ********select 2 ***************
       var o = $("#multicol-state");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select District", dropdownParent: o.parent() });
  // ********select 2 ***************

// ********select 2 ***************
var o = $("#multicol-staff_id_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Employee", dropdownParent: o.parent() });
  // ********select 2 ***************

$('.delete-image').on('click', function() {
    var id = $(this).attr('data-id');
    var module_id = $(this).attr('data-file');
    
    console.log(id);
    if (confirm('Are you sure to delete!')) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('admin/property_controller/delete_img_ajax') ?>',
            data: {
                id: id,
                module_id: module_id
            },
            success: function(response) {
                    location.reload();
            }
        });
    }
});

        

});

$('#downloadCsv').on('click', function() {
    let csvContent = "data:text/csv;charset=utf-8,";
    let headers = [];
    
    $('#plotTable thead th:not(:first)').each(function() {
        headers.push($(this).text().trim());
    });
    csvContent += headers.join(",") + "\n";

    // $('#plotTable tbody tr').each(function() {
    //     let row = [];
    //     $(this).find('td:not(:first) input').each(function() {
    //         row.push($(this).val());
    //     });
    //     csvContent += row.join(",") + "\n";
    // });
		
		let rows = [['1', '1', '1', '1', '1', '1', 'UnSold']]; 
		csvContent += rows.join(",") + "\n";

    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "plot_data.csv");
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
});


$('#uploadCsv').on('click', function() {
    $('#csvFileInput').click();
});

$('#csvFileInput').on('change', function() {

    const fileInput = document.getElementById('csvFileInput');
    if (fileInput.files.length === 0) {
        alert("Please select a CSV file to upload.");
        return;
    }

    const file = fileInput.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        const text = e.target.result;
        const rows = text.split("\n").map(row => row.trim()).filter(row => row.length > 0);
        
        if (rows.length === 0) {
            alert("The CSV file is empty.");
            return;
        }

        const header = rows[0].split(",");
        let expectedHeader = [];
        $('#plotTable thead th:not(:first)').each(function() {
        		expectedHeader.push($(this).text().trim());
        });
        
        if (header.length !== expectedHeader.length || !header.every((val, index) => val.trim() === expectedHeader[index])) {
        		alert("CSV file format is incorrect. Please make sure it has the correct headers.");
        		return;
        }

        const data = rows.slice(1).map(row => row.split(","));

        addDataToTable(data);
				$('#csvFileInput').val('');
    };
    reader.readAsText(file);
});
function addDataToTable(data) {
    $('#plotTable .btn-add-row').last().remove();
    data.forEach((row, index) => {
        const isLastRow = index === data.length - 1;
        const newRow = `
            <tr>
                <td>
                    <button type="button" class="btn btn-danger btn-sm btn-delete-row" style="border-radius: 42px;"><i class="ri-delete-bin-fill"></i></button>
                    ${isLastRow ? '<button type="button" class="btn btn-primary btn-sm btn-add-row" style="border-radius: 42px;"><i class="ri-add-circle-line"></i></button>' : ''}
                </td>
                <td><input type="text" class="form-control cmn plot_no" value="${row[0].trim()}" required></td>
                <td><input type="text" class="form-control cmn plot_extension" value="${row[1].trim()}" required></td>
                <td><input type="text" class="form-control cmn north" value="${row[2].trim()}" required></td>
                <td><input type="text" class="form-control cmn east" value="${row[3].trim()}" required></td>
                <td><input type="text" class="form-control cmn west" value="${row[4].trim()}" required></td>
                <td><input type="text" class="form-control cmn south" value="${row[5].trim()}" required></td>
                <td><input type="text" class="form-control cmn status" value="${row[6].trim()}"></td>
            </tr>`;
        $('#plotTable tbody').append(newRow);
    });
}
</script>

<!-- assets\js\wizard-ex-property-listing.js -->

<script>

  "use strict";

!function () {
   
    var t = document.querySelector("#wizard-property-listing");

    if (null !== t) {
        var o = t.querySelector("#wizard-property-listing-form"),
            e = o.querySelector("#personal-details"),
            n = o.querySelector("#property-area"),
            // i = o.querySelector("#property-details"), 
            // a = o.querySelector("#property-features"),
            r = o.querySelector("#price-details"),
            l = [].slice.call(o.querySelectorAll(".btn-next")),
            o = [].slice.call(o.querySelectorAll(".btn-prev"));

        const s = new Stepper(t, { linear: !0 }),
            u = FormValidation.formValidation(e, {
                fields: {
                    plFirstName: { validators: { notEmpty: { message: "Please enter your first name" } } },
                    plLastName: { validators: { notEmpty: { message: "Please enter your last name" } } }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({ eleValidClass: "", rowSelector: ".col-sm-6" }),
                    autoFocus: new FormValidation.plugins.AutoFocus,
                    submitButton: new FormValidation.plugins.SubmitButton
                },
                init: e => {
                    e.on("plugins.message.placed", function (e) {
                        e.element.parentElement.classList.contains("input-group") && e.element.parentElement.insertAdjacentElement("afterend", e.messageElement);
                    });
                }
            }).on("core.form.valid", function () { s.next(); }),

            // c = FormValidation.formValidation(i, {
            //     fields: {
            //         plPropertyType: { validators: { notEmpty: { message: "Please select property type" } } },
            //         plZipCode: {
            //             validators: {
            //                 notEmpty: { message: "Please enter zip code" },
            //                 stringLength: { min: 4, max: 10, message: "The zip code must be more than 4 and less than 10 characters long" }
            //             }
            //         }
            //     },
            //     plugins: {
            //         trigger: new FormValidation.plugins.Trigger,
            //         bootstrap5: new FormValidation.plugins.Bootstrap5({
            //             eleValidClass: "",
            //             rowSelector: function (e, t) { return "plAddress" !== e ? ".col-sm-6" : ".col-lg-12"; }
            //         }),
            //         autoFocus: new FormValidation.plugins.AutoFocus,
            //         submitButton: new FormValidation.plugins.SubmitButton
            //     }
            // }).on("core.form.valid", function () { s.next(); });
     
             m = FormValidation.formValidation(r, {
                fields: {},
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({ eleValidClass: "", rowSelector: ".col-md-12" }),
                    autoFocus: new FormValidation.plugins.AutoFocus,
                    submitButton: new FormValidation.plugins.SubmitButton
                }
            }).on("core.form.valid", function () { alert("Submitted..!!"); });

        l.forEach(e => {
            e.addEventListener("click", e => {
                switch (s._currentIndex) {
                    case 0: u.validate(); break;
                    case 1: u.validate(); break;
                    case 2: u.validate(); break;
                    case 3: u.validate(); break;
                    case 4: m.validate(); break;
                }
            });
        });

        o.forEach(e => {
            e.addEventListener("click", e => {
                switch (s._currentIndex) {
                    case 4:
                    case 3:
                    case 2:
                    case 1:
                        s.previous();
                }
            });
        });
    }
}();

</script>
