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
    $('#show_emp').DataTable();
});
// document ready

function save_group_to_HR() {

    var Emp_ID = [];
    var comment = [];
    var index = document.getElementById("table_index").value;

    for (i = 0; i < index; i++) {
        Emp_ID.push(document.getElementById("Emp_ID" + i).value);
        comment.push(document.getElementById("comment" + i).value);
    }
    // for 

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/save_feedback",
        data: {
            "Emp_ID": Emp_ID,
            "index": index,
            "status_us" : "6",
            "comment":comment
        },
        success: function(data) {
            console.log(data);
            main_index();
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax 

}
// save_group_to_HR

function main_index() {
    window.location.href = "<?php echo base_url();?>/ev_form_HD/Evs_form_HD/feedback";
}
// main_index 
</script>
<!-- END script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Feedback Group </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>List of employees to feedback group </h3>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>
                <table class="table table-bordered m-n" id="show_emp">
                    <thead>
                        <tr>
                            <th>
                                <center>#</center>
                            </th>
                            <th>
                                <center>Employee ID</center>
                            </th>
                            <th>
                                <center>Name - surname</center>
                            </th>
                            <th>
                                <center>Section Code</center>
                            </th>
                            <th>
                                <center>Department</center>
                            </th>
                            <th>
                                <center>Position</center>
                            </th>
                            <th>
                                <center>Group</center>
                            </th>
                            <th>
                                <center>Comment</center>
                            </th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <!-- thead -->

                    <tbody>
                        <?php 
                            $table_index = 0;
							    foreach($data_group as $index => $row) {?>
                        <input name="Emp_ID" id="Emp_ID<?php echo $index; ?>" type="text"
                            value="<?php echo $row->emp_id ?>" hidden>
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
                                <center><?php echo $row->Sectioncode_ID; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row->Department; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row->Position_name; ?></center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->gru_name ?>
                                </center>
                            </td>
                            <td>
                                <center><?php echo $row->dgr_grade ?></center>
                            </td>
                            <td>
                                <center>
                                    <textarea type="text" id="comment<?php echo $index; ?>" placeholder="Enter comment"
                                        class="form-control"></textarea>
                                </center>
                            </td>
                        </tr>

                        <?php 
                            $table_index += 1;
                                    }
                                    // foreach  ?>
                        <input type="text" id="table_index" value="<?php echo $table_index; ?>" hidden>
                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- table  -->

                <br>
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo base_url(); ?>Evs_all_manage/index_a">
                            <button class="btn btn-inverse">BACK</button>
                        </a>
                    </div>
                    <!-- col-6  -->
                    <div class="col-md-6" align="right">
                        <?php if(sizeof($data_group) != 0){?>
                        <button id="save" class="btn btn-success" data-toggle="modal" data-target="#save_data">
                        Accept</button>
                        <?php }
                        // if
                        else {?>
                        <button id="save" class="btn btn-success" disabled>
                        Accept</button>
                        <?php }
                        // else ?>
                    </div>
                    <!-- col-6  -->
                </div>
                <!-- row  -->
            </div>
            <!-- body -->
        </div>
        <!-- panel -->
    </div>
    <!-- col-12  -->
</div>
<!-- row  -->

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
                <button type="button" class="btn btn-success" id="btnsaveadd" onclick="save_group_to_HR()">Submit</button>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal save-->