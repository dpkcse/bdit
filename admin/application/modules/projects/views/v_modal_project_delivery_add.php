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
					<?php echo "Load List";?>
            	</div>
            </div>
			<div class="panel-body">
				<form action="#" method="POST" name="productiondetail" id="productiondetail" class="productiondetail" >
		    		<div class="row">
			    		<div class="col-lg-3">
			    			<div class="form-group">
			                    <label class="col-sm-12 control-label">Project</label>
			                    <div class="col-sm-12">
			                        <select name="projectID" class="form-control forceMargin" style="width:100%;" onChange="getLevel(this.value);">
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
			            </div>
			            <div class="col-lg-3">
			                <div class="form-group">
			                    <label class="col-sm-12 control-label">Level</label>
			                    <div class="col-sm-12">
			                        <select name="LevelID" id="LevelID" class="form-control forceMargin" style="width:100%;" onChange="getDrawingFordeliver(this.value);">
			                        	<?php 
										$levels = $this->db
													   ->group_by('level')
													   ->get_where('project_drawings', array('status' => '1','pro_id'=>$projects[0]['pro_id']))
													   ->result_array();
										
										foreach($levels as $row):
										?>
			                        		<option value="<?php echo $row['level'];?>"><?php echo $row['level'];?></option>
			                            <?php
										endforeach;
										?>
			                        </select>
			                    </div>
			                </div>
			    		</div>	
			    		<div class="col-lg-3">
							<div class="form-group">
			                    <label class="col-sm-12 control-label">Load Number</label>
			                    <div class="col-sm-12">
			                        <select name="Loadnumber" class="form-control forceMargin" style="width:100%;">
			                        	<option value="B1">B1</option>
			                        	<option value="B2">B2</option>
			                        	<option value="B3">B3</option>
			                        	<option value="B4">B4</option>
			                        	<option value="B5">B5</option>
			                        	<option value="B6">B6</option>
			                        </select>
			                    </div>
			                </div>
			            </div>  
			            <div class="col-lg-3">
		    				<div class="form-group">
								<label for="field-1" class="col-sm-12 control-label">Type</label>
		                        <div class="col-sm-12">
									<select name="drawingID" id="drawingID" class="form-control forceMargin" style="width:100%;" onchange="getPlanningList($(this).find('option:selected').text())">
			                        
			                        </select>
								</div>
							</div>
		    			</div>  
			            
		            </div>
		    		<div class="row" id="">
		    			<div class="col-lg-3">
			                <div class="form-group">
								<label for="field-1" class="col-sm-12 control-label">Delivery Date</label>
		                        
								<div class="col-sm-12">
									<input type="text" class="form-control forceMargin clsDatePicker" id="Delivery_date" name="Delivery_date"  value="" >
								</div>
							</div>
			            </div>
		    			<div class="col-lg-3">
		    				<div class="form-group">
								<label for="field-1" class="col-sm-12 control-label">Trailer Type</label>
		                        <div class="col-sm-12">
									<select name="Trailer" class="form-control forceMargin" style="width:100%;">
			                        	<option value="Flat Top">Flat Top</option>
			                        </select>
								</div>
							</div>
		    			</div>
		    			<div class="col-lg-3">
		    				<div class="form-group">
								<label for="field-1" class="col-sm-12 control-label">Frame Type</label>
		                        <div class="col-sm-12">
									<select name="Frame" class="form-control forceMargin" style="width:100%;">
			                        	<option value="Head Board">Head Board</option>
			                        </select>
								</div>
							</div>
		    			</div>
		    			<div class="col-lg-3">
		    				<div class="form-group">
								<label for="field-1" class="col-sm-12 control-label">Installtion Sequence</label>
		                        <div class="col-sm-12">
									<select name="Installtion" class="form-control forceMargin" style="width:100%;">
			                        	<option value="1">1</option>
			                        	<option value="2">2</option>
			                        	<option value="3">3</option>
			                        	<option value="4">4</option>
			                        	<option value="5">5</option>
			                        	<option value="6">6</option>
			                        	<option value="7">7</option>
			                        	<option value="8">8</option>
			                        	<option value="9">9</option>
			                        </select>
								</div>
							</div>
		    			</div>
		    		</div>
		    		<div class="row" id="panellist">
		    			
		    		</div>
		    		
				
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="button" id="saveDelivery" class="btn btn-info"><?php echo ('Save');?></button>
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
	            Delivery_date: "required"
	        },
	        messages: {
	            Delivery_date: "required"

	        }
	    })

	    $('#saveDelivery').click(function() {
	        if($("#productiondetail").valid() == true){
	        	var formData = new FormData(document.getElementsByName('productiondetail')[0]);
	        	
	        	$.ajax({
	                url: '<?php echo site_url();?>projects/saveDelivery',
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

	

	function getLevel(projectid){
		$.ajax({
            url: '<?php echo site_url();?>projects/getLevel',
            type: 'POST',
            data: {projectid:projectid},
            dataType: "JSON",
            beforeSend: function (jqXHR, textStatus, errorThrown) {
               $("#LevelID").html("");
            },
            success: function (data_st, textStatus) {
                
                if(data_st.levels.length == 0){
                	swal("Cancelled", "No Level found!!!", "error");
                }else{
                	
                	$.each(data_st.levels, function(key, value) {   
					     $('#LevelID').append('<option value="'+value.level+'">'+value.level+'</option>');
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


	function getDrawingFordeliver(value){
		
		console.log(value);

		$.ajax({
            url: '<?php echo site_url();?>projects/getDrawingforDeliver',
            type: 'POST',
            data: {value:value},
            dataType: "JSON",
            beforeSend: function (jqXHR, textStatus, errorThrown) {
               $("#drawingID").html("");
            },
            success: function (data_st, textStatus) {
                
                console.log(data_st);

                if(data_st.drawings.length == 0){
                	swal("Cancelled", "No drawing found!!!", "error");
                }else{
                	
                	$.each(data_st.drawings, function(key, value) {   
					     $('#drawingID').append('<option value="'+value.drw_id+'">'+value.panel_type+'</option>');
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

	function getPlanningList(value){
		
		console.log(value);

		$.ajax({
            url: '<?php echo site_url();?>projects/getSelectDrawingList',
            type: 'POST',
            data: {value:value},
            dataType: "JSON",
            beforeSend: function (jqXHR, textStatus, errorThrown) {
               $("#panellist").html("");
            },
            success: function (data_st, textStatus) {
                
                console.log(data_st);

                if(data_st.result == 0){
                	swal("Cancelled", "No drawing found!!!", "error");
                }else{
                	
                	var dsign = '<table class="table table-striped">';
						dsign += '	<thead>';
						dsign += '		<tr>';
						dsign += '			<th>#</th>';
						dsign += '		    <th>Panel Type</th>';
						dsign += '		    <th>Panel Number</th>';
						dsign += '		    <th>Level</th>';
						dsign += '		    <th>Panel Length</th>';
						dsign += '		    <th>Panel Width</th>';
						dsign += '		    <th>Gross Area</th>';
						dsign += '		    <th>Weight</th>';
						dsign += '		    <th>Thickness</th>';
						dsign += '		 </tr>';
						dsign += '	</thead>';
						dsign += '	<tbody>';
						
						$.each(data_st.result, function(key, value) {   
						    console.log(data_st.result[key].panel_type);

						    dsign += '		<tr>';
							dsign += '			<th><input type="checkbox"/></th>';
							dsign += '		    <th>'+data_st.result[key].panel_type +'</th>';
							dsign += '		    <th>'+data_st.result[key].panel_number +'</th>';
							dsign += '		    <th>'+data_st.result[key].level +'</th>';
							dsign += '		    <th>'+data_st.result[key].panel_length +'</th>';
							dsign += '		    <th>'+data_st.result[key].panel_width +'</th>';
							dsign += '		    <th>'+data_st.result[key].panel_gross_area +'</th>';
							dsign += '		    <th>'+data_st.result[key].panel_weight +'</th>';
							dsign += '		    <th>'+data_st.result[key].panel_thickness +'</th>';
							dsign += '		 </tr>';
						});
						
						dsign += '	</tbody>';
  						dsign += '	</table>';

  						$("#panellist").html(dsign);

  						dsign = '';
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