<?php
/*
* v_main_permission.php
* Display v_main_permission
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-04-06
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
</style>
<!-- END style -->

<script>
$(document).ready(function() {

});
// document ready
</script>
<!-- script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading" height="50px">
                <h2 id="tabmenu">
                    <font color="#ffffff" size="6px"> Form </font>
                </h2>
                <div id="tabmenu">
                    <ul class="nav nav-tabs pull-right tabdrop" id="show_tap">
                    </ul>
                </div>
            </div>
            <!-- heading -->

            <div class="panel-body">
                <div class="tab-content">


                    <!-- form 1-2 -->

                    <!-- ************************************************************************************ -->


                    <br>
                    <?php foreach($emp_info->result() as $row){?>
                    <input type="text" id="pos_id" value="<?php echo $row->Position_ID; ?>" hidden>
                    <input type="text" id="evs_emp_id" value="<?php echo $row->emp_id; ?>" hidden>
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
                    <table class="table table-bordered table-striped m-n">
                        <thead>
                            <tr>
                                <th width="2%" rowspan="2">
                                    <center>
                                        #
                                    </center>
                                </th>
                                <th width="35%" rowspan="2">
                                    <center>
                                        Items
                                    </center>
                                </th>
                                <th width="35%" rowspan="2">
                                    <center>
                                        description
                                    </center>
                                </th>
                                <th width="20%" colspan="2">
                                    <center>
                                        Result
                                    </center>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <center>Score 1</center>
                                </th>
                                <th>
                                    <center>Score 1</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="mhrd_Table">
                            <?php if(sizeof($info_mhrd) != 0){ ?>
                            <?php foreach($info_mhrd->result() as $index => $row){ ?>
                            <tr>
                                <td><?php echo ($index+1) ?></td>
                                <!-- index  -->
                                <td>
                                    <?php echo $row->itm_item_detail_en; ?>
                                    <br>
                                    <?php echo $row->itm_item_detail_th; ?>
                                </td>
                                <!-- items  -->
                                <td>
                                    <?php echo $row->dep_description_detail_en; ?>
                                    <br>
                                    <?php echo $row->dep_description_detail_th; ?>
                                </td>
                                <!-- description -->
                                <td></td>
                                <td></td>
                            </tr>
                            <?php }
                                // for
                                }
                                // if ?>

                        </tbody>
                        <!-- tbody  -->

                        <tfoot>
                            <td colspan="5"></td>
                        </tfoot>
                        <!-- tfoot -->
                    </table>
                    <!-- End table level -->

                    <br>
                    <div class="row">
                    <div class="col-md-12">
                            <a href="<?php echo base_url() ?>ev_form_AP/Evs_form_AP/index">
                                <button class="btn btn-inverse" id="btn_cencel_back">BACK</button>
                            </a>
                            <!-- cancel to back to main  -->

                        </div>
                    </div>
                    <!-- row -->





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