<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Import Project Drawing";?>
            	</div>
            </div>
			<div class="panel-body">
				
                	<div class="col-lg-12 modalBody">
			    		<form id="form_dataset" name="form_dataset" action="<?php echo base_url();?>projects/upload_file " method="POST">
				    		<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo 'Project Name';?></label>
		                        
								<div class="col-sm-8">
									<select name="ProID" class="form-control select2">
		                                <?php 
		                                $projects = $this->db->get('projects')->result_array();
		                                foreach($projects as $row):
		                                ?>
		                                    <option value="<?php echo $row['pro_id'];?>">
		                                        <?php echo $row['pro_name'];?>
		                                    </option>
										<?php
		                                endforeach;
		                                ?>
		                            </select>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"><?php echo 'Upload Excel/CSv file';?></label>
		                        
								<div class="col-sm-8">
									<input type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, .csv" required onchange="checkfile(this);"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-xs btn-primary">Upload</button>
									<button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
								</div>
								
							</div>
						</form>
			    	</div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $("#projectdetail").validate({
	        rules: {
	            ProjectName: "required",
	            ProjectNumber: "required",
	            Client: "required",
	            Contact: "required"
	        },
	        messages: {
	            ProjectName: "Please specify Project Name",
	            ProjectNumber: "Please specify Project Number",
	            Client: "Please specify Client Name",
	            Contact: "Please specify Client Contact"

	        }
	    })

	    $("#typedetail").validate({
	        rules: {
	            Type: "required",
	            Thickness: "required",
	            Number: "required",
	            Area: "required",
	            CER: "required"
	        },
	        messages: {
	            Type: "Please specify Type",
	            Thickness: "Please specify Thickness",
	            Number: "Please specify Number",
	            Area: "Please specify Area",
	            CER: "Please specify Cost-efficiency Rate",

	        }
	    })
	});

	$('form[name=form_dataset]').submit(function(e) {
		e.preventDefault();
		
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url : this.action,
			type : this.method,
			data : formData,
			contentType: false,
			processData: false,
			success : function(data) {
				console.log(data);	
			},
			error: function (jqXHR, textStatus, errorThrown) {

				console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
			}
		});
	});
	
	$("#menuTab").click(function (e) {
        if($("#menuTab").hasClass('disabled')){
        	e.preventDefault();
        	return false;
        }else{
        	return true;
        }
    });

    function CheckProName(){
    	var isSetPro = $("#proid").val();
    	
    	
    	if(isSetPro == ""){
    		bootbox.dialog({
				size: "small",
				className: "customBootBox",
				message: "Project didn't found",
				title: "**Error",
				buttons: {
					success: {
						label: "Ok",
						className: "btn-success",
						callback: function() {
							$('.nav-tabs a[href="#home"]').tab('show');
						}
					}

					
				}
			});
    	}
    }

    function checkfile(sender) {
	    var validExts = new Array(".xlsx", ".xls",".csv");
	    var fileExt = sender.value;
	    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
	    if (validExts.indexOf(fileExt) < 0) {
	      alert("Invalid file selected, valid files are of " +
	               validExts.toString() + " types.");
	      return false;
	    }
	    else return true;
	}
</script>