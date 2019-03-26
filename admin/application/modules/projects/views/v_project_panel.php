<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>projects/modal/popup/v_modal_project_panel_add/');" class="btn btn-success">Add Drawing <i class="fa fa-plus"></i></a>
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>projects/modal/popup/v_modal_project_panel_import/');" class="btn btn-success">Import Drawing <i class="fa fa-cloud-upload"></i></a>
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
                                <th>Approve <input type="checkbox" id="selectAll"> </th>
                                <th>Project Number</th>
                                <th>Level</th>
                                <th>Type</th>
                                <th>Panel ID</th>
                                <th>Length</th>
                                <th>Net Area</th>
                                <th>Gross Area</th>
                                <th>Volume</th>
                                <th>Weight</th>
                                <th>Thickness</th>
                                <th>Revision</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($projects as $row):?>
                                <?php $sta= ""; if($row['status'] == '0'){ $sta = '';}else{$sta = 'checked="checked"';} ?>
                                <tr class="odd">
                                    <td><input type="checkbox" <?php echo $sta;  ?> name="DrawingList" classs="DrawingList" id="appid<?php echo $row['drw_id'] ?>"  value="<?php echo $row['drw_id'] ?>"></td>
                                    <td><?php echo $row['pro_number'];?></td>
                                    <td><?php echo $row['level'];?></td>
                                    <td><?php echo $row['panel_type'];?></td>
                                    <td><?php echo $row['panel_number'];?></td>
                                    <td><?php echo $row['panel_length'];?></td>
                                    <td class="netArea"><?php echo $row['panel_net_area'];?></td>
                                    <td class="grossArea"><?php echo $row['panel_gross_area'];?></td>
                                    <td class="volume"><?php echo $row['panel_volume'];?></td>
                                    <td class="weight"><?php echo $row['panel_weight'];?></td>
                                    <td><?php echo $row['panel_thickness'];?></td>
                                    <td><?php echo $row['panel_revision'];?></td>
                                    <td class="center" style="width: 100px;">
                                        <div class="btn-group">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-info forceMarginright1" onclick="showAjaxModal('<?php echo site_url();?>projects/modal/popup/v_modal_project_panel_edit/<?php echo $row['drw_id'];?>');">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-info forceMarginright1"  onclick="confirm_modal('<?php echo base_url();?>projects/DrawingAction/delete/<?php echo $row['drw_id'];?>');">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th id="sTender"></th>
                                <th id="sActu"></th>
                                <th id="sIFC"></th>
                                <th id="netArea"></th>
                                <th id="grossArea"></th>
                                <th id="volume"></th>
                                <th id="weight"></th>
                                <th id="sPro"></th>
                                <th id="sPro"></th>
                                <th id="sPro"></th>
                            </tr>
                        </tfoot>
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

<script type="text/javascript">
    $('body').on('click', '#selectAll', function () {
        if ($("#selectAll").is(':checked')) {
            $('input:checkbox').each(function () {
                $(this).prop("checked",true);
                console.log(this);
            });
        } else {
            $('input:checkbox').each(function () {
                $(this).prop("checked",false);
                console.log(this);

            });
        }
        
    })
    $(document).ready(function() {
        
        $("#netArea").text(calculateSum('netArea'));
        $("#grossArea").text(calculateSum('grossArea'));
        $("#volume").text(calculateSum('volume'));
        $("#weight").text(calculateSum('weight'));


        var counter = 1;
     
        $('#dataTables-semantic').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Approve',
                    className: "btn btn-info forceMargin",
                    action: function ( e, dt, node, config ) {
                       reportAppList();
                    }
                }
            ]
        } );
    } );

    function calculateSum(className){
        var sum = 0;

        $('.'+className).each(function() {

            var value = $(this).text();
            // add only if the value is number
            if(!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
        });

        return sum;
    }

    function reportAppList(){
        var arr = [];
        var  base_url = '<?php echo base_url(); ?>';
        
        $("input:checkbox[name=DrawingList]:checked").each(function(){
            arr.push($(this).val());
        });

        if(arr.length == 0){
            swal("Cancelled", "Please checked minimum 1 checkbox", "error");
        }else{
           $.ajax({
                url: '<?php echo site_url();?>projects/drawingApprove',
                type: 'POST',
                data: {listArr:arr},
                dataType: 'JSON',
                beforeSend: function (jqXHR, textStatus, errorThrown) {
                   //abortAjax(jqXHR);
                },
                success: function (data_st, textStatus) {
                    if(data_st.msg == "Done"){
                        swal(
                              'Good job!',
                              'Selected drawings are approved',
                              'success'
                            )
                    }else{
                         swal("Cancelled", "Failed to approve", "error");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Some code to debbug e.g.:               
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
                
            }); 
        }
        
    }
</script>



