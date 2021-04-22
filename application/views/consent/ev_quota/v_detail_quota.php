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
</style>

<script>
//$(document).ready(function() {
	
  //  check_quota_plan();
	//$)("#testCanvas").ready(function(){
  //   var testValues = [0.4, 2, 3.2, 2, 0.4];
  //  drawGraph(testValues);
//});
//});

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


window.onchange = function() {
            var arrQuotaPlan = [];
            var myCanvas = document.getElementById('testCanvas');
            var context = myCanvas.getContext('2d');
            for (var i = 1; i <= 5; i++) {
                var mean_quotaPlan = document.getElementById("show_quotaPlan" + i).innerHTML;
                // var arrQuotaPlan = [0.4, 2, 3.2, 2, 0.4];
                arrQuotaPlan[i] = mean_quotaPlan;

            } //for
            arrQuotaPlan.shift();
            console.log(arrQuotaPlan);

            var height_graph = 400;

            var arrlen = arrQuotaPlan.length;
            var maxData = 0;
            for (var i = 0; i < arrlen; i++) {
                if (arrQuotaPlan[i] > maxData) {
                    maxData = arrQuotaPlan[i];
                }
            }
            context.clearRect(0, 0, 500, 500);
            // set font for fillText()  
            context.font = "16px Arial";

            // draw X and Y axis  
            context.beginPath();
            context.moveTo(25,25);
            context.lineTo(25, 400);
            context.lineTo(600, 400);
           
            context.fillText((maxData / maxData) - 1, 0, height_graph + 25);
            context.stroke();

           // draw reference line  แถวมบนสุด เส้นระดับ
            context.beginPath();
            context.strokeStyle = "#BBB";
            context.moveTo(25, 25);
            context.lineTo(600, 25);
            // draw reference value for hours  
            context.fillText(maxData, 0, 25);
            context.stroke();

            // draw reference line แถวล่างสุด เส้นระดับ
            context.beginPath();
            context.moveTo(25, (height_graph) / 4 * 3 + 25);
            context.lineTo(600, (height_graph) / 4 * 3 + 25);
            // draw reference value for hours  
            context.fillText(maxData / 4, 0, (height_graph) / 4 * 3 + 25);
            context.stroke();

            // draw reference line  แถวที่ 2 เส้นระดับ
            context.beginPath();
            context.moveTo(25, (height_graph) / 2 + 25);
            context.lineTo(600, (height_graph) / 2 + 25);
            // draw reference value for hours  
            context.fillText(maxData / 2, 0, (height_graph) / 2 + 25);
            context.stroke();

            // draw reference line  แถวที่ 3 เส้นระดับ
            context.beginPath();
            context.moveTo(25, (height_graph) / 4 + 25);
            context.lineTo(600, (height_graph) / 4 + 25);
            // draw reference value for hours  
            var granY = (maxData / 2) + 0.8;
            context.fillText(granY.toFixed(1), 0, (height_graph) / 4 + 25);
            context.stroke();
            context.beginPath();
            context.lineJoin = "round";
            context.strokeStyle = "black";
 
            context.moveTo(100, (height_graph - arrQuotaPlan[0] / maxData * height_graph) + 25);
            // draw reference value for day of the week  
            var grad = ["S", "A", "B", "C", "D"];
           // context.fillText("S", 15, 400);
            for (var j = 0; j < grad.length; j++) {
               
                
                context.lineTo(600 / arrlen * j + 100, (height_graph - arrQuotaPlan[j] / maxData * height_graph) + 25);

                // draw reference value for day of the week  
                context.fillText(grad[j], 600 / arrlen * j+100,450, 475);
                context.stroke();
            }

        }
<<<<<<< HEAD

=======
    }
    context.clearRect(0, 0, 200, 400);
    // set font for fillText()  
    context.font = "16px Arial";

    // draw X and Y axis  
    context.beginPath();
    ctx.moveTo(75, 75);
    ctx.lineTo(75, 425);
    ctx.lineTo(425, 425);
    context.fillText((largest / largest) - 1, 0, height_graph + 25);
    context.stroke();

    // draw reference line  แถวมบนสุด เส้นระดับ
    // context.beginPath();
    // context.strokeStyle = "#BBB";
    // context.moveTo(25, 25);
    // context.lineTo(475, 25);
    // // draw reference value for hours  
    // context.fillText(largest, 0, 25);
    // context.stroke();

    // // draw reference line แถวล่างสุด เส้นระดับ
    // context.beginPath();
    // context.moveTo(25, (height_graph) / 4 * 3 + 25);
    // context.lineTo(475, (height_graph) / 4 * 3 + 25);
    // // draw reference value for hours  
    // context.fillText(largest / 4, 0, (height_graph) / 4 * 3 + 25);
    // context.stroke();

    // // draw reference line  แถวที่ 2 เส้นระดับ
    // context.beginPath();
    // context.moveTo(25, (height_graph) / 2 + 25);
    // context.lineTo(475, (height_graph) / 2 + 25);
    // // draw reference value for hours  
    // context.fillText(largest / 2, 0, (height_graph) / 2 + 25);
    // context.stroke();

    // // draw reference line  แถวที่ 3 เส้นระดับ
    // context.beginPath();
    // context.moveTo(25, (height_graph) / 4 + 25);
    // context.lineTo(475, (height_graph) / 4 + 25);
    // // draw reference value for hours  
    // var granY = (largest / 2) + 0.8;
    // context.fillText(granY.toFixed(1), 0, (height_graph) / 4 + 25);
    // context.stroke();
    // context.beginPath();
    // context.lineJoin = "round";
    // context.strokeStyle = "black";

    context.moveTo(50, (height_graph - dataArr[0] / largest * height_graph) + 25);
    // draw reference value for day of the week  
    var grad = ["S", "A", "B", "C", "D"];
    // context.fillText("S", 15, 400);
    for (var j = 0; j < grad.length; j++) {
        context.lineTo(475 / arrayLen * j + 50, (height_graph - dataArr[j] / largest * height_graph) + 25);
        // draw reference value for day of the week  
        context.fillText(grad[j], 475 / arrayLen * j, 400, 425);
        context.stroke();
    }
}
>>>>>>> 3901b704eeb6691e90cc1f480391975d70ee8a25
</script>

<div class="col-md-12">
    <div class="panel panel-midnightblue" data-widget='{"draggable": "false"}'>
        <div class="panel-heading">
            <h2>
                <font size="5px">Detail Quota </font>
            </h2>
            <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'>
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
                                    <th style="width: 20%;" id="grad1">S</th>
                                    <th style="width: 20%;" id="grad2">A</th>
                                    <th style="width: 20%;" id="grad3">B</th>
                                    <th style="width: 20%;" id="grad4">C</th>
                                    <th style="width: 20%;" id="grad5">D</th>
                                    <th style="width:20%;">Total</th>
                                </tr>
                            </div>
                        </thead>
                        <tbody>
                            <div class="col-md-1">
                                <tr class="orange2">
                                    <td><b>Quota</b></td>
                                    <td id="quota1" value="5">5</td>
                                    <td id="quota2" value="25">25</td>
                                    <td id="quota3" value="40">40</td>
                                    <td id="quota4" value="25">25</td>
                                    <td id="quota5" value="5">5</td>
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
                                    <td id="show_quotaPlan5"> </td>
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
 
                           <canvas id="testCanvas" width="600" height="500" ></canvas> 

                            <!-- <canvas id="myCanvas" width="400" height="400" ></canvas>  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>