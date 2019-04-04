<div class="navbar navbar-default navbar-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="icon-menu-1"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img alt="" src="<?php echo base_url(); ?>Assets/images/logo_bit200x60.png"></a>
        </div>
        <div class="navbar-collapse collapse">
            <!-- Stat Search -->
            <div class="search-side">
                <a href="#" class="show-search"><i class="icon-search-1"></i></a>
                <div class="search-form">
                    <form autocomplete="off" role="search" method="get" class="searchform" action="#">
                        <input type="text" value="" name="s" id="s" placeholder="Search the site...">
                    </form>
                </div>
            </div>
            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="<?php echo ($url == 'home' ? 'active':''); ?>" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>About" class="<?php echo ($url == 'about' ? 'active':''); ?>">About Us</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo base_url(); ?>About/aboutCompany">About Company</a></li>
                        <li><a href="<?php echo base_url(); ?>About/mission_vision">Vision and Mission</a></li>
                        <li><a href="<?php echo base_url(); ?>About/why_bit_institute">Why BIT Institute</a></li>
                        <li><a href="<?php echo base_url(); ?>About/message_from_chairman">Message From Chairman</a></li>
                        <li><a href="<?php echo base_url(); ?>About/message_from_ceo">Message From CEO</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Course" class="<?php echo ($url == 'course' ? 'active':''); ?>">Services</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo base_url(); ?>Course/ICT_Training">ICT Training</a></li>
                        <li><a href="services.html">Higher Education – ATHE</a></li>
                        <li><a href="right-sidebar.html">BITI Contact Centre</a></li>
                        <li><a href="left-sidebar.html">BITI Security System</a></li>
                        <li><a href="404.html">Software Development</a></li>
                        <li><a href="404.html">Data Processing</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>About/partnership_affiliation"  class="<?php echo ($url == 'partner' ? 'active':''); ?>">Partnership and Affiliation</a>
                </li>
                <li><a href="<?php echo base_url(); ?>contact"  class="<?php echo ($url == 'contact' ? 'active':''); ?>">Contact Us</a></li>
            </ul>
            <!-- End Navigation List -->
        </div>
    </div>
</div>