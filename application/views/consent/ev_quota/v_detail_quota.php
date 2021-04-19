<?php
/*
* v_add_quota.php
* Display v_detail_quota
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-7
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
$(document).ready(function() {

    check_quota_plan();
});

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
                            <!--<div id="line-example" style="position: relative;">
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
							
							</svg>
							</div> -->
                            <!-- <canvas id="testCanvas"></canvas> -->
                            <div id="testCanvas"></div>
                            <!-- <canvas id="myCanvas" width="400" height="400" ></canvas>  -->

                        </div>
                    </div>
                </div>
            </div>

        </div>





    </div>
</div>
</div>