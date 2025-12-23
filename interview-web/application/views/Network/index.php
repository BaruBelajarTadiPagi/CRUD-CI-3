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
										<a href="<?= base_url('networkController/tambah') ?>" class="btn btn-primary mb-2">Tambah Network</a>
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>	
                                                <tr>
                                                    <th>Id</th>
                                                    <th>IP Address Device</th>
                                                    <th>Gateway</th>
                                                    <th>DNS</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
													<?php 
														if( ! empty($network)) 
														{
															foreach($network as $data)
															{
																echo "
																<tr>
																	<td>".$data->id."</td>
																	<td>".$data->ip_address_device."</td>
																	<td>".$data->gateway."</td>
																	<td>".$data->dns."</td>
																	<td>
																		<a href='".base_url("networkController/ubah/".$data->id)."' class='btn btn-warning'>Ubah</a>
																		<a href='".base_url("networkController/hapus/".$data->id)."' class='btn btn-danger' onClick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
																</tr>";
															}
														}else 
														{
															echo "<tr><td colspan='6' class='text-center'>Data tidak ada</td></tr>";
														}
													?>
                                                </tbody>
                                            </table>
                                        </div>
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
        
    </body>
</html>
