
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
    <div class="page-banner" style="height:200px;padding:40px 0; background: url(<?php echo base_url(); ?>Assets/images/innerheader.jpeg) center #f9f9f9;">
        <div class="inner-header-caption">
            <h1><?php echo $instructor[0]['name']; ?></h1>
            <ul class="breadcrumb">
                <li><a href="index-1.html"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Instructor Information</a></li>
            </ul>
        </div>
    </div>
    <!-- End Page Banner -->
    
    <!-- Start Content -->
    <div id="content">
    <div class="container">
        <div class="row blog-page">
            <!--Sidebar-->
            <div class="col-md-3 sidebar left-sidebar">
            
                <!-- Search Widget -->
                <div class="widget widget-search">
                    <form action="#">
                        <input type="search" placeholder="Enter Keywords...">
                        <button class="search-btn" type="submit"><i class="icon-search-1"></i></button>
                    </form>
                </div>

                <!-- Popular Posts widget -->
                <div class="widget widget-popular-posts">
                    <h4>Other Instructors <span class="head-line"></span></h4>
                    <ul>
                        <?php if(count($instructors) > 0){ foreach($instructors as $row): if($row['id'] !== $instructor[0]['id']){ ?>
                            <li>
                                <div class="widget-thumb">
                                    <a href="<?php echo base_url('Course/instructor_s/'.$row['id']); ?>"><img src="<?php echo base_url(); ?>admin/uploads/instructor/<?php echo $row['img']; ?>" alt=""></a>
                                </div>
                                <div class="widget-content">
                                    <h5><a href="<?php echo base_url('Course/instructor_s/'.$row['id']); ?>"><?php echo $row['name']; ?></a></h5>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        <?php  } endforeach; } ?>
                        
                    </ul>
                </div>

            </div>
            <!--End sidebar-->
            
            
            <!-- Start Blog Posts -->
            <div class="col-md-9 blog-box">
                
                <!-- Start Post -->
                <div class="blog-post image-post">
                    <!-- Post Thumb -->
                    <div class="post-head" style="width: 30%;margin-left: 30%;">
                        <a class="lightbox" title="This is an image title" href="<?php echo base_url(); ?>admin/uploads/instructor/<?php echo $instructor[0]['img']; ?>">
                            <div class="thumb-overlay"><i class="icon-resize-full"></i></div>
                            <img alt="" src="<?php echo base_url(); ?>admin/uploads/instructor/<?php echo $instructor[0]['img']; ?>">
                        </a>
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <div class="post-type"><i class="icon-picture-3"></i></div>
                        <h2><a href="#"><?php echo $instructor[0]['name']; ?></a></h2>
                        <p><?php echo $instructor[0]['detail']; ?></p>
                    </div>
                </div>
                <!-- End Post -->
            </div>
            <!-- End Blog Posts -->
            
            
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