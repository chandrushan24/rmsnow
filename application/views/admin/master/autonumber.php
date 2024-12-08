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
        <h5 class="mb-0">Sequence List</h5> <small class="text-body float-end">Double Click To Edit</small>
      </div>
      <div class="card-body">
      <table id="example" class="table table-striped" style="width:100%">
        <thead>
              <tr>
                <th>Module Name</th>
                <th>Sequence prefix</th>
                <th>Sequence Number</th>
                <th>Sequence Suffix</th>
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
        <h5 class="mb-0">Sequence</h5>
        <small class="text-body float-end">Merged input group</small>
      </div>
      <div class="card-body">
        
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ri-pages-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
            <input type="hidden" id="autoid" value="">
              <input type="text" class="form-control" id="basic-icon-default-pagename" placeholder="Enter Page Name" >
              <label for="basic-icon-default-fullname">Page Name</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ri-arrow-left-s-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="basic-icon-default-prefix" placeholder="Enter Prefix" >
              <label for="basic-icon-default-fullname">Prefix</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ri-file-add-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="number" class="form-control" id="basic-icon-default-seq" placeholder="Enter Sequence" >
              <label for="basic-icon-default-fullname">Sequence Number</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ri-arrow-right-s-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="basic-icon-default-suffix" placeholder="Enter Suffix" >
              <label for="basic-icon-default-fullname">Suffix</label>
            </div>
          </div>
          <div class="input-group input-group-merge mb-6">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ri-arrow-right-s-line ri-20px"></i></span>
            <div class="form-floating form-floating-outline">
              <input type="text" class="form-control" id="basic-icon-default-digit" placeholder="Enter digit (0-9)" >
              <label for="basic-icon-default-fullname">No of Digits</label>
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
         $(".seq_mas").addClass("active");
         get_seq();

$('#submit').on('click', function() {
           let autoid = $('#autoid').val();
           let process = $('#basic-icon-default-pagename').val();
           let prefix = $('#basic-icon-default-prefix').val();           
           let seqno = $('#basic-icon-default-seq').val();           
           let suffix = $('#basic-icon-default-suffix').val(); 
           let digit = $('#basic-icon-default-digit').val();

           $.ajax({
             type:'POST',
             url:'<?php echo base_url('set_seq') ?>',
             dataType:'json',
             data:{
               'autoid': autoid,
               'process': process,
               'prefix': prefix,
               'seqno': seqno,
               'suffix': suffix,
               'digit' : digit
             },
             success:function(data){ 
                 // Handle success response
                 Swal.fire({
                     icon: 'success',
                     title: 'Success',
                     text: 'Autonumber saved successfully!'
                 }).then((result) => {
                        $('#autoid').val('');
                        $('#basic-icon-default-pagename').val(' ');
                        $('#basic-icon-default-prefix').val(' ');           
                        $('#basic-icon-default-seq').val(' ');           
                        $('#basic-icon-default-suffix').val(' ');  
                        $('#basic-icon-default-digit').val(' ');  
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
function get_seq() {
       var table1 = $('#example').DataTable({
           "ajax": {
               "url": "<?php echo base_url('get_seq') ?>",
               "type": "POST",
               "dataSrc": "data"
           },
           "columns": [
               { "data": "process" },
               { "data": "prefix" },
               { "data": "seqno" },
               { "data": "suffix" },
               { "data": "autoid" }
           ],
           "columnDefs": [
               {
                   "targets": [4], // The comid column index
                   "visible": false, // Hide the comid column
                   "searchable": false // Ensure it is not searchable
               }
           ]
       });

       console.log("DataTable initialized");

       $('#example tbody').on('dblclick', 'tr', function() {
         $('#submit').text("Update");
           var data = table1.row(this).data(); // Get the data for the clicked row
           var id = data.autoid; // Access the hidden comid field
           
           $('#autoid').val(id);
           $('#basic-icon-default-pagename').val(data.process);
           $('#basic-icon-default-prefix').val(data.prefix);           
           $('#basic-icon-default-seq').val(data.seqno);           
           $('#basic-icon-default-suffix').val(data.suffix);           
           $('#basic-icon-default-digit').val(data.no_of_digit);           
       });
   }

   // Call the get_seq function to initialize the DataTable
   get_seq();
</script>