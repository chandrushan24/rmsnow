<?php 
if (!empty($this->session->userdata('userid'))){
              redirect(base_url('Dashboard'));
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template" data-style="light">

  
<!-- Mirrored from demos.themeselection.com/materio-bootstrap-html-admin-template/html/vertical-menu-template/auth-login-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Jun 2024 21:49:20 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>(RMS) | Real Estate Management Software</title>

    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="../../../../themeselection.com/item/materio-bootstrap-html-admin-template/index.html">
    
    
    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC)
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5DDHKGP');</script> -->
    <!-- End Google Tag Manager -->
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="../../../../fonts.googleapis.com/index.html">
    <link rel="preconnect" href="../../../../fonts.gstatic.com/index.html" crossorigin>
    <link href="../../../../fonts.googleapis.com/css21eba.css?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />
    
    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" /> 
    <!-- Vendor -->
<link rel="stylesheet" href="assets/vendor/libs/%40form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    
</head>

<body>

  
  <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="../../../../www.googletagmanager.com/ns3271.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Content -->

<div class="authentication-wrapper authentication-cover">
  <!-- Logo -->
  <a href="index.html" class="auth-cover-brand d-flex align-items-center gap-3">
    <span class="app-brand-logo demo">
    <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" style="width: 50px; height: 50px;">
</span>
    <span class="app-brand-text demo text-heading fw-semibold">(RMS)</span>
  </a>
  <!-- /Logo -->
  <div class="authentication-inner row m-0">
    <!-- /Left Section -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2">
        <img src="https://smartdemo.in/realestate/assets/img/illustrations/auth-cover-login-illustration-light.png" alt="Paris" width="400" height="300" style="width: fit-content;height: auto;">
      <div>
        <!--<img src="assets/img/illustrations/auth-cover-login-illustration-light.png" class="authentication-image-model d-none d-lg-block" alt="auth-model" data-app-light-img="illustrations/auth-cover-login-illustration-light.png" data-app-dark-img="illustrations/auth-cover-login-illustration-dark.html">-->
      </div>
      <!--<img src="assets/img/illustrations/tree.png" alt="tree" class="authentication-image-tree z-n1">-->
      <!--<img src="assets/img/illustrations/auth-cover-mask-light.png" class="scaleX-n1-rtl authentication-image d-none d-lg-block w-75" alt="triangle-bg" height="362" data-app-light-img="illustrations/auth-cover-mask-light.png" data-app-dark-img="illustrations/auth-cover-mask-dark.html">-->
    </div>
    <!-- /Left Section -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-12 py-4">
      <div class="w-px-400 mx-auto pt-5 pt-lg-0">
        <h4 class="mb-1">Welcome to (RMS) 👋🏻</h4>
        <p class="mb-5">Please sign-in to your account</p>
        <!-- formAuthentication -->
        <form id="" class="mb-5" action="<?php echo base_url('Welcome/authenticate'); ?>" method="post">
          <div class="form-floating form-floating-outline mb-5">
            <input type="text" class="form-control" id="email" name="username" placeholder="Enter your email or username" autofocus>
            <label for="email">Email or Username</label>
          </div>
          <div class="mb-5">
            <div class="form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <label for="password">Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
              </div>
            </div>
          </div>
          <div class="mb-5 d-flex justify-content-between flex-wrap py-2">
            <div class="form-check mb-0">
              <input class="form-check-input" type="checkbox" id="remember-me">
              <label class="form-check-label me-2" for="remember-me">
                Remember Me
              </label>
            </div>
            <a href="auth-forgot-password-cover.html" class="float-end mb-1">
              <span>Forgot Password?</span>
            </a>
          </div>
          <button class="btn btn-primary d-grid w-100">
            Login
          </button>
        </form>

        <!-- <p class="text-center">
          <span>New on our platform?</span>
          <a href="auth-register-cover.html">
            <span>Create an account</span>
          </a>
        </p> -->

        <!-- <div class="divider my-5">
          <div class="divider-text">or</div>
        </div>

        <div class="d-flex justify-content-center gap-2">
          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-facebook">
            <i class="tf-icons ri-facebook-fill ri-24px"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-twitter">
            <i class="tf-icons ri-twitter-fill ri-24px"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-github">
            <i class="tf-icons ri-github-fill ri-24px"></i>
          </a>

          <a href="javascript:;" class="btn btn-icon btn-lg rounded-pill btn-text-google-plus">
            <i class="tf-icons ri-google-fill ri-24px"></i>
          </a>
        </div> -->
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>

<!-- / Content -->

  
  <!-- <div class="buy-now">
    <a href="../../../../themeselection.com/item/materio-bootstrap-html-admin-template/index.html" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
  </div> -->
  

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="assets/vendor/libs/hammer/hammer.js"></script>
  <script src="assets/vendor/libs/i18n/i18n.js"></script>
  <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="assets/vendor/js/menu.js"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="assets/vendor/libs/%40form-validation/popular.js"></script>
<script src="assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
<script src="assets/vendor/libs/%40form-validation/auto-focus.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>
  

  <!-- Page JS -->
  <script src="assets/js/pages-auth.js"></script>
  
</body>


<!-- Mirrored from demos.themeselection.com/materio-bootstrap-html-admin-template/html/vertical-menu-template/auth-login-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Jun 2024 21:49:24 GMT -->
</html>

<!-- beautify ignore:end -->

