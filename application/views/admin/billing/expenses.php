<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css" />

    <!-- Content wrapper -->
    <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

<!-- Multi Column with Form Separator -->
       <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('expense') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
            </ol>
        </div>
<div class="card">
  <h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></h5>
  <hr class="my-4" />
  <form id="myForm" class="card-body" method="post" enctype="multipart/form-data" onSubmit="return false">
    <div class="row g-6">

    <input type="hidden" name="expense_id" value="<?php if(isset($get_prop)){echo $get_prop['expense_id'];}?>" />

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
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="expense_type_input" name="expense_type_input" data-allow-clear="true">
          <option value="" selected disabled>Select Expense</option>

          <?php if(!empty($expense_master)){ 
            $selected = '';
            foreach($expense_master as $val){ 
            if(isset($get_prop)){
              if($get_prop['expense_type'] == $val['expen_id']){
                $selected = 'selected';
              }else{
                $selected = '';
              }
            }
            ?>
            <option value="<?php echo $val['expen_id'];?>"  <?php echo $selected;?> ><?php echo $val['expen_name'];?></option>
            <?php } ?>
           <?php } ?>
          </select>
          <label for="multicol-state">Select Expense</label>
        </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="expense_value_input" name="expense_value_input" value="<?php if(isset($get_prop)){echo $get_prop['expense_value'];}?>" placeholder="Enter Aadhar No"  />
              <label for="multicol-confirm-plot_reg_doc_num" id="proof_label"></label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
      <div class="input-group input-group-merge">
          <div class="form-floating form-floating-outline">
            <textarea class="form-control h-px-75" aria-label="With textarea" name="description_input" placeholder="Enter Street Address"><?php if(isset($get_prop)){echo $get_prop['description'];}?></textarea>
            <label>Description</label>
          </div>
        </div>
      </div>

    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <a href="<?= base_url('expense') ?>" class="btn btn-outline-danger me-4">Back</a>
    </div>
  </form>

</div>
</div>

          </div>
          <!-- / Content -->
 <!-- Page JS -->
 <script src="<?=base_url()?>/assets/js/extended-ui-sweetalert2.js"></script>
 <script src="<?=base_url()?>/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
 <script src="<?=base_url()?>/assets/js/form-layouts.js"></script>
 <script src="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
 <script>
  $(document).ready(function() {
         $(".bill_account").addClass("open");
         $(".expns").addClass("active");


     // ********select 2 ***************
       var o = $("#property_name_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Nagar / Garden", dropdownParent: o.parent() });
  // ********select 2 ***************
  var o = $("#expense_type_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Expense", dropdownParent: o.parent() });
  // ********select 2 ***************

var val_1 =$('#expense_type_input option:selected').text();
 var placeholter_str_1 = 'Enter '+ val_1 + ' Amount';
$('#expense_value_input').attr('placeholder', placeholter_str_1);
 $('#proof_label').html(val_1);
// -------------------------------------------------------------
  $('#expense_type_input').on('change', function() {
 var val=$('#expense_type_input option:selected').text();
 var placeholter_str = 'Enter '+ val + ' Amount';
$('#expense_value_input').attr('placeholder', placeholter_str);
 $('#proof_label').html(val);
});

$('#submitBtn').on('click',function() {
          const form = document.querySelector('#myForm');
          const formData = new FormData(form); 
           $.ajax({
          url: '<?=base_url()?>admin/expense_controller/save_expense_details',
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
              window.location.href = "<?= base_url('expense'); ?>";
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
 

