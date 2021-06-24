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
            <div class="panel-body" style="height: 450px">

                <div class="row">
                    <div class="col-md-4" align="center">
                        <form method="POST" action="<?php echo base_url(); ?>ev_form/Evs_form/createMBO">
                            <input id="emp_id" name="emp_id" type="text" value="<?php echo $_SESSION['UsEmp_ID'] ?>"
                                hidden>
                            <input type="image" src="<?php echo base_url();?>/pic/created_MBO.png" alt="Submit"
                                height="350px">

                        </form>
                        <!-- form  -->
                    </div>
                    <!-- col-4  -->

                    <div class="col-md-4" align="center">
                        <form method="POST" action="<?php echo base_url(); ?>ev_form/Evs_form_evaluation/index">
                            <input id="emp_id" name="emp_id" type="text" value="<?php echo $_SESSION['UsEmp_ID'] ?>"
                                hidden>
                            <input type="image" src="<?php echo base_url();?>/pic/evaluation.png" alt="Submit"
                                height="350px">

                        </form>
                        <!-- form  -->
                    </div>
                    <!-- col-4  -->

                    <div class="col-md-4" align="center">
                        <form method="POST" action="<?php echo base_url(); ?>ev_form/Evs_form/historyMBO">
                            <input id="emp_id_his" name="emp_id_his" type="text"
                                value="<?php echo $_SESSION['UsEmp_ID'] ?>" hidden>
                            <input type="image" src="<?php echo base_url();?>/pic/historyMBO.png" alt="Submit"
                                height="350px">

                        </form>
                        <!-- form  -->
                    </div>
                    <!-- col-4  -->
                </div>
                <!-- row  -->
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url() ?>Evs_all_manage/index_u">
                            <button class="btn btn-inverse">BACK</button>
                        </a>
                        <!-- cancel to back to main  -->
                    </div>
                    <!-- col-md-6 -->
                </div>
                <!-- row -->

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


<!-- Modal -->
<div class="modal fade" id="input_empid" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="color_head">
                <button type="button" class="close" data-dismiss="modal">
                    <font color="white">&times;</font>
                </button>
                <h4 class="modal-title">
                    <font color="white"><b> Please enter Employee ID </b></font>
                </h4>
            </div>
            <!-- Modal header-->

            <br>
            <form method="POST" action="<?php echo base_url(); ?>ev_form/Evs_form/createMBO"
                onSubmit="return validate()">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5" align="right">
                            <label class="control-label"><strong>
                                    <font size="3px"> Employee ID : </font>
                                </strong></label>
                        </div>
                        <!-- col-6 -->
                        <div class="col-md-4">
                            <input class="form-control" id="emp_id" name="emp_id" type="text" onchange="onChangeBG()">
                        </div>
                        <!-- col-6 -->
                    </div>
                    <!--  row -->

                    <br>

                    <div class="row">
                        <div class="col-12" align="center">
                            <p id="show_noti">
                                <font color="#e60000"> *Please enter the Employee ID correctly</font>
                            </p>
                        </div>
                        <!-- col-12 -->
                    </div>
                    <!--  row -->

                </div>
                <!-- Modal body-->
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6" align="left">
                            <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                        </div>
                        <!-- col-6 -->

                        <div class="col-md-6" align="rigth">
                            <input type="submit" class="btn btn-success" value="SAVE">
                        </div>
                        <!-- col-6 -->
            </form>
            <!-- form  -->
        </div>
        <!-- row -->
    </div>
    <!-- Modal footer-->
</div>
<!-- Modal content-->
</div>
<!-- Modal dialog-->
</div>
<!-- Modal-->

<!-- Modal -->
<div class="modal fade" id="input_empid_his" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id="color_head">
                <button type="button" class="close" data-dismiss="modal">
                    <font color="white">&times;</font>
                </button>
                <h4 class="modal-title">
                    <font color="white"><b> Please enter Employee ID </b></font>
                </h4>
            </div>
            <!-- Modal header-->

            <br>
            <form method="POST" action="<?php echo base_url(); ?>ev_form/Evs_form/historyMBO"
                onSubmit="return validate_his()">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5" align="right">
                            <label class="control-label"><strong>
                                    <font size="3px"> Employee ID : </font>
                                </strong></label>
                        </div>
                        <!-- col-6 -->
                        <div class="col-md-4">
                            <input class="form-control" id="emp_id_his" name="emp_id_his" type="text"
                                onchange="onChangeBG_his()">
                        </div>
                        <!-- col-6 -->
                    </div>
                    <!--  row -->

                    <br>

                    <div class="row">
                        <div class="col-12" align="center">
                            <p id="show_noti_his">
                                <font color="#e60000"> *Please enter the Employee ID correctly</font>
                            </p>
                        </div>
                        <!-- col-12 -->
                    </div>
                    <!--  row -->

                </div>
                <!-- Modal body-->
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6" align="left">
                            <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                        </div>
                        <!-- col-6 -->

                        <div class="col-md-6" align="rigth">
                            <input type="submit" class="btn btn-success" value="SAVE">
                        </div>
                        <!-- col-6 -->
            </form>
            <!-- form  -->
        </div>
        <!-- row -->
    </div>
    <!-- Modal footer-->
</div>
<!-- Modal content-->
</div>
<!-- Modal dialog-->
</div>
<!-- Modal emp-->