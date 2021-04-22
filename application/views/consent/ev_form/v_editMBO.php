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

});
// document ready

function editmbo(){

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
            data_row += '<td><center>' + (index + 1) + '</center></td>'
            data_row += '<td>'
            data_row += '<input id="inp_mbo' + (index + 1) +
                '" class="form-control" type="text" value="'+ row.dtm_mbo +'" onchange="clear_css_inp(' + clear + ')">'
            data_row += '</td>'
            data_row += '<td>'
            data_row += '<input id="inp_result' + (index + 1) + '" class="form-control" type="number"'
            data_row += 'min="0" max="100" onkeyup="check_weight()" value="'+ row.dtm_weight +'" >'
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
count = document.getElementById("row_index").value;
console.log(count);
var dataMBO = [];
var resultMBO = [];

for (var i = 1; i <= count; i++) {
    dataMBO.push(document.getElementById("inp_mbo" + i).value);
    resultMBO.push(document.getElementById("inp_result" + i).value);

    console.log(dataMBO);
    console.log(resultMBO);
    console.log("-----");
}
// for

$.ajax({
    type: "post",
    dataType: "json",
    url: "<?php echo base_url(); ?>ev_form/Evs_form/update_mbo_by_emp",
    data: {
        "dataMBO": dataMBO,
        "resultMBO": resultMBO,
        "Emp_ID": check_emp_id,
        "count": count
    }
});
// ajax

}
// function update_dataMBO

function clearMBO() {

    console.log("clear");
    count = document.getElementById("row_index").value;
    console.log(count);
    for (var i = 1; i <= count; i++) {
        $("#inp_mbo" + i).val("");
        $("#inp_result" + i).val("");
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
    console.log(number_index);

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
                                    <td id="inp_result<?php echo $index+1; ?>">
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
                                <button class="btn btn-inverse">CANCEL</button>
                                <button class="btn btn-default" onclick="clearMBO()">CLEAR</button>
                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">
                                
                                <button class="btn btn-warning" id="btn_edit" onclick="editmbo()">EDIT</button>
                                <button class="btn btn-success" id="btn_save" onclick="return check_mbo()">SAVE</button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#add_app">SEND <i
                                        class="fa fa-share-square-o"></i></button>
                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 1 -->

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




<!-- Modal -->
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
                        <select class="form-control" id="source">
                            <option value="0">----- Please Select-----</option>
                            <option value="1">Alaska</option>
                            <option value="2">Hawaii</option>
                            <option value="3">Kunanya</option>
                        </select>
                    </div>
                    <!-- col-6 -->

                    <div class="col-md-6" align="center">
                        <select class="form-control" id="source">
                            <option value="0">----- Please Select-----</option>
                            <option value="1">Alaska</option>
                            <option value="2">Hawaii</option>
                            <option value="3">Kunanya</option>
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
                        <button type="button" class="btn btn-success" data-dismiss="modal">SAVE</button>
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
<!-- Modal-->

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