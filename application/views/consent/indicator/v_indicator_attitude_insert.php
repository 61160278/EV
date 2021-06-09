<?php
/*
* v_indicator_attitude_insert
* Add Indicator of Attitude
* @input  -
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/

/*
* v_indicator_attitude_insert
* Add Indicator of Attitude 
* @input  -
* @output attitude for insert
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/

/*
* v_indicator_attitude_insert
* Add Indicator of Attitude 
* @input  -
* @output attitude for insert
* @author Jirayu​ Jaravichit
* @Update Date 2563-09-27
*/
?>
<script>
$(document).ready(function() {
    var index = 1; //index table
    $('#add').click(function() {
        index++; //upate inextable
        $('#dynamic_field').append(
            '<div id="row' + index + '">' +
            // id=row 
            '<!-- Start input Identification -->' +
            '<div class="row">' +
            '<div class="col-6">' +
            '<div class="row">' +
            '<div class="col-4" align="right">' +
            '<label for="textarea-input" class=" form-control-label">Identification EN :</label>' +
            '</div>' +
            '<div class="col-8"><textarea name="arr_add_iden_en[]" id="text-Key" rows="4"' +
            'placeholder="Enter Identification" class="form-control" style="resize: none"' +
            'required></textarea>' +
            '</div>' +
            '</div>' +
            '<!-- row -->' +
            '</div>' +
            '<!-- col-6-1  -->' +
            '<div class="col-6">' +
            '<div class="row">' +
            '<div class="col-4" align="right">' +
            '<label for="textarea-input" class=" form-control-label">Identification TH :</label>' +
            '</div>' +
            '<!-- col-4  -->' +
            '<div class="col-8"><textarea name="arr_add_iden_th[]" id="text-Key" rows="4"' +
            'placeholder="Enter Identification" class="form-control" style="resize: none"' +
            'required></textarea>' +
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
            '<select id="pos_lv_' + index +
            '" class="form-control" onchange="add_pos_level(id) ">' +
            '<option>Select position level</option>' +
            '<option value="1">Top Management</option>' +
            '<option value="2">Middle Management</option>' +
            '<option value="3">Junior Management</option>' +
            '<option value="4">Staff</option>' +
            '<option value="5">Officier</option>' +
            '</select>' +
            '</div>' +
            '<!-- seclect position level  -->' +
            '</div>' +
            '<!-- row  -->' +
            '</div>' +
            '<!-- col-6  -->' +
            '<div class="col-6" id="add_table_' + index + '">' +
            '</div>' +
            '<!-- include form function add_pos_level -->' +
            '</div>' +
            '<!-- row  -->' +

            '<br>' +

            '<div class="col-1"></div>' +

            '<!-- End input position  -->' +

            '<div class="row">' +
            // start col-12 button
            '<div class="col-12" align="right">' +
            '<button type="button" name="remove" id="' + index +
            '" class="btn btn-danger btn_remove"><i class="fa fa-times"> Delete </i> </button>' +
            '</div>' +
            // end col-12 button
            '</div>' +
            // End row button 

            '<hr>' +

            '</div>'
            // id row 


        );
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id"); //remove Identification
        $('#row' + button_id + '').remove();
    });
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
        url: "<?php echo base_url(); ?>/Evs_attitude_indicators_form/get_position_indicator",
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
</script>
<!-- Start Css -->
<style>
#panel {
    background-color: #c1432e;
}

#add_category {
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
                    <a href="<?php echo base_url(); ?>/Evs_attitude_indicators_form/indicator_attitude">
                        <i class="fa fa-chevron-circle-left text-white"></i>
                    </a>
                    <i class="fa fa-pencil-square text-white"></i>
                    <font color="white">Items from Attitude&Behavior</font>
                </h1>
            </div>

        </div>
        <!-- End Card header -->
        <!-- Start Card body -->
        <div class="card-body">
            <!-- Start Form : Attitude -->
            <form class="form-horizontal" id="form_indicator_attitude" method="post"
                action="<?php echo base_url(); ?>/Evs_attitude_indicators_form/indicator_attitude_insert">
                <h3 class="m-0 ">Please increase Items of form Attitude & Behavior</h3><br>


                <!-- Start table  -->
                <div class="table" id="dynamic_field">

                    <!-- Start input Category  -->
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label for="textarea-input" class=" form-control-label">Category EN :</label>
                                </div>
                                <!-- col-4  -->
                                <div class="col-8">
                                    <textarea name="add_category_en" id="textarea-input" rows="3"
                                        placeholder="Enter Category" class="form-control" style="resize: none"
                                        required></textarea>
                                </div>
                                <!-- col-8  -->
                            </div>
                            <!-- row  -->
                        </div>
                        <!-- col-6-1  -->

                        <div class="col-6">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label for="textarea-input" class=" form-control-label">Category TH :</label>
                                </div>
                                <!-- col-4  -->
                                <div class="col-8">
                                    <textarea name="add_category_th" id="textarea-input" rows="3"
                                        placeholder="Enter Category" class="form-control" style="resize: none"
                                        required></textarea>
                                </div>
                                <!-- col-8  -->
                            </div>
                            <!-- row  -->
                        </div>
                        <!-- col-6-2  -->
                    </div>
                    <!-- End input Category  -->
                    <hr>

                    <!-- Start input Identification -->
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label for="textarea-input" class=" form-control-label">Identification EN :</label>
                                </div>
                                <div class="col-8"><textarea name="arr_add_iden_en[]" id="text-Key" rows="2"
                                        placeholder="Enter Identification" class="form-control" style="resize: none"
                                        required></textarea>
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                        <!-- col-6-1  -->
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label for="textarea-input" class=" form-control-label">Identification TH :</label>
                                </div>
                                <!-- col-4  -->
                                <div class="col-8"><textarea name="arr_add_iden_th[]" id="text-Key" rows="2"
                                        placeholder="Enter Identification" class="form-control" style="resize: none"
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

                    <hr>

                    <div class="col-1"></div>

                </div>
                <!-- End input position  -->


                <!-- End Form : Attitude-->
                <!-- Start row -->
                <div class="row">
                    <div class="col-sm-12" align="right">

                        <button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i>
                            Add</button>
                        <br><br>
                        <a href="<?php echo base_url(); ?>/Evs_attitude_indicators_form/indicator_attitude">
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