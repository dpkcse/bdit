<style type="text/css">
	.forceMargin{
		margin-bottom: 10px !important;
	}
	.dropdown-menu {
		z-index: 1100;
	}
</style>
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
				<form action="#" method="POST" name="productiondetail" id="productiondetail" class="productiondetail" >
		    		<div class="col-lg-6">
		    			<div class="form-group">
		                    <label class="col-sm-5 control-label">Project</label>
		                    <div class="col-sm-7">
		                        <select name="projectID" class="form-control forceMargin" style="width:100%;" onChange="getDrawing(this.value);">
		                        	<?php 
									$projects = $this->db->get_where('projects')->result_array();
									
									foreach($projects as $proRow):
									?>
		                        		<option value="<?php echo $proRow['pro_id'];?>"><?php echo $proRow['pro_number'];?></option>
		                            <?php
									endforeach;
									?>
		                        </select>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-5 control-label">Drawing (Panel Number)</label>
		                    <div class="col-sm-7">
		                        <select name="drawingID" id="drawingID" class="form-control forceMargin" style="width:100%;">
		                        	<?php 
									$drawings = $this->db->get_where('project_drawings', array('status' => '1','pro_id'=>$projects[0]['pro_id']))->result_array();
									
									foreach($drawings as $row):
									?>
		                        		<option value="<?php echo $row['drw_id'];?>"><?php echo $row['panel_number'];?></option>
		                            <?php
									endforeach;
									?>
		                        </select>
		                    </div>
		                </div>
		    			
						<div class="form-group">
		                    <label class="col-sm-5 control-label">Table</label>
		                    <div class="col-sm-7">
		                        <select name="tbl_number" class="form-control forceMargin" style="width:100%;">
		                        	<option value="B1">B1</option>
		                        	<option value="B2">B2</option>
		                        	<option value="B3">B3</option>
		                        	<option value="B4">B4</option>
		                        	<option value="B5">B5</option>
		                        	<option value="B6">B6</option>
		                        </select>
		                    </div>
		                </div>
		                <div class="form-group">
							<label for="field-1" class="col-sm-5 control-label">Completion Percent</label>
	                        
							<div class="col-sm-7">
								<select name="completion_percent" class="form-control forceMargin" style="width:100%;">
		                        	<option selected="selected" value="0">0</option>
		                        	<option value="10">10</option>
		                        	<option value="20">20</option>
		                        	<option value="30">30</option>
		                        	<option value="40">40</option>
		                        	<option value="50">50</option>
		                        	<option value="60">60</option>
		                        	<option value="70">70</option>
		                        	<option value="80">80</option>
		                        	<option value="90">90</option>
		                        	<option value="100">100</option>
		                        </select>
							</div>
						</div>
						
		    		</div>
		    		<div class="col-lg-6">
		    			<div class="form-group">
							<label for="field-1" class="col-sm-5 control-label">Expected Produce Date</label>
	                        
							<div class="col-sm-7">
								<input type="text" class="form-control forceMargin clsDatePicker" id="expected_produce_date" name="expected_produce_date"  value="" >
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-5 control-label">Actual Produce Date</label>
	                        
							<div class="col-sm-7">
								<input type="text" class="form-control forceMargin clsDatePicker" id="actual_produce_date" name="actual_produce_date"  value="" >
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-5 control-label">Expected Delivery Date</label>
	                        
							<div class="col-sm-7">
								<input type="text" class="form-control forceMargin clsDatePicker" id="expected_delivery_date" name="expected_delivery_date"  value="" >
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-5 control-label">Actual Delivery Date</label>
	                        
							<div class="col-sm-7">
								<input type="text" class="form-control forceMargin clsDatePicker" id="actual_delivery_date" name="actual_delivery_date"  value="" >
							</div>
						</div>
						
		    		</div>
		    		
				
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="button" id="saveProduction" class="btn btn-info"><?php echo ('Save');?></button>
							<button type="reset" class="btn btn-default" data-dismiss="modal"><?php echo ('Cancel');?></button>
						</div>
						
					</div>
				</form>
			</div>
        </div>
    </div>
</div>

<script type="text/javascript">
	
	$('.clsDatePicker').datepicker({ format: 'yyyy-mm-dd' });
	
	$(document).ready(function() {
	    $("#productiondetail").validate({
	        rules: {
	            projectID: "required",
	            drawingID: "required",
	            tbl_number: "required",
	            completion_percent: "required",
	            expected_produce_date: "required",
	            actual_produce_date: "required",
	            expected_delivery_date: "required",
	            actual_delivery_date: "required"
	        },
	        messages: {
	            projectID: "required",
	            drawingID: "required",
	            tbl_number: "required",
	            completion_percent: "required",
	            expected_produce_date: "required",
	            actual_produce_date: "required",
	            expected_delivery_date: "required",
	            actual_delivery_date: "required"

	        }
	    })

	    $('#saveProduction').click(function() {
	        if($("#productiondetail").valid() == true){
	        	var formData = new FormData(document.getElementsByName('productiondetail')[0]);
	        	
	        	$.ajax({
	                url: '<?php echo site_url();?>projects/saveProduction',
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

	                    if(data_st.msg == true){
		                	swal(
							  'Good job!',
							  'Successfully inserted!',
							  'success'
							);

							
		                }else if(data_st.msg == false){
		                	swal("Cancelled", "Failed to insert !!!", "error");
		                }else if(data_st.msg == -1){
		                	swal("Cancelled", "This Drawing Already Added!!!", "error");
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

	

	function getDrawing(projectid){
		$.ajax({
            url: '<?php echo site_url();?>projects/getDrawing',
            type: 'POST',
            data: {projectid:projectid},
            dataType: "JSON",
            beforeSend: function (jqXHR, textStatus, errorThrown) {
               $("#drawingID").html("");
            },
            success: function (data_st, textStatus) {
                
                if(data_st.drawings.length == 0){
                	swal("Cancelled", "No drawing found!!!", "error");
                }else{
                	
                	$.each(data_st.drawings, function(key, value) {   
					     $('#drawingID').append('<option value="'+value.drw_id+'">'+value.panel_number+'</option>');
					});
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
</script>