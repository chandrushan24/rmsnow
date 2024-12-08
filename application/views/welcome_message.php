<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Content wrapper -->
<div class="content-wrapper">

  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-6">
      <div class="col-xl-12 col-lg-7 align-self-end mt-md-7 mt-lg-4 pt-md-2 pt-lg-0">
        <div class="card" style="background: linear-gradient(135deg, #f0f9ff, #d4edfd);">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="card-body">
                <h4 class="card-title mb-9 text-truncate"><span class="fw-bold">DASHBOARD</span></h4>
              </div>
              <div class="row m-0" style="padding: inherit;">
                <div class="col-sm-5 " style="padding: 13px;">
                  <select class="select2 form-select" id="property_name_input" name="property_name_input" data-allow-clear="true">
                    <option value="" selected disabled>Select Nager / Garden</option>
                    <?php if(!empty($propert_list)){ 
                      foreach($propert_list as $val){ ?>
                        <option value="<?php echo $val['property_id'];?>"><?php echo $val['property_name'];?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-5 pull-right " style="padding: 13px;">
                  <input type="text" id="daterange" name="daterange" class="daterange form-control input-group" placeholder="Choose Date Range" value="" autocomplete="off">
                </div>
              </div>
              <div class="col-sm-4 m-5">
                <button class="btn btn-sm btn-success" id="filter_nagar">Filter</button>
                <button class="btn btn-sm btn-danger" id="reset_nagar">Reset</button>
              </div>
            </div>
            <div class="col-12 col-md-6 position-relative text-center">
              <img src="<?= base_url() ?>assets/img/illustrations/illustration-john-2.png" class="card-img-position bottom-0 w-100 end-0 scaleX-n1-rtl" alt="View Profile">
            </div>
          </div>
        </div>
      </div>

      <!-- Four Cards -->
      <div class="col-xl-12 col-md-12">
        <div class="row gy-4">
          <!-- Total Profit line chart -->
          <div class="col-sm-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #68bcfb, #68bcfb);">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar">
                      <span class="avatar-initial rounded-circle bg-label-success"><i class="ri-pie-chart-2-line"></i></span>
                    </div>
                  </div>
                  <h6><b>Total Plots ( <span id="Total_Plot">0 </span> )</b></h6>
                </div>
              </div>
            </div>
          </div>
          <!--/ Total Profit line chart -->
          <!-- Total Profit Weekly Project -->
          <div class="col-sm-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #eda0a0, #eda0a0);">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar">
                      <span class="avatar-initial rounded-circle bg-label-success"><i class="ri-pie-chart-2-line"></i></span>
                    </div>
                  </div>
                  <h6><b>Total Unregister Plots ( <span id="Total_Unreg_Plot">0 </span> )</b></h6>
                </div>
              </div>
            </div>
          </div>
          <!--/ Total Profit Weekly Project -->
          <!-- New Yearly Project -->
          <div class="col-sm-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #24e6a4, #24e6a4);">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar">
                      <span class="avatar-initial rounded-circle bg-label-success"><i class="ri-pie-chart-2-line"></i></span>
                    </div>
                  </div>
                  <h6><b>Total Registered Plots ( <span id="Total_Reg_Plot">0 </span> )</b></h6>
                </div>
                <h2 class="mb-0 me-2" style="text-align: right;" id="Total_Reg_Amount">&#8377;0</h2>
              </div>
            </div>
          </div>
          <!--/ New Yearly Project -->
          <!-- New Yearly Project -->
          <div class="col-sm-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #fdba3a, #fdba3a);">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar">
                      <span class="avatar-initial rounded-circle bg-label-success"><i class="ri-pie-chart-2-line"></i></span>
                    </div>
                  </div>
                  <h6><b>Total Booked Plots ( <span id="Total_Booked_Plot">0 </span> )</b></h6>
                </div>
                <h2 class="mb-0 me-2" style="text-align: right;" id="Total_Booked_Amount">&#8377;0</h2>
              </div>
            </div>
          </div>
          <!--/ New Yearly Project -->
        </div>
      </div>
      <!--/ four cards -->

      <!-- Weekly Overview Chart -->
      <div class="col-xl-6 col-md-6">
        <div class="card overflow-hidden" style="height:500px;">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5 class="mb-1">Plot Overview</h5>
            </div>
          </div>
          <div class="card-body">
            <div id="pie_chart_overview"></div>
          </div>
        </div>
      </div>

      <!-- Weekly Overview Chart -->
      <div class="col-xl-6 col-md-6">
        <div class="card overflow-hidden" style="height:500px;">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5 class="mb-1">Amount Overview</h5>
            </div>
          </div>
          <div class="card-body">
            <div id="bar_chart_overview"></div>
          </div>
        </div>
      </div>

      <!-- Weekly Overview Chart -->
      <div class="col-xl-12 col-md-6">
        <div class="card overflow-hidden" style="height:500px;">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5 class="mb-1">Nagar / Garden Overview</h5>
            </div>
          </div>
          <div class="card-body">
            <div id="weeklyOverviewChart_me"></div>
          </div>
        </div>
      </div>
      <!--/ Weekly Overview Chart -->

      <!-- Data Tables -->
      <div class="col-xl-6 col-md-6">
        <div class="card overflow-hidden" style="height:500px;">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5 class="mb-1">REGISTER PLOTS</h5>
              <a class="pull-right" title="Visit Plots" href="<?= base_url() ?>reg_plot"><i class="ri-edit-box-line text-primary ri-22px me-2"></i></a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th class="text-truncate">Nagar /Garden Name</th>
                  <th class="text-truncate">Plot No</th>
                  <th class="text-truncate">Buyer Name</th>
                </tr>
              </thead>
              <tbody id="Register_plot_list">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/ Data Tables -->

      <!-- Data Tables -->
      <div class="col-xl-6 col-md-6">
        <div class="card overflow-hidden" style="height:500px;">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5 class="mb-1">UNREGISTER PLOTS</h5>
              <a class="pull-right" title="Visit Plots" href="<?= base_url() ?>unreg_plot"><i class="ri-edit-box-line text-primary ri-22px me-2"></i></a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th class="text-truncate">Nagar /Garden Name</th>
                  <th class="text-truncate">Plot No</th>
                </tr>
              </thead>
              <tbody id="UnRegister_plot_list">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/ Data Tables -->

      <!-- Data Tables -->
      <div class="col-xl-6 col-md-6">
        <div class="card overflow-hidden" style="height:500px;">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5 class="mb-1">BOOKED PLOTS</h5>
              <a class="pull-right" title="Visit Plots" href="<?= base_url() ?>booked_plot"><i class="ri-edit-box-line text-primary ri-22px me-2"></i></a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th class="text-truncate">Nagar /Garden Name</th>
                  <th class="text-truncate">Plot No</th>
                  <th class="text-truncate">Buyer Name</th>
                </tr>
              </thead>
              <tbody id="Booked_plot_list">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/ Data Tables -->
    </div>
  </div>
</div>
          <!-- / Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".dash").addClass("active");
          // ********select 2 ***************
          var o = $("#property_name_input");
          select2Focus(o);
          o.wrap('<div class="position-relative"></div>');
          o.select2({ placeholder: "Select Nagar / Garden", dropdownParent: o.parent() });
          // ********select 2 ***************

          var o = $("#name_ref_by_input");
            select2Focus(o);
            o.wrap('<div class="position-relative"></div>');
            o.select2({ placeholder: "Select Employee", dropdownParent: o.parent() });
          // ********select 2 ***************
 
           
           //call chart
           Pie_Chart_For_Plots(null,null);
           Bar_Chart_For_Plots(null,null);
           All_Plot_Bar_Chart_For_Plots(null,null);
           All_Register_Plot_list(null,null);
           All_Un_Register_Plot_list(null,null);
           All_Booked_Plot_list(null,null);
         
           //filter
           $('#filter_nagar').on('click',function() {
          const property_id = $('#property_name_input').val();
          const date_filter = $('#daterange').val();
          Pie_Chart_For_Plots(property_id,date_filter);
          Bar_Chart_For_Plots(property_id,date_filter);
          All_Plot_Bar_Chart_For_Plots(property_id,date_filter);
          All_Register_Plot_list(property_id,date_filter);
           All_Un_Register_Plot_list(property_id,date_filter);
           All_Booked_Plot_list(property_id,date_filter);
          });

          $('#reset_nagar').on('click',function() {
          $('#property_name_input').val('').trigger('change');
          $('#daterange').val('');
           Pie_Chart_For_Plots(null,null);
           Bar_Chart_For_Plots(null,null);
           All_Plot_Bar_Chart_For_Plots(null,null);
           All_Register_Plot_list(null,null);
           All_Un_Register_Plot_list(null,null);
           All_Booked_Plot_list(null,null);
          });

            });

        function All_Un_Register_Plot_list(id,date_filter){
          $.ajax({
        url: '<?= base_url() ?>Welcome/Get_all_Unregister_list', 
        method: 'GET',
        data:{id:id,date_filter:date_filter},
        dataType: 'json',
        success: function(response) {
          $('#UnRegister_plot_list').html(response);
        },
        error: function(err) {
          console.log('Error fetching data', err);
        }
      });
     }


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
          //   updateExportUrls('DateRange');
          //   var selectedOption = $(this).val();
          //  var isDefault = (selectedOption !== '');
          //  // Update the headers based on the selection
          //  updateHeaders(isDefault);

          //  table1.ajax.reload();

          });

          $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        // updateExportUrls('DateRange');
        // var selectedOption = $(this).val();
        // var isDefault = (selectedOption !== '');
        // // Update the headers based on the selection
        // updateHeaders(isDefault);

        //   table1.ajax.reload();

          });


        function All_Booked_Plot_list(id,date_filter){
          $.ajax({
        url: '<?= base_url() ?>Welcome/Get_all_Booked_list', 
        method: 'GET',
        data:{id:id,date_filter:date_filter},
        dataType: 'json',
        success: function(response) {
          $('#Booked_plot_list').html(response);
        },
        error: function(err) {
          console.log('Error fetching data', err);
        }
        });
      }
        function All_Register_Plot_list(id,date_filter){
        $.ajax({
        url: '<?= base_url() ?>Welcome/Get_all_Registered_list', 
        method: 'GET',
        data:{id:id,date_filter:date_filter},
        dataType: 'json',
        success: function(response) {
          $('#Register_plot_list').html(response);
        },
        error: function(err) {
          console.log('Error fetching data', err);
        }
      });
    }
            
          function Pie_Chart_For_Plots(id,date_filter){
            var options = {
          series: [], 
          chart: {
            height: 350,
            type: 'radialBar',
          },
          plotOptions: {
            radialBar: {
              dataLabels: {
                name: {
                  fontSize: '22px',
                },
                value: {
                  fontSize: '16px',
                },
                total: {
                  show: true,
                  label: 'Total',
                  formatter: function (w) {
                    return w.globals.seriesTotals[0]; 
                  }
                }
              }
            }
          },
          labels: ['Total Plots','Unregister Plots','Register Plots','Booked Plots'],
        };
        $('#pie_chart_overview').html('');
        var chart = new ApexCharts(document.querySelector("#pie_chart_overview"), options);
        chart.render();
      
        $.ajax({
        url: '<?= base_url() ?>Welcome/Get_all_Plots_Category_Count', 
        method: 'GET',
        data:{id:id,date_filter:date_filter},
        dataType: 'json',
        success: function(response) {
          var newSeries = response.data;
          var newSeries1 = response.amount;
          $('#Total_Plot').html(newSeries[0]);
          $('#Total_Unreg_Plot').html(newSeries[1]);
          $('#Total_Reg_Plot').html(newSeries[2]);
          $('#Total_Booked_Plot').html(newSeries[3]);
          
          $('#Total_Reg_Amount').html('&#8377;' +newSeries1[0]);
          $('#Total_Booked_Amount').html('&#8377;' +newSeries1[1]);

          chart.updateOptions({
            series: newSeries,
          });
        },
        error: function(err) {
          console.log('Error fetching data', err);
        }
      });

      }

        function  Bar_Chart_For_Plots(id,date_filter){

          var options = {
          series: [],
          chart: {
          type: 'bar',
          height: 350
        },
          plotOptions: {
        bar: {
        borderRadius: 4,
        borderRadiusApplication: 'end',
        horizontal: true,
        dataLabels: {
          position: 'top' // Show the labels at the end of the bars
        }
      }
     },
      dataLabels: {
        enabled: true,
        formatter: function (val) {
          return val; // Show the value inside the data label
        },
        offsetX: 0,
        style: {
          fontSize: '11px',
          colors: ['#000'] // Adjust color to ensure it contrasts well with your chart
        }
      },
        xaxis: {
          categories: [],
        },
        tooltip: {
        y: {
          // Remove series name from tooltip
          title: {
            formatter: function() {
              return '&#8377;'; // Leave empty to avoid showing "series-1"
            }
          }
        }
      }
        };
        $('#bar_chart_overview').html('');
        var chart = new ApexCharts(document.querySelector("#bar_chart_overview"), options);
        chart.render();          


        $.ajax({
          url: '<?= base_url() ?>Welcome/Get_all_Nager_garden_Amount', 
          method: 'GET',
          data:{id:id,date_filter:date_filter},
          dataType: 'json',
          success: function(response) {
            var responces = response.data;
            var labels = responces.map(item => item[0]); 
            var total_amount = responces.map(item => item[1]); 
            chart.updateOptions({
              xaxis: {
                categories: labels 
              },
              series: [{
                data: total_amount 
              }]
            });
          },
          error: function(err) {
            console.log('Error fetching data', err);
          }
        });


          }

        function All_Plot_Bar_Chart_For_Plots(id,date_filter){

          var options = {
          series: [{
            name: 'Total Plots',
            data: []
          }, {
            name: 'Unregister Plots',
            data: []
          }, {
            name: 'Register Plots',
            data: []
          },{
            name: 'Booked Plots',
            data: []
          }],
          chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            }
          },
          dataLabels: {
            enabled: true
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: [] // Will be updated dynamically
          },
          yaxis: {
            title: {
              text: 'Plot Count'
            }
          },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function (val) {
                return val + " Plots"
              }
            }
          }
        };
        $('#weeklyOverviewChart_me').html('');
        var chart = new ApexCharts(document.querySelector("#weeklyOverviewChart_me"), options);
        chart.render();

        $.ajax({
          url: '<?= base_url() ?>Welcome/Get_all_Nager_garden_Count', 
          method: 'GET',
          data:{id:id,date_filter:date_filter},
          dataType: 'json',
          success: function(response) {
            console.log(response);
            var responces = response.data;
            var labels = responces.map(item => item[0]); 
            
            var totalplotData = responces.map(item => item[1]);
            var unregData = responces.map(item => item[2]);
            var regData = responces.map(item => item[3]);
            var bookedData = responces.map(item => item[4]);

            chart.updateOptions({
              xaxis: {
                categories: labels 
              },
              series: [{
                name: 'Total Plots',
                data: totalplotData 
              }, {
                name: 'Unregister Plots',
                data: unregData 
              }, {
                name: 'Registered Plots',
                data: regData 
              },{
                name: 'Booked Plots',
                data: bookedData 
              }]
            });
          },
          error: function(err) {
            console.log('Error fetching data', err);
          }
        });

        }
        </script>


          
