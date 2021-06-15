<?php
/*
* v_add_group_skd.php
* Display v_add_group_skd
* @input    
* @output
* @author Tippawan Aiemsaad
* @Create Date 2564-04-08
*/  
?>

<script>
$(document).ready(function() {
    manage_group();

});
// document ready

function manage_group() {
    var gru_id = document.getElementById("select").value;
    var data_row = " ";
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/query_man",
        data: {
            "gru_id": gru_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status)

            var count = 0;
            data.forEach((row, index) => {
                data_row += '<tr>'
                data_row += '<td>'
                data_row += '<div align="center" class="checked block">'
                data_row += '<input id = "check_group' + index +
                    '" name="checkbox" type="checkbox">'
                data_row += '</div>'
                data_row += '</td>'
                data_row += '<td id="emp_' + index + '">'
                data_row += row.Emp_ID
                data_row += '</td>'
                data_row += '<td>'
                data_row += row.Empname_eng + " " + row.Empsurname_eng;
                data_row += '</td>'
                data_row += '<td>'
                data_row += row.emp_section_code_ID
                data_row += '</td>'
                data_row += '</tr>'
                count++
            })

            $("#select_data").html(data_row)
            $("#count_check").val(count)
        } //success
    });
    // ajax
}
// manage_group

function manage_group_right() {
    var gru_id = document.getElementById("new_group").value;
    var data_row = " ";
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/query_man_new",
        data: {
            "gru_id": gru_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status)
            console.log(data)

            var count = 0;
            data.forEach((row, index) => {
                data_row += '<tr>'
                data_row += '<td>'
                data_row += '<div align="center" class="checked block">'
                data_row += '<input id = "old_check_group' + index +
                    '" name="checkbox_r" type="checkbox">'
                data_row += '</div>'
                data_row += '</td>'
                data_row += '<td id="emp_new' + index + '">'
                data_row += row.Emp_ID
                data_row += '</td>'
                data_row += '<td>'
                data_row += row.Empname_eng + " " + row.Empsurname_eng;
                data_row += '</td>'
                data_row += '<td>'
                data_row += row.emp_section_code_ID
                data_row += '</td>'
                data_row += '</tr>'
                count++
            })
            console.log(data_row)
            $("#table_right").html(data_row)
            $("#count_group").val(count)
        } //success
    });
    // ajax
}
// manage_group_right

function change_group() {
    var count_check = document.getElementById("count_check").value;
    var new_group = document.getElementById("new_group").value;
    var old_group = document.getElementById("select").value;
    var get_emp = [];
    for (i = 0; i < count_check; i++) {
        if (document.getElementById("check_group" + i).checked) {
            get_emp.push(document.getElementById("emp_" + i).innerHTML)
            console.log(get_emp)
        }
        // if
    }
    // for

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/add_new_group",
        data: {
            "group": new_group,
            "get_emp": get_emp,
            "count": count_check
        },
        dataType: "JSON",
        error: function(status) {
            console.log(status)
            manage_group();
            manage_group_right();
        }
        //error จะไม่มีการส่งค่ากลับมา
    });
    //ajax
}
// change_group

function change_group_remove() {
    var count_group = document.getElementById("count_group").value;
    var old_group = document.getElementById("select").value;
    var get_emp = [];
    for (i = 0; i < count_group; i++) {
        if (document.getElementById("old_check_group" + i).checked) {
            get_emp.push(document.getElementById("emp_new" + i).innerHTML)
            console.log(get_emp)
        }
        // if
    }
    // for

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/add_new_group",
        data: {
            "group": old_group,
            "get_emp": get_emp,
            "count": count_group

        },
        dataType: "JSON",
        success: function(status) {
            console.log(status)
            manage_group();
            manage_group_right();
        }
        //error จะไม่มีการส่งค่ากลับมา
    });
    //ajax
}
// change_group_remove

function delete_data() {
    var gru_id = document.getElementById("new_group").value;
    console.log(gru_id)

    var count_group = document.getElementById("count_group").value;
    var old_group = document.getElementById("select").value;
    var get_emp = [];
    for (i = 0; i < count_group; i++) {
        if (document.getElementById("old_check_group" + i).checked) {
            get_emp.push(document.getElementById("emp_new" + i).innerHTML)
            console.log(get_emp)
        }
        // if
    }
    // for

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/add_new_group",
        data: {
            "group": old_group,
            "get_emp": get_emp,
            "count": count_group

        },
        dataType: "JSON",
        success: function(status) {
            console.log(status)
            console.log(gru_id)
        }
        //error จะไม่มีการส่งค่ากลับมา
    });
    //ajax
    window.location.href = "<?php echo base_url(); ?>/ev_group/Evs_group/select_group_company_skd/" + gru_id;
}
// function delete_data

function select_all() {

    var checkboxes = document.getElementsByName('checkbox');
    var button = document.getElementById('toggle');

    if (button.value == 'select') {
        for (var i in checkboxes) {
            checkboxes[i].checked = 'FALSE';
        }
        button.value = 'deselect'
    } else {
        for (var i in checkboxes) {
            checkboxes[i].checked = '';
        }
        button.value = 'select';
    }
}


function select_all_right() {

    var checkboxes = document.getElementsByName('checkbox_r');
    var button = document.getElementById('toggle_r');

    if (button.value == 'select_r') {
        for (var i in checkboxes) {
            checkboxes[i].checked = 'TRUE';
        }
        button.value = 'deselect'
    } else {
        for (var i in checkboxes) {
            checkboxes[i].checked = '';
        }
        button.value = 'select_r';
    }
}
</script>

<style>
.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}

.margin {
    margin-top: 10px;
}

thead {
    color: black;
    text-align: center;
    font-size: 20px;
}

tbody {
    text-align: center;
    font-size: 15px;
}

.alert-info {
    color: #BCBEBF;
    background-color: #DEE1E3;
    border-color: #BCBEBF;
}

.alert-info,
.alert-info h1,
.alert-info h2,
.alert-info h3,
.alert-info h4,
.alert-info h5,
.alert-info h6,
.alert-info small {
    color: #828282;
}
</style>

<!DOCTYPE html>
<html>
<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading">
            <h2>
                <font color="#ffffff" size="6px"><b> Manage Group SKD & Head Dept.</b></font>
            </h2>
        </div>
        <!-- panel-heading h1 -->

        <div class="panel-body">
            <div class="alert alert-info">
                <h3><b>Note !</b></h3>
                <h4>
                    Please select contact group for add contact to the group.
                </h4>
            </div>
        </div>
        <!-- panel-body h3 -->

        <div class="col-md-6">
            <div class="panel-body">
                <div class="panel panel-indigo" id="table_contact">
                    <div class="panel-heading">
                        <div col-md-6>
                            <label class="col-sm-12 control-label">
                                <label class="col-sm-12 control-label">
                        </div>
                        <div class="panel pull-right" id="addtable_filter">
                            <select onchange="manage_group()" id="select" name="example_length" class="form-control"
                                aria-controls="example">
                                <option value="0" selected> Select Group Contact </option>
                                <?php foreach($gcp_gkd->result() as $row) {?>
                                <option value="<?php echo $row->gru_id; ?>">
                                    <?php echo $row->gru_name;?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- addtable_filter -->
                        <div class="panel-ctrls"></div>
                    </div>
                    <!-- panel-heading -->
                    <div class="panel-body no-padding">
                        <div id="row_addtable" class="dataTables_wrapper form-inline no-footer">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>

                            <table id="table1" class="table table-striped table-bordered dataTable no-footer">
                                <thead>
                                    <tr>
                                        <center>
                                            <th>
                                                <center>Select
                                                    <br>
                                                    <input type="checkbox" id="toggle" value="select"
                                                        onclick="select_all()">
                                            </th>
                                            <th valign="center">
                                                <center>Emp.ID
                                            </th>
                                            <th>
                                                <center>Name - Surname
                                            </th>
                                            <th>
                                                <center>Section Code
                                            </th>
                                    </tr>
                                </thead>

                                <tbody id="select_data" align="center">
                                </tbody>
                                <input type="text" id="count_check" value="" hidden>
                            </table>
                            <!-- table -->
                        </div>
                        <!-- row_addtable -->
                    </div>
                    <!-- panel-body no-padding -->

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="table_add" role="status" aria-live="polite"></div>
                            </div>
                        </div>
                    </div>
                    <!-- panel-footer -->

                    <div class="panel-body">
                        <div class="DTTT btn-group pull-right mt-sm">
                            <button class="btn btn-success" onclick="change_group()">
                                <i class="fa fa-plus""></i>  &nbsp; ADD
                            </button>
                        </div>
                        <!-- add -->
                    </div>
                    <!-- panel-body -->
                </div>
                <!-- table_contact -->
            </div>
            <!-- panel-body -->
        </div>
        <!-- tabel left -->

        <div class=" col-md-6">
                                    <div class="panel-body">
                                        <div class="panel panel-indigo" id="panel-addtable">
                                            <div class="panel-heading">
                                                <div col-md-6>
                                                    <label class="col-sm-12 control-label">
                                                        <label class="col-sm-12 control-label">
                                                </div>
                                                <?php
							foreach($grpskd->result() as $row ) { ?>
                                                <h2>
                                                    <label class="col-sm-12 control-label">
                                                        <font size="6px"><b><?php echo $row->gru_name; ?> </b></font>
                                                </h2>
                                                <input type="text" value="<?php echo $row->gru_id; ?>" hidden
                                                    id="new_group">
                                                <?php }; ?>

                                                <div class="panel-ctrls"></div>
                                            </div>
                                            <!-- panel-heading -->

                                            <div class="panel-body no-padding">
                                                <div id="example_wrapper"
                                                    class="dataTables_wrapper form-inline no-footer">
                                                    <div class="row">
                                                        <div class="col-sm-6"></div>
                                                        <div class="col-sm-6"></div>
                                                    </div>

                                                    <table id="example"
                                                        class="table table-striped table-bordered dataTable no-footer">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <center>Select
                                                                        <br>
                                                                        <input type="checkbox" id="toggle_r"
                                                                            value="select_r"
                                                                            onclick="select_all_right()">
                                                                </th>
                                                                <th>
                                                                    <center>Emp.ID
                                                                </th>
                                                                <th>
                                                                    <center>Name - Surname
                                                                </th>
                                                                <th>
                                                                    <center>Section Code
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="table_right" align="center">
                                                            <?php
									$num = 0;
									foreach($group_skd->result() as $index => $row ) { ?>
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <div class="checked block">
                                                                        <input name="checkbox_r" type="checkbox"
                                                                            id="old_check_group<?php echo $index; ?>">
                                                                    </div>
                                                                </td>
                                                                <td id="emp_new<?php echo $index; ?>">
                                                                    <?php echo $row->Emp_ID; ?></td>
                                                                <td><?php echo $row->Empname_eng." ".$row->Empsurname_eng; ?>
                                                                </td>
                                                                <td><?php echo $row->Sectioncode_ID; ?></td>
                                                            </tr>
                                                            <?php
									$num++;
									} ?>
                                                            <!-- foreach -->
                                                        </tbody>
                                                        <!-- tbody -->
                                                        <input type="text" id="count_group" value="<?php echo $num;?>"
                                                            hidden>
                                                    </table>
                                                    <!-- table -->
                                                </div>
                                                <!-- example_wrapper -->
                                            </div>
                                            <!-- panel-body no-padding -->

                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="dataTables_info" id="example_info" role="status"
                                                            aria-live="polite">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- panel-footer -->

                                            <div class="panel-body">
                                                <div class="DTTT btn-group pull-left mt-sm">
                                                    <button class="btn btn-primary" onclick="change_group_remove()">
                                                        <i class="fa fa-refresh"></i>
                                                        &nbsp
                                                        <span>Transfer</span>
                                                    </button>
                                                </div>
                                                <!-- Transform -->

                                                <div class="DTTT btn-group pull-right mt-sm">
                                                    &emsp;
                                                    <a data-toggle="modal" class="btn btn btn-danger" href="#RESIGN">
                                                        <i class="ti ti-share-alt"></i>
                                                        &nbsp
                                                        <span>RESIGN</span>
                                                    </a>
                                                    <!-- foreach -->
                                                </div>
                                                <!-- RESIGN -->

                                            </div>
                                            <!-- panel-body right -->
                                        </div>
                                        <!-- panel-addtable -->
                                    </div>
                                    <!-- panel-body -->
                        </div>
                        <!-- table right -->

                        <div class="col-md-12">
                            <div class="panel-body">
                                <div class="DTTT btn-group pull-left mt-sm">
                                    <a href="<?php echo base_url(); ?>/ev_group/Evs_group/select_company_skd">
                                        <button type="button" class="btn btn-inverse" data-dismiss="modal">BACK</button>
                                    </a>
                                </div>
                                <!-- BACK -->
                            </div>
                            <!-- panel-body -->
                        </div>
                        <!-- col-sm-12 -->
                    </div>
                    <!-- head panel -->
                </div>
                <!-- head outside -->

</html>

<!-- Modal RESIGN -->
<div class="modal fade" id="RESIGN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:red;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                    style="color:white;">&times;</button>
                <h2 class="modal-title">
                    <b>
                        <font color="white">Warning</font>
                    </b>
                </h2>
            </div>
            <!-- Modal header -->

            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group" align="center">
                        <div class="col-sm-12">
                            <label for="focusedinput" class="control-label" align="center">
                                <font size="5px">Do you want to remove the information from the system ?</font>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- form-horizontal -->
            </div>
            <!-- Modal body -->

            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">NO</button>
                </div>
                <button type="button" class="btn btn-success" onClick="delete_data()">YES</button>
            </div>
            <!-- Modal footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Delete -->