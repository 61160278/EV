<?php
/*
* sidebar
* Display sidebar template
* @input    
* @output
* @author Kunanya Singmee
* @Create Date 2563-09-3
*/

/*
* sidebar
* Display sidebar template
* @input    
* @output
* @author Kunanya Singmee
* @Update Date 2563-09-23
*/
?>


<!--Start  side bar -->
<aside id="left-panel" class="left-panel">
    <!-- Start tap navigator -->
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">



            <!-- Start tap menu sidebar   -->
            <ul class="nav navbar-nav">
                <li class="menu-item">
                    <a href="<?php echo base_url()?>Evs_Controller/index"><i class="menu-icon fa fa-home"
                            style="color:"></i>Home </a>
                </li>
                <!-- Home page  -->

                <li class="menu-title">Menu</li>
                <!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-tachometer"></i>Manage forms</a>
                    <!-- menu Manage forms  -->

                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-book"></i><a href="<?php echo base_url()?>Evs_form/main_form">
                                Manage forms</a></li>
                        <!-- menu form  -->
                        <li><i class="menu-icon fa fa-group (alias)"></i><a
                                href="<?php echo base_url()?>Evs_position/main_position"> Manage position</a></li>
                        <!-- menu position -->
                        <li><i class="menu-icon fa fa-pencil-square"></i><a
                                href="<?php echo base_url()?>Evs_indicator/main_indicator"> Manage items</a></li>
                        <!-- menu indicator -->
                    </ul>

                </li>
                <!-- menu manage forms  -->

                <li class="menu-item">
                    <a href="<?php echo base_url() ?>ev_permission/Evs_permission/index"><i
                            class="menu-icon fa fa-tasks" style="color:"></i>Manage Permision </a>
                </li>
                <!-- Manage Permision  -->

                <li class="menu-item">
                    <a href="<?php echo base_url() ?>ev_group/Evs_group/index"><i class="menu-icon fa fa-users"
                            style="color:"></i>Manage group </a>
                </li>
                <!-- Manage group  -->

                <li class="menu-item">
                    <a href="<?php echo base_url() ?>ev_quota/Evs_quota/index"><i class="menu-icon fa  fa-bar-chart-o"
                            style="color:"></i>Manage quota </a>
                </li>
                <!-- Manage quota  -->

                <li class="menu-item">
                    <a href="<?php echo base_url() ?>ev_form_HR/Evs_form_HR/index"><i class="menu-icon fa fa-signal"
                            style="color:"></i>Report Group </a>
                </li>
                <!-- Manage Report Group -->

                <li class="menu-item">
                    <a href="<?php echo base_url() ?>ev_form_HR/Evs_form_HR/excel"><i class="menu-icon fa fa-upload"
                            style="color:"></i>Import Score MHRD</a>
                </li>
                <!-- Manage Report Group -->


            </ul>
            <!-- End tap menu sidebar  -->
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <!--End tap navigator  -->

</aside>
<!-- End side-bar -->