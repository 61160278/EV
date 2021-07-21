<?php
/*
* v_main_form.php
* Display v_main_form
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-04-06
*/  
?>

<style>
#color_head {
    background-color: #3f51b5;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<!-- END style -->

<script>
$(document).ready(function() {

    $("#show_data_import").hide();

    $('#import_form').on('submit', function(form_submit) {
        form_submit.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/import",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                $('#file').val('');
                show_data();
            }
            // success
        })
        // ajax
    });
    // onsubmit

});
// document ready

function show_data() {
    $("#show_data_import").show();

    $.get("<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/show_mhrd", function(data) {
        console.log(data);
        var obj = JSON.parse(data);

        obj.forEach((row, index) => {
            console.log(row.Emp_ID);
        })
        // foreach

    });
    // $.get
}
// show_data
</script>
<!-- END script  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Import score of form MHRD </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">

                <?php 

                if(sizeof($mhrd) == 0){ ?>
                <div class="row">
                    <div class="col-md-11">
                        <label class="control-label">
                            <strong>
                                <font size="5px">Import Score MHRD of associate</font>
                            </strong>
                        </label>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>

                <div class="row">
                    <div class="col-md-6" align="right">
                        <h3 align="center"><i class="fa fa-upload"></i></h3>
                        <h3 align="center">Choose file Excel to Import Data</h3>
                    </div>
                    <!--col-6 -->

                    <div class="col-md-5">
                        <form method="post" id="import_form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <input type="file" name="file" id="file" class="upload" required
                                        accept=".xls, .xlsx">
                                    <label>
                                        <font color="red">* file type .xls or .xlsx</font>
                                    </label>
                                </div>
                                <!-- col-6 -->
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" name="import" value="Import" class="btn btn-info" />
                                </div>
                                <!-- col-6 -->
                            </div>
                            <!-- row -->
                        </form>
                        <!-- form   -->
                    </div>
                    <!--col-6 -->
                </div>
                <!-- row -->
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped m-n" id="show_data_import">
                            <thead>
                                <tr>
                                    <th rowspan="2" width="2%">
                                        <center> No.</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>Employee id</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>Name</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>Department</center>
                                    </th>
                                    <th rowspan="2" width="10%">
                                        <center>Score 1 </center>
                                    </th>
                                    <th rowspan="2" width="10%">
                                        <center>Score 2 </center>
                                    </th>
                                    <th rowspan="2" width="10%">
                                        <center>Action</center>
                                    </th>

                                </tr>
                            </thead>
                            <!-- thead -->
                            <tbody id="row_inport_data">
                            </tbody>
                        </table>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <?php }
            // if
            else { ?>

                <div class="row">
                    <div class="col-md-11">
                        <label class="control-label">
                            <strong>
                                <font size="5px">List score MHRD of employees </font>
                            </strong>
                        </label>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped m-n" id="show_data">
                            <thead>

                                <tr>
                                    <th rowspan="2" width="2%">
                                        <center>#</center>
                                    </th>
                                    <th rowspan="2" width="7%">
                                        <center>Employee id</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>Name</center>
                                    </th>
                                    <th rowspan="2" width="7%">
                                        <center>Section code</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>Department</center>
                                    </th>
                                    <th rowspan="2" width="10%">
                                        <center>Score 1 </center>
                                    </th>
                                    <th rowspan="2" width="10%">
                                        <center>Score 2 </center>
                                    </th>
                                    <th rowspan="2" width="10%">
                                        <center>Action</center>
                                    </th>

                                </tr>

                            </thead>
                            <!-- thead -->
                            <tbody id="row_inport_data">
                                <?php 
                                $row_index = [];
                                $row_count = 0;
                                foreach($mhrd as $index => $row){
                                    if($index == 0){
                                        $emp = $row->Emp_ID;
                                    }
                                    // if 
                                }
                                // foreach 

                                $count = 0;
                                foreach($mhrd as $index => $row){  
                                    
                                    ?>
                                <tr>
                                    <?php if($index == 0){
                                        $emp = $row->Emp_ID; 
                                        $count++; 
                                    ?>
                                    <td align="center" rowspan="2"><?php echo $count; ?></td>
                                    <td align="center"><?php echo $row->Emp_ID?></td>
                                    <td><?php echo $row->Empname_eng." ".$row->Empsurname_eng?></td>
                                    <td align="center"><?php echo $row->Sectioncode_ID?></td>
                                    <td><?php echo $row->Department?></td>
                                    <td align="center"><?php echo $row->mhw_weight_1?></td>
                                    <td align="center"><?php echo $row->mhw_weight_2?></td>
                                    <td align="center" rowspan="2"><button class="btn btn btn-danger"><i
                                                class="ti ti-trash"></i></button></td>

                                    <?php }
                                    // if
                                    else if($emp == $row->Emp_ID){ ?>

                                    <td align="center"><?php echo $row->Emp_ID?></td>
                                    <td><?php echo $row->Empname_eng." ".$row->Empsurname_eng?></td>
                                    <td align="center"><?php echo $row->Sectioncode_ID?></td>
                                    <td><?php echo $row->Department?></td>
                                    <td align="center"><?php echo $row->mhw_weight_1?></td>
                                    <td align="center"><?php echo $row->mhw_weight_2?></td>

                                    <?php }
                                    else if($emp != $row->Emp_ID){
                                        $count++; 
                                        $emp = $row->Emp_ID;?>

                                    <td align="center" rowspan="2"><?php echo $count; ?></td>
                                    <td align="center"><?php echo $row->Emp_ID?></td>
                                    <td><?php echo $row->Empname_eng." ".$row->Empsurname_eng?></td>
                                    <td align="center"><?php echo $row->Sectioncode_ID?></td>
                                    <td><?php echo $row->Department?></td>
                                    <td align="center"><?php echo $row->mhw_weight_1?></td>
                                    <td align="center"><?php echo $row->mhw_weight_2?></td>
                                    <td align="center"><button class="btn btn btn-danger"><i
                                                class="ti ti-trash"></i></button></td>

                                    <?php }
                                    //else if ?>
                                </tr>
                                <?php 
                                   
                                }
                            // foreach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <?php }
            // else  ?>

            </div>
            <!-- panel-body -->
        </div>
        <!-- panel panel-indigo -->
    </div>
    <!-- col-md-12 -->
</div>
<!-- row -->