<?php
/*
* v_indicator_index
* Display indicator level
* @input  - 
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/

/*
* v_indicator_index
* Display manage indicator
* @input  -
* @output -
* @author Kunanya Singmee
* @Update Date 2563-09-23
*/

/*
* v_indicator_index
* Display manage indicator
* @input  -  
* @output -
* @author Lapatrada puttamongkol
* @Update Date 2563-09-26
*/
/*
* v_indicator_index
* Display manage indicator
* @input  -
* @output -
* @author Kunanya Singmee
* @Update Date 2563-10-01
*/
/*
* v_indicator_index
* Display manage indicator
* @input  - 
* @output -
* @author Pondruthai Loekngam
* @Update Date 2563-10-3
*/
/*
* v_indicator_index
* Display manage indicator
* @input  - 
* @output Position level
* @author Jakkarin Pimpaeng
* @Update Date 2563-10-5
*/
/*
* v_indicator_index
* Display manage indicator
* @input  - 
* @output Position level
* @author Jakkarin Pimpaeng
* @Update Date 2564-13-5
*/
?>
<!-- Start CSS -->
<style>
.border4 {
    border-left: 4px solid #4b6777;
}

.border5 {
    border-left: 4px solid #4b6777;
    opacity: 0.8;
}

.text3 {
    color: #c1432e;
}

#panel_th_Manageindicator {
    background-color: #c1432e;
}
</style>
<!-- End CSS -->
<!-- Start Page Content -->
<div class="container-fluid">
    <!-- Start col-xl-12 -->
    <div class="col-xl-12 col-lg-12">
        <!-- Start card shadow mb-4 -->
        <div class="card shadow mb-4">
            <!-- Start Card Header : Manage form -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between "
                        id="panel_th_Manageindicator">
                        <div class="col-lg-8">
                            <h1 class="m-0 font-weight-bold text-white">
                                <a href="<?php echo base_url(); ?>/Evs_Controller/main_manage_form">
                                    <i class="fa fa-chevron-circle-left text-white"></i>
                                </a>
                                <i class="fa fa-pencil-square"></i>
                                &nbsp;Manage items
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card Header : Manage form -->
            <!-- Start Card Body : Position Title -->
            <div class="card-body">
                <div class="row">
                    <!-- Start Menu form Ability -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <a href="<?php echo base_url();?>/Evs_ability_indicators_form/indicator_ability">
                            <div class="card border4 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text3 text-uppercase mb-1">Form</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">ACM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Menu form Abilityt -->
                    <!-- Start Menu form Attitude & Behavior -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <a href="<?php echo base_url();?>/Evs_attitude_indicators_form/indicator_attitude">
                            <div class="card border5 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text3 text-uppercase mb-1">Form</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Attitude & Behavior
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Menu form Attitude & Behavior -->
                    <!-- Start Menu form GCM -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <a href="<?php echo base_url();?>/Evs_gcm_indicators_form/indicator_gcm">
                            <div class="card border5 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text3 text-uppercase mb-1">Form</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">GCM
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Menu form GCM -->
                    <!-- Start Menu form MHRD -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <a href="<?php echo base_url();?>/Evs_mhrd_indicators_form/indicator_mhrd">
                            <div class="card border5 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text3 text-uppercase mb-1">Form</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">MHRD
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Menu form MHRD -->
                </div>
                <!-- Start Back to main menu  -->
                <div class="row">
                    <div class="col-sm-12" align="right">
                        <a href="<?php echo base_url() ?>/Evs_Controller/main_manage_form">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>
                    </div>
                </div>
                <!-- end Back to main menu  -->
            </div>
            <!-- end Card Body   -->
        </div>
        <!-- end card shadow mb-4 -->
    </div>
    <!-- end col-xl-12 -->
</div>
<!-- end Page Content -->