<?php
/*
* v_main_permission.php
* Display v_main_permission
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-6-24
*/  
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"> <i class="fa fa-home"></i> <b>HOME </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body" style="height: 400px">
                <br>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <div class="row">
                    <div class="col-md-12" align="center">
                        <div class="row">
                            <a href="<?php echo base_url() ?>ev_form/Evs_form/index">
                                <div class="col-md-4">
                                    <div class="info-tile tile-indigo">
                                        <div class="tile-icon"><i class="fa fa-pencil-square"></i></div>
                                        <div class="tile-heading"><span>MENU</span></div>
                                        <div class="tile-body">
                                            <span>Create Form</span>
                                        </div>
                                        <!-- body  -->
                                    </div>
                                    <!-- title  -->
                                </div>
                                <!-- col-4  -->
                            </a>
                            <!-- create form  -->

                            <a href="<?php echo base_url() ?>ev_form/Evs_form/show_ststus">
                                <div class="col-md-4">
                                    <div class="info-tile tile-indigo">
                                        <div class="tile-icon"><i class="fa fa-book"></i></div>
                                        <div class="tile-heading"><span>MENU</span></div>
                                        <div class="tile-body">
                                            <span>Status Form</span>
                                        </div>
                                        <!-- body  -->
                                    </div>
                                    <!-- title  -->
                                </div>
                                <!-- col-4  -->
                            </a>
                            <!-- status form  -->
                        </div>
                        <!-- row  -->
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
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