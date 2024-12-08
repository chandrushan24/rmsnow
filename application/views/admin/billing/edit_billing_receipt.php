<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/css/pages/app-invoice.css" />
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
<div class="row invoice-edit">
  <!-- Invoice Edit-->
  <div class="col-lg-12 col-12 mb-lg-0 mb-6">
    <!-- <div class="card invoice-preview-card p-sm-12 p-6"> -->
      <div class="card-body invoice-preview-header rounded p-6 px-3 text-heading">
        <div class="row mx-0 px-3">
          <div class="col-md-12 mb-md-0 mb-6 ps-0 text-center">
        <span style="color:var(--bs-primary);">
        <input type="hidden" class="form-control" name="billing_receipt_id" value="<?php if(isset($get_prop)){echo $get_prop['billing_receipt_id'];}?>" />

         <h4><input type="text" id="multicol-company_name_input" style="font-size:20px;font-wight:bold;" class="form-control text-center" name="company_name_input"  value="<?php if(isset($get_prop)){echo $get_prop['company_name'];}?>" placeholder="Enter Company Name"/></h4>
        </span>   
          </div>
         
        </div>
      </div>

      <div class="card-body px-0">
        <div class="row my-1">
          <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-6">
            <h6>Bill To:</h6>
            <div class="row">
              <div class="col-lg-6 col-md-8 col-12">
              <select  class="select2 form-select" id="property_name_input" name="property_name_input" data-allow-clear="true">
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
              </div>
            </div>
          <div class="col-md-6 col-sm-6 col-6 mb-sm-0 mb-6">

            <p class="mb-1">
              <br>
            <div class="form-floating form-floating-outline">
            <textarea class="form-control h-px-75" aria-label="With textarea" name="address_input" placeholder="Enter Address"><?php if(isset($get_prop)){echo $get_prop['address'];}?></textarea>
            <label>Address</label>
          </div>
            </p>
            
          </div>
          </div>
          <div class="col-md-6 col-sm-7 d-flex justify-content-md-end">
           
            <table>
              <tbody>
              <tr>
                  <td class="pe-4"><h6>Bill Details:</h6></td>
                  
                </tr>
                <tr>
                  <td class="pe-4">Bill ID:</td>
                  <td>
                   <input type="text" id="multicol-bill_id_input" class="form-control" name="bill_id_input"  value="<?php if(isset($get_prop)){echo $get_prop['bill_id'];}?>" placeholder="Enter Bill ID"/>
                  </td>
                </tr>
                <tr>
                  <td class="pe-4">Date and Time:</td>
                  <td>             
                     <input type="text" id="formtabs-birthdate" class="form-control dob-picker" name="date_time_input" value="<?php if(isset($get_prop)){echo $get_prop['date_time'];}?>" placeholder="YYYY-MM-DD" />
                  </td>
                </tr>
                <tr>
                  <td class="pe-4"> Customer Name:</td>
                  <td>
                 
                <select  class="select2 form-select" id="customer_name_input" name="customer_name_input" data-allow-clear="true">
                <?php if(!empty($customer_list)){ 
                    $selected = '';
                  foreach($customer_list as $val){ 
                    if(isset($get_prop)){
                      if($get_prop['customer_name'] == $val['buyer_name']){
                        $selected = 'selected';
                      }else{
                        $selected = '';
                      }
                    }
                  ?>
                  <option value="<?php echo $val['buyer_name'];?>" <?php echo $selected;?> ><?php echo $val['buyer_name'];?></option>
                  <?php } ?>
                <?php } ?>
                </select>
                
                  </td>
                </tr>
                <tr>
                  <td class="pe-4">Father Name:</td>
                  <td>
                  <div class="input-group">
          <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php if(isset($get_prop)){echo $get_prop['father_rel'];}?></button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText_1(this)">s/o</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText_1(this)">w/o</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="updateButtonText_1(this)">d/o</a></li>
          </ul>
          <input type="hidden"  id="father_rel_input" name="father_rel_input" value="<?php if(isset($get_prop)){echo $get_prop['father_rel'];}?>">
          <input type="text" class="form-control"  name="father_name_input" aria-label="Text input with dropdown button" value="<?php if(isset($get_prop)){echo $get_prop['father_name'];}?>" placeholder="Father Name">
        </div>
                  </td>
                </tr>
                <tr>
                  <td class="pe-4">Phone Number:</td>
                  <td>
              <input type="text" id="multicol-phone_number" class="form-control" name="phone_number_input" value="<?php if(isset($get_prop)){echo $get_prop['phone_number'];}?>" placeholder="Enter Phone Number"  />

                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <hr class="mb-6 mt-1" />
      <div class="card-body pt-0 px-0">
          <div class="mb-4" data-repeater-list="group-a">
            <div class="repeater-wrapper pt-0 pt-md-9" data-repeater-item>
              <div class="d-flex border rounded position-relative pe-0">
                <div class="row w-100 p-5 gx-5">
                  
                <div class="col-md-3 col-12 pe-0">
                    <h6 class="h6 repeater-title">Plot No</h6>
                    <input type="text" id="multicol-plot_no" class="form-control"  name="plot_no_input" value="<?php if(isset($get_prop)){echo $get_prop['plot_no'];}?>"  placeholder="Enter Plot No"  />

                  </div>
                 
                  <div class="col-md-3 col-12 mb-md-0 mb-5">
                    <h6 class="h6 repeater-title">Plot Extension (sqmt/sqft)</h6>
                    <input type="text" id="multicol-total_plo_extension" class="form-control" name="plot_extension_input" value="<?php if(isset($get_prop)){echo $get_prop['plot_extension'];}?>" placeholder="Enter Plot Extension in Sqft/Sqmt"  />
                   
                  </div>
                  <div class="col-md-2 col-12 mb-md-0 mb-4">
                    <h6 class="h6 repeater-title">Mode of Payment</h6>
                    <select  class="select2 form-select" id="mode_payment_input" name="mode_payment_input" data-allow-clear="true">
                    <option value="Cash" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'Cash'){ echo 'selected';}else{ echo '';} }else{echo 'selected';}?>>Cash</option>
                    <option value="Cheque" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'Cheque'){ echo 'selected';}else{ echo '';} }?>>Cheque</option>
                    <option value="UPI" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'UPI'){ echo 'selected';}else{ echo '';} }?>>UPI</option>
                    <option value="NEFT" <?php if(isset($get_prop)){if($get_prop['mode_payment'] == 'NEFT'){ echo 'selected';}else{ echo '';} }?>>NEFT</option>
                    </select>
                  </div>
                 
                  <div class="col-md-2 col-12 pe-0">
                  <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="mode_payment_value_input" name="mode_payment_value_input" value="<?php if(isset($get_prop)){echo $get_prop['mode_payment_value'];}?>" placeholder="Enter Amount"  />
              <label for="multicol-confirm-mode_payment_value_input" id="mode_pay_label">Cash</label>
            </div>
          </div>
              </div>

                  <div class="col-md-2 col-12 pe-0">
                    <h6 class="h6 repeater-title">Advance Amount</h6>
                    <input type="text" id="multicol-adv_amount_plot_input" class="form-control" name="adv_amount_plot_input" value="<?php if(isset($get_prop)){echo $get_prop['adv_amount_plot'];}?>" placeholder="Enter Advance Amount"  />
                  </div>
                </div>
                
              </div>
            </div>
          </div>
         
        </form>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-md-0 mb-2">
          
          </div>
          <div class="col-md-6 d-flex justify-content-md-end">
            <div class="invoice-calculations">
              <div class="d-flex justify-content-between mb-1">
                <span class="w-px-100">Advance:</span>
                <h6 class="mb-0">$<?php if(isset($get_prop)){echo $get_prop['adv_amount_plot'];}?>.00</h6>
              </div>
              <div class="d-flex justify-content-between mb-1">
                <span class="w-px-100">Balance:</span>
                <h6 class="mb-0">$00.00</h6>
              </div>
              <div class="d-flex justify-content-between mb-1">
                <span class="w-px-100">Tax:</span>
                <h6 class="mb-0">$00.00</h6>
              </div>
              <hr class="my-2" />
              <div class="d-flex justify-content-between">
                <span class="w-px-100">Total:</span>
                <h6 class="mb-0">$<?php if(isset($get_prop)){echo $get_prop['adv_amount_plot'];}?>.00</h6>
              </div>
            </div>
          </div>
        </div>
      </div>


      <hr class="my-1">

      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-md-0 mb-2">
          <img src="<?= base_url() ?>assets/img/icons/misc/authentication-QR.png" height="120px;" width="120px;">
        
          </div>
          <div class="col-md-6 d-flex justify-content-md-end">
           
          <img src="<?= base_url() ?>assets/img/avatars/1.png" height="120px;" width="120px;">
        
          </div>
        </div>
      </div>
      <hr class="my-1">

      <div class="card-body px-0">
        <div class="row">
          <div class="col-12">
            <div>
              <label for="note" class="h6 mb-1 fw-normal" >Company Address:</label>
              <textarea class="form-control" rows="2" name="comp_address_input" id="note"><?php if(isset($get_prop)){echo $get_prop['comp_address'];}?></textarea>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->

    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <a href="<?= base_url('billing_receipt') ?>" class="btn btn-outline-danger me-4">Back</a>
    </div>
    </form>
  </div>
</div>
<!-- /Add Payment Sidebar -->

<!-- /Offcanvas -->


          </div>
          <!-- / Content -->
           

<script src="<?=base_url()?>/assets/js/extended-ui-sweetalert2.js"></script>
<script src="<?=base_url()?>/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
 <script src="<?=base_url()?>/assets/js/form-layouts.js"></script>

<script src="<?=base_url()?>/assets/js/app-invoice-edit.js"></script>
<script>

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
        o.select2({ placeholder: "Select Nagar/Garden", dropdownParent: o.parent() });
  // ********select 2 ***************

  
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


});
</script>