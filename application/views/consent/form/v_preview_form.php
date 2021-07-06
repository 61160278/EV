<!-- Start Page Content -->

<style>
#panel_th_topManage {
    background-color: #c1432e;
}

#table_acm th {

    background-color: #2c2c2c;
    color: white;

}

#table_mbo th {

    background-color: #2c2c2c;
    color: white;

}

#table_g_o_level th {

    background-color: #2c2c2c;
    color: white;

}

#ev_items {
    background-color: #c1432e;
    color: white;
}
</style>
<!--Start Page Content -->
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
                        <i class="fa fa-bar-chart-o text-white"></i>
                        <font color="white">&nbsp;Preview Form</font>
                    </h1>
                </div>
            </div>
            <div class="card-header" align="center">
                <h2><b>Performance Evaluation Form</b></h2>
            </div>
            <div class="card-body">
                <table border="1" width="100%">
                    <tr>
                        <td width="25%">
                            <center><b>Level</b></center>
                        </td>
                        <td colspan="3">
                            <center><?php $row = $info_pos->row();
                                    echo $row->psl_position_level; ?>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td width="25%">
                            <center><b>Department / Section</b></center>
                        </td>
                        <td width="25%"></td>
                        <td width="25%">
                            <center><b>Section Code</b></center>
                        </td>
                        <td width="25%"></td>
                    </tr>

                </table>
                <br>
                <table border="1" width="100%">
                    <tr>
                        <td width="25%">
                            <center><b>Employee Code</b></center>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td width="25%">
                            <center><b>Employee Name</b></center>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td width="25%">
                            <center><b>Position</b></center>
                        </td>
                        <td>
                            <center><?php echo $row->Position_name; ?></center>
                        </td>
                    </tr>

                </table>
                <!-- table -->

                <br>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <center>Evaluation items</center>
                            </th>
                            <th>
                                <center>Ratio</center>
                            </th>
                            <th>
                                <center>Attendance</center>
                            </th>
                        </tr>
                    </thead>
                    <?php  
                    $index_word = array("A","B","C");
                    $n = 0;
                        // start foreach
                        foreach($info_pos_form->result() as $row){
                    ?>
                    <tr>
                        <td width="25%">
                            <center><b> <?php echo $index_word[$n]; ?></b></center>
                        </td>
                        <td>
                            <center><?php echo $form_pe = $row->ps_form_pe; ?></center>
                        </td>
                        <td>
                            <center><?php echo $ratio_pe = $row->ps_ratio_pe . "%" ;?></center>
                        </td>
                        <td>
                            <center><?php echo $row->ps_ratio_atd_pe . "%";?></center>
                        </td>
                    </tr>
                    <?php $n++; ?>
                    <tr>
                        <td width="25%">
                            <center><b><?php echo $index_word[$n]; ?><b></center>
                        </td>
                        <td>
                            <center><?php echo $form_ce = $row->ps_form_ce;?></center>
                        </td>
                        <td>
                            <center><?php echo $ratio_ce = $row->ps_ratio_ce . "%";?></center>
                        </td>
                        <td>
                            <center><?php echo $row->ps_ratio_atd_ce . "%";?></center>
                        </td>
                    </tr>
                    <?php
                        }

                    ?>

                </table>
                <!-- table -->
                <br>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th colspan="5">
                                <center>Score Summary</center>
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <td rowspan="2">
                            <center>
                                Range of scores
                            </center>
                        </td>
                        <td rowspan="2" width="20%">
                            <center>
                                Percent of each Item
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $form_pe; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $form_ce; ?>
                            </center>
                        </td>
                        <td rowspan="2" width="30%">
                            <center>
                                Score
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <?php echo $ratio_pe; ?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $ratio_ce;?>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                90-100
                            </center>
                        </td>
                        <td>
                            <center>
                                <b>First Evaluation</b>
                            </center>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                75-89.9
                            </center>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                60-74.9
                            </center>
                        </td>
                        <td>
                            <center>
                                <b>Second Evaluation</b>
                            </center>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                45.59.9
                            </center>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                Under 44.9
                            </center>
                        </td>
                        <td colspan="5">
                            <center>
                                S = Superb / A = Outstanding / B = Meet Company Standard / C = Progressing / D = Need
                                Improvement
                            </center>
                        </td>
                    </tr>
                </table>
                <!-- table -->
                <br>
                <!-- /# column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header" align="center" id="ev_items">
                            <h3><b>Evaluation items</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <?php  
                                        $check_tab = 0;
                                                    // start foreach
                                                    foreach($info_pos_form->result() as $row){
                                                        //start if form CE
                                                        if($row->ps_form_pe == "G&O"){
                                                            $check_tab = 1;
                                                ?>
                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-g_o" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="true">G&O</a>
                                        <?php 
                                                        } else if($row->ps_form_pe == "MBO"){
                                                            $check_tab = 2;
                                                    ?>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab"
                                            href="#custom-nav-mbo" role="tab" aria-controls="custom-nav-profile"
                                            aria-selected="true">MBO</a>
                                        <?php   
                                                        }
                                                     else if($row->ps_form_pe == "MHRD"){
                                                        $check_tab = 3;  
                                                        //end if form CE
                                                        ?>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab"
                                            href="#custom-nav-mhrd" role="tab" aria-controls="custom-nav-profile"
                                            aria-selected="true">MHRD</a>
                                        <?php } //end if form CE        
                                         //start if form PE
                                                        if($row->ps_form_ce == "ACM"){
                                                    ?>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-acm" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">ACM</a>
                                        <?php
                                                        }
                                                        else if($row->ps_form_ce == "Attitude & Behavior"){
                                                    ?>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-attitude" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Attitude & behavior</a>
                                        <?php    
                                                        }
                                                        else if($row->ps_form_ce == "ACM & Attitude"){
                                                            
                                                        
                                                    ?>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-acm" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">ACM</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-attitude" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">Attitude & behavior</a>
                                        <?php
                                                        }
                                                        if($row->ps_form_ce == "GCM"){
                                                    ?>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-gcm" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="false">GCM</a>
                                        <?php  }
                                                    }
                                                    //end foreach
                                                ?>
                                    </div>
                                </nav>

                                <div class="tab-content pl-6 pt-4" id="nav-tabContent">
                                    <!-- start form G&O -->
                                    <?php  
                                        if($check_tab == 1){ ?>
                                    <div class="tab-pane fade show active" id="custom-nav-g_o" role="tabpanel"
                                        aria-labelledby="custom-nav-home-tab">
                                        <?php
                                        }
                                        else{ ?>
                                        <div class="tab-pane fade" id="custom-nav-g_o" role="tabpanel"
                                            aria-labelledby="custom-nav-home-tab">
                                            <?php
                                           }
                                            ?>

                                            <?php
                                                    $row_g_o = $info_g_and_o_form->row();
                                                    $index_max_g_o_level = $row_g_o->sfg_index_level;
                                                    $index_max_g_o_range = $row_g_o->sfg_index_ranges;
                                               
                                                ?>
                                            <!-- Start table level -->
                                            <table id="table_g_o_level" border="1" class="table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="2%">
                                                            <center>
                                                                #
                                                            </center>
                                                        </th>
                                                        <th>
                                                            <center width="10%">
                                                                Type of G&O
                                                            </center>
                                                        </th>
                                                        <th>
                                                            <center width="10%">
                                                                SDGs Goal
                                                            </center>
                                                        </th>
                                                        <th width="30%">
                                                            <center>
                                                                Evaluation Item
                                                            </center>
                                                        </th>
                                                        <th width="10%">
                                                            <center>
                                                                Weight (%)
                                                            </center>
                                                        </th>
                                                        <th width="20%" colspan="2">
                                                            <center>
                                                                Possible Outcomes / Their Ratings
                                                            </center>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $index_g_o = 1;
                                                        for($i = 1 ; $i <= $index_max_g_o_level ; $i++){
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <center><?php echo $index_g_o++; ?></center>
                                                        </td>
                                                        <td>
                                                            <center><input type="radio" id="C" name="type" value="0"
                                                                    disabled><label>&nbsp;<b> C </b></label> </center>
                                                            <br>
                                                            <center><input type="radio" id="D" name="type" value="0"
                                                                    disabled><label>&nbsp;<b> D </b></label></center>
                                                        </td>
                                                        <td>
                                                            <select name="select" id="select" class="form-control"
                                                                disabled>
                                                                <option value="0">Please select</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <textarea placeholder="Please enter" value="0"
                                                                disabled></textarea>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="weight_'+i+'" name="weight_'+i+'"
                                                                placeholder="" class="form-control" disabled>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="obj_'+i+'" name="obj_'+i+'"
                                                                placeholder="Please enter objectives"
                                                                class="form-control" disabled><br>
                                                            <input type="text" id="obj_'+i+'" name="obj_'+i+'"
                                                                placeholder="Please enter objectives"
                                                                class="form-control" disabled><br>
                                                            <input type="text" id="obj_'+i+'" name="obj_'+i+'"
                                                                placeholder="Please enter objectives"
                                                                class="form-control" disabled><br>
                                                            <input type="text" id="obj_'+i+'" name="obj_'+i+'"
                                                                placeholder="Please enter objectives"
                                                                class="form-control" disabled><br>
                                                            <input type="text" id="obj_'+i+'" name="obj_'+i+'"
                                                                placeholder="Please enter objectives"
                                                                class="form-control" disabled>
                                                        </td>

                                                    </tr>

                                                    <!-- tbody  -->
                                                    <?php
                                                        }
                                                    ?>
                                                    <?php
                                                        for($i = 1 ; $i <= $index_max_g_o_range ; $i++){
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <center><?php echo $index_g_o++; ?></center>
                                                        </td>
                                                        <td>
                                                            <center><input type="radio" id="C" name="type" value="0"
                                                                    disabled><label>&nbsp;<b> C </b></label> </center>
                                                            <br>
                                                            <center><input type="radio" id="D" name="type" value="0"
                                                                    disabled><label>&nbsp;<b> D </b></label></center>
                                                        </td>
                                                        <td>
                                                            <select name="select" id="select" class="form-control"
                                                                disabled>
                                                                <option value="0">Please select</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <textarea placeholder="Please enter" value="0"
                                                                disabled></textarea>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="weight_'+i+'" name="weight_'+i+'"
                                                                placeholder="" class="form-control" disabled>
                                                        </td>
                                                        <td>
                                                            <label>Chellenge:</label>
                                                            <hr>
                                                            <label>Standard:</label>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <!-- End table level -->





                                        </div>
                                        <!-- end form G&O -->
                                        <?php  
                                        if($check_tab == 2){ ?>
                                        <div class="tab-pane fade show active" id="custom-nav-mbo" role="tabpanel"
                                            aria-labelledby="custom-nav-home-tab">
                                            <?php
                                        }
                                        else{ ?>
                                            <div class="tab-pane fade" id="custom-nav-mbo" role="tabpanel"
                                                aria-labelledby="custom-nav-home-tab">
                                                <?php
                                        }
                                    ?>

                                                <!-- start form MBO -->
                                                <?php
                                                $row_mbo = $info_mbo_form->row();
                                                    $index_max_mbo = $row_mbo->sfm_index_field;;
                                                ?>
                                                <!-- Start table-->
                                                <table id="table_mbo" border="1" class="table" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">
                                                                <center>
                                                                    <font color="white">#</font>
                                                                </center>
                                                            </th>
                                                            <th rowspan="3">
                                                                <center>
                                                                    <font color="white">Management by objective</font>
                                                                </center>
                                                            </th>
                                                            <th rowspan="3">
                                                                <center>
                                                                    <font color="white">SDGs GOAL</font>
                                                                </center>
                                                            </th>
                                                            <th rowspan="3">
                                                                <center>
                                                                    <font color="white">Weight</font>
                                                                </center>
                                                            </th>
                                                            <th colspan="3">
                                                                <center>
                                                                    <font color="white">Evaluation
                                                                    </font>
                                                                </center>
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <center>
                                                                    <font color="white">Result</font>
                                                                </center>
                                                            </th>

                                                            <th rowspan="2">
                                                                <center>
                                                                    <font color="white">Score</font>
                                                                </center>
                                                            </th>
                                                            <th rowspan="2">
                                                                <center>
                                                                    <font color="white">Max. Rating</font>
                                                                </center>
                                                            </th>

                                                        </tr>
                                                        <tr>
        
                                                            <th width="15%">
                                                                <center>
                                                                    <font color="white">[Fill score 1-5]</font>
                                                                </center>
                                                            </th>

                                                        </tr>


                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        for($i = 1 ; $i <= $index_max_mbo ; $i++){
                                                    ?>
                                                        <tr>
                                                            <td height="50">
                                                                <center><?php echo $i; ?></center>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <center>0</center>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php
                                                        }
                                                ?>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3" rowspan="2"></td>
                                                            <td rowspan="2">
                                                                <center>100</center>
                                                            </td>
                                                            <td rowspan="2">
                                                                <center> Score Total </center>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <center><?php echo 0;?></center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <!-- End table  -->
                                            </div>
                                            <!-- end form MBO -->
											
                                            <?php  
                                        if($check_tab == 3){ ?>
                                            <div class="tab-pane fade show active" id="custom-nav-mhrd" role="tabpanel"
                                                aria-labelledby="custom-nav-home-tab">
                                                <?php
                                        }
                                        else{ ?>
                                                <div class="tab-pane fade" id="custom-nav-mhrd" role="tabpanel"
                                                    aria-labelledby="custom-nav-home-tab">
                                                    <?php
                                        }
                                    ?>
                                                    <table id="table_acm" border="1" class="table table-hover"
                                                        width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">#</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Item</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">description</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="2">
                                                                    <center>
                                                                        <font color="white">excel import</font>
                                                                    </center>
                                                                </th>
                                                                <th >
                                                                    <center>
                                                                        <font color="white">score 1
                                                                        </font>
                                                                    </center>
                                                                </th>
                                                                <th >
                                                                    <center>
                                                                        <font color="white">score 2
                                                                        </font>
                                                                    </center>
                                                                </th>

                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            <?php  
                                                    $index_mhrd = 1;
                                                    $sum_max_rating = 0;
                                                    $temp_description = "";

                                                    // start foreach
                                                    foreach($info_mhrd_form->result() as $row){
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <center><?php echo $index_mhrd++; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $row->itm_item_detail_en . "<br><font color='blue'>" . $row->itm_item_detail_th ."</font>"; ?>
                                                                    </center>
                                                                </td>

                                                                <td>
                                                                    <?php foreach($info_description->result() as $row_dep){ 
                                                                    if($row->sfi_itm_id == $row_dep->dep_itm_id && $temp_description != $row_dep->dep_description_detail_en){
                                                                        $temp_description = $row_dep->dep_description_detail_en;
                                                                    ?>
                                                                    <center>
                                                                        <?php echo $row_dep->dep_description_detail_en . "<br><font color='blue'>" . $row_dep->dep_description_detail_th ."</font>"; ?>
                                                                    </center>
                                                                    <?php }
                                                                    } ?>
                                                                </td>
                                                                <td>
                                                                    <?php 
                                                                       if($row->sfi_excel_import == 1){
                                                                        echo '<center><i class="fa fa-check btn-success" style="font-size:30px" ></i></center>';
                                                                     }
                                                                    ?>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>

                                                            <?php
                                                    }
                                                    // end foreach
                                                    ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="3" ></td>
                                                       
                                                                <td >
                                                                    <center> Score Total </center>
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td>
                                                             
                                                                </td>
                                                          
                                                             
                                                            </tr>
                                                       
                                                        </tfoot>

                                                    </table>
                                                </div>

                                                <!-- start form ACM -->
                                                <div class="tab-pane fade" id="custom-nav-acm" role="tabpanel"
                                                    aria-labelledby="custom-nav-contact-tab">
                                                    <!-- Start table -->
                                                    <table id="table_acm" border="1" class="table table-hover"
                                                        width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">#</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Competency</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Key component</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Expected Behavior</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Weight</font>
                                                                    </center>
                                                                </th>

                                                                <th colspan="3">
                                                                    <center>
                                                                        <font color="white">
                                                                            Evaluation
                                                                        </font>
                                                                    </center>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <center>
                                                                        <font color="white">Result</font>
                                                                    </center>
                                                                </th>

                                                                <th rowspan="2">
                                                                    <center>
                                                                        <font color="white">Score</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="2">
                                                                    <center>
                                                                        <font color="white">Max. Rating</font>
                                                                    </center>
                                                                </th>

                                                            </tr>
                                                            <tr>
  
                                                                <th>
                                                                    <center>
                                                                        <font color="white">[Fill score 1-5]</font>
                                                                    </center>
                                                                </th>

                                                            </tr>


                                                        </thead>
                                                        <tbody>
                                                            <?php  
                                                    $index_acm = 1;
                                                    $temp_keycomponent = "";
                                                    $temp_expected = "";
                                                    $sum_max_rating = 0;
                                                    // start foreach
                                                    foreach($info_ability_form->result() as $row){
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <center><?php echo $index_acm++; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $row->cpn_competency_detail_en . "<br><font color='blue'>" . $row->cpn_competency_detail_en ."</font>"; ?>
                                                                    </center>
                                                                </td>

                                                                <td>
                                                                    <?php foreach($info_expected->result() as $row_ept){ 
                                                                    if($row->sfa_cpn_id == $row_ept->kcp_cpn_id && $temp_keycomponent != $row_ept->kcp_key_component_detail_en){
                                                                        $temp_keycomponent = $row_ept->kcp_key_component_detail_en;
                                                                    ?>
                                                                    <center>
                                                                        <?php echo $row_ept->kcp_key_component_detail_en . "<br><font color='blue'>" . $row_ept->kcp_key_component_detail_en ."</font>"; ?>
                                                                    </center>
                                                                    <?php }
                                                                    } ?>
                                                                </td>
                                                                <td>
                                                                    <?php foreach($info_expected->result() as $row_ept){ 
                                                                    if($row->sfa_cpn_id == $row_ept->kcp_cpn_id && $temp_expected != $row_ept->ept_expected_detail_en && $row_ept->ept_pos_id == $info_pos_id){
                                                                        $temp_expected = $row_ept->ept_expected_detail_en;
                                                                    ?>
                                                                    <center>
                                                                        <?php echo $row_ept->ept_expected_detail_en . "<br><font color='blue'>" . $row_ept->ept_expected_detail_th ."</font>"; ?>
                                                                    </center>
                                                                    <?php }
                                                                    } ?>
                                                                </td>
                                                                <td>
                                                                    <center><?php echo $row->sfa_weight; ?></center>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><center><?php echo ($row->sfa_weight)*5; $sum_max_rating += ($row->sfa_weight)*5;?></center>

                                                            </tr>

                                                            <?php
                                                    }
                                                    // end foreach
                                                    ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="4" rowspan="2"></td>
                                                                <td rowspan="2">
                                                                    <center>100</center>
                                                                </td>
                                                                <td rowspan="2">
                                                                    <center> Score Total </center>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <center><?php echo $sum_max_rating;?></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                    <!-- End table  -->
                                                </div>
                                                <!-- end form ACM -->

                                                <!-- start attitude form -->
                                                <div class="tab-pane fade" id="custom-nav-attitude" role="tabpanel"
                                                    aria-labelledby="custom-nav-contact-tab">
                                                    <table id="table_acm" border="1" class="table table-hover"
                                                        width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">#</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Category</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Identification</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Weight</font>
                                                                    </center>
                                                                </th>

                                                                <th colspan="3">
                                                                    <center>
                                                                        <font color="white">First-half year
                                                                            evaluation
                                                                        </font>
                                                                    </center>
                                                                </th>

                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <center>
                                                                        <font color="white">Result</font>
                                                                    </center>
                                                                </th>

                                                                <th rowspan="2">
                                                                    <center>
                                                                        <font color="white">Score</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="2">
                                                                    <center>
                                                                        <font color="white">Max. Rating</font>
                                                                    </center>
                                                                </th>
                                                               
                                                            </tr>
                                                            <tr>

                                                                <th>
                                                                    <center>
                                                                        <font color="white">[Fill score 1-5]</font>
                                                                    </center>
                                                                </th>

                                                            </tr>


                                                        </thead>
                                                        <tbody>
                                                            <?php  
                                                    $index_attitude = 1;
                                                    $sum_max_rating = 0;
                                                    $temp_identification = "";

                                                    // start foreach
                                                    foreach($info_attitude_form->result() as $row){
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <center><?php echo $index_attitude++; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $row->ctg_category_detail_en . "<br><font color='blue'>" . $row->ctg_category_detail_th ."</font>"; ?>
                                                                    </center>
                                                                </td>

                                                                <td>
                                                                    <?php foreach($info_identification->result() as $row_idf){ 
                                                                    if($row->sft_ctg_id == $row_idf->idf_ctg_id && $temp_identification != $row_idf->idf_identification_detail_en){
                                                                        $temp_identification = $row_idf->idf_identification_detail_en;
                                                                    ?>
                                                                    <center>
                                                                        <?php echo $row_idf->idf_identification_detail_en . "<br><font color='blue'>" . $row_idf->idf_identification_detail_th ."</font>"; ?>
                                                                    </center>
                                                                    <?php }
                                                                    } ?>
                                                                </td>
                                                                <td>
                                                                    <center><?php echo $row->sft_weight; ?></center>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo ($row->sft_weight)*5;  $sum_max_rating += ($row->sft_weight)*5;?>
                                                                    </center>
                                                                </td>
                                                            </tr>

                                                            <?php
                                                    }
                                                    // end foreach
                                                    ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="3" rowspan="2"></td>
                                                                <td rowspan="2">
                                                                    <center>100</center>
                                                                </td>
                                                                <td rowspan="2">
                                                                    <center> Score Total </center>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <center><?php echo $sum_max_rating;?></center>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                
                                                                <td colspan="2"></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <!-- end attitude form -->


                                                <!-- end gcm form -->
                                                <div class="tab-pane fade" id="custom-nav-gcm" role="tabpanel"
                                                    aria-labelledby="custom-nav-contact-tab">
                                                    <!-- Start table -->
                                                    <table id="table_acm" border="1" class="table table-hover"
                                                        width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">#</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Competency</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Key component</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Target Level</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Expected Behavior</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="3">
                                                                    <center>
                                                                        <font color="white">Weight</font>
                                                                    </center>
                                                                </th>

                                                                <th colspan="3">
                                                                    <center>
                                                                        <font color="white">First-half year
                                                                            evaluation
                                                                        </font>
                                                                    </center>
                                                                </th>

                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <center>
                                                                        <font color="white">Result</font>
                                                                    </center>
                                                                </th>

                                                                <th rowspan="2">
                                                                    <center>
                                                                        <font color="white">Score</font>
                                                                    </center>
                                                                </th>
                                                                <th rowspan="2">
                                                                    <center>
                                                                        <font color="white">Max. Rating</font>
                                                                    </center>
                                                                </th>

                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <center>
                                                                        <font color="white">[Fill score 1-5]</font>
                                                                    </center>
                                                                </th>

                                                            </tr>


                                                        </thead>
                                                        <tbody>
                                                            <?php  
                                                    $index_acm = 1;
                                                    $temp_keycomponent = "";
                                                    $temp_expected = "";
                                                    $temp_Target  = "";
                                                    $sum_max_rating = 0;
                                                    // start foreach
                                                    foreach($info_gcm_form->result() as $row){
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <center><?php echo $index_acm++; ?></center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $row->cpg_competency_detail_en . "<br><font color='blue'>" . $row->cpg_competency_detail_en ."</font>"; ?>
                                                                    </center>
                                                                </td>

                                                                <td>
                                                                    <?php foreach($info_expected_gcm->result() as $row_epg){ 
                                                                    if($row->sgc_cpg_id == $row_epg->kcg_cpg_id && $temp_keycomponent != $row_epg->kcg_key_component_detail_en){
                                                                        $temp_keycomponent = $row_epg->kcg_key_component_detail_en;
                                                                    ?>
                                                                    <center>
                                                                        <?php echo $row_epg->kcg_key_component_detail_en . "<br><font color='blue'>" . $row_epg->kcg_key_component_detail_en ."</font>"; ?>
                                                                    </center>
                                                                    <?php }
                                                                    } ?>
                                                                </td>
                                                                <td>
                                                                    <?php foreach($info_expected_gcm->result() as $row_epg){ 
                                                                    if($row->sgc_cpg_id == $row_epg->kcg_cpg_id && $temp_Target != $row_epg->epg_point && $row_epg->epg_pos_id == $info_pos_id){
                                                                        $temp_Target = $row_epg->epg_point;
                                                                    ?>
                                                                    <center>
                                                                        <?php echo $row_epg->epg_point; ?>
                                                                    </center>
                                                                    <?php }
                                                                    } ?>
                                                                </td>
                                                                <td>
                                                                    <?php foreach($info_expected_gcm->result() as $row_epg){ 
                                                                    if($row->sgc_cpg_id == $row_epg->kcg_cpg_id && $temp_expected != $row_epg->epg_expected_detail_en && $row_epg->epg_pos_id == $info_pos_id){
                                                                        $temp_expected = $row_epg->epg_expected_detail_en;
                                                                    ?>
                                                                    <center>
                                                                        <?php echo $row_epg->epg_expected_detail_en . "<br><font color='blue'>" . $row_epg->epg_expected_detail_th ."</font>"; ?>
                                                                    </center>
                                                                    <?php }
                                                                    } ?>
                                                                </td>
                                                                <td>
                                                                    <center><?php echo $row->sgc_weight; ?></center>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><center><?php echo ($row->sgc_weight)*5; $sum_max_rating += ($row->sgc_weight)*5;?></center>
                                                                </td>

                                                            </tr>

                                                            <?php
                                                    }
                                                    // end foreach
                                                    ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="5" rowspan="2"></td>
                                                                <td rowspan="2">
                                                                    <center>100</center>
                                                                </td>
                                                                <td rowspan="2">
                                                                    <center> Score Total </center>
                                                                </td>
                                                                <td></td>
                                                                <td>
                                                                    <center><?php echo $sum_max_rating;?></center>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                    <!-- End table  -->
                                                </div>
                                                <!-- end form ACM -->

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /# column -->


                            <br><br>
                            <!-- End Back to main form by position  -->
                            <div class="row">
                                <div class="col-sm-12" align="right">
                                    <a
                                        href="<?php echo base_url(); ?>/Evs_form/manage_form/<?php $row = $info_pos->row(); echo $row->psl_id; ?>">
                                        <button type="button" class="btn btn-secondary float-right">Back</button>
                                    </a>

                                </div>
                                <!-- End Back to main form by position  -->
                            </div>
                            <hr>

                        </div>
                    </div>
                    <!-- End Card -->
                    <br>
                </div>
            </div>
            <!--End Page Content -->