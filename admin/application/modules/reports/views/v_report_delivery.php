<div class="row">
    <div class="col-lg-12">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Delivery/ Stroe/ Erection Overview
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" name="productiondetail" id="productiondetail" class="productiondetail" >
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Project</label>
                            <div class="col-sm-7">
                                <select name="projectID" class="form-control forceMargin" style="width:100%;" onChange="getLevel(this.value);">
                                    <?php 
                                    $projects = $this->db->get_where('projects')->result_array();
                                    
                                    foreach($projects as $proRow):
                                    ?>
                                        <option value="<?php echo $proRow['pro_id'];?>"><?php echo $proRow['pro_number'];?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Level</label>
                            <div class="col-sm-7">
                                <select name="LevelID" id="LevelID" class="form-control forceMargin" style="width:100%;">
                                    <?php 
                                    $levels = $this->db
                                                   ->group_by('level')
                                                   ->get_where('project_drawings', array('status' => '1','pro_id'=>$projects[0]['pro_id']))
                                                   ->result_array();
                                    
                                    foreach($levels as $row):
                                    ?>
                                        <option value="<?php echo $row['level'];?>"><?php echo $row['level'];?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-5">
                                <button type="button" id="Search" class="btn btn-info"><?php echo ('Search');?></button>
                            </div>
                            
                        </div>
                </form>
                    
                </div>
            </div>
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
                                <th>Project Name</th>
                                <th>Level</th>
                                <th>Type</th>
                                <th>Tender</th>
                                <th>Actual</th>
                                <th>IFC</th>
                                <th>Plan For Production</th>
                                <th>Produced</th>
                                <th>Deliver</th>
                                <th>Store</th>
                                <th>Erection</th>
                            </tr>
                        </thead>
                        <tbody id="DrawingTBody">
                               
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th id="sTender"></th>
                                <th id="sActu"></th>
                                <th id="sIFC"></th>
                                <th id="sProPlan"></th>
                                <th id="sPro"></th>
                                <th id="sdeli"></th>
                                <th id="sStore"></th>
                                <th id="sErection"></th>
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

<script>
    $(document).ready(function () {

        $('#dataTables-semantic').DataTable({
            responsive: true
        });

    });

    $(document).ready(function() {
        $("#productiondetail").validate({
            rules: {
                projectID: "required",
                LevelID: "required"
            },
            messages: {
                projectID: "required",
                LevelID: "required"
            }
        })

        $('#Search').click(function() {
            if($("#productiondetail").valid() == true){
                var formData = new FormData(document.getElementsByName('productiondetail')[0]);
                
                $.ajax({
                    url: '<?php echo site_url();?>reports/searchDrawing',
                    type: 'POST',
                    data: formData,
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    beforeSend: function (jqXHR, textStatus, errorThrown) {
                       //abortAjax(jqXHR);
                       $('#DrawingTBody').html("");
                    },
                    success: function (data_st, textStatus) {
                        console.log(data_st);
                        
                        if(data_st.drawing.length > 0){
                             $.each(data_st.drawing, function(key, value) {   
                                
                                var trDesign = '<tr>';
                                    trDesign += '<td>'+data_st.ProjectNumber+'</td>';
                                    trDesign += '<td>'+data_st.Level+'</td>';
                                    trDesign += '<td>'+value.panel_type+'</td>';
                                    trDesign += '<td class="sTender">'+value.quantity+'</td>';
                                    trDesign += '<td class="sActu">'+data_st.Actual[key][0].tPlan+'</td>';
                                    trDesign += '<td class="sIFC">'+data_st.Actual[key][0].tPlan+'</td>';
                                    trDesign += '<td class="sProPlan" id="pfp'+value.drw_id+'"></td>';
                                    trDesign += '<td class="sPro" id="pp'+value.drw_id+'"></td>';
                                    trDesign += '<td class="sdeli" id="deli'+value.drw_id+'"></td>';
                                    trDesign += '<td class="sStore" id="str'+value.drw_id+'"></td>';
                                    trDesign += '<td class="sErection" id="erec'+value.drw_id+'"></td>';
                                    trDesign += '</tr>';



                                 
                                $('#DrawingTBody').append(trDesign);
                                //$('#dataTables-semantic').DataTable().row.add().draw();
                                // var dt = $('#dataTables-semantic').dataTable();
                                // dt.row.add(trDesign);
                                // dt.draw();
                                //$('#dataTables-semantic').DataTable().row.add(trDesign).draw();
                                //$('#dataTables-semantic').dataTable().fnAddData(trDesign );
                                trDesign = "";
                                planForProduction(value.drw_id,data_st.Level,value.panel_type);

                            });

                            $("#sTender").text(calculateSum('sTender'));
                            $("#sActu").text(calculateSum('sActu'));
                            $("#sIFC").text(calculateSum('sIFC'));
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
            
        });
    });

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

    function planForProduction(value,LevelID,typePanel){
        console.log(value+","+LevelID+","+typePanel);
        $.ajax({
            url: '<?php echo site_url();?>reports/ForDeliverReport',
            type: 'POST',
            data: {
                LevelID:LevelID,
                typePanel:typePanel
            },
            dataType: "JSON",
            beforeSend: function (jqXHR, textStatus, errorThrown) {
               //abortAjax(jqXHR);
               //$('#DrawingTBody').html("");
            },
            success: function (data_st, textStatus) {
                var sum = 0;
                var quantity = 0;
                
                console.log(data_st);
                
                $("#pfp"+value).text(data_st.totalPlan[0].tPlan);
                $("#pp"+value).text(data_st.totalProducePlan[0].tPro);
                $("#deli"+value).text(data_st.totaldelivered[0].tPro);

                $("#str"+value).text(parseInt( data_st.totalPlan[0].tPlan) - parseInt(data_st.totaldelivered[0].tPro));
                $("#erec"+value).text(parseInt(data_st.totalPlan[0].tPlan) - parseInt(data_st.totaldelivered[0].tPro));

                $("#sProPlan").text(calculateSum('sProPlan'));
                $("#sPro").text(calculateSum('sPro'));
                $("#sdeli").text(calculateSum('sdeli'));
                $("#sStore").text(calculateSum('sStore'));
                $("#sErection").text(calculateSum('sErection'));

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function getLevel(projectid){
        $.ajax({
            url: '<?php echo site_url();?>projects/getLevel',
            type: 'POST',
            data: {projectid:projectid},
            dataType: "JSON",
            beforeSend: function (jqXHR, textStatus, errorThrown) {
               $("#LevelID").html("");
            },
            success: function (data_st, textStatus) {
                
                if(data_st.levels.length == 0){
                    swal("Cancelled", "No Level found!!!", "error");
                }else{
                    
                    $.each(data_st.levels, function(key, value) {   
                         $('#LevelID').append('<option value="'+value.level+'">'+value.level+'</option>');
                    });
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
</script>

