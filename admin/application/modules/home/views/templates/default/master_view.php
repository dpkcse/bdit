<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Header and head section -->
        <?php require_once 'parts/header.php'; ?>
        <script type = "text/javascript">
            var BASE_URL = "<?php echo base_url(); ?>";
        </script>
    </head>
    <body class = "">
        <div class = "wrapper">
            <!-- Navigation -->
            <nav class = "navbar navbar-default navbar-static-top" role = "navigation" style = "margin-bottom: 0">
                <!-- Topbar -->
                <?php require_once 'parts/topbar.php'; ?>
                <!-- Left side column. contains the logo and sidebar -->
                <?php require_once 'parts/leftsidebar.php'; ?>
            </nav>

            <!-- Content Wrapper. Contains page content -->
            <div id = "page-wrapper">
                <div class = "row">
                    <div class = "col-md-12 col-sm-12">
                        <ol class = "breadcrumb">
                            <li><a href = "<?php echo site_url('dashboard'); ?>"><i class = "fa fa-home fa-fw"></i><?php echo $this->lang->line('home'); ?></a></li>
                            <li class = "active">admin dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class = "row">

                    {{CONTENT}}

                </div>

                <!-- /#page-wrapper -->
            </div>
            <!-- /#wrapper -->
            <div class = "footer">
                <?php require_once 'parts/footer.php'; ?>
            </div>
        </div>
        <!-- ./wrapper -->
    </body>
</html>
