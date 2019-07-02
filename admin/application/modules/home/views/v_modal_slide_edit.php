<?php 
$edit_data = $this->db->get_where('banner' , array('id' => $param2) )->result_array();

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
                <form action="<?php echo base_url('home/bannerAction/do_update/'.$row['id'].'/banner')?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label"><?php echo 'Heading';?></label>
							
							<div class="col-sm-8">
								<input type="text" class="form-control" id="heading" name="heading" value="<?php echo $row['heading']; ?>"  placeholder="Type your banner heading" autofocus required>
							</div>
						</div>
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo 'Link';?></label>
							
							<div class="col-sm-8">
								<input type="text" class="form-control" id="link" name="link" value="<?php echo $row['link']; ?>" placeholder="Type your banner link" required/>
							</div> 
                        </div>
                        <div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo 'Previous imgae';?></label>
							
							<div class="col-sm-8">
                                <img style="width: 150px;" src="<?php echo base_url('uploads/'.$row['image'])?>" />
							</div> 
						</div>
						<div class="form-group">
							<label for="fileinput" class="col-sm-3 control-label">New Banner Image</label>
							<div class="col-sm-8">
								<input type="file" class="form-control" id="fileinput" name="fileinput" accept="image/*"/>
                                
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