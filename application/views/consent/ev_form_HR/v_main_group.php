<?php
/*
* v_main_form.php
* Display v_main_form
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-04-06
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
    $("#show_group").DataTable();
});
// document ready

</script>
<!-- END script  -->


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Report Group </b></font>
                </h2>
                
            </div>
            <!-- heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-11">
                        <label class="control-label">
                            <strong>
                                <font size="5px">List of employees group to report grade </font>
                            </strong>
                        </label>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>

                <table class="table table-bordered m-n" id="show_group">
                    <thead>
                        <tr>
                            <th width="2%">
                                <center> No.</center>
                            </th>
                            <th width="15%">
                                <center>Company</center>
                            </th>
                            <th width="15%">
                                <center>Group</center>
                            </th>
                            <th width="15%">
                                <center>Head dap.</center>
                            </th>
                            <th width="20%">
                                <center>Management</center>
                            </th>

                        </tr>
                    </thead>
                    <!-- thead -->

                    <tbody>
                        <?php 
                                $table_index = 0;
                                if($data_group != 0){
							    foreach($data_group as $index => $row) {
                                
                                ?>
                        <tr>
                            <input name="Emp_ID" type="text" value="<?php echo $row->Emp_ID; ?>" hidden>
                            <td>
                                <center>
                                    <?php echo $index+1; ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php if($row->gru_company_id == 1){
                                            echo "SDM"; 
                                        }
                                        // if
                                        else {
                                            echo "SKD";  
                                        }
                                        // else        
                                    ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo  $row->gru_name; ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng; ?>
                                </center>
                            </td>

                            <td>
                                <center>
                                    <a
                                        href="<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/table_goup/<?php echo $row->Emp_ID ?>/<?php echo $row->gru_id ?>">
                                        <button class="btn btn-info">
                                            <i class="ti ti-search"></i> View group
                                        </button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        <?php 
                            $table_index += 1;
                                    }
                                    // foreach  
                                }
                                // if ?>

                        <input type="text" id="table_index" value="<?php echo $table_index; ?>" hidden>
                    </tbody>
                    <!-- tbody  -->

                </table>
                <!-- table  -->

                <br>
                <div class="row">
                    <div class="col-sm-8" align="left">
                        <a href="<?php echo base_url(); ?>Evs_Controller/index">
                            <button class="btn btn-inverse"></i> Back</button>
                        </a>
                    </div>
                    <!-- col-8  -->

                </div>
                <!-- row  -->
            </div>
            <!-- body  -->
        </div>
        <!-- panel  -->
    </div>
    <!-- col-12  -->
</div>
<!-- row  -->