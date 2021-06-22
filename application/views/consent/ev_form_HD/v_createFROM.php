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
function set_tap() {
    var ps_pos_id = document.getElementById("pos_id").value;
    var data_tap = "";
    console.log("<?php echo $data_from_pe; ?>");
    console.log("<?php echo $data_from_ce; ?>");
    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/get_tap_form",
        data: {
            "ps_pos_id": ps_pos_id
        },
        success: function(data) {

            data.forEach((row, index) => {
                if (row.ps_form_pe == "MBO") {
                    data_tap += '<li class="active"><a href="#MBO_edit" data-toggle="tab">';
                    data_tap += '<font>MBO</font>';
                    data_tap += '</a></li>';
                    $("#MBO_edit").addClass("active");
                    show_weight_mbo_edit()
                }
                // if
                else if (row.ps_form_pe == "G&O") {
                    data_tap += '<li class="active"><a href="#G_O_edit" data-toggle="tab">';
                    data_tap += '<font>G&O</font>';
                    data_tap += '</a></li>';
                    $("#G_O_edit").addClass("active");
                    show_weight_g_and_o_edit();
                }
                // else if
                else if (row.ps_form_pe == "MHRD") {
                    data_tap += '<li class="active"><a href="#MHRD_edit" data-toggle="tab">';
                    data_tap += '<font>MHRD</font>';
                    data_tap += '</a></li>';
                    $("#MHRD_edit").addClass("active");
                    show_weight_mhrd_edit();
                }
                // else if 
                // check pe tool
                if (row.ps_form_ce == "ACM") {
                    data_tap += '<li><a href="#ACM_edit" data-toggle="tab">';
                    data_tap += '<font>ACM</font>';
                    data_tap += '</a></li>';
                    show_weight_acm_edit();
                }
                // if
                else if (row.ps_form_ce == "GCM") {
                    data_tap += '<li><a href="#GCM_edit" data-toggle="tab">';
                    data_tap += '<font>GCM</font>';
                    data_tap += '</a></li>';
                    show_weight_gcm_edit();
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



function show_weight_acm_edit() {
    var arr_weight = [];
    var sum = 0;

    var index = document.getElementById("table_index_radio_acm_edit").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_acm_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_acm_edit_" + i + "")[index].value);
            } //if
        });
    }
    for (i = 0; i < index; i++) {
        document.getElementById('weight_acm_edit_' + i + '').innerHTML = arr_weight[i] * document.getElementsByName(
            "weing_acm_edit_" + i + "")[0].value;
        sum += arr_weight[i] * document.getElementsByName("weing_acm_edit_" + i + "")[0].value;
    }
    document.getElementById('weight_all_acm_edit').innerHTML = sum;
}



function show_weight_g_and_o_edit() {
    var arr_weight = [];
    var sum = 0;
    var index = document.getElementById("table_index_radio_g_o_edit").value;
    console.log(index);
    for (i = 0; i < index; i++) {

        $("[name = rd_g_o_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_g_o_edit_" + i + "")[index].value);
            } //if
        });
    }

    for (i = 0; i < index; i++) {

        sum += arr_weight[i] * document.getElementsByName("weing_g_o_edit_" + i + "")[0].value;
    }
    document.getElementById("weight_all_g_o_edit").innerHTML = sum;

}


function show_weight_gcm_edit() {
    var arr_weight = [];
    var sum = 0;
    var index = document.getElementById("table_index_radio_gcm_edit").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_gcm_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_gcm_edit_" + i + "")[index].value);
            } //if
        });
    }
    for (i = 0; i < index; i++) {
        document.getElementById("weight_gcm_edit_" + i + "").innerHTML = arr_weight[i] * document.getElementsByName(
            "weing_gcm_edit_" +
            i + "")[0].value;
        sum += arr_weight[i] * document.getElementsByName("weing_gcm_edit_" + i + "")[0].value;
    }
    document.getElementById("weight_all_gcm_edit").innerHTML = sum;
}



function show_weight_mbo_edit() {
    var arr_weight = [];
    var sum = 0;
    var index = document.getElementById("table_index_radio_mbo_edit").value;
    for (i = 0; i < index; i++){

        $("[name = rd_mbo_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_mbo_edit_" + i + "")[index].value);
            } //if
        });
    }
    for (i = 0; i < index; i++){
        document.getElementById("weight_mbo_edit_" + i + "").innerHTML = arr_weight[i] * document.getElementsByName(
            "weing_mbo_edit_" +
            i + "")[0].value;
        sum += arr_weight[i] * document.getElementsByName("weing_mbo_edit_" + i + "")[0].value;
    }
    document.getElementById("weight_all_mbo_edit").innerHTML = sum;
}


function show_weight_mhrd_edit() {
    var arr_weight_1 = [];
    var arr_weight_2 = [];
    var sum_1 = 0;
    var sum_2 = 0;
    var index = document.getElementById("table_index_radio_mhrd_edit").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_mhrd_1_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight_1.push(document.getElementsByName("rd_mhrd_1_edit_" + i + "")[index].value);
            } //if
        });

        $("[name = rd_mhrd_2_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight_2.push(document.getElementsByName("rd_mhrd_2_edit_" + i + "")[index].value);
            } //if
        });
    }

    for (i = 0; i < index; i++) {
        sum_1 += parseInt(arr_weight_1[i]);
        sum_2 += parseInt(arr_weight_2[i]);
    }
    document.getElementById("weight_all_mhrd_1_edit").innerHTML = sum_1;
    document.getElementById("weight_all_mhrd_2_edit").innerHTML = sum_2;
}
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

                    <br>
                    <?php 
                    foreach($emp_info->result() as $row){?>
                    <input type="text" id="pos_id" value="<?php echo $row->Position_ID; ?>" hidden>
                    <input type="text" id="Emp_ID" value="<?php echo $row->emp_id; ?>" hidden>
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
                    <?php } ?>
                    <!-- show infomation employee -->
                    <hr>


                    <!-- form MBO -->
                    <div class="tab-pane" id="MBO_edit">
                        <table class="table table-bordered table-striped m-n">
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
                                <?php 
                            $table_index_radio_mbo_edit = 0;
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
                            
                                        ?>
                                        <input type="number"
                                            name="weing_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                            value="<?php echo $row->dtm_weight; ?>" hidden>
                                    </td>
                                    <td id="dis_color">
                                        <center>
                                            <?php  
                                   $checked_weight_1 ="";
                                   $checked_weight_2 ="";
                                   $checked_weight_3 ="";
                                   $checked_weight_4 ="";
                                   $checked_weight_5 ="";
              

                                    foreach($data_mbo as $row_data_mbo){
                                            if($row->dtm_id == $row_data_mbo->dmw_dtm_id){
                                                if($row_data_mbo->dmw_weight == 1){
                                                    $checked_weight_1 =  "checked";
                                                }
                                                else if($row_data_mbo->dmw_weight == 2){
                                                    $checked_weight_2 =  "checked";
                                                }
                                                else if($row_data_mbo->dmw_weight == 3){
                                                    $checked_weight_3 =  "checked";
                                                }
                                                else if($row_data_mbo->dmw_weight == 4){
                                                    $checked_weight_4 =  "checked";
                                                }
                                                else {
                                                    $checked_weight_5 =  "checked";
                                                }
                                            }
                                        }
                                ?>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo_edit ?>" value="1"
                                                    onclick="show_weight_mbo_edit()" <?php echo $checked_weight_1 ?>
                                                    disabled>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo_edit ?>" value="2"
                                                    onclick="show_weight_mbo_edit()" <?php echo $checked_weight_2 ?>
                                                    disabled>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo_edit ?>" value="3"
                                                    onclick="show_weight_mbo_edit()" <?php echo $checked_weight_3 ?>
                                                    disabled>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo_edit ?> " value="4"
                                                    onclick="show_weight_mbo_edit()" <?php echo $checked_weight_4 ?>
                                                    disabled>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo_edit ?>" value="5"
                                                    onclick="show_weight_mbo_edit()" <?php echo $checked_weight_5 ?>
                                                    disabled>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td id="dis_color" width="2%">
                                        <p id="weight_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"></p>
                                    </td>
                                    <?php $table_index_radio_mbo_edit++;  ?>
                                </tr>
                                <input type="text" name="dtm_id" value="<?php echo $row->dtm_id; ?>" hidden>
                                <?php  };?>
                                <input type="text" id="table_index_radio_mbo_edit"
                                    value="<?php echo $table_index_radio_mbo_edit; ?>" hidden>



                            </tbody>
                            <!-- tbody -->
                            <tfoot>
                                <tr>
                                    <td colspan="3" align="right"><b>Total Weight</b></td>
                                    <td id="show_weight" align="center">100</td>
                                    <td colspan="2">
                                        <p id="weight_all_mbo_edit">
                                    </td>
                                </tr>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- table -->
                        <hr>
                        <!-- show_approver -->
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>/ev_form_HD/Evs_form_HD/index">
                                    <button type="button" class="btn btn-inverse"><i
                                            class="fa fa-mail-reply"></i>Back</button>
                                </a>
                                <!-- cancel to back to main  -->

                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">
                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                    </div>
                    <!-- form MBO_edit -->

                    <!-- form G&O -->
                    <div class="tab-pane" id="G_O_edit">
                        <table class="table table-bordered table-striped m-n">
                            <thead>
                                <tr>
                                    <th width="5%">
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
                                        <center width="10%">
                                            SDGs Goal
                                        </center>
                                    </th>
                                    <th width="20%">
                                        <center>
                                            Evaluation Item
                                        </center>
                                    </th>
                                    <th width="10%">
                                        <center>
                                            Weight (%)
                                        </center>
                                    </th>
                                    <th width="10%">
                                        <center>
                                            Possible Outcomes/Their Ratings
                                        </center>
                                    </th>
                                    <th width="20%">
                                        <center>Self Review</center>
                                    </th>
                                    <th width="15%">
                                        <center>Evaluator Review</center>
                                    </th>
                                    <th width="5%">
                                        <center>
                                            Result
                                        </center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="G_O_Table">
                                <?php $num_index = 1;
                                $temp = "";
                                $row_level = 0;
                                $row_ranges = 0;
                                $count = 0;
                                $span = 0;
                                $spans = 0;
                                $temps = "";
                                $table_index_radio_g_o_edit = 0;
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
                                    <input type="number" name="weing_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                        value="<?php echo $row->dgo_weight; ?>" hidden>
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
                                    <input type="number" name="weing_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                        value="<?php echo $row->dgo_weight; ?>" hidden>
                                    <!-- show item asd weight  -->
                                    <?php 
                                $span++;
                                $num_index++;
                                $temp = $row->dgo_item;    
                                }
                                // else if ?>
                                    <td><?php echo $row->dgol_level; ?></td>
                                    <!-- show level  -->
                                    <?php if($index == 0){ ?>
                                    <td rowspan="<?php echo $col[$spans] ?>"><?php echo $row->dgo_self_review; ?></td>
                                    <?php  
                                   $checked_weight_1 ="";
                                   $checked_weight_2 ="";
                                   $checked_weight_3 ="";
                                   $checked_weight_4 ="";
                                   $checked_weight_5 ="";
                                   $evaluator_review = "";

                                    foreach($data_g_and_o as $row_data_g_and_o){
                                            if($row->dgo_id == $row_data_g_and_o->dgw_dgo_id){
                                                if($row_data_g_and_o->dgw_weight == 1){
                                                    $checked_weight_1 =  "checked";
                                                }
                                                else if($row_data_g_and_o->dgw_weight == 2){
                                                    $checked_weight_2 =  "checked";
                                                }
                                                else if($row_data_g_and_o->dgw_weight == 3){
                                                    $checked_weight_3 =  "checked";
                                                }
                                                else if($row_data_g_and_o->dgw_weight == 4){
                                                    $checked_weight_4 =  "checked";
                                                }
                                                else {
                                                    $checked_weight_5 =  "checked";
                                                }
                                                $evaluator_review = $row_data_g_and_o->dgw_evaluator_review;
                                            }
                                        }
                                ?>
                                    <td rowspan="<?php echo $col[$spans] ?>"><textarea class="form-control" type="text"
                                            name="Evaluator_Review_edit"
                                            placeholder="Enter Evaluator Review"><?php echo $evaluator_review ?></textarea>
                                    </td>
                                    <td rowspan="<?php echo $col[$spans] ?>">
                                        <center>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="1"
                                                    onclick="show_weight_g_and_o()" <?php echo $checked_weight_1 ?>
                                                    disabled>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="2"
                                                    onclick="show_weight_g_and_o_edit()" <?php echo $checked_weight_2 ?>
                                                    disabled>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="3"
                                                    onclick="show_weight_g_and_o_edit()" <?php echo $checked_weight_3 ?>
                                                    disabled>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?> " value="4"
                                                    onclick="show_weight_g_and_o_edit()" <?php echo $checked_weight_4 ?>
                                                    disabled>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="5"
                                                    onclick="show_weight_g_and_o_edit()" <?php echo $checked_weight_5 ?>
                                                    disabled>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->

                                        </center>
                                    </td>
                                    <input type="text" name="dgo_id" value="<?php echo $row->dgo_id; ?>" hidden>
                                    <?php 
                                $spans++;
                                $temps = $row->dgo_item;
                                $table_index_radio_g_o_edit++;  
                                } 
                                // if 
                                else if($temps != $row->dgo_item){ ?>

                                    <td rowspan="<?php echo $col[$spans] ?>"><?php echo $row->dgo_self_review; ?></td>
                                    <?php  
                                   $checked_weight_1 ="";
                                   $checked_weight_2 ="";
                                   $checked_weight_3 ="";
                                   $checked_weight_4 ="";
                                   $checked_weight_5 ="";
                                   $evaluator_review = "";

                                    foreach($data_g_and_o as $row_data_g_and_o){
                                            if($row->dgo_id == $row_data_g_and_o->dgw_dgo_id){
                                                if($row_data_g_and_o->dgw_weight == 1){
                                                    $checked_weight_1 =  "checked";
                                                }
                                                else if($row_data_g_and_o->dgw_weight == 2){
                                                    $checked_weight_2 =  "checked";
                                                }
                                                else if($row_data_g_and_o->dgw_weight == 3){
                                                    $checked_weight_3 =  "checked";
                                                }
                                                else if($row_data_g_and_o->dgw_weight == 4){
                                                    $checked_weight_4 =  "checked";
                                                }
                                                else {
                                                    $checked_weight_5 =  "checked";
                                                }
                                                $evaluator_review = $row_data_g_and_o->dgw_evaluator_review;
                                            }
                                        }
                                ?>
                                    <td rowspan="<?php echo $col[$spans] ?>"><textarea class="form-control" type="text"
                                            name="Evaluator_Review_edit"
                                            placeholder="Enter Evaluator Review"><?php echo $evaluator_review ?></textarea>
                                    </td>
                                    <td rowspan="<?php echo $col[$spans] ?>">
                                        <center>

                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="1"
                                                    onclick="show_weight_g_and_o_edit()" <?php echo $checked_weight_1 ?>
                                                    disabled>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="2"
                                                    onclick="show_weight_g_and_o_edit()" <?php echo $checked_weight_2 ?>
                                                    disabled>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="3"
                                                    onclick="show_weight_g_and_o_edit()" <?php echo $checked_weight_3 ?>
                                                    disabled>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?> " value="4"
                                                    onclick="show_weight_g_and_o_edit()" <?php echo $checked_weight_4 ?>
                                                    disabled>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="5"
                                                    onclick="show_weight_g_and_o_edit()" <?php echo $checked_weight_5 ?>
                                                    disabled>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->

                                        </center>
                                    </td>
                                    <input type="text" name="dgo_id" value="<?php echo $row->dgo_id; ?>" hidden>
                                    <?php
                                $spans++;
                                $temps = $row->dgo_item;
                                $table_index_radio_g_o_edit++;
                                } 
                                // else if
                                ?>

                                </tr>
                                <!-- end tr  -->

                                <?}
                            // foreach
                            ?>
                                <input type="text" id="table_index_radio_g_o_edit"
                                    value="<?php echo $table_index_radio_g_o_edit; ?>" hidden>
                            </tbody>
                            <!-- tbody  -->

                            <tfoot>
                                <td colspan="4">
                                    <input type="text" id="row_count" value="0" hidden>
                                    <input type="text" id="row_count_level" value="0" hidden>
                                </td>
                                <td>
                                    <p id="weight_all_g_o_edit">
                                </td>
                                <td colspan="3"></td>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- End table level -->

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>/ev_form_HD/Evs_form_HD/index">
                                    <button type="button" class="btn btn-inverse"><i
                                            class="fa fa-mail-reply"></i>Back</button>
                                </a>


                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">

                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                    </div>
                    <!-- form G_O_edit -->

                    <!-- form MHRD -->
                    <div class="tab-pane" id="MHRD_edit">
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

                                <?php 
                            
                            $table_index_radio_mhrd_edit = 0;

                            foreach($info_mhrd as $index => $row){ ?>
                                <input type="text" name="sfi_id" value="<?php echo $row->sfi_id; ?>" hidden>
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
                                    <td>
                                        <center>
                                            <?php  
                                   $checked_weight_1_1 ="";
                                   $checked_weight_1_2 ="";
                                   $checked_weight_1_3 ="";
                                   $checked_weight_1_4 ="";
                                   $checked_weight_1_5 ="";
              

                                   foreach($data_mhrd as $row_data_mhrd){
                                    if($row->sfi_id == $row_data_mhrd->mhw_sfi_id){
                                        if($row_data_mhrd->mhw_weight_1 == 1){
                                            $checked_weight_1_1 =  "checked";
                                        }
                                        else if($row_data_mhrd->mhw_weight_1 == 2){
                                            $checked_weight_1_2 =  "checked";
                                        }
                                        else if($row_data_mhrd->mhw_weight_1 == 3){
                                            $checked_weight_1_3 =  "checked";
                                        }
                                        else if($row_data_mhrd->mhw_weight_1 == 4){
                                            $checked_weight_1_4 =  "checked";
                                        }
                                        else {
                                            $checked_weight_1_5 =  "checked";
                                        }
                                    }
                                }
                                   
                                ?>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_mhrd_1_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="1" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_1_1 ?> disabled>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_1_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="2" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_1_2 ?> disabled>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_1_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="3" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_1_3 ?> disabled>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_1_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="4" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_1_4 ?> disabled>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_1_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="5" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_1_5 ?> disabled>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php  
                                   $checked_weight_2_1 ="";
                                   $checked_weight_2_2 ="";
                                   $checked_weight_2_3 ="";
                                   $checked_weight_2_4 ="";
                                   $checked_weight_2_5 ="";
             
                                    foreach($data_mhrd as $row_data_mhrd){
                                            if($row->sfi_id == $row_data_mhrd->mhw_sfi_id){
                                                if($row_data_mhrd->mhw_weight_2 == 1){
                                                    $checked_weight_2_1 =  "checked";
                                                }
                                                else if($row_data_mhrd->mhw_weight_2 == 2){
                                                    $checked_weight_2_2=  "checked";
                                                }
                                                else if($row_data_mhrd->mhw_weight_2 == 3){
                                                    $checked_weight_2_3 =  "checked";
                                                }
                                                else if($row_data_mhrd->mhw_weight_2 == 4){
                                                    $checked_weight_2_4 =  "checked";
                                                }
                                                else {
                                                    $checked_weight_2_5 =  "checked";
                                                }
                                            }
                                        }
                                ?>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_mhrd_2_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="1" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_2_1 ?> disabled>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_2_edit_<?php echo $table_index_radio_mhrd_edit ?> "
                                                    value="2" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_2_2 ?> disabled>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_2_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="3" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_2_3 ?> disabled>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_2_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="4" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_2_4 ?> disabled>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_2_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="5" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_2_5 ?> disabled>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                </tr>

                                <?php 
                        $table_index_radio_mhrd_edit++;    
                        }
                        // for 
                                 ?>
                                <input type="text" id="table_index_radio_mhrd_edit"
                                    value="<?php echo $table_index_radio_mhrd_edit; ?>" hidden>

                            </tbody>
                            <!-- tbody  -->

                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p id="weight_all_mhrd_1_edit">
                                </td>
                                <td>
                                    <p id="weight_all_mhrd_2_edit">
                                </td>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- End table level -->

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>/ev_form_HD/Evs_form_HD/index">
                                    <button type="button" class="btn btn-inverse"><i
                                            class="fa fa-mail-reply"></i>Back</button>
                                </a>
                            </div>
                            <!-- cancel to back to main  -->
                            <div class="col-md-6" align="right">
                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->
                    </div>



                    <!-- form ACM -->
                    <div class="tab-pane" id="ACM_edit">
                        <table class="table table-bordered table-striped m-n">
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
                                    $table_index_radio_acm_edit = 0;
                                    // start foreach
                                    foreach($info_ability_form as $row){
                                ?>
                                <input type="text" name="sfa_id" value="<?php echo $row->sfa_id; ?>" hidden>


                                <tr>
                                    <td id="dis_color">
                                        <center><?php echo $index_acm++; ?></center>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->cpn_competency_detail_en . "<br><font color='blue'>" . $row->cpn_competency_detail_th ."</font>"; ?>
                                    </td>
                                    <!-- show competency  -->
                                    <td id="dis_color">
                                        <?php foreach($info_expected as $row_ept){ 
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
                                        <?php foreach($info_expected as $row_ept){ 
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
                                        <input type="number"
                                            name="weing_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                            value="<?php echo $row->sfa_weight; ?>" hidden>
                                    </td>

                                    <!-- show weight  -->
                                    <td id="dis_color" width="5%">
                                        <?php  
                                   $checked_weight_1 ="";
                                   $checked_weight_2 ="";
                                   $checked_weight_3 ="";
                                   $checked_weight_4 ="";
                                   $checked_weight_5 ="";
              

                                    foreach($data_acm_weight as $row_data_acm_weight){
                                            if($row->sfa_id == $row_data_acm_weight->dta_sfa_id){
                                                if($row_data_acm_weight->dta_weight == 1){
                                                    $checked_weight_1 =  "checked";
                                                }
                                                else if($row_data_acm_weight->dta_weight == 2){
                                                    $checked_weight_2 =  "checked";
                                                }
                                                else if($row_data_acm_weight->dta_weight == 3){
                                                    $checked_weight_3 =  "checked";
                                                }
                                                else if($row_data_acm_weight->dta_weight == 4){
                                                    $checked_weight_4 =  "checked";
                                                }
                                                else {
                                                    $checked_weight_5 =  "checked";
                                                }
                                            }
                                        }
                                ?>
                                        <div class="col-md-12">
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="1"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_1 ?>
                                                disabled>
                                            <label for="1">&nbsp; 1</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="2"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_2 ?>
                                                disabled>
                                            <label for="2">&nbsp; 2</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="3"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_3 ?>
                                                disabled>
                                            <label for="3">&nbsp; 3</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?> " value="4"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_4 ?>
                                                disabled>
                                            <label for="4">&nbsp; 4</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="5"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_5 ?>
                                                disabled>
                                            <label for="5">&nbsp; 5</label>
                                            &nbsp;&nbsp;
                                        </div>
                                        <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td id="dis_color" width="2%">
                                        <p id="weight_acm_edit_<?php echo $table_index_radio_acm_edit ?>"></p>
                                    </td>
                                    <?php $table_index_radio_acm_edit++;  ?>
                                </tr>

                                <?php
                                    }
                                    // end foreach
                                ?>
                            </tbody>
                            <!-- tbody -->
                            <input type="text" id="table_index_radio_acm_edit"
                                value="<?php echo $table_index_radio_acm_edit; ?>" hidden>
                            <!-- save index table_index_radio_acm-->

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
                                    <td>
                                        <p id="weight_all_acm_edit">
                                    </td>
                                </tr>
                            </tfoot>
                            <!-- tfoot -->

                        </table>
                        <!-- table -->

                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>/ev_form_HD/Evs_form_HD/index">
                                    <button type="button" class="btn btn-inverse"><i
                                            class="fa fa-mail-reply"></i>Back</button>
                                </a>
                            </div>
                            <!-- col-md-6 -->
                            <div class="col-md-6" align="right">

                            </div>
                        </div>
                        <!-- row -->
                    </div>
                    <!-- form ACM_edit -->

                    <!-- form GCM -->
                    <div class="tab-pane" id="GCM_edit">
                        <table class="table table-bordered table-striped m-n">
                            <thead>
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
                                    $table_index_radio_gcm_edit = 0;
                                    // start foreach
                                    foreach($info_gcm_form as $row){
                                ?>
                                <input type="text" name="sgc_id" value="<?php echo $row->sgc_id; ?>" hidden>
                                <!-- save index table_index_radio_gcm-->

                                <tr>
                                    <td id="dis_color">
                                        <center><?php echo $index_acm++; ?></center>
                                    </td>
                                    <td id="dis_color">
                                        <?php echo $row->cpg_competency_detail_en . "<br><font color='blue'>" . $row->cpg_competency_detail_th ."</font>"; ?>
                                    </td>
                                    <!-- show competency  -->
                                    <td id="dis_color">
                                        <?php foreach($info_expected as $row_epg){ 
                                            if($row->sgc_cpg_id == $row_epg->kcg_cpg_id && $temp_keycomponent != $row_epg->kcg_key_component_detail_en){
                                                $temp_keycomponent = $row_epg->kcg_key_component_detail_en;?>
                                        <?php echo $row_epg->kcg_key_component_detail_en . "<br><font color='blue'>" . $row_epg->kcg_key_component_detail_th ."</font>"; ?>
                                        <?php }
                                            // if
                                            }
                                            // foreach ?>
                                    </td>
                                    <!-- show key component  -->
                                    <td id="dis_color">
                                        <?php foreach($info_expected as $row_epg){ 
                                            if($row->sgc_cpg_id == $row_epg->kcg_cpg_id && $temp_expected != $row_epg->epg_expected_detail_en && $row_epg->epg_pos_id == $info_pos_id){
                                                $temp_expected = $row_epg->epg_expected_detail_en;?>
                                        <?php echo $row_epg->epg_expected_detail_en . "<br><font color='blue'>" . $row_epg->epg_expected_detail_th ."</font><hr>"; ?>
                                        <?php }
                                        // if
                                        }
                                        // foreach ?>
                                    </td>
                                    <!-- show expected  -->
                                    <td id="dis_color">
                                        <center><?php echo $row->sgc_weight; ?></center>
                                        <input type="number"
                                            name="weing_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                            value="<?php echo $row->sgc_weight; ?>" hidden>
                                    </td>

                                    <!-- show weight  -->
                                    <td id="dis_color" width="5%">
                                        <center>
                                            <?php  
                                   $checked_weight_1 ="";
                                   $checked_weight_2 ="";
                                   $checked_weight_3 ="";
                                   $checked_weight_4 ="";
                                   $checked_weight_5 ="";
              

                                    foreach($data_gcm_weight as $row_data_gcm_weight){
                                            if($row->sgc_id == $row_data_gcm_weight->dtg_sgc_id){
                                                if($row_data_gcm_weight->dtg_weight == 1){
                                                    $checked_weight_1 =  "checked";
                                                }
                                                else if($row_data_gcm_weight->dtg_weight == 2){
                                                    $checked_weight_2 =  "checked";
                                                }
                                                else if($row_data_gcm_weight->dtg_weight == 3){
                                                    $checked_weight_3 =  "checked";
                                                }
                                                else if($row_data_gcm_weight->dtg_weight == 4){
                                                    $checked_weight_4 =  "checked";
                                                }
                                                else {
                                                    $checked_weight_5 =  "checked";
                                                }
                                            }
                                        }
                                ?>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="1"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_1 ?>
                                                    disabled>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="2"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_2 ?>
                                                    disabled>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="3"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_3 ?>
                                                    disabled>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?> " value="4"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_4 ?>
                                                    disabled>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="5"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_5 ?>
                                                    disabled>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td id="dis_color" width="2%">
                                        <p id="weight_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"></p>
                                    </td>
                                    <?php $table_index_radio_gcm_edit++;  ?>
                                </tr>

                                <?php
                                    }
                                    // end foreach
                                ?>
                            </tbody>
                            <!-- tbody -->
                            <input type="text" id="table_index_radio_gcm_edit"
                                value="<?php echo $table_index_radio_gcm_edit; ?>" hidden>
                            <!-- save index table_index_radio_gcm-->

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
                                    <td>
                                        <p id="weight_all_gcm_edit">
                                    </td>
                                </tr>
                            </tfoot>
                            <!-- tfoot -->

                        </table>
                        <!-- table -->

                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>/ev_form_HD/Evs_form_HD/index">
                                    <button type="button" class="btn btn-inverse"><i
                                            class="fa fa-mail-reply"></i>Back</button>
                                </a>
                            </div>
                            <!-- col-md-6 -->
                            <div class="col-md-6" align="right">

                            </div>
                        </div>
                    </div>
                    <!-- form ACM_edit -->
                </div>
            </div>
            <!-- tab-content -->
        </div>
        <!-- body -->
    </div>
    <!-- panel-indigo -->
</div>
<!-- col-12 -->