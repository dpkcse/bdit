<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Add Slide";?>
            	</div>
            </div>
			<div class="panel-body">
				<div class="col-lg-12 modalBody">
					<form action="<?php echo base_url('home/saveClient')?>" method="POST" name="slidedetail" id="slidedetail" enctype="multipart/form-data">
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label"><?php echo 'Heading';?></label>
							
							<div class="col-sm-8">
								<input type="text" class="form-control" id="heading" name="heading" value="" placeholder="Type your banner heading" autofocus required>
							</div>
						</div>
						<div class="form-group">
							<label for="fileinput" class="col-sm-3 control-label">Image</label>
							<div class="col-sm-8">
								<input type="file" class="form-control" id="fileinput" name="fileinput" accept="image/*" required/>
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
</div>
