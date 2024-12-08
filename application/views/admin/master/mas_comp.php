<style>
    .dataTables_info{
        font-size: smaller;
        padding: 20px;
        margin-left: -19px;
    }
    .pagination{
        margin-left: 137px;
        padding: 8px;
    }
    #example_filter{
        margin-left: 103px;
    }
</style>
<script src="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"></script>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    
  <div class="col-xl">
    <div class="card mb-7">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Company Info</h5>
        <small class="text-body float-end">Merged input group</small>
      </div>
      <div class="card-body">
          <!-- <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ri-user-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              <label for="basic-icon-default-fullname">Full Name</label>
            </div>
          </div> -->
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-company2" class="input-group-text"><i class="ri-building-4-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="hidden" id="comp_id" value="">
              <input type="text" id="basic-icon-default-company" class="form-control" placeholder="Enter Company Name" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
              <label for="basic-icon-default-company">Company</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-address" class="input-group-text"><i class="ri-chat-4-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" id="basic-icon-default-line1" class="form-control" placeholder="Enter Address Line 1">
              <label for="basic-icon-default-message">Address Line 1</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-address" class="input-group-text"><i class="ri-chat-4-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" id="basic-icon-default-line2" class="form-control" placeholder="Enter Address Line 2">
              <label for="basic-icon-default-message">Address Line 2</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-city" class="input-group-text"><i class="ri-building-4-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" id="basic-icon-default-citys" class="form-control" placeholder="Enter City" >
              <label for="basic-icon-default-city">City</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-state" class="input-group-text"><i class="ri-building-4-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" id="basic-icon-default-states" class="form-control" placeholder="Enter State Name" >
              <label for="basic-icon-default-state">State</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ri-phone-fill ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
              <label for="basic-icon-default-phone">Phone No</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ri-phone-fill ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" id="basic-icon-default-al-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
              <label for="basic-icon-default-phone">Alternate No</label>
            </div>
          </div>
          <div class="mb-6">
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="ri-mail-line ri-20px"></i></span>
              <div class="form-floating form-floating-outline">
                <input type="text" id="basic-icon-default-email" class="form-control" placeholder="example@mail.com" >
                <label for="basic-icon-default-email">Email</label>
              </div>
            </div>
          </div>
          <div class="mb-6">
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="ri-mail-line ri-20px"></i></span>
              <div class="form-floating form-floating-outline">
                <input type="text" id="basic-icon-default-web" class="form-control" placeholder="www.example.com" >
                <label for="basic-icon-default-web">Website</label>
              </div>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-pan" class="input-group-text"><i class="ri-building-4-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" id="basic-icon-default-pan-no" class="form-control" placeholder="Enter PAN" >
              <label for="basic-icon-default-pan">PAN</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-gst" class="input-group-text"><i class="ri-building-4-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" id="basic-icon-default-gstin" class="form-control" placeholder="Enter GST Number" >
              <label for="basic-icon-default-gst">GSTIN</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
              <input type="file" name="myInput" accept="image/*" required>
          </div>
          
          <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit" >Submit</button>
        
      </div>
    </div>
  </div>

    </div>
</div>
<script src="assets/js/extended-ui-sweetalert2.js"></script>
  <script src="assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  
  <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
         $(".mas").addClass("open");
         $(".comp_mas").addClass("active");
         get_company();
    });
    function get_company() {
                    $.ajax({
                      type:'POST',
                      url:'<?php echo base_url('get_company') ?>',
                      dataType:'json',
                      success:function(data){
                        console.log(data);  
                            $('#comp_id').val(data[0].comid);
                            $('#basic-icon-default-company').val(data[0].name);
                            $('#basic-icon-default-line1').val(data[0].add1);
                            $('#basic-icon-default-line2').val(data[0].add2);
                            $('#basic-icon-default-citys').val(data[0].add3);
                            $('#basic-icon-default-states').val(data[0].add4);
                            $('#basic-icon-default-phone').val(data[0].contact1);
                            $('#basic-icon-default-al-phone').val(data[0].contact2);
                            $('#basic-icon-default-email').val(data[0].email);
                            $('#basic-icon-default-web').val(data[0].website);
                            $('#basic-icon-default-pan-no').val(data[0].pan);
                            $('#basic-icon-default-gstin').val(data[0].gstin);
                      }
                    });
    }
    $('#submit').on('click', function() {
                    let comp_id = $('#comp_id').val();
                    let comp_name = $('#basic-icon-default-company').val();
                    let add1 = $('#basic-icon-default-line1').val();
                    let add2 = $('#basic-icon-default-line2').val();
                    let add3 = $('#basic-icon-default-citys').val();
                    let add4 = $('#basic-icon-default-states').val();
                    let contact1 = $('#basic-icon-default-phone').val();
                    let contact2 = $('#basic-icon-default-al-phone').val();
                    let email = $('#basic-icon-default-email').val();
                    let website = $('#basic-icon-default-web').val();
                    let pan = $('#basic-icon-default-pan-no').val();
                    let gstin = $('#basic-icon-default-gstin').val();
                    let logo = $('input[name="myInput"]')[0].files[0];

                    let formData = new FormData();
                    formData.append('comp_id', comp_id);
                    formData.append('comp_name', comp_name);
                    formData.append('add1', add1);
                    formData.append('add2', add2);
                    formData.append('add3', add3);
                    formData.append('add4', add4);
                    formData.append('contact1', contact1);
                    formData.append('contact2', contact2);
                    formData.append('email', email);
                    formData.append('website', website);
                    formData.append('pan', pan);
                    formData.append('gstin', gstin);
                    formData.append('file', logo);
                        $.ajax({
                          type: 'POST',
                          url: '<?php echo base_url('set_company') ?>',
                          data: formData,
                          processData: false,
                          contentType: false,
                          dataType: 'json',
                          success: function(data) {
                          // Handle success response
                          Swal.fire({
                              icon: 'success',
                              title: 'Success',
                              text: 'Company data saved successfully!'
                          }).then((result) => {
                                  get_company();
                          });
                          $(".swal2-deny").remove();
                          $(".swal2-cancel").remove();
                      }
                    });
    });


            
     
</script>