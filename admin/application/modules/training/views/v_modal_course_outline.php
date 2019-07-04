<?php 
$edit_data		=	$this->db->get_where('course' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Add Course Outline";?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open(base_url() . 'Course/save/outline' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo 'CourseTitle';?></label>
                        
                        <div class="col-sm-8">
                            <input type="hidden" name="course_id" value="<?php echo $row['id'];?>" >
                            <span class="form-control" style="text-align:left;"><?php echo $row['title'];?></span>
                        </div>
                    </div>
                    <div class="form-group">
							<label for="courseOutlineDiv" class="col-sm-3 control-label">Course Outline</label>
							<div class="col-sm-8">
                                <?php
                                $outline_data		=	$this->db->get_where('course_outline' , array('course_id' => $param2) )->result_array();
                                if(count($outline_data) > 0){?>
                                    <div id="courseOutlineDiv" style="margin-left: 15px;">
                                        <?php
                                        $coo = 0;
                                        foreach ( $outline_data as $key => $value){ ?>
                                            <div style="width:100%;float: left;">
                                                <input name="courseOutline[]" value="<?php  echo $value['detail']; ?>" class="form-control form-group col-md-12 jobrespon<?php echo $key; ?>" type="text" placeholder="Course Outline" style="width:80%;float: left;" required>
                                                <?php if($coo == 0){ ?>
                                                    <span onclick='$(".jobrespon<?php echo $key; ?>").remove(); $(this).remove();' class="btn btn-danger" style="margin-left:2%;width:8%;float:left;text-align:center;"><i class="fa fa-trash"></i></span>
                                                    <span  onClick="addextra('courseOutline')" class="btn btn-primary" style="margin-left:2%;width:8%;float:left;text-align:center;"><i class="fa fa-plus"></i></span>
                                                <?php $coo++; }else{ ?>
                                                    <span onclick='$(".jobrespon<?php echo $key; ?>").remove(); $(this).remove();' class="btn btn-danger" style="margin-left:2%;width:8%;float:left;text-align:center;"><i class="fa fa-trash"></i></span>
                                                <?php } ?>
                                            </div> 
                                        <?php } ?> 
                                    </div> 
                                <?php }else{ ?>
                                    <div id="courseOutlineDiv" style="margin-left: 15px;">
                                        <div style="width:100%;float: left;">
                                            <input name="courseOutline[]" class="form-control form-group col-md-12" type="text" placeholder="Course Outline" style="width:90%;float: left;" required>
                                            <span  onClick="addextra('courseOutline')" class="btn btn-primary" style="width:10%:float:left"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                <?php } ?>
								
							</div>
						</div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo "Add Course Outline";?></button>
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

<script type="text/javascript">
	var count = 1;
	function addextra(param){
		var html = '<div style="width:100%;float: left;"><input name="'+param+'[]" id="dynamic'+param+count+'" class="form-control form-group col-md-12" type="text" placeholder="Type Here..."  style="width:90%;float: left;"  required> <span onclick=\'$("#dynamic'+param+count+'").remove(); $(this).remove();\' class="btn btn-danger" style="width:10%:float:left"><i class="fa fa-trash"></i></span></div>';
		$("#"+param+"Div").append(html);
		count++;
	}
	
</script>