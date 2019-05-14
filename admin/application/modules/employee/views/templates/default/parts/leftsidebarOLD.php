<div class = "navbar-default sidebar" role = "navigation">
    <div class = "sidebar-nav navbar-collapse">
        <ul class = "nav" id = "side-menu">
            <li>
                <a href = "<?php echo site_url('dashboard'); ?>"><i class = "fa fa-dashboard fa-fw"></i>
                    Dashboard </a>
            </li>
            <li>
                <a href = "<?php echo site_url('dashboard/admin_profile'); ?>"><i
                        class = "fa fa-dashboard fa-fw"></i>
                    Admin Profile </a>
            </li>
            <li>
                <a href = "#"><i
                        class = "fa fa-dashboard fa-fw"></i>
                    Projects <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('projects'); ?>">Project Control</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('projects/ProjectPanel'); ?>">Project Panel</a>
                        </li>
                    </ul>
            </li>
            <li>
                <a href = "#"><i
                        class = "fa fa-dashboard fa-fw"></i>
                    Employee <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url('employee'); ?>">Employee Control</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('employee/employeePanel'); ?>">Employee Workforce</a>
                        </li>
                    </ul>
            </li>
            <li><a href = "<?php echo site_url('auth/admin_login/logout'); ?>">
                    <i class = "fa fa-sign-out text-aqua"></i> <span> Logout </span></a></li>
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