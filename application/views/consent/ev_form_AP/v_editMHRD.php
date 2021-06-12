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
$(document).ready(function() {
    show_weight()
});
// document ready

function show_weight() {
    var arr_weight_1 = [];
    var arr_weight_2 = [];
    var sum_1 = 0;
    var sum_2 = 0;
    var index = document.getElementById("table_index_radio").value;
    for (i = 0; i < index; i++) {

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

    for (i = 0; i < index; i++) {
        sum_1 += parseInt(arr_weight_1[i]);
        sum_2 += parseInt(arr_weight_2[i]);
    }
    document.getElementById("weight_all_1").innerHTML = sum_1;
    document.getElementById("weight_all_2").innerHTML = sum_2;
}

function update_mhrd() {
   
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
        url: "<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/update_mhrd",
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
    //window.location = "<?php echo base_url(); ?>/ev_form_AP/Evs_form_AP/index";
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


                    <!-- form 1-2 -->

                    <!-- ************************************************************************************ -->


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
                            
                            $table_index_radio = 0;

                            foreach($info_mhrd->result() as $index => $row){ ?>
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
              

                                   foreach($data_mhrd->result() as $row_data_mhrd){
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
                                            <input type="radio" name="rd_name_1_<?php echo $table_index_radio ?>"
                                                id="rd_name_1_<?php echo $table_index_radio ?>" value="1"
                                                onclick="show_weight()" <?php echo $checked_weight_1_1 ?>>
                                            <label for="1">&nbsp; 1</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_1_<?php echo $table_index_radio ?>"
                                                id="rd_name_1_<?php echo $table_index_radio ?>" value="2"
                                                onclick="show_weight()" <?php echo $checked_weight_1_2 ?>>
                                            <label for="2">&nbsp; 2</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_1_<?php echo $table_index_radio ?>"
                                                id="rd_name_1_<?php echo $table_index_radio ?>" value="3"
                                                onclick="show_weight()" <?php echo $checked_weight_1_3 ?>>
                                            <label for="3">&nbsp; 3</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_1_<?php echo $table_index_radio ?>"
                                                id="rd_name_1_<?php echo $table_index_radio ?> " value="4"
                                                onclick="show_weight()" <?php echo $checked_weight_1_4 ?>>
                                            <label for="4">&nbsp; 4</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_1_<?php echo $table_index_radio ?>"
                                                id="rd_name_1_<?php echo $table_index_radio ?>" value="5"
                                                onclick="show_weight()" <?php echo $checked_weight_1_5 ?>>
                                            <label for="5">&nbsp; 5</label>
                                            &nbsp;&nbsp;
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
             
                                    foreach($data_mhrd->result() as $row_data_mhrd){
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
                                            <input type="radio" name="rd_name_2_<?php echo $table_index_radio ?>"
                                                id="rd_name_2_<?php echo $table_index_radio ?>" value="1"
                                                onclick="show_weight()" <?php echo $checked_weight_2_1 ?>>
                                            <label for="1">&nbsp; 1</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_2_<?php echo $table_index_radio ?>"
                                                id="rd_name_2_<?php echo $table_index_radio ?>" value="2"
                                                onclick="show_weight()" <?php echo $checked_weight_2_2 ?>>
                                            <label for="2">&nbsp; 2</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_2_<?php echo $table_index_radio ?>"
                                                id="rd_name_2_<?php echo $table_index_radio ?>" value="3"
                                                onclick="show_weight()" <?php echo $checked_weight_2_3 ?>>
                                            <label for="3">&nbsp; 3</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_2_<?php echo $table_index_radio ?>"
                                                id="rd_name_2_<?php echo $table_index_radio ?> " value="4"
                                                onclick="show_weight()" <?php echo $checked_weight_2_4 ?>>
                                            <label for="4">&nbsp; 4</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="rd_name_2_<?php echo $table_index_radio ?>"
                                                id="rd_name_2_<?php echo $table_index_radio ?>" value="5"
                                                onclick="show_weight()" <?php echo $checked_weight_2_5 ?>>
                                            <label for="5">&nbsp; 5</label>
                                            &nbsp;&nbsp;
                                        </div>
                                        <!-- col-12 -->

                                    </center>
                                </td>
                            </tr>

                            <?php 
                        $table_index_radio++;    
                        }
                        // for 
                                 ?>
                            <input type="text" id="table_index_radio" value="<?php echo $table_index_radio; ?>" hidden>

                        </tbody>
                        <!-- tbody  -->

                        <tfoot>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ><p id="weight_all_1"></td>
                        <td ><p id="weight_all_2"></td>
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
                            <button class="btn btn-success" onclick="update_mhrd()"> Save</button>
                        </div>
                        <!-- col-md-6 add_app --> 
                    </div>
                    <!-- row -->





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