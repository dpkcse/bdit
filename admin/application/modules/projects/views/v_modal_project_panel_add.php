<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Add Drawing";?>
            	</div>
            </div>
			<div class="panel-body">
				<form action="#" method="POST" name="projectdrawing" id="projectdrawing" class="projectdrawing" >
						    		
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
							<label for="field-1" class="col-sm-4 control-label">Level</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="Level" name="Level"  value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Type</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="Type" name="Type"  value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Number</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="Number" name="Number"  value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Length</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="Length" name="Length"  value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Width</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="Width" name="Width"  value="" autofocus>
							</div>
						</div>
						
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Net Area</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="NetArea" name="NetArea"  value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Gross Area</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="GrossArea" name="GrossArea"  value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Volume</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="Volume" name="Volume"  value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Weight</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="Weight" name="Weight"  value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Thikness</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="Thikness" name="Thikness"  value="" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-4 control-label">Revision</label>
	                        
							<div class="col-sm-8">
								<input type="text" class="form-control forceMargin" id="Revision" name="Revision"  value="" autofocus>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="button" id="saveDrawing" class="btn btn-info"><?php echo ('Save');?></button>
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
	    $("#projectdrawing").validate({
	        rules: {
	            ProjectName: "required",
	            Level: "required",
	            Type: "required",
	            Number: "required",
	            Length: "required",
	            Width: "required",
	            NetArea: "required",
	            GrossArea: "required",
	            Volume: "required",
	            Weight: "required",
	            Thikness: "required",
	            Revision: "required"
	        },
	        messages: {
	            ProjectName: "ProjectName Required",
	            Level: "Level Required",
	            Type: "Type Required",
	            Number: "Number Required",
	            Length: "Length Required",
	            Width: "Width Required",
	            NetArea: "Net Area Required",
	            GrossArea: "GrossArea Required",
	            Volume: "Volume Required",
	            Weight: "Weight Required",
	            Thikness: "Thikness Required",
	            Revision: "Revision Required"

	        }
	    })

	    $('#saveDrawing').click(function() {
	        if($("#projectdrawing").valid() == true){
	        	var formData = new FormData(document.getElementsByName('projectdrawing')[0]);
	        	$.ajax({
	                url: '<?php echo site_url();?>projects/saveProjectDrawing',
	                type: 'POST',
	                data: formData,
	                dataType: "JSON",
	                processData: false,
	                contentType: false,
	                beforeSend: function (jqXHR, textStatus, errorThrown) {
	                   //abortAjax(jqXHR);
	                },
	                success: function (data_st, textStatus) {
	                    swal(
                              'Good job!',
                              'Successfully add',
                              'success'
                            )

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