<?php
/*
* v_edit_quota.php
* Display v_edit_quota
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-5
*/
/*
* v_edit_quota.php
* Display v_edit_quota
* @input    
* @output
* @author   Piyasak Srijan
* @Update Date 2564-04-23
*/    
?>
<style>
.text {
    color: black;
}

.orange {
    background-color: orange;
    color: black;
    text-align: center;
}

.orange2 {
    background-color: #ffe4b3;
}

.margin {
    margin-top: 10px;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}

th {
    color: black;
    text-align: center;
    font-size: 20px;
}

td {
    text-align: center;
    font-size: 16px;
}
</style>
<script>
function edit_quota() {
    var check = "";

    var sum_quota = 0;
    var grade = [];
    var gradeS = 0;
    var gradeA = 0;
    var gradeB = 0;
    var gradeB_N = 0;
    var gradeC = 0;
    var gradeD = 0;
    var gradeTOT = 0;

    //end if-else groupPosition
    var datedata = new Date();
    var day = datedata.getDate();
    var month = datedata.getMonth() + 1;
    var year = datedata.getFullYear();
    // get date form new date() 
    var savedate = year + "-" + month + "-" + day;

    // document.getElementById("submit").disabled = false;
    var qut_id = parseFloat(document.getElementById("idDataQuota").value);
    for (i = 1; i <= 6; i++) {
        check = document.getElementById("quota" + i).value;

        if (check != "") {
            grade[i] = parseFloat(check),
                sum_quota += grade[i];
        } //if
    } //for
    grade.shift();
    gradeS = grade[0];
    gradeA = grade[1];
    gradeB = grade[2];
    gradeB_N = grade[3];
    gradeC = grade[4];
    gradeD = grade[5];

    console.log(qut_id);
    console.log(gradeS);
    console.log(gradeA);
    console.log(gradeB);
    console.log(gradeB_N);
    console.log(gradeC);
    console.log(gradeD);
    console.log(savedate);
    console.log(sum_quota);
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/Evs_quota/edit_quota",
        data: {

            // "quotaType": quotaType,
            // "groupPosition": groupPosition,
            "savedate": savedate,
            "qut_id": qut_id,
            "gradeS": gradeS,
            "gradeA": gradeA,
            "gradeB": gradeB,
            "gradeB_N": gradeB_N,
            "gradeC": gradeC,
            "gradeD": gradeD,
            "sum_quota": sum_quota

        },
        dataType: "JSON",

        success: function(status) {
            console.log(status);

        }

    }); //ajax



} //insert_quota

function check_quota() {

    var check = "";
    var value_quota = 0;
    document.getElementById("submit").disabled = false;
    for (i = 1; i <= 6; i++) {
        check = document.getElementById("quota" + i).value;

        if (check != "") {
            value_quota += parseFloat(check);

        }
        // if 
        if (value_quota > 100) {
            $("#show_quota").css("color", "red");

            add_alert();
            $("#submit").attr("disabled", true);
        } else if (value_quota == 100) {
            $("#submit").attr("disabled", false);
            $("#show_quota").css("color", "#000000");
        }

        document.getElementById("show_quota").innerHTML = value_quota;
        //console.log(value_quota);
    }
    // for i

}

function add_alert() {
    $('#warning').modal('show');
}

function confirm_save() {
    edit_quota();
    $('#warning_save').modal('show');


}

function main_quota() {
    confirm_save();
    window.location.href = "<?php echo base_url();?>/ev_quota/Evs_quota/index";
}

function show_qouta() {

    for (var i = 1; i <= 6; i++) {
        $("#quota" + i).attr("disabled", true);
    }

    var dataQuota = [];
    var arrQuota = [];
    for (var i = 0; i < 6; i++) {
        dataQuota[i] = 0;

    } //for
    for (var i = 1; i <= 6; i++) {
        //  var show_quota = document.getElementById("quota" + i).innerHTML;
        var show_quota = document.getElementById("quota" + i).value;
        //  var arrQuota = [5, 25, 40, 25, 5];
        arrQuota[i] = show_quota;
    } //for
    arrQuota.shift();
    console.log(arrQuota); //ส่วนนี้เป็นส่วนที่ดึงมา
    for (var a = 0; a < arrQuota.length; a++) {
        dataQuota[a] = arrQuota[a] * 1;

    } //ค่าที่รับจากตารางที่เปลี่ยนจากstring เป็น int
    console.log(dataQuota);

    //<block:setup:1>
    const labels = [
        'S',
        'A',
        'B',
        'B-',
        'C',
        'D',
    ];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Quota',
            backgroundColor: 'rgb(54, 162, 235)',
            borderColor: 'rgb(54, 162, 235)',
            data: dataQuota,
        }]

    };
    // </block:setup>
    // <block:config:0>
    const config = {
        type: 'line',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    min: 0,
                    ticks: {
                        stepSize: 20
                    }

                }
            }
        }
    };

    // </block:config>
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, config);
    $('#reset').on('click', function() {
        myChart.destroy();
        for (var i = 1; i <= 6; i++) {
                $("#quota" + i).attr("disabled", false);
            }

    });



} //showChart
$(document).ready(function() {
    show_qouta();
});
</script>
<style>
.qut_type {
    text-align: left;
}

.qut_pos {
    text-align: left;
}
</style>
<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="6px"><b>Edit Quota</b></font>
            </h2>
            <div class="col-md-9">
            </div>
            <div class="col-md-1">

            </div>
        </div>
        <div class="panel-body" style="" id="qut_data">

            <div class="row">
                <div class="col-md-2">
                    <?php foreach($edit_qut_data as $value){ ?>
                    <input id="idDataQuota" value="<?php echo $value->qut_id;?>" hidden>
                    <?php } ?>
                </div>
                <div class="col-md-8">
                    <table style="width:75%" align="center">

                        <?php foreach($edit_qut_data as $value){ ?>
                        <tr>
                            <td>
                                <h4><b>Quota :</b></h4>
                            </td>
                            <td class="qut_type">
                                <?php echo $value->qut_type;?></td>
                            <td>
                                <h4><b>Position of Quota :</b></h4>
                            </td>
                            <td class="qut_pos"><?php echo $value->qut_pos;?></td>

                        </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <table class="table table-hover m-n orange">
                        <thead>
                            <tr>
                                <th>Grade</th>
                                <th>S</th>
                                <th>A</th>
                                <th>B</th>
                                <th>B-</th>
                                <th>C</th>
                                <th>D</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($edit_qut_data as $value){ ?>
                            <tr class="orange2" id="input">

                                <td>Quota</td>
                                <td>
                                    <input type="text" class="form-control" id="quota1" onchange="check_quota()"
                                        value="<?php echo $value->qut_grad_S;?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota2" onchange="check_quota()"
                                        value="<?php echo $value->qut_grad_A;?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota3" onchange="check_quota()"
                                        value="<?php echo $value->qut_grad_B;?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota4" onchange="check_quota()"
                                        value="<?php echo $value->qut_grad_B_N;?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota5" onchange="check_quota()"
                                        value="<?php echo $value->qut_grad_C;?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota6" onchange="check_quota()"
                                        value="<?php echo $value->qut_grad_D;?>">
                                </td>
                                <td id="show_quota"><?php echo $value->qut_total;?></td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-2">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-offset-8">
                    <!-- <div class="col-md-3"> -->
                    <buuton class="btn btn-success" type="submit" id="submit" onclick="show_qouta()" disabled>Submit
                    </buuton>
                    <button class="btn btn-warning" type="reset" id="reset">edit</button>
                    <!-- </div> -->
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="panel panel-midnightblue" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>
                                <font size="5px"><b>Quota</b></font>
                            </h2>
                            <div class="panel-ctrls" data-actions-container="">
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="myChart" width="1000" height="450" style="position: relative;"></canvas>

                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url();?>/ev_quota/Evs_quota/index">
                <button type="button" class="btn btn-inverse pull-left" data-dismiss="modal">CANCEL</button>
            </a>
            <button type="button" class="btn btn-social pull-right" style="background-color:#0000CD;" id="saveData"
                onclick="confirm_save()">SAVE</button>
        </div>
    </div>
    <!-- Modal Warning -->
    <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#FF9800;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <font color="White"><b>&times;</b>
                        </font>
                    </button>
                    <h2 class="modal-title"><b>
                            <font color="white">Warning</font>
                        </b></h2>
                </div>
                <!-- Modal header -->

                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group" align="center">
                            <div class="col-sm-12">
                                <label for="focusedinput" class="control-label" align="center">
                                    <font size="5px">
                                        Value is more than 100</font>
                                </label>

                            </div>
                        </div>
                    </div>
                    <!-- form-horizontal -->
                </div>
                <!-- Modal body -->

                <div class="modal-footer">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
                    </div>

                </div>
                <!-- Modal footer -->
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- End Modal Warning -->

</div>

<!-- Modal Warning -->
<div class="modal fade" id="warning_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#FF9800;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b>
                    </font>
                </button>
                <h2 class="modal-title"><b>
                        <font color="white">Warning</font>
                    </b></h2>
            </div>
            <!-- Modal header -->

            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group" align="center">
                        <div class="col-sm-12">
                            <label for="focusedinput" class="control-label" align="center">
                                <font size="5px">
                                    Do you want to save?</font>
                            </label>

                        </div>
                    </div>
                </div>
                <!-- form-horizontal -->
            </div>
            <!-- Modal body -->

            <div class="modal-footer">
                <div class="btn-group pull-right">

                    <button type="button" class="btn btn-success" data-dismiss="modal"
                        onclick="main_quota()">Yes</button>
                    </a>
                </div>

            </div>
            <!-- Modal footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Warning -->

</div>
<script>

</script>