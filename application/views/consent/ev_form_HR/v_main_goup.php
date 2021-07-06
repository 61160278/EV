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
    if (<?php echo $chack_save ?> = "Chack") {
        document.getElementById("save").disabled = true;
    }
    // if
    else {
        document.getElementById("save").disabled = false;
    }
    // else
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


                <table class="table table-bordered table-striped m-n">
                    <thead>
                        <tr>
                            <th rowspan="2" width="2%">
                                <center> No.</center>
                            </th>
                            <th rowspan="2" width="15%">
                                <center>Employee id</center>
                            </th>
                            <th rowspan="2" width="15%">
                                <center>Name</center>
                            </th>
                            <th rowspan="2" width="15%">
                                <center>Group</center>
                            </th>
                            <th rowspan="2" width="20%">
                                <center>Management</center>
                            </th>

                        </tr>
                    </thead>
                    <!-- thead -->
                    <tbody id="row_mbo">
                        <?php 
                                $table_index = 0;
							    foreach($data_group as $index => $row) {
                                
                                ?>
                        <input name="Emp_ID" type="text" value="<?php echo $row->Emp_ID ?>" hidden>
                        <tr>
                            <td>
                                <center>
                                    <?php echo $index+1 ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo  $row->gru_name ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php if($row->gru_company_id == 1){
                                            echo "SDM"; } 
                                            else {
                                            echo "SKD";  
                                            }        
                                    ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a
                                        href="<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/table_goup/<?php echo $row->Emp_ID ?>/<?php echo $row->gru_name ?>">
                                        <button class="btn btn-info">
                                            <i class="ti ti-search"></i> View goroup
                                        </button>
                                    </a>
                                </center>
                            </td>

                        </tr>
                        <?php 
                            $table_index += 1;
                
                                    } ?>

                        <input type="text" id="table_index" value="<?php echo $table_index; ?>" hidden>
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6">
                      
                    </div>
                    <!-- col-6  -->
                    <div class="col-md-6" align="right">

                    </div>
                    <!-- col-6  -->
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