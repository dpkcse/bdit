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
    <div class="page-banner" style="height:200px;padding:40px 0; background: url(<?php echo base_url(); ?>admin/uploads/<?php echo $singleServices[0]['image']; ?>) center #f9f9f9;">
        <div class="inner-header-caption">
            <h1><?php echo $singleServices[0]['title']; ?></h1>
            <ul class="breadcrumb">
                <li><a href="index-1.html"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Service</a></li>
            </ul>
        </div>
    </div>
    <!-- End Page Banner -->
    
    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Start Post -->
                        <div class="blog-post image-post">
                            <!-- Post Thumb -->
                            <div class="post-head">
                                
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <h1><a href="#"><?php echo $singleServices[0]['title']; ?></a></h1>
                                <?php echo $singleServices[0]['description']; ?>
                            </div>
                        </div>
                        <!-- End Post -->
                        
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