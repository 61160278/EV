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
                                <p id="emp_dep"><?php echo $row->Department; ?></p>
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
                                    <td colspan="2">
                                        <font color="#e60000"></font>
                                    </td>
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
                                <p id="emp_dep"><?php echo $row->Department; ?></p>
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
                                <p id="emp_dep"><?php echo $row->Department; ?></p>
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
                                <p id="emp_dep"><?php echo $row->Department; ?></p>
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
                                    <th rowspan="2">
                                        <center>Competency</center>
                                    </th>
                                    <th rowspan="2">
                                        <center>Key component</center>
                                    </th>
                                    <th rowspan="2">
                                        <center>Expected Behavior</center>
                                    </th>
                                    <th rowspan="2" width="5%">
                                        <center>Weight</center>
                                    </th>
                                    <th colspan="2">
                                        <center>Evaluation</center>
                                    </th>

                                </tr>
                                <tr>
                                    <th width="30%">
                                        <center>Result</center>
                                    </th>
                                    <th width="8%">
                                        <center>Score AxB</center>
                                    </th>

                                </tr>
                            </thead>
                            <!-- thead -->
                            <tbody id="dis_color">
                                <?php if(sizeof($info_ability_form) != 0){ ?>
                                <?php  
                                    $index_acm = 1;
                                    $temp_keycomponent = "";
                                    $temp_expected = "";
                                    $sum_max_rating = 0;
                                    // start foreach
                                    foreach($info_ability_form->result() as $row){
                                ?>
                                <tr>
                                    <td id="dis_color">
                                        <center><?php echo $index_acm++; ?></center>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->cpn_competency_detail_en . "<br><font color='blue'>" . $row->cpn_competency_detail_th ."</font>"; ?>
                                    </td>
                                    <!-- show competency  -->
                                    <td id="dis_color">
                                        <?php foreach($info_expected->result() as $row_ept){ 
                                            if($row->sfa_cpn_id == $row_ept->kcp_cpn_id && $temp_keycomponent != $row_ept->kcp_key_component_detail_en){
                                                $temp_keycomponent = $row_ept->kcp_key_component_detail_en;?>
                                        <?php echo $row_ept->kcp_key_component_detail_en . "<br><font color='blue'>" . $row_ept->kcp_key_component_detail_th ."</font>"; ?>
                                        <?php }
                                            // if
                                            }
                                            // foreach ?>
                                    </td>
                                    <!-- show key component  -->
                                    <td id="dis_color">
                                        <?php foreach($info_expected->result() as $row_ept){ 
                                            if($row->sfa_cpn_id == $row_ept->kcp_cpn_id && $temp_expected != $row_ept->ept_expected_detail_en && $row_ept->ept_pos_id == $info_pos_id){
                                                $temp_expected = $row_ept->ept_expected_detail_en;?>
                                        <?php echo $row_ept->ept_expected_detail_en . "<br><font color='blue'>" . $row_ept->ept_expected_detail_th ."</font><hr>"; ?>
                                        <?php }
                                        // if
                                        }
                                        // foreach ?>
                                    </td>
                                    <!-- show expected  -->
                                    <td id="dis_color">
                                        <center><?php echo $row->sfa_weight; ?></center>
                                    </td>
                                    <!-- show weight  -->
                                    <td id="dis_color" width="5%">
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
                                    <td id="dis_color" width="2%"></td>
                                </tr>

                                <?php
                                    }
                                    // end foreach
                                }
                                // if
                                ?>
                            </tbody>
                            <!-- tbody -->
                            <!-- tbody -->

                            <tfoot>
                                <tr height="5%" id="dis_color">
                                    <td colspan="4">
                                        <center> Total Weight</center>
                                    </td>
                                    <td>
                                        <center> 100</center>
                                    </td>
                                    <td>
                                        <center> Total Result</center>
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
                                <p id="emp_dep"><?php echo $row->Department; ?></p>
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
                                    <th rowspan="2">
                                        <center> No.</center>
                                    </th>
                                    <th rowspan="2" colspan="2">
                                        <center>Competency</center>
                                    </th>
                                    <th rowspan="2">
                                        <center>Key component</center>
                                    </th>
                                    <th rowspan="2">
                                        <center>Expected Behavior</center>
                                    </th>
                                    <th rowspan="2" width="6%">
                                        <center>Weight</center>
                                    </th>
                                    <th colspan="2">
                                        <center>Evaluation</center>
                                    </th>

                                </tr>
                                <tr>
                                    <th width="25%">
                                        <center>Result</center>
                                    </th>
                                    <th width="15%">
                                        <center>Score AxB</center>
                                    </th>

                                </tr>
                            </thead>
                            <!-- thead -->
                            <tbody id="dis_color">
                                <?php if(sizeof($info_form_gcm) != 0) { ?>
                                <?php  
                                    $index_gcm = 1;
                                    $temp_keycomponent = "";
                                    $temp_keycomponents = "";
                                    $temp_expected = "";
                                    $sum_max_rating = 0;
                                    // start foreach
                                    foreach($info_form_gcm->result() as $row){
                                ?>
                                <tr>
                                    <td id="dis_color">
                                        <center><?php echo $index_gcm++; ?></center>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->cpg_competency_detail_en . "<br><font color='blue'>" . $row->cpg_competency_detail_th ."</font>"; ?>
                                    </td>
                                    <!-- show competency  -->
                                    <td id="dis_color">
                                        <?php foreach($info_expected_gcm->result() as $row_ept){ 
                                            if($row->sgc_cpg_id == $row_ept->kcg_cpg_id && $temp_keycomponents != $row_ept->kcg_key_component_detail_en){
                                                $temp_keycomponents = $row_ept->kcg_key_component_detail_en;?>
                                        <?php echo $row_ept->epg_point;?>
                                        <?php }
                                            // if
                                            }
                                            // foreach ?>
                                    </td>
                                    <!-- show type  -->
                                    <td id="dis_color">
                                        <?php foreach($info_expected_gcm->result() as $row_ept){ 
                                            if($row->sgc_cpg_id == $row_ept->kcg_cpg_id && $temp_keycomponent != $row_ept->kcg_key_component_detail_en){
                                                $temp_keycomponent = $row_ept->kcg_key_component_detail_en;?>
                                        <?php echo $row_ept->kcg_key_component_detail_en . "<br><font color='blue'>" . $row_ept->kcg_key_component_detail_th ."</font>"; ?>
                                        <?php }
                                            // if
                                            }
                                            // foreach ?>
                                    </td>
                                    <!-- show key component  -->
                                    <td id="dis_color">
                                        <?php foreach($info_expected_gcm->result() as $row_ept){ 
                                            if($row->sgc_cpg_id == $row_ept->kcg_cpg_id && $temp_expected != $row_ept->epg_expected_detail_en && $row_ept->epg_pos_id == $info_pos_id_gcm){
                                                $temp_expected = $row_ept->epg_expected_detail_en;?>
                                        <?php echo $row_ept->epg_expected_detail_en . "<br><font color='blue'>" . $row_ept->epg_expected_detail_th ."</font><hr>"; ?>
                                        <?php }
                                        // if
                                        }
                                        // foreach ?>
                                    </td>
                                    <!-- show expected  -->
                                    <td id="dis_color">
                                        <center><?php echo $row->sgc_weight; ?></center>
                                    </td>
                                    <!-- show weight  -->
                                    <td id="dis_color" width="5%">
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
                                    <td id="dis_color" width="2%"></td>
                                </tr>

                                <?php
                                    }
                                    // end foreach
                                }
                                // if
                                ?>
                            </tbody>
                            <!-- tbody -->
                            <!-- tbody -->

                            <tfoot>
                                <tr height="5%" id="dis_color">
                                    <td colspan="4">
                                        <center> Total Weight</center>
                                    </td>
                                    <td>
                                        <center> 100</center>
                                    </td>
                                    <td>
                                        <center> Total Result</center>
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
                    <!-- form 2-1 -->

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