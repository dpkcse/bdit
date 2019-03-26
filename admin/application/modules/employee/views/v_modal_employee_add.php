<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Add Project";?>
            	</div>
            </div>
			<div class="panel-body">
				<form action="#" method="POST" name="employeedetail" id="employeedetail" class="employeedetail" >
		    		<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Employee Name';?></label>
                        
						<div class="col-sm-8">
							<input type="text" class="form-control forceMargin" id="EmployeeName" name="EmployeeName" value="" autofocus>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Employee Number';?></label>
                        
						<div class="col-sm-8">
							<input type="text" class="form-control forceMargin" id="EmployeeNumber" name="EmployeeNumber"  value="" autofocus>
						</div>
					</div>
				
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="button" id="saveEmployee" class="btn btn-info"><?php echo ('Save');?></button>
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

	    $('#saveEmployee').click(function() {
	        if($("#employeedetail").valid() == true){
	        	var formData = new FormData(document.getElementsByName('employeedetail')[0]);
	        	$.ajax({
	                url: '<?php echo site_url();?>employee/saveEmployee',
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

	function abortAjax(xhr) {
		if(xhr && xhr.readyState != 4){
			xhr.abort();
		}
	}
</script>