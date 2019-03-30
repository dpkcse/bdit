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

		
      
      
	<!-- Start Map -->
	<div id="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7300.75098074795!2d90.36701683275699!3d23.80524320000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d23729139b%3A0xd032c8e41b63156a!2sBangladesh+IT+Institute!5e0!3m2!1sen!2sbd!4v1553854477535!5m2!1sen!2sbd" width="1366" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	
	<!-- End Map --> 

	<!-- Start Content -->
	<div id="content">
		<div class="container">
		
			<div class="row">
			
				<div class="col-md-8">
					
					<!-- Classic Heading -->
					<h4 class="classic-title"><span>Contact Us</span></h4>
					
					<!-- Start Contact Form -->
					<div id="contact-form" class="contatct-form">
						<div class="loader"></div>
						<form action="mail.php" class="contactForm" name="cform" method="post">
							<div class="row">
								<div class="col-md-4">
									<label for="name">Name<span class="required">*</span></label>
									<span class="name-missing">Please enter your name</span>  
									<input id="name" name="name" type="text" value="" size="30">
								</div>
								<div class="col-md-4">
									<label for="e-mail">Email<span class="required">*</span></label>
									<span class="email-missing">Please enter a valid e-mail</span> 
									<input id="e-mail" name="email" type="text" value="" size="30">
								</div>
								<div class="col-md-4">
										<label for="url">Website</label>
										<input id="url" name="url" type="text" value="" size="30">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="message">Add Your Comment</label>
									<span class="message-missing">Say something!</span>
									<textarea id="message" name="message" cols="45" rows="10"></textarea>
									<input type="submit" name="submit" class="button" id="submit_btn" value="Send Message">
								</div>
							</div>
						</form>
					</div>
					<!-- End Contact Form -->
					
				</div>
				
				<div class="col-md-4">
					
					<!-- Classic Heading -->
					<h4 class="classic-title"><span>Information</span></h4>
					
					<!-- Some Info -->
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.</p>
					
					<!-- Divider -->
					<div class="hr1" style="margin-bottom:10px;"></div>
					
					<!-- Info - Icons List -->
					<ul class="icons-list">
						<li><i class="icon-location-1"></i> <strong>Address:</strong> 1234 Street Name, City Name, Egypt.</li>
						<li><i class="icon-mail-1"></i> <strong>Email:</strong> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="89e0e7efe6c9f0e6fcfbeae6e4f9e8e7f0a7eae6e4">[email&#160;protected]</a></li>
						<li><i class="icon-mobile-1"></i> <strong>Phone:</strong> +12 345 678 001</li>
					</ul>
					
					<!-- Divider -->
					<div class="hr1" style="margin-bottom:15px;"></div>
					
					<!-- Classic Heading -->
					<h4 class="classic-title"><span>Working Hours</span></h4>
					
					<!-- Info - List -->
					<ul class="list-unstyled">
						<li><i class="icon icon-time"></i> <strong>Monday - Friday</strong> - 9am to 5pm</li>
						<li><i class="icon icon-time"></i> <strong>Saturday</strong> - 9am to 2pm</li>
						<li><i class="icon icon-time"></i> <strong>Sunday</strong> - Closed</li>
					</ul>
					
				</div>
				
			</div>
		
		</div>
	</div>
	<!-- End content -->
    
    <!-- Start Footer -->
    <?php include('partials/foot.php'); ?>
    <!-- End Footer -->
    
</div>
<!-- End Container -->
<?php include('partials/footer.php'); ?>