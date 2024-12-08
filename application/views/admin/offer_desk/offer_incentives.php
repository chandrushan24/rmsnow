
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
                <li class="breadcrumb-item"><a href="<?= base_url('offer_incentives') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
            </ol>
        </div>
<div class="card">
  <h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></h5>
  <hr class="my-4" />
  <form id="myForm"  class="card-body" method="post" enctype="multipart/form-data" onSubmit="return false">
    <div class="row g-6">
    
    <div class="col-md-4">
        <div class="form-floating form-floating-outline">
        <input type="hidden" class="form-control" name="offer_incentives_id" value="<?php if(isset($get_prop)){echo $get_prop['offer_incentives_id']; }?>" />
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
              <input type="text" id="multicol-plot_values_input" class="form-control" name="plot_values_input" value="<?php if(isset($get_prop)){echo $get_prop['plot_values'];}?>" placeholder="Enter Plot Values"  />
              <label for="multicol-confirm-plot_values_input">Plot Value</label>
            </div>
          </div>
      </div>

      <div class="col-md-4" style="display:none;">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-expense_values_input" class="form-control" name="expense_values_input" value="0" placeholder="Enter Expense Values" readonly />
              <label for="multicol-confirm-expense_values_input">Expense Value</label>
            </div>
          </div>
      </div>

      <div class="col-md-4" style="display:none;">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-total_values_input" class="form-control" name="total_values_input" value="<?php if(isset($get_prop)){echo $get_prop['total_values'];}?>" placeholder="Enter Total Values"  />
              <label for="multicol-confirm-total_values_input">Total Values</label>
            </div>
          </div>
      </div>
      
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-incentive_input" class="form-control" name="incentive_input" value="<?php if(isset($get_prop)){echo $get_prop['incentive'];}?>" placeholder="Enter Incentive"  />
              <label for="multicol-confirm-incentive_input">Incentive %</label>
            </div>
          </div>
      </div>


    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <a href="<?= base_url('offer_incentives') ?>" class="btn btn-outline-danger me-4">Back</a>
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
         $(".off_desk").addClass("open");
         $(".offer_in").addClass("active");

  // ********select 2 ***************
       var o = $("#property_name_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Nagar / Garden", dropdownParent: o.parent() });
  // ********select 2 ***************

  // $('#property_name_input').on('change',function() {
  //   var PropertyID = $(this).val();
  //   if(PropertyID){
  //   $.ajax({
  //         url: '<?=base_url()?>admin/Offer_incentives_controller/get_expense_value_based_on_nagar_garden',
  //         type: 'POST',
  //         data: {
  //           property_id : PropertyID
  //         },
  //         dataType: 'json',  
  //         success: function(response) {
  //           if(response){
  //             if(response.expense_total != 0){
  //             var calculate = parseFloat(response.expense_total) / parseFloat(response.count_plot) + parseFloat(response.count_staff);
  //             $("[name='expense_values_input']").val(Math.round(calculate));
  //             }else{
  //             $("[name='expense_values_input']").val(0);
  //             }
  //             $("[name='plot_values_input']").trigger('input');
  //           }
  //     },
  //     error: function(xhr, status, error) {
  //         console.error('AJAX error:', status, error); // Log AJAX errors
  //     }
  //   });
  // }

  // });
  
  $("[name='plot_values_input']").on('input',function() {
    var plot_value = $(this).val();
    var expense_value = 0;
    if(plot_value !=''){
    var calculate_total_value = parseFloat(plot_value) + parseFloat(expense_value);
    $("[name='total_values_input']").val(calculate_total_value);
  }
});

    
         $('#submitBtn').on('click',function() {
          const form = document.querySelector('#myForm');
          const formData = new FormData(form); 
           $.ajax({
          url: '<?=base_url()?>admin/Offer_incentives_controller/save_offer_incentives',
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
              window.location.href = "<?= base_url('offer_incentives'); ?>";
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
  
