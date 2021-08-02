<?php
/*
* v_hd_report_cureve.php
* Display v_hd_report_cureve
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-06
*/

/*
* v_hd_report_cureve.php
* Display v_hd_report_cureve
* @input    
* @output
* @author   Piyasak Srijan
* @Update Date 2564-05-13
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

table {
    color: black;
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

.tdbold {
    font-weight: bold;
}

tbody:hover {
    background-color: #ffffff;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}

.qut_type {
    text-align: left;
}

.qut {
    text-align: left;
}
</style>
<script>
$(document).ready(function() {
    check_quota_plan()
    check_quota_actual()
    show_linebarChart()

});

function check_quota_plan() {

    var check = "";
    var value_quotaPlan = 0;
    var quota = 0;
    check = document.getElementById("quotaPlanToT").innerHTML;
    for (var i = 1; i <= 7; i++) {
        quota = document.getElementById("quota" + i).innerHTML;
        value_quotaPlan = (parseFloat(check).toFixed(2)) * (parseFloat(quota).toFixed(2)) / 100;
        document.getElementById("show_quotaPlan" + i).innerHTML = value_quotaPlan;
    } //for 
}
// check_quota_plan

function check_quota_actual() {
    var check = "";
    var valueActual = 0;
    var actual = 0;
    var quotaActual = 0;
    var quota = "";
    var sumQuotaActual = 0;
    quota = document.getElementById("quotaPlanToT").innerHTML;

    // document.getElementById("submit").disabled = false;

    for (var i = 1; i <= 7; i++) {
        check = document.getElementById("quotaActual" + i).innerHTML;
        console.log(check);
        if (check == "") {
            quotaActual = null;
        }
        // if
        else if (check < 0) {
            quotaActual = null;
        }
        //else if
        else {
            valueActual = parseFloat(check);
            quotaActual = (valueActual * 100) / (parseFloat(quota));
            sumQuotaActual += quotaActual;
            actual += valueActual;

        }
        // else
        if (actual > parseFloat(quota)) {
            $("#show_Actual").css("color", "red");
            add_alert();
        }
        // else if
        else if (actual == parseFloat(quota)) {
            $("#show_Actual").css("color", "#000000");
        }
        // else if 

        document.getElementById("show_quotaActual" + i).innerHTML = quotaActual.toFixed(2);
        document.getElementById("show_Actual").innerHTML = actual;
        document.getElementById("show_sumquotaActual").innerHTML = sumQuotaActual;
        document.getElementById("TOTplan").innerHTML = quota;

    }
    // for i  

}

function add_alert() {
    $('#warning').modal('show');
}
// add_alert

function get_data() {
    var pos_sel = document.getElementById("pos_select").value; // get kay by id
    console.log(pos_sel);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_hd_report_curve",
        data: {
            "pos_data": pos_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
        }
    });
    // ajax
}
// get_data

mixedChart = null;

function show_linebarChart() {

    var dataQuota = [];
    var dataActual = [];
    var dataActualPlan = [];

    var arrQuota = [];
    var arrActual = [];
    var arrActualPlan = [];

    for (var i = 1; i <= 7; i++) {
        var show_quota = document.getElementById("quota" + i).innerHTML;
        arrQuota[i] = show_quota;
        <?php if(sizeof($qua_data) != 0){ ?>
        var show_actual_plan = document.getElementById("quotaActualPlan" + i).innerHTML;
        arrActualPlan[i] = show_actual_plan;
        <?php } //if?>
        var show_actual = document.getElementById("show_quotaActual" + i).innerHTML;
        arrActual[i] = show_actual;
    } //for
    arrQuota.shift();
    arrActual.shift();
    arrActualPlan.shift();
    //console.log(arrQuota); //ส่วนนี้เป็นส่วนที่ดึงมา
    for (var a = 0; a < arrQuota.length; a++) {
        dataQuota[a] = arrQuota[a] * 1;
        dataActual[a] = arrActual[a] * 1;
        dataActualPlan[a] = arrActualPlan[a] * 1;

    } //ค่าที่รับจากตารางที่เปลี่ยนจากstring เป็น int
    //for 

    var ctx = document.getElementById('myChart').getContext('2d');

    mixedChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Quota Actual',
                data: dataActual,
                // this dataset is drawn below
                order: 2,
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 1
            }, {
                label: 'Quota',
                data: dataQuota,
                type: 'line',

                // this dataset is drawn on top
                order: 1,
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgb(54, 162, 235)'

            }, {
                label: 'Quota Plan Actual',
                data: dataActualPlan,

                // this dataset is drawn on top
                order: 1,
                borderColor: 'rgb(51, 204, 0)',
                backgroundColor: 'rgb(51, 204, 0)'

            }],
            labels: ['S', 'A', 'B', 'B-', 'C', 'D']
        },
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
    });

} //show_linebarChart


function delete_Chart() {
    //$('#myChart').html("");
    mixedChart.destroy();
    show_linebarChart();
}
//delete_Chart

function manage_data(qut_id) {
    console.log(qut_id);
    window.location.href = "<?php echo base_url(); ?>/ev_quota/Evs_quota/manage_quota/" + qut_id;
} //manage_data

function edit_data(data_sent) {
    window.location.href = "<?php echo base_url(); ?>ev_quota/Evs_quota/edit_quota_actual/" + data_sent;
} //manage_data
</script>


<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="6px"><b>Manage Quota</b></font>
            </h2>
            <div class="panel-ctrls" data-actions-container="">
            </div>
        </div>
        <!-- panel-heading -->

        <div class="panel-body">

            <div class="row">
                <div class="col-md-12">
                    <label class="control-label">
                        <strong>
                            <font size="5px">Report quota</font>
                        </strong>
                    </label>
                </div>
                <!-- col-12  -->
            </div>
            <!-- row  -->
            <hr>

            <div class="row">
                <div class="form-group">
                    <div class="col-md-1">
                        <?php foreach($qup_data as $value){ ?>
                        <input type="text" id="pup_id" value="<?php echo $value->qup_id?>" hidden>
                        <?php } ?>
                    </div>

                    <table class="hearData">
                        <?php foreach($cdp_data as $value){ ?>
                        <input type="text" id="position_id" value="<?php echo $value->Position_ID?>" hidden>
                        <tr>
                            <td class="qut" width="175">
                                <h4><b>Company </b></h4>
                            </td>
                            <td width="75">
                                <h4><b> : </b></h4>
                            </td>
                            <td class="qut_type" width="300"><?php echo $value->Company_name;?></td>
                            <?php } ?>
                        </tr>

                        <?php foreach($manage_qut_data as $value){ ?>
                        <input type="text" id="qut_id" value="<?php echo $value->qut_id?>" hidden>
                        <tr>
                            <td class="qut" width="175">
                                <h4><b>Quota </b></h4>
                            </td>
                            <td width="75">
                                <h4><b> : </b></h4>
                            </td>
                            <td class="qut_type" width="200"><?php echo $value->qut_type;?></td>

                            <td class="qut">
                                <h4><b>Position of Quota </b></h4>
                            </td>
                            <td width="75">
                                <h4><b> : </b></h4>
                            </td>
                            <td class="qut_type" id="qut_pos"><?php echo $value->qut_pos;?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <?php foreach($cdp_data as $value){ ?>
                            <td class="qut" width="175">
                                <h4><b>Department </b></h4>
                            </td>
                            <td width="75">
                                <h4><b> : </b></h4>
                            </td>
                            <td class="qut_type" width="200"><?php echo $value->Dep_Name;?></td>

                            <td class="qut">
                                <h4><b>position </b></h4>

                            </td>
                            <td width="75">
                                <h4><b> : </b></h4>
                            </td>
                            <td class="qut_type" id="qut_pos"><?php echo $value->Position_name;?></td>
                        </tr>
                        <?php } ?>
                    </table>

                    <legend></legend>

                </div>
                <!-- form-group -->

                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <!-- col- 1 -->
                    <div class="col-md-10">
                        <div class="panel panel-orange" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>
                                    <font size="5px"><b>Report table</b></font>
                                </h2>
                                <div class="panel-ctrls" data-actions-container="">
                                </div>
                            </div>
                            <!-- panel-heading -->
                            <div class="panel-body" style="">
                                <table style="width:100%" class="table table-hover m-n orange">
                                    <thead>
                                        <div class="col-md-1">
                                            <tr class="orange">
                                                <th>Grade</th>
                                                <th>S</th>
                                                <th>A</th>
                                                <th>B+</th>
                                                <th>B</th>
                                                <th>B-</th>
                                                <th>C</th>
                                                <th>D</th>
                                                <th>Total</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <div class="col-md-1">
                                            <tr class="orange2">
                                                <td><b>Quota</b></td>
                                                <?php foreach($manage_qut_data as $value){ ?>
                                                <td id="quota1" value="<?php echo $value->qut_grad_S;?>">
                                                    <?php echo $value->qut_grad_S;?></td>
                                                <td id="quota2" value="<?php echo $value->qut_grad_A;?>">
                                                    <?php echo $value->qut_grad_A;?></td>
                                                <td id="quota3" value="<?php echo $value->qut_grad_B_P;?>">
                                                    <?php echo $value->qut_grad_B;?></td>
                                                <td id="quota4" value="<?php echo $value->qut_grad_B;?>">
                                                    <?php echo $value->qut_grad_B;?></td>
                                                <td id="quota5" value="<?php echo $value->qut_grad_B_N;?>">
                                                    <?php echo $value->qut_grad_B_N;?></td>
                                                <td id="quota6" value="<?php echo $value->qut_grad_C;?>">
                                                    <?php echo $value->qut_grad_C;?></td>
                                                <td id="quota7" value="<?php echo $value->qut_grad_D;?>">
                                                    <?php echo $value->qut_grad_D;?></td>
                                                <td><?php echo $value->qut_total;?></td>
                                                <?php } ?>
                                            </tr>

                                            <div class="col-md-1">
                                                <tr class="orange2">
                                                    <td><b>Plan </b></td>
                                                    <td id="show_quotaPlan1"></td>
                                                    <td id="show_quotaPlan2"></td>
                                                    <td id="show_quotaPlan3"></td>
                                                    <td id="show_quotaPlan4"></td>
                                                    <td id="show_quotaPlan5"></td>
                                                    <td id="show_quotaPlan6"></td>
                                                    <td id="show_quotaPlan7"></td>
                                                    <td id="quotaPlanToT"><?php echo $data_Plan;?></td>
                                                </tr>
                                            </div>
                                            <!-- col -1  -->
                                            <?php if(sizeof($qua_data) != 0){ ?>
                                            <div class="col-md-1">
                                                <tr class="orange2">
                                                    <td><b>Plan Actual </b></td>
                                                    <?php foreach($qua_data as $value){ ?>
                                                    <td id="quotaActualPlan1" value="<?php echo $value->qua_grad_S;?>">
                                                        <?php echo $value->qua_grad_S;?></td>
                                                    <td id="quotaActualPlan2" value="<?php echo $value->qua_grad_A;?>">
                                                        <?php echo $value->qua_grad_A;?></td>
                                                    <td id="quotaActualPlan3" value="<?php echo $value->qua_grad_B_P;?>">
                                                        <?php echo $value->qua_grad_B;?></td>
                                                    <td id="quotaActualPlan4" value="<?php echo $value->qua_grad_B;?>">
                                                        <?php echo $value->qua_grad_B;?></td>
                                                    <td id="quotaActualPlan5"
                                                        value="<?php echo $value->qua_grad_B_N;?>">
                                                        <?php echo $value->qua_grad_B_N;?></td>
                                                    <td id="quotaActualPlan6" value="<?php echo $value->qua_grad_C;?>">
                                                        <?php echo $value->qua_grad_C;?></td>
                                                    <td id="quotaActualPlan7" value="<?php echo $value->qua_grad_D;?>">
                                                        <?php echo $value->qua_grad_D;?></td>
                                                    <td><?php echo $value->qua_total;?></td>
                                                    <?php } ?>
                                                </tr>
                                            </div>
                                            <!-- col-1  -->

                                            <?php }
                                            // if ?>

                                            <div class="col-md-1">
                                                <tr class="orange2">
                                                    <td><b>Actual</b></td>
                                                    <td id="quotaActual1"><?php echo $data_actual[0] ?></td>
                                                    <td id="quotaActual2"><?php echo $data_actual[1]?></td>
                                                    <td id="quotaActual3"><?php echo $data_actual[2]?></td>
                                                    <td id="quotaActual4"><?php echo $data_actual[3]?></td>
                                                    <td id="quotaActual5"><?php echo $data_actual[4]?></td>
                                                    <td id="quotaActual6"><?php echo $data_actual[5]?></td>
                                                    <td id="quotaActual7"><?php echo $data_actual[6]?></td>
                                                    <td id="show_Actual"></td>
                                                </tr>
                                            </div>
                                            <!-- col-1  -->
                                            <div class="col-md-1">
                                                <tr class="orange2">
                                                    <td><b>Quota Actual</b></td>
                                                    <td id="show_quotaActual1"></td>
                                                    <td id="show_quotaActual2"></td>
                                                    <td id="show_quotaActual3"></td>
                                                    <td id="show_quotaActual4"></td>
                                                    <td id="show_quotaActual5"></td>
                                                    <td id="show_quotaActual6"></td>
                                                    <td id="show_quotaActual7"></td>
                                                    <td id="show_sumquotaActual"></td>
                                                </tr>
                                            </div>
                                            <tr class="orange2">
                                                <div class="col-md-1">
                                                    <td colspan="7"><b>Total in level</b></td>
                                                    <td id="TOTplan"></td>
                                            </tr>
                                        </div>
                                    </tbody>
                                </table>
                                <br>
                                <canvas id="myChart" width="100"></canvas>
                            </div>
                            <!-- panel-body -->
                        </div>
                    </div>
                    <!-- col-10  -->
                </div>
                <!-- row  -->
                <div class="col-md-10">
                </div>
                <!-- col-10  -->
                <div class="col-md-2">
                </div>
                <!-- col- 2  -->
            </div>
            <!-- row -->
            <?php foreach($manage_qut_data as $value){ ?>
            <button type="button" class="btn btn-inverse " data-dismiss="modal"
                onclick=" manage_data(<?php echo $value->qut_id;?>)">BACK</button>
            <?php } ?>

        </div>
        <!-- panel-body -->
        <br>
    </div>
    <!-- panel panel-indig -->
</div>
<!-- col-md-12 -->