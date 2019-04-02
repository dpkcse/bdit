<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo @$title; ?></title>
<base href="<?php echo base_url(); ?>" />
<link rel="icon" href="<?php echo base_url(); ?>assets/images/baby_fav_icon.png" type="image/x-icon" />
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>assets/css/AdminLTE.min1.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/dist/css/billboy.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="<?php echo base_url(); ?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
      type="text/css">
<link href="<?php echo base_url(); ?>assets/css/custom_admin_style.css" rel="stylesheet">
<!-- semanticui data table -->
<link href="<?php echo base_url(); ?>assets/css/dataTables.semanticui.min.css" rel="stylesheet">  
<link href="<?php echo base_url(); ?>assets/css/semantic.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/wickedpicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/qtip2/jquery.qtip.min.css"/>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/qtip2/jquery.qtip.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wickedpicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>



<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<?php if (isset($before_head)) {
    echo $before_head;
}
?>
