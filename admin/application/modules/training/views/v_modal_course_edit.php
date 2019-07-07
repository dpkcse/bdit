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
					<?php echo "Edit Course";?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open(base_url() . 'Course/Action/course/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Course Category';?></label>
                        <div class="col-sm-8">
                            <select class="form-control forceMargin" name="cat" id="target_jobs_id" required>
                                <option <?php echo ($row['category'] == 'Web Development' ? 'selected': ''); ?> value="Web Development">Web Development</option>
                                <option <?php echo ($row['category'] == 'Mobile App Develop' ? 'selected': ''); ?> value="Mobile App Develop">Mobile App Develop</option>
                                <option <?php echo ($row['category'] == 'Game Development' ? 'selected': ''); ?> value="Game Development">Game Development</option>
                                <option <?php echo ($row['category'] == 'Programming Language' ? 'selected': ''); ?> value="Programming Language">Programming Language</option>
                                <option <?php echo ($row['category'] == 'Software Testing' ? 'selected': ''); ?> value="Software Testing">Software Testing</option>
                                <option <?php echo ($row['category'] == 'Database' ? 'selected': ''); ?> value="Database">Database</option>
                                <option <?php echo ($row['category'] == 'Network & Security' ? 'selected': ''); ?> value="Network & Security">Network & Security</option>
                                <option <?php echo ($row['category'] == 'Design' ? 'selected': ''); ?> value="Design">Design</option>
                                <option <?php echo ($row['category'] == 'Marketing' ? 'selected': ''); ?> value="Marketing">Marketing</option>
                                <option <?php echo ($row['category'] == 'Management' ? 'selected': ''); ?> value="Management">Management</option>
                                <option <?php echo ($row['category'] == 'Software Architecture' ? 'selected': ''); ?> value="Software Architecture">Software Architecture</option>
                                <option <?php echo ($row['category'] == 'Data Science' ? 'selected': ''); ?> value="Data Science">Data Science</option>
                                <option <?php echo ($row['category'] == 'Internet of Things (IoT)' ? 'selected': ''); ?> value="Internet of Things (IoT)">Internet of Things (IoT)</option>
                                <option <?php echo ($row['category'] == 'Telecom Network' ? 'selected': ''); ?> value="Telecom Network">Telecom Network</option>
                                <option <?php echo ($row['category'] == 'Software Development' ? 'selected': ''); ?> value="Software Development">Software Development</option>
                                <option <?php echo ($row['category'] == '"Front end Development' ? 'selected': ''); ?> value="Front end Development">Front end Development</option>
                                <option <?php echo ($row['category'] == 'Teaching methods and Strategies' ? 'selected': ''); ?> value="Teaching methods and Strategies">Teaching methods and Strategies</option>
                                <option <?php echo ($row['category'] == 'Personal Development' ? 'selected': ''); ?> value="Personal Development">Personal Development</option>
                                <option <?php echo ($row['category'] == 'Business' ? 'selected': ''); ?> value="Business">Business</option>
                            </select>
						</div>
					</div>   		
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo 'Title';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'];?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="fileinput" class="col-sm-3 control-label">Banner Image (845X450)</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="fileinput" name="fileinput" accept="image/*" /> 
                        </div> 
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Course Intro';?></label>
                        
                        <div class="col-sm-8">
                            <textarea class="form-control textarea" id="detail" name="detail"><?php echo $row['detail']; ?></textarea>
                        </div> 
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Previous imgae';?></label>
                        
                        <div class="col-sm-8">
                            <img style="width: 150px;" src="<?php echo base_url('uploads/course/'.$row['img'])?>" />
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo "Edit Course";?></button>
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