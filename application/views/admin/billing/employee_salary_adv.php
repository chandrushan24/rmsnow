<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css" />

    <!-- Content wrapper -->
    <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

<!-- Multi Column with Form Separator -->
       <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('salary_advance') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
            </ol>
        </div>
<div class="card">
  <h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></h5>
  <hr class="my-4" />
  <form id="myForm" class="card-body" method="post" enctype="multipart/form-data" onSubmit="return false">
    <div class="row g-6">
            
      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
        <input type="hidden"  name="adv_id"  value="<?php if(isset($get_prop)){ echo $get_prop['adv_id']; } ?>"  />
          <select  class="select2 form-select" id="employee_name_input" name="employee_name_input" data-allow-clear="true">
          <option value="" selected disabled>Select Employee Name</option>
          <?php if(!empty($employee_list)){ 
            $selected = '';
            foreach($employee_list as $val){ 
            if(isset($get_prop)){
              if($get_prop['employee_name'] == $val['staff_info_id']){
                $selected = 'selected';
              }else{
                $selected = '';
              }
            }
            ?>
            <option value="<?php echo $val['staff_info_id'];?>"  <?php echo $selected;?> ><?php echo $val['employee_name'];?></option>
            <?php } ?>
           <?php } ?>
          </select>
          <label for="multicol-employee_name_input">Employee Name</label>

        </div>
      </div>


      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-employee_id_input" class="form-control" name="employee_id_input"  value="<?php if(isset($get_prop)){echo $get_prop['employee_id'];}?>" placeholder="Enter Employee ID"/>
              <label for="multicol-employee_id_input">Employee ID</label>
            </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-advance_amount_input" class="form-control"  name="advance_amount_input" value="<?php if(isset($get_prop)){echo $get_prop['advance_amount'];}?>"  placeholder="Enter  Advance Amount"  />
              <label for="multicol-confirm-advance_amount_input">Advance Amount</label>
            </div>
          </div>
      </div>
      
      </div>

    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <button type="reset" class="btn btn-outline-secondary me-4" >Reset</button>
      <a href="<?= base_url('salary_advance') ?>" class="btn btn-outline-danger me-4">Cancel</a>
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
         $(".sal_adv").addClass("active");
 
  // ********select 2 ***************
  var o = $("#employee_name_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Employee Name", dropdownParent: o.parent() });
  // ********select 2 ***************

         $('#employee_name_input').on('change',function() {
          const emp_id =$(this).val();
           $.ajax({
          url: '<?=base_url()?>admin/Unregistered_plots_controller/get_employee_details?emp_id='+emp_id,
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
            
            $("[name='employee_id_input']").val(response.employee_id);
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
          url: '<?=base_url()?>admin/employee_salary_adv_controller/save_employee_salary_details',
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
              window.location.href = "<?= base_url('salary_advance'); ?>";
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
 
