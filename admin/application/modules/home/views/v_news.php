<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>home/modal/popup/v_modal_news_add/');" class="btn btn-success">Add News <i class="fa fa-plus"></i></a>
        </div>

        <div class="col-lg-12">&nbsp;</div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Slider(s) List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body semantic_table_pan">
                    <table class="ui celled table" cellspacing="0" width="100%" id="dataTables-semantic">
                        <thead>
                            <tr>
                                <th>Heading</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody id="ProjectTbody">
                            <?php 
                                if(count($news) > 0){
                                    
                                    foreach($news as $row):?>
                                        <tr class="odd">
                                            <td><?php echo $row['title'];?></td>
                                            <td class="center">
                                                <span id="statusLabel<?php echo $row['id'];?>"><?php echo ($row['status'] == 0 ? 'Active': 'Inactive');?></span>
                                                <label><input type="checkbox" data-id="<?php echo $row['id'];?>" id="status" class="minimal" <?php echo ($row['status'] == 0 ? 'checked': '');?> ></label>
                                            </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        Action <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>home/modal/popup/v_modal_news_edit/<?php echo $row['id'];?>');">
                                                                <i class="entypo-pencil"></i>
                                                                    <?php echo "Edit";?>
                                                                </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="javascript:void(0);" onclick="confirm_modal('<?php echo base_url();?>home/bannerAction/delete/<?php echo $row['id'];?>/news');">
                                                                <i class="entypo-trash"></i>
                                                                    <?php echo "Delete";?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                            <?php } ?>
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
                tbl: 'news'
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

