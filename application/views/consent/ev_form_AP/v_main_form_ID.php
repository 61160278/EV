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
                    <font color="#ffffff" size="6px"><b> Created & Evaluation </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body" style="height: 400px">

                <div class="row">

                    <div class="col-md-2" align="center">
                    </div>
                    <div class="col-md-2" align="center">
                        <a data-toggle="modal" href="<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/createACM">
                            <div class="info-tile ">
                                <div class="tile-icon"><i class="ti ti-files"></i></div>
                                <div class="tile-body"><span>ACM</span></div>

                            </div>
                        </a>
                        <div class="col-md-2" align="center">
                        </div>
                    </div>

                    <!-- col-4  -->



                    <div class="col-md-2" align="center">
                    </div>
                    <div class="col-md-2" align="center">
                        <a data-toggle="modal" href="<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/historyGCM">
                            <div class="info-tile ">
                                <div class="tile-icon"><i class="ti ti-files"></i></div>
                                <div class="tile-body"><span>GCM</span></div>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-2" align="center">
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