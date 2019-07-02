<?php 
$edit_data = $this->db->get_where('news' , array('id' => $param2) )->result_array();

foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Edit News";?>
            	</div>
            </div>
			<div class="panel-body">
                <form action="<?php echo base_url('home/bannerAction/do_update/'.$row['id'].'/news')?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Title';?></label>
						
						<div class="col-sm-8">
							<input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" placeholder="Type your title" autofocus required>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Description';?></label>
						
						<div class="col-sm-8">
							<textarea class="form-control"  id="description" name="description"  rows="3" placeholder="Enter ..."><?php echo $row['description']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo 'Link';?></label>
						
						<div class="col-sm-8">
							<input type="text" class="form-control" id="link" name="link" value="<?php echo $row['link']; ?>" placeholder="Type your banner link"/>
						</div> 
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo 'Publish Date';?></label>
						
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?php echo $row['publish_date']; ?>" id="datepicker" name="datepicker" >
						</div> 
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo 'Previous imgae';?></label>
						
						<div class="col-sm-8">
							<img style="width: 150px;" src="<?php echo base_url('uploads/'.$row['image'])?>" />
						</div> 
					</div>
					<div class="form-group">
						<label for="fileinput" class="col-sm-3 control-label">Image</label>
						<div class="col-sm-8">
							<input type="file" class="form-control" id="fileinput" name="fileinput" accept="image/*" />
						</div> 
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" id="saveProject" class="btn btn-info"><?php echo ('Save');?></button>
							<button type="reset" class="btn btn-default" data-dismiss="modal"><?php echo ('Cancel');?></button>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script>
     //Date picker
     $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
</script>