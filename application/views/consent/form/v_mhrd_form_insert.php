<?php
/*
* v_mhrd_form_insert
* Display form mhrd management
* @input  - 
* @output -
* @author Tippawan Aiemsaad
* @Create Date 2563-10-11
*/ 
?>
<?php
/*
* v_mhrd_form_insert
* Display form mhrd management
* @input  - 
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-10-29
*/ 
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
    $row = $info_pattern_year->row();
    $year_id = $row->pay_id;
?>
<input type="hidden" id="value_pos_id" name="value_pos_id" value="<?php echo $info_pos_id; ?>">
<input type="hidden" id="year" name="year" value="<?php echo $year_id; ?>">
<script>
var index = 1; // number of data table
var value_pos_id = document.getElementById("value_pos_id").value; // position id
var value_year_id = document.getElementById("year").value; // year now ID
var sum_weight = 0; // sumary of weight
var arr_save_index_arr_add_pos = [];









$(document).ready(function() {
    var table_ready; // table ready
    var button_add; // button for add data
    var table_ready_score = '';




    //start get
    $.get("<?php echo base_url(); ?>/Evs_mhrd_form/get_item", function(data) {
        data = JSON.parse(data)
        table_ready += '<tr id="row_itm' + index + '">';
        table_ready += '<td>';
        table_ready += '<center>' + index + '</center>';
        table_ready += '</td>';
        table_ready += '<td>';
        table_ready += '<select name="item" id="item' + index +
            '" class="form-control" onchange="get_item(value,' + index + ')">';
        table_ready += '<option value = "0"> Please select</option>';

        //start foreach
        data.forEach((row, i) => {
            //start if
            if (value_pos_id == row.dep_pos_id) {
                table_ready += '<option value="' + row.itm_id + '">' + row
                    .itm_item_detail_en + " (" + row.itm_item_detail_th + ") " +
                    '</option>';

            }

            //end if
        });
        //end foreach

        table_ready += '</select>';
        table_ready += '</td>';
        table_ready += '<td id="dep_' + index + '"> </td>';
        table_ready += '<td >';
        table_ready +=
            '<input type="checkbox" class="form-control" name="checkbox_excel_export"   required>';
        table_ready += '</td>';
        table_ready += '<td ">';
        table_ready +=
            '<center><button type="button" class="btn btn-danger float-center btn_remove" id="delete_com' +
            index + '" ><i class="fa fa-times"></i></button></center>';
        table_ready += '</td>';
        table_ready += '</tr>';

        // end tr 

        $('#t01 tbody').html(table_ready);

    });
    //end get
    arr_save_index_arr_add_pos.push(index - 1);
    console.log(arr_save_index_arr_add_pos);
    $(document).on('click', '#add_item', function() {
        var table; // value for show on table
        index++;
        arr_save_index_arr_add_pos.push(index - 1);
        console.log(arr_save_index_arr_add_pos);
        //start get
        $.get("<?php echo base_url(); ?>/Evs_mhrd_form/get_item", function(data) {
            data = JSON.parse(data)
            table += '<tr id="row_itm' + index + '">';
            table += '<td>';
            table += '<center>' + index + '</center>';
            table += '</td>';
            table += '<td>';
            table += '<select name="item" id="item' + index +
                '" class="form-control" onchange="get_item(value,' + index + ')">';
            table += '<option value = "0"> Please select</option>';

            //start foreach
            data.forEach((row, i) => {
                //start if
                if (value_pos_id == row.dep_pos_id) {
                    table += '<option value="' + row.itm_id + '">' + row
                        .itm_item_detail_en + " (" + row.itm_item_detail_th +
                        ") " + '</option>';
                }
                //end if
            });
            //end foreach

            table += '</select>';
            table += '</td>';
            table += '<td id="dep_' + index + '"> </td>';
            table += '<td>';
            table +=
                '<input type="checkbox" name="checkbox_excel_export" class="form-control"  required>';
            table += '</td>';
            table += '<td width="20%">';
            table +=
                '<center><button type="button" class="btn btn-danger float-center btn_remove" id="delete_com' +
                index + '" ><i class="fa fa-times"></i></button></center>';
            table += '</td>';
            table += '</tr>';

            $('#t01 tbody').append(table);
        });
        //end get
    }); // add item data

    $(document).on('click', '.btn_remove', function() {
        //console.log("-----delete -------");
        var button_id = $(this).attr("id");
        var res = button_id.substring(10);

        console.log("button : " + res);
        for (i = 0; i < arr_save_index_arr_add_pos.length; i++) {
            chack_arr = parseInt(arr_save_index_arr_add_pos[i])
            if (parseInt(chack_arr) == parseInt(res) - 1) {
                arr_save_index_arr_add_pos.splice(i, 1);
            }
        }
        console.log(arr_save_index_arr_add_pos);

        $('#row_itm' + res + '').remove();
        //index--;
    }); // delete item data 

});

/*
 * get_compentency
 * Display description on data table
 * @input  item id, number of item data
 * @output description data
 * @author Tanadon Tangjaimongkhon
 * @Create Date 2563-10-29
 */
function get_item(value, index) {
    var item_id; // item ID
    var index_item = index; // index of item
    item_id = value;

    //start ajax
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_mhrd_form/get_item_by_position",
        data: {
            "item_id": item_id,
            "pos_id": value_pos_id
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            var table_dep = '' // value description for show on table
            var num = 0; //check for index data
            //start foreach
            data.forEach((row, i) => {
                if (num == 0) {
                    table_dep += row.dep_description_detail_en + " (" + row
                        .dep_description_detail_th + ")";
                } else {
                    table_dep += '<hr>'
                    table_dep += row.dep_description_detail_en + " (" + row
                        .dep_description_detail_th + ")";
                }
                num++;


            });
            //end foreach

            $('#dep_' + index_item).html(table_dep);
        }

    });
    //end ajax
}
//get_item()

/*
 * form_mhrd_input
 * Display 
 * @input  item id, weight
 * @output insert data to database
 * @author Tanadon Tangjaimongkhon
 * @Create Date 2563-10-29
 */
function form_mhrd_insert() {
    var arr_item = []; //array item data
    var checkbox_ex = []; // array weight data
    var checkbox_ex = [];


    for (i = 0; i < arr_save_index_arr_add_pos.length; i++) {
        arr_item.push($('#item' + (parseInt(arr_save_index_arr_add_pos[i]) + 1)).val());
        console.log(arr_save_index_arr_add_pos[i]);
    }
    //end for loop


    $('input[name = checkbox_excel_export]').each(function(index) {
        if ($(this).prop("checked") == true) {
            checkbox_ex.push(1);
        } else {
            checkbox_ex.push(0);
        }
    });




//console.log(arr_item);
console.log(checkbox_ex);

//start ajax
$.ajax({
    type: "post",
    url: "<?php echo base_url(); ?>/Evs_mhrd_form/form_mhrd_insert",
    data: {
        "arr_item": arr_item,
        "checkbox_ex": checkbox_ex,
        "index": arr_save_index_arr_add_pos.length,
        "pos_id": value_pos_id,
        "value_year_id": value_year_id

    },
    dataType: "JSON",
    success: function(data, status) {
        console.log(status);

    }
});
//end ajax
} // function form_mhrd_input()

/*
 * confirm_save
 * Display -
 * @input -
 * @output confirm modal
 * @author  Tanadon Tangjaimongkhon 
 * @Create Date 2564-02-05
 */
function confirm_save() {
    form_mhrd_insert();
    change_status();
    success_save();
    window.location = "<?php echo base_url(); ?>/Evs_form/form_position/" + value_pos_id + "/" + value_year_id;
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
    alert_success += ' You successfully to manage Attitude form.';
    alert_success += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    alert_success += '<span aria-hidden="true">&times;</span>';
    alert_success += '</button>';
    alert_success += '</div>';
    $('#success_save').html(alert_success);
}

/*
 * change_status
 * Display 
 * @input  pos id, form name
 * @output change status set form Attitude & Behavior to database
 * @author Tanadon Tangjaimongkhon
 * @Create Date 2563-10-29
 */
function change_status() {
    var form_name = "MHRD"; // form name
    //start ajax
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_form/change_status_pe",
        data: {

            "pos_id": value_pos_id,
            "form_name": form_name

        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status);

        }
    });
    //end ajax
} //change_status()
</script>

<style>
input[type=number] {
    text-align: center;
}

#t01 th {

    background-color: #2c2c2c;
    color: white;

}

#panel_th_topManage {
    background-color: #c1432e;
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
                        <font color="white">&nbsp;Manage Form : MHRD</font>
                    </h1>
                </div>
                <!-- col-xl-12 -->
            </div>
            <!-- card-header -->

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

                <!-- Start Table -->
                <table id="t01" border="1" class="table" width="100%">
                    <thead>
                        <tr>
                            <th width="3%">
                                <center>
                                    <font color="white">#</font>
                                </center>
                            </th>
                            <th width="35%">
                                <center>
                                    <font color="white">Item</font>
                                </center>
                            </th>
                            <th width="50%">
                                <center>
                                    <font color="white">description</font>
                                </center>
                            </th>
                            <th width="5%">
                                <center>
                                    <font color="white">excel export</font>
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


                </table>

                <div align="right">
                    <button type="button" class="btn btn-success float-center" id="add_item"><i class="fa fa-plus"></i>
                        Add</button>
                </div>
                <br>
                <!-- End table  -->
                <!-- Start Back to main form by position  -->
                <div class="row">
                    <div class="col-sm-12" align="right">

                        <a
                            href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $info_pos_id; ?>/<?php echo $row->pay_id; ?>">
                            <button type="button" class="btn btn-secondary">Back</button>
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
            <!-- card-body -->
        </div>
        <!-- End Card shadow mb-4 -->
        <br>
    </div>
    <!-- col-lg-12 -->
</div>
<!-- End Page Content -->


<!-- Start modal -->
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
<!-- End modal -->