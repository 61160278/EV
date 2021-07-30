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
    var checkbox_ex = [];
    var Emp_ID = [];
    var comment = [];
    var index = document.getElementById("table_index").value;

    for (i = 0; i < index; i++) {
        Emp_ID.push(document.getElementById("Emp_ID" + i).value);
        comment.push(document.getElementsByName("comment")[i].value);
    }
    // for 


    $('input[name = choose_reject]').each(function(index) {
        if ($(this).prop("checked") == true) {
            checkbox_ex.push(1);
        } else {
            checkbox_ex.push(0);
        }
    });

    console.log(Emp_ID);
    console.log(index);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/reject_group_reject_to_AP",
        data: {
            "Emp_ID": Emp_ID,
            "index": index,
            "checkbox_ex": checkbox_ex,
            "comment": comment
        },
        success: function(data) {
            console.log(data);
            main_index();
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

function main_index() {
    window.location.href = "<?php echo base_url();?>/ev_form_HD/Evs_form_HD/index";
}
// main_index 
</script>
<!-- END script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Approve Group reject</b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">
                <table class="table table-bordered table-striped m-n">
                    <thead>
                        <tr>
                            <th width="2%">
                                <center> No.</center>
                            </th>
                            <th width="15%">
                                <center>Employee id</center>
                            </th>
                            <th width="15%">
                                <center>Name-Surname</center>
                            </th>
                            <th width="15%">
                                <center>Group</center>
                            </th>
                            <th width="15%">
                                <center>Comment</center>
                            </th>
                            <th width="20%">
                                <center>Management</center>
                            </th>
                            <th  width="20%">
                                <center>Comment</center>
                            </th>
                        </tr>
                    </thead>
                    <!-- thead -->

                    <tbody id="row_mbo">
                        <?php 
                                $status = [];

                                if(sizeof($data_status) != 0){
                                    foreach($data_status as $row){
                                        array_push($status,$row);
                                    }
                                    // foreach 
                                }
                                // if
                                $status_index = 0;
                                $table_index = 0;
                                if(sizeof($status) != 0){

							    foreach($data_group as $index => $row) {
                                   if($status_index >= sizeof($status)){ $status_index = sizeof($status)-1;}

                                if($status[$status_index] == $row->emp_employee_id ) { ?>
                        <input name="Emp_ID" id="Emp_ID<?php echo $table_index; ?>" type="text"
                            value="<?php echo $row->emp_id ?>" hidden>
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
                                <center>
                                    <?php echo $data_comment[$status_index] ?>
                                </center>
                            </td>
                            <td>
                                <?php 
                            
							            if($data_chack_form[$index]  != 0){
                                
                                        ?>
                                <center>

                                    <input type="checkbox" name="choose_reject" value="">

                                </center>
                                <?php 
                                        }
							            else{
                                        ?>
                                <center>
                                    <input type="checkbox" name="choose_reject" value="" disabled>

                                </center>
                                <?php 
                                        }
                                        ?>

                            </td>
                            <td>
                                <center>
                                    <textarea type="text" name="comment" placeholder="Enter comment" class="form-control"></textarea>
                                </center>
                            </td>
                        </tr>
                        <?php 
                            $status_index += 1;
                            $table_index += 1;
                                         }
                                         // if
                                    }
                                    // foreach 
                                }
                                // if
                                else { ?>
                        <td colspan="7">No list of approved employees.</td>
                        <?php }
                                    // else  ?>

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
                        <?php if(sizeof($status) != 0){ ?>
                        <button id="save" class="btn btn-success" onclick="save_group_to_HR()"> Save</button>
                        <?php } 
                    // if
                    else {?>
                        <button class="btn btn-success" disabled> Save</button>
                        <?php }
                    // else ?>
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