<?php 

$table = array();
$productionDateL1 = array();
$totalDrawing = 0;
$totalArea = 0;

if(!empty($productionDate)){
    foreach($productionDate as $value){
        $totalDrawing++;
        $totalArea += $this->m_project->get_area_by_id('project_drawings',$value->panel_number);
        //echo $value->drw_id;
        if(!in_array($value->table_number, $table, true)){
            array_push($table, $value->table_number);
        }

        if(!in_array($value->actual_produce_date, $productionDateL1, true)){
            array_push($productionDateL1, $value->actual_produce_date);
        }
    }
}


?>
<style type="text/css">
    .red{
        color: RED;
    }
    .fa:hover{
        cursor: pointer;
    }
    .qtip-wiki{
        max-width: 385px;
    }

    .qtip-wiki p{
        margin: 0 0 6px;
    }

    .qtip-wiki h1{
        font-size: 20px;
        line-height: 1.1;
        margin: 0 0 5px;
    }

    .qtip-wiki img{
        float: left;
        margin: 10px 10px 10px 0;
    }

    .qtip-wiki .info{
        overflow: hidden;
    }

    .qtip-wiki p.note{
        font-weight: 700;
    }

    .qtip{
        min-width: 200px;
    }

    .qtip table{
        width: 100%;
    }

    .qtip table th{
        font-size: 14px;
        padding: 5px;
        text-align: center;
        font-weight: bold;

    }

    .qtip table td{
        font-size: 14px;
        padding: 5px;
        text-align: left;
        font-weight: 400;
        border-bottom: 1px solid #6d6969;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>projects/modal/popup/v_modal_project_production_add/');" class="btn btn-success">Add New <i class="fa fa-plus"></i></a>
        </div>

        <div class="col-lg-12">&nbsp;</div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Production Overview
                </div>
                <div class="panel-body">
                    <div class="form-control forceMargin">
                        <label for="field-1" class="col-sm-4 control-label">Total Drawing</label>
                        
                        <div class="col-sm-8">
                            <span><?php echo $totalDrawing; ?></span>
                        </div>
                    </div>
                    <div class="form-control forceMargin">
                        <label for="field-1" class="col-sm-4 control-label">Total Area</label>
                        
                        <div class="col-sm-8">
                            
                            <span><?php echo $totalArea; ?></span>
                        </div>
                    </div>
                    <div class="form-control forceMargin">
                        <label for="field-1" class="col-sm-4 control-label">Allowable Hour</label>
                        
                        <div class="col-sm-8">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">&nbsp;</div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Production Table
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body semantic_table_pan">
                    <table class="ui celled table" cellspacing="0" width="100%" id="dataTables-semantic">
                        <thead>
                            <tr>
                                <th>Table</th>
                                <?php 
                                foreach($productionDateL1 as $date):?>
                                    <th><?php echo  $date; ?></th>
                                <?php endforeach;?>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                foreach($table as $tblRow):?>
                                <tr class="odd">
                                    <td>
                                        <?php echo $tblRow; ?> 
                                    </td>
                                    <?php
                                    $appIcon = "";
                                    $appMsg = "";
                                    foreach($productionDate as $value){
                                        if($value->status == 0){
                                            $appIcon = "fa-check";
                                            $appMsg = "Approve for production";
                                        }else{
                                            $appIcon = "fa-times red";
                                            $appMsg = "Reject for production";
                                        }

                                        if($tblRow == $value->table_number){

                                            foreach($productionDateL1 as $iniDate){ 
                                                if($iniDate == $value->actual_produce_date){
                                                    echo '<td>';
                                                    echo '<a style="width: 87%;" class="btn-default btn-sm">'.$this->m_project->get_drawing_name_by_id('project_drawings',$value->panel_number).'<i onclick="goForApprove('.$value->plan_id.', $(this).data(\'status\'))" data-status ="'.$value->status.'" id="approveIcon'.$value->plan_id.'" class="fa '.$appIcon.' pull-right forceTma" title="'.$appMsg.'"></i><i href="'.base_url().'projects/getDetail/getdrawingwithproject/drw_id/'.$value->panel_number.'" class="fa fa-eye pull-right forceTma" title="View Project Detail"></i></a>';
                                                    echo '</td>';
                                                }else{
                                                    echo '<td>&nbsp;</td>';
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    
                                    
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

<script type="text/javascript">
    

    $(document).ready(function() {
        var counter = 1;
     
        $('#dataTables-semantic').DataTable();

    } );
    
    function goForApprove(planID,status){
        
        var newStatus = 0;
        
        if(status == 0){
            newStatus = 1;
        }else if(status == 1){
            newStatus = 0;
        }
        
        if(planID == ""){
            swal("Cancelled", "Opps Something went worng", "error");
        }else{
           $.ajax({
                url: '<?php echo site_url();?>projects/Approve/project_plannings/plan_id/'+planID+'/'+newStatus,
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function (jqXHR, textStatus, errorThrown) {
                   //abortAjax(jqXHR);
                },
                success: function (data_st, textStatus) {
                    if(data_st.msg == "Done" && status == 0){
                        
                        $("#approveIcon"+planID).removeClass('fa-check').addClass('fa-times red');
                        $("#approveIcon"+planID).data('status',newStatus);
                        $("#approveIcon"+planID).attr('title','Reject for production');

                        swal(
                              'Good job!',
                              'This Drawing is Approved for production',
                              'success'
                            )

                    }else if(data_st.msg == "Done" && status == 1){
                        
                        $("#approveIcon"+planID).removeClass('fa-times red').addClass('fa-check');
                        $("#approveIcon"+planID).data('status',newStatus);
                        $("#approveIcon"+planID).attr('title','Approve for production');

                        swal(
                              'Good job!',
                              'This Drawing is Rejected for production',
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

    $('.fa-eye').qtip({
        content: {
            text: function(event, api) {
                $.ajax({
                    url: api.elements.target.attr('href') // Use href attribute as URL
                })
                .then(function(content) {
                    // Set the tooltip content upon successful retrieval
                    console.log(content.result);
                    var design = '          <table>';
                        design += '            <thead>';
                        design += '                <tr class="odd"><th>Item</th><th>Value</th></tr>';
                        design += '            </thead>';
                        design += '            <tbody>';
                        design += '                <tr class="odd"><td>Project</td><td>'+content.result[0].pro_name+'</td></tr>';
                        design += '                <tr class="odd"><td>Drawing Type</td><td>'+content.result[0].panel_type+'</td></tr>';
                        design += '                <tr class="odd"><td>Drawing Number</td><td>'+content.result[0].panel_number+'</td></tr>';
                        design += '                <tr class="odd"><td>Length</td><td>'+content.result[0].panel_length+'</td></tr>';
                        design += '                <tr class="odd"><td>Width</td><td>'+content.result[0].panel_width+'</td></tr>';
                        design += '                <tr class="odd"><td>Net Area</td><td>'+content.result[0].panel_net_area+'</td></tr>';
                        design += '                <tr class="odd"><td>Gross Area</td><td>'+content.result[0].panel_gross_area+'</td></tr>';
                        design += '                <tr class="odd"><td>Volume</td><td>'+content.result[0].panel_volume+'</td></tr>';
                        design += '                <tr class="odd"><td>Weight</td><td>'+content.result[0].panel_weight+'</td></tr>';
                        design += '                <tr class="odd"><td>Thikness</td><td>'+content.result[0].panel_thickness+'</td></tr>';
                        design += '                <tr class="odd"><td>Revision</td><td>'+content.result[0].panel_revision+'</td></tr>';
                        design += '            </tbody>';
                        design += '        </table>';
                    api.set('content.text', design);

                    design = "";

                }, function(xhr, status, error) {
                    // Upon failure... set the tooltip content to error
                    api.set('content.text', status + ': ' + error);
                });
    
                return 'Loading...'; // Set some initial text
            }
        },
        position: {
            my: 'bottom right',  // Position my top left...
            at: 'top left'
        }
    });
</script>



