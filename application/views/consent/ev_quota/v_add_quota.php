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
							<div id="line-example" style="position: relative;">
								<svg xmlns="http://www.w3.org/2000/svg" style="top: -0.13px; overflow: hidden; position: relative;" width="700" height="350" version="1.1">
								<desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc>
								<defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: end; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="end" x="32.51" y="308" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">0</tspan>
								</text>
								<path style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="none" stroke="#aaaaaa" stroke-width="1" d="M 45.01 308.2 H 650"></path>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: end; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="end" x="32.51" y="248" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">25</tspan>
								</text>
								<path style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="none" stroke="#aaaaaa" stroke-width="1" d="M 45.01 248 H 650"></path>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: end; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="end" x="32.51" y="188" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">50</tspan>
								</text>
								<path style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="none" stroke="#aaaaaa" stroke-width="1" d="M 45.01 188 H 650"></path>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: end; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="end" x="32.51" y="128" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">75</tspan>
								</text>
								<path style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="none" stroke="#aaaaaa" stroke-width="1" d="M 45.01 128 H 650"></path>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: end; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="end" x="32.51" y="68" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">100</tspan>
								</text>
								<path style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="none" stroke="#aaaaaa" stroke-width="1" d="M 45.01 68 H 650"></path>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: middle; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="middle" transform="matrix(1, 0, 0, 1, 0, 6.9)" x="580" y="320.7" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">D</tspan>
								</text>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: middle; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="middle" transform="matrix(1, 0, 0, 1, 0, 6.9)" x="460" y="320.7" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">C</tspan>
								</text>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: middle; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="middle" transform="matrix(1, 0, 0, 1, 0, 6.9)" x="340" y="320.7" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">B</tspan>
								</text>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: middle; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="middle" transform="matrix(1, 0, 0, 1, 0, 6.9)" x="220" y="320.7" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">A</tspan>
								</text>
								<text font-family="sans-serif" font-size="12px" font-weight="normal" style="font: 12px sans-serif; font-size-adjust: none; font-stretch: normal; text-anchor: middle; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#888888" stroke="none" text-anchor="middle" transform="matrix(1, 0, 0, 1, 0, 6.9)" x="100" y="320.7" font="10px &quot;Arial&quot;">
									<tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.17">S</tspan>
								</text>
								<path style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="none" stroke="#37474f" stroke-width="3" d="M 100 300 C 100 300 200 200 350 100 C 450 190 350 110 580 300 C">
								</path>
								<!-- <path style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="none" stroke="#37474f" stroke-width="3" d="M 100 300 C 60.4192 71.02 300 300 180 270 C 122.056 141.82 152.874 194.92 168.284 194.92 C 183.735 194.92 214.638 124.12 230.089 124.12 C 245.499 124.12 276.317 194.92 291.726 194.92 C 307.135 194.92 337.954 141.82 353.363 124.12 C 100 106.42 399.591 71.02 415 53.32">
								</path> -->
								<!-- <circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#37474f" stroke="#ffffff" stroke-width="1" cx="45.01" cy="53.32" r="7" ></circle> 
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#37474f" stroke="#ffffff" stroke-width="1" cx="106.647" cy="124.12" r="4"></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#37474f" stroke="#ffffff" stroke-width="1" cx="168.284" cy="194.92" r="4">
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#37474f" stroke="#ffffff" stroke-width="1" cx="230.089" cy="124.12" r="4"></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#37474f" stroke="#ffffff" stroke-width="1" cx="291.726" cy="194.92" r="4"></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#37474f" stroke="#ffffff" stroke-width="1" cx="353.363" cy="124.12" r="4"></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#37474f" stroke="#ffffff" stroke-width="1" cx="415" cy="53.32" r="4" ></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#ffffff" stroke-width="1" cx="45.01" cy="25" r="7" ></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#ffffff" stroke-width="1" cx="106.647" cy="95.8" r="4" ></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#ffffff" stroke-width="1" cx="168.284" cy="166.6" r="4"></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#ffffff" stroke-width="1" cx="230.089" cy="95.8" r="4" ></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#ffffff" stroke-width="1" cx="291.726" cy="166.6" r="4"></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#ffffff" stroke-width="1" cx="353.363" cy="95.8" r="4" ></circle>
								<circle style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#ffffff" stroke-width="1" cx="415" cy="25" r="4"></circle> -->
							</svg>
							</div>
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

