<?php include('partials/header.php'); ?>
<!-- Carrer CSS  -->
<link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/m_style.css" type="text/css" media="screen">
  
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
    <div class="page-banner" style="height:200px;padding:40px 0; background: url(<?php echo base_url(); ?>admin/uploads/webportal-banner.jpg) center #f9f9f9;">
        <div class="inner-header-caption">
            <h1 style="text-shadow: 2px 2px 2px #000000;">WORKING AT BANGLADESH IT INSTITUTE (BITI)</h1>
            <ul class="breadcrumb">
                <li><a href="index-1.html"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Carrer</a></li>
            </ul>
        </div>
    </div>

    <?php if($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger" role="alert" style="font-size: 20px; text-align: center;">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>

    <?php if($this->session->flashdata('success')) { ?>
        <div class="alert alert-success" role="alert" style="font-size: 20px; text-align: center;">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } ?>
    <!-- End Page Banner -->
    
    <!-- Start Content -->
    <div id="content">
        <section class="working">
            <div class="container">
                <h2 class="title uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-top" >WORKING AT BANGLADESH IT INSTITUTE (BITI)</h2>
                <div class="working-cont">
                    <p class="uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-bottom">We believe in openness and fairness in leadership and aim to create the best possible working environment for the greatest<br>
                    resource we have.In people we appreciate continuous self-development and braveness.
                    </p>
                </div>
            </div>
        </section>
        <section class="join">
            <div class="container">
                <h2 class="title uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-top" >WHY YOU SHOULD JOIN WITH US</h2>
                <div class="row">
                    <div class="joinIn">
                        <div class="join-boxIn">
                            <div class="join-box uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-scale-up"> <span>&nbsp;</span> <img src="<?php echo base_url(); ?>Assets/images/join-1.png" alt=""> <img class="join-hover" src="<?php echo base_url(); ?>Assets/images/joinh-1.png" alt=""> </div>
                            <h4 class="uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-bottom">Environment</h4>
                        </div>
                    </div>
                    <div class="joinIn">
                        <div class="join-boxIn">
                            <div class="join-box uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-scale-up" > <span>&nbsp;</span> <img src="<?php echo base_url(); ?>Assets/images/join-2.png" alt=""> <img class="join-hover" src="<?php echo base_url(); ?>Assets/images/joinh-2.png" alt=""> </div>
                            <h4 class="uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-bottom">Training</h4>
                        </div>
                    </div>
                    <div class="joinIn">
                        <div class="join-boxIn">
                            <div class="join-box uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-scale-up" > <span>&nbsp;</span> <img src="<?php echo base_url(); ?>Assets/images/join-3.png" alt=""> <img class="join-hover" src="<?php echo base_url(); ?>Assets/images/joinh-3.png" alt=""> </div>
                            <h4 class="uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-bottom">Career Growth</h4>
                        </div>
                    </div>
                    <div class="joinIn">
                        <div class="join-boxIn">
                            <div class="join-box uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-scale-up" > <span>&nbsp;</span> <img src="<?php echo base_url(); ?>Assets/images/join-4.png" alt=""> <img class="join-hover" src="<?php echo base_url(); ?>Assets/images/joinh-4.png" alt=""> </div>
                            <h4 class="uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-bottom">Agility</h4>
                        </div>
                    </div>
                    <div class="joinIn">
                        <div class="join-boxIn">
                            <div class="join-box uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-scale-up"> <span>&nbsp;</span> <img src="<?php echo base_url(); ?>Assets/images/join-5.png" alt=""> <img class="join-hover" src="<?php echo base_url(); ?>Assets/images/joinh-5.png" alt=""> </div>
                            <h4 class="uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-bottom">Benefits</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="position">
            <div class="container">
                <h2 class="title uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-top" >Available Positions</h2>
                <div class="position-cont">
                    <?php if(count($joblist) > 0){ foreach($joblist as $row): ?>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel position-box uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-bottom" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:200}">
                                <div class="panel-heading" role="tab" id="heading<?php echo$row['job_id'] ?>">
                                    <div class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo$row['job_id'] ?>" aria-expanded="false" aria-controls="collapse<?php echo$row['job_id'] ?>">
                                        <h2><?php echo $row['title']; ?></h2>
                                        <div class="title-btm"> 
                                            <span>Date published: <?php echo date('F j, Y', strtotime($row['post_date'])); ?></span> 
                                            <span>Expire Date: <?php echo date('F j, Y', strtotime($row['exp_date'])); ?></span> 
                                            <span><?php echo $row['job_location']; ?></span> 
                                        </div>
                                        </a> 
                                    </div>
                                </div>
                                <div id="collapse<?php echo$row['job_id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo$row['job_id'] ?>">
                                    <div class="panel-body">
                                        <div class="jobd-dtls">
                                            <h3>Job Nature:</h3>
                                            <div class="jobd-dtlsIn">
                                                <ul>
                                                    <li><?php echo $row['job_nature']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jobd-dtls">
                                            <h3>Job Vacancies:</h3>
                                            <div class="jobd-dtlsIn">
                                                <ul>
                                                    <li><?php echo $row['vacancies']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jobd-dtls">
                                            <h3>Job DETAILS:</h3>
                                            <div class="jobd-dtlsIn">
                                                <ul>
                                                <?php $job_desc = $this->db->get_where('job_desc',array('job_id =' => $row['job_id']))->result_array();
                                                if(count($job_desc) > 0){ foreach($job_desc as $jrow): ?>
                                                    <li><?php echo $jrow['description']; ?></li>
                                                <?php endforeach; } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jobd-dtls">
                                            <h3>Educational Requirements:</h3>
                                            <div class="jobd-dtlsIn">
                                                <ul>
                                                    <?php $edu_req = $this->db->get_where('edu_req',array('job_id =' => $row['job_id']))->result_array();
                                                    if(count($job_desc) > 0){ foreach($edu_req as $erow): ?>
                                                        <li><?php echo $erow['requ']; ?></li>
                                                    <?php endforeach; } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jobd-dtls">
                                            <h3>key requirements:</h3>
                                            <div class="jobd-dtlsIn">
                                                <ul>
                                                    <?php $ex_req = $this->db->get_where('ex_req',array('job_id =' => $row['job_id']))->result_array();
                                                    if(count($job_desc) > 0){ foreach($ex_req as $exrow): ?>
                                                        <li><?php echo $exrow['experience']; ?></li>
                                                    <?php endforeach; } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jobd-dtls">
                                            <h3>Additional Requirements:</h3>
                                            <div class="jobd-dtlsIn">
                                                <ul>
                                                    <?php $additional_req = $this->db->get_where('additional_req',array('job_id =' => $row['job_id']))->result_array();
                                                    if(count($job_desc) > 0){ foreach($additional_req as $adrow): ?>
                                                        <li><?php echo $adrow['requirement']; ?></li>
                                                    <?php endforeach; } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jobd-dtls">
                                            <h3>Benefits:</h3>
                                            <div class="jobd-dtlsIn">
                                                <ul>
                                                    <?php $benefit = $this->db->get_where('benefit',array('job_id =' => $row['job_id']))->result_array();
                                                    if(count($job_desc) > 0){ foreach($benefit as $brow): ?>
                                                        <li><?php echo $brow['benefit']; ?></li>
                                                    <?php endforeach; } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="jobd-dtls">
                                            <h3>Salary:</h3>
                                            <div class="jobd-dtlsIn">
                                                <ul>
                                                    <li><?php echo $row['salary']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <h2 class="form-title">Send your resume now!</h2>
                                        <div class="job-apply">
                                            <div id="apply1_upload_form_response" align="center"></div>
                                            <div id="apply1_upload_process" align="center"></div>
                                            <form class="form-horizontal" method="post" id="apply-form1" action="<?php echo base_url();?>carrer/apply/<?php echo $row['job_id'];?>" enctype="multipart/form-data" >
                                                <!-- <p id="apply1_upload_process">Loading...<br/><img src="loader.gif" /><br/></p> -->
                                                
                                                <div class="wrap-input">
                                                    <input class="input-field" type="text" id="apply1-name" name="name" autocomplete="off" required>
                                                    <span class="focus-input" data-placeholder="Full Name"></span>
                                                    <div style="color:red;" class="error text-left" id="err-apply1-name">Please enter name.</div>
                                                </div>
                                                <div class="wrap-input">
                                                    <input class="input-field" type="text" id="apply1-email" name="email" autocomplete="off" required>
                                                    <span class="focus-input" data-placeholder="Email"></span>
                                                    <div style="color:red;" class="error left-align" id="err-apply1-email">Please enter email.</div>
                                                </div>
                                                <div class="wrap-input">
                                                    <input class="input-field" type="text" id="apply1-phone" name="phone" autocomplete="off" required>
                                                    <span class="focus-input" data-placeholder="Phone Number"></span>
                                                    <div style="color:red;" class="error left-align" id="err-apply1-phone">Please enter phone.</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-file-container">
                                                            <input class="input-file" id="myfile1" name="myfile1" type="file" required>
                                                            <label tabindex="0" for="my-file" class="input-file-trigger">
                                                                <figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                                                    </svg></figure>
                                                            </label>
                                                        </div>
                                                        <div class="cv-info"> <strong>UPLOAD A CV</strong> <span>PDF, Doc, Docx, JPG</span> </div>
                                                        <p class="file-return" id="file1-return"></p>
                                                        <div style="color:red;" class="error text-left" id="err-apply1-file">please attach a valid file.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group input-group-icon">
                                                            <input type="submit" class="cta-btn" value="APPLY NOW">
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php  endforeach; } ?>
                    
                </div>
            </div>
        </section>
    </div>
    <!-- End content -->
    <!-- Start Footer -->
    <?php include('partials/foot.php'); ?>
    <!-- End Footer -->
    
</div>
<!-- End Container -->
<?php include('partials/footer.php'); ?>