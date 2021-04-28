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
}

table,
th,
td {
    border: 2px solid #ffffff;
    border-collapse: collapse;
    text-align: center;
    color: black;
    font-size: 20px;
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
</style>
<script src="path/to/chartjs/dist/chart.js"></script>
<script>
/*
 * check_quota_plan
 * Display v_detail_quota
 * @input    
 * @output
 * @author   Lapatrada Puttamongkol
 * @Create Date 2564-04-20
 */

function check_quota_plan() {

    var check = "";
    var value_quotaPlan = 0;

    var quota = 0;

    check = document.getElementById("quotaPlan").value;
    for (i = 1; i <= 5; i++) {
        quota = document.getElementById("quota" + i).innerHTML;
        value_quotaPlan = parseInt(check) * quota / 100;


        document.getElementById("show_quotaPlan" + i).innerHTML = value_quotaPlan;
    } //for
}
function barChart(){
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
    label: 'My First Dataset',
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};
// </block:setup>

// <block:config:0>
const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
// </block:config>
 
}
window.onload = function() {
// <block:setup:1>
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
    data: [5, 25, 40, 40, 25, 5],
  }]
};
// </block:setup>

// <block:config:0>
const config = {
  type: 'line',
  data,
  options: {}
};

// </block:config>
barChart();

var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  
}
</script>

<div class="col-md-12">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="5px">Detail Quota </font>
            </h2>
            <div class="panel-ctrls" data-actions-container=""
                data-action-collapse='{"target": ".panel-body, .panel-footer"}'>
            </div>
        </div>
        <div class="panel-body" style="">


            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <h4><b>Company :</b></h4>
                    </div>


                    <div class="col-md-6">
                        <h4><b>Quota :</b></h4>
                    </div>

                    <div class="col-md-6">
                        <h4><b>Position of Quota :</b></h4>
                    </div>

                    <div class="col-md-6">
                        <h4><b>Department :</b></h4>
                    </div>

                    <div class="col-md-6">
                        <h4><b>position :</b></h4>
                    </div>

                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <table style="width:100%" class="table table-hover m-n orange">
                        <thead>
                            <div class="col-md-1">
                                <tr class="orange">
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
                            <div class="col-md-1">
                                <tr class="orange2">
                                    <td><b>Quota</b></td>
                                    <td id="quota1" value="5">5</td>
                                    <td id="quota2" value="25">20</td>
                                    <td id="quota3" value="60">20</td>
                                    <td id="quota4" value="25">20</td>
                                    <td id="quota5" value="25">20</td>
                                    <td id="quota6" value="5">10</td>
                                    <td>100</td>
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
                                            onchange="check_quota_plan()">

                                        <!-- <input class="form-control" id="inp_result1" onchange="functionJS()" type="number" min="0" max="100"> -->
                                    </td>
                                </tr>
                            </div>
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
                                <font size="5px">Quota</font>
                            </h2>
                            <div class="panel-ctrls" data-actions-container=""
                                data-action-collapse='{"target": ".panel-body"}'>
                            </div>
                        </div>
                        <div class="panel-body">

                            <!-- <canvas id="testCanvas" width="1000" height="450"></canvas> -->

                            <!-- <div class="well well-lg tooltips" data-trigger="hover" data-original-title=".well.well-lg">

                            </div> -->
                            <canvas id="myChart" width="100" height="100" ></canvas> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>