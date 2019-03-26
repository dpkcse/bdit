<?php 
$edit_data		=	$this->db->get_where('projects' , array('pro_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Edit Project";?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open(base_url() . 'projects/projectAction/do_update/'.$row['pro_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo 'Project Name';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ProjectName" name="ProjectName" value="<?php echo $row['pro_name'];?>" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo 'Project Number';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ProjectNumber" name="ProjectNumber"  value="<?php echo $row['pro_number'];?>" autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Client';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" id="Client" name="Client" value="<?php echo $row['client'];?>" data-start-view="2">
                        </div> 
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Contact';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" id="Contact" name="Contact" value="<?php echo $row['contact'];?>" data-start-view="2">
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo "Edit Project";?></button>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>