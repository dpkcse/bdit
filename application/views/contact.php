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
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7300.75098074795!2d90.36701683275699!3d23.80524320000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d23729139b%3A0xd032c8e41b63156a!2sBangladesh+IT+Institute!5e0!3m2!1sen!2sbd!4v1553854477535!5m2!1sen!2sbd" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
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
					<p style="font-weight: bold; font-size: 24px;">Bangladesh IT Institute.</p>
					
					<!-- Divider -->
					<div class="hr1" style="margin-bottom:10px;"></div>
					
					<!-- Info - Icons List -->
					<ul class="icons-list">
						<li><i class="icon-location-1"></i> <strong>Corporate Office:</strong> Opolok, 2nd & 3rd Floor 225, Senpara Parbota Mirpur-10, Dhaka-1216</li>
						<li><i class="icon-location-1"></i> <strong>Jessore Office:</strong> Sheikh Hasina Software Technology Park, Level 9, Jessore</li>
						<li><i class="icon-location-1"></i> <strong>USA Office:</strong> 21118, Sweetwater Ln. N. Boca Raton, Florida 33428, USA</li>
						
						<li><i class="icon-mail-1"></i> <strong>Email:</strong> info@bditinstitute.com</li>
						<li><img style="width: 15px; height: 15px; margin-top: -4PX;" src="<?php echo base_url(); ?>Assets/images/Awards_Accreditation/15307.svg" />  <strong>Phone:</strong> +88 02 9004200-1, +1 833 994 5622 (USA)</li>
						<li><i class="icon-mobile-1"></i> <strong>Mobile:</strong> +88 01701 292270, +88 01701 292263</li>
					</ul>
					
					<!-- Divider -->
					<div class="hr1" style="margin-bottom:15px;"></div>
					
					<!-- Classic Heading -->
					<h4 class="classic-title"><span>Working Hours</span></h4>
					
					<!-- Info - List -->
					<ul class="list-unstyled">
						<li><i class="icon icon-time"></i> <strong>Saturday - Thursday</strong> - 9am to 7pm</li>
						<li><i class="icon icon-time"></i> <strong>Friday</strong> - Closed</li>
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
