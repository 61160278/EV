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
                console.log(data);

            }
            // success
        })
        // ajax
        window.location.href =
            "<?php echo base_url();?>/ev_form_HR/Evs_form_HR/excel";
    });
    // onsubmit


});
// document ready


function del_score(evs_emp_id) {

    // evs_emp_id = document.getElementById("emp_id" + count).value;
    console.log(evs_emp_id);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_form_HR/Evs_form_HR/del_score",
        data: {
            "evs_emp_id": evs_emp_id
        },
        dataType: "JSON",
        success: function(data) {
            window.location.href = "<?php echo base_url();?>/ev_form_HR/Evs_form_HR/excel";
        }
        // success

    });
    // ajax

}
// function del_score
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

                <div class="row" id="insert_data">
                    <div class="col-md-7" align="right">
                        <h3 align="center"><i class="fa fa-upload"></i></h3>
                        <h3 align="center">Select file Excel to Import Data</h3>
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

                <?php 

                if(sizeof($mhrd) == 0){ ?>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped m-n" id="show_data_import">
                            <thead>
                                <tr>
                                    <th width="2%">
                                        <center>#</center>
                                    </th>
                                    <th width="7%">
                                        <center>Employee id</center>
                                    </th>
                                    <th width="15%">
                                        <center>Name</center>
                                    </th>
                                    <th width="7%">
                                        <center>Section code</center>
                                    </th>
                                    <th width="15%">
                                        <center>Department</center>
                                    </th>
                                    <th width="2%">
                                        <center>Items</center>
                                    </th>
                                    <th width="10%">
                                        <center>Score 1 </center>
                                    </th>
                                    <th width="10%">
                                        <center>Score 2 </center>
                                    </th>
                                    <th width="10%">
                                        <center>Action</center>
                                    </th>

                                </tr>
                            </thead>
                            <!-- thead -->
                            <tbody id="row_inport">
                            </tbody>
                        </table>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <?php }
            // if
            else { ?>
                <hr>

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
                                    <th width="2%">
                                        <center>#</center>
                                    </th>
                                    <th width="7%">
                                        <center>Employee id</center>
                                    </th>
                                    <th width="15%">
                                        <center>Name</center>
                                    </th>
                                    <th width="7%">
                                        <center>Section code</center>
                                    </th>
                                    <th width="15%">
                                        <center>Department</center>
                                    </th>
                                    <th width="10%">
                                        <center>Score 1 </center>
                                    </th>
                                    <th width="10%">
                                        <center>Score 2 </center>
                                    </th>
                                    <th width="10%">
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
                                        $row_count++;
                                    }
                                    // if
                                    else if($emp == $row->Emp_ID){
                                        $row_count++;
                                    }
                                    //
                                    else if($emp != $row->Emp_ID){
                                        array_push($row_index,$row_count);
                                        $emp = $row->Emp_ID;
                                        $row_count = 0;
                                        $row_count++;
                                        
                                    } 
                                    // else if 

                                    if(($index+1) == sizeof($mhrd)){
                                        array_push($row_index,$row_count);
                                    }
                                    // if
                                    
                                }
                                // foreach 

                                $count = 0;
                                $count_index = 0;
                                foreach($mhrd as $index => $row){  ?>
                                <tr>
                                    <?php if($index == 0){
                                        $emp = $row->Emp_ID; 
                                        $count++; 
                                    ?>

                                    <td align="center" rowspan="<?php echo $row_index[$count_index]; ?>">
                                        <?php echo $count; ?></td>
                                    <td align="center" rowspan="<?php echo $row_index[$count_index]; ?>">
                                        <?php echo $row->Emp_ID?></td>
                                    <td rowspan="<?php echo $row_index[$count_index]; ?>">
                                        <?php echo $row->Empname_eng." ".$row->Empsurname_eng?></td>
                                    <td align="center" rowspan="<?php echo $row_index[$count_index]; ?>">
                                        <?php echo $row->Sectioncode_ID?></td>
                                    <td rowspan="<?php echo $row_index[$count_index]; ?>"><?php echo $row->Department?>
                                    </td>
                                    <td align="center"><?php echo $row->mhw_weight_1?></td>
                                    <td align="center"><?php echo $row->mhw_weight_2?></td>
                                    <td align="center">
                                        <button data-toggle="modal" class="btn btn-danger"
                                            data-target="#Delete<?php echo $row->mhw_evs_emp_id;?>">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>

                                    <input type="text" id="emp_id<?php echo $row->mhw_evs_emp_id; ?>"
                                        value="<?php echo $row->mhw_evs_emp_id?>" hidden>
                                    <?php 
                                    $count_index++;       
                                    }
                                    // if
                                    else if($emp == $row->Emp_ID){ ?>
                                    <td align="center"><?php echo $row->mhw_weight_1?></td>
                                    <td align="center"><?php echo $row->mhw_weight_2?></td>

                                    <?php }

                                    else if($emp != $row->Emp_ID){
                                        $count++; 
                                        $emp = $row->Emp_ID;?>

                                    <td align="center" rowspan="<?php echo $row_index[$count_index]; ?>">
                                        <?php echo $count; ?></td>
                                        <td align="center" rowspan="<?php echo $row_index[$count_index]; ?>">
                                            <?php echo $row->Emp_ID?></td>
                                        <td rowspan="<?php echo $row_index[$count_index]; ?>">
                                            <?php echo $row->Empname_eng." ".$row->Empsurname_eng?></td>
                                        <td align="center" rowspan="<?php echo $row_index[$count_index]; ?>">
                                            <?php echo $row->Sectioncode_ID?></td>
                                        <td rowspan="<?php echo $row_index[$count_index]; ?>">
                                            <?php echo $row->Department?>
                                        </td>
                                        <td align="center"><?php echo $row->mhw_weight_1?></td>
                                        <td align="center"><?php echo $row->mhw_weight_2?></td>
                                        <td align="center">
                                            <button data-toggle="modal" class="btn btn-danger"
                                                data-target="#Delete<?php echo $row->mhw_evs_emp_id;?>">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </td>
                                        <input type="text" id="emp_id<?php echo $row->mhw_evs_emp_id; ?>"
                                            value="<?php echo $row->mhw_evs_emp_id?>" hidden>
                                        <?php 
                                    $count_index++;     
                                    }
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
                <hr>
                <div class="row">
                    <div class="col-sm-8" align="left">
                        <a href="<?php echo base_url(); ?>Evs_Controller/index">
                            <button class="btn btn-inverse"><i class="fa fa-mail-reply"></i> Back</button>
                        </a>
                    </div>
                    <!-- col-8  -->

                </div>
                <!-- row  -->
            </div>
            <!-- panel-body -->
        </div>
        <!-- panel panel-indigo -->
    </div>
    <!-- col-md-12 -->
</div>
<!-- row -->


<?php 
$check = "";
if(sizeof($mhrd) != 0){
    foreach($mhrd as $index => $row){ 
        
        if($index == 0){ 
           $check = $row->mhw_evs_emp_id; 
           ?>

<!-- Modal Delete -->
<div class="modal fade" id="Delete<?php echo $row->mhw_evs_emp_id?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:red;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                    style="color:white;">&times;</button>
                <h2 class="modal-title">
                    <b>
                        <font color="white">Warning</font>
                    </b>
                </h2>
            </div>
            <!-- Modal header -->

            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group" align="center">
                        <div class="col-sm-12">
                            <label for="focusedinput" class="control-label" align="center">
                                <font size="5px">
                                    Do you want
                                    to delete
                                    data ?</font>
                            </label>

                        </div>
                    </div>
                </div>
                <!-- form-horizontal -->
            </div>
            <!-- Modal body -->

            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">NO</button>
                </div>
                <button type="button" class="btn btn-success"
                    onClick="del_score(<?php echo $row->mhw_evs_emp_id; ?>)">YES</button>
            </div>
            <!-- Modal footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Delete -->

<?php   }
        // if
        else if($check != $row->mhw_evs_emp_id){ 
            $check = $row->mhw_evs_emp_id;
        ?>

<!-- Modal Delete -->
<div class="modal fade" id="Delete<?php echo $row->mhw_evs_emp_id?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:red;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                    style="color:white;">&times;</button>
                <h2 class="modal-title">
                    <b>
                        <font color="white">Warning</font>
                    </b>
                </h2>
            </div>
            <!-- Modal header -->

            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group" align="center">
                        <div class="col-sm-12">
                            <label for="focusedinput" class="control-label" align="center">
                                <font size="5px">
                                    Do you want
                                    to delete
                                    data ?</font>
                            </label>

                        </div>
                    </div>
                </div>
                <!-- form-horizontal -->
            </div>
            <!-- Modal body -->

            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">NO</button>
                </div>
                <button type="button" class="btn btn-success"
                    onClick="del_score(<?php echo $row->mhw_evs_emp_id; ?>)">YES</button>
            </div>
            <!-- Modal footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Delete -->
<?php }
        // else if 
    }
    // if
}
// foreach 
?>