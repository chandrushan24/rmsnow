<style>
    .dataTables_info{
        font-size: smaller;
        padding: 20px;
        margin-left: -19px;
    }
    .pagination{
        margin-left: -56px;
        padding: 8px;
    }
    #example_filter{
        margin-left: 103px;
    }
</style>
<script src="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"></script>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
  <div class="col-xl">
    <div class="card mb-5">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Expense List</h5> <small class="text-body float-end">Double Click To Edit</small>
      </div>
      <div class="card-body">
      <table id="example" class="table table-striped" style="width:100%">
        <thead>
              <tr>
                <th>Expense Name</th>
                <th>Expense Description</th>
                <th>ID</th>
            </tr>
        </thead>
        
    </table>
      </div>
    </div>
  </div>




  <div class="col-xl">
    <div class="card mb-7">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Expenses</h5>
        <small class="text-body float-end">Merged input group</small>
      </div>
      <div class="card-body">
        
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ri-user-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
            <input type="hidden" id="expen_id" value="">
              <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Fuel charges" >
              <label for="basic-icon-default-fullname">Name</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-message2" class="input-group-text"><i class="ri-chat-4-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <textarea id="basic-icon-default-message" class="form-control" placeholder="Enter Remarks" style="height: 60px;"></textarea>
              <label for="basic-icon-default-message">Description</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit" >Submit</button>
        
      </div>
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
         $(".exp_mas").addClass("active");
         get_expense();

$('#submit').on('click', function() {
           let expen_id = $('#expen_id').val();
           let expen_name = $('#basic-icon-default-fullname').val();
           let expen_description = $('#basic-icon-default-message').val();
           

           $.ajax({
             type:'POST',
             url:'<?php echo base_url('set_expense') ?>',
             dataType:'json',
             data:{
               'expen_id': expen_id,
               'expen_name': expen_name,
               'expen_description': expen_description,
             },
             success:function(data){ 
                 // Handle success response
                 Swal.fire({
                     icon: 'success',
                     title: 'Success',
                     text: 'Company data saved successfully!'
                 }).then((result) => {
                        $('#expen_id').val('');
                        $('#basic-icon-default-fullname').val('');
                        $('#basic-icon-default-message').val('');  
                         var table1 = $('#example').DataTable();
                         table1.ajax.reload();
                         $('#submit').text("Submit");
                 });
                 $(".swal2-deny").remove();
                 $(".swal2-cancel").remove();
             }
           });
   });
});
function get_expense() {
       var table1 = $('#example').DataTable({
           "ajax": {
               "url": "<?php echo base_url('get_expense') ?>",
               "type": "POST",
               "dataSrc": "data"
           },
           "columns": [
               { "data": "expen_name" },
               { "data": "expen_description" },
               { "data": "expen_id" }
           ],
           "columnDefs": [
               {
                   "targets": [2], // The comid column index
                   "visible": false, // Hide the comid column
                   "searchable": false // Ensure it is not searchable
               }
           ]
       });

       console.log("DataTable initialized");

       $('#example tbody').on('dblclick', 'tr', function() {
         $('#submit').text("Update");
           var data = table1.row(this).data(); // Get the data for the clicked row
           var id = data.expen_id; // Access the hidden comid field
           
           $('#expen_id').val(id);
           $('#basic-icon-default-fullname').val(data.expen_name);
           $('#basic-icon-default-message').val(data.expen_description);           
       });
   }

   // Call the get_expense function to initialize the DataTable
   get_expense();
</script>