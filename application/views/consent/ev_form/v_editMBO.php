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

    $("#btn_save").hide();
    $("#btn_edit").show();
    $("#btn_save").attr("disabled", true);
    $("#btn_clear").attr("disabled", true);

    $("#btn_cencel_clear").hide();
    $("#btn_cencel_show").show();
    $("#btn_send_insert").show();
    $("#btn_send_edit").hide();
    show_approve()

});
// document ready

function editmbo() {

    var dtm_emp_id = document.getElementById("emp_id").innerHTML;
    console.log(dtm_emp_id);

    var data_row = '';
    var info_row = 0;
    var number = 0;

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/get_mbo_to_edit",
        data: {
            "dtm_emp_id": dtm_emp_id
        },
        success: function(data) {
            var clear = 0;
            console.log(data);

            data.forEach((row, index) => {
                clear = index + 1;
                data_row += '<tr>'
                data_row += '<td><center>' + (index + 1) + '</center>'
                data_row += '<input type="text" id="inp_id' + (index + 1) + '" value="' + row
                    .dtm_id + '" hidden></td>'
                data_row += '<td>'
                data_row += '<input id="inp_mbo' + (index + 1) +
                    '" class="form-control" type="text" value="' + row.dtm_mbo +
                    '" onchange="clear_css_inp(' + clear + ')">'
                data_row += '</td>'
                data_row += '<td>'
                data_row += '<input id="inp_result' + (index + 1) +
                    '" class="form-control" type="number"'
                data_row += 'min="0" max="100" onchange="check_weight()" value="' + row.dtm_weight +
                    '" >'
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
            });
            // for

            $("#row_index").val(number);
            //console.log("123456::"+number);
            $("#row_mbo").html(data_row);
            $("#btn_save").show();
            $("#btn_edit").hide();
            check_weight();
            $("#btn_clear").attr("disabled", false);
            $("#btn_cencel_clear").show();
            $("#btn_cencel_back").hide();
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// function editmbo

function update_dataMBO() {

    var check_emp_id = document.getElementById("emp_id").innerHTML;
    var evs_emp_id = document.getElementById("evs_emp_id").value;
    count = document.getElementById("row_index").value;
    console.log(count);
    var idMBO = [];
    var dataMBO = [];
    var resultMBO = [];

    for (var i = 1; i <= count; i++) {
        idMBO.push(document.getElementById("inp_id" + i).value);
        dataMBO.push(document.getElementById("inp_mbo" + i).value);
        resultMBO.push(document.getElementById("inp_result" + i).value);

        // console.log(idMBO);
        // console.log(dataMBO);
        // console.log(resultMBO);
        // console.log("-----");
    }
    // for

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form/Evs_form/update_mbo_by_emp",
        data: {
            "idMBO": idMBO,
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
// function update_dataMBO

function clearMBO() {

    console.log("clear");
    count = document.getElementById("row_index").value;
    var check = 0;
    console.log(count);
    for (var i = 1; i <= count; i++) {
        $("#inp_mbo" + i).val("");
        $("#inp_result" + i).val("");
        check++;
    }
    // for
    check_weight();

}
// function clearMBO

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
    var num = 0;
    var number_index = document.getElementById("row_index").value;

    for (i = 1; i <= number_index; i++) {
        check = document.getElementById("inp_mbo" + i).value;
        console.log(check);

        if (check == "") {
            console.log(i + "-");
            $("#inp_mbo" + i).css("background-color", "#ffe6e6");
            $("#inp_mbo" + i).css("border-style", "solid");
        }
        // if
        else {
            console.log("-" + i);
            $("#inp_mbo" + i).css("background-color", "#ffffff");
            $("#inp_mbo" + i).css("border-style", "solid");
            num++;
        }
        // else
    }
    // for i

    if (num == count) {
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

function check_cancel() {
    $("#cancel_mbo").modal('show');
}
// function check_cancel

function cancel_form() {
    var check_emp_id = document.getElementById("emp_id").innerHTML;
    window.location.href = "<?php echo base_url();?>/ev_form/Evs_form/edit_mbo/" + check_emp_id + "";
}
// function cancel_form

function check_approve() {
    var approve1 = document.getElementById("approve1").value;
    var approve2 = document.getElementById("approve2").value;

    if (approve2 != "0") {
        console.log(1);
        save_approve()
        return true;
    }
    // if
    else if (approve2 == "0") {
        $("#approve2").css("background-color", "#ffe6e6");
        $("#approve2").css("border-style", "solid");
        return false;
    }
    // else if
}
// function check_approve

function check_approve_edt() {
    var approve1 = document.getElementById("approve1_edt").value;
    var approve2 = document.getElementById("approve2_edt").value;

    if (approve2 != "0") {
        console.log(1);
        update_approve();
        return true;
    }
    // if
    else if (approve2 == "0") {
        $("#approve2_edt").css("background-color", "#ffe6e6");
        $("#approve2_edt").css("border-style", "solid");
        return false;
    }
    // else if
}
// function check_approve

function clear_css_approve1() {
    $("#approve1").css("background-color", "#ffffff");
    $("#approve1").css("border-style", "solid");
}
// function clear_css_approve1

function clear_css_approve2() {
    $("#approve2").css("background-color", "#ffffff");
    $("#approve2").css("border-style", "solid");
}
// function clear_css_approve1

function clear_css_approve1_edt() {
    $("#approve1_edt").css("background-color", "#ffffff");
    $("#approve1_edt").css("border-style", "solid");
}
// function clear_css_approve1

function clear_css_approve2_edt() {
    $("#approve2_edt").css("background-color", "#ffffff");
    $("#approve2_edt").css("border-style", "solid");
}
// function clear_css_approve1

function save_approve() {
    var approve1 = document.getElementById("approve1").value;
    var approve2 = document.getElementById("approve2").value;
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
            show_approve()

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

function update_approve() {
    var approve1 = document.getElementById("approve1_edt").value;
    var approve2 = document.getElementById("approve2_edt").value;
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
            $("#edt_app").modal('hide');
            show_approve()

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

function show_approve() {

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
                data_show += '<p id="app1">' + app1 + '</p>'
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
                $("#approve1_edt").val(id_app1);
                $("#approve2_edt").val(id_app2);
                console.log(id_app1 + "....." + id_app2);
                $("#btn_send_insert").hide();
                $("#btn_send_edit").show();

                $("#add_app").modal('hide');
                $("#btn_edit").hide();

                $("#show_approver").html(data_show);
                $("#btn_clear").hide();

            }
            // if
            else {
                $("#btn_send_insert").show();
                $("#btn_send_edit").hide();

            }
            // else

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
</script>
<!-- script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading" height="50px">
                <h2 id="tabmenu"> Form </h2>
                <div id="tabmenu">
                    <ul class="nav nav-tabs pull-right tabdrop">
                        <li class="active"><a href="#form1" data-toggle="tab">
                                <font>MBO</font>
                            </a></li>
                        <li><a href="#form2" data-toggle="tab">
                                <font>ACM</font>
                            </a></li>
                        <li><a href="#form3" data-toggle="tab">
                                <font>Attitude & Behavior</font>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!-- heading -->

            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="form1">
                        <br>
                        <?php foreach($emp_info->result() as $row){?>
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
                                    <th width="25%">
                                        <center>Result</center>
                                    </th>
                                    <th width="20%">
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
                                    <td colspan="2" align="right"><b>Total Weight</b></td>
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
                                <a href="<?php echo base_url() ?>ev_form/Evs_form/index">
                                    <button class="btn btn-inverse" id="btn_cencel_back">BACK</button>
                                </a>
                                <!-- cancel to back to main  -->
                                <button class="btn btn-inverse" id="btn_cencel_clear"
                                    onclick="check_cancel()">CANCEL</button>
                                <!-- cancel to cancel edit form -->
                                <button class="btn btn-default" onclick="clearMBO()" id="btn_clear">CLEAR</button>
                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">
                                <button class="btn btn-warning" id="btn_edit" onclick="editmbo()">EDIT</button>
                                <button class="btn btn-success" id="btn_save" onclick="return check_mbo()">SAVE</button>
                                <button class="btn btn-primary" id="btn_send_insert" data-toggle="modal"
                                    data-target="#add_app">SEND <i class="fa fa-share-square-o"></i></button>
                                <button class="btn btn-warning" id="btn_send_edit" data-toggle="modal"
                                    data-target="#edt_app">SEND <i class="fa fa-share-square-o"></i></button>
                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 1 -->

                    <!-- ******************************** form 1 ********************************-->

                    <div class="tab-pane" id="form2">
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

                        <table class="table table-bordered table-striped m-n" id="acm">
                            <thead id="headacm">
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
                                    <th rowspan="2" width="5    %">
                                        <center>Weight</center>
                                    </th>
                                    <th colspan="2" width="5%">
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
                            <tfoot>
                                <tr height="5%" id="dis_color">
                                    <td colspan="4">
                                        <center><b> Total Weight </b></center>
                                    </td>
                                    <td>
                                        <center><b> 100 </b></center>
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
                                    <button class="btn btn-inverse" id="btn_cencel_back">BACK</button>
                                </a>
                                <!-- cancel to back to main  -->
                            </div>
                            <!-- col-md-6 -->
                        </div>
                        <!-- row -->
                    </div>
                    <!-- form 2 -->
                    <!-- ******************************** form 2 ********************************-->

                    <div class="tab-pane" id="form3">
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
                            <tbody id="row_att">
                            </tbody>
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
                                        <center> ----Total Result</center>
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
                                    <button class="btn btn-inverse" id="btn_cencel_back">BACK</button>
                                </a>
                                <!-- cancel to back to main  -->
                            </div>
                            <!-- col-md-6 -->
                        </div>
                        <!-- row -->
                    </div>
                    <!-- form 3 -->
                    <!-- ******************************** form 3 ********************************-->

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

<!-- Modal approver -->
<div class="modal fade" id="add_app" role="dialog">
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
                        <select class="form-control" id="approve1" onchange="clear_css_approve1()">
                            <option value="0">----- Please Select-----</option>
                            <option value="00029">Alaska</option>
                            <option value="00030">Hawaii</option>
                            <option value="00032">Kunanya</option>
                        </select>
                    </div>
                    <!-- col-6 -->

                    <div class="col-md-6" align="center">
                        <select class="form-control" id="approve2" onchange="clear_css_approve2()">
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
                        <button type="button" class="btn btn-success" onclick="return check_approve()">SAVE</button>
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
<div class="modal fade" id="edt_app" role="dialog">
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
                        <select class="form-control" id="approve1_edt" onchange="clear_css_approve1_edt()">
                            <option value="0">----- Please Select-----</option>
                            <option value="00029">Alaska</option>
                            <option value="00030">Hawaii</option>
                            <option value="00032">Kunanya</option>
                        </select>
                    </div>
                    <!-- col-6 -->

                    <div class="col-md-6" align="center">
                        <select class="form-control" id="approve2_edt" onchange="clear_css_approve2_edt()">
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
                        <button type="button" class="btn btn-success" onclick="return check_approve_edt()">SAVE</button>
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