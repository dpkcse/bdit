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
         <!--Home Page Slider Start-->
         <!-- Start Page Banner -->
         <div class="page-banner" style="height:200px;padding:40px 0; background: url(<?php echo base_url(); ?>Assets/images/innerheader.jpeg) center #f9f9f9;">
            <div class="inner-header-caption">
               <h1>All Courses - Training</h1>
               <ul class="breadcrumb">
                  <li><a href="index-1.html"><i class="fa fa-home"></i> Home</a></li>
                  <li><a href="#">Course</a></li>
                  <li class="active">Course Grid</li>
               </ul>
            </div>
         </div>
         <!--Home Page Slider End--> 
         <!--Page Content Start-->
         <div class="content">
            <!--Meet Our Professors Start-->
            <div class="courses course-grid">
               <div class="container">
                  <div class="row">
                     <!--Course start-->
                     <?php if(count($courses) > 0){ foreach($courses as $row): ?>
                        <div class="col-md-3 col-sm-6">
                           <div class="course-grid-box">
                              <div class="course-thumb"> <strong class="cdeprt"><?php echo $row['category']; ?></strong> <a href="<?php echo base_url(); ?>Course/single/<?php echo $row['id']; ?>"><i class="fa fa-link"></i></a> <img src="<?php echo base_url(); ?>admin/uploads/course/<?php echo $row['img'];?>" alt=""> </div>
                              <div class="course-excerpt">
                                 
                                 <div class="ctxt">
                                    <h4><a href="<?php echo base_url(); ?>Course/single/<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                                    <a href="<?php echo base_url(); ?>Course/single/<?php echo $row['id']; ?>" class="cdetail">Course Detail</a> 
                                 </div>
                              </div>
                              <!-- <ul class="course-meta">
                                 <li><i class="fa fa-book"></i> 8 Les</li>
                                 <li><i class="fa fa-users"></i> 25Seats</li>
                                 <li><i class="far fa-calendar-alt"></i> 3 Mon</li>
                              </ul> -->
                           </div>
                        </div>
                    <?php  endforeach; } ?>
                     
                     <!--Course End--> 
                  </div>
                  <div class="fl-pagination">
                     <nav aria-label="Page navigation">
                        <ul class="pagination">
                           <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
                           <li><a href="#">1</a></li>
                           <li><a href="#">2</a></li>
                           <li class="active"><a href="#">3</a></li>
                           <li><a href="#">4</a></li>
                           <li><a href="#">5</a></li>
                           <li> <a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
            <!--Meet Our Professors End--> 
         </div>
         

    <!-- Start Footer -->
    <?php include('partials/foot.php'); ?>
    <!-- End Footer -->
    
</div>
<!-- End Container -->
<?php include('partials/footer.php'); ?>
