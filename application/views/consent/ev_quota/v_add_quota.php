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
		color : black;
	}
	.orange {
		background-color : orange;
		color : black;
		text-align : center;
	}
	.orange2 {
		background-color : #ffe4b3;
	}
	th {
		color:black;
		text-align: center;
		font-size: 20px;
	}
	td{
		text-align: center;
		font-size: 15px;
	}

</style>
<script>
function check_quota(){
	
	var check = "";
	var value_quota = 0;
	
	for(i=1; i<=5; i++){
		check = document.getElementById("quota"+i).value;
		
		if(check != "" ){
			value_quota += parseInt(check);
		}
		// if 
		if(value_quota > 100){ 
		$("#show_quota").css("color" ,"red");
		}else{
			$("#show_quota").css("color" ,"#000000");
		}
		document.getElementById("show_quota").innerHTML = value_quota;
		
		//console.log(value_quota);
	}
	// for i
	
}
window.onchange = function() {
    var dataArr = [];
    var myCanvas = document.getElementById('testCanvas');
    var context = myCanvas.getContext('2d');
    for (var i = 1; i <= 5; i++) {
        var mean_quotaPlan = document.getElementById("show_quota" + i).innerHTML;
        // var dataArr = [0.4, 2, 3.2, 2, 0.4];
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
</script>
<div class="col-md-12">
	<div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2><font size = "6px"><b>Add Quota</b></font></h2>
			<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'>
			</div>
		</div>
		<div class="panel-body" style="">
			<div class = "row">
				<div class="form-group">
					<div class="col-md-3">
					</div>
					<div class="col-md-3">
						<select class="form-control text" id="" >
							<option value="yearEndBonus">Quota</option>
							<option value="yearEndBonus">Year End Bonus</option>
							<option value="salaryIncrement">Salary Increment</option>
						</select>
					</div>
					<div class="col-md-3">
						<select class="form-control text" id="" >
							<option value="yearEndBonus">Position Of Quota</option>
							<option value="yearEndBonus">Team Associate above</option>
							<option value="salaryIncrement">Operational Associate</option>
						</select>
					</div>
				</div>
			</div>
			<br>
			<div class = "row">
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
									<input type="text" class="form-control" id = "quota1" onchange="check_quota()">
								</td>
								<td>
									<input type="text" class="form-control" id = "quota2" onchange="check_quota()">
								</td>
								<td> 
									<input type="text" class="form-control" id = "quota3" onchange="check_quota()">
								</td>
								<td>
									<input type="text" class="form-control" id = "quota4" onchange="check_quota()">
								</td>
								<td>
									<input type="text" class="form-control" id = "quota5" onchange="check_quota()">
								</td>
								<td id = "show_quota"></td>						
							</tr>
						</tbody>
					</table>
				</div>		
			</div>
			<br>
			<div class = "row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
					<div class="panel panel-midnightblue" data-widget='{"draggable": "false"}'>
						<div class="panel-heading">
							<h2><font size = "5px"><b>Quota</b></font></h2>
								<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'>
								</div>
						</div>
						<div class="panel-body">
						<canvas id="testCanvas" width="100%" height="100%"></canvas>
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

