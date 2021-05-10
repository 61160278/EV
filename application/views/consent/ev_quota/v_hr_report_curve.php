<?php
/*
* v_hr_report_cureve.php
* Display v_hr_report_cureve
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2563-04-06
*/  
?>
<script>
$(document).ready(function() {
    check_quota_plan()
    check_quota_actual()
    document.getElementById("submit").disabled = true;
});

function get_data() {
    var pos_sel = document.getElementById("pos_select").value; // get kay by id
    console.log(pos_sel);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_hr_report_curve",
        data: {
            "pos_psl_id": pos_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
        }
    });
}

function get_department() {
    var dep_sel = document.getElementById("dep_select").value; // get kay by id
    console.log(dep_sel);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_mange_quota",
        data: {
            "dep_id": dep_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
        }
    });
}

function get_company() {
    var cpn_sel = document.getElementById("com_select").value; // get kay by id
    console.log(cpn_sel);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_mange_quota",
        data: {
            "cpn_id": cpn_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
        }
    });
}


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
    for (var i = 1; i <= 6; i++) {
        check = document.getElementById("quotaActual" + i).value;

        if (check == "") {
            quotaActual = null;
        } else if (check < 0) {
            quotaActual = null;
        }
        // if 
        else {
            valueActual = parseFloat(check);
            console.log(valueActual);
            quotaActual = (valueActual * 100) / parseFloat(quota);
            sumQuotaActual += quotaActual;
            console.log(quotaActual + "=" + valueActual + "* 100 /" + parseFloat(quota));
            actual += valueActual;
            console.log(actual);
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
                    // stacked: true,
                    ticks: {
                        
                        stepSize: 20
                    }
                    // layout: {
                    //     padding: 20
                    // }
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

function get_department() {
    var dep_sel = document.getElementById("com_select").value; // get kay by id
    console.log(dep_sel);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_depamant",
        data: {
            "dep_id": dep_sel
        },

        success: function(data) {
            data = JSON.parse(data)
            // console.log(data)
            var table_data = ""
            table_data += '<option value="0">Select Department</option>'
            data.forEach((row, i) => {

                table_data += '<option value="' + row.Dep_id + '">' + row.Dep_shortName +
                    '</option>'

            });

            $('#dep_select').html(table_data);

        }
    });

} //get_department()
</script>
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

<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="6px"><b>Report Curve</b></font>
            </h2>
            <div class="panel-ctrls" data-actions-container="">
            </div>
        </div>
        <div class="panel-body" style="">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control text" id="com_select" onclick="get_department()">
                            <option value="0">Company</option>
                            <!-- start foreach -->
                            <?php foreach($com_data->result() as $value){ ?>
                            <option value="<?php echo $value->Company_ID;?>">
                                <?php echo $value->Company_shortname;?>
                            </option>
                            <?php } ?>
                            <!-- end foreach -->
                        </select>
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
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control text" id="dep_select">
                            <option value="0">Select Department</option>
                            <!-- start foreach -->
                            <!-- <?php //foreach($dep_data->result() as $value){ ?> -->
                            <!-- <option value="<?php //echo $value->Dep_id;?>"> -->
                            <?php //echo $value->Dep_Name;?>
                            <!-- </option> -->
                            <?php//} ?>
                            <!-- end foreach -->
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control text" id="pos_select">
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
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
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
                                <font size="5px">Report table</font>
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
                                                        onchange="check_quota_actual()" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual2"
                                                        onchange="check_quota_actual()" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual3"
                                                        onchange="check_quota_actual()" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual4"
                                                        onchange="check_quota_actual()" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual5"
                                                        onchange="check_quota_actual()" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="quotaActual6"
                                                        onchange="check_quota_actual()" min="0" required>
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
                            <div id="line-example" style="position: relative;">
                                <canvas id="myChart"></canvas>
                            </div>
                            <!-- Modal Warning -->
                            <div class="modal fade" id="warning" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
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
        </div>
    </div>
</div>