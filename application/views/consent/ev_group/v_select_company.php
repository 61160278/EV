<?php
/*
* v_select_company.php
* Display v_main_group
* @input    
* @output
* @author Tippawan Aiemsaad, Jirayu Jaravichit
* @Create Date 2564-04-08
*/  
?>
<script>

function test(value){
	if(value == "1"){
	window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_sdm";}
	else{window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_skd";}
}


</script>

<!DOCTYPE html>
<html>
	<div class="col-md-12">
		<div class="panel panel-indigo">
			<div class="panel-heading">
				<h1 style="font-family:'Times New Roman'"><font color = "#ffffff" size = "7px"><b>Manage Group</b></font>
					<div class="panel pull-right" id="addtable_filter">
							<select name="example_length" class="form-control" aria-controls="example" onChange="test(value)">
								<option value="">Select Company</option>
								<option value="1">SDM</option>
								<option value="2">SKD</option>
							</select>
					</div>
					<!-- select company -->
				</h1>
			</div>
			<!-- panel-heading -->
			
			
			<div class="col-md-12">
				<div class="panel-body">
						
						<div class="col-md-12" align="right">
							
							<img src="<?php echo base_url();?>/pic/main_select_company.jpg"   >
						
						</div>
						<!-- col-12  -->
	</div>
	<!-- head outside -->
	
	
</html>


	