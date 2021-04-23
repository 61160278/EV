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
        // var arrQuota = [5, 25, 40, 25, 5];
        arrQuota[i] = show_quota;

    } //for
    arrQuota.shift();
    console.log(arrQuota);
    var arrQuota = [ 5,25,40,25,5];  
    var canvas = document.getElementById( "testCanvas" );  
    var context = canvas.getContext( "2d" );  
    var GRAPH_TOP = 25;  
    var GRAPH_BOTTOM = 375;  
    var GRAPH_LEFT = 125;  
    var GRAPH_RIGHT = 790;  
  
    var GRAPH_HEIGHT = 350;  
    var GRAPH_WIDTH = 1000;  
  
    var arrayLen = arrQuota.length;  
  
    var largest = 0;  
    for( var i = 0; i < arrayLen; i++ ){  
        if( arrQuota[ i ] > largest ){  
            largest = arrQuota[ i ];  
        }  
    }  
  
    context.clearRect( 0, 0, 500, 400 );  
    // set font for fillText()  
    context.font = "16px Arial";  
       
    // draw X and Y axis  
    context.beginPath();  
    context.moveTo( GRAPH_RIGHT, GRAPH_BOTTOM );  
    context.lineTo( GRAPH_LEFT, GRAPH_BOTTOM );  //x
    context.lineTo( GRAPH_LEFT, GRAPH_TOP );//y  
    context.stroke();  
       
    // draw reference line  
    context.beginPath();  
    context.strokeStyle = "#BBB";  
    context.moveTo( GRAPH_RIGHT, GRAPH_TOP );  
    context.lineTo( GRAPH_LEFT, GRAPH_TOP );  
    // draw reference value for hours  
    context.fillText( largest, GRAPH_LEFT-25 , GRAPH_TOP);  
    context.stroke();  
   
    // draw reference line  
    context.beginPath();  
    context.moveTo( GRAPH_RIGHT, ( GRAPH_HEIGHT ) / 4 * 3 + GRAPH_TOP );  
    context.lineTo( GRAPH_LEFT, ( GRAPH_HEIGHT ) / 4 * 3 + GRAPH_TOP );  
    // draw reference value for hours  
    context.fillText( largest / 4, GRAPH_LEFT -25, ( GRAPH_HEIGHT ) / 4 * 3 + GRAPH_TOP );  
    context.stroke();  
   
    // draw reference line  
    context.beginPath();  
    context.moveTo( GRAPH_RIGHT, ( GRAPH_HEIGHT ) / 2 + GRAPH_TOP );  
    context.lineTo( GRAPH_LEFT , ( GRAPH_HEIGHT ) / 2 + GRAPH_TOP );  
    // draw reference value for hours  
    context.fillText( largest / 2, GRAPH_LEFT -25, ( GRAPH_HEIGHT ) / 2 + GRAPH_TOP);  
    context.stroke();  
   
    // draw reference line  
    context.beginPath();  
    context.moveTo( GRAPH_RIGHT, ( GRAPH_HEIGHT ) / 4 + GRAPH_TOP );  
    context.lineTo( GRAPH_LEFT, ( GRAPH_HEIGHT ) / 4 + GRAPH_TOP );  
    // draw reference value for hours  
    context.fillText( largest / 4 * 3,GRAPH_LEFT -25, ( GRAPH_HEIGHT ) / 4 + GRAPH_TOP);  
    context.stroke();  
  
    // draw titles  
    context.fillText( "Quota", (790/2)+55 , GRAPH_BOTTOM + 50);  
    context.fillText( "Percent", GRAPH_LEFT -115, GRAPH_HEIGHT / 2);  
  
    context.beginPath();  
    context.lineJoin = "round";  
    context.strokeStyle = "black";  
  var grad = ["S", "A", "B", "C", "D"];
    context.moveTo( GRAPH_LEFT +25, ( GRAPH_HEIGHT - arrQuota[ 0 ] / largest * GRAPH_HEIGHT ) + GRAPH_TOP );  
    // draw reference value for day of the week  
    context.fillText( "S", 150, GRAPH_BOTTOM + 25);  
    for( var i = 1; i < arrayLen; i++ ){  
        context.lineTo( GRAPH_RIGHT / arrayLen * i + GRAPH_LEFT + 10, ( GRAPH_HEIGHT - arrQuota[ i ] / largest * GRAPH_HEIGHT ) + GRAPH_TOP );  
        // draw reference value for day of the week  
        context.fillText( grad[i], GRAPH_RIGHT / arrayLen * i+150 , GRAPH_BOTTOM + 25); 
        
    }  
    
    context.stroke();  
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

                            <canvas id="testCanvas" width="1000" height="450"></canvas>

                            <!-- <canvas id="myCanvas" width="400" height="400" ></canvas>  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>