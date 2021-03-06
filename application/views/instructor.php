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
                    <h2>Instructor</h2>
                    <p>We Are Professional</p>
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>Instructor</li>
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
                <h4 class="classic-title"><span>Our Instructors</span></h4>
                <div class="profile-users clearfix">
                    <?php if(count($instructors) > 0){ foreach($instructors as $row): ?>
                        <div class="itemdiv memberdiv">
                            <div class="inline pos-rel">
                                <div class="user">
                                    <a href="<?php echo base_url('Course/instructor_s/'.$row['id']); ?>">
                                    <img src="<?php echo base_url(); ?>admin/uploads/instructor/<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>" style="width: 64px; height: 64px;">
                                    </a>
                                </div>

                                <div class="body">
                                    <div class="name">
                                        <a href="<?php echo base_url('Course/instructor_s/'.$row['id']); ?>">
                                            <span class="user-status status-online"></span>
                                            <?php echo $row['name']; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  endforeach; } ?>
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