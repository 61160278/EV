<?php
/*
* v_main_permission.php
* Display v_main_permission
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-04-29
*/  
?>

<style>
#tabmenu {
    font-size: 20px;
}

#color_head {
    background-color: #3f51b5;
}

th {
    color: #ffffff;
    font-weight: bold;
    font-size: 16px;
    background-color: #212121;
}

#dis_color {
    /* background-color: #F5F5F5; */
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<!-- END style -->

<script>
var count = 0;

$(document).ready(function() {
    set_tap_his()
});
// document ready

function show_approve() {

    var evs_emp_id = document.getElementById("evs_emp_id").value;
    var Emp_id = document.getElementById("emp_id").innerHTML;
    var data_show = "";
    $("#emp_id_his").val(Emp_id);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/get_approve",
        data: {
            "evs_emp_id": evs_emp_id

        },
        success: function(data) {
            // console.log(data);
            var app1 = "";
            var app2 = "";
            var id_app1 = "";
            var id_app2 = "";

            if (data['app2'].length != 0) {
                data['app1'].forEach((row, index) => {
                    app1 = row.Empname_eng + " " + row.Empsurname_eng;
                    id_app1 = row.Emp_ID;
                });
                // foreach app 1
                data['app2'].forEach((row, index) => {
                    app2 = row.Empname_eng + " " + row.Empsurname_eng;
                    id_app2 = row.Emp_ID;
                });
                // foreach app 1

                data_show = '<div class="row">'
                data_show += '<div class="col-md-2">'
                data_show += ' <label class="control-label"><strong>'
                data_show += '<font size="3px">Approver 1 : </font>'
                data_show += '</strong></label>'
                data_show += '</div>'
                data_show += '<!-- col-2  -->'
                data_show += '<div class="col-md-4">'
                if (app1 != "") {
                    data_show += '<p id="app1">' + app1 + '</p>'
                }
                // if
                else {
                    data_show += '<p id="app1">No Approver 1</p>'
                }
                // else 
                data_show += '</div>'
                data_show += '<!-- col-4  -->'
                data_show += '<!-- -------------------- -->'
                data_show += '<div class="col-md-2">'
                data_show += '<label class="control-label"><strong>'
                data_show += '<font size="3px">Approver 2 : </font>'
                data_show += '</strong></label>'
                data_show += '</div>'
                data_show += '<!-- col-2  -->'
                data_show += '<div class="col-md-4">'
                data_show += '<p id="app">' + app2 + '</p>'
                data_show += '</div>'
                data_show += '<!-- col-4  -->'
                data_show += '<!-- -------------------- -->'
                data_show += '</div>'
                data_show += '<!-- row  -->'
                data_show += '<hr>'
                $("#show_approver").html(data_show);

            }
            // if

        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// function show_approve

function show_approveG_O() {

    var evs_emp_id = document.getElementById("evs_emp_id").value;
    var data_show = "";

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/get_approveG_O",
        data: {
            "evs_emp_id": evs_emp_id

        },
        success: function(data) {
            // console.log(data);
            var app1 = "";
            var app2 = "";
            var id_app1 = "";
            var id_app2 = "";

            if (data['app2'].length != 0) {
                data['app1'].forEach((row, index) => {
                    app1 = row.Empname_eng + " " + row.Empsurname_eng;
                    id_app1 = row.Emp_ID;
                });
                // foreach app 1
                data['app2'].forEach((row, index) => {
                    app2 = row.Empname_eng + " " + row.Empsurname_eng;
                    id_app2 = row.Emp_ID;
                });
                // foreach app 1

                data_show = '<div class="row">'
                data_show += '<div class="col-md-2">'
                data_show += ' <label class="control-label"><strong>'
                data_show += '<font size="3px">Approver 1 : </font>'
                data_show += '</strong></label>'
                data_show += '</div>'
                data_show += '<!-- col-2  -->'
                data_show += '<div class="col-md-4">'
                if (app1 != "") {
                    data_show += '<p id="app1">' + app1 + '</p>'
                }
                // if
                else {
                    data_show += '<p id="app1">No Approver 1</p>'
                }
                // else 
                data_show += '</div>'
                data_show += '<!-- col-4  -->'
                data_show += '<!-- -------------------- -->'
                data_show += '<div class="col-md-2">'
                data_show += '<label class="control-label"><strong>'
                data_show += '<font size="3px">Approver 2 : </font>'
                data_show += '</strong></label>'
                data_show += '</div>'
                data_show += '<!-- col-2  -->'
                data_show += '<div class="col-md-4">'
                data_show += '<p id="app">' + app2 + '</p>'
                data_show += '</div>'
                data_show += '<!-- col-4  -->'
                data_show += '<!-- -------------------- -->'
                data_show += '</div>'
                data_show += '<!-- row  -->'
                data_show += '<hr>'
                $("#show_approverG_O").html(data_show);


            }
            // if

        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// function show_approveG_O

function show_approve_mhrd() {

    var evs_emp_id = document.getElementById("evs_emp_id").value;
    var data_show = "";

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/get_approve",
        data: {
            "evs_emp_id": evs_emp_id

        },
        success: function(data) {
            // console.log(data);
            var app1 = "";
            var app2 = "";
            var id_app1 = "";
            var id_app2 = "";

            if (data['app2'].length != 0) {
                data['app1'].forEach((row, index) => {
                    app1 = row.Empname_eng + " " + row.Empsurname_eng;
                    id_app1 = row.Emp_ID;
                });
                // foreach app 1
                data['app2'].forEach((row, index) => {
                    app2 = row.Empname_eng + " " + row.Empsurname_eng;
                    id_app2 = row.Emp_ID;
                });
                // foreach app 1

                data_show = '<div class="row">'
                data_show += '<div class="col-md-2">'
                data_show += ' <label class="control-label"><strong>'
                data_show += '<font size="3px">Approver 1 : </font>'
                data_show += '</strong></label>'
                data_show += '</div>'
                data_show += '<!-- col-2  -->'
                data_show += '<div class="col-md-4">'
                if (app1 != "") {
                    data_show += '<p id="app1">' + app1 + '</p>'
                }
                // if
                else {
                    data_show += '<p id="app1">No Approver 1</p>'
                }
                // else 
                data_show += '</div>'
                data_show += '<!-- col-4  -->'
                data_show += '<!-- -------------------- -->'
                data_show += '<div class="col-md-2">'
                data_show += '<label class="control-label"><strong>'
                data_show += '<font size="3px">Approver 2 : </font>'
                data_show += '</strong></label>'
                data_show += '</div>'
                data_show += '<!-- col-2  -->'
                data_show += '<div class="col-md-4">'
                data_show += '<p id="app">' + app2 + '</p>'
                data_show += '</div>'
                data_show += '<!-- col-4  -->'
                data_show += '<!-- -------------------- -->'
                data_show += '</div>'
                data_show += '<!-- row  -->'
                data_show += '<hr>'
                $("#show_approver_mhrd").html(data_show);
            }
            // if


        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// function show_approve

function set_tap_his() {

    var ps_pos_id = document.getElementById("pos_id").value;
    var data_tap = "";

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/get_tap_form",
        data: {
            "ps_pos_id": ps_pos_id
        },
        success: function(data) {

            data.forEach((row, index) => {
                if (row.ps_form_pe == "MBO") {
                    data_tap += '<li class="active"><a href="#MBO" data-toggle="tab">';
                    data_tap += '<font>MBO</font>';
                    data_tap += '</a></li>';
                    show_approve();
                    $("#MBO").addClass("active");

                }
                // if
                else if (row.ps_form_pe == "G&O") {
                    data_tap += '<li class="active"><a href="#G_O" data-toggle="tab">';
                    data_tap += '<font>G&O</font>';
                    data_tap += '</a></li>';
                    show_approveG_O();
                    $("#G_O").addClass("active");

                }
                // else if
                else if (row.ps_form_pe == "MHRD") {
                    data_tap += '<li class="active"><a href="#mhrd" data-toggle="tab">';
                    data_tap += '<font>MHRD</font>';
                    data_tap += '</a></li>';
                    show_approve_mhrd();
                    $("#mhrd").addClass("active");
                }
                // else if 
                // check pe tool

                if (row.ps_form_ce == "ACM") {
                    data_tap += '<li><a href="#ACM" data-toggle="tab">';
                    data_tap += '<font>ACM</font>';
                    data_tap += '</a></li>';
                }
                // if
                else if (row.ps_form_ce == "GCM") {
                    data_tap += '<li><a href="#GCM" data-toggle="tab">';
                    data_tap += '<font>GCM</font>';
                    data_tap += '</a></li>';
                }
                // else if 
                // check ce tool
            });
            // foreach
            $("#show_tap").html(data_tap);
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax


}
// function set_tap
</script>
<!-- script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading" height="50px">
                <h2 id="tabmenu">
                    <font color="#ffffff" size="6px"> Form </font>
                </h2>
                <div id="tabmenu">
                    <ul class="nav nav-tabs pull-right tabdrop" id="show_tap">
                    </ul>
                </div>
            </div>
            <!-- heading -->

            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane" id="MBO">
                        <br>
                        <?php foreach($emp_info->result() as $row){
                          $emp_id_back =  $row->Emp_ID; ?>
                        <input type="text" id="pos_id" value="<?php echo $row->Position_ID; ?>" hidden>
                        <input type="text" id="evs_emp_id" value="<?php echo $row->emp_id; ?>" hidden>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Employee ID : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_id"><?php echo $row->Emp_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Name : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_name"><?php echo $row->Empname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Surname : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_lname"><?php echo $row->Empsurname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Section Code : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_sec"><?php echo $row->Sectioncode_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Department : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_dep"><?php echo $dept_info->Department; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Position : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_pos"><?php echo $row->Position_name; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <?php }; ?>
                        <!-- show infomation employee -->

                        <hr>

                        <table class="table table-bordered table-striped m-n" id="mbo">
                            <thead id="headmbo">
                                <tr>
                                    <th rowspan="2" width="2%">
                                        <center> No.</center>
                                    </th>
                                    <th rowspan="2" width="10%">
                                        <center>SDGs Goals</center>
                                    </th>
                                    <th rowspan="2" width="28%">
                                        <center>Management by objective</center>
                                    </th>
                                    <th rowspan="2" width="7%">
                                        <center>Weight</center>
                                    </th>
                                    <th colspan="2">
                                        <center>Evaluation</center>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="20%">
                                        <center>Result</center>
                                    </th>
                                    <th width="8%">
                                        <center>Score AxB</center>
                                    </th>
                                </tr>
                            </thead>
                            <!-- thead -->
                            <tbody id="row_mbo">

                                <?php 
							$num = 0;
                            $sum = 0;
                            $sum_w = 0;

							foreach($mbo_emp as $index => $row) {?>
                                <tr>
                                    <td>
                                        <center><?php echo $index+1; ?></center>
                                    </td>
                                    <td id="sdgs_sel<?php echo $index+1; ?>"><?php echo $row->sdg_name_th; ?></td>
                                    <td id="inp_mbo<?php echo $index+1; ?>">
                                        <?php echo $row->dtm_mbo; ?>
                                    </td>
                                    <td align="center" id="inp_result<?php echo $index+1; ?>">
                                        <?php echo $row->dtm_weight; 
                                        $sum += $row->dtm_weight;
                                        ?>
                                    </td>
                                    <td id="dis_color">
                                        <center>
                                            <div class="col-md-12">
                                                <?php 
                                                $mbo_1 = "Unchecked";
                                                $mbo_2 = "Unchecked";
                                                $mbo_3 = "Unchecked";
                                                $mbo_4 = "Unchecked";
                                                $mbo_5 = "Unchecked";
                                                // if(sizeof($data_mbo) != 0){

                                                // if($data_mbo[$index]->dmw_weight == 1){ 
                                                //     $mbo_1 = "checked";
                                                // }
                                                // // if 
                                                // else if($data_mbo[$index]->dmw_weight == 2){
                                                //     $mbo_2 = "checked";
                                                // }
                                                // // else if
                                                // else if($data_mbo[$index]->dmw_weight == 3){
                                                //     $mbo_3 = "checked";
                                                // }
                                                // // else if
                                                // else if($data_mbo[$index]->dmw_weight == 4){
                                                //     $mbo_4 = "checked";
                                                // }
                                                // // else if
                                                // else if($data_mbo[$index]->dmw_weight == 5){
                                                //     $mbo_5 = "checked";
                                                // }
                                                // // else if
                                                
                                                // }
                                                // // if
                                                ?>

                                                <input type="radio" name="result<?php echo $index; ?>" value="1"
                                                    Disabled <?php echo $mbo_1; ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo $index; ?>" value="2"
                                                    Disabled <?php echo $mbo_2; ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo $index; ?>" value="3"
                                                    Disabled <?php echo $mbo_3; ?>>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo $index; ?>" value="4"
                                                    Disabled <?php echo $mbo_4; ?>>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo $index; ?>" value="5"
                                                    Disabled <?php echo $mbo_5; ?>>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>

                                            <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td id="dis_color">
                                        <center>
                                            <?php 
                                            if(sizeof($data_mbo) != 0){
                                            echo intval($data_mbo[$index]->dmw_weight)*$row->dtm_weight; 
                                            $sum_w += intval($data_mbo[$index]->dmw_weight)*$row->dtm_weight; 
                                            }
                                            // if 
                                            ?>
                                        </center>
                                    </td>
                                </tr>
                                <?php 
								$num++;
							
								};?>

                                <input type="text" id="row_index" value="<?php echo $num; ?>" hidden>

                            </tbody>
                            <!-- tbody -->
                            <tfoot>
                                <tr>
                                    <td colspan="3" align="right"><b>Total Weight</b></td>
                                    <td id="show_weight" align="center"><?php echo $sum; ?></td>
                                    <td>
                                        <font color="#e60000"></font>
                                    </td>
                                    <td align="center"><?php echo $sum_w; ?></td>
                                </tr>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- table -->
                        <hr>
                        <div id="show_approver">
                        </div>
                        <!-- show_approver -->
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?php echo base_url() ?>ev_form/Evs_form/historyMBO" method="post">
                                    <input type="text" name="emp_id_his" id="emp_id_his"
                                        value="<?php echo $emp_id_back; ?>" hidden>
                                    <input type="submit" class="btn btn-inverse" value="BACK">
                                </form>
                                <!-- cancel to back to main  -->
                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">

                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 1 -->

                    <!-- ******************************** form 1 ********************************-->

                    <div class="tab-pane" id="G_O">
                        <br>
                        <?php foreach($emp_info->result() as $row){?>
                        <input type="text" id="pos_id" value="<?php echo $row->Position_ID; ?>" hidden>
                        <input type="text" id="evs_emp_id" value="<?php echo $row->emp_id; ?>" hidden>
                        <input type="text" id="row_index" value="" hidden>

                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Employee ID : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_id"><?php echo $row->Emp_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Name : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_name"><?php echo $row->Empname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Surname : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_lname"><?php echo $row->Empsurname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Section Code : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_sec"><?php echo $row->Sectioncode_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Department : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_dep"><?php echo $dept_info->Department; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Position : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_pos"><?php echo $row->Position_name; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <?php }; ?>
                        <!-- show infomation employee -->

                        <hr>
                        <table class="table table-bordered table-striped m-n">
                            <thead>
                                <tr>
                                    <th width="2%">
                                        <center>
                                            #
                                        </center>
                                    </th>
                                    <th>
                                        <center width="5%">
                                            Type of G&O
                                        </center>
                                    </th>
                                    <th>
                                        <center width="15%">
                                            SDGs Goal
                                        </center>
                                    </th>
                                    <th width="30%">
                                        <center>
                                            Evaluation Item
                                        </center>
                                    </th>
                                    <th width="10%">
                                        <center>
                                            Weight (%)
                                        </center>
                                    </th>
                                    <th width="15%">
                                        <center>
                                            Possible Outcomes/Their Ratings
                                        </center>
                                    </th>
                                    <th width="20%">
                                        <center>Self Review</center>
                                    </th>
                                    <th width="3%">
                                        <center>Evaluator Review</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="G_O_Table">
                                <?php $num_index = 1;
                                $temp = "";
                                $temps = "";
                                $row_level = 0;
                                $row_ranges = 0;
                                $count = 0;
                                $span = 0;
                                $spans = 0;
                                // print_r($g_o_emp);

                                if(sizeof($g_o_emp) != 0){

                                $col = [];
                                $row_level = $row_index->sfg_index_level;
                                $row_ranges = $row_index->sfg_index_ranges;

                                for($i = 1; $i <= $row_level; $i++){
                                    array_push($col,5);
                                }
                                // for push row_level
   
                                for($i = 1; $i <= $row_ranges; $i++){
                                    array_push($col,2);
                                }
                                // for push row_ranges

                            foreach($g_o_emp as $index => $row){ ?>
                                <tr>
                                    <?php if($index == 0){ ?>
                                    <td rowspan="<?php echo $col[$span] ?>"><?php echo $num_index; ?></td>
                                    <!-- show index  -->
                                    <input type="text" id="row_level" value="<?php echo $row_level; ?>" hidden>
                                    <input type="text" id="row_ranges" value="<?php echo $row_ranges; ?>" hidden>
                                    <?php 
                                        if($row->dgo_type == "1"){ ?>
                                    <td rowspan="<?php echo $col[$span] ?>">Company</td>
                                    <?php }
                                    // if 
                                    else{ ?>
                                    <td rowspan="<?php echo $col[$span] ?>">Department</td>
                                    <?php }?>
                                    <!-- show type  -->

                                    <td rowspan="<?php echo $col[$span] ?>"><?php echo $row->sdg_name_th; ?></td>
                                    <!-- show sdgs  -->

                                    <td rowspan="<?php echo $col[$span] ?>"><?php echo $row->dgo_item; ?></td>
                                    <td align="center" rowspan="<?php echo $col[$span] ?>">
                                        <?php echo $row->dgo_weight; ?></td>
                                    <!-- show item asd weight  -->
                                    <?php 
                                $span++;
                                $temp = $row->dgo_item;
                                $num_index++;
                                }
                                // if
                                else if($temp != $row->dgo_item){ ?>
                                    <td rowspan="<?php echo $col[$span] ?>"><?php echo $num_index; ?></td>
                                    <!-- show index  -->
                                    <?php 
                                        if($row->dgo_type == "1"){ ?>
                                    <td rowspan="<?php echo $col[$span] ?>">Company</td>
                                    <?php }
                                    // if 
                                    else{ ?>
                                    <td rowspan="<?php echo $col[$span] ?>">Department</td>
                                    <?php }?>
                                    <!-- show type  -->

                                    <td rowspan="<?php echo $col[$span] ?>"><?php echo $row->sdg_name_th; ?></td>
                                    <!-- show sdgs  -->

                                    <td rowspan="<?php echo $col[$span] ?>"><?php echo $row->dgo_item; ?></td>
                                    <td align="center" rowspan="<?php echo $col[$span] ?>">
                                        <?php echo $row->dgo_weight; ?></td>
                                    <!-- show item asd weight  -->
                                    <?php 
                                $span++;
                                $num_index++;
                                $temp = $row->dgo_item;    
                                }
                                // else if 
                                else if($temp == $row->dgo_item){ ?>
                                    <?php }
                                // else if
                                ?>
                                    <td><?php echo $row->dgol_level; ?></td>
                                    <!-- show level  -->
                                    <?php if($index == 0){ ?>
                                    <td rowspan="<?php echo $col[$spans] ?>"><?php echo $row->dgo_self_review; ?></td>
                                    <?php 
                                $spans++;
                                $temps = $row->dgo_item;
                                } 
                                // if 
                                else if($temps != $row->dgo_item){ ?>
                                    <td rowspan="<?php echo $col[$spans] ?>"><?php echo $row->dgo_self_review; ?></td>
                                    <?php
                                $spans++;
                                $temps = $row->dgo_item;
                                } 
                                // else if?>
                                    <td></td>
                                </tr>
                                <!-- end tr  -->
                                <?}
                            // foreach
                            }
                            // if
                            ?>
                            </tbody>
                            <!-- tbody  -->

                            <tfoot>
                                <td colspan="4">
                                    <input type="text" id="row_count" value="0" hidden>
                                    <input type="text" id="row_count_level" value="0" hidden>
                                </td>
                                <td id="show_weightG_O" align="center">100</td>
                                <td colspan="3"></td>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- End table level -->

                        <br>
                        <div id="show_approverG_O">
                        </div>
                        <!-- show_approver G_O-->

                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?php echo base_url() ?>ev_form/Evs_form/historyMBO" method="post">
                                    <input type="text" name="emp_id_his" id="emp_id_his"
                                        value="<?php echo $emp_id_back; ?>" hidden>
                                    <input type="submit" class="btn btn-inverse" value="BACK">
                                </form>
                                <!-- cancel to back to main  -->
                            </div>
                            <!-- col-md-6 -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 1-2 -->

                    <!-- ************************************************************************************ -->

                    <div class="tab-pane" id="mhrd">
                        <br>
                        <?php foreach($emp_info->result() as $row){?>
                        <input type="text" id="pos_id" value="<?php echo $row->Position_ID; ?>" hidden>
                        <input type="text" id="evs_emp_id" value="<?php echo $row->emp_id; ?>" hidden>
                        <input type="text" id="row_index" value="" hidden>

                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Employee ID : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_id"><?php echo $row->Emp_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Name : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_name"><?php echo $row->Empname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Surname : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_lname"><?php echo $row->Empsurname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Section Code : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_sec"><?php echo $row->Sectioncode_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Department : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_dep"><?php echo $dept_info->Department; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Position : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_pos"><?php echo $row->Position_name; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <?php }; ?>
                        <!-- show infomation employee -->

                        <hr>
                        <table class="table table-bordered table-striped m-n">
                            <thead>
                                <tr>
                                    <th width="2%" rowspan="2">
                                        <center>
                                            #
                                        </center>
                                    </th>
                                    <th width="35%" rowspan="2">
                                        <center>
                                            Items
                                        </center>
                                    </th>
                                    <th width="35%" rowspan="2">
                                        <center>
                                            description
                                        </center>
                                    </th>
                                    <th width="20%" colspan="2">
                                        <center>
                                            Result
                                        </center>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <center>Score 1</center>
                                    </th>
                                    <th>
                                        <center>Score 1</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="mhrd_Table">
                                <?php if(sizeof($info_mhrd) != 0) { ?>
                                <?php foreach($info_mhrd->result() as $index => $row){ ?>
                                <tr>
                                    <td><?php echo ($index+1) ?></td>
                                    <!-- index  -->
                                    <td>
                                        <?php echo $row->itm_item_detail_en; ?>
                                        <br>
                                        <?php echo $row->itm_item_detail_th; ?>
                                    </td>
                                    <!-- items  -->
                                    <td>
                                        <?php echo $row->dep_description_detail_en; ?>
                                        <br>
                                        <?php echo $row->dep_description_detail_th; ?>
                                    </td>
                                    <!-- description -->
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php } 
                                // foreach
                                }
                                // if
                                ?>
                            </tbody>
                            <!-- tbody  -->

                            <tfoot>
                                <td colspan="4"></td>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- End table level -->

                        <hr>
                        <div id="show_approver_mhrd">
                        </div>
                        <!-- show_approver -->

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?php echo base_url() ?>ev_form/Evs_form/historyMBO" method="post">
                                    <input type="text" name="emp_id_his" id="emp_id_his"
                                        value="<?php echo $emp_id_back; ?>" hidden>
                                    <input type="submit" class="btn btn-inverse" value="BACK">
                                </form>
                                <!-- cancel to back to main  -->
                            </div>
                            <!-- col-md-6 -->
                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 1-3 -->

                    <!-- ************************************************************************************ -->


                    <div class="tab-pane" id="ACM">
                        <br>
                        <?php foreach($emp_info->result() as $row){?>

                        <input type="text" id="pos_id_acm" value="<?php echo $row->Position_ID; ?>" hidden>

                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Employee ID : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_id"><?php echo $row->Emp_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Name : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_name"><?php echo $row->Empname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Surname : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_lname"><?php echo $row->Empsurname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Section Code : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_sec"><?php echo $row->Sectioncode_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Department : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_dep"><?php echo $dept_info->Department; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Position : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_pos"><?php echo $row->Position_name; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <?php }; ?>
                        <!-- show infomation employee -->
                        <hr>

                        <table class="table table-bordered m-n">
                            <thead id="headmbo">
                                <tr>
                                    <th rowspan="2" width="2%">
                                        <center> No.</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>Competency</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>Key component</center>
                                    </th>
                                    <th rowspan="2" width="30%">
                                        <center>Expected Behavior</center>
                                    </th>
                                    <th rowspan="2" width="8%">
                                        <center>Weight</center>
                                    </th>
                                    <th colspan="2" width="15%">
                                        <center>Evaluation</center>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="30%">
                                        <center>Result</center>
                                    </th>
                                    <th width="10%">
                                        <center>Score AxB</center>
                                    </th>

                                </tr>
                            </thead>
                            <!-- thead -->
                            <tbody>

                                <?php  

                            if(sizeof($info_ability_form) != 0){
                                $com_check = "";
                                $key_check = "";
                                $row_key = 0;
                                $row_index = [];
                                $sum_acm = 0;
                            foreach($info_ability_form->result() AS $index => $row){ 

                                
                                if($index == 0){
                                    $com_check = $row->cpn_competency_detail_en;
                                    $key_check = $row->kcp_key_component_detail_en;
                                    $row_key++;
                                }
                                // if
                                else if($com_check == $row->cpn_competency_detail_en){
                                   if($key_check != $row->kcp_key_component_detail_en){
                                        $row_key++;
                                        $key_check = $row->kcp_key_component_detail_en;
                                    }
                                    // else if
                                }
                                // else if
                                
                                else if($com_check != $row->cpn_competency_detail_en){
                                    array_push($row_index,$row_key);
                                    $row_key = 0;
                                    $key_check = $row->kcp_key_component_detail_en;
                                    $com_check = $row->cpn_competency_detail_en;
                                    $row_key++;
                                }
                                // else if
                            }
                            array_push($row_index,$row_key);
                            // foreach?>

                                <?php 
                                $count = 0;
                                $com = "";
                                $key = "";
                                $ex = ""; 
                                foreach($info_ability_form->result() AS $index => $row){  ?>
                                <tr>
                                    <?php if($index == 0){ 
                                        $count++;
                                        $com = $row->cpn_competency_detail_en;
                                        $key = $row->kcp_key_component_detail_en;
                                        ?>
                                    <td align="center" rowspan="<?php echo $row_index[$index] ?>"
                                        style="vertical-align:middle;" id="dis_color">
                                        <?php echo $count;  ?></td>
                                    <td rowspan="<?php echo $row_index[$index] ?>" style="vertical-align:middle;"
                                        id="dis_color">
                                        <?php echo $row->cpn_competency_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->cpn_competency_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->kcp_key_component_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->kcp_key_component_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->ept_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->ept_expected_detail_th;  ?></font>
                                    </td>
                                    <td align="center" style="vertical-align:middle;" id="dis_color"
                                        rowspan="<?php echo $row_index[$index] ?>">
                                        <?php echo $row->sfa_weight; ?><br>
                                    </td>
                                    <td id="dis_color" rowspan="<?php echo $row_index[$index] ?>"
                                        style="vertical-align:middle;">
                                        <center>
                                            <div class="col-md-12">
                                                <?php 
                                                $acm_1 = "Unchecked";
                                                $acm_2 = "Unchecked";
                                                $acm_3 = "Unchecked";
                                                $acm_4 = "Unchecked";
                                                $acm_5 = "Unchecked";
                                                // if(sizeof($data_acm) != 0){
                                                //     if($data_acm[$count-1]->dta_weight == 1){ 
                                                //         $acm_1 = "checked";
                                                //     }
                                                //     // if 
                                                //     else if($data_acm[$count-1]->dta_weight == 2){
                                                //         $acm_2 = "checked";
                                                //     }
                                                //     // else if
                                                //     else if($data_acm[$count-1]->dta_weight == 3){
                                                //         $acm_3 = "checked";
                                                //     }
                                                //     // else if
                                                //     else if($data_acm[$count-1]->dta_weight == 4){
                                                //         $acm_4 = "checked";
                                                //     }
                                                //     // else if
                                                //     else if($data_acm[$count-1]->dta_weight == 5){
                                                //         $acm_5 = "checked";
                                                //     }
                                                //     // else if
                                                // }
                                                // // if
                                                ?>
                                                <input type="radio" name="result<?php echo $index; ?>" value="1"
                                                    Disabled <?php echo $acm_1; ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo $index; ?>" value="2"
                                                    Disabled <?php echo $acm_2; ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo $index; ?>" value="3"
                                                    Disabled <?php echo $acm_3; ?>>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo $index; ?>" value="4"
                                                    Disabled <?php echo $acm_4; ?>>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo $index; ?>" value="5"
                                                    Disabled <?php echo $acm_5; ?>>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <td id="dis_color" rowspan="<?php echo $row_index[$index] ?>"
                                        style="vertical-align:middle;">
                                        <center>
                                            <?php 
                                            if(sizeof($data_acm) != 0){
                                                echo intval($data_acm[$index]->dta_weight)*$row->sfa_weight;
                                            }
                                            // if 
                                              ?>
                                        </center>
                                    </td>

                                    <?php 
                                    if(sizeof($data_acm) != 0){
                                        $sum_acm += intval($data_acm[$index]->dta_weight)*$row->sfa_weight;
                                    }
                                    // if 
                                }
                                // if 
                                else if($com != $row->cpn_competency_detail_en){
                                    $count++;
                                    $com = $row->cpn_competency_detail_en; 
                                    $key = $row->kcp_key_component_detail_en;?>

                                    <td align="center" rowspan="<?php echo $row_index[$count-1] ?>"
                                        style="vertical-align:middle;" id="dis_color">
                                        <?php echo $count;  ?></td>
                                    <td rowspan="<?php echo $row_index[$count-1] ?>" style="vertical-align:middle;"
                                        id="dis_color">
                                        <?php echo $row->cpn_competency_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->cpn_competency_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->kcp_key_component_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->kcp_key_component_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->ept_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->ept_expected_detail_th;  ?></font>
                                    </td>
                                    <td align="center" style="vertical-align:middle;" id="dis_color"
                                        rowspan="<?php echo $row_index[$count-1] ?>">
                                        <?php echo $row->sfa_weight; ?><br>
                                    </td>
                                    <td id="dis_color" rowspan="<?php echo $row_index[$count-1] ?>"
                                        style="vertical-align:middle;">
                                        <center>
                                            <div class="col-md-12">
                                                <?php 
                                                $acm_1 = "Unchecked";
                                                $acm_2 = "Unchecked";
                                                $acm_3 = "Unchecked";
                                                $acm_4 = "Unchecked";
                                                $acm_5 = "Unchecked";

                                                if(sizeof($data_acm) != 0){
                                                    if($data_acm[$count-1]->dta_weight == 1){ 
                                                        $acm_1 = "checked";
                                                    }
                                                    // if 
                                                    else if($data_acm[$count-1]->dta_weight == 2){
                                                        $acm_2 = "checked";
                                                    }
                                                    // else if
                                                    else if($data_acm[$count-1]->dta_weight == 3){
                                                        $acm_3 = "checked";
                                                    }
                                                    // else if
                                                    else if($data_acm[$count-1]->dta_weight == 4){
                                                        $acm_4 = "checked";
                                                    }
                                                    // else if
                                                    else if($data_acm[$count-1]->dta_weight == 5){
                                                        $acm_5 = "checked";
                                                    }
                                                    // else if
                                                }
                                                // if
                                                ?>
                                                <input type="radio" name="result<?php echo ($count-1); ?>" value="1"
                                                    Disabled <?php echo $acm_1; ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo ($count-1); ?>" value="2"
                                                    Disabled <?php echo $acm_2; ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo ($count-1); ?>" value="3"
                                                    Disabled <?php echo $acm_3; ?>>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo ($count-1); ?>" value="4"
                                                    Disabled <?php echo $acm_4; ?>>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="result<?php echo ($count-1); ?>" value="5"
                                                    Disabled <?php echo $acm_5; ?>>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <td id="dis_color" rowspan="<?php echo $row_index[$count-1] ?>"
                                        style="vertical-align:middle;">
                                        <center>
                                            <?php 
                                            if(sizeof($data_acm) != 0){
                                                echo intval($data_acm[$count-1]->dta_weight)*$row->sfa_weight;  
                                            }
                                            // if ?>
                                        </center>
                                    </td>

                                    <?php 
                                    if(sizeof($data_acm) != 0){
                                        $sum_acm += intval($data_acm[$count-1]->dta_weight)*$row->sfa_weight;
                                    }
                                    // if
                                }
                                // else if

                                else if($com == $row->cpn_competency_detail_en){ 
                                    if($key != $row->kcp_key_component_detail_en){ 
                                        $key = $row->kcp_key_component_detail_en; ?>
                                    <td id="dis_color">
                                        <?php echo $row->kcp_key_component_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->kcp_key_component_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->ept_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->ept_expected_detail_th;  ?></font>
                                    </td>
                                    <?php
                                    }
                                    // if
                                    else if($key == $row->kcp_key_component_detail_en){ ?>
                                    <hr>
                                    <td id="dis_color">
                                        <?php echo $row->ept_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->ept_expected_detail_th;  ?></font>
                                    </td>
                                    <?php }
                                    // else if 
                                }
                                // else if 
                                ?>


                                </tr>
                                <?php } 
                            // foreach
                            }
                            // if?>
                            </tbody>
                            <!-- tbody -->

                            <tfoot>
                                <tr height="5%" id="dis_color">
                                    <td colspan="4">
                                        <center></b> Total Weight </b></center>
                                    </td>
                                    <td>
                                        <center> 100</center>
                                    </td>
                                    <td>
                                        <center><b> Total Result </b></center>
                                    </td>
                                    <td>
                                        <center><?php echo $sum_acm; ?></center>
                                    </td>
                                </tr>
                            </tfoot>
                            <!-- tfoot -->

                        </table>
                        <!-- table -->
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?php echo base_url() ?>ev_form/Evs_form/historyMBO" method="post">
                                    <input type="text" name="emp_id_his" id="emp_id_his"
                                        value="<?php echo $emp_id_back; ?>" hidden>
                                    <input type="submit" class="btn btn-inverse" value="BACK">
                                </form>
                                <!-- cancel to back to main  -->
                            </div>
                            <!-- col-md-6 -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 2-1 -->

                    <!-- ************************************************************************************ -->


                    <div class="tab-pane" id="GCM">
                        <br>
                        <?php foreach($emp_info->result() as $row){?>

                        <input type="text" id="pos_id_acm" value="<?php echo $row->Position_ID; ?>" hidden>

                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Employee ID : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_id"><?php echo $row->Emp_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Name : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_name"><?php echo $row->Empname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Surname : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_lname"><?php echo $row->Empsurname_eng; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Section Code : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_sec"><?php echo $row->Sectioncode_ID; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Department : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_dep"><?php echo $dept_info->Department; ?></p>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <label class="control-label"><strong>
                                        <font size="3px">Position : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-2 -->
                            <div class="col-md-2">
                                <p id="emp_pos"><?php echo $row->Position_name; ?></p>
                            </div>
                            <!-- col-md-2 -->
                        </div>
                        <!-- row -->
                        <?php }; ?>
                        <!-- show infomation employee -->
                        <hr>

                        <table class="table table-bordered m-n">
                            <thead id="headmbo">
                                <tr>
                                    <th rowspan="2" width="2%">
                                        <center> No.</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>Competency</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>Key component</center>
                                    </th>
                                    <th rowspan="2" width="6%">
                                        <center>Target Level</center>
                                    </th>
                                    <th rowspan="2" width="30%">
                                        <center>Expected Behavior</center>
                                    </th>
                                    <th rowspan="2" width="6%">
                                        <center>Weight</center>
                                    </th>
                                    <th colspan="2" width="15%">
                                        <center>Evaluation</center>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="30%">
                                        <center>Result</center>
                                    </th>
                                    <th width="10%">
                                        <center>Score AxB</center>
                                    </th>

                                </tr>
                            </thead>
                            <!-- thead -->
                            <tbody>

                                <?php  
                            if(sizeof($info_form_gcm) != 0){
                            $com_check = "";
                            $key_check = "";
                            $row_key = 0;
                            $row_index = [];
                            foreach($info_form_gcm->result() AS $index => $row){ 

                                
                                if($index == 0){
                                    $com_check = $row->cpg_competency_detail_en;
                                    $key_check = $row->kcg_key_component_detail_en;
                                    $row_key++;
                                }
                                // if
                                else if($com_check == $row->cpg_competency_detail_en){
                                   if($key_check != $row->kcg_key_component_detail_en){
                                        $row_key++;
                                        $key_check = $row->kcg_key_component_detail_en;
                                    }
                                    // else if
                                }
                                // else if
                                
                                else if($com_check != $row->cpg_competency_detail_en){
                                    array_push($row_index,$row_key);
                                    $row_key = 0;
                                    $key_check = $row->kcg_key_component_detail_en;
                                    $com_check = $row->cpg_competency_detail_en;
                                    $row_key++;
                                }
                                // else if
                            }
                            array_push($row_index,$row_key);
                            // foreach?>

                                <?php 
                                $count = 0;
                                $com = "";
                                $key = "";
                                $ex = ""; 
                                foreach($info_form_gcm->result() AS $index => $row){  ?>
                                <tr>
                                    <?php if($index == 0){ 
                                        $count++;
                                        $com = $row->cpg_competency_detail_en;
                                        $key = $row->kcg_key_component_detail_en;
                                        ?>
                                    <td align="center" rowspan="<?php echo $row_index[$index] ?>"
                                        style="vertical-align:middle;" id="dis_color">
                                        <?php echo $count;  ?></td>
                                    <td rowspan="<?php echo $row_index[$index] ?>" style="vertical-align:middle;"
                                        id="dis_color">
                                        <?php echo $row->cpg_competency_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->cpg_competency_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->kcg_key_component_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->kcg_key_component_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color" align="center">
                                        <?php echo $row->epg_point;  ?><br>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->epg_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->epg_expected_detail_th;  ?></font>
                                    </td>
                                    <td align="center" style="vertical-align:middle;" id="dis_color"
                                        rowspan="<?php echo $row_index[$index] ?>">
                                        <?php echo $row->sgc_weight; ?><br>
                                    </td>
                                    <td id="dis_color" rowspan="<?php echo $row_index[$index] ?>"
                                        style="vertical-align:middle;">
                                        <center>
                                            <div class="col-md-12">
                                                <form action="">
                                                    <input type="radio" name="result" value="1" Disabled Unchecked>
                                                    <label for="1">&nbsp; 1</label>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" name="result" value="2" Disabled Unchecked>
                                                    <label for="2">&nbsp; 2</label>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" name="result" value="3" Disabled Unchecked>
                                                    <label for="3">&nbsp; 3</label>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" name="result" value="4" Disabled Unchecked>
                                                    <label for="4">&nbsp; 4</label>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" name="result" value="5" Disabled Unchecked>
                                                    <label for="5">&nbsp; 5</label>
                                                    &nbsp;&nbsp;
                                                </form>
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <td id="dis_color"></td>

                                    <?php }
                                // if 
                                else if($com != $row->cpg_competency_detail_en){
                                    $count++;
                                    $com = $row->cpg_competency_detail_en; 
                                    $key = $row->kcg_key_component_detail_en;?>

                                    <td align="center" rowspan="<?php echo $row_index[$count-1] ?>"
                                        style="vertical-align:middle;" id="dis_color">
                                        <?php echo $count;  ?></td>
                                    <td rowspan="<?php echo $row_index[$count-1] ?>" style="vertical-align:middle;"
                                        id="dis_color">
                                        <?php echo $row->cpg_competency_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->cpg_competency_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->kcg_key_component_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->kcg_key_component_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color" align="center">
                                        <?php echo $row->epg_point;  ?><br>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->epg_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->epg_expected_detail_th;  ?></font>
                                    </td>
                                    <td align="center" style="vertical-align:middle;" id="dis_color"
                                        rowspan="<?php echo $row_index[$count-1] ?>">
                                        <?php echo $row->sgc_weight; ?><br>
                                    </td>
                                    <td id="dis_color" rowspan="<?php echo $row_index[$count-1] ?>"
                                        style="vertical-align:middle;">
                                        <center>
                                            <div class="col-md-12">
                                                <form action="">
                                                    <input type="radio" name="result" value="1" Disabled Unchecked>
                                                    <label for="1">&nbsp; 1</label>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" name="result" value="2" Disabled Unchecked>
                                                    <label for="2">&nbsp; 2</label>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" name="result" value="3" Disabled Unchecked>
                                                    <label for="3">&nbsp; 3</label>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" name="result" value="4" Disabled Unchecked>
                                                    <label for="4">&nbsp; 4</label>
                                                    &nbsp;&nbsp;
                                                    <input type="radio" name="result" value="5" Disabled Unchecked>
                                                    <label for="5">&nbsp; 5</label>
                                                    &nbsp;&nbsp;
                                                </form>
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <td id="dis_color"></td>

                                    <?php }
                                // else if

                                else if($com == $row->cpg_competency_detail_en){ 
                                    if($key != $row->kcg_key_component_detail_en){ 
                                        $key = $row->kcg_key_component_detail_en; ?>
                                    <td id="dis_color">
                                        <?php echo $row->kcg_key_component_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->kcg_key_component_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color" align="center">
                                        <?php echo $row->epg_point;  ?><br>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->epg_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->epg_expected_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color"></td>
                                    <?php
                                    }
                                    // if
                                    else if($key == $row->kcg_key_component_detail_en){ ?>
                                    <td id="dis_color">
                                        <?php echo $row->epg_point;  ?><br>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->epg_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->epg_expected_detail_th;  ?></font>
                                    </td>
                                    <td id="dis_color"></td>

                                    <?php }
                                    // else if  	
                                }
                                // else if 
                                ?>


                                </tr>
                                <?php } 
                            // foreach
                            }
                            // if?>
                            </tbody>
                            <!-- tbody -->

                            <tfoot>
                                <tr height="5%" id="dis_color">
                                    <td colspan="4">
                                        <center></b> Total Weight </b></center>
                                    </td>
                                    <td>
                                        <center> 100</center>
                                    </td>
                                    <td>
                                        <center><b> Total Result </b></center>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tfoot>
                            <!-- tfoot -->

                        </table>
                        <!-- table -->

                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?php echo base_url() ?>ev_form/Evs_form/historyMBO" method="post">
                                    <input type="text" name="emp_id_his" id="emp_id_his"
                                        value="<?php echo $emp_id_back; ?>" hidden>
                                    <input type="submit" class="btn btn-inverse" value="BACK">
                                </form>
                                <!-- cancel to back to main  -->
                            </div>
                            <!-- col-md-6 -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 2-2 -->

                    <!-- ************************************************************************************ -->

                </div>
                <!-- tab-content -->
            </div>
            <!-- body -->
        </div>
        <!-- panel-indigo -->
    </div>
    <!-- col-12 -->
</div>
<!-- row -->