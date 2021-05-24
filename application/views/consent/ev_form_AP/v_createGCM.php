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
    show_weight()

});
// document ready

function show_weight() {
    var arr_weight = [];
    var sum = 0;
    var index = document.getElementById("table_index_radio").value;
    for (i = 0; i < index; i++) {

        $("[name = rd_name_" + i + "]").each(function(index) {
            if ($(this).prop("checked") == true) {
                arr_weight.push(document.getElementsByName("rd_name_" + i + "")[index].value);
            } //if
        });
    }
    for (i = 0; i < index; i++) {
        document.getElementById("weight_" + i + "").innerHTML = arr_weight[i] * document.getElementsByName("weing_a_" +
            i + "")[0].value;
        sum += arr_weight[i] * document.getElementsByName("weing_a_" + i + "")[0].value;
    }
    document.getElementById("weight_all").innerHTML = sum;
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
        url: "<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/save_data_acm",
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
</script>
<!-- script -->



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo">
            <div class="panel-heading" height="50px">
                <h2 id="tabmenu"> Form </h2>
            </div>
            <!-- heading -->

            <div class="panel-body">

                <div class="tab-pane" id="GCM">
                    <br>
                    <?php foreach($emp_info->result() as $row){?>

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
                                    $table_index_radio = 0;
                                    // start foreach
                                    foreach($info_gcm_form->result() as $row){
                                ?>
                            <input type="text" name="sgc_id" value="<?php echo $row->sgc_id; ?>" hidden>
                            <!-- save index table_index_radio-->

                            <tr>
                                <td id="dis_color">
                                    <center><?php echo $index_acm++; ?></center>
                                </td>
                                <td id="dis_color">
                                    <?php echo $row->cpg_competency_detail_en . "<br><font color='blue'>" . $row->cpg_competency_detail_th ."</font>"; ?>
                                </td>
                                <!-- show competency  -->
                                <td id="dis_color">
                                    <?php foreach($info_expected->result() as $row_epg){ 
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
                                    <?php foreach($info_expected->result() as $row_epg){ 
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
                                    <input type="number" name="weing_a_<?php echo $table_index_radio ?>"
                                        value="<?php echo $row->sgc_weight; ?>" hidden>
                                </td>

                                <!-- show weight  -->
                                <td id="dis_color" width="5%">
                                    <center>
                                        <div class="col-md-12">
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="1"
                                                onclick="show_weight()">
                                            <label for="1">&nbsp; 1</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="2"
                                                onclick="show_weight()">
                                            <label for="2">&nbsp; 2</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="3"
                                                onclick="show_weight()" checked>
                                            <label for="3">&nbsp; 3</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="4"
                                                onclick="show_weight()">
                                            <label for="4">&nbsp; 4</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="5"
                                                onclick="show_weight()">
                                            <label for="5">&nbsp; 5</label>
                                            &nbsp;&nbsp;
                                        </div>
                                        <!-- col-12 -->
                                    </center>
                                </td>
                                <td id="dis_color" width="2%">
                                    <p id="weight_<?php echo $table_index_radio ?>"></p>
                                </td>
                                <?php $table_index_radio++;  ?>
                            </tr>

                            <?php
                                    }
                                    // end foreach
                                ?>
                        </tbody>
                        <!-- tbody -->
                        <input type="text" id="table_index_radio" value="<?php echo $table_index_radio; ?>" hidden>
                        <!-- save index table_index_radio-->

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
                                    <p id="weight_all">
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
                <!-- form 2-1 -->

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