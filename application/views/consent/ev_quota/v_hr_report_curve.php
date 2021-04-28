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
window.onload = function() {
    // <block:setup:1>
    const labels = [
        'S',
        'A',
        'B',
        'B-',
        'C',
        'D',
    ];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Quota',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [5, 25, 40, 40, 25, 5],
        }]
    };
    // </block:setup>

    // <block:config:0>
    const config = {
        type: 'line',
        data,
        options: {}
    };

    // </block:config>

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

}
</script>
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

.tdbold {
    font-weight: bold;
}
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
</style>

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
        <div class="panel-body" style="">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control text" id="com_select">
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
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control text" id="dep_select">
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
                        <select class="form-control text" id="pos_select">
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
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="panel panel-orange" data-widget='{"draggable": "false"}'>
                        <div class="panel-heading">
                            <h2>
                                <font size="5px">ตางราง Report </font>
                            </h2>
                            <div class="panel-ctrls" data-actions-container=""
                                data-action-collapse='{"target": ".panel-body, .panel-footer"}'>
                            </div>
                        </div>
                        <div class="panel-body" style="">
                            <table class="table table-hover table-bordered m-n orange">
                                <thead>
                                    <tr class="orange">
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
                                        <td class="tdbold">Quota</td>
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
                                        <td class="tdbold">Plan</td>
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
                                        <td class="tdbold">Actual</td>
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
                                        <td class="tdbold">Quota Actual</td>
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
                                        <td class="tdbold">Total in level</td>
                                        <td colspan="6"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <br>
                            <div id="line-example" style="position: relative;">
							<canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>