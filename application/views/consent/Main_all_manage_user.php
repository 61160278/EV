<?php
/*
* Main_all_manage_user.php
* Display Main_all_manage_user
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-6-24
*/  
?>


<style>
#tabmenu {
    font-size: 20px;
}

#color_head {
    background-color: #3f51b5;
}

th {
    color: #ffffff;
    font-weight: bold;
    font-size: 16px;
    background-color: #212121;
}

#dis_color {
    background-color: #F5F5F5;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<!-- END style -->

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
                <div class="row" align="center">
                    <div class="col-md-12">
                        <img src="<?php echo base_url() ?>pic/Logo_final_2.png" width="50%">
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>
                <div class="row">
                    <div class="col-md-1" align="center">
                        <h3>
                            <font size="5px"> <b>MENU </b></font>
                        </h3>
                    </div>
                    <!-- col-6  -->
                </div>
                <!-- row  -->
                <div class="row">
                    <a href="<?php echo base_url() ?>ev_form/Evs_form/index">
                        <div class="col-md-4">
                            <div class="info-tile tile-indigo">
                                <div class="tile-icon "><i class="fa fa-pencil-square"></i></div>
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
                                <div class="tile-icon "><i class="fa fa-book"></i></div>
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
					
					<a href="<?php echo base_url() ?>ev_form_AP/Evs_form_AP/report_grade">
                        <div class="col-md-4">
                            <div class="info-tile tile-indigo">
                                <div class="tile-icon"><i class="fa fa-bar-chart-o"></i></div>
                                <div class="tile-heading"><span>MENU</span></div>
                                <div class="tile-body">
                                    <span>Report grade</span>
                                </div>
                                <!-- body  -->
                            </div>
                            <!-- title  -->
                        </div>
                        <!-- col-4  -->
                    </a>
                    <!-- Report grade  -->
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