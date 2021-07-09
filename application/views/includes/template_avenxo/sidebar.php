<?php
/*
* sidebar
* Display sidebar template
* @input    
* @output
* @author Kunanya Singmee
* @Create Date 2563-09-3
*/

?>

<div id="wrapper">
    <div id="layout-static">
        <div class="static-sidebar-wrapper sidebar-black">
            <div class="static-sidebar">
                <div class="sidebar">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="userinfo">
                                <div class="avatar">
                                    <!-- <img src="http://10.73.148.5/DBMC/IMG/emp120/<?echo $_SESSION["UsEmp_ID"]?>.jpg"
                                        class="img-responsive img-circle"> -->
                                </div>
                                <div class="info">
                                    <span class="username" id="username_en"><?php echo $_SESSION['UsName_EN']; ?></span>
                                    <br>
                                    <span class="username" id="username_th"><?php echo $_SESSION['UsName_TH']; ?></span>
                                    <br>
                                    <span id="department"><?php echo $_SESSION['UsDepartment']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget -->
                    <div class="widget stay-on-collapse" id="widget-sidebar">
                        <nav role="navigation" class="widget-body">


                            <ul class="acc-menu">
                                <?php if($_SESSION['UsRole'] == 1){ ?>
                                <li><a href="<?php echo base_url() ?>Evs_all_manage/index_u"><i
                                            class="fa fa-home"></i><span>HOME</span></span></a></li>
                                <li class="nav-separator"><span>Menu</span></li>
                                <li><a href="<?php echo base_url() ?>ev_form/Evs_form/index"><i
                                            class="fa fa-pencil-square"></i><span>Create Form</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_form/Evs_form/show_ststus"><i
                                            class="fa fa-book"></i><span>Status Form</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_form_AP/Evs_form_AP/report_grade"><i
                                            class="fa fa-bar-chart-o"></i><span>Report Grade</span></span></a></li>

                                <?php }
                                // if
                                else if($_SESSION['UsRole'] == 2) { ?>
                                <li><a href="<?php echo base_url() ?>Evs_all_manage/index_a"><i
                                            class="fa fa-home"></i><span>HOME</span></span></a></li>
                                <li class="nav-separator"><span>Menu</span></li>
                                <li><a href="<?php echo base_url() ?>ev_form/Evs_form/index"><i
                                            class="fa fa-pencil-square"></i><span>Create Form</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_form_HD/Evs_form_HD/index"><i
                                            class="fa fa-tachometer"></i><span>Approve group</span></span></a></li>
								<li><a href="<?php echo base_url() ?>ev_form/Evs_form/show_ststus"><i
                                            class="fa fa-book"></i><span>Status Form</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_form_HD/Evs_form_HD/report_grade"><i
                                            class="fa fa-bar-chart-o"></i><span>Report Grade</span></span></a></li>
                                <?php }
                                //else if 
                                else if($_SESSION['UsRole'] == 3) { ?>
                                <li><a href="<?php echo base_url()?>Evs_Controller/index"><i
                                            class="fa fa-home"></i><span>HOME</span></span></a></li>
                                <li class="nav-separator"><span>Menu</span></li>
                                <li><a href="<?php echo base_url()?>Evs_Controller/index"><i
                                            class="fa fa-book"></i><span>Manage form</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_permission/Evs_permission/index"><i
                                            class="fa fa-tasks"></i><span>Manage permission</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_group/Evs_group/index"><i
                                            class="fa fa-users"></i><span>Manage group</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_quota/Evs_quota/index"><i
                                            class="fa fa-bar-chart-o"></i><span>Manage quota</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_form_HR/Evs_form_HR/index"><i
                                            class="fa fa-signal"></i><span>Report group</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_form_HR/Evs_form_HR/excel"><i
                                            class="fa fa-upload"></i><span>Import Score MHRD</span></span></a></li>
                                <?php }
                                //else if ?>

                            </ul>
                            <!-- ul  -->
                        </nav>
                        <!-- nav -->
                    </div>
                    <!-- widget -->
                </div>
                <!-- sidebar -->
            </div>
            <!-- static-sidebar -->
        </div>
        <!-- static-sidebar-wrapper -->

        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    <ol class="breadcrumb">
                    </ol>
                    <div class="container-fluid">