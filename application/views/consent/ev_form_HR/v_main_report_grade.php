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
    $('#show_report').DataTable();
});
// document ready

function save_grade() {
    Emp_ID = [];
    grade = [];
    comment = [];
    var index = document.getElementById("table_index").value;

    console.log(index);

    for (i = 0; i < index; i++) {

        Emp_ID.push(document.getElementsByName("Emp_ID")[i].value);
        grade.push(document.getElementsByName("grade")[i].value);
        comment.push(document.getElementsByName("comment")[i].value);

    }
    // for
    console.log(Emp_ID);
    console.log(grade);
    console.log(comment);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/save_grade",
        data: {
            "Emp_ID": Emp_ID,
            "grade": grade,
            "comment": comment
        },
        success: function(data) {
            console.log(data);
            window.location.href = "<?php echo base_url();?>ev_form_HR/Evs_form_HR/index";
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax


}
</script>
<!-- END script  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Report Grade </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-11">
                        <label class="control-label">
                            <strong>
                                <font size="5px">List of employees to report grade </font>
                            </strong>
                        </label>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->

                <table class="table table-bordered table-striped m-n" id="show_report">
                    <thead>
                        <tr>
                            <th width="2%">
                                <center> No.</center>
                            </th>
                            <th width="15%">
                                <center>Employee id</center>
                            </th>
                            <th width="15%">
                                <center>Name-Surname</center>
                            </th>
                            <th width="15%">
                                <center>Group</center>
                            </th>
                            <th width="20%">
                                <center>Grade Evaluation / Grade Auto</center>
                            </th>
                            <th width="20%">
                                <center>Reasoning</center>
                            </th>
                           
                            <th width="20%">
                                <center>Comment</center>
                            </th>

                        </tr>
                    </thead>
                    <!-- thead -->
                    <tbody>
                        <?php 
                                $table_index = 0;
                            
							    foreach($data_group as $index => $row) {
                                if($data_emp_id != $row->emp_employee_id) { ?>
                        <input name="Emp_ID" type="text" value="<?php echo $row->emp_id ?>" hidden>
                        <tr>
                            <td>
                                <center>
                                    <?php echo $index+1 ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo  $row->emp_employee_id ?>

                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->gru_name ?>

                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $data_grade[$index]." / ".$garde_auto[$index] ?>
                                    <input type="text" name="grade" value="<?php 
                                    if($garde_auto[$index] == " - "){ echo $data_grade[$index]; }
                                    else{ echo $garde_auto[$index]; } 
                                    ?>" hidden>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $data_reasoning[$index] ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <textarea type="text" name="comment" placeholder="Enter comment"
                                        class="form-control"></textarea>
                                </center>
                            </td>
                        </tr>
                        <?php 
                            $table_index += 1;
                                         }
                                         // if
                                    }
                                    // foreach ?>

                        <input type="text" id="table_index" value="<?php echo $table_index; ?>" hidden>
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <a
                            href="<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/table_goup/<?php echo $data_hard_dep ?>/<?php echo $data_focas_group ?>">
                            <button type="button" class="btn btn-inverse">Back</button>
                        </a>
                    </div>
                    <div class="col-md-6" align="right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#save_data"> Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal save -->
<div class="modal fade" id="save_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b></font>
                </button>
                <h2 class="modal-title"><b>
                        <font color="white">Do you want to Save Data YES or NO ?</font>
                    </b></h2>
            </div>
            <!-- modal header -->

            <div class="modal-body">
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-12 control-label" align="center">Please verify the
                        accuracy
                        of the information.</label>
                </div>
                <!-- Group Name -->
            </div>
            <!-- modal-body -->

            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                </div>
                <button type="button" class="btn btn-success" id="btnsaveadd" onclick="save_grade()">Submit</button>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal save-->