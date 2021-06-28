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

    if ("<?php echo $chack_save ?>" == "Chack") {
        document.getElementById("save").disabled = false;
    }
    // if
    else {
        document.getElementById("save").disabled = true;
    }
    // else 
});
// document ready

function save_group_to_HR() {

    var Emp_ID = [];
    var index = document.getElementById("table_index").value;

    for (i = 0; i < index; i++) {
        Emp_ID.push(document.getElementById("Emp_ID" + i).value);
    }
    // for 

    console.log(Emp_ID);
    console.log(index);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/save_group_to_HR",
        data: {
            "Emp_ID": Emp_ID,
            "index": index
        },
        success: function(data) {
            console.log(data);
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// save_group_to_HR
</script>
<!-- END script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Evaluation </b></font>
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
                                <center>employee id</center>
                            </th>
                            <th rowspan="2" width="15%">
                                <center>name</center>
                            </th>
                            <th rowspan="2" width="15%">
                                <center>group</center>
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
                                if($data_emp_id != $row->emp_employee_id ) { ?>
                        <input name="Emp_ID" id="Emp_ID<?php echo $index; ?>" type="text"
                            value="<?php echo $row->emp_employee_id ?>" hidden>
                        <tr>
                            <td>
                                <center>
                                    <?php echo $index+1 ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo  $row->emp_employee_id ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->gru_name ?>
                                </center>
                            </td>
                            <td>
                                <?php 
                            
							            if($data_chack_form[$index]  != 0){
                                
                                        ?>
                                <center>
                                    <a
                                        href="<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/createFROM/<?php echo $row->emp_employee_id ?>">
                                        <button class="btn btn-warning">
                                            <i class="ti ti-search"></i> Edit Information
                                        </button>
                                    </a>
                                </center>
                                <?php 
                                        }
							            else{
                                        ?>
                                <center>
                                    <button class="btn btn-warning" disabled>
                                        <i class="ti ti-search"></i> Edit Information
                                    </button>
                                </center>
                                <?php 
                                        }
                                        ?>

                            </td>
                        </tr>
                        <?php 
                            $table_index += 1;
                                         }
                                         // if
                                    }
                                    // foreach 
                    
                        ?>

                        <input type="text" id="table_index" value="<?php echo $table_index; ?>" hidden>
                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- table  -->

                <br>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <!-- col-6  -->
                    <div class="col-md-6" align="right">
                        <button id="save" class="btn btn-success" onclick="save_group_to_HR()"> Save</button>
                    </div>
                    <!-- col-6  -->
                </div>
                <!-- row  -->
            </div>
            <!-- body -->
        </div>
        <!-- panel -->
    </div>
    <!-- col-12  -->
</div>
<!-- row  -->