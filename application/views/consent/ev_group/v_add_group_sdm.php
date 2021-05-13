<?php
/*
* v_add_group_sdm.php
* Display v_add_group_sdm
* @input    
* @output
* @author Tippawan Aiemsaad, Jirayu Jaravichit
* @Create Date 2564-04-07
*/  
?>
<script>
function manage_group() {
    var gru_id = document.getElementById("select").value;
    var data_row = " ";
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/query_man",
        data: {
            "gru_id": gru_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status)
            // console.log(data)
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
            // console.log(data_row)
            $("#select_data").html(data_row)
            $("#count_check").val(count)
        } //success
    });
}

function manage_group_right() {
    var gru_id = document.getElementById("new_group").value;
    var data_row = " ";
    $.ajax({
        type: "post",
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
                    '" name="checkbox" type="checkbox">'
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
            $("#table_r").html(data_row)
            $("#count_group").val(count)
        } //success
    });
}

function change_group() {
    var count_check = document.getElementById("count_check").value;
    var new_group = document.getElementById("new_group").value;
    var old_group = document.getElementById("select").value;
    var get_emp = [];
    for (i = 0; i < count_check; i++) {
        if (document.getElementById("check_group" + i).checked) {
            get_emp.push(document.getElementById("emp_" + i).innerHTML)
            console.log(get_emp)
        } //if
    } //for

    $.ajax({
        type: "post",
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
        } //error ไม่ส่งค่ากลับมาเลยใช้ฟังก์ชันนี้


    }); //ajax


}



function change_group_remove() {
    var count_group = document.getElementById("count_group").value;
    // var new_group = document.getElementById("new_group").value;
    var old_group = document.getElementById("select").value;
    var get_emp = [];
    for (i = 0; i < count_group; i++) {
        if (document.getElementById("old_check_group" + i).checked) {
            get_emp.push(document.getElementById("emp_new" + i).innerHTML)
            console.log(get_emp)
        }
        // if
    }
    //for

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>/ev_group/Evs_group/add_new_group",
        data: {
            "group": old_group,
            "get_emp": get_emp,
            "count": count_group

        },
        dataType: "JSON",
        error: function(status) {
            console.log(status)
            manage_group();
            manage_group_right();
        }
        //success จะไม่มีการส่งค่ากลับมา
    });
    //ajax
}
// change_group_remove
</script>



<!DOCTYPE html>
<html>
<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading">
            <h1 style="font-family:'Times New Roman'">
                <font color="#ffffff" size="7px"><b> Manage Group SDM & Head Dept. </b></font>
            </h1>
        </div>

        <div class="panel-body">
            <h2 style="font-family:'Arial'">
                <font size="4px" font color="black"> &emsp; Please select contact group for add contact to the group.
                </font>
            </h2>
        </div>
        <!-- panel-body h2 -->

        <div class="col-md-6">
            <div class="panel-body">
                <div class="panel panel-indigo" id="table_contact">
                    <div class="panel-heading">
                        <div col-md-6>
                            <label class="col-sm-12 control-label">
                                <label class="col-sm-12 control-label">
                        </div>
                        <div class="panel pull-right" id="addtable_filter">
                            <select id="select" onchange="manage_group()" name="example_length" class="form-control"
                                aria-controls="example">
                                <option value="" selected disabled>Select Group Contact </option>
                                <?php foreach($gcp_gcm->result() as $row) {?>
                                <option value="<?php echo $row->gru_id; ?>">
                                    <?php echo $row->gru_name;?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="panel-ctrls"></div>
                    </div>

                    <div class="panel-body no-padding">
                        <div id="row_addtable" class="dataTables_wrapper form-inline no-footer">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <!--div row for manage size of head panel -->

                            <table id="add_table" class="table table-striped table-bordered dataTable no-footer"
                                cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                                style="width: 100%;">
                                <thead>
                                    <tr style="background-color:lavender; font-family:'Garamond'">
                                        <th>
                                            <center>Select
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
                                <!-- thead -->

                                <tbody id="select_data" align="center">
                                </tbody>
                                <!-- tbody -->
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
                                <i class="ti ti-plus"></i>
                                <span>ADD</span>
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

        <div class="col-md-6">
            <div class="panel-body">
                <div class="panel panel-indigo" id="panel-addtable">
                    <div class="panel-heading">
                        <div col-md-6>
                            <label class="col-sm-12 control-label">
                                <label class="col-sm-12 control-label">
                        </div>
                        <!-- col-md-6 -->
                        <?php	
						      foreach($grpsdm->result() as $row ) { ?>
                        <h2>
                            <label class="col-sm-12 control-label">
                                <font size="6px"><b><?php echo $row->gru_name; ?> </b></font>
                        </h2>
                        <input type="text" value="<?php echo $row->gru_id; ?>" hidden id="new_group">
                        <?php }; ?>

                        <div class="panel-ctrls"></div>
                    </div>
                    <!-- panel-heading -->

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
                                    <tr style="background-color:lavender; font-family:'Garamond'" align="center">
                                        <th>
                                            <center>Select
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

                                <tbody id="table_r" align="center">
                                    <?php
									$num = 0;
									foreach($group_sdm->result() as $index => $row ) { ?>
                                    <tr class="odd gradeX">
                                        <td>
                                            <div class="checked block">
                                                <input name="checkbox" type="checkbox"
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
                                </tbody>
                                <input type="text" id="count_group" value="<?php echo $num;?>" hidden>
                            </table>
                            <!-- table -->
                        </div>
                    </div>
                    <!-- panel-body no-padding -->

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite"></div>
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
                            <a data-toggle="modal" class="btn btn btn-danger" href="#Resign">
                                <i class="ti ti-trash"></i>
                                &nbsp
                                <span>RESIGN</span>
                            </a>
                        </div>
                        <!-- RESIGN -->
                    </div>
                    <!-- panel-body -->
                </div>
                <!-- panel-addtable -->
            </div>
            <!-- panel-body -->
        </div>
        <!-- table right -->
        
        <div class="col-md-12">
            <div class="panel-body">
                <div class="DTTT btn-group pull-left mt-sm">
                    <a href="<?php echo base_url(); ?>/ev_group/Evs_group/select_company_sdm">
                        <button type="button" class="btn btn-inverse" data-dismiss="modal">BACK</button>
                    </a>
                </div>
                <!-- BACK -->
            </div>
            <!--   panelbody -->
        </div>
        <!--   col-md-12 -->
    </div>
    <!-- head panel -->
</div>
<!-- head outside -->



</html>

<style>
thead {
    color: black;
    font-size: 14px;
}

tbody {
    color: black;
    font-size: 12px;
}
</style>

<!-- RESIGN -->
<div class="modal fade" id="Resign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b></font>
                </button>
            </div><!-- Modal header -->
            <div class="modal-body">

                <div class="form-horizontal">
                    <div class="form-group" align="center">
                        <div class="col-sm-12">
                            <label for="focusedinput" class="control-label" style="font-family:'Courier New'"
                                align="center">
                                <font size="5px">==> Coming soon <==    </font>
                            </label>
                        </div> <!-- Name - Surname -->
                    </div>
                </div> <!-- form-horizontal -->
            </div>
            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">NO</button>
                </div>
                <button type="button" class="btn btn-success" data-dismiss="modal">YES</button>
            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- /.modal-->

<!-- RESIGN -->