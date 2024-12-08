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
        <h5 class="mb-0">Role Category</h5> <small class="text-body float-end">Double Click To Edit</small>
      </div>
      <div class="card-body">
      <table id="example" class="table table-striped" style="width:100%">
        <thead>
              <tr>
                <th>Role Name</th>
                <th>Incentive in %</th>
                <th>ID</th>
                <th>Order</th>
                <th>Action</th>
            </tr>
        </thead>
        
    </table>
      </div>
    </div>
  </div>




  <div class="col-xl">
    <div class="card mb-7">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Roles</h5>
        <small class="text-body float-end">Merged input group</small>
      </div>
      <div class="card-body">
        
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-role2" class="input-group-text"><i class="ri-user-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
            <input type="hidden" id="role_id" value="">
              <input type="text" class="form-control" id="basic-icon-default-role" placeholder="Enter Role Name" required>
              <label for="basic-icon-default-role">Role Name</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-role2" class="input-group-text"><i class="ri-discount-percent-line ri-20px percent "></i></span>
            <div class="form-floating form-floating-outline">
               <input type="number" class="form-control" id="basic-icon-default-commision" placeholder="Enter Commission in (%)" min="0" max="100" required>
              <label for="basic-icon-default-role">Incentive in (%)</label>
            </div>
          </div>

          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-role2" class="input-group-text"><i class="ri-calendar-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
               <input type="number" class="form-control" id="role_order" placeholder="Enter Order" min="0" max="100" required>
              <label for="basic-icon-default-role">Role Order</label>
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
         $(".role_mas").addClass("active");
         get_role();

$('#submit').on('click', function() {

           let role_id = $('#role_id').val();
           let role_name = $('#basic-icon-default-role').val();
           let com_in_percent = $('#basic-icon-default-commision').val();
           let role_order = $('#role_order').val();
           if(role_name == '' || com_in_percent == '' || role_order == ''){
                if(role_name == ''){
                  $(".ri-user-line").css("color", "red");
                  $('#basic-icon-default-role').focus();
                }
                if(com_in_percent == ''){
                  $(".percent").css("color", "red");
                  $('#basic-icon-default-commision').focus();
                }
                if(role_order == ''){
                  $(".ri-calendar-line").css("color", "red");
                  $('#role_order').focus();
                }
           }else{
           $.ajax({
             type:'POST',
             url:'<?php echo base_url('set_roles') ?>',
             dataType:'json',
             data:{
               'role_id': role_id,
               'role_name': role_name,
               'role_order': role_order,
               'com_in_percent': com_in_percent,
             },
             success:function(data){ 
                 // Handle success response
                 Swal.fire({
                     icon: 'success',
                     title: 'Success',
                     text: data.message
                 }).then((result) => {
                        $('#role_id').val('');
                        $('#basic-icon-default-role').val('');
                        $('#basic-icon-default-commision').val('');  
                        $('#role_order').val('');
                        
                         var table1 = $('#example').DataTable();
                         table1.ajax.reload();
                         $('#submit').text("Submit");
                 });
                 $(".swal2-deny").remove();
                 $(".swal2-cancel").remove();
             }
           });
          }
   });
});
function get_role() {
       var table1 = $('#example').DataTable({
           "ajax": {
               "url": "<?php echo base_url('get_roles') ?>",
               "type": "POST",
               "dataSrc": "data"
           },
           "columns": [
               { "data": "role_name" },
               {
                 "data": "com_in_percent",
                 "render": function(data, type, row) {
                   return data + '%';
                 }
               },
               { "data": "role_id" },
               { "data": "role_order" },
                {
                  "data": null,
                  "render": function(data, type, row) {
                    return '<button class="btn btn-danger btn-sm confirm-color" data-role-id="' + row.role_id + '"><i class="ri-delete-bin-fill"></i></button>';
                  }
                }
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
           var id = data.role_id; // Access the hidden comid field
           
           $('#role_id').val(id);
           $('#basic-icon-default-role').val(data.role_name);
           $('#role_order').val(data.role_order);
           $('#basic-icon-default-commision').val(data.com_in_percent);           
       });
       $('#example tbody').on('click', 'button.confirm-color', function() {

    var roleId = $(this).data('role-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform delete operation using roleId
            $.ajax({
                url: '<?php echo base_url('Delete_roles') ?>', // Replace with your delete endpoint
                type: 'POST',
                data: { role_id: roleId },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status === 'success') {
                        Swal.fire(
                            'Deleted!',
                            data.message,
                            'success'
                        );
                        $(".swal2-deny").remove();
                        $(".swal2-cancel").remove();
                        $('#example').DataTable().ajax.reload(); // Reload the DataTable
                    } else {
                        Swal.fire(
                            'Error!',
                            'Failed to delete role: ' + data.message,
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error!',
                        'AJAX Error: ' + error,
                        'error'
                    );
                }
            });
        }
    });
    $(".swal2-deny").remove();

});

      }
    
   // Call the get_role function to initialize the DataTable
  //  get_role();
</script>