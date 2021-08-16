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
    $('#show_report').DataTable();
});
// document ready

function save_grade() {
    Emp_ID = [];
    grade = [];
    comment = [];
    var index = document.getElementById("table_index").value;

    console.log(index);

    for (i = 0; i < index; i++) {

        Emp_ID.push(document.getElementsByName("Emp_ID")[i].value);
        grade.push(document.getElementsByName("grade")[i].value);
        comment.push(document.getElementsByName("comment")[i].value);

    }
    // for
    console.log(Emp_ID);
    console.log(grade);
    console.log(comment);



    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/save_grade",
        data: {
            "Emp_ID": Emp_ID,
            "grade": grade,
            "comment": comment
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

    window.location.href = "<?php echo base_url();?>ev_form_HR/Evs_form_HR/index";
}
</script>
<!-- END script  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Report Grade </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-11">
                        <label class="control-label">
                            <strong>
                                <font size="5px">List of employees to report grade </font>
                            </strong>
                        </label>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->

                <table class="table table-bordered table-striped m-n" id="show_report">
                    <thead>
                        <tr>
                            <th width="2%">
                                <center> No.</center>
                            </th>
                            <th  width="15%">
                                <center>Employee id</center>
                            </th>
                            <th width="15%">
                                <center>Name-Surname</center>
                            </th>
                            <th width="15%">
                                <center>Group</center>
                            </th>
                            <th  width="20%">
                                <center>Grade</center>
                            </th>
                            <th width="20%">
                                <center>Comment</center>
                            </th>

                        </tr>
                    </thead>
                    <!-- thead -->
                    <tbody>
                        <?php 
                        		print_r($data_group);
                                $table_index = 0;
                            
							    foreach($data_group as $index => $row) {
                                if($data_emp_id != $row->emp_employee_id) {
                                
                                ?>
                        <input name="Emp_ID" type="text" value="<?php echo $row->emp_id ?>" hidden>
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
                                    <?php echo $data_grade[$index]; ?>
                                    <input type="text" name="grade" value="<?php echo $data_grade[$index]; ?>" hidden>
                                </center>
                            </td>
                            <td>
                                <center>


                                    <textarea type="text" name="comment" placeholder="Enter comment"
                                        class="form-control"></textarea>

                                </center>
                            </td>
                        </tr>
                        <?php 
                            $table_index += 1;
                                         }
                                         // if
                                    }
                                    // foreach ?>

                        <input type="text" id="table_index" value="<?php echo $table_index; ?>" hidden>
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/index">
                            <button type="button" class="btn btn-inverse">Back</button>
                        </a>
                    </div>
                    <div class="col-md-6" align="right">
                        <button class="btn btn-success" onclick="save_grade()"> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>