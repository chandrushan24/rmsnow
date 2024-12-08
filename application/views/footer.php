
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<?php if($this->session->userdata('message') == '0'){ ?>
<!-- Anchor tag to trigger the modal -->
<a href="javascript:void(0);" class="float1 " data-bs-toggle="modal" data-bs-target="#popupModal">
  <i class="fa fa-gift my-float1 animate__animated animate__shakeX"></i>
</a>
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <!-- Card HTML -->
        <style type="text/css">
            .animate__heartBeat {
              -webkit-animation-name: heartBeat;
              animation-name: heartBeat;
              -webkit-animation-duration: 1.3s;
              animation-duration: 1.3s;
              -webkit-animation-timing-function: ease-in-out;
              animation-timing-function: ease-in-out;
              -webkit-animation-iteration-count: infinite; /* Ensure the animation loops infinitely */
              animation-iteration-count: infinite; /* Ensure the animation loops infinitely */
            }
            .cardb {
              position: relative;
              width: 300px;
              height: 425px;
              border: 10px solid #9612eb;
              margin: 0px auto 0 auto;
              box-shadow: inset 10px 0px 15px 0px rgba(0, 0, 0, 0.1);
              background-image: linear-gradient(to bottom, rgba(255, 255, 255), rgba(255, 255, 255, 0.5)), url("https://images.unsplash.com/photo-1527481138388-31827a7c94d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60");
              background-position: center;
              /* Center the image */
              background-repeat: no-repeat;
              /* Do not repeat the image */
              background-size: cover;
              background-color: #e6f0e6;
            }

            .cardb .text-containerb {
              width: 80%;
              height: 80%;
              margin: auto;
            }

            .cardb .text-containerb #headb {
              font-family: 'Nobile', sans-serif;
              font-size: 1.5em;
              margin: 60px auto 60px auto;
            }

            .cardb p {
              font-size: 1.1em;
              line-height: 1.4;
              font-family: 'Nobile';
              color: #331717;
              font-style: italic;
              text-align: center;
              margin: 15px auto 0px auto;
            }

            .cardb .frontb {
              position: absolute;
              width: 100%;
              height: 100%;
              margin: -10px 0px 0px -10px;
              border: 10px solid #9612eb;
              backface-visibility: hidden;
              background-color: #9612eb;
              /* background-image: url($cover-image);
          */
              background-size: contain;
              transform-style: preserve-3d;
              transform-origin: 0% 50%;
              transform: perspective(800px) rotateY(0deg);
              transition: all 0.8s ease-in-out;
            }

            .cardb:hover .frontb {
              transform: perspective(800px) rotateY(-170deg);
              background-color: #41718d;
            }

            .cardb:hover .backb {
              transform: perspective(800px) rotateY(-170deg);
              box-shadow: 7px 0px 5px 0px rgba(0, 0, 0, 0.3), inset 2px 0px 15px 0px rgba(0, 0, 0, 0.1);
              background-color: #d2dcd2;
            }

            .cardb .backb {
              position: absolute;
              width: 100%;
              height: 100%;
              border: 10px solid #9612eb;
              margin: -10px 0px 0px -10px;
              backface-visibility: visible;
              filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, .5));
              transform-style: preserve-3d;
              transform-origin: 0% 50%;
              transform: perspective(800px) rotateY(0deg);
              transition: all 0.8s ease-in-out;
              background-color: #e6f0e6;
              box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.1);
            }

            .imgsetb {
              position: relative;
              z-index: 1;
              margin-bottom: -215px;
            }

            .imgsetb img {
                  box-shadow: 0px 6px 11px 7px rgba(0, 0, 0, 0.22);
                  border-radius: 5px;
                  filter: hue-rotate(353deg);
            }
        </style>
        <div class="cardb">
          <div class="backb" style="box-sizing: content-box;"></div>
          <div class="frontb" style="box-sizing: content-box;">
            <div class="imgsetb">
              <img width="100%" src="https://1.bp.blogspot.com/-Mgj9-rbs65E/XfMoPSD5gtI/AAAAAAAAURk/NBokE2gSS2cTSJ2em5lZ5hJDuTtRN7UVwCLcBGAsYHQ/s1600/2713997.png">
            </div>
          </div>
          <div class="text-containerb">
            <p id="headb">Happy Birthday!</p>
            <h6>From AGP PREMIER GROUPS to You</h6>
            <p>Wishing you a very happy birthday! May your special day be filled with happiness, love, and fun—you truly deserve it all.</p>
            <p>Enjoy every moment, and we hope your day is fantastic!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
      <div class="text-body mb-2 mb-md-0">
        © <script>
        document.write(new Date().getFullYear())

        </script>, made by <a href="https://mapwalks.com/" target="_blank" class="footer-link">Mapwalks</a>
      </div>
      <!-- <div class="d-none d-lg-inline-block">
        
        <a href="<?php echo base_url(); ?>themeselection.com/license/index.html" class="footer-link me-4" target="_blank">License</a>
        <a href="<?php echo base_url(); ?>themeselection.com/index.html" target="_blank" class="footer-link me-4">More Themes</a>
        
        <a href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>
        
        
        <a href="../../../../themeselection.com/support/index.html" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
        
      </div> -->
    </div>
  </div>
</footer>
<!-- / Footer -->

          
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    
    
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
    
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    
  </div>
  <!-- / Layout wrapper -->
  
<script>
  $(document).ready(function() {
  setTimeout(function() {
    $('.float1').removeClass('animate__shakeX').addClass('animate__heartBeat');
  }, 1000);
});
</script>t
  

  <!-- Core JS -->
  <!-- build:js <?php echo base_url(); ?>assets/vendor/js/core.js -->
  <script src="<?php echo base_url(); ?>assets/vendor/libs/jquery/jquery.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/hammer/hammer.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/i18n/i18n.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?php echo base_url(); ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <!-- Page JS -->
    <script src="<?php echo base_url(); ?>assets/js/tables-datatables-advanced.js"></script>
<script src="<?=base_url()?>/assets/vendor/libs/select2/select2.js"></script>
  

  <!-- Page JS -->
  <script src="<?php echo base_url(); ?>assets/js/dashboards-analytics.js"></script>
  
</body>


<!-- Mirrored from demos.themeselection.com/materio-bootstrap-html-admin-template/html/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Jun 2024 21:43:52 GMT -->
</html>

<!-- beautify ignore:end -->
<?php 
$message = $this->session->userdata('message');
if($message){ ?>
<script>
  const modalTrigger = new bootstrap.Modal(document.getElementById('popupModal'));
  modalTrigger.show();
</script>
<?php
  $this->session->unset_userdata('message');
  $this->session->set_userdata('message', 0);
}
?> 

