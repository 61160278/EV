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

}); //ready


function search_data() {

    
    var com_select = document.getElementById("com_select").value;
    var dep_select = document.getElementById("dep_select").value;
    
    console.log(com_select)
    console.log(dep_select)
    
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_search_data",
        data: {
            "com_select": com_select,
            "dep_sel": dep_select
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
                        '<a onclick ="report_data(<?php echo $value->qut_id?>,' + i + ',' + row
                        .Company_ID + ',' + row.Dep_id +
                        ')" ><button type="submit" class="btn btn-social btn-facebook"><i class="fa fa-file-text"></i></button></a>'
                    table_data += '<input type="text" id="pos_<?php echo $value->qut_id?>' + i +
                        '" value="' + row.Position_ID + '" hidden>'
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



function manage_data(qut_id, i) {

    var pos_id = document.getElementById("pos_" + qut_id + i).value;
    console.log(pos_id);
    var data_sent = qut_id + ":" + pos_id;
    window.location.href = "<?php echo base_url(); ?>ev_quota/Evs_quota/detail_quota/" + data_sent;
} //manage_data

function report_data(qut_id, i, com, dep_id) {
    var pos_id = document.getElementById("pos_" + qut_id + i).value;

    window.location.href = "<?php echo base_url(); ?>ev_quota/Evs_quota/hr_report_curve/" + qut_id + "/" + pos_id +
        "/" + com +
        "/" + dep_id;
} //report_data
function edit_qup_data(qut_id, i) {

    var pos_id = document.getElementById("pos_" + qut_id + i).value;
    console.log(pos_id);
    var data_sent = qut_id + ":" + pos_id;
    window.location.href = "<?php echo base_url(); ?>ev_quota/Evs_quota/edit_quota_plan/" + data_sent;
} //edit_qup_data
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
        <!--panel-heading  -->
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12">
                    <label class="control-label">
                        <strong>
                            <font size="5px">Manage quota : Please select a company</font>
                        </strong>
                    </label>
                </div>
                <!-- col-12  -->
            </div>
            <!-- row  -->
            <br>

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
            <!-- table  -->
            <legend></legend>

            <div class="row">
                <label class="col-md-3">
                    <select id="com_select" name="example_length" class="form-control" onclick="search_data();">
                        <option value="0">Company</option>
                        <!-- start foreach -->
                        <?php foreach($com_data->result() as $value){ ?>
                        <option value="<?php echo $value->Company_id;?>">
                            <?php echo $value->Company;?>
                        </option>
                        <?php } ?>
                        <!-- end foreach -->
                    </select>
                </label>
                <!-- col-3  -->
                <label class="col-md-3">
                    <select name="example_length" class="form-control" id="dep_select">
                        <option value="0">Department</option>
                    </select>
                </label>
                <!-- col-3  -->
                <label class="col-md-3">
                </label>
                <!-- col-3  -->
                <label class="col-md-3">
                </label>
                <!-- col-3  -->
            </div>
            <!-- row  -->
            <hr>

            <div class="col-md-12">
                <div class="panel panel-indigo">
                    <div class="row">
                        <div class="panel-heading">
                            <div class="panel-ctrls">
                            </div>
                        </div>
                        <!-- panel-heading -->
                        <div class="panel-body no-padding">
                            <div class="dataTables_wrapper form-inline no-footer" id="example_wrapper">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <!-- row  -->
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
                                <!-- table  -->
                            </div>
                            <!-- dataTables_wrapper -->
                        </div>
                        <!-- panel-body -->

                        <div class="panel-footer">
                        </div>
                        <!-- panel-footer -->

                    </div>
                    <!-- row -->
                </div>
                <!-- panel panel-indigo -->

                <div class="row">
                    <div class="DTTT btn-group pull-left mt-sm">
                        <a href="<?php echo base_url(); ?>/ev_quota/Evs_quota/index">
                            <button type="button" class="btn btn-inverse" data-dismiss="modal">BACK</button></a>
                    </div>
                    <!-- btn-group -->
                </div>
                <!-- row  -->
                <br>

            </div>
            <!--col-md-12-->
            <!-- Description -->
        </div>
        <!-- panel-body -->
    </div>
    <!-- panel panel-indigo -->
</div>
<!-- col-12  -->