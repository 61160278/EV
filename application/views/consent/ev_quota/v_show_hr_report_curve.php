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
    $("#submit").attr("disabled", true);

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

function check_quota_actual() {
    var check = "";
    var valueActual = 0;
    var actual = 0;
    var quotaActual = 0;
    var quota = "";
    var sumQuotaActual = 0;

    quota = document.getElementById("quotaPlanToT").innerHTML;
    $("#submit").attr("disabled", false);
    // document.getElementById("submit").disabled = false;
    for (var i = 1; i <= 7; i++) {
        check = document.getElementById("quotaActual" + i).value;
        if (check == "") {
            quotaActual = null;
        }
        // if
        else if (check < 0) {
            quotaActual = null;
        }
        // else if
        else {
            valueActual = parseFloat(check);
            // console.log(valueActual);
            quotaActual = (valueActual * 100) / (parseFloat(quota));
            sumQuotaActual += quotaActual;
            // console.log(quotaActual + "=" + valueActual + "* 100 /" + parseFloat(quota));
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
        document.getElementById("show_sumquotaActual").innerHTML = sumQuotaActual.toFixed(2);
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
            // console.log(data)
        }
    });
}
mixedChart = null;

function show_linebarChart() {
    var dataQuota = [];
    var arrQuota = [];
    var dataActual = [];
    var arrActual = [];
    for (var i = 1; i <= 7; i++) {
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

            }],
            labels: ['S', 'A', 'B+',
                'B', 'B-', 'C', 'D'
            ]
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

function confirm_save() {
    var show_sumquotaActual = document.getElementById("show_sumquotaActual").innerHTML;
    var check = parseInt(show_sumquotaActual);

    if (check == 100) {
        $("#warning_save").modal('show');
    }
    // if
    else {
        $("#warning_info").modal('show');
    }
    // else
}
// confirm save 

function confirm_update() {
    var show_sumquotaActual = document.getElementById("show_sumquotaActual").innerHTML;
    var check = parseInt(show_sumquotaActual);

    if (check == 100) {
        $("#warning_update").modal('show');
    }
    // if
    else {
        $("#warning_info").modal('show');
    }
    // else
}
// confirm save 

function insert_quota_actual() {

    var grade = [];
    var check = "";
    var valueActual = 0;
    var actual = 0;
    var quotaActual = 0;
    var quota = "";
    var sumQuotaActual = 0;
    var sum_actual = 0;
    var pos_id = "";
    var qut_id = "";
    var qup_id = "";

    pos_id = document.getElementById("position_id").value;
    qut_id = document.getElementById("qut_id").value;
    quota = document.getElementById("show_sumquotaActual").innerHTML;

    var datedata = new Date();
    var day = datedata.getDate();
    var month = datedata.getMonth() + 1;
    var year = datedata.getFullYear();
    // get date form new date() 
    var savedate = year + "-" + month + "-" + day;


    <?php foreach($year_quota_data->result() as $value){ ?>
    if (year == "<?php echo $value->pay_year;?>") {
        var year_id = <?php echo $value->pay_id;?>
    }
    <?php } ?>

    for (var i = 1; i <= 7; i++) {
        check = document.getElementById("quotaActual" + i).value;
        if (check == "") {
            quotaActual = null;
        } else if (check < 0) {
            quotaActual = null;
        } else {
            valueActual = parseFloat(check).toFixed(2);

            grade[i] = valueActual;
            sum_actual += parseInt(valueActual);
            actual += valueActual;

        } // if 


    }
    // for i  

    grade.shift();
    qua_gradeS = grade[0];
    qua_gradeA = grade[1];
    qua_gradeB_P = grade[2];
    qua_gradeB = grade[3];
    qua_gradeB_N = grade[4];
    qua_gradeC = grade[5];
    qua_gradeD = grade[6];

    console.log(qua_gradeS);
    console.log(qua_gradeA);
    console.log(qua_gradeB_P);
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
            "qua_gradeB_P": qua_gradeB_P,
            "qua_gradeB": qua_gradeB,
            "qua_gradeB_N": qua_gradeB_N,
            "qua_gradeC": qua_gradeC,
            "qua_gradeD": qua_gradeD,
            "sum_actual": sum_actual,
            "qut_id": qut_id,
            "pos_id": pos_id,
            "year_id": year_id
        },
        dataType: "JSON",

        success: function(status) {
            console.log(status);

        }
    }); //ajax

    manage_data(qut_id);

} //insert_quota_actual

function insert_quota_plan() {
    var check = "";

    var sum_quota_plan = 0;
    var grade = [];
    var qup_gradeS = 0;
    var qup_gradeA = 0;
    var qup_gradeB_P = 0;
    var qup_gradeB = 0;
    var qup_gradeB_N = 0;
    var qup_gradeC = 0;
    var qup_gradeD = 0;
    var qup_gradeTOT = 0;

    var check = "";
    var value_quotaPlan = 0;
    var quota = 0;
    var pos_id = "";
    var qut_id = "";

    pos_id = document.getElementById("position_id").value;
    qut_id = document.getElementById("qut_id").value;
    check = document.getElementById("quotaPlanToT").innerHTML;

    //}
    if (check == " ") {
        check = null;
    } else {
        var datedata = new Date();
        var day = datedata.getDate();
        var month = datedata.getMonth() + 1;
        var year = datedata.getFullYear();
        // get date form new date() 
        var savedate = year + "-" + month + "-" + day;


        <?php foreach($year_quota_data->result() as $value){ ?>
        if (year == "<?php echo $value->pay_year;?>") {
            var year_id = <?php echo $value->pay_id;?>
        }
        <?php } ?>
        for (var i = 1; i <= 7; i++) {
            quota = document.getElementById("quota" + i).innerHTML;
            value_quotaPlan = parseFloat(check) * quota / 100;
            grade[i] = value_quotaPlan;
            sum_quota_plan += grade[i];
        } //for 
        grade.shift();
        qup_gradeS = grade[0];
        qup_gradeA = grade[1];
        qup_gradeB_P = grade[2];
        qup_gradeB = grade[3];
        qup_gradeB_N = grade[4];
        qup_gradeC = grade[5];
        qup_gradeD = grade[6];

            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>/ev_quota/Evs_quota/quota_plan_insert",

                data: {

                    "qup_gradeS": qup_gradeS,
                    "qup_gradeA": qup_gradeA,
                    "qup_gradeB_P": qup_gradeB_P,
                    "qup_gradeB": qup_gradeB,
                    "qup_gradeB_N": qup_gradeB_N,
                    "qup_gradeC": qup_gradeC,
                    "qup_gradeD": qup_gradeD,
                    "sum_quota_plan": sum_quota_plan,
                    "qut_id": qut_id,
                    "pos_id": pos_id,
                    "year_id": year_id
                },
                dataType: "JSON",

                success: function(status) {
                    console.log(status);

                }

            }); //ajax
    }
    //

    insert_quota_actual();

} //insert_quota_plan

function insert_quota_update() {

    var grade = [];
    var check = "";
    var valueActual = 0;
    var actual = 0;
    var quotaActual = 0;
    var quota = "";
    var sumQuotaActual = 0;
    var sum_actual = 0;
    var qut_id = "";
    var qua_id = "";

    qut_id = document.getElementById("qut_id").value;
    qua_id = document.getElementById("qua_id").value;
    quota = document.getElementById("show_Actual").innerHTML;


    var datedata = new Date();
    var day = datedata.getDate();
    var month = datedata.getMonth() + 1;
    var year = datedata.getFullYear();
    // get date form new date() 
    var savedate = year + "-" + month + "-" + day;


    <?php foreach($year_quota_data->result() as $value){ ?>
    if (year == "<?php echo $value->pay_year;?>") {
        var year_id = <?php echo $value->pay_id;?>
    }
    <?php } ?>
    for (var i = 1; i <= 7; i++) {
        check = document.getElementById("show_quotaActual" + i).value;
        if (check == "") {
            quotaActual = null;
        } else if (check < 0) {
            quotaActual = null;
        } else {
            valueActual = parseFloat(check).toFixed(2);

            grade[i] = valueActual;
            sum_actual += valueActual;
            quotaActual = (valueActual * 100) / (parseFloat(quota).toFixed(2));
            // grade[i] =quotaActual;
            sumQuotaActual += quotaActual;
            actual += valueActual;

        } // if 


    }
    // for i  

    grade.shift();
    qua_gradeS = grade[0];
    qua_gradeA = grade[1];
    qua_gradeB_P = grade[2];
    qua_gradeB = grade[3];
    qua_gradeB_N = grade[4];
    qua_gradeC = grade[5];
    qua_gradeD = grade[6];

    console.log(qua_gradeS);
    console.log(qua_gradeA);
    console.log(qua_gradeB_P);
    console.log(qua_gradeB);
    console.log(qua_gradeB_N);
    console.log(qua_gradeC);
    console.log(qua_gradeD);
    console.log(sum_actual);
    console.log(qua_id);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/Evs_quota/quota_actual_update",
        data: {

            "qua_gradeS": qua_gradeS,
            "qua_gradeA": qua_gradeA,
            "qua_gradeB_P": qua_gradeB_P,
            "qua_gradeB": qua_gradeB,
            "qua_gradeB_N": qua_gradeB_N,
            "qua_gradeC": qua_gradeC,
            "qua_gradeD": qua_gradeD,
            "sum_actual": sum_actual,
            "qua_id": qua_id
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data);

        }
    }); //ajax

    manage_data(qut_id);

} //insert_quota_actual

function manage_data(qut_id) {
    window.location.href = "<?php echo base_url(); ?>/ev_quota/Evs_quota/manage_quota/" + qut_id;
} //manage_data

function edit_data(data_sent) {
    window.location.href = "<?php echo base_url(); ?>ev_quota/Evs_quota/edit_quota_actual/" + data_sent;
} //edit_data
</script>



<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="6px"><b>MANAGE QUOTA</b></font>
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
                            <font size="5px">Manage quota</font>
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
                    <!-- col-1  -->
                    <div class="col-md-10">
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
                                                <td id="quota1" value="5"><?php echo $value->qut_grad_S;?></td>
                                                <td id="quota2" value="25"><?php echo $value->qut_grad_A;?></td>
                                                <td id="quota3" value="40"><?php echo $value->qut_grad_B_P;?></td>
                                                <td id="quota4" value="40"><?php echo $value->qut_grad_B;?></td>
                                                <td id="quota5" value="40"><?php echo $value->qut_grad_B_N;?></td>
                                                <td id="quota6" value="25"><?php echo $value->qut_grad_C;?></td>
                                                <td id="quota7" value="5"><?php echo $value->qut_grad_D;?></td>
                                                <td><?php echo $value->qut_total;?></td>
                                                <?php } ?>
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
                                                    <td id="show_quotaPlan7"></td>
                                                    <td id="quotaPlanToT"><?php echo $data_Plan;?></td>

                                            </div>
                                            </tr>
                                            <div class="col-md-1">
                                                <tr class="orange2">
                                                    <td><b>Actual</b></td>

                                                    <?php if(sizeof($qua_data) != 0){ 
                                                        foreach($qua_data as $index => $row){ ?>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual1"
                                                            onchange="check_quota_actual()"
                                                            value="<?php echo $row->qua_grad_S; ?>" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual2"
                                                            onchange="check_quota_actual()"
                                                            value="<?php echo $row->qua_grad_A; ?>" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual3"
                                                            onchange="check_quota_actual()"
                                                            value="<?php echo $row->qua_grad_B_P; ?>" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual4"
                                                            onchange="check_quota_actual()"
                                                            value="<?php echo $row->qua_grad_B; ?>" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual5"
                                                            onchange="check_quota_actual()"
                                                            value="<?php echo $row->qua_grad_B_N; ?>" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual6"
                                                            onchange="check_quota_actual()"
                                                            value="<?php echo $row->qua_grad_C; ?>" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual7"
                                                            onchange="check_quota_actual()"
                                                            value="<?php echo $row->qua_grad_D; ?>" min="0">
                                                    </td>
                                                    <input type="text" id="qua_id" value="<?php echo $row->qua_id; ?>"
                                                        hidden>
                                                    <?php 
                                                        }
                                                        // foreach
                                                    }
                                                    // if 
                                                    else{ ?>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual1"
                                                            onchange="check_quota_actual()" value="0" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual2"
                                                            onchange="check_quota_actual()" value="0" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual3"
                                                            onchange="check_quota_actual()" value="0" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual4"
                                                            onchange="check_quota_actual()" value="0" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual5"
                                                            onchange="check_quota_actual()" value="0" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual6"
                                                            onchange="check_quota_actual()" value="0" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="quotaActual7"
                                                            onchange="check_quota_actual()" value="0" min="0">
                                                    </td>

                                                    <?php } // else?>
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
                                                    <td id="show_quotaActual7"></td>
                                                    <td id="show_sumquotaActual"></td>
                                                </tr>
                                            </div>
                                            <tr class="orange2">
                                                <div class="col-md-1">
                                                    <td colspan="8"><b>Total in level</b></td>
                                                    <td id="TOTplan"></td>
                                            </tr>
                                        </div>
                                    </tbody>
                                </table>
                                <br>
                                <button class="btn-success btn pull-right" id="submit" type="submit"
                                    onclick="delete_Chart()">SUBMIT</button>
                                <br>

                                <canvas id="myChart" width="100"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- col-10  -->
                </div>
                <!-- row  -->
                <div class="col-md-10">
                </div>
                <!-- col-10 -->
                <div class="col-md-2">
                </div>
                <!-- col -2  -->
            </div>
            <!-- row -->
            <?php foreach($manage_qut_data as $value){ ?>
            <button type="button" class="btn btn-inverse " data-dismiss="modal"
                onclick=" manage_data(<?php echo $value->qut_id;?>)">CANCEL</button>
            <?php }
            //foreach ?>
            <?php if(sizeof($qua_data) != 0){ ?>
            <button type="button" class="btn btn-success pull-right" style="background-color:#0000CD;" id="update"
                onclick="confirm_update()">SAVE</button>
            <?php }
            // if
            else{ ?>
            <button type="button" class="btn btn-success pull-right" style="background-color:#0000CD;" id="edit"
                onclick="confirm_save()">SAVE</button>
            <?php }
            // else ?>

        </div>
        <!-- panel-body -->
        <br>
    </div>
    <!-- panel panel-indigo -->
</div>
<!-- col-md-12 -->

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
                            <label for="focusedinput" class="control-label" style="font-family:'Courier New'"
                                align="center">
                                <font size="3px">
                                    Actual quota value is more than plan!</font>
                            </label>

                        </div>
                    </div>
                </div>
                <!-- form-horizontal -->
            </div>
            <!-- Modal body -->

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
                </div>

            </div>
            <!-- Modal footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Warning -->

<!-- Modal Warning -->
<div class="modal fade" id="warning_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    Please complete the information.</font>
                            </label>

                        </div>
                    </div>
                </div>
                <!-- form-horizontal -->
            </div>
            <!-- Modal body -->

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
                </div>

            </div>
            <!-- Modal footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Warning -->


<!-- Modal Warning  save -->
<div class="modal fade" id="warning_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b>
                    </font>
                </button>
                <h2 class="modal-title"><b>
                        <font color="white">Do you want to save ?</font>
                    </b></h2>
            </div>
            <!-- Modal header -->

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="focusedinput" class="control-label" align="center">
                            <font size="3px">
                                Please verify the accuracy of the information.</font>
                        </label>
                    </div>
                    <!-- col-12 -->
                </div>
                <!-- row  -->
            </div>
            <!-- Modal body -->

            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6" align="left">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            id="warning_save">Cancel</button>
                    </div>
                    <!-- col-6  -->
                    <div class="col-md-6" align="right">
                        <button type="button" class="btn btn-success" data-dismiss="modal"
                            onclick="insert_quota_plan()">Confirm</button>

                    </div>
                    <!-- col- 6 -->
                </div>
                <!-- row  -->
            </div>
            <!-- Modal footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Warning -->

<!-- Modal Warning  update -->
<div class="modal fade" id="warning_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b>
                    </font>
                </button>
                <h2 class="modal-title"><b>
                        <font color="white">Do you want to save ?</font>
                    </b></h2>
            </div>
            <!-- Modal header -->

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="focusedinput" class="control-label" align="center">
                            <font size="3px">
                                Please verify the accuracy of the information.</font>
                        </label>
                    </div>
                    <!-- col-12 -->
                </div>
                <!-- row  -->
            </div>
            <!-- Modal body -->

            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6" align="left">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            id="warning_save">Cancel</button>
                    </div>
                    <!-- col-6  -->
                    <div class="col-md-6" align="right">
                        <button type="button" class="btn btn-success" data-dismiss="modal"
                            onclick="insert_quota_update()">Confirm</button>

                    </div>
                    <!-- col- 6 -->
                </div>
                <!-- row  -->
            </div>
            <!-- Modal footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Warning -->