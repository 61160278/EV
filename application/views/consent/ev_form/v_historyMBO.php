<?php
/*
* v_historyMBO.php
* Display v_historyMBO
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-04-26
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

th {
    text-align: center;
}
</style>
<!-- END style -->

<script>
$(document).ready(function() {

});
// document ready

function cancel_form() {
    window.location.href = "<?php echo base_url();?>/ev_form/Evs_form/index";
}
// function cancel_form
</script>
<!-- script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading" height="50px">
                <h2 id="tabmenu">
                    <font size="6px">History MBO</font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12" align="center">
                        <label class="control-label">
                            <strong>
                                <font size="3px">My form MBO</font>
                            </strong>
                        </label>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->

                <br>
                <?php foreach($emp_info->result() as $row){?>
                <input type="text" id="pos_id" value="<?php echo $row->Position_ID; ?>" hidden>
                <input type="text" id="row_index" value="" hidden>

                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label"><strong>
                                <font size="3px">Employee ID : </font>
                            </strong></label>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <p id="emp_id"><?php echo $row->Emp_ID; ?></p>
                        <?php $emp_employee_id = $row->Emp_ID; ?>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <label class="control-label"><strong>
                                <font size="3px">Name : </font>
                            </strong></label>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <p id="emp_name"><?php echo $row->Empname_eng; ?></p>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <label class="control-label"><strong>
                                <font size="3px">Surname : </font>
                            </strong></label>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <p id="emp_lname"><?php echo $row->Empsurname_eng; ?></p>
                    </div>
                    <!-- col-md-2 -->
                </div>
                <!-- row -->
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <label class="control-label"><strong>
                                <font size="3px">Section Code : </font>
                            </strong></label>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <p id="emp_sec"><?php echo $row->Sectioncode_ID; ?></p>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <label class="control-label"><strong>
                                <font size="3px">Department : </font>
                            </strong></label>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <p id="emp_dep"><?php echo $row->Department; ?></p>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <label class="control-label"><strong>
                                <font size="3px">Position : </font>
                            </strong></label>
                    </div>
                    <!-- col-md-2 -->
                    <div class="col-md-2">
                        <p id="emp_pos"><?php echo $row->Position_name; ?></p>
                    </div>
                    <!-- col-md-2 -->
                </div>
                <!-- row -->
                <?php }; ?>
                <!-- show infomation employee -->
                <hr>


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-ctrls"></div>
                            </div>
                            <!-- heading -->

                            <div class="panel-body no-padding">
                                <table id="his_mbo" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Year’s</th>
                                            <th>Form PE</th>
                                            <th>Form CE</th>
                                            <th>Reason</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- thead  -->
                                    <tbody>
                                        <?php
                                        // print_r($get_form);
                                        $count = 0;
                                         foreach($get_form as $index => $row){ ?>

                                        <tr>
                                            <td align="center"><?php echo $index+1; ?></td>
                                            <td align="center"><?php echo $row->pay_year; ?></td>
                                            <td><?php echo $row->ps_form_pe; ?></td>
                                            <td><?php echo $row->ps_form_ce; ?></td>
                                            <td align="center"></td>
                                            <td align="center">
                                                <?php if($status_form[$index] == 1){ ?>
                                                <a
                                                    href="<?php echo base_url(); ?>ev_form/Evs_form/show_his/<?php echo $emp_employee_id.":".$row->pay_id; ?>">
                                                    <button class="btn btn-info" id="his_mbo">
                                                        <i class="ti ti-info-alt"></i>
                                                    </button>
                                                </a>
                                                <?php }
                                            //if 
                                            else if($status_form[$index] == 0){ ?>
                                                <button class="btn btn-info" disabled>
                                                    <i class="ti ti-info-alt"></i>
                                                </button>
                                                <?php }
                                            // else if ?>
                                            </td>
                                        </tr>
                                        <!-- show history  -->
                                        <?php 
                                        $count++;
                                        }; ?>
                                        <!-- foreach  -->

                                        <input type="text" id="count" value="<?php echo $count;?>" hidden>
                                    </tbody>
                                    <!-- tbody  -->
                                </table>
                                <!-- table  -->
                            </div>
                            <!-- panel-body -->
                            <div class="panel-footer"></div>
                        </div>
                        <!-- panel -->
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->

                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-inverse" id="cancel_back" onclick="cancel_form()">BACK</button>
                    </div>
                    <!-- col-md-6 -->
                </div>
                <!-- row -->
            </div>
            <!-- body -->
        </div>
        <!-- panel-indigo -->
    </div>
    <!-- col-12 -->
</div>
<!-- row -->


<!-- ****************************************** modal ************************************** -->