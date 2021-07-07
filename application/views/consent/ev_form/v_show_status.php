<?php
/*
* v_show_status.php
* Display v_show_status
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-06-14
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
                        <img src="http://10.73.148.5/DBMC/IMG/emp120/<?echo $_SESSION[" UsEmp_ID"]?>.jpg" width="50%"
                        class="img-responsive img-circle">
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
                                    <font size="4px"><?php echo $row->Department; ?> </font>
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

                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label"><strong>
                                        <font size="5px">Status form : </font>
                                    </strong></label>
                            </div>
                            <!-- col-md-4 -->
                            <div class="col-md-6">
                                <?php $row = $data_app; 
                                if(sizeof($row) != 0){
                                    if($row->dma_status == 1){ ?>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#show_status">Wait
                                    APPROVER 1 </button>
                                <?php }
                                    else if($row->dma_status == 2){ ?>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#show_status">Wait
                                    APPROVER 2 </button>
                                <?php }
                                    // else if
                                    else if($row->dma_status == 3 || $row->dma_status == 4){ ?>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#show_status">Wait HR
                                </button>
                                <?php }
                                    // else if
                                    else if($row->dma_status > 4){ ?>
                                <button class="btn btn-success" data-toggle="modal" data-target="#show_status">Approve
                                </button>
                                <?php }
                                    // else if
                                }
                                // if check 
                                else{ ?>
                                <div class="alert alert-warning col-md-12">
                                    <strong>Please create form and select Approver !</strong>
                                </div>
                                <?php }
                                // else 
                                ?>
                            </div>
                            <!-- col-md-4 -->
                        </div>

                    </div>
                    <!-- col-8  -->
                </div>
                <!-- row  -->

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url() ?>Evs_all_manage/index_u">
                            <button class="btn btn-inverse">BACK</button>
                        </a>
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
<br>

<!-- Modal show status -->
<div class="modal fade" id="show_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b></font>
                </button>
                <h2 class="modal-title">
                    <b>
                        <font color="white">Status form</font>
                    </b>
                </h2>
            </div>
            <!-- modal header -->

            <div class="modal-body">
                <br>
                <div class="row">
                    <div class="col-md-3" align="center">
                        <img src="<?php echo base_url();?>/pic/App1.png" width="40%">
                    </div>
                    <!-- col-3  -->
                    <div class="col-md-3" align="center">
                        <label class="control-label"><strong>
                                <font size="3px">Approver 1</font>
                            </strong></label>
                        <?php if(sizeof($app1) != 0){ ?>
                        <p><?php echo $app1->Empname_eng . "  " . $app1->Empsurname_eng; ?></p>
                        <?php }
                            // if ?>

                    </div>
                    <!-- col-md-3 -->
                    <?php if($data_app->dma_status == 1 && sizeof($app1) != 0){ ?>
                    <div class="col-md-6" align="center">
                        <div class="alert alert-dismissable alert-warning">
                            <strong> Wait Approve 1 </strong>
                        </div>
                    </div>
                    <!-- col-md-6 -->
                    <?php }
                    // if
					else if($data_app->dma_status == 1 && sizeof($app1) == 0){ ?>
                    <div class="col-md-6" align="center">
                        <div class="alert alert-dismissable alert-inverse">
                            <strong> No Approve 1 </strong>
                        </div>
                    </div>
                    <!-- col-md-6 -->
                    <?php }
					// else 
                    else if($data_app->dma_status > 1 && sizeof($app1) != 0){?>
                    <div class="col-md-6" align="center">
                        <div class="alert alert-dismissable alert-success">
                            <strong> Approve </strong>
                        </div>
                    </div>
                    <!-- col-md-6 -->
                    <?php }
                    // else if
					else if($data_app->dma_status > 1 && sizeof($app1) == 0){ ?>
                    <div class="col-md-6" align="center">
                        <div class="alert alert-dismissable alert-inverse">
                            <strong> No Approve 1 </strong>
                        </div>
                    </div>
                    <?php }
					// else if?>

                </div>
                <!-- row  -->
                <hr>
                <div class="row">
                    <div class="col-md-3" align="center">
                        <img src="<?php echo base_url();?>/pic/App2.png" width="40%">
                    </div>
                    <!-- col-3 -->
                    <div class="col-md-3" align="center">
                        <label class="control-label"><strong>
                                <font size="3px">Approver 2</font>
                            </strong></label>
                        <p><?php echo $app2->Empname_eng . "  " . $app2->Empsurname_eng; ?></p>
                    </div>
                    <!-- col-md-3 -->
                    <?php if($data_app->dma_status == 2){ ?>
                    <div class="col-md-6" align="center">
                        <div class="alert alert-dismissable alert-warning">
                            <strong> Wait Approve 2 </strong>
                        </div>
                    </div>
                    <!-- col-md-6 -->
                    <?php }
                    // if
                    else if($data_app->dma_status > 2){?>
                    <div class="col-md-6" align="center">
                        <div class="alert alert-dismissable alert-success">
                            <strong> Approve </strong>
                        </div>
                    </div>
                    <!-- col-md-6 -->
                    <?php }
                    // else if ?>
                </div>
                <!-- row  -->
                <hr>
                <div class="row">
                    <div class="col-md-3" align="center">
                        <img src="<?php echo base_url();?>/pic/HR.png" width="40%">
                    </div>
                    <!-- col-3  -->
                    <div class="col-md-3" align="center">
                        <label class="control-label"><strong>
                                <font size="3px">HR </font>
                            </strong></label>
                    </div>
                    <!-- col-md-3 -->
                    <?php if($data_app->dma_status == 3 || $row->dma_status == 4){ ?>
                    <div class="col-md-6" align="center">
                        <div class="alert alert-dismissable alert-warning">
                            <strong> Wait HR </strong>
                        </div>
                    </div>
                    <!-- col-md-6 -->
                    <?php }
                    // if
                    else if($data_app->dma_status > 4){?>
                    <div class="col-md-6" align="center">
                        <div class="alert alert-dismissable alert-success">
                            <strong> Approve </strong>
                        </div>
                    </div>
                    <!-- col-md-6 -->

                    <div class="row">
                        <div class="col-md-10" align="right">
                            <a href="<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/report_grade">
                                <button class="btn btn-success">Report Grade</button>
                            </a>
                        </div>
                        <!-- col-11 -->
                    </div>
                    <!-- row -->
                    <?php }
                    // else if ?>
                </div>
                <!-- row  -->
            </div>
            <!-- row  -->
        </div>
        <!-- modal-body -->
    </div>
    <!-- modal-content -->
</div>
<!-- modal-dialog -->
</div>
<!-- End Modal show status-->