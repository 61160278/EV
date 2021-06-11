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
                                    <img src="http://placehold.it/300&text=Placeholder"
                                        class="img-responsive img-circle">
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
                    <div class="widget stay-on-collapse" id="widget-sidebar">
                        <nav role="navigation" class="widget-body">


                            <ul class="acc-menu">
                                <li><a href="<?php echo base_url() ?>Evs_all_manage/index"><i
                                            class="fa fa-home"></i><span>HOME</span></span></a></li>
                                <li class="nav-separator"><span>Menu</span></li>
                                <li><a href="<?php echo base_url() ?>ev_permission/Evs_permission/index"><i
                                            class="fa fa-user"></i><span>Manage permission</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_group/Evs_group/index"><i
                                            class="fa fa-users"></i><span>Manage group</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_quota/Evs_quota/index"><i
                                            class="fa fa-bar-chart-o"></i><span>Manage quota</span></span></a></li>
                                <li><a href="<?php echo base_url()?>Evs_Controller/index"><i
                                            class="fa fa-book"></i><span>Manage form by Amin</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_form/Evs_form/index"><i
                                            class="fa fa-book"></i><span>Manage form by user</span></span></a></li>
                                <li><a href="<?php echo base_url() ?>ev_form_AP/Evs_form_AP/index"><i
                                            class="fa fa-book"></i><span>Manage form by Department
                                            head</span></span></a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    <ol class="breadcrumb">
                    </ol>
                    <div class="container-fluid">