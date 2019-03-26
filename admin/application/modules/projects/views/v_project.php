<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>projects/modal/popup/v_modal_project_add/');" class="btn btn-success">Add New Project <i class="fa fa-plus"></i></a>
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>projects/modal/popup/v_modal_import_drawing/');" class="btn btn-success">Import Project <i class="fa fa-cloud-upload"></i></a>
            <a href="javascript:void(0);" class="btn btn-success">Export Project <i class="fa fa-cloud-download"></i></a>
        </div>

        <div class="col-lg-12">&nbsp;</div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Project(s) List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body semantic_table_pan">
                    <table class="ui celled table" cellspacing="0" width="100%" id="dataTables-semantic">
                        <thead>
                            <tr>
                                <th>Project Number</th>
                                <th>Project Name</th>
                                <th>Client</th>
                                <th>Contact</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody id="ProjectTbody">
                            <?php 
                                foreach($projects as $row):?>
                                <tr class="odd">
                                    <td><?php echo $row['pro_number'];?></td>
                                    <td><?php echo $row['pro_name'];?></td>
                                    <td><?php echo $row['client'];?></td>
                                    <td><?php echo $row['contact'];?></td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-info" onclick="showAjaxModal('<?php echo site_url();?>projects/modal/popup/v_modal_project_edit/<?php echo $row['pro_id'];?>');">
                                                        <i class="entypo-pencil"></i>
                                                            <?php echo "Edit";?>
                                                        </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-info" onclick="confirm_modal('<?php echo base_url();?>projects/projectAction/delete/<?php echo $row['pro_id'];?>');">
                                                        <i class="entypo-trash"></i>
                                                            <?php echo "Delete";?>
                                                    </a>
                                            
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

