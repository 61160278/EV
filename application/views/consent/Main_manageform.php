<?php
/*
* Main_manageform.php
* Display Top Management level
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2563-10-1
*/  
/*
* Main_manageform.php
* Display Top Management level
* @input    
* @output
* @author Tippawan Aiemsaad
* @Update Date 2563-10-2
*/ 
/*
/*
* Main_manageform.php
* Display Top Management level
* @input    
* @output
* @author Jirayu Jaravichit
* @Update Date 2563-10-2
*/ 
/*
* Main_manageform.php
* Display Top Management level
* @input    
* @output
* @author   Kunanya Singmee
* @Update Date 2563-10-5
*/
/*
* Main_manageform.php
* Display function setting yaer and grade
* @input  year and pattern grade
* @output year and pattern grade 
* @author   Kunanya Singmee
* @Update Date 2563-12-3
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

.pad1 {
    padding: 5px;
    border-radius: 5px
}

#panel_th_manage {
    background-color: #c1432e;
}
</style>
<!-- End style CSS  -->

<script>
$(document).ready(function() {

    <?php $row = $patt_year->row(); ?>

    $("#ptn_grade").val(<?php echo $row->pay_pattern; ?>);
    // set value to select 

});

// document ready



function clear_form() {
    document.getElementById("form_insert_year").reset();
    $("#ptn_grade").val(<?php echo $row->pay_pattern; ?>);
}
// clear_form 

function check_select() {
    $("#ptn_grade").css("background-color", "#ffffff");
    $("#ptn_grade").css("border-style", "solid");
    $("#ptn_grade").css("border-color", "#d9d9d9");

    $("#check_value").text("");
    $("#check_value").css("color", "#ffffff");

}
// check_select

function validate() {

    var pay_pattern = document.getElementById("ptn_grade").value;
    console.log(pay_pattern);

    if (pay_pattern == 0) {
        $("#ptn_grade").css("background-color", "#ffe6e6");
        $("#ptn_grade").css("border-style", "solid");
        $("#ptn_grade").css("border-color", "#e60000");

        $("#check_value").text("Please select grade pattern");
        $("#check_value").css("color", "#e60000");

        return false;
    }
    // if 
    else {
        return true;
    }
    // else 

}
//    validate form 
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Start col-lg-12 -->
    <div class="col-xl-12 col-lg-12">

        <!-- Start card shadow -->
        <div class="card shadow mb-4">

            <!-- Start header  -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                id="panel_th_manage">

                <!-- Start panel  -->
                <div class="col-xl-12">
                    <h1 class="m-0 font-weight-bold text-primary">
                        <a href="<?php echo base_url(); ?>/Evs_Controller/index">
                            <i class="fa fa-chevron-circle-left text-white"></i>
                        </a>
                        <i class="fa  fa-dashboard text-white"></i>
                        <font color="white">Management form</font>
                    </h1>
                </div>
                <!-- End panel  -->

            </div>
            <!-- End header  -->

            <!-- Start content  -->
            <div class="card-body">

                <!-- Start status  -->
                <div class="row">

                    <!-- Start Widgets -->
                    <div class="col-lg-4 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat">Positions title </div>
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                                <span class="count">
                                                    <?php 
                                                    $count_pos = 0;
                                                    // count of position in level

                                                    // start foreach
                                                    foreach ($info_pos->result() as $row) {
                                                        $count_pos++;
                                                    } 
                                                    // end foreach
                                                    
                                                    echo $count_pos;
                                                    // display count of position

                                                    ?>
                                                </span>
                                            </div>
                                            <!-- count position  -->
                                            <div class="stat-heading">Positions</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widgets  -->

                    <!-- Start Widgets -->
                    <div class="col-lg-4 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="stat-content">

                                        <div class="stat">
                                            <?php 
                                            
                                            
                                            $row = $patt_year->row();

                                            if($row != NULL){
                                                $year = "FC : ".$row->pay_year;
                                                $pattern = "Pattern : ".$row->pay_pattern;
                                            }
                                            // if show 
                                            else {
                                                $year = "Please setting grade patterns and fiscal year ";
                                                $pattern = "";
                                            }

                                            echo $year;
                                            // display Fiscal year

                                        ?>

                                        </div>
                                        <div class="text-left dib">
                                            <br>

                                            <!-- start patten grade -->
                                            <div class="stat">
                                                <?php 
                                                    echo $pattern;
                                                    // display Grade pattern
                                                ?>
                                            </div>
                                            <!--End  pattern grade -->
                                        </div>
                                        <!-- text-left  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widgets  -->

                    <!-- Start Widgets -->
                    <div class="col-lg-4 col-md-8">
                        <div class="card">

                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <a href="#mediumModal">
                                        <div class="stat-icon dib" data-toggle="modal" data-target="#mediumModal">
                                            <i class="fa fa-cogs"></i>
                                        </div>
                                        <!-- icon  -->
                                    </a>
                                    <!-- href to modal  -->
                                    <div class="stat-content">
                                        <div class="stat">Setting</div>
                                        <div class="stat"><i class="fa fa-calendar-o"></i> Fiscal year</div>
                                        <div class="stat"><i class="fa fa-sort-alpha-asc"></i> Grade patterns</div>
                                    </div>
                                    <!-- text  -->
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- End Widgets  -->


                </div>
                <!-- End status -->




                <!-- Start row menu -->
                <div class="row">
                    <!-- Start Menu Manage Form -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <a href="<?php echo base_url();?>/Evs_form/main_form">
                            <div class="card border4 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Manage forms </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Menu Manage Form  -->

                    <!-- Start Menu Manage position -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <a href="<?php echo base_url();?>/Evs_position/main_position">
                            <div class="card border4 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Manage position
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Menu Manage position  -->

                    <!-- Start Menu Manage indicator -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <a href="<?php echo base_url();?>/Evs_indicator/main_indicator">
                            <div class="card border4 shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text4 text-uppercase mb-1">Menu
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Manage items
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Menu Manage indicator  -->

                </div>
                <!-- End row menu -->

                <div class="row">
                    <div class="col-sm-12" align="right">
                        <a href="<?php echo base_url(); ?>/Evs_Controller/index">
                            <button type="button" class="btn btn-secondary">Back</button>
                        </a>
                    </div>
                    <!-- Back to main menu  -->
                </div>

            </div>
            <!-- End content  -->

        </div>
        <!-- End card shadow -->

    </div>
    <!-- End  col-lg-12 -->


</div>
<!-- /.container-fluid -->

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <form method="POST" action="<?php echo base_url(); ?>/Evs_Controller/insert_year_pattern"
            onSubmit="return validate()" id="form_insert_year">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Setting grade patterns and fiscal year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- header  -->

                <div class="modal-body">
                    <div class="row">
                        <div class="col-3" align="right">
                            <label for="select" class=" form-control-label">Fiscal year : </label>
                        </div>
                        <!-- col-3 label -->
                        <div class="col-4">

                            <input id="fiscal_year" name="fiscal_year" type="number" class="form-control"
                                aria-required="true" value="<?php echo date("Y"); ?>" disabled>
                        </div>
                        <!-- col-4 input year  -->
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-3" align="right">
                            <label for="select" class=" form-control-label">Grade patterns : </label>
                        </div>
                        <!-- col-3 label -->

                        <div class="col-4">
                            <select id="ptn_grade" name="ptn_grade" class="form-control" onchange="check_select()">
                                <option value="0">Select grade pattern</option>
                                <option value="1">Pattern 1</option>
                                <option value="2">Pattern 2</option>
                                <option value="3">Pattern 3</option>
                                <option value="4">Pattern 4</option>
                            </select>
                        </div>
                        <!-- col-4 select  -->

                        <div class="col-4">
                            <p id="check_value"></p>
                            <!-- notification Select grade pattern -->
                        </div>
                    </div>
                    <!-- row  -->


                    <!-- choose grade pattern  -->

                </div>
                <!-- body modal -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="clear_form()">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
                <!-- footer  -->
            </div>
            <!-- modal-content -->
        </form>
        <!-- form  -->
    </div>
    <!-- modal-dialog modal-lg -->
</div>
<!-- modal  -->