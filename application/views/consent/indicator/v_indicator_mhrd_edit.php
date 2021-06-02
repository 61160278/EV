    <?php
    /*
    * v_indicator_mhrd_upddate
    * Add Indicator of Attitude
    * @input  -
    * @output -
    * @author Piyasak Srijan
    * @Create Date 2563-09-01
    */

    /*
    * v_ind_mhrd_update_data
    * Add Indicator of Attitude 
    * @input  id position and data item  
    * @output id position and data item to database  
    * @author Kunanya Singmee
    * @Update Date 2563-09-25
    */

    /*
    * v_ind_mhrd_update_data
    * Add Indicator of Attitude 
    * @input  id position and data item
    * @output id position and data item to database  
    * @author Pondruthai Loekngam
    * @Update Date 2563-09-28
    */
    /*
    * v_ind_mhrd_update_data
    * Add Indicator of Attitude 
    * @input  id position and data item  
    * @output id position and data item to database  
    * @author Jakkarin Pimpaeng
    * @Update Date 2563-10-16
    */
    ?>
    <script>
$(document).ready(function() {
    var index_pos = document.getElementById('index_add').value; //index table


    $("#addPostion").click(function() {
        $('#tr_Position_' + $(this).attr("value") + '').append(
            '<input type= "hidden" id = "id_index' + index_pos + '" value = "' + $(this).attr(
                "value") + '">' +
            '<div id="row_position' + index_pos + '">' +
            '<!-- Start input position  -->' +
            '<div class="row">' +
            '<div class="col-6">' +
            '<div class="row">' +
            '<div class="col-4" align="right">' +
            '<label for="textarea-input" class=" form-control-label">Position level : </label>' +
            '</div>' +
            '<!-- col-4  -->' +
            '<div class="col-8">' +
            '<select id="pos_lv_add_' + index_pos +
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
            '<div class="col-5" id="add_table_position_' + index_pos + '">' +
            '</div>' +
            '<div class="col-1" >' +
            '<button type="button" name="remove" id="' + index_pos +
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
        index_pos++;

    }); // add Postion

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
});


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
            drop_pos += '<select name="arr_add_pos[]" id="select" class="form-control">'
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
$(document).on('click', '.btn_remove_position', function() {
    var button_id = $(this).attr("id");
    $('#row_position' + button_id + '').remove();

}); //delect expected
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
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">

                <!-- Start Card Header -->
                <div class="card-header py-3" id="panel">
                    <div class="row">
                        <div class="col-xl-12">
                            <h1 class="m-0 font-weight-bold text-primary">
                                <a href="<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd">
                                    <i class="fa fa-chevron-circle-left text-white"></i>
                                </a>
                                <i class="fa fa-pencil-square text-white"></i>
                                <font color="white">Edit Items from MHRD</font>
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
                    <form class="form-horizontal" id="form_indicator_mhrd" method="post"
                        action="<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd_update">
                        <h3 class="m-0 ">Please edit indicator of form MHRD</h3><br>


                        <!-- Start table  -->
                        <div class="table" id="dynamic_field">

                            <!-- ------------------------------- Start item ------------------------------ -->

                            <!-- Start input item  -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label for="textarea-input" class=" form-control-label">item EN
                                                :</label>
                                        </div>
                                        <!-- col-4  -->
                                        <div class="col-8">
                                            <?php //Start foreach
                                     foreach($item_table_id->result() as $row ){
                                         $itm_item_detail_en  = $row->itm_item_detail_en; //save item en
                                         $itm_item_detail_th  = $row->itm_item_detail_th; //save item th
                                         $item_id  = $row->itm_id; //save item id
                                         }//End foreach
                                         ?>
                                            <textarea name="up_date_item_en" id="textarea-input" rows="3"
                                                placeholder="Enter item" class="form-control" style="resize: none"
                                                required><?php echo $itm_item_detail_en ?></textarea>
                                        </div>
                                        <!-- col-8  -->
                                    </div>
                                    <!-- row  -->
                                </div>
                                <!-- col-6-1  -->

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label for="textarea-input" class=" form-control-label">item EN
                                                :</label>
                                        </div>
                                        <!-- col-4  -->
                                        <div class="col-8">

                                            <textarea name="up_date_item_th" id="textarea-input" rows="3"
                                                placeholder="Enter item" class="form-control" style="resize: none"
                                                required><?php echo $itm_item_detail_th ?></textarea>
                                            <input type="input" name="item_id" value="<?php echo $item_id  ?>" hidden>
                                        </div>
                                        <!-- col-8  -->
                                    </div>
                                    <!-- row  -->
                                </div>
                                <!-- col-6-1  -->
                            </div>
                            <!-- row  -->

                            <hr>
                            <!-- ------------------------------- End item -------------------------------->

                            <!-- ------------------------------- Start Description ------------------------------ -->

                            <!-- Start input Description -->
                            <?php $index = 1; //index table
                                  $arry_index = 0; //index for remove description
                                  $chack = 0;
                              //Start foreach
                              foreach($item_table->result() as $row ){ ?>
                            <input type="input" name="arr_description_id[]" value="<?php echo $row->dep_id  ?>" hidden>
                            <?php  if($chack == 0){?>
                            <!-- for loop  -->



                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label for="textarea-input" class=" form-control-label">Description
                                                EN :</label>
                                        </div>
                                        <div class="col-8"><textarea name="arr_update_dep_en" id="text-Key" rows="2"
                                                placeholder="Enter Description" class="form-control"
                                                style="resize: none"
                                                required><?php echo $row->dep_description_detail_en; ?></textarea>
                                        </div>
                                    </div>
                                    <!-- row -->
                                </div>
                                <!-- col-6-1  -->
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label for="textarea-input" class=" form-control-label">Description
                                                TH :</label>
                                        </div>
                                        <!-- col-4  -->
                                        <div class="col-8"><textarea name="arr_update_dep_th" id="text-Key" rows="2"
                                                placeholder="Enter Description" class="form-control"
                                                style="resize: none"
                                                required><?php echo $row->dep_description_detail_th; ?></textarea>
                                        </div>
                                        <!-- col-8  -->
                                    </div>
                                    <!-- row -->
                                </div>
                                <!-- col-6-2  -->
                            </div>

                            <!-- row  -->
                            <br><br><br>
                            <?php $chack = 1; } ?>
                            <!-- End input Description -->
                            <div class="col-12" id="row<?php echo $arry_index; ?>">
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

                                            <div class="col-7">
                                                <select name="arr_update_pos[]" class="form-control">
                                                    <option>Select position</option>
                                                    <?php   //start if foreach
                                                                        foreach($item_position->result() as $row_chack ){ ?>
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

                                            <?php if($arry_index != 0){ ?>
                                            <div class="col-1">
                                                <button type="button" name="remove" id="<?php echo $arry_index; ?>"
                                                    class="btn btn-danger btn_remove"><i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            <?php } ?>

                                        </div>
                                        <!-- row id select_remove -->
                                    </div>
                                    <!-- col-6  -->
                                    <!-- End Position  -->

                                </div>
                                <!-- row  -->
                                <br>
                                <!-- Start button  -->



                            </div>
                            <!-- row+id  -->
                            <br>

                            <?php  $arry_index++; //update arry_index
                                  }//End foreach ?>
                            <input id="index_add" type="input" value="<?php echo $arry_index;  ?>" hidden>
                            <!-- include form function pos_level -->

                            <div id="tr_Position_1">
                            </div>


                            <div class="row">
                                <div class="col-md-12" align="right">
                                    <button type="button" class="btn btn-success float-center" id="addPostion"
                                        value="1"><i class="fa fa-plus"></i> Position</button>
                                </div>
                            </div>



                            <hr>
                        </div>
                        <!-- dynamic_field -->



                        <!-- -------------------------------End Description ------------------------------ -->

                        <!-- End button  add more  -->

                        <div class="row">
                            <div class="col-sm-12" align="right">
                                <br><br>
                                <!-- Start Back to main position  -->
                                <a href="<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd">
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