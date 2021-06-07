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

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
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

        sum += arr_weight[i] * document.getElementsByName("weing_a_" + i + "")[0].value;
    }
    document.getElementById("weight_all").innerHTML = sum;
}

function update_G_and_O() {
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
        url: "<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/update_data_g_and_o",
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

                <br>
                <?php foreach($emp_info->result() as $row){?>
                <input type="text" id="pos_id" value="<?php echo $row->Position_ID; ?>" hidden>
                <input type="text" id="Emp_ID" value="<?php echo $row->emp_id; ?>" hidden>
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
                                $table_index_radio = 0;
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
                            <input type="number" name="weing_a_<?php echo $table_index_radio ?>"
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
                            <input type="number" name="weing_a_<?php echo $table_index_radio ?>"
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

                                    foreach($data_g_and_o->result() as $row_data_g_and_o){
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
                                    name="Evaluator_Review" placeholder="Enter Evaluator Review"><?php echo $evaluator_review ?></textarea></td>
                             <td rowspan="<?php echo $col[$spans] ?>">
                            <center>                                
                                        <div class="col-md-12">
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="1"
                                                onclick="show_weight()" <?php echo $checked_weight_1 ?>>
                                            <label for="1">&nbsp; 1</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="2"
                                                onclick="show_weight()" <?php echo $checked_weight_2 ?>>
                                            <label for="2">&nbsp; 2</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="3"
                                                onclick="show_weight()" <?php echo $checked_weight_3 ?>>
                                            <label for="3">&nbsp; 3</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?> " value="4"
                                                onclick="show_weight()" <?php echo $checked_weight_4 ?>>
                                            <label for="4">&nbsp; 4</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="5"
                                                onclick="show_weight()" <?php echo $checked_weight_5 ?>>
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
                                $table_index_radio++;  
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

                                    foreach($data_g_and_o->result() as $row_data_g_and_o){
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
                                    name="Evaluator_Review" placeholder="Enter Evaluator Review"><?php echo $evaluator_review ?></textarea></td>
                            <td rowspan="<?php echo $col[$spans] ?>">
                            <center>
                          
                                        <div class="col-md-12">
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="1"
                                                onclick="show_weight()" <?php echo $checked_weight_1 ?>>
                                            <label for="1">&nbsp; 1</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="2"
                                                onclick="show_weight()" <?php echo $checked_weight_2 ?>>
                                            <label for="2">&nbsp; 2</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="3"
                                                onclick="show_weight()" <?php echo $checked_weight_3 ?>>
                                            <label for="3">&nbsp; 3</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?> " value="4"
                                                onclick="show_weight()" <?php echo $checked_weight_4 ?>>
                                            <label for="4">&nbsp; 4</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_<?php echo $table_index_radio ?>"
                                                id="rd_<?php echo $table_index_radio ?>" value="5"
                                                onclick="show_weight()" <?php echo $checked_weight_5 ?>>
                                            <label for="5">&nbsp; 5</label>
                                            &nbsp;&nbsp;
                                        </div>
                                        <!-- col-12 -->

                                    </center>
                            </td>
                            <input type="text" name="dgo_id" value="<?php echo $row->dgo_id; ?>" hidden >
                            <?php
                                $spans++;
                                $temps = $row->dgo_item;
                                $table_index_radio++;
                                } 
                                // else if
                                ?>

                        </tr>
                        <!-- end tr  -->
                        
                        <?}
                            // foreach
                            ?>
                        <input type="text" id="table_index_radio" value="<?php echo $table_index_radio; ?>" hidden>
                    </tbody>
                    <!-- tbody  -->

                    <tfoot>
                        <td colspan="4">
                            <input type="text" id="row_count" value="0" hidden>
                            <input type="text" id="row_count_level" value="0" hidden>
                        </td>
                        <td>
                            <p id="weight_all">
                        </td>
                        <td colspan="3"></td>
                    </tfoot>
                    <!-- tfoot -->
                </table>
                <!-- End table level -->

                <br>
                <div id="show_approverG_O">
                </div>
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
                        <button class="btn btn-success" onclick="update_G_and_O()"> Save</button>
                    </div>
                    <!-- col-md-6 add_app -->

                </div>
                <!-- row -->



            </div>
            <!-- row -->


            <!-- form 1-2 -->

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