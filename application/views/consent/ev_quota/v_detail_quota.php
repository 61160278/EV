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
    var canvas = document.getElementById("testCanvas");
    var context = canvas.getContext("2d");
	var dataArr =[];
	 var mean_quotaPlan;
	for (i = 1; i <= 5; i++) {
       
		mean_quotaPlan = document.getElementById("show_quotaPlan" + i).innerHTML;
		 
	   dataArr[i] = mean_quotaPlan;
	   
    } //for
	dataArr.shift();
	console.log(dataArr);
    var height_graph = 350;

    var arrayLen = dataArr.length;
    var largest = 0;
    for (var i = 0; i < arrayLen; i++) {
        if (dataArr[i] > largest) {
            largest = dataArr[i];
        }

    }
	
    //context.clearRect(50,25, 200, 400);
    // set font for fillText()  
    context.font = "16px Arial";

    // draw X and Y axis  
    context.beginPath();
    context.moveTo(475, 375);
    context.lineTo(40, 375);
    context.lineTo(40, 25);
    context.stroke();

    // draw reference line  แถวมบนสุด เส้นระดับ
    context.beginPath();
    context.strokeStyle = "#BBB";
    context.moveTo(25, 25);
    context.lineTo(475, 25);
    // draw reference value for hours  
    context.fillText(largest, 0, 25);
    context.stroke();

    // draw reference line แถวล่างสุด เส้นระดับ
    context.beginPath();
    context.moveTo(25, (height_graph) / 4 * 3 + 25);
    context.lineTo(475, (height_graph) / 4 * 3 + 25);
    // draw reference value for hours  
    context.fillText(largest / 4, 0, (height_graph) / 4 * 3 + 25);
    context.stroke();

    // draw reference line  แถวที่ 2 เส้นระดับ
    context.beginPath();
    context.moveTo(25, (height_graph) / 2 + 25);
    context.lineTo(475, (height_graph) / 2 + 25);
    // draw reference value for hours  
    context.fillText(largest / 2, 0, (height_graph) / 2 + 25);
    context.stroke();

    // draw reference line  แถวที่ 3 เส้นระดับ
    context.beginPath();
    context.moveTo(25, (height_graph) / 4 + 25);
    context.lineTo(475, (height_graph) / 4 + 25);
    // draw reference value for hours  
    var granY = (largest / 2) + 0.8;
    context.fillText(granY.toFixed(1), 0, (height_graph) / 4 + 25);
    context.stroke();

    context.beginPath();
    context.lineJoin = "round";
    context.strokeStyle = "black";

    context.moveTo(50, (height_graph - dataArr[0] / largest * height_graph) + 25);
    // draw reference value for day of the week  
    var grad = ["S", "A", "B", "C", "D"];
    //context.fillText("S", 50,400, 400);
	
    for (var j = 0 ; j <= grad.length; j++) {
        context.lineTo(475 / arrayLen * j + 50, (height_graph - dataArr[j] / largest * height_graph) + 25 );
        // draw reference value for day of the week  
        context.fillText(grad[j],475 / arrayLen * j + 50,400, 400);
        context.stroke();
    }

}

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
 
                           <canvas id="testCanvas"  width="500" height="400" ></canvas> 

                            <!-- <canvas id="myCanvas" width="400" height="400" ></canvas>  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>