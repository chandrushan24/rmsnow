<?php 
$user_role = $this->session->userdata('role'); 
$org_title = $title;

if($title == 'Property'){
    $title = 'Nager/Garden Profile';
}
else if($title == 'reg_plot'){
    $title = 'Registered Plots';
}
else if($title == 'unreg_plot'){
    $title = 'Unregistered Plots';
}
else if($title == 'booked_plot'){
    $title = 'Booked Plots';
}
else if($title == 'customer_info'){
    $title = 'Customer Details';
}
else if($title == 'staff_info'){
    $title = 'Staff Details';
}
else if($title == 'add_offer'){
    $title = 'Add Offer';
}
else if($title == 'offer_incentives'){
    $title = 'Offer Incentives';
}
else if($title == 'salary_advance'){
    $title = 'Salary Advance';
}
else if($title == 'employee_salary'){
    $title = 'Employee Salary';
}
else if($title == 'expense'){
    $title = 'Expense Details';
}
else if($title == 'billing_receipt'){
    $title = 'Customer Receipt';
}
else{
    $title ='';
}
?>
<style>
    .pagination{
        padding: 10px;
        display: flex;
        justify-content: end;
        margin-bottom: -3px;
    }
    .dt-buttons {
    float: left;
    margin-left: 20px; /* Adjust the value as needed */
}
    .dataTables_info{
        padding: 16px;
        display: flex;
        justify-content: flex-start;
    }
    label {
        display: revert-layer;
        display: ruby;
    }
    .form-select-sm{
        width: auto;
    }
    .dataTables_length{
        padding-bottom: 20px;
        padding-left: 20px;
    }
    
    .dataTables_filter{
        display: flex;
        justify-content: end;
        padding: 20px;
    }
    .dataTables_filter lable{
            display: flex;
            justify-content: flex-end;
            padding: 15px;
    }
    .dataTables_filter label input {
            
    width: auto;

        }

    <?php if($org_title == 'reg_plot' || $org_title == 'unreg_plot' || $org_title == 'booked_plot' || $org_title == 'employee_salary' ||  $org_title == 'billing_receipt' || $org_title == 'expense'): ?>
        
    .dataTables_filter{
        display: none;
    }

    <?php endif; ?>       


</style>
<script src="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"></script> -->
<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        
              <!-- Content wrapper -->
      <div class="content-wrapper">

<!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

  <!-- Title Show -->
  <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $title; ?></a></li> 
                <li class="" style="display:none;"><a href="javascript:void(0)"><?php echo $title; ?> Data</a></li>
            </ol>
        </div>
    
         <!-- Alert -->
   
     
      <?php
      $message = $this->session->flashdata('message');
      $error = $this->session->flashdata('error');
      if($message): ?>
     <div class="alert alert-success alert-dismissible" role="alert">
          <h6 class="alert-heading d-flex align-items-center">
              <span class="alert-icon rounded">
                  <i class="ri-error-success-line ri-22px"></i>
              </span>
              <?php echo $message; ?>
          </h6>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          </button>
      </div>
  <?php endif; 
  if($error): ?>


      <div class="alert alert-danger alert-dismissible" role="alert">
            <h6 class="alert-heading d-flex align-items-center">
                <span class="alert-icon rounded">
                    <i class="ri-error-warning-line ri-22px"></i>
                </span>
                <?php echo $error; ?>
            </h6>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
  <?php endif; ?>

<!-- Scrollable -->
<div class="card">
<div class="col-sm-6 col-md-12" style="display: flex;">
    <div class="col-sm-12 col-md-6"><h5 class="card-header"><?php if($title == 'Customer Receipt'){echo "Customer Receipt / Income"; }else{echo $title;} ?> List</h5></div>
        <div class="col-sm-12 col-md-6">
            <div class="row">
                <div class="col-sm-12 col-md-12"><input type="hidden" id="id" class="id" value="">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" style="padding: 15px;display: flex;width: min-content;margin-left: auto;">
                        <?php if($title == 'Unregistered Plots'){ }else{ ?>   
                            <?php if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') { ?>
                         <button type="button" class="btn btn-primary waves-effect waves-light" data-title="<?php echo 'Add_'.$org_title.''; ?>" id="add_list" ><span class="tf-icons ri-add-circle-line ri-16px me-1_5"></span>Add</button>
                            <?php } ?>
                        <?php } ?>
                            <!-- <button type="button" class="btn btn-success waves-effect waves-light" data-title="<?php //echo 'Edit_'.$org_title.''; ?>" id="edit_list" disabled ><span class="ri-edit-line w-1em h-1em"></span>Edit</button> -->

                            <!-- <button type="button" class="btn btn-danger waves-effect waves-light" id="confirm-color" disabled ><span class="tf-icons ri-close-line  ri-16px me-1_5"></span>Delete</button> -->

                            <!-- <button type="button" class="btn btn-info waves-effect waves-light" id="print_list" ><span class="tf-icons ri-printer-line ri-16px me-1_5"></span>Print</button>

                            <button type="button" class="btn btn-warning waves-effect waves-light" id="export_list" ><span class="tf-icons ri-export-line ri-16px me-1_5"></span>Export</button> -->
                        </div>
                </div>		

          
            </div> 
        </div>
        
    </div>
    <?php 

     $style ='';
    if($org_title == 'offer_incentives' || $org_title == 'add_offer'): 
        $style ="none";
    endif; ?>     

    <div class="row">
    <div class="col-md-3 pull-left p-5" style="display:<?php echo $style; ?>">
       <a href="<?= base_url() ?>export/<?= $org_title ?>/excel/0" id="excelBtn" class="btn btn-sm btn-success">Excel</a>
       <a href="<?= base_url() ?>export/<?= $org_title ?>/pdf/0" id="pdfBtn" class="btn btn-sm btn-danger">PDF</a>
       <a href="<?= base_url() ?>export/<?= $org_title ?>/print/0" id="printBtn" class="btn btn-sm btn-primary">Print</a>
      </div>
    <?php if($org_title == 'reg_plot' || $org_title == 'unreg_plot' || $org_title == 'booked_plot' || $org_title == 'expense' ||  $org_title == 'billing_receipt'): ?>
        
        <?php  if($org_title == 'booked_plot' || $org_title == 'reg_plot' || $org_title == 'billing_receipt' ||  $org_title == 'expense'){ ?>
   
        <div class="col-md-3 pull-right p-5">
         </div>
         <div class="col-md-3 pull-right p-5"> 
         <div class="form-floating form-floating-outline">
         <input  type="text" id="daterange" name="daterange" class="daterange form-control input-group"  placeholder="Choose Date Range" value="" autocomplete="off">
                  <label for="date_of_booking">Date Filter</label>
         </div>
    </div>

   <?php }else{ ?>
        <div class="col-md-6 pull-left p-5">
      </div>
        <?php }?>

         <div class="col-md-3 pull-right p-5">
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="property_name_input" name="property_name_input" data-allow-clear="true">
          <option value="" selected>Select Nager / Garden</option>
          <?php if(!empty($propert_list)){ 
            foreach($propert_list as $val){ 
            ?>
            <option value="<?php echo $val['property_id'];?>" ><?php echo $val['property_name'];?></option>
            <?php } ?>
           <?php } ?>
          </select>
          <label for="multicol-state">Select Nagar/Garden Name</label>
        </div>
      </div>
      
      <?php endif; ?>   

   
      <?php if($org_title == 'employee_salary'): ?>
        <div class="col-md-3 pull-left p-5">
      </div>

      <div class="col-md-3 pull-right p-5"> 
         <div class="form-floating form-floating-outline">
         <input  type="text" id="daterange" name="daterange" class="daterange form-control input-group"  placeholder="Choose Date Range" value="" autocomplete="off">
                  <label for="date_of_booking">Salary Date</label>
         </div>
    </div>

         <div class="col-md-3 pull-right p-5">
        <div class="form-floating form-floating-outline">
          <select  class="select2 form-select" id="employee_name_filter" name="employee_name_filter" data-allow-clear="true">
          <option value="" selected>Select Employee</option>
          <?php if(!empty($employee_list)){ 
            foreach($employee_list as $val){ 
            ?>
            <option value="<?php echo $val['staff_info_id'];?>" ><?php echo $val['employee_name'];?></option>
            <?php } ?>
           <?php } ?>
          </select> 
          <label for="multicol-state">Select Employee</label>
        </div>
            </div>

      <?php endif; ?>   

      </div>

<div class=" text-nowrap table-responsive"> 
<table id="DataTable" class="table table-striped table-hover " style="width:100%">
<?php if($org_title =='Property'):?>

        <thead>
            <tr>
                <th>S:No</th>
                <th>ID</th>
                <th>Nager/Garden Name</th>
                <th>District</th>
                <th>Taluk</th>
                <th>Village/Town Name</th>
                <th>Total Plots</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php endif; ?>
        
 <?php if($org_title =='reg_plot'):?>

<thead>
    <tr id="tableHeaders">
        <th>S:No</th>
        <th>ID</th>
        <th>Nager/Garden Name</th>
        <th>Village/Town Name</th>
        <th>Total Plots</th>
        <th>Total Registered Plots</th>
        <!-- <th>Total Booked Plots</th> -->
        <!-- <th>Total Unregister Plots</th> -->
        <th></th>
    </tr>
</thead>
<?php endif; ?>

<?php if($org_title =='unreg_plot'):?>

<thead>
    <tr id="tableHeaders">
        <th>S:No</th>
        <th>ID</th>
        <th>Nager/Garden Name</th>
        <th>Village/Town Name</th>
        <th>Total Plots</th>
        <th>Total Unregister Plots</th>
    </tr>
</thead>
<?php endif; ?>

<?php if($org_title =='booked_plot'):?>

<thead>
    <tr id="tableHeaders">
        <th>S:No</th>
        <th>ID</th>
        <th>Nager/Garden Name</th>
        <th>Village/Town Name</th>
        <th>Total Plots</th>
        <th>Total Booked Plots</th>
        <th></th>
    </tr>
</thead>
<?php endif; ?>

<?php if($org_title =='customer_info'):?>

<thead>
    <tr>
        <th>S:No</th>
        <th>ID</th>
        <th>Buyer Name</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Action</th>
    </tr>
</thead>
<?php endif; ?>

<?php if($org_title =='staff_info'):?>

<thead>
    <tr>
        <th>S:No</th>
        <th>ID</th>
        <th>Employee Name</th>
        <th>Father Name</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
</thead>
<?php endif; ?>

<?php if($org_title =='add_offer'):?>

<thead>
    <tr>
        <th>S:No</th>
        <th>ID</th>
        <th>Nager/Garden Name</th>
        <th>Targets</th>
        <th>Offers</th>
        <?php 
        if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') { ?>
        <th>Action</th>
        <?php } ?>
    </tr>
</thead>
<?php endif; ?>

<?php if($org_title =='offer_incentives'):?>

<thead>
    <tr>
        <th>S:No</th>
        <th>ID</th>
        <th>Nager/Garden Name</th>
        <th>Total Value</th>
        <th>Incentives</th>
        <?php
         if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') { ?>
        <th>Action</th>
        <?php } ?>
    </tr>
</thead>
<?php endif; ?>
<?php if($org_title =='salary_advance'):?>

<thead>
    <tr>
        <th>S:No</th>
        <th>ID</th>
        <th>Date</th>
        <th>Employee Name</th>
        <th>Employee ID</th>
        <th>Advance Amount</th>
        <th>Action</th>
    </tr>
</thead>
<tfoot>
    <tr>
      <th colspan="4" class="text-end">TOTAL : </th>
      <th></th>
    </tr>
  </tfoot>

<?php endif; ?>
<?php if($org_title =='employee_salary'):?>

<thead>
    <tr>
        <th>S:No</th>
        <th>ID</th>
        <th>Salary Date</th>
        <th>Employee Name</th>
        <th>Advance Amount</th>
        <th>Salary amount</th>
        <th>Offer Won</th>
        <th>Action</th>
    </tr>
</thead>
<tfoot>
    <tr>
      <th colspan="4" class="text-end">TOTAL : </th>
      <th></th>
    </tr>
  </tfoot>
<?php endif; ?>
<?php if($org_title =='expense'):?>

<thead>
    <tr>
        <th>S:No</th>
        <th>ID</th>
        <th>Expense Date</th>
        <th>Nager/Garden Name</th>
        <th>Expense Name</th>
        <th>Amount</th>
        <th>Action</th>
    </tr>
</thead>
<tfoot>
    <tr>
      <th colspan="4" class="text-end">TOTAL : </th>
      <th></th>
    </tr>
  </tfoot>
<?php endif; ?>
<?php if($org_title =='billing_receipt'):?>

<thead>
    <tr>
        <th>S:No</th>
        <th>ID</th>
        <th>Receipt Date</th>
        <th>Nager/Garden Name</th>
        <th>Company name</th>
        <th>Buyer name</th>
        <th>Paid Amount</th>
        <th>Action</th>
    </tr>
</thead>
<tfoot>
    <tr>
      <th colspan="5" class="text-end">TOTAL : </th>
      <th></th>
    </tr>
  </tfoot>
<?php endif; ?>
<tbody>
  
</tbody>
       
    </table>

</div>
</div>
<!--/ Scrollable -->

<hr class="my-12">

  </div>
  <!-- / Content -->

  <!-- Model -->
  <!-- Pricing Modal -->
<div class="modal fade" id="pricingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-simple modal-pricing">
    <div class="modal-content">
      <div class="modal-body p-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="col-md-12" id="response_view">

        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Pricing Modal -->

 <!-- End Model -->

  <div class="content-backdrop fade"></div>
</div>
<input type="hidden" id="type-success">
<!-- Content wrapper -->
<!-- Vendors JS -->
<!-- <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script> -->

  <!-- Page JS -->
 
  <script src="assets/js/extended-ui-sweetalert2.js"></script>
  <script src="assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  
  <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.bootstrap5.min.js"></script>
  <script src="assets/js/pages-pricing.js"></script>
  <script src="<?=base_url()?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
 <script src="<?=base_url()?>/assets/js/form-layouts.js"></script>


<!-- <script src="../../assets/js/modal-create-app.js"></script>
<script src="../../assets/js/modal-add-new-cc.js"></script>
<script src="../../assets/js/modal-add-new-address.js"></script>
<script src="../../assets/js/modal-edit-user.js"></script>
<script src="../../assets/js/modal-enable-otp.js"></script>
<script src="../../assets/js/modal-share-project.js"></script>
<script src="../../assets/js/modal-two-factor-auth.js"></script> -->
<script>
     $(document).ready(function() {

        var selectedOption_ = $('#property_name_input').val();
        var isDefault_ = (selectedOption_ !== '');
        // Update the headers based on the selection
        updateHeaders(isDefault_);

    var excelBtn = $("#excelBtn");
    var pdfBtn = $("#pdfBtn");
    var printBtn = $("#printBtn");
    
    // Function to update the URLs
    function updateExportUrls(page) {
        var selectedValue ='';
        var selecteddate='';
        if(page == 'Property' || page == 'DateRange'){
           selectedValue = $('#property_name_input').val() || '';
           selecteddate = $('#daterange').val() || ''; 
           selectedValue = selectedValue  + ',' + selecteddate.replace(/\//g, ".");
        }
        if(page == 'Staff Salary'){
            var selectedValueEmp = $('#employee_name_filter').val();
            var selecteddateEmp = $('#daterange').val() || ''; 

            if(selectedValueEmp !='' || selecteddateEmp !=''){
                var selectedValue = selectedValueEmp  + ',' + selecteddateEmp.replace(/\//g, ".");
            }
        }
        
        // Update the href attributes with the selected value
        var excelUrl = "<?= base_url() ?>export/<?= $org_title ?>/excel" + (selectedValue ? "/" + selectedValue : "/" + 0);
        var pdfUrl = "<?= base_url() ?>export/<?= $org_title ?>/pdf" + (selectedValue ? "/" + selectedValue :"/" + 0);
        var printUrl = "<?= base_url() ?>export/<?= $org_title ?>/print" + (selectedValue ? "/" + selectedValue : "/" + 0);

        excelBtn.attr('href', excelUrl);
        pdfBtn.attr('href', pdfUrl);
        printBtn.attr('href', printUrl);
    }

     // ********select 2 ***************
     var o = $("#property_name_input");
      select2Focus(o);
      o.wrap('<div class="position-relative"></div>');
      o.select2({ placeholder: "Select Nagar / Garden", dropdownParent: o.parent() });
      // ********select 2 ***************

      var o = $("#employee_name_filter");
      select2Focus(o);
      o.wrap('<div class="position-relative"></div>');
      o.select2({ placeholder: "Select Employee", dropdownParent: o.parent() });
      // ********select 2 ***************

      
        <?php if($org_title =='Property'):?>
            $(".prop").addClass("open");
            $(".prop_page").addClass("active");
        <?php endif; ?>

        <?php if($org_title =='reg_plot'):?>
            $(".prop").addClass("open");
            $(".reg_plot").addClass("active");
        <?php endif; ?>

        <?php if($org_title =='unreg_plot'):?>
            $(".prop").addClass("open");
            $(".unreg_plot").addClass("active");
        <?php endif; ?>

        <?php if($org_title =='booked_plot'):?>
            $(".prop").addClass("open");
            $(".booked_plot").addClass("active");
        <?php endif; ?>

        <?php if($org_title =='customer_info'):?>
            // $(".prop").addClass("open");
            $(".cus_info").addClass("active");
        <?php endif; ?>

        <?php if($org_title =='staff_info'):?>
            // $(".prop").removeClass("open");
            $(".staff_info").addClass("active");
        <?php endif; ?>

        <?php if($org_title =='add_offer'):?>
            $(".off_desk").addClass("open");
            $(".add_offer").addClass("active");
        <?php endif; ?>

        <?php if($org_title =='offer_incentives'):?>
            $(".off_desk").addClass("open");
            $(".offer_in").addClass("active");
        <?php endif; ?>
        <?php if($org_title =='salary_advance'):?>
            $(".bill_account").addClass("open");
            $(".sal_adv").addClass("active");
        <?php endif; ?>
        <?php if($org_title =='employee_salary'):?>
            $(".bill_account").addClass("open");
            $(".emp_sal").addClass("active");
        <?php endif; ?>
        <?php if($org_title =='expense'):?>
            $(".bill_account").addClass("open");
            $(".expns").addClass("active");
        <?php endif; ?>
        <?php if($org_title =='billing_receipt'):?>
            $(".bill_account").addClass("open");
            $(".cus_recpt").addClass("active");
        <?php endif; ?>       

            // $('#example').DataTable();
            var table1 = $('#DataTable').DataTable({
                            'pageLength': 10,
                            "ajax": {
                                "url": "<?= base_url('get_list') ?>",
                                "type": "GET",
                                "data": function(d) {
                                 d.title = '<?= $org_title ?>';
                                 d.nager = ($('#property_name_input').val() != undefined ? $('#property_name_input').val() : '');
                                 d.employee_name_filter = ($('#employee_name_filter').val() != undefined ? $('#employee_name_filter').val() : '');
                                //  d.salary_date_filter = ($('#salary_date_filter').val() != undefined ? $('#salary_date_filter').val() : '');
                                //  d.expense_date_filter = ($('#expense_date_filter').val() != undefined ? $('#expense_date_filter').val() : '');
                                 d.daterange = ($('#daterange').val() != undefined ? $('#daterange').val() : '');
                                 
                            }
                            },
                            
                            "processing": true,
                            "serverSide": true,
                        //      dom: 'Bfrtip', // Enables the buttons
                        //      buttons: [
                        //     {
                        //         extend: 'excelHtml5',
                        //         title: '<?= $title ?> Details',
                        //         text: 'Excel',
                        //         className: 'btn btn-success btn-sm',
                        //         exportOptions: {
                        //             columns: function (idx, data, node) {
                        //                 return $('#DataTable thead th').eq(idx).text() !== 'Action' && $('#DataTable thead th').eq(idx).text() !== 'ID';
                        //             },
                        //             format: {
                        //         header: function (data, columnIdx) {
                        //             // Fetch updated header name
                        //             var headerText = $('#DataTable thead th').eq(columnIdx).text();
                        //             return headerText !== 'Action' &&  headerText !== 'ID' ? headerText : null;
                        //         }
                        //         }
                        //     }
                        //     },
                        //     {
                        //         extend: 'pdfHtml5',
                        //         title: '<?= $title ?> Details',
                        //         text: 'PDF',
                        //         className: 'btn btn-danger btn-sm',
                        //         exportOptions: {
                        //             columns: function (idx, data, node) {
                        //                 return $('#DataTable thead th').eq(idx).text() !== 'Action' && $('#DataTable thead th').eq(idx).text() !== 'ID';
                        //             },
                        //             format: {
                        //         header: function (data, columnIdx) {
                        //             // Fetch updated header name
                        //             var headerText = $('#DataTable thead th').eq(columnIdx).text();
                        //             return headerText !== 'Action' &&  headerText !== 'ID' ? headerText : null;
                        //         }
                        //         }
                        //     }
                        //     },
                        //     {
                        //     extend: 'print',
                        //     title: '<?= $title ?> Details',
                        //     text: 'Print',
                        //     className: 'btn btn-info btn-sm',
                        //     exportOptions: {
                        //             columns: function (idx, data, node) {
                        //                 return $('#DataTable thead th').eq(idx).text() !== 'Action' && $('#DataTable thead th').eq(idx).text() !== 'ID';
                        //             },
                        //             format: {
                        //         header: function (data, columnIdx) {
                        //             // Fetch updated header name
                        //             var headerText = $('#DataTable thead th').eq(columnIdx).text();
                        //             return headerText !== 'Action' &&  headerText !== 'ID' ? headerText : null;
                        //         }
                        //         }
                        //     }
                        // }
                        // ],
                            // "order": [
                            //     [1, "desc"]
                            // ],
                            // "columnDefs": [
                            //     {
                            //         "targets": [1], // Index of the column you want to hide (second column)
                            //         "visible": false // Set visible to false to hide the column
                            //     }
                            // ]

                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();
                    var total = 0;
                    let title = '<?= $org_title ?>';

                    if(title == 'billing_receipt'){
                    api.column(6).data().each(function(value, index) {
                        total += parseFloat(value) || 0;  // Make sure to handle NaN values gracefully
                    });
                    $(api.column(5).footer()).html('₹' +total.toFixed(2)); // Example with 2 decimal places
                    }

                    if(title == 'expense' || title == 'salary_advance' || title == 'employee_salary'){
                    api.column(5).data().each(function(value, index) {
                        total += parseFloat(value) || 0;  // Make sure to handle NaN values gracefully
                    });
                    $(api.column(4).footer()).html('₹' +total.toFixed(2)); // Example with 2 decimal places
                    }

                }

            });
            table1.on('draw', function () {
                            $('#DataTable tbody tr td:nth-child(2)').css('display', 'none');
                            $('#DataTable thead th:nth-child(2)').css('display', 'none');
            });
            $('#DataTable tbody').on('click', 'tr', function() {
                $("#id").val("");
                $("#edit_list").prop('disabled', false); 
                $("#confirm-color").prop('disabled', false); 
                var data = table1.row(this).data(); // Get the data for the clicked row
                var id = data[1]; // Index of the hidden column (second column)
                $("#id").val(id);
                setTimeout(function() {
                    $("#id").val("");
                    $("#edit_list").prop('disabled', true); 
                    $("#confirm-color").prop('disabled', true); 
                }, 10000); 
                
            });
          
  
           // Click event for adding a property
    $("#add_list").on('click', function() {
        var page_name =$(this).data('title');
        window.location.href = "<?= base_url() ?>"+page_name+"";
    });
  

    $('#property_name_input').on('change', function() {
        updateExportUrls('Property');
        var selectedOption = $(this).val();
        var isDefault = (selectedOption !== '');
        // Update the headers based on the selection
        updateHeaders(isDefault);

        // Reload the DataTable to fetch updated data
        table1.ajax.reload();
    });

    
    $('#employee_name_filter').on('change', function() {
        // Reload the DataTable to fetch updated data
        updateExportUrls('Staff Salary');
        table1.ajax.reload();
    });

    
    
            $('#daterange').daterangepicker({
                expanded: Boolean,
                autoUpdateInput: false,
                opens: 'left',
                showDropdowns: true,
                drops: "down",
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY',
                    cancelLabel: 'Clear'
                },
                ranges: {
                    'Today': [moment(), moment()],
                    // 'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    // 'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    // 'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Week': [moment().startOf('week'), moment().endOf('week')],
                    // 'Last Week': [moment().startOf('week').subtract(7, 'days'), moment().endOf('week').subtract(7, 'days')],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    // 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'This Year': [moment().startOf('year'), moment()],
                    // 'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                }
            });

            $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + '-' + picker.endDate.format('DD/MM/YYYY'));
            updateExportUrls('DateRange');
            var selectedOption = $(this).val();
           var isDefault = (selectedOption !== '');
           // Update the headers based on the selection
           updateHeaders(isDefault);

           table1.ajax.reload();

          });

          $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        updateExportUrls('DateRange');
        var selectedOption = $(this).val();
        var isDefault = (selectedOption !== '');
        // Update the headers based on the selection
        updateHeaders(isDefault);

          table1.ajax.reload();

          });

    // Function to update the table headers dynamically
    function updateHeaders(isDefault) {
        var title = '<?= $org_title ?>';
        var defaultHeaders = [];
        var newHeaders = [];

        // Define default and new headers based on the title
        if (title === 'reg_plot') {
            defaultHeaders = ['S:No', 'ID', 'Nager/Garden Name',  'Village/Town Name' ,'Total Plots', 'Total Registered Plots',''];
            newHeaders = ['S:No', 'ID','Date Of Registered', 'Nager/Garden Name', 'Plot No', 'Buyer Name', 'Action'];
        } else if (title === 'unreg_plot') {
            defaultHeaders = ['S:No', 'ID', 'Nager/Garden Name','Village/Town Name' , 'Total Plots', 'Total Unregister Plots'];
            <?php 
            $user_role = $this->session->userdata('role'); 
            if ($user_role != 'marketers' && $user_role != 'admin' && $user_role != 'manager') { ?>
                newHeaders = ['S:No', 'ID', 'Nager/Garden Name', 'Plot No', 'Total Plot Extension', 'Action'];
            <?php }else{ ?>
                newHeaders = ['S:No', 'ID', 'Nager/Garden Name', 'Plot No', 'Total Plot Extension'];
            <?php } ?>
        } else if (title === 'booked_plot') {
            defaultHeaders = ['S:No', 'ID', 'Nager/Garden Name' ,'Village/Town Name','Total Plots','Total Booked Plots',''];
            newHeaders = ['S:No', 'ID','Date Of Booking', 'Nager/Garden Name', 'Plot No', 'Buyer Name', 'Action'];
        }

        // Determine which headers to display
        var headers = isDefault ? newHeaders : defaultHeaders;

        // Update the header row
        var headerRow = $('#tableHeaders');
        headerRow.empty();
        headers.forEach(function(header) {
            headerRow.append('<th>' + header + '</th>');
        });
    }
});

function delete_record (id) {
      
      let title = $(".breadcrumb-item").text(); // Get text from .breadcrumb-item
      var table1 = $('#DataTable').DataTable();
      // Set SweetAlert2 dialog content dynamically
      Swal.fire({
          title: 'Are you sure?',
          html: "You won't be able to revert this <strong>" + title + "</strong>!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel'
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: 'POST',
                  url: '<?= base_url('Delete_list') ?>',
                  dataType: 'json',
                  data: {
                      'id': id,
                      'title': title
                  },
                  success: function(response) {
                      if(response.success) {
                          Swal.fire({
                              title: 'Deleted!',
                              html: "The property <strong>" + title + "</strong> has been deleted.",
                              icon: 'success'
                          }).then(() => {
                              // Reload the DataTable to reflect the changes
                              table1.ajax.reload();
                          });
                          $(".swal2-deny").remove();
                          $(".swal2-cancel").remove();
                          // Optionally, refresh the table or remove the deleted item from the DOM
                      } else {
                          Swal.fire({
                              title: 'Error!',
                              html: "Failed to delete the <strong>" + title + " " +response.error + "</strong>.",
                              icon: 'error'
                          });
                          $(".swal2-deny").remove();
                          $(".swal2-cancel").remove();
                      }
                  },
                  error: function() {
                      Swal.fire({
                          title: 'Error!',
                          html: "An error occurred while trying to delete the <strong>" + title + "</strong>.",
                          icon: 'error'
                      });
                      $(".swal2-deny").remove();
                      $(".swal2-cancel").remove();
                  }
              });
          } else if (result.dismiss === Swal.DismissReason.cancel) {
              Swal.fire({
                  title: 'Cancelled',
                  html: "The <strong>" + title + "</strong> is safe.",
                  icon: 'info'
              });
              $(".swal2-deny").remove();
              $(".swal2-cancel").remove();
          }
      });

      $(".swal2-confirm").text("Yes, Delete it");

      $(".swal2-deny").remove();
  }

    function view_record(title,id){

        $("#response_view").html("");
        $.ajax({
        url: '<?= base_url() ?>common/list_controller/view_template',
        type: 'POST',
        data: {title:title,
            id:id
        },
        success: function(response) {
            $("#response_view").html(response);
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: ", status, error);
        }
    });
    $("#pricingModal").modal("toggle");

    }
    
    function print_page() {
    // Get the HTML content of the section to print
    var printSection = $('#response_view').html();
    
    // Replace the body content with the print section
    $('body').html(printSection);

    // Trigger the print dialog
    window.print();

    // Set a timeout to reload the page after printing
    setTimeout(function() {
        // Restore the original body content
        $('body').html(printSection);
        // Reload the page
        window.location.reload();
    }, 100); // Adjust the timeout as needed
}
  

</script>
  
  
  