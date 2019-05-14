<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>carrer/modal/popup/v_modal_job_add/');" class="btn btn-success">Add New Vacancy <i class="fa fa-plus"></i></a>
        </div>

        <div class="col-lg-12">&nbsp;</div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Job(s) List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body semantic_table_pan">
                    <table class="ui celled table" cellspacing="0" width="100%" id="dataTables-semantic">
                        <thead>
                            <tr class="text-center">
                            <th class="text-center">#</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Post Date</th>
                            <th class="text-center">Exp Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (isset($joblist) && $joblist !="") {
                                foreach ($joblist as $key => $value) {
                                ?>
                                    <tr class="text-center">
                                    <td><?php echo $joblist[$key]->job_id; ?></td>
                                    <td><?php echo $joblist[$key]->title; ?></td>
                                    <td><?php echo $joblist[$key]->post_date; ?></td>
                                    <td><?php echo $joblist[$key]->exp_date; ?></td>
                                    <td><?php echo $joblist[$key]->status; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="<?php echo site_url(); ?>carrer/pubCheckJob/<?php echo $joblist[$key]->job_id; ?>/<?php echo $joblist[$key]->status; ?>"><i class="fa fa-eye"></i></a>|
                                        <a href="<?php echo site_url(); ?>carrer/deleteJob/<?php echo $joblist[$key]->job_id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>|
                                        <a class="btn btn-success" href=""><i class="fa fa-gear"></i></a></td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/iCheck/all.css">
<script src="<?php echo base_url(); ?>assets/vendor/iCheck/icheck.min.js"></script>
<script type="text/javascript">
    <?php if($this->session->flashdata('success')){ ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php }else if($this->session->flashdata('error')){  ?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php } ?>

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

    $('.minimal').on('ifChanged', function(event){
        
        var valu = (event.target.checked ? 0:1);
        var id = $(event.target).attr('data-id');
        $.ajax({
            url: '<?php echo site_url();?>home/statusUpdate',
            type: 'POST',
            data: {
                id: id,
                valu: valu,
                tbl: 'banner'
            },
            dataType: "json",
            beforeSend: function () {
                //console.log("Emptying");
            },
            success: function (data_st) {
                $("#statusLabel"+id).text(event.target.checked ? 'Active':'Inactive');
            },
            complete: function(data_st)
            {
               
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    });

    


</script>

