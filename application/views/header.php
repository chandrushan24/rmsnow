<?php 
if (empty($this->session->userdata('userid'))){
              redirect(base_url());
}
$user_id = $this->session->userdata('userid');
$user_name = $this->session->userdata('username');
$role = $this->session->userdata('role');
$comid = $this->session->userdata('comp_id');
$logo = $this->session->userdata('logo');
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template" data-style="light">

  

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>RMS</title>

  
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?><?php $logo; ?>">

  <!-- Fonts -->
  <link rel="preconnect" href="../../../../fonts.googleapis.com/index.html">
  <link rel="preconnect" href="../../../../fonts.gstatic.com/index.html" crossorigin="">
  <link href="../../../../fonts.googleapis.com/css21eba.css?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/remixicon/remixicon.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/flag-icons.css">
  
  <!-- Menu waves for no-customizer fix -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/node-waves/node-waves.css">

  <!-- Core CSS -->
  
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css">
  
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/typeahead-js/typeahead.css"> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/sweetalert2/sweetalert2.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/select2/select2.css" />
  <link rel="stylesheet" href="<?=base_url()?>/assets/vendor/libs/dropzone/dropzone.css" />
  

  <!-- Page CSS -->
  

  <!-- Helpers -->
  <script src="<?php echo base_url(); ?>assets/vendor/js/helpers.js"></script><style type="text/css">
.layout-menu-fixed .layout-navbar-full .layout-menu,
.layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
top: 64px !important;
}
.layout-page {
padding-top: 64px !important;
}
.content-wrapper {
padding-bottom: 52.625px !important;
}
/* .menu-item {
  width: fit-content !important;
  white-space: normal !important;
} */
.menu-vertical .menu-item .menu-link>div:not(.badge) {
  white-space: normal !important;
}
.float1{
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    right: 40px;
    background-color: #9c6fffd6;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 7px #999;
    z-index: 100;
}
.float1:hover {
  color: #9c6fffd6;
  background-color: #FFF;
}

.my-float1{
	margin-top:16px;
}
</style>
 
  <script src="<?php echo base_url(); ?>assets/js/config.js"></script><link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/rtl/core.css" class="template-customizer-core-css"><link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</head>
<body>

  
  <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="../../../../www.googletagmanager.com/ns3271.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">

    
    




<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  
  <div class="app-brand demo ">
    <a href="<?php echo base_url(); ?>" class="app-brand-link">
      <span class="app-brand-logo demo me-1">
      <img src="<?php echo base_url(); ?><?php echo $logo; ?>" alt="logo" style="width: 50px; height: 50px;">
</span>
      <span class="app-brand-text demo menu-text fw-semibold ms-2">(RMS)</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="menu-toggle-icon d-xl-block align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  
  
  <ul class="menu-inner py-1">
    <!-- <li class="menu-header mt-7">
      <span class="menu-header-text" data-i18n="Dashboard">Dashboard</span>
    </li> -->
    <li class="menu-item dash">
      <a href="<?php echo base_url(); ?>" class="menu-link">
        <i class="menu-icon tf-icons ri-home-smile-line"></i>
        <div>Dashboard</div>
      </a>
    </li>
    <!-- Dashboards -->
    <?php //if($role == 'superAdmin' || $role == 'admin' || $role == 'manager'){?>
    <!-- <li class="menu-header mt-7">
      <span class="menu-header-text" data-i18n="Process">Process</span>
    </li> -->
    <li class="menu-item prop">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ri-building-2-line"></i>
        <div>Nagar/Garden</div>
      </a>
      <ul class="menu-sub">
      <?php //if($role == 'superAdmin' || $role == 'admin'){ ?>
        <li class="menu-item prop_page">
          <a href="<?php echo base_url('Property'); ?>" class="menu-link">
            <div>Nagar/Garden Profile</div>
          </a>
        </li>
        <li class="menu-item reg_plot">
          <a href="<?php echo base_url('reg_plot'); ?>" class="menu-link">
            <div>Sold/Registered plot</div>
          </a>
        </li>
        <li class="menu-item unreg_plot">
          <a href="<?php echo base_url('unreg_plot'); ?>" class="menu-link">
            <div>Unsold/Unregistered Plot</div>
          </a>
        </li>
        <li class="menu-item booked_plot">
          <a href="<?php echo base_url('booked_plot'); ?>" class="menu-link">
            <div>Booked Plots</div>
          </a>
        </li>
        <?php //} ?>
      </ul>
    </li>
    <?php //} ?>
    <?php if($role == 'superAdmin' ||  $role == 'accounts'){?>
    <li class="menu-item bill_account">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ri-currency-line"></i>
        <div>Billing & Accounts</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item cus_recpt">
          <a href="<?php echo base_url('billing_receipt'); ?>" class="menu-link">
            <div>Custumor Receipt</div>
          </a>
        </li>
        <li class="menu-item expns">
          <a href="<?php echo base_url('expense'); ?>" class="menu-link">
            <div>Expense</div>
          </a>
        </li>
        <li class="menu-item sal_adv">
          <a href="<?php echo base_url('salary_advance'); ?>" class="menu-link">
            <div>Salary Advance Info</div>
          </a>
        </li>
        <li class="menu-item emp_sal">
          <a href="<?php echo base_url('employee_salary'); ?>" class="menu-link">
            <div>Staff Salary Info</div>
          </a>
        </li>
      </ul>
    </li>
    <?php } ?>
    <?php if($role == 'superAdmin' || $role == 'admin' || $role == 'manager' || $role == 'marketers'){?>
    <li class="menu-item off_desk">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ri-discount-percent-line"></i>
        <div>Offer Desk</div>
      </a>
      <ul class="menu-sub ">
      <?php if($role == 'superAdmin' || $role == 'admin' || $role == 'manager' || $role == 'marketers'){?>
        <li class="menu-item add_offer">
          <a href="<?php echo base_url('add_offer'); ?>" class="menu-link">
            <div>Add Offer</div>
          </a>
        </li>
        <?php } ?>
        <?php if($role == 'superAdmin' || $role == 'admin'){?>
        <li class="menu-item offer_in">
          <a href="<?php echo base_url('offer_incentives'); ?>" class="menu-link">
            <div>Offer Incentives</div>
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>
    <?php if($role == 'superAdmin'){?>
    <!-- <li class="menu-header mt-7">
      <span class="menu-header-text" data-i18n="Settings">Settings</span>
    </li> -->
    <?php if($role == 'superAdmin' || $role == 'admin'){?>
    <li class="menu-item mas">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ri-home-gear-line ri-28px"></i>
        <div>Settings</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item comp_mas">
          <a href="<?php echo base_url('company_master'); ?>" class="menu-link">
            <div>Company Profile</div>
          </a>
        </li>
        
        <li class="menu-item exp_mas">
          <a href="<?php echo base_url('expense_master'); ?>" class="menu-link">
            <div>Expense</div>
          </a>
        </li>
        <?php if($role == 'superAdmin'){?>
        <li class="menu-item role_mas">
          <a href="<?php echo base_url('role_master'); ?>" class="menu-link">
            <div>Role</div>
          </a>
        </li>
        <li class="menu-item seq_mas">
          <a href="<?php echo base_url('seq_master'); ?>" class="menu-link">
            <div>Sequence Master</div>
          </a>
        </li>
        <?php } ?>
       
      </ul>
        <?php } ?>
          <li class="menu-item cus_info">
            <a href="<?php echo base_url('customer_info'); ?>" class="menu-link">
              <i class="menu-icon tf-icons ri-speak-line"></i>
              <div data-i18n="Customer/Buyer Info">Customer/Buyer Info</div>
            </a>
          </li>
          <li class="menu-item staff_info">
            <a href="<?php echo base_url('staff_info'); ?>" class="menu-link">
              <i class="menu-icon tf-icons ri-profile-line"></i>
              <div data-i18n="Employees/Staff Info">Employees/Staff Info</div>
            </a>
          </li>
    </li>
    <?php } ?>
  </ul>
  
  

</aside>
<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  

  

      
      

      
      
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
          <i class="ri-menu-fill ri-24px"></i>
        </a>
      </div>
      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        
        <!-- Search -->
        <!-- <div class="navbar-nav align-items-center">
          <div class="nav-item navbar-search-wrapper mb-0">
            <a class="nav-item nav-link search-toggler fw-normal px-0" href="<?php echo base_url(); ?>"> -->
              <!-- <i class="ri-search-line ri-22px scaleX-n1-rtl me-1_5"></i>
              <span class="d-none d-md-inline-block text-muted ms-1_5">Search (Ctrl+/)</span> -->
              <?php 
              $sql_company = $this->db->query("SELECT name FROM `company` WHERE comid ='$comid' AND deadid ='0' LIMIT 1");
              $company_result = $sql_company->result_array();
              foreach ($company_result as $row) {} ?>
              <div style="width: -webkit-fill-available; display: flex; justify-content: center;"><h3><?php if($row['name']){ echo $row['name']; }else{ echo "Real Estate Management System"; } ?></h3></div>
              
             
            <!-- </a>
          </div>
        </div> -->
        <!-- /Search -->
        
        

        

        <ul class="navbar-nav flex-row align-items-center ms-auto">

          
          
          <!-- Language -->
          <!-- <li class="nav-item dropdown-language dropdown">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <i class='ri-translate-2 ri-22px'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-2">
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-language="en" data-text-direction="ltr">
                  <span class="align-middle">English</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-language="fr" data-text-direction="ltr">
                  <span class="align-middle">French</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-language="ar" data-text-direction="rtl">
                  <span class="align-middle">Arabic</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-language="de" data-text-direction="ltr">
                  <span class="align-middle">German</span>
                </a>
              </li>
            </ul>
          </li> -->
          <!--/ Language -->
          
          <!-- Style Switcher -->
          <!-- <li class="nav-item dropdown-style-switcher dropdown">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <i class='ri-22px'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                  <span class="align-middle"><i class='ri-sun-line ri-22px me-3'></i>Light</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                  <span class="align-middle"><i class="ri-moon-clear-line ri-22px me-3"></i>Dark</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                  <span class="align-middle"><i class="ri-computer-line ri-22px me-3"></i>System</span>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- / Style Switcher-->
          
          <!-- Quick links  -->
          <!-- <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class='ri-star-smile-line ri-22px'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
              <div class="dropdown-menu-header border-bottom py-50">
                <div class="dropdown-header d-flex align-items-center py-2">
                  <h6 class="mb-0 me-auto">Shortcuts</h6>
                  <a href="javascript:void(0)" class="btn btn-text-secondary rounded-pill btn-icon dropdown-shortcuts-add" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="ri-layout-grid-line ri-24px text-heading"></i></a>
                </div>
              </div>
              <div class="dropdown-shortcuts-list scrollable-container">
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ri-calendar-line ri-26px text-heading"></i>
                    </span>
                    <a href="app-calendar.html" class="stretched-link">Calendar</a>
                    <small>Appointments</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ri-file-text-line ri-26px text-heading"></i>
                    </span>
                    <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                    <small>Manage Accounts</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ri-user-line ri-26px text-heading"></i>
                    </span>
                    <a href="app-user-list.html" class="stretched-link">User App</a>
                    <small>Manage Users</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ri-computer-line ri-26px text-heading"></i>
                    </span>
                    <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                    <small>Permission</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ri-pie-chart-2-line ri-26px text-heading"></i>
                    </span>
                    <a href="index.html" class="stretched-link">Dashboard</a>
                    <small>Analytics</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ri-settings-4-line ri-26px text-heading"></i>
                    </span>
                    <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                    <small>Account Settings</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ri-question-line ri-26px text-heading"></i>
                    </span>
                    <a href="pages-faq.html" class="stretched-link">FAQs</a>
                    <small class="text-muted mb-0">FAQs & Articles</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                      <i class="ri-tv-2-line ri-26px text-heading"></i>
                    </span>
                    <a href="modal-examples.html" class="stretched-link">Modals</a>
                    <small>Useful Popups</small>
                  </div>
                </div>
              </div>
            </div>
          </li> -->
          <!-- Quick links -->

          <!-- Notification -->
          <!-- <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-4 me-xl-1">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class="ri-notification-2-line ri-22px"></i>
              <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h6 class="mb-0 me-auto">Notification</h6>
                  <div class="d-flex align-items-center">
                    <span class="badge rounded-pill bg-label-primary me-2">8 New</span>
                    <a href="javascript:void(0)" class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="ri-mail-open-line ri-20px text-body"></i></a>
                  </div>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="<?php echo base_url(); ?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="small mb-1">Congratulation Lettie 🎉</h6>
                        <small class="mb-1 d-block text-body">Won the monthly best seller gold badge</small>
                        <small class="text-muted">1h ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line"></span></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1 small">Charles Franklin</h6>
                        <small class="mb-1 d-block text-body">Accepted your connection</small>
                        <small class="text-muted">12hr ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line"></span></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="<?php echo base_url(); ?>assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1 small">New Message ✉️</h6>
                        <small class="mb-1 d-block text-body">You have new message from Natalie</small>
                        <small class="text-muted">1h ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line"></span></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <span class="avatar-initial rounded-circle bg-label-success"><i class="ri-shopping-cart-2-line"></i></span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1 small">Whoo! You have new order 🛒 </h6>
                        <small class="mb-1 d-block text-body">ACME Inc. made new order $1,154</small>
                        <small class="text-muted">1 day ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line"></span></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="<?php echo base_url(); ?>assets/img/avatars/9.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1 small">Application has been approved 🚀 </h6>
                        <small class="mb-1 d-block text-body">Your ABC project application has been approved.</small>
                        <small class="text-muted">2 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line"></span></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <span class="avatar-initial rounded-circle bg-label-success"><i class="ri-pie-chart-2-line"></i></span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1 small">Monthly report is generated</h6>
                        <small class="mb-1 d-block text-body">July monthly financial report is generated </small>
                        <small class="text-muted">3 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line"></span></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="<?php echo base_url(); ?>assets/img/avatars/5.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1 small">Send connection request</h6>
                        <small class="mb-1 d-block text-body">Peter sent you connection request</small>
                        <small class="text-muted">4 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line"></span></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <img src="<?php echo base_url(); ?>assets/img/avatars/6.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1 small">New message from Jane</h6>
                        <small class="mb-1 d-block text-body">Your have new message from Jane</small>
                        <small class="text-muted">5 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line"></span></a>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                          <span class="avatar-initial rounded-circle bg-label-warning"><i class="ri-error-warning-line"></i></span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <h6 class="mb-1 small">CPU is running high</h6>
                        <small class="mb-1 d-block text-body">CPU Utilization Percent is currently at 88.63%,</small>
                        <small class="text-muted">5 days ago</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ri-close-line"></span></a>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="border-top">
                <div class="d-grid p-4">
                  <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                    <small class="align-middle">View all notifications</small>
                  </a>
                </div>
              </li>
            </ul>
          </li> -->
          <!--/ Notification -->

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="<?php echo base_url(); ?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2">
                      <div class="avatar avatar-online">
                        <img src="<?php echo base_url(); ?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-0 small"><?php echo $user_name; ?></h6>
                      <small class="text-muted"><?php echo $role;  ?></small>

                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <!--<li>-->
              <!--  <a class="dropdown-item" href="<?php echo base_url('user_profile'); ?>">-->
              <!--    <i class="ri-user-3-line ri-22px me-2"></i>-->
              <!--    <span class="align-middle">My Profile</span>-->
              <!--  </a>-->
              <!--</li>-->
              <!--<li>-->
              <!--  <a class="dropdown-item" href="<?php echo base_url('settings'); ?>">-->
              <!--    <i class="ri-settings-4-line ri-22px me-2"></i>-->
              <!--    <span class="align-middle">Settings</span>-->
              <!--  </a>-->
              <!--</li>-->
              <!-- <li>
                <a class="dropdown-item" href="pages-account-settings-billing.html">
                  <span class="d-flex align-items-center align-middle">
                    <i class="flex-shrink-0 ri-file-text-line ri-22px me-2"></i>
                    <span class="flex-grow-1 align-middle">Billing</span>
                    <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger h-px-20 d-flex align-items-center justify-content-center">4</span>
                  </span>
                </a>
              </li> -->
              <!-- <li>
                <div class="dropdown-divider"></div>
              </li> -->
              <!-- <li>
                <a class="dropdown-item" href="pages-pricing.html">
                  <i class="ri-money-dollar-circle-line ri-22px me-2"></i>
                  <span class="align-middle">Pricing</span>
                </a>
              </li> -->
              <!-- <li>
                <a class="dropdown-item" href="pages-faq.html">
                  <i class="ri-question-line ri-22px me-2"></i>
                  <span class="align-middle">FAQ</span>
                </a>
              </li> -->
              <li>
                <div class="d-grid px-4 pt-2 pb-1">
                  <a class="btn btn-danger d-flex" href="<?php echo base_url('Logout'); ?>" >
                    <small class="align-middle">Logout</small>
                    <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <!--/ User -->
          


        </ul>
      </div>

      
      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper  d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
        <i class="ri-close-fill search-toggler cursor-pointer"></i>
      </div>
      
      
  
</nav>

<!-- / Navbar -->
