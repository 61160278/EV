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
                    show_weight_mbo_edit();
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
        weight = document.getElementById("weigth_acm_edit_" + i).value;
        console.log(weight)
        document.getElementById('show_weight_acm_edit_' + i + '').innerHTML = arr_weight[i] * weight;
        sum += arr_weight[i] * document.getElementById("weigth_acm_edit_" + i).value;
    }
    document.getElementById('weight_all_acm_edit').innerHTML = sum;

}
// show_weight_acm_edit


function update_ACM_edit() {
    var arr_radio = [];
    var arr_sfa_id = [];
    var get_arr_sfa_id = "";
    var arr_dta_id = [];
    var index = document.getElementById("table_index_radio_acm_edit").value;
    var Emp_ID = document.getElementById("Emp_ID").value;
    var App = document.getElementById("App_Emp_ID").value;

    for (i = 0; i < index; i++) {
        arr_sfa_id.push(document.getElementById("sfa_id" + i).value);
        arr_dta_id.push(document.getElementById("dta_" + i).value);

        $("[name = rd_acm_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_radio.push(document.getElementsByName("rd_acm_edit_" + i + "")[index].value);
            } //if
        });
    }
    console.log("index : " + index);
    console.log("Emp_ID :  " + Emp_ID);
    console.log("arr_sfa_id : " + arr_sfa_id);
    console.log("arr_radio : " + arr_radio);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/update_data_acm_weight_edit",
        data: {
            "Emp_ID": Emp_ID,
            "arr_sfa_id": arr_sfa_id,
            "arr_radio": arr_radio,
            "arr_dta_id": arr_dta_id,
            "App": App,
            "index": index

        },
        success: function(data) {
            console.log(data);
            window.location.href = "<?php echo base_url();?>ev_form_HD/Evs_form_HD/index";
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax
}
// update_ACM_edit


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
// show_weight_g_and_o_edit


function update_G_and_O_edit() {
    var arr_radio = [];
    var arr_dgo_id = [];
    var arr_dgw_id = [];
    var arr_Evaluator_Review_edit = [];
    var get_arr_dgo_id = "";
    var index = document.getElementById("table_index_radio_g_o_edit").value;
    var Emp_ID = document.getElementById("Emp_ID").value;
    var App = document.getElementById("App_Emp_ID").value;

    for (i = 0; i < index; i++) {
        arr_dgo_id.push(document.getElementsByName("dgo_id")[i].value);
        arr_dgw_id.push(document.getElementById("dgw_" + i).value);
        arr_Evaluator_Review_edit.push(document.getElementsByName("Evaluator_Review_edit")[i].value);
        $("[name = rd_g_o_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_radio.push(document.getElementsByName("rd_g_o_edit_" + i + "")[index].value);
            } //if
        });
    }
    console.log("index : " + index);
    console.log("Emp_ID :  " + Emp_ID);
    console.log("arr_dgo_id : " + arr_dgo_id);
    console.log("arr_radio : " + arr_radio);
    console.log("arr_Evaluator_Review : " + arr_Evaluator_Review_edit);


    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/update_data_g_and_o",
        data: {
            "Emp_ID": Emp_ID,
            "arr_dgo_id": arr_dgo_id,
            "arr_radio": arr_radio,
            "arr_Evaluator_Review": arr_Evaluator_Review_edit,
            "App": App,
            "arr_dgw_id": arr_dgw_id
        },
        success: function(data) {
            console.log(data);
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax
}
// update_G_and_O_edit


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
// show_weight_gcm_edit


function update_GCM_edit() {
    var arr_radio = [];
    var arr_sgc_id = [];
    var arr_dtg_id = [];
    var get_arr_sgc_id = "";
    var index = document.getElementById("table_index_radio_gcm_edit").value;
    var Emp_ID = document.getElementById("Emp_ID").value;
    var App = document.getElementById("App_Emp_ID").value;

    for (i = 0; i < index; i++) {
        arr_sgc_id.push(document.getElementsByName("sgc_id")[i].value);
        arr_dtg_id.push(document.getElementById("dtg_" + i).value);
        $("[name = rd_gcm_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_radio.push(document.getElementsByName("rd_gcm_edit_" + i + "")[index].value);
            } //if
        });
    }
    console.log("index : " + index);
    console.log("Emp_ID :  " + Emp_ID);
    console.log("arr_sgc_id : " + arr_sgc_id);
    console.log("arr_radio : " + arr_radio);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/update_data_gcm_weight_edit",
        data: {
            "Emp_ID": Emp_ID,
            "arr_sgc_id": arr_sgc_id,
            "arr_radio": arr_radio,
            "App": App,
            "arr_dtg_id": arr_dtg_id

        },
        success: function(data) {
            console.log(data);
            window.location.href = "<?php echo base_url();?>ev_form_HD/Evs_form_HD/index";
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax


}
// update_GCM_edit

function show_weight_mbo_edit() {
    var arr_weight = [];
    var sum = 0;
    var index = document.getElementById("table_index_radio_mbo_edit").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_mbo_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_mbo_edit_" + i + "")[index].value);
            }
            //if
        });
        // each 
    }
    // for 
    for (i = 0; i < index; i++) {
        document.getElementById("weight_mbo_edit_" + i + "").innerHTML = arr_weight[i] * document.getElementsByName(
            "weing_mbo_edit_" +
            i + "")[0].value;
        sum += arr_weight[i] * document.getElementsByName("weing_mbo_edit_" + i + "")[0].value;
    }
    document.getElementById("weight_all_mbo_edit").innerHTML = sum;
}
// show_weight_mbo_edit


function update_MBO_edit() {
    var arr_radio = [];
    var arr_dtm_id = [];
    var arr_dmw_id = [];
    var get_arr_dtm_id = "";
    var index = document.getElementById("table_index_radio_mbo_edit").value;
    var Emp_ID = document.getElementById("Emp_ID").value;
    var App = document.getElementById("App_Emp_ID").value;

    for (i = 0; i < index; i++) {
        arr_dtm_id.push(document.getElementsByName("dtm_id")[i].value);
        arr_dmw_id.push(document.getElementById("dmw_" + i).value);
        $("[name = rd_mbo_edit_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_radio.push(document.getElementsByName("rd_mbo_edit_" + i + "")[index].value);
            } //if
        });
    }
    console.log("index : " + index);
    console.log("Emp_ID :  " + Emp_ID);
    console.log("arr_dtm_id : " + arr_dtm_id);
    console.log("arr_radio : " + arr_radio);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/update_data_mbo_edit",
        data: {
            "Emp_ID": Emp_ID,
            "arr_dtm_id": arr_dtm_id,
            "arr_radio": arr_radio,
            "App": App,
            "arr_dmw_id": arr_dmw_id

        },
        success: function(data) {
            console.log(data);
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// update_MBO_edit

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
// show_weight_mhrd_edit


function update_MHRD_edit() {

    var arr_sfi_id = [];
    var arr_weight_1 = [];
    var arr_weight_2 = [];
    var get_arr_sfi_id = "";
    var arr_mhw_id = [];
    var Emp_ID = document.getElementById("Emp_ID").value;
    var App = document.getElementById("App_Emp_ID").value;

    var index = document.getElementById("table_index_radio_mhrd_edit").value;
    for (i = 0; i < index; i++) {
        arr_sfi_id.push(document.getElementsByName("sfi_id")[i].value);
        arr_mhw_id.push(document.getElementById("mhw_id" + i).value);
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
    console.log("index : " + index);
    console.log("Emp_ID :  " + Emp_ID);
    console.log("arr_sfi_id : " + arr_sfi_id);
    console.log("arr_radio_1 : " + arr_weight_1);
    console.log("arr_radio_2 : " + arr_weight_2);


    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/update_mhrd",
        data: {
            "Emp_ID": Emp_ID,
            "arr_sfi_id": arr_sfi_id,
            "arr_radio_1": arr_weight_1,
            "arr_radio_2": arr_weight_2,
            "App": App,
            "arr_mhw_id": arr_mhw_id
        },
        success: function(data) {
            console.log(data);
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// update_MHRD_edit
</script>
<!-- script -->
<?php  
                        $onclek_form_pe = "";
                        $onclek_form_ce = "";
                        $onclek_form_all= "";
                        if($data_from_pe == "MBO_edit"){
                            $onclek_form_pe = "update_MBO_edit();";
                        }
                        // else if
                        else if($data_from_pe == "MHRD_edit"){
                            $onclek_form_pe = "update_MHRD_edit();";
                        }
                        // else if
                        else if($data_from_pe == "G_and_O_edit"){
                            $onclek_form_pe = "update_G_and_O_edit();";
                        }
                        // else if

                        if($data_from_ce == "ACM_edit"){
                            $onclek_form_ce = "update_ACM_edit();";
                        }
                        // else if
                        else if($data_from_ce == "GCM_edit"){
                            $onclek_form_ce = "update_GCM_edit();";
                        }
                        // else if
                    
                        $onclek_form_all = "onclick='".$onclek_form_pe." ".$onclek_form_ce."'";
                    
                    ?>


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
                <input type="text" id="App_Emp_ID" value="<?php echo $_SESSION['UsEmp_ID'] ?>" hidden>
            </div>
            <!-- heading -->

            <div class="panel-body">
                <div class="tab-content">

                    <br>
                    <?php 
                    foreach($emp_info->result() as $row){?>
                    <input type="text" id="pos_id" value="<?php echo $row->Position_ID; ?>" hidden>
                    <input type="text" id="Emp_ID" value="<?php echo $row->emp_id; ?>" hidden>
                    <input type="text" id="employee_ID" value="<?php echo $row->Emp_ID; ?>" hidden>
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
                    <?php } ?>
                    <!-- show infomation employee -->
                    <hr>

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
                                    <th width="30%">
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
                            if($data_from_pe == "MBO_edit"){
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
                                                $checked_weight_1 ="";
                                                $checked_weight_2 ="";
                                                $checked_weight_3 ="";
                                                $checked_weight_4 ="";
                                                $checked_weight_5 ="";
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
                                                }?>
                                            <input type="text" id="dmw_<?php echo $table_index_radio_mbo_edit ?>"
                                                value="<?php echo $row_data_mbo->dmw_id; ?>" hidden>
                                            <?php }
                                            // 
                                        }
                                        // foreach
                                    ?>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    value="1" onclick="show_weight_mbo_edit()"
                                                    <?php echo $checked_weight_1 ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    value="2" onclick="show_weight_mbo_edit()"
                                                    <?php echo $checked_weight_2 ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    value="3" onclick="show_weight_mbo_edit()"
                                                    <?php echo $checked_weight_3 ?>>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    value="4" onclick="show_weight_mbo_edit()"
                                                    <?php echo $checked_weight_4 ?>>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"
                                                    value="5" onclick="show_weight_mbo_edit()"
                                                    <?php echo $checked_weight_5 ?>>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td id="dis_color" width="2%" align="center">
                                        <p id="weight_mbo_edit_<?php echo $table_index_radio_mbo_edit ?>"></p>
                                    </td>
                                    <?php $table_index_radio_mbo_edit++;  ?>
                                </tr>
                                <input type="text" name="dtm_id" value="<?php echo $row->dtm_id; ?>" hidden>
                                <?php  }
                                // foreach ?>
                                <input type="text" id="table_index_radio_mbo_edit"
                                    value="<?php echo $table_index_radio_mbo_edit; ?>" hidden>
                                <?php }
                                // if?>

                            </tbody>
                            <!-- tbody -->
                            <tfoot>
                                <tr>
                                    <td colspan="3" align="right"><b>Total Weight</b></td>
                                    <td id="show_weight" align="center">100</td>
                                    <td></td>
                                    <td align="center">
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
                                <a href="<?php echo base_url() ?>ev_form_HD/Evs_form_HD/index">
                                    <button class="btn btn-inverse">BACK</button>
                                </a>
                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">

                            </div>
                            <!-- col-md-6  -->

                        </div>
                    </div>
                    <!-- form MBO_edit -->

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
                                <?php 
                                if($data_from_pe == "G_and_O_edit"){
                                $num_index = 1;
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
                                                $checked_weight_1 ="";
                                                $checked_weight_2 ="";
                                                $checked_weight_3 ="";
                                                $checked_weight_4 ="";
                                                $checked_weight_5 ="";
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
                                                $evaluator_review = $row_data_g_and_o->dgw_evaluator_review; ?>
                                    <input type="text" id="dgw_<?php echo $table_index_radio_g_o_edit?>"
                                        value="<?php echo $row_data_g_and_o->dgw_id?>" hidden>
                                    <?php }
                                            //if
                                        }
                                        // foreach
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
                                                    onclick="show_weight_g_and_o()" <?php echo $checked_weight_1 ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="2"
                                                    onclick="show_weight_g_and_o_edit()"
                                                    <?php echo $checked_weight_2 ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="3"
                                                    onclick="show_weight_g_and_o_edit()"
                                                    <?php echo $checked_weight_3 ?>>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?> " value="4"
                                                    onclick="show_weight_g_and_o_edit()"
                                                    <?php echo $checked_weight_4 ?>>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="5"
                                                    onclick="show_weight_g_and_o_edit()"
                                                    <?php echo $checked_weight_5 ?>>
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
                                                $checked_weight_1 ="";
                                                $checked_weight_2 ="";
                                                $checked_weight_3 ="";
                                                $checked_weight_4 ="";
                                                $checked_weight_5 ="";
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

                                                $evaluator_review = $row_data_g_and_o->dgw_evaluator_review; ?>
                                    <input type="text" id="dgw_<?php echo $table_index_radio_g_o_edit?>"
                                        value="<?php echo $row_data_g_and_o->dgw_id?>" hidden>
                                    <?php }
                                            //if
                                        }
                                        // foreacg 
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
                                                    onclick="show_weight_g_and_o_edit()"
                                                    <?php echo $checked_weight_1 ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="2"
                                                    onclick="show_weight_g_and_o_edit()"
                                                    <?php echo $checked_weight_2 ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="3"
                                                    onclick="show_weight_g_and_o_edit()"
                                                    <?php echo $checked_weight_3 ?>>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?> " value="4"
                                                    onclick="show_weight_g_and_o_edit()"
                                                    <?php echo $checked_weight_4 ?>>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_g_o_edit_<?php echo $table_index_radio_g_o_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o_edit ?>" value="5"
                                                    onclick="show_weight_g_and_o_edit()"
                                                    <?php echo $checked_weight_5 ?>>
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

                                <?php } 
                            // if ?>
                            </tbody>
                            <!-- tbody  -->

                            <tfoot>
                                <td colspan="4">
                                    <input type="text" id="row_count" value="0" hidden>
                                    <input type="text" id="row_count_level" value="0" hidden>
                                </td>
                                <td>
                                    <p id="">100%</p>
                                </td>
                                <td colspan="3"></td>
                                <td>
                                    <p id="weight_all_g_o_edit"></p>
                                </td>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- End table level -->

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url() ?>ev_form_HD/Evs_form_HD/index">
                                    <button class="btn btn-inverse">BACK</button>
                                </a>

                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">

                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                    </div>
                    <!-- form G_O_edit -->

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
                            if($data_from_pe == "MHRD_edit"){
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
                     
              

                                   foreach($data_mhrd as $row_data_mhrd){                                       
                                    if($row->sfi_id == $row_data_mhrd->mhw_sfi_id){
                                        $checked_weight_1_1 ="";
                                        $checked_weight_1_2 ="";
                                        $checked_weight_1_3 ="";
                          
                                        if($row_data_mhrd->mhw_weight_1 == 1){
                                            $checked_weight_1_1 =  "checked";
                                        }
                                        else if($row_data_mhrd->mhw_weight_1 == 2){
                                            $checked_weight_1_2 =  "checked";
                                        }
                                        else if($row_data_mhrd->mhw_weight_1 == 3){
                                            $checked_weight_1_3 =  "checked";
                                        } ?>
                                            <input type="text" id="mhw_<?php echo $table_index_radio_mhrd_edit; ?>"
                                                value="<?php echo $row_data_mhrd->mhw_id; ?>" hidden>
                                            <?php }
                                    // if
                                }
                                // foreach
                                ?>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_mhrd_1_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="1" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_1_1 ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_1_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="2" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_1_2 ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_1_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="3" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_1_3 ?>>
                                                <label for="3">&nbsp; 3</label>
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
                        
             
                                    foreach($data_mhrd as $row_data_mhrd){
                                            if($row->sfi_id == $row_data_mhrd->mhw_sfi_id){
                                                $checked_weight_2_1 ="";
                                                $checked_weight_2_2 ="";
                                                $checked_weight_2_3 ="";
                                                $checked_weight_2_4 ="";
                                                $checked_weight_2_5 ="";
                                                if($row_data_mhrd->mhw_weight_2 == 1){
                                                    $checked_weight_2_1 =  "checked";
                                                }
                                                else if($row_data_mhrd->mhw_weight_2 == 2){
                                                    $checked_weight_2_2=  "checked";
                                                }
                                                else if($row_data_mhrd->mhw_weight_2 == 3){
                                                    $checked_weight_2_3 =  "checked";
                                                }
                                        
                                            }
                                        }
                                ?>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_mhrd_2_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="1" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_2_1 ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_2_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="2" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_2_2 ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;
                                                <input type="radio"
                                                    name="rd_mhrd_2_edit_<?php echo $table_index_radio_mhrd_edit ?>"
                                                    value="3" onclick="show_weight_mhrd_edit()"
                                                    <?php echo $checked_weight_2_3 ?>>
                                                <label for="3">&nbsp; 3</label>
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
                                <?php } 
                        // if ?>
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
                                <a href="<?php echo base_url() ?>ev_form_HD/Evs_form_HD/index">
                                    <button class="btn btn-inverse">BACK</button>
                                </a>
                            </div>
                            <div class="col-md-6" align="right">

                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->
                    </div>
                    <!-- form MHRD_edit -->

                    <div class="tab-pane" id="ACM_edit">
                        <table class="table table-bordered m-n">
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
                                    <th width="30%">
                                        <center>Result</center>
                                    </th>
                                    <th width="5%">
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
                            $table_index_radio_acm_edit = 0;
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
                                foreach($info_ability_form->result() AS $index => $row){  
                                    ?>

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
                                        <input type="text"
                                            id="weigth_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                            value="<?php echo $row->sfa_weight; ?>" hidden>
                                    </td>
                                    <td width="5%" rowspan="<?php echo $row_index[$index] ?>"
                                        style="vertical-align:middle;" align="center">
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
                                                }?>
                                        <input type="text" id="dta_<?php echo $table_index_radio_acm_edit; ?>"
                                            value="<?php echo $row_data_acm_weight->dta_id; ?>" hidden>
                                        <?php }
                                            // if
                                        }
                                        // foreach
                                        ?>
                                        <div class="col-md-12">
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="1"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_1 ?>>
                                            <label for="1">&nbsp; 1</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="2"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_2 ?>>
                                            <label for="2">&nbsp; 2</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="3"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_3 ?>>
                                            <label for="3">&nbsp; 3</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?> " value="4"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_4 ?>>
                                            <label for="4">&nbsp; 4</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="5"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_5 ?>>
                                            <label for="5">&nbsp; 5</label>
                                            &nbsp;&nbsp;
                                        </div>
                                        <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td width="2%" rowspan="<?php echo $row_index[$index] ?>" align="center"
                                        style="vertical-align:middle;">
                                        <p id="show_weight_acm_edit_<?php echo $table_index_radio_acm_edit ?>"></p>
                                    </td>
                                    <input type="text" id="sfa_id<?php echo $table_index_radio_acm_edit ?>"
                                        value="<?php echo $row->sfa_id; ?>" hidden>
                                    <?php 
                                $table_index_radio_acm_edit++;    
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
                                        <input type="text"
                                            id="weigth_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                            value="<?php echo $row->sfa_weight; ?>" hidden>
                                    </td>
                                    <td width="5%" rowspan="<?php echo $row_index[$count-1] ?>"
                                        style="vertical-align:middle;" align="center">
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
                                            }?>
                                        <input type="text" id="dta_<?php echo $table_index_radio_acm_edit; ?>"
                                            value="<?php echo $row_data_acm_weight->dta_id; ?>" hidden>
                                        <?php }
                                            // if
                                        }
                                        // foreach
                                        ?>
                                        <div class="col-md-12">
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="1"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_1 ?>>
                                            <label for="1">&nbsp; 1</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="2"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_2 ?>>
                                            <label for="2">&nbsp; 2</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="3"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_3 ?>>
                                            <label for="3">&nbsp; 3</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?> " value="4"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_4 ?>>
                                            <label for="4">&nbsp; 4</label>
                                            &nbsp;&nbsp;
                                            <input type="radio"
                                                name="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>"
                                                id="rd_acm_edit_<?php echo $table_index_radio_acm_edit ?>" value="5"
                                                onclick="show_weight_acm_edit()" <?php echo $checked_weight_5 ?>>
                                            <label for="5">&nbsp; 5</label>
                                            &nbsp;&nbsp;
                                        </div>
                                        <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td width="2%" rowspan="<?php echo $row_index[$count-1] ?>"
                                        style="vertical-align:middle;" align="center">
                                        <p id="show_weight_acm_edit_<?php echo $table_index_radio_acm_edit ?>"></p>
                                    </td>
                                    <input type="text" id="sfa_id<?php echo $table_index_radio_acm_edit ?>"
                                        value="<?php echo $row->sfa_id; ?>" hidden>
                                    <?php 
                                $table_index_radio_acm_edit++;    
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

                                <?php 
                                } 
                            // foreach
                            }
                            // if?>
                            </tbody>
                            <!-- tbody -->
                            <input type="text" id="table_index_radio_acm_edit"
                                value="<?php echo $table_index_radio_acm_edit; ?>" hidden>
                            <!-- save index table_index_radio_acm-->

                            <tfoot>
                                <tr height="5%">
                                    <td colspan="4">
                                        <center> Total Weight</center>
                                    </td>
                                    <td>
                                        <center> 100</center>
                                    </td>
                                    <td>
                                        <center> Total Result</center>
                                    </td>
                                    <td align="center">
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
                                <a href="<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/index">
                                    <button type="button" class="btn btn-inverse">Back</button>
                                </a>
                            </div>
                            <!-- col-md-6 -->
                            <div class="col-md-6" align="right">
                                <button class="btn btn-success" data-toggle="modal" data-target="#save_data">
                                    Submit</button>
                            </div>
                        </div>
                        <!-- row -->
                    </div>
                    <!-- form ACM_edit -->

                    <div class="tab-pane" id="GCM_edit">
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
                                if($data_from_ce == "GCM_edit"){
                                $com_check = "";
                                $key_check = "";
                                $row_key = 0;
                                $row_index = [];
                                $table_index_radio_gcm_edit = 0;
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
                                        $key = $row->kcg_key_component_detail_en; ?>
                                    <td align="center" rowspan="<?php echo $row_index[$index] ?>"
                                        style="vertical-align:middle;">
                                        <?php echo $count;  ?></td>
                                    <td rowspan="<?php echo $row_index[$index] ?>" style="vertical-align:middle;">
                                        <?php echo $row->cpg_competency_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->cpg_competency_detail_th;  ?></font>
                                    </td>
                                    <td>
                                        <?php echo $row->kcg_key_component_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->kcg_key_component_detail_th;  ?></font>
                                    </td>
                                    <td align="center">
                                        <?php echo $row->epg_point;  ?><br>
                                    </td>
                                    <td>
                                        <?php echo $row->epg_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->epg_expected_detail_th;  ?></font>
                                    </td>
                                    <td align="center" style="vertical-align:middle;"
                                        rowspan="<?php echo $row_index[$index] ?>">
                                        <?php echo $row->sgc_weight; ?><br>
                                        <input type="number"
                                            name="weing_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                            value="<?php echo $row->sgc_weight; ?>" hidden>
                                    </td>
                                    <td width="5%" style="vertical-align:middle;"
                                        rowspan="<?php echo $row_index[$index] ?>">
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
                                                } ?>
                                            <input type="text" id="dtg_<?php echo $table_index_radio_gcm_edit; ?>"
                                                value="<?php echo $row_data_gcm_weight->dtg_id; ?>" hidden>
                                            <?php }
                                            // if
                                        }
                                        // foreach
                                        ?>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="1"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_1 ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="2"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_2 ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="3"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_3 ?>>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?> " value="4"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_4 ?>>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="5"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_5 ?>>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td rowspan="<?php echo $row_index[$index] ?>" style="vertical-align:middle;"
                                        align="center">
                                        <p id="weight_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"></p>
                                    </td>

                                    <?php 
                                    $table_index_radio_gcm_edit++;    
                                    }
                                        // if 
                                        else if($com != $row->cpg_competency_detail_en){
                                            $count++;
                                            $com = $row->cpg_competency_detail_en; 
                                            $key = $row->kcg_key_component_detail_en;?>

                                    <td align="center" rowspan="<?php echo $row_index[$count-1] ?>"
                                        style="vertical-align:middle;">
                                        <?php echo $count;  ?></td>
                                    <td rowspan="<?php echo $row_index[$count-1] ?>" style="vertical-align:middle;">
                                        <?php echo $row->cpg_competency_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->cpg_competency_detail_th;  ?></font>
                                    </td>
                                    <td>
                                        <?php echo $row->kcg_key_component_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->kcg_key_component_detail_th;  ?></font>
                                    </td>
                                    <td i align="center">
                                        <?php echo $row->epg_point;  ?><br>
                                    </td>
                                    <td>
                                        <?php echo $row->epg_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->epg_expected_detail_th;  ?></font>
                                    </td>
                                    <td align="center" style="vertical-align:middle;"
                                        rowspan="<?php echo $row_index[$count-1] ?>">
                                        <?php echo $row->sgc_weight; ?><br>
                                        <input type="number"
                                            name="weing_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                            value="<?php echo $row->sgc_weight; ?>" hidden>
                                    </td>
                                    <td width="5%" style="vertical-align:middle;"
                                        rowspan="<?php echo $row_index[$count-1] ?>">
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
                                                }?>
                                            <input type="text" id="dtg_<?php echo $table_index_radio_gcm_edit; ?>"
                                                value="<?php echo $row_data_gcm_weight->dtg_id; ?>" hidden>
                                            <?php }
                                            // if
                                        }
                                        // foreach 
                                        ?>
                                            <div class="col-md-12">
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="1"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_1 ?>>
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="2"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_2 ?>>
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="3"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_3 ?>>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?> " value="4"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_4 ?>>
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio"
                                                    name="rd_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm_edit ?>" value="5"
                                                    onclick="show_weight_gcm_edit()" <?php echo $checked_weight_5 ?>>
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td rowspan="<?php echo $row_index[$count-1] ?>" style="vertical-align:middle;"
                                        align="center">
                                        <p id="weight_gcm_edit_<?php echo $table_index_radio_gcm_edit ?>"></p>
                                    </td>

                                    <?php 
                                    $table_index_radio_gcm_edit++; 
                                    }
                                        // else if

                                        else if($com == $row->cpg_competency_detail_en){ 
                                            if($key != $row->kcg_key_component_detail_en){ 
                                                $key = $row->kcg_key_component_detail_en; ?>
                                    <td>
                                        <?php echo $row->kcg_key_component_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->kcg_key_component_detail_th;  ?></font>
                                    </td>
                                    <td align="center">
                                        <?php echo $row->epg_point;  ?><br>
                                    </td>
                                    <td>
                                        <?php echo $row->epg_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->epg_expected_detail_th;  ?></font>
                                    </td>
                                    <?php
                                    }
                                    // if
                                    else if($key == $row->kcg_key_component_detail_en){ ?>
                                    <td>
                                        <?php echo $row->epg_point;  ?><br>
                                    </td>
                                    <td>
                                        <?php echo $row->epg_expected_detail_en;  ?><br>
                                        <font color="blue"><?php echo $row->epg_expected_detail_th;  ?></font>
                                    </td>

                                    <?php }
                                        // else if  	
                                    }
                                    // else if 
                                    ?>


                                </tr>
                                <input type="text" name="sgc_id" value="<?php echo $row->sgc_id; ?>" hidden>
                                <?php 
                                } 
                                // foreach
                            }
                            // if?>
                            </tbody>
                            <!-- tbody -->
                            <input type="text" id="table_index_radio_gcm_edit"
                                value="<?php echo $table_index_radio_gcm_edit; ?>" hidden>

                            <tfoot>
                                <tr height="5%">
                                    <td colspan="5">
                                        <center> Total Weight</center>
                                    </td>
                                    <td>
                                        <center> 100</center>
                                    </td>
                                    <td>
                                        <center> Total Result</center>
                                    </td>
                                    <td align="center">
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
                                <a href="<?php echo base_url() ?>ev_form_HD/Evs_form_HD/index">
                                    <button class="btn btn-inverse">BACK</button>
                                </a>
                            </div>
                            <!-- col-md-6 -->
                            <div class="col-md-6" align="right">
                                <button class="btn btn-success" data-toggle="modal" data-target="#save_data">
                                    Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- ----------------------------------form GCM_edit ---------------------------------- -->

                </div>
                <!-- tab-content -->
            </div>
            <!-- body -->
        </div>
        <!-- panel-indigo -->
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
                <button type="button" class="btn btn-success" id="btnsaveadd"
                    <?php echo $onclek_form_all ?>>Submit</button>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal save-->