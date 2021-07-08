<?php
/*
* v_mange_quota.php
* Display v_main_permission
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-06
*/  
?>
<script>
$(document).ready(function() {
    // get_department()
   // show_data()

}); //ready

function show_data() {

    var qut_pos = document.getElementById("qut_pos").innerHTML;
    console.log(qut_pos);
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/all_data",
        data: {

        },
        datatype: "JSON",
        success: function(data) {

            data = JSON.parse(data)
            console.log(data)

            var table_data = ""

            data.forEach((row, i) => {
                if (qut_pos == 'Operational Associate above') {
                    if (row.Position_Level >= 1 && row.Position_Level <= 2) {
                        table_data += '<tr>'
                        table_data += '<td>'
                        table_data += row.Company_shortname
                        table_data += '</td>'
                        table_data += '<td>'
                        table_data += row.Dep_Name
                        table_data += '</td>'
                        table_data += '<td>'
                        table_data += row.Position_name
                        table_data += '</td>'

                        <?php foreach($manage_qut_data as $value){ ?>
                        table_data += '<td>'
                        table_data +=
                            '<a onclick ="manage_data(<?php echo $value->qut_id?>,' + i +
                            ')"><button type="submit" class="btn btn-info"><i class="ti ti-info-alt"></i></button></a>'
                        table_data += '<input type="text" id="pos_<?php echo $value->qut_id?>' + i +
                            '" value="' + row.Position_ID + '" hidden>'
                        table_data += '&nbsp;'
                        table_data +=
                            '<a onclick ="edit_qup_data(<?php echo $value->qut_id?>,' + i +
                            ')"><button type="submit" class="btn btn-warning"><i class="ti ti-pencil-alt "></i></button></a>'
                        table_data += '&nbsp;'
                        table_data +=
                            '<a onclick ="report_data(<?php echo $value->qut_id?>,' + i +
                            ')"><button type="submit" class="btn btn-social btn-facebook"><i class="fa fa-file-text"></i></button></a>'

                        table_data += '</td>'
                        <?php } ?>

                        table_data += '</tr>'
                        i++
                        '</td>'
                    } // if 
                } else if (qut_pos == "Staff above") {

                    if (row.Position_Level > 2) {

                        table_data += '<tr>'
                        table_data += '<td>'
                        table_data += row.Company_shortname
                        table_data += '</td>'
                        table_data += '<td>'
                        table_data += row.Dep_Name
                        table_data += '</td>'
                        table_data += '<td>'
                        table_data += row.Position_name
                        table_data += '</td>'
                        <?php foreach($manage_qut_data as $value){ ?>
                        table_data += '<td>'
                        table_data +=
                            '<a onclick ="manage_data(<?php echo $value->qut_id?>,' + i +
                            ')"><button type="submit" class="btn btn-info"><i class="ti ti-info-alt"></i></button></a>'
                        table_data += '<input type="text" id="pos_<?php echo $value->qut_id?>' + i +
                            '" value="' + row.Position_ID + '" hidden>'
                        table_data += '&nbsp;'
                        table_data +=
                            '<a onclick ="edit_qup_data(<?php echo $value->qut_id?>,' + i +
                            ')"><button type="submit" class="btn btn-warning"><i class="ti ti-pencil-alt "></i></button></a>'
                        table_data += '&nbsp;'
                        table_data +=
                            '<a onclick ="report_data(<?php echo $value->qut_id?>,' + i +
                            ')" ><button type="submit" class="btn btn-social btn-facebook"><i class="fa fa-file-text"></i></button></a>'
                        table_data += '</td>'
                        <?php } ?>
                        table_data += '</tr>'
                        i++
                        '</td>'
                    }
                } else if (qut_pos == "All Position") {

                    if (row.Position_Level > 0) {

                        table_data += '<tr>'
                        table_data += '<td>'
                        table_data += row.Company_shortname
                        table_data += '</td>'
                        table_data += '<td>'
                        table_data += row.Dep_Name
                        table_data += '</td>'

                        table_data += '<td>'
                        table_data += row.Position_name
                        table_data += '</td>'

                        <?php foreach($manage_qut_data as $value){ ?>
                        table_data += '<td>'
                        table_data +=
                            '<a onclick ="manage_data(<?php echo $value->qut_id?>,' + i +
                            ')"><button type="submit" class="btn btn-info"><i class="ti ti-info-alt"></i></button></a>'
                        table_data += '<input type="text" id="pos_<?php echo $value->qut_id?>' + i +
                            '" value="' + row.Position_ID + '" hidden>'
                        table_data += '&nbsp;'
                        table_data +=
                            '<a onclick ="edit_qup_data(<?php echo $value->qut_id?>,' + i +
                            ')"><button type="submit" class="btn btn-warning"><i class="ti ti-pencil-alt "></i></button></a>'
                        table_data += '&nbsp;'
                        table_data +=
                            '<a onclick ="report_data(<?php echo $value->qut_id?>,' + i +
                            ')" ><button type="submit" class="btn btn-social btn-facebook"><i class="fa fa-file-text"></i></button></a>'
                        table_data += '</td>'
                        <?php } ?>
                        table_data += '</tr>'
                        i++
                        '</td>'
                    }
                }
            });

            $('#example tbody').html(table_data);

        }
    });

} //shoe data
////////////////////////end show//////////////////////////////////
function search_data() {

    var pos_lv_select = document.getElementById("pos_lv_select").value;
    var com_select = document.getElementById("com_select").value;
    var dep_select = document.getElementById("dep_select").value;
    var pos_select = document.getElementById("pos_select").value;

    
    console.log(com_select)
    console.log(dep_select)
    console.log(pos_lv_select)
    console.log(pos_select)
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_search_data",
        data: {
            "pos_lv_select": pos_lv_select,
            "com_select": com_select,
            "dep_sel": dep_select,
            "pos_select": pos_select
        },
        datatype: "JSON",
        success: function(data) {

            data = JSON.parse(data)
            console.log(data)

            var table_data = ""

            if (data.length == 0) {

                table_data += '<tr>'
                table_data += '<td colspan="5">'
                table_data += 'There is no data in the system.'
                table_data += '</td>'
                table_data += '</tr>'


            } else {
                data.forEach((row, i) => {

                    table_data += '<tr>'
                    table_data += '<td>'
                    table_data += row.Company_shortname
                    table_data += '</td>'
                    table_data += '<td>'
                    table_data += row.Dep_Name
                    table_data += '</td>'
                    table_data += '<td>'

                    table_data += row.Position_name
                    table_data += '</td>'
                    <?php foreach($manage_qut_data as $value){ ?>
                    table_data += '<td>'
                    table_data +=
                        '<a onclick ="manage_data(<?php echo $value->qut_id?>,' + i +
                        ')"><button type="submit" class="btn btn-info"><i class="ti ti-info-alt"></i></button></a>'
                    table_data += '<input type="text" id="pos_<?php echo $value->qut_id?>' + i +
                        '" value="' + row.Position_ID + '" hidden>'
                    table_data += '&nbsp;'
                    table_data +=
                        '<a onclick ="edit_qup_data(<?php echo $value->qut_id?>,' + i +
                        ')"><button type="submit" class="btn btn-warning"><i class="ti ti-pencil-alt "></i></button></a>'
                    table_data += '&nbsp;'
                    table_data +=
                        '<a onclick ="report_data(<?php echo $value->qut_id?>,' + i +
                        ')" ><button type="submit" class="btn btn-social btn-facebook"><i class="fa fa-file-text"></i></button></a>'
                    table_data += '</td>'
                    <?php } ?>
                    table_data += '</tr>'
                    i++
                    '</td>'

                });
            }
            $('#example tbody').html(table_data);

        }
    });

} //search_data

function get_position() {
    var qut_pos = document.getElementById("qut_pos").innerHTML;
    var pos_sel = document.getElementById("pos_lv_select").value; // get kay by id
    // console.log(pos_sel);
    // console.log(qut_pos);
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_position_level",
        data: {
            "position_level_id": pos_sel
        },

        success: function(data) {

            data = JSON.parse(data)
            // console.log(data)
            var table_data = ""

            table_data += '<option value="0">Position</option>'

            data.forEach((row, i) => {
                if (qut_pos == 'Operational Associate above') {
                    if (row.Position_Level >= 1 && row.Position_Level <= 2) {
                        table_data += '<option value="' + row.Position_ID + '">' + row
                            .Position_name + '</option>'
                    }
                } else if (qut_pos == 'Staff above') {
                    if (row.Position_Level > 2) {
                        table_data += '<option value="' + row.Position_ID + '">' + row
                            .Position_name + '</option>'
                    }
                } else if (qut_pos == 'All Position') {
                    if (row.Position_Level > 0) {
                        table_data += '<option value="' + row.Position_ID + '">' + row
                            .Position_name + '</option>'
                    }
                }

            });
            $('#pos_select').html(table_data);

        }
    });

    search_data();
} //get_position
function get_department() {
    var dep_sel = document.getElementById("com_select").value; // get kay by id
    // console.log(dep_sel);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_depamant",
        data: {
            "dep_id": dep_sel
        },

        success: function(data) {
            data = JSON.parse(data)
            // console.log(data)
            var table_data = ""
            table_data += '<option value="0">Depamant</option>'


            data.forEach((row, i) => {

                table_data += '<option value="' + row.Dep_id + '">' + row.Dep_Name + '</option>'

            });

            $('#dep_select').html(table_data);


        }
    });
    search_data();
} //get_department()

function manage_data(qut_id, i) {

    var pos_id = document.getElementById("pos_" + qut_id + i).value;
    console.log(pos_id);
    var data_sent = qut_id + ":" + pos_id;
    window.location.href = "<?php echo base_url(); ?>ev_quota/Evs_quota/detail_quota/" + data_sent;
} //manage_data

function report_data(qut_id, i) {
    var pos_id = document.getElementById("pos_" + qut_id + i).value;
    console.log(pos_id);
    var data_sent = qut_id + ":" + pos_id;
    window.location.href = "<?php echo base_url(); ?>ev_quota/Evs_quota/hr_report_curve/" + data_sent;
} //report_data
function edit_qup_data(qut_id, i) {

    var pos_id = document.getElementById("pos_" + qut_id + i).value;
    console.log(pos_id);
    var data_sent = qut_id + ":" + pos_id;
    window.location.href = "<?php echo base_url(); ?>ev_quota/Evs_quota/edit_quota_plan/" + data_sent;
} //report_data
</script>
<style>
h2 {
    color: white;
}

#numdatashow {
    margin-right: 290px;
}

th {
    color: black;
    text-align: center;
    font-size: 20px;
}

td {
    color: black;
    text-align: center;
    font-size: 16px;
}

h4 {
    color: black;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}

.qut_type {
    text-align: left;
}

.qut {
    text-align: left;
}
</style>

<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading">
            <h2>
                <font size="6px">Manage Quota</font>
            </h2>
        </div>
        <div class="panel-body">

            <?php foreach($qup_data->result() as $value){ ?>
            <input type="text" id="qup_id" value="<?php echo $value->qup_id;?>" hidden>
            <input type="text" id="qup_qut_id" value="<?php echo $value->qup_qut_id;?>" hidden>
            <input type="text" id="qup_Position_ID" value="<?php echo $value->qup_Position_ID;?>" hidden>
            <?php } ?>

            <table>
                <?php foreach($manage_qut_data as $value){ ?>
                <tr>
                    <td class="qut" width="175">
                        <h4><b>Quota </b></h4>
                    </td>
                    <td width="75">
                        <h4><b> : </b></h4>
                    </td>
                    <td class="qut_type" width="200"><?php echo $value->qut_type;?></td>
                </tr>
                <tr>
                    <td class="qut">
                        <h4><b>Position of Quota </b></h4>
                    </td>
                    <td>
                        <h4><b> : </b></h4>
                    </td>
                    <td class="qut_type" id="qut_pos"><?php echo $value->qut_pos;?></td>
                </tr>

                <?php } ?>

            </table>
            <legend></legend>
            <div>
                <label class="col-md-3">
                    <select id="com_select" name="example_length" class="form-control" onclick="get_department();">
                        <option value="0">Company</option>
                        <!-- start foreach -->
                        <?php foreach($com_data->result() as $value){ ?>

                        <option value="<?php echo $value->Company_ID;?>">
                            <?php echo $value->Company_shortname;?>
                        </option>
                        <?php } ?>
                        <!-- end foreach -->
                    </select>
                </label>
                <label class="col-md-3">
                    <select name="example_length" class="form-control" id="dep_select" onclick="search_data()">
                        <option value="0">Department</option>
                    </select>
                </label>

                <label class="col-md-3">
                    <select name="example_length" class="form-control" id="pos_lv_select" onclick="get_position()">
                        <option value="0">Position Level</option>
                        <?php foreach($manage_qut_data as $value){ ?>
                        <?php  if ($value->qut_pos == 'Operational Associate above') {?>
                        <!-- start foreach -->
                        <?php foreach($psl_data->result() as $value){ ?>
                        <?php if ($value->psl_id == "5" ) { ?>
                        <option value="<?php echo $value->psl_id;?>"><?php echo $value->psl_position_level;?></option>
                        <?php } //if Position_Level == 1?>
                        <?php } //foreach qut_data?>
                        <?php } //if qut_pos == 'Operational Associate'?>
                        <?php } //foreach manage_qut_data?>

                        <?php foreach($manage_qut_data as $value){ ?>
                        <?php  if ($value->qut_pos == 'Staff above') {?>
                        <!-- start foreach -->
                        <?php foreach($psl_data->result() as $value){ ?>
                        <?php if ($value->psl_id < "5") { ?>
                        <option value="<?php echo $value->psl_id;?>"><?php echo $value->psl_position_level;?></option>
                        <?php } //if Position_Level == 1?>
                        <?php } //foreach qut_data?>
                        <?php } //if qut_pos == 'Operational Associate'?>
                        <?php } //foreach manage_qut_data?>
                        <?php foreach($manage_qut_data as $value){ ?>
                        <?php  if ($value->qut_pos == 'All Position') {?>
                        <!-- start foreach -->
                        <?php foreach($psl_data->result() as $value){ ?>
                        <?php if ($value->psl_id <= "5") { ?>
                        <option value="<?php echo $value->psl_id;?>"><?php echo $value->psl_position_level;?></option>
                        <?php } //if Position_Level == 1?>
                        <?php } //foreach qut_data?>
                        <?php } //if qut_pos == 'Operational Associate'?>
                        <?php } //foreach manage_qut_data?>
                        <!-- end foreach -->
                    </select>
                </label>
                <label class="col-md-3">
                    <select name="example_length" class="form-control" id="pos_select" onclick="search_data()">
                        <option value="0">Position</option>
                    </select>
                </label>
            </div>
            <hr>
            <div class="col-md-12 ">
                <div class="panel panel-indigo">
                    <div class="row">
                        <div class="panel-heading">
                            <div class="panel-ctrls">
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <div class="dataTables_wrapper form-inline no-footer" id="example_wrapper">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <table width="100%" class="table table-striped table-bordered dataTable no-footer"
                                    id="example" role="grid" aria-describedby="example_info" style="width: 100%;"
                                    cellspacing="0">
                                    <thead>
                                        <tr role="row">
                                            <th>Company</th>
                                            <th>Department</th>
                                            <th>position</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="DTTT btn-group pull-left mt-sm">
                        <a href="<?php echo base_url(); ?>/ev_quota/Evs_quota/index">
                            <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button></a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <legend></legend>
                    <h3>Description</h3>
                    <table height="150px">
                        <tr>
                            <td height="20" width="50px"><button type="submit" class="btn btn-info"><i
                                        class="ti ti-info-alt"></i></button></td>
                            <td width="50px">
                                <h4>:</h4>
                            </td>
                            <td width="150px">
                                <h4>Detail quota</h4>
                            </td>
                        </tr>
                        <tr>
                            <td> <button type="submit" class="btn btn-warning"><i
                                        class="ti ti-pencil-alt "></i></button>
                            </td>
                            <td width="50px">
                                <h4>:</h4>
                            </td>
                            <td>
                                <h4>Edit quota plan</h4>
                            </td>
                        </tr>
                        <tr>
                            <td> <a class="btn btn-social btn-facebook"><i class="fa fa-file-text"></i></a>
                            </td>
                            <td width="50px">
                                <h4>:</h4>
                            </td>
                            <td>
                                <h4>HD/HR Report curve</h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!--panel-body-->
        </div>
    </div>
</div>