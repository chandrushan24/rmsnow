

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<div class="row">
  <div class="col-md-12">
    <div class="nav-align-top">
      <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
        <li class="nav-item"><a class="nav-link " href="<?php echo base_url('user_profile'); ?>"><i class="ri-group-line me-1_5"></i>Account</a></li>
        <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('settings'); ?>"><i class="ri-lock-line me-1_5"></i>Security</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="pages-account-settings-billing.html"><i class="ri-bookmark-line me-1_5"></i> Billing & Plans</a></li>
        <li class="nav-item"><a class="nav-link" href="pages-account-settings-notifications.html"><i class="ri-notification-4-line me-1_5"></i> Notifications</a></li>
        <li class="nav-item"><a class="nav-link" href="pages-account-settings-connections.html"><i class="ri-link-m me-1_5"></i> Connections</a></li> -->
      </ul>
    </div>
    <!-- Change Password -->
    <div class="card mb-6">
      <h5 class="card-header">Change Password</h5>
      <div class="card-body pt-1">
        <form id="formAccountSettings" method="GET" onsubmit="return false">
          <div class="row">
            <div class="mb-5 col-md-6 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                  <label for="currentPassword">Current Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
              </div>
            </div>
          </div>
          <div class="row g-5 mb-6">
            <div class="col-md-6 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                  <label for="newPassword">New Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
              </div>
            </div>
            <div class="col-md-6 form-password-toggle">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                  <label for="confirmPassword">Confirm New Password</label>
                </div>
                <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line ri-20px"></i></span>
              </div>
            </div>
          </div>
          <h6 class="text-body">Password Requirements:</h6>
          <ul class="ps-4 mb-0">
            <li class="mb-4">Minimum 8 characters long - the more, the better</li>
            <li class="mb-4">At least one lowercase character</li>
            <li>At least one number, symbol, or whitespace character</li>
          </ul>
          <div class="mt-6">
            <button type="submit" class="btn btn-primary me-3">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
          </div>
        </form>
      </div>
    </div>
    <!--/ Change Password -->

    <!-- Two-steps verification -->
    <div class="card mb-6">
      <div class="card-body">
        <h5 class="mb-6">Two-steps verification</h5>
        <p class="mb-4">Two factor authentication is not enabled yet.</p>
        <p class="w-75">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.
          <a href="javascript:void(0);">Learn more.</a>
        </p>
        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#enableOTP">Enable Two-Factor Authentication</button>
      </div>
    </div>
    <!-- Modal -->
    <!-- Enable OTP Modal -->
<div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-6">
          <h4 class="mb-2">Enable One Time Password</h4>
          <p>Verify Your Mobile Number for SMS</p>
        </div>
        <p class="fw-medium">Verify Your Mobile Number for SMS</p>
        <p>Enter your mobile phone number with country code and we will send you a verification code.</p>
        <form id="enableOTPForm" class="row g-5" onsubmit="return false">
          <div class="col-12">
            <div class="input-group input-group-merge">
              <span class="input-group-text">IND (+91)</span>
              <div class="form-floating form-floating-outline">
                <input type="text" id="modalEnableOTPPhone" name="modalEnableOTPPhone" class="form-control phone-number-otp-mask" placeholder="202 555 0111" />
                <label for="modalEnableOTPPhone">Phone Number</label>
              </div>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary me-3">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Enable OTP Modal -->

    <!-- /Modal -->

    <!--/ Two-steps verification -->

    <!-- Create an API key -->
    <!-- <div class="card mb-6">
      <h5 class="card-header">Create an API key</h5>
      <div class="row">
        <div class="col-xl-5 col-md-7">
          <div class="card-body">
            <form id="formAccountSettingsApiKey" method="GET" onsubmit="return false">
              <div class="row gy-5">
                <div class="col-12">
                  <div class="form-floating form-floating-outline">
                    <select id="apiAccess" class="select2 form-select">
                      <option value="">Choose Key Type</option>
                      <option value="full">Full Control</option>
                      <option value="modify">Modify</option>
                      <option value="read-execute">Read & Execute</option>
                      <option value="folders">List Folder Contents</option>
                      <option value="read">Read Only</option>
                      <option value="read-write">Read & Write</option>
                    </select>
                    <label for="apiAccess">Choose the Api key type you want to create</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating form-floating-outline">
                    <input type="text" class="form-control" id="apiKey" name="apiKey" placeholder="Server Key 1" />
                    <label for="apiKey">Name the API key</label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-2 w-100">Create Key</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-xl-7 col-md-5">
          <div class="text-center">
            <img src="../../assets/img/illustrations/pricing-illustration.png" class="img-fluid" alt="Api Key Image" width="200">
          </div>
        </div>
      </div>
    </div> -->
    <!--/ Create an API key -->

    <!-- API Key List & Access -->
    <!-- <div class="card mb-6">
      <div class="card-body">
        <h5>API Key List & Access</h5>
        <p class="mb-6">An API key is a simple encrypted string that identifies an application without any principal. They are useful for accessing public data anonymously, and are used to associate API requests with your project for quota and billing.</p>
        <div class="row">
          <div class="col-md-12">
            <div class="bg-lightest rounded p-4 mb-6">
              <div class="d-flex align-items-center mb-2">
                <h6 class="mb-0 me-3">Server Key 1</h6>
                <span class="badge bg-label-primary rounded-pill">Full Access</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <span class="me-3 fw-medium">23eaf7f0-f4f7-495e-8b86-fad3261282ac</span>
                <span class="cursor-pointer"><i class="ri-file-copy-line ri-20px"></i></span>
              </div>
              <span class="text-muted">Created on 28 Apr 2021, 18:20 GTM+4:10</span>
            </div>
            <div class="bg-lightest rounded p-4 mb-6">
              <div class="d-flex align-items-center mb-2">
                <h6 class="mb-0 me-3">Server Key 2</h6>
                <span class="badge bg-label-primary rounded-pill">Read Only</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <span class="me-3 fw-medium">bb98e571-a2e2-4de8-90a9-2e231b5e99</span>
                <span class="cursor-pointer"><i class="ri-file-copy-line ri-20px"></i></span>
              </div>
              <span class="text-muted">Created on 12 Feb 2021, 10:30 GTM+2:30</span>
            </div>
            <div class="bg-lightest rounded p-4">
              <div class="d-flex align-items-center mb-2">
                <h6 class="mb-0 me-3">Server Key 3</h6>
                <span class="badge bg-label-primary rounded-pill">Full Access</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <span class="me-3 fw-medium">2e915e59-3105-47f2-8838-6e46bf83b711</span>
                <span class="cursor-pointer"><i class="ri-file-copy-line ri-20px"></i></span>
              </div>
              <span class="text-muted">Created on 28 Dec 2020, 12:21 GTM+4:10</span>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!--/ API Key List & Access -->

    <!-- Recent Devices -->
    <!-- <div class="card mb-6">
      <h6 class="card-header">Recent Devices</h6>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-truncate">Browser</th>
              <th class="text-truncate">Device</th>
              <th class="text-truncate">Location</th>
              <th class="text-truncate">Recent Activities</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-truncate text-heading"><i class='ri-macbook-line ri-20px text-warning me-3'></i>Chrome on Windows</td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">10, July 2021 20:07</td>
            </tr>
            <tr>
              <td class="text-truncate text-heading"><i class='ri-android-line ri-20px text-success me-3'></i>Chrome on iPhone</td>
              <td class="text-truncate">iPhone 12x</td>
              <td class="text-truncate">Australia</td>
              <td class="text-truncate">13, July 2021 10:10</td>
            </tr>
            <tr>
              <td class="text-truncate text-heading"><i class='ri-smartphone-line ri-20px text-danger me-3'></i>Chrome on Android</td>
              <td class="text-truncate">Oneplus 9 Pro</td>
              <td class="text-truncate">Dubai</td>
              <td class="text-truncate">14, July 2021 15:15</td>
            </tr>
            <tr>
              <td class="text-truncate text-heading"><i class='ri-mac-line ri-20px text-info me-3'></i>Chrome on MacOS</td>
              <td class="text-truncate">Apple iMac</td>
              <td class="text-truncate">India</td>
              <td class="text-truncate">16, July 2021 16:17</td>
            </tr>
            <tr>
              <td class="text-truncate text-heading"><i class='ri-macbook-line ri-20px text-warning me-3'></i>Chrome on Windows</td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">20, July 2021 21:01</td>
            </tr>
            <tr class="border-transparent">
              <td class="text-truncate text-heading"><i class='ri-android-line ri-20px text-success me-3'></i>Chrome on Android</td>
              <td class="text-truncate">Oneplus 9 Pro</td>
              <td class="text-truncate">Dubai</td>
              <td class="text-truncate">21, July 2021 12:22</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div> -->
    <!--/ Recent Devices -->

  </div>
</div>


          </div>
          <!-- / Content -->
