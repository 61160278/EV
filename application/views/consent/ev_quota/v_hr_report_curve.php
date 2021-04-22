<?php
/*
* v_hr_report_cureve.php
* Display v_hr_report_cureve
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2563-04-06
*/  
?>
<script>
function get_data() {
	var pos_sel = document.getElementById("pos_select").value; // get kay by id
	console.log(pos_sel);
	
	$.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_hr_report_curve",
        data: {
            "pos_psl_id": pos_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
		}
	});
}
function get_department() {
	var dep_sel = document.getElementById("dep_select").value; // get kay by id
	console.log(dep_sel);
	
	$.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_mange_quota",
        data: {
            "dep_id": dep_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
		}
	});
}
function get_company() {
	var cpn_sel = document.getElementById("com_select").value; // get kay by id
	console.log(cpn_sel);
	
	$.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_mange_quota",
        data: {
            "cpn_id": cpn_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
		}
	});
}
</script>
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
	table {
		color : black;
	}
	th {
		color:black;
		text-align: center;
		font-size: 20px;
	}
	.tdbold {
		font-weight: bold;
	}
</style>

<div class="col-md-12">
	<div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
		<div class="panel-heading">
			<h2><font size = "6px"><b>Report Curve</b></font></h2>
			<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'>
			</div>
		</div>
		<div class="panel-body" style="">
			<div class = "row">
				<div class="form-group">
					<div class="col-md-3">
					</div>
					<div class="col-md-2">
						<select class="form-control text" id="com_select" >
							<option value="0">Company</option>
							<!-- start foreach -->
							<?php foreach($com_data->result() as $value){ ?>
							<option value="<?php echo $value->Company_ID;?>">
							<?php echo $value->Company_shortname;?>
							</option>
							<?php } ?>
							<!-- end foreach -->
						</select>
					</div>
					<div class="col-md-2">
						<select class="form-control text" id="" >
							<option value="yearEndBonus">Quota</option>
							<option value="yearEndBonus">Year End Bonus</option>
							<option value="salaryIncrement">Salary Increment</option>
						</select>
					</div>
					<div class="col-md-2">
						<select class="form-control text" id="" >
							<option value="yearEndBonus">Quota of position</option>
							<option value="yearEndBonus">Team Associate above</option>
							<option value="salaryIncrement">Operational Associate</option>
						</select>
					</div>
				</div>
			</div>
			<br>
			<div class = "row">
				<div class="form-group">
					<div class="col-md-4">
					</div>
					<div class="col-md-2">
						<select class="form-control text" id="dep_select" >
							<option value="0">Select Department</option>
							<!-- start foreach -->
							<?php foreach($dep_data->result() as $value){ ?>
							<option value="<?php echo $value->Dep_id;?>">
							<?php echo $value->Dep_Name;?>
							</option>
							<?php } ?>
							<!-- end foreach -->
						</select>
					</div>
					<div class="col-md-2">
						<select class="form-control text" id="pos_select" >
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
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
						<button class="btn-success btn">SUBMIT</button>
					</div>
				</div>
			</div>
			<br>
			<legend></legend>
			<div class = "row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
					<div class="panel panel-orange" data-widget='{"draggable": "false"}' >
						<div class="panel-heading">
							<h2><font size = "5px">ตางราง Report </font></h2>
							<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'>
							</div>
						</div>
						<div class="panel-body" style="">
							<table class="table table-hover table-bordered m-n orange">
								<thead>
									<tr class = "orange">
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
										<td class = "tdbold">Quota</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>						
									</tr>
									<tr class="orange2">
										<td class = "tdbold">Plan</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>						
									</tr>
									<tr class="orange2">
										<td class = "tdbold">Actual</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>						
									</tr>
									<tr class="orange2">
										<td class = "tdbold">Quota Actual</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>
										<td>
											
										</td>						
									</tr>
									<tr class="orange2">
										<td class = "tdbold">Total in level</td>
										<td colspan = "6"></td>
									</tr>
								</tbody>
							</table>
							<br>
							<br>
							<div id="line-example" style="position: relative;">
								<div class = "bar-example" style="position: relative;">
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
									<rect xmlns="http://www.w3.org/2000/svg" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#000" stroke-width="0" x="90" y="298" width="18.3209" height="11" rx="0" ry="0" r="0"></rect>
									<rect xmlns="http://www.w3.org/2000/svg" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#000" stroke-width="0" x="210" y="187" width="18.3209" height="122" rx="0" ry="0" r="0" />
									<rect xmlns="http://www.w3.org/2000/svg" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#000" stroke-width="0" x="330" y="99" width="18.3209" height="210" rx="0" ry="0" r="0"></rect>
									<rect xmlns="http://www.w3.org/2000/svg" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#000" stroke-width="0" x="450" y="187" width="18.3209" height="122" rx="0" ry="0" r="0"></rect>
									<rect xmlns="http://www.w3.org/2000/svg" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" fill="#757575" stroke="#000" stroke-width="0" x="570" y="298" width="18.3209" height="11" rx="0" ry="0" r="0"></rect>
									<path style="-webkit-tap-highlight-color: rgba(0,188,212);" fill="none" stroke="#e51c23" stroke-width="3" d="M 100 300 C 100 300 200 200 350 100 C 450 190 350 110 580 300 C">
									</path>
									<div class="legend">
										<div style="top: 13px; width: 56px; height: 58px; right: 13px; position: absolute; opacity: 0.85; background-color: rgb(255, 255, 255);"> 
										</div>
										<table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454">
											<tbody>
												<tr>
													<td class="legendColorBox">
														<div style="border:1px solid #ccc;padding:1px">
															<div style="width:4px;height:0;border:5px solid rgb(117,117,117);overflow:hidden">
															</div>
														</div>
													</td>
													<td class = "legendLabel">Actual</td>
												</tr>
											</tbody>
										</table>
									</div>
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
		</div>
	</div>
</div>
