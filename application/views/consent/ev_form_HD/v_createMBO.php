<?php
/*
* v_createMBO.php
* Display v_createMBO
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

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
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
        },
        success: function(data) {
            console.log(data);
            window.location.href = "<?php echo base_url();?>/ev_form_HD/Evs_form_HD/edit_mbo_emp/" +
                check_emp_id +
                "";
        }
        // success

    });
    // ajax

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
            console.log("1111");
            console.log(data);
            var rowmbo = data.sfm_index_field;
            info_row = parseInt(rowmbo);
            var clear = 0;
            console.log(info_row);

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
                data_row += 'min="0" max="100" onchange="check_weight()" >'
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
    var check = $("#st_btn").val();
    if (check != 1) {
        window.location.href = "<?php echo base_url();?>/ev_form/Evs_form/index";
    }
    // if
    else {
        window.location.href = "<?php echo base_url();?>/ev_form_HD/Evs_form_HD/create_form_group";
    }
    // else 

}
// function cancel_form

// *************************************** MBO ***************************************

function check_approve_mhrd() {
    var approve1 = document.getElementById("approve1_mhrd").value;
    var approve2 = document.getElementById("approve2_mhrd").value;

    if (approve2 != "0") {
        console.log(1);
        save_approve_mhrd()
        return true;
    }
    // if
    else if (approve2 == "0") {
        $("#approve2_mhrd").css("background-color", "#ffe6e6");
        $("#approve2_mhrd").css("border-style", "solid");
        return false;
    }
    // else if
}
// function check_approve

function check_approve_edt_mhrd() {
    var approve1 = document.getElementById("approve1_edt_mhrd").value;
    var approve2 = document.getElementById("approve2_edt_mhrd").value;

    if (approve2 != "0") {
        console.log(1);
        update_approve_mhrd();
        return true;
    }
    // if
    else if (approve2 == "0") {
        $("#approve2_edt_mhrd").css("background-color", "#ffe6e6");
        $("#approve2_edt_mhrd").css("border-style", "solid");
        return false;
    }
    // else if
}
// function check_approve

function clear_css_approve2_mhrd() {
    $("#approve2_mhrd").css("background-color", "#ffffff");
    $("#approve2_mhrd").css("border-style", "solid");
}
// function clear_css_approve1

function clear_css_approve2_edt_mhrd() {
    $("#approve2_edt_mhrd").css("background-color", "#ffffff");
    $("#approve2_edt_mhrd").css("border-style", "solid");
}
// function clear_css_approve2

function save_approve_mhrd() {
    var approve1 = document.getElementById("approve1_mhrd").value;
    var approve2 = document.getElementById("approve2_mhrd").value;
    var evs_emp_id = document.getElementById("evs_emp_id").value;
    var dma_emp_id = document.getElementById("emp_id").innerHTML;

    console.log(approve1);
    console.log(approve2);
    var data_show = "";

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/save_approve",
        data: {
            "approve1": approve1,
            "approve2": approve2,
            "evs_emp_id": evs_emp_id,
            "dma_emp_id": dma_emp_id

        },
        success: function(data) {
            console.log(data);
            show_approve_mhrd()

        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// function save_approve

function update_approve_mhrd() {
    var approve1 = document.getElementById("approve1_edt_mhrd").value;
    var approve2 = document.getElementById("approve2_edt_mhrd").value;
    var evs_emp_id = document.getElementById("evs_emp_id").value;
    var dma_emp_id = document.getElementById("emp_id").innerHTML;

    console.log(approve1);
    console.log(approve2);
    console.log(evs_emp_id);
    console.log(dma_emp_id);
    var data_show = "";

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/update_approve",
        data: {
            "approve1": approve1,
            "approve2": approve2,
            "evs_emp_id": evs_emp_id,
            "dma_emp_id": dma_emp_id

        },
        success: function(data) {
            console.log(data);
            $("#edt_app_mhrd").modal('hide');
            show_approve_mhrd()

        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// function update_approve

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
                $("#approve1_edt_mhrd").val(id_app1);
                $("#approve2_edt_mhrd").val(id_app2);
                console.log(id_app1 + "....." + id_app2);
                $("#btn_send_insert_mhrd").hide();
                $("#btn_send_edit_mhrd").show();

                $("#add_app_mhrd").modal('hide');
                $("#btn_edit_mhrd").hide();

                $("#show_approver_mhrd").html(data_show);
                $("#btn_clear_mhrd").hide();

            }
            // if
            else {
                $("#btn_send_insert_mhrd").show();
                $("#btn_send_edit_mhrd").hide();

            }
            // else

        },
        // success
        error: function(data) {
            $("#btn_send_edit_mhrd").hide();
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// function show_approve

// ************************************** approver mhrd *********************************

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
                else if (row.ps_form_pe == "MHRD") {
                    data_tap += '<li class="active"><a href="#mhrd" data-toggle="tab">';
                    data_tap += '<font>MHRD</font>';
                    data_tap += '</a></li>';
                    $("#mhrd").addClass("active");
                    show_approve_mhrd()
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
                <input type="hidden" id="st_btn" value="<?php echo $status_btn; ?>">
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

                        <table class="table table-bordered m-n" id="mbo">
                            <thead id="headmbo">
                                <tr>
                                    <th rowspan="2" width="2%">
                                        <center> No.</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>SDGs Goals</center>
                                    </th>
                                    <th rowspan="2" width="35%">
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
                                <button class="btn btn-success" id="btn_save"
                                    onclick="return check_mbo()">Submit</button>
                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 1-1 -->

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
                                    <td id="dis_color"></td>
                                    <?php
                                    }
                                    // if
                                    else if($key == $row->kcp_key_component_detail_en){ ?>
                                    <hr>
                                    <td id="dis_color">
                                        <?php echo $row->ept_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->ept_expected_detail_th;  ?></font>
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
                                <a href="<?php echo base_url() ?>ev_form_HD/Evs_form_HD/create_form_group">
                                    <button class="btn btn-inverse" id="btn_cencel_backG_O">BACK</button>
                                </a>
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
                            $com_check = "";
                            $key_check = "";
                            $row_key = 0;
                            $row_index = [];
                            if(sizeof($info_form_gcm) != 0){

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
                                    <td colspan="5">
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
                                <a href="<?php echo base_url() ?>ev_form/Evs_form/index">
                                    <button class="btn btn-inverse" id="btn_cencel_backG_O">BACK</button>
                                </a>
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
                <button type="button" class="btn btn-success" id="btnsaveadd" onclick="save_dataMBO()">Submit</button>
                <!--</a>-->
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Add-->

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

<!-- Modal check -->
<div class="modal fade" id="check_rdio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b></font>
                </button>
                <h2 class="modal-title"><b>
                        <font color="white">Please select Type of G&O </font>
                    </b></h2>
            </div>
            <!-- modal header -->

            <div class="modal-body">
                <div class="form-group">
                    <p>Select C to select the company type.</p>
                    <p>Select D to select the department type.</p>
                </div>
                <!-- Group Name -->
            </div>
            <!-- modal-body -->

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal check-->

<!-- Modal save -->
<div class="modal fade" id="save_g_o" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-success" id="btnsaveadd" onclick="saveG_O()">Submit</button>
                <!--</a>-->
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal save-->

<!-- Modal approver -->
<div class="modal fade" id="add_app_mhrd" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="color_head">
                <button type="button" class="close" data-dismiss="modal">
                    <font color="white">&times;</font>
                </button>
                <h4 class="modal-title">
                    <font color="white"><b> Please Select Approver </b></font>
                </h4>
            </div>
            <!-- Modal header-->

            <br>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6" align="center">
                        <label class="control-label"><strong>Approver 1 : </strong></label>
                    </div>
                    <!-- col-6 -->

                    <div class="col-md-6" align="center">
                        <label class="control-label"><strong>Approver 2 : </strong></label>
                    </div>
                    <!-- col-6 -->
                </div>
                <!--  row -->

                <div class="row">
                    <div class="col-md-6" align="center">
                        <select class="form-control" id="approve1_mhrd">
                            <option value="0">----- Please Select-----</option>
                            <option value="00029">Alaska</option>
                            <option value="00030">Hawaii</option>
                            <option value="00032">Kunanya</option>
                        </select>
                    </div>
                    <!-- col-6 -->

                    <div class="col-md-6" align="center">
                        <select class="form-control" id="approve2_mhrd" onchange="clear_css_approve2_mhrd()">
                            <option value="0">----- Please Select-----</option>
                            <option value="00029">Alaska</option>
                            <option value="00030">Hawaii</option>
                            <option value="00032">Kunanya</option>
                        </select>
                    </div>
                    <!-- col-6 -->
                </div>
                <!--  row -->

            </div>
            <!-- Modal body-->
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6" align="left">
                        <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                    </div>
                    <!-- col-6 -->

                    <div class="col-md-6" align="rigth">
                        <button type="button" class="btn btn-success"
                            onclick="return check_approve_mhrd()">Submit</button>
                    </div>
                    <!-- col-6 -->

                </div>
                <!-- row -->
            </div>
            <!-- Modal footer-->
        </div>
        <!-- Modal content-->
    </div>
    <!-- Modal dialog-->
</div>
<!-- Modal approver-->

<!-- Modal edt approver -->
<div class="modal fade" id="edt_app_mhrd" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="color_head">
                <button type="button" class="close" data-dismiss="modal">
                    <font color="white">&times;</font>
                </button>
                <h4 class="modal-title">
                    <font color="white"><b> Please Select Approver </b></font>
                </h4>
            </div>
            <!-- Modal header-->

            <br>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6" align="center">
                        <label class="control-label"><strong>Approver 1 : </strong></label>
                    </div>
                    <!-- col-6 -->

                    <div class="col-md-6" align="center">
                        <label class="control-label"><strong>Approver 2 : </strong></label>
                    </div>
                    <!-- col-6 -->
                </div>
                <!--  row -->

                <div class="row">
                    <div class="col-md-6" align="center">
                        <select class="form-control" id="approve1_edt_mhrd">
                            <option value="0">----- Please Select-----</option>
                            <option value="00029">Alaska</option>
                            <option value="00030">Hawaii</option>
                            <option value="00032">Kunanya</option>
                        </select>
                    </div>
                    <!-- col-6 -->

                    <div class="col-md-6" align="center">
                        <select class="form-control" id="approve2_edt_mhrd" onchange="clear_css_approve2_edt()">
                            <option value="0">----- Please Select-----</option>
                            <option value="00029">Alaska</option>
                            <option value="00030">Hawaii</option>
                            <option value="00032">Kunanya</option>
                        </select>
                    </div>
                    <!-- col-6 -->
                </div>
                <!--  row -->

            </div>
            <!-- Modal body-->
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6" align="left">
                        <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                    </div>
                    <!-- col-6 -->

                    <div class="col-md-6" align="rigth">
                        <button type="button" class="btn btn-success"
                            onclick="return check_approve_edt_mhrd()">Submit</button>
                    </div>
                    <!-- col-6 -->

                </div>
                <!-- row -->
            </div>
            <!-- Modal footer-->
        </div>
        <!-- Modal content-->
    </div>
    <!-- Modal dialog-->
</div>
<!-- Modal edt approver-->