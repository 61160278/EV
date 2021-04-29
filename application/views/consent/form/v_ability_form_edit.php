<?php
/*
* v_ability_form_insert
* Display form ability management
* @input  -
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-09-28
*/ 
?>
<?php
    $row = $info_pattern_year->row();
    $year_id = $row->pay_id;
?>
<input type="hidden" id="value_pos_id" name="value_pos_id" value="<?php echo $info_pos_id; ?>">
<input type="hidden" id="year" name="year" value="<?php echo $year_id; ?>">
<script>
var index = 0; // data number
var value_pos_id = document.getElementById("value_pos_id").value; // position id from click perform
var value_year_id = document.getElementById("year").value; // year now ID
var sum_weight = 0; // sum by weight to competency 
var arr_weight_check = []; // array to check is value by weight
var temp_weight;

var table_ready = ""; // table document ready
var table_ready_score = ""; // table document ready_score
var table_key = '' // value key component for show on table
var table_expected = ''; // value expected for show on table
var temp_competency_en = ""; //value competency_en name
var temp_competency_id = ""; //value competency_th name
var arr_check_competency = []; //array check competency
var arr_check_expected = []; //array check expected
var arr_save_index_arr_add_pos = [];

/*
 * check_weight_all
 * Display -
 * @input  -
 * @output -
 * @author  Tanadon Tangjaimongkhon 
 * @Create Date 2563-10-29
 */
function check_weight_all() {
    sum_weight_all = document.getElementById('value_total_weight').value;

    //start if-else
    if (sum_weight_all == 100) {
        return true;
    } else if (sum_weight_all < 100 || sum_weight_all > 100) {
        var alert = "";
        alert += '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">';
        alert += '<span class="badge badge-pill badge-danger">Wrong</span>';
        alert += ' Total Weight should be value as 100%';
        alert += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        alert += '<span aria-hidden="true">&times;</span>';
        alert += '</button>';
        alert += '</div>';
        $('#success_save').html(alert);
        return false;
    }
    //end if-else


}
/*
 * total_weight
 * Display -
 * @input  -
 * @output -
 * @author  Tanadon Tangjaimongkhon 
 * @Create Date 2563-10-29
 */
function total_weight() {

    sum_weight = 0;
    //start for loop
    table_arr_for_count = document.getElementsByName("arr_weight").length
    for (i = 0; i < table_arr_for_count; i++) {
        arr_weight_check = document.getElementsByName("arr_weight")[i].value;
        Number(arr_weight_check);
        sum_weight += Number(arr_weight_check);
        Number(sum_weight);
        console.log(index);
    }
    //end for loop

    if (sum_weight == 100) {
        document.getElementById('value_total_weight').value = sum_weight;
        document.getElementById('value_total_weight').style.color = "black"
    } else {
        document.getElementById('value_total_weight').value = sum_weight;
        document.getElementById('value_total_weight').style.color = "red"
    }


}
//total_weight





/*
 * key_component_and_expected_data
 * Display -
 * @input  -
 * @output -
 * @author  Chackkarin Pimpaeng
 * @Create Date 2564-4-28
 */
function key_component_and_expected_data() {
    chack_key_component = 0;
    chack_expected = 0;


    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_form/get_key_component_ability_form",
        data: {
            "pos_id": value_pos_id, // position id
            "year_id": value_year_id // year id
        },
        dataType: "JSON",
        success: function(data) {

            key_component_data = data;
            chack_key_component = 1;
        }
    });

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_form/get_expected_ability_form",
        data: {
            "pos_id": value_pos_id, // position id
            "year_id": value_year_id // year id
        },
        dataType: "JSON",
        success: function(data) {

            expected_data = data;
            chack_expected = 1;
            table_data();

        }
    });
    
}

/*
 * table_data
 * Display -
 * @input  -
 * @output -
 * @author  Chackkarin Pimpaeng
 * @Create Date 2564-4-28
 */
function table_data() {
    //start ajax
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_form/get_ability_form",
        data: {
            "pos_id": value_pos_id, // position id
            "year_id": value_year_id // year id
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data);

            //start foreach
            data.forEach((row, i) => {
                index++;
                arr_save_index_arr_add_pos.push(index - 1);
                parseInt(row.sfa_id);
                Number(row.sfa_id);
                //console.log(typeof row.sfa_id);
                // start tr
                table_ready += '<tr id="row_com' + index + '">';
                table_ready += '<td>';
                table_ready += '<center>' + index + '</center>';
                table_ready += '</td>';
                // index 
                table_ready += '<td>';
                table_ready += '<select name="arr_compentency[]" id="compentency' + index +
                    '" class="form-control" onchange="get_compentency(value,' + index +
                    ')">';
                table_ready += '<option value = "0"> Please select</option>';
                temp_competency_id = row.sfa_cpn_id;
                if (temp_competency_en != row.cpn_competency_detail_en) {
                    table_ready += '<option value="' + row.cpn_id + '" id="opt_key_' +
                        index + '"selected>' + row.cpn_competency_detail_en + " (" + row
                        .cpn_competency_detail_th + ") " + '</option>';
                    temp_competency_en = row
                        .cpn_competency_detail_en; //compentency ENG to used
                    arr_check_competency.push(row.sfa_cpn_id);

                    //start foreach
                    data.forEach((row, i) => {
                        if (temp_competency_en != row.cpn_competency_detail_en) {
                            table_ready += '<option value="' + row.cpn_id + '" >' +
                                row.cpn_competency_detail_en + " (" + row
                                .cpn_competency_detail_th + ") " + '</option>';
                        }

                    });
                    //end foreach


                } else {
                    //start foreach
                    data.forEach((row, i) => {
                        table_ready += '<option value="' + row.cpn_id + '" >' + row
                            .cpn_competency_detail_en + " (" + row
                            .cpn_competency_detail_th + ") " + '</option>';

                    });
                    //end foreach

                }

                table_ready += '</select>';
                table_ready += '</td>';
                // select competency 

                table_ready += '<td id="key_com_' + index + '">';


                //console.log(arr_check_competency[0]);
                var check_number = 0; //value for check loop 


                //start foreach
                key_component_data.forEach((row, j) => {
                    //start if
                    if (row.kcp_cpn_id == arr_check_competency[
                            0]) {
                        //start if

                        if (check_number == 0) {
                            table_ready += row
                                .kcp_key_component_detail_en +
                                " (" +
                                row
                                .kcp_key_component_detail_th +
                                ")";

                        }

                        if (check_number >= 1) {

                            table_ready += '<hr>';
                            table_ready += row
                                .kcp_key_component_detail_en +
                                " (" +
                                row
                                .kcp_key_component_detail_th +
                                ")";
                        }
                        //end if-else
                        check_number++;
                    }
                    //end if                    
                });
                //end foreach

                check_number = 0;
                var temp_expected_en = "";


                table_ready += '</td>';
                // show keycom 

                table_ready += '<td id="expected_' + index + '">';

                expected_data.forEach((row, k) => {
                    //start if
                    if (temp_expected_en != row.ept_expected_detail_en &&
                        arr_check_competency[0] == row.sfa_cpn_id) {
                        temp_expected_en = row.ept_expected_detail_en;
                        // console.log(temp_expected_en);
                        if (check_number == 0) {
                            table_ready += row.ept_expected_detail_en + " (" + row
                                .ept_expected_detail_th + ")";
                        }
                        if (check_number >= 1) {
                            table_ready += '<hr>';
                            table_ready += row.ept_expected_detail_en + " (" + row
                                .ept_expected_detail_th + ")";
                        }
                        check_number++;


                        //end if-else
                    }
                    //end if-else

                });
                //end foreach

                arr_check_competency = [];
                check_number = 0;


                table_ready += '</td>';
                // show expected 
                //console.log(typeof parseInt(row.sfa_weight));
                temp_weight = parseInt(row.sfa_weight);

                table_ready += '<td id="weight_tr_' + index + '" >';
                table_ready += '<input type="number" class="form-control" id="weight_' +
                    index + '" value="' + temp_weight +
                    '" name="arr_weight" min="0" max="100" required onchange="total_weight()" placeholder="Ex.50">';
                table_ready += '</td>';
                // insert weight 

                table_ready += '<td width="20%">';
                table_ready +=
                    '<center><button type="button" class="btn btn-danger float-center btn_remove" id="delete_com' +
                    index + '" ><i class="fa fa-times"></i></button></center>';
                table_ready += '</td>';
                // button delete 

                table_ready += '</tr>';
                table_ready += '<tr>';


                sum_weight += temp_weight;
                temp_weight = 0;
                console.log(index);
            });
            //end foreach

            table_ready_score += '<td colspan="4">';
            table_ready_score += '<center>';
            table_ready_score += '<font color="black"><b>Total weight</b></font>';
            table_ready_score += '</center>';
            table_ready_score += '</td>';
            table_ready_score += '<td >';
            table_ready_score +=
                '<input id="value_total_weight" style="text-align:center" value = "100" disabled>';
            table_ready_score += '</td>';
            table_ready_score += '<td>';
            table_ready_score += '</td>';
            table_ready_score += '</tr>';
            // end tr 

            $('#t01 tbody').html(table_ready);
            $('#t01 tfoot').html(table_ready_score);
            console.log(arr_save_index_arr_add_pos)

        }
    }); //end ajax competency

}



$(document).ready(function() {
    key_component_and_expected_data();

    $(document).on('click', '#addCompentency', function() {
        var table; // value for show in table
        index++;
        console.log(index);
        arr_save_index_arr_add_pos.push(index - 1);
        //start ajax
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>/Evs_ability_form/get_compentency",
            data: {
                "pos_id": value_pos_id
            },
            dataType: "JSON",
            success: function(data) {



                // start tr
                table += '<tr id="row_com' + index + '">';
                table += '<td>';
                table += '<center>' + index + '</center>';
                table += '</td>';
                // index 

                table += '<td>';
                table += '<select name="arr_compentency[]" id="compentency' + index +
                    '" class="form-control" onchange="get_compentency(value,' + index +
                    ')">';
                table += '<option value = "0"> Please select</option>';
                //start foreach
                data.forEach((row, i) => {

                    //start if
                    if (value_pos_id == row.ept_pos_id) {
                        table += '<option value="' + row.cpn_id + '">' + row
                            .cpn_competency_detail_en + " (" + row
                            .cpn_competency_detail_en + ") " + '</option>';
                    }
                    //end if

                }); //end foreach

                table += '</select>';
                table += '</td>';
                // select competency 

                table += '<td id="key_com_' + index + '"> </td>';
                // show keycom 

                table += '<td id="expected_' + index + '"> </td>';
                // show expected 

                table += '<td id="weight_tr_' + index + '" >';
                table += '<input type="number" class="form-control" id="weight_' + index +
                    '" name="arr_weight" min="0" max="100" required onchange="total_weight()" placeholder="Ex.50">';
                table += '</td>';
                // insert weight 

                table += '<td width="20%">';
                table +=
                    '<center><button type="button" class="btn btn-danger float-center btn_remove" id="delete_com' +
                    index + '" ><i class="fa fa-times"></i></button></center>';
                table += '</td>';
                // button delete 

                table += '</tr>';
                // end tr 
                $('#t01 tbody').append(table);
            }

        }); //end ajax

    }); // add compentency

    $(document).on('click', '.btn_remove', function() {
        console.log("-----delete -------");
        var button_id = $(this).attr("id");
        var res = button_id.substring(10);

        arr_weight_check = document.getElementById('weight_' + res + '').value;
        Number(arr_weight_check);
        sum_weight -= Number(arr_weight_check);
        Number(sum_weight);
        console.log(arr_weight_check);

        if (sum_weight == 100) {
            document.getElementById('value_total_weight').value = sum_weight;
            document.getElementById('value_total_weight').style.color = "black"
        } else {
            document.getElementById('value_total_weight').value = sum_weight;
            document.getElementById('value_total_weight').style.color = "red"
        }
        console.log("button : " + res);
        for (i = 0; i < arr_save_index_arr_add_pos.length; i++) {
            chack_arr = parseInt(arr_save_index_arr_add_pos[i])
            if (parseInt(chack_arr) == (parseInt(res) - 1)) {
                arr_save_index_arr_add_pos.splice(i, 1);
            }
        }
        console.log(arr_save_index_arr_add_pos);
        $('#row_com' + res + '').remove();
        //index--;
    }); // delete compentency

});


/*
 * get_compentency
 * Display -
 * @input competency ID, index of competency
 * @output key component, expected
 * @author  Tanadon Tangjaimongkhon 
 * @Create Date 2563-10-29
 */
function get_compentency(value, index) {
    var competency_id = value; //competency ID
    var table_key = '' // value key component for show on table
    var table_expected = ''; // value expected for show on table

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_form/get_key_component",
        data: {
            "competency_id": competency_id,
            "pos_id": value_pos_id
        },
        dataType: "JSON",
        success: function(data) {

            //start foreach
            data.forEach((row, index) => {

                //start if
                if (index == 0) {
                    table_key += row.kcp_key_component_detail_en + " (" + row
                        .kcp_key_component_detail_th + ")";
                } else {
                    table_key += '<hr>';
                    table_key += row.kcp_key_component_detail_en + " (" + row
                        .kcp_key_component_detail_th + ")";
                }
                //end if-else

            });
            //end foreach

            $('#key_com_' + index).html(table_key);
        }
    });
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_form/get_expected",
        data: {
            "competency_id": competency_id,
            "pos_id": value_pos_id
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            //start foreach
            data.forEach((row, i) => {

                //start if
                if (i == 0) {
                    table_expected += row.ept_expected_detail_en + " (" + row
                        .ept_expected_detail_th + ")";
                } else {
                    table_expected += '<hr>';
                    table_expected += row.ept_expected_detail_en + " (" + row
                        .ept_expected_detail_th + ")";
                }
                //end if-else

            });
            //end foreach

            $('#expected_' + index).html(table_expected);
        }
    });
}
/*
 * form_ability_input
 * Display -
 * @input competency data, weight of competency
 * @output insert competency data, weight of competency to database
 * @author  Tanadon Tangjaimongkhon 
 * @Create Date 2563-10-29
 */
function form_ability_update() {
    var arr_competency = []; // array of competency
    var arr_weight = []; // array of weight

    for (i = 0; i < arr_save_index_arr_add_pos.length; i++) {
        arr_competency.push($('#compentency' + (parseInt(arr_save_index_arr_add_pos[i])+1)).val());
        arr_weight.push($('#weight_' + (parseInt(arr_save_index_arr_add_pos[i])+1)).val());
        console.log(arr_save_index_arr_add_pos[i]);
    }
    //end for loop

    console.log(arr_competency);
    console.log(arr_weight);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_ability_form/form_ability_update",
        data: {
            "arr_competency": arr_competency,
            "arr_weight": arr_weight,
            "index": arr_save_index_arr_add_pos.length,
            "pos_id": value_pos_id,
            "year_id": value_year_id
        },
        dataType: "JSON",
        success: function(data) {

        }
    });
}
//form_ability_input()

/*
 * confirm_save
 * Display -
 * @input -
 * @output confirm modal
 * @author  Tanadon Tangjaimongkhon 
 * @Create Date 2564-02-05
 */
function confirm_save() {
    if (check_weight_all() == true) {
        form_ability_update();
        change_status();
        success_save();
        window.location = "<?php echo base_url(); ?>/Evs_form/form_position/" + value_pos_id + "/" + value_year_id;
    }
}
/*
 * success_save
 * Display -
 * @input -
 * @output alert after save
 * @author  Tanadon Tangjaimongkhon 
 * @Create Date 2564-02-05
 */
function success_save() {
    var alert_success = "";
    alert_success += '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">';
    alert_success += '<span class="badge badge-pill badge-success">Success</span>';
    alert_success += 'You successfully to manage ACM form.';
    alert_success += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    alert_success += '<span aria-hidden="true">&times;</span>';
    alert_success += '</button>';
    alert_success += '</div>';
    $('#success_save').html(alert_success);
}

/*
 * change_status
 * Display -
 * @input -
 * @output change for status form 
 * @author  Tanadon Tangjaimongkhon 
 * @Create Date 2563-10-29
 */
function change_status() {
    var form_name = "ACM"; //form name
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_form/change_status_ce",
        data: {

            "pos_id": value_pos_id, //position id
            "form_name": form_name // name of form

        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status);

        }
    });
}
//change_status()
</script>

<style>
#t01 th {

    background-color: #2c2c2c;
    color: white;

}

#panel_th_topManage {
    background-color: #c1432e;
}

input[type=number] {
    text-align: center;
}

#confirm_save {
    position: absolute;
    float: left;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}
</style>

<!-- Start Page Content -->
<div class="container-fluid">

    <div class="col-lg-12">
        <!-- Start Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3" id="panel_th_topManage">
                <div class="col-xl-12">

                    <h1 class="m-0 font-weight-bold text-primary">
                        <a
                            href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $info_pos_id; ?>/<?php echo $row->pay_id; ?>">
                            <i class="fa fa-chevron-circle-left text-white"></i>
                        </a>
                        <i class="fa fa-book text-white"></i>
                        <font color="white">&nbsp;Manage Form : ACM Form</font>
                    </h1>
                </div>
            </div>
            <div class="card-body">

                <div class="row">

                    <!-- Start Widgets -->
                    <div class="col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat">
                                            <?php 
                                                $row = $info_pos->row();
                                                echo $row->psl_position_level;
                                                // display level of position
                                            ?>
                                        </div>
                                        <div class="text-left dib">
                                            <div class="stat-text"><span>
                                                    <?php 
                                                   
                                                    echo $row->Position_name;
                                                    // display name of position

                                                    ?>

                                                </span></div>
                                            <div class="stat-heading">Position</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widgets  -->

                    <!-- Start Widgets -->
                    <div class="col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat">Fiscal year :
                                            <?php $row = $info_pattern_year->row();  echo $row->pay_year;?> </div>
                                        <div class="text-left dib">
                                            <br>

                                            <!-- start patten grade -->
                                            <div class="stat">Grade pattern :
                                                <?php 

                                                echo $row->pay_pattern;
                                                // display Grade pattern

                                                ?>
                                            </div>
                                            <!--End  pattern grade -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widgets  -->
                </div>
                <div class="float-right" id="success_save">

                </div>
                <!-- Start table -->
                <table id="t01" border="1" class="table table-hover" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">
                                <center>
                                    <font color="white">#</font>
                                </center>
                            </th>
                            <th width="15%">
                                <center>
                                    <font color="white">Competency</font>
                                </center>
                            </th>
                            <th width="35%">
                                <center>
                                    <font color="white">Key component</font>
                                </center>
                            </th>
                            <th width="35%">
                                <center>
                                    <font color="white">Expected Behavior</font>
                                </center>
                            </th>
                            <th width="35%">
                                <center>
                                    <font color="white">Weight</font>
                                </center>
                            </th>
                            <th width="5%">
                                <center>
                                    <font color="white">Manage</font>
                                </center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>


                    <tfoot>

                    </tfoot>

                </table>

                <!-- End table  -->
                <div align="right">
                    <button type="button" class="btn btn-success float-center" id="addCompentency"><i
                            class="fa fa-plus"></i> Add</button>
                </div>
                <br>
                <!-- End Back to main form by position  -->
                <div class="row">
                    <div class="col-sm-12" align="right">
                        <a
                            href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $info_pos_id; ?>/<?php echo $row->pay_id; ?>">
                            <button type="button" class="btn btn-secondary float-left">Back</button>
                        </a>
                        <button type="button" class="btn btn-success float-right" id="save_data" data-toggle="modal"
                            data-target="#confirm_save">Save</button>

                    </div>
                    <!-- End Back to main form by position  -->
                </div>
                <hr>
                <!-- Start Description -->
                <div>
                    <h4 class="text">Description</h4><br>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Status : Status perform manage</h5><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5">
                        <p>Managed : Perform manage finished</p>
                    </div>
                    <div class="col-sm-6">
                        <p>No manage : Perform manage Not finished</p>
                    </div>

                </div>
                <!-- Status  -->
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <h5>Tools : Evaluation tools</h5><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <p>PE : Performent Evaluation</p>
                        <p>CE : Compentency Evaluation</p>
                    </div>
                </div>
                <!-- Tools -->

                <hr>

                <!-- End Description -->

            </div>
        </div>

        <br>
    </div>
</div>
<!--End Page Content -->

<div class="modal fade" id="confirm_save" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <h4 class="modal-title" id="staticModalLabel">
                    <center>Do you want to save ?</center>
                </h4>
            </div>
            <!-- header   -->

            <div class="modal-body">
                <p>
                    Please verify the accuracy of the information.
                </p>
            </div>
            <!-- body  -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary float-left" data-dismiss="modal"
                    id="cancel_modal">Cancel</button>
                <button type="button" class="btn btn-success float-right" id="confirm_modal" onclick="confirm_save()"
                    data-dismiss="modal">Confirm</button>
            </div>
            <!-- footer  -->
        </div>
        <!-- content -->
    </div>
    <!-- modal-dialog modal-md -->
</div>
<!-- modal -->