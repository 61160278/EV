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
    $('#show_app1').DataTable();
    $('#show_app2').DataTable();
    $("#App1").addClass("active");
});
// document ready

function save_group_to_app1() {

    var Emp_ID = [];
    var comment = [];
    var index = document.getElementById("table_index1").value;

    for (i = 0; i < index; i++) {
        Emp_ID.push(document.getElementById("Emp_ID1_" + i).value);
        comment.push(document.getElementById("comment1_" + i).value);
    }
    // for 

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/save_feedback",
        data: {
            "Emp_ID": Emp_ID,
            "index": index,
            "status_us": "8",
            "comment": comment
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
// save_group_to_app1

function save_group_to_app2() {

    var Emp_ID = [];
    var comment = [];
    var index = document.getElementById("table_index2").value;

    for (i = 0; i < index; i++) {
        Emp_ID.push(document.getElementById("Emp_ID2_" + i).value);
        comment.push(document.getElementById("comment2_" + i).value);
    }
    // for 

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/save_feedback",
        data: {
            "Emp_ID": Emp_ID,
            "index": index,
            "status_us": "7",
            "comment": comment
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
// save_group_to_app2

function main_index() {
    window.location.href = "<?php echo base_url();?>ev_form/Evs_form_evaluation/feedback";
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
                <div id="tabmenu">
                    <ul class="nav nav-tabs pull-right tabdrop" id="show_tap">
                        <li class="active">
                            <a href="#App1" data-toggle="tab">
                                <font>Approver 1</font>
                            </a>
                        </li>
                        <!-- approver1 -->
                        <li>
                            <a href="#App2" data-toggle="tab">
                                <font>Approver 2</font>
                            </a>
                        </li>
                        <!-- approver2 -->
                    </ul>
                </div>
                <!-- tabmenu -->
            </div>
            <!-- heading -->
            <div class="panel-body">
                <div class="tab-content">

                    <div class="tab-pane" id="App1">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>List of employees to feedback group : Approver 1</h3>
                            </div>
                            <!-- col-12  -->
                        </div>
                        <!-- row  -->
                        <hr>
                        <table class="table table-bordered m-n" id="show_app1">
                            <thead>
                                <tr>
                                    <th width="2%">
                                        <center>#</center>
                                    </th>
                                    <th width="8%">
                                        <center>Employee ID</center>
                                    </th>
                                    <th width="15%">
                                        <center>Name - surname</center>
                                    </th>
                                    <th width="10%">
                                        <center>Section Code</center>
                                    </th>
                                    <th width="15%">
                                        <center>Department</center>
                                    </th>
                                    <th width="15%">
                                        <center>Position</center>
                                    </th>
                                    <th width="10%">
                                        <center>Group</center>
                                    </th>
                                    <th width="5%">
                                        <center>Grade</center>
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
							    foreach($data_group1 as $index => $row) {?>
                                <input name="Emp_ID" id="Emp_ID1_<?php echo $index; ?>" type="text"
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
                                        <center>
                                            <h3>
                                                <b>
                                                    <?php echo $row->dgr_grade ?>
                                                </b>
                                            </h3>
                                        </center>
                                    </td>
                                    <td>
                                        <?php for($i=0;$i < 3;$i++){ ?>
                                        <p><?php echo "Approver : ".$app_com1[$index][$i]; ?></p>
                                        <p><?php echo "Comment : ".$comment1[$index][$i]; ?></p>
                                        <hr>
                                        <?php } ?>
                                        <center>
                                            <textarea type="text" id="comment1_<?php echo $index; ?>"
                                                placeholder="Enter comment" class="form-control"></textarea>
                                        </center>
                                    </td>
                                </tr>

                                <?php 
                            $table_index += 1;
                                    }
                                    // foreach  ?>
                                <input type="text" id="table_index1" value="<?php echo $table_index; ?>" hidden>
                            </tbody>
                            <!-- tbody  -->
                        </table>
                        <!-- table  -->

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>Evs_all_manage/index_u">
                                    <button class="btn btn-inverse">BACK</button>
                                </a>
                            </div>
                            <!-- col-6  -->
                            <div class="col-md-6" align="right">
                                <?php if(sizeof($data_group1) != 0){?>
                                <button id="save" class="btn btn-success" data-toggle="modal"
                                    data-target="#save_data_app1">
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
                    <!-- App1  -->

                    <div class="tab-pane" id="App2">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>List of employees to feedback group : Approver 2</h3>
                            </div>
                            <!-- col-12  -->
                        </div>
                        <!-- row  -->
                        <hr>
                        <table class="table table-bordered m-n" id="show_app2">
                            <thead>
                                <tr>
                                    <th width="2%">
                                        <center>#</center>
                                    </th>
                                    <th width="8%">
                                        <center>Employee ID</center>
                                    </th>
                                    <th width="15%">
                                        <center>Name - surname</center>
                                    </th>
                                    <th width="10%">
                                        <center>Section Code</center>
                                    </th>
                                    <th width="15%">
                                        <center>Department</center>
                                    </th>
                                    <th width="15%">
                                        <center>Position</center>
                                    </th>
                                    <th width="10%">
                                        <center>Group</center>
                                    </th>
                                    <th width="5%">
                                        <center>Grade</center>
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
							    foreach($data_group2 as $index => $row) {?>
                                <input name="Emp_ID" id="Emp_ID2_<?php echo $index; ?>" type="text"
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
                                        <center>
                                            <h3>
                                                <b>
                                                    <?php echo $row->dgr_grade ?>
                                                </b>
                                            </h3>
                                        </center>
                                    </td>
                                    <td>
                                        <?php for($i=0;$i < 2;$i++){ ?>
                                        <p><?php echo "Approver : ".$app_com2[$index][$i]; ?></p>
                                        <p><?php echo "Comment : ".$comment2[$index][$i]; ?></p>
                                        <hr>
                                        <?php } ?>
                                        <center>
                                            <textarea type="text" id="comment2_<?php echo $index; ?>"
                                                placeholder="Enter comment" class="form-control"></textarea>
                                        </center>
                                    </td>
                                </tr>

                                <?php 
                            $table_index += 1;
                                    }
                                    // foreach  ?>
                                <input type="text" id="table_index2" value="<?php echo $table_index; ?>" hidden>
                            </tbody>
                            <!-- tbody  -->
                        </table>
                        <!-- table  -->

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>Evs_all_manage/index_u">
                                    <button class="btn btn-inverse">BACK</button>
                                </a>
                            </div>
                            <!-- col-6  -->
                            <div class="col-md-6" align="right">
                                <?php if(sizeof($data_group2) != 0){?>
                                <button id="save" class="btn btn-success" data-toggle="modal"
                                    data-target="#save_data_app2">
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
                    <!-- App2  -->


                </div>
                <!-- tab_content  -->
            </div>
            <!-- body -->
        </div>
        <!-- panel -->
    </div>
    <!-- col-12  -->
</div>
<!-- row  -->

<!-- Modal save app2 -->
<div class="modal fade" id="save_data_app1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
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
                <button type="button" class="btn btn-success" id="btnsaveadd"
                    onclick="save_group_to_app1()">Submit</button>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal save app1 -->

<!-- Modal save app2 -->
<div class="modal fade" id="save_data_app2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
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
                <button type="button" class="btn btn-success" id="btnsaveadd"
                    onclick="save_group_to_app2()">Submit</button>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal save app2 -->