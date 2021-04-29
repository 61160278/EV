<?php
/*
* v_hd_report_cureve.php
* Display v_hd_report_cureve
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2563-04-06
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
    font-size: 15px;
}

.tdbold {
    font-weight: bold;
}

tbody:hover {
    background-color: #ffffff;
}
</style>
<script>
$(document).ready(function() {
    check_quota_plan()
    check_quota_actual()
});

function check_quota_plan() {

    var check = "";
    var value_quotaPlan = 0;
    var quota = 0;
    //console.log(quota);
    check = document.getElementById("quotaPlanToT").innerHTML;
    //console.log(check);
    for (var i = 1; i <= 6; i++) {
        quota = document.getElementById("quota" + i).innerHTML;
        value_quotaPlan = parseInt(check) * parseInt(quota) / 100;
        document.getElementById("show_quotaPlan" + i).innerHTML = value_quotaPlan;
        console.log(value_quotaPlan);
    } //for 
}

function check_quota_actual() {
    var check = "";
    var valueActual = 0;
    var actual = 0;
    var quotaActual = 0;
    var quota = "";
    var sumQuotaActual = 0;
    quota = document.getElementById("quotaPlanToT").innerHTML;
    for (var i = 1; i <= 6; i++) {
        check = document.getElementById("quotaActual" + i).value;
        if (check == "") {
            quotaActual = null;
        }
        if (check != "") {
            valueActual = parseInt(check);
            console.log(valueActual);
            quotaActual = (valueActual * 100) / parseInt(quota);
            sumQuotaActual += quotaActual;
            console.log(quotaActual + "=" + valueActual + "* 100 /" + parseInt(quota));
            actual += valueActual;

        }
        // if 
        document.getElementById("show_quotaActual" + i).innerHTML = quotaActual;
        document.getElementById("show_Actual").innerHTML = actual;
        document.getElementById("show_sumquotaActual").innerHTML = sumQuotaActual;
        document.getElementById("TOTplan").innerHTML = quota;

    }
    // for i  

    // //console.log(quota);
    // for (var j = 1; j <= 6; j++) {

    //     //quotaActual = (parseInt(check) * 100) / parseInt(quota);


    // }
}



function get_data() {
    var pos_sel = document.getElementById("pos_select").value; // get kay by id
    console.log(pos_sel);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_hd_report_curve",
        data: {
            "pos_psl_id": pos_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
        }
    });
}

function show_linebarChart() {
    var dataQuota = [];
    var arrQuota = [];
    var dataActual = [];
    var arrActual = [];
    for (var i = 1; i <= 6; i++) {

        var show_quota = document.getElementById("quota" + i).innerHTML;
        arrQuota[i] = show_quota;
        var show_actual = document.getElementById("show_quotaActual" + i).innerHTML;
        arrActual[i] = show_actual;
    } //for
    arrQuota.shift();
    arrActual.shift();
    //console.log(arrQuota); //ส่วนนี้เป็นส่วนที่ดึงมา
    for (var a = 0; a < arrQuota.length; a++) {
        dataQuota[a] = arrQuota[a] * 1;
        dataActual[a] = arrActual[a] * 1;

    } //ค่าที่รับจากตารางที่เปลี่ยนจากstring เป็น int

    console.log(dataQuota);
    console.log(dataActual);

    var ctx = document.getElementById('myChart').getContext('2d');
    var mixedChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Actual',
                data: dataActual,
                // this dataset is drawn below
                order: 2,
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)'
            }, {
                label: 'Quota',
                data: dataQuota,
                type: 'line',

                // this dataset is drawn on top
                order: 1,
                borderColor: 'rgb(54, 162, 235)'
            }],
            labels: ['S', 'A', 'B', 'B-', 'C', 'D']
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
</script>
<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="6px"><b>Report Curve</b></font>
            </h2>
            <div class="panel-ctrls" data-actions-container=""
                data-action-collapse='{"target": ".panel-body, .panel-footer"}'>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control text" id="">
                            <option value="yearEndBonus">Quota</option>
                            <option value="yearEndBonus">Year End Bonus</option>
                            <option value="salaryIncrement">Salary Increment</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control text" id="">
                            <option value="yearEndBonus">Quota of position</option>
                            <option value="yearEndBonus">Team Associate above</option>
                            <option value="salaryIncrement">Operational Associate</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select for="pos_select" id="pos_select" class="form-control text">
                            <option value="select">Select Position</option>
                            <option value="0">All Position</option>
                            <!-- start foreach -->
                            <?php foreach($pos_data as $value){ ?>
                            <option value="<?php echo $value->Position_ID;?>">
                                <?php echo $value->Pos_shortName;?>
                            </option>
                            <?php } ?>
                            <!-- end foreach -->
                        </select>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-2">
                        <button class="btn-success btn" type="submit" onclick="show_linebarChart()">SUBMIT</button>
                    </div>
                </div>
            </div>
            <br>
            <legend></legend>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="panel panel-orange" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>
                                <font size="5px"><b>ตางราง Report</b></font>
                            </h2>
                            <div class="panel-ctrls" data-actions-container=""
                                data-action-collapse='{"target": ".panel-body, .panel-footer"}'>
                            </div>
                        </div>
                        <div class="panel-body" style="">
                            <table style="width:100%" class="table table-hover m-n orange">
                                <thead>
                                    <div class="col-md-1">
                                        <tr class="orange">
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
                                    <div class="col-md-1">
                                        <tr class="orange2">
                                            <td><b>Quota</b></td>
                                            <td id="quota1" value="5">5</td>
                                            <td id="quota2" value="25">25</td>
                                            <td id="quota3" value="40">30</td>
                                            <td id="quota4" value="40">10</td>
                                            <td id="quota5" value="25">25</td>
                                            <td id="quota6" value="5">5</td>
                                            <td>100</td>
                                        </tr>
                                        <div class="col-md-1">
                                            <tr class="orange2">
                                                <td><b>Plan</b></td>
                                                <td id="show_quotaPlan1"></td>
                                                <td id="show_quotaPlan2"></td>
                                                <td id="show_quotaPlan3"></td>
                                                <td id="show_quotaPlan4"></td>
                                                <td id="show_quotaPlan5"></td>
                                                <td id="show_quotaPlan6"></td>
                                                <td id="quotaPlanToT">8</td>
                                        </div>
                                        </tr>
                                        <div class="col-md-1">
                                            <tr class="orange2">
                                                <td><b>Actual</b></td>
                                                <td>
                                                    <input type="text" class="form-control" id="quotaActual1"
                                                        onchange="check_quota_actual()">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="quotaActual2"
                                                        onchange="check_quota_actual()">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="quotaActual3"
                                                        onchange="check_quota_actual()">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="quotaActual4"
                                                        onchange="check_quota_actual()">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="quotaActual5"
                                                        onchange="check_quota_actual()">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="quotaActual6"
                                                        onchange="check_quota_actual()">
                                                </td>
                                                <td id="show_Actual"></td>
                                            </tr>
                                        </div>
                                        <div class="col-md-1">
                                            <tr class="orange2">
                                                <td><b>Quota Actual</b></td>
                                                <td id="show_quotaActual1"></td>
                                                <td id="show_quotaActual2"></td>
                                                <td id="show_quotaActual3"></td>
                                                <td id="show_quotaActual4"></td>
                                                <td id="show_quotaActual5"></td>
                                                <td id="show_quotaActual6"></td>
                                                <td id="show_sumquotaActual"></td>
                                            </tr>
                                        </div>
                                        <tr class="orange2">
                                            <div class="col-md-1">
                                                <td colspan="7"><b>Total in level</b></td>
                                                <td id = "TOTplan" ></td>
                                        </tr>
                                    </div>
                                </tbody>
                            </table>
                            <br>
                            <br>

                            <canvas id="myChart" width="100"></canvas>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>