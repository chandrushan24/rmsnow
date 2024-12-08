
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css" />
    <script src="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
 
    <!-- Content wrapper -->
    <div class="content-wrapper">


<!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

<!-- Multi Column with Form Separator -->
       <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('customer_info') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
            </ol>
        </div>
<div class="card">
  <h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></h5>
  <hr class="my-4" />
  <form id="myForm"  class="card-body" method="post" enctype="multipart/form-data" onSubmit="return false">
    <div class="row g-6">
    
      <!-- <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-buyer_name_input" class="form-control" name="buyer_name_input"  value="<?php if(isset($get_prop)){echo $get_prop['buyer_name'];}?>" placeholder="Enter Buyer Name"/>
              
              <label for="multicol-buyer_name_input">Buyer Name</label>
            </div>
          </div>
      </div> -->

      <div class="col-md-4">
            <div class="input-group">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php if(isset($get_prop)){echo $get_prop['buyer_gender'];}?></button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText(this)">Mr</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText(this)">Mrs</a></li>
                </ul>
                <input type="hidden" name="customer_info_id"  value="<?php if(isset($get_prop)){echo $get_prop['customer_info_id'];}?>" >
                <input type="text"  id="buyer_name_input" class="form-control" aria-label="Text input with dropdown button" name="buyer_name_input" value="<?php if(isset($get_prop)){echo $get_prop['buyer_name'];}?>" placeholder="Enter Plot Buyer Name">
                <input type="hidden"  id="buyer_gender_input" name="buyer_gender_input" value="<?php if(isset($get_prop)){echo $get_prop['buyer_gender'];}?>">
            </div>
        </div>

       <div class="col-md-4">
      <div class="input-group">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php if(isset($get_prop)){echo $get_prop['father_rel'];}?></button>
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
          <input type="text" id="multicol-district_pincode" class="form-control" name="district_pincode"  value="<?php if(isset($get_prop)){echo $get_prop['pincode'];}?>" placeholder="Enter Pincode"/>
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
              <input type="number" id="multicol-total_plo_buyed_input" class="form-control" name="total_plot_buyed_input" value="<?php if(isset($get_prop)){echo $get_prop['total_plot_buyed'];}?>" placeholder="Enter Total Plot Buyed"  />
              <label for="multicol-confirm-total_plo_buyed_input">Total Plot Buyed</label>
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


    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <a href="<?= base_url('customer_info') ?>" class="btn btn-outline-danger me-4">Back</a>
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
 <script>
  $(document).ready(function() {
         $(".prop").addClass("open");
         $(".cus_info").addClass("active");

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
   var o = $("#multicol-state");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select District", dropdownParent: o.parent() });
  // ********select 2 ***************
   // ********select 2 ***************
   var o = $("#multicol-pincode");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Pincode", dropdownParent: o.parent() });
  // ********select 2 ***************
  // ********select 2 ***************
  var o = $("#mode_payment_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Payment Type", dropdownParent: o.parent() });
  // ********select 2 ***************


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


$('#property_name_input').on('change',function() {
          const property_id =$(this).val();
           $.ajax({
          url: '<?=base_url()?>admin/Unregistered_plots_controller/get_property_details?property_id='+property_id,
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
            $("[name='district_input']").val(response.district).change();
            $("[name='total_plot_extension_input']").val(response.total_entension);
            $("[name='taluk_name_input']").val(response.taluk_name);
            $("[name='village_town_input']").val(response.village_town);
      
       },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }

    });
      
  });

$('#submitBtn').on('click',function() {
          const form = document.querySelector('#myForm');
          const formData = new FormData(form); 
           $.ajax({
          url: '<?=base_url()?>admin/Customer_details_controller/save_customer_details',
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
              window.location.href = "<?= base_url('customer_info'); ?>";
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