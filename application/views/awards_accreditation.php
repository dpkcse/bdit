
<?php include('partials/header.php'); ?>
<style>

.dialog {
    display:none;
    position: fixed;
    width: auto;
    height: auto;
    float: left;
    background-color: #ffffff;
    color: #1d1d1d;
    z-index: 9999999;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.3);
    text-align: center;
}

.dialog .dialog-close-button:after {
    border-color: #777777;
    content: '\D7';
    line-height: 1;
}

.dialog .dialog-close-button {
    position: absolute;
    height: 1.5rem;
    width: 1.5rem;
    min-height: 1.5rem;
    text-align: center;
    vertical-align: middle;
    font-size: 1rem;
    font-weight: normal;
    padding: .125rem 0 .625rem 0;
    z-index: 3;
    outline: none;
    cursor: pointer;
    background-color: #ffffff;
    color: #777777;
    top: .25rem;
    right: .25rem;
}

.dialog img {
    max-width: 100%;
    height: auto;
    border: 0;
    width: 43%;
}
a{text-decoration:none}
h4{text-align:center;margin:30px 0;color:#444}
.main-timeline{position:relative}
.main-timeline:before{content:"";width:5px;height:100%;border-radius:20px;margin:0 auto;background:#242922;position:absolute;top:0;left:0;right:0}
.main-timeline .timeline{display:inline-block;margin-bottom:50px;position:relative}
.main-timeline .timeline:before{content:"";width:20px;height:20px;border-radius:50%;border:4px solid #fff;background:#ec496e;position:absolute;top:50%;left:50%;z-index:1;transform:translate(-50%,-50%)}
.main-timeline .timeline-icon img{
    width: 200px;
    height: 170px;
    border-radius: 50%;
}
.main-timeline .timeline-icon{    
    display: inline-block;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: 3px solid #ec496e;
    padding: 13px;
    text-align: center;
    position: absolute;
    top: 53%;
    left: 24%;
    transform: translateY(-50%);
}
.main-timeline .timeline-icon i{display:block;border-radius:50%;background:#ec496e;font-size:64px;color:#fff;line-height:100px;z-index:1;position:relative}
.main-timeline .timeline-icon:after,.main-timeline .timeline-icon:before{content:"";width:100px;height:4px;background:#ec496e;position:absolute;top:50%;right:-100px;transform:translateY(-50%)}

.main-timeline .timeline-icon:after{
    width: 70px;
    height: 50px;
    background: #fff;
    top: 70px;
    right: -59px;
}
.main-timeline .timeline-content{width:50%;padding:0 50px;margin:52px 0 0;float:right;position:relative}
.main-timeline .timeline-content:before{content:"";width:70%;height:100%;border:3px solid #ec496e;border-top:none;border-right:none;position:absolute;bottom:-13px;left:35px}
.main-timeline .timeline-content:after{content:"";width:37px;height:3px;background:#ec496e;position:absolute;top:13px;left:0}
.main-timeline .title{font-size:20px;font-weight:600;color:#ec496e;text-transform:uppercase;margin:0 0 5px}
.main-timeline .description{display:inline-block;font-size:16px;color:#404040;line-height:20px;letter-spacing:1px;margin:0}

.main-timeline .timeline:nth-child(even) .timeline-icon{
    left: auto;
    right: 24%;
}
.main-timeline .timeline:nth-child(even) .timeline-icon:before{right:auto;left:-100px}
.main-timeline .timeline:nth-child(even) .timeline-icon:after{right:auto;left:-61px}
.main-timeline .timeline:nth-child(even) .timeline-content{float:left}
.main-timeline .timeline:nth-child(even) .timeline-content:before{left:auto;right:35px;transform:rotateY(180deg)}
.main-timeline .timeline:nth-child(even) .timeline-content:after{left:auto;right:0}
.main-timeline .timeline:nth-child(2n) .timeline-content:after,.main-timeline .timeline:nth-child(2n) .timeline-icon i,.main-timeline .timeline:nth-child(2n) .timeline-icon:before,.main-timeline .timeline:nth-child(2n):before{background:#f9850f}
.main-timeline .timeline:nth-child(2n) .timeline-icon{border-color:#f9850f}
.main-timeline .timeline:nth-child(2n) .title{color:#f9850f}
.main-timeline .timeline:nth-child(2n) .timeline-content:before{border-left-color:#f9850f;border-bottom-color:#f9850f}
.main-timeline .timeline:nth-child(3n) .timeline-content:after,.main-timeline .timeline:nth-child(3n) .timeline-icon i,.main-timeline .timeline:nth-child(3n) .timeline-icon:before,.main-timeline .timeline:nth-child(3n):before{background:#8fb800}
.main-timeline .timeline:nth-child(3n) .timeline-icon{border-color:#8fb800}
.main-timeline .timeline:nth-child(3n) .title{color:#8fb800}
.main-timeline .timeline:nth-child(3n) .timeline-content:before{border-left-color:#8fb800;border-bottom-color:#8fb800}
.main-timeline .timeline:nth-child(4n) .timeline-content:after,.main-timeline .timeline:nth-child(4n) .timeline-icon i,.main-timeline .timeline:nth-child(4n) .timeline-icon:before,.main-timeline .timeline:nth-child(4n):before{background:#2fcea5}
.main-timeline .timeline:nth-child(4n) .timeline-icon{border-color:#2fcea5}
.main-timeline .timeline:nth-child(4n) .title{color:#2fcea5}
.main-timeline .timeline:nth-child(4n) .timeline-content:before{border-left-color:#2fcea5;border-bottom-color:#2fcea5}

@media only screen and (max-width:1200px){
    .main-timeline .timeline-icon:before{width:50px;right:-50px}
    .main-timeline .timeline:nth-child(even) .timeline-icon:before{right:auto;left:-50px}
    .main-timeline .timeline-content{margin-top:75px}
}

@media only screen and (max-width:990px){
    .main-timeline .timeline{margin:0 0 10px}
    .main-timeline .timeline-icon{left:25%}
    .main-timeline .timeline:nth-child(even) .timeline-icon{right:25%}
    .main-timeline .timeline-content{margin-top:115px}
}

@media only screen and (max-width:767px){
    .main-timeline{padding-top:50px}
    .main-timeline:before{left:80px;right:0;margin:0}
    .main-timeline .timeline{margin-bottom:70px}
    .main-timeline .timeline:before{top:0;left:83px;right:0;margin:0}
    .main-timeline .timeline-icon{width:60px;height:60px;line-height:40px;padding:5px;top:0;left:0}
    .main-timeline .timeline:nth-child(even) .timeline-icon{left:0;right:auto}
    .main-timeline .timeline-icon:before,.main-timeline .timeline:nth-child(even) .timeline-icon:before{width:25px;left:auto;right:-25px}
    .main-timeline .timeline-icon:after,.main-timeline .timeline:nth-child(even) .timeline-icon:after{width:25px;height:30px;top:44px;left:auto;right:-5px}
    .main-timeline .timeline-icon i{font-size:30px;line-height:45px}
    .main-timeline .timeline-content,.main-timeline .timeline:nth-child(even) .timeline-content{width:100%;margin-top:-15px;padding-left:130px;padding-right:5px}
    .main-timeline .timeline:nth-child(even) .timeline-content{float:right}
    .main-timeline .timeline-content:before,.main-timeline .timeline:nth-child(even) .timeline-content:before{width:50%;left:120px}
    .main-timeline .timeline:nth-child(even) .timeline-content:before{right:auto;transform:rotateY(0)}
    .main-timeline .timeline-content:after,.main-timeline .timeline:nth-child(even) .timeline-content:after{left:85px}
}

@media only screen and (max-width:479px){
    .main-timeline .timeline-content,.main-timeline .timeline:nth-child(2n) .timeline-content{padding-left:110px}
    .main-timeline .timeline-content:before,.main-timeline .timeline:nth-child(2n) .timeline-content:before{left:99px}
    .main-timeline .timeline-content:after,.main-timeline .timeline:nth-child(2n) .timeline-content:after{left:65px}
}

</style>
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
                    <h2>Awards & Accreditation</h2>
                    <p>We Are Professional</p>
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>Awards & Accreditation</li>
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
                
                <div class="container">
                    <h4>Awards & Accreditation</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-timeline">
                                <a href="#" class="timeline">
                                    <div class="timeline-icon"><img  onclick="showDialog('BACCO_402.17.199_2018.jpg')" src="<?php echo base_url(); ?>Assets/images/Awards_Accreditation/BACCO_402.17.199_2018.jpg" /></div>
                                    <div class="timeline-content">
                                        <h3 class="title">BACCO</h3>
                                        <p class="description">
                                            
                                            Bangladesh Association of Call Center & Outsourcing 
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </p>
                                    </div>
                                </a>
                                <a href="#" class="timeline">
                                    <div class="timeline-icon"><img  onclick="showDialog('Bangladesh_IT_Institute91.jpg')" src="<?php echo base_url(); ?>Assets/images/Awards_Accreditation/Bangladesh_IT_Institute91.jpg" /></div>
                                    <div class="timeline-content">
                                        <h3 class="title">TNV UK</h3>
                                        <p class="description">
                                            TNV UK Ltd is a Conformity Assessment Body accredited by AB-CAB.
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                        </p>
                                    </div>
                                </a>
                                <a href="#" class="timeline">
                                    <div class="timeline-icon"><img onclick="showDialog('BASIS_G927_2018.jpg')" src="<?php echo base_url(); ?>Assets/images/Awards_Accreditation/BASIS_G927_2018.jpg" /></div>
                                    <div class="timeline-content">
                                        <h3 class="title">BASIS</h3>
                                        <p class="description">
                                            Bangladesh Association of Software and Information Services 
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </p>
                                    </div>
                                </a>
                                <a href="#" class="timeline">
                                    <div class="timeline-icon"><img onclick="showDialog('BTRC_Int.CC.jpg')" src="<?php echo base_url(); ?>Assets/images/Awards_Accreditation/BTRC_Int.CC.jpg" /></div>
                                    <div class="timeline-content">
                                        <h3 class="title">BTRC</h3>
                                        <p class="description">
                                            Bangladesh Telecommunication Regulatory Commission
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </p>
                                    </div>
                                </a>
                                <a href="#" class="timeline">
                                    <div class="timeline-icon"><img  onclick="showDialog('rsz_1athecertificate-biti.png')" src="<?php echo base_url(); ?>Assets/images/Awards_Accreditation/rsz_1athecertificate-biti.png" /></div>
                                    <div class="timeline-content">
                                        <h3 class="title">ATHE </h3>
                                        <p class="description">
                                            
                                            Awards for Training and Higher Education 
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </p>
                                    </div>
                                </a>
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
                    
                        <!-- Client 1 -->
                        <div class="client-item item">
                            <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c1.png" alt=""></a>
                        </div>
                        
                        <!-- Client 2 -->
                        <div class="client-item item">
                            <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c2.png" alt=""></a>
                        </div>
                        
                        <!-- Client 3 -->
                        <div class="client-item item">
                            <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c3.png" alt=""></a>
                        </div>
                        
                        <!-- Client 4 -->
                        <div class="client-item item">
                            <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c4.png" alt=""></a>
                        </div>
                        
                        <!-- Client 5 -->
                        <div class="client-item item">
                            <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c5.png" alt=""></a>
                        </div>
                        
                        <!-- Client 6 -->
                        <div class="client-item item">
                            <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c6.png" alt=""></a>
                        </div>
                        
                        <!-- Client 7 -->
                        <div class="client-item item">
                            <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c7.png" alt=""></a>
                        </div>
                        
                        <!-- Client 8 -->
                        <div class="client-item item">
                            <a href="#"><img src="<?php echo base_url(); ?>Assets/images/clients/c8.png" alt=""></a>
                        </div>
                        
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

<div class="dialog" id="dialog" style="background: rgba(0, 0, 0, 0.8); color: rgb(253, 253, 253); width: 75%; height: 100%; left: 187px; top: 0px; visibility: visible;">
    <img src="assets/images/awards/wef.jpg">
    <div class="padding5"></div>
    <!-- <div class="sub-alt-header">World Economic Forum</div> -->
    <span class="dialog-close-button" onclick="closeDialog()"></span>
</div>

<script>
    var img_url = '<?php echo base_url(); ?>Assets/images/Awards_Accreditation/';
	function showDialog(id){
		var dialog = $('#dialog');
        $('#dialog img').attr('src',img_url+id);
		dialog.show();
	}

    function closeDialog(){
        var dialog = $('#dialog');
        dialog.hide();
    }
</script>
