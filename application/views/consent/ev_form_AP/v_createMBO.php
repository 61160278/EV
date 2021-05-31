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
    //window.location = "<?php echo base_url(); ?>/ev_form_AP/Evs_form_AP/index";
}
</script>
<!-- script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading" height="50px">
                <h2 id="tabmenu"> Form </h2>
                <div id="tabmenu">
                </div>
            </div>
            <!-- heading -->

            <div class="panel-body">

                <div class="tab-pane" id="MBO">
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
                            <?php 
                            $table_index_radio = 0;
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
                                         <input type="number" name="weing_a_<?php echo $table_index_radio ?>"
                                        value="<?php echo $row->dtm_weight; ?>" hidden>
                                </td>
                                <td id="dis_color">
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
                            <input type="text" name="dtm_id" value="<?php echo $row->dtm_id; ?>" hidden>
                            <?php  };?>
                            <input type="text" id="table_index_radio" value="<?php echo $table_index_radio; ?>" hidden>
                    


                        </tbody>
                        <!-- tbody -->
                        <tfoot>
                            <tr>
                                <td colspan="3" align="right"><b>Total Weight</b></td>
                                <td id="show_weight" align="center">100</td>
                                <td colspan="2">
                                    <p id="weight_all">
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
                            <a href="<?php echo base_url() ?>ev_form/Evs_form_AP/index">
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


            </div>
            <!-- body -->
        </div>
        <!-- panel-indigo -->
    </div>
    <!-- col-12 -->
</div>
<!-- row -->