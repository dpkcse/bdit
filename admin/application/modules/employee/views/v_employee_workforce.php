<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>employee/modal/popup/v_modal_employee_timetracker/');" class="btn btn-success">Add New <i class="fa fa-plus"></i></a>
            
        </div>

        <div class="col-lg-12">&nbsp;</div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Time Tracker
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body semantic_table_pan">
                    <table class="ui celled table" cellspacing="0" width="100%" id="dataTables-semantic">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Project Code</th>
                                <th>Work Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($employees as $row):?>
                                <tr class="odd">
                                    <td><?php echo $row['emp_id'];?></td>
                                    <td><?php echo $this->m_project->get_type_name_by_id('projects',$row['pro_id']) ;?></td>
                                    <td><?php echo $row['work_date'];?></td>
                                    <td><?php echo $row['start_time'];?></td>
                                    <td><?php echo $row['end_time'];?></td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                                <li>
                                                    <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>employee/modal/popup/v_modal_employee_edit/<?php echo $row['emp_wrkf_id'];?>');">
                                                        <i class="entypo-pencil"></i>
                                                            <?php echo "Edit";?>
                                                        </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="javascript:void(0);" onclick="confirm_modal('<?php echo base_url();?>employee/employeeAction/delete/<?php echo $row['emp_wrkf_id'];?>');">
                                                        <i class="entypo-trash"></i>
                                                            <?php echo "Delete";?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script>
    $(document).ready(function () {

        $('#dataTables-semantic').DataTable({
            responsive: true
        });

    });
</script>

