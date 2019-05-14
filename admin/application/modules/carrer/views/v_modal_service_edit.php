<?php 
$edit_data = $this->db->get_where('services' , array('id' => $param2) )->result_array();

foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Edit Banner";?>
            	</div>
            </div>
			<div class="panel-body">
                <form action="<?php echo base_url('service/bannerAction/do_update/'.$row['id'].'/services')?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
				<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label"><?php echo 'Heading';?></label>
							
							<div class="col-sm-8">
								<input type="text" class="form-control" id="heading" name="heading" value="<?php echo $row['title']; ?>" placeholder="Type your banner heading" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo 'Slug';?></label>
							
							<div class="col-sm-8">
								<input type="text" class="form-control" id="link" name="slug" value="<?php echo $row['slug']; ?>" placeholder="Type your banner link"/>
							</div> 
						</div>
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo 'Menu Name';?></label>
							
							<div class="col-sm-8">
								<input type="text" class="form-control" id="menuName" name="menuName" value="<?php echo $row['menu_name']; ?>" placeholder="Type your banner link" />
							</div> 
						</div>
						<div class="form-group">
							<label for="fileinput" class="col-sm-3 control-label">Banner Image (1500X200)</label>
							<div class="col-sm-8">
								<input type="file" class="form-control" id="fileinput" name="fileinput" accept="image/*" /> 
							</div> 
						</div>
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo 'Detail';?></label>
							
							<div class="col-sm-8">
								<textarea class="form-control textarea" id="detail" name="detail"><?php echo $row['description']; ?></textarea>
							</div> 
						</div>
                        <div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo 'Previous imgae';?></label>
							
							<div class="col-sm-8">
                                <img style="width: 150px;" src="<?php echo base_url('uploads/'.$row['image'])?>" />
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

<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>