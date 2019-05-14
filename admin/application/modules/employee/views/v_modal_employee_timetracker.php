<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Time Tracking";?>
            	</div>
            </div>
			<div class="panel-body">
				<form action="#" method="POST" name="employeedetail" id="employeedetail" class="employeedetail" >
		    		
		    		<div class="col-lg-6">
						<div class="form-group">
	                        <label class="col-sm-4 control-label">Project Name</label>
	                        <div class="col-sm-8">
	                            <select name="ProjectName" id="ProjectName" class="form-control forceMargin" style="width:100%;">
	                            	<?php 
									$projects = $this->db->get('projects')->result_array();
									foreach($projects as $row):
									?>
	                            		<option value="<?php echo $row['pro_id'];?>"><?php echo $row['pro_name'];?></option>
	                                <?php
									endforeach;
									?>
	                            </select>
	                        </div>
	                    </div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Start Time</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin timepicker-one" id="Level" name="startdate"  value="" >
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">End Time</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin timepicker-two" id="Type" name="enddate"  value="" >
							</div>
						</div>
						
						
					</div>
					<div class="col-lg-6">
						<div class="form-group">
	                        <label class="col-sm-4 control-label">Employee Name</label>
	                        <div class="col-sm-8">
	                            <select name="EmployeeName" id="EmployeeName" class="form-control forceMargin" style="width:100%;">
	                            	<?php 
									$employees = $this->db->get('employees')->result_array();
									foreach($employees as $row):
									?>
	                            		<option value="<?php echo $row['emp_id'];?>"><?php echo $row['emp_name'];?></option>
	                                <?php
									endforeach;
									?>
	                            </select>
	                        </div>
	                    </div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Work Date</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin clsDatePicker" id="datetimepicker2" name="workdate"  value="" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="button" id="saveTime" class="btn btn-info"><?php echo ('Save');?></button>
							<button type="reset" class="btn btn-default" data-dismiss="modal"><?php echo ('Cancel');?></button>
						</div>
						
					</div>
				</form>
			</div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$('.timepicker-one').wickedpicker();
	$('.timepicker-two').wickedpicker();
	
	
	$('#datetimepicker2').datepicker({ format: 'yyyy-mm-dd' });
	$(document).ready(function() {
	    

	    $("#employeedetail").validate({
	        rules: {
	            ProjectName: "required",
	            startdate: "required",
	            enddate: "required",
	            EmployeeName: "required",
	            workdate: "required"
	        },
	        messages: {
	            ProjectName: "required",
	            startdate: "required",
	            enddate: "required",
	            EmployeeName: "required",
	            workdate: "required"

	        }
	    })

	    $('#saveTime').click(function() {
	        if($("#employeedetail").valid() == true){
	        	var formData = new FormData(document.getElementsByName('employeedetail')[0]);
	        	$.ajax({
	                url: '<?php echo site_url();?>employee/saveTime',
	                type: 'POST',
	                data: formData,
	                dataType: "JSON",
	                processData: false,
	                contentType: false,
	                beforeSend: function (jqXHR, textStatus, errorThrown) {
	                   //abortAjax(jqXHR);
	                },
	                success: function (data_st, textStatus) {
	                    
	                    console.log(data_st);
	                    jQuery('#modal_ajax').modal('hide');
	                    location.reload();
	                },
	                error: function (jqXHR, textStatus, errorThrown) {
	                    // Some code to debbug e.g.:               
	                    console.log(jqXHR);
	                    console.log(textStatus);
	                    console.log(errorThrown);
	                }
	            });
	        }
	        
	    });
	});

	
</script>