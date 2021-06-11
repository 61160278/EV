<?php
/*
* topbar
* Display topbar template
* @input    
* @output
* @author Kunanya Singmee
* @Create Date 2563-09-3
*/

?>
<!-- <style>
#topnav .navbar-brand {
    background: url("../img/logo.png") no-repeat left 0 center;
}
</style> -->
<header id="topnav" class="navbar navbar-fixed-top navbar-deep-orange" role="banner">

    <div class="logo-area">
        <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
            <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
                <span class="icon-bg">
                    <i class="ti ti-menu"></i>
                </span>
            </a>
        </span>
        <div>
            <a class="navbar-brand" href="<?php echo base_url(); ?>/Evs_all_manage/index"></a>
        </div>
    </div><!-- logo-area -->

    <ul class="nav navbar-nav toolbar pull-right">
        <li class="dropdown toolbar-icon-bg">
            <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                <img class="img-circle" src="http://placehold.it/300&text=Placeholder" alt="" />
            </a>
            <ul class="dropdown-menu userinfo arrow">
                <li><a href="<?php echo base_url(); ?>/Auth/logout"><i class="ti ti-shift-right"></i><span>Sign Out</span></a></li>
            </ul>
        </li>

    </ul>

</header>