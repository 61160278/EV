<?php
/*
* v_indicator_gcm_insert
* Add Indicator of Ability 
* @input   -
* @output  -
* @author  Piyasak Srijan
* @Create Date 2563-09-01
*/

/*
* v_indicator_gcm_insert
* Add Indicator of Ability 
* @input   -
* @output  -  
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/

/*
* v_indicator_gcm_insert
* Add Indicator of Ability 
* @input   -
* @output  -
* @author Pondruthai Loekngam
* @Update Date 2563-09-26
*/
/*
* v_indicator_gcm_insert
* Add Indicator of Ability 
* @input   -
* @output  -
* @author Jakkarin Pimpaeng
* @Update Date 2563-12-03
*/
?>
<!-- Start Script -->
<script>
var index = 1; //index table
var index_position = 1; //index position
var chack_insert_component = 0; //chack component one use
var arr_save_index_arr_add_pos = [];
$(document).ready(function() {

    arr_save_index_arr_add_pos.push(index - 1);
    $("#addExpected").hide();
    $("#btn_mange").hide();
    console.log(arr_save_index_arr_add_pos);
    $("#addExpected").click(function() {
        index++;
        arr_save_index_arr_add_pos.push(index - 1);
        console.log(arr_save_index_arr_add_pos);
        $('#tr_Expected').append(
            '<div id="row_expected' + index + '">' +
            '<!-- Start insert expected  -->' +
            '<div class="row">' +
            '<div class="col-6">' +
            '<div class="row">' +
            '<div class="col-4" align="right">' +
            '<label for="textarea-input" class=" form-control-label">Expected Behavior EN :</label>' +
            '</div>' +
            '<div class="col-8"><textarea name="arr_add_expected_en" id="text_expected_' + index +
            '" rows="2"' +
            'placeholder="Enter Expected" class="form-control" style="resize: none"required></textarea>' +
            '</div>' +
            '</div>' +
            '<!-- row -->' +
            '</div>' +
            '<!-- col-6-1  -->' +
            '<div class="col-6">' +
            '<div class="row">' +
            '<div class="col-4" align="right">' +
            '<label for="textarea-input" class=" form-control-label">Expected Behavior TH :</label>' +
            '</div>' +
            '<!-- col-4  -->' +
            '<div class="col-8"><textarea name="arr_add_expected_th" id="text_expected_' + index +
            '" rows="2"' +
            'placeholder="Enter Expected" class="form-control" style="resize: none" required></textarea>' +
            '</div>' +
            '<!-- col-8  -->' +
            '</div>' +
            '<!-- row -->' +
            '</div>' +
            '<!-- col-6-2  -->' +
            '</div>' +
            '<!-- row  -->' +
            '<br>' +
            '<div class="row">' +
            '<div class="col-6">' +
            '<div class="row">' +
            '<div class="col-4">' +
            '<label for="textarea-input" class=" form-control-label">Target Level : </label>' +
            '</div>' +
            '<!-- col-4  -->' +
            '<div class="col-8">' +
            '<select class="form-control" id="arr_add_point" name="arr_add_point">' +
            '<option value="P1">P1</option>' +
            '<option value="P2">P2</option>' +
            '<option value="C/M3">C/M3</option>' +
            '</select>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<br>' +
            '<!-- End input Identification -->' +
            '<!-- Start input position  -->' +
            '<div class="row">' +
            '<div class="col-6">' +
            '<div class="row">' +
            '<div class="col-4" align="right">' +
            '<label for="textarea-input" class=" form-control-label">Position level:</label>' +
            '</div>' +
            '<!-- col-4  -->' +
            '<div class="col-8">' +
            '<select id="pos_lv_' + index + '" class="form-control" onchange="pos_level(id)">' +
            '<option>Select position level</option>' +
            '<option value="1">Top Management</option>' +
            '<option value="2">Middle Management</option>' +
            '<option value="3">Junior Management</option>' +
            '<option value="4">Staff</option>' +
            '<option value="5">Officer</option>' +
            '</select>' +
            '</div>' +
            '<!-- seclect position level  -->' +
            '</div>' +
            '<!-- row  -->' +
            '</div>' +
            '<!-- col-6  -->' +
            '<div class="col-6" id="add_table_' + index + '">' +
            '</div>' +

            '</div>' +
            '<br>' +
            '<div  id="tr_Position_' + index + '">' +
            '</div>' +
            '<div class="col-12" class="row">' +
            '<div  align="right">' +
            '<button type="button" class="btn btn-success float-center" id="addPostion' + index +
            '" value = "' + index + '" ><i class="fa fa-plus"></i> Position</button>' +
            '</div>' +
            '</div>' +
            '<br>' +
            '<div class="col=md-6" class="row">' +
            '<div  align="right">' +
            '<button type="button" name="remove" id="' + index +
            '" class="btn btn-danger btn_remove">' +
            '<i class="fa fa-times">&nbsp; Delete</i></button>' +
            '</div>' +
            '</div>' +
            '<br>' +
            '<hr>' +
            '</div>' +
            '</div>'

        );

        $('#addPostion' + index).click(function() {
            $('#tr_Position_' + $(this).attr("value") + '').append(
                '<input type= "hidden" id = "id_index' + index_position + '" value = "' + $(
                    this).attr(
                    "value") + '">' +
                '<div id="row_position' + index_position + '">' +
                '<!-- Start input position  -->' +
                '<div class="row">' +
                '<div class="col-6">' +
                '<div class="row">' +
                '<div class="col-4" align="right">' +
                '<label for="textarea-input" class=" form-control-label">Position level:</label>' +
                '</div>' +
                '<!-- col-4  -->' +
                '<div class="col-8">' +
                '<select id="pos_lv_add_' + index_position +
                '" class="form-control" onchange="pos_level_add(id)">' +
                '<option>Select position level</option>' +
                '<option value="1">Top Management</option>' +
                '<option value="2">Middle Management</option>' +
                '<option value="3">Junior Management</option>' +
                '<option value="4">Staff</option>' +
                '<option value="5">Officer</option>' +
                '</select>' +
                '</div>' +
                '<!-- seclect position level  -->' +
                '</div>' +
                '<!-- row  -->' +
                '</div>' +
                '<!-- col-6  -->' +
                '<div class="col-5" id="add_table_position_' + index_position + '">' +
                '</div>' +
                '<div class="col-1" >' +
                '<button type="button" name="remove" id="' + index_position +
                '" class="btn btn-danger btn_remove_position">' +
                '<i class="fa fa-times"></i></button>' +
                '</div>' +
                '<!-- include form function add_pos_level -->' +
                '</div>' +
                '<!-- row  -->' +
                '<!-- End insert expected  -->' +
                '<br>' +
                '</div>'
            );
            index_position++;

        }); // add Postion

    }); // add expected

    $("#addPostion").click(function() {
        $('#tr_Position_' + $(this).attr("value") + '').append(
            '<input type= "hidden" id = "id_index' + index_position + '" value = "' + $(this).attr(
                "value") + '">' +
            '<div id="row_position' + index_position + '">' +
            '<!-- Start input position  -->' +
            '<div class="row">' +
            '<div class="col-6">' +
            '<div class="row">' +
            '<div class="col-4" align="right">' +
            '<label for="textarea-input" class=" form-control-label">Position level:</label>' +
            '</div>' +
            '<!-- col-4  -->' +
            '<div class="col-8">' +
            '<select id="pos_lv_add_' + index_position +
            '" class="form-control" onchange="pos_level_add(id)">' +
            '<option>Select position level</option>' +
            '<option value="1">Top Management</option>' +
            '<option value="2">Middle Management</option>' +
            '<option value="3">Junior Management</option>' +
            '<option value="4">Staff</option>' +
            '<option value="5">Officer</option>' +
            '</select>' +
            '</div>' +
            '<!-- seclect position level  -->' +
            '</div>' +
            '<!-- row  -->' +
            '</div>' +
            '<!-- col-6  -->' +
            '<div class="col-5" id="add_table_position_' + index_position + '">' +
            '</div>' +
            '<div class="col-1" >' +
            '<button type="button" name="remove" id="' + index_position +
            '" class="btn btn-danger btn_remove_position">' +
            '<i class="fa fa-times"></i></button>' +
            '</div>' +
            '<!-- include form function add_pos_level -->' +
            '</div>' +
            '<!-- row  -->' +
            '<!-- End insert expected  -->' +
            '<br>' +
            '</div>'

        );
        index_position++;

    }); // add Postion

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        console.log("button : " + button_id);
        for (i = 0; i < arr_save_index_arr_add_pos.length; i++) {
            chack_arr = parseInt(arr_save_index_arr_add_pos[i])
            console.log("chack_arr : " + (chack_arr));
            if (parseInt(chack_arr) == parseInt(button_id) - 1) {
                arr_save_index_arr_add_pos.splice(i, 1);
            }
            console.log("inx_i : " + arr_save_index_arr_add_pos[i]);
        }
        console.log(arr_save_index_arr_add_pos);
        $('#row_expected' + button_id + '').remove();

    }); //delect expected

    $(document).on('click', '.btn_remove_position', function() {
        var button_id = $(this).attr("id");
        $('#row_position' + button_id + '').remove();

    }); //delect expected

    $(document).on('click', '.table_remove', function() {
        var button_id = $(this).attr("id");
        $('#row_table' + button_id + '').remove();


    });
    $(document).on('click', '.disabled_component', function() {
        document.getElementById("disabled_input_Competency_en").disabled =
            true; //disabled Competency en because not edit
        document.getElementById("disabled_input_Competency_th").disabled =
            true; //disabled Competency th because not edit
        document.getElementById("disabled_input_Definition_en").disabled =
            true; //disabled Definition th because not edit
        document.getElementById("disabled_input_Definition_th").disabled =
            true; //disabled Definition th because not edit
        if (chack_insert_component == 0) {
            insert_data_component();
            chack_insert_component++;
        }
    });


    $("#back_acm").click(function() {
        console.log("Clear data");
        clear_data_componet();
    });
    //  clear_data_componet



});

<?php
/*
* insert_data_key_component_and_expected_behavior
* manage indicator
* @input  - 
* @output add data component for table 
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/
?>
var index_table = 1; //index table
var index_arr_add_pos = 1; //create next table


function insert_data_key_component_and_expected_behavior() {
    table_data = ""; // set table

    arr_save_expected_en_todatabase = []; //save expected en to database
    arr_save_expected_th_todatabase = []; //save expected th to database
    arr_save_posittion_to_database = []; //save posittion to database
    arr_save_posittion_other_to_database = [];
    arr_save_point_to_database = [];


    save_key_component_en_todatabase = document.getElementsByName("arr_add_key_component_en")[0]
        .value; //save key component en to database
    save_key_component_th_todatabase = document.getElementsByName("arr_add_key_component_th")[0]
        .value; //save key component th to database
    save_component_id_todatabase = document.getElementsByName("add_Competency_en")[0]
        .value; //save component id todatabase
    var table_for_count = document.getElementsByName("arr_add_expected_en").length //loop expected data
    var table_arr_for_count = 0;




    for (i = 0; i < table_for_count; i++) {
        arr_save_expected_en_todatabase[i] = document.getElementsByName("arr_add_expected_en")[i].value;
        arr_save_expected_th_todatabase[i] = document.getElementsByName("arr_add_expected_th")[i].value;
        arr_save_posittion_to_database[i] = document.getElementsByName("arr_add_pos")[i].value;
        arr_save_point_to_database[i] = document.getElementsByName("arr_add_point")[i].value;
    }


    for (i = 0; i < table_for_count; i++) {
        table_arr_for_count = document.getElementsByName("arr_add_pos_" + (arr_save_index_arr_add_pos[i] + 1) + "")
            .length
        console.log("arr_add : " + arr_save_index_arr_add_pos[i] + 1);
        console.log("arr_add_pos : " + table_arr_for_count);
        arr_save_posittion_other_to_database[i] = [table_arr_for_count];

        for (j = 0; j < table_arr_for_count; j++) {
            arr_save_posittion_other_to_database[i][j] = document.getElementsByName("arr_add_pos_" + (
                arr_save_index_arr_add_pos[i] + 1) + "")[j].value;
            console.log(arr_save_posittion_other_to_database[i][j]);
            console.log(" i : " + i + " J : " + j);
        }

    }
    console.log(arr_save_posittion_other_to_database);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_gcm_indicators_form/key_component_and_expected_behavior_to_database_insert",
        data: {
            "save_key_component_en_todatabase": save_key_component_en_todatabase,
            "save_key_component_th_todatabase": save_key_component_th_todatabase,
            "arr_save_expected_en_todatabase": arr_save_expected_en_todatabase,
            "arr_save_expected_th_todatabase": arr_save_expected_th_todatabase,
            "arr_save_posittion_to_database": arr_save_posittion_to_database,
            "save_component_id_todatabase": save_component_id_todatabase,
            "arr_save_posittion_other_to_database": arr_save_posittion_other_to_database,
            "arr_save_point_to_database": arr_save_point_to_database
        },
        dataType: "JSON",

        success: function(status) {
            console.log(status);


            table_data += ' <tr id = "row_table' + index_table + '">'
            table_data += ' <td>'
            table_data += '' + index_table + ''
            table_data += '</td>'

            table_data += '<td>'
            table_data += '' + save_key_component_en_todatabase + '<br>'
            table_data += '' + save_key_component_th_todatabase + ''
            table_data += '</td>'
            //Start for loop

            table_data += '<td>'
            for (i = 0; i < table_for_count; i++) {
                table_arr_for_count = arr_save_posittion_other_to_database[i].length
                table_data += '' + arr_save_point_to_database[i] + '<br>'
                for (j = 1; j < table_arr_for_count; j++) {
                    table_data += '<br>'
                }
                table_data += '<hr>'
            }
            table_data += '</td>'


            table_data += '<td>'
            for (i = 0; i < table_for_count; i++) {
                table_arr_for_count = arr_save_posittion_other_to_database[i].length
                table_data += '' + arr_save_expected_en_todatabase[i] + '<br>'
                table_data += '' + arr_save_expected_th_todatabase[i] + '<br>'
                for (j = 1; j < table_arr_for_count; j++) {
                    table_data += '<br>'
                }
                table_data += '<hr>'
            }
            table_data += '</td>'

            table_data += '<td>'
            for (i = 0; i < table_for_count; i++) {
                table_data += '' + arr_save_posittion_to_database[i] + "<br>"


                table_arr_for_count = arr_save_posittion_other_to_database[i].length
                for (j = 0; j < table_arr_for_count; j++) {

                    if (arr_save_posittion_other_to_database[i][j] != 0) {

                        table_data += '' + arr_save_posittion_other_to_database[i][j] + "<br>"
                    }
                }

                table_data += '<hr>'
            }
            table_data += '</td>'

            //Start if

            table_data += '<td>'
            table_data += '<center>'
            table_data += '<button  name="remove" id="' + index_table +
                '" class="btn btn-danger table_remove" value = "' +
                save_key_component_en_todatabase +
                '" onclick="delete_key_component_and_expected(value)" ><i class="fa fa-times"></i></button>'
            table_data += '</center>'
            table_data += '</td>'



            //End for loop

            table_data += ' </tr>'

            $('#table_key').append(table_data);
            index_table++; //table update
        }
        // success 
    });
    // ajex 
    document.getElementById("form_reset").reset();
}

<?php
/*
* pos_level
* Display manage indicator
* @input  - 
* @output position 
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/
?>

function pos_level(id) {
    var index = 1; //index dropdown
    var key_pos_lv; //save position level
    var key_pos_lv_check = id.substring(7); //save position level as table
    Number(key_pos_lv_check); //change string to int
    key_pos_lv = document.getElementById('pos_lv_' + key_pos_lv_check + '').value;
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_gcm_indicators_form/get_position_indicator",
        data: {
            "key_pos_lv": key_pos_lv
        },
        dataType: "JSON",

        success: function(data) {
            // var res = JSON.parse(data);
            index = 1;
            var drop_pos = ""
            // Start col-12 
            drop_pos += '<div class="row">'

            // Start label position 
            drop_pos += '<div class="col-4" align="right">'
            drop_pos += '<label for="textarea-input"'
            drop_pos += 'class=" form-control-label">Position :</label>'
            drop_pos += '</div>'
            // End label position

            // Start select 
            drop_pos += '<div class="col-8">'
            drop_pos += '<select name="arr_add_pos" id="select" class="form-control">'
            drop_pos += '<option>Select position</option>'
            //Start forEach
            data.forEach((row, index) => {
                drop_pos += '<option value="' + row.Position_name + '">' + row.Position_name +
                    '</option>'
            });
            //End forEach
            drop_pos += '</select>'
            drop_pos += '</div>'
            // End select col-12
            drop_pos += '</div>'
            // End row
            $('#add_table_' + key_pos_lv_check + '').html(drop_pos);
            index++; //update index dropdown
        }
        // success 
    });
    // ajex 
}
// pos_level

<?php
/*
* pos_level_add
* Display manage indicator
* @input  - 
* @output position 
* @author Jakkarin
* @Update Date 2564-02-10
*/
?>

function pos_level_add(id) {
    var index = 1; //index dropdown
    var key_pos_lv; //save position level
    var key_pos_lv_check = id.substring(11); //save position level as table


    index_Expected = document.getElementById('id_index' + key_pos_lv_check + '').value;
    Number(key_pos_lv_check); //change string to int
    key_pos_lv = document.getElementById('pos_lv_add_' + key_pos_lv_check + '').value;
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_gcm_indicators_form/get_position_indicator",
        data: {
            "key_pos_lv": key_pos_lv
        },
        dataType: "JSON",

        success: function(data) {
            // var res = JSON.parse(data);
            index = 1;
            var drop_pos = ""
            // Start col-12 
            drop_pos += '<div class="row">'
            // Start label position 
            drop_pos += '<div class="col-4" align="right">'
            drop_pos += '<label for="textarea-input"'
            drop_pos += 'class=" form-control-label">Position :</label>'
            drop_pos += '</div>'
            // End label position
            // Start select 
            drop_pos += '<div class="col-8">'
            drop_pos += '<select name="arr_add_pos_' + index_Expected +
                '" id="select" class="form-control">'
            drop_pos += '<option>Select position</option>'
            //Start forEach
            data.forEach((row, index) => {
                drop_pos += '<option value="' + row.Position_name + '">' + row.Position_name +
                    '</option>'
            });
            //End forEach
            drop_pos += '</select>'
            drop_pos += '</div>'
            // End select col-12
            drop_pos += '</div>'
            // End row
            $('#add_table_position_' + key_pos_lv_check + '').html(drop_pos);
            index++; //update index dropdown
        }
        // success 
    });
    // ajex 
}
// pos_level_add

<?php
/*
* un_lock_disabled_component
* Unlock button key component
* @input  - 
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 2563-09-25
*/
?>

function un_lock_disabled_component() {

    check_component_en = document.getElementsByName("add_Competency_en")[0]
        .value; //check component en todatabase
    check_save_component_th = document.getElementsByName("add_Competency_th")[0]
        .value; //check component th todatabase

    if (check_component_en != "" && check_save_component_th != "") {
        document.getElementById("un_lock_disabled").disabled = false;
    }
    // if 
}

<?php
/*
* insert_data_component
* insert component and definition to database
* @input  - 
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 2563-09-25
*/
?>

function insert_data_component() {
    save_component_en_todatabase = document.getElementsByName("add_Competency_en")[0]
        .value; //save component en todatabase
    save_component_th_todatabase = document.getElementsByName("add_Competency_th")[0]
        .value; //save component th todatabase
    save_definition_en_todatabase = document.getElementsByName("add_Definition_en")[0]
        .value; //save definition en todatabase
    save_definition_th_todatabase = document.getElementsByName("add_Definition_th")[0]
        .value; //save definition th todatabase


    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_gcm_indicators_form/competency_to_database_insert",
        data: {
            "save_component_en_todatabase": save_component_en_todatabase,
            "save_component_th_todatabase": save_component_th_todatabase,
            "save_definition_en_todatabase": save_definition_en_todatabase,
            "save_definition_th_todatabase": save_definition_th_todatabase
        },
        dataType: "JSON",
        success: function(status) {

            console.log(status)
        }
        // success 
    });
    // ajex
    $("#addExpected").show();
    $("#btn_mange").show();
}


<?php
/*
* delete_key_component_and_expected
* delete key component and  expected to database
* @input  - 
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 2563-09-25
*/
?>

function delete_key_component_and_expected(key_component_en_to_database) {
    var delete_key_component_en_to_database = key_component_en_to_database; //delete key component
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_gcm_indicators_form/key_component_and_expected_to_database_delete",
        data: {
            "delete_key_component_en_to_database": delete_key_component_en_to_database
        },
        dataType: "JSON",
        success: function(status) {
            console.log(status)
        }
        // success 
    });
    // ajex 
}

<?php
/*
* clear_data_componet
* delete component and definition to database
* @input  - 
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 2563-09-25
*/
?>

function clear_data_componet() {
    save_component_en_todatabase = document.getElementsByName("add_Competency_en")[0].value; //delete component en 
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_gcm_indicators_form/data_componet_to_data_base_delete",
        data: {
            "save_component_en_todatabase": save_component_en_todatabase
        },
        dataType: "JSON",
        success: function(status) {
            console.log(status)
        }
        // success 
    });
    // ajex 
}
//clear_data_componet
</script>
<!-- End script  -->

<!-- Start Css  -->
<style>
#panel {
    background-color: #c1432e;
}

#table_data {

    font-size: 20px;
    background-color: #2c2c2c;
    color: white;
}
</style>
<!-- End Css -->
<!-- Start Page Content -->
<div class="col-lg-12">
    <div class="card shadow mb-4">
        <!-- Start Card Header -->
        <div class="card-header py-3" id="panel">
            <div class="col-xl-12">

                <h1 class="m-0 font-weight-bold text-primary">
                    <a href="<?php echo base_url(); ?>Evs_gcm_indicators_form/indicator_gcm" id="back_acm">
                        <i class="fa fa-chevron-circle-left text-white"></i>
                    </a>
                    <i class="fa fa-pencil-square text-white"></i>
                    <font color="white">Items form GCM</font>

                </h1>
            </div>
            <!-- style="font-size:40px;color:white" -->
        </div>
        <!-- End Card Header -->

        <!-- Start Card Body -->
        <div class="card-body">
            <!-- Start Form : Ability -->
            <h2 class="m-0 ">Please add Items form GCM</h2><br>
            <hr>
            <div class="form-group">
                <!-- Start add Competency -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-2">
                                <label class=" form-control-label">Competency EN : </label>
                            </div>
                            <!-- col-2 -->
                            <div class="col-4">
                                <textarea id="disabled_input_Competency_en" name="add_Competency_en"
                                    placeholder="Enter Competency" class="form-control"
                                    onchange="un_lock_disabled_component()" require></textarea>
                            </div>
                            <!-- col-3  -->
                            <div class="col-2">
                                <label class=" form-control-label">Competency TH : </label>
                            </div>
                            <!-- col-2 -->
                            <div class="col-4">
                                <textarea id="disabled_input_Competency_th" name="add_Competency_th"
                                    placeholder="Enter Competency" class="form-control"
                                    onchange="un_lock_disabled_component()" require></textarea>
                            </div>
                            <!-- col-3 -->
                        </div>
                        <!-- row  -->
                    </div>
                    <!-- col-12 -->
                </div>
                <!-- row  -->
                <!-- end add Competency -->
                <br>
                <!-- Start add Definition -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-2">
                                <label class=" form-control-label">Definition EN : </label>
                            </div>
                            <!-- col-2 -->
                            <div class="col-4">
                                <textarea type="text" id="disabled_input_Definition_en" name="add_Definition_en"
                                    placeholder="Enter Definition" class="form-control"
                                    onchange="un_lock_disabled_component()" require></textarea>
                            </div>
                            <!-- col-4 -->
                            <div class="col-2">
                                <label class=" form-control-label">Definition TH : </label>
                            </div>
                            <!-- col-2 -->
                            <div class="col-4">
                                <textarea type="text" id="disabled_input_Definition_th" name="add_Definition_th"
                                    placeholder="Enter Definition" class="form-control" require></textarea>
                            </div>
                            <!-- col-4 -->
                        </div>
                        <!-- row  -->
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <!-- end add Definition -->

                <br>
                <!-- start btn save -->
                <div class="row">
                    <div class="col-12" align="right">
                        <button id="un_lock_disabled" type="button" class="btn btn-success disabled_component"
                            data-toggle="collapse" data-target="#register_add" disabled>
                            Save Competency
                        </button>
                    </div>
                    <!-- col-12 -->
                </div>
                <!-- row  -->
                <!-- end btn save -->

                <hr>
                <form id="form_reset">
                    <div id="register_add" class="collapse">
                        <!-- Start add key component -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-3">
                                        <label class=" form-control-label">Key
                                            component EN : </label>
                                    </div>
                                    <div class="col-3">
                                        <textarea type="text" id="text_key_component_en" name="arr_add_key_component_en"
                                            placeholder="Enter Key component" class="form-control"></textarea>
                                    </div>

                                    <div class="col-3">
                                        <label class=" form-control-label">Key
                                            component TH : </label>
                                    </div>
                                    <div class="col-3">
                                        <textarea type="text" id="text_key_component_th" name="arr_add_key_component_th"
                                            placeholder="Enter Key component" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end add key component -->
                        <hr>
                        <!-- Start insert expected  -->
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4" align="right">
                                        <label for="textarea-input" class=" form-control-label">Expected
                                            Behavior EN :</label>
                                    </div>
                                    <div class="col-8"><textarea name="arr_add_expected_en" rows="2"
                                            placeholder="Enter Expected" class="form-control" style="resize: none"
                                            required></textarea>
                                    </div>
                                </div>
                                <!-- row -->
                            </div>
                            <!-- col-6-1  -->
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4" align="right">
                                        <label for="textarea-input" class=" form-control-label">Expected
                                            Behavior TH :</label>
                                    </div>
                                    <!-- col-4  -->
                                    <div class="col-8"><textarea name="arr_add_expected_th" rows="2"
                                            placeholder="Enter Expected" class="form-control" style="resize: none"
                                            required></textarea>
                                    </div>
                                    <!-- col-8  -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- col-6-2  -->
                        </div>
                        <!-- row  -->
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="textarea-input" class=" form-control-label">Target Level : </label>
                                    </div>
                                    <!-- col-4  -->
                                    <div class="col-8">
                                        <select class="form-control" id="arr_add_point" name="arr_add_point">
                                            <option value="P1">P1</option>
                                            <option value="P2">P2</option>
                                            <option value="C/M3">C/M3</option>
                                        </select>
                                        <!-- name="arr_add_point"  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- End input Identification -->

                        <!-- Start input position  -->
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4" align="right">
                                        <label for="textarea-input" class=" form-control-label">Position level:</label>
                                    </div>
                                    <!-- col-4  -->
                                    <div class="col-8">

                                        <select id="pos_lv_1" class="form-control" onchange="pos_level(id)">
                                            <option>Select position level</option>
                                            <?php //Start foreach
                                            foreach($pos_lv_data as $value){ ?>
                                            <option value="<?php echo $value->psl_id;?>">
                                                <?php echo $value->psl_position_level;?>
                                            </option>
                                            <?php } //end foreach?>
                                            <!-- foreach -->
                                        </select>
                                    </div>
                                    <!-- seclect position level  -->
                                </div>
                                <!-- row  -->
                            </div>
                            <!-- col-6  -->
                            <div class="col-6" id="add_table_1">
                            </div>
                            <!-- include form function add_pos_level -->
                        </div>
                        <!-- row  -->
                        <br>
                        <div id="tr_Position_1">
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-12" align="right">
                                <button type="button" class="btn btn-success float-center" id="addPostion" value="1"><i
                                        class="fa fa-plus"></i> Position</button>
                            </div>
                        </div>
                        <!-- row  -->
                        <hr>
                        <!-- End insert expected  -->
                    </div>
                    <!-- End add key component -->
                    <div id="tr_Expected">
                    </div>
                    <!-- add_expected  -->
                    <button type="button" class="btn btn-success float-center" id="addExpected"><i
                            class="fa fa-plus"></i> Expected behavior</button>

                    <div class="row">
                        <div class="col-md-12" align="right" id="btn_mange">
                            <input type="button" class="btn btn-success" id="save_exp" value="Save Expected"
                                onclick="insert_data_key_component_and_expected_behavior()">
                        </div>
                        <!-- row 12  -->
                    </div>
                    <!-- row 5 -->
                </form>
                <!-- form  -->
            </div>
            <!-- row-2 -->
        </div>
        <!-- collapse -->

        <br>
        <div class="col-lg-12">
            <div class="card">
                <!-- Start Card Header -->
                <div class="card-header" id="table_data">
                    <strong class="card-title">Key component form GCM</strong>
                </div>
                <!-- End Card Header -->
                <!-- Start Card Body -->
                <table class="table" id="t01" width="100%">
                    <thead>
                        <th width="2%">
                            <center>#</center>
                        </th>
                        <th width="15%">
                            <center>Key Component</center>
                        </th>
                        <th width="5%">
                            <center>Target Level</center>
                        </th>
                        <th width="20%">
                            <center>Expected Behavior</center>
                        </th>
                        <th width="15%">
                            <center>Position</center>
                        </th>
                        <th width="5%">
                            <center>Manage</center>
                        </th>
                    </thead>
                    <tbody id="table_key"></tbody>
                </table>

                <!-- End Card Body -->
                <div class="row">
                    <div class="col-12" align="right">
                        <!-- Start Back To Main Position -->
                        <a href="<?php echo base_url();?>/Evs_gcm_indicators_form/indicator_gcm">
                            <button type="button" class="btn btn-secondary"
                                onclick="clear_data_componet()">Back</button>
                        </a>
                        <!-- End Back To Main Position -->
                        <!-- Start Save data -->
                        <a href="<?php echo base_url();?>/Evs_gcm_indicators_form/indicator_gcm">
                            <button type="button" class="btn btn-success">Save</button>
                        </a>
                        <!-- End Save data -->
                    </div>
                    <!-- col-12 -->
                </div>
                <!-- row  -->
                <br>
            </div>
            <!-- col-12  -->
        </div>
        <!-- card  -->
    </div>
    <!-- End Page Content -->
    <!-- col-12 -->