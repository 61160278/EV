<?php
/*
* v_form_insert
* Form Management of Top management by position
* @input  -  
* @output -
* @author 	Tanadon Tangjaimongkhon
* @Create Date 2563-09-20
*/
/*
* v_form_insert  
* Form Management of Top management by position
* @input  -  
* @output -
* @author 	Piyasak Srijan
* @Update Date 2563-10-03
*/
/*
* v_form_insert  
* Form Management of Top management by position
* @input  -  
* @output -
* @author 	Tanadon Tangjaimongkhon
* @Update Date 2563-10-05
*/
?>


<style>
#t01 th {

    background-color: #2c2c2c;
    color: white;

}

#panel_th_topManage {
    background-color: #c1432e;
}
</style>




<!-- Start Page Content -->
<div class="container-fluid">

    <div class="col-lg-12">
        <!-- Start Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3" id="panel_th_topManage">
                <div class="col-xl-12">
                    <h1 class="m-0 font-weight-bold text-primary">
                        <a href="<?php echo base_url(); ?>/Evs_form/main_form">
                            <i class="fa fa-chevron-circle-left text-white"></i>
                        </a>
                        <i class="fa fa-book text-white"></i>
                        <font color="white">&nbsp;Manage form</font>
                    </h1>
                </div>
                <!-- style="font-size:40px;color:white" -->
            </div>
            <!-- card-header -->

            <div class="card-body">

                <div class="row">

                    <!-- Start Widgets -->
                    <div class="col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat">
                                            <?php 
                                            //start foreach
                                            foreach ($info_position->result() as $row) {
                                                //start if
                                                if($position_level==$row->psl_id){
                                                    $position_level_name = $row->psl_position_level;
                                                    echo $row->psl_position_level; 
                                                    break;
                                                }
                                                //end if
                                            } 
                                            //end foreach
                                            ?>
                                        </div>
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">
                                                    <?php 
                                                    $count_pos = 0;
                                                    // count of position in level

                                                    // start foreach
                                                    foreach ($info_position->result() as $row) {
                                                        $count_pos++;
                                                    } 
                                                    // end foreach
                                                    echo $count_pos;
                                                    // display count of position
                                                    ?>
                                                </span>
                                            </div>
                                            <!-- count -->

                                            <div class="stat-heading">Positions</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <div class="stat">Fiscal year :
                                            <?php $row_year = $info_pattern_year->row();  echo $row_year->pay_year; ?>
                                        </div>
                                        <div class="text-left dib">
                                            <br>

                                            <!-- start patten grade -->
                                            <div class="stat">Grade pattern :
                                                <?php
                                                
                                                echo $row_year->pay_pattern;
                                                // display Grade pattern

                                                ?>
                                            </div>
                                            <!--End  pattern grade -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widgets  -->
                </div>

    <?php 
            $check_condition = 0; //check for if $row->ps_pay_id == $row_year->pay_id
            $count_evaluation = 0;
            $count_deactivate = 1;
            $count_obj = 0;
            $num = 0;
            $num_activate = 0;
    
    //start if
    
        foreach($info_position->result() as $row){ 
            if($row->ps_status_set_form_pe == 2 && $row->ps_status_set_form_ce == 2){
                $count_evaluation++;
                $count_obj++;
            } 
            //    if 
            else if($row->ps_status_form_pe == 0 && $row->ps_status_form_ce == 0){
                if($num==0){
                $count_deactivate--;
                }
                //    if 
                $count_deactivate++;
                $num++;

            }
            //    else if 
            if( $row->ps_status_form_pe == 1 || $row->ps_status_form_ce == 1 ){
                $num_activate++;
            }
            //    if 
        }
        // foreach

        $progess_percent = (($count_evaluation / $count_pos) * 100);
        $percent = 100 / $count_deactivate;
        $progess_percent += $percent;
        $count_progess_percent = ($count_pos - $count_deactivate);
                        
        $sum_percent = 0;
        if($count_deactivate > 1){
            // start if
            foreach($info_position->result() as $row){ 
                if($row->ps_status_set_form_pe == 2 && $row->ps_status_set_form_ce == 2){
                $sum_percent += 100/$count_progess_percent;
                }
                // if 
            }
            // end foreach
        }
        // else if 
        else if($count_deactivate == 1){
            $sum_percent = ($count_evaluation/$num_activate)*100;
        }
        // else if 
    
?>
                <!-- Start card -->
                <div class="card">
                    <!-- start card body -->
                    <div class="card-body">
                        <div class="progress-box progress-1">
                            <h3 class="por-title">Status of Managed forms</h3>
                            <div class="por-txt">
                                <h4>Activate :
                                    <?php echo $count_evaluation . " to " . ($num_activate)." (" . number_format($sum_percent,2) . "% to 100%" . ") "?>
                                    </4>
                            </div>
                            <!-- por-text  -->
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: <?php echo $sum_percent; ?>%;"
                                    aria-valuenow="<?php echo $sum_percent; ?>" aria-valuemin="0" aria-valuemax="100">
                                    <?php echo number_format($sum_percent,2) . " %" ; ?></div>
                            </div>
                            <!-- pd md-2  -->
                        </div>
                        <!-- progress-box -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card  -->


                <input type="hidden" id="year" name="year" value="<?php echo $row_year->pay_id; ?>">
                <!-- Start Table -->
                <table id="t01" border="1" class="table table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>
                                <center>#</center>
                            </th>
                            <th width="35%">
                                <center>Positions Title</center>
                            </th>
                            <th width="10%">
                                <center>Tools</center>
                            </th>
                            <th width="15%">
                                <center>Form</center>
                            </th>
                            <th>
                                <center>Ratio</center>
                            </th>
                            <th>
                                <center>Attendance</center>
                            </th>
                            <th>
                                <center>Status</center>
                            </th>
                            <th>
                                <center>Manage</center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        //start foreach output data table
                        
                        $index = 0;     // number of position title 
                        foreach($info_position->result() as $row){     
                        $index++;
                            //start if
                            if($row->ps_pay_id == $row_year->pay_id){
                                
                        ?>
                        <tr>
                            <td rowspan="2" style="vertical-align : middle;text-align:center;">
                                <center>
                                    <font color="black"><?php echo $index; ?>
                                        <!-- Number position title -->
                                </center>
                                </font>
                            </td>
                            <td rowspan="2" style="vertical-align : middle;text-align:left;">
                                <font color="black"><?php echo $row->Position_name; ?></font>
                            </td>
                            <td valign="center" style="vertical-align : middle;text-align:left;">
                                <center>
                                    <font color="black"> PE
                                        <!-- Tool PE evaluation -->
                                </center>
                                </font>
                            </td>
                            <td valign="center" style="vertical-align : middle;text-align:left;">
                                <font color="black">
                                    <center>
                                        <?php //start if 
                                                if($row->ps_form_pe != NULL) echo $row->ps_form_pe; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Form name of tool PE evaluation  -->
                                    </center>
                                </font>
                            </td>
                            <td valign="center" style="vertical-align : middle;text-align:left;">
                                <font color="black">
                                    <center>
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_pe != NULL) echo $row->ps_ratio_pe; else echo "-";
                                                // end if
                                            ?>
                                        <!-- Ratio of tool PE evaluation  -->
                                    </center>
                                </font>
                            </td>
                            <td valign="center" style="vertical-align : middle;text-align:left;">
                                <font color="black">
                                    <center>
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_atd_pe != NULL) echo $row->ps_ratio_atd_pe; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Attendance of tool PE evaluation  -->
                                    </center>
                                </font>
                            </td>
                            <?php 
                                if($row->ps_status_set_form_pe == 2 && $row->ps_status_set_form_ce == 2){ ?>
                            <td rowspan="2" valign="center" style="vertical-align : middle;text-align:center;">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td rowspan="2" style="vertical-align : middle;text-align:left;">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $row->Position_ID; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="<?php echo "manage_".$index; ?>" class="btn btn-warning"
                                            name="Position_ID[<?php echo $index; ?>]" value="<?php echo $row->Position_ID; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                    <br><br>
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_form/preview_form/<?php echo $row->Position_ID; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="<?php echo "perview_".$index; ?>" class="btn btn-info"
                                            name="Position_ID[<?php echo $index; ?>]" value="<?php echo $row->Position_ID; ?>">
                                            <i class="fa fa-bar-chart-o"></i> Preview
                                        </button> <!-- Edit button manage form evaluation  -->
                                </p>
                            </td>
                            <?php }
                                else if( $row->ps_status_form_pe == 1 || $row->ps_status_form_ce == 1 ){
                                    ?>
                            <!-- start if-else -->
                            <td rowspan="2" valign="center" style="vertical-align : middle;text-align:center;">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td rowspan="2" valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $row->Position_ID; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="<?php echo "manage_".$index; ?>" class="btn btn-success"
                                            name="Position_ID[<?php echo $index; ?>]" value="<?php echo $row->Position_ID; ?>">
                                            <i class="fa fa-file-text-o"></i> Activate
                                        </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php }else if($row->ps_status_form_pe == 0 && $row->ps_status_form_ce == 0){ ?>
                            <td rowspan="2" valign="center" style="vertical-align : middle;text-align:center;">
                                <p id="manage" align="center">
                                    <font color="#C0C0C0"> No assessment </font>
                                    <!-- status is No assessment form of tool evaluation  -->
                                </p>
                            </td>
                            <td rowspan="2" valign="center">
                                <p align="center">
                                    <button id="<?php echo "manage_".$index; ?>" class="btn btn-success"
                                        name="Position_ID[<?php echo $index; ?>]" value="<?php echo $row->Position_ID; ?>"
                                        disabled><i class="fa fa-file-text-o"></i> Deactivate
                                    </button> <!-- disable button manage form evaluation  -->
                                </p>
                            </td>

                            <?php }  ?>
                            <!-- end if-else-->
                        </tr>
                        <tr>
                            <td valign="center" style="vertical-align : middle;text-align:left;">
                                <center>
                                    <font color="black"> CE </font> <!-- Tool PE evaluation -->
                                </center>
                            </td>
                            <td valign="center" style="vertical-align : middle;text-align:left;">
                                <font color="black">
                                    <center>
                                        <?php 
                                                //start if
                                                if($row->ps_form_ce != NULL) echo $row->ps_form_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Form name of tool PE evaluation  -->
                                    </center>
                                </font>
                            </td>
                            <td valign="center" style="vertical-align : middle;text-align:left;">
                                <font color="black">
                                    <center>
                                        <?php
                                                //start if 
                                                if($row->ps_ratio_ce != NULL) echo $row->ps_ratio_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Ratio of tool PE evaluation  -->
                                    </center>
                                </font>
                            </td>
                            <td valign="center" style="vertical-align : middle;text-align:left;">
                                <font color="black">
                                    <center>
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_atd_ce != NULL) echo $row->ps_ratio_atd_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Attendance of tool PE evaluation  -->
                                    </center>
                                </font>
                            </td>
                        </tr>
                        <?php           
                         $check_condition = 1;
                            }
                            //end if
                            }
                            // end foreach data table 
                        ?>
                        <?php 
                            if($check_condition == 0){
                            ?>
                        <tr>
                            <td valign="center" colspan="8">
                                <center>
                                    No data, please use Manage Position menu.
                                </center>
                            </td>
                        </tr>
                        <?php    
                            }
                        ?>

                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- End table  -->

                <!-- Start Back to main position  -->
                <div class="row">
                    <div class="col-sm-12" align="right">
                        <a href="<?php echo base_url(); ?>/Evs_form/main_form">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>
                        <!-- End Back to main position  -->

                    </div>
                </div>
                <hr>
                <!-- Start Description -->
                <div>
                    <h4 class="text">Description</h4><br>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Status : Status perform manage</h5><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <p>Managed : Perform manage finished</p>
                    </div>
                    <div class="col-sm-4">
                        <p>No manage : Perform manage is not finished</p>
                    </div>
                    <div class="col-sm-4">
                        <p>No assessment : No assessment manage form</p>
                    </div>
                    <div class="col-sm-4">
                        <p><button class="btn btn-success"><i class="fa fa-file-text-o"></i> Activate </button> :
                            Perform manage form</p>
                    </div>
                    <div class="col-sm-4">
                        <p><button class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button> : Edit manage form
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <p><button class="btn btn-success" disabled><i class="fa fa-file-text-o"></i> Deactivate
                            </button> : No assessment manage form</p>
                    </div>


                </div>
                <!-- Status  -->
                <hr>

                <div class="row">
                    <div class="col-sm-4">
                        <h5>Evaluation Tool :</h5><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <p>PE : Performance Evaluation </p>
                        <p>CE : Compentency Evaluation </p>
                        <p>WA : Work Attendance </p>
                    </div>
                </div>
                <!-- Tools -->

                <hr>

                <!-- End Description -->

            </div>
        </div>

        <br>
    </div>


</div>
<!-- End Page Content -->