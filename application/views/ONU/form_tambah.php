<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Dashboard | Adminto - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">

        <!-- App css -->

        <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" id="app-style" />
        <!-- icons -->
        <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/libs/mohithg-switchery/switchery.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/libs/multiselect/css/multi-select.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/libs/select2/css/select2.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/libs/selectize/css/selectize.bootstrap3.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') ?>" rel="stylesheet" type="text/css" />


    </head>

    <!-- body start -->
    <body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="<?= base_url('assets/images/logo-sm.png') ?>" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('assets/images/logo-light.png') ?>" alt="" height="16">
                            </span>
                        </a>
                        <a href="" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="<?= base_url('assets/images/logo-sm.png') ?>" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('assets/images/logo-dark.png') ?>" alt="" height="16">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect">
                                <i class="fe-menu"></i>
                            </button>
                        </li>
    
                        <li>
                            <h4 class="page-title-main">ONU List</h4>
                        </li>
            
                    </ul>

                    <div class="clearfix"></div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">

                        <img src="<?= base_url('assets/images/users/user-1.jpg') ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                            <div class="dropdown">
                                <a href="" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">
									<?= $this->session->userdata('username'); ?>
								</a>
                                <div class="dropdown-menu user-pro-dropdown">        
                                    <!-- item-->
                                    <a href="<?= base_url('loginController/logout') ?>" class="dropdown-item notify-item">
                                        <i class="fe-log-out me-1"></i>
                                        <span>Logout</span>
                                    </a>
        
                                </div>
                            </div>

                        <p class="text-muted left-user-info">Interview Test</p>

                            <li class="list-inline-item">
                                <a href="<?= base_url('loginController/logout') ?>">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="#email" data-bs-toggle="collapse">
                                    <i class="mdi mdi-server"></i>
                                    <span> Device </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="email">
                                    <ul class="nav-second-level">
                                        <li>
											
                                            <a href="<?= base_url('wiFiController/index') ?>">
												<i class="mdi  mdi-router-wireless"></i>
												Wifi
											</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('networkController/index') ?>">
												<i class="mdi mdi-account-network"></i>	
												User OLT
											</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
							<li>
                                <a href="<?= base_url('oNUController/index') ?>">
                                    <i class="mdi mdi-access-point-network"></i>
                                    <span> ONU </span>
                                </a>
                            </li>
							<li>
                                <a href="<?= base_url('oLTController/index') ?>">
                                    <i class="mdi mdi-server"></i>
                                    <span> OLT </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
		
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
										<a href="<?= base_url('oNUController') ?>" class="btn btn-primary mb-2">Kembali</a>
											<hr>
										<?php echo form_open('oNUCOntroller/tambah'); ?>

										<div class="row">
											<div class="col-lg-6 mb-1">
												<label for="name" class="form-label">Name</label>
												<input type="text" id="name" name="name" class="form-control" value="<?= set_value('name') ?>">
											</div>
											<div class="col-lg-6 mb-1">
												<label for="description" class="form-label">Description</label>
												<input type="text" id="description" name="description" class="form-control" value="<?= set_value('description') ?>">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4 mb-1">
												<label for="pon_number" class="form-label">PON number</label>
												<input type="text" id="pon_number" name="pon_number" class="form-control" value="<?= set_value('pon_number') ?>">
											</div>
											<div class="col-lg-4 mb-1">
												<label for="sn" class="form-label">Serial Number (SN)</label>
												<input type="text" id="sn" name="sn" class="form-control" value="<?= set_value('sn') ?>">
											</div>
											<div class="col-lg-4 mb-1">
												<label for="mac" class="form-label">MAC</label>
												<input type="text" id="mac" name="mac" class="form-control" value="<?= set_value('mac') ?>">
											</div>
										</div>
										<div class="col-lg-12 mb-1">
											<label for="vendor" class="form-label">Vendor</label>
											<input type="text" id="vendor" name="vendor" class="form-control" value="<?= set_value('vendor') ?>">
										</div>
										<div class="row">
											<div class="col-lg-6 mb-1">
												<label for="rx" class="form-label">Received Transaction</label>
												<input type="text" id="rx" name="rx" class="form-control" value="<?= set_value('rx') ?>">
											</div>
											<div class="col-lg-6 mb-1">
												<label for="tx" class="form-label">Transmitted Transaction</label>
												<input type="text" id="tx" name="tx" class="form-control" value="<?= set_value('tx') ?>">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4 mb-1">
												<label for="id_olt" class="form-label">Device OLT</label>
												<select type="option" id="id_olt" name="id_olt" class="form-select" >
													<option value="" selected>Pilih Perangkat OLT</option>
													<?php foreach($olts as $olt): ?>
														<option value="<?= $olt->id ?>"><?= $olt->description ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="col-lg-4 mb-1">
												<label for="id_wifi" class="form-label">Device WiFi</label>
												<select type="option" id="id_wifi" name="id_wifi" class="form-select" >
													<option value="" selected>Pilih Perangkat WiFi</option>
													<?php foreach($wifis as $wifi): ?>
														<option value="<?= $wifi->id ?>"><?= $wifi->wifi_name ?></option>
													<?php endforeach; ?>
												</select>
											</div>

											<div class="col-lg-4 mb-1">
												<label for="id_network" class="form-label">Device Jaringan</label>
												<select type="option" id="id_network" name="id_network" class="form-select" >
													<option value="" selected>Pilih Perangkat Jaringan</option>
													<?php foreach($networks as $network): ?>
														<option value="<?= $network->id ?>"><?= $network->ip_address_device ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-lg-6 mb-1">
												<label for="status_tr" class="form-label">Status Transaction</label>
												<br>
												<input class="m-1" type="radio" name="status_tr" value="Online" <?php echo set_radio('status_tr','Online'); ?>>Online
												<input class="m-1" type="radio" name="status_tr" value="Offline" <?php echo set_radio('status_tr','Offline'); ?>>Offline
											</div>
											<div class="col-lg-6 mb-1">
												<label for="status_omci" class="form-label">Status OMCI</label>
												<br>
												<input class="m-1" type="radio" name="status_omci" value="Online" <?php echo set_radio('status_omci','Online'); ?>>Online
												<input class="m-1" type="radio" name="status_omci" value="Offline" <?php echo set_radio('status_omci','Offline'); ?>>Offline
											</div>
										</div>
										<div class="text-end">
											<input type="submit" name="submit" value="Simpan" class="btn btn-info">
											<a href="<?php echo base_url('oNUController'); ?>" class="btn btn-danger">Batal</a>
										</div>
										<?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Admin Template by <a href="https://github.com/BaruBelajarTadiPagi">Aditya Brian Salsabil</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/waypoints/lib/jquery.waypoints.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/jquery.counterup/jquery.counterup.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/feather-icons/feather.min.js') ?>"></script>

        <!-- knob plugin -->
        <script src="<?= base_url('assets/libs/jquery-knob/jquery.knob.min.js') ?>"></script>

        <!--Morris Chart-->
        <script src="<?= base_url('assets/libs/morris.js06/morris.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/raphael/raphael.min.js') ?>"></script>

        <!-- Dashboar init js-->
        <script src="<?= base_url('assets/js/pages/dashboard.init.js') ?>"></script>

        <!-- App js-->
        <script src="<?= base_url('assets/js/app.min.js') ?>"></script>

		<script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/waypoints/lib/jquery.waypoints.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/jquery.counterup/jquery.counterup.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/feather-icons/feather.min.js') ?>"></script>

        <script src="<?= base_url('assets/libs/selectize/js/standalone/selectize.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/mohithg-switchery/switchery.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/multiselect/js/jquery.multi-select.js') ?>"></script>
        <script src="<?= base_url('assets/libs/select2/js/select2.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/jquery-mockjax/jquery.mockjax.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') ?>"></script>
        
    </body>
</html>
