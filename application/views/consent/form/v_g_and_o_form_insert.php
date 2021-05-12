<?php
/*
* v_g_and_o_form_insert
* Form G&O Management by position\
* @input  -  
* @output -
* @author 	Tanadon Tangjaimongkhon
* @Create Date 2563-09-20
*/

/*
* v_g_and_o_form_insert
* Form G&O Management by position
* @input  -  
* @output -
* @author Piyasak Srijan
* @Update Date 2563-12-29
*/
?>
<?php
    $row = $info_pos->row();
?>
<input type="hidden" id="value_pos_id" name="value_pos_id" value="<?php echo $info_pos_id; ?>">
<input type="hidden" id="value_year" name="value_year" value="<?php echo $info_year_id; ?>">
<script>
var index_field_level = 2;
var index_field_range = 5;
var value_year_id = document.getElementById("value_year").value; // value of year id
var value_pos_id = document.getElementById("value_pos_id").value; // alue of position id

$(document).ready(function() {
    var table = ''; // value for show on table

    //start for loop
    for (var i = 1; i <= 2; i++) {
        table += '<tr>';
        table += '<td> <center>' + i + '</center> </td>';
        table += ` '<td> 
                        <center><input type="radio" id="C" name="type" value="0" disabled><label>&nbsp;<b> C </b></label> </center><br>
                        <center><input type="radio" id="D" name="type" value="0" disabled><label>&nbsp;<b> D </b></label></center>
                    </td>'`;
        table += `'<td> 
                        <select name="select" id="select" class="form-control" disabled><option value="0">Please select</option></select>
                    </td>'`;
        table += `'<td> 
                        <textarea placeholder="Please enter" value="0" disabled></textarea> 
                    </td>'`;
        table += `'<td> 
                        <input type="text" id="weight_'+i+'" name="weight_'+i+'" placeholder="" class="form-control" disabled> 
                    </td>'`;
        table += `'<td> 
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled><br>
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled><br>
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled><br>
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled><br>
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled> 
                    </td>'`;
        table += '</tr>';
        $("#t01 tbody").html(table);
    }
    //end for loop
});
$(document).ready(function() {
    var table = ''; // value for show on table

    //start for loop
    for (var i = 1; i <= 5; i++) {
        table += '<tr>';
        table += '<td> <center>' + i + '</center> </td>';
        table += ` '<td> 
                        <center><input type="radio" id="C" name="type" value="0" disabled><label>&nbsp;<b> C </b></label> </center><br>
                        <center><input type="radio" id="D" name="type" value="0" disabled><label>&nbsp;<b> D </b></label></center>
                    </td>'`;
        table += `'<td> 
                        <select name="select" id="select" class="form-control" disabled><option value="0">Please select</option></select> 
                    </td>'`;
        table += `'<td> 
                        <textarea placeholder="Please enter" value="0" disabled></textarea> 
                    </td>'`;
        table += `'<td> 
                        <input type="text" id="weight_'+i+'" name="weight_'+i+'" placeholder="" class="form-control" disabled> 
                    </td>'`;
        table += `'<td> 
                        <label>Chellenge:</label><hr>
                        <label>Standard:</label>
                    </td>'`;
        table += '</tr>';
        $("#t02 tbody").html(table);
    }
});
/*
 * set_level_index
 * Display -
 * @input  index field of g&o form
 * @output index field of g&o form 
 * @author Piyasak Srijan
 * @Update Date 2564-01-25
 */
function set_level_index() {
    var index_field = document.getElementById("possible_input").value; // index of field
    var table = ''; // value for show on table
   
    for (var i = 1; i <= index_field; i++) {
        table += '<tr>';
        table += '<td> <center>' + i + '</center> </td>';
        table += ` '<td> 
                        <center><input type="radio" id="C" name="type" value="0" disabled><label>&nbsp;<b> C </b></label> </center><br>
                        <center><input type="radio" id="D" name="type" value="0" disabled><label>&nbsp;<b> D </b></label></center>
                    </td>'`;
        table += `'<td> 
                        <select name="select" id="select" class="form-control" disabled><option value="0">Please select</option></select> 
                    </td>'`;
        table += `'<td > 
                        <textarea placeholder="Please enter" value="0" disabled></textarea> 
                    </td>'`;
        table += `'<td > 
                        <input type="text" id="weight_'+i+'" name="weight_'+i+'" placeholder="" class="form-control" disabled> 
                    </td>'`;
        table += `'<td > 
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled><br>
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled><br>
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled><br>
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled><br>
                        <input type="text" id="obj_'+i+'" name="obj_'+i+'" placeholder="Please enter objectives" class="form-control" disabled> 
                    </td>'`;
        table += '</tr>';
    }
    //end for loop
    $("#t01 tbody").html(table);
    index_field_level = index_field;
    console.log(index_field_level);


}
/*
 * set_range_index
 * Display -
 * @input  index field of g&o form
 * @output index field of g&o form 
 * @author Piyasak Srijan
 * @Update Date 2564-01-25
 */
function set_range_index() {
    var index_field = document.getElementById("ratings_input").value; // index of field
    var table = ''; // value for show on table
    

    for (var i = 1; i <= index_field; i++) {
        table += '<tr>';
        table += '<td> <center>' + i + '</center> </td>';
        table += ` '<td> 
                        <center><input type="radio" id="C" name="type" value="0" disabled><label>&nbsp;<b> C </b></label> </center><br>
                        <center><input type="radio" id="D" name="type" value="0" disabled><label>&nbsp;<b> D </b></label></center>
                    </td>'`;
        table += `'<td> 
                        <select name="select" id="select" class="form-control" disabled><option value="0">Please select</option></select> 
                    </td>'`;
        table += `'<td> 
                        <textarea placeholder="Please enter" value="0" disabled></textarea> 
                    </td>'`;
        table += `'<td> 
                        <input type="text" id="weight_'+i+'" name="weight_'+i+'" placeholder="" class="form-control" disabled> 
                    </td>'`;
        table += `'<td> 
                        <label>Chellenge:</label><hr>
                        <label>Standard:</label>
                    </td>'`;
        table += '</tr>';
    }
    //end for loop
    $("#t02 tbody").html(table);
    index_field_range = index_field;
    console.log(index_field_range);
}

/*
 * insert_index
 * Display -
 * @input  index field of g&o form
 * @output input index field of g&o form 
 * @author Piyasak Srijan
 * @Update Date 2564-01-25
 */
function insert_index() {

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/Evs_g_and_o_form/index_g_and_o_insert",
        data: {
            "index_level": index_field_level,
            "index_ranges": index_field_range,
            "pos_id": value_pos_id,
            "year_id": value_year_id
        },
        dataType: "JSON",

        success: function(status) {
            console.log(status);
        }

    });
}
/*
 * change_status
 * Display -
 * @input  -
 * @output change status form
 * @author   Piyasak Srijan
 * @Update Date 2564-01-25
 */
function change_status() {
    var form_name = "G&O"; // form name
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
 * @author  Tanadon Tangjaimongkhon 
 * @Create Date 2564-02-05
 */
function confirm_save() {
    insert_index();
    change_status();
    window.location = "<?php echo base_url(); ?>/Evs_form/form_position/" + value_pos_id + "/" + value_year_id;
}
</script>

<style>
.in {
    border: 1px solid white;
}

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

#t02 th {

    background-color: #2c2c2c;
    color: white;

}

#panel_th_topManage {
    background-color: #c1432e;
}

textarea {
    width: 100%
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
                            href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $info_pos_id; ?>/<?php echo $info_year_id; ?>">
                            <i class="fa fa-chevron-circle-left text-white"></i>
                        </a>
                        <i class="fa fa-book text-white"></i>
                        <font color="white">&nbsp;Manage Form : G&O Form</font>
                    </h1>
                </div>
                <!-- style="font-size:40px;color:white" -->
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
                                        <div class="stat">Fiscal year : <?php $row = $info_pattern_year->row();
                                                                        echo $row->pay_year; ?> </div>
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

                <!-- Start form  -->
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-1"></div>
                        <!-- Start Form Set level index -->
                        <div class="col-3" align="right">
                            <label class=" form-control-label">Amount of Possible Outcomes :</label>
                        </div>
                        <!-- col-3 -->
                        <div class="col-2">
                            <input type="number" id="possible_input" class="form-control" min="2" max="5"
                                onchange="set_level_index()" value="2">
                        </div>
                        <!-- col-3  -->
                        <!-- End Form Set level index -->

                        <!-- Start Form Set range index -->
                        <div class="col-2" align="center">
                            <label class=" form-control-label">Amount of Their Ratings :</label>
                        </div>
                        <!-- col-3 -->
                        <div class="col-2">
                            <input type="number" id="ratings_input" class="form-control" min="5" max="10"
                                onchange="set_range_index()" value="5">
                        </div>
                        <!-- col-3  -->
                        <!-- End Form Set range index -->
                        <div class="col-1">
                            <button type="button" class="btn btn-success float-right" id="save" data-toggle="modal"
                                data-target="#confirm_save">Save</button>
                        </div>
                        <!-- col-3  -->
                    </div>
                    <!-- row  -->
                </form>
                <!-- End form  -->
                <hr>

                <!-- Start table level -->
                <table id="t01" border="1" class="table" width="100%">
                    <thead>
                        <tr>
                            <th width="2%">
                                <center>
                                    #
                                </center>
                            </th>
                            <th>
                                <center width="10%">
                                    Type of G&O
                                </center>
                            </th>
                            <th>
                                <center width="10%">
                                    SDGs Goal
                                </center>
                            </th>
                            <th width="30%">
                                <center>
                                    Evaluation Item
                                </center>
                            </th>
                            <th width="10%">
                                <center>
                                    Weight (%)
                                </center>
                            </th>
                            <th width="20%" colspan="2">
                                <center>
                                    Possible Outcomes
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <!-- tbody  -->

                </table>
                <!-- End table level -->

                <!-- Start table range -->
                <table id="t02" border="1" class="table" width="100%">
                    <thead>
                        <tr>
                            <th width="2%">
                                <center>
                                    #
                                </center>
                            </th>
                            <th>
                                <center width="10%">
                                    Type of G&O
                                </center>
                            </th>
                            <th>
                                <center width="10%">
                                    SDGs Goal
                                </center>
                            </th>
                            <th width="30%">
                                <center>
                                    Evaluation Item
                                </center>
                            </th>
                            <th width="10%">
                                <center>
                                    Weight (%)
                                </center>
                            </th>
                            <th width="20%" colspan="2">
                                <center>
                                    Their Ratings
                                </center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <!-- tbody  -->

                </table>
                <!-- End table range -->

                <div class="row">
                    <div class="col-sm-12" align="right">
                        <a
                            href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $info_pos_id; ?>/<?php echo $info_year_id; ?>">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>
                    </div>
                    <!-- Back to main form by position  -->
                </div>
                <hr>


                <!-- Start Description -->
                <div>
                    <h4 class="text">Description</h4><br>
                </div>

                <div>
                    <p>Type of G&O</p>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p>C : Company Achievement</p>
                    </div>
                    <!-- col-3  -->
                    <div class="col-sm-3">
                        <p>D : Department Achievement</p>
                    </div>
                    <!-- col-3  -->
                </div>
                <!-- row  -->
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        <p>SDGs Goal : Sustainable Development Goals</p>
                    </div>
                    <!-- col-6  -->
                </div>
                <!-- row  -->
                <hr>
                <!-- End Description -->

            </div>
        </div>
        <!-- End Card -->
        <br>
    </div>
</div>
<!-- End Page Content -->
<!-- Start Modal -->
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