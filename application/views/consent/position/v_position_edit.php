<?php
/*
* v_position_edit
* Display edit Management level
* @input  -  
* @output -
* @author Jakkarin Pimpaeng
* @Create Date 2563-10-01
*/   
/*
* v_position_edit
* Display edit Management level
* @input  position level 
* @output data form for position
* @author Kunanya Singmee
* @Create Date 2563-10-02
*/ 
/*
* v_position_edit
* Display edit Management level
* @input  position level 
* @output data form for position
* @author Jakkarin Pimpaeng
* @Create Date 2563-10-05
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
    }
    /*
     * show_attendance_ce
     * Display Attendance CE
     * @input  score attendance CE
     * @output show attendance CE
     * @author Tanadon Tangjaimongkhon 
     * @Update Date 2563-10-05
     */
    function show_attendance_ce(id) {
        var score_all = document.getElementById(id).value; // score all is score attendance CE
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
    }
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
                    <!-- End Card Header -->
                </div>
                <!-- Start Card Body -->
                <div class="card-body">
                    <div class="row">
                        <!-- Start Widgets -->
                        <div class="col-lg-6 col-md-8">
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
                                                if($row->position_level_id == $pls_level_from){ echo $row->psl_position_level;
                                                }//End if
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
                                                $pattern = "&nbsp;";
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

                    <form method="post" action="<?php if($data_pay_save == 0) {echo base_url();?>/Evs_position/position_edit/<?php echo $pls_level_from;} 
                        else {echo base_url();?>/Evs_position/position_insert/<?php echo $pls_level_from;} ?>">
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
                            // start foreach
                            foreach ($ps_pos->result() as $row) {
                            $arr_pos_id[] = $row->Position_ID; //save position all
                          
                            ?><input type="input" name="arr_pos_id[]" value="<?php echo $row->Position_ID; ?>" hidden>
                                <!-- save postion -->
                                <tr>
                                    <td rowspan="2" align="center"><?php echo $index; ?></td>
                                    <td rowspan="2"><?php echo $row->Position_name; ?></td>
                                    <td align="center">
                                        <label class="switch">
                                            <?php  
                                             $text_selected_check_pe = ''; //check status form pe
                                             // start if
                                             if($row->ps_status_form_pe == 1 ){$text_selected_check_pe = 'checked';}
                                             // End if
                                             // start else
                                             else{$text_selected_check_pe = 'unchecked';}
                                            //End else
                                              ?>
                                            <input type="checkbox" id="<?php echo "statusPE".$index; ?>"
                                                value="<?php echo $row->Position_ID; ?>" name="arr_checked_PE[] "
                                                <?php echo $text_selected_check_pe; ?>>
                                            <?php
                                    
                            ?>
                                            <span class="slider round">
                                            </span>
                                        </label>
                                    </td>
                                    <!-- Start PE Tool -->
                                    <td>
                                        <font color="black">
                                            <center>PE</center>
                                        </font>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <!-- Start select  -->
                                            <?php  
                                             $text_selected_G_and_O = ''; //check selected form G and O
                                             $text_selected_MBO = '';     //check selected form MBO
                                             $text_selected_MHRD = '';    //check selected form MHRD
                                             //Star if G&O
                                             if($row->ps_form_pe =="G&O" ){$text_selected_G_and_O = 'selected';}
                                             //End if G&O
                                             //Star if MBO
                                             if($row->ps_form_pe =="MBO" ){$text_selected_MBO = 'selected';}
                                             //End if MBO
                                             //Star if MHRD
                                             if($row->ps_form_pe =="MHRD" ){$text_selected_MHRD = 'selected';}
                                             //End if MHRD
                            
                                                  $text_dropdown_check_pe = ''; //check status form pe
                                                  //Star if 
                                                  if($row->ps_status_form_pe == 0 ){$text_dropdown_check_pe = 'disabled';}
                                                  //End if 
                                              ?>
                                            <div class="col-sm-12">
                                                <select class="form-control" id="<?php echo "formPE_".$index; ?>"
                                                    name="arr_formPE[]" <?php echo $text_dropdown_check_pe;?>>
                                                    <option value="">Select Form</option>
                                                    <option value="G&O" <?php echo $text_selected_G_and_O; ?>>G&O
                                                    </option>
                                                    <option value="MBO" <?php echo $text_selected_MBO; ?>>MBO</option>
                                                    <option value="MHRD" <?php echo $text_selected_MHRD; ?>>MHRD
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- End select  -->
                                        </div>
                                    </td>
                                    <!-- Start Attendance PE -->
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" placeholder="Ex.50"
                                                    name="arr_form_adt_PE[]" id="<?php echo "form_adt_PE_".$index; ?>"
                                                    onchange="show_attendance_pe(id)"
                                                    value="<?php echo $row->ps_ratio_pe;?>"
                                                    <?php echo $text_dropdown_check_pe;?> min="0" max="100" required>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p id="<?php echo "adt_PE_".$index; ?>" align="center">
                                            <?php echo $row->ps_ratio_atd_pe;?>%</p>
                                    </td>
                                    <!-- End Attendance PE -->
                                    <!-- End PE Tool -->
                                </tr>
                                <tr>
                                    <td align="center">
                                        <label class="switch">
                                            <?php  
                                             $text_selected_check_ce = ''; //check status form ce
                                             //Start if
                                             if($row->ps_status_form_ce == 1 ){$text_selected_check_ce = 'checked';}
                                             //End if
                                             //Start else
                                             else{$text_selected_check_ce = 'unchecked';}
                                             //End else
                                              ?>
                                            <input type="checkbox" id="<?php echo "statusCE".$index; ?>"
                                                value="<?php echo $row->Position_ID; ?>" name="arr_checked_CE[]"
                                                <?php echo $text_selected_check_ce; ?>>
                                            <span class="slider round">
                                            </span>
                                        </label>
                                    </td>
                                    <!-- Start CE Tool -->
                                    <td>
                                        <font color="black">
                                            <center>CE</center>
                                        </font>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php  
                                             $text_selected_GCM = ''; //check selected form GCM
                                             $text_selected_ACM = ''; //check selected form ACM
                                             $text_selected_Attitude_and_Behavior = ''; //check selected form Attitude and Behavior
                                             $text_selected_ACM_and_Attitude = '';      //check selected form ACM and Attitude
                                              //Start if GCM
                                             if($row->ps_form_ce =="GCM" ){$text_selected_GCM = 'selected';}
                                             //End if GCM
                                              //Start if ACM
                                             if($row->ps_form_ce =="ACM" ){$text_selected_ACM = 'selected';}
                                             //End if ACM
                                              //Start if Attitude & Behavior
                                             if($row->ps_form_ce =="Attitude & Behavior" ){$text_selected_Attitude_and_Behavior = 'selected';}
                                             //End if Attitude & Behavior
                                              //Start if ACM & Attitude
                                             if($row->ps_form_ce =="ACM & Attitude" ){$text_selected_ACM_and_Attitude = 'selected';}
                                             //End if ACM & Attitude
                                                  $text_dropdown_check_ce = '';  //check status form ce
                                                  //Start if
                                                  if($row->ps_status_form_ce == 0 ){$text_dropdown_check_ce = 'disabled';}
                                                  //End if
                                              ?>
                                                <select class="form-control" id="<?php echo "formCE_".$index; ?> "
                                                    <?php echo $text_dropdown_check_ce?> name="arr_formCE[]">
                                                    <option value="">Select Form</option>
                                                    <option value="GCM" <?php echo $text_selected_GCM; ?>>GCM</option>
                                                    <option value="ACM" <?php echo $text_selected_ACM; ?>>ACM</option>
                                                    <option value="Attitude & Behavior"
                                                        <?php echo $text_selected_Attitude_and_Behavior; ?>>Attitude &
                                                        Behavior</option>
                                                    <option value="ACM & Attitude"
                                                        <?php echo $text_selected_ACM_and_Attitude; ?>>ACM & Attitude
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Start Attendance CE -->
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" placeholder="Ex.50"
                                                    name="arr_form_adt_CE[]" id="<?php echo "form_adt_CE_".$index; ?>"
                                                    onchange="show_attendance_ce(id)"
                                                    value="<?php echo $row->ps_ratio_ce;?>"
                                                    <?php echo $text_dropdown_check_ce;?> min="0" max="100" required>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- End Attendance CE -->
                                    <td>
                                        <p id="<?php echo "adt_CE_".$index; ?>" align="center">
                                            <?php echo $row->ps_ratio_atd_ce;?>%</p>
                                    </td>
                                    <!-- End CE Tool -->
                                </tr>
                                <?php  $index++; //update index
                                 } // foreach ?>
                                <br>

                                <!-- End form insert information -->
                            </tbody>
                            <!--End tbody  -->
                        </table>

                        <!-- End table show position -->
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
                    <!-- Start Status -->
                    <div class="row">
                        <div class="col-sm-2">
                            <p>Enable form</p>
                            <label class="switch"><input type="checkbox" disabled checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <p>Disable form</p>
                            <label class="switch"><input type="checkbox" disabled unchecked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4">
                            <p>PE : Performance Evaluation</p>
                            <p>CE : Compentency Evaluation</p>
                        </div>
                    </div>
                    <!-- End Status -->
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
    $('tr td:first-child input[type="checkbox"]').change(function() {
        //enable/disable all except checkboxes, based on the row is checked or not
        $(this).closest('tr').find(":input:not(:first)").attr('disabled', !this.checked);
    });
    //button switch On-Off PE Tool
    $('tr td:not(:first-child) input[type="checkbox"]').change(function() {
        //enable/disable all except checkboxes, based on the row is checked or not
        $(this).closest('tr').find(":input:not(:first)").attr('disabled', !this.checked);
    });
    </script>
</body>

</html>