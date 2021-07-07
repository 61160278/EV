<?php
/*
* v_main_permission.php
* Display v_main_permission
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2563-10-1
*/  
?>
<script>
function emp_delete(emp_id) {
    console.log(emp_id);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_permission/Evs_permission/select_emp_delete",
        data: {
            "emp_id": emp_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(status)

        }

    });

    var pay_id = 2;
    window.location.href = "<?php echo base_url();?>ev_permission/Evs_permission/delete_emp/" + pay_id + ""
} //function emp_insert
</script>
<style>
th {
    color: black;
    text-align: center;
    font-size: 20px;
}

td {
    text-align: center;
    font-size: 15px;
}

.panel.panel-default .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style="color:white;">
                    <font size="6px"><i class="fa fa-tasks"></i>Manage Permission</font>
                </h2>
                <div class="panel-ctrls"></div>
            </div>
            <!-- panel-heading -->
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-11">
                        <label class="control-label">
                            <strong>
                                <font size="5px">List of employees to create form </font>
                            </strong>
                        </label>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered dataTable no-footer"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        <center>Emp. ID </center>
                                    </th>
                                    <th>
                                        <center> Name – Surname </center>
                                    </th>
                                    <th>
                                        <center> Section Code </center>
                                    </th>
                                    <th>
                                        <center> Department </center>
                                    </th>
                                    <th>
                                        <center> Position </center>
                                    </th>
                                    <th>
                                        <center> Action </center>
                                    </th>

                                </tr>
                            </thead>
                            <tbody id="show_emp">


                                <?php 
								
								$num = 0;
								foreach($select->result() as $index => $row ) { 
							?>
                                <tr class="odd gradeX" align='center'>
                                    <td><?php echo $row->Emp_ID?></td>
                                    <td><?php echo $row->Empname_eng." ".$row->Empsurname_eng?></td>
                                    <td><?php echo $row->Sectioncode_ID?></td>
                                    <td><?php echo $row->Department?></td>
                                    <td><?php echo $row->Position_name ?></td>
                                    <td>
                                        <div class="demo-btns">
                                            <a data-toggle="modal" class="btn btn btn-danger"
                                                href="#Delete<?php echo $row->emp_id?>">
                                                <i class="ti ti-trash"></i>

                                            </a>

                                        </div>
                                    </td>

                                    <input id="empid<?php echo $index ;?>" name="empid" type="hidden"
                                        value="<?php echo  $row->Emp_ID ; ?>">
                                    <input id="Posid<?php echo $index ;?>" name="Posid" type="hidden"
                                        value="<?php echo  $row->Position_ID ; ?>">
                                    <input id="Sectioncode<?php echo $index ;?>" name="Sectioncode" type="hidden"
                                        value="<?php echo  $row->Sectioncode_ID ; ?>">
                                    <input id="Company<?php echo $index ;?>" name="Company" type="hidden"
                                        value="<?php echo  $row->Company_ID ; ?>">


                                </tr>
                                </tr>

                                <?php
								$num++;
							}
							
							?>
                                <input id="count" type="hidden" value="<?php echo  $num++; ?>">
                            </tbody>
                        </table>
                        <!-- table  -->
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->

            </div>
            <!-- panel-body no-padding -->

            <div class="panel-footer">
                <br>
                <hr>
                <h3>Description</h3>
                <table>
                    <tr>
                        <td height="20" width="50px">
                            <button type="submit" class="btn btn-danger">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                        <td width="50px">
                            <h4>:</h4>
                        </td>
                        <td width="150px">
                            <h4>Delete</h4>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- footer  -->
        </div>
        <!-- panel-default -->
    </div>
    <!-- col-md-12 -->
</div>
<!-- row  -->

<?php 
								
	$num = 0;
		foreach($select->result() as $index => $row ) { 
?>



<!-- Modal Delete -->
<div class="modal fade" id="Delete<?php echo $row->emp_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
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
                    onclick="emp_delete('<?php echo $row->emp_id;?>')">YES</button>


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
	}
							
?>