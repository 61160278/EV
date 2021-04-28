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
        } else {
            $("#show_quota").css("color", "#000000");
        }
        document.getElementById("show_quota").innerHTML = value_quota;


        //console.log(value_quota);
    }
    // for i
    //

    showChart();
   // destroy();


}

// function destroy() {

//     var myChart = new Chart(
//         document.getElementById('myChart'), {
//             type: 'line',
//             data: data,
//             options: {
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         }


//     );
    // myChart.destroy();
    // }
    function showChart() {
        var dataQuota = [];
        var arrQuota = [];

        for (var i = 1; i <= 6; i++) {

            arrQuota.push(document.getElementById("quota" + i).value);
            console.log(987654);
            console.log(arrQuota);


        } //for
        // arrQuota.shift();
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
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
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
        if (ctx.myChart) {
           // myChart = null;
           myChart.destroy();
        } else {
            myChart = new Chart(ctx, config);
        }
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
                            <tr class="orange2">
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
    </div>
</div>
</div>