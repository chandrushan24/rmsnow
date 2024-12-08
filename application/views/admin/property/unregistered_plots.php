
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
                <li class="breadcrumb-item"><a href="<?= base_url('unreg_plot') ?>"><?php echo $title; ?> </a></li> /
                <li class=""><a href="javascript:void(0)"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></a></li>
                <li>&nbsp; &nbsp;&nbsp;&nbsp; <strong style="background:green;"><?php echo $this->session->flashdata('message');?></strong></li>
            </ol>
        </div>
<div class="card">
  <h5 class="card-header"><?php if(!isset($get_prop)){echo 'Add  ';}else{echo 'Edit ';} echo $title;?></h5>
  <hr class="my-4" />

  <form id="myForm" class="card-body" method="post" enctype="multipart/form-data" onSubmit="return false">
    <div class="row g-6">
      <div class="col-md-4">
        <div class="form-floating form-floating-outline">
          <input type="text" id="multicol-s_no" class="form-control" name="s_no_input"  value="<?php if(isset($get_prop)){echo $get_prop['s_no'];}?>" placeholder="Enter S.No" />
          <input type="hidden" class="form-control" name="unreg_plot_id" value="<?php if(isset($get_prop)){echo $get_prop['unreg_plot_id'];}?>" />
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
              <input type="text" id="multicol-plot_no" class="form-control"  name="plot_no_input" value="<?php if(isset($get_prop)){echo $get_prop['plot_no'];}?>"  placeholder="Enter Plot No"  />
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

      <hr>
      <h6>Enter Plot Four Side Extension Value in Sqft/Sqmt</h6>
      <div class="col-md-4">
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
      </div>

      </div>


    <div class="pt-6">
      <button type="submit" id="submitBtn" class="btn btn-primary me-4">Submit</button>
      <button type="reset" class="btn btn-outline-secondary me-4" >Reset</button>
      <a href="<?= base_url('unreg_plot') ?>" class="btn btn-outline-danger me-4">Cancel</a>
    </div>
    </div>
  </form>


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
         $(".unreg_plot").addClass("active");

     // ********select 2 ***************
       var o = $("#property_name_input");
        select2Focus(o);
        o.wrap('<div class="position-relative"></div>');
        o.select2({ placeholder: "Select Nagar / Garden", dropdownParent: o.parent() });
  // ********select 2 ***************

         $('#property_name_input').on('change',function() {
          const property_id =$(this).val();
           $.ajax({
          url: '<?=base_url()?>admin/Unregistered_plots_controller/get_property_details?property_id='+property_id,
          type: 'GET',
          processData: false,  
          contentType: false, 
          dataType: 'json',  
          success: function(response) {
            // alert(response.total_entension);
            // $("[name='plot_no']").val(response.plot_no);
            $("[name='total_plot_extension_input']").val(response.total_entension);
            $("[name='plot_no_input']").val(response.plot_no);
            $("[name='east_input']").val(response.east);
            $("[name='west_input']").val(response.west);
            $("[name='north_input']").val(response.north);
            $("[name='south_input']").val(response.south);
      
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
          url: '<?=base_url()?>admin/Unregistered_plots_controller/save_unregistered_plot',
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
              window.location.href = "<?= base_url('unreg_plot'); ?>";
              }).catch((error) => {
                  console.error('Swal error:', error); // Log any errors with Swal
              });
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