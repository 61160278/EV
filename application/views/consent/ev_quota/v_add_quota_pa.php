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
function check_quota() {

    var check = "";
    var value_quota = 0;

    for (i = 1; i <= 6; i++) {
        check = document.getElementById("quota" + i).value;

        if (check != "") {
            value_quota += parseInt(check);

        }
        // if 
        if (value_quota > 100) {
            $("#show_quota").css("color", "red");

            add_alert();
            $("#submit").attr("disabled", true);
        } else if(value_quota == 100){
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
                    beginAtZero: true
                }
            }
        }
    };

    // </block:config>
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, config);
    $('#reset').on('click', function() {
        myChart.destroy();

    });

    $(document).ready(function() {
        $("#reset").click(function() {
            for (var i = 1; i <= 6; i++) {
                $("#quota" + i).attr("disabled", false);
            }

        });
    });

} //showChart
</script>
<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="6px"><b>Add Quota</b></font>
            </h2>
            <div class="panel-ctrls" data-actions-container=""
                data-action-collapse='{"target": ".panel-body, .panel-footer"}'>
            </div>
        </div>
        <div class="panel-body" style="">

            <div class="row">
                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control text" id="">
                            <option value="yearEndBonus">Quota</option>
                            <option value="yearEndBonus">Year End Bonus</option>
                            <option value="salaryIncrement">Salary Increment</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control text" id="">
                            <option value="yearEndBonus">Position Of Quota</option>
                            <option value="yearEndBonus">Team Associate above</option>
                            <option value="salaryIncrement">Operational Associate</option>
                        </select>
                    </div>

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
                            <tr class="orange2" id="input">
                                <td>Quota</td>
                                <td>
                                    <input type="text" class="form-control" id="quota1" onchange="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota2" onchange="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota3" onchange="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota4" onchange="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota5" onchange="check_quota()">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="quota6" onchange="check_quota()">
                                </td>
                                <td id="show_quota"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>


            </div>
            <br>

            <div class="row">
                <div class="col-md-offset-9">

                    <buuton class="btn btn-success" type="submit" id="submit" onclick="show_qouta()">Submit</buuton>
                    <button class="btn btn-warning" type="reset" id="reset">edit</button>
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
                            <div class="panel-ctrls" data-actions-container=""
                                data-action-collapse='{"target": ".panel-body"}'>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="myChart" width="1000" height="450" style="position: relative;"></canvas>

                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-inverse pull-left" data-dismiss="modal">CANCEL</button>
            <button type="button" class="btn btn-social pull-right" style="background-color:#0000CD;">SAVE</button>
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
                                    <label for="focusedinput" class="control-label" style="font-family:'Courier New'"
                                        align="center">
                                        <font size="3px">
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
</div>
<script>

</script>