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
               <h1>Course Detail for <?php echo $course[0]['title']; ?></h1>
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
            <!--Event Grid Page Start-->
            <div class="course-details">
               <div class="container">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="course-detail">
                           <!--Large Image-->
                           <div class="course-large-img"> <img src="<?php echo base_url(); ?>admin/uploads/course/<?php echo $course[0]['img'];?>" alt=""> </div>
                           <!--Large Image--> 
                           <!--Meta Tag Start-->
                           <ul class="course-details-meta">
                              <li> <img class="pro" src="<?php echo base_url(); ?>admin/uploads/course/<?php echo $course[0]['img'];?>" alt=""> <strong>Instructor:</strong> <?php echo $this->bdit->get_type_name_by_id('instructor',$batch[0]['instructor'],'name') ;?> </li>
                              <li> <strong>Category:</strong> <?php echo $course[0]['category']; ?> </li>
                              <!-- <li>
                                 <strong>Review:</strong>
                                 <div class="fc-rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                              </li>
                              <li>
                                 <strong>Price:</strong>
                                 <h4>$299.00</h4>
                              </li> -->
                              <li> <a class="enroll" href="#">Get Enroll Now</a> </li>
                           </ul>
                           <!--Meta Tag End-->
                           <div class="course-text">
                              <h4><?php echo $course[0]['title']; ?></h4>
                              <table class="course-table">
                                 <tr>
                                    <td><span><i class="fa fa-book"></i></span> Duration: <strong><?php echo $batch[0]['duration'];?></strong></td>
                                    <td><span><i class="fa fa-folder-open"></i></span> Session: <strong><?php echo $batch[0]['session'];?></strong></td>
                                    <td><span><i class="fa fa-flag"></i></span> Tantative Start: <strong><?php echo $batch[0]['start_at'];?></strong></td>
                                 </tr>
                                 <!-- <tr>
                                    <td><span><i class="fa fa-users"></i></span> Seats: <strong>100 Seats (47 Rsvd)</strong></td>
                                    <td><span><i class="fa fa-calendar-alt"></i></span> Session: <strong>2018-2020</strong></td>
                                    <td><span><i class="fa fa-folder-open"></i></span> Department: <strong>ICT Training</strong></td>
                                 </tr> -->
                              </table>
                              <h4>Course Description & Detail</h4>
                              <p> <?php echo $course[0]['detail']; ?> </p>
                              <h4>Learning Outcomes</h4>
                              <img class="pull-right" src="(<?php echo base_url(); ?>Assets/images/course-img.jpeg" alt="">
                              <ul class="check-list">
                                 <?php if(count($course_outline) > 0){ foreach($course_outline as $row): ?>
                                    <li><?php echo  $row['detail']; ?></li>
                                 <?php endforeach; } ?>
                              </ul>
                              <!-- <table class="time-table">
                                 <thead>
                                    <tr>
                                       <th>Days</th>
                                       <th>Timing</th>
                                       <th>Instructor</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>Monday</td>
                                       <td>08:30 am - 09:30 am</td>
                                       <td>Martin Frank</td>
                                    </tr>
                                    <tr>
                                       <td>Tuesday</td>
                                       <td>10:30 am - 04:30 pm</td>
                                       <td>Paul Adams</td>
                                    </tr>
                                    <tr>
                                       <td>Wednesday</td>
                                       <td>09:30 am - 01:30 pm</td>
                                       <td>Mike Smith</td>
                                    </tr>
                                    <tr>
                                       <td>Thursday</td>
                                       <td>08:30 am - 09:30 am</td>
                                       <td>Stewart Advert</td>
                                    </tr>
                                    <tr>
                                       <td>Friday</td>
                                       <td>08:45 am - 12:30 pm</td>
                                       <td>Simpson John</td>
                                    </tr>
                                    <tr>
                                       <td>Saturday</td>
                                       <td>09:30 am - 11:30 am</td>
                                       <td>Elizabeth</td>
                                    </tr>
                                    <tr>
                                       <td>Sunday</td>
                                       <td>07:45 am - 09:00 am</td>
                                       <td>Symond Wolker</td>
                                    </tr>
                                 </tbody>
                              </table> -->
                           </div>
                        </div>
                        <!--Related Courses-->
                        <div class="related-courses">
                           <h3>Related Courses</h3>
                           <div class="row">
                              <!--Course start-->
                              <?php if(count($courses) > 0){ foreach($courses as $row): ?>
                                 <?php if(($row['id'] != $course[0]['id']) && ($row['category'] == $course[0]['category'])){?>
                                 <div class="col-md-3 col-sm-6">
                                    <div class="course-grid-box">
                                       <div class="course-thumb"> <strong class="cdeprt"><?php echo $row['category']; ?></strong> <a href="<?php echo base_url(); ?>Course/single/<?php echo $row['id']; ?>"><i class="fa fa-link"></i></a> <img src="<?php echo base_url(); ?>admin/uploads/course/<?php echo $row['img'];?>" alt=""> </div>
                                       <div class="course-excerpt">
                                          
                                          <div class="ctxt">
                                             <h4><a href="<?php echo base_url(); ?>Course/single/<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                                             <a href="<?php echo base_url(); ?>Course/single/<?php echo $row['id']; ?>" class="cdetail">Course Detail</a> 
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                           <?php }  endforeach; } ?>
                              
                              <!--Course End--> 
                           </div>
                        </div>
                     </div>
                     <!-- Sidebar Start -->
                     <div class="col-md-3">
                        <div class="sidebar">
                           <!--Widget Start-->
                           <div class="widget">
                              <div class="search-widget">
                                 <form>
                                    <input type="text" placeholder="Enter keyword">
                                    <button class="sbtn"><i class="fa fa-search"></i></button>
                                 </form>
                              </div>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="widget">
                              <h3>About us</h3>
                              <div class="textwidget">
                                 <img src="<?php echo base_url(); ?>Assets/images/logo_bit200x60.png" alt="">
                                 <h5 class="name">Bangladesh IT Institute</h5>
                                 <p>We combine the best of technologies, processes, strategies, and our extensive industry experience to enable our clients to succeed. BITI designs, implements, and supports end-to-end IT solutions and services. Our goal is to improve performance, maximize IT investments, and, ultimately, create a competitive business advantage for our customers. Our ability to integrate Information Technology services into a flexible, total single-point-of-contact (SPOC) solution is the key element of our success. </p>
                                 <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                           <!--Widget End--> 
                           <!--Widget Start-->
                           <div class="widget">
                              <h3>Upcoming Batch</h3>
                              <ul class="upcoming-events">
                                 <!--Event Start-->
                                 <?php if(count($batches) > 0){ foreach($batches as $row): ?>
                                    <li>
                                       <div class="up-top">
                                          <div class="upedate"> <?php echo date('d',strtotime($row['start_at'])); ?> <strong><?php echo date('m',strtotime($row['start_at'])); ?></strong> </div>
                                          <h5><a href="<?php echo base_url(); ?>Course/single/<?php echo $row['course_id']; ?>"><?php echo $this->bdit->get_type_name_by_id('course',$course[0]['id'],'title') ;?></a></h5>
                                       </div>
                                       <span><i class="fa fa-map-marker-alt"></i>BD IT Institute</span> 
                                    </li>
                                 <?php endforeach; } ?>
                                 <!--Event End--> 
                              </ul>
                           </div>
                           <!--Widget End--> 
                            
                        </div>
                     </div>
                     <!-- Sidebar End --> 
                  </div>
               </div>
            </div>
            <!--Event Grid Page End-->
         </div>
         

    <!-- Start Footer -->
    <?php include('partials/foot.php'); ?>
    <!-- End Footer -->
    
</div>
<!-- End Container -->
<?php include('partials/footer.php'); ?>
