<?php include('partials/header.php'); ?>

<!-- Container -->
<div id="container">
	
	<!-- Start Header -->
	<div class="hidden-header"></div>
	<header class="clearfix">
		
		<!-- Start Top Bar -->
        <?php include('partials/topbar.php'); ?>
        <!-- End Top Bar -->
		
		<!-- Start Header ( Logo & Naviagtion ) -->
        <?php include('partials/nav.php'); ?>
        <!-- End Header ( Logo & Naviagtion ) -->
		
	</header>
	<!-- End Header -->
	
	<!-- Start Content -->
	<div id="content">
		<div class="container">
			<div class="page-content">
				<div class="error-page">
					<!-- <h1>404</h1> -->
					<h3>SITE UNDER CONSTRUCTION</h3>
					<!-- <h3>File not Found</h3> -->
					<!-- <p>We're sorry, but the page you were looking for doesn't exist.</p> -->
					<div class="text-center"><a href="./" class="btn-system btn-small">Back To Home</a></div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Content -->
	
	<!-- Start Footer -->
    <?php include('partials/foot.php'); ?>
    <!-- End Footer -->
	
</div>
<!-- End Container -->
<?php include('partials/footer.php'); ?>