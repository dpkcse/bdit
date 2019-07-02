<?php 
$edit_data		=	$this->db->get_where('employees' , array('emp_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Edit Employee";?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open(base_url() . 'employee/employeeAction/do_update/'.$row['emp_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo 'Employee Name';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="EmployeeName" name="EmployeeName" value="<?php echo $row['emp_name'];?>" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo 'Employee Number';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="EmployeeNumber" name="EmployeeNumber"  value="<?php echo $row['emp_number'];?>" autofocus>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo "Edit Employee";?></button>
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