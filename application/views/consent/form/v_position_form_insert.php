<?php
/*
* v_form_position_insert
* Display form by position 
* @input  -  
* @output -
* @author Tanadon Tangjaimongkhon
* @Create Date 2563-09-28
*/ 
?>

<input type="hidden" id="value_pos_id" name="value_pos_id" value="<?php echo $info_pos_id; ?>">
 <input type="hidden" id="year" name="year" value="<?php echo $year_id; ?>">
<script>
var value_pos_id = document.getElementById("value_pos_id").value; // position id
 var value_year_id = document.getElementById("year").value; // year now ID
$(document).ready(function() {
  window.location = "<?php echo base_url(); ?>/Evs_form/form_position/" + value_pos_id + "/" + value_year_id;
}

</script>

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
                        <a
                            href="<?php echo base_url(); ?>/Evs_form/manage_form/<?php $row = $info_pos->row(); echo $row->psl_id; ?>">
                            <i class="fa fa-chevron-circle-left text-white"></i>
                        </a>
                        <i class="fa fa-book text-white"></i>
                        <font color="white">&nbsp;Manage form</font>
                    </h1>
                </div>
                <!-- style="font-size:40px;color:white" -->
            </div>
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
                                            $row = $info_pos->row();
                                            echo $row->psl_position_level;
                                            // display level of position
                                        ?>
                                        </div>
                                        <div class="text-left dib">
                                            <div class="stat-text"><span>
                                                    <?php 
                                                    $position_name = $row->Position_name;
                                                    echo $row->Position_name;
                                                    // display name of position

                                                    ?>

                                                </span></div>
                                            <div class="stat-heading">Position</div>
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
                        $count_evaluation = 0;
                        $count_obj = 0;
                        $progess_percent = 0;
                        foreach($info_pos_form->result() as $row){


                            if($row->ps_status_set_form_pe == 2){
                                $progess_percent += 33.34;

                                if($row->ps_form_ce == "ACM & Attitude"){
                                    
                                    if(count($info_ability_form) == 0){
                                        $progess_percent += 0;
                                    }
                                    if(count($info_attitude_form) == 0){
                                        $progess_percent += 0;
                                    }
                                    if(count($info_ability_form) > 0){
                                        $progess_percent += 33.33;
                                    }
                                    if(count($info_attitude_form) > 0){
                                        $progess_percent += 33.33;
                                    }
                                    
        
                                }
                                else{
                                    $progess_percent = 0;
                                    if($row->ps_status_set_form_pe == 2){
                                        $progess_percent += 50;
                                    }
                                    if($row->ps_status_set_form_ce == 2){
                                        $progess_percent += 50;
                                    } 
                                }
                            }    
                            else if($row->ps_status_set_form_ce == 2){
                                $progess_percent += 33.34;

                                if($row->ps_form_ce == "ACM & Attitude"){
                                    
                                    if(count($info_ability_form) == 0){
                                        $progess_percent += 0;
                                    }
                                    if(count($info_attitude_form) == 0){
                                        $progess_percent += 0;
                                    }
                                    if(count($info_ability_form) > 0){
                                        $progess_percent += 33.33;
                                    }
                                    if(count($info_attitude_form) > 0){
                                        $progess_percent += 33.33;
                                    }
                                    
        
                                }
                                else{
                                    $progess_percent = 0;
                                    if($row->ps_status_set_form_pe == 2){
                                        $progess_percent += 50;
                                    }
                                    if($row->ps_status_set_form_ce == 2){
                                        $progess_percent += 50;
                                    }
                                }
                            }    
                            
                        }
                        // echo base_url() . "/Evs_form/form_position/" . $info_pos_id . "/" . $row_year->pay_id.""."<br>";
                    ?>

                <!-- Start Card -->            
                <div class="card">
                    <div class="card-body">
                        <div class="progress-box progress-1">
                            <h4 class="por-title">Status of Evaluation by <?php echo $position_name; ?> Position</h4>
                            <div class="por-txt">
                                <h4>
                                    <?php echo $position_name ." Position (". $progess_percent . "% to 100%" . ") "?>
                                </h4>
                            </div>
                            <div class="progress mb-2" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: <?php echo $progess_percent; ?>%;"
                                    aria-valuenow="<?php echo $progess_percent; ?>" aria-valuemin="0"
                                    aria-valuemax="100"><?php echo $progess_percent . " %" ;?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->      
                <!-- Start Table -->
                <table id="t01" border="1" class="table table-hover" width="100%">
                    <thead>
                        <tr>
                            <th width="10%">
                                <center>#</center>
                            </th>
                            <th width="10%">
                                <center>Tools</center>
                            </th>
                            <th width="20%">
                                <center>Form</center>
                            </th>
                            <th width="15%">
                                <center>Ratio</center>
                            </th>
                            <th width="15%">
                                <center>Attendance</center>
                            </th>
                            <th width="15%">
                                <center>Status</center>
                            </th>
                            <th width="15%">
                                <center>Manage</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $index = 0;     // number of position title
                    
                    //start foreach output data table
                    foreach($info_pos_form->result() as $row){     
                        $index++;
                        
                    ?>
                        <!-- start PE tool -->
                        <tr>
                            <td>
                                <center>
                                    <font color="black"><?php echo $index; ?></font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black"><?php echo "PE"; ?></font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_form_pe != NULL) echo $row->ps_form_pe; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Form name of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_pe != NULL) echo $row->ps_ratio_pe; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Ratio of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_atd_pe != NULL) echo $row->ps_ratio_atd_pe; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Attendance of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <!-- start if-else -->
                            <?php  
                            if($row->ps_form_pe == "MBO"){
                                if($row->ps_status_form_pe == 0){  ?>
                            <td valign="center">
                                <p align="center">
                                    <font color="#C0C0C0"> No assessment </font>
                                    <!-- status is No assessment form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <button class="btn btn-success " disabled><i class="fa fa-file-text-o"></i>
                                        Deactivate
                                    </button>
                                </p>
                            </td>
                            <?php }
                                else if($row->ps_status_set_form_pe == 1){
                                    if(count($info_mbo_form) == 0){     ?>
                            <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_mbo_form/form_mbo/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="mbo" class="btn btn-success" name="pos_id[<?php echo $index; ?>]"
                                            value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-file-text-o"></i> Activate
                                        </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>

                            <?php  
                                    }//count = 0
                                    else if(count($info_mbo_form) > 0){  ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_mbo_form/form_mbo/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="<?php echo "manage_".$index; ?>" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php            
                                    }//count > 0
                                }//status = 1
                                else if($row->ps_status_set_form_pe == 2 && count($info_mbo_form) > 0){ ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_mbo_form/form_mbo/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="<?php echo "manage_".$index; ?>" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php
                                }//status = 2
                            }// form name = MBO  
                            
                            else if($row->ps_form_pe == "G&O"){
                                if($row->ps_status_form_pe == 0){  ?>
                            <td valign="center">
                                <p align="center">
                                    <font color="#C0C0C0"> No assessment </font>
                                    <!-- status is No assessment form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <button class="btn btn-success " disabled><i class="fa fa-file-text-o"></i>
                                        Deactivate
                                    </button>
                                </p>
                            </td>
                            <?php }
                                else if($row->ps_status_set_form_pe == 1){
                                    if(count($info_g_and_o_form) == 0){     ?>
                            <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_g_and_o_form/form_g_and_o/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="g&o" class="btn btn-success" name="pos_id[<?php echo $index; ?>]"
                                            value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-file-text-o"></i> Activate
                                        </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>

                            <?php  
                                    }//count = 0
                                    else if(count($info_g_and_o_form) > 0){  ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_g_and_o_form/form_g_and_o/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="g&o" class="btn btn-warning" name="pos_id[<?php echo $index; ?>]"
                                            value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php            
                                    }//count > 0
                                }//status = 1
                                else if($row->ps_status_set_form_pe == 2){ ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_g_and_o_form/form_g_and_o/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="g&o" class="btn btn-warning" name="pos_id[<?php echo $index; ?>]"
                                            value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php
                                }//status = 2
                            }// form name = G&O  
                            else if($row->ps_form_pe == "MHRD"){
                                if($row->ps_status_form_pe == 0){  ?>
                            <td valign="center">
                                <p align="center">
                                    <font color="#C0C0C0"> No assessment </font>
                                    <!-- status is No assessment form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <button class="btn btn-success " disabled><i class="fa fa-file-text-o"></i>
                                        Deactivate
                                    </button>
                                </p>
                            </td>
                            <?php }
                                else if($row->ps_status_set_form_pe == 1){ ?>

                            <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a href="<?php echo base_url(); ?>/Evs_mhrd_form/form_mhrd/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                    <button id="mhrd" class="btn btn-success" name="pos_id[<?php echo $index; ?>]"
                                        value="<?php echo $row->ps_pos_id; ?>">
                                        <i class="fa fa-file-text-o"></i> Activate
                                    </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php        
                                }//status = 1
                                else if($row->ps_status_set_form_pe == 2){ ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a href="<?php echo base_url(); ?>/Evs_mhrd_form/form_mhrd/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                    <button id="mhrd" class="btn btn-warning" name="pos_id[<?php echo $index; ?>]"
                                        value="<?php echo $row->ps_pos_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php
                                }//status = 2
                            }// form name = MHRD  ?>

                        </tr>
                        <!-- end if-else -->
                        <!-- end PE tool -->
                        <?php $index++; ?>
                        <!-- start CE tool -->
                        <?php  
                        if($row->ps_form_ce != "ACM & Attitude"){
                    ?>
                        <tr>
                            <td>
                                <center>
                                    <font color="black"><?php echo $index; ?></font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black"><?php echo "CE"; ?></font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_form_ce != NULL) echo $row->ps_form_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Form name of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_ce != NULL) echo $row->ps_ratio_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Ratio of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_atd_ce != NULL) echo $row->ps_ratio_atd_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Attendance of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <!-- start if-else -->
                            <?php  
                            if($row->ps_form_ce == "ACM"){
                                if($row->ps_status_form_ce == 0){  ?>
                            <td valign="center">
                                <p align="center">
                                    <font color="#C0C0C0"> No assessment </font>
                                    <!-- status is No assessment form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <button class="btn btn-success " disabled><i class="fa fa-file-text-o"></i>
                                        Deactivate
                                    </button>
                                </p>
                            </td>
                            <?php }
                                else if($row->ps_status_set_form_ce == 1){
                                    if(count($info_ability_form) == 0){     ?>
                            <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_ability_form/form_ability/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-success"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-file-text-o"></i> Activate
                                        </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>

                            <?php  
                                    }//count = 0
                                    else if(count($info_ability_form) > 0){  ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_ability_form/form_ability/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php            
                                    }//count > 0
                                }//status = 1
                                else if($row->ps_status_set_form_ce == 2){ ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_ability_form/form_ability/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php
                                }//status = 2
                            }// form name = ACM  
                            else if($row->ps_form_ce == "Attitude & Behavior"){
                                if($row->ps_status_form_ce == 0){  ?>
                            <td valign="center">
                                <p align="center">
                                    <font color="#C0C0C0"> No assessment </font>
                                    <!-- status is No assessment form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <button class="btn btn-success " disabled><i class="fa fa-file-text-o"></i>
                                        Deactivate
                                    </button>
                                </p>
                            </td>
                            <?php }
                                else if($row->ps_status_set_form_ce == 1){
                                    if(count($info_attitude_form) == 0){     ?>
                            <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_attitude_form/form_attitude/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-success"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-file-text-o"></i> Activate
                                        </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>

                            <?php  
                                    }//count = 0
                                    else if(count($info_attitude_form) > 0){  ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_attitude_form/form_attitude/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php            
                                    }//count > 0
                                }//status = 1
                                else if($row->ps_status_set_form_ce == 2){ ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_attitude_form/form_attitude/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php
                                }//status = 2
                            }// form name = Attitude & Behavior 
                            else if($row->ps_form_ce == "GCM"){
                                if($row->ps_status_form_ce == 0){  ?>
                            <td valign="center">
                                <p align="center">
                                    <font color="#C0C0C0"> No assessment </font>
                                    <!-- status is No assessment form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <button class="btn btn-success " disabled><i class="fa fa-file-text-o"></i>
                                        Deactivate
                                    </button>
                                </p>
                            </td>
                            <?php }
                                else if($row->ps_status_set_form_ce == 1){ ?>

                            <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a href="<?php echo base_url(); ?>/Evs_gcm_form/form_gcm/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                    <button id="gcm" class="btn btn-success" name="pos_id[<?php echo $index; ?>]"
                                        value="<?php echo $row->ps_pos_id; ?>">
                                        <i class="fa fa-file-text-o"></i> Activate
                                    </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php        
                                }//status = 1
                                else if($row->ps_status_set_form_ce == 2){ ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                <a href="<?php echo base_url(); ?>/Evs_gcm_form/form_gcm/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                    <button id="gcm" class="btn btn-warning" name="pos_id[<?php echo $index; ?>]"
                                        value="<?php echo $row->ps_pos_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php
                                }//status = 2
                            }// form name = GCM  
                        }// form name != ACM & Attitude
                        if($row->ps_form_ce == "ACM & Attitude"){ ?>
                        <tr>
                            <td>
                                <center>
                                    <font color="black"><?php echo $index; ?></font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black"><?php echo "CE"; ?></font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                echo "ACM";
                                            ?>
                                        <!-- Form name of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_ce != NULL) echo $row->ps_ratio_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Ratio of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_atd_ce != NULL) echo $row->ps_ratio_atd_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Attendance of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <!-- start if-else -->
                            <?php  
                                if($row->ps_status_form_ce == 0){  ?>
                            <td valign="center">
                                <p align="center">
                                    <font color="#C0C0C0"> No assessment </font>
                                    <!-- status is No assessment form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <button class="btn btn-success " disabled><i class="fa fa-file-text-o"></i>
                                        Deactivate
                                    </button>
                                </p>
                            </td>
                            <?php }
                                if($row->ps_status_set_form_ce == 1){
                                    if(count($info_ability_form) == 0){     ?>
                            <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_ability_form/form_ability/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-success"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-file-text-o"></i> Activate
                                        </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>

                            <?php  
                                    }//count = 0
                                    else if(count($info_ability_form) > 0){  ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_ability_form/form_ability/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php            
                                    }//count > 0
                                }//status = 1
                                else if($row->ps_status_set_form_ce == 2 && count($info_ability_form) > 0){ ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_ability_form/form_ability/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php
                                }
                                else if($row->ps_status_set_form_ce == 2 && count($info_ability_form) == 0){ ?>
                                    <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_ability_form/form_ability/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-success"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-file-text-o"></i> Activate
                                        </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php
                            //status = 2
                                }
                            // form name = ACM   
                            $index++;
                            ?>
                        <tr>
                            <td>
                                <center>
                                    <font color="black"><?php echo $index; ?></font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black"><?php echo "CE"; ?></font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                               echo "Attitude & behavior";
                                            ?>
                                        <!-- Form name of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_ce != NULL) echo $row->ps_ratio_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Ratio of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <font color="black">
                                        <?php 
                                                //start if
                                                if($row->ps_ratio_atd_ce != NULL) echo $row->ps_ratio_atd_ce; else echo "-";
                                                //end if
                                            ?>
                                        <!-- Attendance of tool PE evaluation  -->
                                    </font>
                                </center>
                            </td>
                            <?php
                            
                                if($row->ps_status_set_form_ce == 1){
                                    if(count($info_attitude_form) == 0){     ?>
                            <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_attitude_form/form_attitude/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-success"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-file-text-o"></i> Activate
                                        </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>

                            <?php  
                                    }//count = 0
                                    else if(count($info_attitude_form) > 0){  ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_attitude_form/form_attitude/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php            
                                    }//count > 0
                                }//status = 1
                                else if($row->ps_status_set_form_ce == 2){ ?>
                            <?php 
                                    if(count($info_attitude_form) == 0){     ?>
                            <td valign="center">
                                <p id="no_manage" align="center">
                                    <font color="red"> No Manage </font>
                                    <!-- status is No manage form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_attitude_form/form_attitude/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-success"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-file-text-o"></i> Activate
                                        </button> <!-- Perform button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php 
                                    }
                                    if(count($info_attitude_form) > 0){ ?>
                            <td valign="center">
                                <p id="manage" align="center">
                                    <font color="green"> Managed </font>
                                    <!-- status is managed form of tool evaluation  -->
                                </p>
                            </td>
                            <td valign="center">
                                <p align="center">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_attitude_form/form_attitude/<?php echo $row->ps_pos_id; ?>/<?php echo $row->ps_pay_id; ?>">
                                        <button id="ability" class="btn btn-warning"
                                            name="pos_id[<?php echo $index; ?>]" value="<?php echo $row->ps_pos_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </button> <!-- Edit button manage form evaluation  -->
                                    </a>
                                </p>
                            </td>
                            <?php 
                                    }
                                }//status = 2
                            
                        }// form name == ACM & Attitude ?>
                        <tr>
                            <?php
                        
                    }// end foreach data table 
                    ?>

                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- End table  -->
                <!-- </form> -->
                <!-- End Form -->

                <div class="row">
                    <div class="col-sm-12" align="right">

                        <a
                            href="<?php echo base_url(); ?>/Evs_form/manage_form/<?php $row = $info_pos->row(); echo $row->psl_id; ?>">
                            <button type="button" class="btn btn-secondary float-left">Back</button>
                        </a>


                    </div>
                    <!-- Back to main form by position  -->
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
        <!-- End Card -->                
        <br>
    </div>
</div>
<!-- End Page Content -->