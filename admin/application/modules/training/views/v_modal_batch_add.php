<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo "Add Batch Information";?>
            	</div>
            </div>
			<div class="panel-body">
				<form action="<?php echo site_url();?>Batch/save/batch" method="POST" name="employeedetail" id="employeedetail" class="employeedetail" >
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Course Title';?></label>
                        <div class="col-sm-8">
                            <select class="form-control forceMargin" name="course_title" id="course_title" required>
                            <?php
                                $course_data =	$this->db->get('course')->result_array();
                                if(count($course_data) > 0){
                                    foreach ( $course_data as $key => $value){ ?>
                                        <option value="<?php echo  $value['id']; ?>"><?php echo  $value['title']; ?></option>
                                    <?php } ?> 
                                <?php } ?>
                                
                            </select>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Instructor Name';?></label>
                        <div class="col-sm-8">
                            <select class="form-control forceMargin" name="instructor" id="instructor" required>
                            <?php
                                $Instructor_data =	$this->db->get('instructor')->result_array();
                                if(count($Instructor_data) > 0){
                                    foreach ( $Instructor_data as $ky => $val){ ?>
                                        <option value="<?php echo  $val['id']; ?>"><?php echo  $val['name']; ?></option>
                                    <?php } ?> 
                                <?php } ?>
                                
                            </select>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Duration';?></label>
                        <div class="col-sm-8">
							<input type="text" class="form-control forceMargin" id="duration" name="duration" value="" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Start Date';?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control forceMargin" id="start_date" name="start_date" value="" required>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'End Date';?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control forceMargin" id="end_date" name="end_date" value="" required>
						</div>
					</div>
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Session';?></label>
                        <div class="col-sm-8">
                            <select class="form-control forceMargin" name="session" id="session" required>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2018-2019">2018-2019</option>
                                <option value="2019-2020">2019-2020</option>
                                <option value="2020-2021">2020-2021</option>
                                <option value="2021-2022">2021-2022</option>
                                <option value="2022-2023">2022-2023</option>
                                <option value="2023-2024">2023-2024</option>
                                <option value="2024-2025">2024-2025</option>
                            </select>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo 'Total Seat';?></label>
                        <div class="col-sm-8">
							<input type="number" min="1" max="199" class="form-control forceMargin" id="total_seat" name="total_seat"  value="" required>
						</div>
					</div>
				
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit"  class="btn btn-info"><?php echo ('Save');?></button>
							<button type="reset" class="btn btn-default" data-dismiss="modal"><?php echo ('Cancel');?></button>
						</div>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
	    $("#employeedetail").validate({
	        rules: {
	            EmployeeName: "required",
	            EmployeeNumber: "required"
	        },
	        messages: {
	            EmployeeName: "required",
	            EmployeeNumber: "required"

	        }
	    })
	});

	function abortAjax(xhr) {
		if(xhr && xhr.readyState != 4){
			xhr.abort();
		}
	}
</script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script>
     //Date picker
     $('#start_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })//Date picker

    $('#end_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
</script>