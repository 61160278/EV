<?php
/*
* v_form_mbo_insert
* Display form MBO management
* @input  -  
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/ 

/*
* v_form_mbo_insert
* Display form MBO management
* @input  -  
* @output -
* @author Piyasak Srijan
* @Update Date 2563-10-19
*/
?>
<?php
    $row = $info_pattern_year->row();
    $year_id = $row->pay_id;
?>
<input type="hidden" id="value_pos_id" name="value_pos_id" value="<?php echo $info_pos_id; ?>">
<input type="hidden" id="year" name="year" value="<?php echo $year_id; ?>">

<script>
// var index_fielld = 0; // index of field
var value_pos_id = document.getElementById("value_pos_id").value; //position ID
var value_year_id = document.getElementById("year").value; // year now ID
var value_index_fielld = 5;
$(document).ready(function() {
    var table = ''; // value for show on table

    //start for loop
    for (var i = 1; i <= 5; i++) {
        table += '<tr>';
        table += '<td height = "50"> <center>' + i + '</center> </td>';
        table +=
            '<td height = "50"> <select name="select" id="select" class="form-control" disabled><option value="0">Please select</option></select></td>';
        table += '<td height = "50"> <input type="text" id="obj_' + i + '" name="obj_' + i +
            '" placeholder="Please enter objectives" class="form-control" disabled> </td>';
        table += '<td height = "50"> <input type="text" id="weight_' + i + '" name="weight_' + i +
            '" placeholder="" class="form-control" disabled> </td>';
        table += '</tr>';
        $("#t01 tbody").html(table);
    }
    //end for loop
});

/*
 * set_index
 * Display -
 * @input  index field of MBO form
 * @output index field of MBO form 
 * @author Tanadon Tangjaimongkhon
 * @Update Date 2564-01-17
 */
function set_index() {
    var index_fielld = document.getElementById("number_input").value; // index of field
    console.log(index_fielld);
    var table = ''; // value for show on table

    //start for loop
    for (var i = 1; i <= index_fielld; i++) {
        table += '<tr>';
        table += '<td height = "50"> <center>' + i + '</center> </td>';
        table +=
            '<td height = "50"> <select name="select" id="select" class="form-control" disabled><option value="0">Please select</option></select></td>';
        table += '<td height = "50"> <input type="text" id="obj_' + i + '" name="obj_' + i +
            '" placeholder="Please enter objectives" class="form-control" disabled> </td>';
        table += '<td height = "50"> <input type="text" id="weight_' + i + '" name="weight_' + i +
            '" placeholder="" class="form-control" disabled> </td>';
        table += '</tr>';
    }
    //end for loop
    $("#t01 tbody").html(table);
    value_index_fielld = index_fielld;
}

/*
 * insert_index
 * Display -
 * @input  index field of MBO form
 * @output input index field of MBO form 
 * @author Piyasak Srijan
 * @Update Date 2563-10-19
 */
function insert_index() {
    console.log(value_index_fielld);
    console.log(value_pos_id);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_mbo_form/index_mbo_insert",
        data: {
            "index_mbo": value_index_fielld,
            "pos_id": value_pos_id,
            "year_id": value_year_id
        },
        dataType: "JSON",

        success: function(status) {
            console.log(status);
        }

    });
}
//insert_index()

/*
 * change_status
 * Display -
 * @input  -
 * @output change status form
 * @author   Tanadon Tangjaimongkhon
 * @Update Date 2563-10-19
 */
function change_status() {
    var form_name = "MBO"; // form name
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
}
//change_status()

/*
 * confirm_save
 * Display -
 * @input -
 * @output confirm modal
 * @author  Kunanya Singmee
 * @Create Date 2564-02-11
 */
function confirm_save() {
    insert_index();
    change_status();
    window.location = "<?php echo base_url(); ?>/Evs_form/form_position/" + value_pos_id + "/" + value_year_id;
}
// confirm_save 
</script>

<style>
#t01 th {

    background-color: #2c2c2c;
    color: white;

}

#panel_th_topManage {
    background-color: #c1432e;
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
                        <font color="white">&nbsp;Manage Form : MBO Form</font>
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
                                               
                                                // display level of position
                                            ?>
                                        </div>
                                        <div class="text-left dib">
                                            <div class="stat-text"><span>
                                                    <?php 
                                                    // start foreach
                                                    foreach ($info_pos->result() as $row) {
                                                        //start if
                                                        if($row->Position_ID == $info_pos_id){
                                                            $pos_name_form = $row->Position_name;
                                                        }
                                                        //end if
                                                    } 
                                                    // end foreach
                                                    
                                                    echo $pos_name_form;
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
                                        <div class="stat">Fiscal year : <?php echo date("Y"); ?> </div>
                                        <div class="text-left dib">
                                            <br>

                                            <!-- start patten grade -->
                                            <div class="stat">Grade pattern :
                                                <?php 

                                                // start foreach
                                                foreach ($info_pattern_year->result() as $row) {
                                                    $year = $row->pay_pattern;
                                                } 
                                                // end foreach
                                                
                                                echo "Pettern ".$year;
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
                <!-- Start form set index mbo -->

                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-3" align="right">
                            <label class=" form-control-label">Index of mbo form :</label>
                        </div>
                        <!-- col-3 -->
                        <div class="col-3">
                            <input type="number" id="number_input" class="form-control" min="5" max="10"
                                onchange="set_index()" value="5">
                        </div>
                        <!-- col-3  -->
                        <div class="col-1">
                            <button type="button" class="btn btn-success float-right" id="save" data-toggle="modal"
                                data-target="#confirm_save">Save</button>
                        </div>
                        <!-- col-3  -->
                    </div>
                    <!-- row  -->
                </form>
                <!-- form  -->
                <!-- End form set index mbo -->

                <br>
                <!-- Start table-->
                <table id="t01" border="1" class="table" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">
                                <center>
                                    #
                                </center>
                            </th>
                            <th>
                                <center>
                                    SDGs
                                </center>
                            </th>
                            <th>
                                <center>
                                    Management by Objective
                                </center>
                            </th>
                            <th width="13%">
                                <center>
                                    Weight
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- End table  -->
                <div class="row">
                    <div class="col-sm-12" align="right">
                        <a
                            href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $info_pos_id; ?>/<?php echo $row->pay_id; ?>">
                            <button type="button" class="btn btn-secondary float-left">Back</button>
                        </a>


                    </div>
                    <!-- Back to main form by position  -->
                </div>
                <hr>
                <!-- Start Description -->
                <div>
                    <h4 class="text">Description</h4><br>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p> SDGs : Sustainable Development Goals</p><br>
                    </div>
                </div>
                <!-- SDGs  -->

                <!-- End Description -->

            </div>
        </div>
        <!-- End Card -->                                        
        <br>
    </div>
</div>
<!-- End Page Content -->
<!-- Start Moal -->
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
<!-- End Modal -->