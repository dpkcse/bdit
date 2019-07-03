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
				<form action="<?php echo site_url();?>Course/save/course" method="POST" name="employeedetail" id="employeedetail" class="employeedetail" >
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Course Category';?></label>
                        <div class="col-sm-8">
                            <select class="form-control forceMargin" name="cat" id="target_jobs_id" required>
                                <option value="">Select Category</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Mobile App Develop">Mobile App Develop</option>
                                <option value="Game Development">Game Development</option>
                                <option value="Programming Language">Programming Language</option>
                                <option value="Software Testing">Software Testing</option>
                                <option value="Database">Database</option>
                                <option value="Network & Security">Network & Security</option>
                                <option value="Design">Design</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Management">Management</option>
                                <option value="Software Architecture">Software Architecture</option>
                                <option value="Data Science">Data Science</option>
                                <option value="Internet of Things (IoT)">Internet of Things (IoT)</option>
                                <option value="Telecom Network">Telecom Network</option>
                                <option value="Software Development">Software Development</option>
                                <option value="Front end Development">Front end Development</option>
                                <option value="Teaching methods and Strategies">Teaching methods and Strategies</option>
                                <option value="Personal Development">Personal Development</option>
                                <option value="Business">Business</option>
                            </select>
						</div>
					</div>    
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Course Title';?></label>
                        <div class="col-sm-8">
							<input type="text" class="form-control forceMargin" id="coursetitle" name="coursetitle" value="" autofocus required>
						</div>
					</div>
                    <div class="form-group">
                        <label for="fileinput" class="col-sm-3 control-label">Banner Image (848x450)</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="fileinput" name="fileinput" accept="image/*" required/>
                        </div> 
                    </div>
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Course Intro';?></label>
                        <div class="col-sm-8">
                            <textarea class="form-control forceMargin" name="courseintro" rows="5" id="courseintro"></textarea>
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