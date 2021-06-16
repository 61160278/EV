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
    $("#show_noti").hide();
    $("#show_noti_his").hide();
});
// document ready

function onChangeBG() {
    $("#emp_id").css("background-color", "#ffffff");
    $("#emp_id").css("border-style", "solid");
    $("#emp_id").css("border-color", "#d9d9d9");
    $("#show_noti").hide();
}
// function onChangeBG

function onChangeBG_his() {
    $("#emp_id_his").css("background-color", "#ffffff");
    $("#emp_id_his").css("border-style", "solid");
    $("#emp_id_his").css("border-color", "#d9d9d9");
    $("#show_noti_his").hide();
}
// function onChangeBG_his


function validate() {

    var check = document.getElementById("emp_id").value;
    console.log(check);

    if (check == "" || check.length <= 4 || check.length >= 8) {
        $("#emp_id").css("background-color", "#ffe6e6");
        $("#emp_id").css("border-style", "solid");
        $("#emp_id").css("border-color", "#e60000");
        $("#show_noti").show();

        return false;
    }
    // if 
    else {
        return true;
    }
    // else 
}
// function varidate

function validate_his() {

    var check = document.getElementById("emp_id_his").value;
    console.log(check);

    if (check == "" || check.length <= 4 || check.length >= 8) {
        $("#emp_id_his").css("background-color", "#ffe6e6");
        $("#emp_id_his").css("border-style", "solid");
        $("#emp_id_his").css("border-color", "#e60000");
        $("#show_noti_his").show();

        return false;
    }
    // if 
    else {
        return true;
    }
    // else 
}
// function varidate_his
</script>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Evaluation </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body" style="height: 400px">

                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered table-striped m-n">
                            <thead id="headmbo">
                                <tr>
                                    <th rowspan="2" width="2%">
                                        <center> No.</center>
                                    </th>
                                    <th rowspan="2" width="15%">
                                        <center>name</center>
                                    </th>
                                    <th rowspan="2" width="20%">
                                        <center>Management</center>
                                    </th>
                                </tr>
                            </thead>
                            <!-- thead -->
                            <tbody id="row_mbo">
                                <?php 
                            
							foreach($data_group as $index => $row) {
                                if($data_emp_id != $row->emp_employee_id) {
                                
                                ?>
                                <tr>
                                    <td>
                                        <center>
                                            <?php echo $index+1 ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a
                                                href="<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/createFROM/<?php echo $row->emp_employee_id ?>">
                                                <button class="btn btn-success">
                                                    <i class="fa fa-file-text-o"></i> Evaluaion
                                                </button>
                                            </a>
                                        </center>
                                    </td>

                                    <?php 
                                }
                            }?>
                                <tr>
                            </tbody>
                    </div>
                </div>
            </div>
            <!-- row  -->

        </div>
        <!-- body -->
    </div>
    <!-- panel-indigo -->
    <hr>
    <br>
</div>
<!-- col-12 -->
</div>
<!-- row -->
<br>