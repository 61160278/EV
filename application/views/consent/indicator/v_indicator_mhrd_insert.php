<?php
/*
* v_indicator_mhrd_insert
* Add Indicator of Attitude
* @input  -
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/

/*
* v_indicator_mhrd_insert
* Add Indicator of Attitude 
* @input  -
* @output mhrd for insert
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/

/*
* v_indicator_mhrd_insert
* Add Indicator of Attitude 
* @input  -
* @output mhrd for insert
* @author Jirayu​ Jaravichit
* @Update Date 2563-09-27
*/
?>
<script>
$(document).ready(function() {
    var index = 1; //index table

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id"); //remove description
        $('#row' + button_id + '').remove();
    });

    $("#addPostion").click(function() {
        $('#tr_Position_' + $(this).attr("value") + '').append(
            '<input type= "hidden" id = "id_index' + index + '" value = "' + $(this).attr(
                "value") + '">' +
            '<div id="row_position' + index + '">' +
            '<!-- Start input position  -->' +
            '<div class="row">' +
            '<div class="col-6">' +
            '<div class="row">' +
            '<div class="col-4" align="right">' +
            '<label for="textarea-input" class=" form-control-label">Position level:</label>' +
            '</div>' +
            '<!-- col-4  -->' +
            '<div class="col-8">' +
            '<select id="pos_lv_add_' + index +
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
            '<div class="col-5" id="add_table_position_' + index + '">' +
            '</div>' +
            '<div class="col-1" >' +
            '<button type="button" name="remove" id="' + index +
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
        index++;

    }); // add Postion
    $(document).on('click', '.btn_remove_position', function() {
        var button_id = $(this).attr("id");
        $('#row_position' + button_id + '').remove();

    }); //delect expected


});
<?php
/*
* add_pos_level
* Display manage indicator
* @input  possition level
* @output possition level to dropdown
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/
?>

function add_pos_level(id) {
    var key_pos_lv; //save position level
    var key_pos_lv_check = id.substring(7); //save position level as table
    Number(key_pos_lv_check); //change string to int
    key_pos_lv = document.getElementById('pos_lv_' + key_pos_lv_check + '').value;

    console.log(key_pos_lv);
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_mhrd_indicators_form/get_position_indicator",
        data: {
            "key_pos_lv": key_pos_lv
        },
        dataType: "JSON",
        success: function(data) {
            // var res = JSON.parse(data);
            console.log(data)
            var drop_pos = ""; //dropdown position
            // Start col-12 
            drop_pos += '<div class="row">'

            // Start label position 
            drop_pos += '<div class="col-4" align="right">'
            drop_pos += '<label for="textarea-input"'
            drop_pos += 'class=" form-control-label">Position :</label>'
            drop_pos += '</div>'
            // col-2 
            // End label position

            // Start select 
            drop_pos += '<div class="col-8">'
            drop_pos += '<select name="arr_add_pos[]" id="select" class="form-control">'
            drop_pos += '<option>Select position</option>'
            //Start forEach
            data.forEach((row, index) => {
                drop_pos += '<option value="' + row.Position_ID + '">' + row.Position_name +
                    '</option>'
            });
            //end forEach
            drop_pos += '</select>'
            drop_pos += '</div>'
            // End select col-10
            drop_pos += '</div>'
            // row 
            $('#add_table_' + key_pos_lv_check + '').html(drop_pos);

        }
    });
}


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
            drop_pos += '<select name="arr_add_new_pos[]" id="select" class="form-control">'
            drop_pos += '<option>Select position</option>'
            //Start forEach
            data.forEach((row, index) => {
                drop_pos += '<option value="' + row.Position_ID + '">' + row.Position_name +
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
</script>
<!-- Start Css -->
<style>
#panel {
    background-color: #c1432e;
}

#add_item {
    width: 30%;
}
</style>
<!-- End Css -->
<!-- Start Page Content -->
<div class="col-lg-12">
    <!-- Start card shadow mb-4 -->
    <div class="card shadow mb-4">
        <!-- Start Card header -->
        <div class="card-header py-3" id="panel">
            <div class="col-xl-12">
                <h1 class="m-0 font-weight-bold text-primary">
                    <a href="<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd">
                        <i class="fa fa-chevron-circle-left text-white"></i>
                    </a>
                    <i class="fa fa-pencil-square text-white"></i>
                    <font color="white">Items from MRHD</font>
                </h1>
            </div>

        </div>
        <!-- End Card header -->
        <!-- Start Card body -->
        <div class="card-body">
            <!-- Start Form : Attitude -->
            <form class="form-horizontal" id="form_indicator_mhrd" method="post"
                action="<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd_insert">
                <h3 class="m-0 ">Please increase Items of form MHRD</h3><br>


                <!-- Start table  -->
                <div class="table" id="dynamic_field">

                    <!-- Start input Item  -->
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label for="textarea-input" class=" form-control-label">Item EN :</label>
                                </div>
                                <!-- col-4  -->
                                <div class="col-8">
                                    <textarea name="add_item_en" id="textarea-input" rows="3" placeholder="Enter Item"
                                        class="form-control" style="resize: none" required></textarea>
                                </div>
                                <!-- col-8  -->
                            </div>
                            <!-- row  -->
                        </div>
                        <!-- col-6-1  -->

                        <div class="col-6">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label for="textarea-input" class=" form-control-label">Item TH :</label>
                                </div>
                                <!-- col-4  -->
                                <div class="col-8">
                                    <textarea name="add_item_th" id="textarea-input" rows="3" placeholder="Enter Item"
                                        class="form-control" style="resize: none" required></textarea>
                                </div>
                                <!-- col-8  -->
                            </div>
                            <!-- row  -->
                        </div>
                        <!-- col-6-2  -->
                    </div>
                    <!-- End input Item  -->
                    <hr>

                    <!-- Start input description -->
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label for="textarea-input" class=" form-control-label">description EN :</label>
                                </div>
                                <div class="col-8"><textarea name="arr_add_dep_en[]" id="text-Key" rows="2"
                                        placeholder="Enter description" class="form-control" style="resize: none"
                                        required></textarea>
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                        <!-- col-6-1  -->
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label for="textarea-input" class=" form-control-label">description TH :</label>
                                </div>
                                <!-- col-4  -->
                                <div class="col-8"><textarea name="arr_add_dep_th[]" id="text-Key" rows="2"
                                        placeholder="Enter description" class="form-control" style="resize: none"
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
                    <!-- End input description -->

                    <!-- Start input position  -->
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label for="textarea-input" class=" form-control-label">Position level:</label>
                                </div>
                                <!-- col-4  -->
                                <div class="col-8">
                                    <select id="pos_lv_1" class="form-control" onchange="add_pos_level(id) ">
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

                </div>
                <!-- End input position  -->


                <!-- End Form : Attitude-->
                <!-- Start row -->
                <div class="row">
                    <div class="col-sm-12" align="right">


                        <a href="<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>
                        <!-- Back to main position  -->

                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- end row -->
            </form>
            <!-- end form method post   -->
        </div>
        <!-- End Class table  -->
    </div>
    <!-- end Card body -->
</div>
<!-- end card shadow mb-4 -->
</div>
<!-- end Page Content -->