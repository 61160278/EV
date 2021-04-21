<?php
/*
* v_main_permission.php
* Display v_main_permission
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2563-10-1
*/  
?>


<div class="col-md-12" align="left" >
	<div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
			
			<div class="panel-heading">
				<div align="right" >
				<h2>Manage Permission for Create MBO</h2>
				</div>
			</div>
			<!-- heading -->
		<form method="POST" action="<?php echo base_url(); ?>/ev_permission/Evs_permission/select_emp"">	
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">
				<h3>Please select Position & Probation due date</h3>
				<div class="form-group">
					<div class="col-md-3" align="center">
						<label for="checkbox" class="control-label"  >1) Start date before ..</label>
					</div>
					<!-- col-3 -->
							
					<div class="col-sm-8">
						<div class="input-group date" id="datepicker-pastdisabled">
							<span class="input-group-addon"><i class="ti ti-calendar"></i></span>
							<input class="form-control" id="datestart" type="date" name="Date">
						</div>
					</div>
					<!-- col-8 -->
				</div>
				<!-- form group-->
					<br>
					<br>
				<div class="col-md-12 ">
					
					
				</div>
					
			
					
					<div class="row">
						<div class="col-sm-8" align= "left">
							<button class="btn btn-inverse">CANCEL</button>
							<button class="btn btn-default btn">CLEAR</button>
							
						</div>
						<div class="col-sm-4" align= "right">
							<button class="btn btn-success btn" >Submit</button>
								
						</div>
							<!-- col-sm-4 -->
					</div>
					<!-- row -->
		</div>
		</form>
		<!-- body -->
	</div>
	<!-- indigo-->
</div>
<!-- col-md-12 -->
		
		
		
		

