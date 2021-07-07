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
                alert(data);
            }
			// success
        })
		// ajax
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
                    <font color="#ffffff" size="6px"><b> Import score of form MHRD </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">
				<div class="row">
					<div class="col-md-7" align="right">
						<h3 align="center"><i class="fa fa-upload"></i></h3>
						<h3 align="center">Import Score of associate</h3>
					</div>
					<!--col-6 -->
					
					<div class="col-md-5" >
						<form method="post" id="import_form" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<p><label>Choose file Excel to Import Data</label>
										<input type="file" name="file" id="file" required accept=".xls, .xlsx" />
									</p>
								</div>
								<!-- col-6 -->
							</div>
							<!-- row -->	
							
							<div class="row">
								<div class="col-md-6">
									<input type="submit" name="import" value="Import" class="btn btn-info" />
								</div>
								<!-- col-6 -->
							</div>
							<!-- row -->
							
							
						</form>
					</div>
					<!--col-6 -->
				</div>
				<!-- row -->
                <hr>


            </div>
        </div>
    </div>
</div>