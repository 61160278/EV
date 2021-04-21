<?php
/*
* v_indicator_attitude_table
* Display manage indicator
* @input  - 
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/

/*
* v_indicator_attitude_table
* Display manage indicator
* @input  data attitude
* @output show data attitude
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/

/*
* v_indicator_attitude_table
* Display manage indicator
* @input  data attitude
* @output show data attitude
* @author Kanchanaphitcha Meesuk
* @Update Date 2563-09-27
*/
?>

<input type="hidden" id="value_pos_id" name="value_pos_id" value="<?php echo $info_pos_id; ?>">
<script>
var value_pos_id = document.getElementById("value_pos_id").value; // position id
$(document).ready(function() {
    get_data_for_category_table(); //get all data for category table 
});
// document ready
<?php
/*
* get_all_data_for_category_table
* Display manage indicator
* @input  data attitude all
* @output data attitude for position
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/
?>

function get_data_for_category_table() {

    var $table = '' //add data for table
    var cate_en = '' //save category detail en
    var cate_th = '' //save category detail th
    var index_catagory = 1 //index catagory
    var index_check = 1 //index check loop
    var check_del = 0 //index check delete
    var cate_sel = document.getElementById("cate_select").value; // get kay by id
    var pos_lv_sel = document.getElementById("pos_lv_select").value; // get kay by id
    var check_condition = 0; //value for check condition
    console.log(cate_sel)
    console.log(pos_lv_sel)

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_attitude_indicators_form/indicator_attitude_table",
        data: {
            "ctg_id": cate_sel,
            "pos_psl_id": pos_lv_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)


            data.forEach((row, index) => {

                if (index == 0) {
                    cate_check = row.ctg_id
                    cate_en = row.ctg_category_detail_en
                    cate_th = row.ctg_category_detail_th
                    index_catagory = index_check
                    chack_Manage = 0;
                }
                // if
                else if (cate_check == row.ctg_id) {
                    cate_en = ''
                    cate_th = ''
                    cate_check = cate_check
                    index_catagory = ''
                    
                }
                // else if
                else if (cate_check != row.ctg_id) {
                    cate_en = row.ctg_category_detail_en
                    cate_th = row.ctg_category_detail_th
                    cate_check = row.ctg_id
                    index_check++
                    index_catagory = index_check
                    chack_Manage = 0;
                }
                // else if


                $table += '<tr>'
                $table += '<td>'
                $table += index_catagory
                $table += '</td>'
                // show index 

                $table += '<td>'
                $table += cate_en + '<br>' + cate_th
                $table += '</td>'
                // show key_component

                $table += '<td>'
                $table += row.idf_identification_detail_en + '<br>' + row
                    .idf_identification_detail_th
                $table += '</td>'
                // show expected_detail

                $table += '<td>'
                $table += row.pos_name
                $table += '</td>'
                // show position 
                if(chack_Manage == 0){
                $table += '<td >'
                $table += '<center>'
                $table +=
                    '<a href="<?php echo base_url(); ?>/Evs_attitude_form/indicator_attitude_view_edit_data/' + row.ctg_id + "/" +value_pos_id+'"><button class="btn btn-warning float-center">'
                $table += '<i class="fa fa-pencil"></i></button></p></a>'
                // button edit in manage 

                    $table +=
                        '<button type="button" class="btn btn-danger float-center"data-toggle="modal" href="#myModal_delete" Onclick="send_id_to_delete(' +
                        row.ctg_id + ')">'
                    $table += '<i class="fa fa-times"></i></button>'
                    // button delete in manage 
                    $table += '</center>'
                    $table += '</td>'
                    chack_Manage = 1;
                }
        
                // manage 

                $table += '<tr>'
                check_condition = 1;
            })
            // loop for show data 

            if(check_condition != 1){
                $table += '<tr><td colspan = "5">No infomation Items, Please add Items</td></tr>'
            }
            $("#data_table").html($table); //add data to view

        }
        // success 


    });
    // ajax send value to controller 

}
// get_all_data_for_category_table



<?php
/*
* send_id_to_delete
* Display manage indicator
* @input  id attitude for delete
* @output id attitude for delete to controller
* @author Jakkarin Pimpaeng
* @Update Date 2563-09-25
*/
?>

function send_id_to_delete(ctg_id) {
    var button = ""
    button +=
        '<button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel_del">Cancel</button>'
    button += '<a href="<?php echo base_url(); ?>/Evs_attitude_form/indicator_attitude_delete/' + ctg_id + "/" + value_pos_id +'"><button id="success_btn" class="btn btn-success">Confirm</button></a>'
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
                <a href="<?php echo base_url();?>/Evs_attitude_form/indicator_attitude_view_insert_data/<?php echo $info_pos_id; ?>">
                        <button type="button" class="btn btn-success float-right"><i class="fa fa-plus"> </i> Add </button> </a>
                    <h1 class="m-0 font-weight-bold text-primary">
                    <?php $row = $info_pattern_year->row(); ?>
                    <a href="<?php echo base_url(); ?>/Evs_attitude_form/form_attitude/<?php echo $info_pos_id; ?>/<?php echo $row->pay_id; ?>">
                            <i class="fa fa-chevron-circle-left text-white"></i>
                        </a>
                        <i class="fa fa-pencil-square text-white"></i>
                        <font color="white">Items form Attitude&behavior</font>
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
                            Information Items form attitude & behavior
                        </strong>
                    </div>
                    <!-- End Card-header  -->
                    <!-- Start Card body -->
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
                                                <div class="stat">Fiscal year : <?php $row = $info_pattern_year->row();  echo $row->pay_year; ?> </div>
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
                    </div>
                    <!-- End Card Header -->
                    <!-- Start Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2" align="right">
                                <label for="com_select" class=" form-control-label">Category : </label>
                            </div>
                            <!-- col-3 label -->

                            <div class="col-3">
                                <select name="cate_select" id="cate_select" class="form-control">
                                    <option value="0">All category</option>
                                    <!-- start foreach -->
                                    <?php foreach($cate_data as $value){ if($info_pos_id == $value->idf_pos_id){?>
                                    <option value="<?php echo $value->ctg_id;?>">
                                        <?php echo $value->ctg_category_detail_en;?>
                                    </option>
                                    <?php }} ?>
                                    <!-- end foreach -->
                                </select>
                                <!-- select  -->
                            </div>
                            <!-- col-3 -->

                            <div class="col-2" align="right">
                                <label for="pos_lv_select" class=" form-control-label">Position level : </label>
                            </div>
                            <!-- col-3 label -->
                            <?php $row = $info_pos->row(); ?>
                            <div class="col-3">
                                <select name="pos_lv_select" id="pos_lv_select" class="form-control">
                                    <option value="<?php echo $row->psl_id;?>"> <?php echo $row->psl_position_level; ?></option>

                                </select>
                                <!-- select  -->
                            </div>
                            <!-- col-3 -->

                            <div class="col-2">
                                <button class="btn btn-success" onclick="get_data_for_category_table()"><i
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
                                    <center>Catagory</center>
                                </th>
                                <th width="20%">
                                    <center>Identification</center>
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
                        <!-- Start Back to main form by position  -->
                <div class="row">
                    <div class="col-sm-12" align="right">
                    <?php $row = $info_pattern_year->row(); ?>
                    <a href="<?php echo base_url(); ?>/Evs_attitude_form/form_attitude/<?php echo $info_pos_id; ?>/<?php echo $row->pay_id; ?>">
                            <button type="button" class="btn btn-secondary float-left">Back</button>
                        </a>

                    </div>
                    <!-- End Back to main form by position  -->
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

<!-- Start modal for delete id attitude -->
<div class="modal fade" id="myModal_delete" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <h4 class="modal-title" id="staticModalLabel">
                    <center>Do you want to delete category ?</center>
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
<!-- End modal for delete id attitude -->