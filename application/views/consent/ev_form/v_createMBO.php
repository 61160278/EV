<?php
/*
* v_main_permission.php
* Display v_main_permission
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-04-06
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
    background-color: #F5F5F5;
}
</style>
<!-- END style -->

<script>
var count = 0;

$(document).ready(function() {
    set_tap()
});
// document ready



function clearMBO() {

    console.log("clear");
    for (var i = 1; i <= count; i++) {
        $("#show_weight").css("color", "#000000");
        $("#inp_mbo" + i).val("");
        $("#inp_result" + i).val("");
        $("#sdgs_sel" + i).val(0);
    }
    // for

    check_weight();

}
// function clearMBO

function save_dataMBO() {

    var check_emp_id = document.getElementById("emp_id").innerHTML;
    var evs_emp_id = document.getElementById("evs_emp_id").value;
    console.log(check_emp_id);
    console.log(count);
    var dataMBO = [];
    var sdgsMBO = []
    var resultMBO = [];

    for (var i = 1; i <= count; i++) {
        dataMBO.push(document.getElementById("inp_mbo" + i).value);
        sdgsMBO.push(document.getElementById("sdgs_sel" + i).value);
        resultMBO.push(document.getElementById("inp_result" + i).value);

    }
    // for

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/save_mbo_by_emp",
        data: {

            "sdgsMBO": sdgsMBO,
            "dataMBO": dataMBO,
            "resultMBO": resultMBO,
            "Emp_ID": check_emp_id,
            "evs_emp_id": evs_emp_id,
            "count": count
        }
    });
    // ajax

    window.location.href = "<?php echo base_url();?>/ev_form/Evs_form/edit_mbo/" + check_emp_id + "";

}
// function save_dataMBO

function creatembo() {

    var check_pos = document.getElementById("pos_id").value;
    //console.log(check_pos);

    var data_row = '';
    var info_row = 0;
    var number = 0;

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/get_mbo_by_pos",
        data: {
            "pos": check_pos
        },
        success: function(data) {
            //console.log("1111");
            //console.log(data);
            var rowmbo = data.sfm_index_field;
            info_row = parseInt(rowmbo);
            var clear = 0;
            //console.log(info_row);

            for (i = 0; i < info_row; i++) {
                clear = i + 1;
                data_row += '<tr>'
                data_row += '<td><center>' + (i + 1) + '</center></td>'
                data_row += '<td>'
                data_row += '<select class="form-control" id="sdgs_sel' + (i + 1) +
                    '" onchange="clear_css_sel(' + clear + ')">'
                data_row += '<option value="0">---Select SDGs---</option>'
                data_row += '</select>'
                data_row += '</td>'
                data_row += '<td>'
                data_row += '<input id="inp_mbo' + (i + 1) +
                    '" class="form-control" type="text" value="" onchange="clear_css_inp(' + clear + ')">'
                data_row += '</td>'
                data_row += '<td>'
                data_row += '<input id="inp_result' + (i + 1) + '" class="form-control" type="number"'
                data_row += 'min="0" max="100" onkeyup="check_weight()" >'
                data_row += '</td>'
                data_row += '<td id="dis_color">'
                data_row += '<center>'
                data_row += '<div class="col-md-12">'
                data_row += '<form action="">'
                data_row += '<input type="radio" name="result" value="1"Disabled Unchecked>'
                data_row += '<label for="1">&nbsp; 1</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '<input type="radio" name="result" value="2" Disabled Unchecked>'
                data_row += '<label for="2">&nbsp; 2</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '<input type="radio" name="result" value="3" Disabled Unchecked>'
                data_row += '<label for="3">&nbsp; 3</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '<input type="radio" name="result" value="4" Disabled Unchecked>'
                data_row += '<label for="4">&nbsp; 4</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '<input type="radio" name="result" value="5" Disabled Unchecked>'
                data_row += '<label for="5">&nbsp; 5</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '</form>'
                data_row += '</div>'
                data_row += '<!-- col-12 -->'
                data_row += '</center>'
                data_row += '</td>'
                data_row += '<td id="dis_color"></td>'
                data_row += '</tr>'

                number++
            }
            // for

            get_sdgs_mbo(info_row)
            $("#row_index").val(number);
            //console.log("123456::"+number);
            $("#row_mbo").html(data_row);
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// function creatembo

function check_weight() {

    var check = "";
    var value_inp = 0;
    var index_check = 0;
    var val_check = 0;

    var number_index = document.getElementById("row_index").value;
    count = number_index;
    //console.log(number_index);

    for (i = 1; i <= number_index; i++) {
        check = document.getElementById("inp_result" + i).value;
        //console.log(check);

        if (check != "") {
            value_inp += parseInt(check);
            index_check++;
        }
        // if

        if (parseInt(check) == 0) {
            val_check++;
        }
        // if

        //console.log(value_inp);
    }
    // for i

    if (value_inp > 100) {
        $("#show_weight").css("color", "#e60000");
        $("#show_weight").css("background-color", "#ffe6e6");
        $("#show_weight").css("border-style", "solid");
        $("#btn_save").attr("disabled", true);
    }
    // if
    else if (value_inp < 100) {
        $("#btn_save").attr("disabled", true);
        $("#show_weight").css("background-color", "#ffffff");
        $("#show_weight").css("border-style", "solid");
    }
    // else if
    else if (index_check != number_index) {
        $("#btn_save").attr("disabled", true);
        $("#show_weight").css("background-color", "#ffffff");
        $("#show_weight").css("border-style", "solid");
    }
    // else if 
    else if (val_check != 0) {
        $("#btn_save").attr("disabled", true);
        $("#show_weight").css("background-color", "#ffffff");
        $("#show_weight").css("border-style", "solid");
    }
    // else if 
    else {
        $("#show_weight").css("color", "#000000");
        $("#show_weight").css("background-color", "#ffffff");
        $("#show_weight").css("border-style", "solid");
        $("#btn_save").attr("disabled", false);

    }
    // else 
    $("#show_weight").text(value_inp);
}
// function check_weight

function check_mbo() {

    var check = "";
    var check_sdg = "";
    var num = 0;
    var num_sdgs = 0;
    var number_index = document.getElementById("row_index").value;

    for (i = 1; i <= number_index; i++) {
        check = document.getElementById("inp_mbo" + i).value;

        if (check == "") {
            $("#inp_mbo" + i).css("background-color", "#ffe6e6");
            $("#inp_mbo" + i).css("border-style", "solid");
        }
        // if
        else {
            $("#inp_mbo" + i).css("background-color", "#ffffff");
            $("#inp_mbo" + i).css("border-style", "solid");
            num++;
        }
        // else

        check_sdg = document.getElementById("sdgs_sel" + i).value

        if (check_sdg == 0) {
            $("#sdgs_sel" + i).css("background-color", "#ffe6e6");
            $("#sdgs_sel" + i).css("border-style", "solid");
        }
        // if
        else {
            $("#sdgs_sel" + i).css("background-color", "#ffffff");
            $("#sdgs_sel" + i).css("border-style", "solid");
            num_sdgs++;
        }
        // 

    }
    // for i

    if (num == count && num_sdgs == count) {
        $("#save_mbo").modal('show');
        return true;
    }
    // if
    else {
        return false;
    }
    //else

}
// function check_mbo

function clear_css_inp(i) {
    $("#inp_mbo" + i).css("background-color", "#ffffff");
    $("#inp_mbo" + i).css("border-style", "solid");
}
// function clear_css_inp

function clear_css_sel(i) {
    $("#sdgs_sel" + i).css("background-color", "#ffffff");
    $("#sdgs_sel" + i).css("border-style", "solid");
}
// function clear_css_sel

function check_cancel() {
    $("#cancel_mbo").modal('show');
}
// function check_cancel

function cancel_form() {
    window.location.href = "<?php echo base_url();?>/ev_form/Evs_form/index";
}
// function cancel_form

function get_sdgs_mbo(count) {

    $.get("<?php echo base_url(); ?>ev_form/Evs_form/get_sdgs", function(data) {
        var obj = JSON.parse(data);
        var data_sel = "";
        obj.forEach((row, index) => {
            data_sel += '<option value="' + row.sdg_id + '">'
            data_sel += row.sdg_name_th
            data_sel += '</option>'
        });
        // forEach

        for (i = 0; i < count; i++) {
            $("#sdgs_sel" + (i + 1)).append(data_sel);
        }
        // for

    });

}
// function get_sdgs

function createG_O() {

    var check_pos = document.getElementById("pos_id").value;
    //console.log(check_pos);

    var data_row = '';
    var level_row = 0;
    var ranges_row = 0;
    var number = 1;
    var clear = 0;

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/get_G_O_by_pos",
        data: {
            "pos": check_pos
        },
        success: function(data) {
            console.log("1111 - G&O");
            console.log(data);
            console.log(data.sfg_index_level);
            level_row = parseInt(data.sfg_index_level);
            ranges_row = parseInt(data.sfg_index_ranges);

            for (i = 0; i < level_row; i++) {
                data_row += '<tr>'
                data_row += '<td><center>'
                data_row += number
                data_row += '</center></td>'
                // index
                data_row += '<td><center>'
                data_row += '<input type="radio" id="type_D'+ number +'" value="1">'
                data_row += '<label>&nbsp;C</label>'
                data_row += '<br>'
                data_row += '<input type="radio" id="type_C'+ number +'" value="2">'
                data_row += '<label>&nbsp;D</label>'
                data_row += '</center></td>'
                // type of G&O
                data_row += '<td>'
                data_row += '<select class="form-control" id="sdgs_sel' + number +
                    '" onchange="clear_css_sel(' + clear + ')">'
                data_row += '<option value="0">---Select SDGs---</option>'
                data_row += '</select>'
                data_row += '</td>'
                // sdgs 
                data_row += '<td>'
                data_row += '<input class="form-control" type="text" id="item'+number+'">'
                data_row += '</td>'
                // input
                data_row += '<td>'
                data_row += '<input class="form-control" type="text" id="weight'+number+'">'
                data_row += '</td>'
                // Weight 
                data_row += '<td>'
                for(j=0; j<5; j++){
                    data_row += '<input class="form-control" type="text" id="possible'+ number + j +'" placeholder="Level '+(j+1)+'">'
                    data_row += '<hr>'
                }
                // for
                data_row += '</td>'

                data_row += '<td id="dis_color">'
                data_row += '<center>'
                data_row += '<div class="col-md-12">'
                data_row += '<form action="">'
                data_row += '<input type="radio" name="result" value="1"Disabled Unchecked>'
                data_row += '<label for="1">&nbsp; 1</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '<input type="radio" name="result" value="2" Disabled Unchecked>'
                data_row += '<label for="2">&nbsp; 2</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '<input type="radio" name="result" value="3" Disabled Unchecked>'
                data_row += '<label for="3">&nbsp; 3</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '<input type="radio" name="result" value="4" Disabled Unchecked>'
                data_row += '<label for="4">&nbsp; 4</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '<input type="radio" name="result" value="5" Disabled Unchecked>'
                data_row += '<label for="5">&nbsp; 5</label>'
                data_row += '&nbsp;&nbsp;'
                data_row += '</form>'
                data_row += '</div>'
                data_row += '<!-- col-12 -->'
                data_row += '</center>'
                data_row += '</td>'
                data_row += '<td id="dis_color"></td>'

                data_row += '</tr>'
                number++
            }
            // for
            get_sdgs_mbo(number)
            $("#G_O_Table").html(data_row)

        },
        // success
        error: function(data) {
            console.log("9999 - G&O : error");

        }
        // error
    });
    // ajax

}
// function createG_O

function set_tap() {

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
                    creatembo();
                    $("#btn_save").attr("disabled", true);
                    $("#MBO").addClass("active");

                }
                // if
                else if (row.ps_form_pe == "G&O") {
                    data_tap += '<li class="active"><a href="#G_O" data-toggle="tab">';
                    data_tap += '<font>G&O</font>';
                    data_tap += '</a></li>';
                    $("#G_O").addClass("active");
                    createG_O();

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
                <h2 id="tabmenu"> Form </h2>
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

                        <table class="table table-bordered table-striped m-n" id="mbo">
                            <thead id="headmbo">
                                <tr>
                                    <th rowspan="2" width="2%">
                                        <center> No.</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>SDGs Goals</center>
                                    </th>
                                    <th rowspan="2" width="45%">
                                        <center>Management by objective</center>
                                    </th>
                                    <th rowspan="2" width="8%">
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
                            </tbody>
                            <!-- tbody -->
                            <tfoot>
                                <tr>
                                    <td colspan="3" align="right"><b>Total Weight</b></td>
                                    <td id="show_weight" align="center">0</td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- table -->
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-inverse" id="cancel_back" onclick="check_cancel()">BACK</button>
                                <button class="btn btn-default" onclick="clearMBO()">CLEAR</button>
                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">
                                <button class="btn btn-success" id="btn_save" onclick="return check_mbo()">SAVE</button>
                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 1-1 -->

                    <!-- ************************************************************************************ -->

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
                                        <center>Result</center>
                                    </th>
                                    <th width="3%">
                                        <center>Score AxB</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="G_O_Table">
                            </tbody>
                            <!-- tbody  -->

                        </table>
                        <!-- End table level -->

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-inverse">BACK</button>
                                <button class="btn btn-default">CLEAR</button>
                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">
                                <button class="btn btn-success">SAVE</button>
                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 1-2 -->

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
                                    <th rowspan="2">
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
                                <button class="btn btn-inverse"><i class="fa fa-mail-reply"></i> Back</button>
                            </div>
                            <!-- col-md-6 -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 2-1 -->

                    <!-- *************************************************-->

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


<!-- ****************************************** modal ************************************** -->

<!-- Modal Add -->
<div class="modal fade" id="save_mbo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <label for="focusedinput" class="col-sm-12 control-label" align="center">Please verify the accuracy
                        of the information.</label>
                </div>
                <!-- Group Name -->
            </div>
            <!-- modal-body -->

            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                </div>
                <!--<a href ="<?php echo base_url(); ?>/ev_group/Evs_group/select_company_sdm">-->
                <button type="button" class="btn btn-success" id="btnsaveadd" onclick="save_dataMBO()">SAVE</button>
                <!--</a>-->
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Add-->

<!-- Modal save -->
<div class="modal fade" id="save_mbo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <label for="focusedinput" class="col-sm-12 control-label" align="center">Please verify the accuracy
                        of the information.</label>
                </div>
                <!-- Group Name -->
            </div>
            <!-- modal-body -->

            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                </div>
                <!--<a href ="<?php echo base_url(); ?>/ev_group/Evs_group/select_company_sdm">-->
                <button type="button" class="btn btn-success" id="btnsaveadd" onclick="update_dataMBO()">SAVE</button>
                <!--</a>-->
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal save-->

<!-- Modal cancel -->
<div class="modal fade" id="cancel_mbo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b></font>
                </button>
                <h2 class="modal-title"><b>
                        <font color="white">Do you want to back to menu YES or NO ?</font>
                    </b></h2>
            </div>
            <!-- modal header -->

            <div class="modal-body">
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-12 control-label" align="center">Please verify the accuracy
                        of the information.</label>
                </div>
                <!-- Group Name -->
            </div>
            <!-- modal-body -->

            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                </div>
                <button type="button" class="btn btn-success" id="btnsaveadd" onclick="cancel_form()">Yes</button>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal cancel-->