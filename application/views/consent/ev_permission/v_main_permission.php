<?php
/*
* v_main_permission.php
* Display v_main_permission
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2563-10-1
*/  
?>

<style>
h2 {
    color: white;
}

.logo {
    background-color: black;
}

.margin {
    margin-top: 5px;
}

.alert-info {
    color: #BCBEBF;
    background-color: #DEE1E3;
    border-color: #BCBEBF;
}

.alert-info,
.alert-info h1,
.alert-info h2,
.alert-info h3,
.alert-info h4,
.alert-info h5,
.alert-info h6,
.alert-info small {
    color: #828282;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<!-- END Style -->


<div class="col-md-12" align="left">
    <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>

        <div class="panel-heading">
            <div align="right">
                <h2>
                    <font size="6px"><i class="fa fa-tasks"></i>Manage Permission</font>
                </h2>
            </div>
        </div>
        <!-- heading -->

        <form method="POST" action="<?php echo base_url(); ?>/ev_permission/Evs_permission/select_emp">
            <div class="panel-body">
                <div class="alert alert-info">
                    <h3><b>Note !</b></h3>
                    <h4>Please select Probation due date</h4>
                </div>
                <!--  alert -->
                <div class="form-group">
                    <div class="row">
                        <label for="checkbox" class="control-label col-md-3 margin" align="center">
                            <font size="4px"><b>Start date
                                    before</b></font>
                        </label>
                        <!-- col-3 -->
                        <div class="col-md-3">
                            <div class="input-group date" id="datepicker-pastdisabled">
                                <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                                <input class="form-control" id="datestart" type="date" name="Date">
                            </div>
                        </div>
                        <!-- col-8 -->
                    </div>
                </div>
                <!-- form group-->

                <div class="row">
                    <div class="col-sm-8" align="left">
                        <a href="<?php echo base_url(); ?>Evs_Controller/index">
                            <button class="btn btn-inverse">BACK</button>
                        </a>
                    </div>
                    <!-- col - 8 -->
                    <div class="col-sm-4" align="right">
                        <input type="submit" class="btn btn-success btn" value="Submit">
                    </div>
                    <!-- col-sm-4 -->
                </div>
                <!-- row -->
            </div>
        </form>
        <!-- body -->
    </div>
    <!-- indigo-->
</div>
<!-- col-md-12 -->