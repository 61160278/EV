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


// window.onchange = function() {
    window.onload = function() {
    var arrQuota = [];
    var myCanvas = document.getElementById('testCanvas');
    var context = myCanvas.getContext('2d');
    for (var i = 1; i <= 5; i++) {
        var show_quota = document.getElementById("quota" + i).innerHTML;
        // var arrQuota = [0.4, 2, 3.2, 2, 0.4];
        arrQuota[i] = show_quota;

    } //for
    arrQuota.shift();
    console.log(arrQuota);

    var height_graph = 400;

    var arrlen = arrQuota.length;
    var maxData = 0;
    for (var i = 0; i < arrlen; i++) {
        if (arrQuota[i] > maxData) {
            maxData = arrQuota[i];
        }
    }
    context.clearRect(0, 0, 500, 500);
    // set font for fillText()  
    context.font = "16px Arial";

    // draw X and Y axis  
    context.beginPath();
   
    context.moveTo(25, 25); // context.moveTo(L,B);
    context.lineTo(25, 420);//y context.lineTo(T,B)
    context.lineTo(680, 420);//x  context.lineTo(R,B)

    context.fillText(0, 0, 425);
    context.stroke();

    // draw reference line  แถวมบนสุด เส้นระดับ
    context.beginPath();
    context.strokeStyle = "#BBB";
    context.moveTo(25, 25);
    context.lineTo(680, 25);//context.lineTo(R, T)
    // draw reference value for hours  
    context.fillText(100, 0, 25);
    context.stroke();

    // draw reference line แถวล่างสุด เส้นระดับ
    context.beginPath();
    context.moveTo(25, 336);
    context.lineTo(680, 336);
    // draw reference value for hours  
    context.fillText(20, 0, 336);
    context.stroke();

    // draw reference line  แถวที่ 2 เส้นระดับ
    context.beginPath();
    context.moveTo(25,252);
    context.lineTo(680, 252);
    // draw reference value for hours  
    context.fillText(40, 0, 252);
    context.stroke();


        // draw reference line  แถวที่ 3 เส้นระดับ
        context.beginPath();
        context.moveTo(25, 168);
        context.lineTo(680, 168);
        // draw reference value for hours  
        context.fillText(60, 0,168);
        context.stroke();
      // draw reference line  แถวที่ 4 เส้นระดับ
      context.beginPath();
        context.moveTo(25, 84);
        context.lineTo(680, 84);
        // draw reference value for hours  
        context.fillText(80, 0, 84);
        context.stroke();

    context.beginPath();
    context.lineJoin = "round";
    context.strokeStyle = "red";

    context.moveTo(100, (height_graph - arrQuota[0] / maxData * height_graph) + 25);
    // draw reference value for day of the week  
    var grad = ["S", "A", "B", "C", "D"];
    // context.fillText("S", 15, 400);
    for (var j = 0; j < grad.length; j++) {


        context.lineTo(680 / arrlen * j + 100, (height_graph - arrQuota[j] / maxData * height_graph) + 25);

        // draw reference value for day of the week  
        context.fillText(grad[j], 680 / arrlen * j + 100, 450, 475);
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

                            <canvas id="testCanvas" width="700" height="500"></canvas>

                            <!-- <canvas id="myCanvas" width="400" height="400" ></canvas>  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>