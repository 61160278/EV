<?php
/*
* v_detail_quota.php
* Display v_detail_quota
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-7
*/  
/*
* v_detail_quota.php
* Display v_detail_quota
* @input    
* @output
* @author   Lapatrada Puttamongkol
* @Update Date 2564-04-20
*/  
/*v_detail_quota.php
* Display v_detail_quota
* @input    
* @output
* @author   Lapatrada Puttamongkol
* @Update Date 2564-04-26
*/  
?>
<style>
h4 {
    color: black;
}

.text {
    color: black;
}

.orange {
    background-color: orange;

}

.orange2 {
    background-color: #ffe4b3;
}

th {
    text-align: center;
    color: black;
    font-size: 20px;
}

td {
    text-align: center;
    color: black;
    font-size: 16px;
}

.font1 {
    text-align: center;
    color: black;
    font-size: 16px;
}

tbody:hover {
    background-color: #ffffff;
}

.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
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
<!-- <script src="path/to/chartjs/dist/chart.js"></script> -->
<script>
/*
 * check_quota_plan
 * Display v_detail_quota
 * @input    
 * @output
 * @author   Lapatrada Puttamongkol
 * @Create Date 2564-04-20
 */
$(document).ready(function() {
    $("#reset").click(function() {
        $("#quotaPlan").attr("disabled", false);
    }); //click
    show_quotaplan()
    $("#saveData").attr("disabled", true);
}); //ready


function check_quota_plan() {
    var check = "";
    var value_quotaPlan = 0;
    var quota = 0;

    check = document.getElementById("quotaPlan").value;
    console.log(check);
    if (check == "") {
        //     // 
        for (var i = 1; i <= 6; i++) {

            console.log("123456 : " + check);

            document.getElementById("show_quotaPlan" + i).innerHTML = check;
        } //for
    } else {
        $("#saveData").attr("disabled", false);
        for (var i = 1; i <= 6; i++) {

            quota = document.getElementById("quota" + i).innerHTML;
            value_quotaPlan = parseFloat(check) * quota / 100;
            document.getElementById("show_quotaPlan" + i).innerHTML = value_quotaPlan;


        } //for
    }
} //check_quota_plan

function show_quotaplan() {
    //  $("#quotaPlan").attr("disabled", true);

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
    var myChart = new Chart(
        document.getElementById('myChart'),
        config

    ); //new Chart
} //show_quotaplan

function confirm_save() {
    var pos_id = "";
    var qut_id = "";

    pos_id = document.getElementById("position_id").value;
    qut_id = document.getElementById("qut_id").value;
    console.log(pos_id);
    console.log(qut_id);


    var count = 0;
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_id_qut_pos_plan",
        data: {
            "pos_id": pos_id,
            "qut_id": qut_id

        },
        datatype: "JSON",
        success: function(data) {
            data = JSON.parse(data)
            data.forEach((row, index) => {

                if (pos_id == row.qup_Position_ID && qut_id == row.qup_qut_id) {
                    count++;
                    console.log(row.qup_qut_id);
                    console.log(row.qup_Position_ID);

                }
                // if-else

            });
            // forEach
            if (count == 0) {
                insert_quota_plan();
                $('#warning_save').modal('show');
                return true;
            } else {
                $("#warning").modal('show');
                return false;
            }



        }
    });

}

function insert_quota_plan() {
    var check = "";

    var sum_quota_plan = 0;
    var grade = [];
    var qup_gradeS = 0;
    var qup_gradeA = 0;
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
    check = document.getElementById("quotaPlan").value;
    console.log(check);
    console.log(pos_id);
    console.log(qut_id);
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
        for (var i = 1; i <= 6; i++) {
            quota = document.getElementById("quota" + i).innerHTML;
            value_quotaPlan = parseFloat(check) * quota / 100;
            grade[i] = value_quotaPlan;
            sum_quota_plan += grade[i];
        } //for 
        grade.shift();
        console.log(grade);
        console.log(sum_quota_plan);
        qup_gradeS = grade[0];
        qup_gradeA = grade[1];
        qup_gradeB = grade[2];
        qup_gradeB_N = grade[3];
        qup_gradeC = grade[4];
        qup_gradeD = grade[5];

        console.log(qup_gradeS);
        console.log(qup_gradeA);
        console.log(qup_gradeB);
        console.log(qup_gradeB_N);
        console.log(qup_gradeC);
        console.log(qup_gradeD);
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>/ev_quota/Evs_quota/quota_plan_insert",

            data: {

                "qup_gradeS": qup_gradeS,
                "qup_gradeA": qup_gradeA,
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

} //insert_quota

function manage_data(qut_id) {
    console.log(qut_id);
    window.location.href = "<?php echo base_url(); ?>/ev_quota/Evs_quota/manage_quota/" + qut_id;
} //manage_data
</script>
<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="6px">Detail Quota </font>
            </h2>
            <div class="panel-ctrls" data-actions-container="">
            </div>
        </div>
        <div class="panel-body" style="">

            <table style="border:1;">
                <?php foreach($cdp_data as $value){ ?>
                <input type="text" id="position_id" value="<?php echo $value->Position_ID?>" hidden>
                <tr>
                    <td class="qut" width="175">
                        <h4><b>Company </b></h4>
                    </td>
                    <td width="75">
                        <h4><b> : </b></h4>
                    </td>
                    <td class="qut_type font1" width="300"><?php echo $value->Company_name;?></td>
                    <?php } ?>
                </tr>

                <?php foreach($manage_qut_data as $value){ ?>
                <input type="text" id="qut_id" value="<?php echo $value->qut_id?>" hidden>
                <tr>
                    <td class="qut font1" width="175">
                        <h4><b>Quota </b></h4>
                    </td>
                    <td width="75">
                        <h4><b> : </b></h4>
                    </td>
                    <td class="qut_type font1" width="200"><?php echo $value->qut_type;?></td>

                    <td class="qut font1">
                        <h4><b>Position of Quota </b></h4>
                    </td>
                    <td width="75">
                        <h4><b> : </b></h4>
                    </td>
                    <td class="qut_type font1" id="qut_pos"><?php echo $value->qut_pos;?></td>
                </tr>
                <?php } ?>
                <tr>
                    <?php foreach($cdp_data as $value){ ?>
                    <td class="qut font1" width="175">
                        <h4><b>Department </b></h4>
                    </td>
                    <td width="75">
                        <h4><b> : </b></h4>
                    </td>
                    <td class="qut_type font1" width="200"><?php echo $value->Dep_Name;?></td>

                    <td class="qut">
                        <h4><b>position </b></h4>

                    </td>
                    <td width="75">
                        <h4><b> : </b></h4>
                    </td>
                    <td class="qut_type font1" id="qut_pos"><?php echo $value->Position_name;?></td>
                </tr>
                <?php } ?>
            </table>
            <hr>
            <!-- <form onsubmit="required()"> -->
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">

                    <table style="width:100%" class="table table-hover m-n orange">
                        <thead class="font1">
                            <div class="col-md-1">
                                <tr class="orange ">
                                    <th>Grade</th>
                                    <th style="width: 15%;" id="grad1">S</th>
                                    <th style="width: 15%;" id="grad2">A</th>
                                    <th style="width: 15%;" id="grad3">B</th>
                                    <th style="width: 15%;" id="grad4">B-</th>
                                    <th style="width: 15%;" id="grad5">C</th>
                                    <th style="width: 15%;" id="grad6">D</th>
                                    <th style="width:15%;">Total</th>
                                </tr>
                            </div>
                        </thead>
                        <tbody>
                            <div class="col-md-1" id="qut_table">
                                <tr class="orange2">
                                    <td><b>Quota</b></td>
                                    <?php foreach($manage_qut_data as $value){ ?>
                                    <td id="quota1" value="5"><?php echo $value->qut_grad_S;?></td>
                                    <td id="quota2" value="25"><?php echo $value->qut_grad_A;?></td>
                                    <td id="quota3" value="60"><?php echo $value->qut_grad_B;?></td>
                                    <td id="quota4" value="25"><?php echo $value->qut_grad_B_N;?></td>
                                    <td id="quota5" value="25"><?php echo $value->qut_grad_C;?></td>
                                    <td id="quota6" value="5"><?php echo $value->qut_grad_D;?></td>
                                    <td><?php echo $value->qut_total;?></td>
                                    <?php } ?>
                                </tr>
                            </div>
                            <div class="col-md-1">
                                <tr class="orange2">
                                    <td><b>Plan</b></td>
                                    <td id="show_quotaPlan1"></td>
                                    <td id="show_quotaPlan2"></td>
                                    <td id="show_quotaPlan3"></td>
                                    <td id="show_quotaPlan4"></td>
                                    <td id="show_quotaPlan5"></td>
                                    <td id="show_quotaPlan6"> </td>
                                    <td>
                                        <input type="text" class="form-control" id="quotaPlan"
                                            onchange="check_quota_plan()" min="0" max="100" value="">
                                    </td>
                                </tr>
                            </div>
                        </tbody>
                    </table>

                </div>
            </div>
            <br>

            <!-- </form> -->
            <br>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="panel panel-midnightblue" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>
                                <font size="5px">Quota</font>
                            </h2>
                            <div class="panel-ctrls" data-actions-container="">
                            </div>
                        </div>
                        <div class="panel-body">

                            <!-- <canvas id="testCanvas" width="1000" height="450"></canvas> -->

                            <!-- <div class="well well-lg tooltips" data-trigger="hover" data-original-title=".well.well-lg">

                            </div> -->
                            <canvas id="myChart" width="100"></canvas>

                        </div>

                    </div>
                </div>

            </div>
            <?php foreach($manage_qut_data as $value){ ?>
            <a>
                <button type="button" class="btn btn-inverse pull-left" data-dismiss="modal"
                    onclick=" manage_data( <?php echo $value->qut_id;?>)">CANCEL</button>
            </a>
            <?php }?>
            <button type="button" class="btn btn-social pull-right" style="background-color:#0000CD;" id="saveData"
                onclick="confirm_save()">SAVE</button>
        </div>
    </div>

    <!-- Modal Warning -->
    <div class="modal fade" id="warning_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                        <?php foreach($manage_qut_data as $value){ ?>
                        <button type="button" class="btn btn-success" data-dismiss="modal"
                            onclick="manage_data(<?php echo $value->qut_id;?>)">Yes</button>
                        <?php } ?>
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
                                    Already in information!</font>
                            </label>

                        </div>
                    </div>
                </div>
                <!-- form-horizontal -->
            </div>
            <!-- Modal body -->

            <div class="modal-footer">
                <div class="btn-group pull-right">
                    <?php foreach($manage_qut_data as $value){ ?>
                    <button type="button" class="btn btn-success" data-dismiss="modal"
                        onclick="manage_data(<?php echo $value->qut_id;?>)">Yes</button>
                    <?php } ?>

                </div>

            </div>
            <!-- Modal footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Warning -->