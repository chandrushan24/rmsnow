
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css" />
    <script src="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
 <style>
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


<!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    

<!-- Multi Column with Form Separator -->
       <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('booked_plot') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
            </ol>
        </div>
<div class="card">
  <h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?> </h5>
  <hr class="my-4" />

  <form id="myForm" class="card-body" method="post" enctype="multipart/form-data" onSubmit="return false">
    <div class="row g-6">
      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <input type="text" id="multicol-s_nos" class="form-control" name="s_no_inputs"  value="<?php if(isset($get_prop)){echo $get_prop['s_no'];}else{echo $get_seq_no;}?>" placeholder="Enter S.No" disabled/>
          <input type="hidden" name="s_no_input" id="multicol-s_no" value="<?php if(isset($get_prop)){echo $get_prop['s_no'];}else{echo $get_seq_no;}?>">
          <input type="hidden" name="seqno" id="seqno" value="<?php if(isset($seq_no)){echo $seq_no;}?>">
          <input type="hidden" class="form-control" name="customer_id" value="<?php if(isset($get_prop)){echo $get_prop['customer_id'];}?>" />

          <input type="hidden" class="form-control" name="booked_plot_id" value="<?php if(isset($get_prop)){echo $get_prop['booked_plot_id'];}?>" />
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
                // Determine the plot numbers array from either $get_prop or $get_prop_
                $selected_plots = isset($get_prop) ? $get_prop : (isset($get_prop_) ? $get_prop_ : []);
                $selected_plots['plot_no'] = is_array($selected_plots['plot_no']) ? $selected_plots['plot_no'] : explode(',', $selected_plots['plot_no']);
                if (!empty($plot_details)) {
                    foreach ($plot_details as $val) {
                        // Condition to show:
                        // 1. Unbooked plots (status is not "Booking")
                        // 2. Plots booked by the current user (plot ID is in $selected_plots['plot_no'])
                        if ($val["status"] != "Booking" || in_array($val['plot_detail_id'], $selected_plots['plot_no'])) {
                            $selected = in_array($val['plot_detail_id'], $selected_plots['plot_no']) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $val['plot_detail_id']; ?>" <?php echo $selected; ?>><?php echo $val['plot_no']; ?></option>
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
              <input type="text" id="multicol-total_plo_extension" class="form-control" name="total_plot_extension_input" value="<?php if(isset($get_prop)){echo $get_prop['total_plot_extension'];}?>" placeholder="Enter Total Plot Extension in Sqft/Sqmt"  />
              <label for="multicol-confirm-total_plo_extension">Total Plot Extension in Sqft/Sqmt</label>
            </div>
          </div>
      </div>
        <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="formtabs-birthdate" class="form-control dob-picker" name="tentative_reg_date_input" value="<?php if(isset($get_prop)){echo $get_prop['tentative_reg_date'];}else{echo date('Y-m-d'); }?>"  placeholder="YYYY-MM-DD" />
                  <label for="formtabs-birthdate">Tentative Registration Date</label>
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
                    <option value="<?php echo $val['staff_info_id'];?>" data-id="<?php echo $val['phone_number_2'];?>"  <?php echo $selected;?> ><?php echo $val['employee_name'];?> / <?php echo $val['role_name'].' - '.$val['phone_number_1']; ?></option>
                    <?php 
                  }
                }
                ?>
          </select>
          <label for="multicol-state">Name Refered By</label>
        </div>
      </div>
      </div>

      <!-- <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-name_ref_by" class="form-control" name="name_ref_by_input" value="<?php if(isset($get_prop)){echo $get_prop['name_ref_by'];}?>" placeholder="Enter Name Refered By"  />
              <label for="multicol-confirm-name_ref_by">Name Refered By</label>
            </div>
          </div>
      </div> -->

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-phone_number" class="form-control" name="alt_phone_number_input" value="<?php if(isset($get_prop)){echo $get_prop['alt_phone_number'];}?>" placeholder="Enter Phone Number"  />
              <label for="multicol-confirm-phone_number">Alternative Phone Number</label>
            </div>
          </div>
      </div>
      <hr>
      <h6> <i class="ri-user-line"></i> Customer Details:</h6>
      <div class="col-md-4">
            <div class="input-group">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="buyer_gender_display"><?php if(isset($get_prop)){echo $get_prop['buyer_gender'];}?></button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText(this)">Mr</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText(this)">Mrs</a></li>
                </ul>
                <input type="text"  id="buyer_name_input" class="form-control" aria-label="Text input with dropdown button" name="buyer_name_input" value="<?php if(isset($get_prop)){echo $get_prop['buyer_name'];}?>" placeholder="Enter Plot Buyer Name">
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
                          if ($val['buyer_district'] == $get_prop['district']) {
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
      <h6 > <i class="ri-home-4-line"></i> Plot Details:</h6>
      <!-- <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-east_input" class="form-control" name="east_input" value="<?php if(isset($get_prop)){echo $get_prop['east'];}?>" placeholder="Enter East"  />
              <label for="multicol-confirm-east_input">East</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-west" class="form-control" name="west_input" value="<?php if(isset($get_prop)){echo $get_prop['west'];}?>" placeholder="Enter West"  />
              <label for="multicol-confirm-west">West</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-north" class="form-control" name="north_input" value="<?php if(isset($get_prop)){echo $get_prop['north'];}?>" placeholder="Enter North"  />
              <label for="multicol-confirm-north">North</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
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
                  <input type="hidden" id="plotData" name="plotData" />
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
                                <td><input type="text" class="form-control cmn plot_no" name="plot_no_input[]" value="<?php echo $val['plot_no'];?>" /></td>
                                <td><input type="text" class="form-control cmn plot_extension" name="plot_extension_input[]" value="<?php echo $val['plot_extension'];?>" /></td>
                                <td><input type="text" class="form-control cmn north" name="north_input[]" value="<?php echo $val['north'];?>" /></td>
                                <td><input type="text" class="form-control cmn east" name="east_input[]" value="<?php echo $val['east'];?>" /></td>
                                <td><input type="text" class="form-control cmn west" name="west_input[]" value="<?php echo $val['west'];?>" /></td>
                                <td><input type="text" class="form-control cmn south" name="south_input[]" value="<?php echo $val['south'];?>" /></td>
                                <td><input type="text" class="form-control cmn status" name="status_input[]" value="<?php echo $val['status'];?>" /></td>
                              </tr>
                            <?php } ?>
                          <?php }?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

      <hr>
      <h6 > <i class="ri-money-dollar-circle-line"></i> Payment Details</h6>
      
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-adv_amount_plot_input" class="form-control" name="adv_amount_plot_input" value="<?php if(isset($get_prop)){echo $get_prop['adv_amount_plot'];}?>" placeholder="Enter Advance Amount for Plot"  />
              <label for="multicol-confirm-adv_amount_plot_input">Advance Amount for Plot</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-bal_amount_for_plot_input" class="form-control" name="bal_amount_for_plot_input" value="<?php if(isset($get_prop)){echo $get_prop['bal_amount_for_plot'];}?>" tot_amt="<?php if(isset($get_prop)){echo $get_prop['bal_amount_for_plot'];}?>" placeholder="Enter Balance Amount for Plot" readonly />
              <label for="multicol-confirm-bal_amount_for_plot_input">Balance Amount for Plot</label>
            </div>
          </div>
      </div>
      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="mode_payment_input" name="mode_payment_input" data-allow-clear="true">
          <option value="" selected disabled>Select Payment Type</option>
          <option value="Cash" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'Cash'){ echo 'selected';}else{ echo '';} }else{echo 'selected';}?>>Cash</option>
          <option value="Cheque" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'Cheque'){ echo 'selected';}else{ echo '';} }?>>Cheque</option>
          <option value="UPI" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'UPI'){ echo 'selected';}else{ echo '';} }?>>UPI</option>
          <option value="NEFT" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'NEFT'){ echo 'selected';}else{ echo '';} }?>>NEFT</option>
          </select>
          <label for="multicol-state">Mode of Payement</label>
        </div>
      </div>

     <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="mode_payment_value_input" name="mode_payment_value_input" value="<?php if(isset($get_prop)){echo $get_prop['mode_payment_value'];}?>" placeholder="Enter Amount"  />
              <label for="multicol-confirm-mode_payment_value_input" id="mode_pay_label">Cash</label>
            </div>
          </div>
      </div>

      </div>
<hr>
    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <a href="<?= base_url('booked_plot') ?>" class="btn btn-outline-danger me-4">Back</a>
    </div>
    </div>
  </form>
<!-- </div>
</div>
</div> -->



<!-- end table -->
</div>

          </div>
          <!-- / Content -->
 <!-- Page JS -->
 <script src="<?=base_url()?>/assets/js/extended-ui-sweetalert2.js"></script>
 <script src="<?=base_url()?>/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
 <script src="<?=base_url()?>/assets/js/form-layouts.js"></script>
  <script src="<?=base_url()?>/assets/vendor/libs/dropzone/dropzone.js"></script>
  <script>
    
  $(document).ready(function() {
         $(".prop").addClass("open");
         $(".booked_plot").addClass("active");

           // ********select 2 ***************
       var o = $("#property_name_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Nagar / Garden", dropdownParent: o.parent() });
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

      // ********select 2 ***************
			var o = $("#plots_no_input");
       
       // Custom focus behavior for select2 (ensure this function exists)
       select2Focus(o);
       
       // Wrap the select element for positioning
       o.wrap('<div class="position-relative"></div>');
       
       // Initialize select2 after the options have been fully set
       o.select2({
           placeholder: "Select Plot No",
           dropdownParent: o.parent(),
       });
  
       // Ensure selected values remain consistent after initialization
       var selectedValues = <?php echo json_encode($selected_plots['plot_no']); ?>;
       o.val(selectedValues).trigger('change');
      // ********select 2 ***************
      var o = $("#name_ref_by_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Employee", dropdownParent: o.parent() });
  // ********select 2 ***************
  


  // +++++++++++++++Start ++++++++++++++++++
  // ____________________________________


   
        var property = $('#property_name_input').val();
        var Plot_no = '<?= isset($get_prop_) ? $get_prop_['plot_detail_id'] : "" ?>';
         var check_redirect = '<?= isset($get_prop_) ? "true" : "false" ?>';  
        //  get_plot_details(property);
      
    if(check_redirect == 'true'){
          var property = '<?= isset($get_prop_) ? $get_prop_['property_id'] : "" ?>';
          setTimeout(() => {
				  $('#property_name_input').val(property).trigger('change');
          }, 1000);
     }


      $('#property_name_input').on('change',function() {
				$('#plots_no_input').val(null).trigger('change');
			  $('#plots_no_input').next('.select2-container').find('.select2-selection__clear').remove();
				$('#plotTable tbody').html('');
      const property_id =$(this).val();
      get_garden_nagar_details(property_id);
      get_plot_details(property_id);
      });

      //plot extension
      var ignoreChange = false;

      $('#plots_no_input').on('change',function() {
      var det_id = $(this).val();
      get_plot_details_id(det_id);
     
      });

      $('[name="adv_amount_plot_input"]').on('input',function() {
        var payment_mode = $('#mode_payment_input').val();
       if(payment_mode == 'Cash'){
            var adv_amount_plot_input = $('[name="adv_amount_plot_input"]').val() || 0;
            // var balance_amt = $('[name="bal_amount_for_plot_input"]').val() || 0;
						var balance_amt = $("[name='bal_amount_for_plot_input']").attr("tot_amt") || 0;
            $('[name="bal_amount_for_plot_input"]').val((balance_amt) - (adv_amount_plot_input));
            $('#mode_payment_value_input').val($('[name="adv_amount_plot_input"]').val() || 0);
          }else{
            $('#mode_payment_value_input').val($('[name="adv_amount_plot_input"]').val() || 0);
          }
      });
      
      // autocomplte


      function get_garden_nagar_details(property_id){
        if(property_id !='' && property_id !=null){
      $.ajax({
      url: '<?=base_url()?>admin/unregistered_plots_controller/get_property_details?property_id='+property_id,
      type: 'GET',
      processData: false,  
      contentType: false, 
      dataType: 'json',  
      success: function(response) {
        
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


      function get_plot_details(property_id){
        if(property_id !='' && property_id !=null){

      var detail_id = $('#plots_no_input').data('plot');
      var status = "UnSold,Booked";
      $.ajax({
        url: '<?=base_url()?>admin/unregistered_plots_controller/get_plot_details?property_id=' + property_id + '&status=' + status,
      type: 'GET',
      processData: false,  
      contentType: false,
      dataType: 'json',  
      success: function(response) {
        var html= ``;
        var selected = ``;
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

    //   function get_plot_details_id(det_id){
    //     if(det_id !='' && det_id !=null){
    //   $.ajax({
    //   url: '<?=base_url()?>admin/unregistered_plots_controller/get_single_plot_details?detail_id='+det_id,
    //   type: 'GET',
    //   processData: false,  
    //   contentType: false, 
    //   dataType: 'json',  
    //   success: function(response) {
    //     $("[name='total_plot_extension_input']").val(response.plot_extension);
    //     $("[name='east_input']").val(response.east);
    //     $("[name='west_input']").val(response.west);
    //     $("[name='north_input']").val(response.north);
    //     $("[name='south_input']").val(response.south);
        
    //   },
    //   error: function(xhr, status, error) {
    //   console.error('AJAX error:', status, error); // Log AJAX errors
    //   }

    //   });
    // }
    //   }

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
                        <tr>
	  										  <td><input type="text" class="form-control cmn plot_no" name="plot_no_input[]" value="${plot.plot_no}"></td> 
	  									  <td><input type="text" class="form-control cmn plot_extension" name="plot_extension_input[]" value="${plot.plot_extension}"></td>
                         <td><input type="text" class="form-control cmn east" name="east_input[]" value="${plot.east}" ></td>
                         <td><input type="text" class="form-control cmn west" name="west_input[]" value="${plot.west}"></td>
                         <td><input type="text" class="form-control cmn north" name="north_input[]" value="${plot.north}" ></td>
                         <td><input type="text" class="form-control cmn south" name="south_input[]" value="${plot.south}"></td>
                         <td><input type="text" class="form-control cmn status" name="status_input[]"value="Booked"></td>
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
            var adv_amount_plot_input = $('[name="adv_amount_plot_input"]').val() || 0;
            $('select[name="plots_no_input[]"] option:selected').each(function() {
                selectedValues.push($(this).val()); // Push the value of the selected option
            });

						var total_amt = response[0].total_values * selectedValues.length;
				    var tot_amt = total_amt - adv_amount_plot_input;
            $('[name="bal_amount_for_plot_input"]').val(tot_amt);
						$("[name='bal_amount_for_plot_input']").attr("tot_amt", total_amt);

            $('#mode_payment_value_input').val($('[name="adv_amount_plot_input"]').val() || 0);
          }else{
            $('#mode_payment_value_input').val($('[name="adv_amount_plot_input"]').val() || 0);
          }
       },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }
    });
   }else{
    $('#mode_payment_value_input').val($('[name="adv_amount_plot_input"]').val() || 0);
   }
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
							$("[name='mode_payment_input']").val(plot.mode_payment);
							$("[name='bal_amount_for_plot_input']").val(plot.bal_amount_for_plot);
							$("[name='bal_amount_for_plot_input']").attr("tot_amt", plot.bal_amount_for_plot);

							
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
              $('[name="adv_amount_plot_input"]').trigger('input');
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
        $("#multicol-phone_number").val(alternate_number); // Set the value in the target input
        });
    });

    });
</script>
  <script>
    

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

  var val_1 = $('#id_proof_select_input').val();
   var placeholter_str_1 = 'Enter '+ val_1 + ' No';
  $('#id_proof_input').attr('placeholder', placeholter_str_1);
   $('#proof_label').html(val_1);

// ----------------------------------

var val_pay =$('#mode_payment_input').val();

  if(val_pay == 'Cash' || val_pay == 'UPI'){
    var placeholter_str_pay = 'Enter '+ val_pay + ' Amount';
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

$('#mode_payment_input').on('change', function() {
   var val=$(this).val();
   if(val == 'Cash' || val == 'UPI'){
    var placeholter_str = 'Enter '+ val + ' Amount';
   }
   else{
    var placeholter_str = 'Enter '+ val + ' No';
   }

  $('#mode_payment_value_input').attr('placeholder', placeholter_str);   
   $('#mode_pay_label').html(val);
});


$('#submitBtn').on('click',function() {

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
    const plotDataJSON = JSON.stringify(plotDataArray);
    $('#plotData').val(plotDataJSON);

          const form = document.querySelector('#myForm');
          const formData = new FormData(form); 
           $.ajax({
          url: '<?=base_url()?>admin/Booked_plots_controller/save_booked_plot',
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
              window.location.href = "<?= base_url('booked_plot'); ?>";
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


});
   

</script>
