<?php 

$load = array();
$deliveryDate = array();
$totalDrawing = 0;
$totalArea = 0;

if(!empty($productionDate)){
   foreach($productionDate as $value){
        $totalDrawing++;
        $totalArea += $this->m_project->get_area_by_id('project_drawings',$value->panel_number);
        //echo $value->drw_id;
        if(!in_array($value->load_number, $load, true)){
            array_push($load, $value->load_number);
        }

        if(!in_array($value->actual_delivery_date, $deliveryDate, true)){
            array_push($deliveryDate, $value->actual_delivery_date);
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

    .cusTd{
        text-align: center !important;
        vertical-align: middle !important;
        border-right: 1px solid rgba(34,36,38,.15);
        border-left: 1px solid rgba(34,36,38,.15);
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <a href="javascript:void(0);" onclick="showAjaxModal('<?php echo site_url();?>projects/modal/popup/v_modal_project_delivery_add/');" class="btn btn-success">New Load <i class="fa fa-plus"></i></a>
        </div>

        <!-- <div class="col-lg-12">&nbsp;</div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Delivery Overview
                </div>
                <div class="panel-body">
                    <div class="form-control forceMargin">
                        <label for="field-1" class="col-sm-4 control-label">Total Drawing</label>
                        
                        <div class="col-sm-8">
                            <span><?php echo $totalDrawing; ?></span>
                        </div>
                    </div>
                    <div class="form-control forceMargin">
                        <label for="field-1" class="col-sm-4 control-label">Total Weight</label>
                        
                        <div class="col-sm-8">
                            
                            <span><?php echo $totalArea; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-lg-12">&nbsp;</div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Delivery Table
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body semantic_table_pan">
                    <table class="ui celled table" cellspacing="0" width="100%" id="dataTables-semantic">
                        <thead>
                            <tr>
                                <th>Load Number</th>
                                <th>Panel Number</th>
                                <th>Length</th>
                                <th>Width</th>
                                <th>Weight</th>
                                <th>Thickness</th>
                                <th>Gross Area</th>
                                <th>Trailer Type</th>
                                <th>Frame Type</th>
                                <th>Installation Sequence</th>
                                <th>Delivery Date</th>
                                <th>#</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                $totalLoad = 1;
                                foreach($load as $tblRow):
                                    
                                    $totalLoad = $this->m_project->get_total_Load_by_load($tblRow);
                                    //echo $totalLoad[0]->total;
                                ?>
                                
                               
                                    <?php
                                    $count = -1;
                                    $appIcon = "";
                                    foreach($productionDate as $value){
                                        
                                        if($value->status == 2){
                                            $appIcon = "#dddddd";
                                        }else{
                                            $appIcon = "#ffffff";
                                        }

                                        if($value->load_number == $tblRow){
                                            echo ' <tr style="background: '.$appIcon.';">';
                                            

                                            if($count == -1){
                                                echo '<td class="cusTd rowspan" rowspan="'.$totalLoad[0]->total.'">'.$tblRow.'</td>';
                                            }else{
                                                echo "";
                                            }
                                            
                                            echo '<td class="pnam">'.$this->m_project->get_drawing_by_id('project_drawings',$value->panel_number,'panel_number').'</td>';
                                            echo '<td>'.$this->m_project->get_drawing_by_id('project_drawings',$value->panel_number,'panel_length').'</td>';
                                            echo '<td>'.$this->m_project->get_drawing_by_id('project_drawings',$value->panel_number,'panel_width').'</td>';
                                            echo '<td class="gWeight">'.$this->m_project->get_drawing_by_id('project_drawings',$value->panel_number,'panel_weight').'</td>';
                                            echo '<td>'.$this->m_project->get_drawing_by_id('project_drawings',$value->panel_number,'panel_thickness').'</td>';
                                            echo '<td>'.$this->m_project->get_drawing_by_id('project_drawings',$value->panel_number,'panel_gross_area').'</td>';
                                            echo '<td>'.$value->trailer_type.'</td>';
                                            echo '<td>'.$value->frame_type.'</td>';
                                            echo '<td>'.$value->initial_sequence.'</td>';
                                            if($count == -1){
                                                echo '<td class="cusTd" rowspan="'.$totalLoad[0]->total.'">'.$value->actual_delivery_date.'</td>';
                                            }else{
                                                echo "";
                                            }

                                            if($count == -1){
                                                echo '<td class="cusTd" rowspan="'.$totalLoad[0]->total.'"><a onclick="goForApprove(\''.$value->load_number.'\', $(this).data(\'status\'))" data-status ="'.$value->status.'" id="approveIcon'.$value->plan_id.'" title="Click here for approve delivery" href="javascript:void(0);" class="btn btn-sm btn-info forceMarginright1"><i class="fa fa-cogs"></i></a></td>';
                                            }else{
                                                echo "";
                                            }

                                            echo '</tr>';

                                            $count++;
                                            
                                        }
                                    }
                                    ?>
                                
                                
                                <?php endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th id="totalLoad" style="text-align: center;"></th>
                                <th id="panelNumber" style="text-align: center;"></th>
                                <th></th>
                                <th></th>
                                <th id="gWeight"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                                
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
    

    $(document).ready(function() {

        var rowCount = $('.rowspan').length;
        var panelNumber = $('.pnam').length;
        $("#totalLoad").text(rowCount);
        $("#panelNumber").text(panelNumber);

        $("#gWeight").text(calculateSum('gWeight'));

        var counter = 1;
     
        $('#dataTables-semantic').DataTable();

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
    
    function goForApprove(planID,status){
        
        var newStatus = 1;
        
        if(status == 1){
            newStatus = 2;
        }else if(status == 2){
            newStatus = 1;
        }
        
        if(planID == ""){
            swal("Cancelled", "Opps Something went worng", "error");
        }else{
           $.ajax({
                url: '<?php echo site_url();?>projects/Approve/project_plannings/load_number/'+planID+'/'+newStatus,
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function (jqXHR, textStatus, errorThrown) {
                   //abortAjax(jqXHR);
                },
                success: function (data_st, textStatus) {
                    if(data_st.msg == "Done" && status == 1){
                        
                        //$("#approveIcon"+planID).removeClass('fa-check').addClass('fa-times red');
                        $("#approveIcon"+planID).data('status',newStatus);
                        $("#approveIcon"+planID).attr('title','Delivery Reject');

                        swal(
                              'Good job!',
                              'This Drawing is Approved for delivery',
                              'success'
                            )

                    }else if(data_st.msg == "Done" && status == 2){
                        
                        $("#approveIcon"+planID).data('status',newStatus);
                        $("#approveIcon"+planID).attr('title','Approve for delivery');

                        swal(
                              'Good job!',
                              'This Drawing is Rejected for delivery',
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



