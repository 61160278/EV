<?php
/*
* v_add_quota.php
* Display v_add_quota
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-5
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

    for (i = 1; i <= 5; i++) {
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

}
window.onchange = function() {
    
    var arrQuota = [];
    var myCanvas = document.getElementById('testCanvas');
    var context = myCanvas.getContext('2d');
    for (var i = 1; i <= 5; i++) {
        var show_quota = document.getElementById("quota" + i).value;
        // var arrQuota = [5, 25, 40, 25, 5];
        arrQuota[i] = show_quota;

    } //for
    arrQuota.shift();
    console.log(arrQuota);
    
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
  
    context.clearRect( 0, 0, 500, 400);  
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
                            <canvas id="testCanvas" width="1000" height="600"></canvas>
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