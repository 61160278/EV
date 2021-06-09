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
    font-size: 15px;
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
</style>
<script>
$(document).ready(function() {
    check_quota_plan()
    check_quota_actual()
    show_quotaplan()
    document.getElementById("submit").disabled = true;
});

function check_quota_plan() {

    var check = "";
    var value_quotaPlan = 0;
    var quota = 0;
    //console.log(quota);
    document.getElementById("submit").disabled = false;
    check = document.getElementById("quotaPlanToT").innerHTML;
    //console.log(check);
    for (var i = 1; i <= 6; i++) {
        quota = document.getElementById("quota" + i).innerHTML;
        value_quotaPlan = parseFloat(check) * parseFloat(quota) / 100;
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
    // document.getElementById("submit").disabled = false;
    for (var i = 1; i <= 6; i++) {
        check = document.getElementById("quotaActual" + i).value;
        if (check == "") {
            quotaActual = null;
        } else if (check < 0) {
            quotaActual = null;
        } else {
            valueActual = parseFloat(check);
            console.log(valueActual);
            quotaActual = (valueActual * 100) / parseFloat(quota);
            sumQuotaActual += quotaActual;
            console.log(quotaActual + "=" + valueActual + "* 100 /" + parseFloat(quota));
            actual += valueActual;

        }
        if (actual > parseFloat(quota)) {
            $("#show_Actual").css("color", "red");
            add_alert();
            $("#submit").attr("disabled", true);
        } else if (actual == parseFloat(quota)) {
            $("#submit").attr("disabled", false);
            $("#show_Actual").css("color", "#000000");
        }
        // if 
        document.getElementById("show_quotaActual" + i).innerHTML = quotaActual;
        document.getElementById("show_Actual").innerHTML = actual;
        document.getElementById("show_sumquotaActual").innerHTML = sumQuotaActual;
        document.getElementById("TOTplan").innerHTML = quota;

    }
    // for i  
}

function add_alert() {
    $('#warning').modal('show');
}

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
}

function show_linebarChart() {

    for (var i = 1; i <= 6; i++) {
        $("#quotaActual" + i).attr("disabled", true);
    }
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
    $('#reset').on('click', function() {
        mixedChart.destroy();

    });

    $(document).ready(function() {
        $("#reset").click(function() {
            for (var i = 1; i <= 6; i++) {
                $("#quotaActual" + i).attr("disabled", false);
            }

        });
    });

} //show_linebarChart

function show_quotaplan() {
    $("#quotaPlan").attr("disabled", true);

    var dataQuota = [];
    var arrQuota = [];
    for (var i = 1; i <= 6; i++) {
        //  var show_quota = document.getElementById("quota" + i).innerHTML;
        var show_quota = document.getElementById("quota" + i).innerHTML;
        //  var arrQuota = [5, 25, 40, 25, 5];
        arrQuota[i] = show_quota;
    } //for
    arrQuota.shift();
    console.log(arrQuota); //ส่วนนี้เป็นส่วนที่ดึงมา
    for (var a = 0; a < arrQuota.length; a++) {
        dataQuota[a] = arrQuota[a] * 1;

    } //for ค่าที่รับจากตารางที่เปลี่ยนจากstring เป็น int
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
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: dataQuota,
        }]

    };
    // </block:setup>
    // <block:config:0>
    const config = {
        type: 'line',
        data,
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
    var myChart = new Chart(document.getElementById('myChart'), config); //new Chart
    $('#submit').on('click', function() {
        myChart.destroy();
        show_linebarChart()
    });
} //show_quotaplan

function confirm_save() {
    insert_quota_actual();
    $('#warning_save').modal('show');
}

function insert_quota_actual() {
    // var check = "";

    // var sum_quota_plan = 0;
    var grade = [];
    // var qua_gradeS = 0;
    // var qua_gradeA = 0;
    // var qua_gradeB = 0;
    // var qua_gradeB_N = 0;
    // var qua_gradeC = 0;
    // var qua_gradeD = 0;
    // var qua_gradeTOT = 0;

    // var check = "";
    // var value_quotaPlan = 0;
    // var quota = 0;
    var check = "";
    var valueActual = 0;
    var actual = 0;
    var quotaActual = 0;
    var quota = "";
    var sumQuotaActual = 0;
    var sum_actual = 0;
    quota = document.getElementById("quotaPlanToT").innerHTML;
    // document.getElementById("submit").disabled = false;
    for (var i = 1; i <= 6; i++) {
        check = document.getElementById("quotaActual" + i).value;
        if (check == "") {
            quotaActual = null;
        } else if (check < 0) {
            quotaActual = null;
        } else {
            valueActual = parseFloat(check);

            grade[i] = valueActual;
            sum_actual += grade[i];
            console.log(valueActual);
            quotaActual = (valueActual * 100) / parseFloat(quota);
            // grade[i] =quotaActual;
            sumQuotaActual += quotaActual;
            console.log(quotaActual + "=" + valueActual + "* 100 /" + parseFloat(quota));
            actual += valueActual;

        } // if 


    }
    // for i  
    // check = document.getElementById("quotaPlan").value;
    //console.log(check);
    //}

    grade.shift();
    console.log(grade);
    // console.log(sum_quota_plan);
    qua_gradeS = grade[0];
    qua_gradeA = grade[1];
    qua_gradeB = grade[2];
    qua_gradeB_N = grade[3];
    qua_gradeC = grade[4];
    qua_gradeD = grade[5];

    console.log(qua_gradeS);
    console.log(qua_gradeA);
    console.log(qua_gradeB);
    console.log(qua_gradeB_N);
    console.log(qua_gradeC);
    console.log(qua_gradeD);
    console.log(sum_actual);
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/Evs_quota/quota_actual_insert",

        data: {

            "qua_gradeS": qua_gradeS,
            "qua_gradeA": qua_gradeA,
            "qua_gradeB": qua_gradeB,
            "qua_gradeB_N": qua_gradeB_N,
            "qua_gradeC": qua_gradeC,
            "qua_gradeD": qua_gradeD,
            "sum_actual": sum_actual
        },
        dataType: "JSON",

        success: function(status) {
            console.log(status);

        }

    }); //ajax


} //insert_quota
</script>
<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="6px"><b>Report Curve</b></font>
            </h2>
            <div class="panel-ctrls" data-actions-container="">
            </div>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="form-group">
                    <div class="col-md-1">
                    </div>
                    <table class="hearData">
                        <tr>
                            <td class="qut" width="175">
                                <h4><b>Quota</b></h4>
                            </td>
                            <td width="75">
                                <h4><b> : </b></h4>
                            </td>
                            <td class="qut_type" width="300"></td>


                            <td class="qut" width="175">
                                <h4><b>Position of Quota</b></h4>
                            </td>
                            <td width="75">
                                <h4><b> : </b></h4>
                            </td>
                            <td class="qut_type" width="200"></td>

                            <td class="qut">
                                <h4><b>Position</b></h4>
                            </td>
                            <td width="75">
                                <h4><b> : </b></h4>
                            </td>
                            <td class="qut_type" id="qut_pos"></td>
                        </tr>

                    </table>
                    <!-- <div class="col-md-2">
                        <select class="form-control text" id="">
                            <option value="yearEndBonus">Quota</option>
                            <option value="yearEndBonus">Year End Bonus</option>
                            <option value="salaryIncrement">Salary Increment</option>
                        </select>
                    </div> -->
                    <!-- <div class="col-md-2">
                        <select class="form-control text" id="">
                            <option value="yearEndBonus">Quota of position</option>
                            <option value="yearEndBonus">Team Associate above</option>
                            <option value="salaryIncrement">Operational Associate</option>
                        </select>
                    </div> -->
                    <!-- <div class="col-md-2">
                        <select for="pos_select" id="pos_select" class="form-control text">
                            <option value="select">Select Position</option> -->
                    <!-- <option value="0">All Position</option> -->
                    <!-- start foreach -->
                    <?php foreach($pos_data as $value){ ?>
                    <!-- <option value="<?php //echo $value->Position_ID;?>"> -->
                    <?php //echo $value->Pos_shortName;?>
                    <!-- </option> -->
                    <?php } ?>
                    <!-- end foreach -->
                    <!-- </select> -->
                    <!-- </div> -->
                    <div class="col-md-11">
                    </div>
                    <div class="col-md-1">
                        <button class="btn-success btn" id="submit" type="submit"
                            onclick="show_linebarChart()">SUBMIT</button>

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
                                <font size="5px"><b>Report table</b></font>
                            </h2>
                            <div class="panel-ctrls" data-actions-container="">
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
                                            <td id="quota2" value="25">15</td>
                                            <td id="quota3" value="40">30</td>
                                            <td id="quota4" value="40">30</td>
                                            <td id="quota5" value="25">15</td>
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
                                                    <input type="number" class="form-control" id="quotaActual1"
                                                        onchange="check_quota_actual()" min="0">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual2"
                                                        onchange="check_quota_actual()" min="0">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual3"
                                                        onchange="check_quota_actual()" min="0">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual4"
                                                        onchange="check_quota_actual()" min="0">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual5"
                                                        onchange="check_quota_actual()" min="0">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual6"
                                                        onchange="check_quota_actual()" min="0">
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
                                                <td id="TOTplan"></td>
                                        </tr>
                                    </div>
                                </tbody>
                            </table>
                            <br>
                            <div class="col-md-offset-11">
                                <button class="btn btn-warning" type="reset" id="reset">edit</button>
                            </div>
                            <br>

                            <canvas id="myChart" width="100"></canvas>


                        </div>

                        <!-- Modal Warning -->
                        <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
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
                                                    <label for="focusedinput" class="control-label"
                                                        style="font-family:'Courier New'" align="center">
                                                        <font size="3px">
                                                            Actual value is more than plan!</font>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- form-horizontal -->
                                    </div>
                                    <!-- Modal body -->

                                    <div class="modal-footer">
                                        <div class="btn-group pull-right">
                                            <button type="button" class="btn btn-success"
                                                data-dismiss="modal">Yes</button>
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

                </div>
            </div>
        </div>
        <button type="button" class="btn btn-inverse pull-left" data-dismiss="modal">CANCEL</button>
        <button type="button" class="btn btn-social pull-right" style="background-color:#0000CD;"
            onclick="confirm_save()">SAVE</button>
    </div>

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
                            <label for="focusedinput" class="control-label" style="font-family:'Courier New'"
                                align="center">
                                <font size="3px">
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