<?php 
$edit_data		=	$this->db->get_where('instructor' , array('id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Edit Instructor";?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open(base_url() . 'Instructor/Action/instructor/do_update/'.$row['id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo 'Name';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo 'Email';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email"  value="<?php echo $row['email'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo 'Phone';?></label>
                        
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone" name="phone"  value="<?php echo $row['mobile'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fileinput" class="col-sm-3 control-label">Image (845X450)</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="fileinput" name="fileinput" accept="image/*" /> 
                        </div> 
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Detail';?></label>
                        
                        <div class="col-sm-8">
                            <textarea class="form-control textarea" id="detail" name="detail"><?php echo $row['detail']; ?></textarea>
                        </div> 
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Previous imgae';?></label>
                        
                        <div class="col-sm-8">
                            <img style="width: 150px;" src="<?php echo base_url('uploads/instructor/'.$row['img'])?>" />
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo "Edit Instructor";?></button>
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
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>