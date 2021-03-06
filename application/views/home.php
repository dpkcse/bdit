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
    
    <!-- Start Home Slider -->
    <div id="slider">
        <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    <?php 
                        if(count($banners) > 0){
                            
                            foreach($banners as $row):?>

                                <li><img src="<?php echo base_url('admin/uploads/'.$row['image']); ?>" alt="<?php echo $row['heading']; ?>" title="<?php echo $row['heading']; ?>" id="wows1_<?php echo $row['id']; ?>"/></li>
                                
                            <?php endforeach;?>
                    <?php } ?>
                </ul>
            </div>
            <div class="ws_bullets">
                <div>
                    <?php if(count($banners) > 0){
                            
                            foreach($banners as $row):?>

                                <a href="<?php echo $row['link']; ?>" title="<?php echo $row['heading']; ?>"><span>1</span></a>

                            <?php endforeach;?>
                    <?php } ?>
                </div>
            </div>
            <div class="ws_shadow"></div>
        </div>
    </div>
    <!-- End Home Slider -->
    
    <!-- Start Full Width Sections Content -->
    <div id="content" class="full-sections">
    
        <!-- Start Full Width Section 1 -->
        <div class="section" style="padding-top:60px; padding-bottom:30px; border-top:0; border-bottom:0; background:#fff">
            <div class="container">

                <!-- Start Services Icons -->
                <div class="row">
                
                    <!-- Start Service Icon 1 -->
                    <div class="col-md-3 service-box service-center" data-animation="fadeIn" data-animation-delay="01">
                        <div class="service-icon">
                            <i class="icon-leaf-1 icon-medium"></i>
                        </div>
                        <div class="service-content">
                            <h4>ICT Training</h4>
                            <p>Our training courses have been designed on modular bases.For more details please visit <a title="Simple Tooltip" href="#" class="sh-tooltip" data-placement="left">training.bditinstitute.com</a></p>
                            
                        </div>
                    </div>
                    <!-- End Service Icon 1 -->
                    
                    <!-- Start Service Icon 2 -->
                    <div class="col-md-3 service-box service-center" data-animation="fadeIn" data-animation-delay="02">
                        <div class="service-icon">
                            <i class="icon-desktop-2 icon-medium"></i>
                        </div>
                        <div class="service-content">
                            <h4>Higher Education – ATHE</h4>
                            <p>For more details please visit  <a title="Simple Tooltip" href="#" class="sh-tooltip" data-placement="left">bitibd.org</a></p>
                        </div>
                    </div>
                    <!-- End Service Icon 2 -->
                    
                    <!-- Start Service Icon 3 -->
                    <div class="col-md-3 service-box service-center" data-animation="fadeIn" data-animation-delay="03">
                        <div class="service-icon">
                            <i class="icon-headphones icon-medium"></i>
                        </div>
                        <div class="service-content">
                            <h4>BITI Contact Centre</h4>
                            <p>BITI offers a comprehensive set of services and solutions for Contact Centre Operations. <a title="Simple Tooltip" href="#" class="sh-tooltip" data-placement="left">Read More</a></p>
                        </div>
                    </div>
                    <!-- End Service Icon 3 -->
                    
                    <!-- Start Service Icon 4 -->
                    <div class="col-md-3 service-box service-center" data-animation="fadeIn" data-animation-delay="04">
                        <div class="service-icon">
                            <i class="icon-key icon-medium"></i>
                        </div>
                        <div class="service-content">
                            <h4>BITI Security System</h4>
                            <p>BITI provides worldclass and groundbreaking integrated solutions and has invested in its people and products to protect a variety of clients and the client’s assets. <a title="Simple Tooltip" href="#" class="sh-tooltip" data-placement="left">Read More</a></p>
                        </div>
                    </div>
                    <!-- End Service Icon 4 -->

                    <!-- Start Service Icon 5 -->
                    <div class="col-md-3 service-box service-center" data-animation="fadeIn" data-animation-delay="05">
                        <div class="service-icon">
                            <i class="icon-paper-plane icon-medium"></i>
                        </div>
                        <div class="service-content">
                            <h4>Software Development</h4>
                            <p>BITI success story is the outcome of its commitment to maintain a team of fully trained highly developed competent technical personnel <a title="Simple Tooltip" href="#" class="sh-tooltip" data-placement="left">Read More</a></p>
                        </div>
                    </div>
                    <!-- End Service Icon 5 -->
                    
                    <!-- Start Service Icon 6 -->
                    <div class="col-md-3 service-box service-center" data-animation="fadeIn" data-animation-delay="06">
                        <div class="service-icon">
                            <i class="icon-css3 icon-medium"></i>
                        </div>
                        <div class="service-content">
                            <h4>Data Processing</h4>
                            <p>BITI is equipped with state-of-the-art scanners, high speed reliable servers, and hundreds of multi-tasking workstations housed in modern office buildings. <a title="Simple Tooltip" href="#" class="sh-tooltip" data-placement="left">Read More</a></p>
                        </div>
                    </div>
                    <!-- End Service Icon 6 -->

                    <!-- Start Service Icon 5 -->
                    <div class="col-md-3 service-box service-center" data-animation="fadeIn" data-animation-delay="05">
                        <div class="service-icon">
                            <i class="icon-mail icon-medium"></i>
                        </div>
                        <div class="service-content">
                            <h4>Bulk SMS Service</h4>
                            <p>BITI provide Bulk SMS Service. <a title="Simple Tooltip" target="_blank" href="https://www.codagecorp.com/bulk-sms-bangladesh/" class="sh-tooltip" data-placement="left">Read More</a></p>
                        </div>
                    </div>
                    <!-- End Service Icon 5 -->
                    
                    <!-- Start Service Icon 6 -->
                    <div class="col-md-3 service-box service-center" data-animation="fadeIn" data-animation-delay="06">
                        <div class="service-icon">
                            <i class="icon-mobile icon-medium"></i>
                        </div>
                        <div class="service-content">
                            <h4>Mobile Balance Recharge</h4>
                            <p>BITI provide Mobile Balance Recharge. <a title="Simple Tooltip" href="https://we-top-up.com/index.php" target="_blank" class="sh-tooltip" data-placement="left">Read More</a></p>
                        </div>
                    </div>
                    <!-- End Service Icon 6 -->
                
                </div>
                <!-- End Services Icons -->
                
            </div>
        </div>
        <!-- End Full Width Section 1 -->  
        
        <!-- Start Full Width Section 3 -->
        <div class="section" style="padding-top:50px; padding-bottom:25px; border-top:0; border-bottom:0; background:#eeeeee;">
            <div class="container">
            
                <!-- Start Milestone Block 1 -->
                <div class="milestone-block" data-animation="fadeIn" data-animation-delay="01">
                    <div class="milestone-icon"><i class="icon-laptop-1"></i></div>
                    <div class="milestone-right">
                        <div class="milestone-number">40</div>
                        <div class="milestone-text">ICT Course</div>
                    </div>
                </div>
                <!-- End Milestone Block 1 -->
                
                <!-- Start Milestone Block 2 -->
                <div class="milestone-block" data-animation="fadeIn" data-animation-delay="02">
                    <div class="milestone-icon"><i class="icon-users-1"></i></div>
                    <div class="milestone-right">
                        <div class="milestone-number">50</div>
                        <div class="milestone-text">Back Office Support</div>
                    </div>
                </div>
                <!-- End Milestone Block 2 -->
                
                <!-- Start Milestone Block 3 -->
                <div class="milestone-block" data-animation="fadeIn" data-animation-delay="03">
                    <div class="milestone-icon"><i class="icon-smile"></i></div>
                    <div class="milestone-right">
                        <div class="milestone-number">800+</div>
                        <div class="milestone-text">Happy Customers</div>
                    </div>
                </div>
                <!-- End Milestone Block 3 -->
                
                <!-- Start Milestone Block 4 -->
                <div class="milestone-block" data-animation="fadeIn" data-animation-delay="04">
                    <div class="milestone-icon"><i class="icon-users-2"></i></div>
                    <div class="milestone-right">
                        <div class="milestone-number">285</div>
                        <div class="milestone-text">Employee</div>
                    </div>
                </div>
                <!-- End Milestone Block 4 -->
                
                <!-- Start Milestone Block 5 -->
                <div class="milestone-block" data-animation="fadeIn" data-animation-delay="05">
                    <div class="milestone-icon"><i class="icon-headphones-2"></i></div>
                    <div class="milestone-right">
                        <div class="milestone-number">247</div>
                        <div class="milestone-text">Support Center</div>
                    </div>
                </div>
                <!-- End Milestone Block 5 -->
            
            </div>
        </div>
        <!-- End Full Width Section 3 -->
        
        <!-- Start Full Width Section 2 -->
        <div class="section " style="padding-top:60px; padding-bottom: 60px; border-top:1px solid #eee; border-bottom:1px solid #eee; background: url(images/browser-section.jpeg) #f9f9f9;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h1 class="section_title">Latest News</h1>
                            <div class="section_subtitle"><p>BITI offers a comprehensive set of services and solutions for Contact Centre Operations.</p></div>
                        </div>
                    </div>
                </div>
                <div class="row news_row">
                    <div class="col-lg-7 news_col">
                        
                        <!-- News Post Large -->
                        <div class="news_post_large_container">
                            <div class="news_post_large">
                                <div class="news_post_image"><img style="width:623px;height:291px" id="postImg" src="<?php echo base_url(); ?>Assets/images/news_1.jpg" alt=""></div>
                                <div class="news_post_large_title"><a herf="" target="_blank" id="postTitle">Here’s What You Need to Know About Online Testing for the ACT and SAT</a></div>
                                <div class="news_post_meta">
                                    <ul>
                                        <li><a href="#" id="postDate">november 11, 2017</a></li>
                                    </ul>
                                </div>
                                <div class="news_post_text">
                                    <p id="postDesc">Policy analysts generally agree on a need for reform, but not on which path policymakers should take. Can America learn anything from other nations...</p>
                                </div>
                                <div class="news_post_link"><a id="postReadmore" href="" target="_blank">read more</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 news_col news_marquee">
                        <div class="news_posts_small newsTicker">
                            <ul>
                            <?php if(count($news) > 0){
                                foreach($news as $row):?>
                                    <li class="ne_li">
                                        <div class="news_post_small">
                                            <div id="post<?php echo $row['id']; ?>" class="news_post_small_title" title="<?php echo $row['title']; ?>" alt="<?php echo $row['title']; ?>" onclick="getNews(<?php echo $row['id']; ?>);" data-id="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></div>
                                            <div class="news_post_meta">
                                                <ul>
                                                    <li><a href="#"><?php echo date("F j, Y", strtotime($row['publish_date'])); ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach;
                            } ?>
                            <ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Full Width Section 2 -->
        
        
        <!-- Start Full Width Section 4 -->
        <div class="section" style="padding-top:120px; padding-bottom:120px; border-top:1px solid #eee; border-bottom:1px solid #eee; background:#fff;">
            <div class="container">
            
                <!-- Start Video Section Content -->
                <div class="section-video-content text-center">
                
                    <!-- Start Animations Text -->
                    <h1 class="fittext wite-text uppercase tlt">
                        <span class="texts">
                            <span>Modern</span>
                            <span>Professional</span>
                        </span>
                        BITI is Ready for <br>Business, Agency <strong>or</strong> Creative Portfolios
                    </h1>
                    <!-- End Animations Text -->
                    
                    <!-- Divider -->
                    <div class="hr1" style="margin-bottom:32px;"></div>
                    
                    <!-- Start Buttons -->
                    <a href="#" class="btn-system btn-large border-btn btn-wite"><i class="icon-feather"></i> Check Out Services</a>
                    <a href="#" class="btn-system btn-large btn-wite"><i class="icon-download-3"></i> Contact Us</a>
                    
                </div>
                <!-- End Section Content -->
                
                <!-- Start Video -->
                <video class="section-video" poster="images/video/poster.jpg" autoplay="" loop="" preload="none">
                    <!-- MP4 source must come first for iOS -->
                    <source type="video/mp4" src="<?php echo base_url(); ?>Assets/images/video\video.mp4">
                    <!-- WebM for Firefox 4 and Opera -->
                    <source type="video/webm" src="<?php echo base_url(); ?>Assets/images/video\video.webm">
                    <!-- OGG for Firefox 3 -->
                    <source type="video/ogg" src="<?php echo base_url(); ?>Assets/images/video\video.ogv">
                    <!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
                    <object type="application/x-shockwave-flash" data="<?php echo base_url(); ?>Assets/images/video\flashmediaelement.swf"> 		
                        <param name="movie" value="<?php echo base_url(); ?>Assets/images/video\flashmediaelement.swf"> 
                        <param name="flashvars" value="controls=false&amp;file=images/video/flashmediaelement.mp4"> 		
                        <!-- Image fall back for non-HTML5 browser with JavaScript turned off and no Flash player installed -->
                        <img src="<?php echo base_url(); ?>Assets/images/video\poster.jpeg" alt="No Video Image" title="No video playback capabilities">
                    </object> 	
                </video>
                <script>$('.section-video').mediaelementplayer({ loop:true });</script>
                <!-- End Video -->
                
                <!-- Start Video Section overlay -->
                <div class="section-overlay"></div>
                
            </div>
        </div>
        <!-- End Full Width Section 4 -->
        
        
        <!-- Start Full Width Section 5 -->
        <div class="section" style="padding-top:60px; padding-bottom:60px; border-top:0; border-bottom:0; background:#fff;">
            
                <!-- Start Big Heading -->
                <div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
                    <h1>This is Our Latest <strong>Work</strong></h1>
                </div>
                <!-- End Big Heading -->
                
                <p class="text-center">BITI offers a comprehensive set of services and solutions for Contact Centre Operations.</p>
                
                <!-- Divider -->
                <div class="hr1" style="margin-bottom:25px;"></div>
                        
                <!-- Start Recent Projects Carousel -->
                <div class="full-width-recent-projects">
                    <div class="projects-carousel touch-carousel navigation-3">
                    <?php if(count($works) > 0){
                        foreach($works as $row):
                            if($row['type'] == 'vdo'){

                                $vdoID = explode("/",$row['link']);
                    ?>
                                <!-- Start Project Item -->
                                <div class="portfolio-item item">
                                    <div class="portfolio-border">
                                        <!-- Start Project Thumb -->
                                        <div class="portfolio-thumb">
                                            <a class="lightbox" data-lightbox-type="iframe"  href="<?php echo $row['link']; ?>">
                                                <div class="thumb-overlay"><i class="icon-video-1"></i></div>
                                                <img style="height: 250px;" alt="" src="https://img.youtube.com/vi/<?php echo $vdoID[4]; ?>/0.jpg">
                                            </a>
                                        </div>
                                        <!-- End Project Thumb -->
                                        <!-- Start Project Details -->
                                        <div class="portfolio-details">
                                            <a href="#">
                                                <h4><?php echo $row['title']; ?></h4>
                                                <span><?php echo $row['cat']; ?></span>
                                            </a>
                                        </div>
                                        <!-- End Project Details -->
                                    </div>
                                </div>
                                <!-- End Project Item -->
                    <?php   }else if($row['type'] == 'img'){ ?>  
                                <!-- Start Project Item -->
                                <div class="portfolio-item item">
                                    <div class="portfolio-border">
                                        <!-- Start Project Thumb -->
                                        <div class="portfolio-thumb">
                                            <a class="lightbox" title="<?php echo $row['title']; ?>" href="<?php echo base_url(); ?>admin/uploads/<?php echo $row['image']; ?>">
                                                <div class="thumb-overlay"><i class="icon-resize-full"></i></div>
                                                <img style="height: 250px;" alt="" src="<?php echo base_url(); ?>admin/uploads/<?php echo $row['image']; ?>">
                                            </a>
                                        </div>
                                        <!-- End Project Thumb -->
                                        <!-- Start Project Details -->
                                        <div class="portfolio-details">
                                            <a href="#">
                                            <h4><?php echo $row['title']; ?></h4>
                                                <span><?php echo $row['cat']; ?></span>
                                            </a>
                                        </div>
                                        <!-- End Project Details -->
                                    </div>
                                </div>
                                <!-- End Project Item -->
                    <?php   } 
                            endforeach;
                    } ?>
                       
                     </div>
                </div>
                <!-- End Recent Projects Carousel -->
                
                <!-- Divider -->
                <div class="hr1" style="margin-bottom:35px;"></div>
                
                <!-- Link To Portfolio -->
                <div class="text-center"><a href="<?php echo base_url('Portfolio'); ?>" class="btn-system btn-large border-btn"><i class="icon-brush"></i> View Full Portfolio</a></div>
                
        </div>
        <!-- End Full Width Section 5 -->
        
        <!-- Start Full Width Section 7 -->
        <div class="section" style="padding-top:60px; padding-bottom:40px; border-top:1px solid #eee; border-bottom:1px solid #eee; background:#fff;">
            <div class="container">
            
                <!-- Start Big Heading -->
                <div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
                    <!-- <p class="title-desc">We Make Your Smile</p> -->
                    <h1>Our Well <strong>Wishers</strong></h1>
                </div>
                <!-- End Big Heading -->
                
                <!-- Divider -->
                <div class="hr1" style="margin-bottom:50px;"></div>
                
                <!-- Start Clients Carousel -->
                <div class="row">
                <div class="col-lg-8">
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
                </div>
                <div class="col-lg-4">
                    <div class="our-exam">
                        
                        <!-- Classic Heading -->
                        <h4 class="classic-title"><span>Exam Center</span></h4>
                        
                        <div class="clients-carousel custom-carousel touch-carousel" data-appeared-items="2">
                        
                            <!-- Client 8 -->
                            <div class="client-item item">
                                <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c9.png" alt=""></a>
                            </div>
                            
                            <!-- Client 8 -->
                            <div class="client-item item">
                                <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c10.png" alt=""></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                </div>
                
                <!-- End Clients Carousel -->
            
            </div>
        </div>
        <!-- End Full Width Section 6 -->

    
    </div>
    <!-- End Full Width Sections Content -->
    
    <!-- Start Footer -->
    <?php include('partials/foot.php'); ?>
    <!-- End Footer -->
    
</div>
<!-- End Container -->
<?php include('partials/footer.php'); ?>

<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/wowslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/wowscript.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/moment.min.js"></script>
<script>
var base_url = '<?php echo base_url(); ?>';
var banners = <?php echo json_encode($news); ?>;

var newsArray = [];

$(document).ready(function(){
    
    $('.news_post_small_title').each((k,v)=>{
        if(newsArray.indexOf($(v).attr('data-id')) === -1){
            newsArray.push($(v).attr('data-id'));
        }
    });

    newsSticker();
});

var curNewsIndex = -1;

function getNews(id){
    
    
    if(banners.length > 0){
        $.each(banners,function(k,v){
            console.log(v);
            if(v.id == id){
                
                var data_st = v;
                $("#postImg").attr('src',base_url+'admin/uploads/'+data_st.image);
                
                $("#postTitle").text(data_st.title);

                $(".news_post_small_title").css('color','#384158');
                
                $("#post"+id).css('color','#00afd1');

                $("#postDesc").text(data_st.description);
                $("#postDate").text(moment(data_st.publish_date).format('LL'));
                if(data_st.link == ""){
                    $("#postReadmore").attr('href',base_url+'News/'+data_st.id);
                    $("#postTitle").attr('href',base_url+'News/'+data_st.id);
                }else{
                    $("#postReadmore").attr('href',data_st.link);
                    $("#postTitle").attr('href',data_st.link);
                }
            }
        });
    }
    
}

</script>

<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/jquery.easy-ticker.js"></script>

<script>

function newsSticker(){
    $('.newsTicker').easyTicker({
        direction: 'up',
        visible: 5,
        interval: 5000,
        easing: 'swing'
    });

    setInterval(function() {
        ++curNewsIndex;
        if (curNewsIndex >= newsArray.length) {
            curNewsIndex = 0;
        }
        getNews(newsArray[curNewsIndex]);   // set new news item into the ticker
    }, 7000);
}
</script>
<!-- thank you Modal -->

<button type="button" id="moaa" class="btn btn-primary" data-toggle="modal" data-target="#thanksModal" style="display:none"></button>

<div class="modal fade text-center py-5" style="padding-top: 5% !important;" id="thanksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" >&times;</button>
            </div>
            <div class="modal-body">
                <img src="<?php echo base_url(); ?>Assets/images/logo1.png" class="modal-img">
                <?php if(count($popup) > 0){
                    foreach($popup as $row):
                        if($row['type'] == 'vdo'){
                    ?>
                        <iframe class="iframe_vdo" width="560" height="315" src="<?php echo $row['link']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php   }else if($row['type'] == 'img'){ ?>  
                        <img class="" style="width:560px; height: 315px" src="<?php echo base_url(); ?>admin/uploads/<?php echo $row['image']; ?>"  />
                    <?php } ?>

                <?php  endforeach; } ?>
                <a role="button" class="btn btn-secondary text-white mb-3" href="http://www.bditinstitute.com/" target="_blank">www.bditinstitute.com</a>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if(count($popup) > 0){ ?>
        $(document).ready(function(){
            $("#moaa").click();
        });
    <?php } ?>
</script>
<script>

$('.close').click(function(e) {
  e.preventDefault();
  $("#thanksModal").modal('hide');
  $('.iframe_vdo').attr('src', '');
});

</script>
<!-- ./thank you Modal -->
