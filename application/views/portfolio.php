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
                    <h2>Mission & Vision</h2>
                    <p>We Are Professional</p>
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>Mission & Vision</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner -->
    
    <!-- Start Content -->
    <div id="content">
        <div class="container">
        <div class="row portfolio-page">
                
                <!-- Start Portfolio Filter -->
                <div class="portfolio-filter col-md-12">
                    <ul>
                        <li><a href="#" class="selected" data-filter="*">Show All</a></li>
                        <?php if(count($cats) > 0){ foreach($cats as $row): ?>
                        <li><a href="#" data-filter=".<?php echo $row; ?>"><?php echo $row; ?></a></li>
                        <?php   endforeach; } ?> 
                    </ul>
                </div>
                <!-- End Portfolio Filter -->
                
                <!-- Start Portfolio Items -->
                <div id="portfolio" class="portfolio-4">
                    <?php if(count($works) > 0){
                        foreach($works as $row):
                            if($row['type'] == 'vdo'){
                                $vdoID = explode("/",$row['link']);
                    ?>
                        <!-- Start Portfolio Item -->
                        <div class="portfolio-item <?php echo $row['cat']; ?> drawing col-md-3">
                            <div class="portfolio-border">
                                <!-- Start Portfolio Item Thumb -->
                                <div class="portfolio-thumb">
                                    <a class="lightbox" data-lightbox-type="iframe"  href="<?php echo $row['link']; ?>">
                                        <div class="thumb-overlay"><i class="icon-video-1"></i></div>
                                        <img style="width: 263px; height: 150px;" alt="" src="https://img.youtube.com/vi/<?php echo $vdoID[4]; ?>/0.jpg">
                                    </a>
                                </div>
                                <!-- End Portfolio Item Thumb -->
                                <!-- Start Portfolio Item Details -->
                                <div class="portfolio-details">
                                    <a href="#">
                                        <h4><?php echo $row['title']; ?></h4>
                                        <span><?php echo $row['cat']; ?></span>
                                    </a>
                                </div>
                                <!-- End Portfolio Item Details -->
                            </div>
                        </div>
                        <!-- End Portfolio Item -->
                    <?php   }else if($row['type'] == 'img'){ ?>  
                        <!-- Start Portfolio Item -->
                        <div class="portfolio-item <?php echo $row['cat']; ?> animation col-md-3">
                            <div class="portfolio-border">
                                <!-- Start Portfolio Item Thumb -->
                                <div class="portfolio-thumb">
                                    <a class="lightbox" title="<?php echo $row['title']; ?>" href="<?php echo base_url(); ?>admin/uploads/<?php echo $row['image']; ?>">
                                        <div class="thumb-overlay"><i class="icon-resize-full"></i></div>
                                        <img style="width: 263px; height: 150px;" alt="" src="<?php echo base_url(); ?>admin/uploads/<?php echo $row['image']; ?>">
                                    </a>
                                </div>
                                <!-- End Portfolio Item Thumb -->
                                <!-- Start Portfolio Item Details -->
                                <div class="portfolio-details">
                                    <a href="#">
                                        <h4><?php echo $row['title']; ?></h4>
                                        <span><?php echo $row['cat']; ?></span>
                                    </a>
                                </div>
                                <!-- End Portfolio Item Details -->
                            </div>
                        </div>
                        <!-- End Portfolio Item -->
                    <?php   } 
                            endforeach;
                    } ?>    
                </div>
                <!-- End Portfolio Items -->
            
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