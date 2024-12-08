
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
                <li class="breadcrumb-item"><a href="<?= base_url('billing_receipt') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
            </ol>
        </div>
<div class="card">
  <h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></h5>
  <hr class="my-4" />

  <form id="myForm" class="card-body" method="post" enctype="multipart/form-data" onSubmit="return false">
    <div class="row g-6">
     
    <div class="col-md-4" style="display:none;">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
          <input type="hidden" class="form-control" name="billing_receipt_id" value="<?php if(isset($get_prop)){echo $get_prop['billing_receipt_id'];}?>" />
          <input type="hidden" name="seqno" id="seqno" value="<?php if(isset($seq_no)){echo $seq_no;}?>">

              <input type="text" id="multicol-company_name_input" class="form-control" name="company_name_input"  value="<?php if(isset($company_data)){echo $company_data['name'];}?>" placeholder="Enter Company Name" readonly />
              <label for="multicol-company_name_input">Company Name</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-bill_id_input" class="form-control" name="bill_id_input" value="<?php if(isset($get_prop)){echo $get_prop['bill_id'];}else{echo $get_seq_no;}?>"  placeholder="Enter Bill ID" readonly />
              <label for="multicol-bill_id_input">Bill ID</label>
            </div>
          </div>
      </div>

         <div class="col-md-4">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="formtabs-birthdate" class="form-control dob-picker" name="date_time_input" value="<?php if(isset($get_prop)){echo $get_prop['date_time'];}else{echo date('Y-m-d'); }?>" placeholder="YYYY-MM-DD" />
                  <label for="formtabs-birthdate">Date & Time</label>
                </div>
              </div>

              <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="sno_customer_name_input" name="sno_customer_name_input" data-allow-clear="true" customer="<?php if(isset($get_prop)){echo $get_prop['sno_customer_id'];}?>" >
          <option value="" selected disabled>Select Sno / Customer </option>
          <?php if(!empty($reg_booked_list)){ 
            foreach($reg_booked_list as $val){ 
              $selected ='';
              if(isset($get_prop)){
                if($get_prop['sno_customer_id'] == $val['s_no']){
                  $selected = 'selected';
                }else{
                  $selected = '';
                }
              }
            ?>
            <option value="<?php echo $val['s_no'];?>" data-status="<?php echo $val['status'];?>"  data-id="<?php echo $val['id'];?>"   <?php echo $selected;?> ><?php echo $val['s_no'];?> / <?php echo $val['buyer'];?></option>
            <?php } ?>
           <?php } ?>
          </select>
          <label for="multicol-state">Sno / Customer</label>
        </div>
      </div>


      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="customer_name_input" name="customer_name_input" data-allow-clear="true" customer="<?php if(isset($get_prop)){echo $get_prop['customer_name'];}?>" >
          <option value="" selected disabled>Select Customer</option>
          <?php if(!empty($customer_list)){ 
            foreach($customer_list as $val){ 
              $selected ='';
              if(isset($get_prop)){
                if($get_prop['customer_name'] == $val['customer_info_id']){
                  $selected = 'selected';
                }else{
                  $selected = '';
                }
              }
            ?>
            <option value="<?php echo $val['customer_info_id'];?>" <?php echo $selected;?> ><?php echo $val['buyer_name'];?></option>
            <?php } ?>
           <?php } ?>
          </select>
          <label for="multicol-state">Customer Name</label>
        </div>
      </div>

      <div class="col-md-4">
      <div class="input-group">
          <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="father_rel_display"><?php if(isset($get_prop)){echo $get_prop['father_rel'];}?></button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText_1(this)">s/o</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText_1(this)">w/o</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText_1(this)">d/o</a></li>
          </ul>
          <input type="hidden"  id="father_rel_input" name="father_rel_input" value="<?php if(isset($get_prop)){echo $get_prop['father_rel'];}?>">
          <input type="text" class="form-control"  name="father_name_input" aria-label="Text input with dropdown button" value="<?php if(isset($get_prop)){echo $get_prop['father_name'];}?>" placeholder="Father Name">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="property_name_input" name="property_name_input" data-allow-clear="true" nagar="<?php if(isset($get_prop)){echo $get_prop['property_name'];}?>" >
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
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="plot_no_input" name="plot_no_input[]"  plot="<?php if(isset($get_prop)){echo $get_prop['plot_no'];}?>" multiple>
          </select>
          <label for="multicol-state">Select Plot No</label>
        </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-total_plo_extension" class="form-control" name="plot_extension_input" value="<?php if(isset($get_prop)){echo $get_prop['plot_extension'];}?>" placeholder="Enter Plot Extension in Sqft/Sqmt"  />
              <label for="multicol-confirm-total_plo_extension">Plot Extension in Sqft/Sqmt</label>
            </div>
          </div>
      </div>

      
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-adv_amount_plot_input" class="form-control" name="adv_amount_plot_input" value="<?php if(isset($get_prop)){echo $get_prop['adv_amount_plot'];}?>" placeholder="Enter Advance Amount"  />
              <label for="multicol-confirm-adv_amount_plot_input">Advance Amount</label>
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

			<div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="bal_amount_plot_input" name="bal_amount_plot_input" value="<?php if(isset($get_prop)){echo $get_prop['bal_amount_plot'];}?>" placeholder="Enter Amount"  />
              <label for="multicol-confirm -bal_amount_plot_input" id="bal_amount_plot_label">Balance Amount</label>
            </div>
          </div>
      </div>

        <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-phone_number" class="form-control" name="phone_number_input" value="<?php if(isset($get_prop)){echo $get_prop['phone_number'];}?>" placeholder="Enter Phone Number"  />
              <label for="multicol-confirm-phone_number">Phone Number</label>
            </div>
          </div>
      </div>
      
      <div class="col-md-4">
      <div class="input-group input-group-merge">
          <div class="form-floating form-floating-outline">
            <textarea class="form-control h-px-75" aria-label="With textarea" name="address_input" placeholder="Enter Address"><?php if(isset($get_prop)){echo $get_prop['address'];}?></textarea>
            <label>Address</label>
          </div>
        </div>
      </div>

      <div class="col-md-4" style="display:none;">
      <div class="input-group input-group-merge">
          <div class="form-floating form-floating-outline">
            <textarea class="form-control h-px-75" aria-label="With textarea" name="comp_address_input" placeholder="Enter Company Address">
              <?php if(isset($company_data)){ if(!empty($company_data['add1'])){echo $company_data['add1'] .",\n";}}?>
              <?php if(isset($company_data)){ if(!empty($company_data['add2'])){echo $company_data['add2'] .",\n";}}?>
              <?php if(isset($company_data)){ if(!empty($company_data['add3'])){echo $company_data['add3'] .",\n";}}?>
              <?php if(isset($company_data)){ if(!empty($company_data['add4'])){echo $company_data['add4'] .'.';}}?>
            </textarea>
            <label>Company Address</label>
          </div>
        </div>
      </div>
      
    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <a href="<?= base_url('billing_receipt') ?>" class="btn btn-outline-danger me-4">Back</a>
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
         $(".bill_account").addClass("open");
         $(".cus_recpt").addClass("active");

   // ********select 2 ***************
       var o = $("#property_name_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Nagar / Garden", dropdownParent: o.parent() });
  // ********select 2 ***************

   // ********select 2 ***************
   var o = $("#customer_name_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Customer", dropdownParent: o.parent() });
  // ********select 2 ***************
  
   // ********select 2 ***************
   var o = $("#sno_customer_name_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Sno / Customer", dropdownParent: o.parent() });
  // ********select 2 ***************

  // ********select 2 ***************
  var o = $("#mode_payment_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Payment Type", dropdownParent: o.parent() });
  // ********select 2 ***************
  
    // ********select 2 ***************
    var o = $("#plot_no_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Plot No", dropdownParent: o.parent() });
  // ********select 2 ***************

});
  

</script>
  <script>

$(document).ready(function() {
  var check_redirect = '<?= isset($get_prop) ? "true" : "false" ?>';  
  setTimeout(function() {
    if(check_redirect == 'true'){
    var customer_ =  $('#customer_name_input').attr('customer');
    $('#customer_name_input').val(customer_).trigger('change');
   }
  }, 1000); 


  $('#plot_no_input').on('change',function() {
    get_offer_incentive($('#property_name_input').val());
  });

         $('#property_name_input').on('change',function() {
          const property_id =$(this).val();
          get_plot_details(property_id);
          get_offer_incentive($('#property_name_input').val());
           $.ajax({
          url: '<?=base_url()?>admin/Unregistered_plots_controller/get_property_details?property_id='+property_id,
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
            if(response){
            // alert(response.total_entension);
            // $("[name='plot_no']").val(response.plot_no);
            $("[name='plot_extension_input']").val(response.total_entension);
            // $("[name='plot_no_input']").val(response.plot_no);
            }
       },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }

        });

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
  if(val == 'Cash'){
    get_offer_incentive($('#property_name_input').val());
  }
});


$('#submitBtn').on('click',function() {
          const form = document.querySelector('#myForm');
          const formData = new FormData(form); 
           $.ajax({
          url: '<?=base_url()?>admin/Billing_receipt_controller/save_billing_receipt',
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
              window.location.href = "<?= base_url('billing_receipt'); ?>";
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

    $("#customer_name_input").on('change',function() {
      var id = $(this).val();
      if(id){
      $.ajax({
          url: '<?=base_url()?>admin/Billing_receipt_controller/get_customer_details?cus_id='+id,
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
            get_nagar_garden_based_on_customer(response.customer_info_id);
              $("[name='father_name_input']").val(response.father_name);
              $("[name='father_rel_input']").val(response.father_rel);
              $("#father_rel_display").text(response.father_rel);
              $("[name='phone_number_input']").val(response.phone_number_1);
              
      },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }

    });
  }
  });		
  
  $("#sno_customer_name_input").on('change',function() {
      var id = $('option:selected', this).data('id');
      var status = $('option:selected', this).data('status');
      trigger_values_sno_customer(id,status);
    });


  function updateButtonText_1(element) {
    var button = element.closest('.input-group').querySelector('.btn.dropdown-toggle');
    button.textContent = element.textContent;
   document.getElementById('father_rel_input').value = element.textContent;
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
        $('select[name="plot_no_input[]"] option:selected').each(function() {
            selectedValues.push($(this).val()); // Push the value of the selected option
        });
        // var amount_adv =  $("[name='adv_amount_plot_input']").val();
        // amount_adv = amount_adv ? amount_adv : 0;
        // $('#mode_payment_value_input').val((response[0].total_values * selectedValues.length) - parseFloat(amount_adv));

            var amount_adv =  $("[name='adv_amount_plot_input']").val();
            amount_adv = amount_adv ? parseFloat(amount_adv) : 0;

            var amount_paying =  $("[name='mode_payment_value_input']").val();
            amount_paying = amount_paying ? parseFloat(amount_paying) : 0;

            var total_values = response[0]?.total_values ? parseFloat(response[0].total_values) : 0;
            var selectedLength = selectedValues.length || 0;

            var amount_tot = (total_values * selectedLength) - amount_adv;
            amount_tot = (amount_tot !== amount_paying) ? amount_tot : 0;

            $('#bal_amount_plot_input').val(amount_tot);

          }else{
            // $('#mode_payment_value_input').val(0);
            $('#bal_amount_plot_input').val(0);
          }
       },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }
    });
   }else{
    // $('#mode_payment_value_input').val(0);
    $('#bal_amount_plot_input').val(0);
    
   }
  }

function trigger_values_sno_customer(id,status){
    if(id){
      $.ajax({
               url: '<?=base_url()?>admin/unregistered_plots_controller/get_plot_register_booked_plot_details?id=' + id + '&status='+status,
               type: 'GET',
               processData: false,
               contentType: false,
               dataType: 'json',
               success: function(response) {
                if(response.data){
                response.data.forEach(function(plot) {
                  if(status == 'Registered'){
              $("[name='customer_name_input']").val(plot.customer_id).trigger('change');
              setTimeout(() => {
              $("[name='property_name_input']").val(plot.property_name).trigger('change');
              }, 1000);
              if(response.imploaded_plot != ''){
              setTimeout(() => {
                  if (response.imploaded_plot.includes(',')) {
                  var parts = response.imploaded_plot.split(',');
                  } else {
                  var parts = response.imploaded_plot;
                  }
                  $("[name='plot_no_input[]']").val(parts).trigger('change');
            }, 1500);
          }
          var tot_adv = 0;
          if (response.total_adv_amount_paid && response.total_adv_amount_paid > 0) {
              tot_adv = response.total_adv_amount_paid;
          } else {
              tot_adv = plot.adv_amount_plot;
          }

	        $("[name='adv_amount_plot_input']").val(tot_adv);
          $("[name='address_input']").val(plot.buyer_address);
          $("[name='mode_payment_value_input']").val(plot.mode_payment_value);

        }else{

          $("[name='customer_name_input']").val(plot.customer_id).trigger('change');
              setTimeout(() => {
              $("[name='property_name_input']").val(plot.property_name).trigger('change');
              }, 1000);
              if(response.imploaded_plot != ''){
              setTimeout(() => {
                  if (response.imploaded_plot.includes(',')) {
                  var parts = response.imploaded_plot.split(',');
                  } else {
                  var parts = response.imploaded_plot;
                  }
                  $("[name='plot_no_input[]']").val(parts).trigger('change');
            }, 1500);

		  var tot_adv = 0;
          if (response.total_adv_amount_paid && response.total_adv_amount_paid > 0) {
              tot_adv = response.total_adv_amount_paid;
          } else {
              tot_adv = plot.adv_amount_plot;
          }
          $("[name='adv_amount_plot_input']").val(tot_adv);
          $("[name='address_input']").val(plot.buyer_address);
          $("[name='mode_payment_value_input']").val(plot.mode_payment_value);
          
        }
      }

              // $("[name='street_address_input']").val(plot.buyer_address);
              // $("[name='buyer_name_input']").val(plot.buyer_name);
              // $("[name='id_proof_select_input']").val(plot.id_proof_select).change();
              // $("[name='id_proof_input']").val(plot.id_proof);
              // $("[name='phone_number_1_input']").val(plot.phone_number);
              // $("[name='customer_id']").val(plot.customer_id);
              // $("[name='father_name_input']").val(plot.father_name);
              // $("[name='father_rel_input']").val(plot.father_rel);
              // $("[name='buyer_gender_input']").val(plot.buyer_gender);
              // $("#father_rel_display").html(plot.father_rel);
              // $("#buyer_gender_display").html(plot.buyer_gender);
							// $("[name='district_input']").val(plot.buyer_district).change();
              // $("[name='district_pincode']").val(plot.buyer_pincode);
              // $("[name='taluk_name_input']").val(plot.buyer_taluk_name);
              // $("[name='phone_number_2_input']").val(plot.buyer_phone_number_2);
							// $("[name='village_town_input']").val(plot.buyer_village_town);
							// $("[name='mode_payment_value_input']").val(plot.mode_payment_value);
							// $("[name='mode_payment_input']").val(plot.mode_payment);
							// $("[name='adv_amount_plot_input']").val(plot.adv_amount_plot);
							// $("[name='bal_amount_for_plot_input']").val(plot.bal_amount_for_plot);
              
                });
              }
               
               },
               error: function(xhr, status, error) {
                   console.error('AJAX error:', status, error); // Log AJAX errors
               }
           });
    }
   }

  function get_plot_details(property_id){
    if(property_id != '' && property_id != null){
      var check_redirect = '<?= isset($get_prop) ? "true" : "false" ?>';  
    var plot_no = $('#plot_no_input').attr('plot');
    var customer_id = $('#customer_name_input').val();
      var status = ['Registered', 'Booked']; // Array of status values
    // Convert the array to a comma-separated string
    var statusParam = status.map(s => encodeURIComponent(s)).join(',');

      $.ajax({
        url: '<?=base_url()?>admin/unregistered_plots_controller/get_plot_details',
        type: 'GET',
        data: {
            property_id: property_id,
            customer_id: customer_id,
            status: statusParam
        },
          dataType: 'json',  
          success: function(response) {
           var html= ``;
           var selected = ``;
          
           response.forEach(function(data){
            html += `<option value="${data.plot_no}" ${selected}>${data.plot_no}</option>`;
           });

           $('#plot_no_input').html(html);
           
           if(check_redirect == 'true'){
            var partss =[];
            if (plot_no.includes(',')) {
                 partss = plot_no.split(',');
                  } else {
                  partss.push(plot_no);
                  }
            $('#plot_no_input').val(partss).trigger('change');
            }

        },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }

        });
   }
  } 


  function get_nagar_garden_based_on_customer(id){
    if(id){
    var nagar_ =  $('#property_name_input').attr('nagar');
    $.ajax({
          url: '<?=base_url()?>admin/Billing_receipt_controller/get_nagar_garden_based_on_customer?cus_id='+id,
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
            var html='';
            var selected ='';
        
           html +=`<option value="" selected disabled>Select Nager / Garden</option>`;
        if(response){
          response.forEach(function(nagar){
            if(nagar_ !='' && nagar_ != null && nagar_ !=undefined){
              selected = (nagar.property_id == nagar_ ? 'selected' : '');
            }
          html +=`<option value="${nagar.property_id}" ${selected}>${nagar.property_name}</option>`;
          });

        }

        $('#property_name_input').html(html);
        var check_redirects = '<?= isset($get_prop) ? "true" : "false" ?>';  
        if(check_redirects == 'true'){
        $('#property_name_input').trigger('change');
      }
      },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error); // Log AJAX errors
      }

    });

  }

  }



});
   
</script>