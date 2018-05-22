<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
            </div>
            <!-- /input-group -->
        </li>
        <li>
            <a href="<?=site_url('Dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>
        <?php
        $sess_level = $this->session->userdata('level');
        if ($sess_level == "admin") { ?>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Master<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?=site_url('User'); ?>">Data User</a>
                </li>
                <li>
                    <a href="<?=site_url('Operator'); ?>">Data Operator</a>
                </li>
                <li>
                    <a href="<?=site_url('Mesin'); ?>">Data Mesin</a>
                </li>
                <li>
                    <a href="<?=site_url('Customer'); ?>">Data Customer</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="<?=site_url('plan'); ?>"><i class="fa fa-table fa-fw"></i>Planning Produksi</a>
        </li>
        <li>
            <a href="<?=site_url('produksi/views'); ?>"><i class="fa fa-table fa-fw"></i> Data Produksi</a>
        </li>
        <li>
            <a href="<?=site_url('reject/view'); ?>"><i class="fa fa-table fa-fw"></i> Data Reject</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Laporan<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
<!--                <li>-->
<!--                    <a href="--><?//=site_url('plan/laporan'); ?><!--">Laporan Planning Produksi</a>-->
<!--                </li>-->
                <li>
                    <a href="<?=site_url('produksi/laporan'); ?>">Laporan Produksi</a>
                </li>
                <li>
                    <a href="<?=site_url('reject/laporan'); ?>">Laporan Reject</a>
                </li>
            </ul>
        </li>
        <?php } else if ($sess_level == "staff") { ?>
        <li>
            <a href="<?=site_url('produksi'); ?>"><i class="fa fa-table fa-fw"></i> Data Produksi</a>
        </li>
        <li>
            <a href="<?=site_url('reject'); ?>"><i class="fa fa-table fa-fw"></i> Data Reject</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Laporan<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?=site_url('produksi/laporan'); ?>">Laporan Produksi</a>
                </li>
                <li>
                    <a href="<?=site_url('reject/laporan'); ?>">Laporan Reject</a>
                </li>
            </ul>
        </li>
        <?php } else if ($sess_level == "kepala") { ?>
            <li>
                <a href="<?=site_url('plan/view'); ?>"><i class="fa fa-table fa-fw"></i>Planning Produksi</a>
            </li>
            <li>
                <a href="<?=site_url('produksi/views'); ?>"><i class="fa fa-table fa-fw"></i> Data Produksi</a>
            </li>
            <li>
                <a href="<?=site_url('reject/view'); ?>"><i class="fa fa-table fa-fw"></i> Data Reject</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=site_url('produksi/laporan'); ?>">Laporan Produksi</a>
                    </li>
                    <li>
                        <a href="<?=site_url('reject/laporan'); ?>">Laporan Reject</a>
                    </li>
                </ul>
            </li>
        <?php ;} ?>
        <li>
            <a href="<?=site_url('Auth/logout'); ?>"><i class="fa fa-user fa-fw"></i> Logout</a>
        </li>


    </ul>
</div>