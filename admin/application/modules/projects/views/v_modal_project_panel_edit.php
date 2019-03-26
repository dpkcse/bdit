<?php 
$edit_data		=	$this->db->get_where('project_drawings' , array('drw_id' => $param2) )->result_array();
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
                    <?php echo form_open(base_url() . 'projects/DrawingAction/do_update/'.$row['drw_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Make it Inactive</label>
                            <?php $sta= ""; if($row['status'] == '0'){ $sta = '';}else{$sta = 'checked="checked"';} ?>
                            <div class="col-sm-8">
                                <input type="checkbox" <?php echo $sta;  ?> name="chkActive" classs="DrawingList" id="appid<?php echo $row['drw_id'] ?>"  value="<?php echo $row['drw_id'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Project Name</label>
                            <div class="col-sm-8">
                                <select name="ProjectName" id="ProjectName" class="form-control forceMargin" style="width:100%;">
                                    <?php 
                                    $projects = $this->db->get('projects')->result_array();
                                    foreach($projects as $row2):
                                    ?>
                                        <option value="<?php echo $row2['pro_id'];?>" <?php if($row['pro_id'] == $row2['pro_id'])echo 'selected';?>><?php echo $row2['pro_name'];?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Level</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="Level" name="Level"  value="<?php echo $row['level'];?>" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Type</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="Type" name="Type"  value="<?php echo $row['panel_type'];?>" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Number</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="Number" name="Number"  value="<?php echo $row['panel_number'];?>" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Length</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="Length" name="Length"  value="<?php echo $row['panel_length'];?>" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Width</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="Width" name="Width"  value="<?php echo $row['panel_width'];?>" autofocus>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Net Area</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="NetArea" name="NetArea"  value="<?php echo $row['panel_net_area'];?>" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Gross Area</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="GrossArea" name="GrossArea"  value="<?php echo $row['panel_gross_area'];?>" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Volume</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="Volume" name="Volume"  value="<?php echo $row['panel_volume'];?>" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Weight</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="Weight" name="Weight"  value="<?php echo $row['panel_weight'];?>" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Thikness</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="Thikness" name="Thikness"  value="<?php echo $row['panel_thickness'];?>" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">Revision</label>
                            
                            <div class="col-sm-8">
                                <input type="text" class="form-control forceMargin" id="Revision" name="Revision"  value="<?php echo $row['panel_revision'];?>" autofocus>
                            </div>
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