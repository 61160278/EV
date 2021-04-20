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
	check_weight()
    $("#btn_edit").attr("disabled", true);
});
// document ready

function clearMBO() {

    console.log("clear");

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

							<?php foreach($mbo_emp as $index => $row) {?>
                                <tr>
                                    <td>
                                        <center><?php echo $index+1; ?></center>
                                    </td>
                                    <td>
                                        <input class="form-control" id="inp_mbo<?php echo $index+1; ?>" type="text" value="<?php echo $row->dtm_mbo; ?>">
                                    </td>
                                    <td>
                                        <input class="form-control" id="inp_result<?php echo $index+1; ?>" type="number" min="0" max="100" value="<?php echo $row->dtm_weight; ?>">
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
								<?php };?>

                            </tbody>
                            <!-- tbody -->
                            <tfoot>
                                <tr>
                                    <td colspan="2" align="right"><b>Total Weight</b></td>
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
                                <button class="btn btn-inverse">CANCEL</button>
                                <button class="btn btn-default" onclick="clearMBO()">CLEAR</button>
                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">
                                <button class="btn btn-warning" id="btn_edit" onclick="save_dataMBO()">EDIT</button>
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