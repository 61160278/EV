<?php
/*
* v_main_form.php
* Display v_main_form
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-04-06
*/  
?>

<style>
#color_head {
    background-color: #3f51b5;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<!-- END style -->

<script>
$(document).ready(function() {

    if ("<?php echo $chack_save ?>" == "Chack") {
        document.getElementById("save").disabled = false;
    }
    // if
    else {
        document.getElementById("save").disabled = true;
    }
    // else 
});
// document ready

function save_group_to_HR() {

    var Emp_ID = [];
    var index = document.getElementById("table_index").value;

    for (i = 0; i < index; i++) {
        Emp_ID.push(document.getElementById("Emp_ID" + i).value);
    }
    // for 

    console.log(Emp_ID);
    console.log(index);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/save_group_to_HR",
        data: {
            "Emp_ID": Emp_ID,
            "index": index
        },
        success: function(data) {
            console.log(data);
            main_index();
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// save_group_to_HR

function main_index() {
    window.location.href = "<?php echo base_url();?>/ev_form_HD/Evs_form_HD/index";
}
// main_index 
</script>
<!-- END script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Approve Group </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>List of employees to approve </h3>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>
                <table class="table table-bordered m-n">
                    <thead>
                        <tr>
                            <th>
                                <center>#</center>
                            </th>
                            <th>
                                <center>Employee ID</center>
                            </th>
                            <th>
                                <center>Name - surname</center>
                            </th>
                            <th>
                                <center>Section Code</center>
                            </th>
                            <th>
                                <center>Department</center>
                            </th>
                            <th>
                                <center>Position</center>
                            </th>
                            <th>
                                <center>Group</center>
                            </th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <!-- thead -->

                    <tbody>
                        <?php 
                                $status = [];
                                // print_r($data_chack_form_com);
                                // print_r($data_chack_form);
                                if(sizeof($data_status) != 0){
                                    foreach($data_status as $row){
                                        array_push($status,$row);
                                    }
                                    // foreach 
                                }
                                // if
							
                                $table_index = 0;
                                if(sizeof($status) != 0){

							    foreach($data_group as $index => $row) {
                                if($data_emp_id != $row->emp_employee_id ) { ?>
                        <input name="Emp_ID" id="Emp_ID<?php echo $index; ?>" type="text"
                            value="<?php echo $row->emp_employee_id ?>" hidden>
                        <tr>
                            <td>
                                <center>
                                    <?php echo $index+1 ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo  $row->emp_employee_id ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?>
                                </center>
                            </td>
                            <td>
                                <center><?php echo $row->Sectioncode_ID; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row->Department; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row->Position_name; ?></center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->gru_name ?>
                                </center>
                            </td>
                            <td>
                                <?php if($data_chack_form[$index]  != 0){ ?>
                                <center>
                                    <?php if($data_chack_form_com[$index] == 0){ ?>
                                    <a
                                        href="<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/createFROM/<?php echo $row->emp_employee_id ?>">
                                        <button class="btn btn-info">
                                            <i class="fa fa-info-circle"></i>
                                        </button>
                                    </a>
                                    <?php }
                                    //if
                                    else { ?>
                                    <a
                                        href="<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/createFROM/<?php echo $row->emp_employee_id ?>">
                                        <button class="btn btn-success">
                                            <i class="fa fa-check-circle"></i>
                                        </button>
                                    </a>
                                    <?php } // else ?>
                                </center>
                                <?php }
                                // if
                                else{ ?>
                                <center>
                                    <button class="btn btn-info" disabled>
                                        <i class="fa fa-info-circle"></i>
                                    </button>
                                </center>
                                <?php }
                                        // else ?>
                            </td>
                        </tr>

                        <?php 
                            $table_index += 1;
                                         }
                                         // if
                                    }
                                    // foreach 
                                }
                                // if
                                else { ?>
                        <td colspan="7">No list of approved employees.</td>
                        <?php }
                                    // else  ?>

                        <input type="text" id="table_index" value="<?php echo $table_index; ?>" hidden>
                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- table  -->

                <br>
                <div class="row">
                    <div class="col-md-6">
                    <a href="<?php echo base_url(); ?>Evs_all_manage/index_a">
                            <button class="btn btn-inverse" >BACK</button>
                        </a>
                    </div>
                    <!-- col-6  -->
                    <div class="col-md-6" align="right">
                        <?php if(sizeof($status) != 0){ ?>
                        <a href="">
                            <button id="" class="btn btn-danger" onclick="">Reject Report</button>
                        </a>
                        <?php } 
                    // if
                    else {?>
                        <button id="" class="btn btn-danger" onclick="" disabled>Reject Report</button>

                        <?php }
                    // else ?>
                        <?php if(sizeof($status) != 0){ ?>
                        <button id="save" class="btn btn-success" onclick="save_group_to_HR()"> Save</button>
                        <?php } 
                    // if
                    else {?>
                        <button class="btn btn-success" disabled> Save</button>
                        <?php }
                    // else ?>
                    </div>
                    <!-- col-6  -->
                </div>
                <!-- row  -->
            </div>
            <!-- body -->
        </div>
        <!-- panel -->
    </div>
    <!-- col-12  -->
</div>
<!-- row  -->