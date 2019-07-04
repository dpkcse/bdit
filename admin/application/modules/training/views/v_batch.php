<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>training/modal/popup/v_modal_batch_add/');" class="btn btn-success">New Batch <i class="fa fa-plus"></i></a>
            
        </div>

        <div class="col-lg-12">&nbsp;</div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Batch Information  
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body semantic_table_pan">
                    <table class="ui celled table" cellspacing="0" width="100%" id="dataTables-semantic">
                        <thead>
                            <tr>
                                <th>Batch ID</th>
                                <th>Session</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Course Title</th>
                                <th>Instructor</th>
                                <th>Total Seat</th>
                                <th>Total Enrolled</th>
                                <th>Duration</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($batch as $row):?>
                                <tr class="odd">
                                    <td><?php echo $row['title'];?></td>
                                    <td><?php echo $row['session'];?></td>
                                    <td><?php echo $row['start_at'];?></td>
                                    <td><?php echo $row['end_at'];?></td>
                                    <td><?php echo $this->m_training->get_type_name_by_id('course',$row['course_id'],'title') ;?></td>
                                    <td><?php echo $this->m_training->get_type_name_by_id('instructor',$row['instructor'],'name') ;?></td>
                                    <td><?php echo $row['total_seat'];?></td>
                                    <td>0</td>
                                    <td><?php echo $row['duration'];?></td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                                <li>
                                                    <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>training/modal/popup/v_modal_batch_edit/<?php echo $row['id'];?>');">
                                                        <i class="entypo-pencil"></i>
                                                            <?php echo "Edit";?>
                                                        </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="javascript:void(0);" onclick="confirm_modal('<?php echo base_url();?>Batch/Action/batch/do_delete/<?php echo $row['id'];?>');">
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

