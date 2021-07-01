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

    $('#import_form').on('submit', function(form_submit) {
        form_submit.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/import ",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                $('#file').val('');
                load_data();
                alert(data);
            }
        })
    });

	

});
// document ready
</script>
<!-- END script  -->

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

                <h3 align="center">How to Import Excel Data into Mysql in Codeigniter</h3>
                <form method="post" id="import_form" enctype="multipart/form-data">
                    <p><label>Select Excel File</label>
                        <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
                    </p>
                    <br />
                    <input type="submit" name="import" value="Import" class="btn btn-info" />
                </form>
                <br />
              

                <!-- <table class="table table-bordered table-striped m-n">
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
                                <center>grade</center>
                            </th>
                            <th rowspan="2" width="20%">
                                <center>comment</center>
                            </th>

                        </tr>
                    </thead> -->
                <!-- thead -->
                <!-- <tbody>
                        <?php 
                                // $table_index = 0;
                            
							    // foreach($data_group as $index => $row) {
                                // if($data_emp_id != $row->emp_employee_id) {
                                
                                ?>
                        <input name="Emp_ID" type="text" value="<?php //echo $row->emp_id ?>" hidden>
                        <tr>
                            <td>
                                <center>
                                    <?php // echo $index+1 ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php //echo  $row->emp_employee_id ?>
                                   
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php //echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php //echo $row->gru_name ?>
                                   
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php // echo $data_grade[$index]; ?>
                                    <input type="text" name="grade" 
                                        value="<?php //echo $data_grade[$index]; ?>" hidden>
                                </center>
                            </td>
                            <td>
                                <center>

                        
                                    <textarea type="text" name="comment" placeholder="Enter comment" class="form-control"></textarea>

                                </center>
                            </td>
                        </tr>
                        <?php 
                           // $table_index += 1;
                                     //    }
                               //     } ?>

                        <input type="text" id="table_index" value="<?php //echo $table_index; ?>" hidden>
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php //echo base_url(); ?>ev_form_HR/Evs_form_HR/index">
                            <button type="button" class="btn btn-inverse">Back</button>
                        </a>
                    </div>
                    <div class="col-md-6" align="right">
                        <button class="btn btn-success" onclick="save_grade()" > Save</button>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>