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
    var actual = 0;

    for (var i = 1; i <= 6; i++) {
        check = document.getElementById("quotaActual" + i).value;
        if (check != "") {
            actual += parseInt(check);
        }
        // if 
        document.getElementById("show_Actual").innerHTML = actual;
    }
    // for i
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
// function barchrat(){
//     var myCanvas = document.getElementById('testCanvas');
//     var context = myCanvas.getContext('2d');
//     var width = 40; //bar chart
//     var x = 125;
//     var arrayLen = arr.length;
//     context.fillStyle = '#000000';
// var arr = [5,25,40,40,25,5];
//      for(var b = 0;b < arrayLen;b++){

//     // var h = data[b];    
//         context.fillRect(x,(myCanvas.height-75) + arr[b],width,arr[b]);
//         x += width + 89;
       
//      }
// }
window.onload = function() {
   
    var data = [];
    var arrQuota = [];
    var myCanvas = document.getElementById('testCanvas');
    var context = myCanvas.getContext('2d');
    for (var i = 1; i <= 6; i++) {
        //  var show_quota = document.getElementById("quota" + i).innerHTML;
        var show_quota = document.getElementById("quota" + i).innerHTML;
        //  var arrQuota = [5, 25, 40, 25, 5];
        arrQuota[i] = show_quota;
    } //for
    arrQuota.shift();
    console.log(arrQuota); //ส่วนนี้เป็นส่วนที่ดึงมา
    for (var a = 0; a < arrQuota.length; a++) {
        data[a] = arrQuota[a] * 1;

    } //ค่าที่รับจากตารางที่เปลี่ยนจากstring เป็น int
    console.log(data);
    //var arrQuota = [5, 25, 60, 25, 5];
    // var canvas = document.getElementById("testCanvas");
    // var context = canvas.getContext("2d");
    var width = 40; //bar chart
    var x = 125;
    var GRAPH_TOP = 25;
    var GRAPH_BOTTOM = 375;
    var GRAPH_LEFT = 125;
    var GRAPH_RIGHT = 800;

    var GRAPH_HEIGHT = 350;
    // var GRAPH_WIDTH = 900;

    var arrayLen = data.length;
    console.log(arrayLen);
    var largest = 0;
    for (var i = 0; i < arrayLen; i++) {
        if (data[i] > largest) {
            largest = data[i];
        }
    }
    console.log(largest);

    context.clearRect(0, 0, 1000, 450);
    //context.save();
    // set font for fillText()  
    context.font = "16px Arial";
//context.rotate(Math.PI / 2);
    // draw X and Y axis  
    context.beginPath();
    context.moveTo(GRAPH_RIGHT, GRAPH_BOTTOM);
    context.lineTo(GRAPH_LEFT, GRAPH_BOTTOM); //x
    context.lineTo(GRAPH_LEFT, GRAPH_TOP); //y  
    //context.lineTo(GRAPH_LEFT+GRAPH_RIGHT, GRAPH_TOP);
    context.stroke();

   
    context.fillStyle = '#000000';
var arr = [5,25,40,40,25,5];
     for(var b = 0;b < arr.length;b++){
    // var h = data[b];    
        context.fillRect(x,myCanvas.height + arr[b],width,arr[b]);
        x += width + 15;
       
     }

    // draw reference line  เส้นที่ 5
    context.beginPath();
    context.strokeStyle = "#BBB";
    context.moveTo(GRAPH_RIGHT, GRAPH_TOP);
    context.lineTo(GRAPH_LEFT, GRAPH_TOP);
    // draw reference value for hours  
    context.fillText(100, GRAPH_LEFT - 25, GRAPH_TOP);
    context.stroke();
    // draw reference line  เส้นที่ 4
    context.beginPath();
    context.strokeStyle = "#BBB";
    context.moveTo(GRAPH_RIGHT, (GRAPH_HEIGHT) / 5 + GRAPH_TOP);
    context.lineTo(GRAPH_LEFT, (GRAPH_HEIGHT) / 5 + GRAPH_TOP);
    // draw reference value for hours  
    context.fillText(80, GRAPH_LEFT - 25, (GRAPH_HEIGHT) / 5 + GRAPH_TOP);
    context.stroke();

    // draw reference line  เส้นที่ 1
    context.beginPath();
    context.moveTo(GRAPH_RIGHT, ((GRAPH_HEIGHT) / 5) * 4 + GRAPH_TOP);
    context.lineTo(GRAPH_LEFT, ((GRAPH_HEIGHT) / 5) * 4 + GRAPH_TOP);
    // draw reference value for hours  
    context.fillText(20, GRAPH_LEFT - 25, ((GRAPH_HEIGHT) / 5) * 4 + GRAPH_TOP);
    context.stroke();

    // draw reference line เส้นที่ 2 
    context.beginPath();
    context.moveTo(GRAPH_RIGHT, ((GRAPH_HEIGHT) / 5) * 3 + GRAPH_TOP);
    context.lineTo(GRAPH_LEFT, ((GRAPH_HEIGHT) / 5) * 3 + GRAPH_TOP);
    // draw reference value for hours  
    context.fillText(40, GRAPH_LEFT - 25, ((GRAPH_HEIGHT) / 5) * 3 + GRAPH_TOP);
    context.stroke();

    // draw reference line //เส้นที่ 3
    context.beginPath();
    context.moveTo(GRAPH_RIGHT, ((GRAPH_HEIGHT) / 5) * 2 + GRAPH_TOP);
    context.lineTo(GRAPH_LEFT, ((GRAPH_HEIGHT) / 5) * 2 + GRAPH_TOP);
    // draw reference value for hours  
    context.fillText(60, GRAPH_LEFT - 25, ((GRAPH_HEIGHT) / 5) * 2 + GRAPH_TOP);
    context.stroke();

    // draw titles (คำบรรยายเส้นกราฟ)
    context.fillText("Grad", (790 / 2) + 55, GRAPH_BOTTOM + 50);
    context.fillText("Quota", GRAPH_LEFT - 115, GRAPH_HEIGHT / 2);
    context.beginPath();
    context.lineJoin = "round";
    context.strokeStyle = "black";
    var grad = ["S", "A", "B", "B-", "C", "D"];
    console.log(data[0]);

    for (var i = 0; i < arrayLen; i++) {

        if (largest == 20) {

            context.lineTo((GRAPH_RIGHT - 25) / arrayLen * i + GRAPH_LEFT + 10, (GRAPH_HEIGHT - data[i] /
                largest *
                (GRAPH_HEIGHT / 5)) + GRAPH_TOP);
            
        } else if (largest == 40) {
            context.lineTo((GRAPH_RIGHT) / arrayLen * i + (GRAPH_LEFT + 10), (GRAPH_HEIGHT - data[i] / largest *(GRAPH_HEIGHT / 5) * 2) + GRAPH_TOP);
           
        } else if (largest == 60) {
            context.lineTo(GRAPH_RIGHT / arrayLen * i + GRAPH_LEFT + 10, (GRAPH_HEIGHT - data[i] / largest *
                (GRAPH_HEIGHT / 5) * 3) + GRAPH_TOP);

        } else if (largest == 80) {
            context.lineTo(GRAPH_RIGHT / arrayLen * i + GRAPH_LEFT + 10, (GRAPH_HEIGHT - data[i] / largest *(GRAPH_HEIGHT / 5) * 4) + GRAPH_TOP);
         
        } else {
            context.lineTo(GRAPH_RIGHT / arrayLen * i + GRAPH_LEFT + 10, (GRAPH_HEIGHT - data[i] / largest *
                GRAPH_HEIGHT) + GRAPH_TOP);
         
        }
        // draw reference value for day of the week  
        context.fillText(grad[i], (GRAPH_RIGHT) / arrayLen * i + 130, GRAPH_BOTTOM + 25);

    }

    context.stroke();
   // barchrat();
   // context.rotate(Math.PI / 180);
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
                        <button class="btn-success btn">SUBMIT</button>
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
                                            <td id="quota3" value="40">40</td>
                                            <td id="quota4" value="40">40</td>
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
                                                <td></td>
                                            </tr>
                                        </div>
                                        <tr class="orange2">
                                            <div class="col-md-1">
                                                <td><b>Total in level</b></td>
                                                <td colspan="6"></td>
                                        </tr>
                                    </div>
                                </tbody>
                            </table>
                            <br>
                            <br>

                            <canvas id="testCanvas" width="1000" height="450"></canvas>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>