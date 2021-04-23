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
	window.location.href = "<?php echo base_url();?>ev_permission/Evs_permission/delete_emp/"+pay_id+""
} //function emp_insert
</script>

<div data-widget-group="group1">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>List of Permission for Create MBO</h2>

                    <div class="panel-ctrls"></div>
                </div>
                <div class="panel-body no-padding">

                    <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0"
                        width="100%">
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

                </div>
                <div class="panel-footer">

                </div>

            </div>
            <div class="row">
                <div class="col-sm-8" align="left">
                    <button class="btn btn-inverse">BACK</button>
                </div>
                <div class="col-sm-4" align="right">
                    <button class="btn btn-success btn" onclick="emp_insert()">Submit</button>


                </div>
                <!-- col-sm-4 -->
            </div>
        </div>

    </div>
</div>

<?php 
								
	$num = 0;
		foreach($select->result() as $index => $row ) { 
?>



<!-- Modal Delete -->
<div class="modal fade" id="Delete<?php echo $row->emp_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b>
                    </font>
                </button>
            </div>
            <!-- Modal header -->

            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group" align="center">
                        <div class="col-sm-12">
                            <label for="focusedinput" class="control-label" style="font-family:'Courier New'"
                                align="center">
                                <font size="5px">
                                    Do you want
                                    to Delete
                                    Data YES or
                                    NO ?</font>
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
 