    <?php
    /*
    * v_indicator_attitude_upddate
    * Add Indicator of Attitude
    * @input  -
    * @output -
    * @author Piyasak Srijan
    * @Create Date 2563-09-01
    */

    /*
    * v_ind_attitude_update_data
    * Add Indicator of Attitude 
    * @input  id position and data cattagory  
    * @output id position and data cattagory to database  
    * @author Kunanya Singmee
    * @Update Date 2563-09-25
    */

    /*
    * v_ind_attitude_update_data
    * Add Indicator of Attitude 
    * @input  id position and data cattagory
    * @output id position and data cattagory to database  
    * @author Pondruthai Loekngam
    * @Update Date 2563-09-28
    */
    /*
    * v_ind_attitude_update_data
    * Add Indicator of Attitude 
    * @input  id position and data cattagory  
    * @output id position and data cattagory to database  
    * @author Jakkarin Pimpaeng
    * @Update Date 2563-10-16
    */
    ?>
    <script>
$(document).ready(function() {
    var index_pos = document.getElementById('index_add').value; //index table

    $('#add').click(function() {
        index_pos++;
        $('#dynamic_field').append(
            '<div id="row' + index_pos + '">' +
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
            '<select id="pos_lv_' + index_pos +
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
            '<div class="col-6" id="add_table_' + index_pos + '">' +
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
            '<button type="button" name="remove" id="' + index_pos +
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
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });


});
<?php
/*
* pos_level
* Display manage indicator
* @input  possition level 
* @output possition level change dropdown
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/
?>

function pos_level(id) {
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
            drop_pos += '<select name="arr_update_pos[]" id="select" class="form-control">'
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
    $('#select_remove' + key_pos_lv_check + '').remove();
}
/*
 * add_pos_level
 * Display manage indicator
 * @input  possition level
 * @output possition level to dropdown
 * @author Kunanya Singmee
 * @Update Date 2563-09-25
 */
function add_pos_level(id) {
    var key_pos_lv; //save position level
    var key_pos_lv_check = id.substring(7); //save position level as table

    Number(key_pos_lv_check); //change string to int
    console.log(key_pos_lv_check);


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
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">

                <!-- Start Card Header -->
                <div class="card-header py-3" id="panel">
                    <div class="row">
                        <div class="col-xl-12">
                            <h1 class="m-0 font-weight-bold text-primary">
                                <a href="<?php echo base_url(); ?>/Evs_attitude_indicators_form/indicator_attitude">
                                    <i class="fa fa-chevron-circle-left text-white"></i>
                                </a>
                                <i class="fa fa-pencil-square text-white"></i>
                                <font color="white">Edit Items from Attitude&Behavior</font>
                            </h1>
                        </div>
                        <!-- style="font-size:40px;color:white" -->
                    </div>
                    <!-- row  -->
                </div>
                <!-- End Card Header -->


                <!-- Start Card body -->
                <div class="card-body">
                    <!-- Start Form : Attitude -->
                    <form class="form-horizontal" id="form_indicator_attitude" method="post"
                        action="<?php echo base_url(); ?>/Evs_attitude_indicators_form/indicator_attitude_update">
                        <h3 class="m-0 ">Please edit indicator of form Attitude & Behavior</h3><br>


                        <!-- Start table  -->
                        <div class="table" id="dynamic_field">

                            <!-- ------------------------------- Start Category ------------------------------ -->

                            <!-- Start input Category  -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label for="textarea-input" class=" form-control-label">Category EN
                                                :</label>
                                        </div>
                                        <!-- col-4  -->
                                        <div class="col-8">
                                            <?php //Start foreach
                                     foreach($cattagory_table_id->result() as $row ){
                                         $ctg_category_detail_en  = $row->ctg_category_detail_en; //save category en
                                         $ctg_category_detail_th  = $row->ctg_category_detail_th; //save category th
                                         $cattagory_id  = $row->ctg_id; //save category id
                                         }//End foreach
                                         ?>
                                            <textarea name="up_date_category_en" id="textarea-input" rows="3"
                                                placeholder="Enter Category" class="form-control" style="resize: none"
                                                required><?php echo $ctg_category_detail_en ?></textarea>
                                        </div>
                                        <!-- col-8  -->
                                    </div>
                                    <!-- row  -->
                                </div>
                                <!-- col-6-1  -->

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label for="textarea-input" class=" form-control-label">Category EN
                                                :</label>
                                        </div>
                                        <!-- col-4  -->
                                        <div class="col-8">
                                            <?php //Start foreach
                                     foreach($cattagory_table_id->result() as $row ){
                                         $ctg_category_detail_en  = $row->ctg_category_detail_en; //save category en
                                         $ctg_category_detail_th  = $row->ctg_category_detail_th; //save category th
                                         $cattagory_id  = $row->ctg_id; //save category id
                                         }//End foreach
                                         ?>
                                            <textarea name="up_date_category_th" id="textarea-input" rows="3"
                                                placeholder="Enter Category" class="form-control" style="resize: none"
                                                required><?php echo $ctg_category_detail_th ?></textarea>
                                            <input type="input" name="category_id" value="<?php echo $cattagory_id  ?>"
                                                hidden>
                                        </div>
                                        <!-- col-8  -->
                                    </div>
                                    <!-- row  -->
                                </div>
                                <!-- col-6-1  -->
                            </div>
                            <!-- row  -->

                            <hr>
                            <!-- ------------------------------- End Category -------------------------------->

                            <!-- ------------------------------- Start Identification ------------------------------ -->

                            <!-- Start input Identification -->
                            <?php $index = 1; //index table
                                  $arry_index = 0; //index for remove identification
                              //Start foreach
                              foreach($cattagory_table->result() as $row ){ ?>
                            <!-- for loop  -->

                            <div class="col-12" id="row<?php echo $arry_index; ?>">
                                <input type="input" name="arr_identification_id[]" value="<?php echo $row->idf_id  ?>"
                                    hidden>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4" align="right">
                                                <label for="textarea-input" class=" form-control-label">Identification
                                                    EN :</label>
                                            </div>
                                            <div class="col-8"><textarea name="arr_update_iden_en[]" id="text-Key"
                                                    rows="2" placeholder="Enter Identification" class="form-control"
                                                    style="resize: none"
                                                    required><?php echo $row->idf_identification_detail_en; ?></textarea>
                                            </div>
                                        </div>
                                        <!-- row -->
                                    </div>
                                    <!-- col-6-1  -->
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4" align="right">
                                                <label for="textarea-input" class=" form-control-label">Identification
                                                    TH :</label>
                                            </div>
                                            <!-- col-4  -->
                                            <div class="col-8"><textarea name="arr_update_iden_th[]" id="text-Key"
                                                    rows="2" placeholder="Enter Identification" class="form-control"
                                                    style="resize: none"
                                                    required><?php echo $row->idf_identification_detail_th; ?></textarea>
                                            </div>
                                            <!-- col-8  -->
                                        </div>
                                        <!-- row -->
                                    </div>
                                    <!-- col-6-2  -->
                                </div>
                                <!-- row  -->
                                <br><br><br>
                                <!-- End input Identification -->

                                <!-- Start section-1 col-5-12 -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4" align="right">
                                                <label for="textarea-input" class=" form-control-label">
                                                    Position level :
                                                </label>
                                            </div>
                                            <!-- col-4  -->

                                            <?php 
                                                        $text_selected_top = "";     //check show position manage top
                                                        $text_selected_middle ="";   //check show position manage middle
                                                        $text_selected_Junior ="";   //check show position manage Junior
                                                        $text_selected_Staf ="";    //check show position manage Staf
                                                        $text_selected_Officier =""; //check show position manage Officier
                                                        //Start if
                                                        if($row->position_level_id =="1" ){$text_selected_top = 'selected';}
                                                        //End if
                                                        //Start if
                                                        if($row->position_level_id =="2" ){$text_selected_middle = 'selected';}
                                                        //End if
                                                        //Start if
                                                        if($row->position_level_id =="3" ){$text_selected_Junior = 'selected';}
                                                        //End if
                                                        //Start if
                                                        if($row->position_level_id =="4" ){$text_selected_Staf = 'selected';}
                                                        //End if
                                                        //Start if
                                                        if($row->position_level_id =="5" ){$text_selected_Officier = 'selected';}
                                                        //End if
                                                            ?>
                                            <div class="col-8">
                                                <select id="pos_lv_<?php echo $arry_index; ?>" class="form-control"
                                                    onchange="pos_level(id) ">
                                                    <option>Select position level</option>
                                                    <option value="1" <?php echo $text_selected_top; ?>>
                                                        Top Management
                                                    </option>
                                                    <option value="2" <?php echo $text_selected_middle; ?>>
                                                        Middle Management
                                                    </option>
                                                    <option value="3" <?php echo $text_selected_Junior; ?>>
                                                        Junior Management
                                                    </option>
                                                    <option value="4" <?php echo $text_selected_Staf; ?>>
                                                        Staff
                                                    </option>
                                                    <option value="5" <?php echo $text_selected_Officier; ?>>
                                                        Officier
                                                    </option>
                                                </select>
                                                <!-- seclect position level  -->
                                            </div>
                                            <!-- col-8  -->
                                        </div>
                                        <!-- row  -->
                                    </div>
                                    <!-- col-6  -->
                                    <!-- End Level  -->

                                    <!-- Start Position  -->
                                    <div class="col-6">
                                        <div id="add_table_<?php echo $arry_index; ?>"></div>
                                        <!-- add select after change level  -->
                                        <div class="row" id="select_remove<?php echo $arry_index; ?>">
                                            <div class="col-4" align="right">
                                                <label for="textarea-input" class=" form-control-label">
                                                    Position :
                                                </label>
                                            </div>
                                            <!-- text position  -->

                                            <div class="col-8">
                                                <select name="arr_update_pos[]" class="form-control">
                                                    <option>Select position</option>
                                                    <?php   //start if foreach
                                                                        foreach($cattagory_position->result() as $row_chack ){ ?>
                                                    <?php       //start if position_level_id
                                                                            if($row_chack->position_level_id == $row->position_level_id){ ?>
                                                    <?php           //start if Position_ID
                                                                                if($row_chack->Position_ID == $row->Position_ID){  ?>
                                                    <option value="<?php echo $row_chack->Position_ID; ?>" selected>
                                                        <?php echo $row_chack->Position_name;?></option>
                                                    <?php } //End if Position_ID
                                                                                //start else
                                                                                else {?>
                                                    <option value="<?php echo $row_chack->Position_ID; ?>">
                                                        <?php echo $row_chack->Position_name;?></option>
                                                    <?php           }//End else
                                                                            }//End if position_level_id
                                                                        } //End foreach  ?>
                                                </select>
                                            </div>
                                            <!-- col-8  -->
                                        </div>
                                        <!-- row id select_remove -->
                                    </div>
                                    <!-- col-6  -->
                                    <!-- End Position  -->

                                </div>
                                <!-- row  -->

                                <!-- Start button  -->
                                <?php if($arry_index != 0){ ?>
                                <div class="row">
                                    <div class="col-12" align="right">
                                        <button type="button" name="remove" id="<?php echo $arry_index; ?>"
                                            class="btn btn-danger btn_remove"><i class="fa fa-times">
                                                Delete
                                            </i>
                                        </button>
                                    </div>
                                    <!-- col-12  -->
                                </div>
                                <!-- row  -->
                                <?php } ?>
                                <!-- End if  -->
                                <!-- End button  -->

                            </div>
                            <!-- row+id  -->
                            <br>

                            <?php  $arry_index++; //update arry_index
                                  }//End foreach ?>
                            <input id="index_add" type="input" value="<?php echo $arry_index;  ?>" hidden>
                            <!-- include form function pos_level -->
                            <hr>
                        </div>
                        <!-- dynamic_field -->



                        <!-- -------------------------------End Identification ------------------------------ -->

                        <!-- Start button  add more  -->
                        <div class="row">
                            <div class="col-12" align="right">
                                <!-- Start Add More  -->
                                <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                <!-- End Add More  -->
                            </div>
                            <!-- col-sm-12 -->
                        </div>
                        <!-- row  -->
                        <!-- End button  add more  -->

                        <div class="row">
                            <div class="col-sm-12" align="right">
                                <br><br>
                                <!-- Start Back to main position  -->
                                <a href="<?php echo base_url(); ?>/Evs_attitude_indicators_form/indicator_attitude">
                                    <button type="button" class="btn btn-secondary">Back</button>
                                </a>
                                <!-- End Back to main position  -->

                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            <!-- col-sm-12  -->
                        </div>
                        <!-- row  -->

                    </form>
                    <!-- End form method post   -->





                </div>
                <!-- End Card body -->

                <!-- End Class table  -->
                <!-- End Form : Attitude-->

            </div>
            <!-- card shadow mb-4  -->
        </div>
        <!-- col-12  -->

    </div>
    <!-- End Page Content -->