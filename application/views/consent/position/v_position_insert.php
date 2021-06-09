<?php
/*
* v_position_insert
* Display Management level
* @input  -
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/  
/*
* v_position_insert
* Display Management level
* @input  - 
* @output -
* @author Kunanya Singmee
* @Update Date 2563-09-23
*/
/*
* v_position_insert
* Display Management level
* @input  position level  
* @output data form for position
* @author Jakkarin Pimpaeng
* @Update Date 2563-10-01
*/  
/*
* v_position_insert
* Display Management level
* @input  position level  
* @output data form for position
* @author Piyasak Srijan
* @Update Date 2563-10-02
*/ 
/*
* v_position_insert
* Display Management level
* @input  position level  
* @output data form for position
* @author Tanadon Tangjaimongkhon 
* @Update Date 2563-10-05
*/ 
?>
<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript">
    /*
     * show_attendance_pe
     * Display Attendance PE
     * @input  score attendance PE
     * @output show attendance PE
     * @author Tanadon Tangjaimongkhon 
     * @Update Date 2563-10-05
     */
    function show_attendance_pe(id) {
        var score_all = document.getElementById(id).value; // score all is score attendance PE
        position_atd_pe = id.substring(12); //position table
        var score_atd; //save calculate score
        score_atd = 100 - score_all; //calculate score
        // Start if 
        //Attendance over 100% alert Over 100% else Add Attendance
        if (score_all > 100) {
            document.getElementById('adt_PE_' + position_atd_pe).innerHTML = "Over 100%";

        } else {
            document.getElementById('adt_PE_' + position_atd_pe).innerHTML = score_atd + "%";
        }
        // End if 
    } //show_attendance_pe

    /*
     * show_attendance_ce
     * Display Attendance CE
     * @input  score attendance CE
     * @output show attendance CE
     * @author Tanadon Tangjaimongkhon 
     * @Update Date 2563-10-05
     */
    function show_attendance_ce(id) {
        var score_all = document.getElementById(id).value; // // score all is score attendance CE
        position_atd_ce = id.substring(12); //position table
        var score_atd; //save calculate score
        score_atd = 100 - score_all; //calculate score
        // Start if 
        //if Attendance over 100% alert Over 100% else Add Attendance
        if (score_all > 100) {
            document.getElementById('adt_CE_' + position_atd_ce).innerHTML = "Over 100%";

        } else {
            document.getElementById('adt_CE_' + position_atd_ce).innerHTML = score_atd + "%";
        }
        // End if 
    } //show_attendance_ce
    </script>

    <style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #24AC6E;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;

    }

    #t01 th {
        background-color: #2c2c2c;
        color: #ffffff;
        text-align: center;

    }

    #t01 td {
        background-color: #f8f8f8;
        color: #2c2c2c;

    }

    #panel_th_topManage {
        background-color: #c1432e;
    }
    </style>
</head>

<body>
    <!-- Start Page Content -->
    <div class="container-fluid">
        <div class="col-lg-12">
            <!-- Start Card Header -->
            <div class="card shadow mb-4">
                <div class="card-header py-3" id="panel_th_topManage">
                    <div class="col-xl-12">
                        <h1 class="m-0 font-weight-bold text-primary">
                            <a href="<?php echo base_url(); ?>/Evs_position/main_position">
                                <i class="fa fa-chevron-circle-left text-white"></i>
                            </a>
                            <i class="fa fa-user text-white"></i>
                            <font color="white">Manage position</font>
                        </h1>
                    </div>
                </div>
                <!-- End Card Header -->
                <!-- Start Card Body -->
                <div class="card-body">
                    <div class="row">
                        <!-- Start Widgets -->
                        <div class="col-lg-6 col-md-8">
                            <!-- Start Card  -->
                            <div class="card">
                                <!-- Start Card Body -->
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="stat">
                                                <?php 
                                            //Start foreach
                                             foreach ($pos_lv->result() as $row) {
                                                    //Start if
                                                    if($row->psl_id == $pls_level_from){ echo $row->psl_position_level;}
                                                    //End if
                                                   } 
                                            //End foreach
                                            ?>
                                                <!-- display Level  -->
                                            </div>
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count">
                                                        <?php 
                                            $count_pos = 0;
                                            // count of position in level
                                            // start foreach
                                            foreach ($info_pos->result() as $row) {
                                                $count_pos++;
                                            } 
                                            // end foreach                                           
                                            echo $count_pos;
                                            // display count of position
                                            ?>
                                                    </span></div>
                                                <div class="stat-heading">Positions</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Card Body -->
                            </div>
                        </div>
                        <!-- End Card -->
                        <!-- End Widgets  -->

                        <!-- Start Widgets -->
                        <div class="col-lg-6 col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="stat-content">

                                            <div class="stat">
                                                <?php 
                                            
                                            
                                            $row = $patt_year->row(); //set year

                                            if($row != NULL){
                                                $year = "Fiscal year : ".$row->pay_year;
                                                $pattern = "Grade pattern : ".$row->pay_pattern;
                                            }
                                            // if show 
                                            else {
                                                $year = "Please setting grade patterns and fiscal year ";
                                                $pattern = "";
                                            }

                                            echo $year;
                                            // display Fiscal year

                                        ?>

                                            </div>
                                            <div class="text-left dib">
                                                <br>

                                                <!-- start patten grade -->
                                                <div class="stat">
                                                    <?php 
                                                    echo $pattern;
                                                    // display Grade pattern
                                                ?>
                                                </div>
                                                <!--End  pattern grade -->
                                            </div>
                                            <!-- text-left  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widgets  -->
                    </div>
                    <!-- Start table show position information -->
                    <form method="post"
                        action="<?php echo base_url();?>/Evs_position/position_insert/<?php echo $pls_level_from //position level ?>">
                        <table id="t01" border="1" class="table" width="100%">
                            <thead>
                                <tr>
                                    <th rowspan="1">#</th>
                                    <th width="28%">Positions Title</th>
                                    <th width="10%">Status</th>
                                    <th>Tools</th>
                                    <th width="20%">Form</th>
                                    <th width="15%">ratio (%)</th>
                                    <th width="15%">Attendance</th>
                                </tr>
                            </thead>
                            <!--Start tbody  -->
                            <tbody>
                                <!-- Start form insert information -->

                                <?php
                            $index = 1; //index for table
                            //Start foreach
                            foreach ($info_pos->result() as $row) {
                            $arr_pos_id[] = $row->Position_ID; //save position all
                            ?><input type="input" name="arr_pos_id[]" value="<?php echo $row->Position_ID; ?>" hidden>
                                <!-- save postion -->
                                <tr>
                                    <td rowspan="2" align="center"><?php echo $index; ?></td>
                                    <td rowspan="2"><?php echo $row->Position_name; ?></td>
                                    <!-- Start Checkbox -->
                                    <td align="center">
                                        <label class="switch">
                                            <input type="checkbox" id="<?php echo "statusPE".$index; ?>"
                                                value="<?php echo $row->Position_ID; ?>" name="arr_checked_PE[] "
                                                checked>
                                            <span class="slider round">
                                            </span>
                                        </label>
                                    </td>
                                    <!-- End Checkbox -->
                                    <!-- Start PE Tool -->
                                    <td>
                                        <font color="black">
                                            <center>PE</center>
                                        </font>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <!-- Start select Form -->
                                            <div class="col-sm-12">
                                                <select class="form-control" id="<?php echo "formPE_".$index; ?>"
                                                    name="arr_formPE[]">
                                                    <option value="">Select Form</option>
                                                    <option value="G&O">G&O</option>
                                                    <option value="MBO">MBO</option>
                                                    <option value="MHRD">MHRD</option>
                                                </select>
                                            </div>
                                            <!-- End select Form -->
                                        </div>
                                    </td>
                                    <!-- Start Attendance PE -->
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" placeholder="Ex.50"
                                                    name="arr_form_adt_PE[]" id="<?php echo "form_adt_PE_".$index; ?>"
                                                    onchange="show_attendance_pe(id)" min="0" max="100" required>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p id="<?php echo "adt_PE_".$index; ?>" align="center">-</p>
                                    </td>
                                    <!-- End Attendance PE -->
                                    <!-- End PE Tool -->
                                </tr>
                                <tr>
                                    <!-- Start Checkbox -->
                                    <td align="center">
                                        <label class="switch">
                                            <input type="checkbox" id="<?php echo "statusCE".$index; ?>"
                                                value="<?php echo $row->Position_ID; ?>" name="arr_checked_CE[]"
                                                checked>
                                            <span class="slider round">
                                            </span>
                                        </label>
                                    </td>
                                    <!-- End Checkbox -->
                                    <!-- Start CE Tool -->
                                    <td>
                                        <font color="black">
                                            <center>CE</center>
                                        </font>
                                    </td>
                                    <td>
                                        <!-- Start Select Form -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <select class="form-control" id="<?php echo "formCE_".$index; ?>"
                                                    name="arr_formCE[]">
                                                    <option value="">Select Form</option>
                                                    <option value="GCM">GCM</option>
                                                    <option value="ACM">ACM</option>
                                                    <option value="Attitude & Behavior">Attitude & Behavior</option>
                                                    <option value="ACM & Attitude">ACM & Attitude</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- End Select Form -->
                                    </td>
                                    <!-- Start Attendance CE -->
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" placeholder="Ex.50"
                                                    name="arr_form_adt_CE[]" id="<?php echo "form_adt_CE_".$index; ?>"
                                                    onchange="show_attendance_ce(id)" min="0" max="100" required>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p id="<?php echo "adt_CE_".$index; ?>" align="center">-</p>
                                    </td>
                                    <!-- End Attendance CE -->
                                    <!-- Start CE Tool -->
                                </tr>
                                <?php    
                            $index++; //update index
                            } //End foreach ?>
                                <br>
                                <!-- End form insert information -->
                            </tbody>
                            <!--End tbody  -->
                        </table>
                        <!-- End table show position  -->

                        <!-- Start Button -->
                        <div class="row">
                            <div class="col-sm-12" align="right">
                                <a href="<?php echo base_url(); ?>/Evs_position/main_position">
                                    <button type="button" class="btn btn-secondary">Back</button>
                                </a>
                                <!-- Back to main position  -->
                                <button type="submit" class="btn btn-success" id="save">Save</button>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                    <!-- End table show position information -->
                    <br><br>
                    <hr>

                    <!-- Start Description -->
                    <div>
                        <h4 class="text">Description</h4><br>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>Status : Form Status</h5><br>
                        </div>
                        <div class="col-sm-6">
                            <h5>Tools : Evaluation tools</h5><br>
                        </div>
                    </div>
                    <!-- Start Status  -->
                    <div class="row">
                        <div class="col-sm-2">
                            <p>Enable form</p>
                            <label class="switch"><input type="checkbox" checked disabled>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <p>Disable form</p>
                            <label class="switch"><input type="checkbox" unchecked disabled>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4">
                            <p>PE : Performance Evaluation</p>
                            <p>CE : Compentency Evaluation</p>
                        </div>
                    </div>
                    <!-- End Status  -->
                    <hr>
                    <!-- End Description -->
                </div>
                <!-- End Card Body -->
            </div>
            <br>
        </div>
    </div>
    <!-- End Page Content -->
    <script>
    //button switch On-Off CE Tool
    $('tr td:first-child input[type="checkbox"]').click(function() {
        //enable/disable all except checkboxes, based on the row is checked or not
        $(this).closest('tr').find(":input:not(:first)").attr('disabled', !this.checked);

    });
    //button switch On-Off PE Tool
    $('tr td:not(:first-child) input[type="checkbox"]').click(function() {
        //enable/disable all except checkboxes, based on the row is checked or not
        $(this).closest('tr').find(":input:not(:first)").attr('disabled', !this.checked);

    });
    </script>
</body>

</html>