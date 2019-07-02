<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Job Detail Edit";?>
            	</div>
          </div>
			<div class="panel-body">
				<div class="col-lg-12 modalBody">
				    <!-- text input -->
                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/title/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="title" class="col-sm-3 control-label"><?php echo 'Title';?></label>
                            <div class="col-sm-6">
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter ..." value="<?php echo $job_detail[0]->title; ?>">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/nov/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="nov" class="col-sm-3 control-label">No. of  Vacancies</label>
                            <div class="col-sm-6">
                                <input type="text" name="nov" id="nov" class="form-control" placeholder="Enter ..." value="<?php echo $job_detail[0]->vacancies; ?>">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/category/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="category" class="col-sm-3 control-label">Job Category</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="category" id="category">
                                    <option value="Accounting" <?php echo ($job_detail[0]->category == 'Accounting' ? 'selected':'') ?>>Accounting</option>
                                    <option value="Marketing" <?php echo ($job_detail[0]->category == 'Marketing' ? 'selected':'') ?>>Marketing</option>
                                    <option value="Engineering" <?php echo ($job_detail[0]->category == 'Engineering' ? 'selected':'') ?>>Engineering</option>
                                    <option value="Administrative" <?php echo ($job_detail[0]->category == 'Administrative' ? 'selected':'') ?>>Administrative</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/jobrespon/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="jobrespon" class="col-sm-3 control-label">Job Description / Responsibility </label>
                            <div class="col-sm-6">
                                <div id="jobrespondiv">
                                <?php
                                    if ($job_desc != "") {
                                        foreach ($job_desc as $key => $value) {
                                        ?>
                                        <input name="jobrespon[]" value="<?php  echo $job_desc[$key]->description; ?>" id="jobrespon" class="form-control form-group jobrespon<?php echo $key; ?>" type="text" placeholder="Job Description / Responsibility" style="width:90%;float: left;">

                                        <span onclick='$(".jobrespon<?php echo $key; ?>").remove(); $(this).remove();' class="btn btn-danger" style="margin-left: 1%; float: left;"><i class="fa fa-trash"></i></span>
                                        <?php
                                        
                                        }
                                    }
                                    
                                ?>
                                    
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <span class="btn btn-primary fa fa-plus" onClick="addextra('respon')"></span>
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/jobna/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="jobna" class="col-sm-3 control-label">Job Nature</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="jobna">
                                    <option value="Full Time"  <?php echo ($job_detail[0]->job_nature == 'Full Time' ? 'selected':'') ?>>Full Time</option>
                                    <option value="Part Time"  <?php echo ($job_detail[0]->job_nature == 'Part Time' ? 'selected':'') ?>>Part Time</option>
                                    <option value="Contructual"  <?php echo ($job_detail[0]->job_nature == 'Contructual' ? 'selected':'') ?>>Contructual</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/jobedureq/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="jobedureq" class="col-sm-3 control-label">Educational Requirements </label>
                            <div class="col-sm-6">
                                <div id="jobedureqdiv">
                                <?php
                                    if ($edu_req != "") {
                                        foreach ($edu_req as $key => $value) {
                                        ?>
                                        <input name="jobedureq[]" id="jobedureq" value="<?php  echo $edu_req[$key]->requ; ?>" class="form-control form-group jobedureq<?php echo $key; ?>" type="text" placeholder="Educational Requirements" style="width:90%;float: left;">

                                        <span onclick='$(".jobedureq<?php echo $key; ?>").remove(); $(this).remove();' class="btn btn-danger" style="margin-left: 1%; float: left;"><i class="fa fa-trash"></i></span>

                                        <?php
                                        
                                        }
                                    }
                                    
                                ?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <span class="btn btn-primary fa fa-plus" onClick="addextra('edureq')"></span>
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/jobexpreq/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="jobexpreq" class="col-sm-3 control-label">Experience Requirements </label>
                            <div class="col-sm-6">
                                <div id="jobexpreqdiv">
                                <?php
                                    if ($ex_req != "") {
                                        foreach ($ex_req as $key => $value) {
                                        ?>
                                            <input name="jobexpreq[]" value="<?php  echo $ex_req[$key]->experience; ?>"  id="jobexpreq" class="form-control form-group jobexpreq<?php echo $key; ?>" type="text" placeholder="Experience Requirements" style="width:90%;float: left;">

                                            <span onclick='$(".jobexpreq<?php echo $key; ?>").remove(); $(this).remove();' class="btn btn-danger" style="margin-left: 1%; float: left;"><i class="fa fa-trash"></i></span>
                                        <?php
                                        
                                        }
                                    }
                                    
                                ?>
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <span class="btn btn-primary fa fa-plus" onClick="addextra('expreq')"></span>
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/jobaddreq/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="jobaddreq" class="col-sm-3 control-label">Additional Job Requirements </label>
                            <div class="col-sm-6">
                                <div id="jobaddreqdiv">
                                <?php
                                    if ($additional_req != "") {
                                        foreach ($additional_req as $key => $value) {
                                        ?>
                                            <input name="jobaddreq[]" id="jobaddreq" value="<?php  echo $additional_req[$key]->requirement; ?>" class="form-control form-group jobaddreq<?php echo $key; ?>" type="text" placeholder="Additional Job Requirements" style="width:90%;float: left;">

                                            <span onclick='$(".jobaddreq<?php echo $key; ?>").remove(); $(this).remove();' class="btn btn-danger" style="margin-left: 1%; float: left;"><i class="fa fa-trash"></i></span>
                                        <?php
                                        
                                        }
                                    }
                                    
                                ?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <span class="btn btn-primary fa fa-plus" onClick="addextra('addreq')"></span>
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/jobloc/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="jobloc" class="col-sm-3 control-label">Job Location</label>
                            <div class="col-sm-6">
                                <input type="text" name="jobloc" id="jobloc" class="form-control" placeholder="Job Location"  value="<?php echo $job_detail[0]->job_location; ?>">
                            </div>
                            
                            <div class="col-sm-2">
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/salrang/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="salrang" class="col-sm-3 control-label">Salary Range</label>
                            <div class="col-sm-6">
                                <input type="text" name="salrang" id="salrang" class="form-control" placeholder="Salary Range"  value="<?php echo $job_detail[0]->salary; ?>">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/jobothreq/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="jobothreq" class="col-sm-3 control-label">Other Benefits </label>
                            <div class="col-sm-6">
                                <div id="jobothreqdiv">
                                <?php
                                    if ($benefit != "") {
                                        foreach ($benefit as $key => $value) {
                                        ?>
                                            <input name="jobothreq[]" id="jobothreq" class="form-control form-group jobothreq<?php echo $key; ?>" type="text" placeholder="Other Benefits" value="<?php echo $benefit[$key]->benefit; ?>" style="width:90%;float: left;">
                                            
                                            <span onclick='$(".jobothreq<?php echo $key; ?>").remove(); $(this).remove();' class="btn btn-danger" style="margin-left: 1%; float: left;"><i class="fa fa-trash"></i></span>
                                        <?php
                                        
                                        }
                                    }
                                    
                                ?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <span class="btn btn-primary fa fa-plus" onClick="addextra('othreq')"></span>
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>

                    <div class="form-group">
                        <form action="<?php echo base_url('carrer/jodedit/exp_date/'.$job_detail[0]->job_id)?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
                            <label for="exp_date" class="col-sm-3 control-label">Expire Date</label>
                            <div class="col-sm-6">
                                <input type="text" name="exp_date" id="exp_date" class="form-control" placeholder="Enter ..." value="<?php echo $job_detail[0]->exp_date; ?>">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Update');?></button>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
        </div>
    </div>
</div>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script type="text/javascript">
    <?php if($this->session->flashdata('msg')){ ?>
        toastr.success("<?php echo $this->session->flashdata('msg'); ?>");
    <?php }else if($this->session->flashdata('error')){  ?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php } ?>

</script>

<script type="text/javascript">
	var count = 1;
	function addextra(param){
		var html = '<input name="job'+param+'[]" id="dynamic'+param+count+'" class="form-control form-group" type="text" placeholder="Type Here..."  style="width:90%;"> <span onclick=\'$("#dynamic'+param+count+'").remove(); $(this).remove();\' class="btn btn-danger" style="margin-left: 1%; float: left;"><i class="fa fa-trash"></i></span>';
		$("#job"+param+"div").append(html);
		count++;
	}
	
</script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script>
     //Date picker
     $('#exp_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })//Date picker

    $('#post_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
</script>

