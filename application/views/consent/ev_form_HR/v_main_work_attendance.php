<?php
/*
* v_main_work_attendance.php
* Display v_main_work_attendance
* @input    
* @output
* @author Jakkarin
* @Create Date 2565-02-23
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

    $("#success").hide();

    $('#import_form').on('submit', function(form_submit) {
        form_submit.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>ev_form_HR/Evs_form_HR/import_work_attendance",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                $('#file').val('');
                console.log(data);

                $("#success").show();
            }
            // success
        })
        // ajax
        // window.location.href =
        //     "<?php echo base_url();?>/ev_form_HR/Evs_form_HR/grade_auto";
    });
    // onsubmit


});
// document ready
</script>
<!-- END script  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Import Work Attendance </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-11">
                        <label class="control-label">
                            <strong>
                                <font size="5px">Import Work Attendance</font>
                            </strong>
                        </label>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>

                <div class="row" id="insert_data">
                    <div class="col-md-7" align="right">
                        <h3 align="center"><i class="fa fa-upload"></i></h3>
                        <h3 align="center">Select file Excel to Import Data</h3>
                    </div>
                    <!--col-6 -->

                    <div class="col-md-5">
                        <form method="post" id="import_form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <input type="file" name="file" id="file" class="upload" required
                                        accept=".xls, .xlsx">
                                    <label>
                                        <font color="red">* file type .xls or .xlsx</font>
                                    </label>
                                </div>
                                <!-- col-6 -->
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" name="import" value="Import" class="btn btn-info" />
                                </div>
                                <!-- col-6 -->
                                <div class="col-md-6">
                                    <a
                                        href="<?php echo base_url(); ?>/./excel_template_work_attendance/excel_template.xlsx">
                                        <button type="button" class="btn btn-success">download template excel</button>
                                    </a>
                                </div>
                            </div>
                            <!-- row -->
                        </form>
                        <!-- form   -->

                    </div>
                    <!--col-6 -->
                </div>
                <!-- row -->

                <hr>
                <div class="row">
                    <div id = "success" class="alert alert-success">
                        <strong>Success!</strong>
                    </div>

                </div>
                <!-- row  -->
                <div class="row">
                    <div class="col-sm-8" align="left">
                        <a href="<?php echo base_url(); ?>Evs_Controller/index">
                            <button class="btn btn-inverse"><i class="fa fa-mail-reply"></i> Back</button>
                        </a>
                    </div>
                    <!-- col-8  -->

                </div>
                <!-- row  -->
            </div>
            <!-- panel-body -->
        </div>
        <!-- panel panel-indigo -->
    </div>
    <!-- col-md-12 -->
</div>
<!-- row -->