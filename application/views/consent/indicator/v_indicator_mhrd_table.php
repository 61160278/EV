<?php
/*
* v_indicator_mhrd_table
* Display manage indicator
* @input  - 
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/

/*
* v_indicator_mhrd_table
* Display manage indicator
* @input  data mhrd
* @output show data mhrd
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/

/*
* v_indicator_mhrd_table
* Display manage indicator
* @input  data mhrd
* @output show data mhrd
* @author Kanchanaphitcha Meesuk
* @Update Date 2563-09-27
*/
?>


<script>
$(document).ready(function() {
    get_data_for_item_table(); //get all data for item table 
});
// document ready
<?php
/*
* get_all_data_for_item_table
* Display manage indicator
* @input  data mhrd all
* @output data mhrd for position
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/
?>

function get_data_for_item_table() {

    var $table = '' //add data for table
    var cate_en = '' //save item detail en
    var cate_th = '' //save item detail th
    var index_catagory = 1 //index catagory
    var index_check = 1 //index check loop
    var check_del = 0 //index check delete
    var cate_sel = document.getElementById("cate_select").value; // get kay by id
    var pos_lv_sel = document.getElementById("pos_lv_select").value; // get kay by id
    console.log(cate_sel)
    console.log(pos_lv_sel)

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd_table",
        data: {
            "itm_id": cate_sel,
            "pos_psl_id": pos_lv_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)


            data.forEach((row, index) => {

                if (index == 0) {
                    cate_check = row.itm_id
                    cate_en = row.itm_item_detail_en
                    cate_th = row.itm_item_detail_th
                    index_catagory = index_check
                    chack_Manage = 0;


                    $table += '<tr>'
                    $table += '<td>'
                    $table += index_catagory
                    $table += '</td>'
                    // show index 

                    $table += '<td>'
                    $table += row.itm_item_detail_en + '<br>' + row.itm_item_detail_th
                    $table += '</td>'
                    // show key_component

                    $table += '<td>'
                    $table += row.dep_description_detail_en + '<br>' + row
                        .dep_description_detail_th
                    $table += '</td>'
                    // show expected_detail

                    $table += '<td>'
                    data.forEach((row2, index) => {
                        if (row2.itm_item_detail_en == row.itm_item_detail_en) {
                            $table += row2.Position_name + "<br>"
                        }
                    })
                    $table += '</td>'
                    // show position 
                    if (chack_Manage == 0) {
                        $table += '<td >'
                        $table += '<center>'
                        $table +=
                            '<a href="<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd_view_edit_data/' +
                            row.itm_id + '"><button class="btn btn-warning float-center">'
                        $table +=
                            '<i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit &nbsp;</button></p></a>'
                        // button edit in manage 

                        $table +=
                            '<button type="button" class="btn btn-danger float-center"data-toggle="modal" href="#myModal_delete" Onclick="send_id_to_delete(' +
                            row.itm_id + ')">'
                        $table += '<i class="fa fa-times"></i>Delete</button>'
                        // button delete in manage 
                        $table += '</center>'
                        $table += '</td>'
                        chack_Manage = 1;
                    }

                    // manage 

                    $table += '<tr>'
                }
                // if
                else if (cate_check == row.itm_id) {
                    cate_en = ''
                    cate_th = ''
                    cate_check = cate_check
                    index_catagory = ''



                }
                // else if
                else if (cate_check != row.itm_id) {
                    cate_en = row.itm_item_detail_en
                    cate_th = row.itm_item_detail_th
                    cate_check = row.itm_id
                    index_check++
                    index_catagory = index_check
                    chack_Manage = 0;


                    $table += '<tr>'
                    $table += '<td>'
                    $table += index_catagory
                    $table += '</td>'
                    // show index 

                    $table += '<td>'
                    $table += row.itm_item_detail_en + '<br>' + row.itm_item_detail_th
                    $table += '</td>'
                    // show key_component

                    $table += '<td>'
                    $table += row.dep_description_detail_en + '<br>' + row
                        .dep_description_detail_th
                    $table += '</td>'
                    // show expected_detail

                    $table += '<td>'
                    data.forEach((row2, index) => {
                        if (row2.itm_item_detail_en == row.itm_item_detail_en) {
                            $table += row2.Position_name + "<br>"
                        }
                    })
                    $table += '</td>'
                    // show position 
                    if (chack_Manage == 0) {
                        $table += '<td >'
                        $table += '<center>'
                        $table +=
                            '<a href="<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd_view_edit_data/' +
                            row.itm_id + '"><button class="btn btn-warning float-center">'
                        $table +=
                            '<i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit &nbsp;</button></p></a>'
                        // button edit in manage 

                        $table +=
                            '<button type="button" class="btn btn-danger float-center"data-toggle="modal" href="#myModal_delete" Onclick="send_id_to_delete(' +
                            row.itm_id + ')">'
                        $table += '<i class="fa fa-times"></i>Delete</button>'
                        // button delete in manage 
                        $table += '</center>'
                        $table += '</td>'
                        chack_Manage = 1;
                    }

                    // manage 

                    $table += '<tr>'
                }
                // else if


            })
            // loop for show data 

            $("#data_table").html($table); //add data to view

        }
        // success 


    });
    // ajax send value to controller 

}
// get_all_data_for_item_table



<?php
/*
* send_id_to_delete
* Display manage indicator
* @input  id mhrd for delete
* @output id mhrd for delete to controller
* @author Jakkarin Pimpaeng
* @Update Date 2563-09-25
*/
?>

function send_id_to_delete(itm_id) {
    var button = ""
    button +=
        '<button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel_del">Cancel</button>'
    button += '<a href="<?php echo base_url(); ?>/Evs_mhrd_indicators_form/indicator_mhrd_delete/' +
        itm_id + '"><button id="success_btn" class="btn btn-success">Confirm</button></a>'
    $('#modal_delete').html(button)
}
// send_id_to_delete
</script>

<!-- Start Css -->
<style>
#t01 th {

    background-color: #2c2c2c;
    color: white;

}

#panel_th_indicatorManage {
    background-color: #c1432e;
}

#title_indicator {
    font-size: 20px;
}
</style>
<!-- End Css -->



<!-- Start Page Content -->
<div class="container-fluid">
    <!-- Start col-lg-12 -->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <!-- Start Card Header -->
            <div class="card-header py-3" id="panel_th_indicatorManage">
                <div class="col-xl-12">
                    <a href="<?php echo base_url();?>/Evs_mhrd_indicators_form/indicator_mhrd_view_insert_data">
                        <button type="button" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add
                        </button> </a>
                    <h1 class="m-0 font-weight-bold text-primary">
                        <a href="<?php echo base_url(); ?>/Evs_indicator/main_indicator">
                            <i class="fa fa-chevron-circle-left text-white"></i>
                        </a>
                        <i class="fa fa-pencil-square text-white"></i>
                        <font color="white">Items form MHRD</font>
                    </h1>
                </div>
                <!-- class col-xl-12  -->
            </div>
            <!-- End Card-header  -->

            <!-- Start col lg 12 -->
            <div class="col-lg-12">
                <!-- Start card -->
                <div class="card">
                    <!-- Start Card Header -->
                    <div class="card-header">
                        <strong class="card-title" id="title_indicator">
                            Information Items form MHRD
                        </strong>
                    </div>
                    <!-- End Card-header  -->

                    <!-- Start Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2" align="right">
                                <label for="com_select" class=" form-control-label">item : </label>
                            </div>
                            <!-- col-3 label -->

                            <div class="col-3">
                                <select name="cate_select" id="cate_select" class="form-control">
                                    <option value="0">All item</option>
                                    <!-- start foreach -->
                                    <?php foreach($cate_data as $value){ ?>
                                    <option value="<?php echo $value->itm_id;?>">
                                        <?php echo $value->itm_item_detail_en;?>
                                    </option>
                                    <?php } ?>
                                    <!-- end foreach -->
                                </select>
                                <!-- select  -->
                            </div>
                            <!-- col-3 -->

                            <div class="col-2" align="right">
                                <label for="pos_lv_select" class=" form-control-label">Position level : </label>
                            </div>
                            <!-- col-3 label -->

                            <div class="col-3">
                                <select name="pos_lv_select" id="pos_lv_select" class="form-control">
                                    <option value="0">All level</option>
                                    <!-- start foreach -->
                                    <?php foreach($pos_lv_data as $value){ ?>
                                    <option value="<?php echo $value->psl_id;?>">
                                        <?php echo $value->psl_position_level;?>
                                    </option>
                                    <?php } ?>
                                    <!-- end foreach -->

                                </select>
                                <!-- select  -->
                            </div>
                            <!-- col-3 -->

                            <div class="col-2">
                                <button class="btn btn-success" onclick="get_data_for_item_table()"><i
                                        class="fa fa-search"></i> Search</button>
                            </div>
                            <!-- col-2  -->
                        </div>
                        <!-- row  -->

                        <br>


                        <table class="table" id="t01" width="100%">
                            <thead>
                                <th width="2%">
                                    <center>#</center>
                                </th>
                                <th width="20%">
                                    <center>item</center>
                                </th>
                                <th width="20%">
                                    <center>description</center>
                                </th>
                                <th width="15%">
                                    <center>Position</center>
                                </th>
                                <th width="5%">
                                    <center>Manage</center>
                                </th>
                            </thead>
                            <tbody id="data_table"></tbody>
                        </table>
                    </div>
                    <!-- end Card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col lg 12 -->
        </div>
        <!-- end card-shadow -->
    </div>
    <!-- end col-lg-12 -->
</div>
<!-- end Page Content -->

<!-- Start modal for delete id mhrd -->
<div class="modal fade" id="myModal_delete" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <h4 class="modal-title" id="staticModalLabel">
                    <center>Do you want to delete item ?</center>
                </h4>
            </div>
            <!-- header   -->

            <div class="modal-body">
                <p>
                    Please verify the accuracy of the information.
                </p>
            </div>
            <!-- body  -->

            <div class="modal-footer" id='modal_delete'>
            </div>
            <!-- add button  -->

        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog modal-md -->
</div>
<!-- End modal for delete id mhrd -->