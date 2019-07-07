<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Add Instructor";?>
            	</div>
            </div>
			<div class="panel-body">
				<form action="<?php echo site_url();?>Instructor/save/instructor" method="POST" name="employeedetail" id="employeedetail" class="employeedetail" enctype="multipart/form-data">
		    		<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Name';?></label>
                        <div class="col-sm-8">
							<input type="text" class="form-control forceMargin" id="name" name="name" value="" autofocus required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Email';?></label>
                        <div class="col-sm-8">
							<input type="email" class="form-control forceMargin" id="email" name="email"  value="" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Phone';?></label>
                        <div class="col-sm-8">
							<input type="text" class="form-control forceMargin" id="phone" name="phone"  value="" required>
						</div>
					</div>

					<div class="form-group">
						<label for="fileinput" class="col-sm-3 control-label">Image (PP Size)</label>
						<div class="col-sm-8">
							<input type="file" class="form-control" id="fileinput" name="fileinput" accept="image/*" required/>
						</div> 
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo 'Detail';?></label>
						<div class="col-sm-8">
							<textarea class="form-control textarea" id="detail" name="detail"></textarea>
						</div> 
					</div>
				
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" id="saveEmployee" class="btn btn-info"><?php echo ('Save');?></button>
							<button type="reset" class="btn btn-default" data-dismiss="modal"><?php echo ('Cancel');?></button>
						</div>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
	    $("#employeedetail").validate({
	        rules: {
	            EmployeeName: "required",
	            EmployeeNumber: "required"
	        },
	        messages: {
	            EmployeeName: "required",
	            EmployeeNumber: "required"

	        }
	    })
	});

	function abortAjax(xhr) {
		if(xhr && xhr.readyState != 4){
			xhr.abort();
		}
	}
</script>
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>