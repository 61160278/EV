<?php
/*
* v_main_work_attendance.php
* Display v_main_work_attendance
* @input    
* @output
* @author Kunanya Singmee
* @Create Date 2565-03-3
*/  
?>

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

#color_head {
    background-color: #3f51b5;
}
</style>


<script>
$(document).ready(function() {

});
// document ready
</script>

<!DOCTYPE html>
<html>
<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading">
            <h2>
                <font color="#ffffff" size="6px"><b>Report Work Attendance</b></font>
            </h2>
        </div>
        <!-- panel-heading -->

        <div class="col-md-12">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>
                            List of department to  work attendance
                        </h3>
                    </div>

                </div>
                <!--div row for manage size of head panel -->
                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"
                            role="grid" style="width: 100%;">
                            <thead>
                                <tr">
                                    <th>
                                        <center>No.</center>
                                    </th>
                                    <th>
                                        <center>Company</center>

                                    </th>
                                    <th>
                                        <center>Department</center>
                                    </th>
                                    <th>
                                        <center>Action</center>
                                    </th>
                                    </tr>
                                    <!-- tr -->
                            </thead>
                            <!-- thead -->
                            <tbody>
                                <?php 
                                // print_r($ex_info);

                                if(sizeof($dep_info) != 0){ 
                                    foreach($dep_info as $index => $row){?>
                                <tr>
                                    <td><?php echo $index+1; ?></td>
                                    <td><?php echo $row->Company." (" . $row->Company_id . ")";?></td>
                                    <td><?php echo $row->Department; ?></td>
                                    <td>                
                                        <a
                                            href="<?php echo base_url(); ?>ev_report/Evs_Report/report_work_attendance_employee/<?php echo $row->Department_id; ?>">
                                            <button type="button" class="btn btn-info"><i
                                                    class="fa fa-info-circle"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    // foreach 
                                }
                                // if  ?>


                            </tbody>
                            <!-- tbody  -->
                        </table>
                        <!-- table -->
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->


                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                            </div>
                            <!-- dataTables_info -->
                        </div>
                        <!-- col-6  -->
                    </div>
                    <!-- row  -->
                </div>
                <!-- panel-footer -->

            </div>
            <!-- panel-body -->
        </div>
        <!-- col inside-->
    </div>
    <!-- head panel -->
</div>
<!-- head outside -->