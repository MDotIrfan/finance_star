<?php $userdata = $this->session->userdata('user_logged'); ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar" style="
left: 0px;
top: -2px;

background: linear-gradient(211.1deg, #232D52 -5.73%, #0A1332 65.94%);">

        <!-- Sidebar - Brand -->
        <div>
            <h1></h1>
            <br>
        </div>
        <div class="sidebar-brand d-flex align-items-center justify-content-center">
            <img class="circular-image" src="<?= base_url('assets/img/') . $userdata->profile_Photo; ?>">
        </div>
        <div class="sidebar-brand-text mt-3"><?php echo $userdata->full_Name; ?></div>
        <div class="sidebar-below-brand">
        <?php
            if ($userdata->id_Position == '1') { echo 'Project Manager';} 
            elseif ($userdata->id_Position == '2') { echo 'Top Management';} 
            elseif ($userdata->id_Position == '3') { echo 'Finance';} 
            elseif ($userdata->id_Position == '4') { echo 'Admin';} 
            elseif ($userdata->id_Position == '5') { echo 'Sales';}
            elseif ($userdata->id_Position == '6') { echo 'Team';} 
            elseif ($userdata->id_Position == '7') { echo 'Individu';} 
            else { echo 'nobody';}
        ?>
        </div>
        <div class="mt-4"></div>
            <?php if ($userdata->id_Position == '1') { ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('purchase/dashboard'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt sidebar-menu-icon <?php if($this->session->userdata('menu')=='Dashboard'){echo 'active';} ?>"></i>
                        <span class="sidebar-menu-title <?php if($this->session->userdata('menu')=='Dashboard'){echo 'active';} ?>">Dashboard</span>
                    </a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-shopping-bag sidebar-menu-icon <?php if($this->session->userdata('menu')=='Purchase Order Word Based'||$this->session->userdata('menu')=='Purchase Order Item Based'){echo 'active';} ?>"></i>
                        <span class="sidebar-menu-title <?php if($this->session->userdata('menu')=='Purchase Order Word Based'||$this->session->userdata('menu')=='Purchase Order Item Based'){echo 'active';} ?>">Purchase Order</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;" class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Detail</h6>
                            <a class="collapse-item sidebar-menu-title <?php if($this->session->userdata('menu')=='Purchase Order Word Based'){echo 'active';} ?>" href="<?php echo base_url('purchase/data'); ?>">Word Base</a>
                            <a class="collapse-item sidebar-menu-title <?php if($this->session->userdata('menu')=='Purchase Order Item Based'){echo 'active';} ?>" href="<?php echo base_url('purchase/dataitem'); ?>">Item Base</a>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if ($userdata->id_Position == '3') { ?>
                <!-- Nav Item - Pages Collapse Menu Invoice -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('finance/dashboard'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;">Dashboard</span>
                    </a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                        <i class="fas fa-file-invoice"></i>
                        <span style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;">Invoice</span>
                    </a>
                    <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;" class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Detail</h6>
                            <a class="collapse-item" href="<?php echo base_url('finance/datainvoicein'); ?>">Invoice In</a>
                            <a class="collapse-item" href="<?php echo base_url('finance/datainvoiceout'); ?>">Invoice Out</a>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if ($userdata->id_Position == '2') { ?>
                <!-- Nav Item - Repoprt -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('top_management/dashboard'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;">Dashboard</span></a>
                    <a class="nav-link" href="<?php echo base_url('top_management/report'); ?>">
                        <i class="fas fa-file-alt"></i>
                        <span style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;" >Report</span></a>
                </li>

                <!-- Nav Item - Project -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('top_management/project'); ?>">
                        <i class="fas fa-tasks"></i>
                        <span style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;">Project</span></a>
                </li>
            <?php } ?>

            <?php if ($userdata->id_Position == '3') { ?>
                <!-- Nav Item - BAST -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('finance/bast') ?>">
                        <i class="fas fa-copy"></i>
                        <span style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;">BAST</span></a>
                </li>

                <!-- Nav Item - SEND -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('finance/send') ?>">
                        <i class="fas fa-paper-plane"></i>
                        <span style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;">SEND</span></a>
                </li>
            <?php } ?>

            <?php if ($userdata->id_Position == '6' || $userdata->id_Position == '7') { ?>
                <!-- Nav Item - Invoce Freelance -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= site_url('freelance/dashboard') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;">Dashboard</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                        <i class="fas fa-file-invoice"></i>
                        <span style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;">Invoice</span>
                    </a>
                    <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div style="color: #FFFFFF;font-family: Poppins;font-style: normal;font-weight: normal; font-size: 16px;" class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Detail</h6>
                            <a class="collapse-item" href="<?php echo base_url('freelance/invoice'); ?>">Invoice Word Based</a>
                            <a class="collapse-item" href="<?php echo base_url('freelance/invoice_item'); ?>">Invoice Item Based</a>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if ($userdata->id_Position == '5') { ?>
                <!-- Nav Item - QUITATION -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('quitation/data'); ?>">
                        <i class="far fa-file-alt sidebar-menu-icon <?php if($this->session->userdata('menu')=='Quotation'||$this->session->userdata('menu')=='Create Quotation'||$this->session->userdata('menu')=='Edit Quotation'){echo 'active';} ?>"></i>
                        <span class="sidebar-menu-title <?php if($this->session->userdata('menu')=='Quotation'||$this->session->userdata('menu')=='Create Quotation'||$this->session->userdata('menu')=='Edit Quotation'){echo 'active';} ?>">Quitation</span></a>
                </li>
            <?php } ?>

            <?php if ($userdata->id_Position == '4') { ?>
                <!-- Nav Item - User -->
                <li class="nav-item">
                <a class="nav-link" href="<?= site_url('user/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt sidebar-menu-icon <?php if ($this->session->userdata('menu') == 'Dashboard') {
                                                                                echo 'active';
                                                                            } ?>"></i>
                    <span class="sidebar-menu-title <?php if ($this->session->userdata('menu') == 'Dashboard') {
                                                        echo 'active';
                                                    } ?>">Dashboard</span></a>
                <a class="nav-link" href="<?php echo base_url('user/list'); ?>">
                    <i class="fas fa-users sidebar-menu-icon <?php if ($this->session->userdata('menu') == 'User' || $this->session->userdata('menu') == 'Create User' || $this->session->userdata('menu') == 'Edit User') {
                                                                    echo 'active';
                                                                } ?>"></i>
                    <span class="sidebar-menu-title <?php if ($this->session->userdata('menu') == 'User' || $this->session->userdata('menu') == 'Create User' || $this->session->userdata('menu') == 'Edit User') {
                                                        echo 'active';
                                                    } ?>">User</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('user/list_client'); ?>">
                    <i class="fas fa-user-friends sidebar-menu-icon <?php if ($this->session->userdata('menu') == 'Client' || $this->session->userdata('menu') == 'Create Client' || $this->session->userdata('menu') == 'Edit Client') {
                                                                        echo 'active';
                                                                    } ?>"></i>
                    <span class="sidebar-menu-title <?php if ($this->session->userdata('menu') == 'Client' || $this->session->userdata('menu') == 'Create Client' || $this->session->userdata('menu') == 'Edit Client') {
                                                        echo 'active';
                                                    } ?>">Client</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('user/list_resource'); ?>">
                    <i class="far fa-user sidebar-menu-icon <?php if ($this->session->userdata('menu') == 'Resource' || $this->session->userdata('menu') == 'Create Resource' || $this->session->userdata('menu') == 'Edit Resource') {
                                                                echo 'active';
                                                            } ?>"></i>
                    <span class="sidebar-menu-title <?php if ($this->session->userdata('menu') == 'Resource' || $this->session->userdata('menu') == 'Create Resource' || $this->session->userdata('menu') == 'Edit Resource') {
                                                        echo 'active';
                                                    } ?>">Resource</span></a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt sidebar-menu-icon"></i>
                    <span class="sidebar-menu-title">Log Out</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Utilities</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Utilities:</h6>
                            <a class="collapse-item" href="utilities-color.html">Colors</a>
                            <a class="collapse-item" href="utilities-border.html">Borders</a>
                            <a class="collapse-item" href="utilities-animation.html">Animations</a>
                            <a class="collapse-item" href="utilities-other.html">Other</a>
                        </div>
                    </div>
                </li> -->
            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->



            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

            <!-- Sidebar Message -->
        </a>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar topbar mb-4" style="background-color:#F9FBFD;box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.25);height:94px;">

                <!-- Sidebar Toggle (Topbar) -->
                <div class="text-center d-md-inline">
                    <button class="rounded-circle border-0"  id="sidebarToggle"><i class="fa fa-bars sidebar-toggle-icon"></i></button>
                    <span class="upper-menu-title"><?php echo $this->session->userdata('menu'); ?></span>
                </div>


                <!-- Topbar Search -->
                <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form> -->

                <!-- Topbar Navbar -->
                <!-- <ul class="navbar-nav ml-auto"> -->

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a> -->
                <!-- Dropdown - Messages -->
                <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li> -->

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1 right-item">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw" style="color:#BDC9D3;"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                <!-- Nav Item - Messages -->
                <!-- <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i> -->
                <!-- Counter - Messages -->
                <!-- <span class="badge badge-danger badge-counter">7</span>
                        </a> -->
                <!-- Dropdown - Messages -->
                <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how
                                        would you like them sent to you?</div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with
                                        the progress so far, keep up the good work!</div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                        told me that people say this to all dogs, even if they aren't good...</div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div> -->

                <!-- Nav Item - User Information -->
                <!-- <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userdata->full_Name; ?></span>
                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/') . $userdata->profile_Photo; ?>">
                        </a>
                        Dropdown - User Information
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
                </li>

                </ul> -->

            </nav>
            <!-- End of Topbar -->