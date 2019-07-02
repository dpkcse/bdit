<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
								<?php echo "Job Posting";?>
            	</div>
          </div>
			<div class="panel-body">
				<div class="col-lg-12 modalBody">
				
					<form action="<?php echo base_url('carrer/sjob')?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
						<!-- text input -->
						<div class="form-group">
							<label for="title" class="col-sm-3 control-label"><?php echo 'Title';?></label>
							<div class="col-sm-8">
								<input type="text" id="title" name="title" class="form-control" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="nov" class="col-sm-3 control-label">No. of  Vacancies</label>
							<div class="col-sm-8">
								<input type="text" name="nov" id="nov" class="form-control" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="category" class="col-sm-3 control-label">Job Category</label>
							<div class="col-sm-8">
								<select class="form-control" name="category" id="category">
									<option value="Accounting">Accounting</option>
									<option value="Marketing">Marketing</option>
									<option value="Agriculturist">Engineering</option>
									<option value="Administrative/Clerical">Administrative</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="jobrespon" class="col-sm-3 control-label">Job Description / Responsibility </label>
							<div class="col-sm-7">
								<div id="jobrespondiv">
									<input name="jobrespon[]" id="jobrespon" class="form-control form-group col-md-12" type="text" placeholder="Job Description / Responsibility" style="width:90%;float: left;"> <i class="btn btn-primary fa fa-plus" onClick="addextra('respon')"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="jobna" class="col-sm-3 control-label">Job Nature</label>
							<div class="col-sm-8">
								<select class="form-control" name="jobna">
									<option value="Full Time">Full Time</option>
									<option value="Part Time">Part Time</option>
									<option value="Contructual">Contructual</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="jobedureq" class="col-sm-3 control-label">Educational Requirements </label>
							<div class="col-sm-8">
								<div id="jobedureqdiv">
									<input name="jobedureq[]" id="jobedureq" class="form-control form-group col-md-12" type="text" placeholder="Educational Requirements" style="width:90%;float: left;"><i class="btn btn-primary fa fa-plus" onClick="addextra('edureq')"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="jobexpreq" class="col-sm-3 control-label">Experience Requirements </label>
							<div class="col-sm-8">
								<div id="jobexpreqdiv">
									<input name="jobexpreq[]" id="jobexpreq" class="form-control form-group col-md-12" type="text" placeholder="Experience Requirements" style="width:90%;float: left;"><i class="btn btn-primary fa fa-plus" onClick="addextra('expreq')"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="jobaddreq" class="col-sm-3 control-label">Additional Job Requirements </label>
							<div class="col-sm-8">
								<div id="jobaddreqdiv">
									<input name="jobaddreq[]" id="jobaddreq" class="form-control form-group col-md-12" type="text" placeholder="Additional Job Requirements" style="width:90%;float: left;"><i class="btn btn-primary fa fa-plus" onClick="addextra('addreq')"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="jobloc" class="col-sm-3 control-label">Job Location</label>
							<div class="col-sm-8">
								<input type="text" name="jobloc" id="jobloc" class="form-control" placeholder="Job Location">
							</div>
						</div>

						<div class="form-group">
							<label for="salrang" class="col-sm-3 control-label">Salary Range</label>
							<div class="col-sm-8">
								<input type="text" name="salrang" id="salrang" class="form-control" placeholder="Salary Range">
							</div>
						</div>

						<div class="form-group">
							<label for="jobothreq" class="col-sm-3 control-label">Other Benefits </label>
							<div class="col-sm-8">
								<div id="jobothreqdiv">
									<input name="jobothreq[]" id="jobothreq" class="form-control form-group col-md-12" type="text" placeholder="Other Benefits" style="width:90%;float: left;"><i class="btn btn-primary fa fa-plus" onClick="addextra('othreq')"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="post_date" class="col-sm-3 control-label">Post Date</label>
							<div class="col-sm-8">
								<input type="text" name="post_date" id="post_date" class="form-control"  placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="exp_date" class="col-sm-3 control-label">Expire Date</label>
							<div class="col-sm-8">
								<input type="text" name="exp_date" id="exp_date" class="form-control" placeholder="Enter ...">
							</div>
						</div>

						<div class="form-group">
							<label for="status" class="col-sm-3 control-label">Job Status</label>
							<div class="col-sm-8">
								<select class="form-control" name="status" id="status">
									<option value="Published">Published</option>
									<option value="UnPublished">Un Published</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Save');?></button>
								<button type="reset" class="btn btn-default" data-dismiss="modal"><?php echo ('Cancel');?></button>
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script type="text/javascript">
	var count = 1;
	function addextra(param){
		var html = '<input name="job'+param+'[]" id="dynamic'+param+count+'" class="form-control form-group col-md-12" type="text" placeholder="Type Here..."  style="width:90%;"> <span onclick=\'$("#dynamic'+param+count+'").remove(); $(this).remove();\' class="btn btn-danger" style="margin-top: 4%;"><i class="fa fa-trash"></i></span>';
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
