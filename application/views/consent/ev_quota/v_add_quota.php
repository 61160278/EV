<?php
/*
* v_add_quota.php
* Display v_add_quota
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-5
*/
/*
* v_add_quota.php
* Display v_add_quota
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
    font-size: 15px;
}
</style>
<script>
$(document).ready(function() {
    $("#saveData").attr("disabled", true);
    $("#reset").attr("disabled", true);
});
// document ready

function insert_quota() {
    var check = "";
    // var year_id =[];
    var sum_quota = 0;
    var grade = [];
    var gradeS = 0;
    var gradeA = 0;
    var gradeB = 0;
    var gradeB_N = 0;
    var gradeC = 0;
    var gradeD = 0;
    var gradeTOT = 0;
    var quotaType = document.getElementById("quotaType").value; // value of year id
    var groupPosition = document.getElementById("groupPosition").value;
    if (groupPosition == 0) {

    }
    // if 
    else {

        if (quotaType == 1) {

            quotaType = document.getElementById("quotaType").options[0].text;
            // groupPosition = document.getElementById("groupPosition").options[1].text;

        }
        // if
        else {
            quotaType = document.getElementById("quotaType").options[1].text;
        }
        // else 
        if (groupPosition == 1) {

            groupPosition = document.getElementById("groupPosition").options[0].text;

        }
        // if
        else if (groupPosition == 2) {

            groupPosition = document.getElementById("groupPosition").options[1].text;

        }
        // else if
        else if (groupPosition == 3) {

            groupPosition = document.getElementById("groupPosition").options[2].text;
        }
        // else if

        //end if-else groupPosition
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
        // document.getElementById("submit").disabled = false;
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
        console.log(gradeS);
        console.log(gradeA);
        console.log(gradeB);
        console.log(gradeB_N);
        console.log(gradeC);
        console.log(gradeD);
        console.log(savedate);
        console.log(sum_quota);
        console.log(year_id);

        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>ev_quota/Evs_quota/quota_insert",
            data: {

                "quotaType": quotaType,
                "groupPosition": groupPosition,
                "savedate": savedate,
                "gradeS": gradeS,
                "gradeA": gradeA,
                "gradeB": gradeB,
                "gradeB_N": gradeB_N,
                "gradeC": gradeC,
                "gradeD": gradeD,
                "sum_quota": sum_quota,
                "year_id": year_id
            },
            dataType: "JSON",

            success: function(status) {
                console.log(status);

            }

        }); //ajax
    } //end else
    main_quota();

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
            $("#saveData").attr("disabled", true);
            $("#show_quota").css("color", "red");
            add_alert();
            $("#submit").attr("disabled", true);

        } else if (value_quota == 100) {
            $("#submit").attr("disabled", false);
            $("#show_quota").css("color", "#000000");
            $("#saveData").attr("disabled", false);
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

    var quotaType = document.getElementById("quotaType").value; // value of year id
    var groupPosition = document.getElementById("groupPosition").value;
    if (groupPosition == 0) {

    } else {

        if (quotaType == 1) {

            quotaType = document.getElementById("quotaType").options[0].text;
            // groupPosition = document.getElementById("groupPosition").options[1].text;

        } else {
            quotaType = document.getElementById("quotaType").options[1].text;
        }
        if (groupPosition == 1) {

            groupPosition = document.getElementById("groupPosition").options[0].text;

        } else if (groupPosition == 2) {

            groupPosition = document.getElementById("groupPosition").options[1].text;

        } else if (groupPosition == 3) {

            groupPosition = document.getElementById("groupPosition").options[2].text;
        }
    }
    console.log(groupPosition);
    console.log(quotaType);
    var count = 0;
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_id_qut_pos",
        data: {
            "quotaType": quotaType,
            "groupPosition": groupPosition

        },
        datatype: "JSON",
        success: function(data) {
            data = JSON.parse(data)
            data.forEach((row, index) => {

                if (groupPosition == row.qut_pos && quotaType == row.qut_type) {
                    count++;
                    console.log(row.qut_pos);
                    console.log(row.qut_type);

                }
                // if-else

            });
            // forEach
            if (count == 0) {
                $('#warning_save').modal('show');
                return true;
            } else {
                $("#warning_data").modal('show');
                return false;
            }

        }


    });

}

function main_quota() {

    window.location.href = "<?php echo base_url();?>ev_quota/Evs_quota/index";
}

function show_qouta() {

    $("#reset").attr("disabled", false);

    for (var i = 1; i <= 6; i++) {
        $("#quota" + i).attr("disabled", true);
    }
    // for i

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
</script>



<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="6px"><b>MANAGE Quota</b></font>
            </h2>
        </div>
        <div class="panel-body" style="">
            <div class="row">
                <div class="col-md-12">
                    <label class="control-label">
                        <strong>
                            <font size="5px">Add quota : Please complete the information.</font>
                        </strong>
                    </label>
                </div>
                <!-- col-12  -->
            </div>
            <!-- row  -->
            <br>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2" align="right">
                        <label for="quotaType">Type of quota</label>
                    </div>
                    <!-- col - 2 -->

                    <div class="col-md-3">
                        <select class="form-control text" id="quotaType">
                            <option value="1">Salary Increment</option>
                            <option value="2">Year End Bonus</option>
                        </select>
                    </div>
                    <!-- col-3  -->

                    <div class="col-md-1" align="right">
                        <label for="groupPosition">Position : </label>
                    </div>
                    <!-- col - 2 -->

                    <div class="col-md-3">
                        <select class="form-control text" id="groupPosition">

                            <option value="1">All Position</option>
                            <option value="2">Operational Associate above</option>
                            <option value="3">Staff above</option>
                        </select>
                    </div>
                    <!-- col-3  -->
                </div>
                <!-- row  -->
            </div>
            <!-- form-group -->
            <br>

            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-9">
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
                            <tr class="orange2" id="input">
                                <td>Quota</td>
                                <td>
                                    <input type="text" class="form-control" id="quota1" oninput="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota2" oninput="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota3" oninput="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota4" oninput="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota5" oninput="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota6" oninput="check_quota()">
                                </td>
                                <td id="show_quota"></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- table  -->
                </div>
                <!-- col-8  -->
                <div class="col-md-1">
                    <div class="row">
                        <buuton class="btn btn-success" type="submit" id="submit" onclick="show_qouta()" disabled>SUBMIT
                        </buuton>
                    </div>
                    <!-- row  -->
                    <br>
                    <div class="row">
                        <button class="btn btn-warning" type="reset"
                            id="reset">&nbsp;&nbsp;&nbsp;&nbsp;EDIT&nbsp;&nbsp;&nbsp;</button>
                    </div>
                    <!-- row  -->
                </div>
            </div>
            <!-- row -->
            <hr>
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="panel panel-midnightblue" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>
                                <font size="5px"><b>Quota</b></font>
                            </h2>
                            <div class="panel-ctrls" data-actions-container="">
                            </div>
                        </div>
                        <!-- panel-heading -->
                        <div class="panel-body">
                            <canvas id="myChart" width="1000" height="450" style="position: relative;"></canvas>

                        </div>
                        <!-- panel-body -->
                    </div>
                    <!-- panel-midnightblue -->
                </div>
                <!-- col-md-10 -->
            </div>
            <!-- row  -->
            <a href="<?php echo base_url();?>/ev_quota/Evs_quota/index">
                <button type="button" class="btn btn-inverse pull-left" data-dismiss="modal">CANCEL</button>
            </a>

            <button type="button" class="btn btn-success pull-right" style="background-color:#0000CD;" id="saveData"
                onclick="confirm_save()">SAVE</button>
        </div>
        <!-- panel-body -->
    </div>
    <!-- panel-indigo -->
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
                            <label for="focusedinput" class="control-label" align="center">
                                <font size="5px">
                                    Total quota is more than 100</font>
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
                            onclick="insert_quota()">Confirm</button>

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

<!-- Modal Warning -->
<div class="modal fade" id="warning_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                align="center">
                                <font size="3px">
                                    Already in quota information. </font>
                            </label>
                            <br>
                            <label for="focusedinput" class="control-label"
                                align="center">
                                <font size="3px">
                                    Please select new type or select new position. </font>
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