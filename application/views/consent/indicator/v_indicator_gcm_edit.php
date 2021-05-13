<?php
/*
 * v_indicator_ability_edit
 * edit Indicator of Ability
 * @input   -
 * @output  -
 * @author  jakkarin Pimpaeng
 * @Create Date 2564-024-01
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
            '<div id="tr_Position_' + index + '">' +
            '</div>' +
            '<div class="col=md-6" class="row">' +
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
                    this).attr("value") + '">' +
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
                '<i class="fa fa-times">&nbsp; Delete</i></button>' +
                '</div>' +
                '<!-- include form function add_pos_level -->' +
                '</div>' +
                '<!-- row  -->' +
                '<!-- End insert expected  -->' +
                '</div>' +
                '<br>'
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
            '<i class="fa fa-times">&nbsp; Delete</i></button>' +
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

    $(document).on('click', '.btn_ept_remove', function() {
        var button_id = $(this).attr("id");
        $('#row_expected_edit_' + button_id + '').remove();

    });
    $(document).on('click', '.disabled_component', function() {
        var save_component_id = document.getElementById("save_key_Competency_id").value;

        if (chack_insert_component % 2 == 0) {
            document.getElementById("disabled_input_Competency_en").disabled =
                true; //disabled Competency en because not edit
            document.getElementById("disabled_input_Competency_th").disabled =
                true; //disabled Competency th because not edit
            document.getElementById("disabled_input_Definition_en").disabled =
                true; //disabled Definition th because not edit
            document.getElementById("disabled_input_Definition_th").disabled =
                true; //disabled Definition th because not edit
            update_data_component(save_component_id);
            $("#addExpected").show();
            $("#btn_mange").show();
        } else {
            document.getElementById("disabled_input_Competency_en").disabled =
                false; //disabled Competency en because not edit
            document.getElementById("disabled_input_Competency_th").disabled =
                false; //disabled Competency th because not edit
            document.getElementById("disabled_input_Definition_en").disabled =
                false; //disabled Definition th because not edit
            document.getElementById("disabled_input_Definition_th").disabled =
                false; //disabled Definition th because not edit
            $("#addExpected").hide();
            $("#btn_mange").hide();

        }
        chack_insert_component++;

    });


    // $("#back_acm").click(function() {
    //     console.log("Clear data");
    //     clear_data_componet();
    // });
    // //  clear_data_componet



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
var index_next_table = 2; //create next table
var chack_table_id = 0; // chack table id

function insert_data_key_component_and_expected_behavior() {
    table_data = ""; // set table

    arr_save_expected_en_todatabase = []; //save expected en to database
    arr_save_expected_th_todatabase = []; //save expected th to database
    arr_save_posittion_to_database = []; //save posittion to database
    arr_save_posittion_other_to_database = [];

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
        url: "<?php echo base_url(); ?>/Evs_ability_indicators_form/key_component_and_expected_behavior_to_database_insert",
        data: {
            "save_key_component_en_todatabase": save_key_component_en_todatabase,
            "save_key_component_th_todatabase": save_key_component_th_todatabase,
            "arr_save_expected_en_todatabase": arr_save_expected_en_todatabase,
            "arr_save_expected_th_todatabase": arr_save_expected_th_todatabase,
            "arr_save_posittion_to_database": arr_save_posittion_to_database,
            "save_component_id_todatabase": save_component_id_todatabase,
            "arr_save_posittion_other_to_database": arr_save_posittion_other_to_database
        },
        dataType: "JSON",

        success: function(status) {
            console.log(status);


            table_data += '<div id="row_table' + save_table_insert_data + '">'
            table_data += '<div class="card-body">'
            table_data += '<div class="row">'

            table_data += ' <div class="col-1">'
            table_data += '' + save_table_insert_data + ''
            table_data += '</div>'

            table_data += '<div class="col-3">'
            table_data += '' + save_key_component_en_todatabase + '<br>'
            table_data += '' + save_key_component_th_todatabase + ''
            table_data += '</div>'
            //Start for loop
            for (i = 0; i < table_for_count; i++) {
                //Start if
                if (i != 0) {
                    table_data += '<div class="card-body">'
                    table_data += '<div class="row">'

                    table_data += ' <div class="col-1">'
                    table_data += ''
                    table_data += '</div> '

                    table_data += '<div class="col-3">'
                    table_data += '</div>'
                } //End if
                table_data += '<div class="col-5">'
                table_data += '' + arr_save_expected_en_todatabase[i] + '<br>'
                table_data += '' + arr_save_expected_th_todatabase[i] + '<hr>'

                table_data += '</div>'
                table_data += '<div class="col-2">'
                table_data += '' + arr_save_posittion_to_database[i] + '<hr>'
                table_arr_for_count = arr_save_posittion_other_to_database[i].length
                for (j = 0; j < table_arr_for_count; j++) {

                    if (arr_save_posittion_other_to_database[i][j] != 0) {
                        table_data += '' + arr_save_posittion_other_to_database[i][j] + '<hr>'
                    }

                }
                if (arr_save_posittion_other_to_database[i][j] == 0) {
                    table_data += '' + '<hr>'
                }


                table_data += '</div>'
                //Start if
                if (i == 0) {
                    table_data += '<div class="col-1">'

                    table_data += '<button  name="remove" id="' + save_table_insert_data +
                        '" class="btn btn-danger table_remove" value = "' +
                        save_key_component_en_todatabase +
                        '" onclick="delete_key_component_and_expected(value)" ><i class="fa fa-times"></i></button>'
                    table_data += '</div>'
                    table_data += '</div>'
                    if (i == 0 && i == table_for_count - 1) {
                        table_data += '<hr>'
                    }
                    table_data += '</div>'


                } //End if
                //Start if
                if (i != 0 && i != table_for_count - 1) {
                    table_data += '<div class="col-1">'
                    table_data += '</div>'

                    table_data += '</div>'
                    table_data += '</div>'

                } //End if
                //Start if
                if (i != 0 && i == table_for_count - 1) {
                    table_data += '<div class="col-1">'
                    table_data += '</div>'
                    table_data += '</div>'
                    table_data += '<hr>'
                    table_data += '</div>'
                } //End if

            } //End for loop
            table_data += '</div>'
            table_data += '<div id="table_key_' + index_next_table + '"></div>'

            // End col-12
            $('#table_key_' + save_table_insert_data + '').html(table_data);
            save_table_insert_data++; //update index table
            index_next_table++; //update create next table
            chack_table_id++;
        }
        // success
    });
    // ajex
    window.location.href =
        "<?php echo base_url();?>/Evs_ability_indicators_form/indicator_ability_view_edit_data/<?php echo $competency_id; ?>";
}



function update_data_key_component_and_expected_behavior() {
    table_data = ""; // set table

    arr_save_expected_en_todatabase = []; //save expected en to database
    arr_save_expected_th_todatabase = []; //save expected th to database
    arr_save_posittion_to_database = []; //save posittion to database
    arr_save_posittion_other_to_database = [];
    arr_save_expected_id = [];

    if (chack_table_id == 0) {
        save_table_insert_data = parseInt(document.getElementById("insert_table").value);
        index_next_table = save_table_insert_data + 1;
    }

    save_key_component_en_todatabase = document.getElementsByName("arr_add_key_component_en_edit")[0]
        .value; //save key component en to database
    save_key_component_th_todatabase = document.getElementsByName("arr_add_key_component_th_edit")[0]
        .value; //save key component th to database
    save_component_id_todatabase = document.getElementsByName("add_Competency_en")[0]
        .value; //save component id todatabase
    var table_for_count = document.getElementsByName("arr_add_expected_en_edit").length //loop expected data
    var table_arr_for_count = 0;



    for (i = 0; i < table_for_count; i++) {

        table_arr_for_count = document.getElementsByName("arr_edit_pos_" + (i + 1) + "").length
        arr_save_posittion_other_to_database[i] = [table_arr_for_count];
        arr_save_expected_id[i] = [table_arr_for_count];
        arr_save_expected_en_todatabase[i] = document.getElementsByName("arr_add_expected_en_edit")[i].value;
        arr_save_expected_th_todatabase[i] = document.getElementsByName("arr_add_expected_th_edit")[i].value;

        console.log(arr_save_expected_en_todatabase[i]);
        console.log(arr_save_expected_th_todatabase[i]);

        for (j = 0; j < table_arr_for_count; j++) {
            arr_save_expected_id[i][j] = document.getElementsByName("id_exp_" + (i + 1) + "")[j].value;
            arr_save_posittion_other_to_database[i][j] = document.getElementsByName("arr_edit_pos_" + (i + 1) + "")[j]
                .value;
            console.log(arr_save_expected_id[i][j]);
            console.log(arr_save_posittion_other_to_database[i][j]);
            console.log(" i : " + i + " J : " + j);
        }
    }

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_indicators_form/key_component_and_expected_behavior_to_database_edit",
        data: {
            "save_key_component_en_todatabase": save_key_component_en_todatabase,
            "save_key_component_th_todatabase": save_key_component_th_todatabase,
            "arr_save_expected_en_todatabase": arr_save_expected_en_todatabase,
            "arr_save_expected_th_todatabase": arr_save_expected_th_todatabase,
            "save_component_id_todatabase": save_component_id_todatabase,
            "arr_save_posittion_other_to_database": arr_save_posittion_other_to_database,
            "arr_save_expected_id": arr_save_expected_id
        },
        dataType: "JSON",

        success: function(status) {
            console.log(status);

            table_data += '<div id="row_table' + save_table_insert_data + '">'
            table_data += '<div class="card-body">'
            table_data += '<div class="row">'

            table_data += ' <div class="col-1">'
            table_data += '' + save_table_insert_data + ''
            table_data += '</div>'

            table_data += '<div class="col-3">'
            table_data += '' + save_key_component_en_todatabase + '<br>'
            table_data += '' + save_key_component_th_todatabase + ''
            table_data += '</div>'
            //Start for loop
            for (i = 0; i < table_for_count; i++) {
                //Start if
                if (i != 0) {
                    table_data += '<div class="card-body">'
                    table_data += '<div class="row">'

                    table_data += ' <div class="col-1">'
                    table_data += ''
                    table_data += '</div> '

                    table_data += '<div class="col-3">'
                    table_data += '</div>'
                } //End if
                table_data += '<div class="col-5">'
                table_data += '' + arr_save_expected_en_todatabase[i] + '<br>'
                table_data += '' + arr_save_expected_th_todatabase[i] + '<hr>'

                table_data += '</div>'
                table_data += '<div class="col-2">'

                table_arr_for_count = arr_save_posittion_other_to_database[i].length
                for (j = 0; j < table_arr_for_count; j++) {

                    if (arr_save_posittion_other_to_database[i][j] != 0) {
                        table_data += '' + arr_save_posittion_other_to_database[i][j] + '<hr>'
                    }

                }
                if (arr_save_posittion_other_to_database[i][j] == 0) {
                    table_data += '' + '<hr>'
                }


                table_data += '</div>'
                //Start if
                if (i == 0) {
                    table_data += '<div class="col-1">'

                    table_data += '<button  name="remove" id="' + save_table_insert_data +
                        '" class="btn btn-danger table_remove" value = "' +
                        save_key_component_en_todatabase +
                        '" onclick="delete_key_component_and_expected(value)" ><i class="fa fa-times"></i></button>'
                    table_data += '</div>'
                    table_data += '</div>'
                    if (i == 0 && i == table_for_count - 1) {
                        table_data += '<hr>'
                    }
                    table_data += '</div>'


                } //End if
                //Start if
                if (i != 0 && i != table_for_count - 1) {
                    table_data += '<div class="col-1">'
                    table_data += '</div>'

                    table_data += '</div>'
                    table_data += '</div>'

                } //End if
                //Start if
                if (i != 0 && i == table_for_count - 1) {
                    table_data += '<div class="col-1">'
                    table_data += '</div>'
                    table_data += '</div>'
                    table_data += '<hr>'
                    table_data += '</div>'
                } //End if

            } //End for loop
            table_data += '</div>'
            table_data += '<div id="table_key_' + index_next_table + '"></div>'

            // End col-12
            $('#table_key_' + save_table_insert_data + '').html(table_data);
            save_table_insert_data++; //update index table
            index_next_table++; //update create next table
            chack_table_id++;
        }
        // success
    });
    // ajex
    //$("#edit_form").hide();
    window.location.href =
        "<?php echo base_url();?>/Evs_ability_indicators_form/indicator_ability_view_edit_data/<?php echo $competency_id; ?>";
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
        url: "<?php echo base_url(); ?>/Evs_ability_indicators_form/get_position_indicator",
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
        url: "<?php echo base_url(); ?>/Evs_ability_indicators_form/get_position_indicator",
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

function pos_level_main_edit(id) {
    var index = 1; //index dropdown
    var key_pos_lv; //save position level
    var key_pos_lv_check = id.substring(12); //save position level as table
    index_Expected = document.getElementById('id_index_edit' + key_pos_lv_check + '').value;
    Number(key_pos_lv_check); //change string to int
    key_pos_lv = document.getElementById('pos_lv_edit_' + key_pos_lv_check + '').value;
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_indicators_form/get_position_indicator",
        data: {
            "key_pos_lv": key_pos_lv
        },
        dataType: "JSON",

        success: function(data) {
            // var res = JSON.parse(data);
            index = 1;
            var drop_pos = ""
            // Start col-12


            // Start label position
            drop_pos += '<div class="col-4" align="right">'
            drop_pos += '<label for="textarea-input"'
            drop_pos += 'class=" form-control-label">Position :</label>'
            drop_pos += '</div>'
            // End label position

            // Start select
            drop_pos += '<div class="col-8">'
            drop_pos += '<select name="arr_edit_pos_' + index_Expected +
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

            // End row
            $('#reset_position_' + key_pos_lv_check + '').html(drop_pos);
            index++; //update index dropdown
        }
        // success
    });
    // ajex
}
// pos_level



<?php
/*
 * add_pos_level
 * Display manage indicator
 * @input  possition level
 * @output possition level change dropdown
 * @author jakkarin pimpaeng
 * @Update Date 2563-09-25
 */
?>

function add_pos_level(id) {
    var key_pos_lv; //save position level
    var key_pos_lv_check = id.substring(7); //save position level as table

    Number(key_pos_lv_check); //change string to int
    key_pos_lv = document.getElementById('pos_lv_' + key_pos_lv_check + '').value;


    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_attitude_indicators_form/get_position_indicator",
        data: {
            "key_pos_lv": key_pos_lv
        },
        dataType: "JSON",
        success: function(data) {
            // var res = JSON.parse(data);

            var drop_pos = ""; //dropdown position
            // Start label position
            drop_pos += '<div class="col-2>'
            drop_pos += '<label for="textarea-input"'
            drop_pos += 'class=" form-control-label">Position :</label>'
            drop_pos += '</div>'
            // End label position

            // Start select
            drop_pos += '<div class="col-10">'
            drop_pos += '<select name="arr_update_pos[]" id="select" class="form-control">'
            drop_pos += '<option>Select position</option>'
            //Start forEach
            data.forEach((row, index) => {
                drop_pos += '<option value="' + row.pos_id + '">' + row.Position_name + '</option>'
            });
            //end forEach
            drop_pos += '</select>'
            drop_pos += '</div>'
            // End select
            // col-12
            $('#add_table_' + key_pos_lv_check + '').html(drop_pos);
        }
    });
    $('#select_remove' + key_pos_lv_check + '').remove();
}




<?php
/*
 * update_data_component
 * insert component and definition to database
 * @input  -
 * @output -
 * @author Jakkarin Pimpaeng
 * @Update Date 2563-09-25
 */
?>

function update_data_component(competency_id) {
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
        url: "<?php echo base_url(); ?>/Evs_ability_indicators_form/competency_to_database_edit",
        data: {
            "save_component_en_todatabase": save_component_en_todatabase,
            "save_component_th_todatabase": save_component_th_todatabase,
            "save_definition_en_todatabase": save_definition_en_todatabase,
            "save_definition_th_todatabase": save_definition_th_todatabase,
            "save_competency_id_todatabase": competency_id
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
 * edit_key_and_expected
 * Display manage indicator
 * @input  -
 * @output -
 * @author jakkarin pimpaeng
 * @Update Date 2563-09-25
 */
?>

function edit_key_and_expected(kcp_id) {
    var index_loop = 1;
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_indicators_form/get_key_component_and_expected_behavior_form_database",
        data: {
            "kcp_id": kcp_id
        },
        dataType: "JSON",

        success: function(data) {
            console.log(data)
            table_data = "";
            chack_kcp_key_component_detail_en = "";
            chack_ept_expected_detail_en = "";



            table_data += '<form id="edit_form">'
            table_data += '<hr>'
            table_data += '<h1 class=" form-control-label">Edit Key component</h1>'
            table_data += '<br><br>'
            data.forEach((row_key, index) => {
                if (chack_kcp_key_component_detail_en != row_key.kcp_key_component_detail_en) {
                    chack_kcp_key_component_detail_en = row_key.kcp_key_component_detail_en;


                    table_data += '<!-- Start add key component -->'
                    table_data += '<div class="row">'
                    table_data += '<div class="col-xl-12">'
                    table_data += '<div class="row">'
                    table_data += '<div class="col-3">'
                    table_data += '<label class=" form-control-label">Key component EN : </label>'
                    table_data += '</div>'
                    table_data += '<div class="col-3">'
                    table_data +=
                        '<textarea type="text" id="text_key_component_en" name="arr_add_key_component_en_edit"'
                    table_data += 'placeholder="Enter Key component" class="form-control">' +
                        row_key.kcp_key_component_detail_en + '</textarea>'

                    table_data += '</div>'
                    table_data += '<div class="col-3">'
                    table_data += '<label class=" form-control-label">Key component TH : </label>'
                    table_data += '</div>'
                    table_data += '<div class="col-3">'
                    table_data +=
                        '<textarea type="text" id="text_key_component_th" name="arr_add_key_component_th_edit"  placeholder="Enter Key component" class="form-control">' +
                        row_key.kcp_key_component_detail_th + '</textarea>'
                    table_data += '</div>'
                    table_data += '</div>'
                    table_data += '</div>'
                    table_data += '</div>'
                    table_data += '<!-- end add key component -->'
                    table_data += '<hr>'
                    data.forEach((row_expected, index) => {

                        if (row_key.kcp_key_component_detail_en == row_expected
                            .kcp_key_component_detail_en) {

                            if (chack_ept_expected_detail_en != row_expected
                                .ept_expected_detail_en) {
                                chack_ept_expected_detail_en = row_expected
                                    .ept_expected_detail_en;
                                table_data += '<!-- Start insert expected  -->'
                                table_data += '<div class="row">'
                                table_data += '<div class="col-6">'
                                table_data += '<div class="row">'
                                table_data += '<div class="col-4" align="right">'
                                table_data +=
                                    '<label for="textarea-input" class=" form-control-label">Expected Behavior EN :</label>'
                                table_data += '</div>'
                                table_data +=
                                    '<div class="col-8"><textarea name="arr_add_expected_en_edit" rows="2"'
                                table_data +=
                                    'placeholder="Enter Expected" class="form-control" style="resize: none"'
                                table_data += 'required>' + row_expected
                                    .ept_expected_detail_en + '</textarea>'

                                table_data += '</div>'
                                table_data += '</div>'
                                table_data += '<!-- row -->'
                                table_data += '</div>'
                                table_data += '<!-- col-6-1  -->'
                                table_data += '<div class="col-6">'
                                table_data += '<div class="row">'
                                table_data += ' <div class="col-4" align="right">'
                                table_data +=
                                    '<label for="textarea-input" class=" form-control-label">Expected Behavior TH :</label>'
                                table_data += '</div>'
                                table_data += '<!-- col-4  -->'
                                table_data +=
                                    '<div class="col-8"><textarea name="arr_add_expected_th_edit" rows="2" placeholder="Enter Expected" class="form-control" style="resize: none" required>' +
                                    row_expected.ept_expected_detail_th + '</textarea>'
                                table_data += '</div>'
                                table_data += '<!-- col-8  -->'
                                table_data += '</div>'
                                table_data += '<!-- row -->'
                                table_data += '</div>'
                                table_data += '<!-- col-6-2  -->'
                                table_data += '</div>'
                                table_data += '<!-- row  -->'
                                table_data += '<br>'
                                table_data += '<!-- End input Identification -->'

                                data.forEach((row_expected, index_ept) => {
                                    if (row_key.kcp_key_component_detail_en ==
                                        row_expected.kcp_key_component_detail_en) {
                                        if (chack_ept_expected_detail_en ==
                                            row_expected.ept_expected_detail_en) {
                                            Top_Management = "";
                                            Middle_Management = "";
                                            Junior_Management = "";
                                            Staff = "";
                                            Officier = "";
                                            index_ept++;
                                            if (row_expected.position_level_id ==
                                                "1") {
                                                Top_Management = "selected";
                                            }
                                            if (row_expected.position_level_id ==
                                                "2") {
                                                Middle_Management = "selected";
                                            }
                                            if (row_expected.position_level_id ==
                                                "3") {
                                                Junior_Management = "selected";
                                            }
                                            if (row_expected.position_level_id ==
                                                "4") {
                                                Staff = "selected";
                                            }
                                            if (row_expected.position_level_id ==
                                                "5") {
                                                Officier = "selected";
                                            }
                                            table_data +=
                                                '<!-- Start input position  -->'
                                            table_data +=
                                                '<input type= "hidden"  name = "id_exp_' +
                                                index_loop + '" value = "' +
                                                row_expected.ept_id + '">'
                                            table_data += '<div class="row">'
                                            table_data += '<div class="col-6">'
                                            table_data += '<div class="row">'
                                            table_data +=
                                                '<div class="col-4" align="right">'
                                            table_data +=
                                                '<label for="textarea-input" class=" form-control-label">Position level:</label>'
                                            table_data += '</div>'
                                            table_data += '<!-- col-4  -->'
                                            table_data += '<div class="col-8">'
                                            table_data +=
                                                '<select id="pos_lv_edit_' +
                                                index_ept +
                                                '" class="form-control" onchange="pos_level_main_edit(id)">'
                                            table_data +=
                                                '<option >Select position level</option>'
                                            table_data += '<option value="1" ' +
                                                Top_Management +
                                                '>Top Management</option>'
                                            table_data += '<option value="2" ' +
                                                Middle_Management +
                                                '>Middle Management</option>'
                                            table_data += '<option value="3" ' +
                                                Junior_Management +
                                                '>Junior Management</option>'
                                            table_data += '<option value="4" ' +
                                                Staff + '>Staff</option>'
                                            table_data += '<option value="5" ' +
                                                Officier + '>Officier</option>'
                                            table_data += '</select>'
                                            table_data += '</div>'
                                            table_data +=
                                                '<!-- seclect position level  -->'
                                            table_data += '</div>'
                                            table_data += '<!-- row  -->'
                                            table_data += '</div>'
                                            table_data += '<!-- col-6  -->'
                                            table_data +=
                                                '<input type= "hidden" id = "id_index_edit' +
                                                index_ept + '" value = "' +
                                                index_loop + '">'
                                            table_data += '<div class="col-6">'
                                            table_data +=
                                                '<div class = "row" id = "reset_position_' +
                                                index_ept + '">'
                                            table_data +=
                                                '<div class="col-4" align="right">'
                                            table_data +=
                                                '<label for="textarea-input"'
                                            table_data +=
                                                'class=" form-control-label">Position :</label>'
                                            table_data += '</div>'
                                            table_data += '<div class="col-8" >'


                                            table_data +=
                                                '<select name="arr_edit_pos_' +
                                                index_loop +
                                                '" id="select" class="form-control">'
                                            table_data +=
                                                '<option >Select position level</option>'
                                            table_data +=
                                                '<option selected  value="' +
                                                row_expected.Position_name + '">' +
                                                row_expected.Position_name +
                                                '</option>'
                                            table_data += '</select>'
                                            table_data += '</div>'
                                            table_data += '</div>'
                                            table_data +=
                                                '<!-- include form function add_pos_level -->'
                                            table_data += '</div>'
                                            table_data += '</div>'
                                            table_data += '<!-- row  -->'
                                            table_data += '<br>'
                                            table_data +=
                                                '<div id="tr_Position_edit_' +
                                                index_loop + '">'
                                            table_data += '</div>'
                                            table_data += '<br>'
                                        }

                                    }
                                });


                                table_data += '<hr>'

                                index_loop++;
                            }

                        }
                    });
                    table_data += '<!-- End add key component -->'
                    table_data += '<div id="">'
                    table_data += '</div>'
                    table_data += '<!-- add_expected  -->'
                    table_data += '<div class="row">'
                    table_data += '<div class="col-md-12" align="right" id="btn_mange">'
                    table_data +=
                        '<input type="button" class="btn btn-success" id="save_exp" value="Save Expected" onclick="update_data_key_component_and_expected_behavior()">'
                    table_data += '</div>'
                    table_data += '<!-- row 12  -->'
                    table_data += '</div>'
                    table_data += '<!-- row 5 -->'
                    table_data += '</form>'

                }

            });
            $('#add_table_edit_key_and_expected').html(table_data);

        }
        // success
    });
    // ajex
}
// edit_key_and_expected

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
        url: "<?php echo base_url(); ?>/Evs_ability_indicators_form/key_component_and_expected_to_database_delete",
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
    save_component_en_todatabase = document.getElementsByName("add_Competency_en")[0]
        .value; //delete component en
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_indicators_form/data_componet_to_data_base_delete",
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
                    <a href="<?php echo base_url(); ?>Evs_ability_indicators_form/indicator_ability" id="back_acm">
                        <i class="fa fa-chevron-circle-left text-white"></i>
                    </a>
                    <i class="fa fa-pencil-square text-white"></i>
                    <font color="white"> Items form ACM</font>

                </h1>
            </div>
            <!-- style="font-size:40px;color:white" -->
        </div>
        <!-- End Card Header -->

        <!-- Start Card Body -->
        <div class="card-body">
            <!-- Start Form : Ability -->
            <h2 class="m-0 ">Please edit Items form ACM</h2><br>
            <hr>
            <div class="form-group">
                <!-- Start add Competency -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <?php $competency_data = $competency_data->row();?>
                            <div class="col-2">
                                <label class=" form-control-label">Competency EN : </label>
                            </div>
                            <!-- col-2 -->
                            <div class="col-4">
                                <textarea id="disabled_input_Competency_en" name="add_Competency_en"
                                    placeholder="Enter Competency" class="form-control"
                                    require><?php echo $competency_data->cpn_competency_detail_en; ?></textarea>
                            </div>
                            <!-- col-3  -->
                            <div class="col-2">
                                <label class=" form-control-label">Competency TH : </label>
                            </div>
                            <!-- col-2 -->
                            <div class="col-4">
                                <textarea id="disabled_input_Competency_th" name="add_Competency_th"
                                    placeholder="Enter Competency" class="form-control"
                                    require><?php echo $competency_data->cpn_competency_detail_th; ?></textarea>
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
                                    require><?php echo $competency_data->cpn_definition_detail_en; ?></textarea>
                            </div>
                            <!-- col-4 -->
                            <div class="col-2">
                                <label class=" form-control-label">Definition TH : </label>
                            </div>
                            <!-- col-2 -->
                            <div class="col-4">
                                <textarea type="text" id="disabled_input_Definition_th" name="add_Definition_th"
                                    placeholder="Enter Definition" class="form-control"
                                    require><?php echo $competency_data->cpn_definition_detail_th; ?></textarea>
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
                        <input id="save_key_Competency_id" type="hidden"
                            value="<?php echo $competency_data->cpn_id; ?>">
                        <button id="btn_key_Competency" type="button" class="btn btn-success disabled_component"
                            data-toggle="collapse" data-target="#register_add">
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
                                            <option value="1">Top Management</option>
                                            <option value="2">Middle Management</option>
                                            <option value="3">Junior Management</option>
                                            <option value="4">Staff</option>
                                            <option value="5">Officier</option>
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
                        <div id="tr_Expected">
                        </div>
                    </div>
                    <!-- End add key component -->

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
                <div class="col-12" id="add_table_edit_key_and_expected">
                </div>
                <!-- include form function add_table_edit_key_and_expected -->
            </div>
            <!-- row-2 -->
        </div>
        <!-- collapse -->

        <br>
        <div class="col-lg-12">
            <div class="card">
                <!-- Start Card Header -->
                <div class="card-header" id="table_data">
                    <strong class="card-title">Key component form ACM</strong>
                </div>
                <!-- End Card Header -->
                <!-- Start Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            #
                        </div>
                        <div class="col-3">
                            Keycomponent
                        </div>
                        <div class="col-4">
                            Expected Behavior
                        </div>
                        <div class="col-3">
                            Position
                        </div>
                        <div class="col-1">
                            Manage
                        </div>
                    </div>
                    <hr>
                </div>
                <!-- div class row  -->
                <?php $index_table = 1; //indec table
$chack_key_component_detail_en = ""; //check key component
//start foreach
foreach ($competency_table as $value) {
    //start if
    if ($chack_key_component_detail_en != $value->kcp_key_component_detail_en) {
        $chack_key_component_detail_en = $value->kcp_key_component_detail_en;
        echo '<div id="row_expected_edit_' . $index_table . '"> ';
        echo '<div class="card-body">';
        echo '<div class="row">';
        echo '<div class="col-1">';
        echo $index_table;
        echo '</div>';
        echo '<div class="col-3">';
        echo $value->kcp_key_component_detail_en;
        echo "<br>";
        echo $value->kcp_key_component_detail_th;
        echo '</div>';
        echo '<div class="col-4">';
        //start foreach
        foreach ($competency_table as $chack_expect) {
            //start if
            if ($value->kcp_key_component_detail_en == $chack_expect->kcp_key_component_detail_en) {
                echo $chack_expect->ept_expected_detail_en;
                echo "<br>";
                echo $chack_expect->ept_expected_detail_th;
                echo "<br>";
                echo "<hr>";} //end if
        } //end foreach
        echo '</div>';
        echo '<div class="col-3">';
        //start foreach
        foreach ($competency_table as $chack_expect) {
            //start if
            if ($value->kcp_key_component_detail_en == $chack_expect->kcp_key_component_detail_en) {
                echo $chack_expect->Position_name;
                echo "<br>";
                echo "<hr>";} //end if
        } //end foreach

        echo '</div>
                            <div class="col-1">
                                <button class="btn btn-warning float-center" value = "' . $value->kcp_id . '"  Onclick="edit_key_and_expected(value)" ><i class="fa fa-pencil"></i></button>
                                <br><br>
                                <button type="button" name="remove" id="' . $index_table . '" class="btn btn-danger btn_ept_remove" value = "' . $value->kcp_key_component_detail_en . '" Onclick="delete_key_component_and_expected(value)" ><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <hr>';

        echo '</div>';
        echo '</div>';
        $index_table++;
    } //end if
} //end foreach ?>
                <input type="hidden" id="insert_table" value="<?php echo $index_table; ?>">
                <div id="table_key_<?php echo $index_table; ?>"></div>
                <!-- add data from modal  -->
            </div>
            <!-- End Card Body -->
        </div>
    </div>
    <!-- End Card Body -->
    <div class="row">
        <div class="col-12" align="right">
            <!-- Start Back To Main Position -->
            <a href="<?php echo base_url(); ?>/Evs_ability_indicators_form/indicator_ability">
                <button type="button" class="btn btn-secondary">Back</button>
                <!-- onclick="clear_data_componet() -->
            </a>

            <!-- End Back To Main Position -->
            <!-- Start Save data -->
            <a href="<?php echo base_url(); ?>/Evs_ability_indicators_form/indicator_ability">
                <button type="button" class="btn btn-success">Save</button>
            </a>
            <!-- End Save data -->
        </div>
        <!-- col-12 -->
    </div>
    <!-- row  -->
    <br>
</div>
<!-- End Page Content -->
<!-- col-12  -->
</div>
<!-- card  -->
</div>
<!-- col-12 -->