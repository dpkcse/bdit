<div class = "navbar-default sidebar" role = "navigation">
    <div class = "sidebar-nav navbar-collapse">
        <ul class = "nav" id = "side-menu">
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
                <a href = "<?php echo site_url('Dashboard'); ?>"><i class = "fa fa-dashboard fa-fw"></i> Dashboard </a>
            </li>
            <li>
                <a href = "#"><i class = "fa fa-dashboard fa-fw"></i> Home <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('Home'); ?>">Banner Management</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('News'); ?>">News Management</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href = "<?php echo site_url('LatestWork'); ?>"><i class = "fa fa-dashboard fa-fw"></i> Latest Work </a>
            </li>
            <li>
                <a href = "<?php echo site_url('Client'); ?>"><i class = "fa fa-dashboard fa-fw"></i> Client </a>
            </li>

            <li>
                <a href = "<?php echo site_url('Service'); ?>"><i class = "fa fa-dashboard fa-fw"></i> Service </a>
            </li>
            <li>
                <a href = "<?php echo site_url('dashboard/admin_profile'); ?>"><i class = "fa fa-dashboard fa-fw"></i> Admin Profile </a>
            </li>
            <li>
                <a href = "<?php echo site_url('auth/admin_login/logout'); ?>"> <i class = "fa fa-sign-out text-aqua"></i> Logout </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.sidebar -->
<script type = "text/javascript">
    $(document).ready(function () {

        $('.sidebar ul li').each(function () {
            if (window.location.href.indexOf($(this).find('a:first').attr('href')) > -1) {
                $(this).closest('ul').closest('li').attr('class', 'active');
                $(this).addClass('active').siblings().removeClass('active');
            }
        });

    });
</script>