<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css" />

    <!-- Content wrapper -->
    <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

<!-- Multi Column with Form Separator -->
       <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('employee_salary') ?>"><?php echo $title; ?> </a></li> /
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
        <input type="hidden"  name="emp_salary_id"  value="<?php if(isset($get_prop)){ echo $get_prop['emp_salary_id']; } ?>"  />
        <input type="hidden"  id="already_received_cal_id" name="already_received_cal_id"  value=""  />
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
              <input type="text" id="multicol-Talnet_salary_amount_inputuk_Name" class="form-control" name="net_salary_amount_input"  value="<?php if(isset($get_prop)){echo $get_prop['net_salary_amount'];}?>" placeholder="Enter Net Salary Amount"/>
              <label for="multicol-net_salary_amount_input">Net Salary Amount</label>
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
      
      
      <div class="col-md-4">
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-balance_amount_input" class="form-control" name="balance_amount_input"  value="<?php if(isset($get_prop)){echo $get_prop['balance_amount'];}?>" placeholder="Enter Balance Amount"/>
              <label for="multicol-balance_amount_input">Balance Amount</label>
            </div>
          </div>
      </div>

      <div class="col-md-4" id="offer_won" style="<?php if(isset($get_prop)){if($get_prop['offer_won'] !=''){echo '';} else{ echo "display:none;";}}else{ echo "display:none;";}?>" >
          <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
              <input type="text" id="multicol-offer" class="form-control" name="offer_input"  value="<?php if(isset($get_prop)){echo $get_prop['offer_won'];}?>" readonly/>
              <label for="multicol-offer_input">Offer</label>
            </div>
          </div>
      </div>

      </div>

    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <a href="<?= base_url('employee_salary') ?>" class="btn btn-outline-danger me-4">Back</a>
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
         $(".emp_sal").addClass("active");
 
  // ********select 2 ***************
  var o = $("#employee_name_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Employee Name", dropdownParent: o.parent() });
  // ********select 2 ***************

         $('#employee_name_input').on('change',function() {
          const emp_id =$(this).val();
          //get offer
           get_offer(emp_id);
            // get advance
           $.ajax({
          url: '<?=base_url()?>admin/Unregistered_plots_controller/get_employee_details?emp_id='+emp_id,
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
            $("[name='employee_id_input']").val(response.employee_id);
                    $.ajax({
                      url: '<?=base_url()?>admin/Employee_salary_controller/get_sal_adv_data?emp_id='+emp_id,
                      type: 'GET',
                      processData: false,  
                      contentType: false, 
                      dataType: 'json',  
                        success: function(data) {
                          $("#multicol-advance_amount_input").val(data);
                          $.ajax({
                          url: '<?=base_url()?>admin/Employee_salary_controller/get_sal_net_amount_data?emp_id='+emp_id,
                          type: 'GET',
                          processData: false,  
                          contentType: false, 
                          dataType: 'json',  
                          success: function(data) {
                             // get advance
                          if(data.status == 1){
                          $("#multicol-Talnet_salary_amount_inputuk_Name").val(data.amount);
                          var selected_rows = (data.selected_rows !='' && data.selected_rows != null && data.selected_rows !='null' ? data.selected_rows : '');
                          $("#already_received_cal_id").val(selected_rows);
                          var advance_amount =  $("#multicol-advance_amount_input").val();
                          var net_maount =  $("#multicol-Talnet_salary_amount_inputuk_Name").val();
                          advance_amount = (isNumber(advance_amount) ? advance_amount : 0);
                          net_maount = (isNumber(net_maount) ? net_maount : 0);
                          var balance_amount = net_maount - advance_amount;
                          $("#multicol-balance_amount_input").val(balance_amount);
                          $("#submitBtn").attr('disabled',false);
                          }else{
                            Swal.fire({
                            title: 'Warning',
                            html: data.msg,
                            icon: 'warning'
                            });
                            $(".swal2-deny").remove();
                            $(".swal2-cancel").remove();
                            $("#submitBtn").attr('disabled',true);
                          }

                        }

                          });
                          
                        },
                      error: function(xhr, status, error) {
                      console.error('AJAX error:', status, error); // Log AJAX errors
                      }
                    });
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
          url: '<?=base_url()?>admin/employee_salary_controller/save_employee_salary_details',
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
              window.location.href = "<?= base_url('employee_salary'); ?>";
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

    function isNumber(n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    }
 
    function get_offer(emp_id){
      if(emp_id){
        $.ajax({
            url: '<?=base_url()?>admin/Employee_salary_controller/get_offer_reg?emp_id='+emp_id,
            type: 'GET',
            processData: false,  
            contentType: false, 
            dataType: 'json',  
            success: function(data) {
             if(data){
              if(data.offer != ''){
                $('#offer_won').show();
                $("[name='offer_input']").val(data.offer);
              }else{
                $('#offer_won').hide();
              }
             }else{
              $('#offer_won').hide();
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
 

