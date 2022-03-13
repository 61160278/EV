<?php
/*
* v_show_work_attendance.php
* Display v_show_work_attendance
* @input    
* @output
* @author jakkarin pimpaeng
* @Create Date 2565-03-09
*/  
?>
<script>
$(document).ready(function() {
    $('#show_work').DataTable();
});
// document ready
</script>
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

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo">
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Status form </b></font>
                </h2>
            </div>
            <!-- heading -->
            <br>
            <br>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6" align="center">
                        <!-- <img src="http://10.73.148.5/DBMC/IMG/emp120/<? echo $_SESSION[" UsEmp_ID"]?>.jpg" width="50%"
                        class="img-responsive img-circle"> -->
                    </div>
                    <!-- col-6 show img  -->

                    <div class="col-md-6">
                        <?php foreach($emp_info->result() as $row){?>

                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label"><strong>
                                        <font size="4px">Employee ID : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-5 -->
                            <div class="col-md-5">
                                <p id="emp_id">
                                    <font size="4px"><?php echo $row->Emp_ID; ?> </font>
                                </p>
                            </div>
                            <!-- col-md-5 -->
                        </div>
                        <!-- row emp_id  -->

                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label"><strong>
                                        <font size="4px">Name - Surname : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-5 -->
                            <div class="col-md-5">
                                <p id="emp_id">
                                    <font size="4px"><?php echo $row->Empname_eng . "  " . $row->Empsurname_eng; ?>
                                    </font>
                                </p>
                            </div>
                            <!-- col-md-5 -->
                        </div>
                        <!-- row emp_name  -->

                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label"><strong>
                                        <font size="4px">Section Code : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-5 -->
                            <div class="col-md-5">
                                <p id="emp_id">
                                    <font size="4px"><?php echo $row->Sectioncode_ID; ?> </font>
                                </p>
                            </div>
                            <!-- col-md-5 -->
                        </div>
                        <!-- row Sectioncode_ID  -->

                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label"><strong>
                                        <font size="4px">Department : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-5 -->
                            <div class="col-md-5">
                                <p id="emp_id">
                                    <font size="4px"><?php echo $dept_info->Department; ?> </font>
                                </p>
                            </div>
                            <!-- col-md-5 -->
                        </div>
                        <!-- row Department  -->


                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label"><strong>
                                        <font size="4px">Position : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-5 -->
                            <div class="col-md-5">
                                <p id="emp_id">
                                    <font size="4px"><?php echo $row->Position_name; ?> </font>
                                </p>
                            </div>
                            <!-- col-md-5 -->
                        </div>
                        <!-- row Department  -->

                        <?php } 
                        // foreach ?>

                        <hr>

                    </div>
                    <!-- col-8  -->

                </div>
                <!-- row  -->
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped m-n" id="show_work">
                            <thead>
                                <tr>
                                    <th width="%">
                                        <center>Late/ Return (Day)</center>
                                    </th>
                                    <th width="%">
                                        <center>Absent (Days) </center>
                                    </th>
                                    <th width="%">
                                        <center>Sick (Day)</center>
                                    </th>
                                    <th width="%">
                                        <center>Business (Days)</center>
                                    </th>
                                    <th width="%">
                                        <center>Suspension (Days)</center>
                                    </th>
                                    <th width="%">
                                        <center>Edu.Inter (PV)(Days)</center>
                                    </th>
                                    <th width="%">
                                        <center>First Aid (Days)</center>
                                    </th>
                                    <th width="%">
                                        <center>Maternity (Day)</center>
                                    </th>
                                    <th width="%">
                                        <center>Military (Day)</center>
                                    </th>
                                    <th width="%">
                                        <center>Attendance(%)</center>
                                    </th>
                                    <th width="%">
                                        <center>Special pregnant (Day)</center>
                                    </th>
                                    <th width="%">
                                        <center>Attendance who take special leave in performance avalution cycle (%)</center>
                                    </th>
                                </tr>
                            </thead>
                            <!-- thead -->

                            <tbody id="">
                                <tr>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_late_return; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_absent; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_sick; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_business; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_suspension; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_edu_Inter; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_first_aid; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_maternity; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_military; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_attendance; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_special_pregnant; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo $data_Atd->wad_special_leave; ?>
                                        </center>
                                    </td>
                                </tr>
                            </tbody>
                            <!-- tbody  -->
                        </table>
                        <!-- table  -->
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                    <?php if($_SESSION['UsRole'] == 3){ ?>
                            <a href="<?php echo base_url() ?>ev_report/Evs_Report/report_work_attendance_employee/<?php echo $dept_info->Department_id; ?>">
                                <button class="btn btn-inverse">BACK</button>
                            </a>
                            <?php }
                            // if 
                            else if($_SESSION['UsRole'] == 2){ ?>
                            <a href="<?php echo base_url() ?>ev_report/Evs_Report/report_work_attendance_employee_group">
                                <button class="btn btn-inverse">BACK</button>
                            </a>
                            <?php } ?>
                        <!-- cancel to back to main  -->
                    </div>
                    <!-- col-md-6 -->
                </div>
                <!-- row -->

            </div>
            <!-- body -->
        </div>
        <!-- panel-indigo -->
        <hr>
        <br>
    </div>
    <!-- col-12 -->
</div>
<!-- row -->