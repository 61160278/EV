<?php
/*
* v_show_evaluation.php
* Display v_show_evaluation
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-06-16
*/  
?>

<style>
#color_head {
    background-color: #3f51b5;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<!-- END style -->

<script>
$(document).ready(function() {
    $("#App1").addClass("active");
});
// document ready 
</script>

<!-- END script  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading" height="50px">
                <h2 id="tabmenu">
                    <font color="#ffffff" size="6px"> Evaluation </font>
                </h2>
                <div id="tabmenu">
                    <ul class="nav nav-tabs pull-right tabdrop" id="show_tap">
                        <li class="active">
                            <a href="#App1" data-toggle="tab">
                                <font>Approver 1</font>
                            </a>
                        </li>
                        <!-- approver1 -->
                        <li>
                            <a href="#App2" data-toggle="tab">
                                <font>Approver 2</font>
                            </a>
                        </li>
                        <!-- approver2 -->
                    </ul>
                </div>
                <!-- tabmenu -->
            </div>
            <!-- heading -->

            <div class="panel-body">
                <div class="tab-content">

                    <div class="tab-pane" id="App1">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>List of employees to approve : Approver 1 </h3>
                            </div>
                            <!-- col-12  -->
                        </div>
                        <!-- row  -->
                        <hr>
                        <table class="table m-n">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee ID</th>
                                    <th>Name - surname</th>
                                    <th>Section Code</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- thead  -->
                            <tbody>
                                <?php 
                                if(sizeof($data_app1) != 0){
                                foreach($data_app1 as $index => $row){ ?>
                                <tr>
                                    <td><?php echo ($index+1); ?></td>
                                    <td><?php echo $row->Emp_ID; ?></td>
                                    <td><?php echo $row->Empname_eng . " " . $row->Empsurname_eng ?></td>
                                    <td><?php echo $row->Sectioncode_ID; ?></td>
                                    <td><?php echo $row->Department; ?></td>
                                    <td><?php echo $row->Position_name; ?></td>
                                    <td>
                                        <a
                                            href="<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/createFROM/<?php echo $row->Emp_ID; ?>">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-info-circle"></i>
                                            </button>
                                        </a>
                                        <!-- a href  -->
                                    </td>
                                </tr>
                                <?php }
                                    // for  
                                }
                                // if 
                                else { ?>
                                <td colspan="7">No list of approved employees.</td>
                                <?php }
                                // else  ?>

                            </tbody>
                            <!-- tbody  -->
                        </table>
                        <!-- table  -->
                    </div>
                    <!-- ****************************************** App1 ****************************************** -->


                    <div class="tab-pane" id="App2">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>List of employees to approve : Approver 2 </h3>
                            </div>
                            <!-- col-12  -->
                        </div>
                        <!-- row  -->
                        <hr>
                        <table class="table m-n">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee ID</th>
                                    <th>Name - surname</th>
                                    <th>Section Code</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- thead  -->
                            <tbody>
                                <?php 
                                if(sizeof($data_app2) != 0){
                                foreach($data_app2 as $index => $row){ ?>
                                <tr>
                                    <td><?php echo ($index+1); ?></td>
                                    <td><?php echo $row->Emp_ID; ?></td>
                                    <td><?php echo $row->Empname_eng . " " . $row->Empsurname_eng ?></td>
                                    <td><?php echo $row->Sectioncode_ID; ?></td>
                                    <td><?php echo $row->Department; ?></td>
                                    <td><?php echo $row->Position_name; ?></td>
                                    <td>
                                        <a
                                            href="<?php echo base_url(); ?>ev_form_AP/Evs_form_AP/createFROM/<?php echo $row->Emp_ID; ?>">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-info-circle"></i>
                                            </button>
                                        </a>
                                        <!-- a href  -->
                                    </td>
                                </tr>
                                <?php }
                                    // for  
                                }
                                // if 
                                else { ?>
                                <td colspan="7">No list of approved employees.</td>
                                <?php }
                                // else  ?>

                            </tbody>
                            <!-- tbody  -->
                        </table>
                        <!-- table  -->
                    </div>
                    <!-- ****************************************** App2 ****************************************** -->


                </div>
                <!-- tab-content -->

            </div>
            <!-- body -->
        </div>
        <!-- panel-indigo -->
    </div>
    <!-- col-12 -->
</div>
<!-- row -->