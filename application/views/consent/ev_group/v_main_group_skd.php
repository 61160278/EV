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

<script>
function test(value) {
    if (value == "0") {
        window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/index";
    } else if (value == "1") {
        window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_sdm";
    } else {
        window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_skd";
    }
}
// function test

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

function Delete_data(gru_id) {
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
    });
    // ajax
    window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_skd";
}
// function Delete_data

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
// function get_Em

function Save_edit_data(gru_id) {
    var group = document.getElementById("group_text").value;
    var Emp_id = document.getElementById("Emp_id").value;
    console.log(gru_id)
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/save_edit_skd",
        data: {

            "group": group,
            "Emp_id": Emp_id

        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status)
        }
    });
    // ajax
    window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_skd";
}
// function Save_edit_data

function save_add() {
    var group = document.getElementById("grouptext").value;
    var Emp_id = document.getElementById("Emp_id_modol").value;
    var Showname_modol = document.getElementById("Showname_modol").value;

    if (group != "" && Emp_id != "") {
        if(Showname_modol != "ไม่มีข้อมูล"){
            add_group();
            return true;
        } else {
            add_alert();
            return false;
        }
        // if-else 
    }
}
//    save_add form

function add_alert() {
    alert("Please fill up this form.");
}
</script>

<!DOCTYPE html>
<html>
<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading">
            <h1 style="font-family:'Times New Roman'">
                <font color="#ffffff" size="7px"><b>Manage Group SKD</b></font>
                <div class="panel pull-right" id="addtable_filter">
                    <select name="example_length" class="form-control" aria-controls="example" onChange="test(value)">
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
                        <div class="DTTT btn-group pull-right mt-sm">
                            &emsp;
                            <a data-toggle="modal" class="btn btn btn-success" href="#Add">
                                <i class="ti ti-plus"></i>
                                <span>ADD</span>
                            </a>
                        </div>
                        <!-- DTTT -->
                    </div>
                    <!-- panel-ctrls -->

                    <div class="panel-body no-padding">
                        <div id="example_wrapper" class="dataTables_wrapper form-inline no-footer">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>

                            <table id="example" class="table table-striped table-bordered dataTable no-footer"
                                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                                style="width: 100%;">
                                <thead>
                                    <tr style="background-color:lavender;">
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
                                        <td><?php echo $num;?> </td>
                                        <td><?php echo $row->gru_name; ?></td>
                                        <td>
                                            <?php if($row->gru_head_dept == NULL){ 
													echo "ไม่พบข้อมูล";
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
                                                <a data-toggle="modal" class="btn btn-info"
                                                    href="<?php echo base_url();?>/ev_group/Evs_group/select_group">
                                                    <i class="ti ti-info-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Model Edit -->
                                    <div class="modal fade" id="Edit<?php echo $row->gru_id?>" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:gray;">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">
                                                        <font color="White"><b>&times;</b></font>
                                                    </button>
                                                    <h2 class="modal-title"><b>
                                                            <font color="white">Edit SKD Group Data & Head Dept.</font>
                                                        </b></h2>
                                                </div>
                                                <!-- modal header -->

                                                <div class="modal-body">
                                                    <form class="form-horizontal"
                                                        action="<?php echo base_url(); ?>ev_group/Evs_group/save_edit_skd"
                                                        method="post">
                                                        <div class="form-group">
                                                            <label for="focusedinput"
                                                                class="col-sm-3 control-label">Group Name</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control"
                                                                    value="<?php echo $row->gru_name; ?>"
                                                                    name="group_text" placeholder="HR AGM">
                                                            </div>
                                                        </div>
                                                        <!-- Group Name -->

                                                        <h2 style="font-family:'Courier New'"><b>
                                                                <font size="4px" color="Black">Select Head Dept.</font>
                                                            </b></h2>

                                                        <div class="form-group">
                                                            <label for="focusedinput"
                                                                class="col-sm-3 control-label">Emp. ID</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control"
                                                                    value="<?php echo $row->gru_head_dept; ?>"
                                                                    name="Emp_id" id="Emp_id<?php echo $row->gru_id; ?>"
                                                                    placeholder="JS000xxx"
                                                                    onkeyup="get_idemployee('<?php echo $row->gru_id; ?>')">
                                                                <input type="hidden" class="form-control"
                                                                    value="<?php echo $row->gru_id; ?>" name="gru_id"
                                                                    id="gru_id">
                                                            </div>
                                                        </div>
                                                        <!--Emp. ID -->

                                                        <div class="form-group">
                                                            <label for="focusedinput"
                                                                class="col-sm-3 control-label">Name - Surname</label>
                                                            <div class="col-sm-6">
                                                                <input disabled type="text" class="form-control"
                                                                    value="<?php echo $row->Empname_eng , " ", $row->Empsurname_eng; ?>"
                                                                    id="nameEmp<?php echo $row->gru_id ?>"
                                                                    placeholder="Name Surname">
                                                            </div>
                                                        </div>
                                                        <!-- Name Surname -->
                                                </div>
                                                <!-- modal-body -->

                                                <div class="modal-footer">
                                                    <div class="btn-group pull-left">
                                                        <button type="button" class="btn btn-inverse"
                                                            data-dismiss="modal">CANCEL</button>
                                                    </div>
                                                    <input type="submit" class="btn btn-success" value="SAVE">
                                                </div>
                                                <!-- modal-footer -->
                                                </form>
                                                <!-- form-horizontal -->
                                            </div>
                                            <!-- modal-content -->
                                        </div>
                                        <!-- modal-dialog -->
                                    </div>
                                    <!-- End Modal Edit_add-->


                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="Delete<?php echo $row->gru_id?>" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:gray;">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">
                                                        <font color="White"><b>&times;</b></font>
                                                    </button>
                                                </div>
                                                <!-- Modal header -->

                                                <div class="modal-body">
                                                    <div class="form-horizontal">
                                                        <div class="form-group" align="center">
                                                            <div class="col-sm-12">
                                                                <label for="focusedinput" class="control-label"
                                                                    style="font-family:'Courier New'" align="center">
                                                                    <font size="5px">Do you want to Delete Data YES or NO ?</font>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- form-horizontal -->
                                                </div>
                                                <!-- Modal body -->

                                                <div class="modal-footer">
                                                    <div class="btn-group pull-left">
                                                        <button type="button" class="btn btn-inverse"
                                                            data-dismiss="modal">NO</button>
                                                    </div>
                                                    <button type="button" class="btn btn-success"
                                                        onClick="Delete_data(<?php echo $row->gru_id; ?>)">YES</button>
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
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite"></div>
                            </div>
                        </div>
                    </div>
                    <!-- panel-footer -->
                </div>
                <!-- panel-addtable -->
                <h4 class="text">Description</h4>
                <div>
                    <a class="btn btn-danger">
                        <i class="ti ti-trash"></i>
                        &nbsp;
                        Delete
                    </a>
                    <a class="btn btn-warning">
                        <i class="ti ti-pencil-alt"></i>
                        &nbsp;
                        Edit
                    </a>
                    <a class="btn btn-info">
                        <i class="ti ti-info-alt"></i>
                        &nbsp;
                        Info
                    </a>
                </div>
            </div>
            <!-- panel-body -->
        </div>
        <!-- col inside-->
    </div>
    <!-- head panel -->
</div>
<!-- head outside -->
</html>

    <head>
        <style>
        thead {
            color: black;
            font-size: 17px;
        }

        tbody {
            color: black;
            font-size: 14px;
        }
        </style>
    </head>

<!-- Modal Add -->
<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b></font>
                </button>
                <h2 class="modal-title"><b>
                        <font color="white">Add SKD Group Data & Head Dept.</font>
                    </b></h2>
            </div>
            <!-- modal header -->

            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-3 control-label">Group Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="grouptext" placeholder="HR AGM">
                        </div>
                    </div>
                    <!-- Group Name -->

                    <h2 style="font-family:'Courier New'"><b>
                            <font size="4px" color="Black">Select Head Dept.</font>
                        </b></h2>

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
                <button type="button" class="btn btn-success" id="btnsaveadd" onclick="save_add()">SAVE</button>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal Add-->