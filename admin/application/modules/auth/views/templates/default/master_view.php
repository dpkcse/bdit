<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <!-- Header and head section -->
    <?php require_once 'parts/admin_master_header_view.php'; ?>
    <script type = "text/javascript">
        var BASE_URL = "<?php echo base_url(); ?>";
    </script>
</head>
<body>
<div class = "container">
    <div class = "row">
        {{CONTENT}}
    </div>
</div>
<!-- ./wrapper -->
</body>
</html>
