<?php
/*
* v_main_group_skd.php
* Display v_main_group_skd
* @input    
* @output
* @author Tippawan Aiemsaad
* @Create Date 2564-04-08
*/  
?>

<head>
    <style>
    thead {
        color: black;
        text-align: center;
        font-size: 20px;
    }

    tbody {
        text-align: center;
        font-size: 15px;
    }

    .panel.panel-indigo .panel-heading {
        color: #e8eaf6;
        background-color: #134466;
    }

    .margin {
        margin-top: 10px;
    }
    </style>
</head>

<script>
function manage_skd(value) {
    if (value == "0") {
        window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/index";
    } else if (value == "1") {
        window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_sdm";
    } else {
        window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_skd";
    }
}
// function manage_skd

$(document).ready(function() {
    $("#alert_grouptext").hide();

    $("#grouptext").keyup(function() {
        $("#alert_grouptext").hide();
    });
});
// document ready

function add_group() {
    var group = document.getElementById("grouptext").value;
    var Emp_id = document.getElementById("Emp_id_modol").value;

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/add_group_skd",
        data: {
            "group": group,
            "Emp_id": Emp_id
        },
        dataType: "JSON",
        success: function(status) {
            console.log(status)
        }
        // success function
    });
    // ajax
    window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_skd";
}
// function add_group

function edit_group(gru_id) {
    var grouptext = document.getElementById("group_text" + gru_id).value;
    var Emp_id = document.getElementById("Emp_id" + gru_id).value;
    var Showname_modol = document.getElementById("nameEmp" + gru_id).value;

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/save_edit_skd",
        data: {
            "group_text": grouptext,
            "Emp_id": Emp_id,
            "gru_id": gru_id

        },
        dataType: "JSON",
        error: function(status) {
            console.log(status)
        }
        // error function
    });
    // ajax
    window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_skd";
}
//function edit_group

function delete_data(gru_id) {
    console.log(gru_id);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/delete_group_skd",
        data: {
            "gru_id": gru_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status)
        }
        // success function
    });
    // ajax
    window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_skd";
}
// function delete_data

function get_idemployee(gru_id) {
    Emp_id = document.getElementById("Emp_id" + gru_id).value;
    var empname = "";
    console.log(gru_id)
    console.log(Emp_id)

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/search_by_employee_id_skd",
        data: {
            "Emp_id": Emp_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status)
            console.log(data)

            if (data.length == 0) {
                document.getElementById("nameEmp" + gru_id).value = "ไม่มีข้อมูล";
                console.log(gru_id)
            } else {
                empname = data[0].Empname_eng + " " + data[0].Empsurname_eng
                document.getElementById("nameEmp" + gru_id).value = empname;
                console.log(gru_id)
                console.log(empname)
            }
            // if-else
        }
        // success function
    });
    // ajax
}
// function get_idemployee

function get_Emp() {
    Emp_id = document.getElementById("Emp_id_modol").value;
    var empname = "";
    console.log(Emp_id)

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/search_by_employee_id_skd",
        data: {
            "Emp_id": Emp_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status)
            console.log(data)

            if (data.length == 0) {
                document.getElementById("Showname_modol").value = "ไม่มีข้อมูล";
            } else {
                empname = data[0].Empname_eng + " " + data[0].Empsurname_eng
                document.getElementById("Showname_modol").value = empname;
                console.log(empname)
            }
            // if-else
        }
    });
    // ajax
}
// function get_Emp

function check_add() {
    var group = document.getElementById("grouptext").value;
    var Emp_id = document.getElementById("Emp_id_modol").value;
    var Showname_modol = document.getElementById("Showname_modol").value;

    if (group != "" && Emp_id != "") {
        if (Showname_modol != "ไม่มีข้อมูล") {
            var count = 0;
            $.get("<?php echo base_url(); ?>/ev_group/Evs_group/get_group_skd ", function(data, status) {
                var obj = JSON.parse(data); //แปลงค่าข้อมูล JSON
                obj.forEach((row, index) => { //row =data
                    if (group == row.gru_name) {
                        count++;
                    }
                    // if-else
                });
                // forEach
                if (count == 0) {
                    add_group();
                    return true;
                } else {
                    $("#alert_grouptext").show();
                    return false;
                }
            });
            // $.get
        } else {
            add_alert();
            return false;
        }
        // if-else เช็คดูมีรหัสพนัสงานตรงกับ SKD 
    } else {
        add_alert();
        return false;
    }
    // if-else group
}
// check_add form

function check_edit_skd(check) {
    var group = document.getElementById("group_text" + check).value;
    var Emp_id = document.getElementById("Emp_id" + check).value;
    var Showname_modol = document.getElementById("nameEmp" + check).value;
    var groupname = document.getElementById("groupname" + check).value;
    var count = 0;
    var temp = " ";

    console.log(group)
    console.log(Emp_id)
    console.log(Showname_modol)
    console.log(groupname)

    if (group != "" && Emp_id != "") {
        if (Showname_modol != "ไม่มีข้อมูล") {
            $.get("<?php echo base_url(); ?>/ev_group/Evs_group/get_group_skd ", function(data, status) {
                var obj = JSON.parse(data); //แปลงค่าข้อมูล JSON
                obj.forEach((row, index) => { //row =data

                    if (group == row.gru_name) {
                        count++;
                        temp = row.gru_name;
                        console.log(count)
                    }
                    // if-else
                });
                // forEach
                if (count == 0 || temp == groupname) {
                    console.log("true")
                    edit_group(check);
                    return true;
                } else {
                    $("#alert_grouptext" + check).show();
                    $("#btnedit" + check).attr("disabled", true);
                    return false;
                }
            });
            // $.get
        } else {
            add_alert();
            return false;
        }
        // if-else Showname_modol
    } else {
        add_alert();
        return false;
    }
    // if-else group

}
// check_edit_skd form

function add_alert() {
    $('#warning').modal('show');
}
// add_alert

function manage_data(gru_id) {
    console.log(gru_id);
    window.location.href = "<?php echo base_url(); ?>/ev_group/Evs_group/select_group_company_skd/" + gru_id;
}
// manage_data

function clear_css(gru_id) {
    $("#alert_grouptext" + gru_id).hide();
    $("#btnedit" + gru_id).attr("disabled", false);
}
//function clear_css
</script>

<!DOCTYPE html>
<html>
<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading">
            <h2>
                <font color="#ffffff" size="6px"><b>Manage Group SKD</b></font>
            </h2>
            <div class="pull-right" id="addtable_filter">
                <select name="example_length" class="form-control margin" aria-controls="example"
                    onChange="manage_skd(value)">
                    <option value="0">Select Company</option>
                    <option value="1">SDM</option>
                    <option value="2" selected>SKD</option>
                </select>
            </div>
            <!-- select company -->
            </h1>
        </div>
        <!-- panel-heading -->

        <div class="col-md-12">
            <div class="panel-body">
                <div class="panel panel-indigo" id="panel-addtable">
                    <div class="panel-heading">
                        <div class="panel-ctrls"></div>
                        <div class="DTTT btn-group mt-sm">
                            &emsp;
                            <a data-toggle="modal" class="btn btn btn-success" href="#Add">
                                <i class="fa fa-plus""></i>  &nbsp; ADD
                            </a>
                        </div>
                        <!-- Add -->
                    </div>
                    <!-- panel-heading -->

                    <div class=" panel-body no-padding">
                                    <div id="example_wrapper" class="dataTables_wrapper form-inline no-footer">
                                        <div class="row">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6"></div>
                                        </div>

                                        <table id="example"
                                            class="table table-striped table-bordered dataTable no-footer"
                                            cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <center>No.
                                                    </th>
                                                    <th>
                                                        <center>Group
                                                    </th>
                                                    <th>
                                                        <center>Head Dept.
                                                    </th>
                                                    <th>
                                                        <center>Action
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php 
								$num = 1;
								foreach($grp_sdm->result() as $row ) { ?>
                                                <tr class="odd gradeX" align='center'>
                                                    <input type="text" id="groupname<?php echo $row->gru_id?>"
                                                        value="<?php echo $row->gru_name; ?>" hidden>
                                                    <td><?php echo $num;?> </td>
                                                    <td><?php echo $row->gru_name; ?></td>
                                                    <td>
                                                        <?php if($row->gru_head_dept == NULL){ 
													echo "-";
												} else {
													echo $row->Empname_eng." ".$row->Empsurname_eng;
												}
											?>
                                                    </td>
                                                    <td>
                                                        <div class="demo-btns">
                                                            <a data-toggle="modal" class="btn btn btn-danger"
                                                                href="#Delete<?php echo $row->gru_id?>">
                                                                <i class="ti ti-trash"></i>
                                                            </a>
                                                            <a data-toggle="modal" class="btn btn-warning"
                                                                href="#Edit<?php echo $row->gru_id?>">
                                                                <i class="ti ti-pencil-alt"></i>
                                                            </a>
                                                            <a class="btn btn-info"
                                                                onClick="manage_data(<?php echo $row->gru_id; ?>)">
                                                                <i class="fa fa-refresh"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
								$num++;
								} ?>
                                            </tbody>
                                            <!-- tbody -->
                                        </table>
                                        <!-- table -->
                                    </div>
                                    <!-- example_wrapper -->
                        </div>
                        <!-- no-padding -->

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- panel-footer -->
                    </div>
                    <!-- panel-addtable -->
                    <legend>
                    </legend>
                    <h3>Description</h3>
                    <table height="150px">
                        <tr>
                            <td height="20" width="50px"><button type="submit" class="btn btn-danger"><i
                                        class="ti ti-trash"></i></button></td>
                            <td width="50px">
                                <h4>:</h4>
                            </td>
                            <td width="150px">
                                <h4>Delete</h4>
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
                                <h4>Edit</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>
                            <td width="50px">
                                <h4>:</h4>
                            </td>
                            <td>
                                <h4>Transfer</h4>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- panel-body -->
            </div>
            <!-- col inside-->
        </div>
        <!-- head panel -->
    </div>
    <!-- head outside -->

    <!-- Modal Add -->
    <div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#3f51b5;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                        style="color:white;">&times;</button>
                    <h2 class="modal-title">
                        <b>
                            <font color="white">Add Group Data & Head Dept.</font>
                        </b>
                    </h2>
                </div>
                <!-- modal header -->

                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-3 control-label **text-left**">Group Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="grouptext" placeholder="HR AGM"
                                    name="Emp_id">
                                <label class="col-sm-12 control-label"></label>
                                <p id="alert_grouptext">
                                    <font color="red"><b> This data already to use! </b></font>
                                </p>
                            </div>

                        </div>
                        <!-- Group Name -->

                        <div class="form-group">
                            <label class="col-sm-1 control-label"></label>
                            <div class="col-sm-8">
                                <label><b>
                                        <font size="4px" color="Black">Select Head Dept.</font>
                                    </b></label>
                            </div>
                        </div>
                        <!-- Select Head Dept. -->

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-3 control-label">Emp. ID</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="Emp_id_modol" placeholder="JS000xxx"
                                    onkeyup="get_Emp()">
                            </div>
                        </div>
                        <!--Emp. ID -->

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-3 control-label">Name - Surname</label>
                            <div class="col-sm-6">
                                <input disabled type="text" class="form-control" id="Showname_modol"
                                    placeholder="Name Surname">
                            </div>
                        </div>
                        <!-- Name Surname -->
                    </form>
                    <!-- form-horizontal -->
                </div>
                <!-- modal-body -->

                <div class="modal-footer">
                    <div class="btn-group pull-left">
                        <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                    </div>
                    <button type="button" class="btn btn-success" id="btnsaveadd"
                        onclick="return check_add()">SAVE</button>
                </div>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- End Modal Add-->

    <?php
	$num = 1;
	foreach($grp_sdm->result() as $row ) { ?>

    <!-- Modal Edit -->
    <div class="modal fade" id="Edit<?php echo $row->gru_id?>" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#e9ab18;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                        style="color:white;">&times;</button>
                    <h2 class="modal-title">
                        <b>
                            <font color="white">Edit Group Data & Head Dept</font>
                        </b>
                    </h2>
                </div>
                <!-- modal header -->

                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-3 control-label">Group Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo $row->gru_name; ?>"
                                    id="group_text<?php echo $row->gru_id; ?>" name="group_text" placeholder="HR AGM"
                                    onkeyup="clear_css(<?php echo $row->gru_id; ?>)">
                                <label class="col-sm-12 control-label"></label>
                                <p id="alert_grouptext<?php echo $row->gru_id; ?>" hidden>
                                    <font color="red"><b> This data already to use! </b></font>
                                </p>
                            </div>
                        </div>
                        <!-- Group Name -->

                        <div class="form-group">
                            <label class="col-sm-1 control-label"></label>
                            <div class="col-sm-8">
                                <label><b>
                                        <font size="4px" color="Black">Select Head Dept.</font>
                                    </b></label>
                            </div>
                        </div>
                        <!-- Select Head Dept. -->

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-3 control-label">Emp. ID</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo $row->gru_head_dept; ?>"
                                    name="Emp_id" id="Emp_id<?php echo $row->gru_id; ?>" placeholder="JS000xxx"
                                    onkeyup="get_idemployee('<?php echo $row->gru_id; ?>')">
                                <input type="hidden" class="form-control" value="<?php echo $row->gru_id; ?>"
                                    name="gru_id" id="gru_id">
                            </div>
                        </div>
                        <!--Emp. ID -->

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-3 control-label">Name - Surname</label>
                            <div class="col-sm-6">
                                <input disabled type="text" class="form-control"
                                    value="<?php echo $row->Empname_eng , " ", $row->Empsurname_eng; ?>"
                                    id="nameEmp<?php echo $row->gru_id ?>" placeholder="Name Surname">
                            </div>
                        </div>
                        <!-- Name Surname -->
                    </form>
                    <!-- form -->
                </div>
                <!-- modal-body -->

                <div class="modal-footer">
                    <div class="btn-group pull-left">
                        <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                    </div>
                    <button type="submit" class="btn btn-success" id="btnedit<?php echo $row->gru_id; ?>"
                        onclick="return check_edit_skd('<?php echo $row->gru_id; ?>')">SAVE</button>
                </div>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- End Modal Edit_add-->

    <!-- Modal Delete -->
    <div class="modal fade" id="Delete<?php echo $row->gru_id?>" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <font size="5px">Do you want to delete data ?</font>
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
                    <button type="button" class="btn btn-success"
                        onClick="delete_data(<?php echo $row->gru_id; ?>)">YES</button>
                </div>
                <!-- Modal footer -->
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- End Modal Delete -->
    <?php 
$num++;
} ?>
    <!-- foreach modal -->

    <!-- Modal Warning -->
    <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#FF9800;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <font color="Black"><b>&times;</b>
                        </font>
                    </button>
                    <h2 class="modal-title" style="font-family:'Georgia'"><b>
                            <font color="white">Warning</font>
                        </b></h2>
                </div>
                <!-- Modal header -->

                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group" align="center">
                            <div class="col-sm-12">
                                <label for="focusedinput" class="control-label" align="center">
                                    <font size="5px">
                                        Please fill in the correct information.</font>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- form-horizontal -->
                </div>
                <!-- modal body -->

                <div class="modal-footer">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
                    </div>
                </div>
                <!-- modal footer -->
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- End Modal Warning -->