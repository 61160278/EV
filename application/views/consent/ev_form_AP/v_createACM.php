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
                    $("#MBO").addClass("active");
                    show_weight_mbo();
                }
                // if
                else if (row.ps_form_pe == "G&O") {
                    data_tap += '<li class="active"><a href="#G_O" data-toggle="tab">';
                    data_tap += '<font>G&O</font>';
                    data_tap += '</a></li>';
                    $("#G_O").addClass("active");
                    show_weight_g_and_o();


                }
                // else if
                else if (row.ps_form_pe == "MHRD") {
                    data_tap += '<li class="active"><a href="#MHRD" data-toggle="tab">';
                    data_tap += '<font>MHRD</font>';
                    data_tap += '</a></li>';
                    $("#MHRD").addClass("active");
                    show_weight_mhrd();
                }
                // else if 
                // check pe tool

                if (row.ps_form_ce == "ACM") {
                    data_tap += '<li><a href="#ACM" data-toggle="tab">';
                    data_tap += '<font>ACM</font>';
                    data_tap += '</a></li>';
                    show_weight_acm();
                }
                // if
                else if (row.ps_form_ce == "GCM") {
                    data_tap += '<li><a href="#GCM" data-toggle="tab">';
                    data_tap += '<font>GCM</font>';
                    data_tap += '</a></li>';
                    show_weight_gcm();
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



function show_weight_acm() {
    var arr_weight = [];
    var sum = 0;
    var index = document.getElementById("table_index_radio_acm").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_acm_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_acm_" + i + "")[index].value);
            } //if
        });
    }
    for (i = 0; i < index; i++) {
        document.getElementById("weight_acm_" + i + "").innerHTML = arr_weight[i] * document.getElementsByName(
            "weing_acm_" +
            i + "")[0].value;
        sum += arr_weight[i] * document.getElementsByName("weing_acm_" + i + "")[0].value;
    }
    document.getElementById("weight_all_acm").innerHTML = sum;
}

function save_ACM() {
    var arr_radio = [];
    var arr_sfa_id = [];
    var get_arr_sfa_id = "";
    var index = document.getElementById("table_index_radio").value;
    var Emp_ID = document.getElementById("Emp_ID").value;

    for (i = 0; i < index; i++) {
        arr_sfa_id.push(document.getElementsByName("sfa_id")[i].value);
        $("[name = rd_name_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_radio.push(document.getElementsByName("rd_name_" + i + "")[index].value);
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
        url: "<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/save_data_acm_weight",
        data: {
            "Emp_ID": Emp_ID,
            "arr_sfa_id": arr_sfa_id,
            "arr_radio": arr_radio

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
    window.location = "<?php echo base_url(); ?>/ev_form_AP/Evs_form_AP/index";
}

function show_weight_g_and_o() {
    var arr_weight = [];
    var sum = 0;
    var index = document.getElementById("table_index_radio_g_o").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_g_o_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_g_o_" + i + "")[index].value);
            } //if
        });
    }

    for (i = 0; i < index; i++) {

        sum += arr_weight[i] * document.getElementsByName("weing_g_o_" + i + "")[0].value;
    }
    document.getElementById("weight_all_g_o").innerHTML = sum;
}

function save_G_and_O() {
    var arr_radio = [];
    var arr_dgo_id = [];
    var arr_Evaluator_Review = [];
    var get_arr_dgo_id = "";
    var index = document.getElementById("table_index_radio").value;
    var Emp_ID = document.getElementById("Emp_ID").value;

    for (i = 0; i < index; i++) {
        arr_dgo_id.push(document.getElementsByName("dgo_id")[i].value);
        arr_Evaluator_Review.push(document.getElementsByName("Evaluator_Review")[i].value);
        $("[name = rd_name_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_radio.push(document.getElementsByName("rd_name_" + i + "")[index].value);
            } //if
        });
    }
    console.log("index : " + index);
    console.log("Emp_ID :  " + Emp_ID);
    console.log("arr_dgo_id : " + arr_dgo_id);
    console.log("arr_radio : " + arr_radio);
    console.log("arr_Evaluator_Review : " + arr_Evaluator_Review);


    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/save_data_g_and_o",
        data: {
            "Emp_ID": Emp_ID,
            "arr_dgo_id": arr_dgo_id,
            "arr_radio": arr_radio,
            "arr_Evaluator_Review": arr_Evaluator_Review
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
    window.location = "<?php echo base_url(); ?>/ev_form_AP/Evs_form_AP/index";
}

function show_weight_gcm() {
    var arr_weight = [];
    var sum = 0;
    var index = document.getElementById("table_index_radio_gcm").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_gcm_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_gcm_" + i + "")[index].value);
            } //if
        });
    }
    for (i = 0; i < index; i++) {
        document.getElementById("weight_gcm_" + i + "").innerHTML = arr_weight[i] * document.getElementsByName(
            "weing_gcm_" +
            i + "")[0].value;
        sum += arr_weight[i] * document.getElementsByName("weing_gcm_" + i + "")[0].value;
    }
    document.getElementById("weight_all_gcm").innerHTML = sum;
}

function save_GCM() {
    var arr_radio = [];
    var arr_sgc_id = [];
    var get_arr_sgc_id = "";
    var index = document.getElementById("table_index_radio").value;
    var Emp_ID = document.getElementById("Emp_ID").value;

    for (i = 0; i < index; i++) {
        arr_sgc_id.push(document.getElementsByName("sgc_id")[i].value);
        $("[name = rd_name_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_radio.push(document.getElementsByName("rd_name_" + i + "")[index].value);
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
        url: "<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/save_data_gcm_weight",
        data: {
            "Emp_ID": Emp_ID,
            "arr_sgc_id": arr_sgc_id,
            "arr_radio": arr_radio

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
    window.location = "<?php echo base_url(); ?>/ev_form_AP/Evs_form_AP/index";
}

function show_weight_mbo() {
    var arr_weight = [];
    var sum = 0;
    var index = document.getElementById("table_index_radio_mbo").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_mbo_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_mbo_" + i + "")[index].value);
            } //if
        });
    }
    for (i = 0; i < index; i++) {
        document.getElementById("weight_mbo_" + i + "").innerHTML = arr_weight[i] * document.getElementsByName(
            "weing_mbo_" +
            i + "")[0].value;
        sum += arr_weight[i] * document.getElementsByName("weing_mbo_" + i + "")[0].value;
    }
    document.getElementById("weight_all_mbo").innerHTML = sum;
}

function save_MBO() {
    var arr_radio = [];
    var arr_dtm_id = [];
    var get_arr_dtm_id = "";
    var index = document.getElementById("table_index_radio").value;
    var Emp_ID = document.getElementById("Emp_ID").value;

    for (i = 0; i < index; i++) {
        arr_dtm_id.push(document.getElementsByName("dtm_id")[i].value);
        $("[name = rd_name_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_radio.push(document.getElementsByName("rd_name_" + i + "")[index].value);
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
        url: "<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/save_data_mbo",
        data: {
            "Emp_ID": Emp_ID,
            "arr_dtm_id": arr_dtm_id,
            "arr_radio": arr_radio

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
    window.location = "<?php echo base_url(); ?>/ev_form_AP/Evs_form_AP/index";
}
function show_weight_mhrd() {
    var arr_weight_1 = [];
    var arr_weight_2 = [];
    var sum_1 = 0;
    var sum_2 = 0;
    var index = document.getElementById("table_index_radio_mhrd").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_mhrd_1_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight_1.push(document.getElementsByName("rd_mhrd_1_" + i + "")[index].value);
            } //if
        });

        $("[name = rd_mhrd_2_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight_2.push(document.getElementsByName("rd_mhrd_2_" + i + "")[index].value);
            } //if
        });
    }

    for (i = 0; i < index; i++) {
        sum_1 += parseInt(arr_weight_1[i]);
        sum_2 += parseInt(arr_weight_2[i]);
    }
    document.getElementById("weight_all_mhrd_1").innerHTML = sum_1;
    document.getElementById("weight_all_mhrd_2").innerHTML = sum_2;
}

function save_mhrd() {
   
    var arr_sfi_id = [];
    var arr_weight_1 = [];
    var arr_weight_2 = [];
    var get_arr_sfi_id = "";
    var Emp_ID = document.getElementById("Emp_ID").value;

    var index = document.getElementById("table_index_radio").value;
    for (i = 0; i < index; i++) {
        arr_sfi_id.push(document.getElementsByName("sfi_id")[i].value);
        $("[name = rd_name_1_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight_1.push(document.getElementsByName("rd_name_1_" + i + "")[index].value);
            } //if
        });

        $("[name = rd_name_2_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight_2.push(document.getElementsByName("rd_name_2_" + i + "")[index].value);
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
        url: "<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/save_mhrd",
        data: {
            "Emp_ID": Emp_ID,
            "arr_sfi_id": arr_sfi_id,
            "arr_radio_1": arr_weight_1,
            "arr_radio_2": arr_weight_2
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
    window.location = "<?php echo base_url(); ?>/ev_form_AP/Evs_form_AP/index";
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
                    <?php foreach($emp_info->result() as $row){?>
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

                    <div class="tab-pane" id="MBO">
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
                            $table_index_radio_mbo = 0;
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
                                        <input type="number" name="weing_mbo_<?php echo $table_index_radio_mbo ?>"
                                            value="<?php echo $row->dtm_weight; ?>" hidden>
                                    </td>
                                    <td id="dis_color">
                                        <center>
                                            <div class="col-md-12">
                                                <input type="radio" name="rd_mbo_<?php echo $table_index_radio_mbo ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo ?>" value="1"
                                                    onclick="show_weight_mbo()">
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_mbo_<?php echo $table_index_radio_mbo ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo ?>" value="2"
                                                    onclick="show_weight_mbo()">
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_mbo_<?php echo $table_index_radio_mbo ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo ?>" value="3"
                                                    onclick="show_weight_mbo()" checked>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_mbo_<?php echo $table_index_radio_mbo ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo ?>" value="4"
                                                    onclick="show_weight_mbo()">
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_mbo_<?php echo $table_index_radio_mbo ?>"
                                                    id="rd_<?php echo $table_index_radio_mbo ?>" value="5"
                                                    onclick="show_weight_mbo()">
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>

                                            <!-- col-12 -->

                                        </center>
                                    </td>
                                    <td id="dis_color" width="2%">
                                        <p id="weight_mbo_<?php echo $table_index_radio_mbo ?>"></p>
                                    </td>
                                    <?php $table_index_radio_mbo++;  ?>
                                </tr>
                                <input type="text" name="dtm_id" value="<?php echo $row->dtm_id; ?>" hidden>
                                <?php  };?>
                                <input type="text" id="table_index_radio_mbo"
                                    value="<?php echo $table_index_radio_mbo; ?>" hidden>



                            </tbody>
                            <!-- tbody -->
                            <tfoot>
                                <tr>
                                    <td colspan="3" align="right"><b>Total Weight</b></td>
                                    <td id="show_weight" align="center">100</td>
                                    <td colspan="2">
                                        <p id="weight_all_mbo">
                                    </td>
                                </tr>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- table -->
                        <hr>

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url() ?>ev_form_AP/Evs_form_AP/index">
                                    <button class="btn btn-inverse" id="btn_cencel_back">BACK</button>
                                </a>
                                <!-- cancel to back to main  -->

                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">
                                <button class="btn btn-success" onclick="save_MBO()"> Save</button>
                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 1 -->

                    <div class="tab-pane" id="G_O">
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
                                $table_index_radio_g_o = 0;
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
                                    <input type="number" name="weing_g_o_<?php echo $table_index_radio_g_o ?>"
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
                                    <input type="number" name="weing_g_o_<?php echo $table_index_radio_g_o ?>"
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
                                    <td rowspan="<?php echo $col[$spans] ?>"><textarea class="form-control" type="text"
                                            name="Evaluator_Review" placeholder="Enter Evaluator Review"></textarea>
                                    </td>
                                    <td rowspan="<?php echo $col[$spans] ?>">
                                        <center>
                                            <div class="col-md-12">
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="1"
                                                    onclick="show_weight_g_and_o()">
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="2"
                                                    onclick="show_weight_g_and_o()">
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="3"
                                                    onclick="show_weight_g_and_o()" checked>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="4"
                                                    onclick="show_weight_g_and_o()">
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="5"
                                                    onclick="show_weight_g_and_o()">
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <input type="text" name="dgo_id" value="<?php echo $row->dgo_id; ?>" hidden>
                                    <?php 
                                $spans++;
                                $temps = $row->dgo_item;
                                $table_index_radio_g_o++;  
                                } 
                                // if 
                                else if($temps != $row->dgo_item){ ?>
                                    <td rowspan="<?php echo $col[$spans] ?>"><?php echo $row->dgo_self_review; ?></td>
                                    <td rowspan="<?php echo $col[$spans] ?>"><textarea class="form-control" type="text"
                                            name="Evaluator_Review" placeholder="Enter Evaluator Review"></textarea>
                                    </td>
                                    <td rowspan="<?php echo $col[$spans] ?>">
                                        <center>
                                            <div class="col-md-12">
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="1"
                                                    onclick="show_weight_g_and_o()">
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="2"
                                                    onclick="show_weight_g_and_o()">
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="3"
                                                    onclick="show_weight_g_and_o()" checked>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="4"
                                                    onclick="show_weight_g_and_o()">
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;
                                                <input type="radio" name="rd_g_o_<?php echo $table_index_radio_g_o ?>"
                                                    id="rd_<?php echo $table_index_radio_g_o ?>" value="5"
                                                    onclick="show_weight_g_and_o()">
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <input type="text" name="dgo_id" value="<?php echo $row->dgo_id; ?>" hidden>
                                    <?php
                                $spans++;
                                $temps = $row->dgo_item;
                                $table_index_radio_g_o++;
                                } 
                                // else if
                                ?>

                                </tr>
                                <!-- end tr  -->

                                <?}
                            // foreach
                            ?>
                                <input type="text" id="table_index_radio_g_o"
                                    value="<?php echo $table_index_radio_g_o; ?>" hidden>
                            </tbody>
                            <!-- tbody  -->

                            <tfoot>
                                <td colspan="4">
                                </td>
                                <td>
                                    <p id="weight_all_g_o">
                                </td>
                                <td colspan="3"></td>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- End table level -->

                        <br>
                        <!-- show_approver G_O-->

                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url() ?>ev_form_AP/Evs_form_AP/index">
                                    <button class="btn btn-inverse" id="btn_cencel_back">BACK</button>
                                </a>
                                <!-- cancel to back to main  -->

                            </div>
                            <!-- col-md-6 -->

                            <div class="col-md-6" align="right">
                                <button class="btn btn-success" onclick="save_G_and_O()"> Save</button>
                            </div>
                            <!-- col-md-6 add_app -->

                        </div>
                        <!-- row -->

                    </div>
                    <div class="tab-pane" id="MHRD">
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
                            
                            $table_index_radio_mhrd = 0;

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
                                            <div class="col-md-12">
                                                <input type="radio" name="rd_mhrd_1_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_1_<?php echo $table_index_radio_mhrd ?>" value="1"
                                                    onclick="show_weight_mhrd()">
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;
                                                <input type="radio" name="rd_mhrd_1_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_1_<?php echo $table_index_radio_mhrd ?>" value="2"
                                                    onclick="show_weight_mhrd()">
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;
                                                <input type="radio" name="rd_mhrd_1_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_1_<?php echo $table_index_radio_mhrd ?>" value="3"
                                                    onclick="show_weight_mhrd()" checked>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;
                                                <input type="radio" name="rd_mhrd_1_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_1_<?php echo $table_index_radio_mhrd ?>" value="4"
                                                    onclick="show_weight_mhrd()">
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;
                                                <input type="radio" name="rd_mhrd_1_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_1_<?php echo $table_index_radio_mhrd ?>" value="5"
                                                    onclick="show_weight_mhrd()">
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="col-md-12">
                                                <input type="radio" name="rd_mhrd_2_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_2_<?php echo $table_index_radio_mhrd ?>" value="1"
                                                    onclick="show_weight_mhrd()">
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;
                                                <input type="radio" name="rd_mhrd_2_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_2_<?php echo $table_index_radio_mhrd ?>" value="2"
                                                    onclick="show_weight_mhrd()">
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;
                                                <input type="radio" name="rd_mhrd_2_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_2_<?php echo $table_index_radio_mhrd ?>" value="3"
                                                    onclick="show_weight_mhrd()" checked>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;
                                                <input type="radio" name="rd_mhrd_2_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_2_<?php echo $table_index_radio_mhrd ?>" value="4"
                                                    onclick="show_weight_mhrd()">
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;
                                                <input type="radio" name="rd_mhrd_2_<?php echo $table_index_radio_mhrd ?>"
                                                    id="rd_name_2_<?php echo $table_index_radio_mhrd ?>" value="5"
                                                    onclick="show_weight_mhrd()">
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                </tr>

                                <?php 
                        $table_index_radio_mhrd++;    
                        }
                        // for 
                                 ?>
                                <input type="text" id="table_index_radio_mhrd" value="<?php echo $table_index_radio_mhrd; ?>"
                                    hidden>

                            </tbody>
                            <!-- tbody  -->

                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p id="weight_all_mhrd_1">
                                </td>
                                <td>
                                    <p id="weight_all_mhrd_2">
                                </td>
                            </tfoot>
                            <!-- tfoot -->
                        </table>
                        <!-- End table level -->

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo base_url() ?>ev_form_AP/Evs_form_AP/index">
                                    <button class="btn btn-inverse" id="btn_cencel_back">BACK</button>
                                </a>
                                <!-- cancel to back to main  -->
                                <div class="col-md-6" align="right">
                                    <button class="btn btn-success" onclick="save_mhrd()"> Save</button>
                                </div>
                                <!-- col-md-6 add_app -->
                            </div>
                        </div>
                        <!-- row -->
                    </div>
                    <div class="tab-pane" id="ACM">
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
                                    $table_index_radio_acm = 0;
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
                                        <input type="number" name="weing_acm_<?php echo $table_index_radio_acm ?>"
                                            value="<?php echo $row->sfa_weight; ?>" hidden>
                                    </td>

                                    <!-- show weight  -->
                                    <td id="dis_color" width="5%">
                                        <center>
                                            <div class="col-md-12">
                                                <input type="radio" name="rd_acm_<?php echo $table_index_radio_acm ?>"
                                                    id="rd_<?php echo $table_index_radio_acm ?>" value="1"
                                                    onclick="show_weight_acm()">
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_acm_<?php echo $table_index_radio_acm ?>"
                                                    id="rd_<?php echo $table_index_radio_acm ?>" value="2"
                                                    onclick="show_weight_acm()">
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_acm_<?php echo $table_index_radio_acm ?>"
                                                    id="rd_<?php echo $table_index_radio_acm ?>" value="3"
                                                    onclick="show_weight_acm()" checked>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_acm_<?php echo $table_index_radio_acm ?>"
                                                    id="rd_<?php echo $table_index_radio_acm ?>" value="4"
                                                    onclick="show_weight_acm()">
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_acm_<?php echo $table_index_radio_acm ?>"
                                                    id="rd_<?php echo $table_index_radio_acm ?>" value="5"
                                                    onclick="show_weight_acm()">
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <td id="dis_color" width="2%">
                                        <p id="weight_acm_<?php echo $table_index_radio_acm ?>"></p>
                                    </td>
                                    <?php $table_index_radio_acm++;  ?>
                                </tr>

                                <?php
                                    }
                                    // end foreach
                                ?>
                            </tbody>
                            <!-- tbody -->
                            <input type="text" id="table_index_radio_acm" value="<?php echo $table_index_radio_acm; ?>"
                                hidden>
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
                                        <p id="weight_all_acm">
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
                                <a href="<?php echo base_url(); ?>/ev_form_AP/Evs_form_AP/index">
                                    <button type="button" class="btn btn-inverse"><i
                                            class="fa fa-mail-reply"></i>Back</button>
                                </a>
                            </div>
                            <!-- col-md-6 -->
                            <div class="col-md-6" align="right">
                                <button class="btn btn-success" onclick="save_ACM()"> Save</button>
                            </div>
                        </div>
                        <!-- row -->

                    </div>
                    <!-- form 2-1 -->
                    <div class="tab-pane" id="GCM">
                        <table class="table table-bordered table-striped m-n" >
                            <thead >
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
                                    $table_index_radio_gcm = 0;
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
                                        <input type="number" name="weing_gcm_<?php echo $table_index_radio_gcm ?>"
                                            value="<?php echo $row->sgc_weight; ?>" hidden>
                                    </td>

                                    <!-- show weight  -->
                                    <td id="dis_color" width="5%">
                                        <center>
                                            <div class="col-md-12">
                                                <input type="radio" name="rd_gcm_<?php echo $table_index_radio_gcm ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm ?>" value="1"
                                                    onclick="show_weight_gcm()">
                                                <label for="1">&nbsp; 1</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_gcm_<?php echo $table_index_radio_gcm ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm ?>" value="2"
                                                    onclick="show_weight_gcm()">
                                                <label for="2">&nbsp; 2</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_gcm_<?php echo $table_index_radio_gcm ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm ?>" value="3"
                                                    onclick="show_weight_gcm()" checked>
                                                <label for="3">&nbsp; 3</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_gcm_<?php echo $table_index_radio_gcm ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm ?>" value="4"
                                                    onclick="show_weight_gcm()">
                                                <label for="4">&nbsp; 4</label>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="rd_gcm_<?php echo $table_index_radio_gcm ?>"
                                                    id="rd_<?php echo $table_index_radio_gcm ?>" value="5"
                                                    onclick="show_weight_gcm()">
                                                <label for="5">&nbsp; 5</label>
                                                &nbsp;&nbsp;
                                            </div>
                                            <!-- col-12 -->
                                        </center>
                                    </td>
                                    <td id="dis_color" width="2%">
                                        <p id="weight_gcm_<?php echo $table_index_radio_gcm ?>"></p>
                                    </td>
                                    <?php $table_index_radio_gcm++;  ?>
                                </tr>

                                <?php
                                    }
                                    // end foreach
                                ?>
                            </tbody>
                            <!-- tbody -->
                            <input type="text" id="table_index_radio_gcm" value="<?php echo $table_index_radio_gcm; ?>"
                                hidden>
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
                                        <p id="weight_all_gcm">
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
                                <a href="<?php echo base_url(); ?>/ev_form_AP/Evs_form_AP/index">
                                    <button type="button" class="btn btn-inverse"><i
                                            class="fa fa-mail-reply"></i>Back</button>
                                </a>
                            </div>
                            <!-- col-md-6 -->
                            <div class="col-md-6" align="right">
                                <button class="btn btn-success" onclick="save_GCM()"> Save</button>
                            </div>
                        </div>
                        <!-- row -->
                    </div>
                </div>
            </div>
            <!-- *************************************************-->


            <!-- tab-content -->
        </div>
        <!-- body -->
    </div>
    <!-- panel-indigo -->
</div>
<!-- col-12 -->
</div>
<!-- row -->