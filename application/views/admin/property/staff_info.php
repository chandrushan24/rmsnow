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

 </style>
 
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css" />
    <script src="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
 
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
                <li class="breadcrumb-item"><a href="<?= base_url('staff_info') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
            </ol>
        </div>
<div class="card">
  <h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></h5>
  <hr class="my-4" />
  <form id="myForm" class="card-body" method="post" enctype="multipart/form-data" onSubmit="return false">
    <div class="row g-6">

    <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
            <input type="hidden" name="staff_info_id"  value="<?php if(isset($get_prop)){echo $get_prop['staff_info_id'];}?>" />
            <input type="hidden" name="headerid"  value="<?php if(isset($get_prop2)){echo $get_prop2['headerid'];}?>" />
            <input type="text" id="multicol-employee_name_input" class="form-control" name="employee_name_input"  value="<?php if(isset($get_prop)){echo $get_prop['employee_name'];}?>" placeholder="Enter Employee Name"/>
              <label for="multicol-employee_name_input">Employee Name</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-father_name_input" class="form-control" name="father_name_input"  value="<?php if(isset($get_prop)){echo $get_prop['father_name'];}?>" placeholder="Enter Father Name"/>
              <label for="multicol-father_name_input">Father Name</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
            <select  class="select2 form-select" id="role_input" name="role_input" data-allow-clear="true">
          <option value="" selected disabled>Select Role</option>
          <?php if(!empty($role_list)){ 
            $selected = '';
            foreach($role_list as $val){ 
            if(isset($get_prop)){
              if($get_prop['role'] == $val['role_id']){
                $selected = 'selected';
              }else{
                $selected = '';
              }
            }
            ?>
            <option value="<?php echo $val['role_id'];?>" data-order="<?php echo $val['role_order'];?>" <?php echo $selected;?> ><?php echo $val['role_name'];?></option>
            <?php } ?>
           <?php } ?>
          </select>
          <label for="multicol-state">Select Role</label>
        </div>
      </div>

      <div class="col-md-4" id="role_head_off_show" style="display:none;">
        <div class="form-floating form-floating-outline">
            <select  class="select2 form-select" id="role_head_off" name="role_head_off" data-head ="<?php if(isset($get_prop)){echo $get_prop['head_officer_id'];}else{echo '0';}?>"  data-allow-clear="true">
         
          </select>
          <label for="multicol-state">Select Head Officer</label> 
        </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-employee_id_inputs" class="form-control" name="employee_id_inputs"  value="<?php if(isset($get_prop)){echo $get_prop['employee_id'];}else{echo $get_seq_no;}?>" placeholder="Enter Employee ID" disabled/>
              <input type="hidden" name="employee_id_input" id="multicol-employee_id_input" value="<?php if(isset($get_prop)){echo $get_prop['employee_id'];}else{echo $get_seq_no;}?>">
              <input type="hidden" name="seqno" id="seqno" value="<?php if(isset($seq_no)){echo $seq_no;}?>">
              <label for="multicol-employee_id_input">Employee ID</label>
            </div>
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
        <div class="form-floating form-floating-outline">
          <input type="text" id="multicol-pincode" class="form-control" name="district_pincode"  value="<?php if(isset($get_prop)){echo $get_prop['pincode'];}?>" placeholder="Enter Pincode"/>
          <label for="multicol-pincode">Pincode</label>
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
      
      <div class="col-md-4">
      <div class="input-group input-group-merge">
          <div class="form-floating form-floating-outline">
            <textarea class="form-control h-px-75" aria-label="With textarea" name="street_address_input" placeholder="Enter Street Address"><?php if(isset($get_prop)){echo $get_prop['street_address'];}?></textarea>
            <label>Street Address</label>
          </div>
        </div>
          </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="number" id="multicol-total_plo_sold_input" class="form-control" name="total_plot_sold_input" value="<?php if(isset($get_prop)){echo $get_prop['total_plot_sold'];}?>" placeholder="Enter Total Plot Sold"  />
              <label for="multicol-confirm-total_plo_sold_input">Total Plot Sold</label>
            </div>
          </div>
      </div>

        <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-phone_number_1" class="form-control" name="phone_number_1_input" value="<?php if(isset($get_prop)){echo $get_prop['phone_number_1'];}?>" placeholder="Enter Phone Number 1"  />
              <label for="multicol-confirm-phone_number_1">Phone Number 1</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-phone_number_2" class="form-control" name="phone_number_2_input" value="<?php if(isset($get_prop)){echo $get_prop['phone_number_2'];}?>" placeholder="Enter Phone Number 2"  />
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

      <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="formtabs-birthdate" class="form-control dob-picker" name="date_of_birth_input" value="<?php if(isset($get_prop)){echo $get_prop['date_of_birth'];}?>" placeholder="YYYY-MM-DD" />
                  <label for="formtabs-birthdate">Date of birth</label>
                </div>
        </div>

        <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="bank_ac_no_input" class="form-control" name="bank_ac_no_input" value="<?php if(isset($get_prop)){echo $get_prop['bank_ac_no'];}?>" placeholder="Enter Bank A/c No"  />
              <label for="multicol-confirm-bank_ac_no_input">Bank A/c No</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-IFSC_code_input" class="form-control" name="IFSC_code_input" value="<?php if(isset($get_prop)){echo $get_prop['IFSC_code'];}?>" placeholder="Enter IFSC Code"  />
              <label for="multicol-confirm-IFSC_code_input">IFSC Code</label>
            </div>
          </div>
      </div>
      
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-branch_name_input" class="form-control" name="branch_name_input" value="<?php if(isset($get_prop)){echo $get_prop['branch_name'];}?>" placeholder="Enter Branch Name"  />
              <label for="multicol-confirm-branch_name_input">Branch Name</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-pan_card_input" class="form-control" name="pan_card_input" value="<?php if(isset($get_prop)){echo $get_prop['pan_card'];}?>" placeholder="Enter PAN Card No"  />
              <label for="multicol-confirm-pan_card_input">PAN Card No</label>
            </div>
          </div>
      </div>
      
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-nominee" class="form-control" name="nominee_input" value="<?php if(isset($get_prop)){echo $get_prop['nominee'];}?>" placeholder="Enter Nominee"  />
              <label for="multicol-confirm-nominee">Nominee</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-nominee_relationship" class="form-control" name="nominee_relationship_input" value="<?php if(isset($get_prop)){echo $get_prop['nominee_relationship'];}?>" placeholder="Enter Nominee Relationship"  />
              <label for="multicol-confirm-nominee_relationship">Nominee Relationship</label>
            </div>
          </div>
      </div>
      <hr>
      <div class="row">
        <!-- <h6>User Header Details:</h6>  -->
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-uname" class="form-control" name="uname_input" value="<?php if(isset($get_prop2)){echo $get_prop2['username'];}?>" placeholder="Enter User Name"  />
              <label for="multicol-confirm-uname">User Name</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
         <div class="form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="password" class="form-control" name="password_input" value="<?php if(isset($get_prop2)){echo $get_prop2['password'];}?>" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="password">Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
              </div>
            </div>  
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">

            <select  class="select2 form-select" id="type_input" name="type_input" data-allow-clear="true">
          <option value="" selected disabled>Select Type</option>
          <option value="superAdmin"  <?php if(isset($get_prop2)){if($get_prop2['type'] == 'superAdmin'){ echo 'selected';}else{ echo '';} }?>>Super Admin</option>
          <option value="admin" <?php if(isset($get_prop2)){if($get_prop2['type'] == 'admin'){ echo 'selected';}else{ echo '';} }?>>Admin</option>
          <option value="manager" <?php if(isset($get_prop2)){if($get_prop2['type'] == 'manager'){ echo 'selected';}else{ echo '';} }?>>Manager</option>
          <option value="accounts" <?php if(isset($get_prop2)){if($get_prop2['type'] == 'accounts'){ echo 'selected';}else{ echo '';} }?>>Accounts</option>
          <option value="marketers" <?php if(isset($get_prop2)){if($get_prop2['type'] == 'marketers'){ echo 'selected';}else{ echo '';} }?>>Marketers</option>
          </select>
              <label for="multicol-confirm-type">Type</label>
            </div>
          </div>
      </div>
      </div>
<hr>
      <div class="row">
      <div class="col-12">
      <h6 class="card-header">Upload Passport size photo</h6>
      <div class="card-body">
        <div action="#" class="dropzone" id="dropzone-basic">
          <div class="dz-message needsclick" class="dropzone needsclick">
            Drop files here or click to upload
            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
          </div>
          <input type="file" name="passport_size_photo_file_input[]" id="targetInput" style="display:none;">
          <div class="fallback">
            <input type="file"  name="passport_size_photo_file_input[]"  />
          </div>

          <?php if(!empty($passport_size_photo)){foreach($passport_size_photo as $val){?>
            
          <div class="dz-preview dz-file-preview">
        <div class="dz-details">
          <div class="dz-thumbnail">
          <a href="#" onclick="showFileModal('<?= base_url() .$val['tbl_file_path']?>')" ><?=  $val['tbl_client_name']?></a>
        </div>
        <div class="text-center my-3">
        <input type="button" class="btn-outline-danger delete-image" data-id="<?php echo $val['media_id']; ?>" data-file="passport_size_photo" value ="Delete" style="line-height: 24px !important; border-radius: 11px; filter: drop-shadow(2px 2px 6px gray);">
        </div>
        </div>
        </div>

        <?php }
        }?>

      </div>
      </div>
      </div>
      </div>

    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <a href="<?= base_url('staff_info') ?>" class="btn btn-outline-danger me-4">Back</a>
    </div>
    </div>
  </form>
<!-- </div>
</div>

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
 <script src="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
 <script>
  $(document).ready(function() {

         $(".staff_info").addClass("active");
        //  $(".prop").removeClass("open");
          

    // ********select 2 ***************
    var o = $("#id_proof_select_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Proof", dropdownParent: o.parent() });
  // ********select 2 ***************
 
   // ********select 2 ***************
   var o = $("#multicol-state");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select District", dropdownParent: o.parent() });
  // ********select 2 ***************
  
  // ********select 2 ***************
  var o = $("#role_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Role", dropdownParent: o.parent() });
  // ********select 2 ***************
   // ********select 2 ***************
   var o = $("#role_head_off");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Head Officer", dropdownParent: o.parent() });
  // ********select 2 ***************
  // ********select 2 ***************
  var o = $("#type_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Type", dropdownParent: o.parent() });
  // ********select 2 ***************
  

  $('#role_input').on('change',function() {
    const selectedOption = $(this).find('option:selected'); // Get the selected option element
    const role_id = selectedOption.val(); // Get the selected value
    const role_order_id = selectedOption.data('order'); 
    let head_officer = '';  
    let head_officer_role = '';  
     
    $.ajax({
    url: '<?= base_url() ?>admin/Unregistered_plots_controller/get_head_officer_id?order=' + role_order_id,
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        if(response) {
            var head_officer = response.role_id;
            var head_officer_role = response.role_name;
            // Second AJAX request
            $.ajax({
                url: '<?= base_url() ?>admin/Unregistered_plots_controller/get_head_officer_list?role_id=' + head_officer,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                   if(response){
                    $("#role_head_off_show").show();
                    var selected_head = $("#role_head_off").data('head');
                    var selected = '';
                    var html = '';
                    html +=`<option value=''>Select Head Officer</option>`;
                    response.forEach(val => {
                      if(selected_head != '0' && selected_head == val.staff_info_id){
                      selected ='selected';
                     }else{
                      selected = '';
                     }
                    html +=`<option value=${val.staff_info_id} ${selected} >${val.employee_name} / ${head_officer_role}</option>`;
                    });
                    $("#role_head_off").html(html);
                   }
                   
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error in second request:', status, error); // Log AJAX errors for the second request
                }
            });
        }else{
          $("#role_head_off_show").hide();
        }
    },
    error: function(xhr, status, error) {
        console.error('AJAX error in first request:', status, error); // Log AJAX errors for the first request
    }
});

      
  });

   var check_is_edit_mode = '<?= (isset($get_prop) ? '1' : '0')?>';

   if(check_is_edit_mode == '1'){
    $("#role_input").trigger("change");
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
document.querySelector("#dropzone-multi"));a&&new Dropzone(a,{previewTemplate:e,parallelUploads:1,maxFilesize:5,addRemoveLinks:!0})}();

  const form = document.getElementById('myForm');
  const submitBtn = document.getElementById('submitBtn');
  var myDropzone = Dropzone.forElement("#dropzone-basic");

  submitBtn.addEventListener('click', function() {
if (myDropzone !== undefined && myDropzone !== null) {
  
    const targetInput = document.getElementById('targetInput');
    const dataTransfer = new DataTransfer();

            Array.from(myDropzone.files).forEach(file => {
                dataTransfer.items.add(file);
            });

            targetInput.files = dataTransfer.files;

            Array.from(targetInput.files).forEach(file => {
            });

}

          const form = document.querySelector('#myForm');
          const formData = new FormData(form); 
           $.ajax({
          url: '<?=base_url()?>admin/Staff_info_controller/save_staff_info',
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
              window.location.href = "<?= base_url('staff_info'); ?>";
              }).catch((error) => {
                  console.error('Swal error:', error); // Log any errors with Swal
              });
                 $(".swal2-deny").remove();
                 $(".swal2-cancel").remove();
          }
          else if(response.status === 'error'){
              Swal.fire({
                  title: 'Warning!',
                  html: response.message,
                  icon: 'warning'
              }).then((result) => {

              }).catch((error) => {
                  console.error('Swal error:', error); // Log any errors with Swal
              });
                 $(".swal2-deny").remove();
                 $(".swal2-cancel").remove();
      }
           else {
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


$(document).ready(function() {

  var val_1 = $('#id_proof_select_input').val();
   var placeholter_str_1 = 'Enter '+ val_1 + ' No';
  $('#id_proof_input').attr('placeholder', placeholter_str_1);
   $('#proof_label').html(val_1);
// -------------------------------------------------------------
    $('#id_proof_select_input').on('change', function() {
   var val=$(this).val();
   var placeholter_str = 'Enter '+ val + ' No';
  $('#id_proof_input').attr('placeholder', placeholter_str);
   $('#proof_label').html(val);
});


});
   

</script>