
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/%40form-validation/form-validation.css" />
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/bs-stepper/bs-stepper.css" />
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/%40form-validation/form-validation.css" />
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <style>
/* General styles */
body.modal-open {
    overflow: hidden; /* Prevents background scrolling */
}

body.modal-open .content {
    filter: blur(5px); /* Blurs the background */
}

/* Modal styles */
.modal {
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

.modal-content-wrapper {
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

.modal-content {
    width: 100%;
    height: calc(100% - 40px); /* Subtract padding for accurate height */
    border: none;
    flex-grow: 1;
}

.close {
    position: absolute;
    top: 10px;
    right: 20px;
    color: #333;
    font-size: 30px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
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
    <!-- <script src="assets/vendor/js/template-customizer.js"></script> -->

    <!-- Content wrapper -->
    <div class="content-wrapper">


<!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    
  <!-- Modal Structure -->
  <div id="fileModal" class="modal">
        <div class="modal-content-wrapper">
            <span class="close">&times;</span>
            <iframe class="modal-content" id="modalFile" src=""></iframe>
            <div id="caption"></div>
        </div>
    </div>


<!-- Multi Column with Form Separator -->
       <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('reg_plot') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
                <li>&nbsp; &nbsp;&nbsp;&nbsp; <strong style="background:green;"><?php echo $this->session->flashdata('message');?></strong></li>
            </ol>
        </div>


<!-- Property Listing Wizard -->
<div class="card">
<h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></h5>
  <hr class="my-4" />
<div id="wizard-property-listing" class="bs-stepper vertical mt-2">
<div class="bs-stepper-header gap-lg-2 border-end">
<div class="step" data-target="#personal-details">
<button type="button" class="step-trigger">
<span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
<span class="bs-stepper-label">
  <span class="bs-stepper-number">01</span>
  <span class="d-flex flex-column ms-2">
    <span class="bs-stepper-title">Register Plot Details</span>
    <span class="bs-stepper-subtitle"></span>
  </span>
</span>
</button>
</div>
<div class="line"></div>
<div class="step" data-target="#property-details">
<button type="button" class="step-trigger">
<span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
<span class="bs-stepper-label">
  <span class="bs-stepper-number">02</span>
  <span class="d-flex flex-column ms-2">
    <span class="bs-stepper-title">Customer Details</span>
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
  <span class="bs-stepper-number">03</span>
  <span class="d-flex flex-column ms-2">
    <span class="bs-stepper-title">Payment Details</span>
    <span class="bs-stepper-subtitle"></span>
  </span>
</span>
</button>
</div>

<div class="line"></div>
<div class="step" data-target="#price-details">
<button type="button" class="step-trigger">
<span class="bs-stepper-circle"><i class="ri-check-line"></i></span>
<span class="bs-stepper-label">
  <span class="bs-stepper-number">04</span>
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
          <input type="text" id="multicol-s_nos" class="form-control" name="s_no_inputs"  value="<?php if(isset($get_prop)){echo $get_prop['s_no'];}else{echo $get_seq_no;}?>" placeholder="Enter S.No" disabled/>
          <input type="hidden" name="s_no_input" id="multicol-s_no" value="<?php if(isset($get_prop)){echo $get_prop['s_no'];}else{echo $get_seq_no;}?>">
          <input type="hidden" name="seqno" id="seqno" value="<?php if(isset($seq_no)){echo $seq_no;}?>">
          <input type="hidden" class="form-control" name="reg_plot_id" id="reg_plot_id" value="<?php if(isset($get_prop)){echo $get_prop['reg_plot_id'];}?>" />
          <input type="hidden" class="form-control" name="customer_id" value="<?php if(isset($get_prop)){echo $get_prop['customer_id'];}?>" />
          <input type="hidden" class="form-control" name="" id="plot_det_id" value="<?php if(isset($get_prop)){echo $get_prop['plot_no'];}?>" />
          <label for="multicol-confirm-s_no">S.No</label>
        </div>
      </div>
     
      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="property_name_input" name="property_name_input" data-allow-clear="true">
          <option value="" selected disabled>Select Nager / Garden</option>
          <?php if(!empty($propert_list)){ 
            $selected = '';
            foreach($propert_list as $val){ 
            if(isset($get_prop)){
              if($get_prop['property_name'] == $val['property_id']){
                $selected = 'selected';
              }else{
                $selected = '';
              }
            }
            ?>
            <option value="<?php echo $val['property_id'];?>"  <?php echo $selected;?> ><?php echo $val['property_name'];?></option>
            <?php } ?>
           <?php } ?>
          </select>
          <label for="multicol-state">Select Nagar/Garden Name</label>
        </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
              <div class="form-floating form-floating-outline">
                  <select class="select2 form-select required_field" this_for="Plot No" id="plots_no_input" name="plots_no_input[]" data-allow-clear="true" multiple="multiple">
									<?php
									 if(isset($get_prop)){
 
                    $get_prop['plot_no'] = is_array($get_prop['plot_no']) ? $get_prop['plot_no'] : explode(',', $get_prop['plot_no']);
                    
                    if (!empty($plot_details)) { 
                        foreach ($plot_details as $val) {
                            $selected = '';
                            if (isset($get_prop['plot_no']) && in_array($val['plot_detail_id'], $get_prop['plot_no'])) {
                                $selected = 'selected';
                            }
                            ?>
                            <option value="<?php echo $val['plot_detail_id'];?>" <?php echo $selected;?> ><?php echo $val['plot_no'];?></option>
                            <?php 
                        } 
                    }
									 }
                  ?>

                  </select>
                  <label for="multicol-confirm-plot_no">Plot No</label>
              </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-total_plo_extension" class="form-control" name="total_plo_extension_input" value="<?php if(isset($get_prop)){echo $get_prop['total_plo_extension'];}?>" placeholder="Enter Total Plot Extension in Sqft/Sqmt"  />
              <label for="multicol-confirm-total_plo_extension">Total Plot Extension in Sqft/Sqmt</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-plot_reg_doc_num" class="form-control" name="plot_reg_doc_num" value="<?php if(isset($get_prop)){echo $get_prop['plot_reg_doc_num'];}?>" placeholder="Enter Plot Registration Document Number"  />
              <label for="multicol-confirm-plot_reg_doc_num">Plot Registration Document Number</label>
            </div>
          </div>
      </div>

        <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="formtabs-birthdate" class="form-control dob-picker" name="plot_reg_date_input" value="<?php if(isset($get_prop)){echo $get_prop['plot_reg_date'];}?>" placeholder="YYYY-MM-DD" />
                  <label for="formtabs-birthdate">Plot registration Date</label>
                </div>
              </div>

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
              <input type="text" id="multicol-plote_rate" class="form-control" name="plot_rate_input" value="<?php if(isset($get_prop)){echo $get_prop['plot_rate'];}?>" placeholder="Enter Plote Rate /Sqft"  />
              <label for="multicol-confirm-plote_rate">Plot Rate /Sqft</label>
            </div>
          </div>
      </div>

    
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
            <select id="name_ref_by_input" class="select2 form-select required_field" this_for="Name Refered By" name="name_ref_by_input" data-allow-clear="true">
                <option value="" selected disabled>Select Employee</option>
                <?php 
                $session_user_id = $this->session->userdata('userid');
                if(!empty($all_employees)){
                  foreach($all_employees as $val){
                    $selected = '';
                    if(isset($get_prop)){
                      if($val['staff_info_id'] == $get_prop['name_ref_by']){
                        $selected = 'selected';
                      }
                    } else if($val['staff_info_id'] == $session_user_id){
                      $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $val['staff_info_id'];?>" data-id="<?php echo $val['phone_number_1'];?>" <?php echo $selected;?> ><?php echo $val['employee_name'];?> / <?php echo $val['role_name'].' - '.$val['phone_number_1'];?></option>
                    <?php 
                  }
                }
                ?>
              </select>
          <label for="multicol-state">Name Refered By</label>
        </div>
      </div>

              <!-- <input type="text" id="multicol-name_ref_by" class="form-control" name="name_ref_by_input" value="<?php if(isset($get_prop)){echo $get_prop['name_ref_by'];}?>" placeholder="Enter Name Refered By"  />
              <label for="multicol-confirm-name_ref_by">Name Refered By</label> -->
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-alt_phone_number_input" class="form-control" name="alt_phone_number_input" value="<?php if(isset($get_prop)){echo $get_prop['alt_phone_number'];}?>" placeholder="Enter Alternative Phone Number"  />
              <label for="multicol-confirm-alt_phone_number_input">Alternative Phone Number</label>
            </div>
          </div>
      </div>
      <h6>Enter Plot Four Side Extension Value in Sqft/Sqmt</h6>
      <div id="plot_details_container" class="row">
      <!-- <div class="col-md-3">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-east_input" class="form-control" name="east_input" value="<?php if(isset($get_prop)){echo $get_prop['east'];}?>" placeholder="Enter East"  />
              <label for="multicol-confirm-east_input">East</label>
            </div>
          </div>
      </div> -->
      <!-- <div class="col-md-3">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-west" class="form-control" name="west_input" value="<?php if(isset($get_prop)){echo $get_prop['west'];}?>" placeholder="Enter West"  />
              <label for="multicol-confirm-west">West</label>
            </div>
          </div>
      </div> -->
      <!-- <div class="col-md-3">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-north" class="form-control" name="north_input" value="<?php if(isset($get_prop)){echo $get_prop['north'];}?>" placeholder="Enter North"  />
              <label for="multicol-confirm-north">North</label>
            </div>
          </div>  
      </div> -->
      <!-- <div class="col-md-3">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-South" class="form-control" name="south_input" value="<?php if(isset($get_prop)){echo $get_prop['south'];}?>" placeholder="Enter South"  />
              <label for="multicol-confirm-South">South</label>
            </div>
          </div>
      </div> -->
      <div class="row g-6">
            <div class="scroll-table">
                <div class="table-responsive">
								              <input type="hidden" id="plotData" name="plotData">
                              <table class="table" id="plotTable">
                                <thead style="text-align: center;">
																  <th>Plot No</th>
																  <th>Plot Extension</th>
                                  <th>East</th>
                                  <th>West</th>
                                  <th>North</th>
                                  <th>South</th>
                                  <th>Status</th>
                                </thead>
                                <tbody>
                                <?php if(isset($get_plot_details) && !empty($get_plot_details)){
                                    $lastIndex = count($get_plot_details) - 1;
                                  foreach($get_plot_details as $index => $val){ ?>
                                  <tr>
																	  <td><input type="text" class="form-control cmn plot_no" name="plot_no_input[]" value="<?php echo $val['plot_no'];?>"></td> 
																	  <td><input type="text" class="form-control cmn plot_extension" name="plot_extension_input[]" value="<?php echo $val['plot_extension'];?>"></td>
                                    <td><input type="text" class="form-control cmn north" name="north_input[]" value="<?php echo $val['north'];?>"></td> 
                                    <td><input type="text" class="form-control cmn east" name="east_input[]" value="<?php echo $val['east'];?>"></td>
                                    <td><input type="text" class="form-control cmn west" name="west_input[]" value="<?php echo $val['west'];?>"></td>
                                    <td><input type="text" class="form-control cmn south" name="south_input[]" value="<?php echo $val['south'];?>"></td>
                                    <td><input type="text" class="form-control cmn status" name="status_input[]" value="<?php echo $val['status'];?>"></td>
                                  </tr>
                                  <?php } ?>

                                  <?php }else{ ?>
                                    <!-- <tr>
                                    <td><input type="text" class="form-control cmn plot_no"></td>
                                    <td><input type="text" class="form-control cmn plot_extension"></td>
                                    <td><input type="text" class="form-control cmn north"></td>
                                    <td><input type="text" class="form-control cmn east"></td>
                                    <td><input type="text" class="form-control cmn west"></td>
                                    <td><input type="text" class="form-control cmn south"></td>
                                    <td><input type="text" class="form-control cmn status" value="UnSold"></td>
                                  </tr> -->
                                    <?php }?>
                                
                                </tbody>
                              </table>
                              </div>
                              </div>
                              <hr>
                <!-- <div class="col-12 d-flex justify-content-between">
                  <button class="btn btn-outline-secondary btn-prev"> <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                  <button  class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ri-arrow-right-line ri-16px"></i></button>
                </div> -->
            </div>
      </div>
      <!-- <hr class="my-6 mx-n4" /> -->
      <div class="col-12">
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
<div id="property-details" class="content">
<div class="row g-6">
<div class="col-md-4">
            <div class="input-group">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="buyer_gender_display"><?php if(isset($get_prop)){echo $get_prop['buyer_gender'];}?></button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText(this)">Mr</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText(this)">Mrs</a></li>
                </ul>
                <input type="text" class="form-control" aria-label="Text input with dropdown button" id="buyer_name_input" name="buyer_name_input" value="<?php if(isset($get_prop)){echo $get_prop['buyer_name'];}?>" placeholder="Enter Plot Buyer Name">
                <input type="hidden"  id="buyer_gender_input" name="buyer_gender_input" value="<?php if(isset($get_prop)){echo $get_prop['buyer_gender'];}?>">
            </div>
        </div>

       <div class="col-md-4">
      <div class="input-group">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="father_rel_display"><?php if(isset($get_prop)){echo $get_prop['father_rel'];}?></button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText_1(this)">s/o</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText_1(this)">w/o</a></li>
          </ul>
          <input type="hidden"  id="father_rel_input" name="father_rel_input" value="<?php if(isset($get_prop)){echo $get_prop['father_rel'];}?>">
          <input type="text" class="form-control"  name="father_name_input" aria-label="Text input with dropdown button" value="<?php if(isset($get_prop)){echo $get_prop['father_name'];}?>" placeholder="Father Name">
        </div>
        </div>

      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <select id="multicol-state" class="select2 form-select" name="district_input" data-allow-clear="true">
            <option value="" selected disabled>Select District</option>
						<?php 
              if (isset($district_list)) {
                  foreach ($district_list as $val) {
                      $selected = '';
                      if (isset($get_prop)) {
                          if ($val['district_name'] == $get_prop['buyer_district']) {
                              $selected = 'selected';
                          }
                      }
                      ?>
                      <option value="<?php echo $val['district_name']; ?>" <?php echo $selected; ?>><?php echo $val['district_name']; ?></option>
                      <?php 
                  }
              } 
            ?>
          </select>
          <label for="multicol-state">District</label>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <input type="text" id="multicol-district_pincode" class="form-control" name="district_pincode"  value="<?php  if(isset($get_prop)){echo $get_prop['buyer_pincode'];}?>" placeholder="Enter Pincode"/>
          <label for="multicol-pincode">Pincode</label>
        </div>
      </div>
      
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-Taluk_Name" class="form-control" name="taluk_name_input"  value="<?php if(isset($get_prop)){echo $get_prop['buyer_taluk_name'];}?>" placeholder="Enter Taluk Name"/>
              <label for="multicol-Taluk_Name">Taluk Name</label>
            </div>
          </div>
      </div>
      
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-v_t" class="form-control"  name="village_town_input" value="<?php if(isset($get_prop)){echo $get_prop['buyer_village_town'];}?>"  placeholder="Enter Village/Town Name"  />
              <label for="multicol-confirm-v_t">Village/Town Name</label>
            </div>
          </div>
      </div>
      
      <div class="col-md-4">
      <div class="input-group input-group-merge">
          <div class="form-floating form-floating-outline">
            <textarea class="form-control h-px-75" aria-label="With textarea" name="street_address_input" placeholder="Enter Street Address"><?php  if(isset($get_prop)){echo $get_prop['buyer_address'];}?></textarea>
            <label>Street Address</label>
          </div>
        </div>
      </div>


        <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-phone_number_1" class="form-control" name="phone_number_1_input" value="<?php  if(isset($get_prop)){echo $get_prop['phone_number'];}?>" placeholder="Enter Phone Number 1"  />
              <label for="multicol-confirm-phone_number_1">Phone Number 1</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-phone_number_2" class="form-control" name="phone_number_2_input" value="<?php if(isset($get_prop)){echo $get_prop['buyer_phone_number_2'];}?>" placeholder="Enter Phone Number 2"  />
              <label for="multicol-confirm-phone_number_2">Phone Number 2</label>
            </div>
          </div>
      </div>
			
      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="id_proof_select_input" name="id_proof_select_input" data-allow-clear="true">
          <option value="" selected disabled>Select Proof</option>
          <option value="Aadhar"  <?php if(isset($get_prop)){if($get_prop['id_proof_select'] == 'Aadhar'){ echo 'selected';}else{ echo '';} }else{echo 'selected';}?>>Aadhar</option>
          <option value="Voter ID" <?php if(isset($get_prop)){if($get_prop['id_proof_select'] == 'Voter ID'){ echo 'selected';}else{ echo '';} }?>>Voter ID</option>
          <option value="Passport" <?php if(isset($get_prop)){if($get_prop['id_proof_select'] == 'Passport'){ echo 'selected';}else{ echo '';} }?>>Passport</option>
          <option value="Pancard" <?php if(isset($get_prop)){if($get_prop['id_proof_select'] == 'Pancard'){ echo 'selected';}else{ echo '';} }?>>Pancard</option>
          <option value="Driving License" <?php if(isset($get_prop)){if($get_prop['id_proof_select'] == 'Driving License'){ echo 'selected';}else{ echo '';} }?>>Driving License</option>
          <option value="Smart Card" <?php if(isset($get_prop)){if($get_prop['id_proof_select'] == 'Smart Card'){ echo 'selected';}else{ echo '';} }?>>Smart Card</option>
          </select>
          <label for="multicol-state">Id Proof</label>
        </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="id_proof_input" name="id_proof_input" value="<?php if(isset($get_prop)){echo $get_prop['id_proof'];}?>" placeholder="Enter Aadhar No"  />
              <label for="multicol-confirm-plot_reg_doc_num" id="proof_label">Aadhar</label>
            </div>
          </div>
      </div>
      <hr>
    <div class="col-12 d-flex justify-content-between">
    <button class="btn btn-outline-secondary btn-prev"> <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
    <button  class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ri-arrow-right-line ri-16px"></i></button>
  </div>
</div>
</div>

<!-- Propery Area -->
<div id="property-area" class="content">
<div class="row g-6">
<div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="mode_payment_input" name="mode_payment_input" data-allow-clear="true">
          <option value="" selected disabled>Select Payment Type</option>
          <option value="Cash" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'Cash'){ echo 'selected';}else{ echo '';} }else{echo 'selected';}?>>Cash</option>
          <option value="Cheque" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'Cheque'){ echo 'selected';}else{ echo '';} }?>>Cheque</option>
          <option value="UPI" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'UPI'){ echo 'selected';}else{ echo '';} }?>>UPI</option>
          <option value="NEFT" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'NEFT'){ echo 'selected';}else{ echo '';} }?>>NEFT / RTGS</option>
          </select>
          <label for="multicol-state">Mode of Payement</label>
        </div>
      </div>
      
     <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="mode_payment_value_input" name="mode_payment_value_input" value="<?php if(isset($get_prop)){echo $get_prop['mode_payment_value'];}?>" placeholder="Enter Amount"  />
              <label for="multicol-confirm-mode_payment_value_input" id="mode_pay_label">Bank Tranfer</label>
            </div>
          </div>
      </div>
<hr>
    <div class="col-12 d-flex justify-content-between">
    <button class="btn btn-outline-secondary btn-prev"> <i class="ri-arrow-left-line ri-16px me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
    <button  class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ri-arrow-right-line ri-16px"></i></button>
  </div>
</div>
</div>

<!-- Price Details -->
<div id="price-details" class="content">
<div class="row g-6">
<!-- <div class="col-6"> -->
<div class="col-6">
      <h6 class="card-header">Upload Registered Title Deed Document</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-multi_1">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="reg_plot_reg_title_deed_doc_file_input[]" id="targetInput_1" style="display:none;">
          <div class="fallback">
            <input type="file"  name="reg_plot_reg_title_deed_doc_file_input[]"  />
          </div>

          <?php if(!empty($reg_plot_reg_title_deed)){foreach($reg_plot_reg_title_deed as $val){?>
            
          <div class="dz-preview dz-file-preview">
        <div class="dz-details">
          <div class="dz-thumbnail">
          <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
        </div>
        <div class="text-center my-3">
        <input type="button" class="btn-outline-danger delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="reg_plot_reg_title_deed" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);">
        </div>
        </div>
        </div>

        <?php }
        }?>

      </div>
      </div>
      </div>
      
      <div class="col-6">
      <h6 class="card-header">Upload Plot Sketch</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-multi_2">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="plot_sketch_file_input[]" id="targetInput_2" style="display:none;">
          <div class="fallback">
            <input name="plot_sketch_file_input[]" type="file" />
          </div>

          <?php if(!empty($plot_sketch)){foreach($plot_sketch as $val){?>
            
            <div class="dz-preview dz-file-preview">
          <div class="dz-details">
            <div class="dz-thumbnail">
            <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
          </div>
          <div class="text-center my-3">
          <input type="button" class=" btn-outline-danger  delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="plot_sketch" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);">

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


<!-- end table -->
</div>

          </div>
          <!-- / Content -->
 <!-- Page JS -->
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
 <script src="<?=base_url()?>/assets/js/form-layouts.js"></script>

  <script>
  $(document).ready(function() {
         $(".prop").addClass("open");
         $(".reg_plot").addClass("active");

         var property = $('#property_name_input').val();
         var Plot_no =  '<?= isset($get_prop_) ? $get_prop_['plot_detail_id'] : "" ?>';
         var check_redirect = '<?= isset($get_prop_) ? "true" : "false" ?>';  
         
        //  get_plot_details(property);
      
     if(check_redirect == 'true'){
          
          var property = '<?= isset($get_prop_) ? $get_prop_['property_id'] : "" ?>';
          setTimeout(() => {
				  $('#property_name_input').val(property).trigger('change');
          }, 1000);
     }
        
        //  get_plot_details(property);

         $('#property_name_input').on('change',function() {
				  $('#plots_no_input').val(null).trigger('change');
					$('#plots_no_input').next('.select2-container').find('.select2-selection__clear').remove();
					$('#plotTable tbody').html('');
          const property_id =$(this).val();
          get_garden_nagar_details(property_id);
          get_garden_nagar_files_details(property_id);
          get_plot_details(property_id);
          get_offer_incentive(property_id);
        });

    //plot extension
    var ignoreChange = false;

    $('#plots_no_input').on('change',function() {
     var det_id = $(this).val();
     get_plot_details_id(det_id);
    //  get_offer_incentive($('#property_name_input').val());
    });

    $('#mode_payment_input').on('change', function() {
   var val=$(this).val();
   get_offer_incentive($('#property_name_input').val());
   if(val == 'Bank Tranfer'){
    var placeholter_str = 'Enter Amount';
   }
   else{
    var placeholter_str = 'Enter '+ val + ' No';
   }

  $('#mode_payment_value_input').attr('placeholder', placeholter_str);   
   $('#mode_pay_label').html(val);
});


    function get_offer_incentive(property_id){
    var payment_mode = $('#mode_payment_input').val();
    if(property_id != '' && property_id != null && payment_mode == 'Cash'){
    $.ajax({
          url: '<?=base_url()?>admin/unregistered_plots_controller/get_offer_incentive?property_id='+property_id,
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
          if(response && response.length >0){
            var selectedValues = [];
        $('select[name="plots_no_input[]"] option:selected').each(function() {
            selectedValues.push($(this).val()); // Push the value of the selected option
        });
            $('#mode_payment_value_input').val(response[0].total_values * selectedValues.length);
          }else{
            $('#mode_payment_value_input').val(0);
          }
       },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }
    });
   }else{
    $('#mode_payment_value_input').val(0);
   }
  }

   function get_garden_nagar_details(property_id){
    if(property_id != '' && property_id != null){

    $.ajax({
          url: '<?=base_url()?>admin/unregistered_plots_controller/get_property_details?property_id='+property_id,
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
           
            $("[name='plot_reg_doc_num']").val(response.document_reg_no); 
            $("[name='patta_chitta_input']").val(response.patta_chitta);
            $("[name='t_s_no_input']").val(response.t_s_no);
            $("[name='ward_block_input']").val(response.ward_block);
            $("[name='reg_district_input']").val(response.reg_district);
            $("[name='reg_town_village_input']").val(response.reg_town_village);
            $("[name='reg_revenue_taluk_input']").val(response.reg_revenue_taluk);
            $("[name='sub_reg_input']").val(response.sub_reg);
            $("[name='reg_sub_district_input']").val(response.reg_sub_district);
            var staff_id = response.staff_id;
            var TeamArray = staff_id.split(',');
				// Set the values to the select element
				$("#name_ref_by_input").val(TeamArray);

				// Trigger the change event
				$("#name_ref_by_input").trigger('change');
      
       },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }
    });
   }
  }

   function get_garden_nagar_files_details(property_id){
    if(property_id != '' && property_id != null){

    $.ajax({
          url: '<?=base_url()?>admin/unregistered_plots_controller/get_property_files?property_id='+property_id+'&module_type=registered_title_deed',
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
          // console.log(response);
          var Id_name = 'dropzone-multi_1';
          addFilesToDropzone(response,Id_name);
       },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }

        });

   }
  }

   function get_plot_details(property_id){
    if(property_id != '' && property_id != null){
    
    var detail_id = $('#plot_no_input').data('plot');
    var plotDetIdValue = $('#plot_det_id').val();
    if(plotDetIdValue){
      var status = ['UnSold', 'Booked', 'Registered']; // Array of status values
    }else{
      var status = ['UnSold', 'Booked']; // Array of status values
    }
    

    // Convert the array to a comma-separated string
    var statusParam = status.map(s => encodeURIComponent(s)).join(',');
   

      $.ajax({
        url: '<?=base_url()?>admin/unregistered_plots_controller/get_plot_details',
        type: 'GET',
        data: {
            property_id: property_id,
            status: statusParam
        },
          dataType: 'json',  
          success: function(response) {
           var html= ``;
           var selected = ``;
           html += `<option value="">Select Plot No</option>`;
           response.forEach(function(data){
            if(data.plot_detail_id == detail_id){ selected = `selected`;}else{ selected =``;}
            html += `<option value="${data.plot_detail_id}" ${selected}>${data.plot_no}</option>`;
           });

           $('#plots_no_input').html(html);
           
           if(check_redirect == 'true'){
            $('#plots_no_input').val(Plot_no).trigger('change');
            }

        },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }

        });
   }
  }

  //  function get_plot_details_id(det_id){    
  //   if(det_id != '' && det_id != null){

  //   $.ajax({
  //         url: '<?=base_url()?>admin/unregistered_plots_controller/get_single_plot_details?detail_id='+det_id,
  //         type: 'GET',
  //         processData: false,  
  //         contentType: false, 
  //         dataType: 'json',  
  //         success: function(response) {
  //           $("[name='total_plo_extension_input']").val(response.plot_extension);
  //           $("[name='east_input']").val(response.east);
  //           $("[name='west_input']").val(response.west);
  //           $("[name='north_input']").val(response.north);
  //           $("[name='south_input']").val(response.south);
           
  //       },
  //     error: function(xhr, status, error) {
  //         console.error('AJAX error:', status, error); // Log AJAX errors
  //     }

  //   });
  //  }
  // }
   function get_plot_details_id(det_id) {
       if (det_id != '' && det_id != null) {
           $.ajax({
               url: '<?=base_url()?>admin/unregistered_plots_controller/get_multiple_details?detail_id=' + det_id,
               type: 'GET',
               processData: false,
               contentType: false,
               dataType: 'json',
               success: function(response) {
                  var plotDetailsContainer = $('#plotTable tbody');
                   plotDetailsContainer.empty(); // Clear existing content
                  response.forEach(function(plot) {
                      const newRow = `
                      <tr sty>
											  <td><input type="text" class="form-control cmn plot_no" name="plot_no_input[]" value="${plot.plot_no}"></td> 
											  <td><input type="text" class="form-control cmn plot_extension" name="plot_extension_input[]" value="${plot.plot_extension}"></td>
                        <td><input type="text" class="form-control cmn east" name="east_input[]" value="${plot.east}" ></td>
                        <td><input type="text" class="form-control cmn west" name="west_input[]" value="${plot.west}"></td>
                        <td><input type="text" class="form-control cmn north" name="north_input[]" value="${plot.north}" ></td>
                        <td><input type="text" class="form-control cmn south" name="south_input[]" value="${plot.south}"></td>
                        <td><input type="text" class="form-control cmn status" name="status_input[]"value="${plot.status}"></td>
                      </tr>`;
                      plotDetailsContainer.append(newRow);
                      if(plot.status == 'Booked'){
                        if (ignoreChange) {
                              return;
                          }
                        get_confirmation_on_user(plot.plot_no);
                      }

                      if(ignoreChange){
                      return;
                      }else{
                      get_offer_incentive($('#property_name_input').val());
                      }

                  });
               },
               error: function(xhr, status, error) {
                   console.error('AJAX error:', status, error); // Log AJAX errors
               }
           });
       }
   }

   function formatDate(inputDate) {
    const date = new Date(inputDate);
    const day = String(date.getDate()).padStart(2, '0');  // Adds leading zero if necessary
    const month = String(date.getMonth() + 1).padStart(2, '0');  // getMonth() returns 0-11, so we add 1
    const year = date.getFullYear();

    return `${day}/${month}/${year}`;
}

   function get_confirmation_on_user(id){
    if(id){
      $.ajax({
               url: '<?=base_url()?>admin/unregistered_plots_controller/get_plot_booked_plot_details?id=' + id,
               type: 'GET',
               processData: false,
               contentType: false,
               dataType: 'json',
               success: function(response) {
                if(response){
                response.forEach(function(plot) {
                Swal.fire({
                title: 'This Plot Already Booked',
                html : 'Plot No : ' + plot.plot_no + '<br>Date Of booked : '+ formatDate(plot.created_date) +' <br>Buyer Name : '+ plot.buyer_name +'<br>Mobile Number : '+ plot.phone_number +'',
                icon: 'warning',
                showCancelButton: true, 
                confirmButtonText: 'Continue',  
                cancelButtonText: 'Cancel', 
                reverseButtons: false,  
                }).then((result) => {
                if (result.isConfirmed) {
              $("[name='street_address_input']").val(plot.buyer_address);
              $("[name='buyer_name_input']").val(plot.buyer_name);
              $("[name='id_proof_select_input']").val(plot.id_proof_select).change();
              $("[name='id_proof_input']").val(plot.id_proof);
              $("[name='phone_number_1_input']").val(plot.phone_number);
              $("[name='customer_id']").val(plot.customer_id);
              $("[name='father_name_input']").val(plot.father_name);
              $("[name='father_rel_input']").val(plot.father_rel);
              $("[name='buyer_gender_input']").val(plot.buyer_gender);
              $("#father_rel_display").html(plot.father_rel);
              $("#buyer_gender_display").html(plot.buyer_gender);
							$("[name='district_input']").val(plot.buyer_district).change();
              $("[name='district_pincode']").val(plot.buyer_pincode);
              $("[name='taluk_name_input']").val(plot.buyer_taluk_name);
              $("[name='phone_number_2_input']").val(plot.buyer_phone_number_2);
              //$("[name='total_plot_buyed_input']").val(plot.total_plot_buyed);
							$("[name='village_town_input']").val(plot.buyer_village_town);

              if(plot.plots){
                let str = plot.plots;
              var selectedValues = [];
              if (str.includes(',')) {
                  selectedValues = str.split(',');
              } else {
                  selectedValues.push(str);
              }
              
              $('#plots_no_input').val(selectedValues);
              ignoreChange = true;
              $('#plots_no_input').trigger('change');
              setTimeout(() => {
              ignoreChange = false;
              }, 1000);
            }

              var payment_mode_ = $('#mode_payment_input').val();
              // var payment_mode_value_ = $('#mode_payment_value_input').val();
              // var payment_mode_value_1 = (payment_mode_value_ !='' ? payment_mode_value_ : 0);
              var get_cash_amount = 0;
              if(payment_mode_=='Cash'){
                 get_cash_amount = parseFloat(plot.bal_amount_for_plot);
              }

              $('#mode_payment_value_input').val(get_cash_amount);
                }
                }).catch((error) => {
                console.error('Swal error:', error);
                });

                $(".swal2-deny").remove();

                  });
                }
               },
               error: function(xhr, status, error) {
                   console.error('AJAX error:', status, error); // Log AJAX errors
               }
           });
    }
   }

    function addFilesToDropzone(files, Id_name) {
    const dropzone = Dropzone.forElement(`#${Id_name}`);
    if (dropzone) {
        dropzone.removeAllFiles(true); // Remove all files from Dropzone
        
        files.forEach(file => {
            const filePath = `<?= base_url() ?>${file.tbl_file_path}`;
            fetch(filePath)
                .then(response => response.blob())
                .then(blob => {
                    const newFile = new File([blob], file.tbl_client_name, { type: blob.type });

                    // Use Dropzone's methods to properly add files
                    dropzone.files.push(newFile);
                    dropzone.emit('addedfile', newFile);
                    dropzone.createThumbnail(newFile, dropzone.options.thumbnailWidth, dropzone.options.thumbnailHeight, dropzone.options.thumbnailMethod, true, (dataUrl) => {
                        dropzone.emit('thumbnail', newFile, dataUrl);
                        dropzone.emit('complete', newFile);
                    });
                })
                .catch(error => console.error('File fetch error:', error));
        });

        // Log all files in the dropzone
        dropzone.on("complete", () => {
        });
    } else {
        console.error(`Dropzone with id ${Id_name} not found.`);
    }
}

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
document.querySelector("#dropzone-multi_2"));a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:5,addRemoveLinks:!0})}();

  const form = document.getElementById('wizard-property-listing-form');
  const submitBtn = document.getElementById('submitBtn');
  
  submitBtn.addEventListener('click', function() {
  var myDropzone_arr = ['dropzone-multi_1','dropzone-multi_2'];
  myDropzone_arr.forEach(element => {
  var myDropzone = Dropzone.forElement("#"+element);
if (myDropzone !== undefined && myDropzone !== null) {
  var parts = element.split('_');
  var lastPart = parts[parts.length - 1];
  console.log(lastPart);
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

        $(this).find('td input').each(function() { 
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

		      let isValid1 = true;
          for (const field of document.querySelectorAll('.required_field')) {
              if (!field.value || field.value === "") {
                  const fieldName = field.getAttribute('this_for') || field.name || field.id;
                  alert(`Please fill out the required field: ${fieldName}`);
                  field.focus();
                  isValid1 = false;
                  break; 
              }
          }
          
          if (!isValid1) {
              return; 
          }

          const formData = new FormData(form); 
           $.ajax({
          url: '<?=base_url()?>admin/register_plots_controller/save_register_plot',
          type: 'POST',
          data: formData,
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
          console.log(response);

          if (response.status === 'success') {
              Swal.fire({
                  title: 'Success',
                  html: response.message,
                  icon: 'success'
              }).then((result) => {
              window.location.href = "<?= base_url('reg_plot'); ?>";
              }).catch((error) => {
                  console.error('Swal error:', error); // Log any errors with Swal
              });
              $(".swal2-deny").remove();
              $(".swal2-cancel").remove();
          } else {
              console.error('Unexpected status:', response.status); // Log unexpected status
          }
      },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }

        });

});

document.addEventListener('DOMContentLoaded', (event) => {
    var modal = document.getElementById("fileModal");

    var modalFile = document.getElementById("modalFile");
    var captionText = document.getElementById("caption");

    var span = document.getElementsByClassName("close")[0];

    window.showFileModal = function(filePath) {
        document.body.classList.add('modal-open');
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
        document.body.classList.remove('modal-open');
    }

});

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

function updateButtonText(element) {
    var button = element.closest('.input-group').querySelector('.btn.dropdown-toggle');
    button.textContent = element.textContent;
   document.getElementById('buyer_gender_input').value = element.textContent;
}

function updateButtonText_1(element) {
    var button = element.closest('.input-group').querySelector('.btn.dropdown-toggle');
    button.textContent = element.textContent;
   document.getElementById('father_rel_input').value = element.textContent;
}

$(document).ready(function() {

      // ********select 2 ***************
      var o = $("#property_name_input");
      select2Focus(o);
      o.wrap('<div class="position-relative"></div>');
      o.select2({ placeholder: "Select Nagar / Garden", dropdownParent: o.parent() });
      // ********select 2 ***************

      // ********select 2 ***************
      var o = $("#plots_no_input");
      select2Focus(o);
      o.wrap('<div class="position-relative"></div>');  
      o.select2({ placeholder: "Select Plot No", dropdownParent: o.parent(), allowClear: true });
      // ********select 2 ***************

      
    // ********select 2 ***************
    var o = $("#id_proof_select_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Proof", dropdownParent: o.parent() });
  // ********select 2 ***************
 
  // ********select 2 ***************
  var o = $("#mode_payment_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Payment Type", dropdownParent: o.parent() });
  // ********select 2 ***************
  var o = $("#name_ref_by_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Employee", dropdownParent: o.parent() });
  // ********select 2 ***************
  

  var val_1 = $('#id_proof_select_input').val();
   var placeholter_str_1 = 'Enter '+ val_1 + ' No';
  $('#id_proof_input').attr('placeholder', placeholter_str_1);
   $('#proof_label').html(val_1);

// ----------------------------------

var val_pay=$('#mode_payment_input').val();
   if(val_pay == 'Bank Tranfer'){
    var placeholter_str_pay = 'Enter Amount';
   }
   else{
    var placeholter_str_pay = 'Enter '+ val_pay + ' No';
   }

  $('#mode_payment_value_input').attr('placeholder', placeholter_str_pay);   
   $('#mode_pay_label').html(val_pay);

  //  ---------------------------------------

  $('#id_proof_select_input').on('change', function() {
   var val=$(this).val();
   var placeholter_str = 'Enter '+ val + ' No';
  $('#id_proof_input').attr('placeholder', placeholter_str);
   $('#proof_label').html(val);
});

});
   
  $(function() {
        $("#buyer_name_input").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo base_url('admin/unregistered_plots_controller/autocomplete'); ?>",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                console.log("Selected ID: " + ui.item.id);

              $("[name='street_address_input']").val(ui.item.street_address);
              $("[name='id_proof_select_input']").val(ui.item.id_proof_select).change();
              $("[name='id_proof_input']").val(ui.item.id_proof);
              $("[name='phone_number_1_input']").val(ui.item.phone_number_1);
              $("[name='customer_id']").val(ui.item.id);
              $("[name='father_name_input']").val(ui.item.father_name);
              $("[name='father_rel_input']").val(ui.item.father_rel);
              $("[name='buyer_gender_input']").val(ui.item.buyer_gender);
              $("#father_rel_display").html(ui.item.father_rel);
              $("#buyer_gender_display").html(ui.item.buyer_gender);
							$("[name='district_input']").val(ui.item.district).change();
              $("[name='district_pincode']").val(ui.item.pincode);
              $("[name='taluk_name_input']").val(ui.item.taluk_name);
              $("[name='phone_number_2_input']").val(ui.item.phone_number_2);
              //$("[name='total_plot_buyed_input']").val(ui.item.total_plot_buyed);
							$("[name='village_town_input']").val(ui.item.village_town);
              
            }
        });

        $("#buyer_name_input").on('blur', function() {
            var customerName = $(this).val();
            $.ajax({
                url: "<?php echo base_url('admin/unregistered_plots_controller/add_customer'); ?>",
                type: "POST",
                data: { customerName: customerName },
                dataType: "json",
                success: function(data) {
                 $("[name='customer_id']").val(data.id);
                }
            });
        });

        $(document).on("change", "#name_ref_by_input", function() {
        var selectedOption = $(this).find("option:selected"); // Get the selected <option>
        var alternate_number = selectedOption.attr("data-id"); // Access the data-id attribute
        $("#multicol-alt_phone_number_input").val(alternate_number); // Set the value in the target input
        });
    });



</script>


<!-- assets\js\wizard-ex-property-listing.js -->

<script>

  "use strict";

!function () {
   
    var t = document.querySelector("#wizard-property-listing");

    if (null !== t) {
        var o = t.querySelector("#wizard-property-listing-form"),
            e = o.querySelector("#personal-details"),
            i = o.querySelector("#property-details"),
            // a = o.querySelector("#property-features"),
            n = o.querySelector("#property-area"),
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

            c = FormValidation.formValidation(i, {
                fields: {
                    plPropertyType: { validators: { notEmpty: { message: "Please select property type" } } },
                    plZipCode: {
                        validators: {
                            notEmpty: { message: "Please enter zip code" },
                            stringLength: { min: 4, max: 10, message: "The zip code must be more than 4 and less than 10 characters long" }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: function (e, t) { return "plAddress" !== e ? ".col-sm-6" : ".col-lg-12"; }
                    }),
                    autoFocus: new FormValidation.plugins.AutoFocus,
                    submitButton: new FormValidation.plugins.SubmitButton
                }
            }).on("core.form.valid", function () { s.next(); });

     
            const m = FormValidation.formValidation(r, {
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
                    case 1: c.validate(); break;
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




// Set a 1-second delay before executing the code
// setTimeout(function() {
//   // Get the comma-separated values from the hidden input
// var plotDetIdValue = $('#plot_det_id').val();
// if(plotDetIdValue){
//   // Split the comma-separated values into an array
// var valuesToSet = plotDetIdValue.split(',').map(function(value) {
//     return value.trim(); // Trim any extra whitespace
// });
//     // Set values and trigger change event
//     $('#plots_no_input').val(valuesToSet).trigger('change');

// }
// }, 1000); // 1000 milliseconds = 1 second
</script>
    