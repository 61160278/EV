<?php 
/*
* Main_manageform.php
* Display Main_index
* @input  -
* @output -
* @author   Kunanya Singmee
* @Create Date 2563-09-1
*/ 
/*
* Main_index
* Display Main_index
* @input  -
* @output -
* @author Tippawan Aiemsaad
* @Update Date 2563-10-1
*/
/*
* Main_index
* Display Main_index
* @input  -  
* @output -
* @author Lapatrada Puttamongkol
* @Update Date 2563-10-2
*/
/*
* Main_index
* Display Main_index
* @input  -
* @output -
* @author Kunanya Singmee
* @Update Date 2563-10-5
*/
/*
* Main_index
* Display Main_index
* @input  -
* @output -
* @author Kunanya Singmee
* @Update Date 2564-04-05
*/
?>

<!-- Start style CSS  -->
<style>
.border4 {
    border-left: 4px solid #4b6777;
}

.text4 {
    color: #c1432e;
}

#panel_th_home {
    background-color: #c1432e;
}
</style>
<!-- End style CSS  -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Start col-lg-12 -->
    <div class="col-lg-12">

        <!-- Start card shadow -->
        <div class="card shadow mb-4">

            <!-- Start header  -->
            <div class="card-header py-3" id="panel_th_home">

                <!-- Start panel  -->
                <div class="col-xl-12">
                    <h1 class="m-0 font-weight-bold text-primary"><i class="fa  fa-home text-white"></i>
                        <font color="white">Home</font>
                    </h1>
                </div>
                <!-- End panel  -->

            </div>
            <!-- End header  -->

            <!-- Start content  -->
            <div class="card-body row">
                <!-- Start Menu Manage Form -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>/Evs_Controller/main_manage_form">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Manage Form</div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Manage Form  -->

                <!-- Start Menu Manage Permision -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_permission/Evs_permission/index">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Manage Permission </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Manage Permision  -->

                <!-- Start Menu Manage group -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_group/Evs_group/index">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Manage group </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Manage group  -->

                <!-- Start Menu Manage quota -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_quota/Evs_quota/index">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Manage Quota </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Manage quota  -->


                <!-- Start Menu Manage Report Group -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_form_HR/Evs_form_HR/index">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Report Group </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Manage Report Group  -->

                <!-- Start Menu Manage Form MHRD (Excel) -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_form_HR/Evs_form_HR/excel">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Import Score MHRD </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Manage Form MHRD (Excel)  -->

                <!-- Start Menu Manage grade auto (Excel) -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_form_HR/Evs_form_HR/grade_auto">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Import grade auto </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Manage grade auto (Excel)  -->

                <!-- Start Menu Manage work_attendance (Excel) -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_form_HR/Evs_form_HR/work_attendance">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Import work attendance
                                        </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Manage work attendance (Excel)  -->

                <!-- Start Menu Report for Payroll -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_report/Evs_Report/report_payroll">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Report for Payroll
                                        </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Report for Payroll  -->

                <!-- Start Menu Report for Create MBO -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_report/Evs_Report/report_status_mbo">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Status for Create MBO
                                        </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Report for Create MBO  -->

                <!-- Start Menu Report for Create MBO -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <a href="<?php echo base_url() ?>ev_report/Evs_Report/report_status_evaluation">
                        <div class="card border4 shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Status for evaluation
                                        </div>
                                    </div>
                                    <!-- col-2 -->
                                </div>
                                <!-- row -->
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </a>
                    <!-- a href -->
                </div>
                <!-- End Menu Report for Create MBO  -->


            </div>
            <!-- End card shadow -->

            <!-- Start content  -->
            <div class="card-body row">

                <!-- Start User Manual -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border4 shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text4 text-uppercase mb-1">User Manual ADMIN
                                    </div>
                                    <img src='https://online.anyflip.com/hziou/ucwc/files/shot.jpg'
                                        data-rel='fh5-light-box-demo'
                                        data-href='https://online.anyflip.com/hziou/ucwc/index.html' data-width='900'
                                        data-height='600' data-title='EVS - Admin'>
                                </div>
                                <!-- col-2 -->
                            </div>
                            <!-- row -->
                        </div>
                        <!-- card body -->
                    </div>
                    <!-- card -->
                </div>
                <!-- End User Manual  -->
            </div>
            <!-- End card shadow -->

        </div>
        <!-- End  col-lg-12 -->


    </div>
    <!-- /.container-fluid -->