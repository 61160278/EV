<?php
/*
* v_main_form.php
* Display v_main_form
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-04-06
*/  
?>

<style>
#color_head {
    background-color: #3f51b5;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<!-- END style -->

<script>
$(document).ready(function() {});
// document ready
</script>
<!-- END script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Create form group </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>List of employees to create form </h3>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>
                <table class="table table-bordered m-n" id="show_emp">
                    <thead>
                        <tr>
                            <th>
                                <center>#</center>
                            </th>
                            <th>
                                <center>Employee ID</center>
                            </th>
                            <th>
                                <center>Name - surname</center>
                            </th>
                            <th>
                                <center>Section Code</center>
                            </th>
                            <th>
                                <center>Department</center>
                            </th>
                            <th>
                                <center>Position</center>
                            </th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                    <!-- thead -->

                    <tbody>
                        <?php     
                    if(sizeof($emp_info) != 0){
                    foreach($emp_info as $index => $row){ ?>
                        <input name="Emp_ID" id="Emp_ID<?php echo $index; ?>" type="text"
                            value="<?php echo $row->emp_id ?>" hidden>
                        <tr>
                            <td>
                                <center>
                                    <?php echo $index+1 ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo  $row->emp_employee_id ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?>
                                </center>
                            </td>
                            <td>
                                <center><?php echo $row->Sectioncode_ID; ?></center>
                            </td>
                            <td>
                                <center><?php echo $dep_info[$index]->Department; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row->Position_name; ?></center>
                            </td>

                            <td>
                                <center>
                                    <?php 
                                    if($status_form[$index] == 0){ ?>
                                    <button class="btn btn-info" disabled>
                                        <i class="fa fa-info-circle"></i>
                                    </button>
                                    <?php }
                                    // if
                                    else{ ?>
                                    <a href="<?php echo base_url() ?>ev_form_HD/Evs_form_HD/createFROM_emp/<?php echo $row->Emp_ID; ?>">
                                        <button class="btn btn-info">
                                            <i class="fa fa-info-circle"></i>
                                        </button>
                                    </a>
                                    <?php }
                                    // else  ?>
                                </center>
                            </td>
                        </tr>
                        <?php }
                        // foreach
                        }
                        // if?>

                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- table  -->

                <br>
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo base_url(); ?>Evs_all_manage/index_a">
                            <button class="btn btn-inverse">BACK</button>
                        </a>
                    </div>
                    <!-- col-6  -->
                    <div class="col-md-6" align="right">
                    </div>
                    <!-- col-6  -->
                </div>
                <!-- row  -->
            </div>
            <!-- body -->
        </div>
        <!-- panel -->
    </div>
    <!-- col-12  -->
</div>
<!-- row  -->

<!-- Modal save -->
<div class="modal fade" id="save_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b></font>
                </button>
                <h2 class="modal-title"><b>
                        <font color="white">Do you want to Save Data YES or NO ?</font>
                    </b></h2>
            </div>
            <!-- modal header -->

            <div class="modal-body">
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-12 control-label" align="center">Please verify the
                        accuracy
                        of the information.</label>
                </div>
                <!-- Group Name -->
            </div>
            <!-- modal-body -->

            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
                </div>
                <button type="button" class="btn btn-success" id="btnsaveadd"
                    onclick="save_group_to_HR()">Sumbit</button>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- End Modal save-->