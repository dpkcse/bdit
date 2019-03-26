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
				
                
					<ul class="nav nav-tabs">
					  	<li class="active"><a data-toggle="tab" href="#home">Project Details</a></li>
					  	<li class="disabled" id="menuTab"><a data-toggle="tab" class="" href="#menu1" onclick="CheckProName();">Type Details</a></li>
					</ul>

					<div class="tab-content">
					  	<div id="home" class="tab-pane fade in active">
					    	
					    	<div class="col-lg-12">&nbsp;</div>
					    	<div class="col-lg-12 modalBody">
					    		<form action="#" method="POST" name="projectdetail" id="projectdetail" >
						    		<div class="form-group">
										<label for="field-1" class="col-sm-3 control-label"><?php echo 'Project Name';?></label>
				                        
										<div class="col-sm-8">
											<input type="text" class="form-control" id="ProjectName" name="ProjectName" value="" autofocus>
										</div>
									</div>
									<div class="form-group">
										<label for="field-1" class="col-sm-3 control-label"><?php echo 'Project Number';?></label>
				                        
										<div class="col-sm-8">
											<input type="text" class="form-control" id="ProjectNumber" name="ProjectNumber"  value="" autofocus>
										</div>
									</div>
								
									<div class="form-group">
										<label for="field-2" class="col-sm-3 control-label"><?php echo 'Client';?></label>
				                        
										<div class="col-sm-8">
											<input type="text" class="form-control datepicker" id="Client" name="Client" value="" data-start-view="2">
										</div> 
									</div>
									<div class="form-group">
										<label for="field-2" class="col-sm-3 control-label"><?php echo 'Contact';?></label>
				                        
										<div class="col-sm-8">
											<input type="text" class="form-control datepicker" id="Contact" name="Contact" value="" data-start-view="2">
										</div> 
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-5">
											<button type="button" id="saveProject" class="btn btn-info"><?php echo ('Save');?></button>
											<button type="reset" class="btn btn-default" data-dismiss="modal"><?php echo ('Cancel');?></button>
										</div>
										
									</div>
								</form>
					    	</div>
					    </div>
					  	<div id="menu1" class="tab-pane fade">
					    	<div class="col-lg-12">&nbsp;</div>
					    	<div class="col-lg-12">
					    		<form action="#" method="POST" name="typedetail" id="typedetail" >
					    		<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label"><?php echo 'Type';?></label>
			                        
									<div class="col-sm-8">
										<input type="text" class="form-control" name="Type" id="Type" autofocus>
									</div>
								</div>
							
								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo 'Thickness';?></label>
			                        
									<div class="col-sm-8">
										<input type="number" class="form-control" name="Thickness" id="Thickness" value="">
									</div> 
								</div>
								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo 'Number';?></label>
			                        
									<div class="col-sm-8">
										<input type="number" class="form-control" name="Number" id="Number"value="">
									</div> 
								</div>
								
								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo 'Area';?></label>
			                        
									<div class="col-sm-8">
										<input type="number" class="form-control" name="Area" id="Area" value="" data-start-view="2">
									</div> 
								</div>
								<div class="form-group">
									<label for="field-2" class="col-sm-3 control-label"><?php echo 'Cost-efficiency Rate';?></label>
			                        
									<div class="col-sm-8">
										<input type="number" class="form-control datepicker" name="CER" id="CER" value="" data-start-view="2">
									</div> 
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-5">
										<input type="hidden" name="proid" id="proid" value="">
										<button type="button" id="saveType" class="btn btn-info"><?php echo ('Save');?></button>
										<button type="reset" class="btn btn-default" data-dismiss="modal"><?php echo ('Cancel');?></button>
									</div>
									
								</div>
					    	</div>
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

	$('#saveProject').click(function() {
        var design = "";
        var ProjectName= $("#ProjectName").val();
    	var ProjectNumber= $("#ProjectNumber").val();
    	var Client= $("#Client").val();
    	var Contact= $("#Contact").val();
    	var editUrl = '<?php echo site_url();?>projects/modal/popup/v_modal_project_edit/';
    	var deleteUrl = '<?php echo base_url();?>projects/projectAction/delete/';
        
        if($("#projectdetail").valid() == true){
        	$.ajax({
                url: '<?php echo site_url();?>projects/saveProject',
                type: 'POST',
                data: {
                	ProjectName: ProjectName,
                	ProjectNumber: ProjectNumber,
                	Client: Client,
                	Contact: Contact
                },
                dataType: "json",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data_st) {
                    console.log(data_st.data);
                    $("#proid").val(data_st.data);
		        	$('.nav-tabs a[href="#menu1"]').tab('show');
		        	$("#menuTab").removeClass('disabled');
		        	
		        	design +='				<tr class="odd">';
                    design +='                <td>'+ProjectNumber+'</td>';
                    design +='                <td>'+ProjectName+'</td>';
                    design +='                <td>'+Client+'</td>';
                    design +='                <td>'+Contact+'</td>';
                    design +='                <td class="center">';
                    design +='                    <div class="btn-group">';
                    design +='                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span>';
                    design +='                        </button>';
                    design +='                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">';
                    design +='                            <li>';
                    design +='                                <a href="javascript:void(0);" onclick="showAjaxModal(\''+editUrl+data_st.data+'\');">';
                    design +='                                    <i class="entypo-pencil"></i>';
                    design +='                                        Edit';
                    design +='                                    </a>';
                    design +='                            </li>';
                    design +='                            <li class="divider"></li>';
                    design +='                            <li>';
                    design +='                                <a href="javascript:void(0);" onclick="confirm_modal(\''+deleteUrl+data_st.data+'\');">';
                    design +='                                    <i class="entypo-trash"></i>';
                    design +='                                        Delete';
                    design +='                                </a>';
                    design +='                            </li>';
                    design +='                        </ul>';
                    design +='                    </div>';
                    design +='                </td>';
                    design +='            </tr>';
		        	
		        	var table = $('#dataTables-semantic').DataTable();
					table.row.add($(design )).draw();
		        	
		        	//$("#ProjectTbody").prepend(design);
                },
                complete: function(data_st)
		        {
		        	// var str = data_st.responseText
		        	// var data = str.match(/\{.+?\}/g).map(function(x){return x.slice(1,-1)});
		        	// var split = data[0].split(":");
		        	// $("#proid").val(split[1]);
		        	// $('.nav-tabs a[href="#menu1"]').tab('show');
		        	// $("#menuTab").removeClass('disabled');
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

    $('#saveType').click(function() {
        if($("#typedetail").valid() == true){
        	$.ajax({
                url: '<?php echo site_url();?>projects/saveProjectType',
                type: 'POST',
                data: {
                	Type: $("#Type").val(),
                	Thickness: $("#Thickness").val(),
                	Number: $("#Number").val(),
                	Area: $("#Area").val(),
                	CER: $("#CER").val(),
                	ProID: $("#proid").val()
                },
                dataType: "json",
                beforeSend: function () {
                    //console.log("Emptying");
                },
                success: function (data_st) {
                    console.log(data_st);
                    jQuery('#modal_ajax').modal('hide');
                },
                complete: function(data_st)
		        {
		        	jQuery('#modal_ajax').modal('hide');
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
</script>