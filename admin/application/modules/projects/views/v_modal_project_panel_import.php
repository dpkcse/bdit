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
				
                <form method="post" enctype="multipart/form-data" id="projectdetail" name="projectdetail">
			    		
					<div class="form-group">
	                    <label class="col-sm-3 control-label">Project Name</label>
	                    <div class="col-sm-9">
	                        <select name="pro_id" class="form-control forceMargin" style="width:100%;">
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
						<label for="field-2" class="col-sm-3 control-label"><?php echo 'Level';?></label>
                        
						<div class="col-sm-9">
							<input type="text" class="form-control forceMargin" name="Level" id="Level" value="" data-start-view="2">
						</div> 
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo 'Upload File';?></label>
	                    
						<div class="col-sm-9">
							<input type="file" class="form-control forceMargin" name="file" accept=".csv"/>
						</div> 
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="button" id="importProject" class="btn btn-info"><?php echo ('Save');?></button>
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
	    $("#projectdetail").validate({
	        rules: {
	            pro_id: "required",
	            Level: "required",
	            file: "required"
	        },
	        messages: {
	            pro_id: "required",
	            Level: "required",
	            file: "required"

	        }
	    })

	    $('#importProject').click(function() {
	        if($("#projectdetail").valid() == true){
		        var formData = new FormData(document.getElementsByName('projectdetail')[0]);
		        $.ajax({
	                url: '<?php echo site_url();?>projects/importPanel',
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
	                    if(data_st.status == "Success"){
	                    	swal(
							  'Good job!',
							  'You clicked the button!',
							  'success'
							)

	                    }else{
	                    	swal("Cancelled", "Failed to import", "error");
	                    }
	                    
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