<?php
/*
* v_indicator_gcm_table
* Display indicator of gcm
* @input  -
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/

/*
* v_indicator_gcm_table
* Display indicator of gcm
* @input  data gcm
* @output show data gcm 
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/

/*
* v_indicator_gcm_table
* Display indicator of gcm
* @input  data gcm
* @output show data gcm 
* @author Tippawan Aiemsaad
* @Update Date 2563-09-27
*/
?>
<script>
<?php
/*
* v_indicator_gcm_table
* Display indicator of gcm
* @input  data gcm
* @output show data gcm  
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/
?>

$(document).ready(function() {
    get_data_for_competency_table()
    get_definetion_com()
});

<?php
/*
* get_data_for_competency_table
* manage indicator
* @input  -
* @output -
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/
?>
var save_cpg_toclear = ""; //save competency to delete

function get_data_for_competency_table() {
    var $table = '' //add data for table
    var $manage = '' //add data for table
    var key_check // check value
    var key_en = '' // check value
    var key_th = '' // check value
    var index_check = 1 // index
    var index_key = '' // index
    var index_exp // index 
    var com_sel = document.getElementById("com_select").value; // get kay by id
    var pos_lv_sel = document.getElementById("pos_lv_select").value; // get kay by id


    console.log(com_sel);
    console.log(pos_lv_sel);
    get_definetion_com()
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_gcm_indicators_form/indicator_gcm_search",
        data: {
            "kcg_cpg_id": com_sel,
            "pos_psl_id": pos_lv_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
            if (data.length == 0) {

                $table += '<tr>'
                $table += '<td colspan="5">'
                $table += 'No infomation indicator, Please add indicator'
                $table += '</td>'
                $table += '</tr>'
                // $("#def_info").hide();
                // $("#com_info").hide();

            }
            // else
            else {
                data.forEach((row, index) => {

                    if (index == 0) {
                        key_check = row.kcg_id
                        key_en = row.kcg_key_component_detail_en
                        key_th = row.kcg_key_component_detail_th
                        index_key = index_check

                        $manage += '<td >'
                        $manage += '<center>'
                        $manage += '<button  class="btn btn-danger float-center"  value = "' +
                            key_en +
                            '" data-toggle="modal" href="#myModal_delete_key"   Onclick="send_id_to_delete(value)">'
                        $manage += '<i class="fa fa-times"></i></button>'
                        // button delete in manage 
                        $manage += '</center>'
                        $manage += '</td>'
                        // manage 
                        $("#def_info").show();
                        $("#com_info").show();

                    }
                    // if
                    else if (key_check == row.kcg_id) {
                        key_en = ''
                        key_th = ''
                        key_check = key_check
                        index_key = ''

                        $manage += '<td>'
                        $manage += '</td>'
                    }
                    // else if
                    else if (key_check != row.kcg_id) {
                        key_en = row.kcg_key_component_detail_en
                        key_th = row.kcg_key_component_detail_th
                        key_check = row.kcg_id
                        index_check++
                        index_key = index_check

                        $manage += '<td >'
                        $manage += '<center>'
                        $manage += '<button  class="btn btn-danger float-center"  value = "' +
                            key_en +
                            '" data-toggle="modal" href="#myModal_delete_key" Onclick="send_id_to_delete(value)" >'
                        $manage += '<i class="fa fa-times"></i></button>'
                        // button delete in manage 
                        $manage += '</center>'
                        $manage += '</td>'
                        // manage 

                    }
                    // else if

                    index_exp = index
                    $table += '<tr>'
                    $table += '<td>'
                    $table += index_key
                    $table += '</td>'
                    // show index 
                    if (true) {
                        $table += '<td rowspan="2" >'
                    }
                    //if


                    $table += key_en + '<br>' + key_th
                    $table += '</td>'
                    // show key_component
                    $table += '<td>'
                    $table += row.epg_point
                    $table += '</td>'
                    $table += '<td>'
                    $table += row.epg_expected_detail_en + '<br>' + row.epg_expected_detail_th
                    $table += '</td>'
                    // show expected_detail

                    $table += '<td>'
                    $table += row.Position_name
                    $table += '</td>'
                    // show position

                    $table += $manage
                    $table += '<tr>'
                    $manage = ''

                })
                // loop for show data 
            }
            // else check length array

            $("#data_table").html($table); //add data to view
        }
        // success function

    });
    // ajax send value to controller 
}
// function get_data_for_competency_table

<?php
/*
* get_definetion_com
* manage indicator
* @input  -
* @output -
* @author Kunanya Singmee
* @Update Date 2563-09-25
*/
?>

function get_definetion_com() {
    var com_en = '' // set value competency detail en
    var com_th = '' // set value competency detail th
    var def_en = '' // set value definition detail en
    var def_th = '' // set value definition detail th
    var com_sel = document.getElementById("com_select").value; // get kay by id
    console.log(com_sel);
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_gcm_indicators_form/indicator_gcm_com",
        data: {
            "cpg_id": com_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
            com_en = data.cpg_competency_detail_en
            com_th = data.cpg_competency_detail_th
            def_en = data.cpg_definition_detail_en
            def_th = data.cpg_definition_detail_th

            console.log(com_en)
            console.log(com_th)
            console.log(def_en)
            console.log(def_th)
            // set value 

            if (def_en == "" && def_th == "") {
                $("#def_info").hide();
            }
            //if check 
            else {
                $("#def_info").show();
                $("#def_info_en").text(def_en);
                $("#def_info_th").text(def_th);
            }
            // else

            $("#com_info_en").text(com_en);
            $("#com_info_th").text(com_th);


            $('#link').html(
                '<a href="<?php echo base_url();?>/Evs_gcm_indicators_form/indicator_gcm_view_edit_data/' +
                com_sel +
                '"><button class="btn btn-warning float-center"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit &nbsp;</button></a><br><br><button class="btn btn-danger float-center" data-toggle="modal" href="#myModal_delete_Competency"><i class="fa fa-times"></i>&nbsp;Delete</button>'
            );
            // $('#link').html(
            //     '<button class="btn btn-warning float-center"><i class="fa fa-pencil">&nbsp;&nbsp;Edit &nbsp;</i></button>'
            // );

            save_cpg_toclear = data.cpg_competency_detail_en; //save competency to delete
        }
        // success function
    });
    // ajax send value to controller 

}
// get_definetion_com


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
    var delete_key_component_en_to_database = key_component_en_to_database; // key component en 

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
} //delete_key_component_and_expected

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
    save_component_en_todatabase = save_cpg_toclear; // component en 
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

<?php
/*
* send_id_to_delete
* delete key component  to database
* @input  - 
* @output -
* @author Jakkarin Pimpaeng
* @Update Date 2563-09-25
*/
?>

function send_id_to_delete(value_key_en) {
    console.log(value_key_en);
    var button = "" // set to madal
    button +=
        '<button type="button" class="btn btn-secondary btn-lg ti ti-close" data-dismiss="modal" id="cancel_del"></button>'
    button += '<a href="<?php echo base_url();?>/Evs_gcm_indicators_form/indicator_gcm">'
    button +=
        '<button  id="success_btn" class="btn btn-success ti ti-check btn-lg ti ti-close float-center" value = "' +
        value_key_en + '" onclick="delete_key_component_and_expected(value)" ></button></a>'

    $('#modal_delete').html(button)
}
</script>
<!-- End script  -->


<!-- Start Css -->
<style>
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #00cc00;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;

}

#t01 th {

    background-color: #2c2c2c;
    color: white;

}

#panel_th_indicatorManage {
    background-color: #c1432e;
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
                    <a href="<?php echo base_url();?>/Evs_gcm_indicators_form/indicator_gcm_view_insert_data">
                        <button type="button" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add
                        </button> </a>
                    <h1 class="m-0 font-weight-bold text-primary">
                        <a href="<?php echo base_url(); ?>/Evs_indicator/main_indicator">
                            <i class="fa fa-chevron-circle-left text-white"></i>
                        </a>
                        <i class="fa fa-pencil-square text-white"></i>
                        <font color="white">Items form GCM</font>
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
                            Information Items form GCM
                        </strong>
                    </div>
                    <!-- End Card-header  -->

                    <!-- Start Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2" align="right">
                                <label for="com_select" class=" form-control-label">Competency : </label>
                            </div>
                            <!-- col-3 label -->

                            <div class="col-3">
                                <select name="com_select" id="com_select" class="form-control">

                                    <?php //Start foreach
					
                                    foreach($compet_data as $value){ ?>
                                    <option value="<?php echo $value->cpg_id;?>">
                                        <?php 
                                            echo $value->cpg_competency_detail_en;
                                                       
                                        ?>
                                    </option>
                                    <?php } //end foreach?>
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
                                    <?php //Start foreach
                                    foreach($pos_lv_data as $value){ ?>
                                    <option value="<?php echo $value->psl_id;?>">
                                        <?php echo $value->psl_position_level;?>
                                    </option>
                                    <?php } //end foreach?>
                                    <!-- foreach -->

                                </select>
                                <!-- select  -->
                            </div>
                            <!-- col-3 -->

                            <div class="col-2">
                                <button class="btn btn-success" onclick="get_data_for_competency_table()"><i
                                        class="fa fa-search"></i> Search</button>
                            </div>
                            <!-- col-2  -->
                        </div>
                        <!-- row  -->

                        <hr>

                        <div class="row" id="com_info">
                            <div class="col-2" align="right">
                                <label class="form-control-label"><b>Competency : </b></label>
                            </div>
                            <!-- col-2  -->
                            <div class="col-8">
                                <label class="form-control-label" id="com_info_en" name="com_en_to_cear"></label>
                                <br>
                                <label class="form-control-label" id="com_info_th"></label>
                            </div>
                            <!-- col-8  -->
                            <div class="col-2">
                                <div id="link">
                                </div>

                            </div>
                            <!-- col-2  -->
                        </div>
                        <!-- row  -->

                        <div class="row" id="def_info">
                            <div class="col-2" align="right">
                                <label class="form-control-label"><b> Defination : </b></label>
                            </div>
                            <!-- col-2  -->
                            <div class="col-8">
                                <label class="form-control-label" id="def_info_en"></label>
                                <br>
                                <label class="form-control-label" id="def_info_th"></label>
                            </div>
                            <!-- col-4  -->
                        </div>
                        <!-- row  -->
                        <hr>

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

<!-- Start modal for delete id Competency -->
<div class="modal fade" id="myModal_delete_Competency" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <h3 class="modal-title ">Do you want to delete Competency</h3>
            </div>
            <!-- modal-header -->
            <div class="modal-body">
                <p>Please review the information before deleting.</p>
            </div>
            <!-- modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel_del"><i
                        class="fa fa-times">&nbsp;Cancel</i></button>
                <a href="<?php echo base_url();?>/Evs_gcm_indicators_form/indicator_gcm">
                    <button id="success_btn" class="btn btn-success" onclick="clear_data_componet()"><i
                            class="fa fa-check">&nbsp;Confirm</i></button>
                </a>
            </div>
            <!-- modal-footer -->
            <!-- add button  -->

        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog modal-md -->
</div>
<!-- End modal for delete id Competency -->

<!-- Start modal for delete id Key Component -->
<div class="modal fade" id="myModal_delete_key" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <h3 class="modal-title ">Do you want to delete Key Component </h3>
            </div>
            <!-- modal-header -->
            <div class="modal-body">
                <p>Please review the information before deleting.</p>
            </div>
            <!-- modal-body -->
            <div class="modal-footer" id="modal_delete">
            </div>
            <!-- modal-footer -->
            <!-- add button  -->

        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog modal-md -->
</div>
<!-- End modal for delete id Key Component -->