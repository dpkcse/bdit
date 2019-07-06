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
    
    <!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url(); ?>Assets/images/main-web2.jpg) center #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>We Are Professional</p>
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner -->
    
    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="page-content">
            
                <div class="row">
                    <div class="col-xs-12 col-sm-3 center">
                        <span class="profile-picture">
                            <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="http://bootdey.com/img/Content/avatar/avatar6.png">
                        </span>

                        <div class="space space-4"></div>

                        <a href="#" class="btn btn-sm btn-block btn-success">
                            <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                            <span class="bigger-110">Add as a friend</span>
                        </a>

                        <a href="#" class="btn btn-sm btn-block btn-primary">
                            <i class="ace-icon fa fa-envelope-o bigger-110"></i>
                            <span class="bigger-110">Send a message</span>
                        </a>
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-9">
                        <h4 class="blue">
                            <span class="middle">John Doe</span>

                            <span class="label label-purple arrowed-in-right">
                                <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                                online
                            </span>
                        </h4>

                        <div class="profile-user-info">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Username </div>

                                <div class="profile-info-value">
                                    <span>alexdoe</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Location </div>

                                <div class="profile-info-value">
                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                    <span>Netherlands</span>
                                    <span>Amsterdam</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Age </div>

                                <div class="profile-info-value">
                                    <span>38</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Joined </div>

                                <div class="profile-info-value">
                                    <span>2010/06/20</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Last Online </div>

                                <div class="profile-info-value">
                                    <span>3 hours ago</span>
                                </div>
                            </div>
                        </div>

                        <div class="hr hr-8 dotted"></div>

                        <div class="profile-user-info">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Website </div>

                                <div class="profile-info-value">
                                    <a href="#" target="_blank">www.alexdoe.com</a>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name">
                                    <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                                </div>

                                <div class="profile-info-value">
                                    <a href="#">Find me on Facebook</a>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name">
                                    <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                                </div>

                                <div class="profile-info-value">
                                    <a href="#">Follow me on Twitter</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="space-20"></div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-small">
                                <h4 class="widget-title smaller">
                                    <i class="ace-icon fa fa-check-square-o bigger-110"></i>
                                    Little About Me
                                </h4>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <p>
                                        My job is mostly lorem ipsuming and dolor sit ameting as long as consectetur adipiscing elit.
                                    </p>
                                    <p>
                                        Sometimes quisque commodo massa gets in the way and sed ipsum porttitor facilisis.
                                    </p>
                                    <p>
                                        The best thing about my job is that vestibulum id ligula porta felis euismod and nullam quis risus eget urna mollis ornare.
                                    </p>
                                    <p>
                                        Thanks for visiting my profile.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Divider -->
                <div class="hr1" style="margin-bottom:50px;"></div>
                
                <!-- Start Clients Carousel -->
                <div class="our-clients">
                    
                    <!-- Classic Heading -->
                    <h4 class="classic-title"><span>Our Happy Clients</span></h4>
                    
                    <div class="clients-carousel custom-carousel touch-carousel" data-appeared-items="5">
                    
                        <?php if(count($clients) > 0){ foreach($clients as $row): ?>
                            <!-- Client -->
                            <div class="client-item item">
                                <a href="#"><img src="<?php echo base_url(); ?>admin/uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>"></a>
                            </div>
                        <?php  endforeach; } ?>
                        
                    </div>
                </div>
                <!-- End Clients Carousel -->
                

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